<?php
/**
 * Call to Action Sidebar 
 * @package Pure_and_Simple
 * @since 1.0.0
 */

$default_content = get_theme_mod('hide_default_content', '0');
if ( ! is_active_sidebar( 'cta' ) && (!$default_content) ) {?>
	
    <div id="cta" style="color:<?php echo get_theme_mod( 'cta_text', '#adadad' ); ?>;">
    <aside class="widget-area" role="complementary">        
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 id="cta-heading"><?php echo __('WELCOME to PURE &amp; SIMPLE', 'pure-simple');?></h1>          
<div class="textwidget"><p style="margin-bottom:0;">
    <?php echo __('Explore my new WordPress theme 
called Pure &amp; Simple...a theme built for professional bloggers with beautiful subtle features that gives you more when you are serious about your content! Unlimited colours, several blog styles, 
Jetpack ready with a gorgeous portfolio, mobile responsive...and much more!', 'pure-simple');?></p></div>
                </div>
            </div>
        </div>      
    </aside>
</div>
<?php } else if(is_active_sidebar( 'cta' ) )  {
?>
<div id="cta" style="color:<?php echo get_theme_mod( 'cta_text', '#adadad' ); ?>;">
	<aside class="widget-area" role="complementary">		
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php dynamic_sidebar( 'cta' ); ?>
                </div>
            </div>
        </div>    	
	</aside>
</div>
<?php } ?>
