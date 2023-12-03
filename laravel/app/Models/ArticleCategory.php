<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;

class ArticleCategory extends Model
{
    use HasFactory;

    // テーブル名の指定
    protected $table = 'article_categories';

    protected $fillable = [
        'name',
    ];

    public function article()
    {
        return $this->hasMany(Article::class);
    }
}