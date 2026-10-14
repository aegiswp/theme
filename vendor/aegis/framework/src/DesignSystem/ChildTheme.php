<?php
/**
 * Child Theme Component
 *
 * Provides support for loading and managing the child theme's style.css file within the Aegis Framework.
 *
 * Responsibilities:
 * - Loads the child theme's style.css and adds it to the inline styles
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

// Enforces strict type checking for all code in this file, ensuring type safety for child theme component.
declare( strict_types=1 );

// Declares the namespace for the child theme component.
namespace Aegis\Framework\DesignSystem;

// Imports classes, interfaces, and functions used by the child theme component.
use Aegis\Framework\InlineAssets\Styleable;
use Aegis\Framework\InlineAssets\Styles;
use Aegis\Utilities\Str;
use function file_exists;
use function file_get_contents;
use function get_stylesheet_directory;
use function str_replace;
use function trim;

class ChildTheme implements Styleable {

	/**
	 * Adds child theme style.css to inline styles.
	 *
	 * @since 1.0.0
	 *
	 * @param Styles $styles Styles service.
	 *
	 * @return void
	 */
	public function styles( Styles $styles ): void {
		$child       = get_stylesheet_directory() . '/style.css';
		$file_exists = file_exists( $child );

		if ( ! $file_exists ) {
			return;
		}

		// Strip the theme header comment from style.css content.
		$content = trim( file_get_contents( $child ) );
		$css     = str_replace(
			Str::between( '/**', '*/', $content ),
			'',
			$content
		);

		$styles->add_string( $css );
	}
}
