<?php get_header(); ?>
<section class="p-single-works">
	<div class="p-single-works__inner l-inner">
		<!-- breadcrumb -->
		<div class="c-breadcrumb firstview">
			<?php
			if ( function_exists( 'bcn_display' ) ) {
				bcn_display();
			}
			?>
		</div>
	</div><!-- inner -->
		<div class="p-single-works__head">
			<p class="p-single-works__company"><?php echo get_field('works_title'); ?><span>制作実績</span></p>
		</div>
		<div class="p-single-works__meta">
			<time class="p-single-works__date" datetime="<?php the_time('c'); ?>"><?php the_time('Y/n/j'); ?></time>
			<span class="p-single-works__cat"><?php echo esc_html( get_the_terms( get_the_ID(), 'works_genre' )[0]->name ); ?></span>
		</div>

		<!-- swiper -->
		<div class="gallery">
			<!-- メイン -->
			<div class="swiper gallery-slider">
				<div class="swiper-wrapper sub-swiper-wrapper">
					<?php $images = get_field( "slider_image" );?>
					<?php foreach($images as $image) { ?>
						<div class="swiper-slide">
							<?php echo '<img src="'.$image.'" alt="">';?>
						</div>
					<?php } ?>
				</div>
				<div class="swiper-button-prev"></div>
				<div class="swiper-button-next"></div>
			</div>
			<!-- サムネイル -->
			<div class="swiper gallery-thumbs">
				<div class="swiper-wrapper">
				<?php $images = get_field( "slider_image" );?>
					<?php foreach($images as $image) { ?>
						<div class="swiper-slide">
						<?php echo '<img src="'.$image.'" alt="">';?>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
		<!-- ポイント -->
		<div class="p-single-works__points">
			<div class="p-single-works__point">
				<div class="p-single-works__title"><?php echo get_field('works_head1'); ?></div>
				<p class="p-single-works__txt"><?php echo get_field('works_desc1'); ?></p>
			</div>
			<div class="p-single-works__point">
				<div class="p-single-works__title"><?php echo get_field('works_head2'); ?></div>
				<p class="p-single-works__txt"><?php echo get_field('works_desc2'); ?></p>
			</div>
			<div class="p-single-works__point">
				<div class="p-single-works__title"><?php echo get_field('works_head3'); ?></div>
				<p class="p-single-works__txt"><?php echo get_field('works_desc3'); ?></p>
			</div>
		</div>

		<div class="p-single-works__pagination">
			<?php if (get_previous_post()):?>
				<?php previous_post_link('%link', 'PREV'); ?>
			<?php endif; ?>

			<a href="<?php echo esc_url(home_url('/works')); ?>">一覧</a>

			<?php if (get_next_post()):?>
				<?php next_post_link('%link', 'NEXT'); ?>
			<?php endif; ?>
		</div>
</section>

<!-- 関連制作物 -->
<section class="p-recommend l-recommend">
	<div class="p-recommend__inner l-inner">
		<div class="p-recommend__article">関連記事</div>
		<?php
		$terms = get_the_terms($post->ID, 'works_genre');
		foreach( $terms as $term ) {
			$term_slug = $term->slug; // 現在表示している投稿に属しているタームを取得
		}
		$args = array(
		'post_type' => 'works', // 投稿タイプのスラッグを指定
		'post__not_in' => array($post->ID), // 現在表示している投稿を除外
		'posts_per_page' => 4, // 表示件数4件
		'orderby' =>  'rand', // ランダム
		'tax_query' => array( // タクソノミーの指定
			array(
				'taxonomy' => 'works_genre',
				'field' => 'slug',
				'terms' => $term_slug, // 取得したタームを指定
			))
		); $the_query = new WP_Query($args); if($the_query->have_posts()):
			?>
<ul class="p-recommend__lists">
			<?php while ($the_query->have_posts()): $the_query->the_post(); ?>
<li class="p-recommend__list p-data">
	<a class="p-data__link" href="<?php echo the_permalink(); ?>">
		<figure class="p-data__figure">
			<img 
				src="<?php echo get_field('works_image'); ?>" 
				alt="<?php the_title(); ?>"
			>
		</figure>
		<p class="p-data__title p-data__title--center"><?php echo get_field('works_title'); ?></p>
	</a>
	<div class="p-data__tag"><?php echo esc_html( get_the_terms( get_the_ID(), 'works_genre' )[0]->name ); ?></div>
</li>
<?php endwhile; ?>
</ul>
			<?php wp_reset_postdata(); ?>
<?php else: ?>
<!-- 投稿が無い場合の処理 -->
<?php endif; ?>
	</div>
</section>

<?php get_template_part('template-parts/common-contact'); ?>
<?php get_footer(); ?>
