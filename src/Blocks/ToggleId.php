<?php
/**
 * Stable DOM id for Toggle switchers (persist, ARIA).
 *
 * @package Aegis
 * @since   1.1.0
 */

declare(strict_types=1);

namespace Aegis\Blocks;

use WP_Block;

use function is_array;
use function is_string;
use function md5;
use function preg_replace;
use function sanitize_title;
use function serialize_blocks;
use function substr;
use function wp_json_encode;
use function wp_unique_id;

/**
 * Builds a stable `data-toggle-id` from anchor, saved instanceId, or inner source.
 */
final class ToggleId {

	/**
	 * @param array<string, mixed> $attributes Block attributes.
	 */
	public static function from_block( ?WP_Block $block, array $attributes, string $rendered_inner = '' ): string {
		$inner = '';

		if ( $block instanceof WP_Block && isset( $block->parsed_block['innerBlocks'] ) && is_array( $block->parsed_block['innerBlocks'] ) ) {
			$inner = serialize_blocks( $block->parsed_block['innerBlocks'] );
		} elseif ( $rendered_inner !== '' ) {
			$inner = $rendered_inner;
		}

		return self::from_attributes( $attributes, $inner );
	}

	/**
	 * @param array<string, mixed> $attributes Block attributes.
	 */
	public static function from_attributes( array $attributes, string $inner_source = '' ): string {
		$anchor   = isset( $attributes['anchor'] ) && is_string( $attributes['anchor'] ) ? $attributes['anchor'] : '';
		$instance = isset( $attributes['instanceId'] ) && is_string( $attributes['instanceId'] ) ? $attributes['instanceId'] : '';
		$id       = '';

		if ( $anchor !== '' ) {
			$id = 'aegis-toggle-' . sanitize_title( $anchor );
		} elseif ( $instance !== '' ) {
			$safe = preg_replace( '/[^A-Za-z0-9_-]/', '', $instance );
			$id   = is_string( $safe ) && $safe !== '' ? 'aegis-toggle-' . $safe : '';
		} else {
			$json = wp_json_encode( $attributes );
			$hash = md5( ( is_string( $json ) ? $json : '' ) . $inner_source );
			$id   = 'aegis-toggle-' . substr( $hash, 0, 12 );
		}

		if ( $id === '' || $id === 'aegis-toggle-' ) {
			$id = 'aegis-toggle-' . wp_unique_id();
		}

		return $id;
	}
}
