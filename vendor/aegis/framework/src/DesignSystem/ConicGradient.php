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
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for design system components.
declare(strict_types=1);

// Declares the namespace for design system components within the Aegis Framework.
namespace Aegis\Framework\DesignSystem;

// Imports styleable interface, styles service, CSS utilities, and WordPress helpers.
use Aegis\Framework\InlineAssets\Styleable;
use Aegis\Framework\InlineAssets\Styles;
use Aegis\Dom\CSS;
use function str_contains;
use function str_replace;
use Aegis\Framework\ServiceProvider;

// Implements the ConicGradient class to support conversion of gradients for the design system.

class ConicGradient implements Styleable
{

	/**
	 * Converts custom linear or radial gradient into conic gradient.
	 *
	 * @since 1.0.0
	 *
	 * @param Styles $styles Styles.
	 *
	 * @return void
	 */
	public function styles(Styles $styles): void
	{
		$settings = ServiceProvider::get_global_settings();
		$gradients = $settings['color']['gradients']['custom'] ?? [];
		$style = [];

		foreach ($gradients as $gradient) {
			$slug = $gradient['slug'] ?? '';

			if (!str_contains($slug, 'custom-conic-')) {
				continue;
			}

			$value = str_replace(
				'linear-gradient(',
				'conic-gradient(from ',
				$gradient['gradient']
			);

			$style['--wp--preset--gradient--' . $slug] = $value;
		}

		if ($style) {
			$css = 'body{' . CSS::array_to_string($style) . '}';

			$styles->add_string($css, ['custom-conic-']);
		}
	}
}
