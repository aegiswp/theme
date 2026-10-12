<?php
/**
 * Tests for Severity enum.
 *
 * @package WPAudit\Tests
 */

namespace WPAudit\Tests\Unit\Enums;

use PHPUnit\Framework\TestCase;
use WPAudit\Enums\Severity;

/**
 * Severity enum test case.
 */
class SeverityTest extends TestCase {
	/**
	 * Test get_all returns all severity levels.
	 */
	public function test_get_all() {
		$all = Severity::get_all();

		$this->assertCount( 4, $all );
		$this->assertContains( Severity::CRITICAL, $all );
		$this->assertContains( Severity::HIGH, $all );
		$this->assertContains( Severity::MEDIUM, $all );
		$this->assertContains( Severity::LOW, $all );
	}

	/**
	 * Test is_valid validates severity levels.
	 */
	public function test_is_valid() {
		$this->assertTrue( Severity::is_valid( Severity::CRITICAL ) );
		$this->assertTrue( Severity::is_valid( Severity::HIGH ) );
		$this->assertTrue( Severity::is_valid( Severity::MEDIUM ) );
		$this->assertTrue( Severity::is_valid( Severity::LOW ) );
		$this->assertFalse( Severity::is_valid( 'invalid' ) );
	}

	/**
	 * Test get_weight returns correct weights.
	 */
	public function test_get_weight() {
		$this->assertEquals( 10, Severity::get_weight( Severity::CRITICAL ) );
		$this->assertEquals( 5, Severity::get_weight( Severity::HIGH ) );
		$this->assertEquals( 2, Severity::get_weight( Severity::MEDIUM ) );
		$this->assertEquals( 0.5, Severity::get_weight( Severity::LOW ) );
		$this->assertEquals( 0, Severity::get_weight( 'invalid' ) );
	}
}
