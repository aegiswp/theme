<?php

// Enforces strict type checking for all code in this file, ensuring type safety for block utility helpers.
declare( strict_types=1 );

// Declares the namespace for the block utility helpers.
namespace Aegis\Utilities;

// Imports classes, interfaces, and functions used by the block utility helpers.
use Aegis\Dom\CSS;
use WP;
use function implode;
use function is_admin;
use function parse_blocks;
use function render_block;
use function serialize_block;
use function str_contains;
use function strip_core_block_namespace;

/**
 * Block utility class for handling WordPress block-related operations.
 *
 * This class provides static methods for searching blocks, checking the rendering
 * context, and generating HTML from block data structures.
 *
 * @since 1.0.0
 */
class Block {

	/**
	 * Recursively searches an array of blocks for a specific block type.
	 *
	 * @since 1.0.0
	 *
	 * @param array  $blocks The array of blocks to search through.
	 * @param string $type   The block type to search for (e.g., 'core/paragraph').
	 *
	 * @return array An array of block arrays that match the specified type.
	 */
	public static function search_blocks( array $blocks, string $type ): array {
		$found = [];

		foreach ( $blocks as $block ) {
			// Collect blocks matching the requested type.
			if ( $block['blockName'] === $type ) {
				$found[] = $block;
			}

			// Recursively search inner blocks.
			if ( ! empty( $block['innerBlocks'] ) ) {
				$found = array_merge( $found, self::search_blocks( $block['innerBlocks'], $type ) );
			}
		}

		return $found;
	}

	/**
	 * Determines if the current context is a block preview being rendered in the editor.
	 *
	 * This is useful for applying different logic when a block is rendered in the
	 * editor versus the front end.
	 *
	 * @since 1.0.0
	 *
	 * @return bool True if rendering a block preview in the editor, false otherwise.
	 */
	public static function is_rendering_preview(): bool {
		// Admin requests are always treated as previews.
		if ( is_admin() ) {
			return true;
		}

		// Require an authenticated REST request.
		if ( ! defined( 'REST_REQUEST' ) || ! is_user_logged_in() ) {
			return false;
		}

		global $wp;

		if ( ! $wp instanceof WP || empty( $wp->query_vars['rest_route'] ) ) {
			return false;
		}

		$route = $wp->query_vars['rest_route'];

		// Check for the block renderer REST endpoint.
		return str_contains( $route, '/block-renderer/' );
	}

	/**
	 * Generates HTML from a block array, with an option to fully render it.
	 *
	 * This method reconstructs the block's HTML from its attributes and inner
	 * blocks. It can return either the serialized block comment or the fully
	 * rendered HTML.
	 *
	 * @since 1.0.0
	 *
	 * @param array $block  The block array.
	 * @param bool  $render If true, the block will be rendered using `render_block`.
	 *
	 * @return string The serialized or rendered block HTML.
	 */
	public static function get_html( array $block, bool $render = false ): string {
		// Ensure required block structure keys exist.
		$block['innerContent'] = $block['innerContent'] ?? [];
		$block['innerHTML']    = $block['innerHTML'] ?? '';
		$block['innerBlocks']  = $block['innerBlocks'] ?? [];
		$name                  = strip_core_block_namespace( $block['blockName'] ?? '' );

		// Return serialized markup when no wrapper is needed.
		if ( ! $name || empty( $block['innerBlocks'] ) ) {
			return serialize_block( $block );
		}

		// Build wrapper class names from block attributes.
		$classes = array_filter( [
			'wp-block-' . $name,
			$block['attrs']['className'] ?? null,
			isset( $block['attrs']['fontSize'] ) ? 'has-' . $block['attrs']['fontSize'] . '-font-size' : null,
			isset( $block['attrs']['textColor'] ) ? 'has-' . $block['attrs']['textColor'] . '-color' : null,
			isset( $block['attrs']['backgroundColor'] ) ? 'has-' . $block['attrs']['backgroundColor'] . '-background-color' : null,
		] );

		$styles = array_filter( [
			'gap' => $block['attrs']['style']['spacing']['blockGap'] ?? null,
		] );

		// Wrap inner blocks with opening and closing tags.
		$tag     = $block['tagName'] ?? $block['attrs']['tagName'] ?? 'div';
		$opening = sprintf(
			'<%s class="%s" style="%s">',
			$tag, implode( ' ', $classes ),
			CSS::array_to_string( $styles )
		);
		$closing = sprintf( '</%s>', $tag );

		$inner_content = $block['innerContent'];
		array_unshift( $inner_content, $opening );
		$inner_content[] = $closing;

		// Recursively append serialized inner block HTML.
		foreach ( $block['innerBlocks'] as $inner_block ) {
			$inner_content[] = static::get_html( $inner_block );
		}

		$block['innerContent'] = $inner_content;
		$block['innerHTML']    = implode( '', $inner_content );

		// Optionally render the block through WordPress.
		$serialized   = serialize_block( $block );
		$parsed_block = parse_blocks( $serialized )[0];

		return $render ? render_block( $parsed_block ) : $serialized;
	}
}
