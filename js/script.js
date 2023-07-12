jQuery(function ($) {
    // ハンバーガーメニュークリック時
    $('.js-hamburger').on('click', function() {
        $(this).toggleClass('is-open');
        $('.header-circle').toggleClass('is-open');
        $('.js-drawer').toggleClass('is-open');
        $('.top-mv__title').toggleClass('is-none');
        $('html').toggleClass('fixed');
    });

    // ドロワーメニューのリンクがクリックされたら
    $('.js-drawer a').on('click', function() {
        $('.js-hamburger').removeClass('is-open');
        $('.header-circle').removeClass('is-open');
        $('.js-drawer').removeClass('is-open');
        $('body').removeClass('fixed');
    })

    // MVのスライド設定
    // 画像設定
    var windowwidth = window.innerWidth||document.documentElement.clientWidth||0;
    if(windowwidth >= 768){
        var responsiveImage = [ //PC用画像
            {src: path + '/img/top/top_mv1.jpg'},
            {src: path + '/img/top/top_mv2.jpg'},
            {src: path + '/img/top/top_mv3.jpg'}
        ];
    } else{
        var responsiveImage = [ //SP用画像
            {src: path + '/img/top/top_mv1sp.jpg'},
            {src: path + '/img/top/top_mv2sp.jpg'},
            {src: path + '/img/top/top_mv3sp.jpg'}
        ];
    }
    // Vegas全体の設定
    $('#mv-slider').vegas({
        overlay: false, //画像上の網線やドットのオーバーレイパターンの有無
        transition: 'fade2',    //切り替わりのアニメーション
        transitionDuration: 2000,   //切り替わりのアニメーション時間(ミリ秒単位)
        delay: 5000,    //スライド間の遅延(ミリ秒単位)
        animationDuration: 20000,   //スライドアニメーション時間(ミリ秒単位)
        animation: 'random',    //スライドアニメーションの種類
        slides: responsiveImage,    //画像設定を読み込む
        timer: false,   //プログレスバーを非表示にする
    });

    // ページトップへ戻る
    // var windowHeight = $(window).height();
    var windowHeight = 200;
    $(window).scroll(function(){
        if($(this).scrollTop() > windowHeight) {
            $('.js-scroll').addClass('is-fadein');
        } else{
            $('.js-scroll').removeClass('is-fadein');
        }
    });
    $('.js-scroll').on('click', function(){
        $('body, html').animate({
            scrollTop: 0
        }, 500);
    });

    // スムーススクロール
    $('a[href^="#"').click(function() {
        var adjust = -($('.header').outerHeight()) - 10;
        var speed = 500;
        var href = $(this).attr("href");
        var target = $(href == "#" || href == "" ? 'html' : href);
        var position = target.offset().top + adjust;
        $('body, html').animate({scrollTop:position}, speed, 'swing');
        return false;
    });

});