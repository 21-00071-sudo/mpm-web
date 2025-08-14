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
            'name' => 'John Doe',
            'email' => 'johndoe@email.com',
            'username' => 'admin',
            'password' => 'adminpassword',
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Jane Doe',
            'email' => 'juandelacruz@email.com',
            'username' => 'staff',
            'password' => 'staffpassword',
            'role' => 'staff',
        ]);

        User::create([
            'name' => 'Foo Bar',
            'email' => 'foobar@email.com',
            'username' => 'student',
            'password' => 'studentpassword',
            'role' => 'student',
        ]);
    }
}
