<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::create([
            'name' => 'writer_task',
        ]);

        Role::create([
            'name' => 'work_task',
        ]);
    }
}
