@extends('layouts.base')

@section('title')
  <title>お問い合わせ【確認画面】 | {{ config('app.name', 'Laravel') }}</title>
@endsection

@section('main')
  <div id="content" class="content">
    <div id="content-in" class="content-in wrap mt-4">
      <main id="main" class="main">
        <form method="POST" action="{{ route('contact.thanks') }}">
          @csrf
          <div class="bg-white flex flex-col md:ml-auto w-full">
            <h3 class="font-bold text-2xl mb-4">お問い合わせ【確認画面】</h3>
            <div class="relative mb-4">
              <label for="name" class="leading-7 text-sm text-gray-600">お名前</label>
              <div class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $data['name'] }}</div>
              <input type="hidden" id="name" name="name" value="{{ $data['name'] }}">
            </div>
            <div class="relative mb-4">
              <label for="email" class="leading-7 text-sm text-gray-600">メールアドレス</label>
              <div class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $data['email'] }}</div>
              <input type="hidden" id="email" name="email" value="{{ $data['email'] }}">
            </div>
            <div class="relative mb-4">
              <label for="content" class="leading-7 text-sm text-gray-600">お問い合わせ内容</label>
              <div class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $data['content'] }}</div>
              <input type="hidden" id="content" name="content" value="{{ $data['content'] }}">
            </div>
            <div class="flex gap-4 justify-center mt-8">
              <button type="submit" name="action" value="back" class="text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded text-lg w-40">修正</button>
              <button type="submit" name="action" value="submit" class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg w-40">送信</button>
            </div>
          </div>
        </form>
      </main>
      @include('layouts.aside', ['categories' => $categories, 'new' => $new])
    </div>
  </div>
@endsection