<?php
/**
 * Analyzer interface for WordPress theme audit system.
 *
 * @package WPAudit
 */

declare( strict_types=1 );

namespace WPAudit\Interfaces;

use WPAudit\Models\ThemeFile;
use WPAudit\Models\AuditContext;
use WPAudit\Models\Finding;

/**
 * Interface for all analyzer modules.
 *
 * Each analyzer is responsible for analyzing theme files for a specific
 * category of issues (performance, SEO, accessibility, security, scalability).
 */
interface IAnalyzer {
	/**
	 * Get the analyzer name/category.
	 *
	 * @return string The analyzer category name (e.g., 'performance', 'seo').
	 */
	public function get_name(): string;

	/**
	 * Analyze a theme file and return findings.
	 *
	 * @param ThemeFile    $file    The file to analyze.
	 * @param AuditContext $context Shared context and configuration.
	 * @return Finding[] Array of findings.
	 */
	public function analyze( ThemeFile $file, AuditContext $context ): array;

	/**
	 * Check if this analyzer can handle the given file.
	 *
	 * @param ThemeFile $file The file to check.
	 * @return bool True if this analyzer can analyze the file.
	 */
	public function can_analyze( ThemeFile $file ): bool;

	/**
	 * Get the rules this analyzer implements.
	 *
	 * @return array Array of rule definitions with id, description, severity.
	 */
	public function get_rules(): array;
}
