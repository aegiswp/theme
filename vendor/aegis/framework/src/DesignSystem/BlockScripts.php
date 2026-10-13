<?php
/**
 * Block Scripts Component
 *
 * Provides support for registering and managing block-specific JavaScript files within the Aegis Framework.
 *
 * Responsibilities:
 * - Registers and loads JavaScript files for individual blocks
 * - Integrates with the scripts service and WordPress script APIs
 *
 * @package    Aegis\Framework\DesignSystem
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for block scripts component.
declare( strict_types=1 );

// Declares the namespace for the block scripts component.
namespace Aegis\Framework\DesignSystem;

// Imports classes, interfaces, and functions used by the block scripts component.
use Aegis\Framework\InlineAssets\Scripts;
use Aegis\Utilities\Debug;
use function str_contains;
use function wp_register_script;

class BlockScripts {

	/**
	 * The scripts instance
	 *
	 * @var Scripts
	 */
	private Scripts $scripts;

	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 *
	 * @param Scripts $scripts
	 *
	 * @return void
	 */
	public function __construct( Scripts $scripts ) {
		$this->scripts = $scripts;
	}

	/**
	 * Register the block scripts
	 *
	 * @since 1.0.0
	 *
	 * @hook  wp_enqueue_scripts
	 *
	 * @return void
	 */
	public function register(): void {
		global $template_html;

		// Map script handles to template HTML markers.
		$scripts = [
			'packery'           => 'packery',
			'splide'            => [ 'splide', 'wp-block-aegis-slider', 'wp:aegis/slider' ],
			'splide-autoscroll' => 'data-type="marquee"',
		];

		foreach ( $scripts as $handle => $strings ) {
			$needles = is_array( $strings ) ? $strings : [ $strings ];
			$found   = false;

			foreach ( $needles as $needle ) {
				if ( str_contains( $template_html ?? '', $needle ) ) {
					$found = true;
					break;
				}
			}

			if ( ! $found ) {
				continue;
			}

			$asset_file = $this->scripts->dir . $handle . '.asset.php';

			if ( ! file_exists( $asset_file ) ) {
				continue;
			}

			$asset = require $asset_file;

			wp_register_script(
				$handle,
				$this->scripts->url . $handle . '.js',
				$asset['dependencies'] ?? [],
				$asset['version'] ?? ( Debug::is_enabled() ? time() : '1.0.0' ),
				true
			);

			wp_enqueue_script( $handle );
		}
	}
}
