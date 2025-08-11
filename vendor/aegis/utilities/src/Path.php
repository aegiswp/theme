<?php
/**
 * Aegis Path Utilities
 *
 * Provides utility functions for working with file and directory paths in the Aegis Framework.
 *
 * Responsibilities:
 * - Offers helper methods for resolving, normalizing, and checking paths
 * - Ensures consistency and reusability of path logic across the framework
 *
 * @package    Aegis\Utilities
 * @since      1.0.0
 * @author     @atmostfear-entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for utility functions.
declare( strict_types=1 );

// Declares the namespace for utility classes within the Aegis Framework.
namespace Aegis\Utilities;

// Imports PHP helper functions for path operations.
use function array_slice;
use function content_url;
use function dirname;
use function explode;
use function implode;
use function trailingslashit;
use function trim;
use function untrailingslashit;
use const DIRECTORY_SEPARATOR;

/**
 * Aegis Path class.
 *
 * Provides utility methods for working with file and directory paths in the Aegis Framework.
 * Package class.
 *
 * @since 1.0.0
 */
class Path {

	/**
	 * Returns the package directory path.
	 *
	 * @param string $project_dir Main plugin or theme file.
	 * @param string $package_dir Package src directory.
	 *
	 * @return string
	 */
	public static function get_package_dir( string $project_dir, string $package_dir ): string {
		return trailingslashit(
			implode(
				'/', // DIRECTORY_SEPARATOR breaks in Windows.
				[
					untrailingslashit( $project_dir ),
					static::get_segment( $package_dir, -3 ),
				]
			)
		);
	}

	/**
	 * Returns the package URI.
	 *
	 * @param string $project_dir Package directory.
	 * @param string $package_dir Package src directory.
	 *
	 * @return string
	 */
	public static function get_package_url( string $project_dir, string $package_dir ): string {
		$package_path = static::get_segment( $package_dir, -3, true );

		return static::get_project_url( $project_dir ) . Str::unleadingslashit( $package_path );
	}

	/**
	 * Returns the project directory path.
	 *
	 * @param string $package_dir Package dir.
	 *
	 * @return string
	 */
	public static function get_project_dir( string $package_dir ): string {
		return trailingslashit( dirname( $package_dir, 3 ) );
	}

	/**
	 * Returns the project URI.
	 *
	 * @param string $project_dir Project dir.
	 *
	 * @return string
	 */
	public static function get_project_url( string $project_dir ): string {
		return content_url( static::get_segment( $project_dir, -2, true ) );
	}

	/**
	 * Extracts specific number of segments from a path as string.
	 *
	 * @param string $path   The input path.
	 * @param int    $number Positive for first segments, negative for last segments.
	 * @param bool   $wrap   Whether to wrap in leading and trailing slashes.
	 *
	 * @return string
	 */
	public static function get_segment( string $path, int $number, bool $wrap = false ): string {
		$segments  = explode( DIRECTORY_SEPARATOR, trim( $path, DIRECTORY_SEPARATOR ) );
		$extracted = $number > 0 ? array_slice( $segments, 0, $number ) : array_slice( $segments, $number );
		$slash     = $wrap ? '/' : ''; // DIRECTORY_SEPARATOR breaks in Windows.

		return $slash . implode( '/', $extracted ) . $slash;
	}
}
