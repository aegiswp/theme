<?php
/**
 * Video Block
 *
 * Provides support for rendering video blocks within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the logic for displaying and managing video block content
 * - Integrates with utility classes for DOM, CSS, and WordPress helpers
 *
 * @package    Aegis\Framework\CoreBlocks
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for video block.
declare( strict_types=1 );

// Declares the namespace for the video block.
namespace Aegis\Framework\CoreBlocks;

// Imports classes, interfaces, and functions used by the video block.
use Aegis\Framework\ServiceProvider;
use Aegis\Dom\CSS;
use Aegis\Dom\DOM;
use Aegis\Framework\Interfaces\Renderable;
use WP_Block;
use function add_action;
use function add_theme_support;
use function esc_attr;
use function file_exists;
use function get_template_directory;
use function get_template_directory_uri;
use function wp_enqueue_script;
use function wp_enqueue_style;

class Video implements Renderable {

	/**
	 * Modifies front end HTML output of block.
	 *
	 * @since 1.0.0
	 *
	 * @param string   $block_content Block HTML.
	 * @param array    $block         Block data.
	 * @param WP_Block $instance      Block instance.
	 *
	 * @hook  render_block_core/video 11
	 *
	 * @return string
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		if ( ! ServiceProvider::is_block_enabled( 'video_custom_player' ) ) {
			return $block_content;
		}

		// Parse block HTML and locate the figure element.
		$dom    = DOM::create( $block_content );
		$figure = DOM::get_element( 'figure', $dom );

		// Bail out if the expected figure wrapper is missing.
		if ( ! $figure ) {
			return $block_content;
		}

		// Extract inline styles and capture any background color value.
		$styles     = CSS::string_to_array( $figure->getAttribute( 'style' ) );
		$background = $styles['background'] ?? $styles['background-color'] ?? '';

		// Move background into a custom property and remove direct background styles.
		if ( $background ) {
			$styles['--wp--custom--video--background'] = esc_attr( $background );

			unset( $styles['background'], $styles['background-color'] );
		}

		// Apply the updated inline styles to the figure.
		$figure->setAttribute( 'style', CSS::array_to_string( $styles ) );

		// Serialize the modified markup.
		$block_content = $dom->saveHTML();

		// Enqueue custom video player assets once per request.
		static $is_enqueued = false;

		if ( ! $is_enqueued ) {
			add_action( 'wp_enqueue_scripts', [ $this, 'video_scripts_styles' ] );
		}

		$is_enqueued = true;

		return $block_content;
	}

	/**
	 * Enqueue custom video player scripts and styles.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function video_scripts_styles(): void {
		$framework_dir = get_template_directory() . '/vendor/aegis/framework/public';
		$framework_url = get_template_directory_uri() . '/vendor/aegis/framework/public';
		$asset_file    = $framework_dir . '/js/video-player.asset.php';

		if ( ! file_exists( $asset_file ) ) {
			return;
		}

		$asset = require $asset_file;

		wp_enqueue_style(
			'aegis-video-player',
			$framework_url . '/css/core-blocks/video-player.css',
			[],
			$asset['version'] ?? '1.0.0'
		);

		wp_enqueue_script(
			'aegis-video-player',
			$framework_url . '/js/video-player.js',
			$asset['dependencies'] ?? [],
			$asset['version'] ?? '1.0.0',
			true
		);
	}

	/**
	 * Handles theme supports.
	 *
	 * @since 1.0.0
	 *
	 * @hook  after_setup_theme
	 *
	 * @return void
	 */
	public function theme_supports(): void {
		add_theme_support( 'responsive-embeds' );
	}
}
