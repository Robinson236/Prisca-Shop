<?php
/**
 * Template part for displaying page content in index.php and archive.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @since 1.0.0
 * @package RareBiz WordPress Theme
 */
?>
<article <?php RareBiz_Helper::schema_body( 'article' ); ?> id="post-<?php the_ID(); ?>" <?php post_class( RareBiz_Helper::with_prefix( 'post' ) ); ?> >
	<a href="<?php the_permalink(); ?>">		
		<div class="image-full post-image" style="<?php RareBiz_Theme::the_default_image( get_the_ID() ); ?>">

			<?php RareBiz_Helper::post_format_icon() ?>
		</div>	
	</a>
	
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