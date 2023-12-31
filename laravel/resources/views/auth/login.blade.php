@extends('layouts.base')

@section('title', 'ログイン')

@section('main')
  <main class="main">
    <div class="mv under"></div>
    <div class="container">
      <div class="wrapper">
        <div class="content">
          <div class="commonContent commonForm">
            <h1 class="titleType01">ログイン</h1>
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="list">
                  <!-- Email Address -->
                  <div class="item">
                      <x-input-label for="email" :value="__('Email')" />
                      <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                      <x-input-error :messages="$errors->get('email')" class="mt-2" />
                  </div>
                  <!-- Password -->
                  <div class="item">
                      <x-input-label for="password" :value="__('Password')" />
  
                      <x-text-input id="password" class="block mt-1 w-full"
                                      type="password"
                                      name="password"
                                      required autocomplete="current-password" />
  
                      <x-input-error :messages="$errors->get('password')" class="mt-2" />
                  </div>
                  <!-- Remember Me -->
                  <div class="item">
                      <label for="remember_me" class="inline-flex items-center">
                          <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                          <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                      </label>
                  </div>
                </div>

                <div class="buttonType01_wrap">
                    <a class="buttonType01 back" href="{{ route('password.request') }}">パスワード再発行</a>
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
