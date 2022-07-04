<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @since 1.0.0
 *
 * @package RareBiz WordPress Theme
 */

if ( is_active_sidebar( 'rarebiz_sidebar' ) ) { ?>	
	<aside id="secondary" class="widget-area">
		<?php 
			$sidebar = apply_filters( RareBiz_Theme::fn_prefix( 'sidebar' ), 'rarebiz_sidebar' );
			dynamic_sidebar( $sidebar ); ?>
	</aside><!-- #secondary -->
<?php }else{ ?>
	    <aside id="secondary" class="widget-area">	    	
	       <?php 
		       Rarebiz_Theme::the_default_search();
		       Rarebiz_Theme::the_default_recent_post();
		       Rarebiz_Theme::the_default_archive();
	       ?>
	    </aside>
<?php }?>
