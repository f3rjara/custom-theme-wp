<?php
/**
 * playtic functions and definitions *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/ *
 * @package playtic
*/

  if ( ! defined( '_S_VERSION' ) ) {
    // Replace the version number of the theme on each release.
    define( '_S_VERSION', '1.0.0' );
  }

  if ( ! function_exists( 'playtic_setup' ) ) :	
    function playtic_setup() {     
      load_theme_textdomain( 'playtic', get_template_directory() . '/languages' );
      add_theme_support( 'automatic-feed-links' );
      add_theme_support( 'title-tag' );
      add_theme_support( 'post-thumbnails' );
      add_theme_support( 'customize-selective-refresh-widgets' );

      add_theme_support(
        'html5',
        array(
          'search-form',
          'comment-form',
          'comment-list',
          'gallery',
          'caption',
          'style',
          'script',
          'post-formats',
          'post-thumbnails',
          'responsive-embeds'
        )
      );
      add_theme_support(
        'custom-logo',
        array(
          'height'      => 250,
          'width'       => 250,
          'flex-width'  => true,
          'flex-height' => true,
        )
      );
      // This theme uses wp_nav_menu() in one location.
      $locations = ( array(
        'menu-primary'  =>   esc_html__( 'Primary Menu', 'playtic' )
      ) );
      register_nav_menus( $locations );
    }
  endif;
  add_action( 'after_setup_theme', 'playtic_setup' );

  function playtic_thumb_support() {
      add_image_size( 'playtic-banner-form-desktop', 1440, 620, false ); // 1440 pixels wide (and unlimited height)
    }
  add_action( 'after_setup_theme', 'playtic_thumb_support' );



/**
 * Enqueue scripts and styles.
*/
function playtic_scripts() {
	wp_enqueue_style( 'playtic_style', get_stylesheet_uri(), array(), _S_VERSION );
  wp_enqueue_style( 'bootstrap_css', get_stylesheet_directory_uri() . '/dist/css/bootstrap.min.css', array(), '5.0.2');
  wp_enqueue_style( 'playtic_global_css', get_stylesheet_directory_uri() . '/dist/css/style.css', array(), '1'); 
  wp_enqueue_style( 'splide_css', get_stylesheet_directory_uri() . '/dist/css/splide.min.css',array(), '1');

  wp_enqueue_script( 'bootstrap_bundle_js', get_stylesheet_directory_uri() . '/dist/js/bootstrap.bundle.min.js' );
  wp_enqueue_script( 'playtic_global_js', get_stylesheet_directory_uri() . '/dist/js/global.js' ); 
  wp_enqueue_script( 'splide_js', get_stylesheet_directory_uri() . '/dist/js/splide.min.js', null ,  '4.5.2',true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
  wp_enqueue_script('jquery');
}
add_action( 'wp_enqueue_scripts', 'playtic_scripts' );

/**
 * Custom template tags for this theme.
*/
require get_template_directory() . '/includes/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
*/
require get_template_directory() . '/includes/template-functions.php';

/**
 * Customizer additions.
*/
require get_template_directory() . '/includes/customizer.php';

/**
 * Get items of Menu
*/
require get_template_directory() . '/includes/get_menu_array.php';

/**
 * Get Breadcrumbs
*/
require get_template_directory() . '/includes/get_breadcrumbs.php';


/* remove DashIcons is not admin */
add_action( 'wp_print_styles', function() {
  if (!is_admin_bar_showing()) wp_deregister_style( 'dashicons' );
}, 100);


//Font Awesome
function enqueue_load_fa() {
	wp_enqueue_style( 'load-fa', 'https://use.fontawesome.com/releases/v5.13.1/css/all.css' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_load_fa' );


