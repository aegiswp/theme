<?php
/**
 * Configuration model for audit settings.
 *
 * @package WPAudit
 */

declare( strict_types=1 );

namespace WPAudit\Models;

use InvalidArgumentException;
use WPAudit\Utils\ArrayUtils;

/**
 * Configuration for the audit system.
 */
class Configuration {
	/**
	 * Configuration data.
	 *
	 * @var array
	 */
	private array $data;

	/**
	 * Validation errors.
	 *
	 * @var array
	 */
	private array $validation_errors = array();

	/**
	 * Constructor.
	 *
	 * @param array $data Configuration data.
	 * @param bool  $validate Whether to validate against schema.
	 * @throws InvalidArgumentException If validation fails.
	 */
	public function __construct( array $data = array(), bool $validate = true ) {
		if ( $validate ) {
			$this->validate( $data );
		}
		$this->data = $this->merge_with_defaults( $data );
	}

	/**
	 * Get configuration value.
	 *
	 * @param string $key     Dot-notation key (e.g., 'categories.performance.enabled').
	 * @param mixed  $default Default value if key not found.
	 * @return mixed Configuration value.
	 */
	public function get( string $key, $default = null ) {
		$keys  = explode( '.', $key );
		$value = $this->data;

		foreach ( $keys as $k ) {
			if ( ! is_array( $value ) || ! isset( $value[ $k ] ) ) {
				return $default;
			}
			$value = $value[ $k ];
		}

		return $value;
	}

	/**
	 * Set configuration value.
	 *
	 * @param string $key   Dot-notation key.
	 * @param mixed  $value Value to set.
	 * @return void
	 */
	public function set( string $key, $value ): void {
		$keys = explode( '.', $key );
		$data = &$this->data;

		foreach ( $keys as $i => $k ) {
			if ( $i === count( $keys ) - 1 ) {
				$data[ $k ] = $value;
			} else {
				if ( ! isset( $data[ $k ] ) || ! is_array( $data[ $k ] ) ) {
					$data[ $k ] = array();
				}
				$data = &$data[ $k ];
			}
		}
	}

	/**
	 * Convert to array.
	 *
	 * @return array Configuration data.
	 */
	public function to_array(): array {
		return $this->data;
	}

	/**
	 * Create from array.
	 *
	 * @param array $data Configuration data.
	 * @param bool  $validate Whether to validate against schema.
	 * @return self New Configuration instance.
	 * @throws InvalidArgumentException If validation fails.
	 */
	public static function from_array( array $data, bool $validate = true ): self {
		return new self( $data, $validate );
	}

	/**
	 * Validate configuration against JSON schema.
	 *
	 * @param array $data Configuration data to validate.
	 * @return bool True if valid.
	 * @throws InvalidArgumentException If validation fails.
	 */
	public function validate( array $data ): bool {
		$this->validation_errors = array();

		// Validate version.
		if ( isset( $data['version'] ) && ! is_string( $data['version'] ) ) {
			$this->validation_errors[] = 'version must be a string';
		}

		// Validate categories.
		if ( isset( $data['categories'] ) ) {
			if ( ! is_array( $data['categories'] ) ) {
				$this->validation_errors[] = 'categories must be an object';
			} else {
				$this->validate_categories( $data['categories'] );
			}
		}

		// Validate thresholds.
		if ( isset( $data['thresholds'] ) ) {
			if ( ! is_array( $data['thresholds'] ) ) {
				$this->validation_errors[] = 'thresholds must be an object';
			} else {
				$this->validate_thresholds( $data['thresholds'] );
			}
		}

		// Validate exclusions.
		if ( isset( $data['exclusions'] ) ) {
			if ( ! is_array( $data['exclusions'] ) ) {
				$this->validation_errors[] = 'exclusions must be an object';
			} else {
				$this->validate_exclusions( $data['exclusions'] );
			}
		}

		// Validate autofix.
		if ( isset( $data['autofix'] ) ) {
			if ( ! is_array( $data['autofix'] ) ) {
				$this->validation_errors[] = 'autofix must be an object';
			} else {
				$this->validate_autofix( $data['autofix'] );
			}
		}

		// Validate output.
		if ( isset( $data['output'] ) ) {
			if ( ! is_array( $data['output'] ) ) {
				$this->validation_errors[] = 'output must be an object';
			} else {
				$this->validate_output( $data['output'] );
			}
		}

		if ( ! empty( $this->validation_errors ) ) {
			throw new InvalidArgumentException(
				'Configuration validation failed: ' . implode( ', ', $this->validation_errors )
			);
		}

		return true;
	}

	/**
	 * Validate categories configuration.
	 *
	 * @param array $categories Categories configuration.
	 * @return void
	 */
	private function validate_categories( array $categories ): void {
		$valid_categories = array( 'performance', 'seo', 'accessibility', 'security', 'scalability' );

		foreach ( $categories as $category => $config ) {
			if ( ! in_array( $category, $valid_categories, true ) ) {
				$this->validation_errors[] = "Invalid category: {$category}";
				continue;
			}

			if ( ! is_array( $config ) ) {
				$this->validation_errors[] = "Category {$category} must be an object";
				continue;
			}

			if ( isset( $config['enabled'] ) && ! is_bool( $config['enabled'] ) ) {
				$this->validation_errors[] = "Category {$category}.enabled must be a boolean";
			}

			if ( isset( $config['rules'] ) ) {
				if ( ! is_array( $config['rules'] ) ) {
					$this->validation_errors[] = "Category {$category}.rules must be an object";
				} else {
					$this->validate_rules( $config['rules'], $category );
				}
			}
		}
	}

	/**
	 * Validate rules configuration.
	 *
	 * @param array  $rules    Rules configuration.
	 * @param string $category Category name.
	 * @return void
	 */
	private function validate_rules( array $rules, string $category ): void {
		foreach ( $rules as $rule_id => $rule_config ) {
			if ( ! preg_match( '/^[a-z]+-[0-9]+$/', $rule_id ) ) {
				$this->validation_errors[] = "Invalid rule ID format: {$rule_id}";
				continue;
			}

			if ( ! is_array( $rule_config ) ) {
				$this->validation_errors[] = "Rule {$rule_id} must be an object";
				continue;
			}

			if ( isset( $rule_config['enabled'] ) && ! is_bool( $rule_config['enabled'] ) ) {
				$this->validation_errors[] = "Rule {$rule_id}.enabled must be a boolean";
			}

			if ( isset( $rule_config['severity'] ) ) {
				$valid_severities = array( 'critical', 'high', 'medium', 'low' );
				if ( ! in_array( $rule_config['severity'], $valid_severities, true ) ) {
					$this->validation_errors[] = "Rule {$rule_id}.severity must be one of: " . implode( ', ', $valid_severities );
				}
			}
		}
	}

	/**
	 * Validate thresholds configuration.
	 *
	 * @param array $thresholds Thresholds configuration.
	 * @return void
	 */
	private function validate_thresholds( array $thresholds ): void {
		if ( isset( $thresholds['complexity'] ) ) {
			if ( ! is_int( $thresholds['complexity'] ) || $thresholds['complexity'] < 1 ) {
				$this->validation_errors[] = 'thresholds.complexity must be an integer >= 1';
			}
		}

		if ( isset( $thresholds['functionLength'] ) ) {
			if ( ! is_int( $thresholds['functionLength'] ) || $thresholds['functionLength'] < 1 ) {
				$this->validation_errors[] = 'thresholds.functionLength must be an integer >= 1';
			}
		}

		if ( isset( $thresholds['minContrastRatio'] ) ) {
			if ( ! is_numeric( $thresholds['minContrastRatio'] ) || $thresholds['minContrastRatio'] < 1 ) {
				$this->validation_errors[] = 'thresholds.minContrastRatio must be a number >= 1';
			}
		}
	}

	/**
	 * Validate exclusions configuration.
	 *
	 * @param array $exclusions Exclusions configuration.
	 * @return void
	 */
	private function validate_exclusions( array $exclusions ): void {
		if ( isset( $exclusions['files'] ) ) {
			if ( ! is_array( $exclusions['files'] ) ) {
				$this->validation_errors[] = 'exclusions.files must be an array';
			} else {
				foreach ( $exclusions['files'] as $file ) {
					if ( ! is_string( $file ) ) {
						$this->validation_errors[] = 'exclusions.files items must be strings';
						break;
					}
				}
			}
		}

		if ( isset( $exclusions['directories'] ) ) {
			if ( ! is_array( $exclusions['directories'] ) ) {
				$this->validation_errors[] = 'exclusions.directories must be an array';
			} else {
				foreach ( $exclusions['directories'] as $dir ) {
					if ( ! is_string( $dir ) ) {
						$this->validation_errors[] = 'exclusions.directories items must be strings';
						break;
					}
				}
			}
		}

		if ( isset( $exclusions['rules'] ) ) {
			if ( ! is_array( $exclusions['rules'] ) ) {
				$this->validation_errors[] = 'exclusions.rules must be an array';
			} else {
				foreach ( $exclusions['rules'] as $rule ) {
					if ( ! is_string( $rule ) ) {
						$this->validation_errors[] = 'exclusions.rules items must be strings';
						break;
					}
				}
			}
		}
	}

	/**
	 * Validate autofix configuration.
	 *
	 * @param array $autofix Autofix configuration.
	 * @return void
	 */
	private function validate_autofix( array $autofix ): void {
		if ( isset( $autofix['enabled'] ) && ! is_bool( $autofix['enabled'] ) ) {
			$this->validation_errors[] = 'autofix.enabled must be a boolean';
		}

		if ( isset( $autofix['confidence'] ) ) {
			$valid_confidence = array( 'safe', 'moderate', 'risky' );
			if ( ! in_array( $autofix['confidence'], $valid_confidence, true ) ) {
				$this->validation_errors[] = 'autofix.confidence must be one of: ' . implode( ', ', $valid_confidence );
			}
		}

		if ( isset( $autofix['backup'] ) && ! is_bool( $autofix['backup'] ) ) {
			$this->validation_errors[] = 'autofix.backup must be a boolean';
		}
	}

	/**
	 * Validate output configuration.
	 *
	 * @param array $output Output configuration.
	 * @return void
	 */
	private function validate_output( array $output ): void {
		if ( isset( $output['format'] ) ) {
			$valid_formats = array( 'json', 'html', 'markdown', 'console' );
			if ( ! in_array( $output['format'], $valid_formats, true ) ) {
				$this->validation_errors[] = 'output.format must be one of: ' . implode( ', ', $valid_formats );
			}
		}

		if ( isset( $output['destination'] ) && ! is_string( $output['destination'] ) ) {
			$this->validation_errors[] = 'output.destination must be a string';
		}

		if ( isset( $output['verbose'] ) && ! is_bool( $output['verbose'] ) ) {
			$this->validation_errors[] = 'output.verbose must be a boolean';
		}
	}

	/**
	 * Get validation errors.
	 *
	 * @return array Validation errors.
	 */
	public function get_validation_errors(): array {
		return $this->validation_errors;
	}

	/**
	 * Merge configuration with defaults.
	 *
	 * @param array $data User configuration.
	 * @return array Merged configuration.
	 */
	private function merge_with_defaults( array $data ): array {
		$defaults = array(
			'version'    => '1.0',
			'categories' => array(
				'performance'   => array( 'enabled' => true ),
				'seo'           => array( 'enabled' => true ),
				'accessibility' => array( 'enabled' => true ),
				'security'      => array( 'enabled' => true ),
				'scalability'   => array( 'enabled' => true ),
			),
			'thresholds' => array(
				'complexity'       => 10,
				'functionLength'   => 50,
				'minContrastRatio' => 4.5,
			),
			'exclusions' => array(
				'files'       => array( 'vendor/*', 'node_modules/*' ),
				'directories' => array( 'tests/' ),
				'rules'       => array(),
			),
			'autofix'    => array(
				'enabled'    => false,
				'confidence' => 'safe',
				'backup'     => true,
			),
			'output'     => array(
				'format'      => 'console',
				'destination' => './audit-report.html',
				'verbose'     => false,
			),
		);

		return ArrayUtils::merge_recursive_distinct( $defaults, $data );
	}

}
