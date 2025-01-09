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

        foreach ($this->answers as $answer) {
            $quizQuestion = $answer->quiz_question;
            $questionOption = $answer->question_option;

            if ($questionOption && $questionOption->is_correct) {
                $totalMarks += $quizQuestion->marks;
                $correctAnswers++;
            } else if ($this->quiz->negative_marking_settings['enable_negative_marks']) {
                if ($this->quiz->negative_marking_settings['negative_marking_type'] === Quiz::FIXED_NEGATIVE_TYPE) {
                    $totalMarks -= $quizQuestion->negative_marks;
                } else {
                    $totalMarks -= ($quizQuestion->marks * $quizQuestion->negative_marks / 100);
                }
            }
        }

        // Calculate points based on marks
        $pointsEarned = 0;
        if ($totalMarks > 0) {
            // For example: Every 100 marks = 1 point
            $pointsEarned = ceil($totalMarks / 100);
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
            ->logOnly(['quiz.name', 'marks_obtained', 'is_passed', 'correct_answers', 'total_questions'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }
}
