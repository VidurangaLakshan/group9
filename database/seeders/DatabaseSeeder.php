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
         \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'name' => 'Administrator',
             'email' => 'admin@blog.apiit.lk',
             'password' => bcrypt('admin'),
             'role' => 1,
             'approved'=> 1,
             'newUserPersonalized' => 1,
         ]);

        \App\Models\User::factory()->create([
            'name' => 'Editor',
            'email' => 'editor@blog.apiit.lk',
            'password' => bcrypt('editor'),
            'role' => 2,
            'approved'=> 1,
            'newUserPersonalized' => 1,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Alumni Liaison and Industry Relations',
            'email' => 'alumni@blog.apiit.lk',
            'password' => bcrypt('alumni'),
            'role' => 4,
            'approved'=> 1,
            'newUserPersonalized' => 1,
        ]);

        \App\Models\Category::factory()->create([
            'title' => 'hello world',
            'slug' => 'hello-world',
        ]);
    }
}
