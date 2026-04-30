<?php
/**
 * Query Layout Block Setting
 *
 * Provides responsive layout controls for the core/query block.
 *
 * Responsibilities:
 * - Registers layout attributes on the core/query block for responsive
 *   columns, gap controls, featured-first post, and equal-height cards
 * - Renders CSS custom properties and modifier classes onto the query
 *   wrapper element via DOM manipulation
 * - Injects inline CSS for the grid layout, featured-first span,
 *   and equal-height flex rules via the Styleable interface
 * - Supplies breakpoint data to the editor via the Scriptable interface
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
declare( strict_types=1 );

// Declares the namespace for block settings within the Aegis Framework.
namespace Aegis\Framework\BlockSettings;

// Imports classes, interfaces, and functions used throughout this file.
use Aegis\Dom\CSS;
use Aegis\Dom\DOM;
use Aegis\Framework\InlineAssets\Scriptable;
use Aegis\Framework\InlineAssets\Scripts;
use Aegis\Framework\InlineAssets\Styleable;
use Aegis\Framework\InlineAssets\Styles;
use Aegis\Framework\Interfaces\Renderable;
use WP_Block;
use function add_filter;
use function array_merge;
use function explode;
use function file_exists;
use function file_get_contents;
use function implode;
use function is_admin;

/**
 * Query Loop layout enhancements.
 *
 * Extends the core/query block with responsive grid layout controls.
 * Column counts for mobile, tablet, and desktop breakpoints are stored
 * as block attributes and output as CSS custom properties consumed by
 * the inline grid stylesheet. Additional features include configurable
 * row/column gaps, a featured-first post spanning multiple columns,
 * and equal-height card layout using flexbox.
 *
 * All CSS values are sanitized against injection patterns before being
 * written to the DOM. Column counts are clamped to 0–12.
 *
 * @since 1.0.0
 */
class QueryLayout implements Renderable, Scriptable, Styleable {

	/**
	 * Query block layout attributes to register.
	 *
	 * Merged into the core/query block's attribute schema via the
	 * `register_block_type_args` filter. Each key maps to a CSS
	 * custom property or modifier class applied by {@see render()}.
	 *
	 * @since 1.0.0
	 *
	 * @var array<string, array{type: string, default: mixed}>
	 */
	private array $attributes = [
		// Responsive columns
		'aegisColumnsMobile' => [
			'type'    => 'number',
			'default' => 1,
		],
		'aegisColumnsTablet' => [
			'type'    => 'number',
			'default' => 2,
		],
		'aegisColumnsDesktop' => [
			'type'    => 'number',
			'default' => 3,
		],
		// Gap controls
		'aegisRowGap' => [
			'type'    => 'string',
			'default' => '',
		],
		'aegisColumnGap' => [
			'type'    => 'string',
			'default' => '',
		],
		// Featured first post
		'aegisFeaturedFirst' => [
			'type'    => 'boolean',
			'default' => false,
		],
		'aegisFeaturedFirstSpan' => [
			'type'    => 'number',
			'default' => 2,
		],
		// Equal height
		'aegisEqualHeight' => [
			'type'    => 'boolean',
			'default' => false,
		],
	];

	/**
	 * Constructor.
	 *
	 * Registers the `register_block_type_args` filter to inject
	 * layout attributes into the core/query block.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		add_filter( 'register_block_type_args', [ $this, 'add_attributes' ], 10, 2 );
	}

	/**
	 * Add custom attributes to the core/query block.
	 *
	 * Merges the layout attributes into the block's schema.
	 * Only targets `core/query`; all other block types pass
	 * through unmodified.
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
	public function add_attributes( array $args, string $block_type ): array {
		if ( $block_type !== 'core/query' ) {
			return $args;
		}

		if ( ! isset( $args['attributes'] ) ) {
			$args['attributes'] = [];
		}

		$args['attributes'] = array_merge( $args['attributes'], $this->attributes );

		return $args;
	}

	/**
	 * Render the block with layout enhancements.
	 *
	 * Reads layout attributes, sanitizes them, and applies the
	 * corresponding CSS custom properties and modifier classes to
	 * the query wrapper `<div>`. Returns unmodified content when
	 * no layout enhancements are active.
	 *
	 * Processing order: responsive columns → gap values →
	 * featured-first span → equal-height class.
	 *
	 * @since 1.0.0
	 *
	 * @hook  render_block_core/query
	 *
	 * @param string   $block_content The original block HTML.
	 * @param array    $block         The parsed block array.
	 * @param WP_Block $instance      The block instance.
	 *
	 * @return string Modified block HTML with layout properties.
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		$attrs = $block['attrs'] ?? [];

		// Check if any layout enhancements are enabled
		$columns_mobile  = $this->sanitize_column_count( $attrs['aegisColumnsMobile'] ?? 0 );
		$columns_tablet  = $this->sanitize_column_count( $attrs['aegisColumnsTablet'] ?? 0 );
		$columns_desktop = $this->sanitize_column_count( $attrs['aegisColumnsDesktop'] ?? 0 );
		$row_gap         = $this->sanitize_css_value( $attrs['aegisRowGap'] ?? '' );
		$column_gap      = $this->sanitize_css_value( $attrs['aegisColumnGap'] ?? '' );
		$featured_first  = $attrs['aegisFeaturedFirst'] ?? false;
		$equal_height    = $attrs['aegisEqualHeight'] ?? false;

		$has_enhancements = $columns_mobile > 0 || $columns_tablet > 0 || $columns_desktop > 0 ||
		                    ! empty( $row_gap ) || ! empty( $column_gap ) ||
		                    $featured_first || $equal_height;

		if ( ! $has_enhancements ) {
			return $block_content;
		}

		$dom = DOM::create( $block_content );
		$div = DOM::get_element( 'div', $dom );

		if ( ! $div ) {
			return $block_content;
		}

		// Get existing classes and styles
		$classes = explode( ' ', $div->getAttribute( 'class' ) );
		$styles  = CSS::string_to_array( $div->getAttribute( 'style' ) );

		// Add layout class
		$classes[] = 'aegis-query-layout';

		// Add responsive column CSS variables
		if ( $columns_mobile > 0 ) {
			$styles['--aegis-query-columns-mobile'] = (string) $columns_mobile;
		}
		if ( $columns_tablet > 0 ) {
			$styles['--aegis-query-columns-tablet'] = (string) $columns_tablet;
		}
		if ( $columns_desktop > 0 ) {
			$styles['--aegis-query-columns-desktop'] = (string) $columns_desktop;
		}

		// Add gap CSS variables
		if ( ! empty( $row_gap ) ) {
			$styles['--aegis-query-row-gap'] = CSS::format_custom_property( $row_gap );
		}
		if ( ! empty( $column_gap ) ) {
			$styles['--aegis-query-column-gap'] = CSS::format_custom_property( $column_gap );
		}

		// Add featured first class
		if ( $featured_first ) {
			$classes[] = 'aegis-query-featured-first';
			$featured_span = $this->sanitize_column_count( $attrs['aegisFeaturedFirstSpan'] ?? 2 );
			if ( $featured_span < 2 ) {
				$featured_span = 2;
			}
			$styles['--aegis-query-featured-span'] = (string) $featured_span;
		}

		// Add equal height class
		if ( $equal_height ) {
			$classes[] = 'aegis-query-equal-height';
		}

		// Apply classes and styles
		$div->setAttribute( 'class', implode( ' ', array_unique( $classes ) ) );
		$div->setAttribute( 'style', CSS::array_to_string( $styles ) );

		return $dom->saveHTML();
	}

	/**
	 * Add editor data for layout controls.
	 *
	 * Passes the responsive breakpoint values to the editor script
	 * so the column controls can display the corresponding viewport
	 * widths. Only loaded in the admin context.
	 *
	 * @since 1.0.0
	 *
	 * @param Scripts $scripts Inline scripts service instance.
	 *
	 * @return void
	 */
	public function scripts( Scripts $scripts ): void {
		$scripts->add_data(
			'queryLayout',
			[
				'breakpoints' => [
					'mobile'  => '480px',
					'tablet'  => '782px',
					'desktop' => '1024px',
				],
			],
			[],
			is_admin()
		);
	}

	/**
	 * Add layout styles.
	 *
	 * Loads the query layout CSS from an external file following
	 * the framework's separation of concerns pattern. The CSS file
	 * contains grid layout rules, responsive breakpoints,
	 * featured-first span, and equal-height flex styles.
	 *
	 * @since 1.0.0
	 *
	 * @param Styles $styles Inline styles service instance.
	 *
	 * @return void
	 */
	public function styles( Styles $styles ): void {
		$file = $styles->dir . 'core-blocks/query-layout.css';
		if ( file_exists( $file ) ) {
			$styles->add_callback( fn() => file_get_contents( $file ) );
		}
	}

	/**
	 * Sanitize a column count to a positive integer within range.
	 *
	 * Casts the input to an integer and clamps it between 0 and 12.
	 * A value of 0 indicates no override for that breakpoint.
	 *
	 * @since 1.0.0
	 *
	 * @param mixed $value Raw value from block attributes.
	 *
	 * @return int Clamped column count (0–12).
	 */
	private function sanitize_column_count( mixed $value ): int {
		$count = (int) $value;
		return max( 0, min( 12, $count ) );
	}

	/**
	 * Sanitize a CSS value to prevent injection.
	 *
	 * Allows only safe CSS value patterns: numbers with units,
	 * `var()` / `calc()` / `clamp()` / `min()` / `max()` functions,
	 * and WordPress preset format (`var:preset|spacing|50`). Rejects
	 * anything containing semicolons, braces, or other injection
	 * vectors by returning an empty string.
	 *
	 * @since 1.0.0
	 *
	 * @param string $value Raw CSS value from block attributes.
	 *
	 * @return string Validated CSS value or empty string on failure.
	 */
	private function sanitize_css_value( string $value ): string {
		$value = trim( $value );

		if ( $value === '' ) {
			return '';
		}

		// Reject values containing injection vectors.
		if ( preg_match( '/[;{}\\<>"\']/', $value ) ) {
			return '';
		}

		// Allow: numbers with units, var() references, calc(), clamp(), min(), max().
		if ( preg_match( '/^[\d.]+\s*(px|em|rem|%|vw|vh|ch|ex|cm|mm|in|pt|pc)$/', $value ) ) {
			return $value;
		}

		// Allow var() and CSS functions.
		if ( preg_match( '/^(var|calc|clamp|min|max)\(/', $value ) ) {
			return $value;
		}

		// Allow preset format: var:preset|spacing|50.
		if ( preg_match( '/^var:preset\|[a-zA-Z0-9-]+\|[a-zA-Z0-9-]+$/', $value ) ) {
			return $value;
		}

		return '';
	}
}
