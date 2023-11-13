<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');  // タイトル
            $table->text('body'); // 内容
            $table->string('thumbnail_path'); // サムネイル
            $table->foreignId('article_category_id')->constrained(); // カテゴリーID
            // $table->unsignedBigInteger('admin_user_id');
            // $table->foreign('admin_user_id')->references('id')->on('admin_users');
            // $table->foreignId('admin_user_id')->constrained('admin_users'); // 記事を書いたユーザーのID
            $table->boolean('is_pickup'); // ピックアップ記事
            $table->boolean('is_public'); // 公開か非公開
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
