<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\ArticleCategory;

class ArticleCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ArticleCategory::create(
        //     [
        //         "name" => "未分類",
        //     ],
        // );
        DB::table('article_categories')->insert([
            [
                'name' => '未分類',
            ],
            [
                'name' => 'プログラミング',
            ],
        ]);
    }
}
