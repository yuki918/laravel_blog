@if(!$slides->isEmpty())
  <div id="carousel" class="carousel loaded">
    <div id="carousel-in" class="carousel-in wrap">
      <div class="carousel-content pickup__slider cf slick-initialized slick-slider slick-dotted">
        <div class="swiper-container">
          <div class="swiper-wrapper">
            @php $nmb = 1; @endphp
            @foreach($slides as $article)
              @if ($nmb > 10)
                @php break; @endphp
              @else
                <a href="{{ route('article.article', $article->id) }}" class="swiper-slide carousel-entry-card-wrap a-wrap border-element cf slick-slide slick-active" title="ドット背景柄のスキン「ドット・ワインレッド」・「ドット・レイニーブルー」スキンを同梱追加" data-slick-index="3" aria-hidden="false" style="width: 191px;" tabindex="0" role="tabpanel" id="slick-slide03">
                  <article class="post-3147 carousel-entry-card e-card cf post type-post status-publish format-standard has-post-thumbnail hentry category-skins-post">
                    <figure class="carousel-entry-card-thumb card-thumb">
                      @php
                          $article_thumbnail_path = (false !== strpos($article->thumbnail_path, 'http')) ? $article->thumbnail_path :env('APP_URL').'/storage/admin/'.$article->thumbnail_path;
                      @endphp
                      <img src="{{ $article_thumbnail_path }}" alt="{{ $article->title }}">
                      <span class="cat-label cat-label-36">{{ $article->article_category->name }}</span>
                    </figure>
                    <div class="carousel-entry-card-content card-content">
                      <div class="carousel-entry-card-title card-title">{{ $article->title }}</div>
                    </div>
                  </article>
                </a>
              @endif
              @php $nmb++; @endphp
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
@endif