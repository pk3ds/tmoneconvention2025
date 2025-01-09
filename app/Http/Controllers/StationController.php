<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Station;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class StationController extends Controller
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
            $stations = Station::orderBy('name')
                ->withTrashed()
                ->search()
                ->with(['quizzes.attempts' => function($query) {
                    $query->where('participant_id', Auth::id())
                        ->where('participant_type', User::class);
                }])
                ->get();
        } else {
            $stations = Station::orderBy('name')
                ->search()
                ->with(['quizzes.attempts' => function($query) {
                    $query->where('participant_id', Auth::id())
                        ->where('participant_type', User::class);
                }])
                ->get();
        }

        return Inertia::render('Stations/Index', [
            'search' => $search,
            'stations' => $stations,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Stations/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        DB::beginTransaction();
        $station = Station::create([
            'name' => $request->name,
            'type' => $request->type,
            'description' => $request->description,
        ]);

        DB::commit();
        return redirect()
            ->route('stations.index')
            ->with('success', 'Station ' . $station->name . ' created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Station $station)
    {
        return Inertia::render('Stations/Show', [
            'station' => $station->load([
                'questions.options',
                'quizzes.questions.question.options',
                'quizzes.attempts' => function($query) {
                    $query->where('participant_id', auth()->id())
                        ->where('participant_type', User::class)
                        ->with(['answers' => function($q) {
                            $q->with(['quiz_question', 'question_option']);
                        }]);
                }
            ]),
            'canManageStations' => auth()->user()->can('manage stations'),
            'canViewRating' => auth()->user()->can('view rating')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Station $station)
    {
        return Inertia::render('Stations/Edit', [
            'station' => $station->load('questions.options', 'activities', 'quizzes')
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Station $station)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        DB::beginTransaction();
        $station->update([
            'name' => $request->name,
            'type' => $request->type,
            'description' => $request->description,
        ]);

        DB::commit();
        return redirect(route('stations.index'))->with('success', 'Station ' . $station->name . ' updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Station $station)
    {
        $station->delete();

        return redirect()
            ->route('stations.index')
            ->with('warning', 'Station ' . $station->name . ' deleted successfully');
    }

    /**
     * Restore the specified resource from deleted state.
     */
    public function restore($id)
    {
        $station = Station::withTrashed()->find($id);

        $station->restore();

        return redirect(route('stations.index'))->with('success', 'Station ' . $station->name . ' restored successfully');
    }
}
