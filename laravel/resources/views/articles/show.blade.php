@extends('layouts.base')

@section('title', $article->title)

@php $title = urlencode($article->title) @endphp

@section('main')
  <main class="main">
    <div class="mv under"></div>
    <div class="container">
      <div class="wrapper">
        <div class="content">
          <div class="article-detail commonContent">
            <h1 class="article-detail__title">{{ $article->title }}</h1>
            @php $this_article_thumbnail_path = (false !== strpos($article->thumbnail_path, 'http')) ? $article->thumbnail_path :env('APP_URL').'/storage/admin/'.$article->thumbnail_path; @endphp
            <figure class="article-detail__thumbnail"><img src="{{ $this_article_thumbnail_path }}" alt="{{ $article->title }}"></figure>
            <div class="article-detail__info">
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
            @if ($article->is_user == 1 && !Auth::check())
              <div class="article-detail__content gentei">
                <div class="info">@php echo $article->body; @endphp</div>
                <div class="gentei__info">
                  <p class="note">こちらの記事は<br class="sp">ログインユーザー限定記事です。</p>
                  <div class="buttonType01_wrap">
                    <a href="/login" class="buttonType01">ログイン</a>
                    <a href="/register" class="buttonType01">会員登録</a>
                  </div>
                </div>
              </div>
            @else
              <div class="article-detail__content"><div class="info">@php echo $article->body; @endphp</div></div>
            @endif
            <div class="article-detail__share commonSec">
              <ul class="list">
                @php
                  $hateb = route('article.article', $article->id);
                  $hateb = str_replace('https://', '', $hateb);
                  $hateb = str_replace('http://', '', $hateb);
                @endphp
                <li class="item"><a href="//twitter.com/intent/tweet?text={{ $title }}&amp;url={{ route('article.article', $article->id) }}"><i class="fa-brands fa-x-twitter"></i></a></li>
                <li class="item"><a href="//www.facebook.com/sharer/sharer.php?u={{ route('article.article', $article->id) }}&amp;t={{ $title }}"><i class="fa-brands fa-facebook-f"></i></a></li>
                <li class="item"><a href="//b.hatena.ne.jp/entry/s/{{ $hateb }}"><i class="fa-solid fa-blog"></i></a></li>
                <li class="item"><a href="//getpocket.com/edit?url={{ route('article.article', $article->id) }}"><i class="fa-brands fa-get-pocket"></i></a></li>
                <li class="item"><a href="//timeline.line.me/social-plugin/share?url={{ route('article.article', $article->id) }}"><i class="fa-brands fa-line"></i></a></li>
                <li class="item"><a class="copyButton" data-clipboard-text="{{ $article->title }} {{ route('article.article', $article->id) }}"><i class="fa-solid fa-copy"></i></a></li>
              </ul>
              <div class="copyInfo">タイトルとURLをコピーしました</div>
            </div>
            <div class="article-detail__detail">
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
            <div class="article-detail__comment commonSec">
              <h2 class="subtitle">コメント</h2>
              @if (!$comment->isEmpty())
                <ul class="list">
                  @foreach($comment as $item)
                    <li class="item">
                      <p class="info">
                        <span>{{ $item->name }} さん</span>
                        <time>{{ $item->created_at->format('Y年m月d日 H時i分s秒') }}</time>
                      </p>
                      <p class="comment">{{ $item->content }}</p>
                    </li>
                  @endforeach
                </ul>
              @else
                <p class="noFind">コメントがありません。</p>
              @endif
              <div class="commonForm">
                <form method="POST" action="{{ route('article.store') }}">
                  @csrf
                  <ul class="list">
                    <li class="item">
                      <label for="name">お名前</label>
                      @if (Auth::check())
                        <input type="text" name="name" value="{{ Auth::user()->name }}" required>
                      @else
                        <input type="text" name="name" value="名無しのごんべい" required>
                      @endif
                    </li>
                    <li class="item">
                      <label for="content">コメント</label>
                      <textarea name="content" required></textarea>
                    </li>
                  </ul>
                  <input type="hidden" id="article_id" name="article_id" value="{{ $article->id }}">
                  @if (Auth::check())
                    <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
                  @else
                    <input type="hidden" id="user_id" name="user_id" value="1">
                  @endif
                  <div class="buttons">
                    <button class="submit button">コメントする</button>
                  </div>
                </form>
              </div>
            </div>
            <div class="article-detail__relation commonSec">
              <h2 class="subtitle">関連記事</h2>
              @if (!$related->isEmpty())
                <div class="list">
                  @php $nmb = 1; @endphp
                  @foreach($related as $article)
                    @if ($nmb > 6)
                      @php break; @endphp
                    @else
                      <a href="{{ route('article.article', $article->id) }}" class="item">
                        @php $related_article_thumbnail_path = (false !== strpos($article->thumbnail_path, 'http')) ? $article->thumbnail_path :env('APP_URL').'/storage/admin/'.$article->thumbnail_path; @endphp
                        <figure class="thumbnail"><img src="{{ $related_article_thumbnail_path }}" alt="{{ $article->title }}"></figure>
                        <p class="title">{{ $article->title }}</p>
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
                      </a>
                    @endif
                    @php $nmb++; @endphp
                  @endforeach
                </div>
              @else
                <p class="noFind">記事がありませんでした。</p>
              @endif
            </div>
            <div class="article-detail__guide commonSec">
              <div class="list">
                @if($prev)
                  <a href="{{ route('article.article', $prev->id) }}" class="item prev">
                    <span>PREV</span>
                    @php $prev_article_thumbnail_path = (false !== strpos($prev->thumbnail_path, 'http')) ? $prev->thumbnail_path :env('APP_URL').'/storage/admin/'.$prev->thumbnail_path; @endphp
                    <figure class="thumbnail"><img src="{{ $prev_article_thumbnail_path}}" alt="{{ $prev->title }}"></figure>
                    <p class="title">{{ $prev->title }}</p>
                  </a>
                @else
                  <p class="item noFind">前の記事がありません。</p>
                @endif
                @if($next)
                  <a href="{{ route('article.article', $next->id) }}" class="item next">
                    <span>NEXT</span>
                    @php $next_article_thumbnail_path = (false !== strpos($next->thumbnail_path, 'http')) ? $next->thumbnail_path :env('APP_URL').'/storage/admin/'.$next->thumbnail_path; @endphp
                    <figure class="thumbnail"><img src="{{ $next_article_thumbnail_path}}" alt="{{ $next->title }}"></figure>
                    <p class="title">{{ $next->title }}</p>
                  </a>
                @else
                  <p class="item noFind">次の記事がありません。</p>
                @endif
              </div>
            </div>
          </div>
        </div>
        @include('layouts.aside', ['categories' => $categories, 'new' => $new])
      </div>
    </div>
  </main>
@endsection