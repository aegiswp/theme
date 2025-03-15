<?php
/**
 * Gradient Extension for Aegis Theme
 *
 * This file handles the gradient functionality for the Aegis theme.
 * It provides the ability to convert linear or radial gradients into conic gradients,
 * enhancing the visual design options available in the theme.
 *
 * The file includes functions to:
 * - Convert custom gradients to conic gradients
 * - Add custom gradient styles to the page
 *
 * @package aegis
 * @subpackage theme
 * @since 1.0.0
 */

declare( strict_types=1 );

namespace aegis\theme;

use function add_action;
use function str_contains;
use function str_replace;
use function wp_add_inline_style;
use function wp_get_global_settings;
use function wp_strip_all_tags;

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\add_conic_gradient' );
/**
 * Converts custom linear or radial gradient into conic gradient.
 *
 * Processes custom gradients defined in theme.json and converts those
 * with the 'custom-conic-' prefix into conic gradients. Adds the resulting
 * CSS custom properties to the page inline styles.
 *
 * @since 1.0.0
 *
 * @return void
 */
function add_conic_gradient(): void {
	$settings  = wp_get_global_settings();
	$gradients = $settings['color']['gradients']['custom'] ?? [];
	$css       = [];

	foreach ( $gradients as $gradient ) {
		$slug = $gradient['slug'] ?? '';

		if ( ! str_contains( $slug, 'custom-conic-' ) ) {
			continue;
		}

		$value = str_replace(
			'linear-gradient(',
			'conic-gradient(from ',
			$gradient['gradient']
		);

		$css[ '--wp--preset--gradient--' . $slug ] = $value;
	}

	$css = 'body{' . css_array_to_string( $css ) . '}';

	wp_add_inline_style( 'global-styles', wp_strip_all_tags( $css ) );
}
