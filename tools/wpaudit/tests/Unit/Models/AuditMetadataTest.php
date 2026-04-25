<?php
/**
 * Tests for AuditMetadata model.
 *
 * @package WPAudit
 */

namespace WPAudit\Tests\Unit\Models;

use PHPUnit\Framework\TestCase;
use WPAudit\Models\AuditMetadata;
use WPAudit\Models\ThemeMetadata;

/**
 * Test AuditMetadata model functionality.
 */
class AuditMetadataTest extends TestCase {
	/**
	 * Test constructor stores all properties.
	 *
	 * @return void
	 */
	public function test_constructor(): void {
		$meta = new AuditMetadata(
			'2025-01-15T10:30:00Z',
			'aegis',
			'2.0.0',
			'1.0.0',
			12.5,
			42
		);

		$this->assertSame( '2025-01-15T10:30:00Z', $meta->timestamp );
		$this->assertSame( 'aegis', $meta->theme_name );
		$this->assertSame( '2.0.0', $meta->theme_version );
		$this->assertSame( '1.0.0', $meta->audit_version );
		$this->assertSame( 12.5, $meta->duration );
		$this->assertSame( 42, $meta->files_scanned );
	}

	/**
	 * Test to_array serialization.
	 *
	 * @return void
	 */
	public function test_to_array(): void {
		$meta  = new AuditMetadata(
			'2025-01-15T10:30:00Z',
			'aegis',
			'2.0.0',
			'1.0.0',
			12.5,
			42
		);
		$array = $meta->to_array();

		$this->assertSame( '2025-01-15T10:30:00Z', $array['timestamp'] );
		$this->assertSame( 'aegis', $array['themeName'] );
		$this->assertSame( '2.0.0', $array['themeVersion'] );
		$this->assertSame( '1.0.0', $array['auditVersion'] );
		$this->assertSame( 12.5, $array['duration'] );
		$this->assertSame( 42, $array['filesScanned'] );
	}

	/**
	 * Test create factory method.
	 *
	 * @return void
	 */
	public function test_create_from_theme_metadata(): void {
		$theme = new ThemeMetadata( 'aegis', '2.0.0', '/path/to/theme', true );
		$meta  = AuditMetadata::create( $theme, 5.75, 100 );

		$this->assertSame( 'aegis', $meta->theme_name );
		$this->assertSame( '2.0.0', $meta->theme_version );
		$this->assertSame( '1.0.0', $meta->audit_version );
		$this->assertSame( 5.75, $meta->duration );
		$this->assertSame( 100, $meta->files_scanned );
		$this->assertMatchesRegularExpression( '/^\d{4}-\d{2}-\d{2}T\d{2}:\d{2}:\d{2}Z$/', $meta->timestamp );
	}

	/**
	 * Test zero duration and files.
	 *
	 * @return void
	 */
	public function test_zero_values(): void {
		$meta = new AuditMetadata(
			'2025-01-01T00:00:00Z',
			'test',
			'1.0.0',
			'1.0.0',
			0.0,
			0
		);

		$this->assertSame( 0.0, $meta->duration );
		$this->assertSame( 0, $meta->files_scanned );
	}
}
