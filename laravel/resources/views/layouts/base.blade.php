<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ asset('assets/css/destyle.css') }}" media="all">
        <link rel="stylesheet" href="{{ asset('assets/css/base.css') }}" media="all">
        @vite(['resources/js/app.js'])
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">

        @php $page_url   = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; @endphp
        @hasSection('title')
          <title>@yield('title') | {{ config('app.name') }}</title>
          <meta name="description" content="@yield('title') | 目標に向けて自己成長をするためのブログです。">
          <meta property="og:title" content="@yield('title') | {{ config('app.name') }}" />
          <meta property="og:description" content="@yield('title') | 目標に向けて自己成長をするためのブログです。" />
        @else
          <title>{{ config('app.name') }}</title>
          <meta name="description" content="目標に向けて自己成長をするためのブログです。">
          <meta property="og:title" content="{{ config('app.name') }}" />
          <meta property="og:description" content="目標に向けて自己成長をするためのブログです。" />
        @endif
        <link rel="canonical" href="{{ $page_url }}">
        <meta property="og:type" content="website" />
        <meta property="og:url" content="{{ $page_url }}" />
        <meta property="og:image" content="{{ asset('assets/img/ogp.png') }}" />
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:image" content="{{ asset('assets/img/ogp.png') }}">
    </head>
    <body>
        <div id="wrapper">
            @include('layouts.header')
            @yield('main')
            @include('layouts.footer')
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" defer></script>
        <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
        <script src="https://kit.fontawesome.com/c639747bba.js" crossorigin="anonymous" defer></script>
        <script src="{{ asset('assets/js/base.js') }}" defer></script>
    </body>
</html>
