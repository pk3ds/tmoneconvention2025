<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Group;
use App\Models\Station;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Validation\Rules\Password;

class CommitteeController extends Controller
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
            $users = User::orderBy('name')
                ->withTrashed()
                ->role(['admin', 'committee', 'vendor', 'product'])
                ->search()
                ->get();
        } else {
            $users = User::orderBy('name')
                ->role(['admin', 'committee', 'vendor', 'product'])
                ->search()
                ->get();
        }

        return Inertia::render('Committees/Index', [
            'search' => $search,
            'committees' => $users->load('roles', 'station'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $stations = Station::orderBy('name')->get();
        $groups = Group::orderBy('name')->get();
        $roles = Role::orderBy('name')->get();
        return Inertia::render('Committees/Create', [
            'stations' => $stations,
            'groups' => $groups,
            'roles' => $roles,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'staff_id' => 'required|string|uppercase|max:255|unique:' . User::class,
            'phone_no' => 'required|string|max:255|unique:' . User::class,
            'email' => 'required|string|email|max:255|unique:' . User::class,
            'room_no' => 'nullable|string|max:255',
            'pickup_location' => 'nullable|string|max:255',
            'station_id' => 'nullable|exists:' . Station::class . ',id',
            'group_id' => 'nullable|exists:' . Group::class . ',id',
            'role' => 'required|exists:roles,name',
            'password' => ['nullable', 'confirmed', Password::defaults()],
        ]);

        if ($request->role != 'user') {
            $usePassword = true;
            $password = Hash::make($request->password);
        } else {
            $usePassword = false;
            $password = Hash::make('password');
        }

        DB::beginTransaction();
        $user = User::create([
            'station_id' => $request->station_id,
            'group_id' => $request->group_id,
            'name' => $request->name,
            'staff_id' => $request->staff_id,
            'phone_no' => $request->phone_no,
            'email' => $request->email,
            'room_no' => $request->room_no,
            'pickup_location' => $request->pickup_location,
            'use_password' => $usePassword,
            'password' => $password,
        ])->assignRole($request->role);

        event(new Registered($user));

        DB::commit();
        return redirect()
            ->route('committees.index')
            ->with('success', 'User ' . $user->name . ' created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function upload(Request $request)
    {
        $users = $request->all();

        DB::beginTransaction();
        foreach ($users as $user) {
            $staffId = strtoupper($user['Staff ID']);
            $staffId = trim($staffId);

            $pickupInfo = $this->processTransportInfo($user['Pick Up Point'] ?? null);
            $dropoffInfo = $this->processTransportInfo($user['Drop Off Point'] ?? null);

            $createdUser = User::create([
                'name' => $user['Name'] ?? 'Unknown',
                'staff_id' => $staffId,
                'phone_no' => $user['Phone'] ?? null,
                'email' => $user['Email'] ?? null,
                'pickup_location' => $user['Pickup Point'] ?? null,
                'password' => Hash::make('password'),
                'use_password' => true,
                'employee_no' => $user['Perno'] ?? null,
                'position' => $user['Positions'] ?? null,
                'unit' => $user['Org Unit'] ?? null,
                'division' => $user['Division'] ?? null,
                'gender' => $user['Gender'] ?? null,
                'band' => $user['Band'] ?? null,
                'tag_category' => $user['Tag 1 - Category'] ?? null,
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
            ])->assignRole('committee');
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
    public function edit(User $user)
    {
        $stations = Station::orderBy('name')->get();
        $groups = Group::orderBy('name')->get();
        $roles = Role::orderBy('name')->get();
        $activities = Activity::orderBy('created_at', 'desc')
            ->where('subject_type', get_class($user))
            ->where('subject_id', $user->id)
            ->get();

        return Inertia::render('Committees/Edit', [
            'stations' => $stations,
            'groups' => $groups,
            'roles' => $roles,
            'user' => $user->load('roles', 'group', 'awards'),
            'activities' => $activities->load('causer'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'staff_id' => 'required|string|uppercase|max:255|unique:' . User::class . ',staff_id,' . $user->id,
            'phone_no' => 'required|string|max:255|unique:' . User::class . ',phone_no,' . $user->id,
            'email' => 'required|string|email|max:255|unique:' . User::class . ',email,' . $user->id,
            'room_no' => 'nullable|string|max:255',
            'pickup_location' => 'nullable|string|max:255',
            'station_id' => 'nullable|exists:' . Station::class . ',id',
            'group_id' => 'nullable|exists:' . Group::class . ',id',
            'role' => 'required|exists:roles,name',
            'password' => ['nullable', 'confirmed', Password::defaults()],
        ]);

        if ($request->role != 'user') {
            $usePassword = true;
            $password = Hash::make($request->password);
        } else {
            $usePassword = false;
            $password = Hash::make('password');
        }

        DB::beginTransaction();
        $user->update([
            'station_id' => $request->station_id,
            'group_id' => $request->group_id,
            'name' => $request->name,
            'staff_id' => $request->staff_id,
            'phone_no' => $request->phone_no,
            'email' => $request->email,
            'room_no' => $request->room_no,
            'pickup_location' => $request->pickup_location,
            'use_password' => $usePassword,
            'password' => $password,
        ]);

        if ($request->role) {
            $user->syncRoles($request->role);
        }

        DB::commit();
        return redirect()->back()->with('success', 'User ' . $user->name . ' updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()
            ->back()
            ->with('warning', 'User ' . $user->name . ' deleted successfully');
    }

    /**
     * Restore the specified resource from deleted state.
     */
    public function restore($id)
    {
        $user = User::withTrashed()->find($id);

        $user->restore();

        return redirect()->back()->with('success', 'User ' . $user->name . ' restored successfully');
    }
}
