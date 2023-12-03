@if(!$slides->isEmpty())
  <div class="pickup">
    <div class="wrapper">
      <div class="pickup__slide">
        <div class="swiper-wrapper">
          @php $nmb = 1; @endphp
            @foreach($slides as $article)
              @if ($nmb > 10)
                @php break; @endphp
              @else
                <div class="swiper-slide">
                  <a href="{{ route('article.article', $article->id) }}">
                    @php $article_thumbnail_path = (false !== strpos($article->thumbnail_path, 'http')) ? $article->thumbnail_path :env('APP_URL').'/storage/admin/'.$article->thumbnail_path; @endphp
                    <figure class="thumbnail"><img src="{{ $article_thumbnail_path }}" alt="{{ $article->title }}"></figure>
                    <p class="title">{{ $article->title }}</p>
                  </a>
                </div>
              @endif
              @php $nmb++; @endphp
            @endforeach
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
      </div>
    </div>
  </div>
@endif