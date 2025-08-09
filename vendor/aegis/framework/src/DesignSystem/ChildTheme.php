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

/**
 * Handles the loading of a child theme's `style.css` file.
 *
 * In a departure from the standard WordPress approach of enqueuing the child
 * theme's stylesheet as a separate file, this class reads the content of the
 * `style.css`, strips the header comment, and adds the raw CSS to the theme's
 * inline style manager. This is done for performance to reduce HTTP requests.
 *
 * @package Aegis\Framework\DesignSystem
 * @since   1.0.0
 */
class ChildTheme implements Styleable {

	/**
	 * Reads the child theme's `style.css` and adds it to the inline style queue.
	 *
	 * This method checks for the existence of a `style.css` in the active
	 * theme's directory. If found, it reads the file, removes the WordPress
	 * stylesheet header, and passes the remaining CSS to the Styles service.
	 *
	 * @since 1.0.0
	 *
	 * @param Styles $styles The Styles service instance.
	 */
	public function styles( Styles $styles ): void {
		$child_stylesheet = get_stylesheet_directory() . '/style.css';

		// Only proceed if a child theme's style.css exists.
		if ( ! file_exists( $child_stylesheet ) ) {
			return;
		}

		$content = trim( file_get_contents( $child_stylesheet ) );

		// Find and remove the WordPress stylesheet header comment block (/** ... */).
		$header  = Str::between( '/**', '*/', $content );
		$css     = str_replace( $header, '', $content );

		// Add the cleaned CSS to the inline style manager.
		$styles->add_string( $css );
	}
}
