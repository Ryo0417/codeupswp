<?php get_header(); ?>

<section class="p-sub-overview">
	<h1 class="p-sub-overview__top-img firstview"></h1>
	<div class="p-sub-overview__inner l-inner js-sub-overview">
		<!-- breadcrumb -->
		<div class="c-breadcrumb">
			<?php
			if ( function_exists( 'bcn_display' ) ) {
				bcn_display();
			}
			?>
		</div>

		<div class="sub-overview__items">
			<dl class="sub-overview__item">
				<dt>会社名</dt>
				<dd>テキストが入ります。</dd>
			</dl>
			<dl class="sub-overview__item">
				<dt>設立</dt>
				<dd>テキストが入ります。</dd>
			</dl>
			<dl class="sub-overview__item">
				<dt>資本金</dt>
				<dd>テキストが入ります。</dd>
			</dl>
			<dl class="sub-overview__item">
				<dt>売上高</dt>
				<dd>テキストが入ります。</dd>
			</dl>
			<dl class="sub-overview__item">
				<dt>代表者</dt>
				<dd>テキストが入ります。</dd>
			</dl>
			<dl class="sub-overview__item">
				<dt>従業員数</dt>
				<dd>テキストが入ります。</dd>
			</dl>
			<dl class="sub-overview__item">
				<dt>事業内容</dt>
				<dd>テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</dd>
			</dl>
			<dl class="sub-overview__item">
				<dt>所在地</dt>
				<dd>東京駅</dd>
			</dl>
		</div>

		<div class="sub-overview__map">
			<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12966.991898658345!2d139.7454329!3d35.6585805!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x481a93f0d2a409dd!2z5p2x5Lqs44K_44Ov44O8!5e0!3m2!1sja!2sjp!4v1641792937930!5m2!1sja!2sjp" width="" height="" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
		</div>
	</div><!-- /inner -->
</section>

<?php get_template_part('template-parts/common-contact'); ?>
<?php get_footer(); ?>
