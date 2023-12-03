<aside class="side">
  <div class="side__wrapper">
    <div class="side__item search">
      <h2 class="title">サイト内検索</h2>
      <form method="GET" action="{{ route('article.index') }}">
        <div class="wrap">
          <input type="search" placeholder="検索" name="search" value="@if (isset($search)) {{ $search }} @endif">
          <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" viewBox="5 5 14 14"><path fill="currentColor" d="m15.683 14.6 3.265 3.265a.2.2 0 0 1 0 .282l-.8.801a.2.2 0 0 1-.283 0l-3.266-3.265a5.961 5.961 0 1 1 1.084-1.084zm-4.727 1.233a4.877 4.877 0 1 0 0-9.754 4.877 4.877 0 0 0 0 9.754z"></path></svg></button>
        </div>
      </form>
    </div>
    <div class="side__item cat">
      <h2 class="title">カテゴリー</h2>
      @if(!$categories->isEmpty())
        <ul class="list">
          @foreach($categories as $item)
            <li class="item">
              <a href="/?category={{ $item->id }}">{{ $item->name }}</a>
            </li>
          @endforeach
        </ul>
      @else
        <p class="noFind">カテゴリーがありませんでした。</p>
      @endif
    </div>
    <div class="side__item new">
      <h2 class="title">新着記事</h2>
      @if(!$new->isEmpty())
        <ul class="list">
          @php $nmb = 1; @endphp
          @foreach($new as $article)
            @if ($nmb > 5)
              @php break; @endphp
            @else
              <li class="item">
                <a href="{{ route('article.article', $article->id) }}">
                  @php $article_thumbnail_path = (false !== strpos($article->thumbnail_path, 'http')) ? $article->thumbnail_path :env('APP_URL').'/storage/admin/'.$article->thumbnail_path; @endphp
                  <figure class="thumbnail"><img src="{{ $article_thumbnail_path }}" alt="{{ $article->title }}"></figure>
                  <div class="info">
                    <h3>{{ $article->title }}</h3>
                    <div class="time">
                      <p>
                        <span class="far fa-clock"></span>
                        <time>{{ $article->created_at->format('Y年m月d日') }}</time>
                      </p>
                      @if ($article->created_at != $article->updated_at)
                        <p>
                          <span class="fas fa-history"></span>
                          <time>2023年12月1日</time>
                        </p>
                      @endif
                    </div>
                  </div>
                </a>
              </li>
            @endif
            @php $nmb++; @endphp
          @endforeach
        </ul>
      @else
        <p class="noFind">記事がありませんでした。</p>
      @endif
    </div>
  </div>
</aside>