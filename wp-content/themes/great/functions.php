<?php
/**
 * Great functions and definitions
 *
 * @package Great

 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 670; /* pixels */
}

if ( ! function_exists( 'great_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function great_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Great, use a find and replace
	 * to change 'great' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'great', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => __( 'Primary Menu', 'great' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );
	
	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'great_custom_background_args', array(
		'default-image' => get_template_directory_uri().'/images/bg.jpg',
		'default-repeat' => 'repeat'
	) ) );
	
	add_theme_support( 'custom-header', apply_filters( 'great_custom_header_args', array(
	    'default-image'          => '%s/images/header.png',
		'width'                  => 1000,
		'height'                 => 225,
		/*'flex-height'            => true,*/
	) ) );
	
	add_theme_support( 'post-thumbnails' );
	
	//add_editor_style();
}
endif; // great_setup
add_action( 'after_setup_theme', 'great_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function great_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'great' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => sprintf( "%1s %1d &rarr; %2s" , __( 'Footer', 'great' ), 1, __( 'Left', 'great' ) ),
		'id'            => 'footer-left',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => sprintf( "%1s %1d &rarr; %2s" , __( 'Footer', 'great' ), 2, __( 'Center', 'great' ) ),
		'id'            => 'footer-center',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => sprintf( "%1s %1d &rarr; %2s" , __( 'Footer', 'great' ), 3, __( 'Right', 'great' ) ),
		'id'            => 'footer-right',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'great_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function great_theme_scripts() {	
	wp_enqueue_style( 'great-font-awesome',get_template_directory_uri().'/font-awesome/css/font-awesome.min.css',array() );
	wp_enqueue_style( 'great-google-fonts','//fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700',array() );
	
	wp_enqueue_script( 'great-mobilemenu', get_template_directory_uri() . '/js/jquery.mobilemenu.min.js', array(), '1', true );

	wp_enqueue_script( 'great-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	
	wp_enqueue_script( 'great-fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array('jquery'), '' );
	wp_enqueue_script( 'great-fitvids-doc-ready', get_template_directory_uri() . '/js/fitvids-doc-ready.js', array('jquery'), '' );
	
	wp_enqueue_style( 'great-style', get_stylesheet_uri() );
		
	wp_enqueue_script( 'great-basejs',get_template_directory_uri().'/js/base.js',array('jquery'),'' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	/**
	 * Register JQuery cycle js file for slider.
	 */
	wp_register_script( 'jquery-cycle', get_template_directory_uri() . '/js/jquery.cycle.all.min.js', array( 'jquery' ), '2.9999.5', true );

	/**
	 * Enqueue Slider setup js file.
	 */	
	if( get_theme_mod( 'enable_slider', 1 ) && ( is_home() || is_front_page() ) ) { 
		wp_enqueue_script( 'great_slider', get_template_directory_uri() . '/js/slider-setting.js', array( 'jquery-cycle' ), false, true );
	}
	
	/**
    * Browser specific queuing i.e
	* https://gist.github.com/grappler/05568f05633484499acc
    */
	global $wp_scripts;
	wp_enqueue_script( 'html5shiv', get_template_directory_uri() . '/js/html5shiv.min.js', array(), '3.7.2', false );
	$wp_scripts->add_data( 'html5shiv', 'conditional', 'lt IE 9' );

}
add_action( 'wp_enqueue_scripts', 'great_theme_scripts' );

/**
 * Fav icon for the site
 */
function great_favicon() {
	if ( get_theme_mod( 'favicon', false ) ) {
		$great_favicon = get_theme_mod( 'favicon', "" );
		$great_favicon_output = '';
		if ( !empty( $great_favicon ) ) {
			$great_favicon_output .= '<link rel="shortcut icon" href="'.esc_url( $great_favicon ).'" type="image/x-icon" />';
		}
		echo $great_favicon_output;
	}
}
add_action( 'admin_head', 'great_favicon' );
add_action( 'wp_head', 'great_favicon' );

/**
 * Hooks the Custom Internal CSS to head section
 */
function great_custom_css() {
	$images = get_template_directory_uri() . "/images/";
	$great_internal_css = '';

	$primary_color = esc_attr( get_theme_mod( 'primary_color', '#00B0C8' ) );	
	if( $primary_color != '#00B0C8' ) {
		$great_internal_css .= '
		blockquote, pre {
			border-left:2px solid '.$primary_color.';
		}';
		// Bg Color
		$great_internal_css .= '
		button,input[type="button"],input[type="reset"],input[type="submit"],
		#controllers a:hover, #controllers a.active,
		#slider-title a {
			background-color:'.$primary_color.';
		}';
		// Color
		$great_internal_css .= '
		.entry-title, .entry-title a, .widget-area .widget-title,
		#controllers a:hover, #controllers a.active,
		a:hover,a:focus,a:active,
		.pagination .nav-links a:hover,
		.pagination .current,
		.entry-content a,
		.wp-pagenavi span.current{
			color:'.$primary_color.';
		}
		';
		
	}
	// Content background-image & Colour
	if ( get_theme_mod( 'content_bg' ) )
		$great_internal_css .= ".site-content{background-image:url(".esc_attr(get_theme_mod( 'content_bg')).");}";
	if ( get_theme_mod( 'content_bg_color') )
		$great_internal_css .= ".site-content{background-color:".esc_attr(get_theme_mod( 'content_bg_color')).";}";
	
	// Post
	if ( get_theme_mod( 'posts_font_size') )
		$great_internal_css .= ".entry-content{font-size:".esc_attr(get_theme_mod( 'posts_font_size'))."px;}";
	if ( get_theme_mod( 'posts_font_color') )
		$great_internal_css .= ".entry-content{color:".esc_attr(get_theme_mod( 'posts_font_color')).";}";
	if ( get_theme_mod( 'posts_link_color') )
		$great_internal_css .= ".entry-content a {color:".esc_attr(get_theme_mod( 'posts_link_color')).";}";
	if ( get_theme_mod( 'meta_color') )
		$great_internal_css .= ".entry-footer,.entry-footer span a,.entry-meta,.entry-meta span a {color:".esc_attr(get_theme_mod( 'meta_color')).";}";
	
	// Menu
	if ( get_theme_mod( 'menu_font_color') )
		$great_internal_css .= ".nav-menu > li a {color:".esc_attr(get_theme_mod( 'menu_font_color')).";}";
	if ( get_theme_mod( 'menu_font_color_hover') ) {
		$great_internal_css .= ".main-navigation .nav-menu > li > a:hover{ color:".esc_attr(get_theme_mod( 'menu_font_color_hover')).";}";
		$great_internal_css .= ".main-navigation .nav-menu > li span { background-color:".esc_attr(get_theme_mod( 'menu_font_color_hover')).";}";
	}
	if ( get_theme_mod( 'menu_bg_image' ) )
		$great_internal_css .= ".main-navigation{background:url(".esc_url(get_theme_mod( 'menu_bg_image')).")left bottom;}";
	
	// Widgets background-image & Colour
	if ( get_theme_mod( 'widgets_bg' ) )
		$great_internal_css .= ".widget-area .widget {
			background-image:url( " . esc_url(get_theme_mod( 'widgets_bg' )) . " );
			}";
	if ( get_theme_mod( 'widgets_bg_color') )
		$great_internal_css .= ".widget-area .widget {background-color:".esc_url(get_theme_mod( 'widgets_bg_color')).";}";
	// Header > Address, Phone, Email > Text Color
	if ( get_theme_mod( 'adress_color') ) $great_internal_css .= ".adress{color:".esc_attr(get_theme_mod( 'adress_color')).";}";
	if ( get_theme_mod( 'mail_color') ) $great_internal_css .= ".mail{color:".esc_attr(get_theme_mod( 'mail_color')).";}";
	if ( get_theme_mod( 'phone_color') ) $great_internal_css .= ".phone{color:".esc_attr(get_theme_mod( 'phone_color')).";}";
	
	// Header Text Color
	if ( ! get_theme_mod('logo') )
		$great_internal_css .= ".site-title a{color:#".esc_attr(get_theme_mod( 'header_textcolor')).";}";
	
	// Header Image
	$header_image = get_header_image();
	if( $header_image != '' ) {
		$great_internal_css .= 'header.site-header{background-image:url('.esc_url($header_image).');}';
	}
	
	// Custom CSS
		$great_internal_css .= esc_html(get_theme_mod( 'css'));
	// Print Inline Styles
	if( !empty( $great_internal_css ) ) { ?><style type="text/css"><?php echo $great_internal_css; ?></style><?php }
}
add_action('wp_head', 'great_custom_css');

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
 * Load Theme Options Panel
 */
require get_template_directory() . '/inc/theme-options.php';

/**
 * Slider
 */
require_once( get_template_directory() . '/inc/header-functions.php' );
?>