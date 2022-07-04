<?php
/**
 * Create options for posts.
 *
 * @since 1.0.0
 *
 * @package Smile Charities
 */

function smile_charities_post_options(){  
    RareBiz_Customizer::set(array(
    	# Theme Options
    	'panel'   => 'panel',
    	# Theme Options > Page Options > Settings
    	'section' => array(
    		'id'    => 'post-options',
    		'title' => esc_html__( 'Post Options','smile-charities' ),
    	),
    	'fields' => array(
            array(
                'id'      => 'post-display-type',
                'label'   => esc_html__( 'Post Display', 'smile-charities' ),
                'type'    => 'rarebiz-buttonset',
                'default' => 'list',
                'choices' => array(
                    'list' => esc_html__( 'List', 'smile-charities' ),
                    'grid'  => esc_html__( 'Grid', 'smile-charities' ),
                )
            ),
     	),
    ) );
}
add_action( 'init', 'smile_charities_post_options' );