<?php
/**
 * This file adds actions, filters, and functions to the theme.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package aegis
 * @author  Atmostfear Entertainment
 * @license GNU General Public License v2 or later
 * @link    https://github.com/aegiswp/theme/
 * @since   1.0.0
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * This function initializes the theme by setting up support for several core WordPress features:
 * - Enqueues editor styles to match the theme's front-end appearance in the block editor.
 *   @link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/#editor-styles
 * - Enables support for custom CSS units like 'rem', 'em', 'vw', and 'vh' in the block editor.
 *   @link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/#custom-css-units
 * - Adds support for responsive embeds to ensure embedded content scales properly on all devices.
 *   @link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/#responsive-embedded-content
 * - Disables default WordPress core block patterns to customize the editor experience.
 *   @link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/#block-patterns
 * - Disables loading of remote block patterns for enhanced security and control.
 * - Removes WooCommerce-specific block patterns if WooCommerce is installed.
 *
 * @since 1.0.0
 * @return void
 */

 if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

// Define VERSION constant for caching purposes
define( 'AEGIS_VERSION', wp_get_theme()->get( 'Version' ) );

function aegis_theme_support() {

    // Enqueue Editor styles.
    // Adds a stylesheet for the block editor to match the theme's frontend styles.
    add_editor_style('style.css');

    // Enable support for responsive embeds.
    // Makes embedded content like videos and iframes responsive.
    add_theme_support('responsive-embeds');
}

add_action('after_setup_theme', 'aegis_theme_support');

/**
 * Additional pattern removal on init.
 * 
 * Ensures complete removal of core block patterns by unregistering them
 * after they have been registered by WordPress core.
 *
 * @since 1.0.0
 * @return void
 */
function aegis_remove_patterns() {
    // Remove core and WooCommerce block pattern categories
    if ( function_exists( 'unregister_block_pattern_category' ) ) {
        $categories_to_remove = array(
            'buttons',
            'columns',
            'gallery',
            'header',
            'text',
            'query',
            'featured',
            'call-to-action',
            'banner',
            'footer',
            'woocommerce-product-collections',
            'woocommerce-product-elements',
            'woocommerce-store-elements',
            'woocommerce-store-notices',
            'woocommerce-checkout',
            'woocommerce-cart',
            'woocommerce-filters'
        );
        
        foreach ( $categories_to_remove as $category ) {
            unregister_block_pattern_category( $category );
        }
    }
    
    // Remove individual patterns
    if ( function_exists( 'unregister_block_pattern' ) ) {
        // Get all registered patterns
        $patterns = WP_Block_Patterns_Registry::get_instance()->get_all_registered();
        
        if ( $patterns ) {
            foreach ( $patterns as $pattern ) {
                // Remove core patterns
                if ( strpos( $pattern->name, 'core/' ) === 0 ) {
                    unregister_block_pattern( $pattern->name );
                }
                
                // Remove WooCommerce patterns
                if ( strpos( $pattern->name, 'woocommerce/' ) === 0 ) {
                    unregister_block_pattern( $pattern->name );
                }
            }
        }
    }
}
// Run after patterns are registered (default priority for registering is 10)
add_action( 'init', 'aegis_remove_patterns', 20 );

/**
 * Disable core block patterns and remote patterns.
 * This needs to run before patterns are registered.
 */
function aegis_disable_core_patterns() {
    // Disable WordPress Core Block Patterns
    remove_theme_support( 'core-block-patterns' );
    
    // Disable WooCommerce Block Patterns
    remove_theme_support( 'woocommerce-block-patterns' );
    
    // Disable loading of remote Block Patterns
    add_filter( 'should_load_remote_block_patterns', '__return_false' );
    
    // Prevent core patterns from being registered
    add_filter( 'block_patterns_registry_init', '__return_false' );
    
    // Filter out core patterns before they're registered
    add_filter( 'register_block_pattern_args', 'aegis_filter_block_patterns', 10, 2 );
    
    // Filter out core pattern categories before they're registered
    add_filter( 'register_block_pattern_category_args', 'aegis_filter_block_pattern_categories', 10, 2 );
}
add_action( 'after_setup_theme', 'aegis_disable_core_patterns' );

/**
 * Filter block patterns to prevent core and WooCommerce patterns from being registered.
 *
 * @param array  $pattern_properties The pattern properties.
 * @param string $pattern_name       The pattern name.
 * @return array|bool The pattern properties or false to prevent registration.
 */
function aegis_filter_block_patterns( $pattern_properties, $pattern_name ) {
    // Block core patterns
    if ( strpos( $pattern_name, 'core/' ) === 0 ) {
        return false;
    }
    
    // Block WooCommerce patterns
    if ( strpos( $pattern_name, 'woocommerce/' ) === 0 ) {
        return false;
    }
    
    return $pattern_properties;
}

/**
 * Filter block pattern categories to prevent core categories from being registered.
 *
 * @param array  $category_properties The category properties.
 * @param string $category_name       The category name.
 * @return array|bool The category properties or false to prevent registration.
 */
function aegis_filter_block_pattern_categories( $category_properties, $category_name ) {
    // List of categories to block
    $blocked_categories = array(
        'buttons',
        'columns',
        'gallery',
        'header',
        'text',
        'query',
        'featured',
        'call-to-action',
        'banner',
        'footer',
        'woocommerce-product-collections',
        'woocommerce-product-elements',
        'woocommerce-store-elements',
        'woocommerce-store-notices',
        'woocommerce-checkout',
        'woocommerce-cart',
        'woocommerce-filters'
    );
    
    if ( in_array( $category_name, $blocked_categories ) ) {
        return false;
    }
    
    return $category_properties;
}

/**
 * Enqueue theme styles and scripts.
 *
 * This function enqueues the main stylesheet and JavaScript files required for the theme.
 * - Enqueues the main stylesheet (`style.css`) to ensure that it is loaded on the frontend.
 *   @link https://developer.wordpress.org/reference/functions/wp_enqueue_style/
 * - Enqueues the global JavaScript file (`index.js`) and additional scripts, ensuring they are loaded in the correct order and position.
 *   @link https://developer.wordpress.org/reference/functions/wp_enqueue_script/
 * - Ensures that all scripts and styles use the theme's version for cache-busting purposes.
 *
 * @since 1.0.0
 * @return void
 */
function aegis_theme_styles() {

	// Enqueue the main stylesheet for the theme.
	// This function adds the main stylesheet (`style.css`) to the theme, ensuring it is loaded on the frontend.
	wp_enqueue_style('aegis-global-style', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get('Version'));

	// Enqueue the global script.
	// This function adds the global JavaScript file (`index.js`) to the theme, ensuring it is loaded on the frontend.
	wp_enqueue_script('aegis-global-script', get_template_directory_uri() . '/assets/js/index.js', array(), wp_get_theme()->get('Version'), true);

	// Enqueue the animations script.
	// This function adds the animations JavaScript file (`animations.js`) to the theme, ensuring it is loaded on the frontend.
	wp_enqueue_script('aegis-animations-script', get_template_directory_uri() . '/assets/js/animations.js', array(), wp_get_theme()->get('Version'), true);
}

add_action('wp_enqueue_scripts', 'aegis_theme_styles');

/**
 * Register Block Pattern Categories.
 *
 * This function registers custom block pattern categories to organize block patterns
 * within the block editor. Categories help users find patterns quickly by grouping them
 * under meaningful labels.
 *
 * Uses `register_block_pattern_category()` to define new pattern categories.
 * @link https://developer.wordpress.org/reference/functions/register_block_pattern_category/
 * Provides custom labels and descriptions for each category to improve the user experience.
 *
 * @since 1.0.0
 * @return void
 */
function aegis_register_block_categories() {

        // Registers: About Pattern Category
        register_block_pattern_category(
            'about',
            array(
            'label'       => _x( 'About', 'Block pattern category', 'aegis' ),
                'description' => __( 'A collection of About Patterns.', 'aegis' ),
            )
        );

        // Registers: Archives Pattern Category
        register_block_pattern_category(
            'archives',
            array(
            'label'       => _x( 'Archives', 'Block pattern category', 'aegis' ),
                'description' => __( 'A collection of Archive Patterns.', 'aegis' ),
            )
        );

        // Registers: Audio Pattern Category
        register_block_pattern_category(
            'audio',
            array(
            'label'       => _x( 'Audio', 'Block pattern category', 'aegis' ),
                'description' => __( 'A collection of Audio Patterns.', 'aegis' ),
            )
        );

        // Registers: Blog Pattern Category
        register_block_pattern_category(
            'blog',
            array(
            'label'       => _x( 'Blog', 'Block pattern category', 'aegis' ),
                'description' => __( 'A collection of Blog Patterns.', 'aegis' ),
            )
        );

        // Registers: eCommerce Pattern Category
        register_block_pattern_category(
            'ecommerce',
            array(
            'label'       => _x( 'eCommerce', 'Block pattern category', 'aegis' ),
                'description' => __( 'A collection of eCommerce Patterns.', 'aegis' ),
            )
        );

        // Registers: Events Pattern Category
        register_block_pattern_category(
            'events',
            array(
            'label'       => _x( 'Events', 'Block pattern category', 'aegis' ),
                'description' => __( 'A collection of Events Patterns.', 'aegis' ),
            )
        );

        // Registers: FAQ Pattern Category
        register_block_pattern_category(
            'faq',
            array(
            'label'       => _x( 'FAQ', 'Block pattern category', 'aegis' ),
                'description' => __( 'A collection of FAQ Patterns.', 'aegis' ),
            )
        );

        // Registers: Hero Pattern Category
        register_block_pattern_category(
            'hero',
            array(
            'label'       => _x( 'Hero', 'Block pattern category', 'aegis' ),
                'description' => __( 'A collection of Hero Patterns.', 'aegis' ),
            )
        );

        // Registers: Pricing Category
        register_block_pattern_category(
            'pricing',
            array(
            'label'       => _x( 'Pricing', 'Block pattern category', 'aegis' ),
                'description' => __( 'A collection of Pricing Patterns.', 'aegis' ),
            )
        );

        // Registers: Video Category
        register_block_pattern_category(
            'video',
            array(
                'label'       => _x( 'Video', 'Block pattern category', 'aegis' ),
                'description' => __( 'A collection of Video Patterns.', 'aegis' ),
            )
        );
    }

add_action( 'init', 'aegis_register_block_categories' );

/**
 * Register Custom Block Styles.
 *
 * This function registers multiple custom styles for core blocks to enhance
 * the visual options available within the block editor.
 *
 * @since 1.0.0
 * @return void
 */
function aegis_register_block_styles() {
    $block_styles = array(
        'core/button' => array(
            array(
                'name'  => '3d-push',
                'label' => esc_html__( '3D Push', 'aegis' ),
            ),
            array(
                'name'  => 'bubble-pop',
                'label' => esc_html__( 'Bubble Pop', 'aegis' ),
            ),
            array(
                'name'  => 'center-fill',
                'label' => esc_html__( 'Center Fill', 'aegis' ),
            ),
            array(
                'name'  => 'color-wipe',
                'label' => esc_html__( 'Color Wipe', 'aegis' ),
            ),
            array(
                'name'  => 'dense-shadow',
                'label' => esc_html__( 'Dense Shadow', 'aegis' ),
            ),
            array(
                'name'  => 'outline-border',
                'label' => esc_html__( 'Outline Border', 'aegis' ),
            ),
            array(
                'name'  => 'outline-shadow',
                'label' => esc_html__( 'Outline Shadow', 'aegis' ),
            ),
            array(
                'name'  => 'soft-fade',
                'label' => esc_html__( 'Soft Fade', 'aegis' ),
            ),
            array(
                'name'  => 'split-reveal',
                'label' => esc_html__( 'Split Reveal', 'aegis' ),
            ),
            array(
                'name'  => 'underline-border',
                'label' => esc_html__( 'Underline Border', 'aegis' ),
            ),
        ),
        'core/image' => array(
            array(
                'name'  => 'color-overlay',
                'label' => esc_html__( 'Color Overlay', 'aegis' ),
            ),
            array(
                'name'  => 'ease-out',
                'label' => esc_html__( 'Ease Out', 'aegis' ),
            ),
            array(
                'name'  => 'fade-scale',
                'label' => esc_html__( 'Fade Scale', 'aegis' ),
            ),
            array(
                'name'  => 'flip-hover',
                'label' => esc_html__( 'Flip Hover', 'aegis' ),
            ),
            array(
                'name'  => 'grayscale-hover',
                'label' => esc_html__( 'Grayscale Hover', 'aegis' ),
            ),
            array(
                'name'  => 'reveal-hover',
                'label' => esc_html__( 'Reveal Hover', 'aegis' ),
            ),
            array(
                'name'  => 'rotate-hover',
                'label' => esc_html__( 'Rotate Hover', 'aegis' ),
            ),
            array(
                'name'  => 'shine-hover',
                'label' => esc_html__( 'Shine Hover', 'aegis' ),
            ),
            array(
                'name'  => 'split-reveal',
                'label' => esc_html__( 'Split Reveal', 'aegis' ),
            ),
            array(
                'name'  => 'zoom-hover',
                'label' => esc_html__( 'Zoom Hover', 'aegis' ),
            ),
        ),
        'core/heading' => array(
            array(
                'name'  => 'hide-underline',
                'label' => esc_html__( 'Hide Underline', 'aegis' ),
            ),
        ),
        'core/video' => array(
            array(
                'name'  => 'dark-shadow',
                'label' => esc_html__( 'Dark Shadow', 'aegis' ),
            ),
        ),
        'core/details' => array(
            array(
                'name'  => 'block',
                'label' => esc_html__( 'Block Style', 'aegis' ),
            ),
        ),
        'core/navigation' => array(
            array(
                'name'  => 'block',
                'label' => esc_html__( 'Block Style', 'aegis' ),
            ),
            array(
                'name'  => 'mega-menu',
                'label' => esc_html__( 'Mega Menu', 'aegis' ),
            ),
        ),
    );

    foreach ( $block_styles as $block_name => $styles ) {
        foreach ( $styles as $style ) {
            register_block_style(
                $block_name,
                array(
                    'name'  => $style['name'],
                    'label' => $style['label'],
                )
            );
        }
    }
}

add_action( 'init', 'aegis_register_block_styles' );

/**
 * Register and enqueue block styles.
 *
 * Registers and enqueues individual stylesheets for blocks when they are used.
 * This improves performance by only loading styles when needed.
 * 
 * The version parameter is crucial for cache busting when styles are updated.
 * Each CSS file should include a @version tag that matches the theme version
 * or indicates its own version history.
 *
 * @since 1.0.0
 * @return void
 */
function aegis_enqueue_block_styles() {
    // Use the theme version for cache busting
    $theme_version = wp_get_theme()->get( 'Version' );
    
    $block_styles = array(
        'button' => array(
            '3d-push',
            'bubble-pop',
            'center-fill',
            'color-wipe',
            'dense-shadow',
            'outline-border',
            'outline-shadow',
            'soft-fade',
            'split-reveal',
            'underline-border'
        ),
        'image' => array(
            'color-overlay',
            'ease-out',
            'fade-scale',
            'flip-hover',
            'grayscale-hover',
            'reveal-hover',
            'rotate-hover',
            'shine-hover',
            'split-reveal',
            'zoom-hover'
        ),
        'heading' => array(
            'hide-underline'
        ),
        'video' => array(
            'dark-shadow'
        ),
        'details' => array(
            'block'
        ),
        'navigation' => array(
            'block',
            'mega-menu'
        )
    );

    foreach ( $block_styles as $block => $styles ) {
        foreach ( $styles as $style ) {
            $style_handle = "aegis-{$block}-{$style}";
            $style_path = "assets/css/core-{$block}-{$style}.css";
            
            wp_enqueue_block_style(
                "core/{$block}",
                array(
                    'handle' => $style_handle,
                    'src'    => get_parent_theme_file_uri( $style_path ),
                    'path'   => get_parent_theme_file_path( $style_path ),
                    'ver'    => $theme_version,
                )
            );
        }
    }
}

add_action('init', 'aegis_enqueue_block_styles');

/**
 * Query whether WooCommerce is activated.
 *
 * @since 1.0.0
 * @return bool True if WooCommerce is activated, false otherwise.
 */
function aegis_is_woocommerce_activated() {
    return class_exists('WooCommerce');
}

/**
 * Include WooCommerce support.
 *
 * @since 1.0.0
 * @return void
 */
function aegis_include_woocommerce_support() {
    if ( aegis_is_woocommerce_activated() ) {

        // Add theme support for WooCommerce features
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );

        // Set WooCommerce image sizes
        add_theme_support('woocommerce', array(
            'thumbnail_image_width' => 1080,
            'single_image_width'    => 1980,
        ));
    }
}
