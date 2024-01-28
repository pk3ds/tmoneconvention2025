<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Inertia\Inertia;
use App\Models\Station;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

class QuizController extends Controller
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
            $quizzes = Quiz::orderBy('name')
                ->search()
                ->withTrashed()
                ->get();
        } else {
            $quizzes = Quiz::orderBy('name')
                ->search()
                ->get();
        }

        return Inertia::render('Quizzes/Index', [
            'search' => $search,
            'quizzes' => $quizzes->load('questions'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $station_id = Auth::user()->station?->id;
        $stations = Station::orderBy('name')->get();

        return Inertia::render('Quizzes/Create', [
            'station_id' => $station_id,
            'stations' => $stations,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'station_id' => 'required|numeric|exists:' . Station::class . ',id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);
        $slug = Str::slug($request->name);
        $quiz = Quiz::create([
            'station_id' => $request->station_id,
            'name' => $request->name,
            'description' => $request->description,
            'slug' => $slug,
            'time_between_attempts' => 0,
            'total_marks' => 2000,
            'pass_marks' => 1400,
            'max_attempts' => 1,
            'is_published' => 1,
            'duration' => 180,
            'valid_from' => now(),
            'negative_marking_settings' => [
                'enable_negative_marks' => false,
                'negative_marking_type' => 'fixed',
                'negative_mark_value' => 0,
            ],
        ]);
        return redirect()
            ->route('quizzes.index')
            ->with('success', 'Quiz created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Quiz $quiz)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quiz $quiz)
    {
        $station_id = Auth::user()->station?->id;
        $stations = Station::orderBy('name')->get();
        $activities = Activity::orderBy('created_at', 'desc')
            ->where('subject_type', get_class($quiz))
            ->where('subject_id', $quiz->id)
            ->get();

        return Inertia::render('Quizzes/Edit', [
            'quiz' => $quiz->load('questions'),
            'station_id' => $station_id,
            'stations' => $stations,
            'activities' => $activities->load('causer'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quiz $quiz)
    {
        $validated = $request->validate([
            'station_id' => 'required|numeric|exists:' . Station::class . ',id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        $slug = Str::slug($request->name);
        $quiz->update([
            'station_id' => $request->station_id,
            'name' => $request->name,
            'description' => $request->description,
            'slug' => $slug,
            'time_between_attempts' => 0,
            'total_marks' => 2000,
            'pass_marks' => 1400,
            'max_attempts' => 1,
            'is_published' => 1,
            'duration' => 180,
            'valid_from' => now(),
            'negative_marking_settings' => [
                'enable_negative_marks' => false,
                'negative_marking_type' => 'fixed',
                'negative_mark_value' => 0,
            ],
        ]);

        return redirect()
            ->back()
            ->with('success', 'Quiz updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quiz $quiz)
    {
        $quiz->delete();

        return redirect()
            ->route('quizzes.index')
            ->with('warning', 'Quiz ' . $quiz->name . ' deleted successfully');
    }

    /**
     * Restore the specified resource from deleted state.
     */
    public function restore($id)
    {
        $quiz = Quiz::withTrashed()->find($id);

        $quiz->restore();

        return redirect(route('quizzes.index'))->with('success', 'Quiz ' . $quiz->name . ' restored successfully');
    }
}
