<?php
/**
 * Styles Component
 *
 * Provides support for registering, enqueuing, and managing inline styles in the Aegis Framework.
 *
 * Responsibilities:
 * - Registers and enqueues inline styles for the theme and block editor
 * - Integrates with the Aegis inline assets system and WordPress style API
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

// Imports utility classes and WordPress functions for style management.
use Aegis\Utilities\Path;
use function apply_filters;
use function is_admin;
use function wp_add_inline_style;
use function wp_dequeue_style;
use function wp_enqueue_style;
use function wp_register_style;

/**
 * The central service for managing and enqueueing all CSS assets.
 *
 * This class implements the `Inlinable` interface and uses the `AssetsTrait`
 * to provide a concrete service for handling CSS. It is responsible for
 * gathering all registered styles, conditionally loading them based on page
 * content, and using `wp_add_inline_style` to add them to the page.
 *
 * It also includes a clever mechanism to inject all conditionally-loaded styles
 * into the block editor's iframe by intercepting an HTTP request to a fake URL.
 *
 * @package Aegis\Framework\InlineAssets
 * @since   1.0.0
 */
class Styles implements Inlinable {

	use AssetsTrait;

	/**
	 * A fake, placeholder URL used to trigger the dynamic generation of editor styles.
	 *
	 * When `add_editor_style()` is called with this URL, WordPress attempts to fetch it.
	 * We intercept this request using the `pre_http_request` filter and return our
	 * dynamically generated CSS instead.
	 *
	 * @var string
	 */
	public const DYNAMIC_URL = 'https://aegis-dynamic-styles';

	/**
	 * Hooks into WordPress to enqueue all registered styles.
	 *
	 * This method is the primary entry point for the front-end style loading process.
	 * It retrieves the page's buffered HTML content, determines which styles
	 * need to be loaded, and then enqueues them using a single, empty, registered
	 * style handle. It also dequeues the default WordPress block library theme
	 * styles to allow for complete theme control.
	 *
	 * @hook wp_enqueue_scripts 11
	 *
	 * @return void
	 */
	public function enqueue(): void {
		if ( is_admin() ) {
			return;
		}

		global $template_html;

		$load_all = apply_filters( 'aegis_load_all_styles', ! $template_html );
		$css      = $this->get_inline_assets( $template_html, $load_all );

		// Remove default block styles to replace them with our own.
		wp_dequeue_style( 'wp-block-library-theme' );

		// Register a dummy handle to attach our inline styles to.
		wp_register_style( $this->handle, '' );
		wp_enqueue_style( $this->handle );
		wp_add_inline_style( $this->handle, $css );
	}

	/**
	 * Registers all necessary styles with the block editor.
	 *
	 * This method adds two types of styles to the editor:
	 * 1. Static CSS files for individual core blocks.
	 * 2. A special dynamic "stylesheet" that contains all other conditionally-loaded
	 *    CSS from the theme, ensuring the editor preview matches the front end.
	 *
	 * @hook admin_init
	 *
	 * @return void
	 */
	public function add_editor_styles(): void {
		// Add individual stylesheets for core block overrides.
		$blocks      = glob( $this->dir . 'core-blocks/*.css' );
		$vendor_path = Path::get_segment( $this->dir, -5 );

		foreach ( $blocks as $block ) {
			add_editor_style( $vendor_path . '/core-blocks/' . basename( $block ) );
		}

		// Register the fake URL to trigger our dynamic style generation.
		add_editor_style( static::DYNAMIC_URL );
	}

	/**
	 * Intercepts the request for the dynamic editor stylesheet and returns all theme CSS.
	 *
	 * This is the magic that makes all the theme's inline and conditional styles
	 * appear in the block editor. When the editor tries to fetch the `DYNAMIC_URL`,
	 * this method catches the request, generates the complete CSS for the theme by
	 * calling `get_inline_assets` with `$load_all = true`, and returns it as a
	 * successful HTTP response.
	 *
	 * @since 1.0.0
	 *
	 * @param array|bool $response    The default HTTP response (usually `false`).
	 * @param array      $parsed_args The arguments for the HTTP request.
	 * @param string     $url         The URL being requested.
	 *
	 * @hook  pre_http_request
	 *
	 * @return array|bool The faked HTTP response if the URL matches, or the original
	 *                    `$response` otherwise.
	 */
	public function generate_dynamic_styles( $response, array $parsed_args, string $url ) {
		if ( $url === static::DYNAMIC_URL ) {
			// Get all registered styles, ignoring conditions.
			$css = $this->get_inline_assets( '', true );

			// Construct a fake HTTP response containing our CSS.
			$response = [
				'body'     => $css,
				'headers'  => [],
				'response' => [
					'code'    => 200,
					'message' => 'OK',
				],
				'cookies'  => [],
				'filename' => null,
			];
		}

		return $response;
	}
}
