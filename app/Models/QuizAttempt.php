<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Harishdurga\LaravelQuiz\Models\QuizAttempt as BaseQuizAttempt;

class QuizAttempt extends BaseQuizAttempt
{
    use SoftDeletes, LogsActivity;

    protected $guarded = ['id'];

    protected $casts = [
        'marks_obtained' => 'float',
        'is_passed' => 'boolean',
        'points_earned' => 'integer',
    ];

    public function calculateMarks()
{
    $totalMarks = 0;
    $correctAnswers = 0;
    $totalQuestions = $this->quiz->questions->count();

    // Group answers by quiz question
    $answersGroupedByQuestion = $this->answers->groupBy('quiz_question_id');

    foreach ($this->quiz->questions as $quizQuestion) {
        $question = $quizQuestion->question;
        $userAnswers = $answersGroupedByQuestion->get($quizQuestion->id, collect([]));

        // Get all correct options for this question
        $correctOptions = $question->options->where('is_correct', true);
        $userSelectedOptionIds = $userAnswers->pluck('question_option_id')->toArray();
        $correctOptionIds = $correctOptions->pluck('id')->toArray();

        $isCorrect = false;

        if ($question->question_type_id === 1) {
            // Single select question - only one answer should be selected
            if ($userAnswers->count() === 1 && $userAnswers->first()->question_option->is_correct) {
                $isCorrect = true;
            }
        } else {
            // Multiple select question - must select all correct options and no incorrect ones
            $correctSelections = 0;
            $wrongSelections = 0;

            foreach ($userSelectedOptionIds as $selectedId) {
                if (in_array($selectedId, $correctOptionIds)) {
                    $correctSelections++;
                } else {
                    $wrongSelections++;
                }
            }

            $missingCorrect = count($correctOptionIds) - $correctSelections;

            if ($wrongSelections === 0 && $missingCorrect === 0) {
                $isCorrect = true;
            }
        }

        if ($isCorrect) {
            $totalMarks += $quizQuestion->marks;
            $correctAnswers++;
        } else if ($userAnswers->isNotEmpty() && $this->quiz->negative_marking_settings['enable_negative_marks']) {
            if ($this->quiz->negative_marking_settings['negative_marking_type'] === Quiz::FIXED_NEGATIVE_TYPE) {
                $totalMarks -= $quizQuestion->negative_marks;
            } else {
                $totalMarks -= ($quizQuestion->marks * $quizQuestion->negative_marks / 100);
            }
        }
    }

    // Simplified points calculation - if all answers are correct, give 1000 points
    $pointsEarned = 0;
    if ($totalMarks > 0) {
        // If they got all questions right (100% score), give 1000 points
        if ($correctAnswers === $totalQuestions) {
            $pointsEarned = 1000;
        } else {
            // Calculate percentage of correct answers and scale to 1000
            $percentage = ($correctAnswers / $totalQuestions) * 100;
            $pointsEarned = round(($percentage / 100) * 1000);
        }
    }

    $this->marks_obtained = max(0, $totalMarks);
    $this->is_passed = $this->marks_obtained >= $this->quiz->pass_marks;
    $this->correct_answers = $correctAnswers;
    $this->total_questions = $totalQuestions;
    $this->points_earned = $pointsEarned;
    $this->save();

    return $this;
}
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['quiz.name', 'marks_obtained', 'is_passed', 'correct_answers', 'total_questions', 'points_earned'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }
}
