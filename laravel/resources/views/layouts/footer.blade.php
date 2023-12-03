<footer class="footer">
  <div class="wrapper">
    <p class="footer__logo"><a href="/">{{ config('app.name') }}</a></p>
    <div class="footer__info">
      <ul class="list">
        <li class="item"><a href="/">ホーム</a></li>
        <li class="item"><a href="/contact/">お問い合わせ</a></li>
      </ul>
      <p class="copy">Copyright @php echo date("Y"); @endphp {{ config('app.name') }}</p>
    </div>
  </div>
</footer>