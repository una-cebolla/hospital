<?php get_header(); ?>

<main>
	<!-- MV -->
    <div class="contents-mv">
        <div class="contents-mv__img post-treatment-mv-img">
            <img src="<?php echo get_template_directory_uri(); ?>/img/treatment/treatment_mv.jpg" alt="脳を手で支えている様子">
        </div>
        <div class="contents-mv__text">
            <p class="contents-mv__slug">
                treatment
            </p>
            <h2 class="contents-mv__title">
                診療科目
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
					<a href="/treatment/">診療科目</a>
				</li>
                <li>
					<?php the_title(); ?>
				</li>
            </ol>
        </nav>
    </div>
	<!-- 投稿記事の表示 -->
	<section class="post-treatment">
		<div class="inner post-treatment__inner">
			<?php
			if(have_posts()):
				while(have_posts()): the_post();
				if(has_post_thumbnail()):
					$id = get_post_thumbnail_id();
					$img_src = wp_get_attachment_image_src($id, 'full')[0];
					$img_alt = get_post_meta($id, '_wp_attachment_image_alt', true);
				endif; ?>
			<div class="post-treatment__img">
				<img src="<?php echo $img_src; ?>" alt="<?php echo $img_alt; ?>">
			</div>
			<h3 class="post-treatment__title">
				<?php the_title(); ?>
			</h3>
			<div class="post-treatment__text">
				<?php the_content(); ?>
			</div>
			<?php endwhile;
			wp_reset_postdata();
			else: ?>
			<p>準備中です</p>
			<?php endif; ?>
		</div>
		<div class="post-treatment__btn">
			<a href="/treatment/" class="btn">診療科目一覧へ</a>
		</div>
	</section>
</main>

<?php get_footer(); ?>