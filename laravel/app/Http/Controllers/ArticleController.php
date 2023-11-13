<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Models\Article;
use App\Models\ArticleCategory;

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
        // カテゴリー全件取得
        $categories = ArticleCategory::all();
        // 公開されている記事を新着順に、1ページ10記事まで（ページネーション）として、カテゴリー付きで取得
        $articles = Article::with('article_category')->where('is_public', '=', '1')->orderBy('created_at', 'desc')->paginate(10);
        // 新着記事一覧
        $new = Article::with('article_category')->where('is_public', '=', '1')->orderBy('created_at', 'desc')->paginate(10);
        // ピックアップ記事
        $slides = Article::with('article_category')->where([['is_public', '=', '1'], ['is_pickup', '=', '1'],])->get();
        // 検索機能
        $search = $request->input('search');
        $query = Article::query();
        if($search) {
          $spaceConversion = mb_convert_kana($search, 's');
          $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);
          foreach($wordArraySearched as $value) {
            // 記事のタイトルとコンテンツからキーワードの検索
            $query->where('title', 'like', '%'.$value.'%')->orWhere('body', 'like', '%'.$value.'%');
          }
          $articles = $query->where('is_public', '=', '1')->orderBy('created_at', 'desc')->paginate(10);
        }
        // カテゴリー機能
        $categoryId = $request->input('category');
        $categoryName = ArticleCategory::find($categoryId);
        if(isset($categoryId) && $categoryId !== '0') {
          $articles = $query->where('article_category_id', $categoryId)->where('is_public', '=', '1')
                        ->orderBy('created_at', 'desc')->paginate(10);
        }
        return view('articles.home', compact('articles', 'new', 'categoryName', 'slides', 'search', 'categories'));
    }

    /**
     * Display the specified resource.
     */
    public function article($id)
    {
        $article = Article::findOrFail($id);
        $category_id = $article->article_category_id;
        $categories = ArticleCategory::all();
        $new = Article::with('article_category')->where('is_public', '=', '1')->orderBy('created_at', 'desc')->paginate(10);
        $slides = Article::with('article_category')->where([['is_public', '=', '1'], ['is_pickup', '=', '1'],])->get();
        // 関連記事
        $related = Article::with('article_category')->where([['is_public', '=', '1'], ['id', '!=', $id], ['article_category_id', '=', $category_id]])->get();
        // 前の記事
        $prev = Article::with('article_category')->where([['is_public', '=', '1'], ['id', '<', $id],])->orderBy('id', 'desc')->first();
        // 次の記事
        $next = Article::with('article_category')->where([['is_public', '=', '1'], ['id', '>', $id],])->orderBy('id')->first();
        return view('articles.show', compact('article', 'new', 'slides', 'categories', 'related', 'prev', 'next'));
    }
}
