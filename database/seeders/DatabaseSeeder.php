<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Click Ideia',
            'username' => $_ENV["USER_LOGIN"],
            'email' => 'clickideia@mail.com',
            'password' => $_ENV["USER_PASSWORD"]
        ]);
    }
}
