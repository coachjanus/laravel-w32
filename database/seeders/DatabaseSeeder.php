<?php

namespace Database\Seeders;

use App\Models\{User, Category, Post, Tag, Brand, Product};
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(20)->create();
        // Tag::factory(20)->create();
        // Category::factory(20)->create();
        // Post::factory(20)->create();
        // Brand::factory(20)->create();
        Product::factory(50)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // $this->call([
        //     BrandSeeder::class
        // ]);
    }
}
