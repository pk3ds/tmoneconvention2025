<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'change password']);
        Permission::create(['name' => 'manage users']);
        Permission::create(['name' => 'manage stations']);
        Permission::create(['name' => 'manage questions']);
        Permission::create(['name' => 'view rating']);
        Permission::create(['name' => 'view deleted']);
    }
}
