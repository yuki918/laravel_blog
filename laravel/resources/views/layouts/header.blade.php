<header class="header">
  <div class="wrapper">
    <h1 class="header__logo"><a href="/">プログラミングブログ</a></h1>
    <nav class="gnav">
      <ul class="gnav__list">
        <li class="gnav__item">
          <a class="flowLink" href="/">
            <span class="en">HOME</span>
            <span class="ja">ホーム</span>
          </a>
        </li>
        @if (Auth::check())
          <li class="gnav__item">
            <a class="flowLink" href="/dashboard/">
              <span class="en">MYPAGE</span>
              <span class="ja">マイページ</span>
            </a>
          </li>
          <li class="gnav__item">
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <a class="flowLink" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                <span class="en">LOGOUT</span>
                <span class="ja">ログアウト</span>
              </a>
            </form>
          </li>
        @else
          <li class="gnav__item">
            <a class="flowLink" href="/register/">
              <span class="en">REGISTER</span>
              <span class="ja">会員登録</span>
            </a>
          </li>
          <li class="gnav__item">
            <a class="flowLink" href="/login/">
              <span class="en">LOGIN</span>
              <span class="ja">ログイン</span>
            </a>
          </li>
        @endif
        <li class="gnav__item">
          <a class="flowLink" href="/contact/">
            <span class="en">CONTACT</span>
            <span class="ja">お問い合わせ</span>
          </a>
        </li>
        <li class="gnav__item search">
          <form method="GET" action="{{ route('article.index') }}">
            <div class="wrap">
              <input type="search" placeholder="検索" name="search" value="@if (isset($search)) {{ $search }} @endif">
              <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" viewBox="5 5 14 14"><path fill="currentColor" d="m15.683 14.6 3.265 3.265a.2.2 0 0 1 0 .282l-.8.801a.2.2 0 0 1-.283 0l-3.266-3.265a5.961 5.961 0 1 1 1.084-1.084zm-4.727 1.233a4.877 4.877 0 1 0 0-9.754 4.877 4.877 0 0 0 0 9.754z"></path></svg></button>
            </div>
          </form>
        </li>
      </ul>
    </nav>
    <div class="header__btn">
      <div class="mark">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
      </div>
      <span class="menu">MENU</span>
      <span class="close">CLOSE</span>
    </div>
  </div>
</header>