<?php
/**
 * Accessibility Analyzer for WordPress theme audit system.
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
 * Analyzes theme files for accessibility issues.
 *
 * Detects:
 * - Insufficient color contrast
 * - Missing ARIA labels
 * - Form inputs without labels
 * - Missing alt text on images
 * - Focus indicators missing
 * - Keyboard navigation issues
 * - Missing skip links
 * - Media without captions/transcripts
 */
class AccessibilityAnalyzer implements IAnalyzer {
	use GeneratesFindingId;

	/**
	 * Rule definitions.
	 *
	 * @var array
	 */
	private $rules = array(
		'a11y-001' => array(
			'id'          => 'a11y-001',
			'description' => 'Insufficient color contrast (< 4.5:1 for normal text)',
			'severity'    => Severity::HIGH,
		),
		'a11y-002' => array(
			'id'          => 'a11y-002',
			'description' => 'Missing ARIA labels on interactive elements',
			'severity'    => Severity::HIGH,
		),
		'a11y-003' => array(
			'id'          => 'a11y-003',
			'description' => 'Form inputs without associated labels',
			'severity'    => Severity::HIGH,
		),
		'a11y-004' => array(
			'id'          => 'a11y-004',
			'description' => 'Missing alt text on images',
			'severity'    => Severity::HIGH,
		),
		'a11y-005' => array(
			'id'          => 'a11y-005',
			'description' => 'Focus indicators missing or insufficient',
			'severity'    => Severity::MEDIUM,
		),
		'a11y-006' => array(
			'id'          => 'a11y-006',
			'description' => 'Keyboard navigation not supported',
			'severity'    => Severity::HIGH,
		),
		'a11y-007' => array(
			'id'          => 'a11y-007',
			'description' => 'Missing skip links',
			'severity'    => Severity::MEDIUM,
		),
		'a11y-008' => array(
			'id'          => 'a11y-008',
			'description' => 'Media without captions/transcripts',
			'severity'    => Severity::HIGH,
		),
	);

	/**
	 * Get the analyzer name/category.
	 *
	 * @return string The analyzer category name.
	 */
	public function get_name(): string {
		return 'accessibility';
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
			case FileType::HTML:
				$findings = array_merge( $findings, $this->analyze_html_content( $file, $context ) );
				break;

			case FileType::CSS:
				$findings = array_merge( $findings, $this->analyze_css_file( $file, $context ) );
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
			FileType::CSS,
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
	 * Analyze HTML content for accessibility issues.
	 *
	 * @param ThemeFile    $file    The file to analyze.
	 * @param AuditContext $context Audit context.
	 * @return Finding[] Array of findings.
	 */
	private function analyze_html_content( ThemeFile $file, AuditContext $context ): array {
		$findings = array();

		$findings = array_merge( $findings, $this->check_aria_labels( $file ) );
		$findings = array_merge( $findings, $this->check_form_accessibility( $file ) );
		$findings = array_merge( $findings, $this->check_image_alt_text( $file ) );
		$findings = array_merge( $findings, $this->check_keyboard_navigation( $file ) );
		$findings = array_merge( $findings, $this->check_skip_links( $file ) );
		$findings = array_merge( $findings, $this->check_media_accessibility( $file ) );

		return $findings;
	}

	/**
	 * Analyze CSS file for accessibility issues.
	 *
	 * @param ThemeFile    $file    The CSS file to analyze.
	 * @param AuditContext $context Audit context.
	 * @return Finding[] Array of findings.
	 */
	private function analyze_css_file( ThemeFile $file, AuditContext $context ): array {
		$findings = array();

		$findings = array_merge( $findings, $this->check_color_contrast( $file, $context ) );
		$findings = array_merge( $findings, $this->check_focus_indicators( $file ) );

		return $findings;
	}

	/**
	 * Check for missing ARIA labels on interactive elements.
	 *
	 * @param ThemeFile $file The file to analyze.
	 * @return Finding[] Array of findings.
	 */
	private function check_aria_labels( ThemeFile $file ): array {
		$findings = array();
		$lines    = explode( "\n", $file->content );

		foreach ( $lines as $line_num => $line ) {
			if ( preg_match( '/<button[^>]*>/i', $line, $matches ) ) {
				$button_tag = $matches[0];

				if ( ! preg_match( '/aria-label\s*=|aria-labelledby\s*=/i', $button_tag ) ) {
					if ( preg_match( '/<button[^>]*>\s*<\/button>/i', $line ) ||
						preg_match( '/<button[^>]*>\s*<(?:i|svg|img)[^>]*>\s*<\/button>/i', $line ) ) {
						$findings[] = new Finding(
							$this->generate_finding_id( 'a11y-002', $file->path, $line_num + 1 ),
							'accessibility',
							'a11y-002',
							Severity::HIGH,
							'Button without accessible text or ARIA label',
							new Location( $file->path, $line_num + 1 ),
							'Add aria-label attribute or ensure button contains descriptive text',
							null,
							array(
								'line_content' => trim( $line ),
							)
						);
					}
				}
			}

			if ( preg_match( '/<a\s+[^>]*href\s*=\s*["\'][^"\']*["\'][^>]*>/i', $line, $matches ) ) {
				$link_tag = $matches[0];

				if ( ! preg_match( '/aria-label\s*=|aria-labelledby\s*=/i', $link_tag ) ) {
					if ( preg_match( '/<a[^>]*>\s*<(?:i|svg|img)[^>]*>\s*<\/a>/i', $line ) ) {
						$findings[] = new Finding(
							$this->generate_finding_id( 'a11y-002', $file->path, $line_num + 1 ),
							'accessibility',
							'a11y-002',
							Severity::HIGH,
							'Icon-only link without ARIA label',
							new Location( $file->path, $line_num + 1 ),
							'Add aria-label attribute to describe the link purpose',
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
	 * Check form accessibility (labels, error messages).
	 *
	 * @param ThemeFile $file The file to analyze.
	 * @return Finding[] Array of findings.
	 */
	private function check_form_accessibility( ThemeFile $file ): array {
		$findings = array();
		$lines    = explode( "\n", $file->content );

		foreach ( $lines as $line_num => $line ) {
			if ( preg_match( '/<(input|select|textarea)\s+[^>]*>/i', $line, $matches ) ) {
				$element_tag  = $matches[0];
				$element_type = $matches[1];

				if ( preg_match( '/type\s*=\s*["\'](?:hidden|submit|button|reset)["\']/i', $element_tag ) ) {
					continue;
				}

				$has_id = preg_match( '/\sid\s*=\s*["\']([^"\']+)["\']/i', $element_tag, $id_match );
				$has_aria_label = preg_match( '/aria-label\s*=|aria-labelledby\s*=/i', $element_tag );

				$context_start = max( 0, $line_num - 2 );
				$context_end   = min( count( $lines ) - 1, $line_num + 2 );
				$context       = implode( "\n", array_slice( $lines, $context_start, $context_end - $context_start + 1 ) );

				$has_wrapping_label = preg_match( '/<label[^>]*>.*?' . preg_quote( $element_tag, '/' ) . '.*?<\/label>/is', $context );

				$has_for_label = false;
				if ( $has_id ) {
					$id_value      = $id_match[1];
					$has_for_label = preg_match( '/<label[^>]*\sfor\s*=\s*["\']' . preg_quote( $id_value, '/' ) . '["\']/i', $context );
				}

				if ( ! $has_aria_label && ! $has_wrapping_label && ! $has_for_label ) {
					$findings[] = new Finding(
						$this->generate_finding_id( 'a11y-003', $file->path, $line_num + 1 ),
						'accessibility',
						'a11y-003',
						Severity::HIGH,
						sprintf( 'Form %s without associated label', $element_type ),
						new Location( $file->path, $line_num + 1 ),
						'Associate input with a label using for/id attributes, wrap in <label>, or add aria-label',
						null,
						array(
							'element_type' => $element_type,
							'line_content' => trim( $line ),
						)
					);
				}
			}
		}

		return $findings;
	}

	/**
	 * Check images for alt text.
	 *
	 * @param ThemeFile $file The file to analyze.
	 * @return Finding[] Array of findings.
	 */
	private function check_image_alt_text( ThemeFile $file ): array {
		$findings = array();
		$lines    = explode( "\n", $file->content );

		foreach ( $lines as $line_num => $line ) {
			if ( preg_match_all( '/<img\s+[^>]*>/i', $line, $matches ) ) {
				foreach ( $matches[0] as $img_tag ) {
					if ( ! preg_match( '/\salt\s*=\s*["\'][^"\']*["\']/i', $img_tag ) ) {
						$findings[] = new Finding(
							$this->generate_finding_id( 'a11y-004', $file->path, $line_num + 1 ),
							'accessibility',
							'a11y-004',
							Severity::HIGH,
							'Image missing alt attribute',
							new Location( $file->path, $line_num + 1 ),
							'Add alt attribute to image. Use empty alt="" for decorative images',
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
	 * Check keyboard navigation support.
	 *
	 * @param ThemeFile $file The file to analyze.
	 * @return Finding[] Array of findings.
	 */
	private function check_keyboard_navigation( ThemeFile $file ): array {
		$findings = array();
		$lines    = explode( "\n", $file->content );

		foreach ( $lines as $line_num => $line ) {
			if ( preg_match( '/<(div|span)[^>]*\sonclick\s*=/i', $line, $matches ) ) {
				$element_tag = $matches[0];

				$has_tabindex = preg_match( '/\stabindex\s*=\s*["\']0["\']/i', $element_tag );
				$has_keydown  = preg_match( '/\sonkeydown\s*=|onkeypress\s*=/i', $element_tag );

				if ( ! $has_tabindex || ! $has_keydown ) {
					$findings[] = new Finding(
						$this->generate_finding_id( 'a11y-006', $file->path, $line_num + 1 ),
						'accessibility',
						'a11y-006',
						Severity::HIGH,
						'Interactive element without keyboard navigation support',
						new Location( $file->path, $line_num + 1 ),
						'Add tabindex="0" and keyboard event handlers (onkeydown/onkeypress) or use a <button> element',
						null,
						array(
							'line_content' => trim( $line ),
						)
					);
				}
			}

			if ( preg_match( '/\stabindex\s*=\s*["\'](-[0-9]+)["\']/i', $line, $matches ) ) {
				$tabindex_value = $matches[1];

				$findings[] = new Finding(
					$this->generate_finding_id( 'a11y-006', $file->path, $line_num + 1 ),
					'accessibility',
					'a11y-006',
					Severity::MEDIUM,
					sprintf( 'Element with negative tabindex (%s) removes it from keyboard navigation', $tabindex_value ),
					new Location( $file->path, $line_num + 1 ),
					'Avoid negative tabindex unless intentionally hiding from keyboard navigation',
					null,
					array(
						'tabindex'     => $tabindex_value,
						'line_content' => trim( $line ),
					)
				);
			}
		}

		return $findings;
	}

	/**
	 * Check for skip-to-content links.
	 *
	 * @param ThemeFile $file The file to analyze.
	 * @return Finding[] Array of findings.
	 */
	private function check_skip_links( ThemeFile $file ): array {
		$findings = array();

		if ( ! preg_match( '/header\.php|header\.html|index\.php|front-page\.php/', $file->path ) ) {
			return $findings;
		}

		$content = $file->content;

		$has_skip_link = preg_match( '/skip-to-content|skip-navigation|skip-to-main|skip-link/i', $content );

		if ( ! $has_skip_link ) {
			$findings[] = new Finding(
				$this->generate_finding_id( 'a11y-007', $file->path, 1 ),
				'accessibility',
				'a11y-007',
				Severity::MEDIUM,
				'Missing skip-to-content link for keyboard navigation',
				new Location( $file->path, 1 ),
				'Add a skip link at the beginning of the page: <a href="#main-content" class="skip-link">Skip to content</a>',
				null,
				array()
			);
		}

		return $findings;
	}

	/**
	 * Check media elements for captions and transcripts.
	 *
	 * @param ThemeFile $file The file to analyze.
	 * @return Finding[] Array of findings.
	 */
	private function check_media_accessibility( ThemeFile $file ): array {
		$findings = array();
		$lines    = explode( "\n", $file->content );

		foreach ( $lines as $line_num => $line ) {
			if ( preg_match( '/<video\s+[^>]*>/i', $line, $matches ) ) {
				$context_start = $line_num;
				$context_end   = min( count( $lines ) - 1, $line_num + 10 );
				$context       = implode( "\n", array_slice( $lines, $context_start, $context_end - $context_start + 1 ) );

				$has_captions = preg_match( '/<track\s+[^>]*kind\s*=\s*["\'](?:captions|subtitles)["\']/i', $context );

				if ( ! $has_captions ) {
					$findings[] = new Finding(
						$this->generate_finding_id( 'a11y-008', $file->path, $line_num + 1 ),
						'accessibility',
						'a11y-008',
						Severity::HIGH,
						'Video element without captions or subtitles',
						new Location( $file->path, $line_num + 1 ),
						'Add <track kind="captions"> element to provide captions for video content',
						null,
						array(
							'line_content' => trim( $line ),
						)
					);
				}
			}

			if ( preg_match( '/<audio\s+[^>]*>/i', $line, $matches ) ) {
				$context_start = max( 0, $line_num - 3 );
				$context_end   = min( count( $lines ) - 1, $line_num + 3 );
				$context       = implode( "\n", array_slice( $lines, $context_start, $context_end - $context_start + 1 ) );

				$has_transcript = preg_match( '/transcript/i', $context );

				if ( ! $has_transcript ) {
					$findings[] = new Finding(
						$this->generate_finding_id( 'a11y-008', $file->path, $line_num + 1 ),
						'accessibility',
						'a11y-008',
						Severity::HIGH,
						'Audio element without transcript link',
						new Location( $file->path, $line_num + 1 ),
						'Provide a link to a transcript for audio content',
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
	 * Check color contrast in CSS.
	 *
	 * @param ThemeFile    $file    The CSS file to analyze.
	 * @param AuditContext $context Audit context.
	 * @return Finding[] Array of findings.
	 */
	private function check_color_contrast( ThemeFile $file, AuditContext $context ): array {
		$findings = array();
		$lines    = explode( "\n", $file->content );

		$min_contrast = $context->config->get( 'thresholds.minContrastRatio', 4.5 );

		foreach ( $lines as $line_num => $line ) {
			if ( preg_match( '/(?:^|;|\{)\s*(color|background-color)\s*:\s*([^;]+);/i', $line, $matches ) ) {
				$property = $matches[1];
				$value    = trim( $matches[2] );

				$color = $this->parse_color( $value );

				if ( null === $color ) {
					continue;
				}

				$opposite_property = ( 'color' === strtolower( $property ) ) ? 'background-color' : 'color';
				$context_start     = max( 0, $line_num - 5 );
				$context_end       = min( count( $lines ) - 1, $line_num + 5 );
				$context_lines     = array_slice( $lines, $context_start, $context_end - $context_start + 1 );

				foreach ( $context_lines as $ctx_line ) {
					if ( preg_match( '/' . $opposite_property . '\s*:\s*([^;]+);/i', $ctx_line, $ctx_match ) ) {
						$opposite_value = trim( $ctx_match[1] );
						$opposite_color = $this->parse_color( $opposite_value );

						if ( null !== $opposite_color ) {
							$contrast_ratio = $this->calculate_contrast_ratio( $color, $opposite_color );

							if ( $contrast_ratio < $min_contrast ) {
								$findings[] = new Finding(
									$this->generate_finding_id( 'a11y-001', $file->path, $line_num + 1 ),
									'accessibility',
									'a11y-001',
									Severity::HIGH,
									sprintf( 'Insufficient color contrast ratio: %.2f:1 (minimum: %.1f:1)', $contrast_ratio, $min_contrast ),
									new Location( $file->path, $line_num + 1 ),
									'Increase color contrast to meet WCAG 2.1 Level AA standards (4.5:1 for normal text, 3:1 for large text)',
									null,
									array(
										'contrast_ratio' => $contrast_ratio,
										'min_contrast'   => $min_contrast,
										'color1'         => $value,
										'color2'         => $opposite_value,
										'line_content'   => trim( $line ),
									)
								);
							}
							break;
						}
					}
				}
			}
		}

		return $findings;
	}

	/**
	 * Check for focus indicators in CSS.
	 *
	 * @param ThemeFile $file The CSS file to analyze.
	 * @return Finding[] Array of findings.
	 */
	private function check_focus_indicators( ThemeFile $file ): array {
		$findings = array();
		$lines    = explode( "\n", $file->content );

		foreach ( $lines as $line_num => $line ) {
			if ( preg_match( '/:focus\s*\{[^}]*outline\s*:\s*(?:none|0)/i', $line ) ) {
				$context_start = $line_num;
				$context_end   = min( count( $lines ) - 1, $line_num + 10 );
				$context       = implode( "\n", array_slice( $lines, $context_start, $context_end - $context_start + 1 ) );

				$has_alternative = preg_match( '/(?:border|box-shadow|background)(?:-color)?\s*:/i', $context );

				if ( ! $has_alternative ) {
					$findings[] = new Finding(
						$this->generate_finding_id( 'a11y-005', $file->path, $line_num + 1 ),
						'accessibility',
						'a11y-005',
						Severity::MEDIUM,
						'Focus outline removed without alternative focus indicator',
						new Location( $file->path, $line_num + 1 ),
						'Provide an alternative focus indicator (border, box-shadow, or background change) when removing outline',
						null,
						array(
							'line_content' => trim( $line ),
						)
					);
				}
			}

			if ( preg_match( '/^\s*\*\s*\{[^}]*outline\s*:\s*(?:none|0)/i', $line ) ) {
				$findings[] = new Finding(
					$this->generate_finding_id( 'a11y-005', $file->path, $line_num + 1 ),
					'accessibility',
					'a11y-005',
					Severity::HIGH,
					'Global outline removal affects keyboard navigation',
					new Location( $file->path, $line_num + 1 ),
					'Remove global outline: none rule and provide proper focus indicators for interactive elements',
					null,
					array(
						'line_content' => trim( $line ),
					)
				);
			}
		}

		return $findings;
	}

	/**
	 * Parse color value from CSS.
	 *
	 * @param string $value Color value (hex, rgb, rgba, hsl, named).
	 * @return array|null RGB array [r, g, b] or null if invalid.
	 */
	private function parse_color( string $value ): ?array {
		$value = trim( $value );

		if ( preg_match( '/^#([0-9a-f]{3}|[0-9a-f]{6})$/i', $value, $matches ) ) {
			$hex = $matches[1];

			if ( 3 === strlen( $hex ) ) {
				$hex = $hex[0] . $hex[0] . $hex[1] . $hex[1] . $hex[2] . $hex[2];
			}

			return array(
				hexdec( substr( $hex, 0, 2 ) ),
				hexdec( substr( $hex, 2, 2 ) ),
				hexdec( substr( $hex, 4, 2 ) ),
			);
		}

		if ( preg_match( '/rgba?\s*\(\s*(\d+)\s*,\s*(\d+)\s*,\s*(\d+)/i', $value, $matches ) ) {
			return array(
				(int) $matches[1],
				(int) $matches[2],
				(int) $matches[3],
			);
		}

		$named_colors = array(
			'white'  => array( 255, 255, 255 ),
			'black'  => array( 0, 0, 0 ),
			'red'    => array( 255, 0, 0 ),
			'green'  => array( 0, 128, 0 ),
			'blue'   => array( 0, 0, 255 ),
			'yellow' => array( 255, 255, 0 ),
			'gray'   => array( 128, 128, 128 ),
			'grey'   => array( 128, 128, 128 ),
		);

		$lower_value = strtolower( $value );
		if ( isset( $named_colors[ $lower_value ] ) ) {
			return $named_colors[ $lower_value ];
		}

		return null;
	}

	/**
	 * Calculate contrast ratio between two colors.
	 *
	 * Uses WCAG 2.1 formula: (L1 + 0.05) / (L2 + 0.05)
	 * where L1 is the lighter color and L2 is the darker color.
	 *
	 * @param array $color1 RGB array [r, g, b].
	 * @param array $color2 RGB array [r, g, b].
	 * @return float Contrast ratio.
	 */
	private function calculate_contrast_ratio( array $color1, array $color2 ): float {
		$l1 = $this->calculate_relative_luminance( $color1 );
		$l2 = $this->calculate_relative_luminance( $color2 );

		if ( $l2 > $l1 ) {
			list( $l1, $l2 ) = array( $l2, $l1 );
		}

		return ( $l1 + 0.05 ) / ( $l2 + 0.05 );
	}

	/**
	 * Calculate relative luminance of a color.
	 *
	 * @param array $rgb RGB array [r, g, b].
	 * @return float Relative luminance (0-1).
	 */
	private function calculate_relative_luminance( array $rgb ): float {
		$srgb = array_map(
			function ( $val ) {
				$val = $val / 255.0;
				return ( $val <= 0.03928 ) ? $val / 12.92 : pow( ( $val + 0.055 ) / 1.055, 2.4 );
			},
			$rgb
		);

		return 0.2126 * $srgb[0] + 0.7152 * $srgb[1] + 0.0722 * $srgb[2];
	}

}
