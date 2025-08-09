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

// Imports scripts service, debugging utilities, and WordPress integration helpers.
use Aegis\Framework\InlineAssets\Scripts;
use Aegis\Utilities\Debug;
use function str_contains;
use function wp_register_script;

// Implements the BlockScripts class to support block-level script registration and management.

/**
 * Handles the conditional loading of standalone JavaScript libraries.
 *
 * This class is responsible for enqueuing third-party JavaScript libraries like
 * Packery and Splide only on pages where they are actually needed. It determines
 * this by scanning the page's HTML for specific trigger classes or attributes.
 *
 * @package Aegis\Framework\DesignSystem
 * @since   1.0.0
 */
class BlockScripts {

	/**
	 * The Scripts service instance.
	 *
	 * @var Scripts
	 */
	private Scripts $scripts;

	/**
	 * BlockScripts constructor.
	 *
	 * Injects the Scripts service to get access to asset paths.
	 *
	 * @since 1.0.0
	 *
	 * @param Scripts $scripts The Scripts service instance.
	 */
	public function __construct( Scripts $scripts ) {
		$this->scripts = $scripts;
	}

	/**
	 * Conditionally registers and enqueues block-related scripts.
	 *
	 * This method checks the page's HTML content for trigger strings associated
	 * with specific JavaScript libraries. If a trigger is found, it uses the
	 * corresponding `.asset.php` file to register the script with its
	 * dependencies and version, and then enqueues it.
	 *
	 * @since 1.0.0
	 *
	 * @hook   wp_enqueue_scripts
	 */
	public function register(): void {
		global $template_html;

		// A map of script handles to the string that triggers their enqueue.
		$scripts = [
			'packery'           => 'packery',           // For the Packery masonry layout library.
			'splide'            => 'splide',            // For the Splide slider/carousel library.
			'splide-autoscroll' => 'data-type="marquee"', // For the Splide autoscroll extension.
		];

		foreach ( $scripts as $handle => $trigger ) {
			// If the trigger string is not found in the page's HTML, skip this script.
			if ( ! str_contains( $template_html ?? '', $trigger ) ) {
				continue;
			}

			// Use the .asset.php file to get dependencies and version for cache-busting.
			$asset_file = $this->scripts->dir . $handle . '.asset.php';
			if ( ! file_exists( $asset_file ) ) {
				continue;
			}
			$asset = require $asset_file;

			// Register and enqueue the script.
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
