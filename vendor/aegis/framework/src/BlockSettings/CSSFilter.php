<?php
/**
 * CSSFilter.php
 *
 * Handles CSS filter settings logic for the Aegis WordPress theme.
 *
 * @package   Aegis\Framework\BlockSettings
 * @author    Atmostfear Entertainment
 * @copyright Copyright (c) 2025
 * @license   GPL-2.0-or-later
 * @link      https://github.com/aegiswp/theme
 * @since     1.0.0
 */

declare( strict_types=1 );

namespace Aegis\Framework\BlockSettings;

use Aegis\Framework\InlineAssets\Scriptable;
use Aegis\Framework\InlineAssets\Scripts;
use function is_admin;

/**
 * CSS filter settings.
 *
 * @since 1.0.0
 */
class CssFilter implements Scriptable {

	/**
	 * Filter settings.
	 *
	 * @var array
	 */
	public array $settings = [
		'blur'       => [
			'unit' => 'px',
			'min'  => 0,
			'max'  => 500,
		],
		'brightness' => [
			'unit' => '%',
			'min'  => 0,
			'max'  => 360,
		],
		'contrast'   => [
			'unit' => '%',
			'min'  => 0,
			'max'  => 200,
		],
		'grayscale'  => [
			'unit' => '%',
			'min'  => 0,
			'max'  => 100,
		],
		'hueRotate'  => [
			'unit' => 'deg',
			'min'  => -360,
			'max'  => 360,
		],
		'invert'     => [
			'unit' => '%',
			'min'  => 0,
			'max'  => 100,
		],
		'opacity'    => [
			'unit' => '%',
			'min'  => 0,
			'max'  => 100,
		],
		'saturate'   => [
			'unit' => '',
			'min'  => 0,
			'max'  => 100,
			'step' => 0.1,
		],
		'sepia'      => [
			'unit' => '%',
			'min'  => 0,
			'max'  => 100,
		],
	];

	/**
	 * Register scripts.
	 *
	 * @param Scripts $scripts Inlinable service.
	 *
	 * @return void
	 */
	public function scripts( Scripts $scripts ): void {
		$scripts->add_data(
			'filterOptions',
			$this->settings,
			[],
			is_admin()
		);
	}

}
