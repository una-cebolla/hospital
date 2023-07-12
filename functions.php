<?php
// カスタマイザーにロゴ画像の項目を追加
add_action( 'customize_register', 'theme_customize' );
function theme_customize($wp_customize){
	//ロゴ画像
	$wp_customize->add_section( 'logo_section', array(
		'title' => 'ロゴ画像',	//セクションのタイトル
		'priority' => 59,		//セクションの位置
		'description' => 'ロゴ画像を使用する場合はアップロードしてください。画像を使用しない場合はタイトルがテキストで表示されます。', //セクションの説明
	));

	$wp_customize->add_setting( 'logo_url' );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo_url', array(
		'label' => 'ロゴ画像',			//セッティングのタイトル
		'section' => 'logo_section',	//セクションID
		'settings' => 'logo_url',		//セッティングID
		'description' => 'ロゴ画像を設定してください。', //セッティングの説明
	)));
}

// ロゴ画像のURL呼び出し関数
function get_the_logo_url(){
	return esc_url( get_theme_mod( 'logo_url' ) );
}

// 編集項目追加
function custom_setup(){
    add_theme_support('post-thumbnails');	//アイキャッチ画像
    add_theme_support('menus');				//メニュー
}
add_action('after_setup_theme', 'custom_setup');

// スラッグ名が日本語だったら自動的に投稿タイプ+idへ変更
function auto_post_slug( $slug, $post_ID, $post_status, $post_type ) {
    if ( preg_match( '/(%[0-9a-f]{2})+/', $slug ) ) {
        $slug = utf8_uri_encode( $post_type ) . '-' . $post_ID;
    }
    return $slug;
}
add_filter( 'wp_unique_post_slug', 'auto_post_slug', 10, 4  );

// アーカイブ紐づけ
function post_has_archive($args, $post_type) {
	if('post' == $post_type) {
		$args['rewrite'] = true;
		$args['label'] = 'お知らせ';
		$args['has_archive'] = 'news';
	}
	return $args;
}
add_filter('register_post_type_args', 'post_has_archive', 10, 2);

// ページネーション関数
function pagenation($pages = '', $range = 2){
	$showitems = ($range * 2) + 1;
	global $paged;
	if(empty($paged)) $paged = 1;
	if($pages == ''){
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if(!$pages) {
			$pages = 1;
		}
	}
	if($pages){
		// 画像を使う時用に、テーマのパスを取得
		// $img_pass = get_template_directory_uri();
		echo "<nav class=\"m-pagenation\">";
		// [1/2]表示　現在のページ数/総ページ数
		// echo "<div class=\"m-pagenation__result\">".$paged."/".$pages."</div>";
		// 「前へ」ボタン
		if($paged > 1){
			echo "<div class=\"m-pagenation__prev\"><a href='".get_pagenum_link($paged - 1)."'>&lt;</a></div>";
		} else{
			echo "<div class=\"m-pagenation__prev m-pagenation--no-link\"><span>&lt;</span></div>";
		}
		// ページ番号リスト
		echo "<ol class=\"m-pagenation__body\">\n";
		// [...]表示
		if(($paged - $range ) > 1 && 0 < ( $pages - $showitems ) ){
			// echo "<li><a href='".get_pagenum_link(1)."'>1</a></li>";	//先頭ページのボタン
			echo "<li class=\"m-pagenation__omit\"><span>…</span></li>";
		}
		// ページ番号表示
		for($i=1; $i <= $pages; $i++){
			if( (( $paged - $range ) <= $i && $i <= ( $paged + $range )) ||
			(( $paged + $range ) <= $showitems && $i <= $showitems ) ||
			(( $pages - $showitems ) < ( $paged - $range ) && ( $pages - $showitems ) < $i )
			)
			{
				if($paged == $i){
					echo "<li class=\"m-pagenation__btn m-pagenation--current\"><span>".$i."</span></li>";
				} else{
					echo "<li class=\"m-pagenation__btn\"><a href='".get_pagenum_link($i)."'>".$i."</a></li>";
				}
			}
		}
		// [...]表示
		if(( $paged + $range ) < $pages && 0 < ( $pages - $showitems ) ){
			echo "<li class=\"m-pagenation__omit\"><span>…</span></li>";
			// echo "<li><a href='".get_pagenum_link($pages)."'>".$pages."</a></li>";	//最終ページのボタン
		}
		echo "</ol>\n";
		// 「次へ」ボタン
		if($paged < $pages){
			echo "<div class=\"m-pagenation__next\"><a href='".get_pagenum_link($paged + 1)."'>&gt;</a></div>";
		} else{
			echo "<div class=\"m-pagenation__next m-pagenation--no-link\"><span>&gt;</span></div>";
		}
		echo "</nav>\n";
	}
}

// ContactForm7で自動挿入されるpタグ、brタグを削除
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false() {
	return false;
}

// 問い合わせ送信が完了したら完了ページに遷移
add_action('wp_footer', 'redirect_to_thanks_page');
function redirect_to_thanks_page() {
	$homeUrl = home_url();
	echo <<< EOD
		<script>
			document.addEventListener( 'wpcf7mailsent', function( event ) {
				location = '{$homeUrl}/contact/thanks/';
			}, false);
		</script>
	EOD;
}

?>