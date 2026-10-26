<!DOCTYPE html>
<html <?php language_attributes(); ?> dir="<?php echo function_exists( 'pll_current_language' ) && 'en' === pll_current_language() ? 'ltr' : 'rtl'; ?>">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<script>document.body.classList.add('site-intro-active');</script>

<div class="site-intro" aria-hidden="true">
	<img class="site-intro__logo" src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/logo.svg?v=' . filemtime( get_stylesheet_directory() . '/assets/images/logo.svg' ) ); ?>" alt="">
</div>

<header class="site-header">
	<div class="site-header__inner">

		<a class="site-donate" href="<?php echo esc_url( hallel_content_url( 'header_cta_url' ) ); ?>">
			<span><?php echo esc_html( hallel_content_value( 'header_cta_text' ) ); ?></span>
			<svg viewBox="0 0 33 8" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
				<path d="M32 4H1M1 4L5 1M1 4L5 7" stroke="#01294b" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>
		</a>

		<a class="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<img src="<?php echo esc_url( hallel_content_url( 'header_logo' ) ); ?>" alt="<?php bloginfo( 'name' ); ?>">
		</a>

		<?php if ( function_exists( 'pll_the_languages' ) ) : $hallel_langs = pll_the_languages( array( 'raw' => 1, 'hide_if_empty' => 0 ) ); if ( $hallel_langs ) : ?>
		<div class="site-lang-switch">
			<?php foreach ( $hallel_langs as $hallel_lang ) : ?>
			<a href="<?php echo esc_url( $hallel_lang['url'] ); ?>" <?php echo $hallel_lang['current_lang'] ? 'class="is-current" aria-current="true"' : ''; ?> lang="<?php echo esc_attr( $hallel_lang['locale'] ); ?>"><?php echo esc_html( strtoupper( $hallel_lang['slug'] ) ); ?></a>
			<?php endforeach; ?>
		</div>
		<?php endif; endif; ?>

		<nav class="site-nav" aria-label="תפריט ראשי">
			<?php
			if ( has_nav_menu( 'primary' ) ) {
				wp_nav_menu( array(
					'theme_location' => 'primary',
					'container'      => false,
					'items_wrap'     => '<ul>%3$s</ul>',
				) );
			} else {
				?>
				<ul>
					<?php foreach ( array( 'home', 'about', 'projects' ) as $item ) : ?>
					<li><a <?php echo hallel_nav_is_current( hallel_content_url( 'nav_' . $item . '_url' ) ) ? 'class="is-current" aria-current="page"' : ''; ?> href="<?php echo esc_url( hallel_content_url( 'nav_' . $item . '_url' ) ); ?>"><?php echo esc_html( hallel_content_value( 'nav_' . $item ) ); ?></a></li>
					<?php endforeach; ?><li>
<a <?php echo (is_post_type_archive("hallel_article") || is_singular("hallel_article")) ? 'class="is-current" aria-current="page"' : ''; ?> href="<?php echo esc_url(home_url("/articles/")); ?>">מאמרים</a></li><li>
<a <?php echo hallel_nav_is_current(hallel_content_url("nav_contact_url")) ? 'class="is-current" aria-current="page"' : ''; ?> href="<?php echo esc_url(hallel_content_url("nav_contact_url")); ?>"><?php echo esc_html(hallel_content_value("nav_contact")); ?></a></li>
				</ul>
				<?php
			}
			?>
		</nav>

	</div>
</header>
