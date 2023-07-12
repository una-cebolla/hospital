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
				<?php
				if( is_category() ) {
					$postcat = get_the_category();
					echo '<li><a href="/news/">お知らせ</a></li>';
					echo '<li>'.$postcat[0]->name.'</li>';
				} elseif( is_year() ){
					echo '<li><a href="/news/">お知らせ</a></li>';
					echo '<li>'.get_query_var('year').'年</li>';
				} elseif( is_month() ) {
					$year = get_query_var('year');
					echo '<li><a href="/news/">お知らせ</a></li>';
					echo '<li><a href="'.get_year_link( $year ).'">'.$year.'年</a></li>';
					echo '<li>'.get_query_var('monthnum').'月</li>';
				} else {
					echo '<li>お知らせ</li>';
				}
				?>
            </ol>
        </nav>
    </div>
	<!-- お知らせ一覧 -->
	<section class="news">
		<div class="inner news__inner">
			<div class="news-items__wrapper">
				<ul class="news-items">
					<?php
					if(have_posts()){
						while(have_posts()): the_post();
					?>
					<li class="news-item news__item">
						<a href="<?php the_permalink(); ?>">
							<div class="news-item__text">
								<?php
								$this_categories = get_the_category();
								$this_category_color = get_field('color', 'category_'.$this_categories[0]->term_id);
								$this_category_name = $this_categories[0]->name;
								?>
								<span class="news-item__category" style="<?php echo 'color:'.$this_category_color; ?>">
									<?php echo $this_category_name; ?>
								</span>
								<h3 class="news-item__title text-ellipsis">
									<?php echo the_title(); ?>
								</h3>
								<time class="news-item__date" datetime="<?php the_time('Y-m-d'); ?>">
									<?php the_time('Y.m.d'); ?>
								</time>
							</div>
							<div class="news-item__img">
								<?php
								if(has_post_thumbnail()):
									$id = get_post_thumbnail_id();
									$img_src = wp_get_attachment_image_src($id, 'full')[0];
									$img_alt = get_post_meta($id, '_wp_attachment_image_alt', true);
								else:
									$img_src = get_template_directory_uri()."/img/news/news_mvpc.jpg";
									$img_alt = "回路で脳を表したイラスト";
								endif;
								?>
								<img src="<?php echo $img_src; ?>" alt="<?php echo $img_alt; ?>">
							</div>
						</a>
					</li>
					
					<?php
						endwhile;
						wp_reset_postdata();
					} else{
					?>
						<p?>お知らせはありません。</p>
					<?php } ?>
				</ul>
				<!-- ページネーション -->
				<?php
				if( function_exists('pagenation') ){
					pagenation('', 2);
				} ?>
			</div>
			<div class="news-side__wrapper">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</section>
	

</main>

<?php get_footer(); ?>