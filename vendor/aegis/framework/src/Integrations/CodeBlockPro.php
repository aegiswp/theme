<?php
/**
 * Code Block Pro Integration Component
 *
 * Provides support for integrating Code Block Pro plugin compatibility in the Aegis Framework.
 *
 * Responsibilities:
 * - Checks for Code Block Pro plugin presence and conditionally registers styles
 * - Integrates with the Aegis container and inline assets system
 *
 * @package    Aegis\Framework\Integrations
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 */

declare( strict_types=1 );

namespace Aegis\Framework\Integrations;

use Aegis\Container\Interfaces\Conditional;
use Aegis\Framework\InlineAssets\Styleable;
use Aegis\Framework\InlineAssets\Styles;
use WP_Block_Type_Registry;
use function class_exists;

class CodeBlockPro implements Conditional, Styleable {

	/**
	 * Condition.
	 *
	 * Code Block Pro does not define CODE_BLOCK_PRO_VERSION. Prefer the
	 * plugin helper when the Aegis plugin is loaded.
	 *
	 * @since 1.0.0
	 *
	 * @return bool
	 */
	public static function condition(): bool {
		if ( class_exists( \Aegis\Plugin\Integrations\CodeBlockPro::class ) ) {
			return \Aegis\Plugin\Integrations\CodeBlockPro::is_plugin_active();
		}

		if ( class_exists( 'CBPRouter' ) ) {
			return true;
		}

		return class_exists( WP_Block_Type_Registry::class )
			&& WP_Block_Type_Registry::get_instance()->is_registered( 'kevinbatdorf/code-block-pro' );
	}

	/**
	 * Register styles.
	 *
	 * @since 1.0.0
	 *
	 * @param Styles $styles The styles instance.
	 *
	 * @return void
	 */
	public function styles( Styles $styles ): void {
		$styles->add_file(
			'plugins/code-block-pro.css',
			[
				'wp-block-kevinbatdorf-code-block-pro',
			]
		);
	}
}
