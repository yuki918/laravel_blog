<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ArticleCategory;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'thumbnail_path',
        'article_category_id',
        // 'admin_user_id',
        'is_pickup',
        'is_public',
    ];

    public function article_category()
    {
        return $this->belongsTo(ArticleCategory::class);
    }
}