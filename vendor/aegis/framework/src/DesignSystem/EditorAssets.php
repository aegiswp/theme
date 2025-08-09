<?php
/**
 * Editor Assets Component
 *
 * Provides support for registering and managing editor scripts and styles for the Aegis Framework block editor experience.
 *
 * Responsibilities:
 * - Registers and enqueues editor scripts and styles
 * - Integrates with the scripts and styles services for backend delivery
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

// Imports scripts and styles services, debug utilities, and WordPress helpers for asset management.
use Aegis\Framework\InlineAssets\Scripts;
use Aegis\Framework\InlineAssets\Styles;
use Aegis\Utilities\Debug;
use function apply_filters;
use function array_merge;
use function esc_url;
use function file_exists;
use function get_admin_url;
use function get_home_url;
use function is_admin;
use function time;
use function wp_dequeue_style;
use function wp_enqueue_style;
use function wp_get_global_settings;
use function wp_localize_script;
use function wp_register_script;
use function wp_register_style;

// Implements the EditorAssets class to support editor asset management for the design system.

class EditorAssets {

	/**
	 * Scripts instance.
	 *
	 * @var Scripts
	 */
	private Scripts $scripts;

	/**
	 * Styles instance.
	 *
	 * @var Styles
	 */
	private Styles $styles;

	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 *
	 * @param Styles  $styles  Inlinable service.
	 * @param Scripts $scripts Inlinable service.
	 *
	 * @return void
	 */
	public function __construct( Scripts $scripts, Styles $styles ) {
		$this->scripts = $scripts;
		$this->styles  = $styles;
	}

	/**
	 * Enqueue editor scripts.
	 *
	 * @hook enqueue_block_editor_assets 11
	 *
	 * @return void
	 */
	public function enqueue_scripts(): void {
		if ( ! is_admin() ) {
			return;
		}

		$asset_file = $this->scripts->dir . 'editor.asset.php';

		if ( ! file_exists( $asset_file ) ) {
			return;
		}

		$asset  = require $asset_file;
		$handle = $this->scripts->handle . '-editor';

		wp_register_script(
			$handle,
			$this->scripts->url . 'editor.js',
			$asset['dependencies'] ?? [],
			$asset['version'] ?? ( Debug::is_enabled() ? time() : '1.0.0' ),
			true
		);

		wp_enqueue_script( $handle );

		$global_settings = wp_get_global_settings();

		$default = [
			'siteUrl'          => esc_url( get_home_url() ),
			'adminUrl'         => esc_url( get_admin_url() ),
			'defaultGradients' => $global_settings['color']['gradients']['default'] ?? [],
		];

		$data = apply_filters(
			'aegis_editor_data',
			array_merge(
				$default,
				$this->scripts->get_data( '', true )
			)
		);

		wp_localize_script(
			$handle,
			'aegis',
			$data
		);
	}

	/**
	 * Enqueue editor styles.
	 *
	 * @hook enqueue_block_assets 11
	 *
	 * @return void
	 */
	public function enqueue_styles(): void {
		if ( ! is_admin() ) {
			return;
		}

		$handle = $this->styles->handle . '-editor';

		wp_dequeue_style( 'wp-block-library-theme' );

		wp_register_style(
			$handle,
			$this->styles->url . 'editor.css',
			[],
			Debug::is_enabled() ? time() : '1.0.0'
		);

		wp_enqueue_style( $handle );

		wp_enqueue_style(
			'wp-codemirror'
		);
	}
}
