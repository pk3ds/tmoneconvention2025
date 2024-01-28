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
        // FIXME points threshold?
        $points = 1000;
        $session = Session::where('uuid', $uuid)->first();

        DB::beginTransaction();
        $user = Auth::user();

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

        $user->sessions()->save($session, [
            'points' => $points,
        ]);

        $checkin = DB::table('session_user')
            ->where('session_id', $session->id)
            ->where('user_id', $user->id)
            ->first();

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

        DB::commit();
        return Inertia::render('Sessions/Checkins/Show', [
            'session' => $session,
            'checkin' => $checkin,
        ])->with('flash.success', 'Check in successful!');
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
