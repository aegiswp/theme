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
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file.
declare(strict_types=1);

// Declares the namespace for block settings within the Aegis Framework.
namespace Aegis\Framework\BlockSettings;

// Imports classes, interfaces, and functions used throughout this file.
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
 * Global Classes block setting.
 *
 * Adds an `aegisClasses` attribute to every registered block type,
 * allowing users to apply arbitrary utility CSS classes from the
 * block editor. On render, the stored class string is parsed,
 * validated against a safe character pattern, and merged onto the
 * block's root element via DOM manipulation.
 *
 * Editor-side autocomplete suggestions are provided by passing the
 * available class list from {@see UtilityClasses::get_class_list()}
 * through the {@see Scriptable} interface.
 *
 * @since 1.0.0
 */
class GlobalClasses implements Renderable, Scriptable {

	/**
	 * Constructor.
	 *
	 * Registers the `register_block_type_args` filter to inject
	 * the `aegisClasses` attribute into every block type.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		add_filter( 'register_block_type_args', [ $this, 'add_attribute' ], 10, 2 );
	}

	/**
	 * Add aegisClasses attribute to all blocks.
	 *
	 * Injects a string-typed `aegisClasses` attribute with an
	 * empty default into every block's attribute schema.
	 *
	 * @since 1.0.0
	 *
	 * @hook  register_block_type_args
	 *
	 * @param array  $args       Block type arguments.
	 * @param string $block_type Block type name.
	 *
	 * @return array Modified block type arguments.
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
	 * Passes the full list of available utility classes to the
	 * editor script so the autocomplete input can offer suggestions.
	 * Only loaded in the admin context.
	 *
	 * @since 1.0.0
	 *
	 * @param Scripts $scripts Inline scripts service instance.
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
	 * Render the block with additional CSS classes.
	 *
	 * Parses the `aegisClasses` attribute, validates each class
	 * name, and merges them onto the block's root DOM element.
	 * Returns unmodified content when no classes are set or the
	 * block has no root element.
	 *
	 * @since 1.0.0
	 *
	 * @hook  render_block
	 *
	 * @param string   $block_content The original block HTML.
	 * @param array    $block         The parsed block array.
	 * @param WP_Block $instance      The block instance.
	 *
	 * @return string Modified block HTML with merged classes.
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
	 * Parse and validate a class string.
	 *
	 * Splits the input on spaces, trims whitespace, and filters
	 * each token against a regex that permits only CSS-safe
	 * identifiers (letters, digits, hyphens, underscores).
	 *
	 * @since 1.0.0
	 *
	 * @param string $class_string Space-separated class names.
	 *
	 * @return string[] Array of validated class names.
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
