<?php get_header(); ?>

<main>
    <!-- MV -->
    <div class="contents-mv">
        <div class="contents-mv__img">
            <img src="<?php echo get_template_directory_uri(); ?>/img/about/about_mv.jpg" alt="MRI装置の写真">
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
    <!-- 院長紹介 -->
    <section class="about-introduction">
        <div class="inner">
            <h2 class="about-introduction__title">
                院長紹介
            </h2>
            <div class="about-introduction__img">
                <img src="<?php echo get_template_directory_uri(); ?>/img/about/about_doctor.jpg" alt="院長の写真">
            </div>
            <div class="about-introduction__body">
                <?php the_content(); ?>
                <div class="about-introduction__sign">
                    <span>渡邉脳神経外科クリニック院長</span>
                    <div class="about-introduction__sign-img">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/about/about_doctor_name.png" alt="院長のサイン">
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-circle"></div>
        <div class="bg-circle"></div>
    </section>
    <!-- 院内紹介 -->
    <section class="about-hospital">
        <div class="inner">
            <h2 class="about-hospital__title">
                院内紹介
            </h2>
            <p class="about-hospital__text">
                <?php echo the_field('text'); ?>
            </p>
            <div class="about-hospital__img-container">
                <?php
                for($count = 1; $count <= 6; $count++) {
                    $imgname = "img" .$count;
                    $img = get_field($imgname);
                    if($img):
                ?>
                <div class="about-hospital__img">
                    <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
                </div>
                <?php
                    endif;
                }
                ?>
            </div>
        </div>
        <div class="bg-circle"></div>
    </section>


</main>

<?php get_footer(); ?>