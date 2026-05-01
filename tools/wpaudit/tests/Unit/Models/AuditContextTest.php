<?php
/**
 * Unit tests for AuditContext model.
 *
 * @package WPAudit
 */

namespace WPAudit\Tests\Unit\Models;

use PHPUnit\Framework\TestCase;
use WPAudit\Models\AuditContext;
use WPAudit\Models\Configuration;
use WPAudit\Models\ThemeMetadata;
use WPAudit\Models\FileRegistry;

/**
 * Test AuditContext model functionality.
 */
class AuditContextTest extends TestCase {
	/**
	 * Test creating an AuditContext instance.
	 */
	public function test_create_audit_context(): void {
		$config = new Configuration( array(), false );
		$theme  = new ThemeMetadata( 'Test Theme', '1.0.0', '/path/to/theme' );
		$files  = new FileRegistry();

		$context = new AuditContext( $config, $theme, $files );

		$this->assertEquals( $config, $context->config );
		$this->assertEquals( $theme, $context->theme );
		$this->assertEquals( $files, $context->files );
		$this->assertEmpty( $context->shared_data );
	}

	/**
	 * Test creating with shared data.
	 */
	public function test_create_with_shared_data(): void {
		$config      = new Configuration( array(), false );
		$theme       = new ThemeMetadata( 'Test Theme', '1.0.0', '/path/to/theme' );
		$files       = new FileRegistry();
		$shared_data = array( 'key' => 'value' );

		$context = new AuditContext( $config, $theme, $files, $shared_data );

		$this->assertEquals( $shared_data, $context->shared_data );
	}

	/**
	 * Test get_theme_root method.
	 */
	public function test_get_theme_root(): void {
		$config  = new Configuration( array(), false );
		$theme   = new ThemeMetadata( 'Test Theme', '1.0.0', '/path/to/theme' );
		$files   = new FileRegistry();
		$context = new AuditContext( $config, $theme, $files );

		$this->assertEquals( '/path/to/theme', $context->get_theme_root() );
	}

	/**
	 * Test is_file_excluded with matching pattern.
	 */
	public function test_is_file_excluded_matching(): void {
		$config = new Configuration(
			array(
				'exclusions' => array(
					'files' => array( 'vendor/*', 'node_modules/*' ),
				),
			),
			false
		);

		$theme   = new ThemeMetadata( 'Test Theme', '1.0.0', '/path/to/theme' );
		$files   = new FileRegistry();
		$context = new AuditContext( $config, $theme, $files );

		$this->assertTrue( $context->is_file_excluded( 'vendor/autoload.php' ) );
		$this->assertTrue( $context->is_file_excluded( 'node_modules/package/index.js' ) );
	}

	/**
	 * Test is_file_excluded with non-matching pattern.
	 */
	public function test_is_file_excluded_non_matching(): void {
		$config = new Configuration(
			array(
				'exclusions' => array(
					'files' => array( 'vendor/*' ),
				),
			),
			false
		);

		$theme   = new ThemeMetadata( 'Test Theme', '1.0.0', '/path/to/theme' );
		$files   = new FileRegistry();
		$context = new AuditContext( $config, $theme, $files );

		$this->assertFalse( $context->is_file_excluded( 'index.php' ) );
		$this->assertFalse( $context->is_file_excluded( 'inc/helper.php' ) );
	}

	/**
	 * Test get_rule_config for performance rule.
	 */
	public function test_get_rule_config_performance(): void {
		$config = new Configuration(
			array(
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
			),
			false
		);

		$theme   = new ThemeMetadata( 'Test Theme', '1.0.0', '/path/to/theme' );
		$files   = new FileRegistry();
		$context = new AuditContext( $config, $theme, $files );

		$rule_config = $context->get_rule_config( 'perf-001' );

		$this->assertIsArray( $rule_config );
		$this->assertTrue( $rule_config['enabled'] );
		$this->assertEquals( 'high', $rule_config['severity'] );
	}

	/**
	 * Test get_rule_config for different categories.
	 */
	public function test_get_rule_config_different_categories(): void {
		$config = new Configuration(
			array(
				'categories' => array(
					'seo'           => array(
						'rules' => array(
							'seo-001' => array( 'enabled' => true ),
						),
					),
					'accessibility' => array(
						'rules' => array(
							'a11y-001' => array( 'enabled' => false ),
						),
					),
					'security'      => array(
						'rules' => array(
							'sec-001' => array( 'enabled' => true ),
						),
					),
					'scalability'   => array(
						'rules' => array(
							'scale-001' => array( 'enabled' => true ),
						),
					),
				),
			),
			false
		);

		$theme   = new ThemeMetadata( 'Test Theme', '1.0.0', '/path/to/theme' );
		$files   = new FileRegistry();
		$context = new AuditContext( $config, $theme, $files );

		$this->assertIsArray( $context->get_rule_config( 'seo-001' ) );
		$this->assertIsArray( $context->get_rule_config( 'a11y-001' ) );
		$this->assertIsArray( $context->get_rule_config( 'sec-001' ) );
		$this->assertIsArray( $context->get_rule_config( 'scale-001' ) );
	}

	/**
	 * Test get_rule_config returns null for non-existent rule.
	 */
	public function test_get_rule_config_non_existent(): void {
		$config  = new Configuration( array(), false );
		$theme   = new ThemeMetadata( 'Test Theme', '1.0.0', '/path/to/theme' );
		$files   = new FileRegistry();
		$context = new AuditContext( $config, $theme, $files );

		$this->assertNull( $context->get_rule_config( 'invalid-001' ) );
		$this->assertNull( $context->get_rule_config( 'perf-999' ) );
	}

	/**
	 * Test set_shared and get_shared methods.
	 */
	public function test_shared_data_methods(): void {
		$config  = new Configuration( array(), false );
		$theme   = new ThemeMetadata( 'Test Theme', '1.0.0', '/path/to/theme' );
		$files   = new FileRegistry();
		$context = new AuditContext( $config, $theme, $files );

		$context->set_shared( 'test_key', 'test_value' );

		$this->assertEquals( 'test_value', $context->get_shared( 'test_key' ) );
	}

	/**
	 * Test get_shared returns default for non-existent key.
	 */
	public function test_get_shared_default(): void {
		$config  = new Configuration( array(), false );
		$theme   = new ThemeMetadata( 'Test Theme', '1.0.0', '/path/to/theme' );
		$files   = new FileRegistry();
		$context = new AuditContext( $config, $theme, $files );

		$this->assertNull( $context->get_shared( 'nonexistent' ) );
		$this->assertEquals( 'default', $context->get_shared( 'nonexistent', 'default' ) );
	}

	/**
	 * Test shared data can store complex values.
	 */
	public function test_shared_data_complex_values(): void {
		$config  = new Configuration( array(), false );
		$theme   = new ThemeMetadata( 'Test Theme', '1.0.0', '/path/to/theme' );
		$files   = new FileRegistry();
		$context = new AuditContext( $config, $theme, $files );

		$complex_data = array(
			'array'  => array( 1, 2, 3 ),
			'object' => (object) array( 'key' => 'value' ),
			'nested' => array(
				'deep' => array( 'value' => 'test' ),
			),
		);

		$context->set_shared( 'complex', $complex_data );

		$this->assertEquals( $complex_data, $context->get_shared( 'complex' ) );
	}
}
