<?php
/**
 * Severity enum for audit findings.
 *
 * @package WPAudit
 */

declare( strict_types=1 );

namespace WPAudit\Enums;

/**
 * Severity levels for audit findings.
 */
class Severity {
	/**
	 * Critical severity - requires immediate attention.
	 */
	public const CRITICAL = 'critical';

	/**
	 * High severity - should be fixed soon.
	 */
	public const HIGH = 'high';

	/**
	 * Medium severity - should be addressed.
	 */
	public const MEDIUM = 'medium';

	/**
	 * Low severity - minor issue or suggestion.
	 */
	public const LOW = 'low';

	/**
	 * Get all valid severity levels.
	 *
	 * @return array Array of valid severity levels.
	 */
	public static function get_all(): array {
		return array(
			self::CRITICAL,
			self::HIGH,
			self::MEDIUM,
			self::LOW,
		);
	}

	/**
	 * Check if a severity level is valid.
	 *
	 * @param string $severity The severity level to check.
	 * @return bool True if valid.
	 */
	public static function is_valid( string $severity ): bool {
		return in_array( $severity, self::get_all(), true );
	}

	/**
	 * Get numeric weight for severity (for scoring).
	 *
	 * @param string $severity The severity level.
	 * @return float The numeric weight.
	 */
	public static function get_weight( string $severity ): float {
		$weights = array(
			self::CRITICAL => 10.0,
			self::HIGH     => 5.0,
			self::MEDIUM   => 2.0,
			self::LOW      => 0.5,
		);

		return $weights[ $severity ] ?? 0.0;
	}
}
