<?php
/**
 * BbPress Integration Component
 *
 * Provides support for integrating bbPress plugin compatibility in the Aegis Framework.
 *
 * Responsibilities:
 * - Checks for bbPress plugin presence and conditionally adds theme compatibility
 * - Registers Aegis forum styles and dequeues bbPress default CSS
 * - Integrates with the Aegis container and conditional system
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
use function class_exists;
use function is_bbpress;
use function locate_block_template;
use function wp_dequeue_style;

class BbPress implements Conditional, Styleable {

	/**
	 * Condition.
	 *
	 * @since 1.0.0
	 *
	 * @return bool
	 */
	public static function condition(): bool {
		return class_exists( 'bbPress' );
	}

	/**
	 * Register styles.
	 *
	 * @since 1.0.0
	 *
	 * @param Styles $styles Styles instance.
	 *
	 * @return void
	 */
	public function styles( Styles $styles ): void {
		$styles->add_file(
			'plugins/bbpress.css',
			array(
				'bbpress-forums',
				'bbp-forum',
				'bbp-topic',
				'bbp-reply',
				'bbp-breadcrumb',
			)
		);
	}

	/**
	 * Dequeue bbPress default CSS so Aegis tokens apply.
	 *
	 * @since 1.0.0
	 *
	 * @hook  bbp_enqueue_scripts
	 *
	 * @return void
	 */
	public function dequeue_default_styles(): void {
		wp_dequeue_style( 'bbp-default' );
		wp_dequeue_style( 'bbp-default-rtl' );
	}

	/**
	 * Serve the FSE page template instead of bbPress PHP theme-compat.
	 *
	 * @since 1.0.0
	 *
	 * @param string $template PHP fallback from bbPress theme compat.
	 *
	 * @hook  bbp_template_include_theme_compat
	 *
	 * @return string
	 */
	public function bbpress_template( string $template ): string {
		if ( ! is_bbpress() ) {
			return $template;
		}

		return locate_block_template( $template, 'page', array( 'page.php' ) );
	}
}
