<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'admin'])->givePermissionTo(Permission::all());
        Role::create(['name' => 'committee'])->givePermissionTo('view users');
        Role::create(['name' => 'user']);
    }
}
