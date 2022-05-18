<?php get_header(); ?>

<!-- ローディング -->
<div class="c-splash">
	<figure class="c-splash__logo">
		<img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/CodeUps.svg" alt="ロゴ">
	</figure>
</div>
<div class="c-splash__bg"></div><!---画面遷移用-->

<section class="p-sub-contact">
	<h1 class="p-sub-contact__top-img firstview"></h1>
	<!-- breadcrumb -->
	<div class="p-sub-contact__container js-sub-contact">
		<div class="c-breadcrumb p-sub-contact__breadcrumb js-contact-breadcrumb">
			<?php
			if ( function_exists( 'bcn_display' ) ) {
				bcn_display();
			}
			?>
		</div>
		<div class="p-sub-contact__inner l-inner">
			<?php the_content(); ?>
	
		</div><!-- inner -->
	</div>
</section>



<?php get_template_part('template-parts/common-contact'); ?>
<?php get_footer(); ?>
