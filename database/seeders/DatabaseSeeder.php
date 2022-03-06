<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(3)->create();
        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'

        ]);

        Category::create([
            'name' => 'Design',
            'slug' => 'Design'

        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'Personal',
        ]);


        Post::factory(20)->create();
    }
}
