<?php
/**
 * Conic Gradient Component
 *
 * Provides support for converting custom linear or radial gradients into conic gradients for the Aegis Framework.
 *
 * Responsibilities:
 * - Converts custom gradients to conic gradients
 * - Integrates with the styles service for frontend delivery
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

// Imports styleable interface, styles service, CSS utilities, and WordPress helpers.
use Aegis\Framework\InlineAssets\Styleable;
use Aegis\Framework\InlineAssets\Styles;
use Aegis\Dom\CSS;
use function str_contains;
use function str_replace;
use function wp_get_global_settings;

// Implements the ConicGradient class to support conversion of gradients for the design system.

/**
 * Provides a workaround to enable `conic-gradient` backgrounds.
 *
 * The WordPress editor does not have a native UI control for creating conic
 * gradients. This class allows them to be created as `linear-gradient` presets
 * in `theme.json` and then converts them to `conic-gradient` on the front-end,
 * provided they follow a specific naming convention.
 *
 * @package Aegis\Framework\DesignSystem
 * @since   1.0.0
 */
class ConicGradient implements Styleable {

	/**
	 * Converts custom gradients with a specific slug to conic-gradients.
	 *
	 * This method gets all custom gradients defined in `theme.json`. If a
	 * gradient's slug contains the string `custom-conic-`, it replaces the
	 * `linear-gradient(` CSS function with `conic-gradient(from `, effectively
	 * converting it. The resulting CSS variable is then conditionally enqueued.
	 *
	 * @since 1.0.0
	 *
	 * @param Styles $styles The Styles service instance.
	 */
	public function styles( Styles $styles ): void {
		$settings  = wp_get_global_settings();
		$gradients = $settings['color']['gradients']['custom'] ?? [];
		$style     = [];

		// Find any custom gradients that are meant to be conic.
		foreach ( $gradients as $gradient ) {
			$slug = $gradient['slug'] ?? '';

			// The naming convention is the key: the slug must contain 'custom-conic-'.
			if ( ! str_contains( $slug, 'custom-conic-' ) ) {
				continue;
			}

			// Convert the CSS from linear-gradient to conic-gradient.
			$value = str_replace(
				'linear-gradient(',
				'conic-gradient(from ',
				$gradient['gradient']
			);

			// Create the CSS custom property for the new conic gradient.
			$style[ '--wp--preset--gradient--' . $slug ] = $value;
		}

		// If any conic gradients were found, add them to the inline style queue.
		if ( $style ) {
			$css = 'body{' . CSS::array_to_string( $style ) . '}';
			$styles->add_string( $css, [ 'custom-conic-' ] );
		}
	}
}
