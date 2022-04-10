jQuery(function ($) {
  // この中であればWordpressでも「$」が使用可能になる

  // ページ遷移時のヘッダー高さマイナス
  $(window).on('load', function() {
    let headerHeight = $('.p-header').outerHeight();
    let urlHash = location.hash;
    if (urlHash) {
      let position = $(urlHash).offset().top - headerHeight;
      $('html, body').animate({ scrollTop: position }, 0);
    }
  });

  // リサイズイベント
  $(window).resize(function () {
    var $window = $(this).width();
    var bp = 767;
    if ($window > bp) {
      $(".js-hamburger").removeClass("is-active");
      $(".js-nav-menu").fadeOut();
    } else {
      $(".p-sp-nav").hide();
      $(".js-hamburger").removeClass("is-active");
    }
  });

  // スマホのアドレスバーを考慮
	$(document).ready(function(){
		var heroHeight = $(window).height();
		$('.slide-image1, .slide-image2, .slide-image3').height(heroHeight);
	});

	$(window).resize(function () {
    var heroHeight = $(window).height();
    $('.slide-image1, .slide-image2, .slide-image3').height(heroHeight);
	});

  // ページトップボタン
  var topBtn = $(".js-page-top");
  topBtn.hide();

  // ボタンの表示設定
  $(window).scroll(function () {
    if ($(this).scrollTop() > 770) {
      // 指定px以上のスクロールでボタンを表示
      topBtn.fadeIn();
    } else {
      // 画面が指定pxより上ならボタンを非表示
      topBtn.fadeOut();
    }
  });

  // ボタンをクリックしたらスクロールして上に戻る
  topBtn.click(function () {
    $("body,html").animate(
      {
        scrollTop: 0,
      },
      100,
      "swing"
    );
    return false;
  });

  // ハンバーガーメニュー
  $(".js-hamburger").on("click", function () {
    if ($(".js-hamburger").hasClass('is-active')) {
      $(".js-nav-menu").fadeOut();
      $(".js-hamburger").removeClass("is-active");
    } else {
      $(".js-nav-menu").fadeIn();
      $(".js-hamburger").addClass("is-active");
    }
    // $('body').css('overflow-y', 'hidden');  // 本文の縦スクロールを無効
  });

  // $(".js-nav__background")
  //   .on("show", function () {
  //     $("body").addClass("modal-open");
  //   })
  //   .on("hidden", function () {
  //     $("body").removeClass("modal-open");
  //   });

  //ページ遷移時にドロワーを閉じる
  $(".js-sp-nav-item a").on("click", function () {
    $(".js-hamburger").removeClass("is-active");
    $(".js-nav-menu").fadeOut();
  });

  // 同一ページ内のリンクに飛ぶ際のスムーススクロール
  // #から始まるURLがクリックされた時
  $('a[href^="#"]').click(function () {
    // .headerクラスがついた要素の高さを取得
    let header = $(".header").innerHeight();
    let speed = 800;
    let id = $(this).attr("href");
    let target = $("#" == id ? "html" : id);
    // トップからの距離からヘッダー分の高さを引く
    let position = $(target).offset().top - header;
    // その分だけ移動すればヘッダーと被りません
    $("html, body").animate(
      {
        scrollTop: position,
      },
    );
    return false;
  });

  // ブログカードホバーアクション
  $(".card__cont").hover(
    function () {
      //マウスカーソルが重なった時の処理
      $(".card__txtbox").addClass("is-hover");
      $(".card__img").addClass("is-hover");
    },
    function () {
      //マウスカーソルが離れた時の処理
      $(".card__txtbox").removeClass("is-hover");
      $(".card__img").removeClass("is-hover");
    }
  );

  // ページトップボタンホバーアクション
  $(".page-top").hover(
    function () {
      //マウスカーソルが重なった時の処理
      $(".page-top").addClass("is-hover");
      $(".page-top span").addClass("is-hover");
    },
    function () {
      //マウスカーソルが離れた時の処理
      $(".page-top").removeClass("is-hover");
      $(".page-top span").removeClass("is-hover");
    }
  );


});

// ヘッダー追従
jQuery(window).on("scroll", function () {
  if (jQuery(".firstview").height() < jQuery(this).scrollTop()) {
    jQuery(".p-header").addClass("p-header__change-color");
  } else {
    jQuery(".p-header").removeClass("p-header__change-color");
  }
});

// swiper1
var slider1 = new Swiper(".slider1", {
  loop: true,
  effect: "fade",
  autoplay: {
    delay: 4000,
    disableOnInteraction: false,
  },
  speed: 2000,
});
// swiper2
var slider2 = new Swiper(".slider2", {
  loop: true,
  effect: "slide",
  slidesPerView: "auto",
  autoplay: {
    disableOnInteraction: false,
  },
  speed: 700,
  pagination: {
    el: ".swiper-pagination",
    type: "bullets",
    clickable: true,
  },
  scrollbar: {
    el: ".swiper-scrollbar",
    hide: true,
  },
});

// sub-swiper
//メイン
var slider = new Swiper ('.gallery-slider', {
  slidesPerView: 1,
  centeredSlides: true,
  loop: true,
  loopedSlides: 8, //スライドの枚数と同じ値を指定
  navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
  },
});

//サムネイル
var thumbs = new Swiper ('.gallery-thumbs', {
  slidesPerView: 'auto',
  spaceBetween: 24,
  centeredSlides : true,
  autoplay: true,
  speed: 1000,
  loop: true,
  slideToClickedSlide: true,
  breakpoints: {
    // 768px以上の場合
    768: {
      spaceBetween: 8,
      centeredSlides : false,
    }
  }
});

//4系～
//メインとサムネイルを紐づける
slider.controller.control = thumbs;
thumbs.controller.control = slider;


// GSAP
// TweenMax.fromTo('.swiper-wrapper', 1, {height: 0}, {height:'100vh'});

// TweenMax.staggerFromTo('.slide-content__sentence', 0.3, {x:'1em',y:'1.2em',rotateZ: 180} ,{x: 0, y: 0 ,rotateZ: 0, ease: Power2.easeInOut, delay: 1.2}, 0.05);

tl = new TimelineMax();
tl.fromTo('.js-swiper-wrapper', 1, {height: 0}, {height:'100vh'})
.addLabel('up')
.staggerFromTo('.slide-content__sentence', 0.3, {x:'1em',y:'1.2em',rotateZ: 180} ,{x: 0, y: 0 ,rotateZ: 0, ease: Power2.easeInOut}, 0.05, 'up+=0.2')
.fromTo('.slide-content__txt', 1, {opacity:0, y: '100%'}, {opacity: 1, y: '0%'}, 'up+=1.2');