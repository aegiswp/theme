<?php
/**
 * Tests for AccessibilityAnalyzer.
 *
 * @package WPAudit
 */

namespace WPAudit\Tests\Unit\Analyzers;

use PHPUnit\Framework\TestCase;
use WPAudit\Analyzers\AccessibilityAnalyzer;
use WPAudit\Models\ThemeFile;
use WPAudit\Models\AuditContext;
use WPAudit\Models\Configuration;
use WPAudit\Models\ThemeMetadata;
use WPAudit\Models\FileRegistry;
use WPAudit\Enums\FileType;
use WPAudit\Enums\Severity;

/**
 * Test AccessibilityAnalyzer functionality.
 */
class AccessibilityAnalyzerTest extends TestCase {
	/**
	 * Analyzer instance.
	 *
	 * @var AccessibilityAnalyzer
	 */
	private $analyzer;

	/**
	 * Audit context.
	 *
	 * @var AuditContext
	 */
	private $context;

	/**
	 * Set up test fixtures.
	 */
	protected function setUp(): void {
		$this->analyzer = new AccessibilityAnalyzer();

		$config   = new Configuration();
		$theme    = new ThemeMetadata( 'test-theme', '1.0.0', '/path/to/theme' );
		$registry = new FileRegistry();

		$this->context = new AuditContext( $config, $theme, $registry );
	}

	/**
	 * Test analyzer name.
	 */
	public function test_get_name(): void {
		$this->assertSame( 'accessibility', $this->analyzer->get_name() );
	}

	/**
	 * Test can analyze supported file types.
	 */
	public function test_can_analyze_supported_types(): void {
		$php_file  = new ThemeFile( 'test.php', '/path/test.php', '<?php', FileType::PHP );
		$html_file = new ThemeFile( 'test.html', '/path/test.html', '<html>', FileType::HTML );
		$css_file  = new ThemeFile( 'test.css', '/path/test.css', 'body {}', FileType::CSS );

		$this->assertTrue( $this->analyzer->can_analyze( $php_file ) );
		$this->assertTrue( $this->analyzer->can_analyze( $html_file ) );
		$this->assertTrue( $this->analyzer->can_analyze( $css_file ) );
	}

	/**
	 * Test cannot analyze unsupported file types.
	 */
	public function test_cannot_analyze_unsupported_types(): void {
		$js_file   = new ThemeFile( 'test.js', '/path/test.js', 'console.log()', FileType::JS );
		$json_file = new ThemeFile( 'test.json', '/path/test.json', '{}', FileType::JSON );

		$this->assertFalse( $this->analyzer->can_analyze( $js_file ) );
		$this->assertFalse( $this->analyzer->can_analyze( $json_file ) );
	}

	/**
	 * Test get rules returns all accessibility rules.
	 */
	public function test_get_rules(): void {
		$rules = $this->analyzer->get_rules();

		$this->assertCount( 8, $rules );

		$rule_ids = array_column( $rules, 'id' );
		$this->assertContains( 'a11y-001', $rule_ids );
		$this->assertContains( 'a11y-002', $rule_ids );
		$this->assertContains( 'a11y-003', $rule_ids );
		$this->assertContains( 'a11y-004', $rule_ids );
		$this->assertContains( 'a11y-005', $rule_ids );
		$this->assertContains( 'a11y-006', $rule_ids );
		$this->assertContains( 'a11y-007', $rule_ids );
		$this->assertContains( 'a11y-008', $rule_ids );
	}

	/**
	 * Test detection of button without ARIA label.
	 */
	public function test_detects_button_without_aria_label(): void {
		$content = '<button><i class="icon"></i></button>';
		$file    = new ThemeFile( 'template.php', '/path/template.php', $content, FileType::PHP );

		$findings = $this->analyzer->analyze( $file, $this->context );

		$this->assertCount( 1, $findings );
		$this->assertSame( 'a11y-002', $findings[0]->rule );
		$this->assertSame( Severity::HIGH, $findings[0]->severity );
		$this->assertStringContainsString( 'Button without accessible text', $findings[0]->message );
	}

	/**
	 * Test button with ARIA label is valid.
	 */
	public function test_button_with_aria_label_is_valid(): void {
		$content = '<button aria-label="Close"><i class="icon"></i></button>';
		$file    = new ThemeFile( 'template.php', '/path/template.php', $content, FileType::PHP );

		$findings = $this->analyzer->analyze( $file, $this->context );

		$aria_findings = array_filter(
			$findings,
			function ( $f ) {
				return 'a11y-002' === $f->rule;
			}
		);
		$this->assertCount( 0, $aria_findings );
	}

	/**
	 * Test detection of icon-only link without ARIA label.
	 */
	public function test_detects_icon_link_without_aria_label(): void {
		$content = '<a href="/page"><svg><path d="..."/></svg></a>';
		$file    = new ThemeFile( 'template.php', '/path/template.php', $content, FileType::PHP );

		$findings = $this->analyzer->analyze( $file, $this->context );

		$this->assertGreaterThanOrEqual( 1, count( $findings ) );
		$aria_findings = array_filter(
			$findings,
			function ( $f ) {
				return 'a11y-002' === $f->rule;
			}
		);
		$this->assertCount( 1, $aria_findings );
	}

	/**
	 * Test detection of form input without label.
	 */
	public function test_detects_input_without_label(): void {
		$content = '<input type="text" name="username">';
		$file    = new ThemeFile( 'form.php', '/path/form.php', $content, FileType::PHP );

		$findings = $this->analyzer->analyze( $file, $this->context );

		$this->assertGreaterThanOrEqual( 1, count( $findings ) );
		$form_findings = array_filter(
			$findings,
			function ( $f ) {
				return 'a11y-003' === $f->rule;
			}
		);
		$this->assertCount( 1, $form_findings );
		$this->assertStringContainsString( 'without associated label', $form_findings[0]->message );
	}

	/**
	 * Test input with for/id label association is valid.
	 */
	public function test_input_with_for_id_label_is_valid(): void {
		$content = '<label for="username">Username</label><input type="text" id="username" name="username">';
		$file    = new ThemeFile( 'form.php', '/path/form.php', $content, FileType::PHP );

		$findings = $this->analyzer->analyze( $file, $this->context );

		$form_findings = array_filter(
			$findings,
			function ( $f ) {
				return 'a11y-003' === $f->rule;
			}
		);
		$this->assertCount( 0, $form_findings );
	}

	/**
	 * Test input wrapped in label is valid.
	 */
	public function test_input_wrapped_in_label_is_valid(): void {
		$content = '<label>Username <input type="text" name="username"></label>';
		$file    = new ThemeFile( 'form.php', '/path/form.php', $content, FileType::PHP );

		$findings = $this->analyzer->analyze( $file, $this->context );

		$form_findings = array_filter(
			$findings,
			function ( $f ) {
				return 'a11y-003' === $f->rule;
			}
		);
		$this->assertCount( 0, $form_findings );
	}

	/**
	 * Test input with aria-label is valid.
	 */
	public function test_input_with_aria_label_is_valid(): void {
		$content = '<input type="text" name="username" aria-label="Username">';
		$file    = new ThemeFile( 'form.php', '/path/form.php', $content, FileType::PHP );

		$findings = $this->analyzer->analyze( $file, $this->context );

		$form_findings = array_filter(
			$findings,
			function ( $f ) {
				return 'a11y-003' === $f->rule;
			}
		);
		$this->assertCount( 0, $form_findings );
	}

	/**
	 * Test detection of image without alt attribute.
	 */
	public function test_detects_image_without_alt(): void {
		$content = '<img src="image.jpg">';
		$file    = new ThemeFile( 'template.php', '/path/template.php', $content, FileType::PHP );

		$findings = $this->analyzer->analyze( $file, $this->context );

		$this->assertGreaterThanOrEqual( 1, count( $findings ) );
		$img_findings = array_filter(
			$findings,
			function ( $f ) {
				return 'a11y-004' === $f->rule;
			}
		);
		$this->assertCount( 1, $img_findings );
		$this->assertStringContainsString( 'missing alt attribute', $img_findings[0]->message );
	}

	/**
	 * Test image with alt attribute is valid.
	 */
	public function test_image_with_alt_is_valid(): void {
		$content = '<img src="image.jpg" alt="Description">';
		$file    = new ThemeFile( 'template.php', '/path/template.php', $content, FileType::PHP );

		$findings = $this->analyzer->analyze( $file, $this->context );

		$img_findings = array_filter(
			$findings,
			function ( $f ) {
				return 'a11y-004' === $f->rule;
			}
		);
		$this->assertCount( 0, $img_findings );
	}

	/**
	 * Test detection of onclick without keyboard support.
	 */
	public function test_detects_onclick_without_keyboard_support(): void {
		$content = '<div onclick="doSomething()">Click me</div>';
		$file    = new ThemeFile( 'template.php', '/path/template.php', $content, FileType::PHP );

		$findings = $this->analyzer->analyze( $file, $this->context );

		$this->assertGreaterThanOrEqual( 1, count( $findings ) );
		$kbd_findings = array_filter(
			$findings,
			function ( $f ) {
				return 'a11y-006' === $f->rule;
			}
		);
		$this->assertCount( 1, $kbd_findings );
		$this->assertStringContainsString( 'keyboard navigation', $kbd_findings[0]->message );
	}

	/**
	 * Test onclick with tabindex and keyboard handler is valid.
	 */
	public function test_onclick_with_keyboard_support_is_valid(): void {
		$content = '<div onclick="doSomething()" onkeydown="handleKey()" tabindex="0">Click me</div>';
		$file    = new ThemeFile( 'template.php', '/path/template.php', $content, FileType::PHP );

		$findings = $this->analyzer->analyze( $file, $this->context );

		$kbd_findings = array_filter(
			$findings,
			function ( $f ) {
				return 'a11y-006' === $f->rule && strpos( $f->message, 'Interactive element without' ) !== false;
			}
		);
		$this->assertCount( 0, $kbd_findings );
	}

	/**
	 * Test detection of negative tabindex.
	 */
	public function test_detects_negative_tabindex(): void {
		$content = '<button tabindex="-1">Button</button>';
		$file    = new ThemeFile( 'template.php', '/path/template.php', $content, FileType::PHP );

		$findings = $this->analyzer->analyze( $file, $this->context );

		$tabindex_findings = array_filter(
			$findings,
			function ( $f ) {
				return 'a11y-006' === $f->rule && strpos( $f->message, 'negative tabindex' ) !== false;
			}
		);
		$this->assertCount( 1, $tabindex_findings );
		$this->assertSame( Severity::MEDIUM, $tabindex_findings[0]->severity );
	}

	/**
	 * Test detection of missing skip link in header.
	 */
	public function test_detects_missing_skip_link(): void {
		$content = '<header><nav>Navigation</nav></header>';
		$file    = new ThemeFile( 'header.php', '/path/header.php', $content, FileType::PHP );

		$findings = $this->analyzer->analyze( $file, $this->context );

		$skip_findings = array_filter(
			$findings,
			function ( $f ) {
				return 'a11y-007' === $f->rule;
			}
		);
		$this->assertCount( 1, $skip_findings );
		$this->assertStringContainsString( 'skip-to-content', $skip_findings[0]->message );
	}

	/**
	 * Test skip link present is valid.
	 */
	public function test_skip_link_present_is_valid(): void {
		$content = '<a href="#main-content" class="skip-link">Skip to content</a><header><nav>Navigation</nav></header>';
		$file    = new ThemeFile( 'header.php', '/path/header.php', $content, FileType::PHP );

		$findings = $this->analyzer->analyze( $file, $this->context );

		$skip_findings = array_filter(
			$findings,
			function ( $f ) {
				return 'a11y-007' === $f->rule;
			}
		);
		$this->assertCount( 0, $skip_findings );
	}

	/**
	 * Test detection of video without captions.
	 */
	public function test_detects_video_without_captions(): void {
		$content = '<video src="video.mp4"></video>';
		$file    = new ThemeFile( 'template.php', '/path/template.php', $content, FileType::PHP );

		$findings = $this->analyzer->analyze( $file, $this->context );

		$media_findings = array_filter(
			$findings,
			function ( $f ) {
				return 'a11y-008' === $f->rule && strpos( $f->message, 'Video' ) !== false;
			}
		);
		$this->assertCount( 1, $media_findings );
		$this->assertStringContainsString( 'captions', $media_findings[0]->message );
	}

	/**
	 * Test video with captions is valid.
	 */
	public function test_video_with_captions_is_valid(): void {
		$content = '<video src="video.mp4"><track kind="captions" src="captions.vtt"></video>';
		$file    = new ThemeFile( 'template.php', '/path/template.php', $content, FileType::PHP );

		$findings = $this->analyzer->analyze( $file, $this->context );

		$media_findings = array_filter(
			$findings,
			function ( $f ) {
				return 'a11y-008' === $f->rule && strpos( $f->message, 'Video' ) !== false;
			}
		);
		$this->assertCount( 0, $media_findings );
	}

	/**
	 * Test detection of audio without transcript.
	 */
	public function test_detects_audio_without_transcript(): void {
		$content = '<audio src="audio.mp3"></audio>';
		$file    = new ThemeFile( 'template.php', '/path/template.php', $content, FileType::PHP );

		$findings = $this->analyzer->analyze( $file, $this->context );

		$media_findings = array_filter(
			$findings,
			function ( $f ) {
				return 'a11y-008' === $f->rule && strpos( $f->message, 'Audio' ) !== false;
			}
		);
		$this->assertCount( 1, $media_findings );
		$this->assertStringContainsString( 'transcript', $media_findings[0]->message );
	}

	/**
	 * Test audio with transcript link is valid.
	 */
	public function test_audio_with_transcript_is_valid(): void {
		$content = '<audio src="audio.mp3"></audio><a href="transcript.txt">Transcript</a>';
		$file    = new ThemeFile( 'template.php', '/path/template.php', $content, FileType::PHP );

		$findings = $this->analyzer->analyze( $file, $this->context );

		$media_findings = array_filter(
			$findings,
			function ( $f ) {
				return 'a11y-008' === $f->rule && strpos( $f->message, 'Audio' ) !== false;
			}
		);
		$this->assertCount( 0, $media_findings );
	}

	/**
	 * Test detection of insufficient color contrast.
	 */
	public function test_detects_insufficient_color_contrast(): void {
		$content = "body { color: #777; background-color: #fff; }";
		$file    = new ThemeFile( 'style.css', '/path/style.css', $content, FileType::CSS );

		$findings = $this->analyzer->analyze( $file, $this->context );

		$contrast_findings = array_filter(
			$findings,
			function ( $f ) {
				return 'a11y-001' === $f->rule;
			}
		);
		$this->assertCount( 1, $contrast_findings );
		$this->assertStringContainsString( 'contrast ratio', $contrast_findings[0]->message );
	}

	/**
	 * Test sufficient color contrast is valid.
	 */
	public function test_sufficient_color_contrast_is_valid(): void {
		$content = "body { color: #000; background-color: #fff; }";
		$file    = new ThemeFile( 'style.css', '/path/style.css', $content, FileType::CSS );

		$findings = $this->analyzer->analyze( $file, $this->context );

		$contrast_findings = array_filter(
			$findings,
			function ( $f ) {
				return 'a11y-001' === $f->rule;
			}
		);
		$this->assertCount( 0, $contrast_findings );
	}

	/**
	 * Test detection of outline removal without alternative.
	 */
	public function test_detects_outline_removal_without_alternative(): void {
		$content = "button:focus { outline: none; }";
		$file    = new ThemeFile( 'style.css', '/path/style.css', $content, FileType::CSS );

		$findings = $this->analyzer->analyze( $file, $this->context );

		$focus_findings = array_filter(
			$findings,
			function ( $f ) {
				return 'a11y-005' === $f->rule && strpos( $f->message, 'outline removed' ) !== false;
			}
		);
		$this->assertCount( 1, $focus_findings );
	}

	/**
	 * Test outline removal with alternative is valid.
	 */
	public function test_outline_removal_with_alternative_is_valid(): void {
		$content = "button:focus { outline: none; border: 2px solid blue; }";
		$file    = new ThemeFile( 'style.css', '/path/style.css', $content, FileType::CSS );

		$findings = $this->analyzer->analyze( $file, $this->context );

		$focus_findings = array_filter(
			$findings,
			function ( $f ) {
				return 'a11y-005' === $f->rule && strpos( $f->message, 'outline removed' ) !== false;
			}
		);
		$this->assertCount( 0, $focus_findings );
	}

	/**
	 * Test detection of global outline removal.
	 */
	public function test_detects_global_outline_removal(): void {
		$content = "* { outline: none; }";
		$file    = new ThemeFile( 'style.css', '/path/style.css', $content, FileType::CSS );

		$findings = $this->analyzer->analyze( $file, $this->context );

		$focus_findings = array_filter(
			$findings,
			function ( $f ) {
				return 'a11y-005' === $f->rule && strpos( $f->message, 'Global outline' ) !== false;
			}
		);
		$this->assertCount( 1, $focus_findings );
		$this->assertSame( Severity::HIGH, $focus_findings[0]->severity );
	}

	/**
	 * Test contrast calculation with known color pairs.
	 */
	public function test_contrast_calculation_black_white(): void {
		// Black on white should have 21:1 contrast ratio.
		$content = "body { color: #000; background-color: #fff; }";
		$file    = new ThemeFile( 'style.css', '/path/style.css', $content, FileType::CSS );

		$findings = $this->analyzer->analyze( $file, $this->context );

		// Should not flag black on white as insufficient contrast.
		$contrast_findings = array_filter(
			$findings,
			function ( $f ) {
				return 'a11y-001' === $f->rule;
			}
		);
		$this->assertCount( 0, $contrast_findings );
	}

	/**
	 * Test empty file produces no findings.
	 */
	public function test_empty_file_produces_no_findings(): void {
		$file = new ThemeFile( 'empty.php', '/path/empty.php', '', FileType::PHP );

		$findings = $this->analyzer->analyze( $file, $this->context );

		$this->assertCount( 0, $findings );
	}
}
