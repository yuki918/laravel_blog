@extends('layouts.base')

@section('title', 'アカウント情報 | マイページ')

@section('main')
  <main class="main">
    <div class="mv under">
      <h1 class="mv__title">
        <p class="sub">マイページ</p>
        <p>アカウント情報</p>
      </h1>
    </div>
    <div class="container acount-info">
      <div class="wrapper">
        <div class="content">
          <div class="mypage-list">
            <ul class="list">
              <li class="item"><a href="/dashboard/">お気に入りの<br class="sp">記事一覧</a></li>
              <li class="item"><a href="/comment/">コメントした<br class="sp">記事一覧</a></li>
              <li class="item"><a href="/profile/">アカウント情報</a></li>
            </ul>
          </div>
          <div class="commonForm">
            <div class="commonContent">
              @include('profile.partials.update-profile-information-form')
            </div>

            <div class="commonContent">
              @include('profile.partials.update-password-form')
            </div>

            <div class="commonContent">
              @include('profile.partials.delete-user-form')
            </div>
          </div>
        </div>
        @include('layouts.aside', ['categories' => $categories, 'new' => $new])
      </div>
    </div>
  </main>
@endsection