<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Survey;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Harishdurga\LaravelQuiz\Database\Seeders\QuestionTypeSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $survey = Survey::create([
            'title' => 'CEO Talk Feedback',
            'description' => 'Please share your thoughts on the CEO presentation',
            'start_time' => '2024-01-10 13:00:00',
            'end_time' => '2024-01-10 14:00:00',
            'is_active' => true
        ]);

        // Add questions
        $survey->questions()->createMany([
            [
                'question' => 'How would you rate the clarity of the presentation?',
                'type' => 'rating',
                'order' => 1
            ],
            [
                'question' => 'What key insights did you gain from this talk?',
                'type' => 'text',
                'order' => 2
            ]
        ]);
    }
}
