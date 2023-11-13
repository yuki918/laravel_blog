<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
      <meta name="referrer" content="no-referrer-when-downgrade">
      <meta name="format-detection" content="telephone=no">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      @yield('title')
      <!-- Fonts -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
      <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" media="all">
      <link rel="stylesheet" href="{{ asset('assets/css/keyframes.css') }}" media="all">
      <link rel="stylesheet" href="{{ asset('assets/css/color.css') }}" media="all">
      <link rel="stylesheet" href="{{ asset('assets/css/child.css') }}" media="all">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.3/swiper-bundle.min.css" integrity="sha512-HajDJcB2lLZX5Ap4mVymNO6VLqj7mXIOEwEhugvcIPPdNLhTzY/fF2MhhATfWkS7NsOR/Bd4R1ztgNOy/9ID4A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      @vite('resources/css/app.css')
      <link rel="stylesheet" href="{{ asset('assets/css/app-8804f4b8.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/css/base.css') }}">
    </head>
    <body class="font-sans antialiased body">
        <div class="container" id="container">
            @include('layouts.header')
            @yield('main')
            @include('layouts.footer')
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js?ver=3.6.1" id="jquery-core-js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.3.2/jquery-migrate.min.js?ver=3.0.1" id="jquery-migrate-js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.3/swiper-bundle.min.js" integrity="sha512-ILrDRgEiIojcsKyBy12ZU7MtOf78F2fj3vve/AN5i94iXLQ8PZN7IJYPphmAGdwZmTv4N+OzY3trvqGIEY87VA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://kit.fontawesome.com/c639747bba.js" crossorigin="anonymous"></script>
        <script defer src='https://stats.wp.com/e-202343.js' id='jetpack-stats-js'></script>
        <script defer src='{{ asset('assets/js/javascript.js') }}'></script>
        <script defer src='{{ asset('assets/js/base.js') }}'></script>
      </body>
</html>
