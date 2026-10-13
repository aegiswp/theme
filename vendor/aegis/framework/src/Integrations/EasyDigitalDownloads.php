<?php
/**
 * Easy Digital Downloads Integration Component
 *
 * Overlay CSS for EDD blocks, checkout, cart, and download purchase forms
 * when the Aegis integration is on.
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
use function defined;
use function function_exists;

class EasyDigitalDownloads implements Conditional, Styleable {

	/**
	 * Condition.
	 *
	 * Prefer the plugin helper when the Aegis plugin is loaded.
	 *
	 * @since 1.0.0
	 *
	 * @return bool
	 */
	public static function condition(): bool {
		if ( class_exists( \Aegis\Plugin\Integrations\EasyDigitalDownloads::class ) ) {
			return \Aegis\Plugin\Integrations\EasyDigitalDownloads::is_plugin_active();
		}

		return class_exists( 'Easy_Digital_Downloads' )
			|| function_exists( 'EDD' )
			|| defined( 'EDD_VERSION' );
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
			'plugins/edd/edd.css',
			[
				'edd-blocks',
				'wp-block-edd',
				'edd-submit',
				'edd_download',
				'edd-alert',
			]
		);
	}
}
