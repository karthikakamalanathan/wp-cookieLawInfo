<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Great

 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function great_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'great_body_classes' );

// Great theme excerpt Lenght & More Filter
function great_excerpt_length( $length ) {
	return 20;
}
function great_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'great_excerpt_more' );
add_filter( 'excerpt_length', 'great_excerpt_length', 999 );

//
//if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) :
if ( ! function_exists( '_wp_render_title_tag' ) ) :
	/**
	 * Filters wp_title to print a neat <title> tag based on what is being viewed.
	 *
	 * @param string $title Default title text for current view.
	 * @param string $sep Optional separator.
	 * @return string The filtered title.
	 */
	function great_wp_title( $title, $sep ) {
		if ( is_feed() ) {
			return $title;
		}

		global $page, $paged;

		// Add the blog name
		$title .= get_bloginfo( 'name', 'display' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title .= " $sep $site_description";
		}

		// Add a page number if necessary:
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
			$title .= " $sep " . sprintf( __( 'Page %s', 'great' ), max( $paged, $page ) );
		}

		return $title;
	}
	add_filter( 'wp_title', 'great_wp_title', 10, 2 );

	/**
	 * Title shim for sites older than WordPress 4.1.
	 *
	 * @link https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
	 * @todo Remove this function when WordPress 4.3 is released.
	 */
	function great_render_title() {
		?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php
	}
	add_action( 'wp_head', 'great_render_title' );
endif;

// Sm
function great_social_media( $position = "header" ) {
	// Position disbale?
	if ( !get_theme_mod( 'enable_sm_'.$position, 0 ) ) return;
	
	// Size
	$size = get_theme_mod( 'sm_icon_size', 'fa-1x' );
		
	// Icons
	$icons = array();
	for ($i=1;$i<=10;$i++) {
		$link = get_theme_mod( 'sm_link'.$i, esc_url( home_url( '/' ) ) );
		$icon = get_theme_mod( 'sm_icon'.$i, "fa-facebook" );
		if ( $link != "" and $icon != "" ) {
			$attr = sprintf('href="%s" ',  $link );
			if ( get_theme_mod( 'sm_title'.$i ) ) $attr .= sprintf('title="%s" ', get_theme_mod( 'sm_title'.$i ));
			if ( get_theme_mod( 'sm_target'.$i, 1 ) ) $attr .= 'target="_blank" ';
			if ( get_theme_mod( 'sm_color'.$i ) ) $attr .= sprintf('style="color:%s;" ', get_theme_mod( 'sm_color'.$i ));
			$icons [] = sprintf('<a %1$s><i class="fa %2$s %3$s"></i></a>', $attr, $icon, $size);
		}
	} // end for
	
	// Display Icons
	if ( count ($icons) )
		printf('<div class="sm sm-%1$s">%2$s</div>', $position, implode( " ", $icons ));
}
//
// Quote
function great_footer_quote() {
	// Vars
	$q = esc_html(get_theme_mod( 'footer_quote', '"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."'));
	$a = esc_html(get_theme_mod( 'footer_author', 'Dolor sit Amet'));
	$l = esc_url(get_theme_mod( 'footer_link', esc_url( home_url( '/' ) ) ));
	$t = esc_html(get_theme_mod( 'footer_linktext', __('Read more...', 'great') ));
	
	// Link
	$link = '';
	if ( trim($l) != '' or trim($t) != '' ) 
		$link = sprintf('<a class="more-link" href="%1$s">%2$s</a>', $l, $t);
	// Display Quote
	if ( trim($q) != '' )
		printf('
		<div class="quote">
			<div class="t">%1$s</div>
			<div class="a">%2$s</div>
			<div class="l">%3$s</div>
		</div>', $q, $a, $link);
}
//
// Contact
function great_site_contact( $position = "" ) { ?>
	<div class="site-contact <?php echo $position;?>">
                	<?php
                    $adress = esc_html(get_theme_mod( 'adress', 'Massachusetts Ave, Cambridge, MA, USA' ));
					$mail = esc_html(get_theme_mod( 'mail', 'info@example.com' ));
					$phone = esc_html(get_theme_mod( 'phone', '+1 617-253-1000' ));
					
					if ($adress) echo '<span class="adress"><i class="fa fa-map-marker"></i>'.$adress.'</span> ';
					if ($mail) echo '<span class="mail"><i class="fa fa-envelope-o"></i>'.$mail.'</span> ';
					if ($phone) echo '<span class="phone"><i class="fa fa-phone"></i>'.$phone.'</span> ';
					?>
	</div>
	 <?php
}
//


