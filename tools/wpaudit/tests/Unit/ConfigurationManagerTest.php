<?php
/**
 * Unit tests for ConfigurationManager.
 *
 * @package WPAudit
 */

namespace WPAudit\Tests\Unit;

use PHPUnit\Framework\TestCase;
use WPAudit\ConfigurationManager;
use WPAudit\Models\Configuration;
use RuntimeException;
use InvalidArgumentException;

/**
 * Test ConfigurationManager functionality.
 */
class ConfigurationManagerTest extends TestCase {
	/**
	 * Configuration manager instance.
	 *
	 * @var ConfigurationManager
	 */
	private $manager;

	/**
	 * Temporary directory for test files.
	 *
	 * @var string
	 */
	private $temp_dir;

	/**
	 * Set up test environment.
	 */
	protected function setUp(): void {
		parent::setUp();
		$this->manager  = new ConfigurationManager();
		$this->temp_dir = sys_get_temp_dir() . '/wpaudit_test_' . uniqid();
		mkdir( $this->temp_dir, 0755, true );
	}

	/**
	 * Clean up test environment.
	 */
	protected function tearDown(): void {
		parent::tearDown();
		if ( is_dir( $this->temp_dir ) ) {
			$this->remove_directory( $this->temp_dir );
		}
	}

	/**
	 * Test loading default configuration.
	 */
	public function test_load_defaults(): void {
		$config = $this->manager->load_defaults();

		$this->assertInstanceOf( Configuration::class, $config );
		$this->assertEquals( '1.0', $config->get( 'version' ) );
		$this->assertTrue( $config->get( 'categories.performance.enabled' ) );
		$this->assertEquals( 10, $config->get( 'thresholds.complexity' ) );
		$this->assertFalse( $config->get( 'autofix.enabled' ) );
	}

	/**
	 * Test loading configuration from valid JSON file.
	 */
	public function test_load_from_file_valid(): void {
		$config_data = array(
			'version'    => '1.0',
			'categories' => array(
				'performance' => array( 'enabled' => false ),
			),
			'thresholds' => array(
				'complexity' => 15,
			),
		);

		$file_path = $this->temp_dir . '/.wpauditrc.json';
		file_put_contents( $file_path, json_encode( $config_data ) );

		$config = $this->manager->load_from_file( $file_path );

		$this->assertInstanceOf( Configuration::class, $config );
		$this->assertFalse( $config->get( 'categories.performance.enabled' ) );
		$this->assertEquals( 15, $config->get( 'thresholds.complexity' ) );
	}

	/**
	 * Test loading configuration from non-existent file.
	 */
	public function test_load_from_file_not_found(): void {
		$this->expectException( RuntimeException::class );
		$this->expectExceptionMessage( 'Configuration file not found' );

		$this->manager->load_from_file( $this->temp_dir . '/nonexistent.json' );
	}

	/**
	 * Test loading configuration from invalid JSON file.
	 */
	public function test_load_from_file_invalid_json(): void {
		$file_path = $this->temp_dir . '/.wpauditrc.json';
		file_put_contents( $file_path, '{ invalid json }' );

		$this->expectException( RuntimeException::class );
		$this->expectExceptionMessage( 'Failed to parse configuration file' );

		$this->manager->load_from_file( $file_path );
	}

	/**
	 * Test loading configuration with invalid schema.
	 */
	public function test_load_from_file_invalid_schema(): void {
		$config_data = array(
			'thresholds' => array(
				'complexity' => 'invalid', // Should be integer.
			),
		);

		$file_path = $this->temp_dir . '/.wpauditrc.json';
		file_put_contents( $file_path, json_encode( $config_data ) );

		$this->expectException( InvalidArgumentException::class );
		$this->expectExceptionMessage( 'Configuration validation failed' );

		$this->manager->load_from_file( $file_path );
	}

	/**
	 * Test loading configuration from project directory.
	 */
	public function test_load_from_project_exists(): void {
		$config_data = array(
			'categories' => array(
				'seo' => array( 'enabled' => false ),
			),
		);

		$file_path = $this->temp_dir . '/.wpauditrc.json';
		file_put_contents( $file_path, json_encode( $config_data ) );

		$config = $this->manager->load_from_project( $this->temp_dir );

		$this->assertInstanceOf( Configuration::class, $config );
		$this->assertFalse( $config->get( 'categories.seo.enabled' ) );
	}

	/**
	 * Test loading configuration from project without config file.
	 */
	public function test_load_from_project_not_exists(): void {
		$config = $this->manager->load_from_project( $this->temp_dir );

		$this->assertNull( $config );
	}

	/**
	 * Test merging configurations with proper precedence.
	 */
	public function test_merge_precedence(): void {
		$config1 = Configuration::from_array(
			array(
				'thresholds' => array(
					'complexity'     => 10,
					'functionLength' => 50,
				),
				'autofix'    => array(
					'enabled' => false,
				),
			),
			false
		);

		$config2 = Configuration::from_array(
			array(
				'thresholds' => array(
					'complexity' => 15,
				),
				'autofix'    => array(
					'enabled' => true,
				),
			),
			false
		);

		$merged = $this->manager->merge( $config1, $config2 );

		// config2 should override config1.
		$this->assertEquals( 15, $merged->get( 'thresholds.complexity' ) );
		$this->assertEquals( 50, $merged->get( 'thresholds.functionLength' ) ); // From config1.
		$this->assertTrue( $merged->get( 'autofix.enabled' ) );
	}

	/**
	 * Test merging with empty configurations.
	 */
	public function test_merge_empty(): void {
		$merged = $this->manager->merge();

		$this->assertInstanceOf( Configuration::class, $merged );
		$this->assertEquals( '1.0', $merged->get( 'version' ) );
	}

	/**
	 * Test saving configuration to file.
	 */
	public function test_save_configuration(): void {
		$config = Configuration::from_array(
			array(
				'version'    => '1.0',
				'categories' => array(
					'performance' => array( 'enabled' => false ),
				),
			),
			false
		);

		$file_path = $this->temp_dir . '/saved-config.json';
		$result    = $this->manager->save( $config, $file_path );

		$this->assertTrue( $result );
		$this->assertFileExists( $file_path );

		$content = file_get_contents( $file_path );
		$data    = json_decode( $content, true );

		$this->assertIsArray( $data );
		$this->assertEquals( '1.0', $data['version'] );
		$this->assertFalse( $data['categories']['performance']['enabled'] );
	}

	/**
	 * Test saving configuration creates directory if needed.
	 */
	public function test_save_creates_directory(): void {
		$config    = Configuration::from_array( array( 'version' => '1.0' ), false );
		$file_path = $this->temp_dir . '/subdir/config.json';

		$result = $this->manager->save( $config, $file_path );

		$this->assertTrue( $result );
		$this->assertFileExists( $file_path );
		$this->assertDirectoryExists( dirname( $file_path ) );
	}

	/**
	 * Test loading with full precedence chain.
	 */
	public function test_load_with_precedence(): void {
		// Create project config.
		$project_config = array(
			'thresholds' => array(
				'complexity' => 20,
			),
			'autofix'    => array(
				'enabled' => true,
			),
		);

		$file_path = $this->temp_dir . '/.wpauditrc.json';
		file_put_contents( $file_path, json_encode( $project_config ) );

		// CLI options.
		$cli_options = array(
			'thresholds' => array(
				'complexity' => 25,
			),
		);

		$config = $this->manager->load( $this->temp_dir, $cli_options );

		// CLI should override project, project should override defaults.
		$this->assertEquals( 25, $config->get( 'thresholds.complexity' ) ); // From CLI.
		$this->assertTrue( $config->get( 'autofix.enabled' ) ); // From project.
		$this->assertEquals( 50, $config->get( 'thresholds.functionLength' ) ); // From defaults.
	}

	/**
	 * Test loading without project path.
	 */
	public function test_load_without_project(): void {
		$cli_options = array(
			'autofix' => array(
				'enabled' => true,
			),
		);

		$config = $this->manager->load( null, $cli_options );

		$this->assertTrue( $config->get( 'autofix.enabled' ) );
		$this->assertEquals( 10, $config->get( 'thresholds.complexity' ) ); // From defaults.
	}

	/**
	 * Recursively remove directory.
	 *
	 * @param string $dir Directory path.
	 */
	private function remove_directory( string $dir ): void {
		if ( ! is_dir( $dir ) ) {
			return;
		}

		$files = array_diff( scandir( $dir ), array( '.', '..' ) );
		foreach ( $files as $file ) {
			$path = $dir . '/' . $file;
			is_dir( $path ) ? $this->remove_directory( $path ) : unlink( $path );
		}
		rmdir( $dir );
	}
}
