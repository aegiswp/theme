<?php
/**
 * PHPUnit smoke test
 *
 * Ensures `phpunit.xml` and the `unit` testsuite are valid before additional
 * theme tests are added under `tests/Unit`.
 *
 * @package Aegis
 * @since 1.0.0
 * @link https://github.com/aegiswp/theme
 */

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/**
 * Minimal test case; replace or extend as coverage grows.
 */
class SmokeTest extends TestCase
{
	/**
	 * Verifies the PHPUnit pipeline runs.
	 */
	public function test_phpunit_is_wired(): void
	{
		$this->assertTrue( true );
	}
}
