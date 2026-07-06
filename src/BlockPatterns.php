<?php
/**
 * Theme-owned block pattern registration bridge.
 *
 * Custom patterns live in /patterns and are orchestrated on `init` by
 * Aegis\Framework\DesignSystem\Patterns. WordPress core's built-in pattern loader is
 * disabled to avoid slug conflicts (see theme_block_pattern_files filter).
 *
 * @package Aegis
 * @since   1.0.0
 */

declare( strict_types=1 );

namespace Aegis;

use Aegis\Utilities\Pattern;
use function register_block_pattern;
use function register_block_pattern_category;

/**
 * Block pattern registration helpers.
 */
final class BlockPatterns {

	/**
	 * Register a block pattern category.
	 *
	 * @param string               $slug         Category slug.
	 * @param array<string, mixed> $properties Category properties (e.g. label).
	 */
	public static function register_category( string $slug, array $properties ): void {
		register_block_pattern_category( $slug, $properties );
	}

	/**
	 * Register a block pattern.
	 *
	 * @param string               $slug         Namespaced pattern slug.
	 * @param array<string, mixed> $properties Pattern properties.
	 *
	 * @return bool True when registered successfully.
	 */
	public static function register( string $slug, array $properties ): bool {
		return register_block_pattern( $slug, $properties );
	}

	/**
	 * Parse a pattern PHP file and register it with WordPress.
	 *
	 * @param string $file Absolute path to a pattern file under /patterns.
	 */
	public static function register_from_file( string $file ): void {
		Pattern::register_from_file( $file );
	}
}
