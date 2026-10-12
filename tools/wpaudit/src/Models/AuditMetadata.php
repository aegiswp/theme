<?php
/**
 * AuditMetadata model for audit execution metadata.
 *
 * @package WPAudit
 */

declare( strict_types=1 );

namespace WPAudit\Models;

/**
 * Metadata about the audit execution.
 */
class AuditMetadata {
	/**
	 * Audit timestamp.
	 *
	 * @var string
	 */
	public string $timestamp;

	/**
	 * Theme name.
	 *
	 * @var string
	 */
	public string $theme_name;

	/**
	 * Theme version.
	 *
	 * @var string
	 */
	public string $theme_version;

	/**
	 * Audit tool version.
	 *
	 * @var string
	 */
	public string $audit_version;

	/**
	 * Audit duration in seconds.
	 *
	 * @var float
	 */
	public float $duration;

	/**
	 * Number of files scanned.
	 *
	 * @var int
	 */
	public int $files_scanned;

	/**
	 * Constructor.
	 *
	 * @param string $timestamp      Audit timestamp (ISO 8601).
	 * @param string $theme_name     Theme name.
	 * @param string $theme_version  Theme version.
	 * @param string $audit_version  Audit tool version.
	 * @param float  $duration       Duration in seconds.
	 * @param int    $files_scanned  Number of files scanned.
	 */
	public function __construct(
		string $timestamp,
		string $theme_name,
		string $theme_version,
		string $audit_version,
		float $duration,
		int $files_scanned
	) {
		$this->timestamp      = $timestamp;
		$this->theme_name     = $theme_name;
		$this->theme_version  = $theme_version;
		$this->audit_version  = $audit_version;
		$this->duration       = $duration;
		$this->files_scanned  = $files_scanned;
	}

	/**
	 * Convert to array.
	 *
	 * @return array Associative array representation.
	 */
	public function to_array(): array {
		return array(
			'timestamp'     => $this->timestamp,
			'themeName'     => $this->theme_name,
			'themeVersion'  => $this->theme_version,
			'auditVersion'  => $this->audit_version,
			'duration'      => $this->duration,
			'filesScanned'  => $this->files_scanned,
		);
	}

	/**
	 * Create metadata for current audit.
	 *
	 * @param ThemeMetadata $theme         Theme metadata.
	 * @param float         $duration      Duration in seconds.
	 * @param int           $files_scanned Number of files scanned.
	 * @return self New AuditMetadata instance.
	 */
	public static function create(
		ThemeMetadata $theme,
		float $duration,
		int $files_scanned
	): self {
		return new self(
			gmdate( 'Y-m-d\TH:i:s\Z' ),
			$theme->name,
			$theme->version,
			'1.0.0', // Audit tool version.
			$duration,
			$files_scanned
		);
	}
}
