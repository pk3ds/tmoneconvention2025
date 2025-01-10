<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CheckinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $checkins = DB::table('session_user')
            ->where('user_id', Auth::user()->id)
            ->join('sessions', 'sessions.id', '=', 'session_id')
            ->get();

        return Inertia::render('Checkins/Index', [
            'checkins' => $checkins,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($uuid)
    {
        $session = Session::where('uuid', $uuid)->first();

        $checkin = DB::table('session_user')
            ->where('session_id', $session->id)
            ->where('user_id', Auth::user()->id)
            ->first();

        if ($checkin) {
            return Inertia::render('Sessions/Checkins/Show', [
                'session' => $session,
                'checkin' => $checkin
            ])->with('flash.warning', 'Already checked in!');
        } else {
            return Inertia::render('Sessions/Checkins/Create', [
                'session' => $session,
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($uuid)
{
    $points = 1000;
    $session = Session::where('uuid', $uuid)->first();
    $user = Auth::user();

    DB::beginTransaction();
    try {
        // If user is not activated, activate them
        if (!$user->activated_at) {
            $user->disableLogging();
            $user->update([
                'activated_at' => now(),
            ]);
            activity()
                ->causedBy($user)
                ->performedOn($user)
                ->withProperties(['activated_at' => now()])
                ->event('User account activation')
                ->log('activation');
            $user->enableLogging();
        }

        // If this is a checkpoint session and user has a group
        if ($session->isCheckpoint && $user->group) {
            // Get all group members
            $groupMembers = $user->group->users;

            foreach ($groupMembers as $member) {
                // Check if member hasn't already checked in to this session
                if (!$member->sessions()->where('session_id', $session->id)->exists()) {
                    // Save session for each group member
                    $member->sessions()->save($session, [
                        'points' => $points,
                    ]);

                    // Update member points
                    $member->disableLogging();
                    $member->update([
                        'points' => $member->points + $points,
                    ]);

                    // Log activity for each member
                    activity()
                        ->causedBy($user) // Original user who triggered the check-in
                        ->performedOn($member)
                        ->withProperties([
                            'points' => $points,
                            'auto_checkin' => true,
                            'triggered_by' => $user->name
                        ])
                        ->event($session->name)
                        ->log('group checkpoint check in');

                    $member->enableLogging();
                }
            }

            // Update group points once
            $group = $user->group;
            $group->disableLogging();
            $group->update([
                'points' => $group->points + ($points * $groupMembers->count()),
            ]);

            activity()
                ->causedBy($user)
                ->performedOn($group)
                ->withProperties([
                    'points' => $points * $groupMembers->count(),
                    'members_count' => $groupMembers->count()
                ])
                ->event($session->name . ' checkpoint group check-in by ' . $user->name)
                ->log('group checkpoint check in');

            $group->enableLogging();
        } else {
            // Regular non-checkpoint session or user without group
            // Original check-in logic
            $user->sessions()->save($session, [
                'points' => $points,
            ]);

            $user->disableLogging();
            $user->update([
                'points' => $user->points + $points,
            ]);

            activity()
                ->causedBy($user)
                ->performedOn($user)
                ->withProperties(['points' => $points])
                ->event($session->name)
                ->log('check in');

            $user->enableLogging();

            // Update group points for single user
            if ($group = $user->group) {
                $group->disableLogging();
                $group->update([
                    'points' => $group->points + $points,
                ]);

                activity()
                    ->causedBy($user)
                    ->performedOn($group)
                    ->withProperties(['points' => $points])
                    ->event($session->name . ' from ' . $user->name)
                    ->log('check in');

                $group->enableLogging();
            }
        }

        DB::commit();

        $checkin = DB::table('session_user')
            ->where('session_id', $session->id)
            ->where('user_id', $user->id)
            ->first();

        return Inertia::render('Sessions/Checkins/Show', [
            'session' => $session,
            'checkin' => $checkin,
        ])->with('flash.success', 'Check in successful!');

    } catch (\Exception $e) {
        DB::rollback();
        throw $e;
    }
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
