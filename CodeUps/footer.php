<footer class="p-footer">
	<div class="p-footer__inner">
		<div class="p-footer__cont">
			<div class="p-footer__logo"><a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/CodeUps.svg" alt="フッターロゴ"></a></div>
			<nav class="p-footer__nav">
				<ul class="p-footer__items">
					<li class="p-footer__item"><a href="<?php echo esc_url(home_url('/')); ?>">トップ</a></li>
					<li class="p-footer__item"><a href="<?php echo esc_url(home_url('/news')); ?>">お知らせ</a></li>
					<li class="p-footer__item"><a href="<?php echo esc_url(home_url('/content')); ?>">事業内容</a></li>
					<li class="p-footer__item"><a href="<?php echo esc_url(home_url('/works')); ?>">制作実績</a></li>
					<li class="p-footer__item"><a href="<?php echo esc_url(home_url('/overview')); ?>">企業概要</a></li>
					<li class="p-footer__item"><a href="<?php echo esc_url(home_url('/blog')); ?>">ブログ</a></li>
					<li class="p-footer__item p-footer__item--grey">
						<a href="<?php echo esc_url(home_url('/contact')); ?>">お問い合わせ</a>
					</li>
				</ul>
			</nav>
		</div>
		<div class="p-footer__copyright">&copy; 2021 CodeUps Inc.</div>
	</div>
			<!-- ページトップボタン -->
			<div class="c-pagetop js-page-top">
				<a href="#"></a>
			</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
