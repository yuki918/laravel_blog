@extends('layouts.base')

@section('title')
  <title>お問い合わせ【確認】 | {{ config('app.name', 'Laravel') }}</title>
@endsection

@section('main')
  <main class="main">
    <div class="mv under">
      <h1 class="mv__title">
        <p class="sub">お問い合わせ【確認】</p>
      </h1>
    </div>
    <div class="container">
      <div class="wrapper">
        <div class="content">
          <div class="commonContent commonForm">
            <p class="titleType01">お問い合わせ【確認】</p>
            <form method="POST" action="{{ route('contact.thanks') }}">
              @csrf
              <ul class="list">
                <li class="item">
                  <label for="name">お名前</label>
                  <div class="answer">{{ $data['name'] }}</div>
                  <input type="hidden" id="name" name="name" value="{{ $data['name'] }}">
                </li>
                <li class="item">
                  <label for="email">メールアドレス</label>
                  <div class="answer">{{ $data['email'] }}</div>
                  <input type="hidden" id="email" name="email" value="{{ $data['email'] }}">
                </li>
                <li class="item">
                  <label for="content">お問い合わせ内容</label>
                  <div class="answer">{{ $data['content'] }}</div>
                  <input type="hidden" id="content" name="content" value="{{ $data['content'] }}">
                </li>
              </ul>
              <div class="buttons">
                <button type="submit" name="action" value="back" class="back button">修正する</button>
                <button type="submit" name="action" value="submit" class="submit button">送信する</button>
              </div>
            </form>
          </div>
        </div>
        @include('layouts.aside', ['categories' => $categories, 'new' => $new])
      </div>
    </div>
  </main>
@endsection