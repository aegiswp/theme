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
function aegis_theme_support() {
    // Enqueue editor styles.
    add_editor_style( 'style.css' );

    // Enable support for custom units.
    add_theme_support( 'custom-units', array( 'rem', 'em', 'vw', 'vh' ) );

    // Enable support for responsive embeds.
    add_theme_support( 'responsive-embeds' );

    // Remove WordPress Core Block Patterns.
    remove_theme_support( 'core-block-patterns' );
    
    // Prevent WordPress from loading remote block patterns.
    add_filter( 'should_load_remote_block_patterns', '__return_false' );
    
    // Remove WooCommerce Block Patterns if WooCommerce is active.
    if ( aegis_is_woocommerce_activated() ) {
        remove_theme_support( 'woocommerce-block-patterns' );
        add_filter( 'woocommerce_blocks_register_patterns', '__return_false' );
    }
}
add_action( 'after_setup_theme', 'aegis_theme_support' );

/**
 * Additional pattern removal on init.
 * 
 * Ensures complete removal of core block patterns by unregistering them
 * after they've been registered by WordPress core.
 *
 * @since 1.0.0
 * @return void
 */
function aegis_remove_patterns() {
    if ( function_exists( 'unregister_block_pattern' ) ) {
        $patterns = WP_Block_Patterns_Registry::get_instance()->get_all_registered();
        foreach ( $patterns as $pattern ) {
            if ( strpos( $pattern->name, 'core/' ) === 0 ) {
                unregister_block_pattern( $pattern->name );
            }
        }
    }
}
add_action( 'init', 'aegis_remove_patterns', 15 );

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
    wp_enqueue_style(
        'aegis-global-style',
        get_template_directory_uri() . '/style.css',
        array(),
        wp_get_theme()->get( 'Version' )
    );

    // Enqueue the global script.
    wp_enqueue_script(
        'aegis-global-script',
        get_template_directory_uri() . '/assets/js/index.js',
        array(),
        wp_get_theme()->get( 'Version' ),
        true
    );

    // Enqueue the animations script.
    wp_enqueue_script(
        'aegis-animations-script',
        get_template_directory_uri() . '/assets/js/animations.js',
        array(),
        wp_get_theme()->get( 'Version' ),
        true
    );
}
add_action( 'wp_enqueue_scripts', 'aegis_theme_styles' );

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
 * This function registers multiple custom styles for the `core blocks` to enhance
 * the visual options available within the block editor. Custom styles allow users to
 * apply different pre-defined appearances to the button block, providing flexibility
 * and creativity without additional custom CSS.
 *
 * Uses `register_block_style()` to define each style for the `core blocks`.
 * @link https://developer.wordpress.org/reference/functions/register_block_style/
 *
 * @since 1.0.0
 * @return void
 */
function aegis_register_block_styles() {

        /**
         * Register styles for the Core Button Block.
         *
         * This section registers a collection of styles for the `core/button` block.
         *
         * For more details on the Core Button Block, see:
         * @link https://developer.wordpress.org/block-editor/reference-guides/core-blocks/#button
         *
         * @since 1.0.0
         */

        // Registers: 3D Push Style
        register_block_style(
            'core/button',
            array(
                'name'  => '3d-push',
                'label' => esc_html__( '3D Push', 'aegis' ),
            )
        );

        // Registers: Bubble Pop Style
        register_block_style(
            'core/button',
            array(
                'name'  => 'bubble-pop',
                'label' => esc_html__( 'Bubble Pop', 'aegis' ),
            )
        );

        // Registers: Center Fill Style
        register_block_style(
            'core/button',
            array(
                'name'  => 'center-fill',
                'label' => esc_html__( 'Center Fill', 'aegis' ),
            )
        );

        // Registers: Color Wipe Style
        register_block_style(
            'core/button',
            array(
                'name'  => 'color-wipe',
                'label' => esc_html__( 'Color Wipe', 'aegis' ),
            )
        );

        // Registers: Dense Shadow Style
        register_block_style(
            'core/button',
            array(
                'name'  => 'dense-shadow',
                'label' => esc_html__( 'Dense Shadow', 'aegis' ),
            )
        );

        // Registers: Outline Border Style
        register_block_style(
            'core/button',
            array(
                'name'  => 'outline-border',
                'label' => esc_html__( 'Outline Border', 'aegis' ),
            )
        );

        // Registers: Outline Shadow Style
        register_block_style(
            'core/button',
            array(
                'name'  => 'outline-shadow',
                'label' => esc_html__( 'Outline Shadow', 'aegis' ),
            )
        );

        // Registers: Soft Fade Style
        register_block_style(
            'core/button',
            array(
                'name'  => 'soft-fade',
                'label' => esc_html__( 'Soft Fade', 'aegis' ),
            )
        );

        // Registers: Split Reveal Style
        register_block_style(
            'core/button',
            array(
                'name'  => 'split-reveal',
                'label' => esc_html__( 'Split Reveal', 'aegis' ),
            )
        );

        // Registers: Underline Border Style
        register_block_style(
            'core/button',
            array(
                'name'  => 'underline-border',
                'label' => esc_html__( 'Underline Border', 'aegis' ),
            )
        );

        /**
         * Register styles for the Core Image Block.
         *
         * This section registers a collection of styles for the `core/image` block.
         *
         * For more details on the Core Image Block, see:
         * @link https://developer.wordpress.org/block-editor/reference-guides/core-blocks/#image
         *
         * @since 1.0.0
         */

        // Registers: Color Overlay Style
        register_block_style(
            'core/image',
            array(
                'name'  => 'color-overlay',
                'label' => esc_html__( 'Color Overlay', 'aegis' ),
            )
        );

        // Registers: Ease Out Style
        register_block_style(
            'core/image',
            array(
                'name'  => 'ease-out',
                'label' => esc_html__( 'Ease Out', 'aegis' ),
            )
        );

        // Registers: Fade Scale Style
        register_block_style(
            'core/image',
            array(
                'name'  => 'fade-scale',
                'label' => esc_html__( 'Fade Scale', 'aegis' ),
            )
        );

        // Registers: Flip Hover Style
        register_block_style(
            'core/image',
            array(
                'name'  => 'flip-hover',
                'label' => esc_html__( 'Flip Hover', 'aegis' ),
            )
        );

        // Registers: Grayscale Hover Style
        register_block_style(
            'core/image',
            array(
                'name'  => 'grayscale-hover',
                'label' => esc_html__( 'Grayscale Hover', 'aegis' ),
            )
        );

        // Registers: Reveal Hover Style
        register_block_style(
            'core/image',
            array(
                'name'  => 'reveal-hover',
                'label' => esc_html__( 'Reveal Hover', 'aegis' ),
            )
        );

        // Registers: Rotate Hover Style
        register_block_style(
            'core/image',
            array(
                'name'  => 'rotate-hover',
                'label' => esc_html__( 'Rotate Hover', 'aegis' ),
            )
        );

        // Registers: Shine Hover Style
        register_block_style(
            'core/image',
            array(
                'name'  => 'shine-hover',
                'label' => esc_html__( 'Shine Hover', 'aegis' ),
            )
        );

        // Registers: Split Reveal Style
        register_block_style(
            'core/image',
            array(
                'name'  => 'split-reveal',
                'label' => esc_html__( 'Split Reveal', 'aegis' ),
            )
        );

        // Registers: Zoom Hover Style
        register_block_style(
            'core/image',
            array(
                'name'  => 'zoom-hover',
                'label' => esc_html__( 'Zoom Hover', 'aegis' ),
            )
        );

        /**
         * Register style for the Core Navigation Block.
         *
         * This section registers a style for the `core/navigation` block.
         *
         * For more details on the Core Navigation Block, see:
         * @link https://developer.wordpress.org/block-editor/reference-guides/core-blocks/#navigation
         *
         * @since 1.0.0
         */

        // Registers: Mega Menu
        register_block_style(
            'core/navigation-submenu',
            array(
                'name'  => 'mega-menu',
                'label' => esc_html__( 'Mega Menu', 'aegis' ),
            )
        );

        /**
         * Register style for the Core Post Date Block.
         *
         * This section registers a style for the `core/post-date` block.
         *
         * For more details on the Core Post Date Block, see:
         * @link https://developer.wordpress.org/block-editor/reference-guides/core-blocks/#date
         *
         * @since 1.0.0
         */

        // Registers: Hide Underline Style
        register_block_style(
            'core/post-date',
            array(
                'name'  => 'hide-underline',
                'label' => esc_html__( 'Hide Underline', 'aegis' ),
            )
        );

        /**
         * Register style for the Core Post Title Block.
         *
         * This section registers a style for the `core/post-title` block.
         *
         * For more details on the Core Post Title Block, see:
         * @link https://developer.wordpress.org/block-editor/reference-guides/core-blocks/#title
         *
         * @since 1.0.0
         */

        // Registers: Hide Underline Style
        register_block_style(
            'core/post-title',
            array(
                'name'  => 'hide-underline',
                'label' => esc_html__( 'Hide Underline', 'aegis' ),
            )
        );

        /**
         * Register style for the Core Video Block.
         *
         * This section registers a style for the `core/video` block,
         *
         * For more details on the Core Video Block, see:
         * @link https://developer.wordpress.org/block-editor/reference-guides/core-blocks/#video
         *
         * @since 1.0.0
         */

        // Register: Dark Shadow Style
        register_block_style(
            'core/video',
            array(
                'name'  => 'dark-shadow',
                'label' => esc_html__( 'Dark Shadow', 'aegis' ),
            )
        );
    }

add_action( 'init', 'aegis_register_block_styles' );

/**
 * Enqueue CSS for the Core Block styles.
 *
 * The `wp_enqueue_block_style()` function allows us to enqueue a stylesheet
 * for a specific block. These will only get loaded when the block is rendered
 * (both in the editor and on the front end), improving performance
 * and reducing the amount of data requested by visitors.
 *
 * @since 1.0.0
 * @return void
 */
function aegis_enqueue_block_styles() {
    /**
     * Enqueue styles for the Core Button Block.
     *
     * @link https://developer.wordpress.org/block-editor/reference-guides/core-blocks/#button
     */
    wp_enqueue_block_style(
        'core/button',
        array(
            'handle' => 'aegis-core-button-3d-push',
            'src'    => get_parent_theme_file_uri( 'assets/css/core-button-3d-push.css' ),
            'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
            'path'   => get_parent_theme_file_path( 'assets/css/core-button-3d-push.css' ),
        )
    );

    // Enqueues: Bubble Pop Style
    wp_enqueue_block_style(
        'core/button',
        array(
            'handle' => 'aegis-core-button-bubble-pop',
            'src'    => get_parent_theme_file_uri( 'assets/css/core-button-bubble-pop.css' ),
            'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
            'path'   => get_parent_theme_file_path( 'assets/css/core-button-bubble-pop.css' ),
        )
    );

    // Enqueues: Center Fill Style
    wp_enqueue_block_style(
        'core/button',
        array(
            'handle' => 'aegis-core-button-center-fill',
            'src'    => get_parent_theme_file_uri( 'assets/css/core-button-center-fill.css' ),
            'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
            'path'   => get_parent_theme_file_path( 'assets/css/core-button-center-fill.css' ),
        )
    );

    // Enqueues: Color Wipe Style
    wp_enqueue_block_style(
        'core/button',
        array(
            'handle' => 'aegis-core-button-color-wipe',
            'src'    => get_parent_theme_file_uri( 'assets/css/core-button-color-wipe.css' ),
            'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
            'path'   => get_parent_theme_file_path( 'assets/css/core-button-color-wipe.css' ),
        )
    );

    // Enqueues: Dense Shadow Style
    wp_enqueue_block_style(
        'core/button',
        array(
            'handle' => 'aegis-core-button-dense-shadow',
            'src'    => get_parent_theme_file_uri( 'assets/css/core-button-dense-shadow.css' ),
            'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
            'path'   => get_parent_theme_file_path( 'assets/css/core-button-dense-shadow.css' ),
        )
    );

    // Enqueues: Outline Border Style
    wp_enqueue_block_style(
        'core/button',
        array(
            'handle' => 'aegis-core-button-outline-border',
            'src'    => get_parent_theme_file_uri( 'assets/css/core-button-outline-border.css' ),
            'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
            'path'   => get_parent_theme_file_path( 'assets/css/core-button-outline-border.css' ),
        )
    );

    // Enqueues: Outline Shadow Style
    wp_enqueue_block_style(
        'core/button',
        array(
            'handle' => 'aegis-core-button-outline-shadow',
            'src'    => get_parent_theme_file_uri( 'assets/css/core-button-outline-shadow.css' ),
            'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
            'path'   => get_parent_theme_file_path( 'assets/css/core-button-outline-shadow.css' ),
        )
    );

    // Enqueues: Split Reveal Style
    wp_enqueue_block_style(
        'core/button',
        array(
            'handle' => 'aegis-core-button-split-reveal',
            'src'    => get_parent_theme_file_uri( 'assets/css/core-button-split-reveal.css' ),
            'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
            'path'   => get_parent_theme_file_path( 'assets/css/core-button-split-reveal.css' ),
        )
    );

    // Enqueues: Underline Border Style
    wp_enqueue_block_style(
        'core/button',
        array(
            'handle' => 'aegis-core-button-underline-border',
            'src'    => get_parent_theme_file_uri( 'assets/css/core-button-underline-border.css' ),
            'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
            'path'   => get_parent_theme_file_path( 'assets/css/core-button-underline-border.css' ),
        )
    );

    /**
     * Enqueue style for the Core Details Block.
     *
     * @link https://developer.wordpress.org/block-editor/reference-guides/core-blocks/#details
     */
    wp_enqueue_block_style(
        'core/details',
        array(
            'handle' => 'aegis-core-details-block',
            'src'    => get_parent_theme_file_uri( 'assets/css/core-details-block.css' ),
            'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
            'path'   => get_parent_theme_file_path( 'assets/css/core-details-block.css' ),
        )
    );

    /**
     * Enqueue style for the Core Heading Block.
     *
     * @link https://developer.wordpress.org/block-editor/reference-guides/core-blocks/#heading
     */
    wp_enqueue_block_style(
        'core/heading',
        array(
            'handle' => 'aegis-core-post-date-hide-underline',
            'src'    => get_parent_theme_file_uri( 'assets/css/core-blocks-hide-underline.css' ),
            'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
            'path'   => get_parent_theme_file_path( 'assets/css/core-post-title-hide-underline.css' ),
        )
    );

    /**
     * Enqueue style for the Core Image Block.
     *
     * @link https://developer.wordpress.org/block-editor/reference-guides/core-blocks/#image
     */
    wp_enqueue_block_style(
        'core/image',
        array(
            'handle' => 'aegis-core-image-color-overlay',
            'src'    => get_parent_theme_file_uri( 'assets/css/core-image-color-overlay.css' ),
            'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
            'path'   => get_parent_theme_file_path( 'assets/css/core-image-color-overlay.css' ),
        )
    );

    // Enqueues: Ease Out Style
    wp_enqueue_block_style(
        'core/image',
        array(
            'handle' => 'aegis-core-image-ease-out',
            'src'    => get_parent_theme_file_uri( 'assets/css/core-image-ease-out.css' ),
            'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
            'path'   => get_parent_theme_file_path( 'assets/css/core-image-ease-out.css' ),
        )
    );

    // Enqueues: Fade Scale Style
    wp_enqueue_block_style(
        'core/image',
        array(
            'handle' => 'aegis-core-image-fade-scale',
            'src'    => get_parent_theme_file_uri( 'assets/css/core-image-fade-scale.css' ),
            'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
            'path'   => get_parent_theme_file_path( 'assets/css/core-image-fade-scale.css' ),
        )
    );

    // Enqueues: Flip Hover Style
    wp_enqueue_block_style(
        'core/image',
        array(
            'handle' => 'aegis-core-image-flip-hover',
            'src'    => get_parent_theme_file_uri( 'assets/css/core-image-flip-hover.css' ),
            'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
            'path'   => get_parent_theme_file_path( 'assets/css/core-image-flip-hover.css' ),
        )
    );

    // Enqueues: Grayscale Hover Style
    wp_enqueue_block_style(
        'core/image',
        array(
            'handle' => 'aegis-core-image-grayscale-hover',
            'src'    => get_parent_theme_file_uri( 'assets/css/core-image-grayscale-hover.css' ),
            'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
            'path'   => get_parent_theme_file_path( 'assets/css/core-image-grayscale-hover.css' ),
        )
    );

    // Enqueues: Reveal Hover Style
    wp_enqueue_block_style(
        'core/image',
        array(
            'handle' => 'aegis-core-image-reveal-hover',
            'src'    => get_parent_theme_file_uri( 'assets/css/core-image-reveal-hover.css' ),
            'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
            'path'   => get_parent_theme_file_path( 'assets/css/core-image-reveal-hover.css' ),
        )
    );

    // Enqueues: Rotate Hover Style
    wp_enqueue_block_style(
        'core/image',
        array(
            'handle' => 'aegis-core-image-rotate-hover',
            'src'    => get_parent_theme_file_uri( 'assets/css/core-image-rotate-hover.css' ),
            'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
            'path'   => get_parent_theme_file_path( 'assets/css/core-image-rotate-hover.css' ),
        )
    );

    // Enqueues: Shine Hover Style
    wp_enqueue_block_style(
        'core/image',
        array(
            'handle' => 'aegis-core-image-shine-hover',
            'src'    => get_parent_theme_file_uri( 'assets/css/core-image-shine-hover.css' ),
            'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
            'path'   => get_parent_theme_file_path( 'assets/css/core-image-shine-hover.css' ),
        )
    );

    // Enqueues: Split Reveal Style
    wp_enqueue_block_style(
        'core/image',
        array(
            'handle' => 'aegis-core-image-split-reveal',
            'src'    => get_parent_theme_file_uri( 'assets/css/core-image-split-reveal.css' ),
            'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
            'path'   => get_parent_theme_file_path( 'assets/css/core-image-split-reveal.css' ),
        )
    );

    // Enqueues: Zoom Hover Style
    wp_enqueue_block_style(
        'core/image',
        array(
            'handle' => 'aegis-core-image-zoom-hover',
            'src'    => get_parent_theme_file_uri( 'assets/css/core-image-zoom-hover.css' ),
            'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
            'path'   => get_parent_theme_file_path( 'assets/css/core-image-zoom-hover.css' ),
        )
    );

    /**
     * Enqueue style for the Core List Block.
     *
     * @link https://developer.wordpress.org/block-editor/reference-guides/core-blocks/#list
     */
    wp_enqueue_block_style(
        'core/list',
        array(
            'handle' => 'aegis-core-list-disc',
            'src'    => get_parent_theme_file_uri( 'assets/css/core-list-block.css' ),
            'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
            'path'   => get_parent_theme_file_path( 'assets/css/core-list-block.css' ),
        )
    );

    /**
     * Enqueue styles for the Core Navigation Block.
     *
     * @link https://developer.wordpress.org/block-editor/reference-guides/core-blocks/#navigation
     */
    wp_enqueue_block_style(
        'core/navigation',
        array(
            'handle' => 'aegis-core-navigation-block',
            'src'    => get_parent_theme_file_uri( 'assets/css/core-navigation-block.css' ),
            'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
            'path'   => get_parent_theme_file_path( 'assets/css/core-navigation-block.css' ),
        )
    );

    // Enqueues: Navigation Mega Menu Style
    wp_enqueue_block_style(
        'core/navigation-submenu',
        array(
            'handle' => 'aegis-core-navigation-mega-menu',
            'src'    => get_parent_theme_file_uri( 'assets/css/core-navigation-mega-menu.css' ),
            'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
            'path'   => get_parent_theme_file_path( 'assets/css/core-navigation-mega-menu.css' ),
        )
    );

    /**
     * Enqueue style for the Core Post Date Block.
     *
     * @link https://developer.wordpress.org/block-editor/reference-guides/core-blocks/#date
     */
    wp_enqueue_block_style(
        'core/post-date',
        array(
            'handle' => 'aegis-core-post-date-hide-underline',
            'src'    => get_parent_theme_file_uri( 'assets/css/core-blocks-hide-underline.css' ),
            'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
            'path'   => get_parent_theme_file_path( 'assets/css/core-post-title-hide-underline.css' ),
        )
    );

    /**
     * Enqueue style for the Core Post Title Block.
     *
     * @link https://developer.wordpress.org/block-editor/reference-guides/core-blocks/#title
     */
    wp_enqueue_block_style(
        'core/post-title',
        array(
            'handle' => 'aegis-core-post-title-hide-underline',
            'src'    => get_parent_theme_file_uri( 'assets/css/core-blocks-hide-underline.css' ),
            'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
            'path'   => get_parent_theme_file_path( 'assets/css/core-blocks-hide-underline.css' ),
        )
    );

    /**
     * Enqueue style for the Core Video Block.
     *
     * @link https://developer.wordpress.org/block-editor/reference-guides/core-blocks/#video
     */
    wp_enqueue_block_style(
        'core/video',
        array(
            'handle' => 'aegis-core-video-dark-shadow',
            'src'    => get_parent_theme_file_uri( 'assets/css/core-video-dark-shadow.css' ),
            'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
            'path'   => get_parent_theme_file_path( 'assets/css/core-video-dark-shadow.css' ),
        )
    );
}
add_action( 'init', 'aegis_enqueue_block_styles' );

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
            'thumbnail_image_width' => 480,
            'single_image_width'    => 1920,
        ));

        /**
         * Change number of products per row to 4.
         */
        add_filter('loop_shop_columns', 'aegis_loop_columns', 999);
        if (!function_exists('aegis_loop_columns')) {
            function aegis_loop_columns() {
                return 4; // 4 products per row.
            }
        }
    }
}
