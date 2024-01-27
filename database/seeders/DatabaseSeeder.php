<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            QuestionTypeSeeder::class,
        ]);

        if (!App::environment('production')) {
            $this->call([
                GroupSeeder::class,
                AwardSeeder::class,
                SessionSeeder::class,
                WinnerSeeder::class,
                StationSeeder::class,
                QuestionSeeder::class,
                QuestionOptionSeeder::class,
            ]);
        }
    }
}
