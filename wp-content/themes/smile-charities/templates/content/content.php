<?php
/**
 *  This Template override main template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @since 1.0.0
 * @package RareBiz WordPress Theme
 */
?>
<article <?php RareBiz_Helper::schema_body( 'article' ); ?> id="post-<?php the_ID(); ?>" <?php post_class( RareBiz_Helper::with_prefix( 'post' ) ); ?> >
	<?php 
	$post_display = rarebiz_get( 'post-display-type' );
	if( 'grid' == $post_display ){
		Smile_Charities::get_featured_image();
	}elseif( 'list' == $post_display && has_post_thumbnail() ){
	 	Smile_Charities::get_featured_image();
	}?>
	
	<div class="post-content-wrap">		
		<?php
			$order = rarebiz_get( 'meta-sections-order' );

			if( '' != $order ){
				$order = json_decode( $order );
				foreach ( $order as $o ) {
					if( 'title' == $o ){
						RareBiz_Helper::get_title();
					}elseif( 'date' == $o ){
						get_template_part( 'templates/meta', 'info' );
					}elseif( 'excerpt' == $o ){
						the_excerpt();	
					}elseif( 'category' == $o ){
						$category = rarebiz_get( 'post-category' );
						if(  'post' === get_post_type() && $category ){
							echo RareBiz_Helper::the_category();
						}
					}elseif( 'comment' == $o ){
						RareBiz_Helper::get_comment_number();
					}
				}
			}
		?>
	</div>
</article>