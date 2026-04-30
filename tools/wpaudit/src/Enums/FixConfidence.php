<?php
/**
 * Fix confidence enum for automated fixes.
 *
 * @package WPAudit
 */

declare( strict_types=1 );

namespace WPAudit\Enums;

/**
 * Confidence levels for automated fixes.
 */
class FixConfidence {
	/**
	 * Safe - High confidence, no side effects expected.
	 */
	public const SAFE = 'safe';

	/**
	 * Moderate - Generally safe but may need review.
	 */
	public const MODERATE = 'moderate';

	/**
	 * Risky - Requires manual review.
	 */
	public const RISKY = 'risky';

	/**
	 * Get all valid confidence levels.
	 *
	 * @return array Array of valid confidence levels.
	 */
	public static function get_all(): array {
		return array(
			self::SAFE,
			self::MODERATE,
			self::RISKY,
		);
	}

	/**
	 * Check if a confidence level is valid.
	 *
	 * @param string $confidence The confidence level to check.
	 * @return bool True if valid.
	 */
	public static function is_valid( string $confidence ): bool {
		return in_array( $confidence, self::get_all(), true );
	}
}
