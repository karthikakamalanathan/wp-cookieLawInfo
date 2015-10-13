<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Great

 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'great' ); ?></a>
	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<div class="header-search">
            	<?php great_site_contact( "header" );?>
                <div class="ss">
                	<?php get_search_form(); ?>
                    <?php great_social_media( "header" );?>
                </div>

            </div>    

			<?php if ( get_theme_mod('logo' , get_template_directory_uri() . '/images/logo.png') ):?>
            <div class="header-logo-image">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                <img
                	src="<?php echo esc_url( get_theme_mod('logo' , get_template_directory_uri() . '/images/logo.png') ); ?>"
                    alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"
                    />
                </a>
            </div><!-- #header-logo-image -->
        	<?php else: ?>
        	<div class="header-text">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
        	</div>

        	<?php endif;
        	?>
            <div class="clear"></div>
		</div><!-- .site-branding -->
	</header><!-- #masthead -->
    
    <nav id="site-navigation" class="main-navigation <?php if((is_home())or(is_single())or(is_search())or(is_archive())){echo 'mr';}?>" role="navigation">
        <?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>
        
        <div class="clear"></div>
       <!-- <div class="nav-foot"></div>-->
    </nav><!-- #site-navigation -->


<div id="content" class="site-content">