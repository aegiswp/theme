<?php
/**
 * Tests for FileRegistry model.
 *
 * @package WPAudit
 */

namespace WPAudit\Tests\Unit\Models;

use PHPUnit\Framework\TestCase;
use WPAudit\Models\FileRegistry;
use WPAudit\Models\ThemeFile;
use WPAudit\Enums\FileType;

/**
 * Test FileRegistry model functionality.
 */
class FileRegistryTest extends TestCase {
	/**
	 * Test empty registry.
	 *
	 * @return void
	 */
	public function test_empty_registry(): void {
		$registry = new FileRegistry();

		$this->assertSame( 0, $registry->count() );
		$this->assertEmpty( $registry->get_all() );
	}

	/**
	 * Test adding files.
	 *
	 * @return void
	 */
	public function test_add_files(): void {
		$registry = new FileRegistry();
		$file     = new ThemeFile( 'style.css', '/path/style.css', 'body {}', FileType::CSS );

		$registry->add( $file );

		$this->assertSame( 1, $registry->count() );
		$this->assertCount( 1, $registry->get_all() );
	}

	/**
	 * Test constructor with initial files.
	 *
	 * @return void
	 */
	public function test_constructor_with_files(): void {
		$files    = array(
			new ThemeFile( 'style.css', '/path/style.css', 'body {}', FileType::CSS ),
			new ThemeFile( 'index.php', '/path/index.php', '<?php', FileType::PHP ),
		);
		$registry = new FileRegistry( $files );

		$this->assertSame( 2, $registry->count() );
	}

	/**
	 * Test get_by_type.
	 *
	 * @return void
	 */
	public function test_get_by_type(): void {
		$registry = new FileRegistry();
		$registry->add( new ThemeFile( 'style.css', '/path/style.css', 'body {}', FileType::CSS ) );
		$registry->add( new ThemeFile( 'index.php', '/path/index.php', '<?php', FileType::PHP ) );
		$registry->add( new ThemeFile( 'app.js', '/path/app.js', 'var x;', FileType::JS ) );
		$registry->add( new ThemeFile( 'extra.css', '/path/extra.css', 'a {}', FileType::CSS ) );

		$css_files = $registry->get_by_type( FileType::CSS );

		$this->assertCount( 2, $css_files );
	}

	/**
	 * Test get_by_type with no matches.
	 *
	 * @return void
	 */
	public function test_get_by_type_no_matches(): void {
		$registry = new FileRegistry();
		$registry->add( new ThemeFile( 'index.php', '/path/index.php', '<?php', FileType::PHP ) );

		$json_files = $registry->get_by_type( FileType::JSON );

		$this->assertEmpty( $json_files );
	}

	/**
	 * Test get_by_path.
	 *
	 * @return void
	 */
	public function test_get_by_path(): void {
		$registry = new FileRegistry();
		$registry->add( new ThemeFile( 'style.css', '/path/style.css', 'body {}', FileType::CSS ) );
		$registry->add( new ThemeFile( 'index.php', '/path/index.php', '<?php', FileType::PHP ) );

		$file = $registry->get_by_path( 'index.php' );

		$this->assertNotNull( $file );
		$this->assertSame( 'index.php', $file->path );
		$this->assertSame( FileType::PHP, $file->type );
	}

	/**
	 * Test get_by_path returns null for missing file.
	 *
	 * @return void
	 */
	public function test_get_by_path_not_found(): void {
		$registry = new FileRegistry();
		$registry->add( new ThemeFile( 'style.css', '/path/style.css', 'body {}', FileType::CSS ) );

		$this->assertNull( $registry->get_by_path( 'nonexistent.php' ) );
	}
}
