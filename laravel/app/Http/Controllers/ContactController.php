<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactRequest;
use App\Mail\ContactAdminMail;
use App\Mail\ContactUserMail;
use App\Models\Contact;
use App\Models\Article;
use App\Models\ArticleCategory;

class ContactController extends Controller
{
    public function index()
    {
      $new = Article::with('article_category')->where('is_public', '=', '1')->orderBy('created_at', 'desc')->paginate(10);
      $categories = ArticleCategory::all();
      return view('contact.index', compact('new', 'categories'));
    }

    public function confirm(ContactRequest $request)
    {
        $new = Article::with('article_category')->where('is_public', '=', '1')->orderBy('created_at', 'desc')->paginate(10);
        $categories = ArticleCategory::all();
        $data = $request->validated();
        return view('contact.confirm', compact('data', 'new', 'categories'));
    }

    public function thanks(ContactRequest $request)
    {
        $new = Article::with('article_category')->where('is_public', '=', '1')->orderBy('created_at', 'desc')->paginate(10);
        $categories = ArticleCategory::all();

        $data   = $request->validated();
        // 戻るボタンと送信ボタンを取得
        $action = $request->input('action');

        // 戻るボタンの場合は、データを渡す
        if($action == 'back') {
            return redirect()->route('contact.index')->withInput($data);
        } elseif($action == 'submit') {
            // 管理者とユーザーへの自動返信メールの送信
            Mail::send(new ContactAdminMail($data));
            Mail::send(new ContactUserMail($data));
            // データベースへ保存
            $contact = new Contact();
            $contact->name    = $data['name'];
            $contact->email   = $data['email'];
            $contact->content = $data['content'];
            $contact->save();
            //再送信を防ぐためにトークンを再発行
            $request->session()->regenerateToken();
            return view('contact.thanks', compact('new', 'categories'));
        }
    }
}