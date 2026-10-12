<?php
/**
 * Tests for FixConfidence enum.
 *
 * @package WPAudit\Tests
 */

namespace WPAudit\Tests\Unit\Enums;

use PHPUnit\Framework\TestCase;
use WPAudit\Enums\FixConfidence;

/**
 * FixConfidence enum test case.
 */
class FixConfidenceTest extends TestCase {
	/**
	 * Test get_all returns all confidence levels.
	 */
	public function test_get_all() {
		$all = FixConfidence::get_all();

		$this->assertCount( 3, $all );
		$this->assertContains( FixConfidence::SAFE, $all );
		$this->assertContains( FixConfidence::MODERATE, $all );
		$this->assertContains( FixConfidence::RISKY, $all );
	}

	/**
	 * Test is_valid validates confidence levels.
	 */
	public function test_is_valid() {
		$this->assertTrue( FixConfidence::is_valid( FixConfidence::SAFE ) );
		$this->assertTrue( FixConfidence::is_valid( FixConfidence::MODERATE ) );
		$this->assertTrue( FixConfidence::is_valid( FixConfidence::RISKY ) );
		$this->assertFalse( FixConfidence::is_valid( 'invalid' ) );
	}
}
