<?php
/**
 * This file adds actions, filters, and functions to the theme.
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
 * @return void
 */
function aegis_theme_support() {

    // Enqueue Editor styles.
    // Adds a stylesheet for the block editor to match the theme's front-end styles.
    add_editor_style('style.css');

    // Enable support for custom units.
    // Allows the theme to support custom CSS units like 'rem', 'em', 'vw', and 'vh' in the block editor.
    add_theme_support('custom-units', array('rem', 'em', 'vw', 'vh'));

    // Enable support for responsive embeds.
    // Makes embedded content like videos and iframes responsive.
    add_theme_support('responsive-embeds');

    // Disable WordPress Block Patterns.
    // Removes support for default WordPress core block patterns.
    remove_theme_support('core-block-patterns');

    // Disable loading of remote Block Patterns.
    // Prevents loading of block patterns from remote sources.
    add_filter('should_load_remote_block_patterns', '__return_false');

    // Disable WooCommerce Block Patterns.
    // Removes support for WooCommerce-specific block patterns.
    remove_theme_support('woocommerce-blocks-patterns');
}

add_action('after_setup_theme', 'aegis_theme_support');

/**
 * Enqueue theme styles.
 *
 * @since 1.0.0
 * @return void
 */
function aegis_theme_styles() {

	// Enqueue the main stylesheet for the theme.
	// This function adds the main stylesheet (style.css) to the theme, ensuring it is loaded on the front-end.
	wp_enqueue_style('aegis-global-style', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get('Version'));

	// Enqueue the global script.
	// This function adds the global JavaScript file (index.js) to the theme, ensuring it is loaded on the front-end.
	wp_enqueue_script('aegis-global-script', get_template_directory_uri() . '/assets/js/index.js', array(), wp_get_theme()->get('Version'), true);

	// Enqueue the animations script.
	// This function adds the animations JavaScript file (animations.js) to the theme, ensuring it is loaded on the front-end.
	wp_enqueue_script('aegis-animations-script', get_template_directory_uri() . '/assets/js/animations.js', array(), wp_get_theme()->get('Version'), true);
}

add_action('wp_enqueue_scripts', 'aegis_theme_styles');

/**
 * Register Block Pattern Categories.
 *
 * @link https://developer.wordpress.org/reference/functions/register_block_pattern/
 * 
 * @since 1.0.0
 * @return void
 */
function aegis_register_block_categories() {

        // Registers About Pattern Category
        register_block_pattern_category(
            'about',
            array(
                'label'       => _x( 'About', 'Block pattern category', 'aegis' ),
                'description' => __( 'A collection of About Patterns.', 'aegis' ),
            )
        );

        // Registers Audio Pattern Category
        register_block_pattern_category(
            'audio',
            array(
                'label'       => _x( 'Audio', 'Block pattern category', 'aegis' ),
                'description' => __( 'A collection of Audio Patterns.', 'aegis' ),
            )
        );

        // Registers Blog Pattern Category
        register_block_pattern_category(
            'blog',
            array(
                'label'       => _x( 'Blog', 'Block pattern category', 'aegis' ),
                'description' => __( 'A collection of Blog Patterns.', 'aegis' ),
            )
        );

        // Registers eCommerce Pattern Category
        register_block_pattern_category(
            'ecommerce',
            array(
                'label'       => _x( 'eCommerce', 'Block pattern category', 'aegis' ),
                'description' => __( 'A collection of eCommerce Patterns.', 'aegis' ),
            )
        );

        // Registers Events Pattern Category
        register_block_pattern_category(
            'events',
            array(
                'label'       => _x( 'Events', 'Block pattern category', 'aegis' ),
                'description' => __( 'A collection of Events Patterns.', 'aegis' ),
            )
        );

        // Registers FAQ Pattern Category
        register_block_pattern_category(
            'faq',
            array(
                'label'       => _x( 'FAQ', 'Block pattern category', 'aegis' ),
                'description' => __( 'A collection of FAQ Patterns.', 'aegis' ),
            )
        );

        // Registers Hero Pattern Category
        register_block_pattern_category(
            'hero',
            array(
                'label'       => _x( 'Hero', 'Block pattern category', 'aegis' ),
                'description' => __( 'A collection of Hero Patterns.', 'aegis' ),
            )
        );

        // Registers Pricing Category
        register_block_pattern_category(
            'pricing',
            array(
                'label'       => _x( 'Pricing', 'Block pattern category', 'aegis' ),
                'description' => __( 'A collection of Pricing Patterns.', 'aegis' ),
            )
        );

        // Registers Video Category
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
 * Register  Custom Block Styles.
 *
 * This function registers custom block patterns using the register_block_pattern() function.
 * These patterns will be available for use in the block editor and can improve the content creation process.
 * 
 * @link https://developer.wordpress.org/reference/functions/register_block_style/
 *
 * @since 1.0.0
 * @return void
 */
function aegis_register_block_styles() {

        // Core Button Block: 3D Push Style
        register_block_style(
            'core/button',
            array(
                'name'  => '3d-push',
                'label' => esc_html__( '3D Push', 'aegis' ),
            )
        );

        // Core Button Block: Bubble Pop Style
        register_block_style(
            'core/button',
            array(
                'name'  => 'bubble-pop',
                'label' => esc_html__( 'Bubble Pop', 'aegis' ),
            )
        );

        // Core Button Block: Center Fill Style
        register_block_style(
            'core/button',
            array(
                'name'  => 'center-fill',
                'label' => esc_html__( 'Center Fill', 'aegis' ),
            )
        );

        // Core Button Block: Color Wipe Style
        register_block_style(
            'core/button',
            array(
                'name'  => 'color-wipe',
                'label' => esc_html__( 'Color Wipe', 'aegis' ),
            )
        );

        // Core Button Block: Dense Shadow Style
        register_block_style(
            'core/button',
            array(
                'name'  => 'dense-shadow',
                'label' => esc_html__( 'Dense Shadow', 'aegis' ),
            )
        );

        // Core Button Block: Outline Border Style
        register_block_style(
            'core/button',
            array(
                'name'  => 'outline-border',
                'label' => esc_html__( 'Outline Border', 'aegis' ),
            )
        );

        // Core Button Block: Outline Shadow Style
        register_block_style(
            'core/button',
            array(
                'name'  => 'outline-shadow',
                'label' => esc_html__( 'Outline Shadow', 'aegis' ),
            )
        );

        // Core Button Block: Underline Border Style
        register_block_style(
            'core/button',
            array(
                'name'  => 'underline-border',
                'label' => esc_html__( 'Underline Border', 'aegis' ),
            )
        );

        // Core Button Block: Soft Fade Style
        register_block_style(
            'core/button',
            array(
                'name'  => 'soft-fade',
                'label' => esc_html__( 'Soft Fade', 'aegis' ),
            )
        );

        // Core Button Block: Split Reveal Style
        register_block_style(
            'core/button',
            array(
                'name'  => 'split-reveal',
                'label' => esc_html__( 'Split Reveal', 'aegis' ),
            )
        );

        // Core Heading Block: Hide Underline Style
        register_block_style(
            'core/heading',
            array(
                'name'  => 'hide-underline',
                'label' => esc_html__( 'Hide Underline', 'aegis' ),
            )
        );

        // Core Image Block: Color Overlay Style
        register_block_style(
            'core/image',
            array(
                'name'  => 'color-overlay',
                'label' => esc_html__( 'Color Overlay', 'aegis' ),
            )
        );

        // Core Image Block: Ease Out Style
        register_block_style(
            'core/image',
            array(
                'name'  => 'ease-out',
                'label' => esc_html__( 'Ease Out', 'aegis' ),
            )
        );

        // Core Image Block: Fade Scale Style
        register_block_style(
            'core/image',
            array(
                'name'  => 'fade-scale',
                'label' => esc_html__( 'Fade Scale', 'aegis' ),
            )
        );

        // Core Image Block: Flip Hover Style
        register_block_style(
            'core/image',
            array(
                'name'  => 'flip-hover',
                'label' => esc_html__( 'Flip Hover', 'aegis' ),
            )
        );

        // Core Image Block: Grayscale Hover Style
        register_block_style(
            'core/image',
            array(
                'name'  => 'grayscale-hover',
                'label' => esc_html__( 'Grayscale Hover', 'aegis' ),
            )
        );

        // Core Image Block: Reveal Hover Style
        register_block_style(
            'core/image',
            array(
                'name'  => 'reveal-hover',
                'label' => esc_html__( 'Reveal Hover', 'aegis' ),
            )
        );

        // Core Image Block: Rotate Hover Style
        register_block_style(
            'core/image',
            array(
                'name'  => 'rotate-hover',
                'label' => esc_html__( 'Rotate Hover', 'aegis' ),
            )
        );

        // Core Image Block: Shine Hover Style
        register_block_style(
            'core/image',
            array(
                'name'  => 'shine-hover',
                'label' => esc_html__( 'Shine Hover', 'aegis' ),
            )
        );

        // Core Image Block: Split Reveal Style
        register_block_style(
            'core/image',
            array(
                'name'  => 'split-reveal',
                'label' => esc_html__( 'Split Reveal', 'aegis' ),
            )
        );

        // Core Image Block: Zoom Hover Style
        register_block_style(
            'core/image',
            array(
                'name'  => 'zoom-hover',
                'label' => esc_html__( 'Zoom Hover', 'aegis' ),
            )
        );

        // Core Navigation Block: Mega Menu Style
        register_block_style(
            'core/navigation-submenu',
            array(
                'name'  => 'mega-menu',
                'label' => esc_html__( 'Mega Menu', 'aegis' ),
            )
        );

        // Core Post Date Block: Hide Underline Style
        register_block_style(
            'core/post-date',
            array(
                'name'  => 'hide-underline',
                'label' => esc_html__( 'Hide Underline', 'aegis' ),
            )
        );

        // Core Post Title Block: Hide Underline Style
        register_block_style(
            'core/post-title',
            array(
                'name'  => 'hide-underline',
                'label' => esc_html__( 'Hide Underline', 'aegis' ),
            )
        );

        // Core Pullquote Block: Hide Underline Style
        register_block_style(
            'core/pullquote',
            array(
                'name'  => 'foreground',
                'label' => esc_html__( 'Foreground', 'aegis' ),
            )
        );

        // Core Video Block: Dark Shadow Style
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
 * Enqueue Custom Core Block Styles.
 *
 * The wp_enqueue_block_style() function allows us to enqueue a stylesheet
 * for a specific block. These will only get loaded when the block is rendered
 * (both in the editor and on the front end), improving performance
 * and reducing the amount of data requested by visitors.
 *
 * @since 1.0.0
 * @return void
 */
function aegis_enqueue_block_styles() {

		// Core Button Block: 3D Push Style
		wp_enqueue_block_style(
			'core/button',
			array(
				'handle' => 'aegis-core-button-3d-push',
				'src'    => get_parent_theme_file_uri( 'assets/css/core-button-3d-push.css' ),
				'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
				'path'   => get_parent_theme_file_path( 'assets/css/core-button-3d-push.css' ),
				)
			);

		// Core Button Block: Bubble Pop Style
		wp_enqueue_block_style(
			'core/button',
			array(
				'handle' => 'aegis-core-button-bubble-pop',
				'src'    => get_parent_theme_file_uri( 'assets/css/core-button-bubble-pop.css' ),
				'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
				'path'   => get_parent_theme_file_path( 'assets/css/core-button-bubble-pop.css' ),
				)
			);

		// Core Button Block: Center Fill Style
		wp_enqueue_block_style(
			'core/button',
			array(
				'handle' => 'aegis-core-button-center-fill',
				'src'    => get_parent_theme_file_uri( 'assets/css/core-button-center-fill.css' ),
				'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
				'path'   => get_parent_theme_file_path( 'assets/css/core-button-center-fill.css' ),
				)
			);

		// Core Button Block: Color Wipe Style
		wp_enqueue_block_style(
			'core/button',
			array(
				'handle' => 'aegis-core-button-color-wipe',
				'src'    => get_parent_theme_file_uri( 'assets/css/core-button-color-wipe.css' ),
				'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
				'path'   => get_parent_theme_file_path( 'assets/css/core-button-color-wipe.css' ),
				)
			);

		// Core Button Block: Dense Shadow Style
		wp_enqueue_block_style(
			'core/button',
			array(
				'handle' => 'aegis-core-button-dense-shadow',
				'src'    => get_parent_theme_file_uri( 'assets/css/core-button-dense-shadow.css' ),
				'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
				'path'   => get_parent_theme_file_path( 'assets/css/core-button-dense-shadow.css' ),
			)
		);

		// Core Button Block: Outline Border Style
		wp_enqueue_block_style(
			'core/button',
			array(
				'handle' => 'aegis-core-button-outline-border',
				'src'    => get_parent_theme_file_uri( 'assets/css/core-button-outline-border.css' ),
				'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
				'path'   => get_parent_theme_file_path( 'assets/css/core-button-outline-border.css' ),
			)
		);

		// Core Button Block: Outline Shadow Style
		wp_enqueue_block_style(
			'core/button',
			array(
				'handle' => 'aegis-core-button-outline-shadow',
				'src'    => get_parent_theme_file_uri( 'assets/css/core-button-outline-shadow.css' ),
				'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
				'path'   => get_parent_theme_file_path( 'assets/css/core-button-outline-shadow.css' ),
			)
		);

		// Core Button Block: Soft Fade Style
		wp_enqueue_block_style(
			'core/button',
			array(
				'handle' => 'aegis-core-button-soft-fade',
				'src'    => get_parent_theme_file_uri( 'assets/css/core-button-soft-fade.css' ),
				'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
				'path'   => get_parent_theme_file_path( 'assets/css/core-button-soft-fade.css' ),
			)
		);

        // Core Button Block: Split Reveal Style
		wp_enqueue_block_style(
			'core/button',
			array(
				'handle' => 'aegis-core-button-split-reveal',
				'src'    => get_parent_theme_file_uri( 'assets/css/core-button-split-reveal.css' ),
				'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
				'path'   => get_parent_theme_file_path( 'assets/css/core-button-split-reveal.css' ),
			)
		);

		// Core Button Block: Underline Border Style
		wp_enqueue_block_style(
			'core/button',
			array(
				'handle' => 'aegis-core-button-underline-border',
				'src'    => get_parent_theme_file_uri( 'assets/css/core-button-underline-border.css' ),
				'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
				'path'   => get_parent_theme_file_path( 'assets/css/core-button-underline-border.css' ),
			)
		);
		
		// Core Details Block: Default Style
		wp_enqueue_block_style(
			'core/details',
			array(
				'handle' => 'aegis-core-details-block',
				'src'    => get_parent_theme_file_uri( 'assets/css/core-details-block.css' ),
				'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
				'path'   => get_parent_theme_file_path( 'assets/css/core-details-block.css' ),
			)
		);

		// Core Heading Block: Hide Underline Style
		wp_enqueue_block_style(
			'core/heading',
			array(
				'handle' => 'aegis-core-post-date-hide-underline',
				'src'    => get_parent_theme_file_uri( 'assets/css/core-blocks-hide-underline.css' ),
				'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
				'path'   => get_parent_theme_file_path( 'assets/css/core-post-title-hide-underline.css' ),
			)
		);

		// Core Image Block: Color Overlay Style
		wp_enqueue_block_style(
			'core/image',
			array(
				'handle' => 'aegis-core-image-color-overlay',
				'src'    => get_parent_theme_file_uri( 'assets/css/core-image-color-overlay.css' ),
				'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
				'path'   => get_parent_theme_file_path( 'assets/css/core-image-color-overlay.css' ),
			)
		);

		// Core Image Block: Ease Out Style
		wp_enqueue_block_style(
			'core/image',
			array(
				'handle' => 'aegis-core-image-ease-out',
				'src'    => get_parent_theme_file_uri( 'assets/css/core-image-ease-out.css' ),
				'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
				'path'   => get_parent_theme_file_path( 'assets/css/core-image-ease-out.css' ),
			)
		);

		// Core Image Block: Fade Scale Style
		wp_enqueue_block_style(
			'core/image',
			array(
				'handle' => 'aegis-core-image-fade-scale',
				'src'    => get_parent_theme_file_uri( 'assets/css/core-image-fade-scale.css' ),
				'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
				'path'   => get_parent_theme_file_path( 'assets/css/core-image-fade-scale.css' ),
			)
		);

		// Core Image Block: Flip Hover Style
		wp_enqueue_block_style(
			'core/image',
			array(
				'handle' => 'aegis-core-image-flip-hover',
				'src'    => get_parent_theme_file_uri( 'assets/css/core-image-flip-hover.css' ),
				'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
				'path'   => get_parent_theme_file_path( 'assets/css/core-image-flip-hover.css' ),
			)
		);

		// Core Image Block: Flip Hover Style
		wp_enqueue_block_style(
			'core/list',
			array(
				'handle' => 'aegis-core-list-disc',
				'src'    => get_parent_theme_file_uri( 'assets/css/core-list-block.css' ),
				'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
				'path'   => get_parent_theme_file_path( 'assets/css/core-list-block.css' ),
			)
		);

		// Core Image Block: Grayscale Hover Style
		wp_enqueue_block_style(
			'core/image',
			array(
				'handle' => 'aegis-core-image-grayscale-hover',
				'src'    => get_parent_theme_file_uri( 'assets/css/core-image-grayscale-hover.css' ),
				'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
				'path'   => get_parent_theme_file_path( 'assets/css/core-image-grayscale-hover.css' ),
			)
		);

		// Core Image Block: Reveal Hover Style
		wp_enqueue_block_style(
			'core/image',
			array(
				'handle' => 'aegis-core-image-reveal-hover',
				'src'    => get_parent_theme_file_uri( 'assets/css/core-image-reveal-hover.css' ),
				'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
				'path'   => get_parent_theme_file_path( 'assets/css/core-image-reveal-hover.css' ),
			)
		);

		// Core Image Block: Reveal Hover Style
		wp_enqueue_block_style(
			'core/image',
			array(
				'handle' => 'aegis-core-image-reveal-hover',
				'src'    => get_parent_theme_file_uri( 'assets/css/core-image-reveal-hover.css' ),
				'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
				'path'   => get_parent_theme_file_path( 'assets/css/core-image-reveal-hover.css' ),
			)
		);

		// Core Image Block: Rotate Hover Style
		wp_enqueue_block_style(
			'core/image',
			array(
				'handle' => 'aegis-core-image-rotate-hover',
				'src'    => get_parent_theme_file_uri( 'assets/css/core-image-rotate-hover.css' ),
				'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
				'path'   => get_parent_theme_file_path( 'assets/css/core-image-rotate-hover.css' ),
			)
		);

		// Core Image Block: Shine Hover Style
		wp_enqueue_block_style(
			'core/image',
			array(
				'handle' => 'aegis-core-image-shine-hover',
				'src'    => get_parent_theme_file_uri( 'assets/css/core-image-shine-hover.css' ),
				'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
				'path'   => get_parent_theme_file_path( 'assets/css/core-image-shine-hover.css' ),
			)
		);

		// Core Image Block: Split Reveal Style
		wp_enqueue_block_style(
			'core/image',
			array(
				'handle' => 'aegis-core-image-split-reveal',
				'src'    => get_parent_theme_file_uri( 'assets/css/core-image-split-reveal.css' ),
				'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
				'path'   => get_parent_theme_file_path( 'assets/css/core-image-split-reveal.css' ),
			)
		);

		// Core Image Block: Zoom Hover Style
		wp_enqueue_block_style(
			'core/image',
			array(
				'handle' => 'aegis-core-image-zoom-hover',
				'src'    => get_parent_theme_file_uri( 'assets/css/core-image-zoom-hover.css' ),
				'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
				'path'   => get_parent_theme_file_path( 'assets/css/core-image-zoom-hover.css' ),
			)
		);

		// Core Navigation Block: Navigation Style
		wp_enqueue_block_style(
			'core/navigation',
			array(
				'handle' => 'aegis-core-navigation-block',
				'src'    => get_parent_theme_file_uri( 'assets/css/core-navigation-block.css' ),
				'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
				'path'   => get_parent_theme_file_path( 'assets/css/core-navigation-block.css' ),
			)
		);

		// Core Navigation Submenu Block: Mega Menu Style
		wp_enqueue_block_style(
			'core/navigation-submenu',
			array(
				'handle' => 'aegis-core-navigation-mega-menu',
				'src'    => get_parent_theme_file_uri( 'assets/css/core-navigation-mega-menu.css' ),
				'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
				'path'   => get_parent_theme_file_path( 'assets/css/core-navigation-mega-menu.css' ),
			)
		);

		// Core Post Date Block: Hide Underline Style
		wp_enqueue_block_style(
			'core/post-date',
			array(
				'handle' => 'aegis-core-post-date-hide-underline',
				'src'    => get_parent_theme_file_uri( 'assets/css/core-blocks-hide-underline.css' ),
				'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
				'path'   => get_parent_theme_file_path( 'assets/css/core-post-title-hide-underline.css' ),
			)
		);

		// Core Post Title Block: Hide Underline Style
		wp_enqueue_block_style(
			'core/post-title',
			array(
				'handle' => 'aegis-core-post-title-hide-underline',
				'src'    => get_parent_theme_file_uri( 'assets/css/core-blocks-hide-underline.css' ),
				'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
				'path'   => get_parent_theme_file_path( 'assets/css/core-blocks-hide-underline.css' ),
			)
		);

		// Core Video Block: Dark Shadow Style
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

add_action( 'after_setup_theme', 'aegis_include_woocommerce_support' );