<?php
/**
 * puresimple functions and definitions
 * @package Pure_and_Simple
 * @since 1.0.0
 */


/**
 * Set the content width based on the theme's design and stylesheet.
 */
	if ( ! isset( $content_width ) ) {
		$content_width = 1140; /* pixels */
	}
	
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */	
if ( ! function_exists( 'puresimple_setup' ) ) :

function puresimple_setup() {



	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Pure & Simple, use a find and replace
	 * to change 'pure-simple' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'pure-simple', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/**
	 * This feature enables post-thumbnail support for a theme.
	 * @see http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	
	/**
	 * This feature enables woocommerce support for a theme.
	 * @see http://www.woothemes.com/2013/02/last-call-for-testing-woocommerce-2-0-coming-march-4th/
	 */
	add_theme_support( 'woocommerce' );
		
	/**
	 * Add callback for custom TinyMCE editor stylesheets. (editor-style.css)
	 * @see http://codex.wordpress.org/Function_Reference/add_editor_style
	 */
	add_editor_style();
	add_theme_support( 'title-tag' );
	
	/**
	 * Add support for shortcodes in text widget
	 * @see http://codex.wordpress.org/Function_Reference/do_shortcode
	 */	
	add_filter('widget_text', 'do_shortcode');	
	
	
	
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'pure-simple' ),
		'footer' => __( 'Footer Menu', 'pure-simple' ),
	) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio'
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'puresimple_custom_background_args', array(
		'default-color' => '3d4147',
		'default-image' => get_template_directory_uri() . '/images/page-bg.jpg',
	) ) );
}
endif; // puresimple_setup
add_action( 'after_setup_theme', 'puresimple_setup' );



/**
 * Enqueue scripts and styles.
 */
function puresimple_scripts() {
	
	wp_enqueue_style( 'puresimple-responsive', get_template_directory_uri() . '/css/responsive.min.css', array( ), '3.1.1' );
	wp_enqueue_style( 'puresimple-fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.2.0' );
    wp_enqueue_style( 'puresimple-opensans', get_template_directory_uri() . '/css/font-opensans.css', array(), '1.0.2' );
	wp_enqueue_style( 'puresimple-style', get_stylesheet_uri() );

	wp_enqueue_script( 'puresimple-global', get_template_directory_uri() . '/js/global.min.js', array( 'jquery' ), '20141001', true );
	wp_enqueue_script( 'puresimple-extras', get_template_directory_uri() . '/js/puresimple-extras.js', array( 'jquery' ), '20150918', true );
		
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'puresimple_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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
 * Load widgets.
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Get inline CSS.
 * If you need to edit this file, open the unminified version of the inline-css.php file.
 */
require get_template_directory() . '/inc/inline-css.min.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
