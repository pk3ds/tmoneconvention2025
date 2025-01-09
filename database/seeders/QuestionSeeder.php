<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $question_one = Question::create([
            'station_id' => 1,
            'name' => 'What is the convention tagline?',
            'question_type_id' => 1,
            'is_active' => true,
        ]);
        $question_two = Question::create([
            'station_id' => 1,
            'name' => 'Which of the following elements is a noble gas?',
            'question_type_id' => 1,
            'is_active' => true,
        ]);
        $question_three = Question::create([
            'station_id' => 1,
            'name' => 'Who wrote the famous play Romeo and Juliet?',
            'question_type_id' => 1,
            'is_active' => true,
        ]);

        Question::factory(1)->hasOptions(4)->create([
            'station_id' => 1,
        ]);
    }
}
