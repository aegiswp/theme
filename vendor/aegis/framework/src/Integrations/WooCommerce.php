<?php
/**
 * WooCommerce Integration Component
 *
 * Provides support for integrating WooCommerce plugin compatibility in the Aegis Framework.
 *
 * Responsibilities:
 * - Checks for WooCommerce plugin presence and conditionally registers hooks
 * - Integrates with the Aegis container and hook system
 *
 * @package    Aegis\Framework\Integrations
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 */

// Enforces strict type checking for all code in this file, ensuring type safety for woocommerce integration component.
declare( strict_types=1 );

// Declares the namespace for the woocommerce integration component.
namespace Aegis\Framework\Integrations;

// Imports classes, interfaces, and functions used by the woocommerce integration component.
use Aegis\Container\Interfaces\Conditional;
use WP_Block_Patterns_Registry;
use function class_exists;
use function defined;
use function esc_html;
use function function_exists;
use function get_option;
use function is_array;
use function is_string;
use function preg_quote;
use function preg_replace;
use function str_contains;
use function str_starts_with;
use function trim;

class WooCommerce implements Conditional {

	/**
	 * Condition.
	 *
	 * @since 1.0.0
	 *
	 * @return bool
	 */
	public static function condition(): bool {
		if ( class_exists( \Aegis\Plugin\Integrations\WooCommerce::class ) ) {
			return \Aegis\Plugin\Integrations\WooCommerce::is_plugin_active();
		}

		return class_exists( 'WooCommerce' )
			|| function_exists( 'WC' )
			|| defined( 'WC_VERSION' );
	}

	/**
	 * Wrap the breadcrumb delimiter for styling and assistive technology.
	 *
	 * @param array $defaults WooCommerce breadcrumb defaults.
	 *
	 * @hook woocommerce_breadcrumb_defaults
	 *
	 * @return array
	 */
	public function wrap_breadcrumb_delimiter( array $defaults ): array {
		$delimiter = $defaults['delimiter'] ?? ' / ';

		if ( ! is_string( $delimiter ) || str_contains( $delimiter, 'aegis-breadcrumb-separator' ) ) {
			return $defaults;
		}

		$defaults['delimiter'] = $this->delimiter_markup( $delimiter );

		return $defaults;
	}

	/**
	 * Wrap Store Breadcrumbs separators the same way as classic breadcrumbs.
	 *
	 * @param string               $content Block HTML.
	 * @param array<string, mixed> $block   Block data.
	 *
	 * @hook render_block_woocommerce/breadcrumbs
	 */
	public function wrap_block_breadcrumb_delimiter( string $content, array $block ): string {
		if ( '' === $content || str_contains( $content, 'aegis-breadcrumb-separator' ) ) {
			return $content;
		}

		$separator = $block['attrs']['separator'] ?? '/';

		if ( ! is_string( $separator ) || '' === $separator ) {
			$separator = '/';
		}

		$inner = trim( $separator );

		if ( '' === $inner ) {
			$inner = '/';
		}

		$replaced = preg_replace(
			'/(<\/a>)(\s*)' . preg_quote( $inner, '/' ) . '(\s*)/u',
			'$1' . $this->delimiter_markup( $separator ),
			$content
		);

		return is_string( $replaced ) ? $replaced : $content;
	}

	/**
	 * Accessible delimiter markup for classic and block breadcrumbs.
	 */
	private function delimiter_markup( string $delimiter ): string {
		$inner = trim( $delimiter );

		if ( '' === $inner ) {
			$inner = '/';
		}

		return ' <span class="aegis-breadcrumb-separator" aria-hidden="true">' . esc_html( $inner ) . '</span> ';
	}

	/**
	 * Unregister WooCommerce plugin block patterns.
	 *
	 * Aegis commerce patterns replace WooCommerce's own patterns by default.
	 * Pro can keep WooCommerce plugin patterns via Integrations → WooCommerce
	 * Patterns (`woocommerce_keep_patterns`).
	 *
	 * Only `woocommerce/`-namespaced patterns are removed so Aegis companion
	 * slugs are never unregistered.
	 *
	 * @since 1.0.0
	 *
	 * @hook init 11
	 *
	 * @return void
	 */
	public function unregister_woocommerce_block_patterns(): void {
		$control = get_option( 'aegis_pattern_control', [] );
		$keep    = is_array( $control ) && ! empty( $control['woocommerce_keep_patterns'] );

		if ( $keep && defined( 'AEGIS_PRO_VERSION' ) ) {
			return;
		}

		$registry   = WP_Block_Patterns_Registry::get_instance();
		$registered = $registry->get_all_registered();

		foreach ( $registered as $pattern ) {
			$name = $pattern['name'];

			if ( str_starts_with( $name, 'woocommerce/' ) ) {
				$registry->unregister( $name );
			}
		}
	}
}
