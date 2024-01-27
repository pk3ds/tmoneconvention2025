<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Winner;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WinnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        foreach ($users as $user) {
            $user->update([
                'activated_at' => now(),
            ]);
        }
        Winner::factory(10)->create();
    }
}
