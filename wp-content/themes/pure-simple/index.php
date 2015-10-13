<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 * @package Pure_and_Simple
 * @since 1.0.0
 */

get_header(); ?>

        
<?php $bloglayout = get_theme_mod( 'blog_layout', 'blogright' );
		
	switch ($bloglayout) {
		// Right sidebar
		case "blogright" :
			echo '<div class="container"><div class="row"><div class="col-md-9">';
					get_template_part( 'loop' );
			echo '</div><div id="secondary" class="col-md-3 widget-area" role="complementary">';
				get_sidebar( 'right' );
			echo '</div></div></div>';						
		break;		
						
		// Left sidebar
		case "blogleft" :
			echo '<div class="container"><div class="row"><div id="secondary" class="col-md-3 widget-area" role="complementary">';
				get_sidebar( 'left' );
			echo '</div>';	
			echo '<div class="col-md-9">';
					get_template_part( 'loop' );
			echo '</div></div></div>';					  
		break;
						
		// Full width no sidebars
		case "blogwide" :
			echo '<div class="container"><div class="row"><div class="col-md-12">';
					get_template_part( 'loop' );
			echo '</div></div></div>';							  
		break;			
		
	}
?>
        

<?php get_footer(); ?>
