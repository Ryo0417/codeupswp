<?php get_header(); ?>
<section class="p-sub-news">
	<div class="p-sub-news__top-img firstview"></div>

	<div class="p-sub-news__inner l-inner">
		<?php if ( function_exists( 'bcn_display' ) ) : ?>
		<!-- breadcrumb -->
		<div class="c-breadcrumb l-breadcrumb">
			<?php bcn_display(); ?>
		</div><!-- /breadcrumb -->
		<?php endif; ?>
		<div class="p-sub-news__cont">
		<?php if(have_posts()): ?>
			<?php while(have_posts()): the_post(); ?>
			<div class="p-sub-news__meta">
				<!-- 記事の投稿日時を取得 -->
				<time class="p-sub-news__date" datetime="<?php the_time('c'); ?>"><?php the_time('Y/n/j'); ?></time>
				<span class="p-sub-news__label">
					<!-- 記事のカテゴリを取得 -->
					<?php
						$category = get_the_category();
						echo $category[0]->cat_name;
					?>
				</span>
				<!-- 記事のタイトルを取得 -->
				<a href="<?php the_permalink(); ?>" class="p-sub-news__txt">
					<?php the_title(); ?>
				</a>
			</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
			<div class="c-wp-pagenavi"><?php wp_pagenavi(); ?></div>
</section>

<?php get_template_part('template-parts/common-contact'); ?>

<?php get_footer(); ?>
