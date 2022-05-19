<?php get_header(); ?>

<section class="p-single-blog">
	<div class="p-single-blog__inner l-inner js-single-blog">
		<!-- breadcrumb -->
		<div class="c-breadcrumb firstview">
			<?php
			if ( function_exists( 'bcn_display' ) ) {
				bcn_display();
			}
			?>
		</div>
	</div><!-- inner -->
	<div class="p-single-blog__cont js-single-blog">
		<div class="p-single-blog__head">
			<p class="p-single-blog__title"><?php echo get_field('blog_title'); ?></p>
		</div>
		<div class="p-single-blog__meta">
			<time class="p-single-blog__date" datetime="<?php the_time('c'); ?>"><?php the_time('Y/n/j'); ?></time>
			<span class="p-single-blog__cat"><?php echo esc_html( get_the_terms( get_the_ID(), 'blog_genre' )[0]->name ); ?></span>
		</div>

		<div class="p-single-blog__img">
			<img 
				src="<?php echo get_field('blog_image'); ?>" 
				alt="<?php the_title(); ?>"
			>
		</div>
		<div class="p-single-blog__content"><?php the_content(); ?></div>
	</div>
	<div class="p-single-blog__pagination">
		<?php if (get_previous_post()):?>
			<?php previous_post_link('%link', 'PREV'); ?>
		<?php endif; ?>

		<a href="<?php echo esc_url(home_url('/blog')); ?>">一覧</a>

		<?php if (get_next_post()):?>
			<?php next_post_link('%link', 'NEXT'); ?>
		<?php endif; ?>
	</div>
</section>

<section class="p-recommend l-recommend">
	<div class="p-recommend__inner l-inner">
		<div class="p-recommend__article">関連記事</div>
		<?php
		$terms = get_the_terms($post->ID, 'blog_genre');
		foreach( $terms as $term ) {
			$term_slug = $term->slug; // 現在表示している投稿に属しているタームを取得
		}
		$args = array(
			'post_type' => 'blog', // 投稿タイプのスラッグを指定
			'post__not_in' => array($post->ID), // 現在表示している投稿を除外
			'posts_per_page' => 4, // 表示件数4件
			'orderby' =>  'rand', // ランダム
			'tax_query' => array( // タクソノミーの指定
				array(
					'taxonomy' => 'blog_genre',
					'field' => 'slug',
					'terms' => $term_slug, // 取得したタームを指定
				))
		); $the_query = new WP_Query($args); if($the_query->have_posts()):
			?>
<ul class="p-recommend__lists">
	<li class="p-recommend__list p-sub-cards">
			<?php while ($the_query->have_posts()): $the_query->the_post(); ?>
		<a href="<?php the_permalink(); ?>" class="p-blog__cont p-blog__cont--sub p-card">
			<div class="p-card__img">
			<img 
						src="<?php echo get_field('blog_image'); ?>" 
						alt="<?php the_title(); ?>"
					>
			</div>
			<div class="p-card__txtbox">
				<h3 class="p-card__title"><?php echo get_field('blog_title'); ?></h3>
			</div>
			<div class="p-card__info">
			<div class="p-card__category"><?php echo esc_html( get_the_terms( get_the_ID(), 'blog_genre' )[0]->name ); ?></div>
			<time class="p-card__time" datetime="<?php the_time('c'); ?>"><?php the_time('Y/n/j'); ?></time>
			</div>
		</a>
		<?php endwhile; ?>
	</li>
</ul>
			<?php wp_reset_postdata(); ?>
<?php else: ?>
<!-- 投稿が無い場合の処理 -->
<?php endif; ?>
	</div>
</section>

<?php get_template_part('template-parts/common-contact'); ?>
<?php get_footer(); ?>
