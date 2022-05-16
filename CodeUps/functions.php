<?php
/**
 * Functions
 */

/**
 * WordPress標準機能
 *
 * @codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/add_theme_support
 */
function my_setup() {
	add_theme_support( 'post-thumbnails' ); /* アイキャッチ */
	add_theme_support( 'automatic-feed-links' ); /* RSSフィード */
	add_theme_support( 'title-tag' ); /* タイトルタグ自動生成 */
	add_theme_support(
		'html5',
		array( /* HTML5のタグで出力 */
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);
}
add_action( 'after_setup_theme', 'my_setup' );



/**
 * CSSとJavaScriptの読み込み
 *
 * @codex https://wpdocs.osdn.jp/%E3%83%8A%E3%83%93%E3%82%B2%E3%83%BC%E3%82%B7%E3%83%A7%E3%83%B3%E3%83%A1%E3%83%8B%E3%83%A5%E3%83%BC
 */
function my_script_init()
{
	wp_deregister_script( 'jquery'); //デフォルトの jQuery は読み込まない
	/* swiper.css読み込み */
	wp_enqueue_style(
		'swiper_css',
		'https://unpkg.com/swiper@7/swiper-bundle.min.css'
	);

	wp_enqueue_style( 'my', get_template_directory_uri() . '/assets/css/styles.css', array(), '1.0.1', 'all' );

		/* swiper.js読み込み */
		wp_enqueue_script(
			'swiper_js',
			'https://unpkg.com/swiper@7/swiper-bundle.min.js'
		);

		/* gsap読み込み */
		wp_enqueue_script(
			'gsap_js',
			'//cdnjs.cloudflare.com/ajax/libs/gsap/3.10.2/gsap.min.js'
		);
		wp_enqueue_script(
			'scrolltrigger_js',
			'//cdnjs.cloudflare.com/ajax/libs/gsap/3.8.0/ScrollTrigger.min.js'
		);

		wp_enqueue_script(
			'jquery',
			'https://code.jquery.com/jquery-3.5.1.js'
		);

	wp_enqueue_script( 'my', get_template_directory_uri() . '/assets/js/script.js', array( 'jquery' ), '1.0.1', true );

}
add_action('wp_enqueue_scripts', 'my_script_init');




/**
 * メニューの登録
 *
 * @codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_nav_menus
 */
function my_menu_init() {
	register_nav_menus(
		array(
			'global'  => 'ヘッダーメニュー',
			'utility' => 'ユーティリティメニュー',
			'drawer'  => 'ドロワーメニュー',
		)
	);
}
add_action( 'init', 'my_menu_init' );
/**
 * メニューの登録
 *
 * 参考：https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_nav_menus
 */


/**
 * ウィジェットの登録
 *
 * @codex http://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_sidebar
 */
// function my_widget_init() {
// 	register_sidebar(
// 		array(
// 			'name'          => 'サイドバー',
// 			'id'            => 'sidebar',
// 			'before_widget' => '<div id="%1$s" class="p-widget %2$s">',
// 			'after_widget'  => '</div>',
// 			'before_title'  => '<div class="p-widget__title">',
// 			'after_title'   => '</div>',
// 		)
// 	);
// }
// add_action( 'widgets_init', 'my_widget_init' );


/**
 * アーカイブタイトル書き換え
 *
 * @param string $title 書き換え前のタイトル.
 * @return string $title 書き換え後のタイトル.
 */
function my_archive_title( $title ) {

	if ( is_home() ) { /* ホームの場合 */
		$title = 'ブログ';
	} elseif ( is_category() ) { /* カテゴリーアーカイブの場合 */
		$title = '' . single_cat_title( '', false ) . '';
	} elseif ( is_tag() ) { /* タグアーカイブの場合 */
		$title = '' . single_tag_title( '', false ) . '';
	} elseif ( is_post_type_archive() ) { /* 投稿タイプのアーカイブの場合 */
		$title = '' . post_type_archive_title( '', false ) . '';
	} elseif ( is_tax() ) { /* タームアーカイブの場合 */
		$title = '' . single_term_title( '', false );
	} elseif ( is_search() ) { /* 検索結果アーカイブの場合 */
		$title = '「' . esc_html( get_query_var( 's' ) ) . '」の検索結果';
	} elseif ( is_author() ) { /* 作者アーカイブの場合 */
		$title = '' . get_the_author() . '';
	} elseif ( is_date() ) { /* 日付アーカイブの場合 */
		$title = '';
		if ( get_query_var( 'year' ) ) {
			$title .= get_query_var( 'year' ) . '年';
		}
		if ( get_query_var( 'monthnum' ) ) {
			$title .= get_query_var( 'monthnum' ) . '月';
		}
		if ( get_query_var( 'day' ) ) {
			$title .= get_query_var( 'day' ) . '日';
		}
	}
	return $title;
};
add_filter( 'get_the_archive_title', 'my_archive_title' );


/**
 * 抜粋文の文字数の変更
 *
 * @param int $length 変更前の文字数.
 * @return int $length 変更後の文字数.
 */
function my_excerpt_length( $length ) {
	return 80;
}
add_filter( 'excerpt_length', 'my_excerpt_length', 999 );


/**
 * 抜粋文の省略記法の変更
 *
 * @param string $more 変更前の省略記法.
 * @return string $more 変更後の省略記法.
 */
function my_excerpt_more( $more ) {
	return '...';

}
add_filter( 'excerpt_more', 'my_excerpt_more' );

// 投稿のアーカイブページを作成する
function post_has_archive($args, $post_type)
{
	if ('post' == $post_type) {
		$args['rewrite'] = true; // リライトを有効にする
		$args['has_archive'] = 'news'; // 任意のスラッグ名
	}
		return $args;
}
add_filter('register_post_type_args', 'post_has_archive', 10, 2);

// コンテンツごとにアーカイブの表示件数を変更する
function change_posts_per_page($query) {
	if ( is_admin() || ! $query->is_main_query() )
		return;

		/* アーカイブページの時に表示件数を10件にセット */
	if ( $query->is_archive() ) {
		$query->set( 'posts_per_page', '10' );
	}
		/* ポストアーカイブ(worksの時に表示件数を6件にセット */
	if ( $query->is_post_type_archive('works') ) {
		$query->set( 'posts_per_page', '6' );
	}
		/* ポストアーカイブ(blog)の時に表示件数を9件にセット */
	if ( $query->is_post_type_archive('blog') ) {
		$query->set( 'posts_per_page', '9' );
	}
		/* タクソノミーページの時に表示件数を6件にセット */
	if ( $query->is_tax('works_genre') ) {
		$query->set( 'posts_per_page', '6' );
	}
	if ( $query->is_tax('blog_genre') ) {
		$query->set( 'posts_per_page', '9' );
	}
		/* 検索ページの時に表示件数を20件にセット */
	if ( $query->is_search() ) {
		$query->set( 'posts_per_page', '20' );
	}
}
add_action( 'pre_get_posts', 'change_posts_per_page' );


function is_new(){
	global $wp_query;
	return ($wp_query->current_post === 0);
}

//奇数の記事
function isOdd(){
	global $the_query;
	return ((($the_query->current_post+1) % 2) === 1);
}
//偶数の記事
function isEven(){
	global $the_query;
	return ((($the_query->current_post+1) % 2) === 0);
}
