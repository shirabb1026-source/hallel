<?php
/**
 * Hallel theme functions.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once get_stylesheet_directory() . '/inc/content-fields.php';
require_once get_stylesheet_directory() . '/inc/about-fields.php';
require_once get_stylesheet_directory() . '/inc/articles.php';
require_once get_stylesheet_directory() . '/inc/project-fields.php';

function hallel_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
	add_theme_support( 'automatic-feed-links' );

	register_nav_menus( array(
		'primary' => __( 'תפריט ראשי', 'hallel' ),
	) );
}
add_action( 'after_setup_theme', 'hallel_setup' );

function hallel_enqueue_assets() {
	$style_path = get_stylesheet_directory() . '/style.css';
	$version    = file_exists( $style_path ) ? filemtime( $style_path ) : wp_get_theme()->get( 'Version' );
	wp_enqueue_style( 'hallel-style', get_stylesheet_uri(), array(), $version );
	$story_scroll_path = get_stylesheet_directory() . '/assets/js/story-scroll.js';
	wp_enqueue_script( 'hallel-story-scroll', get_stylesheet_directory_uri() . '/assets/js/story-scroll.js', array(), file_exists( $story_scroll_path ) ? filemtime( $story_scroll_path ) : $version, true );
	$intro_path = get_stylesheet_directory() . '/assets/js/site-intro.js';
	wp_enqueue_script( 'hallel-site-intro', get_stylesheet_directory_uri() . '/assets/js/site-intro.js', array(), file_exists( $intro_path ) ? filemtime( $intro_path ) : $version, true );
	$nav_toggle_path = get_stylesheet_directory() . '/assets/js/nav-toggle.js';
	wp_enqueue_script( 'hallel-nav-toggle', get_stylesheet_directory_uri() . '/assets/js/nav-toggle.js', array(), file_exists( $nav_toggle_path ) ? filemtime( $nav_toggle_path ) : $version, true );
}
add_action( 'wp_enqueue_scripts', 'hallel_enqueue_assets' );

function hallel_body_classes( $classes ) {
	if ( is_page( 'about' ) ) {
		$classes[] = 'hallel-about-page';
	}
	if ( is_page( array( 'projects', 'kamim-mehadash', 'contact' ) ) || is_post_type_archive('hallel_article') || is_singular('hallel_article') || is_singular('hallel_project') || is_post_type_archive('hallel_project') ) {
		$classes[] = 'hallel-inner-page';
	}
	return $classes;
}
add_filter( 'body_class', 'hallel_body_classes' );

/** Deliver the front-page application to the site's configured admin address. */
function hallel_handle_application() {
	$return_url = isset( $_POST['return_url'] ) ? wp_validate_redirect( esc_url_raw( wp_unslash( $_POST['return_url'] ) ), home_url( '/contact/' ) ) : home_url( '/#contact' );
	$redirect = add_query_arg( 'application', 'error', $return_url );
	if ( ! isset( $_POST['hallel_application_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['hallel_application_nonce'] ) ), 'hallel_application' ) ) {
		wp_safe_redirect( $redirect );
		exit;
	}
	if ( ! empty( $_POST['apply-website'] ) ) {
		wp_safe_redirect( add_query_arg( 'application', 'sent', $return_url ) );
		exit;
	}
	$name    = isset( $_POST['apply-name'] ) ? sanitize_text_field( wp_unslash( $_POST['apply-name'] ) ) : '';
	$phone   = isset( $_POST['apply-phone'] ) ? sanitize_text_field( wp_unslash( $_POST['apply-phone'] ) ) : '';
	$email   = isset( $_POST['apply-email'] ) ? sanitize_email( wp_unslash( $_POST['apply-email'] ) ) : '';
	$message = isset( $_POST['apply-message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['apply-message'] ) ) : '';
	if ( '' === $name || '' === $phone || ! is_email( $email ) || '' === $message ) {
		wp_safe_redirect( $redirect );
		exit;
	}
	$body = sprintf( "שם: %s\nטלפון: %s\nאימייל: %s\n\nהודעה:\n%s", $name, $phone, $email, $message );
	$sent = wp_mail( get_option( 'admin_email' ), 'פנייה חדשה מאתר קרן הלל', $body, array( 'Reply-To: ' . $email ) );
	wp_safe_redirect( add_query_arg( 'application', $sent ? 'sent' : 'error', $return_url ) );
	exit;
}
add_action( 'admin_post_nopriv_hallel_application', 'hallel_handle_application' );
add_action( 'admin_post_hallel_application', 'hallel_handle_application' );

/**
 * Echo a string as one <span> per character, each carrying a
 * --i custom property (its index) so CSS can stagger a
 * per-character reveal animation (typewriter-style). Spaces
 * are rendered as &nbsp; so their width survives at line/box
 * edges. Multibyte-safe (Hebrew, punctuation, etc).
 */
function hallel_char_spans( $text, $class = 'hero__char' ) {
	$chars = mb_str_split( $text );
	foreach ( $chars as $i => $char ) {
		printf(
			'<span class="%1$s" style="--i:%2$d">%3$s</span>',
			esc_attr( $class ),
			(int) $i,
			' ' === $char ? '&nbsp;' : esc_html( $char )
		);
	}
}

/** Match navigation links, including project detail pages under Projects. */
function hallel_nav_is_current( $url ) {
 if ( wp_parse_url( $url, PHP_URL_FRAGMENT ) ) return false;
 $target = trailingslashit( wp_parse_url( $url, PHP_URL_PATH ) ?: '/' );
 $current_url = is_post_type_archive('hallel_article') ? get_post_type_archive_link('hallel_article') : get_permalink();
 $current = trailingslashit( wp_parse_url( $current_url, PHP_URL_PATH ) ?: '/' );
 return $target === $current || ( $target !== '/' && strpos( $current, $target ) === 0 );
}
add_filter( 'wp_nav_menu_objects', function ( $items, $args ) {
 if ( $args->theme_location !== 'primary' ) return $items;
 return array_filter( $items, function ( $item ) {
   return trim( wp_strip_all_tags( $item->title ) ) !== 'שיתופי פעולה';
 } );
}, 10, 2 );
add_filter( 'nav_menu_link_attributes', function ( $attrs, $item, $args ) {
 if ( $args->theme_location === 'primary' && hallel_nav_is_current( $item->url ) ) {
   $attrs['class'] = trim( ( $attrs['class'] ?? '' ) . ' is-current' );
   $attrs['aria-current'] = 'page';
 }
 return $attrs;
}, 10, 3 );

/** Branded tab icon, shared by every page. */
add_action('wp_head', function(){
 $path=get_stylesheet_directory().'/assets/images/favicon.svg';
 $url=get_stylesheet_directory_uri().'/assets/images/favicon.svg?v='.filemtime($path);
 echo '<link rel="icon" type="image/svg+xml" href="'.esc_url($url).'">'."\n";
},99);
