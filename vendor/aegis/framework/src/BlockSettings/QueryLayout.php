<?php
/**
 * Query Layout Block Setting
 *
 * Provides responsive layout controls for the core/query block including
 * responsive columns, gap controls, featured first post, and equal height.
 *
 * @package    Aegis\Framework\BlockSettings
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 */

declare( strict_types=1 );

namespace Aegis\Framework\BlockSettings;

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
use function implode;
use function is_admin;
use function sprintf;

/**
 * Handles Query Loop layout enhancements.
 *
 * @since 1.0.0
 */
class QueryLayout implements Renderable, Scriptable, Styleable {

	/**
	 * Query block layout attributes to register.
	 *
	 * @var array
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
	 * Constructor - registers filters.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		add_filter( 'register_block_type_args', [ $this, 'add_attributes' ], 10, 2 );
	}

	/**
	 * Add custom attributes to core/query block.
	 *
	 * @since 1.0.0
	 *
	 * @param array  $args       Block type arguments.
	 * @param string $block_type Block type name.
	 *
	 * @return array
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
	 * Renders the block with layout enhancements.
	 *
	 * @since 1.0.0
	 *
	 * @param string   $block_content The original block content.
	 * @param array    $block         The full block object.
	 * @param WP_Block $instance      The block instance.
	 *
	 * @hook render_block_core/query
	 *
	 * @return string The modified block content.
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
	 * @since 1.0.0
	 *
	 * @param Scripts $scripts Scripts service.
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
	 * @since 1.0.0
	 *
	 * @param Styles $styles Styles service.
	 *
	 * @return void
	 */
	public function styles( Styles $styles ): void {
		$css = $this->get_layout_css();
		$styles->add_callback( fn() => $css );
	}

	/**
	 * Sanitize a column count to a positive integer within range.
	 *
	 * @since 1.0.0
	 *
	 * @param mixed $value Raw value.
	 *
	 * @return int
	 */
	private function sanitize_column_count( mixed $value ): int {
		$count = (int) $value;
		return max( 0, min( 12, $count ) );
	}

	/**
	 * Sanitize a CSS value to prevent injection (QL1).
	 *
	 * Allows only safe CSS value patterns: numbers, units, CSS functions,
	 * and custom properties. Rejects anything containing semicolons,
	 * braces, or other injection vectors.
	 *
	 * @since 1.0.0
	 *
	 * @param string $value Raw CSS value.
	 *
	 * @return string Sanitized value or empty string.
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

	private function get_layout_css(): string {
		return '
/* Query Layout Enhancements */
.aegis-query-layout .wp-block-post-template {
	display: grid;
	gap: var(--aegis-query-row-gap, var(--wp--style--block-gap, 1.5rem)) var(--aegis-query-column-gap, var(--wp--style--block-gap, 1.5rem));
	grid-template-columns: repeat(var(--aegis-query-columns-mobile, 1), 1fr);
}

@media (min-width: 782px) {
	.aegis-query-layout .wp-block-post-template {
		grid-template-columns: repeat(var(--aegis-query-columns-tablet, 2), 1fr);
	}
}

@media (min-width: 1024px) {
	.aegis-query-layout .wp-block-post-template {
		grid-template-columns: repeat(var(--aegis-query-columns-desktop, 3), 1fr);
	}
}

/* Featured First Post */
.aegis-query-featured-first .wp-block-post-template > .wp-block-post:first-child {
	grid-column: span var(--aegis-query-featured-span, 2);
}

@media (max-width: 781px) {
	.aegis-query-featured-first .wp-block-post-template > .wp-block-post:first-child {
		grid-column: span 1;
	}
}

/* Equal Height */
.aegis-query-equal-height .wp-block-post-template > .wp-block-post {
	display: flex;
	flex-direction: column;
}

.aegis-query-equal-height .wp-block-post-template > .wp-block-post > * {
	flex-shrink: 0;
}

.aegis-query-equal-height .wp-block-post-template > .wp-block-post > *:last-child {
	margin-top: auto;
}
';
	}
}
