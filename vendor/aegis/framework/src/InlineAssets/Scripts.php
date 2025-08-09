<?php
/**
 * Scripts Component
 *
 * Provides support for registering, enqueuing, and managing inline scripts in the Aegis Framework.
 *
 * Responsibilities:
 * - Registers and enqueues inline scripts for the theme and block editor
 * - Integrates with the Aegis inline assets system and WordPress script API
 *
 * @package    Aegis\Framework\InlineAssets
 * @since      1.0.0
 * @author     @atmostfear-entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for inline asset management.
declare( strict_types=1 );

// Declares the namespace for inline assets components within the Aegis Framework.
namespace Aegis\Framework\InlineAssets;

// Imports utility classes and WordPress functions for script management.
use Aegis\Utilities\Str;
use function apply_filters;
use function is_admin;
use function wp_add_inline_script;
use function wp_enqueue_script;
use function wp_localize_script;
use function wp_register_script;

/**
 * The central service for managing and enqueueing all JavaScript assets.
 *
 * This class implements the `Inlinable` interface and uses the `AssetsTrait`
 * to provide a concrete service for handling JavaScript. It is responsible for
 * gathering all registered scripts, conditionally loading them based on page
 * content, and using WordPress functions (`wp_add_inline_script`, `wp_localize_script`)
 * to add them to the page.
 *
 * It is instantiated once and passed to any class that implements `Scriptable`.
 *
 * @package Aegis\Framework\InlineAssets
 * @since   1.0.0
 */
class Scripts implements Inlinable {

	use AssetsTrait;

	/**
	 * Hooks into WordPress to enqueue all registered scripts and data.
	 *
	 * This method is the primary entry point for the script loading process.
	 * It retrieves the page's buffered HTML content, determines which scripts
	 * and localized data need to be loaded based on their conditions, and then
	 * enqueues them using a single, empty, registered script handle.
	 *
	 * This process is designed to run only on the front-end.
	 *
	 * @hook enqueue_block_assets
	 *
	 * @return void
	 */
	public function enqueue(): void {
		if ( is_admin() ) {
			return;
		}

		// Get the buffered page HTML from the global scope.
		$template_html = $GLOBALS['template_html'] ?? '';
		// Determine if we should bypass conditional loading.
		$load_all = apply_filters( 'aegis_load_all_scripts', ! $template_html );

		// Gather all script and data assets that meet their conditions.
		$js   = $this->get_inline_assets( $template_html, $load_all );
		$data = $this->get_data( $template_html, $load_all );

		// Register a dummy script handle to attach our inline scripts and data to.
		wp_register_script( $this->handle, '', [], '', true );
		wp_enqueue_script( $this->handle );

		// Add the combined inline JavaScript.
		if ( ! empty( $js ) ) {
			wp_add_inline_script( $this->handle, $js );
		}

		// Add the combined localized data.
		if ( ! empty( $data ) ) {
			// All data is added under a single JavaScript object, `aegis`.
			wp_localize_script( $this->handle, 'aegis', $data );
		}
	}

	/**
	 * Gathers all registered data arrays that meet their loading conditions.
	 *
	 * This method iterates through all data registered via the `add_data` method,
	 * checks their conditions against the page's HTML content, and collects
	 * the data that passes into a single associative array.
	 *
	 * @param string $template_html The full HTML content of the current page.
	 * @param bool   $load_all      If true, bypass all conditional checks.
	 *
	 * @return array An associative array of all data to be localized.
	 */
	public function get_data( string $template_html, bool $load_all ): array {
		$data = [];

		foreach ( $this->data as $key => $args ) {
			$value     = $args[0] ?? [];
			$strings   = $args[1] ?? [];
			$condition = $args[2] ?? true;

			// Skip if the boolean condition is not met.
			if ( ! $condition ) {
				continue;
			}

			// Load if forced or if a trigger string is found in the HTML.
			if ( $load_all || Str::contains_any( $template_html, ...$strings ) ) {
				$data[ $key ] = $value;
			}
		}

		return $data;
	}
}
