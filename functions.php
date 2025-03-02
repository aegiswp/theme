<?php
/**
 * This file adds actions, filters, and functions to the theme.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Aegis
 * @author  Atmostfear Entertainment
 * @license GNU General Public License v2 or later
 * @link    https://github.com/aegiswp/theme/
 * @since   1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Define theme constants.
 */
define( 'AEGIS_VERSION', wp_get_theme()->get( 'Version' ) );

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @since 1.0.0
 * @return void
 */
function aegis_setup() {
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     */
    load_theme_textdomain( 'aegis', get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support( 'post-thumbnails' );

    // Add support for Block Styles.
    add_theme_support( 'wp-block-styles' );

    // Add support for editor styles.
    add_editor_style( 'style.css' );

    // Enable support for custom units.
    add_theme_support( 'custom-units', array( 'rem', 'em', 'vw', 'vh' ) );

    // Enable support for responsive embeds.
    add_theme_support( 'responsive-embeds' );

    // Remove WordPress Core Block Patterns.
    remove_theme_support( 'core-block-patterns' );
    
    // Prevent WordPress from loading remote block patterns.
    add_filter( 'should_load_remote_block_patterns', '__return_false' );
}
add_action( 'after_setup_theme', 'aegis_setup' );

/**
 * Enqueue theme styles and scripts.
 *
 * This function enqueues the main stylesheet and JavaScript files required for the theme.
 * It ensures proper loading of styles and scripts with appropriate dependencies and versions.
 *
 * @since 1.0.0
 * @return void
 */
function aegis_enqueue_assets() {
    // Use the theme version constant for cache busting
    $theme_version = AEGIS_VERSION;

    // Enqueue the main stylesheet
    wp_enqueue_style(
        'aegis-style',
        get_template_directory_uri() . '/style.css',
        array(),
        $theme_version
    );

    // Enqueue the theme styles
    wp_enqueue_style(
        'aegis-theme-styles',
        get_template_directory_uri() . '/assets/css/theme.css',
        array(),
        $theme_version
    );

    // Enqueue the global script with jQuery dependency
    wp_enqueue_script(
        'aegis-global',
        get_template_directory_uri() . '/assets/js/index.js',
        array(),
        $theme_version,
        array(
            'in_footer' => true,
            'strategy'  => 'defer',
        )
    );

    // Enqueue the animations script
    wp_enqueue_script(
        'aegis-animations',
        get_template_directory_uri() . '/assets/js/animations.js',
        array('aegis-global'),
        $theme_version,
        array(
            'in_footer' => true,
            'strategy'  => 'defer',
        )
    );

    // If the current page has comments, enqueue the comment-reply script
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'aegis_enqueue_assets' );

/**
 * Enqueue block editor assets.
 *
 * Enqueues styles and scripts specifically for the block editor interface.
 *
 * @since 1.0.0
 * @return void
 */
function aegis_enqueue_editor_assets() {
    // Use the theme version constant for cache busting
    $theme_version = AEGIS_VERSION;

    // Editor styles
    wp_enqueue_style(
        'aegis-editor-style',
        get_template_directory_uri() . '/assets/css/editor-style.css',
        array(),
        $theme_version
    );

    // Editor scripts
    wp_enqueue_script(
        'aegis-editor-script',
        get_template_directory_uri() . '/assets/js/editor.js',
        array('wp-blocks', 'wp-dom-ready', 'wp-edit-post'),
        $theme_version
    );
}
add_action( 'enqueue_block_editor_assets', 'aegis_enqueue_editor_assets' );

/**
 * Register and enqueue block styles.
 *
 * Registers and enqueues individual stylesheets for blocks when they are used.
 * This improves performance by only loading styles when needed.
 *
 * @since 1.0.0
 * @return void
 */
function aegis_enqueue_block_styles() {
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
add_action( 'init', 'aegis_enqueue_block_styles' );

/**
 * Register Block Pattern Categories.
 *
 * This function registers custom block pattern categories to organize block patterns
 * within the block editor. Categories help users find patterns quickly by grouping them
 * under meaningful labels.
 *
 * @since 1.0.0
 * @return void
 */
function aegis_register_block_categories() {
    $categories = array(
        'about' => array(
            'label'       => _x( 'About', 'Block pattern category', 'aegis' ),
            'description' => __( 'A collection of About patterns.', 'aegis' ),
        ),
        'archives' => array(
            'label'       => _x( 'Archives', 'Block pattern category', 'aegis' ),
            'description' => __( 'A collection of Archive patterns.', 'aegis' ),
        ),
        'audio' => array(
            'label'       => _x( 'Audio', 'Block pattern category', 'aegis' ),
            'description' => __( 'A collection of Audio patterns.', 'aegis' ),
        ),
        'blog' => array(
            'label'       => _x( 'Blog', 'Block pattern category', 'aegis' ),
            'description' => __( 'A collection of Blog patterns.', 'aegis' ),
        ),
        'ecommerce' => array(
            'label'       => _x( 'eCommerce', 'Block pattern category', 'aegis' ),
            'description' => __( 'A collection of eCommerce patterns.', 'aegis' ),
        ),
        'events' => array(
            'label'       => _x( 'Events', 'Block pattern category', 'aegis' ),
            'description' => __( 'A collection of Events patterns.', 'aegis' ),
        ),
        'faq' => array(
            'label'       => _x( 'FAQ', 'Block pattern category', 'aegis' ),
            'description' => __( 'A collection of FAQ patterns.', 'aegis' ),
        ),
        'hero' => array(
            'label'       => _x( 'Hero', 'Block pattern category', 'aegis' ),
            'description' => __( 'A collection of Hero patterns.', 'aegis' ),
        ),
        'pricing' => array(
            'label'       => _x( 'Pricing', 'Block pattern category', 'aegis' ),
            'description' => __( 'A collection of Pricing patterns.', 'aegis' ),
        ),
        'video' => array(
            'label'       => _x( 'Video', 'Block pattern category', 'aegis' ),
            'description' => __( 'A collection of Video patterns.', 'aegis' ),
        ),
    );

    foreach ( $categories as $slug => $props ) {
        register_block_pattern_category(
            $slug,
            array(
                'label'       => $props['label'],
                'description' => $props['description'],
            )
        );
    }
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
 * Query whether WooCommerce is activated.
 *
 * @since 1.0.0
 * @return bool True if WooCommerce is activated, false otherwise.
 */
function aegis_is_woocommerce_activated() {
    return class_exists( 'WooCommerce' );
}

/**
 * Include WooCommerce support.
 *
 * This function adds theme support for WooCommerce features and customizes
 * the WooCommerce integration. It only runs if WooCommerce is activated.
 *
 * @since 1.0.0
 * @return void
 */
function aegis_include_woocommerce_support() {
    if ( ! aegis_is_woocommerce_activated() ) {
        return;
    }

    // Add theme support for WooCommerce features.
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );

    // Set WooCommerce image sizes.
    add_theme_support(
        'woocommerce',
        array(
            'thumbnail_image_width' => 480,
            'single_image_width'    => 1920,
        )
    );

    // Remove WooCommerce block patterns.
    remove_theme_support( 'woocommerce-block-patterns' );
    add_filter( 'woocommerce_blocks_register_patterns', '__return_false' );
}
add_action( 'after_setup_theme', 'aegis_include_woocommerce_support' );

/**
 * Change number of products displayed per row in WooCommerce archives.
 *
 * @since 1.0.0
 * @return int Number of products to display per row.
 */
function aegis_loop_columns() {
    return 4; // 4 products per row.
}
add_filter( 'loop_shop_columns', 'aegis_loop_columns', 999 );
