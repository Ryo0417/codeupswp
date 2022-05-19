<?php get_header(); ?>

<section class="p-sub-works">
	<h1 class="p-sub-works__top-img firstview"></h1>
	<div class="p-sub-works__inner l-inner js-sub-works">
		<!-- breadcrumb -->
		<div class="c-breadcrumb">
			<?php
			if ( function_exists( 'bcn_display' ) ) {
				bcn_display();
			}
			?>
		</div>
		<div class="p-sub-works__nav">
		<?php
			$cat = get_queried_object();
			$cat_name = $cat->name;
		?>
			<div class="p-sub-works__link">
				<a
					href="<?php echo esc_url( get_post_type_archive_link( 'works' ) ); 
					?>">ALL
				</a>
			</div><!-- /.p-sub-works__link -->
				<?php
					$worksgenre_terms = get_terms( 'works_genre', array( 'hide_empty' => false ) );
				foreach ( $worksgenre_terms as $worksgenre_term ) :
					?>
			<div class="p-sub-works__link"><a class="<?php if ( $cat_name === esc_html( $worksgenre_term->name ) ) { echo 'p-sub-works__tag'; } ?>" href="<?php echo esc_url( get_term_link( $worksgenre_term, 'works_genre' ) ); ?>"><?php echo esc_html( $worksgenre_term->name ); ?></a></div><!-- /.p-sub-works__link -->
					<?php
						endforeach;
				?>
		</div><!-- /.p-sub-works__nav -->

		<ul class="p-sub-works__lists">
			<?php if (have_posts()): ?>
				<?php while (have_posts()) : the_post(); ?>
			<li class="p-sub-works__list p-data">
				<a href="<?php echo the_permalink(); ?>">
					<figure class="p-data__figure">
						<img 
							src="<?php echo get_field('works_image'); ?>" 
							alt="<?php the_title(); ?>"
						>
					</figure>
				</a>
				<p class="p-data__title p-data__title--center"><?php echo get_field('works_title'); ?></p>
				<div class="p-data__tag"><?php echo esc_html( get_the_terms( get_the_ID(), 'works_genre' )[0]->name ); ?></div>
			</li>
			<?php endwhile; ?>
			<?php else: ?>
			<!-- 投稿が無い場合の処理 -->
		</ul>
<?php endif; ?>
<?php wp_reset_postdata(); wp_reset_query();?>
	</div> <!-- inner -->
	<div class="c-wp-pagenavi">
		<?php wp_pagenavi(); ?>
	</div>
</section>



<?php get_template_part('template-parts/common-contact'); ?>
<?php get_footer(); ?>
