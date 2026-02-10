<?php
/**
 * Navigation Overlay Variants
 *
 * Conditionally loads navigation overlay CSS when a variant class
 * (is-style-slide-in or is-style-fullscreen) is detected in the
 * template HTML.
 *
 * @package Aegis
 * @since   1.0.0
 */

declare( strict_types=1 );

namespace Aegis\Navigation;

use function add_action;
use function file_exists;
use function file_get_contents;
use function get_template_directory;
use function is_admin;
use function str_contains;
use function trim;
use function wp_add_inline_style;

class Overlay {

	/**
	 * Initialize hooks.
	 *
	 * @return void
	 */
	public function init(): void {
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_styles' ], 11 );
	}

	/**
	 * Conditionally inject navigation overlay variant CSS via wp_add_inline_style.
	 *
	 * Checks $template_html for navigation overlay variant class strings and
	 * loads the CSS file when a variant is present on the page.
	 *
	 * @return void
	 */
	public function enqueue_styles(): void {
		if ( is_admin() ) {
			return;
		}

		global $template_html;

		if ( empty( $template_html ) ) {
			return;
		}

		$markers = [
			'is-style-slide-in',
			'is-style-slide-in-left',
			'is-style-fullscreen',
			'is-style-scroll',
		];

		$has_variant = false;

		foreach ( $markers as $marker ) {
			if ( str_contains( $template_html, $marker ) ) {
				$has_variant = true;
				break;
			}
		}

		if ( ! $has_variant ) {
			return;
		}

		$file = get_template_directory() . '/src/Navigation/css/overlay.css';

		if ( ! file_exists( $file ) ) {
			return;
		}

		$css = trim( file_get_contents( $file ) );

		if ( $css ) {
			wp_add_inline_style( 'global-styles', $css );
		}
	}
}
