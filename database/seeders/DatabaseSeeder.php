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
             'email' => 'admin@admin.com',
             'password' => bcrypt('admin'),
         ]);

        \App\Models\Category::factory()->create([
            'title' => 'hello world',
            'slug' => 'hello-world',
        ]);
    }
}
