<div id="sidebar" class="sidebar">
  <aside class="widget widget-search">
    <h3 class="font-bold text-xl">サイト内検索</h3>
    <div class="textwidget custom-html-widget">
      <form method="GET" action="{{ route('article.index') }}">
        <div class="flex gap-4 searchbox">
          <input type="search" placeholder="サイト内を検索" class="p-3" name="search" value="@if (isset($search)) {{ $search }} @endif">
          <button class="bg-blue-900 hover:bg-blue-800 text-white rounded px-4 py-2 nowrap" type="submit">検索</button>
        </div>
      </form>
    </div>
  </aside>
  <aside id="categories-2" class="widget widget-sidebar widget-sidebar-standard widget_categories">
    <h3 class="font-bold text-xl">カテゴリー</h3>
    @if(!$categories->isEmpty())
      <ul>
        @foreach($categories as $item)
          <li class="cat-item">
            <a href="/?category={{ $item->id }}">
              <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 256 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M246.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-9.2-9.2-22.9-11.9-34.9-6.9s-19.8 16.6-19.8 29.6l0 256c0 12.9 7.8 24.6 19.8 29.6s25.7 2.2 34.9-6.9l128-128z"/></svg>
              <span>{{ $item->name }}</span>
            </a>
          </li>
        @endforeach
      </ul>
    @else
      <p>カテゴリーがありませんでした。</p>
    @endif
  </aside>
  <div id="sidebar-scroll" class="sidebar-scroll" style="padding-top: 0px;">
    <aside id="new_entries-2" class="widget widget-sidebar widget-sidebar-standard widget_new_entries">
      <h3 class="font-bold text-xl">新着記事一覧</h3>
      <div class="new-entry-cards widget-entry-cards no-icon cf">
        @php $nmb = 1; @endphp
        @foreach($new as $article)
          @if ($nmb > 5)
            @php break; @endphp
          @else
            <a href="{{ route('article.article', $article->id) }}" class="new-entry-card-link widget-entry-card-link a-wrap" title="{{ $article->title }}">
              <div class="post-12281 new-entry-card widget-entry-card e-card cf post type-post status-publish format-standard has-post-thumbnail hentry category-theme-customs-post">
                <figure class="new-entry-card-thumb widget-entry-card-thumb card-thumb">
                  @php
                      $article_thumbnail_path = (false !== strpos($article->thumbnail_path, 'http')) ? $article->thumbnail_path :env('APP_URL').'/storage/admin/'.$article->thumbnail_path;
                  @endphp
                  <img src="{{ $article_thumbnail_path }}" class="attachment-thumb120 size-thumb120 wp-post-image">
                </figure>
                <div class="new-entry-card-content widget-entry-card-content card-content">
                  <div class="new-entry-card-title widget-entry-card-title card-title">{{ $article->title }}</div>
                  <div class="new-entry-card-date widget-entry-card-date">
                    <span class="new-entry-card-post-date widget-entry-card-post-date post-date">{{ $article->created_at->format('Y年m月d日') }}</span>
                    @if ($article->created_at != $article->updated_at)
                      <span class="new-entry-card-update-date widget-entry-card-update-date post-update">{{ $article->updated_at->format('Y年m月d日') }}</span>
                    @endif
                  </div>
                </div>
              </div>
            </a>
          @endif
          @php $nmb++; @endphp
        @endforeach
      </div>
    </aside>
  </div>
</div>