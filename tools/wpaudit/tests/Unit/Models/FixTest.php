<?php
/**
 * Unit tests for Fix model.
 *
 * @package WPAudit
 */

namespace WPAudit\Tests\Unit\Models;

use PHPUnit\Framework\TestCase;
use WPAudit\Models\Fix;
use WPAudit\Enums\FixConfidence;

/**
 * Test Fix model functionality.
 */
class FixTest extends TestCase {
	/**
	 * Test creating a Fix instance.
	 */
	public function test_create_fix(): void {
		$apply = function () {
			return true;
		};

		$fix = new Fix(
			'replace',
			FixConfidence::SAFE,
			'Add lazy loading attribute',
			$apply
		);

		$this->assertEquals( 'replace', $fix->type );
		$this->assertEquals( FixConfidence::SAFE, $fix->confidence );
		$this->assertEquals( 'Add lazy loading attribute', $fix->description );
		$this->assertEquals( $apply, $fix->apply );
		$this->assertNull( $fix->validate );
	}

	/**
	 * Test creating a Fix with validation callback.
	 */
	public function test_create_fix_with_validation(): void {
		$apply = function () {
			return true;
		};

		$validate = function () {
			return true;
		};

		$fix = new Fix(
			'insert',
			FixConfidence::MODERATE,
			'Add ARIA label',
			$apply,
			$validate
		);

		$this->assertEquals( $validate, $fix->validate );
	}

	/**
	 * Test meets_threshold with SAFE fix.
	 */
	public function test_meets_threshold_safe(): void {
		$fix = new Fix(
			'replace',
			FixConfidence::SAFE,
			'Test fix',
			function () {
				return true;
			}
		);

		$this->assertTrue( $fix->meets_threshold( FixConfidence::SAFE ) );
		$this->assertTrue( $fix->meets_threshold( FixConfidence::MODERATE ) );
		$this->assertTrue( $fix->meets_threshold( FixConfidence::RISKY ) );
	}

	/**
	 * Test meets_threshold with MODERATE fix.
	 */
	public function test_meets_threshold_moderate(): void {
		$fix = new Fix(
			'replace',
			FixConfidence::MODERATE,
			'Test fix',
			function () {
				return true;
			}
		);

		$this->assertFalse( $fix->meets_threshold( FixConfidence::SAFE ) );
		$this->assertTrue( $fix->meets_threshold( FixConfidence::MODERATE ) );
		$this->assertTrue( $fix->meets_threshold( FixConfidence::RISKY ) );
	}

	/**
	 * Test meets_threshold with RISKY fix.
	 */
	public function test_meets_threshold_risky(): void {
		$fix = new Fix(
			'refactor',
			FixConfidence::RISKY,
			'Test fix',
			function () {
				return true;
			}
		);

		$this->assertFalse( $fix->meets_threshold( FixConfidence::SAFE ) );
		$this->assertFalse( $fix->meets_threshold( FixConfidence::MODERATE ) );
		$this->assertTrue( $fix->meets_threshold( FixConfidence::RISKY ) );
	}

	/**
	 * Test to_array conversion.
	 */
	public function test_to_array(): void {
		$fix = new Fix(
			'delete',
			FixConfidence::SAFE,
			'Remove deprecated code',
			function () {
				return true;
			}
		);

		$array = $fix->to_array();

		$this->assertIsArray( $array );
		$this->assertEquals( 'delete', $array['type'] );
		$this->assertEquals( FixConfidence::SAFE, $array['confidence'] );
		$this->assertEquals( 'Remove deprecated code', $array['description'] );
		$this->assertArrayNotHasKey( 'apply', $array );
		$this->assertArrayNotHasKey( 'validate', $array );
	}

	/**
	 * Test apply callback execution.
	 */
	public function test_apply_callback_execution(): void {
		$executed = false;

		$fix = new Fix(
			'replace',
			FixConfidence::SAFE,
			'Test fix',
			function () use ( &$executed ) {
				$executed = true;
				return 'fixed content';
			}
		);

		$result = call_user_func( $fix->apply );

		$this->assertTrue( $executed );
		$this->assertEquals( 'fixed content', $result );
	}

	/**
	 * Test validate callback execution.
	 */
	public function test_validate_callback_execution(): void {
		$validated = false;

		$fix = new Fix(
			'replace',
			FixConfidence::MODERATE,
			'Test fix',
			function () {
				return true;
			},
			function () use ( &$validated ) {
				$validated = true;
				return true;
			}
		);

		$result = call_user_func( $fix->validate );

		$this->assertTrue( $validated );
		$this->assertTrue( $result );
	}

	/**
	 * Test different fix types.
	 */
	public function test_fix_types(): void {
		$types = array( 'replace', 'insert', 'delete', 'refactor' );

		foreach ( $types as $type ) {
			$fix = new Fix(
				$type,
				FixConfidence::SAFE,
				"Test {$type} fix",
				function () {
					return true;
				}
			);

			$this->assertEquals( $type, $fix->type );
		}
	}
}
