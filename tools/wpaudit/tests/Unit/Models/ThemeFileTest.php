<?php
/**
 * Unit tests for ThemeFile model.
 *
 * @package WPAudit
 */

namespace WPAudit\Tests\Unit\Models;

use PHPUnit\Framework\TestCase;
use WPAudit\Models\ThemeFile;
use WPAudit\Enums\FileType;

/**
 * Test ThemeFile model functionality.
 */
class ThemeFileTest extends TestCase {
	/**
	 * Test creating a ThemeFile instance.
	 */
	public function test_create_theme_file(): void {
		$file = new ThemeFile(
			'index.php',
			'/path/to/theme/index.php',
			'<?php // content'
		);

		$this->assertEquals( 'index.php', $file->path );
		$this->assertEquals( '/path/to/theme/index.php', $file->absolute_path );
		$this->assertEquals( '<?php // content', $file->content );
		$this->assertEquals( FileType::PHP, $file->type );
	}

	/**
	 * Test file type auto-detection.
	 */
	public function test_file_type_detection(): void {
		$php_file = new ThemeFile( 'test.php', '/path/test.php', '' );
		$this->assertEquals( FileType::PHP, $php_file->type );

		$css_file = new ThemeFile( 'style.css', '/path/style.css', '' );
		$this->assertEquals( FileType::CSS, $css_file->type );

		$js_file = new ThemeFile( 'script.js', '/path/script.js', '' );
		$this->assertEquals( FileType::JS, $js_file->type );

		$html_file = new ThemeFile( 'template.html', '/path/template.html', '' );
		$this->assertEquals( FileType::HTML, $html_file->type );

		$json_file = new ThemeFile( 'theme.json', '/path/theme.json', '' );
		$this->assertEquals( FileType::JSON, $json_file->type );
	}

	/**
	 * Test get_extension method.
	 */
	public function test_get_extension(): void {
		$file = new ThemeFile( 'index.php', '/path/index.php', '' );
		$this->assertEquals( 'php', $file->get_extension() );

		$file = new ThemeFile( 'style.CSS', '/path/style.CSS', '' );
		$this->assertEquals( 'css', $file->get_extension() );
	}

	/**
	 * Test is_template method for root templates.
	 */
	public function test_is_template_root_files(): void {
		$templates = array( 'index.php', 'single.php', 'page.php', 'archive.php', 'search.php', '404.php', 'front-page.php', 'home.php' );

		foreach ( $templates as $template ) {
			$file = new ThemeFile( $template, "/path/{$template}", '' );
			$this->assertTrue( $file->is_template(), "{$template} should be recognized as a template" );
		}
	}

	/**
	 * Test is_template method for templates directory.
	 */
	public function test_is_template_templates_directory(): void {
		$file = new ThemeFile( 'templates/single.html', '/path/templates/single.html', '' );
		$this->assertTrue( $file->is_template() );

		$file = new ThemeFile( 'templates/page-home.html', '/path/templates/page-home.html', '' );
		$this->assertTrue( $file->is_template() );
	}

	/**
	 * Test is_template method for parts directory.
	 */
	public function test_is_template_parts_directory(): void {
		$file = new ThemeFile( 'parts/header.html', '/path/parts/header.html', '' );
		$this->assertTrue( $file->is_template() );
	}

	/**
	 * Test is_template method for patterns.
	 */
	public function test_is_template_patterns(): void {
		$file = new ThemeFile( 'patterns/hero.php', '/path/patterns/hero.php', '' );
		$this->assertTrue( $file->is_template() );
	}

	/**
	 * Test is_template returns false for non-templates.
	 */
	public function test_is_template_non_templates(): void {
		$file = new ThemeFile( 'functions.php', '/path/functions.php', '' );
		$this->assertFalse( $file->is_template() );

		$file = new ThemeFile( 'inc/helper.php', '/path/inc/helper.php', '' );
		$this->assertFalse( $file->is_template() );

		$file = new ThemeFile( 'style.css', '/path/style.css', '' );
		$this->assertFalse( $file->is_template() );
	}

	/**
	 * Test is_partial method.
	 */
	public function test_is_partial(): void {
		$file = new ThemeFile( 'parts/header.html', '/path/parts/header.html', '' );
		$this->assertTrue( $file->is_partial() );

		$file = new ThemeFile( 'template-parts/content.php', '/path/template-parts/content.php', '' );
		$this->assertTrue( $file->is_partial() );

		$file = new ThemeFile( 'partials/sidebar.php', '/path/partials/sidebar.php', '' );
		$this->assertTrue( $file->is_partial() );

		$file = new ThemeFile( 'index.php', '/path/index.php', '' );
		$this->assertFalse( $file->is_partial() );
	}

	/**
	 * Test get_related_files for PHP files.
	 */
	public function test_get_related_files_php(): void {
		$file    = new ThemeFile( 'templates/single.php', '/path/templates/single.php', '' );
		$related = $file->get_related_files();

		$this->assertContains( 'templates/single.css', $related );
		$this->assertContains( 'templates/single.js', $related );
	}

	/**
	 * Test get_related_files for non-PHP files.
	 */
	public function test_get_related_files_non_php(): void {
		$file    = new ThemeFile( 'style.css', '/path/style.css', '' );
		$related = $file->get_related_files();

		$this->assertEmpty( $related );
	}

	/**
	 * Test AST caching.
	 */
	public function test_ast_caching(): void {
		$file = new ThemeFile( 'test.php', '/path/test.php', '' );

		$this->assertFalse( $file->has_ast() );

		$ast = array( 'type' => 'Program', 'body' => array() );
		$file->set_ast( $ast );

		$this->assertTrue( $file->has_ast() );
		$this->assertEquals( $ast, $file->ast );
	}

	/**
	 * Test metadata storage.
	 */
	public function test_metadata_storage(): void {
		$metadata = array(
			'size'     => 1024,
			'modified' => '2024-01-01',
		);

		$file = new ThemeFile( 'test.php', '/path/test.php', '', '', $metadata );

		$this->assertEquals( $metadata, $file->metadata );
		$this->assertEquals( 1024, $file->metadata['size'] );
	}
}
