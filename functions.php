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
function aegis_support() {
    // Disable WooCommerce Block Patterns.
    remove_theme_support('woocommerce-blocks-patterns');

    // Disable WordPress Block Patterns.
    remove_theme_support('core-block-patterns');

    // Enqueue Editor styles.
    add_editor_style('style.css');
}
add_action('after_setup_theme', 'aegis_support');

// Disable loading of remote Block Patterns.
add_filter( 'should_load_remote_block_patterns', '__return_false' );

/**
 * Enqueue theme styles.
 *
 * @since 1.0.0
 * @return void
 */
function aegis_styles() {
    wp_enqueue_style('aegis-styles', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get('Version'));

    // Animations CSS.
    wp_enqueue_style('aegis-animations-styles', get_template_directory_uri() . '/assets/css/animations.css', array(), wp_get_theme()->get('Version'));

    // Global Script.
    wp_enqueue_script('aegis-global-script', get_template_directory_uri() . '/assets/js/index.js', array(), wp_get_theme()->get('Version'), true);

    // Animations Script.
    wp_enqueue_script('aegis-animations-script', get_template_directory_uri() . '/assets/js/animations.js', array(), wp_get_theme()->get('Version'), true);
}
add_action('wp_enqueue_scripts', 'aegis_styles');

/**
 * Include Block Patterns.
 *
 * @since 1.0.0
 * @return void
 */
require get_template_directory() . '/inc/block-patterns.php';

/**
 * Register custom block patterns.
 *
 * This function registers custom block patterns using the register_block_pattern() function.
 * These patterns will be available for use in the block editor and can improve the content creation process.
 * 
 * @link https://developer.wordpress.org/reference/functions/register_block_style/
 *
 * @since 1.0.0
 * @return void
 */

if ( function_exists( 'register_block_style' ) ) {
	/**
	 * Register Core Block Styles.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	function aegis_register_block_styles() {

		// Core Button Block: 3D Push Style
		register_block_style(
			'core/button',
			array(
				'name'  => '3d-push',
				'label' => esc_html__('3D Push', 'aegis'),
			)
		);

		// Core Button Block: Bubble Pop Style
		register_block_style(
			'core/button',
			array(
				'name'  => 'bubble-pop',
				'label' => esc_html__('Bubble Pop', 'aegis'),
			)
		);

		// Core Button Block: Center Fill Style
		register_block_style(
			'core/button',
			array(
				'name'  => 'center-fill',
				'label' => esc_html__('Center Fill', 'aegis'),
			)
		);

		// Core Button Block: Color Wipe Style
		register_block_style(
			'core/button',
			array(
				'name'  => 'color-wipe',
				'label' => esc_html__('Color Wipe', 'aegis'),
			)
		);

		// Core Button Block: Dense Shadow Style
		register_block_style(
			'core/button',
			array(
				'name'  => 'dense-shadow',
				'label' => esc_html__('Dense Shadow', 'aegis'),
			)
		);

		// Core Button Block: Outline Border Style
		register_block_style(
			'core/button',
			array(
				'name'  => 'outline-border',
				'label' => esc_html__('Outline Border', 'aegis'),
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
				'label' => esc_html__('Underline Border', 'aegis'),
			)
		);

		// Core Button Block: Soft Fade Style
		register_block_style(
			'core/button',
			array(
				'name'  => 'soft-fade',
				'label' => esc_html__('Soft Fade', 'aegis'),
			)
		);

		// Core Button Block: Split Reveal Style
		register_block_style(
			'core/button',
			array(
				'name'  => 'split-reveal',
				'label' => esc_html__('Split Reveal', 'aegis'),
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

	    // Core Image Block: Shine Over Style
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
				'label' => esc_html__('Mega Menu', 'aegis'),
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
}

/**
 * Enqueue custom core block stylesheets.
 *
 * The wp_enqueue_block_style() function allows us to enqueue a stylesheet
 * for a specific block. These will only get loaded when the block is rendered
 * (both in the editor and on the front end), improving performance
 * and reducing the amount of data requested by visitors.
 *
 * @since 1.0.0
 * @return void
 */
function aegis_block_stylesheets() {
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
add_action('init', 'aegis_block_stylesheets');

/**
 * Query whether WooCommerce is activated.
 *
 * @since 1.0.0
 * @return bool True if WooCommerce is activated, false otherwise.
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
 * Include WooCommerce support.
 *
 * @since 1.0.0
 * @return void
 */
if (class_exists('Woocommerce')) {
    require get_template_directory() . '/inc/woocommerce/functions.php';
}