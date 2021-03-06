<?php get_header(); ?>

<main>
<!-- スライダーのメインコンテナの div 要素（必須） -->
	<div class="firstview swiper slider1">
		<div class="swiper-wrapper js-swiper-wrapper">
			<div class="swiper-slide">
				<div class="bg-slide-image u-mobile" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/common/sp-mv1.jpg)"></div>
				<div class="pc-slide-image u-desktop" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/common/pc-mv1.jpg)"></div>
			</div>
			<div class="swiper-slide">
				<div class="bg-slide-image u-mobile" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/common/sp-mv2.jpg)"></div>
				<div class="pc-slide-image u-desktop" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/common/pc-mv2.jpg)"></div>
			</div>
			<div class="swiper-slide">
				<div class="bg-slide-image u-mobile" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/common/sp-mv3.jpg)"></div>
				<div class="pc-slide-image u-desktop" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/common/pc-mv3.jpg)"></div>
			</div>
		</div>
	</div>
<div class="slide-content">
	<div class="slide-content__head">
		<h2 class="slide-content__title">
			<span class="slide-content__sentence">W</span>
			<span class="slide-content__sentence">e</span>
			<span class="slide-content__sentence">b</span>
			<span class="slide-content__sentence">&nbsp</span>
			<span class="slide-content__sentence">C</span>
			<span class="slide-content__sentence">r</span>
			<span class="slide-content__sentence">e</span>
			<span class="slide-content__sentence">a</span>
			<span class="slide-content__sentence">t</span>
			<span class="slide-content__sentence">i</span>
			<span class="slide-content__sentence">v</span>
			<span class="slide-content__sentence">e</span>
		</h2>
		<p class="slide-content__txt">想いをカタチに</p>
	</div>
</div>

<!-- news -->
	<section class="p-news l-news">
		<div class="p-news__inner">
			<div class="p-news__cont">
	<?php
			$args = array(
			'posts_per_page' => 1 // 表示件数
			);
			$posts = get_posts($args);
			foreach ($posts as $post): // ループの開始
							setup_postdata($post); // 記事データの取得
					?>
				<time class="p-news__date" datetime="<?php the_time('c'); ?>"><?php the_time('Y/n/j'); ?></time>
				<span class="p-news__label"><?php $category = get_the_category();echo $category[0]->cat_name;?></span>
				<a href="<?php the_permalink(); ?>" class="p-news__txt"
					><?php the_title(); ?></a
				>
			<?php
							endforeach; // ループの終了
			?>
				<div class="p-news__btn p-news__btn--white">
					<a class="c-btn--white" href="<?php echo esc_url(home_url('/news')); ?>">すべて見る</a>
				</div>
			</div>
		</div>
	</section>

	<!-- content -->
	<section class="p-content l-content js-content">
		<span class="c-bg-line--top"></span>
		<div class="p-content__inner">
			<div class="p-content__head js-content-head">
				<h2>
					<div class="p-content__maskWrapper js-content-maskWrapper">
						<div class="p-content__mask c-mask js-content-mask"></div>
						<span>事業内容</span>
					</div>
				</h2>
			</div>
			<div class="p-content__imgboxs">
				<ul class="p-content__imgbox js-content-imgbox">
					<li class="p-content__img js-content-img">
						<a class="p-content__link" href="<?php echo esc_url(home_url('/content/#p-sub-content0')); ?>">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/content1.jpg" alt="経営理念ページへ" />
							<span>経営理念ページへ</span>
							<p class="p-content__hovermask u-desktop"></p> <!-- マスク -->
						</a>
					</li>
					<li class="p-content__img js-content-img">
						<a class="p-content__link" href="<?php echo esc_url(home_url('/content/#p-sub-content1')); ?>">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/content2.jpg" alt="理念1へ" />
							<span>理念1へ</span>
							<p class="p-content__hovermask u-desktop"></p> <!-- マスク -->
						</a>
					</li>
					<li class="p-content__img js-content-img">
						<a class="p-content__link" href="<?php echo esc_url(home_url('/content/#p-sub-content2')); ?>">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/content3.jpg" alt="理念2へ" />
							<span>理念2へ</span>
							<p class="p-content__hovermask u-desktop"></p> <!-- マスク -->
						</a>
					</li>
					<li class="p-content__img js-content-img">
						<a class="p-content__link" href="<?php echo esc_url(home_url('/content/#p-sub-content3')); ?>">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/content4.jpg" alt="理念3へ" />
							<span>理念3へ</span>
							<p class="p-content__hovermask u-desktop"></p> <!-- マスク -->
						</a>
					</li>
				</ul>
			</div>
		</div>
	</section>

	<!-- works -->
	<section class="p-works l-works js-works">
		<div class="p-works__inner">
			<div class="p-works__head js-works__head">
			<h2>
				<div class="p-works__maskWrapper js-works-maskWrapper">
					<div class="p-works__mask c-mask js-works-mask"></div>
					<span>制作実績</span>
				</div>
			</h2>
			</div>
			<div class="p-works__bg">
				<div class="p-works__body js-works-body">
					<div class="p-works__cont">
						<div class="swiper slider2">

							<?php
													$args = [
													'post_type' => 'works', // カスタム投稿名が「gourmet」の場合
													'posts_per_page' => 3, // 表示する数
													];
													$my_query = new WP_Query($args); ?>
	<?php if ($my_query->have_posts()): // 投稿がある場合?>
		<div class="swiper-wrapper p-works__wrapper">
			<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
			<!-- ▽ ループ開始 ▽ -->
			<div class="swiper-slide p-works__slide js-works-slide">
				<img 
					src="<?php echo get_field('works_image'); ?>" 
					alt="<?php the_title(); ?>"
				>
			</div>
			<!-- △ ループ終了 △ -->
			<?php endwhile; ?>
		</div>
			<?php else: // 投稿がない場合?>
		<p>まだ投稿がありません。</p>
			<?php endif; wp_reset_postdata(); ?>
						</div>
						<div class="swiper-pagination"></div>
					</div>
					<div class="p-works__txtbox c-cmn-txt">
						<div class="c-cmn-txt__cont">
							<div class="c-cmn-txt__title js-works-txt-title">メインタイトルが入ります。</div>
							<p class="c-cmn-txt__desc js-works-txt-desc">
								テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
							</p>
							<div class="p-works__btn c-cmn-txt__btn c-cmn-txt__btn--grey">
								<a href="<?php echo esc_url(home_url('/works')); ?>" class="c-btn">すべて見る</a>
							</div>
						</div>
					</div>
				</div>
		</div>
		</div>
	</section>

	<!-- overview -->
	<section class="p-overview l-overview js-overview">
		<div class="p-overview__inner">
			<div class="p-overview__head">
			<h2>
				<div class="p-overview__maskWrapper js-overview-maskWrapper">
					<div class="p-overview__mask c-mask js-overview-mask"></div>
					<span>企業概要</span>
				</div>
			</h2>
			</div>
			<div class="p-overview__bg">
				<div class="p-overview__wrapper js-overview-wrapper">
					<div class="p-overview__img js-overview-img">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/overview.jpg" alt="企業概要" />
					</div>
					<div class="p-overview__txtbox c-cmn-txt">
						<div class="c-cmn-txt__cont">
							<div class="c-cmn-txt__title js-overview-txt-title">メインタイトルが入ります。</div>
							<p class="c-cmn-txt__desc js-overview-txt-desc">
								テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
							</p>
							<div class="p-overview__btn c-cmn-txt__btn c-cmn-txt__btn--grey">
								<a href="<?php echo esc_url(home_url('/overview')); ?>" class="c-btn">詳しく見る</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- blog -->
	<?php
			$args = array(
					'post_type' => 'blog',
					'posts_per_page' => 3,
			);
			$my_query = new WP_Query($args);
			if ($my_query->have_posts()):
					?>

	<section class="p-blog l-blog js-blog">
		<span class="c-bg-line--bottom"></span>
		<div class="p-blog__inner l-inner">
			<div class="p-blog__head">
			<h2>
				<div class="p-blog__maskWrapper js-blog-maskWrapper">
					<div class="p-blog__mask c-mask js-blog-mask"></div>
					<span>ブログ</span>
				</div>
			</h2>
			</div>
			<div class="p-blog__item p-cards js-cards">
				<?php while ($my_query->have_posts()): $my_query->the_post();$counter++; ?>
					<?php if ($counter <= 1): ?>
				<a href="<?php the_permalink(); ?>" class="p-blog__cont p-card p-card--new js-card-sp js-card--<?php echo esc_html($counter); ?>">
					<div class="p-card__img">
						<img src="<?php echo get_field('blog_image'); ?>" alt="<?php the_title(); ?>" />
					</div>
					<div class="p-card__txtbox">
						<h3 class="p-card__title"><?php echo get_field('blog_title'); ?></h3>
						<p class="p-card__desc"><?php echo get_field('blog_text'); ?></p>
					</div>
					<div class="p-card__info">
						<span class="p-card__category"><?php echo esc_html(get_the_terms(get_the_ID(), 'blog_genre')[0]->name); ?></span>
						<time class="p-card__time" datetime="<?php the_time('c'); ?>"><?php the_time('Y/n/j'); ?></time>
					</div>
				</a>
	<?php else:?>
				<a href="<?php the_permalink(); ?>" class="p-blog__cont p-card  js-card-sp js-card--<?php echo esc_html($counter) ?>">
					<div class="p-card__img">
						<img src="<?php echo get_field('blog_image'); ?>" alt="<?php the_title(); ?>" />
					</div>
					<div class="p-card__txtbox">
						<h3 class="p-card__title"><?php echo get_field('blog_title'); ?></h3>
						<p class="p-card__desc"><?php echo get_field('blog_text'); ?></p>
					</div>
					<div class="p-card__info">
						<span class="p-card__category"><?php echo esc_html(get_the_terms(get_the_ID(), 'blog_genre')[0]->name); ?></span>
						<time class="p-card__time" datetime="<?php the_time('c'); ?>"><?php the_time('Y/n/j'); ?></time>
					</div>
				</a>
	<?php endif;?>
	<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
	<?php endif; ?>
	</div>
			<div class="p-blog__btn c-cmn-txt__btn c-cmn-txt__btn--grey">
				<a href="<?php echo esc_url(home_url('/blog')); ?>" class="c-btn">すべて見る</a>
			</div>
		</div>
	</section>

	<!-- contact -->
	<section class="c-contact p-contact l-contact">
		<div class="p-contact__inner l-inner">
			<div class="p-contact__head">
				<h2>お問い合わせ</h2>
			</div>
			<p class="p-contact__txt">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
			<div class="p-contact__btn c-cmn-txt__btn c-cmn-txt__btn--grey">
				<a href="<?php echo esc_url(home_url('/contact')); ?>" class="c-btn">お問い合わせへ</a>
			</div>
		</div>
	</section>
</main>

<?php get_footer(); ?>
