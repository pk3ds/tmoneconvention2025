<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Harishdurga\LaravelQuiz\Models\Question;
use Harishdurga\LaravelQuiz\Models\QuestionOption;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class QuestionOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $question_one = Question::first();

        QuestionOption::create([
            'question_id' => $question_one->id,
            'name' => 'Powering Your Next',
            'is_correct' => false,
        ]);
        QuestionOption::create([
            'question_id' => $question_one->id,
            'name' => 'Your Next is Now',
            'is_correct' => false,
        ]);
        QuestionOption::create([
            'question_id' => $question_one->id,
            'name' => 'Innovate Your Next',
            'is_correct' => true,
        ]);

        $other_questions = Question::all()->skip(1);

        foreach ($other_questions as $question) {
            for ($i = 0; $i < 3; $i++) {
                QuestionOption::create([
                    'question_id' => $question->id,
                ]);
            }
        }
    }
}
