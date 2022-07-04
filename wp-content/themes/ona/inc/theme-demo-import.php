<?php
/**
 * Theme Demo Import.
 *
 * @package Ona
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}


/**
* Demo import.
*/
function ona_import_files() {

	$import_url = 'https://ona.deothemes.com/import';

	return array(
		array(
			'import_file_name'           => 'Main',
			'import_file_url'            => trailingslashit( $import_url ) . 'main/demo-content.xml',
			'import_preview_image_url'	 => trailingslashit( $import_url ) . 'main/preview.jpg',
			'preview_url'                => 'https://ona.deothemes.com',
		),
		array(
			'import_file_name'           => 'Minimal',
			'import_file_url'            => trailingslashit( $import_url ) . 'minimal/demo-content.xml',
			'import_preview_image_url'	 => trailingslashit( $import_url ) . 'minimal/preview.jpg',
			'preview_url'                => 'https://ona.deothemes.com/minimal',
		),
		array(
			'import_file_name'           => 'Creative',
			'import_file_url'            => trailingslashit( $import_url ) . 'creative/demo-content.xml',
			'import_preview_image_url'	 => trailingslashit( $import_url ) . 'creative/preview.jpg',
			'preview_url'                => 'https://ona.deothemes.com/creative',
		),
	);
}

/**
* Assign menus and front page after demo import
*
* @param array $selected_import array with demo import data
*/
function ona_after_import( $selected_import ) {
}