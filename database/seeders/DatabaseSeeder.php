<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Flower;
use App\Models\Image;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::factory(10)->create();

        $tags = Tag::factory(40)->create();

        $flowers = Flower::factory(200)->create();

        Image::factory(1000)->create();

        foreach ($flowers as $flower){
            $tagsId = $tags->random(5)->pluck('id');
            $flower->tags()->attach($tagsId);
        }
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
