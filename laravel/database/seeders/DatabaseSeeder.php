<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AdminTablesSeeder::class);
        $this->call(ArticleCategorySeeder::class);
        Article::factory(50)->create();
        $this->call(UserSeeder::class);
        $this->call(CommentSeeder::class);
    }
}
