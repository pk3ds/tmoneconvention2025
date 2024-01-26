<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        $permissionNames = Auth::user()
            ->getPermissionsViaRoles()
            ->pluck('name');

        if ($permissionNames->contains('view deleted')) {
            $groups = Group::orderBy('name')
                ->withTrashed()
                ->search()
                ->get();
        } else {
            $groups = Group::orderBy('name')
                ->search()
                ->get();
        }

        return Inertia::render('Groups/Index', [
            'search' => $search,
            'groups' => $groups->load('users'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Groups/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        DB::beginTransaction();
        $group = Group::create([
            'name' => $request->name,
        ]);

        DB::commit();
        return redirect()
            ->route('groups.index')
            ->with('success', 'Group ' . $group->name . ' created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group)
    {
        $activities = Activity::orderBy('created_at', 'desc')
            ->where('subject_type', get_class($group))
            ->where('subject_id', $group->id)
            ->get();

        return Inertia::render('Groups/Edit', [
            'group' => $group->load('users'),
            'activities' => $activities->load('causer'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Group $group)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        DB::beginTransaction();
        $group->update([
            'name' => $request->name,
        ]);

        DB::commit();
        return redirect(route('groups.index'))->with('success', 'Group ' . $group->name . ' updated successfully');
    }

    /**
     * Update the group points in database.
     */
    public function points(Request $request, Group $group)
    {
        $validated = $request->validate([
            'points' => 'required',
            'remarks' => 'required',
        ]);

        DB::beginTransaction();
        $initialPoints = $group->points;

        $group->disableLogging();

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
                ->event($request->remarks)
                ->log('points update');
        }

        $group->enableLogging();

        DB::commit();
        return redirect(route('groups.edit', $group))->with('success', 'Points updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        $group->delete();

        return redirect()
            ->route('groups.index')
            ->with('warning', 'Group ' . $group->name . ' deleted successfully');
    }

    /**
     * Restore the specified resource from deleted state.
     */
    public function restore($id)
    {
        $group = Group::withTrashed()->find($id);

        $group->restore();

        return redirect(route('groups.index'))->with('success', 'Group ' . $group->name . ' restored successfully');
    }
}
