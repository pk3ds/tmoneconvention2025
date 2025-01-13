<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Group;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
     * Update the specified resource in storage.
     */
    public function upload(Request $request, Group $group)
    {
        $users = $request->all();

        DB::beginTransaction();
        foreach ($users as $user) {
            $staffId = strtoupper($user['Staff ID']);
            $staffId = trim($staffId);

            // Process pickup point and date
            $pickupInfo = $this->processTransportInfo($user['Pick Up Point'] ?? null);
            $dropoffInfo = $this->processTransportInfo($user['Drop Off Point'] ?? null);

            $createdUser = User::create([
                'group_id' => $group->id,
                'name' => $user['Name'] ?? 'Unknown',
                'staff_id' => $staffId,
                'phone_no' => $user['Phone'] ?? null,
                'email' => $user['Email'] ?? null,
                'pickup_location' => $user['Pick Up Point'] ?? null,
                'password' => Hash::make('password'),
                'employee_no' => $user['Staff ID'] ?? null,
                'position' => $user['Positions'] ?? null,
                'unit' => $user['Org Unit'] ?? null,
                'division' => $user['Division'] ?? null,
                'gender' => $user['Gender'] ?? null,
                'band' => $user['Band'] ?? null,
                'tag_category' => $user['Tagging'] ?? null,
                'tag_division' => $user['Tag 2 - Division'] ?? null,
                'room_type' => $user['Type of Room'] ?? null,
                'check_in' => $user['Check In'] ?? null,
                'check_out' => $user['Check Out'] ?? null,
                'pickup_route' => $pickupInfo['route'],
                'dropoff_route' => $dropoffInfo['route'],
                'pickup_bus_no' => $user['Bus Number(Pick Up Point)'] ?? null,
                'dropoff_bus_no' => $user['Bus Number(Drop Off Point)'] ?? null,
                'pickup_date' => $pickupInfo['date_string'],
                'dropoff_date' => $dropoffInfo['date_string'],
            ])->assignRole('user');
        }

        DB::commit();
        return redirect()->back()->with('success', 'Users uploaded successfully');
    }

    private function processTransportInfo($transportString)
    {
        if (!$transportString || $transportString === 'Own Transport') {
            return [
                'route' => 'Own Transport',
                'date_string' => null
            ];
        }

        // Extract route and date from string like "TMA1 - WYN (14hb)"
        if (preg_match('/^(.*?)\s*\((\d+)hb\)$/', $transportString, $matches)) {
            return [
                'route' => trim($matches[1]),
                'date_string' => $matches[2] . " Jan 2025"  // Returns "14 Jan 2025" format
            ];
        }

        // Return defaults if the string doesn't match expected formats
        return [
            'route' => $transportString,
            'date_string' => null
        ];
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
            'group' => $group->load('users', 'awards'),
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
            'points' => 'required|numeric',
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
