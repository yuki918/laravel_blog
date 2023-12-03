{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex justify-end mt-4">
            <x-primary-button>
                {{ __('Confirm') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

@extends('layouts.base')

@section('title')
  <title>パスワードの確認 | {{ config('app.name', 'Laravel') }}</title>
@endsection

@section('main')
  <main class="main">
    <div class="mv under"></div>
    <div class="container">
      <div class="wrapper">
        <div class="content">
          <div class="commonContent commonForm">
            <h1 class="titleType01">パスワードの確認</h1>
            <div class="mb-4 text-sm text-gray-600">
                {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
            </div>
            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf
                <div class="list">
                  <!-- Password -->
                  <div class="item">
                      <x-input-label for="password" :value="__('Password')" />
          
                      <x-text-input id="password" class="block mt-1 w-full"
                                      type="password"
                                      name="password"
                                      required autocomplete="current-password" />
          
                      <x-input-error :messages="$errors->get('password')" class="mt-2" />
                  </div>
                </div>
                <div class="buttonType01_wrap">
                  <button type="submit" class="buttonType01">ログイン</button>
                </div>
            </form>
          </div>
        </div>
        @include('layouts.aside', ['categories' => $categories, 'new' => $new])
      </div>
    </div>
  </main>
@endsection