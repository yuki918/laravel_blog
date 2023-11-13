@extends('layouts.base')

@section('title')
  <title>お問い合わせ【確認画面】 | {{ config('app.name', 'Laravel') }}</title>
@endsection

@section('main')
  <div id="content" class="content">
    <div id="content-in" class="content-in wrap mt-4">
      <main id="main" class="main">
        <h3 class="font-bold text-2xl mb-4">お問い合わせ【確認画面】</h3>
        <p class="text-center mt-4">お問い合わせが完了いたしました。<br>自動返信メールを送信しております。<br>今しばらくお待ちください。</p>
        <a href="/" class="block m-auto mt-4 text-center text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg w-40">トップへ</a>
      </main>
      @include('layouts.aside', ['categories' => $categories, 'new' => $new])
    </div>
  </div>
@endsection