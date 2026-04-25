<?php
/**
 * Finding model for audit results.
 *
 * @package WPAudit
 */

declare( strict_types=1 );

namespace WPAudit\Models;

use WPAudit\Enums\Severity;

/**
 * Represents an audit finding (issue or recommendation).
 */
class Finding {
	/**
	 * Unique finding identifier.
	 *
	 * @var string
	 */
	public string $id;

	/**
	 * Category (performance, seo, accessibility, security, scalability).
	 *
	 * @var string
	 */
	public string $category;

	/**
	 * Specific rule violated.
	 *
	 * @var string
	 */
	public string $rule;

	/**
	 * Severity level.
	 *
	 * @var string
	 */
	public string $severity;

	/**
	 * Human-readable description.
	 *
	 * @var string
	 */
	public string $message;

	/**
	 * Location in code.
	 *
	 * @var Location
	 */
	public Location $location;

	/**
	 * How to fix the issue.
	 *
	 * @var string
	 */
	public string $recommendation;

	/**
	 * Automated fix if available.
	 *
	 * @var Fix|null
	 */
	public ?Fix $suggested_fix;

	/**
	 * Additional context.
	 *
	 * @var array
	 */
	public array $metadata;

	/**
	 * Constructor.
	 *
	 * @param string   $id              Unique identifier.
	 * @param string   $category        Category name.
	 * @param string   $rule            Rule ID.
	 * @param string   $severity        Severity level.
	 * @param string   $message         Description.
	 * @param Location $location        Location in code.
	 * @param string   $recommendation  How to fix.
	 * @param Fix|null $suggested_fix   Automated fix (optional).
	 * @param array    $metadata        Additional context (optional).
	 */
	public function __construct(
		string $id,
		string $category,
		string $rule,
		string $severity,
		string $message,
		Location $location,
		string $recommendation,
		?Fix $suggested_fix = null,
		array $metadata = array()
	) {
		$this->id             = $id;
		$this->category       = $category;
		$this->rule           = $rule;
		$this->severity       = $severity;
		$this->message        = $message;
		$this->location       = $location;
		$this->recommendation = $recommendation;
		$this->suggested_fix  = $suggested_fix;
		$this->metadata       = $metadata;
	}

	/**
	 * Check if this finding has an automated fix.
	 *
	 * @return bool True if fix is available.
	 */
	public function has_fix(): bool {
		return null !== $this->suggested_fix;
	}

	/**
	 * Convert to array.
	 *
	 * @return array Associative array representation.
	 */
	public function to_array(): array {
		$data = array(
			'id'             => $this->id,
			'category'       => $this->category,
			'rule'           => $this->rule,
			'severity'       => $this->severity,
			'message'        => $this->message,
			'location'       => $this->location->to_array(),
			'recommendation' => $this->recommendation,
			'metadata'       => $this->metadata,
		);

		if ( $this->has_fix() ) {
			$data['suggestedFix'] = $this->suggested_fix->to_array();
		}

		return $data;
	}

	/**
	 * Create from array.
	 *
	 * @param array $data Associative array with finding data.
	 * @return self New Finding instance.
	 */
	public static function from_array( array $data ): self {
		return new self(
			$data['id'] ?? '',
			$data['category'] ?? '',
			$data['rule'] ?? '',
			$data['severity'] ?? Severity::LOW,
			$data['message'] ?? '',
			Location::from_array( $data['location'] ?? array() ),
			$data['recommendation'] ?? '',
			null, // Fix cannot be serialized/deserialized with callbacks.
			$data['metadata'] ?? array()
		);
	}
}
