<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Comment;
use App\Models\View;
use App\Models\Like;

class ArticleController extends Controller
{

    public function __construct()
    {
        // 非公開の記事の場合は、404ページにリダイレクト
        $this->middleware(function($request, $next) {
            $id = $request->route()->parameter('item');
            if(!is_null($id)) {
                $public = Article::find($id)->is_public;
                if($public == 0) abort(404);
            }
            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = ArticleCategory::all();
        $articles = Article::with('article_category')->withCount('like')->where('is_public', '=', '1')->orderBy('created_at', 'desc')->paginate(10);
        $param = [ 'articles' => $articles, ];
        $new = Article::with('article_category')->where('is_public', '=', '1')->orderBy('created_at', 'desc')->paginate(10);
        $slides = Article::with('article_category')->where([['is_public', '=', '1'], ['is_pickup', '=', '1'],])->get();
        $search = $request->input('search');
        $query = Article::query();
        if($search) {
          $spaceConversion = mb_convert_kana($search, 's');
          $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);
          foreach($wordArraySearched as $value) {
            $query->where('title', 'like', '%'.$value.'%')->orWhere('body', 'like', '%'.$value.'%');
          }
          $articles = $query->where('is_public', '=', '1')->orderBy('created_at', 'desc')->paginate(10);
        }
        $categoryId = $request->input('category');
        $categoryName = ArticleCategory::find($categoryId);
        if(isset($categoryId) && $categoryId !== '0') {
          $articles = $query->where('article_category_id', $categoryId)->where('is_public', '=', '1')
                        ->orderBy('created_at', 'desc')->paginate(10);
        }
        return view('articles.home', compact('articles', 'param', 'new', 'categoryName', 'slides', 'search', 'categories'));
    }

    /**
     * Display the specified resource.
     */
    public function article($id, Request $request)
    {
        $user = $request->user();
        View::create([
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'article_id' => $id,
            'user_id'    => $user?->id
        ]);
        $article = Article::findOrFail($id);
        $category_id = $article->article_category_id;
        $categories = ArticleCategory::all();
        $new = Article::with('article_category')->where('is_public', '=', '1')->orderBy('created_at', 'desc')->paginate(10);
        $slides = Article::with('article_category')->where([['is_public', '=', '1'], ['is_pickup', '=', '1'],])->get();
        $related = Article::with('article_category')->where([['is_public', '=', '1'], ['id', '!=', $id], ['article_category_id', '=', $category_id]])->get();
        $prev = Article::with('article_category')->where([['is_public', '=', '1'], ['id', '<', $id],])->orderBy('id', 'desc')->first();
        $next = Article::with('article_category')->where([['is_public', '=', '1'], ['id', '>', $id],])->orderBy('id')->first();
        $comment = Comment::where('article_id', '=', $id)->get();
        return view('articles.show', compact('article', 'new', 'slides', 'categories', 'related', 'prev', 'next', 'comment'));
    }

    public function store(Request $request)
    {
        $comment = Comment::create([
            'name' => $request->name,
            'content' => $request->content,
            'article_id' => $request->article_id,
            'user_id' => $request->user_id,
        ]);
        return back();
    }

    public function like(Request $request)
    {
        $user_id = Auth::user()->id;
        $article_id = $request->article_id;
        $already_liked = Like::where('user_id', $user_id)->where('article_id', $article_id)->first();

        if(!$already_liked) {
            Like::create([
                'article_id' => $article_id,
                'user_id' => $user_id,
            ]);
        } else {
            Like::where('user_id', $user_id)->where('article_id', $article_id)->delete();
        }
    }
}
