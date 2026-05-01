<?php
/**
 * AuditResult model for audit results.
 *
 * @package WPAudit
 */

declare( strict_types=1 );

namespace WPAudit\Models;

use WPAudit\Enums\Severity;

/**
 * Represents the complete audit result.
 */
class AuditResult {
	/**
	 * All findings from the audit.
	 *
	 * @var Finding[]
	 */
	public array $findings;

	/**
	 * Category scores (category => score).
	 *
	 * @var array
	 */
	public array $category_scores;

	/**
	 * Overall audit score (0-100).
	 *
	 * @var float
	 */
	public float $overall_score;

	/**
	 * Audit metadata.
	 *
	 * @var AuditMetadata
	 */
	public AuditMetadata $metadata;

	/**
	 * Statistics.
	 *
	 * @var array
	 */
	public array $stats;

	/**
	 * Constructor.
	 *
	 * @param Finding[]     $findings        Array of findings.
	 * @param array         $category_scores Category scores.
	 * @param float         $overall_score   Overall score.
	 * @param AuditMetadata $metadata        Audit metadata.
	 * @param array         $stats           Statistics (optional).
	 */
	public function __construct(
		array $findings,
		array $category_scores,
		float $overall_score,
		AuditMetadata $metadata,
		array $stats = array()
	) {
		$this->findings        = $findings;
		$this->category_scores = $category_scores;
		$this->overall_score   = $overall_score;
		$this->metadata        = $metadata;
		$this->stats           = $stats;
	}

	/**
	 * Get findings by category.
	 *
	 * @param string $category Category name.
	 * @return Finding[] Filtered findings.
	 */
	public function get_findings_by_category( string $category ): array {
		return array_filter(
			$this->findings,
			function ( Finding $finding ) use ( $category ) {
				return $finding->category === $category;
			}
		);
	}

	/**
	 * Get findings by severity.
	 *
	 * @param string $severity Severity level.
	 * @return Finding[] Filtered findings.
	 */
	public function get_findings_by_severity( string $severity ): array {
		return array_filter(
			$this->findings,
			function ( Finding $finding ) use ( $severity ) {
				return $finding->severity === $severity;
			}
		);
	}

	/**
	 * Get fixable findings (those with suggested fixes).
	 *
	 * @return Finding[] Fixable findings.
	 */
	public function get_fixable_findings(): array {
		return array_filter(
			$this->findings,
			function ( Finding $finding ) {
				return $finding->has_fix();
			}
		);
	}

	/**
	 * Get total issue count.
	 *
	 * @return int Total number of findings.
	 */
	public function get_total_issues(): int {
		return count( $this->findings );
	}

	/**
	 * Get issue count by severity.
	 *
	 * @return array Counts by severity level.
	 */
	public function get_severity_counts(): array {
		$counts = array(
			Severity::CRITICAL => 0,
			Severity::HIGH     => 0,
			Severity::MEDIUM   => 0,
			Severity::LOW      => 0,
		);

		foreach ( $this->findings as $finding ) {
			if ( isset( $counts[ $finding->severity ] ) ) {
				++$counts[ $finding->severity ];
			}
		}

		return $counts;
	}

	/**
	 * Convert to array.
	 *
	 * @return array Associative array representation.
	 */
	public function to_array(): array {
		return array(
			'metadata'       => $this->metadata->to_array(),
			'summary'        => array(
				'totalIssues'   => $this->get_total_issues(),
				'severityCounts' => $this->get_severity_counts(),
				'overallScore'  => $this->overall_score,
			),
			'categoryScores' => $this->category_scores,
			'findings'       => array_map(
				function ( Finding $finding ) {
					return $finding->to_array();
				},
				$this->findings
			),
			'stats'          => $this->stats,
		);
	}
}
