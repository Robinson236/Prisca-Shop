<?php
/**
 * Theme admin functions.
 *
 * @package Ona
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/**
* Add admin menu
*
* @since 1.0.0
*/
function ona_theme_admin_menu() {
	add_theme_page(
		esc_html__( 'Ona Getting Started', 'ona' ),
		esc_html__( 'Ona', 'ona' ),
		'manage_options',
		'ona-theme',
		'ona_admin_page_content',
		30
	);
}
add_action( 'admin_menu', 'ona_theme_admin_menu' );


/**
* Add admin page content
*
* @since 1.0.0
*/
function ona_admin_page_content() {
	$theme = wp_get_theme();
	$theme_name = 'Ona';
	$theme_slug = get_option('stylesheet');
	$active_theme_name = $theme->get('Name');
	$docs_url = 'https://docs.deothemes.com/ona/knowledgebase/';

	$urls = array(
		'theme-url'									=> 'https://ona.deothemes.com/',
		'rating-url'								=> 'https://wordpress.org/support/theme/ona/reviews/?rate=5#new-post',
		'docs' 											=> 'https://docs.deothemes.com/ona',
		'video-tutorials'						=> 'https://www.youtube.com/watch?v=R9tPDGK1q-Q&list=PLaPNmyRO67T0BsLPlGdrXO0T_5SxM5A4-&ab_channel=DeoThemes',
	);

	$demos = array(
		array(
			'title'			=> esc_html__( 'Main', 'ona' ),
			'url'				=> $urls['theme-url'],
			'preview'		=> ONA_URI . '/assets/admin/img/main_preview.jpg',
			'slug' 			=> 'ona',
			'parent'		=> true
		),
		array(
			'title'			=> esc_html__( 'Minimal', 'ona' ),
			'url'				=> $urls['theme-url'] . 'minimal',
			'preview'		=> ONA_URI . '/assets/admin/img/minimal_preview.jpg',
			'slug' 			=> 'ona-minimal',
			'parent'		=> false
		),
		array(
			'title'			=> esc_html__( 'Creative', 'ona' ),
			'url'				=> $urls['theme-url'] . 'creative',
			'preview'		=> ONA_URI . '/assets/admin/img/creative_preview.jpg',
			'slug' 			=> 'ona-creative',
			'parent'		=> false
		),
	);

	?>

		<div class="ona-page-header">
			<div class="ona-page-header__container">
				<div class="ona-page-header__branding">
					<a href="<?php echo esc_url( $urls['theme-url'] ); ?>" target="_blank" rel="noopener" >
						<img src="<?php echo esc_url( ONA_URI . '/assets/admin/img/theme_logo.png' ); ?>" class="ona-page-header__logo" alt="<?php echo esc_attr__( 'Ona', 'ona' ); ?>" />
					</a>
					<span class="ona-theme-version"><?php echo esc_html( ONA_VERSION ); ?></span>
				</div>
				<div class="ona-page-header__tagline">
					<span  class="ona-page-header__tagline-text">				
						<?php echo esc_html__( 'Made by ', 'ona' ); ?>
						<a href="https://deothemes.com/"><?php echo esc_html__( 'DeoThemes', 'ona' ); ?></a>						
					</span>					
				</div>				
			</div>
		</div>

		<div class="wrap ona-container">
			<div class="ona-grid">

				<div class="ona-grid-content">
					<div class="ona-body">

						<h1 class="ona-title"><?php esc_html_e( 'Getting Started', 'ona' ); ?></h1>
						<p class="ona-intro-text">
							<?php echo esc_html__( 'Ona is now installed and ready to use. Get ready to build something beautiful. To get started check the links below. We hope you enjoy it! If you have any suggestion of how to improve this theme feel free to contact us.', 'ona' ); ?>
						</p>
						
						<!-- Pro Demos -->
						<section class="ona-section">
							<h2 class="ona-heading"><?php echo esc_html( $theme_name ) . esc_html__( ' Demos', 'ona' ); ?></h2>
							<p id="child-theme-text" class="ona-notice notice"></p>
							<ul class="ona-pro-demos">
								<?php foreach ( $demos as $index => $demo ) : ?>
									<li class="ona-pro-demos__item">
										<a href="<?php echo esc_url( $demo['url'] ); ?>" target="_blank" class="ona-pro-demos__item-url" <?php the_title_attribute( $demo['title'] ); ?>>
											<img src="<?php echo esc_url( $demo['preview'] ); ?>" alt="<?php echo esc_attr( $demo['title'] ); ?>">
											<h2 class="ona-pro-demos__item-title"><?php echo esc_html( $demo['title'] ); ?></h2>
										</a>
										<?php
											$theme_dir = get_theme_root() . '/' . $demo['slug'];
											if ( ! file_exists( $theme_dir ) ) : ?>
												<a href="#" class="ona-install-child-theme button button-primary" data-theme="<?php echo esc_attr( $demo['slug'] ) ?>" data-theme-index="<?php echo esc_attr( absint( $index ) ); ?>"><?php echo esc_html__( 'Install', 'ona' ); ?></a>
											<?php elseif ( $theme_slug !== $demo['slug'] ) : ?>
												<a href="#" class="ona-install-child-theme button button-primary" data-theme="<?php echo esc_attr( $demo['slug'] ) ?>" data-theme-index="<?php echo esc_attr( absint( $index ) ); ?>"><?php echo esc_html__( 'Activate', 'ona' ); ?></a>
											<?php else : ?>
												<a href="<?php echo wp_nonce_url( admin_url( 'themes.php?page=merlin&amp;demo=' . absint($index) ) ); ?>" class="ona-import-content button button-primary" data-theme="<?php echo esc_attr( $demo['slug'] ) ?>" data-theme-index="<?php echo esc_attr( absint( $index ) ); ?>"><?php echo esc_html__( 'Import', 'ona' ); ?></a>
											<?php endif; ?>
									</li>
								<?php endforeach; ?>
							</ul>
						</section>

					</div> <!-- .body -->

				</div> <!-- .content -->
				
				<!-- Sidebar -->
				<aside class="ona-grid-sidebar">
					<div class="ona-grid-sidebar-widget-area">

						<div class="ona-widget">
							<h2 class="ona-widget-title"><?php echo esc_html__( 'Useful Links', 'ona' ); ?></h2>
							<ul class="ona-useful-links">
								<li>
									<a href="https://wordpress.org/support/theme/ona/reviews/#new-post" target="_blank"><?php echo esc_html__( 'Rate us ★★★★★', 'ona' ); ?></a>
								</li>
								<li>
									<a href="<?php echo esc_url( admin_url( 'themes.php?page=ona-theme-contact' )); ?>"><?php echo esc_html__( 'Contact us', 'ona' ); ?></a>
								</li>
								<li>
									<a href="https://twitter.com/deothemes"><?php echo esc_html__( 'Follow us', 'ona' ); ?></a>
								</li>
							</ul>
						</div>					

					</div>					
				</aside>	

			</div> <!-- .grid -->

		</div>
	<?php
}


/**
 * Install and activate child theme via Ajax
 */
function ona_activate_child_theme() {

	check_ajax_referer( 'ona_ajax_nonce', 'wpnonce' );

	WP_Filesystem();
	global $wp_filesystem;

	if ( ! empty( $_POST['slug'] ) ) {
		$slug = sanitize_key( $_POST['slug'] );
	};

	if ( ! empty( $_POST['download_link'] ) ) {
		$source = esc_url( $_POST['download_link'] );
	};

	$path = get_theme_root() . '/' . $slug;

	// Check if child theme already exist
	if ( ! file_exists( $path ) ) {

		$file = get_theme_root() . '/' . $slug . '.zip';

		// Copy and unzip
		file_put_contents( $file, file_get_contents( $source ));
		$unzipfile = unzip_file( $file, get_theme_root() );

		if ( ! is_wp_error( $unzipfile ) ) {
			unlink( $file );

			// Switch
			$allowed_themes = get_option( 'allowedthemes' );
			$allowed_themes[ $slug ] = true;
			update_option( 'allowedthemes', $allowed_themes );
			switch_theme( $slug );

			wp_send_json(
				array(
					'done'    => 1,
					'message' => esc_html__( 'Awesome. Your child theme is now activated. Proceed to importing the content.', 'ona' )
				)
			);
		} else {
			wp_send_json(
				array(
					'done'    => 1,
					'message' => esc_html__( 'There was an error unzipping the file.', 'ona' )
				)
			);
		}
	} else {
		switch_theme( $slug );
		wp_send_json(
			array(
				'done'    => 1,
				'message' => esc_html__( 'The existing child theme was activated. Proceed to importing the content.', 'ona' )
			)
		);
	}	

}
add_action( 'wp_ajax_ona_activate_child_theme', 'ona_activate_child_theme' );


/**
* Adds an admin notice upon successful activation.
*/
function ona_activation_admin_notice() {
	global $current_user;
	global $current_screen;

	// Don't show on Nokke main admin page
	if ( $current_screen->id === 'appearance_page_ona-theme' || $current_screen->id === 'toplevel_page_ona' ) {
		return;
	}

	if ( is_admin() ) {

		$current_theme = wp_get_theme();
		$welcome_dismissed = get_user_meta( $current_user->ID, 'ona_wizard_admin_notice' );

		if ( ( $current_theme->get('Name') == "Ona" || $current_theme->get('Name') == "Ona Pro" ) && ! $welcome_dismissed ) {
			add_action( 'admin_notices', 'ona_wizard_admin_notice', 99 );
		}

		wp_enqueue_style( 'ona-wizard-notice-css', get_template_directory_uri() . '/assets/admin/css/wizard-notice.css' );

	}
}
add_action( 'current_screen', 'ona_activation_admin_notice' );



/**
* Adds a button to dismiss the notice
*/
function ona_dismiss_wizard_notice() {
	global $current_user;
	$user_id = $current_user->ID;

	if ( isset( $_GET['ona_wizard_dismiss'] ) && $_GET['ona_wizard_dismiss'] == '1' ) {
		add_user_meta( $user_id, 'ona_wizard_admin_notice', 'true', true );
	}
}
add_action( 'admin_init', 'ona_dismiss_wizard_notice', 1 );


/**
* Display an admin notice linking to the wizard screen
*/
function ona_wizard_admin_notice() {
	if ( current_user_can( 'customize' ) ) : ?>
		<div class="notice theme-notice welcome-panel">
			<div class="theme-notice-logo">
				<img src="<?php echo esc_url( ONA_URI . '/assets/admin/img/theme_thumb.png' ); ?>" alt="<?php esc_attr_e( 'Ona', 'ona' ) ?>">
			</div>
			<div class="theme-notice-message wp-theme-fresh">
				<h2><?php esc_html_e( 'Thank you for choosing Ona!', 'ona' ); ?></h2>
				<?php if ( class_exists( 'Merlin' ) ) : ?>
					<p class="about-description"><?php esc_html_e( 'Run the Setup Wizard to configure your new theme and begin customizing your site.', 'ona' ); ?></p>
				<?php else : ?>
					<p class="about-description"><?php esc_html_e( 'Follow the steps to configure your new theme and begin customizing your site.', 'ona' ); ?></p>
				<?php endif; ?>
			</div>
			<div class="theme-notice-cta">
				<a href="<?php echo esc_url( admin_url( 'themes.php?page=ona-theme' ) ); ?>" class="button button-primary button-hero" style="text-decoration: none;"><?php esc_html_e( 'Setup Instructions', 'ona' ); ?></a>
				<a href="<?php echo esc_url( wp_nonce_url( add_query_arg( 'ona_wizard_dismiss', '1' ) ) ); ?>" class="notice-dismiss" target="_parent"></a>
			</div>
		</div>
	<?php endif;
}