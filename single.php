<?php get_header(); ?>

<main>
	<!-- MV -->
    <div class="contents-mv">
        <div class="contents-mv__img news-mv-img">
			<picture>
				<source srcset="<?php echo get_template_directory_uri(); ?>/img/news/news_mvpc.jpg" media="(min-width: 768px)">
				<img src="<?php echo get_template_directory_uri(); ?>/img/news/news_mvsp.jpg" alt="回路で脳を表したイラスト">
			</picture>
        </div>
        <div class="contents-mv__text">
            <p class="contents-mv__slug">
                news
            </p>
            <h2 class="contents-mv__title">
                お知らせ
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
					<a href="/news/">お知らせ</a>
				</li>
				<?php
				if( has_category() ){
					$postcat = get_the_category();
					echo '<li><a href="'.get_category_link($postcat[0]->term_id).'">'.$postcat[0]->name.'</a></li>';
				}
				?>
            </ol>
        </nav>
    </div>
	<!-- 投稿記事 -->
	<section class="singlepost">
		<div class="inner singlepost__inner">
			<div class="singlepost__wrapper">
				<?php
				if( have_posts() ){
					while( have_posts() ){
						the_post();
						if( has_post_thumbnail() ){
							$id = get_post_thumbnail_id();
							$img_src = wp_get_attachment_image_src($id, 'full')[0];
							$img_alt = get_post_meta($id, '_wp_attachment_image_alt', true);
						} else{
							$img_src = get_template_directory_uri()."/img/news/news_mvpc.jpg";
							$img_alt = "回路で脳を表したイラスト";
						} ?>
						<div class="singlepost__img">
							<img src="<?php echo $img_src; ?>" alt="<?php echo $img_alt; ?>">
						</div>
						<div class="singlepost__meta">
							<?php
							$this_categories = get_the_category();
							$this_category_color = get_field('color', 'category_'.$this_categories[0]->term_id);
							$this_category_name = $this_categories[0]->name;
							?>
							<span class="singlepost__category" style="<?php echo 'color:'.$this_category_color; ?>">
								<?php echo $this_category_name; ?>
							</span>
							<time class="singlepost__date" datetime="<?php the_time('Y-m-d'); ?>">
								<?php the_time('Y.m.d'); ?>
							</time>
						</div>
						<h3 class="singlepost__title">
							<?php echo the_title(); ?>
						</h3>
						<div class="singlepost__text">
							<?php echo the_content(); ?>
						</div>
					<?php }
				}
				?>
				<!-- リンク -->
				<div class="singlepost__link">
					<!-- ページネーション -->
					<div class="singlepost__pagination">
						<?php
						$nextpost = get_adjacent_post(false, '', false);
						if( $nextpost ){ ?>
							<div class="singlepost__pagination-left">
								<a href="<?php echo get_permalink($nextpost->ID); ?>">
									前の記事
								</a>
							</div>
						<?php } ?>
						<?php
						$prevpost = get_adjacent_post(false, '', true);
						if( $prevpost ){ ?>
							<div class="singlepost__pagination-right">
								<a href="<?php echo get_permalink($prevpost->ID); ?>">
									後の記事
								</a>
							</div>
						<?php } ?>
					</div>
					<div class="singlepost__btn">
						<a href="/news/" class="btn">お知らせ一覧へ</a>
					</div>
				</div>
			</div>
			<div class="singlepost-side__wrapper">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</section>
		
</main>

<?php get_footer(); ?>