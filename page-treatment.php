<?php get_header(); ?>

<main>
	<!-- MV -->
    <div class="contents-mv">
        <div class="contents-mv__img treatment-mv-img">
            <img src="<?php echo get_template_directory_uri(); ?>/img/treatment/treatment_mv.jpg" alt="脳を手で支えている様子">
        </div>
        <div class="contents-mv__text">
            <p class="contents-mv__slug">
                <?php echo get_post_field( 'post_name', get_the_ID() ); ?>
            </p>
            <h2 class="contents-mv__title">
                <?php the_title(); ?>
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
                <li>
                    <?php the_title(); ?>
                </li>
            </ol>
        </nav>
    </div>
    <!-- ページ内リンクボタン -->
    <div class="treatment-btns">
        <?php
        $terms = get_terms('treatment_category', [
            'orderby' => 'ID'
        ]);
        foreach($terms as $term){
            ?>
            <div class="treatment-btns__btn">
                <a href="#<?php echo $term->slug; ?>" class="btn"><?php echo $term->name; ?></a>
            </div>
        <?php } ?>
    </div>
    <!-- 症状一覧 -->
    <div class="treatment-cat-outer">
    <!-- カテゴリーのループ -->
    <?php
    $terms = get_terms('treatment_category', [
        'orderby' => 'ID'
    ]);
    foreach($terms as $term){
        ?>
        <section class="treatment-cat" id="<?php echo $term->slug; ?>">
            <div class="inner">
                <div class="treatment-cat-head">
                    <div class="treatment-cat-head__img">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/common/title.png" alt="">
                    </div>
                    <h2 class="treatment-cat-head__title">
                    <?php echo $term->name; ?>
                    </h2>
                    <p class="treatment-cat-head__text">
                        <!-- <?php echo $headText[$term->slug] ?> -->
                        <?php echo nl2br($term->description); ?>
                    </p>
                </div>
                <div class="treatment-cat-body">
                    <!-- カテゴリーに属する記事のループ -->
                    <?php
                    $args = array(
                        'post_type' => 'post_treatment',
                        'order' => 'ASC',
                        'orderby' => 'ID',
                        'taxonomy' => 'treatment_category',
                        'term' => $term->slug,
                    );
                    $the_query = new WP_Query($args);
                    if($the_query->have_posts()):
                    while($the_query->have_posts()): $the_query->the_post();
                    ?>
                    <div class="treatment-cat-body__item treatment-cat-item zoom-img">
                        <a href="<?php the_permalink(); ?>">
                            <div class="treatment-cat-item__img zoom-img__mask">
                                <?php
                                if(has_post_thumbnail()):
                                    $id = get_post_thumbnail_id();
                                    if($img = get_field('linkimg_pc')):
                                        $img_pcsrc = $img['url'];
                                    else:
                                        $img_pcsrc = wp_get_attachment_image_src($id, 'full')[0];
                                    endif;
                                    if($img = get_field('linkimg_sp')):
                                        $img_spsrc = $img['url'];
                                    else:
                                        $img_spsrc = wp_get_attachment_image_src($id, 'full')[0];
                                    endif;
                                    $img_alt = get_post_meta($id, '_wp_attachment_image_alt', true);
                                endif;
                                ?>
                                <picture>
                                    <source srcset="<?php echo $img_pcsrc; ?>" media="(min-width: 768px)">
                                    <img src="<?php echo $img_spsrc; ?>" alt="<?php echo $img_alt; ?>">
                                </picture>
                            </div>
                            <h3 class="treatment-cat-item__title">
                                <?php the_title(); ?>
                            </h3>
                        </a>
                    </div>
                    <?php endwhile;
                    wp_reset_postdata();
                    else:
                    ?>
                    <p>準備中です</p>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php } ?>
    </div>
</main>

<?php get_footer(); ?>