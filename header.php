<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <!-- meta情報 -->
    <title>渡邉脳神経外科クリニック</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <!-- 検索にかからないようにする -->
    <meta name="robots" content="noindex">
    <!-- ogp -->
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <meta property="og:site_name" content="">
    <meta property="og:description" content="">
    <!-- ファビコン -->
    <link rel="shortcut icon" href="#" type="image/x-icon">
    <!-- css -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/vegas/2.5.4/vegas.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css">
    <?php wp_enqueue_script('jquery'); ?>
    <?php wp_head(); ?>
    <!-- JavaScript -->
    <script>
        var path ="<?php echo get_template_directory_uri(); ?>";
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vegas/2.5.4/vegas.min.js"></script>
    <script defer src="<?php echo get_template_directory_uri(); ?>/js/script.js"></script>
    <!-- WordPressログイン時の余白消去 -->
    <?php if( is_user_logged_in() ) : ?>
        <style type="text/css" media="screen and (max-width: 767px)">
    html {
        margin-top: 0 !important;
    }
    </style>
    <style type="text/css" media="screen and (min-width: 768px)">
    .header {
        margin-top: 32px;
    }
    </style>
    <?php endif; ?>
</head>
<body>
	<!-- ヘッダー -->
    <header class="header">
        <div class="header__inner">
            <!-- ヘッダーロゴ -->
            <h1 class="header__logo">
                <?php
                $logo_url = get_the_logo_url('logo_url'); //変数logo_urlを宣言
                if($logo_url): //変数logo_urlに値が入っていれば
                ?>
                <a href="<?php echo home_url( '/' ); ?>">
                    <img src="<?php echo get_the_logo_url(); ?>" alt="<?php bloginfo('name'); ?>" />
                </a>
                <?php else: //変数logo_urlの値が空なら
                ?>
                <a href="<?php echo home_url( '/' ); ?>">
                    <?php bloginfo('name'); ?>
                </a>
                <?php endif; ?>
            </h1>
            <!-- ハンバーガーメニュー -->
            <button class="header__hamburger hamburger js-hamburger">
                <span class="hamburger__bar"></span>
                <span class="hamburger__bar"></span>
                <span class="hamburger__bar"></span>
            </button>
            <!-- ヘッダーメニュー -->
            <?php
            $args = array(
                'menu'				=> 'header-menu',
                // 'menu_class'		=> 'menu',
                // 'menu_id'			=> '{メニューのスラッグ}-{連番}',
                'container'			=> 'nav',
                'container_class'	=> 'header__nav header-nav js-drawer',
                // 'container_id'		=> 'menubar',
                // 'fallback_db'		=> 'wp_page_menu',
                // 'before'			=> '',
                // 'after'				=> '',
                'link_before'		=> '<span>',
                'link_after'		=> '</span>',
                // 'echo'				=> true,
                // 'depth'				=> 0,
                // 'walker'			=> '',
                // 'theme_location'	=> '',
            );
            wp_nav_menu( $args );
            ?>
        </div>
    </header>
    <div class="header-circle"></div>