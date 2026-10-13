<?php
/**
 * Helper for firing injection hooks around buffered output.
 *
 * @package Aegis\Framework\Traits
 * @since   1.0.0
 */

declare( strict_types=1 );

namespace Aegis\Framework\Traits;

use function do_action;
use function ob_get_clean;
use function ob_start;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Wraps output with before/after do_action calls.
 */
trait InjectionPoints {

	/**
	 * Fire a hook, capture echoed output, fire after hook, return combined string.
	 *
	 * @param string $before_hook Hook fired before output.
	 * @param string $after_hook  Hook fired after output.
	 * @param string $content     Content to wrap.
	 */
	protected function wrap_with_injection_hooks( string $before_hook, string $after_hook, string $content ): string {
		ob_start();
		do_action( $before_hook );
		$before = (string) ob_get_clean();

		ob_start();
		do_action( $after_hook );
		$after = (string) ob_get_clean();

		return $before . $content . $after;
	}
}
