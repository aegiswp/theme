<?php
/**
 * This file adds functions to the Aegis WordPress theme.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package aegis
 * @author  Atmostfear Entertainment
 * @license GNU General Public License v2 or later
 * @link    https://github.com/atmostfear-entertainment/aegis
 * @since   1.0.0
 */

/**
 * Global constants for the companion plugin
 */
define( 'AEGIS_THEME', true );
define( 'AEGIS_THEME_VERSION', '1.0.0' );

/**
 * Functions
 */

// Theme setup related functions
require get_template_directory() . '/inc/setup.php';

// Theme companion plugin related functions
if( is_admin() ) :
    require get_template_directory() . '/inc/companion.php';
endif;

if ( ! function_exists( 'seancewp_support' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	function aegis_support() {

		// Adds support for block styles.
		add_theme_support( 'wp-block-styles' );

		// Enqueue block editor styles.
		add_editor_style( 'style.css' );

		// Remove support for WordPress default block patterns.
		remove_theme_support( 'core-block-patterns' );

	}

endif;

// Prevent loading patterns from the WordPress.org pattern directory.
function aegis_prevent_remote_patterns() {
	return false;
}
add_filter( 'should_load_remote_block_patterns', 'aegis_prevent_remote_patterns' );