<?php
/**
 * Layout Component
 *
 * Provides support for adjusting layout size units and editor layout compatibility in the Aegis Framework.
 *
 * Responsibilities:
 * - Adjusts layout size units for the editor
 * - Integrates with the block editor and theme JSON
 *
 * @package    Aegis\Framework\DesignSystem
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for design system components.
declare( strict_types=1 );

// Declares the namespace for design system components within the Aegis Framework.
namespace Aegis\Framework\DesignSystem;

// Imports scriptable interface, scripts service, and WordPress helpers for array and string manipulation.
use Aegis\Framework\InlineAssets\Scriptable;
use Aegis\Framework\InlineAssets\Scripts;
use function array_merge;
use function is_admin;
use function str_replace;

// Implements the Layout class to support layout adjustments for the design system.

class Layout implements Scriptable {

	/**
	 * Changes layout size unit from vw to % in editor.
	 *
	 * @since 1.0.0
	 *
	 * @param mixed $theme_json WP_Theme_JSON_Data | WP_Theme_JSON_Data_Gutenberg.
	 *
	 * @hook  wp_theme_json_data_theme
	 *
	 * @return mixed
	 */
	public function fix_editor_layout_sizes( $theme_json ) {
		if ( is_admin() ) {
			return $theme_json;
		}

		$default      = $theme_json->get_data();
		$new          = [];
		$content_size = $default['settings']['layout']['contentSize'] ?? 'min(calc(100dvw - var(--wp--preset--spacing--lg,2rem) * 2), 950px)';
		$wide_size    = $default['settings']['layout']['wideSize'] ?? 'min(calc(100vw - var(--wp--preset--spacing--lg,2rem) * 2), 1440px)';

		$new['settings']['layout']['contentSize'] = str_replace( '100%', '100dvw', $content_size );
		$new['settings']['layout']['wideSize']    = str_replace( '100%', '100dvw', $wide_size );

		$theme_json->update_with( array_merge(
			$default,
			$new
		) );

		return $theme_json;
	}

	/**
	 * Enqueue scripts.
	 *
	 * @since 1.0.0
	 */
	public function scripts( Scripts $scripts ): void {
		$scripts->add_file(
			'header-height.js',
			[ 'has-header-height' ]
		);
	}

}
