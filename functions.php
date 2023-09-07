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
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * @since Aegis 1.0
 *
 * @return void
 */
function aegis_support()
{

	// Remove core block patterns.
	remove_theme_support('core-block-patterns');

	// Enqueue editor styles.
	add_editor_style('style.css');
}
add_action('after_setup_theme', 'aegis_support');

/*
	* Query whether WooCommerce is activated.
	*/
function aegis_is_woocommerce_activated()
{
	if (class_exists('woocommerce')) {
		return true;
	} else {
		return false;
	}
}
/*
	* Query whether Give is activated.
	*/
function aegis_is_give_activated()
{
	if (class_exists('give')) {
		return true;
	} else {
		return false;
	}
}
/**
 * Enqueue styles.
 *
 * @since Aegis 1.0
 *
 * @return void
 */
function aegis_styles()
{

	wp_enqueue_style('aegis-styles', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get('Version'));
	// Animations CSS.
	wp_enqueue_style('aegis-animations-styles', get_template_directory_uri() . '/assets/css/animations.css', array(), wp_get_theme()->get('Version'));

	// Global script.
	wp_enqueue_script('aegis-global-script', get_template_directory_uri() . '/assets/js/index.js', array('jquery'), wp_get_theme()->get('Version'), true);
	// Animations script.
	wp_enqueue_script('aegis-animations-script', get_template_directory_uri() . '/assets/js/animations.js', array('jquery'), wp_get_theme()->get('Version'), true);
}
add_action('wp_enqueue_scripts', 'aegis_styles');

// Add block pattern
require get_template_directory() . '/inc/block-patterns.php';

// Block Styles.
require get_template_directory() . '/inc/block-styles.php';

// Remove support for WordPress default block patterns.
remove_theme_support('core-block-patterns');

/**
 * * Include Woocommerce
 * */
if (class_exists('Woocommerce')) {
	require get_template_directory() . '/inc/woocommerce/functions.php';
}

// Theme Admin Page
require get_template_directory() . '/inc/admin/theme-admin.php';

/**
 * Theme Wizard.
 */
require_once get_parent_theme_file_path('/inc/merlin/vendor/autoload.php');
require_once get_parent_theme_file_path('/inc/merlin/class-merlin.php');
require_once get_parent_theme_file_path('/inc/merlin/merlin-config.php');
require_once get_parent_theme_file_path('/inc/merlin/merlin-filters.php');

// Theme Admin Page
require_once get_template_directory() . '/inc/theme-demo-import.php';

/**
 * Licenser
 */
require(get_template_directory() . '/inc/lic_functions.php');

/*--------------------------------------------------------------
	# Enqueue Admin Scripts and Styles
	--------------------------------------------------------------*/
if (!function_exists('aegis_admin_scripts')) :
	function aegis_admin_scripts()
	{
		$screen = get_current_screen();
		wp_enqueue_style('aegis-admin-styles', get_template_directory_uri() . '/assets/admin/css/admin-styles.css', wp_get_theme()->get('Version'), true);

		if ('appearance_page_aegis-theme' === $screen->id) {
			wp_localize_script(
				'aegis-admin-scripts',
				'aegis_params',
				array(
					'ajaxurl' => admin_url('admin-ajax.php'),
					'wpnonce' => wp_create_nonce('aegis_ajax_nonce'),
					'wizard_url' => esc_url(admin_url('themes.php?page=merlin')),
					'processing' => esc_html__('Processing', 'aegis'),
					'finished' => esc_html__('Finished', 'aegis'),
				)
			);
		}
	}
	add_action('admin_enqueue_scripts', 'aegis_admin_scripts');
endif;

//Stop WooCommerce redirect on activation MerlinWP
add_filter('woocommerce_enable_setup_wizard', '__return_false');

/**
 * Removes some menus by page.
 */
function basti_remove_merlin_menu()
{
	remove_submenu_page('themes.php', 'merlin');
}
add_action('admin_menu', 'basti_remove_merlin_menu');

// Prevent loading patterns from the WordPress.org pattern directory.
function aegis_prevent_remote_patterns()
{
	return false;
}
add_filter('should_load_remote_block_patterns', 'aegis_prevent_remote_patterns');
