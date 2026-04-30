<?php
/**
 * SEO Analyzer for WordPress theme audit system.
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
 * Analyzes theme files for SEO issues.
 *
 * Detects:
 * - Improper heading hierarchy
 * - Missing or duplicate title tags
 * - Missing meta descriptions
 * - Missing Open Graph tags
 * - Invalid Schema.org markup
 * - Missing canonical tags
 * - Images without alt attributes
 */
class SEOAnalyzer implements IAnalyzer {
	use GeneratesFindingId;

	/**
	 * Rule definitions.
	 *
	 * @var array
	 */
	private $rules = array(
		'seo-001' => array(
			'id'          => 'seo-001',
			'description' => 'Improper heading hierarchy (skipped levels)',
			'severity'    => Severity::MEDIUM,
		),
		'seo-002' => array(
			'id'          => 'seo-002',
			'description' => 'Missing or duplicate title tag',
			'severity'    => Severity::HIGH,
		),
		'seo-003' => array(
			'id'          => 'seo-003',
			'description' => 'Missing meta description',
			'severity'    => Severity::HIGH,
		),
		'seo-004' => array(
			'id'          => 'seo-004',
			'description' => 'Missing Open Graph meta tags',
			'severity'    => Severity::MEDIUM,
		),
		'seo-005' => array(
			'id'          => 'seo-005',
			'description' => 'Invalid or missing Schema.org markup',
			'severity'    => Severity::LOW,
		),
		'seo-006' => array(
			'id'          => 'seo-006',
			'description' => 'Missing canonical URL tag',
			'severity'    => Severity::MEDIUM,
		),
		'seo-007' => array(
			'id'          => 'seo-007',
			'description' => 'Images without alt attributes (SEO impact)',
			'severity'    => Severity::MEDIUM,
		),
	);

	/**
	 * Get the analyzer name/category.
	 *
	 * @return string The analyzer category name.
	 */
	public function get_name(): string {
		return 'seo';
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

		switch ( $file->type ) {
			case FileType::PHP:
			case FileType::HTML:
				$findings = array_merge( $findings, $this->analyze_html_content( $file, $context ) );
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
		$supported_types = array(
			FileType::PHP,
			FileType::HTML,
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
	 * Analyze HTML content for SEO issues.
	 *
	 * @param ThemeFile    $file    The file to analyze.
	 * @param AuditContext $context Audit context.
	 * @return Finding[] Array of findings.
	 */
	private function analyze_html_content( ThemeFile $file, AuditContext $context ): array {
		$findings = array();

		$findings = array_merge( $findings, $this->check_heading_hierarchy( $file ) );
		$findings = array_merge( $findings, $this->check_title_tag( $file ) );
		$findings = array_merge( $findings, $this->check_meta_description( $file ) );
		$findings = array_merge( $findings, $this->check_open_graph( $file ) );
		$findings = array_merge( $findings, $this->check_schema_markup( $file ) );
		$findings = array_merge( $findings, $this->check_canonical( $file ) );
		$findings = array_merge( $findings, $this->check_image_alt_seo( $file ) );

		return $findings;
	}

	/**
	 * Check heading hierarchy.
	 *
	 * @param ThemeFile $file The file to analyze.
	 * @return Finding[] Array of findings.
	 */
	private function check_heading_hierarchy( ThemeFile $file ): array {
		$findings      = array();
		$lines         = explode( "\n", $file->content );
		$heading_levels = array();

		foreach ( $lines as $line_num => $line ) {
			if ( preg_match_all( '/<h([1-6])\b/i', $line, $matches ) ) {
				foreach ( $matches[1] as $level ) {
					$heading_levels[] = array(
						'level' => (int) $level,
						'line'  => $line_num + 1,
					);
				}
			}
		}

		// Check for skipped levels.
		for ( $i = 1; $i < count( $heading_levels ); $i++ ) {
			$current  = $heading_levels[ $i ]['level'];
			$previous = $heading_levels[ $i - 1 ]['level'];

			// Only flag if going deeper and skipping more than one level.
			if ( $current > $previous && $current - $previous > 1 ) {
				$findings[] = new Finding(
					$this->generate_finding_id( 'seo-001', $file->path, $heading_levels[ $i ]['line'] ),
					'seo',
					'seo-001',
					Severity::MEDIUM,
					sprintf( 'Heading hierarchy skipped from h%d to h%d', $previous, $current ),
					new Location( $file->path, $heading_levels[ $i ]['line'] ),
					sprintf( 'Use h%d instead of h%d to maintain proper heading hierarchy', $previous + 1, $current ),
					null,
					array(
						'previous_level' => $previous,
						'current_level'  => $current,
					)
				);
			}
		}

		// Check for multiple h1 tags.
		$h1_count = 0;
		$h1_lines = array();
		foreach ( $heading_levels as $heading ) {
			if ( 1 === $heading['level'] ) {
				++$h1_count;
				$h1_lines[] = $heading['line'];
			}
		}

		if ( $h1_count > 1 ) {
			$findings[] = new Finding(
				$this->generate_finding_id( 'seo-001', $file->path, $h1_lines[1] ),
				'seo',
				'seo-001',
				Severity::HIGH,
				sprintf( 'Multiple h1 tags found (%d occurrences)', $h1_count ),
				new Location( $file->path, $h1_lines[1] ),
				'Only one h1 tag should be used per page. Change additional h1 tags to h2 or appropriate level',
				null,
				array(
					'h1_count' => $h1_count,
					'h1_lines' => $h1_lines,
				)
			);
		}

		return $findings;
	}

	/**
	 * Check for title tag.
	 *
	 * @param ThemeFile $file The file to analyze.
	 * @return Finding[] Array of findings.
	 */
	private function check_title_tag( ThemeFile $file ): array {
		$findings = array();

		// Only check header-type files.
		if ( ! preg_match( '/header\.php|header\.html|index\.php|head\.php/', $file->path ) ) {
			return $findings;
		}

		$content = $file->content;

		// Check for wp_head() call (which includes title tag via add_theme_support('title-tag')).
		$has_wp_head   = preg_match( '/wp_head\s*\(\s*\)/', $content );
		$has_title_tag = preg_match( '/<title\b/', $content );

		if ( ! $has_wp_head && ! $has_title_tag ) {
			$findings[] = new Finding(
				$this->generate_finding_id( 'seo-002', $file->path, 1 ),
				'seo',
				'seo-002',
				Severity::HIGH,
				'Missing title tag and wp_head() call',
				new Location( $file->path, 1 ),
				'Ensure wp_head() is called in the <head> section, and add_theme_support("title-tag") is set in functions.php',
				null,
				array()
			);
		}

		// Check for duplicate title tags.
		if ( $has_wp_head && $has_title_tag ) {
			$findings[] = new Finding(
				$this->generate_finding_id( 'seo-002', $file->path, 1 ),
				'seo',
				'seo-002',
				Severity::MEDIUM,
				'Potentially duplicate title tag — both wp_head() and hardcoded <title> found',
				new Location( $file->path, 1 ),
				'Remove the hardcoded <title> tag if using add_theme_support("title-tag") with wp_head()',
				null,
				array()
			);
		}

		return $findings;
	}

	/**
	 * Check for meta description.
	 *
	 * @param ThemeFile $file The file to analyze.
	 * @return Finding[] Array of findings.
	 */
	private function check_meta_description( ThemeFile $file ): array {
		$findings = array();

		if ( ! preg_match( '/header\.php|header\.html|index\.php|head\.php/', $file->path ) ) {
			return $findings;
		}

		$content = $file->content;

		$has_meta_desc = preg_match( '/<meta\s+[^>]*name\s*=\s*["\']description["\']/i', $content );

		if ( ! $has_meta_desc ) {
			$findings[] = new Finding(
				$this->generate_finding_id( 'seo-003', $file->path, 1 ),
				'seo',
				'seo-003',
				Severity::HIGH,
				'No meta description tag found',
				new Location( $file->path, 1 ),
				'Add a meta description tag or use a plugin (e.g., Yoast SEO, Rank Math) to manage meta descriptions',
				null,
				array()
			);
		}

		return $findings;
	}

	/**
	 * Check for Open Graph tags.
	 *
	 * @param ThemeFile $file The file to analyze.
	 * @return Finding[] Array of findings.
	 */
	private function check_open_graph( ThemeFile $file ): array {
		$findings = array();

		if ( ! preg_match( '/header\.php|header\.html|index\.php|head\.php/', $file->path ) ) {
			return $findings;
		}

		$content = $file->content;

		$has_og = preg_match( '/property\s*=\s*["\']og:/', $content );

		if ( ! $has_og ) {
			$findings[] = new Finding(
				$this->generate_finding_id( 'seo-004', $file->path, 1 ),
				'seo',
				'seo-004',
				Severity::MEDIUM,
				'No Open Graph meta tags found',
				new Location( $file->path, 1 ),
				'Add Open Graph meta tags for better social media sharing, or use an SEO plugin to manage them',
				null,
				array()
			);
		}

		return $findings;
	}

	/**
	 * Check for Schema.org markup.
	 *
	 * @param ThemeFile $file The file to analyze.
	 * @return Finding[] Array of findings.
	 */
	private function check_schema_markup( ThemeFile $file ): array {
		$findings = array();

		if ( ! preg_match( '/index\.php|single\.php|page\.php|front-page\.php/', $file->path ) ) {
			return $findings;
		}

		$content = $file->content;

		$has_schema = preg_match( '/itemscope|itemtype|schema\.org|application\/ld\+json/i', $content );

		if ( ! $has_schema ) {
			$findings[] = new Finding(
				$this->generate_finding_id( 'seo-005', $file->path, 1 ),
				'seo',
				'seo-005',
				Severity::LOW,
				'No Schema.org structured data found',
				new Location( $file->path, 1 ),
				'Add Schema.org markup using JSON-LD or microdata, or use a plugin to generate structured data',
				null,
				array()
			);
		}

		return $findings;
	}

	/**
	 * Check for canonical URL.
	 *
	 * @param ThemeFile $file The file to analyze.
	 * @return Finding[] Array of findings.
	 */
	private function check_canonical( ThemeFile $file ): array {
		$findings = array();

		if ( ! preg_match( '/header\.php|header\.html|index\.php|head\.php/', $file->path ) ) {
			return $findings;
		}

		$content = $file->content;

		$has_canonical = preg_match( '/rel\s*=\s*["\']canonical["\']/i', $content );

		// WordPress outputs canonical by default via wp_head, so check for that too.
		$has_wp_head = preg_match( '/wp_head\s*\(\s*\)/', $content );

		if ( ! $has_canonical && ! $has_wp_head ) {
			$findings[] = new Finding(
				$this->generate_finding_id( 'seo-006', $file->path, 1 ),
				'seo',
				'seo-006',
				Severity::MEDIUM,
				'No canonical URL tag found',
				new Location( $file->path, 1 ),
				'Add rel="canonical" link tag or ensure wp_head() is called to output canonical URLs',
				null,
				array()
			);
		}

		return $findings;
	}

	/**
	 * Check images for alt text (SEO perspective).
	 *
	 * @param ThemeFile $file The file to analyze.
	 * @return Finding[] Array of findings.
	 */
	private function check_image_alt_seo( ThemeFile $file ): array {
		$findings = array();
		$lines    = explode( "\n", $file->content );

		foreach ( $lines as $line_num => $line ) {
			if ( preg_match_all( '/<img\s+[^>]*>/i', $line, $matches ) ) {
				foreach ( $matches[0] as $img_tag ) {
					// Check for empty alt or missing alt.
					$has_alt = preg_match( '/\salt\s*=\s*["\']([^"\']*)["\']/', $img_tag, $alt_match );

					if ( ! $has_alt ) {
						$findings[] = new Finding(
							$this->generate_finding_id( 'seo-007', $file->path, $line_num + 1 ),
							'seo',
							'seo-007',
							Severity::MEDIUM,
							'Image missing alt attribute (impacts SEO and image search)',
							new Location( $file->path, $line_num + 1 ),
							'Add descriptive alt text that includes relevant keywords',
							null,
							array(
								'line_content' => trim( $line ),
							)
						);
					} elseif ( empty( trim( $alt_match[1] ) ) ) {
						// Empty alt is valid for decorative images but flagged as SEO concern.
						$findings[] = new Finding(
							$this->generate_finding_id( 'seo-007', $file->path, $line_num + 1 ),
							'seo',
							'seo-007',
							Severity::LOW,
							'Image has empty alt text — confirm it is decorative',
							new Location( $file->path, $line_num + 1 ),
							'If the image conveys meaning, add descriptive alt text. Empty alt is correct only for decorative images',
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

}
