<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        \App\Models\User::factory(10)->create();
        \App\Models\Article::factory(20)->create();


        DB::table('users')->insert([
            'name' => 'ian',
            'email' => 'ianfadly24@gmail.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('categories')->insert([
            'name' => 'Coding',
            'created_at' => fake()->date(),
            'updated_at' => fake()->date(),
        ]);
        DB::table('categories')->insert([
            'name' => 'Study',
            'created_at' => fake()->date(),
            'updated_at' => fake()->date(),
        ]);
        DB::table('categories')->insert([
            'name' => 'English',
            'created_at' => fake()->date(),
            'updated_at' => fake()->date(),
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
