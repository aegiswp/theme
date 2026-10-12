<?php
/**
 * Tests for FileType enum.
 *
 * @package WPAudit\Tests
 */

namespace WPAudit\Tests\Unit\Enums;

use PHPUnit\Framework\TestCase;
use WPAudit\Enums\FileType;

/**
 * FileType enum test case.
 */
class FileTypeTest extends TestCase {
	/**
	 * Test get_all returns all file types.
	 */
	public function test_get_all() {
		$all = FileType::get_all();

		$this->assertCount( 6, $all );
		$this->assertContains( FileType::PHP, $all );
		$this->assertContains( FileType::CSS, $all );
		$this->assertContains( FileType::JS, $all );
		$this->assertContains( FileType::HTML, $all );
		$this->assertContains( FileType::JSON, $all );
		$this->assertContains( FileType::UNKNOWN, $all );
	}

	/**
	 * Test from_filename detects PHP files.
	 */
	public function test_detects_php_files() {
		$this->assertEquals( FileType::PHP, FileType::from_filename( 'index.php' ) );
		$this->assertEquals( FileType::PHP, FileType::from_filename( 'functions.PHP' ) );
		$this->assertEquals( FileType::PHP, FileType::from_filename( '/path/to/file.php' ) );
	}

	/**
	 * Test from_filename detects CSS files.
	 */
	public function test_detects_css_files() {
		$this->assertEquals( FileType::CSS, FileType::from_filename( 'style.css' ) );
		$this->assertEquals( FileType::CSS, FileType::from_filename( 'theme.CSS' ) );
	}

	/**
	 * Test from_filename detects JavaScript files.
	 */
	public function test_detects_js_files() {
		$this->assertEquals( FileType::JS, FileType::from_filename( 'script.js' ) );
		$this->assertEquals( FileType::JS, FileType::from_filename( 'app.JS' ) );
	}

	/**
	 * Test from_filename detects HTML files.
	 */
	public function test_detects_html_files() {
		$this->assertEquals( FileType::HTML, FileType::from_filename( 'template.html' ) );
		$this->assertEquals( FileType::HTML, FileType::from_filename( 'page.htm' ) );
		$this->assertEquals( FileType::HTML, FileType::from_filename( 'index.HTML' ) );
	}

	/**
	 * Test from_filename detects JSON files.
	 */
	public function test_detects_json_files() {
		$this->assertEquals( FileType::JSON, FileType::from_filename( 'theme.json' ) );
		$this->assertEquals( FileType::JSON, FileType::from_filename( 'config.JSON' ) );
	}

	/**
	 * Test from_filename returns unknown for unrecognized extensions.
	 */
	public function test_returns_unknown_for_unrecognized() {
		$this->assertEquals( FileType::UNKNOWN, FileType::from_filename( 'readme.txt' ) );
		$this->assertEquals( FileType::UNKNOWN, FileType::from_filename( 'image.png' ) );
		$this->assertEquals( FileType::UNKNOWN, FileType::from_filename( 'noextension' ) );
	}
}
