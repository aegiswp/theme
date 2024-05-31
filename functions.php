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
 * Enqueue theme styles.
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

    // Add Block Patterns.
    require get_template_directory() . '/inc/block-patterns.php';

    // Add Block Styles.
    require get_template_directory() . '/inc/block-styles.php';


/**
 * Enqueue core block stylesheets.
 */

if ( ! function_exists( 'aegis_block_stylesheets' ) ) :

	/**
	 * Enqueue custom core block stylesheets.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	function aegis_block_stylesheets() {
		/**
		 * The wp_enqueue_block_style() function allows us to enqueue a stylesheet
		 * for a specific block. These will only get loaded when the block is rendered
		 * (both in the editor and on the front end), improving performance
		 * and reducing the amount of data requested by visitors.
		 *
		 * See https://make.wordpress.org/core/2021/12/15/using-multiple-stylesheets-per-block/ for more information.
		 */
		wp_enqueue_block_style(
			'core/button',
			array(
				'handle' => 'aegis-core-button-dark-shadow',
				'src'    => get_parent_theme_file_uri( 'assets/css/core-button-dark-shadow.css' ),
				'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
				'path'   => get_parent_theme_file_path( 'assets/css/core-button-dark-shadow.css' ),
			)
		);

		wp_enqueue_block_style(
			'core/button',
			array(
				'handle' => 'aegis-core-button-light-shadow',
				'src'    => get_parent_theme_file_uri( 'assets/css/core-button-light-shadow.css' ),
				'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
				'path'   => get_parent_theme_file_path( 'assets/css/core-button-light-shadow.css' ),
			)
		);

		wp_enqueue_block_style(
			'core/button',
			array(
				'handle' => 'aegis-core-button-dark-outline',
				'src'    => get_parent_theme_file_uri( 'assets/css/core-button-dark-outline.css' ),
				'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
				'path'   => get_parent_theme_file_path( 'assets/css/core-button-dark-outline.css' ),
			)
		);

		wp_enqueue_block_style(
			'core/button',
			array(
				'handle' => 'aegis-core-button-dark-slider',
				'src'    => get_parent_theme_file_uri( 'assets/css/core-button-dark-slider.css' ),
				'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
				'path'   => get_parent_theme_file_path( 'assets/css/core-button-dark-slider.css' ),
			)
		);

		wp_enqueue_block_style(
			'core/button',
			array(
				'handle' => 'aegis-core-button-light-slider',
				'src'    => get_parent_theme_file_uri( 'assets/css/core-button-light-slider.css' ),
				'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
				'path'   => get_parent_theme_file_path( 'assets/css/core-button-light-slider.css' ),
			)
		);

		wp_enqueue_block_style(
			'core/button',
			array(
				'handle' => 'aegis-core-button-dark-line',
				'src'    => get_parent_theme_file_uri( 'assets/css/core-button-dark-line.css' ),
				'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
				'path'   => get_parent_theme_file_path( 'assets/css/core-button-dark-line.css' ),
			)
		);

		wp_enqueue_block_style(
			'core/button',
			array(
				'handle' => 'aegis-core-button-light-line',
				'src'    => get_parent_theme_file_uri( 'assets/css/core-button-light-line.css' ),
				'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
				'path'   => get_parent_theme_file_path( 'assets/css/core-button-light-line.css' ),
			)
		);

		wp_enqueue_block_style(
			'core/button',
			array(
				'handle' => 'aegis-core-button-outline-shadow',
				'src'    => get_parent_theme_file_uri( 'assets/css/core-button-outline-shadow.css' ),
				'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
				'path'   => get_parent_theme_file_path( 'assets/css/core-button-outline-shadow.css' ),
			)
		);

		wp_enqueue_block_style(
			'core/button',
			array(
				'handle' => 'aegis-core-button-dense-shadow',
				'src'    => get_parent_theme_file_uri( 'assets/css/core-button-dense-shadow.css' ),
				'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
				'path'   => get_parent_theme_file_path( 'assets/css/core-button-dense-shadow.css' ),
			)
		);

		wp_enqueue_block_style(
			'core/image',
			array(
				'handle' => 'aegis-core-image-image-ease-out',
				'src'    => get_parent_theme_file_uri( 'assets/css/core-image-ease-out.css' ),
				'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
				'path'   => get_parent_theme_file_path( 'assets/css/core-image-ease-out.css' ),
			)
		);

		wp_enqueue_block_style(
			'core/image',
			array(
				'handle' => 'aegis-core-image-shine-hover',
				'src'    => get_parent_theme_file_uri( 'assets/css/core-image-shine-hover.css' ),
				'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
				'path'   => get_parent_theme_file_path( 'assets/css/core-image-shine-hover.css' ),
			)
		);

		wp_enqueue_block_style(
			'core/image',
			array(
				'handle' => 'aegis-core-image-zoom-hover',
				'src'    => get_parent_theme_file_uri( 'assets/css/core-image-zoom-hover.css' ),
				'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
				'path'   => get_parent_theme_file_path( 'assets/css/core-image-zoom-hover.css' ),
			)
		);

		wp_enqueue_block_style(
			'core/image',
			array(
				'handle' => 'aegis-core-image-grayscale-hover',
				'src'    => get_parent_theme_file_uri( 'assets/css/core-image-grayscale-hover.css' ),
				'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
				'path'   => get_parent_theme_file_path( 'assets/css/core-image-grayscale-hover.css' ),
			)
		);

		wp_enqueue_block_style(
			'core/image',
			array(
				'handle' => 'aegis-core-image-reveal-hover',
				'src'    => get_parent_theme_file_uri( 'assets/css/core-image-reveal-hover.css' ),
				'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
				'path'   => get_parent_theme_file_path( 'assets/css/core-image-reveal-hover.css' ),
			)
		);

		wp_enqueue_block_style(
			'core/image',
			array(
				'handle' => 'aegis-core-image-rotate-hover',
				'src'    => get_parent_theme_file_uri( 'assets/css/core-image-rotate-hover.css' ),
				'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
				'path'   => get_parent_theme_file_path( 'assets/css/core-image-rotate-hover.css' ),
			)
		);

		wp_enqueue_block_style(
			'core/image',
			array(
				'handle' => 'aegis-core-image-color-overlay',
				'src'    => get_parent_theme_file_uri( 'assets/css/core-image-color-overlay.css' ),
				'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
				'path'   => get_parent_theme_file_path( 'assets/css/core-image-color-overlay.css' ),
			)
		);

		wp_enqueue_block_style(
			'core/image',
			array(
				'handle' => 'aegis-core-image-split-reveal',
				'src'    => get_parent_theme_file_uri( 'assets/css/core-image-split-reveal.css' ),
				'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
				'path'   => get_parent_theme_file_path( 'assets/css/core-image-split-reveal.css' ),
			)
		);

		wp_enqueue_block_style(
			'core/image',
			array(
				'handle' => 'aegis-core-image-fade-scale',
				'src'    => get_parent_theme_file_uri( 'assets/css/core-image-fade-scale.css' ),
				'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
				'path'   => get_parent_theme_file_path( 'assets/css/core-image-fade-scale.css' ),
			)
		);

		wp_enqueue_block_style(
			'core/image',
			array(
				'handle' => 'aegis-core-image-flip-hover',
				'src'    => get_parent_theme_file_uri( 'assets/css/core-image-flip-hover.css' ),
				'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
				'path'   => get_parent_theme_file_path( 'assets/css/core-image-flip-hover.css' ),
			)
		);

	}
endif;

add_action( 'init', 'aegis_block_stylesheets' );


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
 * Include Woocommerce support.
 * 
 * @since 1.0.0
 * @return void
 */

if (class_exists('Woocommerce')) {
    require get_template_directory() . '/inc/woocommerce/functions.php';
}