<?php get_header(); ?>

<section class="p-single-news">
	<div class="p-single-news__inner l-inner js-single-news">
		<!-- breadcrumb -->
		<div class="c-breadcrumb">
			<?php
			if ( function_exists( 'bcn_display' ) ) {
				bcn_display();
			}
			?>
		</div>
	</div><!-- inner -->
		<div class="p-single-news__cont js-single-news">
			<div class="p-single-news__head">
				<p class="p-single-news__title"><?php the_title(); ?></p>
			</div>
			<div class="p-single-news__meta">
				<time class="p-single-news__date" datetime="<?php the_time('c'); ?>"><?php the_time('Y/n/j'); ?></time>
				<span class="p-single-news__cat"><?php $category = get_the_category();echo $category[0]->cat_name;?></span>
			</div>
			<div class="p-single-news__content"><?php the_content(); ?></div>

			<div class="p-single-news__pagination">
				<?php if (get_previous_post()):?>
					<?php previous_post_link('%link', 'PREV'); ?>
				<?php endif; ?>

				<a href="<?php echo esc_url(home_url('/news')); ?>">一覧</a>

				<?php if (get_next_post()):?>
					<?php next_post_link('%link', 'NEXT'); ?>
				<?php endif; ?>
			</div>
		</div>
</section>

<section class="p-news-recommend l-recommend">
	<div class="p-news-recommend__inner l-inner">
		<div class="p-news-recommend__article">関連記事</div>
		<div class="p-news-recommend__body">
		<?php
		// 同じカテゴリから記事を4件呼び出す
		$categories = get_the_category($post->ID);
		$category_ID = array();
		foreach($categories as $category):
			array_push( $category_ID, $category -> cat_ID);
endforeach ;

		$args = array(
		// 今読んでいる記事を除く
		'post__not_in' => array($post -> ID),
		'posts_per_page'=> 4,
		'category__in' => $category_ID,
		// ランダムに記事を選ぶ
		'orderby' => 'rand',
		);
		$query = new WP_Query($args);
		if( $query -> have_posts() ):
			while ($query -> have_posts()) :
				$query -> the_post();
				?>
				<div class="p-news-recommend__meta">
					<!-- 記事の投稿日時を取得 -->
					<time class="p-news-recommend__date" datetime="<?php the_time('c'); ?>"><?php the_time('Y/n/j'); ?></time>
						<span class="p-news-recommend__label">
							<!-- 記事のカテゴリを取得 -->
							<?php
								$category = get_the_category();
								echo $category[0]->cat_name;
							?>
						</span>
					<!-- 記事のタイトルを取得 -->
					<a href="<?php the_permalink(); ?>" class="p-news-recommend__txt">
					<?php
					if ( mb_strlen( $post->post_title, 'UTF-8' ) > 50 ) {
						$title = mb_substr( $post->post_title, 0, 50, 'UTF-8' );
						echo $title . '…';
					} else {
						echo $post->post_title;
					}
					?>
					</a>
				</div>
<?php endwhile; endif; ?>
<?php wp_reset_postdata(); ?> 
		</div>
	</div>
</section>

<?php get_template_part('template-parts/common-contact'); ?>
<?php get_footer(); ?>
