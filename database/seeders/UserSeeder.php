<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Elyor',
            'email' => 'avezovelyor@gmail.com',
            'password' => Hash::make('password'),
        ])->assignRole('writer_task');


        User::create([
            'name' => 'workme',
            'email' => 'worker@gmail.com',
            'password' => Hash::make('password'),
        ])->assignRole('work_task');
    }
}
