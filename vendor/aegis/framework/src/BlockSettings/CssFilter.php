<?php
/**
 * CSS Filter Block Setting
 *
 * Provides support for applying CSS filter effects to blocks within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the rendering of custom CSS filter styles for block content
 * - Integrates with the Renderable interface for block output
 *
 * @package    Aegis\Framework\BlockSettings
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for block settings.
declare( strict_types=1 );

// Declares the namespace for block settings within the Aegis Framework.
namespace Aegis\Framework\BlockSettings;

// Imports utility classes and interfaces for DOM manipulation and renderable blocks.
use Aegis\Framework\InlineAssets\Scriptable;
use Aegis\Framework\InlineAssets\Scripts;
use function is_admin;

/**
 * Provides configuration settings for CSS filters.
 *
 * This class does not render any block content itself. Instead, it acts as a
 * central service that defines the available CSS filter options (e.g., blur,
 * brightness) and their parameters (unit, min, max). It then makes these
 * settings available to the block editor's JavaScript.
 *
 * @package Aegis\Framework\BlockSettings
 * @since   1.0.0
 */
class CssFilter implements Scriptable {

	/**
	 * An associative array defining the available CSS filter options.
	 *
	 * Each key is the CSS filter name (e.g., 'blur'), and the value is an
	 * array containing the `unit`, `min`, `max`, and optional `step` for
	 * the editor controls.
	 *
	 * @var   array
	 * @since 1.0.0
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
	 * Exposes the filter settings to client-side scripts.
	 *
	 * This method makes the `$settings` array available to JavaScript under the
	 * `filterOptions` key. This allows the block editor's UI controls (like
	 * sliders and dropdowns) to be dynamically generated based on this configuration.
	 *
	 * @since 1.0.0
	 *
	 * @param Scripts $scripts The Scripts service instance.
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
