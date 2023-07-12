<?php get_header(); ?>

<main>
    <!-- MV -->
    <div class="contents-mv">
        <div class="contents-mv__img contact-mv-img">
            <picture>
				<source srcset="<?php echo get_template_directory_uri(); ?>/img/contact/contact_mvpc.jpg" media="(min-width: 768px)">
				<img src="<?php echo get_template_directory_uri(); ?>/img/contact/contact_mvsp.jpg" alt="回路で脳を表したイラスト">
			</picture>
        </div>
        <div class="contents-mv__text">
            <p class="contents-mv__slug">
                <?php
                $parent_id = $post->post_parent;
                echo get_post($parent_id)->post_name;
                ?>
            </p>
            <h2 class="contents-mv__title">
                <?php echo get_post($parent_id)->post_title; ?>
            </h2>
        </div>
    </div>
    <!-- パンくずリスト -->
    <div class="inner">
        <nav class="top-breadcrumbs breadcrumbs">
            <ol class="breadcrumbs__items">
                <li>
                    <a href="<?php echo home_url( '/' ); ?>">home</a>
                </li>
                <?php
                // 親ページのidを遡って先祖まで取得
                // 親→先祖の順から先祖→親に並び替え
                $ancestors_ids = array_reverse(get_post_ancestors($post));
                ?>
                <?php
                foreach( $ancestors_ids as $ancestors_id ){ ?>
                <li>
                    <a href="<?php echo get_page_link( $ancestors_id ); ?>"><?php echo get_page($ancestors_id)->post_title; ?></a>
                </li>
                <?php } ?>
                <li>
                    <?php the_title(); ?>
                </li>
            </ol>
        </nav>
    </div>
    <!-- 送信完了 -->
    <section class="thanks">
        <div class="inner thanks__inner">
            <div class="section-title thanks__title">
                <div class="section-title__img">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/common/title.png" alt="脳のイラスト">
                </div>
                <h2 class="section-title__title thanks__title-title">
                    送信完了
                </h2>
                <?php the_content(); ?>
            </div>
            <div class="thanks__btn">
                <a href="<?php echo home_url( '/' ); ?>" class="btn">ホームへ戻る</a>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>