<footer id="footer" class="footer footer-container nwa" itemscope="" itemtype="https://schema.org/WPFooter">
  <div id="footer-in" class="footer-in wrap cf item-center">
    <div class="footer-bottom fdt-logo fnm-text-width cf">
      <div class="footer-bottom-logo">
      <div class="logo logo-footer logo-image">
        <a href="/" class="site-name site-name-text-link" itemprop="url">
          <span class="site-name-text">
            <span class="site-name-text font-bold">{{ config('app.name', 'Laravel') }}</span>
          </span>
        </a>
      </div>
    </div>
    <div class="footer-bottom-content">
      <nav id="navi-footer" class="navi-footer">
        <div id="navi-footer-in" class="navi-footer-in">
          <ul id="menu-%e3%83%95%e3%83%83%e3%82%bf%e3%83%bc%e3%83%a1%e3%83%8b%e3%83%a5%e3%83%bc" class="menu-footer">
            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-31132"><a href="/">ホーム</a></li>
            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-34567"><a href="/contact/">お問い合わせ</a></li>
          </ul>
        </div>
      </nav>
      <div class="source-org copyright">Copyright 2022 {{ config('app.name', 'Laravel') }}</div>
    </div>
  </div>
</footer>

<ul class="mobile-header-menu-buttons mobile-menu-buttons has-logo-button" style="top: 0px; z-index: 3;">
  <!-- メニューボタン -->
  <li class="navi-menu-button menu-button">
    <input id="navi-menu-input" type="checkbox" class="display-none">
    <label id="navi-menu-open" class="menu-open menu-button-in" for="navi-menu-input">
      <span class="navi-menu-icon menu-icon">
        <span class="fas fa-bars" aria-hidden="true"></span>
      </span>
      <span class="navi-menu-caption menu-caption">メニュー</span>
    </label>
    <label class="display-none" id="navi-menu-close" for="navi-menu-input"></label>
    <div id="navi-menu-content" class="navi-menu-content menu-content">
      <label class="navi-menu-close-button menu-close-button" for="navi-menu-input"><span class="fas fa-times" aria-hidden="true"></span></label>
      <ul class="menu-drawer">
        <li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-119"><a href="/" aria-current="page">ホーム</a></li>
        <li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-119"><a href="/contact/" aria-current="page">お問い合わせ</a></li>
      </ul>
    </div>
  </li>

  <!-- ロゴボタン -->
  <li class="logo-menu-button menu-button pt-0 flex items-center justify-center">
    <a href="/" class="menu-button-in"><span class="text-lg font-bold">{{ config('app.name', 'Laravel') }}</span></a>
  </li>

  <!-- 検索ボタン -->
  <li class="search-menu-button menu-button">
    <input id="search-menu-input" type="checkbox" class="display-none">
    <label id="search-menu-open" class="menu-open menu-button-in" for="search-menu-input">
      <span class="search-menu-icon menu-icon">
        <span class="fas fa-search" aria-hidden="true"></span>
      </span>
      <span class="search-menu-caption menu-caption">検索</span>
    </label>
    <label class="display-none" id="search-menu-close" for="search-menu-input"></label>
    <div id="search-menu-content" class="search-menu-content">
      <form method="GET" action="{{ route('article.index') }}">
        @csrf
        <div class="flex gap-4">
          <input type="search" placeholder="サイト内を検索" name="search" class="search-edit" aria-label="input" value="">
          <button type="submit" class="search-submit" aria-label="button"><span class="fas fa-search" aria-hidden="true"></span></button>
        </div>
      </form>
    </div>
  </li>
</ul>
<div id="go-to-top" class="go-to-top" style="display: block;">
  <button class="go-to-top-button go-to-top-common go-to-top-hide go-to-top-button-icon-font" aria-label="トップへ戻る"><span class="fas fa-angle-double-up"></span></button>
</div>