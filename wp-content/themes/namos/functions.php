<?php
/**
 * Namos functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage namos
 * @since 1.0
 */


/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function namos_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on cubic, use a find and replace
	 * to change 'cubic' to the name of your theme in all the template files
	 */

	load_theme_textdomain( 'namos', get_template_directory() . '/languages' );

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

	// Set the default content width.
	$GLOBALS['content_width'] = 525;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'    => esc_html__( 'Main Menu', 'namos' ),
		'onepage'    => esc_html__( 'One Page Menu', 'namos' ),		
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'image',
		'video',
		'gallery',
		'audio',
	) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'assets/css/editor-style.css', namos_fonts_url() ) );
}
add_action( 'after_setup_theme', 'namos_setup' );

/**
 * Register custom fonts.
 */
if ( ! function_exists( 'namos_fonts_url' ) ) :
/**
 * Register Google fonts for Namos.
 *
 * Create your own namos_fonts_url() function to override in a child theme.
 *
 * @since Namos 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function namos_fonts_url() {
	$fonts_url = '';
	$font_families     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Open Sans, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Lato font: on or off', 'namos' ) ) {
		$font_families[] = 'Lato:100,100i,300,300i,400,400i,700,700i,900,900i';
	}

	/* translators: If there are characters in your language that are not supported by Roboto Slab, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Roboto Slab font: on or off', 'namos' ) ) {
		$font_families[] = 'Roboto+Slab:100,300,400,700';
	}

	/* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'namos' ) ) {
		$font_families[] = 'Montserrat:400,700';
	}


	if ( $font_families ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}
	return esc_url_raw( $fonts_url );
}
endif;

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function namos_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Primary Sidebar', 'namos' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'namos' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div><div class="sidebar-sep"></div>',
		'before_title'  => '<h6>',
		'after_title'   => '</h6>',
	) );

}
add_action( 'widgets_init', 'namos_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function namos_scripts() {
	$protocol = is_ssl() ? 'https' : 'http';
	$mapapikey = namos_get_option('mapapikey');

	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'namos-fonts', namos_fonts_url(), array(), null );
	wp_enqueue_style( 'namos-plugins', get_theme_file_uri( '/assets/css/plugins.css' ), array(), '1.0' );

	// Theme stylesheet.
	wp_enqueue_style( 'namos-style', get_stylesheet_uri() );
	
	wp_enqueue_script( 'namos-mapapi', "$protocol://maps.googleapis.com/maps/api/js?key=$mapapikey", array( 'jquery' ), '1.0', false ); 
	wp_enqueue_script( 'namos-plugins', get_theme_file_uri( '/assets/js/plugins.js' ), array(), '1.0', true );
	wp_enqueue_script( 'namos-custom', get_theme_file_uri( '/assets/js/custom.js' ), array(), '1.0', true );

	if( namos_get_option('preload') != false ){
		wp_enqueue_script("namos-royal-preloader", get_template_directory_uri()."/assets/js/royal_preloader.min.js",array(), '1.0', false); 
	} 

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'namos_scripts' );


/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/framework/template-tags.php' );

/**
 * Additional features to allow styling of the templates.
 */
require get_parent_theme_file_path( '/framework/template-functions.php' );

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/framework/customizer.php' );

/**
 * Custom Metabox.
 */
require get_parent_theme_file_path( '/framework/meta-boxes.php' );

/**
 * Require plugins install for this theme.
 *
 * @since Namos 1.0
 */
require get_parent_theme_file_path( '/framework/plugin-requires.php' );

/**
 * Import Demo Content for this theme.
 *
 * @since Namos 1.0
 */
 require get_parent_theme_file_path( '/framework/demo-importer.php' ); 
 /* Customizer Menu.
 */
require get_template_directory() . '/framework/wp_bootstrap_navwalker.php';

// Filter wp_nav_menu() to add additional links and other output
add_filter('wp_nav_menu_items', 'new_nav_menu_items', 10, 2);
function new_nav_menu_items($items, $args) {
 // add $args->theme_location == 'primary-menu' in the conditional if we want to specify the menu location.
 if (function_exists('icl_get_languages') && ($args->theme_location == 'onepage' ||  $args->theme_location == 'primary')) {
  $languages = icl_get_languages('skip_missing=0');
       
  if(!empty($languages)){
       
    foreach($languages as $l){
    if(!$l['active']){
     // flag with native name
     $items = $items . '<li class="menu-item"><a href="' . $l['url'] . '"><img src="' . $l['country_flag_url'] . '" height="12" alt="' . $l['language_code'] . '" width="18" /> ' . $l['native_name'] . '</a></li>';
     //only flag
     //$items = $items . '<li class="menu-item menu-item-language"><a href="' . $l['url'] . '"><img src="' . $l['country_flag_url'] . '" height="12" alt="' . $l['language_code'] . '" width="18" /></a></li>';
    }
   }
  }
 }
return $items;
}