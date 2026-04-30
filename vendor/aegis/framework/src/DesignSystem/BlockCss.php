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
 * @author     Atmostfear Entertainment
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
use Aegis\Utilities\Debug;
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

class BlockCss {

	/**
	 * CSS dir.
	 *
	 * @var string
	 */
	private string $css_dir;

	/**
	 * CSS URL.
	 *
	 * @var string
	 */
	private string $css_url;

	/**
	 * BlockCss constructor.
	 *
	 * @since 1.0.0
	 *
	 * @param Styles $styles Package config.
	 *
	 * @return void
	 */
	public function __construct( Styles $styles ) {
		$this->css_dir = $styles->dir;
		$this->css_url = $styles->url;
	}

	/**
	 * Adds conditional block styles on front end.
	 *
	 * Uses wp_add_inline_style instead of wp_enqueue_block_style for less output.
	 *
	 * @since 1.0.0
	 *
	 * @hook  enqueue_block_assets 11
	 *
	 * @return void
	 */
	public function add_block_styles(): void {
		if ( is_admin() ) {
			return;
		}

		global $wp_styles;

		if ( ! is_a( $wp_styles, 'WP_Styles' ) ) {
			return;
		}

		static $file_cache = [];

		$dir     = $this->css_dir . 'core-blocks/';
		$handles = array_flip( $wp_styles->queue );

		foreach ( $wp_styles->registered as $handle => $style ) {
			if ( ! isset( $handles[ $handle ] ) ) {
				continue;
			}

			if ( ! str_starts_with( $handle, 'wp-block-' ) ) {
				continue;
			}

			$slug = str_replace( 'wp-block-', '', $handle );
			$file = $dir . $slug . '.css';

			if ( ! isset( $file_cache[ $file ] ) ) {
				if ( ! file_exists( $file ) ) {
					$file_cache[ $file ] = false;
					continue;
				}

				$file_cache[ $file ] = trim( file_get_contents( $file ) );
			}

			$css = $file_cache[ $file ];

			if ( $css === false ) {
				continue;
			}

			wp_add_inline_style( $handle, $css );
		}
	}

	/**
	 * Adds conditional block styles in editor.
	 *
	 * This is required for block styles to work on Windows.
	 *
	 * @hook after_setup_theme
	 *
	 * @return void
	 */
	public function add_editor_block_styles(): void {
		if ( ! is_admin() ) {
			return;
		}

		$files = glob( $this->css_dir . 'core-blocks/*.css' );

		foreach ( $files as $file ) {
			$basename = basename( $file );
			$slug     = basename( $file, '.css' );

			wp_enqueue_block_style(
				"core/$slug",
				[
					'handle'  => 'aegis-core-' . $slug,
					'src'     => $this->css_url . 'core-blocks/' . $basename,
					'deps'    => [],
					'version' => Debug::is_enabled() ? filemtime( $file ) : '1.0.0',
					'media'   => 'all',
					'path'    => $file,
				]
			);
		}
	}
}
