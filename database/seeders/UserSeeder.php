<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'John Doe',
            'email' => 'johndoe@email.com',
            'username' => 'admin',
            'password' => 'admin123',
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Jane Doe',
            'email' => 'juandelacruz@email.com',
            'username' => 'staff',
            'password' => 'staff123',
            'role' => 'staff',
        ]);

        User::create([
            'name' => 'Foo Bar',
            'email' => 'foobar@email.com',
            'username' => 'student',
            'password' => 'student123',
            'role' => 'student',
        ]);
    }
}
