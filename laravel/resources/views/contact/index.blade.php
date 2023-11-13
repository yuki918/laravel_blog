@extends('layouts.base')

@section('title')
  <title>お問い合わせ | {{ config('app.name', 'Laravel') }}</title>
@endsection

@section('main')
  <div id="content" class="content">
    <div id="content-in" class="content-in wrap mt-4">
      <main id="main" class="main">
        <form method="POST" action="{{ route('contact.confirm') }}">
          @csrf
          <div class="bg-white flex flex-col md:ml-auto w-full">
            <h3 class="font-bold text-2xl mb-4">お問い合わせ</h3>
            <p class="leading-relaxed mb-5 text-red-600 font-bold">※全て必須項目です。</p>
            <div class="relative mb-4">
              <label for="name" class="leading-7 text-sm text-gray-600">お名前</label>
              <input type="text" id="name" name="name" value="{{ old('name') }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              @if ($errors->has('name')) <p class="error-message text-red-600 font-bold text-sm">{{ $errors->first('name') }}</p> @endif
            </div>
            <div class="relative mb-4">
              <label for="email" class="leading-7 text-sm text-gray-600">メールアドレス</label>
              <input type="email" id="email" name="email" value="{{ old('email') }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              @if ($errors->has('email')) <p class="error-message text-red-600 font-bold text-sm">{{ $errors->first('email') }}</p> @endif
            </div>
            <div class="relative mb-4">
              <label for="content" class="leading-7 text-sm text-gray-600">お問い合わせ内容</label>
              <textarea id="content" name="content" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-40 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{ old('content') }}</textarea>
              @if ($errors->has('content')) <p class="error-message text-red-600 font-bold text-sm">{{ $errors->first('content') }}</p> @endif
            </div>
            <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg w-40 m-auto mt-8">確認画面へ</button>
          </div>
        </form>
      </main>
      @include('layouts.aside', ['categories' => $categories, 'new' => $new])
    </div>
  </div>
@endsection