<?php
/**
 * ChildTheme.php
 *
 * Handles the child theme design system logic for the Aegis WordPress theme.
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
use Aegis\Utilities\Str;
use function file_exists;
use function file_get_contents;
use function get_stylesheet_directory;
use function str_replace;
use function trim;

/**
 * Child theme.
 *
 * @since 1.0.0
 */
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
