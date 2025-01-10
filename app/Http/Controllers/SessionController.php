<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Session;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

class SessionController extends Controller
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
            $sessions = Session::orderBy('name')
                ->withTrashed()
                ->search()
                ->get();
        } else {
            $sessions = Session::orderBy('name')
                ->search()
                ->get();
        }

        return Inertia::render('Sessions/Index', [
            'search' => $search,
            'sessions' => $sessions,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Sessions/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string|max:255',
        'start_at' => 'nullable|string|max:255',
        'end_at' => 'nullable|string|max:255',
        'isCheckpoint' => 'boolean',
        'checkpointNo' => 'nullable|integer',
    ]);

    DB::beginTransaction();
    $session = Session::create([
        'uuid' => Str::uuid()->toString(),
        'name' => $request->name,
        'description' => $request->description,
        'start_at' => $request->start_at,
        'end_at' => $request->end_at,
        'isCheckpoint' => $request->isCheckpoint,
        'checkpointNo' => $request->checkpointNo,
    ]);

    DB::commit();
    return redirect()
        ->route('sessions.index')
        ->with('success', 'Session ' . $session->name . ' created successfully');
}

    /**
     * Display the specified resource.
     */
    public function show(Session $session)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Session $session)
    {
        $activities = Activity::orderBy('created_at', 'desc')
            ->where('subject_type', get_class($session))
            ->where('subject_id', $session->id)
            ->get();

        return Inertia::render('Sessions/Edit', [
            'session' => $session->load('users.group'),
            'activities' => $activities->load('causer'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Session $session)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string|max:255',
        'start_at' => 'nullable|string|max:255',
        'end_at' => 'nullable|string|max:255',
        'isCheckpoint' => 'boolean',
        'checkpointNo' => 'nullable|integer',
    ]);

    DB::beginTransaction();
    $session->update([
        'name' => $request->name,
        'description' => $request->description,
        'start_at' => $request->start_at,
        'end_at' => $request->end_at,
        'isCheckpoint' => $request->isCheckpoint,
        'checkpointNo' => $request->checkpointNo,
    ]);

    DB::commit();
    return redirect()
        ->back()
        ->with('success', 'Session ' . $session->name . ' updated successfully');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Session $session)
    {
        $session->delete();

        return redirect()
            ->route('sessions.index')
            ->with('warning', 'Session ' . $session->name . ' deleted successfully');
    }

    /**
     * Restore the specified resource from deleted state.
     */
    public function restore($id)
    {
        $session = Session::withTrashed()->find($id);

        $session->restore();

        return redirect(route('sessions.index'))->with('success', 'Session ' . $session->name . ' restored successfully');
    }
}
