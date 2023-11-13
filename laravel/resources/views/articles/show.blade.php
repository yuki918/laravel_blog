@extends('layouts.base')

@section('title')
  <title>{{ $article->title }} | {{ config('app.name', 'Laravel') }}</title>
@endsection

@section('main')
<div id="content" class="content">
  @include('layouts.pickup', ['slides' => $slides])
  <div id="content-in" class="content-in wrap mt-4">
    <main id="main" class="main">
      <article class="article post-3485 post type-post status-publish format-standard has-post-thumbnail hentry category-about-cocoon-post">
        <header class="article-header entry-header">
          <h1 class="entry-title" itemprop="headline">{{ $article->title }}</h1>
          <div class="eye-catch-wrap">
            <figure class="eye-catch">
              @php
                  $this_article_thumbnail_path = (false !== strpos($article->thumbnail_path, 'http')) ? $article->thumbnail_path :env('APP_URL').'/storage/admin/'.$article->thumbnail_path;
              @endphp
              <img src="{{ $this_article_thumbnail_path }}" alt="{{ $article->title }}" width="100%">
              <span class="cat-label cat-label-36">{{ $article->article_category->name }}</span>
            </figure>
          </div>
          <div class="sns-share ss-col-6 ss-high-and-low-lc bc-brand-color sbc-show ss-top">
            <div class="sns-share-buttons sns-buttons">
                @php $title = urlencode($article->title) @endphp
                <a href="https://twitter.com/intent/tweet?text={{ $title }}&amp;url={{ route('article.article', $article->id) }}" class="sns-button share-button twitter-button twitter-share-button-sq x-corp-button x-corp-share-button-sq" target="_blank" rel="nofollow noopener noreferrer">
                  <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/></svg>
                  <span class="button-caption">X</span>
                </a>
          
                <a href="//www.facebook.com/sharer/sharer.php?u={{ route('article.article', $article->id) }}&amp;t={{ $title }}" class="sns-button share-button facebook-button facebook-share-button-sq" target="_blank" rel="nofollow noopener noreferrer" aria-label="Facebookでシェア">
                  <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/></svg>
                  <span class="button-caption">Facebook</span>
                </a>

                @php
                    $hateb = route('article.article', $article->id);
                    $hateb = str_replace('https://', '', $hateb);
                    $hateb = str_replace('http://', '', $hateb);
                @endphp
                <a href="//b.hatena.ne.jp/entry/s/{{ $hateb }}" class="sns-button share-button hatebu-button hatena-bookmark-button hatebu-share-button-sq" data-hatena-bookmark-layout="simple" title="Cocoonの吹き出しを独自アイコンに変更。100％GPLテーマにするため。" target="_blank" rel="nofollow noopener noreferrer" aria-label="はてブでブックマーク">
                  <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M162.4 196c4.8-4.9 6.2-5.1 36.4-5.1 27.2 0 28.1.1 32.1 2.1 5.8 2.9 8.3 7 8.3 13.6 0 5.9-2.4 10-7.6 13.4-2.8 1.8-4.5 1.9-31.1 2.1-16.4.1-29.5-.2-31.5-.8-10.3-2.9-14.1-17.7-6.6-25.3zm61.4 94.5c-53.9 0-55.8.2-60.2 4.1-3.5 3.1-5.7 9.4-5.1 13.9.7 4.7 4.8 10.1 9.2 12 2.2 1 14.1 1.7 56.3 1.2l47.9-.6 9.2-1.5c9-5.1 10.5-17.4 3.1-24.4-5.3-4.7-5-4.7-60.4-4.7zm223.4 130.1c-3.5 28.4-23 50.4-51.1 57.5-7.2 1.8-9.7 1.9-172.9 1.8-157.8 0-165.9-.1-172-1.8-8.4-2.2-15.6-5.5-22.3-10-5.6-3.8-13.9-11.8-17-16.4-3.8-5.6-8.2-15.3-10-22C.1 423 0 420.3 0 256.3 0 93.2 0 89.7 1.8 82.6 8.1 57.9 27.7 39 53 33.4c7.3-1.6 332.1-1.9 340-.3 21.2 4.3 37.9 17.1 47.6 36.4 7.7 15.3 7-1.5 7.3 180.6.2 115.8 0 164.5-.7 170.5zm-85.4-185.2c-1.1-5-4.2-9.6-7.7-11.5-1.1-.6-8-1.3-15.5-1.7-12.4-.6-13.8-.8-17.8-3.1-6.2-3.6-7.9-7.6-8-18.3 0-20.4-8.5-39.4-25.3-56.5-12-12.2-25.3-20.5-40.6-25.1-3.6-1.1-11.8-1.5-39.2-1.8-42.9-.5-52.5.4-67.1 6.2-27 10.7-46.3 33.4-53.4 62.4-1.3 5.4-1.6 14.2-1.9 64.3-.4 62.8 0 72.1 4 84.5 9.7 30.7 37.1 53.4 64.6 58.4 9.2 1.7 122.2 2.1 133.7.5 20.1-2.7 35.9-10.8 50.7-25.9 10.7-10.9 17.4-22.8 21.8-38.5 3.2-10.9 2.9-88.4 1.7-93.9z"/></svg>
                  <span class="button-caption">はてブ</span>
                </a>
          
                <a href="//getpocket.com/edit?url={{ route('article.article', $article->id) }}" class="sns-button share-button pocket-button pocket-share-button-sq" target="_blank" rel="nofollow noopener noreferrer" aria-label="Pocketに保存">
                  <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M407.6 64h-367C18.5 64 0 82.5 0 104.6v135.2C0 364.5 99.7 464 224.2 464c124 0 223.8-99.5 223.8-224.2V104.6c0-22.4-17.7-40.6-40.4-40.6zm-162 268.5c-12.4 11.8-31.4 11.1-42.4 0C89.5 223.6 88.3 227.4 88.3 209.3c0-16.9 13.8-30.7 30.7-30.7 17 0 16.1 3.8 105.2 89.3 90.6-86.9 88.6-89.3 105.5-89.3 16.9 0 30.7 13.8 30.7 30.7 0 17.8-2.9 15.7-114.8 123.2z"/></svg>
                  <span class="button-caption">Pocket</span>
                </a>
          
                <a href="//timeline.line.me/social-plugin/share?url={{ route('article.article', $article->id) }}" class="sns-button share-button line-button line-share-button-sq" target="_blank" rel="nofollow noopener noreferrer" aria-label="LINEでシェア">
                  <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M311 196.8v81.3c0 2.1-1.6 3.7-3.7 3.7h-13c-1.3 0-2.4-.7-3-1.5l-37.3-50.3v48.2c0 2.1-1.6 3.7-3.7 3.7h-13c-2.1 0-3.7-1.6-3.7-3.7V196.9c0-2.1 1.6-3.7 3.7-3.7h12.9c1.1 0 2.4 .6 3 1.6l37.3 50.3V196.9c0-2.1 1.6-3.7 3.7-3.7h13c2.1-.1 3.8 1.6 3.8 3.5zm-93.7-3.7h-13c-2.1 0-3.7 1.6-3.7 3.7v81.3c0 2.1 1.6 3.7 3.7 3.7h13c2.1 0 3.7-1.6 3.7-3.7V196.8c0-1.9-1.6-3.7-3.7-3.7zm-31.4 68.1H150.3V196.8c0-2.1-1.6-3.7-3.7-3.7h-13c-2.1 0-3.7 1.6-3.7 3.7v81.3c0 1 .3 1.8 1 2.5c.7 .6 1.5 1 2.5 1h52.2c2.1 0 3.7-1.6 3.7-3.7v-13c0-1.9-1.6-3.7-3.5-3.7zm193.7-68.1H327.3c-1.9 0-3.7 1.6-3.7 3.7v81.3c0 1.9 1.6 3.7 3.7 3.7h52.2c2.1 0 3.7-1.6 3.7-3.7V265c0-2.1-1.6-3.7-3.7-3.7H344V247.7h35.5c2.1 0 3.7-1.6 3.7-3.7V230.9c0-2.1-1.6-3.7-3.7-3.7H344V213.5h35.5c2.1 0 3.7-1.6 3.7-3.7v-13c-.1-1.9-1.7-3.7-3.7-3.7zM512 93.4V419.4c-.1 51.2-42.1 92.7-93.4 92.6H92.6C41.4 511.9-.1 469.8 0 418.6V92.6C.1 41.4 42.2-.1 93.4 0H419.4c51.2 .1 92.7 42.1 92.6 93.4zM441.6 233.5c0-83.4-83.7-151.3-186.4-151.3s-186.4 67.9-186.4 151.3c0 74.7 66.3 137.4 155.9 149.3c21.8 4.7 19.3 12.7 14.4 42.1c-.8 4.7-3.8 18.4 16.1 10.1s107.3-63.2 146.5-108.2c27-29.7 39.9-59.8 39.9-93.1z"/></svg>
                  <span class="button-caption">LINE</span>
                </a>
                
                <a role="button" tabindex="0" class="sns-button share-button copy-button copy-share-button-sq" rel="nofollow noopener noreferrer" data-clipboard-text="{{ $title }} {{ route('article.article', $article->id) }}" aria-label="タイトルとURLをコピーする">
                  <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M208 0H332.1c12.7 0 24.9 5.1 33.9 14.1l67.9 67.9c9 9 14.1 21.2 14.1 33.9V336c0 26.5-21.5 48-48 48H208c-26.5 0-48-21.5-48-48V48c0-26.5 21.5-48 48-48zM48 128h80v64H64V448H256V416h64v48c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V176c0-26.5 21.5-48 48-48z"/></svg>
                  <span class="button-caption">コピー</span>
                </a>
            </div>
          </div>
          <div class="date-tags">
            <span class="post-date">
              <span class="far fa-clock" aria-hidden="true"></span>
              <span class="entry-date date published">{{ $article->created_at->format('Y年m月d日') }}</span>
            </span>
            @if ($article->created_at != $article->updated_at)
              <span class="post-update">
                <span class="fas fa-history" aria-hidden="true"></span>
                <time class="entry-date date updated">{{ $article->updated_at->format('Y年m月d日') }}</time>
              </span>
            @endif
          </div>
        </header>
        <div class="entry-content cf iwe-shadow-paper">
          @php echo $article->body; @endphp
        </div>
        <footer class="article-footer entry-footer">
          <div class="entry-categories-tags ctdt-one-row">
            <div class="entry-categories">
              <a class="cat-link cat-link-36" href="/?category={{ $article->article_category->id }}">
                <span class="fas fa-folder cat-icon tax-icon" aria-hidden="true"></span>{{ $article->article_category->name }}
              </a>
            </div>
          </div>
          {{-- <div id="author_box-2" class="widget widget-above-single-sns-buttons widget_author_box">  <div class="author-box border-element no-icon cf">
            <figure class="author-thumb"><img src="" alt=""></figure>
            <div class="author-content">
              <div class="author-name"></div>
              <div class="author-description">
                <p></p>
              </div>
            </div>
          </div> --}}
          <div class="sns-share ss-col-3 bc-brand-color sbc-show ss-bottom">
              <div class="sns-share-message">シェアする</div>
            
              <div class="sns-share ss-col-6 ss-high-and-low-lc bc-brand-color sbc-show ss-top">
                <div class="sns-share-buttons sns-buttons">
                  @php $title = urlencode($article->title) @endphp
                  <a href="https://twitter.com/intent/tweet?text={{ $title }}&amp;url={{ route('article.article', $article->id) }}" class="sns-button share-button twitter-button twitter-share-button-sq x-corp-button x-corp-share-button-sq" target="_blank" rel="nofollow noopener noreferrer">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/></svg>
                    <span class="button-caption">X</span>
                  </a>
            
                  <a href="//www.facebook.com/sharer/sharer.php?u={{ route('article.article', $article->id) }}&amp;t={{ $title }}" class="sns-button share-button facebook-button facebook-share-button-sq" target="_blank" rel="nofollow noopener noreferrer" aria-label="Facebookでシェア">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/></svg>
                    <span class="button-caption">Facebook</span>
                  </a>
  
                  @php
                      $hateb = route('article.article', $article->id);
                      $hateb = str_replace('https://', '', $hateb);
                      $hateb = str_replace('http://', '', $hateb);
                  @endphp
                  <a href="//b.hatena.ne.jp/entry/s/{{ $hateb }}" class="sns-button share-button hatebu-button hatena-bookmark-button hatebu-share-button-sq" data-hatena-bookmark-layout="simple" title="Cocoonの吹き出しを独自アイコンに変更。100％GPLテーマにするため。" target="_blank" rel="nofollow noopener noreferrer" aria-label="はてブでブックマーク">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M162.4 196c4.8-4.9 6.2-5.1 36.4-5.1 27.2 0 28.1.1 32.1 2.1 5.8 2.9 8.3 7 8.3 13.6 0 5.9-2.4 10-7.6 13.4-2.8 1.8-4.5 1.9-31.1 2.1-16.4.1-29.5-.2-31.5-.8-10.3-2.9-14.1-17.7-6.6-25.3zm61.4 94.5c-53.9 0-55.8.2-60.2 4.1-3.5 3.1-5.7 9.4-5.1 13.9.7 4.7 4.8 10.1 9.2 12 2.2 1 14.1 1.7 56.3 1.2l47.9-.6 9.2-1.5c9-5.1 10.5-17.4 3.1-24.4-5.3-4.7-5-4.7-60.4-4.7zm223.4 130.1c-3.5 28.4-23 50.4-51.1 57.5-7.2 1.8-9.7 1.9-172.9 1.8-157.8 0-165.9-.1-172-1.8-8.4-2.2-15.6-5.5-22.3-10-5.6-3.8-13.9-11.8-17-16.4-3.8-5.6-8.2-15.3-10-22C.1 423 0 420.3 0 256.3 0 93.2 0 89.7 1.8 82.6 8.1 57.9 27.7 39 53 33.4c7.3-1.6 332.1-1.9 340-.3 21.2 4.3 37.9 17.1 47.6 36.4 7.7 15.3 7-1.5 7.3 180.6.2 115.8 0 164.5-.7 170.5zm-85.4-185.2c-1.1-5-4.2-9.6-7.7-11.5-1.1-.6-8-1.3-15.5-1.7-12.4-.6-13.8-.8-17.8-3.1-6.2-3.6-7.9-7.6-8-18.3 0-20.4-8.5-39.4-25.3-56.5-12-12.2-25.3-20.5-40.6-25.1-3.6-1.1-11.8-1.5-39.2-1.8-42.9-.5-52.5.4-67.1 6.2-27 10.7-46.3 33.4-53.4 62.4-1.3 5.4-1.6 14.2-1.9 64.3-.4 62.8 0 72.1 4 84.5 9.7 30.7 37.1 53.4 64.6 58.4 9.2 1.7 122.2 2.1 133.7.5 20.1-2.7 35.9-10.8 50.7-25.9 10.7-10.9 17.4-22.8 21.8-38.5 3.2-10.9 2.9-88.4 1.7-93.9z"/></svg>
                    <span class="button-caption">はてブ</span>
                  </a>
            
                  <a href="//getpocket.com/edit?url={{ route('article.article', $article->id) }}" class="sns-button share-button pocket-button pocket-share-button-sq" target="_blank" rel="nofollow noopener noreferrer" aria-label="Pocketに保存">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M407.6 64h-367C18.5 64 0 82.5 0 104.6v135.2C0 364.5 99.7 464 224.2 464c124 0 223.8-99.5 223.8-224.2V104.6c0-22.4-17.7-40.6-40.4-40.6zm-162 268.5c-12.4 11.8-31.4 11.1-42.4 0C89.5 223.6 88.3 227.4 88.3 209.3c0-16.9 13.8-30.7 30.7-30.7 17 0 16.1 3.8 105.2 89.3 90.6-86.9 88.6-89.3 105.5-89.3 16.9 0 30.7 13.8 30.7 30.7 0 17.8-2.9 15.7-114.8 123.2z"/></svg>
                    <span class="button-caption">Pocket</span>
                  </a>
            
                  <a href="//timeline.line.me/social-plugin/share?url={{ route('article.article', $article->id) }}" class="sns-button share-button line-button line-share-button-sq" target="_blank" rel="nofollow noopener noreferrer" aria-label="LINEでシェア">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M311 196.8v81.3c0 2.1-1.6 3.7-3.7 3.7h-13c-1.3 0-2.4-.7-3-1.5l-37.3-50.3v48.2c0 2.1-1.6 3.7-3.7 3.7h-13c-2.1 0-3.7-1.6-3.7-3.7V196.9c0-2.1 1.6-3.7 3.7-3.7h12.9c1.1 0 2.4 .6 3 1.6l37.3 50.3V196.9c0-2.1 1.6-3.7 3.7-3.7h13c2.1-.1 3.8 1.6 3.8 3.5zm-93.7-3.7h-13c-2.1 0-3.7 1.6-3.7 3.7v81.3c0 2.1 1.6 3.7 3.7 3.7h13c2.1 0 3.7-1.6 3.7-3.7V196.8c0-1.9-1.6-3.7-3.7-3.7zm-31.4 68.1H150.3V196.8c0-2.1-1.6-3.7-3.7-3.7h-13c-2.1 0-3.7 1.6-3.7 3.7v81.3c0 1 .3 1.8 1 2.5c.7 .6 1.5 1 2.5 1h52.2c2.1 0 3.7-1.6 3.7-3.7v-13c0-1.9-1.6-3.7-3.5-3.7zm193.7-68.1H327.3c-1.9 0-3.7 1.6-3.7 3.7v81.3c0 1.9 1.6 3.7 3.7 3.7h52.2c2.1 0 3.7-1.6 3.7-3.7V265c0-2.1-1.6-3.7-3.7-3.7H344V247.7h35.5c2.1 0 3.7-1.6 3.7-3.7V230.9c0-2.1-1.6-3.7-3.7-3.7H344V213.5h35.5c2.1 0 3.7-1.6 3.7-3.7v-13c-.1-1.9-1.7-3.7-3.7-3.7zM512 93.4V419.4c-.1 51.2-42.1 92.7-93.4 92.6H92.6C41.4 511.9-.1 469.8 0 418.6V92.6C.1 41.4 42.2-.1 93.4 0H419.4c51.2 .1 92.7 42.1 92.6 93.4zM441.6 233.5c0-83.4-83.7-151.3-186.4-151.3s-186.4 67.9-186.4 151.3c0 74.7 66.3 137.4 155.9 149.3c21.8 4.7 19.3 12.7 14.4 42.1c-.8 4.7-3.8 18.4 16.1 10.1s107.3-63.2 146.5-108.2c27-29.7 39.9-59.8 39.9-93.1z"/></svg>
                    <span class="button-caption">LINE</span>
                  </a>
                  
                  <a role="button" tabindex="0" class="sns-button share-button copy-button copy-share-button-sq" rel="nofollow noopener noreferrer" data-clipboard-text="{{ $title }} {{ route('article.article', $article->id) }}" aria-label="タイトルとURLをコピーする">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M208 0H332.1c12.7 0 24.9 5.1 33.9 14.1l67.9 67.9c9 9 14.1 21.2 14.1 33.9V336c0 26.5-21.5 48-48 48H208c-26.5 0-48-21.5-48-48V48c0-26.5 21.5-48 48-48zM48 128h80v64H64V448H256V416h64v48c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V176c0-26.5 21.5-48 48-48z"/></svg>
                    <span class="button-caption">コピー</span>
                  </a>
              </div>
              </div>
          </div><!-- /.sns-share -->
        </footer>
      </article>
      <div class="under-entry-content">
        <aside id="related-entries" class="related-entries rect-vertical-card rect-vertical-card-3">
          <h2 class="related-entry-heading font-bold"><span class="related-entry-main-heading main-caption">関連記事</span></h2>
          @if (!$related->isEmpty())
            <div class="related-list">
              @php $nmb = 1; @endphp
              @foreach($related as $article)
                @if ($nmb > 6)
                  @php break; @endphp
                @else
                  <a href="{{ route('article.article', $article->id) }}" class="related-entry-card-wrap a-wrap border-element cf">
                    <article class="post-2162 related-entry-card e-card cf post type-post status-publish format-standard has-post-thumbnail hentry category-about-cocoon-post">
                      <figure class="related-entry-card-thumb card-thumb e-card-thumb">
                        @php
                            $related_article_thumbnail_path = (false !== strpos($article->thumbnail_path, 'http')) ? $article->thumbnail_path :env('APP_URL').'/storage/admin/'.$article->thumbnail_path;
                        @endphp
                        <img src="{{ $related_article_thumbnail_path }}">
                        <span class="cat-label cat-label-36">{{ $article->article_category->name }}</span>
                      </figure><!-- /.related-entry-thumb -->
                      <div class="related-entry-card-content card-content e-card-content">
                        <h3 class="related-entry-card-title card-title e-card-title">{{ $article->title }}</</h3>
                        <div class="related-entry-card-meta card-meta e-card-meta">
                          <div class="related-entry-card-info e-card-info">
                            <span class="post-date">
                              <span class="far fa-clock" aria-hidden="true">
                              </span>{{ $article->created_at->format('Y年m月d日') }}</span>
                            </span>
                          </div>
                          <div class="related-entry-card-categorys e-card-categorys"><span class="entry-category">{{ $article->article_category->name }}</span></div>
                        </div>
                      </div><!-- /.related-entry-card-content -->
                    </article><!-- /.related-entry-card -->
                  </a>
                @endif
                @php $nmb++; @endphp
              @endforeach
            </div>
          @else
              <p>記事がありませんでした。</p>
          @endif
        </aside>
        <div id="pager-post-navi" class="pager-post-navi post-navi-default cf">
          @if($prev)
            <a href="{{ route('article.article', $prev->id) }}" class="prev-post a-wrap border-element cf">
              <div class="fas fa-chevron-left iconfont" aria-hidden="true"></div>
                <figure class="prev-post-thumb card-thumb">
                  @php
                      $prev_article_thumbnail_path = (false !== strpos($prev->thumbnail_path, 'http')) ? $prev->thumbnail_path :env('APP_URL').'/storage/admin/'.$prev->thumbnail_path;
                  @endphp
                  <img src="{{ $prev_article_thumbnail_path}}" alt="{{ $prev->title }}">
                </figure>
              <div class="prev-post-title">{{ $prev->title }}</div>
            </a>
          @endif
          @if($next)
            <a href="{{ route('article.article', $next->id) }}" class="next-post a-wrap border-element cf">
              <div class="fas fa-chevron-right iconfont" aria-hidden="true"></div>
                <figure class="next-post-thumb card-thumb">
                  @php
                      $next_article_thumbnail_path = (false !== strpos($next->thumbnail_path, 'http')) ? $next->thumbnail_path :env('APP_URL').'/storage/admin/'.$next->thumbnail_path;
                  @endphp
                  <img src="{{ $next_article_thumbnail_path }}" alt="{{ $next->title }}">
                </figure>
              <div class="next-post-title">{{ $next->title }}</div>
            </a>
          @endif
        </div>
      </div>
      <div id="breadcrumb" class="breadcrumb breadcrumb-category sbp-main-bottom">
        <div class="breadcrumb-home">
          <span class="fas fa-home fa-fw" aria-hidden="true"></span>
          <a href="/" itemprop="item">
            <span itemprop="name" class="breadcrumb-caption">ホーム</span>
          </a>
          <span class="sp"><span class="fas fa-angle-right" aria-hidden="true"></span></span>
        </div>
        <div class="breadcrumb-item">
          <span class="fas fa-folder fa-fw" aria-hidden="true"></span>
          <a href="/?category={{ $article->article_category->id }}">
            <span itemprop="name" class="breadcrumb-caption">{{ $article->article_category->name }}</span></a>
            <meta itemprop="position" content="2">
            <span class="sp"><span class="fas fa-angle-right" aria-hidden="true"></span>
          </span>
        </div>
        <div class="breadcrumb-item">
          <span class="far fa-file fa-fw" aria-hidden="true"></span>
          <span class="breadcrumb-caption" itemprop="name">{{ $article->title }}</span>
        </div>
      </div>
    </main>
    @include('layouts.aside', ['categories' => $categories, 'new' => $new])
  </div>
</div>
<div class="copy-info" style="display: none;">タイトルとURLをコピーしました</div>
@endsection