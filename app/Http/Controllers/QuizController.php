<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Inertia\Inertia;
use App\Models\Station;
use App\Models\Question;
use App\Models\QuestionOption;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;
use Harishdurga\LaravelQuiz\Models\QuizQuestion;
use Illuminate\Support\Facades\DB;

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

        $query = Quiz::orderBy('name')
            ->search()
            ->with(['attempts' => function ($query) {
                $query->where('participant_id', auth()->id())
                    ->where('participant_type', User::class);
            }]);

        if ($permissionNames->contains('view deleted')) {
            $quizzes = $query->withTrashed()->get();
        } else {
            $quizzes = $query->get();
        }

        return Inertia::render('Quizzes/Index', [
            'search' => $search,
            'quizzes' => $quizzes,
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
        return Inertia::render('Quizzes/Show', [
            'quiz' => $quiz->load([
                'questions.question.options',
                'attempts' => function ($query) {
                    $query->where('participant_id', auth()->id())
                        ->where('participant_type', User::class)
                        ->with(['answers' => function ($q) {
                            $q->with(['quiz_question', 'question_option']);
                        }]);
                }
            ]),
            'canManageQuestions' => auth()->user()->can('manage questions')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quiz $quiz)
    {
        $station_id = Auth::user()->station?->id;
        $stations = Station::orderBy('name')->get();
        $quiz_questions_id = $quiz->questions->pluck('question_id');

        if ($station_id) {
            $questions = Question::orderBy('name')->whereNotIn('id', $quiz_questions_id)->where('station_id', $station_id)->get();
        } else {
            $questions = Question::orderBy('name')->whereNotIn('id', $quiz_questions_id)->get();
        }

        $activities = Activity::orderBy('created_at', 'desc')
            ->where('subject_type', get_class($quiz))
            ->where('subject_id', $quiz->id)
            ->get();

        return Inertia::render('Quizzes/Edit', [
            'quiz' => $quiz->load('questions.question.station'),
            'station_id' => $station_id,
            'stations' => $stations,
            'questions' => $questions->load('station'),
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

    /**
     * Link question to quiz.
     */
    public function link(Request $request, Quiz $quiz)
    {
        $quiz_question =  QuizQuestion::create([
            'quiz_id' => $quiz->id,
            'question_id' => $request->question_id,
            'marks' => 100,
            'order' => 1,
            'negative_marks' => 0,
            'is_optional' => false
        ]);

        return redirect()
            ->back()
            ->with('success', 'Question linked successfully');
    }

    /**
     * Unlink question to quiz.
     */
    public function unlink(Request $request, Quiz $quiz)
    {
        $quiz_question = QuizQuestion::find($request->id);
        $quiz_question->delete();

        return redirect()
            ->back()
            ->with('warning', 'Question unlinked successfully');
    }

    public function submit(Request $request, Quiz $quiz)
    {
        $existingAttempt = $quiz->attempts()
            ->where('participant_id', auth()->id())
            ->where('participant_type', get_class(auth()->user()))
            ->first();

        if ($existingAttempt) {
            return redirect()->back()->with('error', 'You have already attempted this quiz');
        }

        DB::beginTransaction();
        try {
            $attempt = $quiz->attempts()->create([
                'participant_id' => auth()->id(),
                'participant_type' => get_class(auth()->user()),
                'quiz_id' => $quiz->id,
            ]);

            foreach ($request->answers as $questionId => $answerIds) {
                $quizQuestion = $quiz->questions()->where('question_id', $questionId)->first();

                // Handle both single answer (string/integer) and multiple answers (array)
                $answerIds = is_array($answerIds) ? $answerIds : [$answerIds];

                foreach ($answerIds as $answerId) {
                    $option = QuestionOption::find($answerId);

                    if ($option) {
                        $attempt->answers()->create([
                            'quiz_question_id' => $quizQuestion->id,
                            'question_option_id' => $answerId,
                            'answer' => $option->name
                        ]);
                    }
                }
            }

            $attempt->calculateMarks();

            $user = Auth::user();
            $user->disableLogging();
            $user->update([
                'points' => $user->points + $attempt->points_earned,
            ]);

            if ($attempt->points_earned > 0) {
                activity()
                    ->causedBy($user)
                    ->performedOn($user)
                    ->withProperties([
                        'points' => $attempt->points_earned,
                        'quiz_name' => $quiz->name,
                        'marks_obtained' => $attempt->marks_obtained,
                        'correct_answers' => $attempt->correct_answers,
                        'total_questions' => $attempt->total_questions
                    ])
                    ->event('Quiz completion')
                    ->log('points earned');

                if ($group = $user->group) {
                    $group->disableLogging();
                    $group->update([
                        'points' => $group->points + $attempt->points_earned,
                    ]);

                    activity()
                        ->causedBy($user)
                        ->performedOn($group)
                        ->withProperties([
                            'points' => $attempt->points_earned,
                            'quiz_name' => $quiz->name,
                            'user_name' => $user->name
                        ])
                        ->event('Group points from quiz')
                        ->log('points earned');
                    $group->enableLogging();
                }
            }
            $user->enableLogging();

            DB::commit();
            return redirect()->back()->with('success', "Quiz completed! You scored {$attempt->marks_obtained} marks and earned {$attempt->points_earned} points!");
        } catch (\Exception $e) {
            DB::rollBack();

            // For development, you might want to log the error instead of dd()
            \Log::error('Quiz submission error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function attempts(Quiz $quiz)
    {
        $attempts = $quiz->attempts()
            ->with(['participant', 'answers.quiz_question', 'answers.question_option'])
            ->get();

        return Inertia::render('Quizzes/Attempts', [
            'quiz' => $quiz,
            'attempts' => $attempts,
        ]);
    }

    public function downloadReports(Quiz $quiz)
    {
        $this->authorize('manage questions');

        $filename = Str::slug($quiz->name) . '_reports_' . now()->format('Y-m-d') . '.csv';

        return response()->streamDownload(function () use ($quiz) {
            $handle = fopen('php://output', 'w');
            fputs($handle, "\xEF\xBB\xBF");

            $headers = [
                'Participant Name',
                'Question',
                'Selected Answer',
                'Correct Answer',
                'Status',
                'Points',
                'Date'
            ];
            fputcsv($handle, $headers);

            $attempts = $quiz->attempts()
                ->with([
                    'participant',
                    'answers.quiz_question',
                    'answers.quiz_question.question',
                    'answers.question_option',
                    'answers.quiz_question.question.options' => function ($q) {
                        $q->where('is_correct', true);
                    }
                ])
                ->get();

            foreach ($attempts as $attempt) {
                foreach ($attempt->answers as $answer) {
                    if (!$answer->quiz_question || !$answer->quiz_question->question) {
                        continue;
                    }

                    $question = $answer->quiz_question->question;
                    $correctAnswer = $question->options->first();

                    fputcsv($handle, [
                        $attempt->participant->name ?? 'Unknown',
                        $question->name ?? 'Unknown Question',
                        $answer->question_option->name ?? 'No Answer',
                        $correctAnswer ? $correctAnswer->name : 'No Correct Answer',
                        $answer->question_option->is_correct ? 'Correct' : 'Incorrect',
                        $attempt->points_earned,
                        $attempt->created_at->format('Y-m-d H:i:s')
                    ]);
                }
            }

            fclose($handle);
        }, $filename);
    }
}
