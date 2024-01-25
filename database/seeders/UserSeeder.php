<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'User',
            'email' => 'user@mail.com',
        ])->assignRole('user');

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
        ])->assignRole('admin');

        User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'superadmin@mail.com',
        ])->assignRole('super admin');

        $users = User::factory(8)->create();
        foreach ($users as $user) {
            $user->assignRole('user');
        }
    }
}
