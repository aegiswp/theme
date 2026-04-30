<?php
/**
 * Aegis User Agent Utilities
 *
 * Provides a shared device/browser detection method for use across
 * the Aegis Framework (Responsive block settings, Hook Patterns, etc.).
 *
 * Responsibilities:
 * - Centralizes user-agent string matching logic
 * - Supports device (iOS, Android, Windows, macOS, Linux) and browser
 *   (Chrome, Firefox, Safari, Edge) detection
 *
 * @package    Aegis\Utilities
 * @since      1.1.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 */

// Enable strict type checking for all function arguments and return values.
declare( strict_types=1 );

// Shared utility classes for the Aegis ecosystem.
namespace Aegis\Utilities;

// WordPress/PHP functions — explicitly imported for static analysis in strict namespaced PHP.
use function str_contains;
use function strtolower;

class UserAgent {

	/**
	 * Check if a user-agent string matches a device/browser identifier.
	 *
	 * Accepts the raw (or pre-lowercased) user-agent and a device key.
	 * The user-agent is lowercased internally for case-insensitive matching.
	 *
	 * @since 1.1.0
	 *
	 * @param string $user_agent Raw or lowercased user-agent string.
	 * @param string $device     Device/browser identifier (ios, android, windows,
	 *                           macos, linux, chrome, firefox, safari, edge).
	 *
	 * @return bool True if the user-agent matches the device/browser.
	 */
	public static function matches_device( string $user_agent, string $device ): bool {
		$ua = strtolower( $user_agent );

		switch ( $device ) {
			case 'ios':
				return str_contains( $ua, 'iphone' ) ||
					   str_contains( $ua, 'ipad' ) ||
					   str_contains( $ua, 'ipod' );

			case 'android':
				return str_contains( $ua, 'android' );

			case 'windows':
				return str_contains( $ua, 'windows' );

			case 'macos':
				return str_contains( $ua, 'macintosh' );

			case 'linux':
				return str_contains( $ua, 'linux' ) &&
					   ! str_contains( $ua, 'android' );

			case 'chrome':
				return str_contains( $ua, 'chrome' ) &&
					   ! str_contains( $ua, 'edg' );

			case 'safari':
				return str_contains( $ua, 'safari' ) &&
					   ! str_contains( $ua, 'chrome' ) &&
					   ! str_contains( $ua, 'chromium' );

			case 'firefox':
				return str_contains( $ua, 'firefox' );

			case 'edge':
				return str_contains( $ua, 'edg' );

			default:
				return false;
		}
	}
}
