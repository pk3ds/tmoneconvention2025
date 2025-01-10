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
        $question_two = Question::find(2);
        $question_three = Question::find(3);

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
        // option for question two
        QuestionOption::create([
            'question_id' => $question_two->id,
            'name' => 'Oxygen',
            'is_correct' => false,
        ]);
        QuestionOption::create([
            'question_id' => $question_two->id,
            'name' => 'Nitrogen',
            'is_correct' => false,
        ]);
        QuestionOption::create([
            'question_id' => $question_two->id,
            'name' => 'Argon',
            'is_correct' => true,
        ]);
        QuestionOption::create([
            'question_id' => $question_two->id,
            'name' => 'Carbon',
            'is_correct' => false,
        ]);
        // option for question three
        QuestionOption::create([
            'question_id' => $question_three->id,
            'name' => 'Charles Dickens',
            'is_correct' => false,
        ]);
        QuestionOption::create([
            'question_id' => $question_three->id,
            'name' => 'William Shakespeare',
            'is_correct' => true,
        ]);
        QuestionOption::create([
            'question_id' => $question_three->id,
            'name' => 'Jane Austen',
            'is_correct' => false,
        ]);
        QuestionOption::create([
            'question_id' => $question_three->id,
            'name' => 'Mark Twain',
            'is_correct' => false,
        ]);
    }
}
