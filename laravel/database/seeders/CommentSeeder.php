<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('comments')->insert([
            'name' => '名無しのごんべい',
            'content' => 'この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。',
            'article_id' => 1,
            'user_id' => 1,
            "created_at" => "2023/11/11 11:11:11",
            "created_at" => "2023/11/11 11:11:11",
        ]);
    }
}
