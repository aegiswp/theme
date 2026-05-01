<?php
/**
 * Unit tests for PerformanceAnalyzer.
 *
 * @package WPAudit
 */

namespace WPAudit\Tests\Unit\Analyzers;

use PHPUnit\Framework\TestCase;
use WPAudit\Analyzers\PerformanceAnalyzer;
use WPAudit\Models\ThemeFile;
use WPAudit\Models\AuditContext;
use WPAudit\Models\Configuration;
use WPAudit\Models\ThemeMetadata;
use WPAudit\Models\FileRegistry;
use WPAudit\Enums\FileType;
use WPAudit\Enums\Severity;

/**
 * Test PerformanceAnalyzer functionality.
 */
class PerformanceAnalyzerTest extends TestCase {
	/**
	 * Performance analyzer instance.
	 *
	 * @var PerformanceAnalyzer
	 */
	private $analyzer;

	/**
	 * Audit context for testing. 

	 *
	 * @var AuditContext
	 */
	private $context;

	/**
	 * Set up test environment.
	 *
	 * @return void
	 */
	protected function setUp(): void {
		parent::setUp();

		$this->analyzer = new PerformanceAnalyzer();

		// Create test context.
		$config   = new Configuration( array(), false );
		$theme    = new ThemeMetadata( 'test-theme', '1.0.0', '/path/to/theme', true );
		$files    = new FileRegistry();
		$this->context = new AuditContext( $config, $theme, $files );
	}

	/**
	 * Test analyzer name.
	 *
	 * @return void
	 */
	public function test_get_name(): void {
		$this->assertEquals( 'performance', $this->analyzer->get_name() );
	}

	/**
	 * Test analyzer can handle supported file types.
	 *
	 * @return void
	 */
	public function test_can_analyze_supported_types(): void {
		$php_file  = new ThemeFile( 'test.php', '/path/test.php', '<?php', FileType::PHP );
		$html_file = new ThemeFile( 'test.html', '/path/test.html', '<html></html>', FileType::HTML );
		$css_file  = new ThemeFile( 'test.css', '/path/test.css', 'body {}', FileType::CSS );
		$js_file   = new ThemeFile( 'test.js', '/path/test.js', 'console.log();', FileType::JS );

		$this->assertTrue( $this->analyzer->can_analyze( $php_file ) );
		$this->assertTrue( $this->analyzer->can_analyze( $html_file ) );
		$this->assertTrue( $this->analyzer->can_analyze( $css_file ) );
		$this->assertTrue( $this->analyzer->can_analyze( $js_file ) );
	}

	/**
	 * Test analyzer cannot handle unsupported file types.
	 *
	 * @return void
	 */
	public function test_cannot_analyze_unsupported_types(): void {
		$json_file = new ThemeFile( 'test.json', '/path/test.json', '{}', FileType::JSON );

		$this->assertFalse( $this->analyzer->can_analyze( $json_file ) );
	}

	/**
	 * Test get rules returns all performance rules.
	 *
	 * @return void
	 */
	public function test_get_rules(): void {
		$rules = $this->analyzer->get_rules();

		$this->assertIsArray( $rules );
		$this->assertCount( 6, $rules );

		$rule_ids = array_column( $rules, 'id' );
		$this->assertContains( 'perf-001', $rule_ids );
		$this->assertContains( 'perf-002', $rule_ids );
		$this->assertContains( 'perf-003', $rule_ids );
		$this->assertContains( 'perf-004', $rule_ids );
		$this->assertContains( 'perf-005', $rule_ids );
		$this->assertContains( 'perf-006', $rule_ids );
	}

	/**
	 * Test detection of wp_enqueue_script without defer/async.
	 *
	 * @return void
	 */
	public function test_detect_unoptimized_enqueue_script(): void {
		$content = <<<'PHP'
<?php
function my_theme_scripts() {
	wp_enqueue_script( 'my-script', get_template_directory_uri() . '/js/script.js', array(), '1.0.0' );
}
PHP;

		$file     = new ThemeFile( 'functions.php', '/path/functions.php', $content, FileType::PHP );
		$findings = $this->analyzer->analyze( $file, $this->context );

		$this->assertNotEmpty( $findings );
		$this->assertEquals( 'perf-002', $findings[0]->rule );
		$this->assertEquals( Severity::MEDIUM, $findings[0]->severity );
		$this->assertStringContainsString( 'defer/async', $findings[0]->message );
	}

	/**
	 * Test no detection when script has defer strategy.
	 *
	 * @return void
	 */
	public function test_no_detection_with_defer_strategy(): void {
		$content = <<<'PHP'
<?php
function my_theme_scripts() {
	wp_enqueue_script( 'my-script', get_template_directory_uri() . '/js/script.js', array(), '1.0.0', array( 'strategy' => 'defer' ) );
}
PHP;

		$file     = new ThemeFile( 'functions.php', '/path/functions.php', $content, FileType::PHP );
		$findings = $this->analyzer->analyze( $file, $this->context );

		// Should not have perf-002 findings for this script.
		$perf_002_findings = array_filter(
			$findings,
			function ( $finding ) {
				return $finding->rule === 'perf-002' && strpos( $finding->metadata['line_content'], 'my-script' ) !== false;
			}
		);
		$this->assertEmpty( $perf_002_findings );
	}

	/**
	 * Test detection of database queries without caching.
	 *
	 * @return void
	 */
	public function test_detect_uncached_query(): void {
		$content = <<<'PHP'
<?php
function get_posts_data() {
	$query = new WP_Query( array( 'post_type' => 'post' ) );
	return $query->posts;
}
PHP;

		$file     = new ThemeFile( 'functions.php', '/path/functions.php', $content, FileType::PHP );
		$findings = $this->analyzer->analyze( $file, $this->context );

		$this->assertNotEmpty( $findings );
		$perf_004_findings = array_filter(
			$findings,
			function ( $finding ) {
				return $finding->rule === 'perf-004';
			}
		);
		$this->assertNotEmpty( $perf_004_findings );
		$finding = reset( $perf_004_findings );
		$this->assertEquals( Severity::HIGH, $finding->severity );
		$this->assertStringContainsString( 'caching', $finding->message );
	}

	/**
	 * Test no detection when query has caching.
	 *
	 * @return void
	 */
	public function test_no_detection_with_cached_query(): void {
		$content = <<<'PHP'
<?php
function get_posts_data() {
	$cache_key = 'my_posts';
	$posts = wp_cache_get( $cache_key );
	if ( false === $posts ) {
		$query = new WP_Query( array( 'post_type' => 'post' ) );
		$posts = $query->posts;
		wp_cache_set( $cache_key, $posts );
	}
	return $posts;
}
PHP;

		$file     = new ThemeFile( 'functions.php', '/path/functions.php', $content, FileType::PHP );
		$findings = $this->analyzer->analyze( $file, $this->context );

		// Should not have perf-004 findings.
		$perf_004_findings = array_filter(
			$findings,
			function ( $finding ) {
				return $finding->rule === 'perf-004';
			}
		);
		$this->assertEmpty( $perf_004_findings );
	}

	/**
	 * Test detection of missing resource hints.
	 *
	 * @return void
	 */
	public function test_detect_missing_resource_hints(): void {
		$content = <<<'PHP'
<?php
function my_theme_setup() {
	add_theme_support( 'title-tag' );
}
PHP;

		$file     = new ThemeFile( 'functions.php', '/path/functions.php', $content, FileType::PHP );
		$findings = $this->analyzer->analyze( $file, $this->context );

		$this->assertNotEmpty( $findings );
		$perf_006_findings = array_filter(
			$findings,
			function ( $finding ) {
				return $finding->rule === 'perf-006';
			}
		);
		$this->assertNotEmpty( $perf_006_findings );
		$finding = reset( $perf_006_findings );
		$this->assertEquals( Severity::LOW, $finding->severity );
		$this->assertStringContainsString( 'resource hints', $finding->message );
	}

	/**
	 * Test detection of images without lazy loading.
	 *
	 * @return void
	 */
	public function test_detect_images_without_lazy_loading(): void {
		$content = <<<'HTML'
<!DOCTYPE html>
<html>
<head><title>Test</title></head>
<body>
	<p>Some content</p>
	<p>More content</p>
	<p>Even more content</p>
	<p>Lots of content</p>
	<p>So much content</p>
	<p>Content everywhere</p>
	<p>More and more</p>
	<p>Keep going</p>
	<p>Almost there</p>
	<p>One more</p>
	<p>Finally</p>
	<img src="image.jpg" alt="Test image">
</body>
</html>
HTML;

		$file     = new ThemeFile( 'template.html', '/path/template.html', $content, FileType::HTML );
		$findings = $this->analyzer->analyze( $file, $this->context );

		$this->assertNotEmpty( $findings );
		$perf_001_findings = array_filter(
			$findings,
			function ( $finding ) {
				return $finding->rule === 'perf-001';
			}
		);
		$this->assertNotEmpty( $perf_001_findings );
		$finding = reset( $perf_001_findings );
		$this->assertEquals( Severity::HIGH, $finding->severity );
		$this->assertStringContainsString( 'lazy loading', $finding->message );
	}

	/**
	 * Test no detection for images with lazy loading.
	 *
	 * @return void
	 */
	public function test_no_detection_with_lazy_loading(): void {
		$content = <<<'HTML'
<!DOCTYPE html>
<html>
<body>
	<img src="image.jpg" alt="Test image" loading="lazy">
</body>
</html>
HTML;

		$file     = new ThemeFile( 'template.html', '/path/template.html', $content, FileType::HTML );
		$findings = $this->analyzer->analyze( $file, $this->context );

		$perf_001_findings = array_filter(
			$findings,
			function ( $finding ) {
				return $finding->rule === 'perf-001';
			}
		);
		$this->assertEmpty( $perf_001_findings );
	}

	/**
	 * Test detection of render-blocking scripts.
	 *
	 * @return void
	 */
	public function test_detect_render_blocking_scripts(): void {
		$content = <<<'HTML'
<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
	<script src="script.js"></script>
</head>
<body>
	<p>Content</p>
</body>
</html>
HTML;

		$file     = new ThemeFile( 'template.html', '/path/template.html', $content, FileType::HTML );
		$findings = $this->analyzer->analyze( $file, $this->context );

		$this->assertNotEmpty( $findings );
		$perf_002_findings = array_filter(
			$findings,
			function ( $finding ) {
				return $finding->rule === 'perf-002' && strpos( $finding->message, 'Render-blocking' ) !== false;
			}
		);
		$this->assertNotEmpty( $perf_002_findings );
		$finding = reset( $perf_002_findings );
		$this->assertEquals( Severity::MEDIUM, $finding->severity );
	}

	/**
	 * Test no detection for scripts with defer.
	 *
	 * @return void
	 */
	public function test_no_detection_with_defer_attribute(): void {
		$content = <<<'HTML'
<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
	<script src="script.js" defer></script>
</head>
<body>
	<p>Content</p>
</body>
</html>
HTML;

		$file     = new ThemeFile( 'template.html', '/path/template.html', $content, FileType::HTML );
		$findings = $this->analyzer->analyze( $file, $this->context );

		$perf_002_findings = array_filter(
			$findings,
			function ( $finding ) {
				return $finding->rule === 'perf-002' && strpos( $finding->message, 'Render-blocking' ) !== false;
			}
		);
		$this->assertEmpty( $perf_002_findings );
	}

	/**
	 * Test detection of large CSS files.
	 *
	 * @return void
	 */
	public function test_detect_large_css_file(): void {
		// Create a CSS file larger than 100KB.
		$content = str_repeat( 'body { color: red; }', 10000 );

		$file     = new ThemeFile( 'style.css', '/path/style.css', $content, FileType::CSS );
		$findings = $this->analyzer->analyze( $file, $this->context );

		$this->assertNotEmpty( $findings );
		$perf_005_findings = array_filter(
			$findings,
			function ( $finding ) {
				return $finding->rule === 'perf-005';
			}
		);
		$this->assertNotEmpty( $perf_005_findings );
		$finding = reset( $perf_005_findings );
		$this->assertEquals( Severity::MEDIUM, $finding->severity );
		$this->assertStringContainsString( 'Large asset', $finding->message );
	}

	/**
	 * Test detection of large JS files.
	 *
	 * @return void
	 */
	public function test_detect_large_js_file(): void {
		// Create a JS file larger than 100KB.
		$content = str_repeat( 'console.log("test");', 10000 );

		$file     = new ThemeFile( 'script.js', '/path/script.js', $content, FileType::JS );
		$findings = $this->analyzer->analyze( $file, $this->context );

		$this->assertNotEmpty( $findings );
		$perf_005_findings = array_filter(
			$findings,
			function ( $finding ) {
				return $finding->rule === 'perf-005';
			}
		);
		$this->assertNotEmpty( $perf_005_findings );
		$finding = reset( $perf_005_findings );
		$this->assertEquals( Severity::MEDIUM, $finding->severity );
	}

	/**
	 * Test no detection for small files.
	 *
	 * @return void
	 */
	public function test_no_detection_for_small_files(): void {
		$content = 'body { color: red; }';

		$file     = new ThemeFile( 'style.css', '/path/style.css', $content, FileType::CSS );
		$findings = $this->analyzer->analyze( $file, $this->context );

		$perf_005_findings = array_filter(
			$findings,
			function ( $finding ) {
				return $finding->rule === 'perf-005';
			}
		);
		$this->assertEmpty( $perf_005_findings );
	}

	/**
	 * Test empty file handling.
	 *
	 * @return void
	 */
	public function test_empty_file_handling(): void {
		$file     = new ThemeFile( 'empty.php', '/path/empty.php', '', FileType::PHP );
		$findings = $this->analyzer->analyze( $file, $this->context );

		// Should not crash, may return empty or some findings.
		$this->assertIsArray( $findings );
	}

	/**
	 * Test malformed PHP code handling.
	 *
	 * @return void
	 */
	public function test_malformed_code_handling(): void {
		$content = '<?php function broken( { // Missing closing brace';

		$file     = new ThemeFile( 'broken.php', '/path/broken.php', $content, FileType::PHP );
		$findings = $this->analyzer->analyze( $file, $this->context );

		// Should not crash.
		$this->assertIsArray( $findings );
	}

	/**
	 * Test multiple issues in single file.
	 *
	 * @return void
	 */
	public function test_multiple_issues_in_single_file(): void {
		$content = <<<'PHP'
<?php
function my_theme_scripts() {
	wp_enqueue_script( 'script1', 'script1.js', array(), '1.0.0' );
	wp_enqueue_script( 'script2', 'script2.js', array(), '1.0.0' );
}

function get_data() {
	$query = new WP_Query( array( 'post_type' => 'post' ) );
	return $query->posts;
}
PHP;

		$file     = new ThemeFile( 'functions.php', '/path/functions.php', $content, FileType::PHP );
		$findings = $this->analyzer->analyze( $file, $this->context );

		$this->assertNotEmpty( $findings );
		// Should have multiple findings (2 script issues + 1 query issue + possibly resource hints).
		$this->assertGreaterThanOrEqual( 3, count( $findings ) );
	}
}
