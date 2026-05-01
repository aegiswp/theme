<?php
/**
 * Unit tests for AuditResult model.
 *
 * @package WPAudit
 */

namespace WPAudit\Tests\Unit\Models;

use PHPUnit\Framework\TestCase;
use WPAudit\Models\AuditResult;
use WPAudit\Models\Finding;
use WPAudit\Models\Location;
use WPAudit\Models\Fix;
use WPAudit\Models\AuditMetadata;
use WPAudit\Models\ThemeMetadata;
use WPAudit\Enums\Severity;
use WPAudit\Enums\FixConfidence;

/**
 * Test AuditResult model functionality.
 */
class AuditResultTest extends TestCase {
	/**
	 * Create sample findings for testing.
	 *
	 * @return Finding[] Array of findings.
	 */
	private function create_sample_findings(): array {
		return array(
			new Finding(
				'perf-001',
				'performance',
				'perf-001',
				Severity::HIGH,
				'Performance issue',
				new Location( 'test.php', 10 ),
				'Fix performance'
			),
			new Finding(
				'seo-001',
				'seo',
				'seo-001',
				Severity::MEDIUM,
				'SEO issue',
				new Location( 'test.php', 20 ),
				'Fix SEO'
			),
			new Finding(
				'sec-001',
				'security',
				'sec-001',
				Severity::CRITICAL,
				'Security issue',
				new Location( 'test.php', 30 ),
				'Fix security',
				new Fix(
					'replace',
					FixConfidence::SAFE,
					'Add escaping',
					function () {
						return true;
					}
				)
			),
		);
	}

	/**
	 * Test creating an AuditResult instance.
	 */
	public function test_create_audit_result(): void {
		$findings        = $this->create_sample_findings();
		$category_scores = array(
			'performance' => 85,
			'seo'         => 90,
			'security'    => 70,
		);
		$overall_score   = 81.67;
		$theme           = new ThemeMetadata( 'Test Theme', '1.0.0', '/path' );
		$metadata        = AuditMetadata::create( $theme, 10.5, 50 );

		$result = new AuditResult(
			$findings,
			$category_scores,
			$overall_score,
			$metadata
		);

		$this->assertEquals( $findings, $result->findings );
		$this->assertEquals( $category_scores, $result->category_scores );
		$this->assertEquals( $overall_score, $result->overall_score );
		$this->assertEquals( $metadata, $result->metadata );
	}

	/**
	 * Test get_findings_by_category method.
	 */
	public function test_get_findings_by_category(): void {
		$findings        = $this->create_sample_findings();
		$category_scores = array();
		$theme           = new ThemeMetadata( 'Test Theme', '1.0.0', '/path' );
		$metadata        = AuditMetadata::create( $theme, 10.5, 50 );

		$result = new AuditResult( $findings, $category_scores, 80, $metadata );

		$perf_findings = $result->get_findings_by_category( 'performance' );
		$this->assertCount( 1, $perf_findings );
		$this->assertEquals( 'performance', $perf_findings[0]->category );

		$seo_findings = $result->get_findings_by_category( 'seo' );
		$this->assertCount( 1, $seo_findings );
		$this->assertEquals( 'seo', $seo_findings[0]->category );

		$sec_findings = $result->get_findings_by_category( 'security' );
		$this->assertCount( 1, $sec_findings );
		$this->assertEquals( 'security', $sec_findings[0]->category );
	}

	/**
	 * Test get_findings_by_category returns empty for non-existent category.
	 */
	public function test_get_findings_by_category_empty(): void {
		$findings        = $this->create_sample_findings();
		$category_scores = array();
		$theme           = new ThemeMetadata( 'Test Theme', '1.0.0', '/path' );
		$metadata        = AuditMetadata::create( $theme, 10.5, 50 );

		$result = new AuditResult( $findings, $category_scores, 80, $metadata );

		$a11y_findings = $result->get_findings_by_category( 'accessibility' );
		$this->assertEmpty( $a11y_findings );
	}

	/**
	 * Test get_findings_by_severity method.
	 */
	public function test_get_findings_by_severity(): void {
		$findings        = $this->create_sample_findings();
		$category_scores = array();
		$theme           = new ThemeMetadata( 'Test Theme', '1.0.0', '/path' );
		$metadata        = AuditMetadata::create( $theme, 10.5, 50 );

		$result = new AuditResult( $findings, $category_scores, 80, $metadata );

		$critical = $result->get_findings_by_severity( Severity::CRITICAL );
		$this->assertCount( 1, $critical );
		$this->assertEquals( Severity::CRITICAL, $critical[0]->severity );

		$high = $result->get_findings_by_severity( Severity::HIGH );
		$this->assertCount( 1, $high );
		$this->assertEquals( Severity::HIGH, $high[0]->severity );

		$medium = $result->get_findings_by_severity( Severity::MEDIUM );
		$this->assertCount( 1, $medium );
		$this->assertEquals( Severity::MEDIUM, $medium[0]->severity );

		$low = $result->get_findings_by_severity( Severity::LOW );
		$this->assertEmpty( $low );
	}

	/**
	 * Test get_fixable_findings method.
	 */
	public function test_get_fixable_findings(): void {
		$findings        = $this->create_sample_findings();
		$category_scores = array();
		$theme           = new ThemeMetadata( 'Test Theme', '1.0.0', '/path' );
		$metadata        = AuditMetadata::create( $theme, 10.5, 50 );

		$result = new AuditResult( $findings, $category_scores, 80, $metadata );

		$fixable = $result->get_fixable_findings();

		$this->assertCount( 1, $fixable );
		$this->assertTrue( $fixable[0]->has_fix() );
		$this->assertEquals( 'sec-001', $fixable[0]->id );
	}

	/**
	 * Test get_total_issues method.
	 */
	public function test_get_total_issues(): void {
		$findings        = $this->create_sample_findings();
		$category_scores = array();
		$theme           = new ThemeMetadata( 'Test Theme', '1.0.0', '/path' );
		$metadata        = AuditMetadata::create( $theme, 10.5, 50 );

		$result = new AuditResult( $findings, $category_scores, 80, $metadata );

		$this->assertEquals( 3, $result->get_total_issues() );
	}

	/**
	 * Test get_severity_counts method.
	 */
	public function test_get_severity_counts(): void {
		$findings        = $this->create_sample_findings();
		$category_scores = array();
		$theme           = new ThemeMetadata( 'Test Theme', '1.0.0', '/path' );
		$metadata        = AuditMetadata::create( $theme, 10.5, 50 );

		$result = new AuditResult( $findings, $category_scores, 80, $metadata );

		$counts = $result->get_severity_counts();

		$this->assertEquals( 1, $counts[ Severity::CRITICAL ] );
		$this->assertEquals( 1, $counts[ Severity::HIGH ] );
		$this->assertEquals( 1, $counts[ Severity::MEDIUM ] );
		$this->assertEquals( 0, $counts[ Severity::LOW ] );
	}

	/**
	 * Test to_array conversion.
	 */
	public function test_to_array(): void {
		$findings        = $this->create_sample_findings();
		$category_scores = array(
			'performance' => 85,
			'seo'         => 90,
			'security'    => 70,
		);
		$overall_score   = 81.67;
		$theme           = new ThemeMetadata( 'Test Theme', '1.0.0', '/path' );
		$metadata        = AuditMetadata::create( $theme, 10.5, 50 );
		$stats           = array( 'files_analyzed' => 50 );

		$result = new AuditResult(
			$findings,
			$category_scores,
			$overall_score,
			$metadata,
			$stats
		);

		$array = $result->to_array();

		$this->assertIsArray( $array );
		$this->assertArrayHasKey( 'metadata', $array );
		$this->assertArrayHasKey( 'summary', $array );
		$this->assertArrayHasKey( 'categoryScores', $array );
		$this->assertArrayHasKey( 'findings', $array );
		$this->assertArrayHasKey( 'stats', $array );

		$this->assertEquals( 3, $array['summary']['totalIssues'] );
		$this->assertEquals( $overall_score, $array['summary']['overallScore'] );
		$this->assertEquals( $category_scores, $array['categoryScores'] );
		$this->assertCount( 3, $array['findings'] );
		$this->assertEquals( $stats, $array['stats'] );
	}

	/**
	 * Test to_array includes severity counts in summary.
	 */
	public function test_to_array_severity_counts(): void {
		$findings        = $this->create_sample_findings();
		$category_scores = array();
		$theme           = new ThemeMetadata( 'Test Theme', '1.0.0', '/path' );
		$metadata        = AuditMetadata::create( $theme, 10.5, 50 );

		$result = new AuditResult( $findings, $category_scores, 80, $metadata );

		$array = $result->to_array();

		$this->assertArrayHasKey( 'severityCounts', $array['summary'] );
		$this->assertEquals( 1, $array['summary']['severityCounts'][ Severity::CRITICAL ] );
		$this->assertEquals( 1, $array['summary']['severityCounts'][ Severity::HIGH ] );
		$this->assertEquals( 1, $array['summary']['severityCounts'][ Severity::MEDIUM ] );
		$this->assertEquals( 0, $array['summary']['severityCounts'][ Severity::LOW ] );
	}

	/**
	 * Test empty audit result.
	 */
	public function test_empty_audit_result(): void {
		$findings        = array();
		$category_scores = array();
		$theme           = new ThemeMetadata( 'Test Theme', '1.0.0', '/path' );
		$metadata        = AuditMetadata::create( $theme, 5.0, 10 );

		$result = new AuditResult( $findings, $category_scores, 100, $metadata );

		$this->assertEquals( 0, $result->get_total_issues() );
		$this->assertEmpty( $result->get_fixable_findings() );
		$this->assertEquals( 100, $result->overall_score );
	}
}
