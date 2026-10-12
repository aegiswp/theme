<?php
/**
 * Unit tests for Finding model.
 *
 * @package WPAudit
 */

namespace WPAudit\Tests\Unit\Models;

use PHPUnit\Framework\TestCase;
use WPAudit\Models\Finding;
use WPAudit\Models\Location;
use WPAudit\Models\Fix;
use WPAudit\Enums\Severity;
use WPAudit\Enums\FixConfidence;

/**
 * Test Finding model functionality.
 */
class FindingTest extends TestCase {
	/**
	 * Test creating a Finding instance.
	 */
	public function test_create_finding(): void {
		$location = new Location( 'test.php', 10, 5 );
		$finding  = new Finding(
			'perf-001-test-10',
			'performance',
			'perf-001',
			Severity::HIGH,
			'Missing lazy loading',
			$location,
			'Add loading="lazy" attribute'
		);

		$this->assertEquals( 'perf-001-test-10', $finding->id );
		$this->assertEquals( 'performance', $finding->category );
		$this->assertEquals( 'perf-001', $finding->rule );
		$this->assertEquals( Severity::HIGH, $finding->severity );
		$this->assertEquals( 'Missing lazy loading', $finding->message );
		$this->assertEquals( $location, $finding->location );
		$this->assertEquals( 'Add loading="lazy" attribute', $finding->recommendation );
	}

	/**
	 * Test has_fix returns false when no fix provided.
	 */
	public function test_has_fix_without_fix(): void {
		$location = new Location( 'test.php', 10 );
		$finding  = new Finding(
			'test-001',
			'performance',
			'perf-001',
			Severity::HIGH,
			'Test issue',
			$location,
			'Fix it'
		);

		$this->assertFalse( $finding->has_fix() );
	}

	/**
	 * Test has_fix returns true when fix provided.
	 */
	public function test_has_fix_with_fix(): void {
		$location = new Location( 'test.php', 10 );
		$fix      = new Fix(
			'replace',
			FixConfidence::SAFE,
			'Add attribute',
			function () {
				return true;
			}
		);

		$finding = new Finding(
			'test-001',
			'performance',
			'perf-001',
			Severity::HIGH,
			'Test issue',
			$location,
			'Fix it',
			$fix
		);

		$this->assertTrue( $finding->has_fix() );
		$this->assertEquals( $fix, $finding->suggested_fix );
	}

	/**
	 * Test to_array conversion.
	 */
	public function test_to_array(): void {
		$location = new Location( 'test.php', 10, 5 );
		$finding  = new Finding(
			'test-001',
			'performance',
			'perf-001',
			Severity::HIGH,
			'Test issue',
			$location,
			'Fix it',
			null,
			array( 'extra' => 'data' )
		);

		$array = $finding->to_array();

		$this->assertIsArray( $array );
		$this->assertEquals( 'test-001', $array['id'] );
		$this->assertEquals( 'performance', $array['category'] );
		$this->assertEquals( 'perf-001', $array['rule'] );
		$this->assertEquals( Severity::HIGH, $array['severity'] );
		$this->assertEquals( 'Test issue', $array['message'] );
		$this->assertIsArray( $array['location'] );
		$this->assertEquals( 'test.php', $array['location']['file'] );
		$this->assertEquals( 10, $array['location']['line'] );
		$this->assertEquals( 'Fix it', $array['recommendation'] );
		$this->assertEquals( array( 'extra' => 'data' ), $array['metadata'] );
		$this->assertArrayNotHasKey( 'suggestedFix', $array );
	}

	/**
	 * Test to_array includes fix when present.
	 */
	public function test_to_array_with_fix(): void {
		$location = new Location( 'test.php', 10 );
		$fix      = new Fix(
			'replace',
			FixConfidence::SAFE,
			'Add attribute',
			function () {
				return true;
			}
		);

		$finding = new Finding(
			'test-001',
			'performance',
			'perf-001',
			Severity::HIGH,
			'Test issue',
			$location,
			'Fix it',
			$fix
		);

		$array = $finding->to_array();

		$this->assertArrayHasKey( 'suggestedFix', $array );
		$this->assertIsArray( $array['suggestedFix'] );
		$this->assertEquals( 'replace', $array['suggestedFix']['type'] );
		$this->assertEquals( FixConfidence::SAFE, $array['suggestedFix']['confidence'] );
	}

	/**
	 * Test from_array creation.
	 */
	public function test_from_array(): void {
		$data = array(
			'id'             => 'test-001',
			'category'       => 'security',
			'rule'           => 'sec-001',
			'severity'       => Severity::CRITICAL,
			'message'        => 'Security issue',
			'location'       => array(
				'file'   => 'test.php',
				'line'   => 20,
				'column' => 10,
			),
			'recommendation' => 'Fix security issue',
			'metadata'       => array( 'cve' => 'CVE-2024-0001' ),
		);

		$finding = Finding::from_array( $data );

		$this->assertEquals( 'test-001', $finding->id );
		$this->assertEquals( 'security', $finding->category );
		$this->assertEquals( 'sec-001', $finding->rule );
		$this->assertEquals( Severity::CRITICAL, $finding->severity );
		$this->assertEquals( 'Security issue', $finding->message );
		$this->assertEquals( 'test.php', $finding->location->file );
		$this->assertEquals( 20, $finding->location->line );
		$this->assertEquals( 'Fix security issue', $finding->recommendation );
		$this->assertEquals( array( 'cve' => 'CVE-2024-0001' ), $finding->metadata );
	}

	/**
	 * Test from_array with missing fields uses defaults.
	 */
	public function test_from_array_with_defaults(): void {
		$data = array();

		$finding = Finding::from_array( $data );

		$this->assertEquals( '', $finding->id );
		$this->assertEquals( '', $finding->category );
		$this->assertEquals( '', $finding->rule );
		$this->assertEquals( Severity::LOW, $finding->severity );
		$this->assertEquals( '', $finding->message );
		$this->assertEquals( '', $finding->recommendation );
		$this->assertEmpty( $finding->metadata );
	}

	/**
	 * Test metadata storage.
	 */
	public function test_metadata_storage(): void {
		$location = new Location( 'test.php', 10 );
		$metadata = array(
			'snippet'   => '<img src="test.jpg">',
			'reference' => 'https://example.com/docs',
		);

		$finding = new Finding(
			'test-001',
			'seo',
			'seo-007',
			Severity::MEDIUM,
			'Missing alt attribute',
			$location,
			'Add alt attribute',
			null,
			$metadata
		);

		$this->assertEquals( $metadata, $finding->metadata );
		$this->assertEquals( '<img src="test.jpg">', $finding->metadata['snippet'] );
	}
}
