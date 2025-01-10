<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $survey = Survey::active()
            ->with('questions')
            ->first();

        if (!$survey) {
            return response()->json(['message' => 'No active survey'], 404);
        }

        // Check if user has already responded
        $hasResponded = $survey->responses()
            ->where('user_id', auth()->id())
            ->exists();

        if ($hasResponded) {
            return response()->json(['message' => 'Already responded'], 403);
        }

        return response()->json($survey);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Survey $survey)
    {
        $survey->load([
            'questions',
            'responses' => function ($query) {
                $query->where('user_id', auth()->id());
            },
            'responses.answers',
        ]);

        return Inertia::render('Surveys/Show', [
            'survey' => $survey
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Survey $survey)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Survey $survey)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Survey $survey)
    {
        //
    }

    public function submit(Request $request, Survey $survey)
    {
        $request->validate([
            'answers' => 'required|array',
        ]);

        // Check if user has already responded
        if ($survey->responses()->where('user_id', auth()->id())->exists()) {
            return back()->withErrors([
                'answers' => 'You have already submitted feedback for this survey.'
            ]);
        }

        // Create the response
        $response = $survey->responses()->create([
            'user_id' => auth()->id(),
        ]);

        // Store the answers
        foreach ($request->answers as $questionId => $answer) {
            $response->answers()->create([
                'survey_question_id' => $questionId,
                'answer' => $answer,
            ]);
        }

        // Award points to the user
        $points = 10; // You can adjust this or make it dynamic
        auth()->user()->increment('points', $points);

        // Update response with points earned
        $response->update([
            'points_earned' => $points
        ]);

        return redirect()->back()->with('success', 'Thank you for your feedback!');
    }
}
