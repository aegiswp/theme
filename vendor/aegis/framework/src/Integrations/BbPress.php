<?php
/**
 * BbPress Integration Component
 *
 * Provides support for integrating bbPress plugin compatibility in the Aegis Framework.
 *
 * Responsibilities:
 * - Checks for bbPress plugin presence and conditionally adds theme compatibility
 * - Integrates with the Aegis container and conditional system
 *
 * @package    Aegis\Framework\Integrations
 * @since      1.0.0
 * @author     @atmostfear-entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for integration components.
declare( strict_types=1 );

// Declares the namespace for integration components within the Aegis Framework.
namespace Aegis\Framework\Integrations;

// Imports interfaces and helpers for conditional logic, file system, and plugin detection.
use Aegis\Container\Interfaces\Conditional;
use function class_exists;
use function file_exists;
use function get_stylesheet_directory;
use function get_template_directory;
use function is_bbpress;
use function locate_block_template;

// Implements the BbPress integration class for the design system.

class BbPress implements Conditional {

	/**
	 * Condition.
	 *
	 * @since 1.0.0
	 *
	 * @return bool
	 */
	public static function condition(): bool {
		return class_exists( 'bbPress' );
	}

	/**
	 * Adds bbPress theme compatibility.
	 *
	 * @since 1.0.0
	 *
	 * @param string $template Template file.
	 *
	 * @hook  bbp_template_include_theme_compat
	 *
	 * @return string
	 */
	public function bbpress_template( string $template ): string {
		if ( ! is_bbpress() ) {
			return $template;
		}

		$child  = get_stylesheet_directory() . '/templates/page.html';
		$parent = get_template_directory() . '/templates/page.html';
		$file   = file_exists( $child ) ? $child : $parent;

		if ( file_exists( $file ) ) {
			$template = locate_block_template( $file, 'page', [] );
		}

		return $template;
	}
}
