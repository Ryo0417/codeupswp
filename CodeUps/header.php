<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="format-detection" content="telephone=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<!-- meta情報 -->
<title>CodeUps</title>
<meta name="description" content="CodeUps課題" />
<meta name="keywords" content="" />
<!-- <meta name=”robots” content=”noindex”> -->
<!-- ogp -->
<meta property="og:title" content="CodeUps" />
<meta property="og:type" content="article" />
<meta property="og:url" content="https://gotisou-web.com/pf/codeups-ryo/" />
<meta property="og:image" content="https://gotisou-web.com/pf/codeups-ryo/<?php echo get_template_directory_uri(); ?>/assets/img/common/CodeUps.svg" />
<meta property="og:site_name" content="CodeUps" />
<meta property="og:description" content="CodeUps課題 デザインカンプからのコーディング" />
<!-- fontawesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.4/css/all.css">
<!-- フォント -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&family=Noto+Serif+JP:wght@400;700&display=swap" rel="stylesheet">
<!-- ファビコン -->
<link rel="”icon”" href="#" />
<!-- canonical -->
<link rel="canonical" href="https://gotisou-web.com/pf/codeups-ryo/">
<!-- サンクスページリダイレクト -->
<script>
  document.addEventListener( 'wpcf7mailsent', function( event ) {
  location = 'https://codeups.local/contact/thanks/';
  }, false );
</script>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <header class="p-header l-header">
    <div class="p-header__inner">
      <div class="p-header__logo">
        <h1><a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/CodeUps.svg" alt="ヘッダーロゴ" /></a></h1>
      </div>
      <!-- ハンバーガーメニュー -->
      <div class="p-header__hamburger p-hamburger js-hamburger u-mobile">
        <div class="p-hamburger__bars">
          <span class="p-hamburger__bar1"></span>
          <span class="p-hamburger__bar2"></span>
          <span class="p-hamburger__bar3"></span>
        </div>
      </div>
      <nav class="p-header__sp-nav p-sp-nav js-nav-menu">
        <ul class="p-sp-nav__items">
          <li class="p-sp-nav__item js-sp-nav-item"><a href="<?php echo esc_url(home_url('/')); ?>">トップ</a></li>
          <li class="p-sp-nav__item js-sp-nav-item"><a href="<?php echo esc_url(home_url('/news')); ?>">お知らせ</a></li>
          <li class="p-sp-nav__item js-sp-nav-item"><a href="<?php echo esc_url(home_url('/content')); ?>">事業内容</a></li>
          <li class="p-sp-nav__item js-sp-nav-item"><a href="<?php echo esc_url(home_url('/works')); ?>">制作実績</a></li>
          <li class="p-sp-nav__item js-sp-nav-item"><a href="<?php echo esc_url(home_url('/overview')); ?>">企業概要</a></li>
          <li class="p-sp-nav__item js-sp-nav-item"><a href="<?php echo esc_url(home_url('/blog')); ?>">ブログ</a></li>
          <li class="p-sp-nav__item js-sp-nav-item"><a href="<?php echo esc_url(home_url('/contact')); ?>">お問い合わせ</a></li>
        </ul>
      </nav>
        <nav class="p-header__pc-nav p-pc-nav">
          <ul class="p-pc-nav__items js-sp-nav__items">
            <li class="p-pc-nav__item"><a href="<?php echo esc_url(home_url('/news')); ?>">お知らせ</a></li>
            <li class="p-pc-nav__item"><a href="<?php echo esc_url(home_url('/content')); ?>">事業内容</a></li>
            <li class="p-pc-nav__item"><a href="<?php echo esc_url(home_url('/works')); ?>">制作実績</a></li>
            <li class="p-pc-nav__item"><a href="<?php echo esc_url(home_url('/overview')); ?>">企業概要</a></li>
            <li class="p-pc-nav__item"><a href="<?php echo esc_url(home_url('/blog')); ?>">ブログ</a></li>
            <li class="p-pc-nav__item p-pc-nav__item--white">
              <a href="<?php echo esc_url(home_url('/contact')); ?>"><span>お問い合わせ</span></a>
            </li>
          </ul>
        </nav>
      </div>
  </header>
