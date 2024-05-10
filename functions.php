<?php
/**
 * This file adds actions, filters, and functions to the theme.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package aegis
 * @author  Atmostfear Entertainment
 * @license GNU General Public License v3 or later
 * @link    https://github.com/atmostfear-entertainment/aegis
 * @since   1.0.0
 */


/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * @since 1.0.0
 * @return void
 */

function aegis_support() 
{
    // Disable WooCommerce Block Patterns.
    remove_theme_support( 'woocommerce-blocks-patterns' );

    // Disable WordPress Block Patterns.
    remove_theme_support('core-block-patterns');

    // Enqueue Editor styles.
    add_editor_style('style.css');
}
add_action('after_setup_theme', 'aegis_support');

// Disable loading of remote Block Patterns.
add_filter( 'should_load_remote_block_patterns', '__return_false' );


/**
 * Query whether WooCommerce is activated.
 * 
 * @since 1.0.0
 * @return void
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
 * @return void
 */

function aegis_styles()
{
    wp_enqueue_style('aegis-styles', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get('Version'));

    // Animations CSS.
    wp_enqueue_style('aegis-animations-styles', get_template_directory_uri() . '/assets/css/animations.css', array(), wp_get_theme()->get('Version'));

    // Global Script.
    wp_enqueue_script('aegis-global-script', get_template_directory_uri() . '/assets/js/index.js', array('jquery'), wp_get_theme()->get('Version'), true);

    // Animations Script.
    wp_enqueue_script('aegis-animations-script', get_template_directory_uri() . '/assets/js/animations.js', array('jquery'), wp_get_theme()->get('Version'), true);
}

add_action('wp_enqueue_scripts', 'aegis_styles');

    // Add Block Styles.
    require get_template_directory() . '/inc/block-styles.php';


/**
 * Include Woocommerce support.
 * 
 * @since 1.0.0
 * @return void
 */

if (class_exists('Woocommerce')) {
    require get_template_directory() . '/inc/woocommerce/functions.php';
}

/**
 * Register pattern categories.
 *
 * @since 1.0.0
 * @return void
 */
if ( ! function_exists( 'aegis_pattern_categories' ) ) :

    function aegis_pattern_categories() {

        // Registers about pattern category.
        register_block_pattern_category(
            'about',
            array(
                'label'       => _x( 'About', 'Block pattern category' ),
                'description' => __( 'A collection of about patterns.' ),
            ),
        );

        // Registers audio pattern category.
        register_block_pattern_category(
            'audio',
            array(
                'label'       => _x( 'Audio', 'Block pattern category' ),
                'description' => __( 'A collection of audio patterns.' ),
            ),
        );

        // Registers blog pattern category.
        register_block_pattern_category(
            'blog',
            array(
                'label'       => _x( 'Blog', 'Block pattern category' ),
                'description' => __( 'A collection of blog patterns.' ),
            ),
        );

        // Registers ecommerce pattern category.
        register_block_pattern_category(
            'ecommerce',
            array(
                'label'       => _x( 'eCommerce', 'Block pattern category' ),
                'description' => __( 'A collection of ecommerce patterns.' ),
            ),
        );

        // Registers events pattern category.
        register_block_pattern_category(
            'events',
            array(
                'label'       => _x( 'Events', 'Block pattern category' ),
                'description' => __( 'A collection of events patterns.' ),
            ),
        );

        // Adding faq Pattern Category
        register_block_pattern_category(
            'faq',
            array(
                'label'       => _x( 'FAQ', 'Block pattern category' ),
                'description' => __( 'A collection of FAQ Patterns.' ),
            ),
        );

        // Adding Hero Pattern Category
        register_block_pattern_category(
            'hero',
            array(
                'label'       => _x( 'Hero', 'Block pattern category' ),
                'description' => __( 'A collection of hero patterns.' ),
            ),
        );

        // Adding Pricing Category.
        register_block_pattern_category(
            'pricing',
            array(
                'label'       => _x( 'Pricing', 'Block pattern category' ),
                'description' => __( 'A collection of pricing patterns.' ),
            ),
        );

        // Adding video category
        register_block_pattern_category(
            'video',
            array(
                'label'       => _x( 'Video', 'Block pattern category' ),
                'description' => __( 'A collection of video patterns.' ),
            ),
        );
    }
endif;

add_action( 'init', 'aegis_pattern_categories' );