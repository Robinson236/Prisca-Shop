<?php
/**
* Register blog Options
*
* @return void
* @since 1.0.0
*
* @package RareBiz WordPress theme
*/
function rarebiz_blog_options(){	
	RareBiz_Customizer::set(array(
		# Theme option
		'panel' => 'panel',
		# Theme Option > color options
		'section' => array(
		    'id'       => 'blog-section',
		    'title'    => esc_html__( 'Blog Options' ,'rarebiz' ),
		    'priority' => 25
		),
		'fields'  => array(
			array(
				'id'	=> 'meta-sections-order',
				'label' => esc_html__( 'Archive Meta Order', 'rarebiz' ),
				'description' => esc_html__( 'Please make sure that you have enabled all sections under "Post Options"', 'rarebiz' ),
				'type'  => 'rarebiz-section-order',
				'default' =>json_encode(array(
					'title', 'date', 'category', 'excerpt', 'comment'
				)),
				'choices' => array(
					'title' => esc_html__( 'Title', 'rarebiz' ),
					'date' => esc_html__( 'Date', 'rarebiz' ),
					'category' => esc_html( 'Category', 'rarebiz' ),
					'excerpt' => esc_html__( 'Excerpt', 'rarebiz' ),
					'comment' => esc_html__( 'Comment', 'rarebiz' )
				),
				'transport'   => 'refresh'
			),
		),			
	));
}
add_action( 'init', 'rarebiz_blog_options' );
