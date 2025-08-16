<?php
/**
 * LemonSqueezy Integration Component
 *
 * Provides support for integrating Lemon Squeezy plugin compatibility in the Aegis Framework.
 *
 * Responsibilities:
 * - Checks for Lemon Squeezy plugin presence and conditionally renders buttons
 * - Integrates with the Aegis container and DOM utilities
 *
 * @package    Aegis\Framework\Integrations
 * @since      1.0.0
 * @author     @atmostfear-entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for integration components.
declare( strict_types=1 );

// Declares the namespace for integration components within the Aegis Framework.
namespace Aegis\Framework\Integrations;

// Imports interfaces, DOM utilities, and helpers for conditional logic and plugin detection.
use Aegis\Container\Interfaces\Conditional;
use Aegis\Dom\DOM;
use function array_filter;
use function defined;
use function explode;
use function implode;

// Implements the LemonSqueezy integration class for the design system.

class LemonSqueezy implements Conditional {

	/**
	 * Condition.
	 *
	 * @since 1.0.0
	 *
	 * @return bool
	 */
	public static function condition(): bool {
		return defined( 'LSQ_PATH' );
	}

	/**
	 * Renders a Lemon Squeezy button.
	 *
	 * @param string $html Block HTML.
	 *
	 * @hook render_block_lemonsqueezy/ls-button
	 *
	 * @return string
	 */
	public function render_lemonsqueezy_button( string $html ): string {
		$dom    = DOM::create( $html );
		$div    = DOM::get_element( 'div', $dom );
		$button = DOM::get_element( 'div', $div );
		$link   = DOM::get_element( 'a', $button );

		if ( ! $link ) {
			return $html;
		}

		$link_classes = [
			'wp-element-button',
			...explode( ' ', $link->getAttribute( 'class' ) ),
		];

		$link_classes = array_filter(
			$link_classes,
			static fn( $class ) => $class !== 'wp-block-button__link'
		);

		$link->setAttribute( 'class', implode( ' ', $link_classes ) );

		return $dom->saveHTML();
	}
}
