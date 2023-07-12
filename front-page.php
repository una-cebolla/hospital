<?php get_header(); ?>

<main>
    <!-- MV -->
    <div class="top-mv">
        <div class="top-mv__title">
            <picture>
                <source srcset="<?php echo get_template_directory_uri(); ?>/img/top/top_mv-text.svg" media="(min-width: 768px)">
                <img src="<?php echo get_template_directory_uri(); ?>/img/top/top_mv-textsp.svg" alt="頭痛・めまい・物忘れ　あなたの第一の相談相手">
            </picture>
        </div>
        <div class="top-mv__body">
            <div id="mv-slider" class="top-mv__slider"></div>
            <div class="top-mv__bg"></div>
        </div>
        <!-- 背景 -->
        <div class="bg-circle"></div>
    </div>

    <!-- News -->
    <section class="top-news">
        <div class="top-news__inner">
            <div class="section-title">
                <div class="section-title__img">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/common/title.png" alt="脳のイラスト">
                </div>
                <h2 class="section-title__title">
                    お知らせ
                </h2>
                <p class="section-title__slug">
                    news
                </p>
            </div>
            <ul class="top-news__items">
                <?php
                    $args = array(
                        'post_type' => 'post',  //投稿ページを指定
                        'posts_per_page' => 3   //表示件数を3件に指定
                    );
                    $the_query = new WP_Query($args);
                ?>
                <?php if($the_query->have_posts()): ?>
                    <?php while($the_query->have_posts()):$the_query->the_post(); ?>
                    <li class="top-news-item top-news__item">
                        <a href="<?php the_permalink(); ?>" class="btn-arrow-slide top-news-item__btn">
                            <div class="top-news-item__body">
                                <div class="top-news-item__meta">
                                    <!-- 日付 -->
                                    <time datetime="<?php the_time('Y-m-d'); ?>">
                                        <?php the_time('Y.m.d'); ?>
                                    </time>
                                    <!-- カテゴリー -->
                                    <?php
                                        $this_categories = get_the_category();
                                        $this_category_color = get_field( 'color', 'category_' .$this_categories[0]->term_id );
                                        $this_category_name = $this_categories[0]->name;
                                    ?>
                                    <!-- カテゴリーの色はstyle直書き -->
                                    <span class="top-news-item__category" style="<?php echo 'color:' .$this_category_color; ?>">
                                        <?php echo $this_category_name; ?>
                                    </span>
                                </div>
                                <!-- タイトル -->
                                <h3 class="top-news-item__title">
                                    <?php the_title(); ?>
                                </h3>
                            </div>
                        </a>
                    </li>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php else: ?>
                    <p>お知らせはありません。</p>
                <?php endif; ?>
            </ul>
            <div class="top-news__btn">
                <a href="<?php echo home_url(); ?>/news/" class="btn-arrow">もっと見る</a>
            </div>
        </div>
        <!-- 背景 -->
        <div class="bg-circle"></div>
    </section>

    <!-- About,Treatment -->
    <div class="top-contents-outer">
    <?php
        $args = array(
            'post_type' => 'page',  //固定ページを指定
            'post__in' => array(13, 15),  //クリニックのご紹介、診療科目を指定
            'orderby' => 'ID',  //ID順にソート
            'order' => 'ASC'    //ID昇順
        );
        $the_query = new WP_Query($args);
    ?>
    <?php if($the_query->have_posts()): ?>
        <?php while($the_query->have_posts()):$the_query->the_post(); ?>
            <section class="top-contents">
                <div class="inner">
                    <div class="top-contents__wrapper">
                        <div class="top-contents__images">
                            <div class="top-contents__img-back">
                                <picture>
                                    <?php $img = get_field('topimg_back_pc'); ?>
                                    <source srcset="<?php echo $img['url']; ?>" media="(min-width:768px)">
                                    <?php $img = get_field('topimg_back_sp'); ?>
                                    <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
                                </picture>
                            </div>
                            <div class="top-contents__img-front">
                                <picture>
                                    <?php $img = get_field('topimg_front_pc'); ?>
                                    <source srcset="<?php echo $img['url']; ?>" media="(min-width:768px)">
                                    <?php $img = get_field('topimg_front_sp'); ?>
                                    <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
                                </picture>
                            </div>
                        </div>
                        <div class="top-contents__body">
                            <div class="top-contents__title section-title">
                                <div class="section-title__img">
                                    <img src="<?php echo get_template_directory_uri(); ?>/img/common/title.png" alt="脳のイラスト">
                                </div>
                                <h2 class="section-title__title">
                                    <?php the_title(); ?>
                                </h2>
                                <p class="section-title__slug">
                                    <?php echo get_post_field( 'post_name', get_the_ID() ); ?>
                                </p>
                            </div>
                            <div class="top-contents__text">
                                <h3 class="top-contents__text-title">
                                    <?php the_field("top-title"); ?>
                                </h3>
                                <p class="top-contents__text-text">
                                    <?php the_field("top-text"); ?>
                                </p>
                            </div>
                            <div class="top-contents__btn">
                                <a href="<?php the_permalink(); ?>" class="btn-arrow">
                                    <span class="u-desktop"><?php the_title(); ?>へ</span>
                                    <span class="u-mobile">もっと見る</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
    <?php else: ?>
        <p>公開までしばらくお待ち下さい</p>
    <?php endif; ?>
        <!-- 背景 -->
        <div class="bg-circle"></div>
    </div>

    <!-- Contact -->
    <section class="top-contact">
        <div class="top-contact__inner inner">
        <?php
        $args = array(
            'post_type' => 'page',  //固定ページを指定
            'name' => 'contact'
        );
        $the_query = new WP_Query($args);
        ?>
        <?php if($the_query->have_posts()): ?>
        <?php while($the_query->have_posts()):$the_query->the_post(); ?>
            <div class="top-contact__img">
                <?php $img = get_field('top-img'); ?>
                <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
            </div>
            <div class="top-contact__body">
                <div class="top-contact__title section-title">
                    <div class="section-title__img">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/common/title.png" alt="脳のイラスト">
                    </div>
                    <h2 class="section-title__title">
                        <?php the_title(); ?>
                    </h2>
                    <p class="section-title__slug">
                        <?php echo get_post_field( 'post_name', get_the_ID() ); ?>
                    </p>
                </div>
                <div class="top-contact__text">
                    <p class="top-contact__text-text">
                        <?php the_field('top-text'); ?>
                    </p>
                </div>
                <div class="top-contact__btn">
                    <a href="<?php the_permalink(); ?>" class="btn-arrow">
                        <span><?php the_title(); ?>へ</span>
                    </a>
                </div>
            </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
        <?php else: ?>
            <p>公開までしばらくお待ち下さい</p>
        <?php endif; ?>
        </div>
        <!-- 背景 -->
        <div class="bg-circle"></div>
    </section>

    <!-- access -->
    <section class="top-access">
        <div class="top-access__inner inner">
            <div class="top-access__title section-title">
                <div class="section-title__img">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/common/title.png" alt="脳のイラスト">
                </div>
                <h2 class="section-title__title">
                    アクセス
                </h2>
                <p class="section-title__slug">
                    access
                </p>
            </div>
            <div class="top-access__map">
                <?php echo get_field('location'); ?>
            </div>
            <p class="top-access__text">
                病院の敷地内に6台の駐車スペースを<span>ご用意しております。</span><br>
                ※駐車場内での事故等のトラブルについては一切責任を負いかねます。あらかじめご了承ください。
            </p>
            <div class="top-access__time">
                <?php $img = get_field('time'); ?>
                <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
