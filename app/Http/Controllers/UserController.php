<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        $permissionNames = Auth::user()->getPermissionsViaRoles()->pluck('name');

        if ($permissionNames->contains('view deleted')) {
            $users = User::orderBy('name')->withTrashed()->search()->get();
        } else {
            $users = User::orderBy('name')->search()->get();
        }

        return Inertia::render('Users/Index', [
            'search' => $search,
            'users' => $users->load('roles'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return Inertia::render('Users/Create', [
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
            'email' => 'required|string|lowercase|email|max:255|unique:' . User::class,
            'role' => 'required|exists:roles,name',
            'password' => ['nullable', 'confirmed', Password::defaults()],
        ]);

        DB::beginTransaction();
        $user = User::create([
            'name' => $request->name,
            'staff_id' => $request->staff_id,
            'phone_no' => $request->phone_no,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : Hash::make('password'),
        ])->assignRole($request->role);

        event(new Registered($user));

        DB::commit();
        return redirect()->route('users.index')->with('success', 'User created successfully');
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
        $roles = Role::all();
        return Inertia::render('Users/Edit', [
            'roles' => $roles,
            'user' => $user->load('roles'),
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
            'email' => 'required|string|lowercase|email|max:255|unique:' . User::class . ',email,' . $user->id,
            'role' => 'required|exists:roles,name',
            'password' => ['nullable', 'confirmed', Password::defaults()],
        ]);

        $user->update([
            'name' => $request->name,
            'staff_id' => $request->staff_id,
            'phone_no' => $request->phone_no,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : Hash::make('password'),
        ]);

        if ($request->role) {
            $user->syncRoles($request->role);
        }

        return redirect(route('users.index'))->with('success', 'User ' . $user->name . ' updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
