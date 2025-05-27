<?php
/**
 * ConicGradient.php
 *
 * Handles the conic gradient design system logic for the Aegis WordPress theme.
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

use Aegis\Framework\InlineAssets\Styleable;
use Aegis\Framework\InlineAssets\Styles;
use Aegis\Dom\CSS;
use function str_contains;
use function str_replace;
use function wp_get_global_settings;

/**
 * Conic gradient.
 *
 * @since 1.0.0
 */
class ConicGradient implements Styleable {

	/**
	 * Converts custom linear or radial gradient into conic gradient.
	 *
	 * @since 1.0.0
	 *
	 * @param Styles $styles Styles.
	 *
	 * @return void
	 */
	public function styles( Styles $styles ): void {
		$settings  = wp_get_global_settings();
		$gradients = $settings['color']['gradients']['custom'] ?? [];
		$style     = [];

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

			$style[ '--wp--preset--gradient--' . $slug ] = $value;
		}

		if ( $style ) {
			$css = 'body{' . CSS::array_to_string( $style ) . '}';

			$styles->add_string( $css, [ 'custom-conic-' ] );
		}
	}
}
