<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory()->count(5)->create();

        User::create([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'username' => 'admin',
            'password' => 'adminpassword',
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Staff',
            'email' => 'staff@email.com',
            'username' => 'staff',
            'password' => 'staffpassword',
            'role' => 'staff',
        ]);

        User::create([
            'name' => 'Student',
            'email' => 'student@email.com',
            'username' => 'student',
            'password' => 'studentpassword',
            'role' => 'student',
        ]);
    }
}
