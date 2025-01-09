<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Inertia\Inertia;
use App\Models\Station;
use App\Models\Question;
use App\Models\QuestionOption;
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

    public function submit(Request $request, Station $station, Quiz $quiz)
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
            // Create quiz attempt
            $attempt = $quiz->attempts()->create([
                'participant_id' => auth()->id(),
                'participant_type' => get_class(auth()->user()),
                'quiz_id' => $quiz->id,
            ]);

            // Record answers
            foreach($request->answers as $questionId => $answerId) {
                $quizQuestion = $quiz->questions()->where('question_id', $questionId)->first();

                $attempt->answers()->create([
                    'quiz_question_id' => $quizQuestion->id,
                    'question_option_id' => $answerId,
                    'answer' => QuestionOption::find($answerId)->name
                ]);
            }

            // Calculate marks and points
            $attempt->calculateMarks();

            // Update user points if passed
            if ($attempt->is_passed) {
                $user = auth()->user();

                // Update user points
                $user->increment('points', $attempt->points_earned);

                // Log the points update
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

                // Update group points if user belongs to a group
                if ($group = $user->group) {
                    $group->increment('points', $attempt->points_earned);

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
                }
            }

            DB::commit();

            $message = $attempt->is_passed ?
                "Quiz completed successfully! You scored {$attempt->marks_obtained} marks and earned {$attempt->points_earned} points!" :
                "Quiz completed. You scored {$attempt->marks_obtained} marks. Keep practicing!";

            return redirect()->back()->with('success', $message);
        } catch (\Exception $e) {
            DB::rollBack();
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
}
