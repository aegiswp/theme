<?php
/**
 * Fix model for automated fixes.
 *
 * @package WPAudit
 */

declare( strict_types=1 );

namespace WPAudit\Models;

use WPAudit\Enums\FixConfidence;

/**
 * Represents an automated fix for an audit finding.
 */
class Fix {
	/**
	 * Fix type (replace, insert, delete, refactor).
	 *
	 * @var string
	 */
	public string $type;

	/**
	 * Fix confidence level.
	 *
	 * @var string
	 */
	public string $confidence;

	/**
	 * Description of what the fix does.
	 *
	 * @var string
	 */
	public string $description;

	/**
	 * Callback function to apply the fix.
	 *
	 * @var callable
	 */
	public $apply;

	/**
	 * Optional validation callback.
	 *
	 * @var callable|null
	 */
	public $validate;

	/**
	 * Constructor.
	 *
	 * @param string        $type        Fix type.
	 * @param string        $confidence  Fix confidence level.
	 * @param string        $description Fix description.
	 * @param callable      $apply       Callback to apply the fix.
	 * @param callable|null $validate    Optional validation callback.
	 */
	public function __construct(
		string $type,
		string $confidence,
		string $description,
		callable $apply,
		?callable $validate = null
	) {
		$this->type        = $type;
		$this->confidence  = $confidence;
		$this->description = $description;
		$this->apply       = $apply;
		$this->validate    = $validate;
	}

	/**
	 * Check if this fix meets the confidence threshold.
	 *
	 * @param string $threshold Minimum confidence level (safe, moderate, risky).
	 * @return bool True if fix meets threshold.
	 */
	public function meets_threshold( string $threshold ): bool {
		$levels = array(
			FixConfidence::SAFE     => 1,
			FixConfidence::MODERATE => 2,
			FixConfidence::RISKY    => 3,
		);

		$fix_level       = $levels[ $this->confidence ] ?? 0;
		$threshold_level = $levels[ $threshold ] ?? 0;

		return $fix_level <= $threshold_level;
	}

	/**
	 * Convert to array (for serialization).
	 *
	 * @return array Associative array representation.
	 */
	public function to_array(): array {
		return array(
			'type'        => $this->type,
			'confidence'  => $this->confidence,
			'description' => $this->description,
		);
	}
}
