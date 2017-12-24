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
		'advertising',
		'edition',
		'packaging',
		'branding',
		'event',
		'store_booth'
	] ) );
}

if (function_exists("pll_register_string")) {
  pll_register_string("dc", "Digital");
  pll_register_string("dc", "Advertising");
  pll_register_string("dc", "Edition");
  pll_register_string("dc", "Packaging");
  pll_register_string("dc", "Branding");
  pll_register_string("dc", "Event");
  pll_register_string("dc", "Store & Booth");
} else throw new Exception("Function `pll_register_string` is not define, please active polylang plugins", 1);

if ( ! defined( 'POST' ) ) {
  if ( ! function_exists("pll__")) 
    throw new Exception("Function `pll__` is not define, please install or active polylang plugins", 1);
  
	define( 'POST', serialize( [
		[ 'type' => '360deg', 'name' => pll__('360°') ],
		[ 'type' => 'digital', 'name' => pll__('Digital') ],
		[ 'type' => 'advertising', 'name' => pll__('Advertising') ],
		[ 'type' => 'edition', 'name' => pll__('Edition') ],
		[ 'type' => 'packaging', 'name' => pll__('Packaging') ],
		[ 'type' => 'branding', 'name' => pll__('Branding') ],
		[ 'type' => 'event', 'name' => pll__('Event') ],
		[ 'type' => 'store_booth', 'name' => pll__('Store & Booth') ]
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
  
	register_sidebar( array(
		'name'          => 'Footer',
		'id'            => 'footer',
		'description'   => 'Add widgets here to appear in your footer.',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget'  => '</div>',
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

function cleanString( $string ) {
  $utf8 = array(
    '/[áàâãªä]/u'   =>   'a',
    '/[ÁÀÂÃÄ]/u'    =>   'A',
    '/[ÍÌÎÏ]/u'     =>   'I',
    '/[íìîï]/u'     =>   'i',
    //'/[éèêë]/u'     =>   'e',
    '/[ÉÈÊË]/u'     =>   'E',
    '/[óòôõºö]/u'   =>   'o',
    '/[ÓÒÔÕÖ]/u'    =>   'O',
    '/[úùûü]/u'     =>   'u',
    '/[ÚÙÛÜ]/u'     =>   'U',
    '/ç/'           =>   'c',
    '/Ç/'           =>   'C',
    '/ñ/'           =>   'n',
    '/Ñ/'           =>   'N',
    '/–/'           =>   '-', // UTF-8 hyphen to "normal" hyphen
    '/[’‘‹›‚]/u'    =>   ' ', // Literally a single quote
    '/[“”«»„]/u'    =>   ' ', // Double quote
    '/ /'           =>   ' ', // nonbreaking space (equiv. to 0x160)
  );
  return preg_replace(array_keys($utf8), array_values($utf8), $string);
}

add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );
