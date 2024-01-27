<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
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
                ->role('user')
                ->search()
                ->get();
        } else {
            $users = User::orderBy('name')
                ->search()
                ->role('user')
                ->get();
        }

        return Inertia::render('Users/Index', [
            'search' => $search,
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $groups = Group::all();
        $roles = Role::all();
        return Inertia::render('Users/Create', [
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
            ->route('users.index')
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
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $groups = Group::all();
        $roles = Role::all();
        $activities = Activity::orderBy('created_at', 'desc')
            ->where('subject_type', get_class($user))
            ->where('subject_id', $user->id)
            ->get();

        return Inertia::render('Users/Edit', [
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
     * Update the user points in database.
     */
    public function points(Request $request, User $user)
    {
        $validated = $request->validate([
            'points' => 'required|numeric',
            'remarks' => 'required',
        ]);

        DB::beginTransaction();
        $initialPoints = $user->points;
        $user->disableLogging();
        $user->update([
            'points' => $user->points + $request->points,
        ]);
        $finalPoints = $user->points;
        if ($finalPoints != $initialPoints) {
            $adjustmentPoints = $finalPoints - $initialPoints;
            activity()
                ->causedBy(Auth::user())
                ->performedOn($user)
                ->withProperties(['points' => $adjustmentPoints])
                ->event($request->remarks)
                ->log('points update');
        }
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
                    ->event($request->remarks . ' from ' . $user->name)
                    ->log('points update');
            }
            $group->enableLogging();
        }

        DB::commit();
        return redirect(route('users.edit', $user))->with('success', 'Points updated successfully');
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
