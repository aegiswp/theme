<?php
/**
 * Performance Analyzer for WordPress theme audit system.
 *
 * @package WPAudit
 */

declare( strict_types=1 );

namespace WPAudit\Analyzers;

use WPAudit\Interfaces\IAnalyzer;
use WPAudit\Models\ThemeFile;
use WPAudit\Models\AuditContext;
use WPAudit\Models\Finding;
use WPAudit\Models\Location;
use WPAudit\Enums\FileType;
use WPAudit\Enums\Severity;
use WPAudit\Traits\GeneratesFindingId;

/**
 * Analyzes theme files for performance issues.
 *
 * Detects:
 * - Unoptimized assets (images, scripts, stylesheets)
 * - Render-blocking resources
 * - Inefficient database queries
 * - Missing caching mechanisms
 */
class PerformanceAnalyzer implements IAnalyzer {
	use GeneratesFindingId;

	/**
	 * Rule definitions.
	 *
	 * @var array
	 */
	private $rules = array(
		'perf-001' => array(
			'id'          => 'perf-001',
			'description' => 'Missing lazy loading on images',
			'severity'    => Severity::HIGH,
		),
		'perf-002' => array(
			'id'          => 'perf-002',
			'description' => 'Scripts without defer/async attributes',
			'severity'    => Severity::MEDIUM,
		),
		'perf-003' => array(
			'id'          => 'perf-003',
			'description' => 'Inline critical CSS missing',
			'severity'    => Severity::MEDIUM,
		),
		'perf-004' => array(
			'id'          => 'perf-004',
			'description' => 'Unoptimized database queries (missing caching)',
			'severity'    => Severity::HIGH,
		),
		'perf-005' => array(
			'id'          => 'perf-005',
			'description' => 'Large uncompressed assets',
			'severity'    => Severity::MEDIUM,
		),
		'perf-006' => array(
			'id'          => 'perf-006',
			'description' => 'Missing resource hints (preload, prefetch, dns-prefetch)',
			'severity'    => Severity::LOW,
		),
	);

	/**
	 * Get the analyzer name/category.
	 *
	 * @return string The analyzer category name.
	 */
	public function get_name(): string {
		return 'performance';
	}

	/**
	 * Analyze a theme file and return findings.
	 *
	 * @param ThemeFile    $file    The file to analyze.
	 * @param AuditContext $context Shared context and configuration.
	 * @return Finding[] Array of findings.
	 */
	public function analyze( ThemeFile $file, AuditContext $context ): array {
		$findings = array();

		// Analyze based on file type.
		switch ( $file->type ) {
			case FileType::PHP:
				$findings = array_merge( $findings, $this->analyze_php_file( $file, $context ) );
				break;

			case FileType::HTML:
				$findings = array_merge( $findings, $this->analyze_html_file( $file, $context ) );
				break;

			case FileType::CSS:
				$findings = array_merge( $findings, $this->analyze_css_file( $file, $context ) );
				break;

			case FileType::JS:
				$findings = array_merge( $findings, $this->analyze_js_file( $file, $context ) );
				break;
		}

		return $findings;
	}

	/**
	 * Check if this analyzer can handle the given file.
	 *
	 * @param ThemeFile $file The file to check.
	 * @return bool True if this analyzer can analyze the file.
	 */
	public function can_analyze( ThemeFile $file ): bool {
		// Performance analyzer can analyze PHP, HTML, CSS, and JS files.
		$supported_types = array(
			FileType::PHP,
			FileType::HTML,
			FileType::CSS,
			FileType::JS,
		);

		return in_array( $file->type, $supported_types, true );
	}

	/**
	 * Get the rules this analyzer implements.
	 *
	 * @return array Array of rule definitions.
	 */
	public function get_rules(): array {
		return array_values( $this->rules );
	}

	/**
	 * Analyze PHP file for performance issues.
	 *
	 * @param ThemeFile    $file    The PHP file to analyze.
	 * @param AuditContext $context Audit context.
	 * @return Finding[] Array of findings.
	 */
	private function analyze_php_file( ThemeFile $file, AuditContext $context ): array {
		$findings = array();

		// Detect wp_enqueue_script/style calls without optimization.
		$findings = array_merge( $findings, $this->detect_unoptimized_enqueues( $file ) );

		// Detect database queries without caching.
		$findings = array_merge( $findings, $this->detect_uncached_queries( $file ) );

		// Detect missing resource hints.
		$findings = array_merge( $findings, $this->detect_missing_resource_hints( $file ) );

		return $findings;
	}

	/**
	 * Analyze HTML file for performance issues.
	 *
	 * @param ThemeFile    $file    The HTML file to analyze.
	 * @param AuditContext $context Audit context.
	 * @return Finding[] Array of findings.
	 */
	private function analyze_html_file( ThemeFile $file, AuditContext $context ): array {
		$findings = array();

		// Detect images without lazy loading.
		$findings = array_merge( $findings, $this->detect_images_without_lazy_loading( $file ) );

		// Detect render-blocking scripts.
		$findings = array_merge( $findings, $this->detect_render_blocking_scripts( $file ) );

		return $findings;
	}

	/**
	 * Analyze CSS file for performance issues.
	 *
	 * @param ThemeFile    $file    The CSS file to analyze.
	 * @param AuditContext $context Audit context.
	 * @return Finding[] Array of findings.
	 */
	private function analyze_css_file( ThemeFile $file, AuditContext $context ): array {
		$findings = array();

		// Check file size for large uncompressed assets.
		$findings = array_merge( $findings, $this->detect_large_assets( $file ) );

		return $findings;
	}

	/**
	 * Analyze JavaScript file for performance issues.
	 *
	 * @param ThemeFile    $file    The JS file to analyze.
	 * @param AuditContext $context Audit context.
	 * @return Finding[] Array of findings.
	 */
	private function analyze_js_file( ThemeFile $file, AuditContext $context ): array {
		$findings = array();

		// Check file size for large uncompressed assets.
		$findings = array_merge( $findings, $this->detect_large_assets( $file ) );

		return $findings;
	}

	/**
	 * Detect wp_enqueue_script/style calls without optimization attributes.
	 *
	 * @param ThemeFile $file The file to analyze.
	 * @return Finding[] Array of findings.
	 */
	private function detect_unoptimized_enqueues( ThemeFile $file ): array {
		$findings = array();
		$lines    = explode( "\n", $file->content );

		foreach ( $lines as $line_num => $line ) {
			// Detect wp_enqueue_script without defer/async.
			if ( preg_match( '/wp_enqueue_script\s*\(/', $line ) ) {
				// Check if this is a non-critical script (not in footer, no strategy).
				if ( ! preg_match( '/[\'"]strategy[\'"]\s*=>\s*[\'"](?:defer|async)[\'"]/', $line ) &&
					! preg_match( '/true\s*\)/', $line ) ) { // Check for in_footer parameter.
					$findings[] = new Finding(
						$this->generate_finding_id( 'perf-002', $file->path, $line_num + 1 ),
						'performance',
						'perf-002',
						Severity::MEDIUM,
						'Script enqueued without defer/async strategy for better performance',
						new Location( $file->path, $line_num + 1 ),
						'Add "strategy" => "defer" or "strategy" => "async" to wp_enqueue_script() call, or set $in_footer to true',
						null,
						array(
							'line_content' => trim( $line ),
						)
					);
				}
			}
		}

		return $findings;
	}

	/**
	 * Detect database queries without caching.
	 *
	 * @param ThemeFile $file The file to analyze.
	 * @return Finding[] Array of findings.
	 */
	private function detect_uncached_queries( ThemeFile $file ): array {
		$findings = array();
		$lines    = explode( "\n", $file->content );

		foreach ( $lines as $line_num => $line ) {
			// Detect WP_Query, get_posts, or direct $wpdb queries.
			if ( preg_match( '/new\s+WP_Query\s*\(|get_posts\s*\(|\$wpdb->get_/', $line ) ) {
				// Check if there's no caching mechanism nearby (simple heuristic).
				$context_start = max( 0, $line_num - 3 );
				$context_end   = min( count( $lines ) - 1, $line_num + 3 );
				$context       = implode( "\n", array_slice( $lines, $context_start, $context_end - $context_start + 1 ) );

				// Look for common caching functions.
				if ( ! preg_match( '/wp_cache_get|wp_cache_set|get_transient|set_transient/', $context ) ) {
					$findings[] = new Finding(
						$this->generate_finding_id( 'perf-004', $file->path, $line_num + 1 ),
						'performance',
						'perf-004',
						Severity::HIGH,
						'Database query without caching mechanism detected',
						new Location( $file->path, $line_num + 1 ),
						'Wrap query results with wp_cache_get/set or transients to reduce database load',
						null,
						array(
							'line_content' => trim( $line ),
						)
					);
				}
			}
		}

		return $findings;
	}

	/**
	 * Detect missing resource hints.
	 *
	 * @param ThemeFile $file The file to analyze.
	 * @return Finding[] Array of findings.
	 */
	private function detect_missing_resource_hints( ThemeFile $file ): array {
		$findings = array();

		// Only check functions.php or similar setup files.
		if ( ! preg_match( '/functions\.php|setup\.php|init\.php/', $file->path ) ) {
			return $findings;
		}

		$content = $file->content;

		// Check if resource hints are being added.
		if ( ! preg_match( '/wp_resource_hints|dns-prefetch|preconnect|prefetch|preload/', $content ) ) {
			$findings[] = new Finding(
				$this->generate_finding_id( 'perf-006', $file->path, 1 ),
				'performance',
				'perf-006',
				Severity::LOW,
				'No resource hints detected in theme setup',
				new Location( $file->path, 1 ),
				'Add resource hints using wp_resource_hints filter to improve loading performance for external resources',
				null,
				array()
			);
		}

		return $findings;
	}

	/**
	 * Detect images without lazy loading attribute.
	 *
	 * @param ThemeFile $file The file to analyze.
	 * @return Finding[] Array of findings.
	 */
	private function detect_images_without_lazy_loading( ThemeFile $file ): array {
		$findings = array();
		$lines    = explode( "\n", $file->content );

		foreach ( $lines as $line_num => $line ) {
			// Find img tags.
			if ( preg_match( '/<img\s+[^>]*>/', $line, $matches ) ) {
				$img_tag = $matches[0];

				// Check if loading="lazy" is present.
				if ( ! preg_match( '/loading\s*=\s*["\']lazy["\']/', $img_tag ) ) {
					// Skip if it's likely above the fold (heuristic: first few images in template).
					if ( $line_num > 10 ) {
						$findings[] = new Finding(
							$this->generate_finding_id( 'perf-001', $file->path, $line_num + 1 ),
							'performance',
							'perf-001',
							Severity::HIGH,
							'Image missing lazy loading attribute',
							new Location( $file->path, $line_num + 1 ),
							'Add loading="lazy" attribute to img tag to defer loading of off-screen images',
							null,
							array(
								'line_content' => trim( $line ),
							)
						);
					}
				}
			}
		}

		return $findings;
	}

	/**
	 * Detect render-blocking scripts in HTML.
	 *
	 * @param ThemeFile $file The file to analyze.
	 * @return Finding[] Array of findings.
	 */
	private function detect_render_blocking_scripts( ThemeFile $file ): array {
		$findings = array();
		$lines    = explode( "\n", $file->content );

		foreach ( $lines as $line_num => $line ) {
			// Find script tags in head section.
			if ( preg_match( '/<script\s+[^>]*src\s*=\s*["\'][^"\']+["\'][^>]*>/', $line, $matches ) ) {
				$script_tag = $matches[0];

				// Check if defer or async is present.
				if ( ! preg_match( '/\s(?:defer|async)(?:\s|>)/', $script_tag ) ) {
					// Check if we're in the head section (heuristic).
					$context_start = max( 0, $line_num - 10 );
					$context       = implode( "\n", array_slice( $lines, $context_start, 10 ) );

					if ( preg_match( '/<head\b/', $context ) ) {
						$findings[] = new Finding(
							$this->generate_finding_id( 'perf-002', $file->path, $line_num + 1 ),
							'performance',
							'perf-002',
							Severity::MEDIUM,
							'Render-blocking script in head section without defer/async',
							new Location( $file->path, $line_num + 1 ),
							'Add defer or async attribute to script tag to prevent render blocking',
							null,
							array(
								'line_content' => trim( $line ),
							)
						);
					}
				}
			}
		}

		return $findings;
	}

	/**
	 * Detect large uncompressed assets.
	 *
	 * @param ThemeFile $file The file to analyze.
	 * @return Finding[] Array of findings.
	 */
	private function detect_large_assets( ThemeFile $file ): array {
		$findings  = array();
		$file_size = strlen( $file->content );

		// Threshold: 100KB for CSS/JS files.
		$threshold = 100 * 1024;

		if ( $file_size > $threshold ) {
			$findings[] = new Finding(
				$this->generate_finding_id( 'perf-005', $file->path, 1 ),
				'performance',
				'perf-005',
				Severity::MEDIUM,
				sprintf( 'Large asset file detected (%s)', $this->format_bytes( $file_size ) ),
				new Location( $file->path, 1 ),
				'Consider minifying and compressing this asset, or splitting it into smaller chunks',
				null,
				array(
					'file_size' => $file_size,
				)
			);
		}

		return $findings;
	}

	/**
	 * Format bytes to human-readable size.
	 *
	 * @param int $bytes Byte count.
	 * @return string Formatted size string.
	 */
	private function format_bytes( int $bytes ): string {
		$units = array( 'B', 'KB', 'MB', 'GB' );
		$i     = 0;

		while ( $bytes >= 1024 && $i < count( $units ) - 1 ) {
			$bytes /= 1024;
			++$i;
		}

		return round( $bytes, 2 ) . ' ' . $units[ $i ];
	}
}
