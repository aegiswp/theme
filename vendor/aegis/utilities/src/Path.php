<?php

// Enforces strict type checking for all code in this file, ensuring type safety for path utility helpers.
declare( strict_types=1 );

// Declares the namespace for the path utility helpers.
namespace Aegis\Utilities;

// Imports classes, interfaces, and functions used by the path utility helpers.
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
 * Path utility class for handling file and URL paths within a WordPress context.
 *
 * This class provides methods for resolving package and project directories and URLs,
 * assuming a specific project structure.
 *
 * @since 1.0.0
 */
class Path {

	/**
	 * Constructs a package's directory path from the project and package directories.
	 *
	 * @since 1.0.0
	 *
	 * @param string $project_dir The root directory of the project.
	 * @param string $package_dir A directory within the package (e.g., `__DIR__`).
	 *
	 * @return string The full, correctly-slashed path to the package directory.
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
	 * Constructs a package's URL from the project and package directories.
	 *
	 * @since 1.0.0
	 *
	 * @param string $project_dir The root directory of the project.
	 * @param string $package_dir A directory within the package (e.g., `__DIR__`).
	 *
	 * @return string The full URL to the package directory.
	 */
	public static function get_package_url( string $project_dir, string $package_dir ): string {
		// Extract the package path segment from the directory.
		$package_path = static::get_segment( $package_dir, -3, true );

		// Build the full package URL from the project URL and path.
		return static::get_project_url( $project_dir ) . Str::unleadingslashit( $package_path );
	}

	/**
	 * Determines the project's root directory from a package directory inside it.
	 *
	 * Assumes the project root is 3 levels above the given package directory.
	 *
	 * @since 1.0.0
	 *
	 * @param string $package_dir A directory within the package (e.g., `__DIR__`).
	 *
	 * @return string The project's root directory path.
	 */
	public static function get_project_dir( string $package_dir ): string {
		return trailingslashit( dirname( $package_dir, 3 ) );
	}

	/**
	 * Determines the project's root URL from its directory path.
	 *
	 * @since 1.0.0
	 *
	 * @param string $project_dir The project's root directory path.
	 *
	 * @return string The project's root URL.
	 */
	public static function get_project_url( string $project_dir ): string {
		return content_url( static::get_segment( $project_dir, -2, true ) );
	}

	/**
	 * Extracts a specific number of segments from a path string.
	 *
	 * @since 1.0.0
	 *
	 * @param string $path   The input path.
	 * @param int    $number Positive for first segments, negative for last segments.
	 * @param bool   $wrap   Whether to wrap the result in leading and trailing slashes.
	 *
	 * @return string The extracted path segment.
	 */
	public static function get_segment( string $path, int $number, bool $wrap = false ): string {
		// Split the path into segments.
		$segments  = explode( DIRECTORY_SEPARATOR, trim( $path, DIRECTORY_SEPARATOR ) );
		// Extract the requested number of segments from the start or end.
		$extracted = $number > 0 ? array_slice( $segments, 0, $number ) : array_slice( $segments, $number );
		$slash     = $wrap ? '/' : ''; // DIRECTORY_SEPARATOR breaks in Windows.

		// Rejoin segments with optional leading and trailing slashes.
		return $slash . implode( '/', $extracted ) . $slash;
	}
}
