<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Award;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AwardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        $awards = Award::orderBy('name')
            ->search()
            ->get();

        return Inertia::render('Awards/Index', [
            'search' => $search,
            'awards' => $awards->load('awardable'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = [User::class, Group::class];
        $groups = Group::orderBy('name')->get();
        $users = User::orderBy('name')->get();
        return Inertia::render('Awards/Create', [
            'types' => $types,
            'groups' => $groups,
            'users' => $users,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'remarks' => 'nullable|string|max:255',
            'points' => 'required|numeric',
            'awardable_type' => 'required',
            'awardable_id' => 'required',
        ]);

        DB::beginTransaction();
        $award = Award::create([
            'name' => $request->name,
            'remarks' => $request->remarks,
            'points' => $request->points,
            'awardable_type' => $request->awardable_type,
            'awardable_id' => $request->awardable_id,
        ]);

        if ($request->awardable_type == User::class) {
            $user = User::find($request->awardable_id);
            $user->disableLogging();
            $user->update([
                'points' => $user->points + $request->points,
            ]);
            activity()
                ->causedBy(Auth::user())
                ->performedOn($user)
                ->withProperties(['points' => $request->points])
                ->event($request->name)
                ->log('award');
            $user->enableLogging();

            if ($group = $user->group) {
                $group->disableLogging();
                $initialPoints = $group->points;
                $group->update([
                    'points' => $group->points + $request->points,
                ]);
                $finalPoints = $group->points;
                if ($finalPoints != $initialPoints) {
                    $adjustmentPoints = $finalPoints - $initialPoints;
                    activity()
                        ->causedBy(Auth::user())
                        ->performedOn($group)
                        ->withProperties(['points' => $adjustmentPoints])
                        ->event($request->name . ' from ' . $user->name)
                        ->log('points update');
                }
                $group->enableLogging();
            }
        }

        if ($request->awardable_type == Group::class) {
            $group = Group::find($request->awardable_id);
            $group->disableLogging();
            $group->update([
                'points' => $group->points + $request->points,
            ]);
            activity()
                ->causedBy(Auth::user())
                ->performedOn($group)
                ->withProperties(['points' => $request->points])
                ->event($request->name)
                ->log('award');
        }
        $group->enableLogging();

        DB::commit();
        return redirect()
            ->route('awards.index')
            ->with('success', 'Award ' . $award->name . ' created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Award $award)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Award $award)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Award $award)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Award $award)
    {
        //
    }
}
