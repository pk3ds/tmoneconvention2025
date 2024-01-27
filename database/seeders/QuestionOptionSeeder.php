<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;
use App\Models\QuestionOption;
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
        QuestionOption::create([
            'question_id' => $question_one->id,
            'name' => 'Ini Cara Kita',
            'is_correct' => false,
        ]);
    }
}
