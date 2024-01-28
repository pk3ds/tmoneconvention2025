<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Harishdurga\LaravelQuiz\Models\QuizAttempt;
use Harishdurga\LaravelQuiz\Models\QuizAttemptAnswer;

class AttemptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Quiz $quiz)
    {
        return Inertia::render('Stations/Attempts/Create', [
            'quiz' => $quiz->load('station'),
            'questions' => $quiz->questions->load('question.options'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Quiz $quiz, Request $request)
    {
        $attempts = $request->all();
        $participant = Auth::user();

        DB::beginTransaction();
        $quiz_attempt = QuizAttempt::create([
            'quiz_id' => $quiz->id,
            'participant_id' => $participant->id,
            'participant_type' => get_class($participant)
        ]);

        // dd($quiz->questions, $attempts);

        foreach ($attempts as $attempt) {
            QuizAttemptAnswer::create(
                [
                    'quiz_attempt_id' => $quiz_attempt->id,
                    'quiz_question_id' => $attempt["quiz_question_id"],
                    'question_option_id' => $attempt["option_id"],
                ]
            );
        }

        DB::commit();

        $score = $quiz_attempt->calculate_score();

        dd($score);
    }

    /**
     * Display the specified resource.
     */
    public function show(QuizAttempt $quizAttempt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(QuizAttempt $quizAttempt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, QuizAttempt $quizAttempt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(QuizAttempt $quizAttempt)
    {
        //
    }
}
