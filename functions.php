<?php
/**
 * CCW_Countries functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package CCW_Countries
 */

if ( ! function_exists( 'ccw_countries_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ccw_countries_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on CCW_Countries, use a find and replace
	 * to change 'ccw_countries' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'ccw_countries', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses multiple nav menus
	register_nav_menus( array(
		'primary_navigation'  => esc_html__( 'Primary Navigation', 'ccw_countries' ),
		'footer_navigation_1' => esc_html__( 'Footer Nav 1', 'ccw_countries' ),
		'footer_navigation_2' => esc_html__( 'Footer Nav 2', 'ccw_countries' ),
		'footer_navigation_3' => esc_html__( 'Footer Nav 3', 'ccw_countries' ),
		'footer_navigation_4' => esc_html__( 'Footer Nav 4', 'ccw_countries' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'ccw_countries_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'ccw_countries_setup' );

/**
 * Enqueue scripts and styles.
 */
function ccw_countries_scripts() {
	// set style guide version, or default to false (see https://developer.wordpress.org/reference/functions/wp_enqueue_style/)
	$styleguide_meta = file_get_contents( get_template_directory() . '/bower_components/code-club/.bower.json' );
	$styleguide_meta_json = json_decode( $styleguide_meta, true );
	$styleguide_version = $styleguide_meta_json['version'] ?: false;

	// enqueue the Code Club style guide styles
	wp_enqueue_style( 'ccw-countries-style-guide-style', get_template_directory_uri() . '/bower_components/code-club/dist/stylesheets/code-club.min.css', false, $styleguide_version );
	wp_enqueue_style( 'ccw-countries-style', get_stylesheet_uri() );

	// enqueue the Code Club style guide scripts
	wp_enqueue_script( 'ccw-countries-style-guide-script', get_template_directory_uri() . '/bower_components/code-club/dist/javascripts/code-club.min.js', ['jquery'], $styleguide_version, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ccw_countries_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Theme nav overrides
 */
add_filter( 'nav_menu_css_class', 'primary_nav_li', 1, 3 );
function primary_nav_li( $classes, $item, $args ) {
	switch( $args->theme_location ) {
		case 'primary_navigation':
			$classes[] = 'o-nav__item';
			break;
		case ( preg_match( '/footer_navigation_.*/', $args->theme_location ) ? true : false ):
			$classes[] = 'o-footer__list-item';
			break;
	}
	return $classes;
}

add_filter( 'nav_menu_link_attributes', 'add_menu_link_classes', 10, 3 );
function add_menu_link_classes( $atts, $item, $args ) {
	switch( $args->theme_location ) {
		case 'primary_navigation':
			$atts['class'] = 'o-nav__link';
			break;
		case ( preg_match( '/footer_navigation_.*/', $args->theme_location ) ? true : false ):
			$atts['class'] = 'o-footer__list-link';
			break;
	}
	return $atts;
}

add_filter( 'nav_menu_css_class', 'current_nav_class', 10, 2 );
function current_nav_class( $classes, $item ) {
	if ( in_array( 'current-menu-item', $classes ) ) {
		$classes[] = 'is-current ';
	}
	return $classes;
}

/**
 * Utility functions
 */
function get_nav_menu_by_location( $location ) {
	$locations = get_nav_menu_locations();
	$menu_id = $locations[ $location ] ;
	return wp_get_nav_menu_object( $menu_id );
}
