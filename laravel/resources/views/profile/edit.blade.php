{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}

@extends('layouts.base')

@section('title')
  <title>アカウント情報 | マイページ | {{ config('app.name', 'Laravel') }}</title>
@endsection

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