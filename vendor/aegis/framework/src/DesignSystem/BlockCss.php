<?php
/**
 * Block CSS Component
 *
 * Provides support for registering, loading, and managing block-specific CSS files within the Aegis Framework.
 *
 * Responsibilities:
 * - Registers and loads CSS files for individual blocks
 * - Integrates with the styles service and WordPress block APIs
 *
 * @package    Aegis\Framework\DesignSystem
 * @since      1.0.0
 * @author     @atmostfear-entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for design system components.
declare( strict_types=1 );

// Declares the namespace for design system components within the Aegis Framework.
namespace Aegis\Framework\DesignSystem;

// Imports styles service and utility functions for file handling, string manipulation, and WordPress integration.
use Aegis\Framework\InlineAssets\Styles;
use function array_flip;
use function file_get_contents;
use function glob;
use function is_a;
use function is_admin;
use function preg_replace;
use function str_replace;
use function str_starts_with;
use function trim;
use function wp_add_inline_style;
use function wp_enqueue_block_style;

// Implements the BlockCss class to support block-level CSS registration and management.

/**
 * Handles the loading of custom CSS for core WordPress blocks.
 *
 * This class uses two different strategies to load stylesheets that augment or
 * override the default styles for core blocks:
 * 1. For the front-end, it injects the CSS inline for performance.
 * 2. For the block editor, it properly enqueues the stylesheets for compatibility.
 *
 * @package Aegis\Framework\DesignSystem
 * @since   1.0.0
 */
class BlockCss {

	/**
	 * The filesystem path to the CSS directory.
	 *
	 * @var string
	 */
	private string $css_dir;

	/**
	 * The URL to the CSS directory.
	 *
	 * @var string
	 */
	private string $css_url;

	/**
	 * BlockCss constructor.
	 *
	 * Injects the Styles service to get the CSS directory path and URL.
	 *
	 * @since 1.0.0
	 *
	 * @param Styles $styles The Styles service instance.
	 */
	public function __construct( Styles $styles ) {
		$this->css_dir = $styles->dir;
		$this->css_url = $styles->url;
	}

	/**
	 * Injects custom block styles inline on the front-end.
	 *
	 * This method hooks into WordPress's style queue. For every core block
	 * stylesheet that WordPress is already loading on the page (e.g., `wp-block-paragraph`),
	 * it checks if a corresponding custom CSS file exists in the theme. If it does,
	 * it adds the custom CSS inline. This is more performant than enqueuing many
	 * small, separate CSS files.
	 *
	 * @since 1.0.0
	 *
	 * @hook  enqueue_block_assets 11
	 */
	public function add_block_styles(): void {
		if ( is_admin() ) {
			return;
		}

		global $wp_styles;
		if ( ! is_a( $wp_styles, 'WP_Styles' ) ) {
			return;
		}

		$dir     = $this->css_dir . 'core-blocks/';
		$handles = array_flip( $wp_styles->queue );

		// Go through all registered stylesheets.
		foreach ( $wp_styles->registered as $handle => $style ) {
			// Skip if the style is not in the current page's queue.
			if ( ! isset( $handles[ $handle ] ) ) {
				continue;
			}
			// Skip if it is not a core block stylesheet.
			if ( ! str_starts_with( $handle, 'wp-block-' ) ) {
				continue;
			}

			// Check if a corresponding custom stylesheet exists in the theme.
			$slug = str_replace( 'wp-block-', '', $handle );
			$file = $dir . $slug . '.css';
			if ( ! file_exists( $file ) ) {
				continue;
			}

			// If it exists, get its content and add it inline to the existing handle.
			$css = trim( file_get_contents( $file ) );
			$css = preg_replace( '/^[\pZ\pC]+|[\pZ\pC]+$/u', '', $css ); // Remove invisible characters.
			wp_add_inline_style( $handle, $css );
		}
	}

	/**
	 * Enqueues custom block styles in the block editor.
	 *
	 * This method scans the theme's `core-blocks` directory and registers each
	 * found stylesheet with its corresponding core block (e.g., `core/paragraph`).
	 * This ensures that the custom styles are correctly loaded and applied within
	 * the editor, providing an accurate preview.
	 *
	 * @since 1.0.0
	 *
	 * @hook after_setup_theme
	 */
	public function add_editor_block_styles(): void {
		if ( ! is_admin() ) {
			return;
		}

		// Get all CSS files in the core-blocks directory.
		$files = glob( $this->css_dir . 'core-blocks/*.css' );

		// For each file, register it with the corresponding core block.
		foreach ( $files as $file ) {
			$basename = basename( $file );
			$slug     = basename( $file, '.css' );

			wp_enqueue_block_style(
				"core/$slug",
				[
					'handle'  => 'aegis-core-' . $slug,
					'src'     => $this->css_url . 'core-blocks/' . $basename,
					'deps'    => [],
					'version' => '1.0.0',
					'media'   => 'all',
					'path'    => $file,
				]
			);
		}
	}
}
