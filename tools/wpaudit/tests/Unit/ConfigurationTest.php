<?php
/**
 * Unit tests for Configuration model.
 *
 * @package WPAudit
 */

namespace WPAudit\Tests\Unit;

use PHPUnit\Framework\TestCase;
use WPAudit\Models\Configuration;
use InvalidArgumentException;

/**
 * Test Configuration model functionality.
 */
class ConfigurationTest extends TestCase {
	/**
	 * Test creating configuration with defaults.
	 */
	public function test_create_with_defaults(): void {
		$config = new Configuration( array(), false );

		$this->assertEquals( '1.0', $config->get( 'version' ) );
		$this->assertTrue( $config->get( 'categories.performance.enabled' ) );
		$this->assertEquals( 10, $config->get( 'thresholds.complexity' ) );
	}

	/**
	 * Test getting configuration values with dot notation.
	 */
	public function test_get_with_dot_notation(): void {
		$config = new Configuration(
			array(
				'categories' => array(
					'performance' => array(
						'enabled' => false,
					),
				),
			),
			false
		);

		$this->assertFalse( $config->get( 'categories.performance.enabled' ) );
	}

	/**
	 * Test getting non-existent key returns default.
	 */
	public function test_get_nonexistent_returns_default(): void {
		$config = new Configuration( array(), false );

		$this->assertNull( $config->get( 'nonexistent.key' ) );
		$this->assertEquals( 'default', $config->get( 'nonexistent.key', 'default' ) );
	}

	/**
	 * Test setting configuration values.
	 */
	public function test_set_configuration_value(): void {
		$config = new Configuration( array(), false );

		$config->set( 'thresholds.complexity', 20 );

		$this->assertEquals( 20, $config->get( 'thresholds.complexity' ) );
	}

	/**
	 * Test setting nested configuration values.
	 */
	public function test_set_nested_value(): void {
		$config = new Configuration( array(), false );

		$config->set( 'new.nested.key', 'value' );

		$this->assertEquals( 'value', $config->get( 'new.nested.key' ) );
	}

	/**
	 * Test converting to array.
	 */
	public function test_to_array(): void {
		$data = array(
			'version'    => '1.0',
			'categories' => array(
				'performance' => array( 'enabled' => false ),
			),
		);

		$config = new Configuration( $data, false );
		$array  = $config->to_array();

		$this->assertIsArray( $array );
		$this->assertEquals( '1.0', $array['version'] );
		$this->assertFalse( $array['categories']['performance']['enabled'] );
	}

	/**
	 * Test creating from array.
	 */
	public function test_from_array(): void {
		$data = array(
			'thresholds' => array(
				'complexity' => 15,
			),
		);

		$config = Configuration::from_array( $data, false );

		$this->assertInstanceOf( Configuration::class, $config );
		$this->assertEquals( 15, $config->get( 'thresholds.complexity' ) );
	}

	/**
	 * Test validation with valid configuration.
	 */
	public function test_validation_valid_config(): void {
		$data = array(
			'version'    => '1.0',
			'categories' => array(
				'performance' => array( 'enabled' => true ),
			),
			'thresholds' => array(
				'complexity' => 10,
			),
		);

		$config = new Configuration( $data, true );

		$this->assertEmpty( $config->get_validation_errors() );
	}

	/**
	 * Test validation with invalid version type.
	 */
	public function test_validation_invalid_version(): void {
		$this->expectException( InvalidArgumentException::class );
		$this->expectExceptionMessage( 'version must be a string' );

		new Configuration(
			array(
				'version' => 123,
			),
			true
		);
	}

	/**
	 * Test validation with invalid category.
	 */
	public function test_validation_invalid_category(): void {
		$this->expectException( InvalidArgumentException::class );
		$this->expectExceptionMessage( 'Invalid category: invalid' );

		new Configuration(
			array(
				'categories' => array(
					'invalid' => array( 'enabled' => true ),
				),
			),
			true
		);
	}

	/**
	 * Test validation with invalid threshold.
	 */
	public function test_validation_invalid_threshold(): void {
		$this->expectException( InvalidArgumentException::class );
		$this->expectExceptionMessage( 'thresholds.complexity must be an integer >= 1' );

		new Configuration(
			array(
				'thresholds' => array(
					'complexity' => 'invalid',
				),
			),
			true
		);
	}

	/**
	 * Test validation with negative threshold.
	 */
	public function test_validation_negative_threshold(): void {
		$this->expectException( InvalidArgumentException::class );
		$this->expectExceptionMessage( 'thresholds.complexity must be an integer >= 1' );

		new Configuration(
			array(
				'thresholds' => array(
					'complexity' => -5,
				),
			),
			true
		);
	}

	/**
	 * Test validation with invalid autofix confidence.
	 */
	public function test_validation_invalid_autofix_confidence(): void {
		$this->expectException( InvalidArgumentException::class );
		$this->expectExceptionMessage( 'autofix.confidence must be one of: safe, moderate, risky' );

		new Configuration(
			array(
				'autofix' => array(
					'confidence' => 'invalid',
				),
			),
			true
		);
	}

	/**
	 * Test validation with invalid output format.
	 */
	public function test_validation_invalid_output_format(): void {
		$this->expectException( InvalidArgumentException::class );
		$this->expectExceptionMessage( 'output.format must be one of: json, html, markdown, console' );

		new Configuration(
			array(
				'output' => array(
					'format' => 'invalid',
				),
			),
			true
		);
	}

	/**
	 * Test validation with invalid rule ID format.
	 */
	public function test_validation_invalid_rule_id(): void {
		$this->expectException( InvalidArgumentException::class );
		$this->expectExceptionMessage( 'Invalid rule ID format: invalid-rule' );

		new Configuration(
			array(
				'categories' => array(
					'performance' => array(
						'rules' => array(
							'invalid-rule' => array( 'enabled' => true ),
						),
					),
				),
			),
			true
		);
	}

	/**
	 * Test validation with valid rule configuration.
	 */
	public function test_validation_valid_rule_config(): void {
		$data = array(
			'categories' => array(
				'performance' => array(
					'rules' => array(
						'perf-001' => array(
							'enabled'  => true,
							'severity' => 'high',
						),
					),
				),
			),
		);

		$config = new Configuration( $data, true );

		$this->assertEmpty( $config->get_validation_errors() );
	}

	/**
	 * Test validation with invalid severity.
	 */
	public function test_validation_invalid_severity(): void {
		$this->expectException( InvalidArgumentException::class );
		$this->expectExceptionMessage( 'Rule perf-001.severity must be one of: critical, high, medium, low' );

		new Configuration(
			array(
				'categories' => array(
					'performance' => array(
						'rules' => array(
							'perf-001' => array(
								'severity' => 'invalid',
							),
						),
					),
				),
			),
			true
		);
	}

	/**
	 * Test merging with defaults preserves user values.
	 */
	public function test_merge_preserves_user_values(): void {
		$config = new Configuration(
			array(
				'thresholds' => array(
					'complexity' => 20,
				),
			),
			false
		);

		$this->assertEquals( 20, $config->get( 'thresholds.complexity' ) );
		$this->assertEquals( 50, $config->get( 'thresholds.functionLength' ) ); // Default.
	}
}
