<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 10 users with the factory
        User::factory(100)->create();

        // Create a specific user with the factory
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'xhuxho.farmavalue@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 'admin',
            'is_active' => true,
            'identification' => '1234567890',
            'phone' => '1234567890',
            'address' => '123 Main St',
            'city' => 'City',
            'state' => 'State',
            'country' => 'Country',
            'avatar' => 'https://example.com/avatar.jpg',
        ]);
    }
}
