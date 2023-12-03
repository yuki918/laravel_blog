@extends('layouts.base')

@section('title', 'お問い合わせ')

@section('main')
  <main class="main">
    <div class="mv under">
      <h1 class="mv__title">
        <p class="sub">お問い合わせ</p>
      </h1>
    </div>
    <div class="container">
      <div class="wrapper">
        <div class="content">
          <div class="commonContent commonForm">
            <p class="titleType01">お問い合わせ</p>
            <form method="POST" action="{{ route('contact.confirm') }}">
              @csrf
              <ul class="list">
                <li class="item">
                  <label for="name">お名前</label>
                  <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                  @if ($errors->has('name')) <p class="error-message">{{ $errors->first('name') }}</p> @endif
                </li>
                <li class="item">
                  <label for="email">メールアドレス</label>
                  <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                  @if ($errors->has('email')) <p class="error-message">{{ $errors->first('email') }}</p> @endif
                </li>
                <li class="item">
                  <label for="content">お問い合わせ内容</label>
                  <textarea id="content" name="content" required>{{ old('content') }}</textarea>
                  @if ($errors->has('content')) <p class="error-message">{{ $errors->first('content') }}</p> @endif
                </li>
              </ul>
              <div class="buttons">
                <button type="submit" class="submit button">確認する</button>
              </div>
            </form>
          </div>
        </div>
        @include('layouts.aside', ['categories' => $categories, 'new' => $new])
      </div>
    </div>
  </main>
@endsection