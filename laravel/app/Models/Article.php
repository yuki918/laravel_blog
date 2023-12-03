<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ArticleCategory;
use App\Models\Comment;
use App\Models\Like;
use App\Models\View;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'thumbnail_path',
        'article_category_id',
        // 'admin_user_id',
        'is_user',
        'is_pickup',
        'is_public',
    ];

    public function article_category()
    {
        return $this->belongsTo(ArticleCategory::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function like() {
        return $this->hasMany(Like::class);
    }
    public function isLikedBy($user): bool {
        return Like::where('user_id', $user->id)->where('article_id', $this->id)->first() !==null;
    }

    public function view()
    {
        return $this->hasMany(View::class);
    }
}