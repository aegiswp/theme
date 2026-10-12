<?php
/**
 * Tests for ThemeMetadata model.
 *
 * @package WPAudit
 */

namespace WPAudit\Tests\Unit\Models;

use PHPUnit\Framework\TestCase;
use WPAudit\Models\ThemeMetadata;

/**
 * Test ThemeMetadata model functionality.
 */
class ThemeMetadataTest extends TestCase {
	/**
	 * Test constructor with required parameters.
	 *
	 * @return void
	 */
	public function test_constructor(): void {
		$meta = new ThemeMetadata( 'aegis', '2.0.0', '/path/to/theme' );

		$this->assertSame( 'aegis', $meta->name );
		$this->assertSame( '2.0.0', $meta->version );
		$this->assertSame( '/path/to/theme', $meta->root_path );
		$this->assertFalse( $meta->is_block_theme );
		$this->assertEmpty( $meta->metadata );
	}

	/**
	 * Test constructor with all parameters.
	 *
	 * @return void
	 */
	public function test_constructor_with_all_params(): void {
		$extra = array( 'author' => 'Test' );
		$meta  = new ThemeMetadata( 'aegis', '2.0.0', '/path', true, $extra );

		$this->assertTrue( $meta->is_block_theme );
		$this->assertSame( array( 'author' => 'Test' ), $meta->metadata );
	}

	/**
	 * Test to_array serialization.
	 *
	 * @return void
	 */
	public function test_to_array(): void {
		$meta  = new ThemeMetadata( 'aegis', '2.0.0', '/path/to/theme', true );
		$array = $meta->to_array();

		$this->assertSame( 'aegis', $array['name'] );
		$this->assertSame( '2.0.0', $array['version'] );
		$this->assertSame( '/path/to/theme', $array['rootPath'] );
		$this->assertTrue( $array['isBlockTheme'] );
		$this->assertArrayHasKey( 'metadata', $array );
	}

	/**
	 * Test from_directory with a temporary directory.
	 *
	 * @return void
	 */
	public function test_from_directory_basic(): void {
		$tmp_dir = sys_get_temp_dir() . '/wpaudit_test_theme_' . uniqid();
		mkdir( $tmp_dir, 0755, true );

		try {
			$meta = ThemeMetadata::from_directory( $tmp_dir );

			$this->assertSame( basename( $tmp_dir ), $meta->name );
			$this->assertSame( '1.0.0', $meta->version );
			$this->assertFalse( $meta->is_block_theme );
		} finally {
			rmdir( $tmp_dir );
		}
	}

	/**
	 * Test from_directory detects block theme via theme.json.
	 *
	 * @return void
	 */
	public function test_from_directory_block_theme(): void {
		$tmp_dir = sys_get_temp_dir() . '/wpaudit_test_block_' . uniqid();
		mkdir( $tmp_dir, 0755, true );
		file_put_contents( $tmp_dir . '/theme.json', '{}' );

		try {
			$meta = ThemeMetadata::from_directory( $tmp_dir );

			$this->assertTrue( $meta->is_block_theme );
		} finally {
			unlink( $tmp_dir . '/theme.json' );
			rmdir( $tmp_dir );
		}
	}

	/**
	 * Test from_directory reads style.css metadata.
	 *
	 * @return void
	 */
	public function test_from_directory_reads_style_css(): void {
		$tmp_dir = sys_get_temp_dir() . '/wpaudit_test_style_' . uniqid();
		mkdir( $tmp_dir, 0755, true );
		file_put_contents(
			$tmp_dir . '/style.css',
			"/*\nTheme Name: My Custom Theme\nVersion: 3.5.1\n*/"
		);

		try {
			$meta = ThemeMetadata::from_directory( $tmp_dir );

			$this->assertSame( 'My Custom Theme', $meta->name );
			$this->assertSame( '3.5.1', $meta->version );
		} finally {
			unlink( $tmp_dir . '/style.css' );
			rmdir( $tmp_dir );
		}
	}
}
