@extends('layouts.base')

@section('title')
  <title>{{ config('app.name', 'Laravel') }}</title>
@endsection

@section('main')
  <div id="content" class="content">
    @include('layouts.pickup', ['slides' => $slides])
    <div id="content-in" class="content-in wrap mt-4">
      <main id="main" class="main">
        @if (isset($search))
          <h3 class="font-bold text-xl mb-4">検索結果：{{ $search }}</h3>
        @endif
        @if (isset($categoryName))
          <h3 class="font-bold text-xl mb-4">カテゴリー：{{ $categoryName->name }}</h3>
        @endif
        <div id="list" class="list ect-entry-card front-page-type-index">
          @if (!$articles->isEmpty())
            @foreach($articles as $article)
              <a href="{{ route('article.article', $article->id) }}" class="entry-card-wrap a-wrap border-element">
                <article id="post-30191" class="post-30191 entry-card e-card cf post type-post status-publish format-standard has-post-thumbnail hentry category-singular-page-post">
                  <figure class="entry-card-thumb card-thumb e-card-thumb">
                    @php
                        $article_thumbnail_path = (false !== strpos($article->thumbnail_path, 'http')) ? $article->thumbnail_path :env('APP_URL').'/storage/admin/'.$article->thumbnail_path;
                    @endphp
                    <img src="{{ $article_thumbnail_path }}">
                    <span class="cat-label cat-label-36">{{ $article->article_category->name }}</span>
                  </figure>
                  <div class="entry-card-content card-content e-card-content">
                    <h2 class="entry-card-title card-title e-card-title">{{ $article->title }}</h2>
                    <div class="entry-card-snippet card-snippet e-card-snippet">
                      @php echo $article->body; @endphp
                    </div>
                    <div class="entry-card-meta card-meta e-card-meta">
                      <div class="entry-card-info e-card-info">
                        <span class="post-date">
                          <span class="far fa-clock" aria-hidden="true"></span>
                          <span class="entry-date">{{ $article->created_at->format('Y年m月d日') }}</span>
                        </span>
                        @if ($article->created_at != $article->updated_at)
                          <span class="post-update">
                            <span class="fas fa-history" aria-hidden="true"></span>
                            <span class="entry-date">{{ $article->updated_at->format('Y年m月d日') }}</span>
                          </span>
                        @endif
                      </div>
                      <div class="entry-card-categorys e-card-categorys"><span class="entry-category">{{ $article->article_category->name }}</span></div>
                    </div>
                  </div>
                </article>
              </a>
            @endforeach
          @else
            <p class="font-bold text-center mt-10">記事が見つかりませんでした。</p>
          @endif
        </div>
        {{ $articles->appends(request()->input())->links() }}
      </main>
      @include('layouts.aside', ['categories' => $categories, 'new' => $new])
    </div>
  </div>
@endsection