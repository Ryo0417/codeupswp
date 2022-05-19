<?php get_header(); ?>

<section class="p-sub-content" id="p-sub-content0">
	<div class="p-sub-content__top-img firstview"></div>

	<div class="p-sub-content__inner l-inner js-sub-content">
		<?php if ( function_exists( 'bcn_display' ) ) : ?>
		<!-- breadcrumb -->
		<div class="c-breadcrumb">
			<?php bcn_display(); ?>
		</div><!-- /breadcrumb -->
		<?php endif; ?>
		<h2 class="p-sub-content__head">企業理念</h2>
		<p class="p-sub-content__desc">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>

		<?php
		$content = SCF::get('content');
		$id = 1;
		foreach ($content as $fields) {
			$image = wp_get_attachment_image_src($fields['content-image'], 'full');
			?>
		<div class="p-sub-content__list <?php echo ($id % 2 == 0) ? 'even' : 'odd';  ?>" id="p-sub-content<?php echo $id; ?>">
			<div class="p-sub-content__img">
				<?php
				//画像出力
				$image = get_post_meta($post->ID, 'content-image', true);
				echo wp_get_attachment_image($fields['content-image'], 'full');
				?>
			</div>
			<div class="p-sub-content__body <?php echo ($id % 2 == 0) ? 'even' : 'odd';  ?>">
				<p class="p-sub-content__title"><?php echo $fields['content-title'] ?></p>
				<p class="p-sub-content__text"><?php echo $fields['content-text'] ?></p>
			</div>
		</div>
			<?php $id = ($id + 1) ; ?>
			<?php } ?>
	</div>
</section>

<?php get_template_part('template-parts/common-contact'); ?>
<?php get_footer(); ?>
