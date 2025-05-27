<?php
/**
 * BlockCss.php
 *
 * Handles the block CSS design system logic for the Aegis WordPress theme.
 *
 * @package   Aegis\Framework\DesignSystem
 * @author    Atmostfear Entertainment
 * @copyright Copyright (c) 2025
 * @license   GPL-2.0-or-later
 * @link      https://github.com/aegiswp/theme
 * @since     1.0.0
 */

declare( strict_types=1 );

namespace Aegis\Framework\DesignSystem;

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

/**
 * Block CSS.
 *
 * @since 1.0.0
 */
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
	 * @hook  enqueue_block_assets
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

			if ( ! file_exists( $file ) ) {
				continue;
			}

			$css = trim( file_get_contents( $file ) );

			// Remove zero width spaces and other invisible characters.
			$css = preg_replace( '/^[\pZ\pC]+|[\pZ\pC]+$/u', '', $css );

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
					'version' => '1.0.0',
					'media'   => 'all',
					'path'    => $file,
				]
			);
		}
	}
}
