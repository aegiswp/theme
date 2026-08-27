<?php
/**
 * Registers extended attributes on core/icon.
 *
 * @package Aegis\Framework\CoreBlocks
 * @since   1.0.0
 */

// Enforces strict type checking for all code in this file, ensuring type safety for registers extended attributes on core/icon.
declare( strict_types=1 );

// Declares the namespace for the registers extended attributes on core/icon.
namespace Aegis\Framework\CoreBlocks;

// Imports classes, interfaces, and functions used by the registers extended attributes on core/icon.
use function array_merge;

/**
 * Adds Aegis-specific attributes to the core/icon block type.
 */
class IconBlockAttributes {

	/**
	 * Extended block attributes.
	 *
	 * @var array<string, array<string, mixed>>
	 */
	private const ATTRIBUTES = [
		'gradient' => [
			'type' => 'string',
		],
		'url' => [
			'type' => 'string',
		],
		'linkTarget' => [
			'type' => 'string',
		],
		'rel' => [
			'type' => 'string',
		],
		'animation' => [
			'type' => 'string',
		],
	];

	/**
	 * Registers attribute filter.
	 */
	public function __construct() {
		// Skip registration when core/icon is unavailable.
		if ( version_compare( get_bloginfo( 'version' ), '7.0', '<' ) ) {
			return;
		}

		add_filter( 'register_block_type_args', [ $this, 'add_attributes' ], 10, 2 );
	}

	/**
	 * @param array<string, mixed> $args       Block type arguments.
	 * @param string               $block_type Block name.
	 *
	 * @return array<string, mixed>
	 */
	public function add_attributes( array $args, string $block_type ): array {
		// Only extend the core/icon block type.
		if ( $block_type !== 'core/icon' ) {
			return $args;
		}

		// Ensure an attributes array exists before merging.
		if ( ! isset( $args['attributes'] ) || ! is_array( $args['attributes'] ) ) {
			$args['attributes'] = [];
		}

		// Merge Aegis-specific attributes into the block schema.
		$args['attributes'] = array_merge( $args['attributes'], self::ATTRIBUTES );

		return $args;
	}
}
