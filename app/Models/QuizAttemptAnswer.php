<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Harishdurga\LaravelQuiz\Models\QuizAttemptAnswer as BaseQuizAttemptAnswer;

class QuizAttemptAnswer extends BaseQuizAttemptAnswer
{
    protected $guarded = ['id'];

    public function quiz_question()
    {
        return $this->belongsTo(config('laravel-quiz.models.quiz_question'));
    }

    public function question_option()
    {
        return $this->belongsTo(config('laravel-quiz.models.question_option'));
    }

    // Add this relationship to match the attempted 'option' call
    public function option()
    {
        return $this->belongsTo(config('laravel-quiz.models.question_option'), 'question_option_id');
    }
}
