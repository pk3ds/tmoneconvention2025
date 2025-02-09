<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\StreamedResponse;

class SurveyController extends Controller
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

        $query = Survey::orderBy('title')
            ->search()
            ->with(['responses' => function ($query) {
                $query->where('user_id', auth()->id());
            }, 'questions']);

        if ($permissionNames->contains('view deleted')) {
            $surveys = $query->withTrashed()->get();
        } else {
            $surveys = $query->get();
        }

        return Inertia::render('Surveys/Index', [
            'search' => $search,
            'surveys' => $surveys,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Surveys/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'questions' => 'required|array|min:1',
            'questions.*.question' => 'required|string|max:255',
            'questions.*.type' => 'required|in:rating,text',
            'questions.*.order' => 'required|integer|min:1'
        ]);

        // Create survey
        $survey = Survey::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'start_time' => $validated['start_time'],
            'end_time' => $validated['end_time'],
            'is_active' => true
        ]);

        // Create questions
        $survey->questions()->createMany($validated['questions']);

        activity()
            ->performedOn($survey)
            ->causedBy(auth()->user())
            ->withProperties(['questions' => $validated['questions']])
            ->log('created survey');

        return redirect()->route('surveys.index')
            ->with('success', 'Survey created successfully');
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
        $this->authorize('manage surveys');

        $survey->load(['questions' => function ($query) {
            $query->orderBy('order');
        }]);

        return Inertia::render('Surveys/Edit', [
            'survey' => $survey
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Survey $survey)
    {
        $this->authorize('manage surveys');

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'questions' => 'required|array|min:1',
            'questions.*.id' => 'nullable|exists:survey_questions,id',
            'questions.*.question' => 'required|string|max:255',
            'questions.*.type' => 'required|in:rating,text',
            'questions.*.order' => 'required|integer|min:1'
        ]);

        $survey->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'start_time' => $validated['start_time'],
            'end_time' => $validated['end_time']
        ]);

        // Update questions
        $updatedQuestionIds = collect($validated['questions'])
            ->pluck('id')
            ->filter()
            ->toArray();

        $survey->questions()
            ->whereNotIn('id', $updatedQuestionIds)
            ->delete();

        foreach ($validated['questions'] as $questionData) {
            if (!empty($questionData['id'])) {
                $survey->questions()
                    ->where('id', $questionData['id'])
                    ->update($questionData);
            } else {
                $survey->questions()->create($questionData);
            }
        }

        activity()
            ->performedOn($survey)
            ->causedBy(auth()->user())
            ->withProperties([
                'questions' => $validated['questions'],
                'old_questions' => $survey->questions->toArray()
            ])
            ->log('updated survey');

        return redirect()
            ->route('surveys.index')
            ->with('success', 'Survey updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Survey $survey)
    {
        activity()
            ->performedOn($survey)
            ->causedBy(auth()->user())
            ->log('deleted survey');

        $survey->delete();

        return redirect()
            ->route('surveys.index')
            ->with('warning', 'Survey ' . $survey->name . ' deleted successfully');
    }

    public function submit(Request $request, Survey $survey)
    {
        $request->validate([
            'answers' => 'required|array',
        ]);

        if ($survey->responses()->where('user_id', auth()->id())->exists()) {
            return back()->withErrors([
                'answers' => 'You have already submitted feedback for this survey.'
            ]);
        }

        try {
            DB::beginTransaction();

            // Calculate points based on number of answers
            $totalQuestions = $survey->questions()->count();
            $answeredQuestions = count($request->answers);
            $pointsPerQuestion = 1000 / $totalQuestions;
            $points = round($pointsPerQuestion * $answeredQuestions);

            $user = Auth::user();
            $user->disableLogging();
            $user->increment('points', $points);

            activity()
                ->causedBy($user)
                ->performedOn($user)
                ->withProperties([
                    'points' => $points,
                    'survey_title' => $survey->title,
                    'questions_answered' => $answeredQuestions,
                    'total_questions' => $totalQuestions
                ])
                ->event('Survey completion')
                ->log('points earned');
            $user->enableLogging();

            if ($group = $user->group) {
                $group->disableLogging();
                $group->update([
                    'points' => $group->points + $points,
                ]);

                activity()
                    ->causedBy($user)
                    ->performedOn($group)
                    ->withProperties([
                        'points' => $points,
                        'survey_title' => $survey->title,
                        'user_name' => $user->name,
                        'questions_answered' => $answeredQuestions,
                        'total_questions' => $totalQuestions
                    ])
                    ->event('Group points from survey')
                    ->log('points earned');
                $group->enableLogging();
            }

            $response = $survey->responses()->create([
                'user_id' => auth()->id(),
                'points_earned' => $points
            ]);

            foreach ($request->answers as $questionId => $answer) {
                $response->answers()->create([
                    'survey_question_id' => $questionId,
                    'answer' => $answer,
                ]);
            }

            DB::commit();
            return redirect()->back()->with('success', 'Thank you for your feedback!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Survey submission failed', [
                'error' => $e->getMessage(),
                'user_id' => auth()->id(),
                'survey_id' => $survey->id
            ]);

            return redirect()->back()->withErrors([
                'error' => 'An error occurred while submitting your feedback. Please try again later.'
            ]);
        }
    }


    public function restore($id)
    {
        $survey = Survey::withTrashed()->find($id);

        activity()
            ->performedOn($survey)
            ->causedBy(auth()->user())
            ->log('restored survey');

        $survey->restore();

        return redirect()->back()->with('success', 'Survey ' . $survey->name . ' restored successfully');
    }

    public function downloadResponses(Survey $survey)
    {
        $this->authorize('manage surveys');

        $responses = $survey->responses()
            ->with(['answers.question', 'user'])
            ->get();

        $filename = Str::slug($survey->title) . '_responses_' . now()->format('Y-m-d') . '.csv';

        return response()->streamDownload(function () use ($responses, $survey) {
            $handle = fopen('php://output', 'w');
            fputs($handle, "\xEF\xBB\xBF"); // BOM for Excel

            $questions = $survey->questions()->orderBy('order')->get();

            // Headers
            $headers = ['Respondent', 'Submitted At'];
            foreach ($questions as $question) {
                $headers[] = $question->question;
            }
            fputcsv($handle, $headers);

            // Data
            foreach ($responses as $response) {
                $row = [
                    $response->user->name ?? 'Anonymous',
                    $response->created_at->format('Y-m-d H:i:s'),
                ];

                $answerMap = $response->answers->pluck('answer', 'survey_question_id');
                foreach ($questions as $question) {
                    $row[] = $answerMap[$question->id] ?? '';
                }

                fputcsv($handle, $row);
            }

            fclose($handle);
        }, $filename, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
        ]);
    }
}
