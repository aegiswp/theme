<?php
/**
 * This file adds actions, filters, and functions to the Aegis theme.
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
 * @since 1.0.0
 *
 * @return void
 */
function aegis_support() 
{
    // Remove WordPress Block Patterns.
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

/**
 * Enqueue styles.
 *
 * @since 1.0.0
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

/**
 * Prevent loading patterns from the WordPress.org pattern directory.
 */
function aegis_prevent_remote_patterns()
{
    return false;
}
add_filter('should_load_remote_block_patterns', 'aegis_prevent_remote_patterns');

    // Add block pattern.
    require get_template_directory() . '/inc/block-patterns.php';

    // Block styles.
    require get_template_directory() . '/inc/block-styles.php';

/**
 * Include Woocommerce support.
 */
if (class_exists('Woocommerce')) {
    require get_template_directory() . '/inc/woocommerce/functions.php';
}