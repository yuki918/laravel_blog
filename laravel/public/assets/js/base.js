var deviceSp = false;
var ww = $(window).innerWidth();
var wh = $(window).innerHeight();
var pos = $(window).scrollTop();

// スマホ判断
function deviceJudge() {
  ww = $(window).innerWidth();
  deviceSp = ww > 767 ? false : true;
}

// ページスクロール
function pageScroll() {
  $('a[href^="#"]').not(".noScroll").on("click", function () {
    var speed = 800;
    var href = $(this).attr("href");
    var header = $('.header').innerHeight();
    var target = $(href === "#" || href === "" ? 'html' : href);
    var position = target.offset().top;
    $('body, html').animate({
      scrollTop: position - header
    }, speed, 'swing');
    return false;
  });
}

// ハンバーガーメニュー
function hamburgerMenu() {
  var modalPos;
  $(".header__btn").off();
  $(".header__btn").on("click",function(){
    $(".header__btn , .header .gnav").toggleClass("active");
    $("#wrapper").css({
      position: "fixed",
      // top: -1 * pos,
      width: "100%"
    });
    if(!$(this).hasClass("active")) {
      $('#wrapper').attr({ style: '' });
      $('html, body').prop({ scrollTop: modalPos });
    } else {
      modalPos = pos;
    }
    return false;
  });
  
  // ハンバーガーメニューのリンクが同ページのアンカーリンクの場合（LPなど）
  // $(".header .gnav__item").find('a[href^="#"]').on("click", function () {
  //   var href = $(this).attr("href");
  //   if($(".header__btn").hasClass("active")) {
  //     $(".header__btn , .header .gnav").removeClass("active");
  //     $('#wrapper').attr({ style: '' });
  //     var speed = 800;
  //     var header = $('.header').innerHeight();
  //     var target = $(href === "#" || href === "" ? 'html' : href);
  //     var position = target.offset().top;
  //     $('html, body').prop({
  //       scrollTop: modalPos
  //     }, function () {
  //       $('html, body').animate({
  //         scrollTop: position - header
  //       }, speed, 'swing');
  //     });
  //     return false;
  //   }
  // });
}

// スクロールアニメーション
function scrollProcess() {
  pos = $(window).scrollTop();
  wh = $(window).innerHeight(),
  // 個別
  $(".scrollItem").each(function () {
    var startPos = 0.8;
    if($(this).attr('data-spos') !== undefined ){
      startPos = $(this).data('spos');
    }
    if ($(this).offset().top < pos + wh * startPos) {
      $(this).addClass("scrollActive");
    }
  });
  // 複数
  $(".scrollList").each(function () {
    var delaySpeed = 200;
    var startPos = 0.8;
    var listType = "";
    if($(this).attr('data-speed') !== undefined) {
      delaySpeed = $(this).data('speed');
    }
    if($(this).attr('data-spos') !== undefined) {
      startPos = $(this).data('spos');
    }
    if($(this).attr('data-list') !== undefined) {
      listType = "." + $(this).data('list');
    }
    if($(this).offset().top < pos + wh * startPos) {
      $(this).find(".scrollListItem"+listType).each(function (i) {
        $(this).delay(delaySpeed * i).queue(function () {
          $(this).addClass("scrollActive").dequeue();
        });
      });
    }
  });
}

// タブ切り替え
function tabChange() {
  $(".js-tab-list .item").on("click", function () {
    $(".js-tab-list .item , .js-tab-change .item").removeClass("active");
    $(this).addClass("active");
    const index = $(this).index();
    $(".js-tab-change .item").hide().eq(index).fadeIn(300);
  });
}

// ボタンの表示
function scrollShow() {
  $(window).scroll(function () {
    if($(this).scrollTop() > 500) {
      $('.footer__link , .footer__top').addClass('active');
    } else {
      $('.footer__link , .footer__top').removeClass('active');
    }
  });
}

// swiper
function swiper() {
  var pickupSlide = new Swiper('.pickup__slide', {
    loop: true,
    speed: 1500,
    loopAdditionalSlides: 1,
    slidesPerView: 2,
    spaceBetween: 15,
    autoplay: {
      delay: 4000,
      stopOnLastSlide: false,
      disableOnInteraction: false,
      reverseDirection: false
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev'
    },
    breakpoints: {
      767: {
        slidesPerView: 5,
      },
    },
  });
}

// コピーボタン
function copyButton() {
  const selector = '.copyButton';
  $(selector).click(function(event){
    event.preventDefault();
    navigator.clipboard.writeText($(selector).attr('data-clipboard-text')).then(
      () => {
        $('.copyInfo').fadeIn(500).delay(1000).fadeOut(500);
      });
  });
}

function likeButton() {
  $('.like-toggle').on('click', function () {
    let $this = $(this);
    let likeArticleId = $this.data('article-id');
    $.ajax({
      headers: {
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
      },
      url: '/like',
      method: 'POST',
      data: { 'article_id': likeArticleId },
    })
    //通信成功した時の処理
    .done(function (data) {
      $this.toggleClass('liked');
      console.log('success');
    })
    //通信失敗した時の処理
    .fail(function () {
      console.log('fail');
    });
  });
}

// init
$(function() {
  deviceJudge();
  pageScroll();
  scrollProcess();
  hamburgerMenu();
  copyButton();
  swiper();
  likeButton();
  $(window).on("resize orientationchange", function () {
    deviceJudge();
  });
  $(window).on("scroll touchmove", function () {
    scrollProcess();
  });
});
$(window).on("load", function () {
  $("#wrapper").addClass("preload");
});