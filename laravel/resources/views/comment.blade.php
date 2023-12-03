@extends('layouts.base')

@section('title')
  <title>コメントした記事一覧 | マイページ | {{ config('app.name', 'Laravel') }}</title>
@endsection

@section('main')
  <main class="main">
    <div class="mv under">
      <h1 class="mv__title">
        <p class="sub">マイページ</p>
        <p>コメントした記事一覧</p>
      </h1>
    </div>
    <div class="container">
      <div class="wrapper">
        <div class="content">
          <div class="mypage-list">
            <ul class="list">
              <li class="item"><a href="/dashboard/">お気に入りの<br class="sp">記事一覧</a></li>
              <li class="item"><a href="/comment/">コメントした<br class="sp">記事一覧</a></li>
              <li class="item"><a href="/profile/">アカウント情報</a></li>
            </ul>
          </div>
          <div class="article-list">
            @if (!$comment->isEmpty())
              @foreach($comment as $article)
                <article class="article-list__item">
                  @php $article_thumbnail_path = (false !== strpos($article->thumbnail_path, 'http')) ? $article->thumbnail_path :env('APP_URL').'/storage/admin/'.$article->thumbnail_path; @endphp
                  <figure class="article-list__thumbnail"><a href="{{ route('article.article', $article->id) }}"><img src="{{ $article_thumbnail_path }}" alt="{{ $article->title }}"></a></figure>
                  <div class="article-list__info">
                    <div class="admin">
                      <figure class="icon"><img src="{{ asset('assets/img/profile.png') }}" alt="管理者"></figure>
                      <div class="info">
                        <p class="name">管理者</p>
                        <div class="time">
                          <p>
                            <span class="far fa-clock"></span>
                            <time>{{ $article->created_at->format('Y年m月d日') }}</time>
                          </p>
                          @if ($article->created_at != $article->updated_at)
                            <p>
                              <span class="fas fa-history"></span>
                              <time>{{ $article->updated_at->format('Y年m月d日') }}</time>
                            </p>
                          @endif
                        </div>
                      </div>
                    </div>
                    <p class="cat"><a href="/?category={{ $article->article_category->id }}"><span class="fas fa-folder"></span>{{ $article->article_category->name }}</a></p>
                    <a href="{{ route('article.article', $article->id) }}" class="text">
                      <h3>{{ $article->title }}</h3>
                      <div class="text">@php echo $article->body; @endphp</div>
                    </a>
                    <div class="detail">
                      <div class="record">
                        <p><span><i class="far fa-eye"></i></span>{{ $article->view->count() }}</p>
                        <p><span><i class="far fa-comment"></i></span>{{ $article->comment->count() }}</p>
                      </div>
                      <div class="like">
                        @if (Auth::check())
                          @if (!$article->isLikedBy(Auth::user()))
                            <span class="like-toggle" data-article-id="{{ $article->id }}"><svg xmlns="http://www.w3.org/2000/svg" width="19" viewBox="0 0 19 19" role="img"><path d="M9.44985848,15.5291774 C9.43911371,15.5362849 9.42782916,15.5449227 9.41715267,15.5553324 L9.44985848,15.5291774 Z M9.44985848,15.5291774 L9.49370677,15.4941118 C9.15422701,15.7147757 10.2318883,15.0314406 10.7297038,14.6971183 C11.5633567,14.1372547 12.3827081,13.5410755 13.1475707,12.9201001 C14.3829188,11.9171478 15.3570936,10.9445466 15.9707237,10.0482572 C16.0768097,9.89330422 16.1713564,9.74160032 16.2509104,9.59910798 C17.0201658,8.17755699 17.2088969,6.78363112 16.7499013,5.65913129 C16.4604017,4.81092573 15.7231445,4.11008901 14.7401472,3.70936139 C13.1379564,3.11266008 11.0475663,3.84092251 9.89976068,5.36430396 L9.50799408,5.8842613 L9.10670536,5.37161711 C7.94954806,3.89335486 6.00516066,3.14638251 4.31830373,3.71958508 C3.36517186,4.00646284 2.65439601,4.72068063 2.23964629,5.77358234 C1.79050315,6.87166888 1.98214559,8.26476279 2.74015555,9.58185512 C2.94777753,9.93163559 3.23221417,10.3090129 3.5869453,10.7089994 C4.17752179,11.3749196 4.94653811,12.0862394 5.85617417,12.8273544 C7.11233096,13.8507929 9.65858244,15.6292133 9.58280954,15.555334 C9.53938013,15.5129899 9.48608859,15.5 9.50042471,15.5 C9.5105974,15.5 9.48275828,15.5074148 9.44985848,15.5291774 Z"></path></svg></span>
                            {{-- <i class="fa-regular fa-heart like-toggle" data-article-id="{{ $article->id }}"></i> --}}
                          @else
                            <span class="like-toggle liked" data-article-id="{{ $article->id }}"><svg xmlns="http://www.w3.org/2000/svg" width="19" viewBox="0 0 19 19" role="img"><path d="M9.44985848,15.5291774 C9.43911371,15.5362849 9.42782916,15.5449227 9.41715267,15.5553324 L9.44985848,15.5291774 Z M9.44985848,15.5291774 L9.49370677,15.4941118 C9.15422701,15.7147757 10.2318883,15.0314406 10.7297038,14.6971183 C11.5633567,14.1372547 12.3827081,13.5410755 13.1475707,12.9201001 C14.3829188,11.9171478 15.3570936,10.9445466 15.9707237,10.0482572 C16.0768097,9.89330422 16.1713564,9.74160032 16.2509104,9.59910798 C17.0201658,8.17755699 17.2088969,6.78363112 16.7499013,5.65913129 C16.4604017,4.81092573 15.7231445,4.11008901 14.7401472,3.70936139 C13.1379564,3.11266008 11.0475663,3.84092251 9.89976068,5.36430396 L9.50799408,5.8842613 L9.10670536,5.37161711 C7.94954806,3.89335486 6.00516066,3.14638251 4.31830373,3.71958508 C3.36517186,4.00646284 2.65439601,4.72068063 2.23964629,5.77358234 C1.79050315,6.87166888 1.98214559,8.26476279 2.74015555,9.58185512 C2.94777753,9.93163559 3.23221417,10.3090129 3.5869453,10.7089994 C4.17752179,11.3749196 4.94653811,12.0862394 5.85617417,12.8273544 C7.11233096,13.8507929 9.65858244,15.6292133 9.58280954,15.555334 C9.53938013,15.5129899 9.48608859,15.5 9.50042471,15.5 C9.5105974,15.5 9.48275828,15.5074148 9.44985848,15.5291774 Z"></path></svg></span>
                          @endif
                        @else
                          <a href="/login">
                            <span data-article-id="{{ $article->id }}"><svg xmlns="http://www.w3.org/2000/svg" width="19" viewBox="0 0 19 19" role="img"><path d="M9.44985848,15.5291774 C9.43911371,15.5362849 9.42782916,15.5449227 9.41715267,15.5553324 L9.44985848,15.5291774 Z M9.44985848,15.5291774 L9.49370677,15.4941118 C9.15422701,15.7147757 10.2318883,15.0314406 10.7297038,14.6971183 C11.5633567,14.1372547 12.3827081,13.5410755 13.1475707,12.9201001 C14.3829188,11.9171478 15.3570936,10.9445466 15.9707237,10.0482572 C16.0768097,9.89330422 16.1713564,9.74160032 16.2509104,9.59910798 C17.0201658,8.17755699 17.2088969,6.78363112 16.7499013,5.65913129 C16.4604017,4.81092573 15.7231445,4.11008901 14.7401472,3.70936139 C13.1379564,3.11266008 11.0475663,3.84092251 9.89976068,5.36430396 L9.50799408,5.8842613 L9.10670536,5.37161711 C7.94954806,3.89335486 6.00516066,3.14638251 4.31830373,3.71958508 C3.36517186,4.00646284 2.65439601,4.72068063 2.23964629,5.77358234 C1.79050315,6.87166888 1.98214559,8.26476279 2.74015555,9.58185512 C2.94777753,9.93163559 3.23221417,10.3090129 3.5869453,10.7089994 C4.17752179,11.3749196 4.94653811,12.0862394 5.85617417,12.8273544 C7.11233096,13.8507929 9.65858244,15.6292133 9.58280954,15.555334 C9.53938013,15.5129899 9.48608859,15.5 9.50042471,15.5 C9.5105974,15.5 9.48275828,15.5074148 9.44985848,15.5291774 Z"></path></svg></span>
                          </a>
                        @endif
                      </div>
                    </div>
                  </div>
                </article>
              @endforeach
            @else
              <p class="noFind">記事が見つかりませんでした。</p>
            @endif
          </div>
          {{ $comment->appends(request()->input())->links() }}
        </div>
        @include('layouts.aside', ['categories' => $categories, 'new' => $new])
      </div>
    </div>
  </main>
@endsection