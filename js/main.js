"use strict";

window.addEventListener("load", function() {
  // =====================
  // 関数実行
  // =====================
  common();
  front();

  // =====================
  // 関数宣言
  // =====================

    //共通
    function common() {
      headerAddMargin();

  
      // ヘッダーの分マージンを入れる
      function headerAddMargin() {
        const header = document.querySelector(".header");
  
        if (!header) return;
  
        const height = $(".header").height();
        const targetElem = $(".breadcrumb").length ? ".breadcrumb" : ".main";
        $(targetElem).css("padding-top", height);
      }
    }

        // ハンバーガーメニュー
        $(function(){
          $('.ham_btn').on('click', function(){
            var windowSize = window.innerWidth;
            if(windowSize>1200) {
              return false;
            } else {
              $('.ham_btn').toggleClass('active');
              $('.sp_nav').toggleClass('active');
              // $('.ham_menu').slideToggle();
            }
          });
          // メニュー内の「コンタクトフォームはこちら」をクリックしたとき、メニューを閉じる
          $('.sp_link').on('click', function(){
            $('.ham_btn, .sp_nav').removeClass('active');
          });
        });
        

      //TOPページ
  function front() {
    const frontMain = document.querySelector("main.front");
    const formError = document.querySelector(".wpcf7-not-valid-tip");

    if (!frontMain) return;

    pageNavi();

    // ページ内リンク
    function pageNavi() {
      document.querySelectorAll("[data-id]").forEach(function(element) {
        element.addEventListener("click", function() {
          const id = this.getAttribute("data-id"); // data-idのidを取得
          const target = document.querySelector('[data-target="' + id + '"]');
          scrollToAnchor(target);
          return false;
        });
      });
      
      function scrollToAnchor(target) {
        let headerHeight = document.querySelector(".header").offsetHeight;
        if (target) {
          const position = target.getBoundingClientRect().top + window.scrollY - headerHeight + 30;
          window.scrollTo({
            top: position,
            behavior: "smooth"
          });
        }
      }
    }
  }

    //スクロール共通パーツ
    function scrollToElem(element) {
      const adjust = 250;
      const scrollPos = element.offsetTop - adjust;
  
      $("body,html").animate({ scrollTop: scrollPos }, 600, "swing");
    }

  });

  // エラー時に、一つ目のエラー要素までスクロール
jQuery(function ($) {
  // Contact Form 7
  var wpcf7El = document.querySelector(".wpcf7")

  // エラーが発生した時
  wpcf7El.addEventListener("wpcf7invalid", function() {
    var speed = 1000; // スクロール速度
    var headerHeight = $(".inner").innerHeight(); // ヘッダーの高さを取得
    setTimeout(function () {
      var firstErrorEl = $(".wpcf7-not-valid:first"); // エラーが発生した1番目の要素を取得
      var scrollAmount = firstErrorEl.offset().top - headerHeight -50; // 要素までのスクロール距離を取得
      $("html, body").animate({ scrollTop: scrollAmount }, speed, "swing"); // 該当箇所までスクロール
    }, 500);
  },false );
});

/////////////////////////////
// 375px未満(レスポンシブ対応)
/////////////////////////////
!(function () {
  const viewport = document.querySelector('meta[name="viewport"]');
  function switchViewport() {
    const value =
      window.outerWidth > 375
        ? 'width=device-width,initial-scale=1'
        : 'width=375';
    if (viewport.getAttribute('content') !== value) {
      viewport.setAttribute('content', value);
    }
  }
  addEventListener('resize', switchViewport, false);
  switchViewport();
})();