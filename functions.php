<?php
/**
 * David Calmel functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package David-Calmel
 * @since David Calmel 1.0
 */

include_once( get_template_directory() . '/inc/function-class-walker.php' );
include_once( get_template_directory() . '/inc/function-shortcode.php' );

/*
 * Define Model Object
 * @param: MODEL
 */
if (class_exists('DCModel'))
	$MODEL = new DCModel();

if ( ! defined( 'POSTTYPE' ) ) {
	define( 'POSTTYPE', serialize( [
		'360deg',
		'digital',
		// 'marketing',
		'advertising',
		'edition',
		'packaging',
		'branding',
		'event',
		'store_booth'
	] ) );
}

if ( ! defined( 'POST' ) ) {
	define( 'POST', serialize( [
		[ 'type' => '360deg', 'name' => '360°' ],
		[ 'type' => 'digital', 'name' => 'Digital' ],
		// [ 'type' => 'marketing', 'name' => 'Marketing' ],
		[ 'type' => 'advertising', 'name' => 'Advertising' ],
		[ 'type' => 'edition', 'name' => 'Edition' ],
		[ 'type' => 'packaging', 'name' => 'Packaging' ],
		[ 'type' => 'branding', 'name' => 'Branding' ],
		[ 'type' => 'event', 'name' => 'Event' ],
		[ 'type' => 'store_booth', 'name' => 'Store & Booth' ]
	] ) );
}

// This theme uses wp_nav_menu() in 3 locations.
register_nav_menus( array(
	'primary'   => __( 'Primary Menu', 'twentysixteen' ),
	'secondary' => 'Secondary Menu',
	'cv' => 'CV Menu',
	'social'    => __( 'Social Links Menu', 'twentysixteen' ),
) );

function davidcalmel_widgets_init() {
	register_sidebar( array(
		'name'          => 'Sidebar',
		'id'            => 'sidebar',
		'description'   => 'Add widgets here to appear in your sidebar.',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}

add_action( 'widgets_init', 'davidcalmel_widgets_init' );

/**
 * Enqueues scripts and styles.
 *
 * @since David Calmel 1.0
 */
function davidcalmel_scripts() {
	/*
	 * font-family: 'Roboto', sans-serif;
	 */
	wp_enqueue_style( 'roboto-fonts', '//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,700,900', array() );
	
	//font-family: 'Playfair Display', serif;
	wp_enqueue_style( 'playfair-fonts', '//fonts.googleapis.com/css?family=Playfair+Display:400,700', array() );

	wp_enqueue_style( 'uikit', get_template_directory_uri() . '/dist/css/uikit.min.css', array() );
	wp_enqueue_style( 'animation', get_template_directory_uri() . '/assets/css/animate.css', array() );

	// Theme stylesheet.
	wp_enqueue_style( 'davidcalmel_style', get_stylesheet_uri() );
	wp_enqueue_script( 'lodash', get_template_directory_uri() . '/dist/js/lodash.min.js', array(), true );
	wp_enqueue_script( 'bleubird', get_template_directory_uri() . '/dist/js/bluebird.js', array(), false );
	wp_enqueue_script( 'uikit', get_template_directory_uri() . '/dist/js/uikit.min.js', array( 'jquery' ), false );
	wp_enqueue_script( 'morphext', get_template_directory_uri() . '/dist/js/morphext.min.js', array( 'jquery' ), false );
	wp_enqueue_script( 'uikit-icons', get_template_directory_uri() . '/dist/js/uikit-icons.min.js', array( 'uikit' ), false );
	wp_enqueue_script( 'sticky', get_template_directory_uri() . '/dist/sticky/jquery.sticky.js', array( 'jquery' ), false, false );
	wp_enqueue_script( 'block-animate', get_template_directory_uri().'/assets/js/anim.v2-3.js', ['jquery', 'bleubird']);
	wp_enqueue_script( 'davidcalmel-script', get_template_directory_uri() . '/assets/js/scripts.v1-5.js', array(
		'jquery',
		'bleubird',
		'sticky'
	) );
	wp_localize_script( 'davidcalmel-script', 'dc', array(
		'ajaxUrl' => admin_url( 'admin-ajax.php' ),
	) );
}

add_action( 'wp_enqueue_scripts', 'davidcalmel_scripts' );

function davidcalmel_scripts_home() {
	return;
}


/**
 * Add Class (uk-active) for active and current menu item.
 *
 * @since David Calmel 1.0
 */
function uk_active_nav_class( $classes, $item ) {
	if ( in_array( 'current-menu-item', $classes ) ) {
		$classes[] = 'uk-active ';
	}

	return $classes;
}

add_filter( 'nav_menu_css_class', 'uk_active_nav_class', 10, 2 );

function get_Title() {
	$parent_terms = get_the_category();
	if ( is_category( get_cat_ID( single_term_title( "", false ) ) ) ) {
		$child  = get_category( get_cat_ID( single_term_title( "", false ) ) );
		$parent = $child->parent;
		if ( $parent > 0 ):
			$pname = get_category( $parent );

			return $pname->name;
		endif;
	}
	if ( is_array( $parent_terms ) && empty( $parent_terms ) ) {
		return get_the_title();
	}
	foreach ( $parent_terms as $pterm ) {
		//Get the Child terms
		if ( $pterm->parent != 0 || $pterm->term_id === 1 ) {
			continue;
		}

		return $pterm->name;
	}

}

add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );
