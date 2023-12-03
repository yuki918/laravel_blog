@extends('layouts.base')

@section('title')
  <title>お問い合わせ【完了】 | {{ config('app.name', 'Laravel') }}</title>
@endsection

@section('main')
  <main class="main">
    <div class="mv under">
      <h1 class="mv__title">
        <p class="sub">お問い合わせ【完了】</p>
      </h1>
    </div>
    <div class="container">
      <div class="wrapper">
        <div class="content">
          <div class="commonContent commonForm">
            <p class="titleType01">お問い合わせ【完了】</p>
            <div class="thanks">
              <p>お問い合わせが完了いたしました。<br>自動返信メールを送信しております。<br>今しばらくお待ちください。</p>
            </div>
            <div class="buttons">
              <a href="/" class="button">ホームへ</a>
            </div>
          </div>
        </div>
        @include('layouts.aside', ['categories' => $categories, 'new' => $new])
      </div>
    </div>
  </main>
@endsection