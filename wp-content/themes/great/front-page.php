<?php
get_header();
	
	// Enable slider?
	if( get_theme_mod( 'enable_slider', 1 ) && is_front_page() && ! is_home() ) {
	?>
	<div class="site-slider">
		<div class="inner">
			<?php great_slider(); ?>
			<div class="clear"></div>
		</div>
	</div>
	<?php
	}

	/****** Front page displays  ********/
	if ( get_option( 'show_on_front' ) == "posts" ) {
		get_template_part('index', 'homepage') ;
	} elseif ( get_option( 'show_on_front' ) == "page" ) {
		get_template_part('index') ;
	}
		
get_footer();
?>