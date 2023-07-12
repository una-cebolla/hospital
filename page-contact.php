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
    <!-- お問い合わせフォーム -->
    <section class="contact">
        <div class="inner contact__inner">
            <div class="section-title contact__title">
                <div class="section-title__img">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/common/title.png" alt="脳のイラスト">
                </div>
                <h2 class="section-title__title contact__title-title">
                    お問い合わせフォーム
                </h2>
                <p class="contact__title-text">
                    ご質問、ご要望、ご相談は下記フォームを<span>ご利用ください。</span><br>
                    ※体調に不安がある方は、直接医師の診察をお勧めします。
                </p>
            </div>
            <div class="contact-form">
                <?php echo do_shortcode('[contact-form-7 id="5" title="contactform"]'); ?>
            </div>
        </div>
        
    </section>

</main>

<?php get_footer(); ?>