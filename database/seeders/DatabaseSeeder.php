<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

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
        ]);

        if (!App::environment('production')) {
            $this->call([
                GroupSeeder::class,
                AwardSeeder::class,
                SessionSeeder::class,
                WinnerSeeder::class,
            ]);
        }
    }
}
