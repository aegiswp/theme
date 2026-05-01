<?php
/**
 * File type enum for theme files.
 *
 * @package WPAudit
 */

declare( strict_types=1 );

namespace WPAudit\Enums;

/**
 * File types supported by the audit system.
 */
class FileType {
	/**
	 * PHP file type.
	 */
	public const PHP = 'php';

	/**
	 * CSS file type.
	 */
	public const CSS = 'css';

	/**
	 * JavaScript file type.
	 */
	public const JS = 'js';

	/**
	 * HTML file type.
	 */
	public const HTML = 'html';

	/**
	 * JSON file type.
	 */
	public const JSON = 'json';

	/**
	 * Unknown file type.
	 */
	public const UNKNOWN = 'unknown';

	/**
	 * Get all valid file types.
	 *
	 * @return array Array of valid file types.
	 */
	public static function get_all(): array {
		return array(
			self::PHP,
			self::CSS,
			self::JS,
			self::HTML,
			self::JSON,
			self::UNKNOWN,
		);
	}

	/**
	 * Detect file type from extension.
	 *
	 * @param string $filename The filename or path.
	 * @return string The detected file type.
	 */
	public static function from_filename( string $filename ): string {
		$extension = strtolower( pathinfo( $filename, PATHINFO_EXTENSION ) );

		$type_map = array(
			'php'  => self::PHP,
			'css'  => self::CSS,
			'js'   => self::JS,
			'html' => self::HTML,
			'htm'  => self::HTML,
			'json' => self::JSON,
		);

		return $type_map[ $extension ] ?? self::UNKNOWN;
	}
}
