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

// Enforces strict type checking for all code in this file, ensuring type safety for design system components.
declare( strict_types=1 );

// Declares the namespace for design system components within the Aegis Framework.
namespace Aegis\Framework\DesignSystem;

// Imports styleable interface, styles service, string utilities, and WordPress helpers.
use Aegis\Framework\InlineAssets\Styleable;
use Aegis\Framework\InlineAssets\Styles;
use Aegis\Utilities\Str;
use function file_exists;
use function file_get_contents;
use function get_stylesheet_directory;
use function str_replace;
use function trim;

// Implements the ChildTheme class to support loading and managing child theme styles.

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

		$content = trim( file_get_contents( $child ) );
		$css     = str_replace(
			Str::between( '/**', '*/', $content ),
			'',
			$content
		);

		$styles->add_string( $css );
	}

}
