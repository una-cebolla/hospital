    <!-- ページトップへ戻るボタン -->
    <button class="scroll-top-btn js-scroll">
        <span></span>
    </button>
    <!-- フッター -->
    <footer class="footer">
        <div class="footer__inner inner">
            <div class="footer__container">
                <!-- フッターメニュー -->
                <?php 
                $args = array(
                    'menu'				=> 'footer-menu',
                    // 'menu_class'		=> 'menu',
                    // 'menu_id'			=> '{メニューのスラッグ}-{連番}',
                    'container'			=> 'nav',
                    'container_class'	=> 'footer__nav footer-nav',
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
                <div class="footer__logo-wrapper">
                    <h2 class="footer__logo">
                        <a href="<?php echo home_url( '/' ); ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/common/footer_logo.png" alt="渡邉脳神経外科クリニック">
                        </a>
                    </h2>
                </div>
                <div class="footer__address">
                    <p class="footer__address-address">
                        福岡県福岡市中央区渡邉123
                    </p>
                    <p class="footer__address-tel">
                        Tel. 093-0000-0000
                    </p>
                </div>
            </div>
        </div>
        <div class="footer__copy">
                <small>&copy;2022 Watanabe neuro-spone clinic</small>
        </div>
    </footer>


    <?php wp_footer(); ?>
</body>
</html>