<?php
/**
 * Theme functions and definitions.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Ona
 * @since 		 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}


// Set the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) ) {
	$content_width = 1170; /* pixels */
}

// Constants
define( 'ONA_VERSION', '1.5.2' );
define( 'ONA_DIR', get_template_directory() );
define( 'ONA_URI', get_template_directory_uri() );


// Includes
require_once ONA_DIR . '/inc/admin/theme-admin.php';
require_once ONA_DIR . '/inc/block-patterns.php';
require_once ONA_DIR . '/inc/block-styles.php';


/**
* TGMPA plugins activation.
*/
if ( is_admin() ) {
	require_once ONA_DIR . '/inc/class-tgm-plugin-activation.php';
	add_action( 'tgmpa_register', 'ona_tgmpa_register_required_plugins' );
}

/**
* Theme Wizard.
*/
require_once get_parent_theme_file_path( '/inc/merlin/vendor/autoload.php' );
require_once get_parent_theme_file_path( '/inc/merlin/class-merlin.php' );
require_once get_parent_theme_file_path( '/inc/merlin/merlin-config.php' );
require_once get_parent_theme_file_path( '/inc/merlin/merlin-filters.php' );

/**
 * TGMPA Plugins
 */
function ona_tgmpa_register_required_plugins() {
	$plugins = array(
		array(
			'name'      => 'MailChimp for WordPress',
			'slug'      => 'mailchimp-for-wp',
			'required'  => false,
		),
	);

	$config = array(
		'id'           => 'tgmpa',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'capability'   => 'edit_theme_options',
		'has_notices'  => false,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => true,
		'message'      => '',
		'strings'      => array(
			'page_title'                      => esc_html__( 'Install Required Plugins', 'ona' ),
			'menu_title'                      => esc_html__( 'Install Plugins', 'ona' ),
			'installing'                      => esc_html__( 'Installing Plugin: %s', 'ona' ),
			'updating'                        => esc_html__( 'Updating Plugin: %s', 'ona' ),
			'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'ona' ),
			'return'                          => esc_html__( 'Return to Required Plugins Installer', 'ona' ),
			'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'ona' ),
			'activated_successfully'          => esc_html__( 'The following plugin was activated successfully:', 'ona' ),
			'plugin_already_active'           => esc_html__( 'No action taken. Plugin %1$s was already active.', 'ona' ),
			'plugin_needs_higher_version'     => esc_html__( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'ona' ),
			'complete'                        => esc_html__( 'All plugins installed and activated successfully. %1$s', 'ona' ),
			'dismiss'                         => esc_html__( 'Dismiss this notice', 'ona' ),
			'notice_cannot_install_activate'  => esc_html__( 'There are one or more required or recommended plugins to install, update or activate.', 'ona' ),
			'contact_admin'                   => esc_html__( 'Please contact the administrator of this site for help.', 'ona' ),
			'nag_type'                        => 'updated',
		),

	);

	tgmpa( $plugins, $config );
}

/**
* Demo Import.
*/
require_once ONA_DIR . '/inc/theme-demo-import.php';


/*--------------------------------------------------------------
# Theme Supports
--------------------------------------------------------------*/
if ( ! function_exists( 'ona_setup' ) ) :
	function ona_setup() {

		load_theme_textdomain( 'ona', get_template_directory() . '/languages' );

		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1170, 0 );
		add_theme_support( 'editor-styles' );
		add_theme_support( 'html5', array( 'comment-form', 'comment-list' ) );
		add_theme_support( 'responsive-embeds' );

		// Adding support for core block visual styles.
		add_theme_support( 'wp-block-styles' );

		// Disable WooCommerce wizard redirect
		add_filter('woocommerce_enable_setup_wizard', '__return_false');
		add_filter('woocommerce_show_admin_notice', '__return_false');
		add_filter('woocommerce_prevent_automatic_wizard_redirect', '__return_false');
		
	}
	add_action( 'after_setup_theme', 'ona_setup' );
endif;


/*--------------------------------------------------------------
# Enqueue Styles
--------------------------------------------------------------*/
if ( ! function_exists( 'ona_styles' ) ) :
	function ona_styles() {

		wp_register_style( 'ona-style', ONA_URI . '/assets/css/style.min.css' );
		wp_add_inline_style( 'ona-style', ona_get_font_face_styles() );

		$dependencies = apply_filters( 'ona_style_dependencies', array( 'ona-style' ) );

		wp_register_style( 'ona-style-blocks', ONA_URI . '/assets/css/blocks.min.css', $dependencies, ONA_VERSION );		
		
		wp_enqueue_style( 'ona-style' );
		wp_style_add_data( 'ona-style', 'rtl', 'replace' );
		wp_enqueue_style( 'ona-style-blocks' );
		wp_style_add_data( 'ona-style-blocks', 'rtl', 'replace' );

	}
	add_action( 'wp_enqueue_scripts', 'ona_styles' );
endif;


/*--------------------------------------------------------------
# Enqueue Editor Styles
--------------------------------------------------------------*/
if ( ! function_exists( 'ona_editor_styles' ) ) :
	function ona_editor_styles() {

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		add_editor_style( array(
			'./assets/css/editor.min.css',
			'./assets/css/blocks.min.css'
		) );

		wp_add_inline_style( 'wp-block-library', ona_get_font_face_styles() );
	}
	add_action( 'admin_init', 'ona_editor_styles' );
endif;


/*--------------------------------------------------------------
# Enqueue Admin Scripts and Styles
--------------------------------------------------------------*/
if ( ! function_exists( 'ona_admin_scripts' ) ) :
	function ona_admin_scripts() {
		$screen = get_current_screen();
		wp_enqueue_style( 'ona-admin-styles', ONA_URI . '/assets/admin/css/admin-styles.css' );

		if ( $screen->id === 'appearance_page_ona-theme' ) {
			wp_enqueue_script( 'ona-admin-scripts', ONA_URI . '/assets/admin/js/admin-scripts.js', array('jquery-core'), false, true );

			wp_localize_script(
				'ona-admin-scripts', 'ona_params', array(
					'ajaxurl' => admin_url( 'admin-ajax.php' ),
					'wpnonce' => wp_create_nonce( 'ona_ajax_nonce' ),
					'wizard_url' => esc_url( admin_url( 'themes.php?page=merlin' ) ),
					'processing' => esc_html__( 'Processing', 'ona' ),
					'finished' => esc_html__( 'Finished', 'ona' ),
				)
			);

		}
	}
	add_action( 'admin_enqueue_scripts', 'ona_admin_scripts' );
endif;


/*--------------------------------------------------------------
# Get Fonts
--------------------------------------------------------------*/
if ( ! function_exists( 'ona_get_font_face_styles' ) ) :
	/**
	 * Get font face styles.
	 *
	 * @return string
	 */
	function ona_get_font_face_styles() {
		return "
		@font-face{
			font-family: 'Gilda Display';
			font-weight: normal;
			font-style: normal;
			font-stretch: normal;
			src: url('" . get_theme_file_uri( 'assets/fonts/gilda-display/GildaDisplay-Regular.woff' ) . "') format('woff');
		}

		@font-face{
			font-family: 'Nunito Sans';
			font-weight: normal;
			font-style: normal;
			font-stretch: normal;
			src: url('" . get_theme_file_uri( 'assets/fonts/nunito-sans/NunitoSans-Regular.woff' ) . "') format('woff');
		}

		@font-face{
			font-family: 'Nunito Sans';
			font-weight: normal;
			font-style: italic;
			font-stretch: normal;
			src: url('" . get_theme_file_uri( 'assets/fonts/nunito-sans/NunitoSans-Italic.woff' ) . "') format('woff');
		}

		@font-face{
			font-family: 'Nunito Sans';
			font-weight: 600;
			font-style: normal;
			font-stretch: normal;
			src: url('" . get_theme_file_uri( 'assets/fonts/nunito-sans/NunitoSans-SemiBold.woff' ) . "') format('woff');
		}

		@font-face{
			font-family: 'Nunito Sans';
			font-weight: 700;
			font-style: normal;
			font-stretch: normal;
			src: url('" . get_theme_file_uri( 'assets/fonts/nunito-sans/NunitoSans-Bold.woff' ) . "') format('woff');
		}

		";
	}
endif;