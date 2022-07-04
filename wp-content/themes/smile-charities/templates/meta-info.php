<?php
/**
 *  This Template override main template
 *
 * @since 1.0.0
 *
 * @package Guternbiz WordPress Theme
 */?>

<?php if ( 'post' === get_post_type() ) : ?>
	<?php 
		$author   = rarebiz_get( 'post-author' );
		$date     = rarebiz_get( 'post-date' );
	if( $author || $date ) : ?>
		<div class="entry-meta 
			<?php 
				if( is_single() ){
					echo esc_attr( 'single' );
				} 
			?>"
		>
			<?php 
				$post_display = rarebiz_get( 'post-display-type' );

				if( 'list' == $post_display && has_post_thumbnail() ){
					RareBiz_Helper::get_author_image();
				}
			?>

			<?php if( $author || $date ) : ?>
				<div class="author-info">
					<?php
						RareBiz_Helper::the_date();			
						RareBiz_Helper::posted_by();
					?>
				</div>
			<?php endif; ?>
		</div>	
	<?php endif; ?>
<?php endif; ?>