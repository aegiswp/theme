<?php
/**
 * Global Classes Block Setting
 *
 * Provides support for applying utility CSS classes to blocks within the Aegis Framework.
 *
 * Responsibilities:
 * - Registers the aegisClasses attribute on all blocks
 * - Handles the rendering of additional CSS classes for block content
 * - Integrates with the Renderable interface for block output
 *
 * @package    Aegis\Framework\BlockSettings
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 */

declare(strict_types=1);

namespace Aegis\Framework\BlockSettings;

use Aegis\Dom\DOM;
use Aegis\Framework\DesignSystem\UtilityClasses;
use Aegis\Framework\InlineAssets\Scriptable;
use Aegis\Framework\InlineAssets\Scripts;
use Aegis\Framework\Interfaces\Renderable;
use WP_Block;
use function add_filter;
use function array_filter;
use function array_map;
use function array_merge;
use function array_unique;
use function explode;
use function implode;
use function is_admin;
use function preg_match;
use function trim;
use function wp_json_encode;

/**
 * Handles the Global Classes block setting.
 *
 * @since 1.0.0
 */
class GlobalClasses implements Renderable, Scriptable {

	/**
	 * Constructor - registers the attribute filter.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		add_filter( 'register_block_type_args', [ $this, 'add_attribute' ], 10, 2 );
	}

	/**
	 * Add aegisClasses attribute to all blocks.
	 *
	 * @since 1.0.0
	 *
	 * @param array  $args       Block type arguments.
	 * @param string $block_type Block type name.
	 *
	 * @hook register_block_type_args
	 *
	 * @return array
	 */
	public function add_attribute( array $args, string $block_type ): array {
		if ( ! isset( $args['attributes'] ) ) {
			$args['attributes'] = [];
		}

		$args['attributes']['aegisClasses'] = [
			'type'    => 'string',
			'default' => '',
		];

		return $args;
	}

	/**
	 * Add editor data for class suggestions.
	 *
	 * @since 1.0.0
	 *
	 * @param Scripts $scripts Scripts service.
	 *
	 * @return void
	 */
	public function scripts( Scripts $scripts ): void {
		$scripts->add_data(
			'globalClasses',
			[
				'classes' => UtilityClasses::get_class_list(),
			],
			[],
			is_admin()
		);
	}

	/**
	 * Renders the block with additional CSS classes.
	 *
	 * @since 1.0.0
	 *
	 * @param string   $block_content The original block content.
	 * @param array    $block         The full block object.
	 * @param WP_Block $instance      The block instance.
	 *
	 * @hook render_block
	 *
	 * @return string The modified block content.
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		$attrs         = $block['attrs'] ?? [];
		$aegis_classes = $attrs['aegisClasses'] ?? '';

		if ( empty( $aegis_classes ) ) {
			return $block_content;
		}

		$dom   = DOM::create( $block_content );
		$first = DOM::get_element( '*', $dom );

		if ( ! $first ) {
			return $block_content;
		}

		// Get existing classes
		$existing_classes = $first->getAttribute( 'class' );
		$existing_array   = array_filter( explode( ' ', $existing_classes ) );

		// Parse and validate new classes
		$new_classes = $this->parse_classes( $aegis_classes );

		if ( empty( $new_classes ) ) {
			return $block_content;
		}

		// Merge and deduplicate
		$all_classes = array_unique( array_merge( $existing_array, $new_classes ) );

		$first->setAttribute( 'class', implode( ' ', $all_classes ) );

		return $dom->saveHTML();
	}

	/**
	 * Parse and validate class string.
	 *
	 * @since 1.0.0
	 *
	 * @param string $class_string Space-separated class names.
	 *
	 * @return array Valid class names.
	 */
	private function parse_classes( string $class_string ): array {
		$classes = explode( ' ', $class_string );
		$classes = array_map( 'trim', $classes );
		$classes = array_filter( $classes );

		// Validate class names (alphanumeric, hyphens, underscores)
		$valid_classes = [];
		foreach ( $classes as $class ) {
			if ( preg_match( '/^[a-zA-Z_-][a-zA-Z0-9_-]*$/', $class ) ) {
				$valid_classes[] = $class;
			}
		}

		return $valid_classes;
	}
}
