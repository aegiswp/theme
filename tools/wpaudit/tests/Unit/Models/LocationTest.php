<?php
/**
 * Tests for Location model.
 *
 * @package WPAudit
 */

namespace WPAudit\Tests\Unit\Models;

use PHPUnit\Framework\TestCase;
use WPAudit\Models\Location;

/**
 * Test Location model functionality.
 */
class LocationTest extends TestCase {
	/**
	 * Test constructor with required parameters.
	 *
	 * @return void
	 */
	public function test_constructor_with_required_params(): void {
		$location = new Location( 'test.php', 10 );

		$this->assertSame( 'test.php', $location->file );
		$this->assertSame( 10, $location->line );
		$this->assertNull( $location->column );
	}

	/**
	 * Test constructor with column.
	 *
	 * @return void
	 */
	public function test_constructor_with_column(): void {
		$location = new Location( 'test.php', 10, 5 );

		$this->assertSame( 'test.php', $location->file );
		$this->assertSame( 10, $location->line );
		$this->assertSame( 5, $location->column );
	}

	/**
	 * Test default line number.
	 *
	 * @return void
	 */
	public function test_default_line_number(): void {
		$location = new Location( 'test.php' );

		$this->assertSame( 1, $location->line );
	}

	/**
	 * Test to_array without column.
	 *
	 * @return void
	 */
	public function test_to_array_without_column(): void {
		$location = new Location( 'style.css', 42 );
		$array    = $location->to_array();

		$this->assertSame( 'style.css', $array['file'] );
		$this->assertSame( 42, $array['line'] );
		$this->assertArrayNotHasKey( 'column', $array );
	}

	/**
	 * Test to_array with column.
	 *
	 * @return void
	 */
	public function test_to_array_with_column(): void {
		$location = new Location( 'style.css', 42, 8 );
		$array    = $location->to_array();

		$this->assertSame( 'style.css', $array['file'] );
		$this->assertSame( 42, $array['line'] );
		$this->assertSame( 8, $array['column'] );
	}

	/**
	 * Test from_array with all fields.
	 *
	 * @return void
	 */
	public function test_from_array_with_all_fields(): void {
		$data     = array(
			'file'   => 'index.php',
			'line'   => 15,
			'column' => 3,
		);
		$location = Location::from_array( $data );

		$this->assertSame( 'index.php', $location->file );
		$this->assertSame( 15, $location->line );
		$this->assertSame( 3, $location->column );
	}

	/**
	 * Test from_array with missing fields uses defaults.
	 *
	 * @return void
	 */
	public function test_from_array_with_defaults(): void {
		$location = Location::from_array( array() );

		$this->assertSame( '', $location->file );
		$this->assertSame( 1, $location->line );
		$this->assertNull( $location->column );
	}

	/**
	 * Test roundtrip to_array/from_array.
	 *
	 * @return void
	 */
	public function test_roundtrip(): void {
		$original    = new Location( 'functions.php', 100, 20 );
		$restored    = Location::from_array( $original->to_array() );

		$this->assertSame( $original->file, $restored->file );
		$this->assertSame( $original->line, $restored->line );
		$this->assertSame( $original->column, $restored->column );
	}
}
