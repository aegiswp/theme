<?php
/**
 * Unit tests for SEOAnalyzer.
 *
 * @package WPAudit
 */

namespace WPAudit\Tests\Unit\Analyzers;

use PHPUnit\Framework\TestCase;
use WPAudit\Analyzers\SEOAnalyzer;
use WPAudit\Models\ThemeFile;
use WPAudit\Models\AuditContext;
use WPAudit\Models\Configuration;
use WPAudit\Models\ThemeMetadata;
use WPAudit\Models\FileRegistry;
use WPAudit\Enums\FileType;
use WPAudit\Enums\Severity;

/**
 * Test SEOAnalyzer functionality.
 */
class SEOAnalyzerTest extends TestCase {
	/**
	 * SEO analyzer instance.
	 *
	 * @var SEOAnalyzer
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

		$this->analyzer = new SEOAnalyzer();

		// Create test context.
		$config        = new Configuration( array(), false );
		$theme         = new ThemeMetadata( 'test-theme', '1.0.0', '/path/to/theme', true );
		$files         = new FileRegistry();
		$this->context = new AuditContext( $config, $theme, $files );
	}

	/**
	 * Test analyzer name.
	 *
	 * @return void
	 */
	public function test_get_name(): void {
		$this->assertEquals( 'seo', $this->analyzer->get_name() );
	}

	/**
	 * Test analyzer can handle supported file types.
	 *
	 * @return void
	 */
	public function test_can_analyze_supported_types(): void {
		$php_file  = new ThemeFile( 'test.php', '/path/test.php', '<?php', FileType::PHP );
		$html_file = new ThemeFile( 'test.html', '/path/test.html', '<html></html>', FileType::HTML );

		$this->assertTrue( $this->analyzer->can_analyze( $php_file ) );
		$this->assertTrue( $this->analyzer->can_analyze( $html_file ) );
	}

	/**
	 * Test analyzer cannot handle unsupported file types.
	 *
	 * @return void
	 */
	public function test_cannot_analyze_unsupported_types(): void {
		$css_file  = new ThemeFile( 'test.css', '/path/test.css', 'body {}', FileType::CSS );
		$js_file   = new ThemeFile( 'test.js', '/path/test.js', 'console.log();', FileType::JS );
		$json_file = new ThemeFile( 'test.json', '/path/test.json', '{}', FileType::JSON );

		$this->assertFalse( $this->analyzer->can_analyze( $css_file ) );
		$this->assertFalse( $this->analyzer->can_analyze( $js_file ) );
		$this->assertFalse( $this->analyzer->can_analyze( $json_file ) );
	}

	/**
	 * Test get rules returns all SEO rules.
	 *
	 * @return void
	 */
	public function test_get_rules(): void {
		$rules = $this->analyzer->get_rules();

		$this->assertIsArray( $rules );
		$this->assertCount( 7, $rules );

		$rule_ids = array_column( $rules, 'id' );
		$this->assertContains( 'seo-001', $rule_ids );
		$this->assertContains( 'seo-002', $rule_ids );
		$this->assertContains( 'seo-003', $rule_ids );
		$this->assertContains( 'seo-004', $rule_ids );
		$this->assertContains( 'seo-005', $rule_ids );
		$this->assertContains( 'seo-006', $rule_ids );
		$this->assertContains( 'seo-007', $rule_ids );
	}

	/**
	 * Test detection of skipped heading levels.
	 *
	 * @return void
	 */
	public function test_detect_skipped_heading_levels(): void {
		$content = <<<'HTML'
<!DOCTYPE html>
<html>
<body>
	<h1>Main Title</h1>
	<h3>Skipped h2</h3>
</body>
</html>
HTML;

		$file     = new ThemeFile( 'templates/index.html', '/path/templates/index.html', $content, FileType::HTML );
		$findings = $this->analyzer->analyze( $file, $this->context );

		$this->assertNotEmpty( $findings );
		$seo_001_findings = array_filter(
			$findings,
			function ( $finding ) {
				return $finding->rule === 'seo-001' && strpos( $finding->message, 'hierarchy skipped' ) !== false;
			}
		);
		$this->assertNotEmpty( $seo_001_findings );
		$finding = reset( $seo_001_findings );
		$this->assertEquals( Severity::MEDIUM, $finding->severity );
	}

	/**
	 * Test no detection for proper heading hierarchy.
	 *
	 * @return void
	 */
	public function test_no_detection_for_proper_heading_hierarchy(): void {
		$content = <<<'HTML'
<!DOCTYPE html>
<html>
<body>
	<h1>Main Title</h1>
	<h2>Subtitle</h2>
	<h3>Sub-subtitle</h3>
</body>
</html>
HTML;

		$file     = new ThemeFile( 'templates/index.html', '/path/templates/index.html', $content, FileType::HTML );
		$findings = $this->analyzer->analyze( $file, $this->context );

		$seo_001_findings = array_filter(
			$findings,
			function ( $finding ) {
				return $finding->rule === 'seo-001' && strpos( $finding->message, 'hierarchy skipped' ) !== false;
			}
		);
		$this->assertEmpty( $seo_001_findings );
	}

	/**
	 * Test detection of missing wp_head() hook.
	 *
	 * @return void
	 */
	public function test_detect_missing_wp_head(): void {
		$content = <<<'PHP'
<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
</head>
<body>
PHP;

		$file     = new ThemeFile( 'header.php', '/path/header.php', $content, FileType::PHP );
		$findings = $this->analyzer->analyze( $file, $this->context );

		$this->assertNotEmpty( $findings );
		$wp_head_findings = array_filter(
			$findings,
			function ( $finding ) {
				return $finding->rule === 'seo-002' && strpos( $finding->message, 'wp_head' ) !== false;
			}
		);
		$this->assertNotEmpty( $wp_head_findings );
		$finding = reset( $wp_head_findings );
		$this->assertEquals( Severity::HIGH, $finding->severity );
	}

	/**
	 * Test no detection when wp_head() exists.
	 *
	 * @return void
	 */
	public function test_no_detection_with_wp_head(): void {
		$content = <<<'PHP'
<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
	<?php wp_head(); ?>
</head>
<body>
PHP;

		$file     = new ThemeFile( 'header.php', '/path/header.php', $content, FileType::PHP );
		$findings = $this->analyzer->analyze( $file, $this->context );

		$wp_head_findings = array_filter(
			$findings,
			function ( $finding ) {
				return $finding->rule === 'seo-002' && strpos( $finding->message, 'wp_head' ) !== false;
			}
		);
		$this->assertEmpty( $wp_head_findings );
	}

	/**
	 * Test detection of missing meta description.
	 *
	 * @return void
	 */
	public function test_detect_missing_meta_description(): void {
		$content = <<<'HTML'
<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
</head>
<body>
	<main>Content</main>
</body>
</html>
HTML;

		$file     = new ThemeFile( 'templates/index.html', '/path/templates/index.html', $content, FileType::HTML );
		$findings = $this->analyzer->analyze( $file, $this->context );

		$this->assertNotEmpty( $findings );
		$meta_desc_findings = array_filter(
			$findings,
			function ( $finding ) {
				return $finding->rule === 'seo-003';
			}
		);
		$this->assertNotEmpty( $meta_desc_findings );
		$finding = reset( $meta_desc_findings );
		$this->assertEquals( Severity::MEDIUM, $finding->severity );
	}

	/**
	 * Test no detection when meta description exists.
	 *
	 * @return void
	 */
	public function test_no_detection_with_meta_description(): void {
		$content = <<<'HTML'
<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
	<meta name="description" content="This is a test page">
</head>
<body>
	<main>Content</main>
</body>
</html>
HTML;

		$file     = new ThemeFile( 'templates/index.html', '/path/templates/index.html', $content, FileType::HTML );
		$findings = $this->analyzer->analyze( $file, $this->context );

		$meta_desc_findings = array_filter(
			$findings,
			function ( $finding ) {
				return $finding->rule === 'seo-003';
			}
		);
		$this->assertEmpty( $meta_desc_findings );
	}

	/**
	 * Test detection of missing Open Graph tags.
	 *
	 * @return void
	 */
	public function test_detect_missing_open_graph_tags(): void {
		$content = <<<'HTML'
<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
	<meta name="description" content="Test">
</head>
<body>
	<main>Content</main>
</body>
</html>
HTML;

		$file     = new ThemeFile( 'templates/index.html', '/path/templates/index.html', $content, FileType::HTML );
		$findings = $this->analyzer->analyze( $file, $this->context );

		$this->assertNotEmpty( $findings );
		$og_findings = array_filter(
			$findings,
			function ( $finding ) {
				return $finding->rule === 'seo-004';
			}
		);
		$this->assertNotEmpty( $og_findings );
		$finding = reset( $og_findings );
		$this->assertEquals( Severity::LOW, $finding->severity );
	}

	/**
	 * Test no detection when Open Graph tags exist.
	 *
	 * @return void
	 */
	public function test_no_detection_with_open_graph_tags(): void {
		$content = <<<'HTML'
<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
	<meta property="og:title" content="Test Page">
	<meta property="og:description" content="Test description">
</head>
<body>
	<main>Content</main>
</body>
</html>
HTML;

		$file     = new ThemeFile( 'templates/index.html', '/path/templates/index.html', $content, FileType::HTML );
		$findings = $this->analyzer->analyze( $file, $this->context );

		$og_findings = array_filter(
			$findings,
			function ( $finding ) {
				return $finding->rule === 'seo-004';
			}
		);
		$this->assertEmpty( $og_findings );
	}

	/**
	 * Test detection of missing canonical tag.
	 *
	 * @return void
	 */
	public function test_detect_missing_canonical_tag(): void {
		$content = <<<'HTML'
<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
</head>
<body>
	<main>Content</main>
</body>
</html>
HTML;

		$file     = new ThemeFile( 'templates/index.html', '/path/templates/index.html', $content, FileType::HTML );
		$findings = $this->analyzer->analyze( $file, $this->context );

		$this->assertNotEmpty( $findings );
		$canonical_findings = array_filter(
			$findings,
			function ( $finding ) {
				return $finding->rule === 'seo-006';
			}
		);
		$this->assertNotEmpty( $canonical_findings );
		$finding = reset( $canonical_findings );
		$this->assertEquals( Severity::MEDIUM, $finding->severity );
	}

	/**
	 * Test no detection when canonical tag exists.
	 *
	 * @return void
	 */
	public function test_no_detection_with_canonical_tag(): void {
		$content = <<<'HTML'
<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
	<link rel="canonical" href="https://example.com/page">
</head>
<body>
	<main>Content</main>
</body>
</html>
HTML;

		$file     = new ThemeFile( 'templates/index.html', '/path/templates/index.html', $content, FileType::HTML );
		$findings = $this->analyzer->analyze( $file, $this->context );

		$canonical_findings = array_filter(
			$findings,
			function ( $finding ) {
				return $finding->rule === 'seo-006';
			}
		);
		$this->assertEmpty( $canonical_findings );
	}

	/**
	 * Test detection of missing schema.org markup.
	 *
	 * @return void
	 */
	public function test_detect_missing_schema_markup(): void {
		$content = <<<'HTML'
<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
</head>
<body>
	<main>Content without schema</main>
</body>
</html>
HTML;

		$file     = new ThemeFile( 'templates/index.html', '/path/templates/index.html', $content, FileType::HTML );
		$findings = $this->analyzer->analyze( $file, $this->context );

		$this->assertNotEmpty( $findings );
		$schema_findings = array_filter(
			$findings,
			function ( $finding ) {
				return $finding->rule === 'seo-005' && strpos( $finding->message, 'No schema.org' ) !== false;
			}
		);
		$this->assertNotEmpty( $schema_findings );
	}

	/**
	 * Test no detection when JSON-LD schema exists.
	 *
	 * @return void
	 */
	public function test_no_detection_with_json_ld_schema(): void {
		$content = <<<'HTML'
<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
	<script type="application/ld+json">
	{
		"@context": "https://schema.org",
		"@type": "WebPage",
		"name": "Test Page"
	}
	</script>
</head>
<body>
	<main>Content</main>
</body>
</html>
HTML;

		$file     = new ThemeFile( 'templates/index.html', '/path/templates/index.html', $content, FileType::HTML );
		$findings = $this->analyzer->analyze( $file, $this->context );

		$schema_findings = array_filter(
			$findings,
			function ( $finding ) {
				return $finding->rule === 'seo-005' && strpos( $finding->message, 'No schema.org' ) !== false;
			}
		);
		$this->assertEmpty( $schema_findings );
	}

	/**
	 * Test detection of images without alt attributes.
	 *
	 * @return void
	 */
	public function test_detect_images_without_alt(): void {
		$content = <<<'HTML'
<!DOCTYPE html>
<html>
<body>
	<main>
		<img src="image.jpg">
	</main>
</body>
</html>
HTML;

		$file     = new ThemeFile( 'templates/index.html', '/path/templates/index.html', $content, FileType::HTML );
		$findings = $this->analyzer->analyze( $file, $this->context );

		$this->assertNotEmpty( $findings );
		$alt_findings = array_filter(
			$findings,
			function ( $finding ) {
				return $finding->rule === 'seo-007' && strpos( $finding->message, 'missing alt' ) !== false;
			}
		);
		$this->assertNotEmpty( $alt_findings );
		$finding = reset( $alt_findings );
		$this->assertEquals( Severity::HIGH, $finding->severity );
	}

	/**
	 * Test no detection when images have alt attributes.
	 *
	 * @return void
	 */
	public function test_no_detection_with_alt_attributes(): void {
		$content = <<<'HTML'
<!DOCTYPE html>
<html>
<body>
	<main>
		<img src="image.jpg" alt="Descriptive text">
	</main>
</body>
</html>
HTML;

		$file     = new ThemeFile( 'templates/index.html', '/path/templates/index.html', $content, FileType::HTML );
		$findings = $this->analyzer->analyze( $file, $this->context );

		$alt_findings = array_filter(
			$findings,
			function ( $finding ) {
				return $finding->rule === 'seo-007' && strpos( $finding->message, 'missing alt' ) !== false;
			}
		);
		$this->assertEmpty( $alt_findings );
	}

	/**
	 * Test empty file handling.
	 *
	 * @return void
	 */
	public function test_empty_file_handling(): void {
		$file     = new ThemeFile( 'empty.php', '/path/empty.php', '', FileType::PHP );
		$findings = $this->analyzer->analyze( $file, $this->context );

		// Should not crash.
		$this->assertIsArray( $findings );
	}

	/**
	 * Test non-template file handling.
	 *
	 * @return void
	 */
	public function test_non_template_file_handling(): void {
		$content = <<<'PHP'
<?php
class MyClass {
	public function my_method() {
		return 'test';
	}
}
PHP;

		$file     = new ThemeFile( 'inc/class-myclass.php', '/path/inc/class-myclass.php', $content, FileType::PHP );
		$findings = $this->analyzer->analyze( $file, $this->context );

		// Should have minimal or no findings for non-template files.
		$this->assertIsArray( $findings );
	}

	/**
	 * Test multiple issues in single file.
	 *
	 * @return void
	 */
	public function test_multiple_issues_in_single_file(): void {
		$content = <<<'HTML'
<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
	<title>Duplicate</title>
</head>
<body>
	<h1>Title</h1>
	<h3>Skipped h2</h3>
	<img src="image1.jpg">
	<img src="image2.jpg" alt="image2.jpg">
</body>
</html>
HTML;

		$file     = new ThemeFile( 'templates/index.html', '/path/templates/index.html', $content, FileType::HTML );
		$findings = $this->analyzer->analyze( $file, $this->context );

		$this->assertNotEmpty( $findings );
		// Should have multiple findings (skipped heading, missing alt).
		$this->assertGreaterThanOrEqual( 2, count( $findings ) );
	}

	/**
	 * Test microdata detection.
	 *
	 * @return void
	 */
	public function test_no_detection_with_microdata(): void {
		$content = <<<'HTML'
<!DOCTYPE html>
<html>
<body>
	<main>
		<div itemscope itemtype="https://schema.org/Article">
			<h1 itemprop="headline">Article Title</h1>
		</div>
	</main>
</body>
</html>
HTML;

		$file     = new ThemeFile( 'templates/single.html', '/path/templates/single.html', $content, FileType::HTML );
		$findings = $this->analyzer->analyze( $file, $this->context );

		$schema_findings = array_filter(
			$findings,
			function ( $finding ) {
				return $finding->rule === 'seo-005' && strpos( $finding->message, 'No schema.org' ) !== false;
			}
		);
		$this->assertEmpty( $schema_findings );
	}
}
