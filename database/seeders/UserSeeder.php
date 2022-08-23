<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'password' => bcrypt('12345678'),
            'phone' => 12345678,
        ]);
        User::create([
            'name' => 'user',
            'email' => 'user@example.com',
            'role' => 'user',
            'password' => bcrypt('12345678'),
            'phone' => 87654321,
        ]);
    }
}
