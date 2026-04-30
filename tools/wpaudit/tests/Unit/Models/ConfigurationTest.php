<?php
/**
 * Tests for Configuration model.
 *
 * Comprehensive Configuration tests are in tests/Unit/ConfigurationTest.php.
 * This file tests only the default-constructor path (no args) which the main
 * test file does not exercise.
 *
 * @package WPAudit\Tests
 */

namespace WPAudit\Tests\Unit\Models;

use PHPUnit\Framework\TestCase;
use WPAudit\Models\Configuration;

/**
 * Configuration model supplemental test case.
 */
class ConfigurationTest extends TestCase {
	/**
	 * Test default constructor (no arguments) creates valid config.
	 */
	public function test_default_constructor(): void {
		$config = new Configuration();

		$this->assertEquals( '1.0', $config->get( 'version' ) );
		$this->assertTrue( $config->get( 'categories.performance.enabled' ) );
		$this->assertEquals( 'safe', $config->get( 'autofix.confidence' ) );
	}
}
