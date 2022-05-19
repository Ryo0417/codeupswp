<?php get_header(); ?>

<section class="p-sub-blog">
	<h1 class="p-sub-blog__top-img firstview"></h1>
	<!-- breadcrumb -->
	<div class="p-sub-blog__inner l-inner js-sub-blog">
		<div class="c-breadcrumb">
			<?php
			if ( function_exists( 'bcn_display' ) ) {
				bcn_display();
			}
			?>
		</div>
		<div class="p-sub-blog__nav">
			<div class="p-sub-blog__link">
				<a
					<?php 
					if ( is_post_type_archive('blog') ): echo 'class="p-sub-blog__tag"'; ?>
							href="<?php echo esc_url( get_post_type_archive_link( 'blog' ) ); 
							?>">ALL
				</a>
				<?php endif; ?>
			</div><!-- /.p-sub-blog__link -->
			<?php
				$bloggenre_terms = get_terms( 'blog_genre', array( 'hide_empty' => false ) );
			foreach ( $bloggenre_terms as $bloggenre_term ) :
				?>
			<div class="p-sub-blog__link"><a href="<?php echo esc_url( get_term_link( $bloggenre_term, 'blog_genre' ) ); ?>"><?php echo esc_html( $bloggenre_term->name ); ?></a></div><!-- /.p-sub-blog__link -->
				<?php
					endforeach;
			?>
		</div><!-- /.p-sub-blog__nav -->


<?php if (!is_paged()) : ?>

	<!-- 1ページ目のとき -->
			<div class="p-blog__item p-cards js-cards">
			<?php if(have_posts()) :
				// $counter =1;
				while(have_posts()) : the_post(); ?>
					<?php if (is_new() || is_home()) { ?><!-- functions.php -->

			<!-- 1件目の記事 -->
				<a class="p-blog__cont p-card p-card--new js-card" href="<?php the_permalink(); ?>">
					<div class="p-card__img">
						<img 
									src="<?php echo get_field('blog_image'); ?>" 
									alt="<?php the_title(); ?>"
								>
					</div>
					<div class="p-card__txtbox">
						<h3 class="p-card__title"><?php echo get_field('blog_title'); ?></h3>
						<p class="p-card__desc"><?php echo get_field('blog_text'); ?></p>
					</div>
					<div class="p-card__info">
						<div class="p-card__category"><?php echo esc_html( get_the_terms( get_the_ID(), 'blog_genre' )[0]->name ); ?></div>
						<time class="p-card__time" datetime="<?php the_time('c'); ?>"><?php the_time('Y/n/j'); ?></time>
					</div>
				</a>

		<?php } else { ?>

			<!-- 2件目以降の記事 -->
				<a class="p-blog__cont p-card js-card" href="<?php the_permalink(); ?>">
					<div class="p-card__img">
						<img 
							src="<?php echo get_field('blog_image'); ?>" 
							alt="<?php the_title(); ?>"
						>
					</div>
					<div class="p-card__txtbox">
						<h3 class="p-card__title"><?php echo get_field('blog_title'); ?></h3>
						<p class="p-card__desc"><?php echo get_field('blog_text'); ?></p>
					</div>
					<div class="p-card__info">
						<div class="p-card__category"><?php echo esc_html( get_the_terms( get_the_ID(), 'blog_genre' )[0]->name ); ?></div>
						<time class="p-card__time" datetime="<?php the_time('c'); ?>"><?php the_time('Y/n/j'); ?></time>
					</div>
				</a>
			<!-- </div> -->

		<?php } ?>
		<?php endwhile; else : ?>
			</div>
			<!-- 記事がない場合 -->
			<p>記事が見つかりません。</p>

		<?php endif; ?>

<?php else : ?>

	<!-- 2ページ目以降のとき -->
		<div class="p-blog__item p-cards">
			<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
				<a class="p-blog__cont p-card" href="<?php the_permalink(); ?>">
					<div class="p-card__img">
						<img 
									src="<?php echo get_field('blog_image'); ?>" 
									alt="<?php the_title(); ?>"
								>
					</div>
					<div class="p-card__txtbox">
						<h3 class="p-card__title"><?php echo get_field('blog_title'); ?></h3>
						<p class="p-card__desc"><?php echo get_field('blog_text'); ?></p>
					</div>
					<div class="p-card__info">
						<div class="p-card__category"><?php echo esc_html( get_the_terms( get_the_ID(), 'blog_genre' )[0]->name ); ?></div>
						<time class="p-card__time" datetime="<?php the_time('c'); ?>"><?php the_time('Y/n/j'); ?></time>
					</div>
				</a>
			<?php endwhile; else : ?>
				<!-- 記事がない場合 -->
				<p>記事が見つかりません。</p>
			<?php endif; ?>
			<?php endif; ?>
		</div>
<?php wp_reset_postdata(); wp_reset_query();?>
</div> <!-- inner -->
<div class="c-wp-pagenavi">
	<?php wp_pagenavi(); ?>
</div>
</section>



<?php get_template_part('template-parts/common-contact'); ?>
<?php get_footer(); ?>
