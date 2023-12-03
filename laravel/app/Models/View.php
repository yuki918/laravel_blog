<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;

class View extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip_address',
        'user_agent',
        'article_id',
        'user_id'
    ];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
