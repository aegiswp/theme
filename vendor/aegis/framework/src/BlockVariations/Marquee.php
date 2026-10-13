<?php
/**
 * Marquee Block Variation
 *
 * Provides support for rendering marquee layout blocks within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the logic for displaying and styling marquee block content
 * - Integrates with the Renderable interface for block output
 *
 * @package    Aegis\Framework\BlockVariations
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for marquee block variation.
declare( strict_types=1 );

// Declares the namespace for the marquee block variation.
namespace Aegis\Framework\BlockVariations;

// Imports classes, interfaces, and functions used by the marquee block variation.
use Aegis\Dom\CSS;
use Aegis\Dom\DOM;
use Aegis\Framework\Interfaces\Renderable;
use Aegis\Framework\ServiceProvider;
use WP_Block;
use function array_diff;
use function array_filter;
use function array_merge;
use function array_unique;
use function array_values;
use function explode;
use function implode;
use function in_array;
use function is_array;
use function is_numeric;
use function is_string;
use function max;
use function min;
use function preg_match;
use function preg_replace;
use function sprintf;
use function strtolower;
use function trim;
use function wp_unique_id;


/**
 * Handles the "Marquee" layout variation for the core/group block.
 *
 * This class transforms a Group block into a CSS-powered marquee (a continuously
 * scrolling banner). It achieves this by restructuring the block's DOM, creating
 * an inner wrapper, and duplicating the inner blocks to create a seamless,
 * infinite scrolling effect.
 *
 * @package Aegis\Framework\BlockVariations
 * @since   1.0.0
 */
class Marquee implements Renderable {

	private const DEFAULT_SPEED_MOBILE  = '60';
	private const DEFAULT_SPEED_DESKTOP = '90';
	private const DEFAULT_REPEAT        = 2;

	/**
	 * Renders the group block as a marquee.
	 *
	 * This method is hooked into the `render_block_core/group` filter. If the
	 * block's layout orientation is set to "marquee", it takes the block's
	 * inner elements, wraps them in a new `is-marquee` div, and then creates
	 * multiple clones of those elements to facilitate a smooth, looping animation.
	 *
	 * @since 1.0.0
	 *
	 * @param  string   $block_content The original block content.
	 * @param  array    $block         The full block object.
	 * @param  WP_Block $instance      The block instance.
	 *
	 * @hook   render_block_core/group 99
	 *
	 * @return string The modified block content, structured for a marquee effect.
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		$attrs       = $block['attrs'] ?? [];
		$orientation = $attrs['layout']['orientation'] ?? '';

		// Only run on Group blocks with the "marquee" orientation.
		if ( 'marquee' !== $orientation ) {
			return $block_content;
		}

		if ( ! ServiceProvider::is_block_enabled( 'marquee' ) ) {
			return $this->strip_marquee_markup( $block_content );
		}

		$dom   = DOM::create( $block_content );
		$first = DOM::get_element( '*', $dom ); // The main group block wrapper.
		if ( ! $first ) {
			return $block_content;
		}

		// --- Prepare Styles and Wrapper ---
		$repeat  = $this->repeat_count( $attrs );
		$wrap    = DOM::create_element( 'div', $dom ); // The new inner wrapper for the scrolling items.
		$styles  = $this->normalized_styles( CSS::string_to_array( $first->getAttribute( 'style' ) ) );
		$classes = array_values(
			array_unique(
				array_filter(
					explode( ' ', $first->getAttribute( 'class' ) )
				)
			)
		);
		$classes = array_values( array_diff( $classes, [ 'is-marquee', 'fade-edges' ] ) );

		$styles = $this->apply_feature_styles( $styles, $attrs );

		if ( ! empty( $attrs['fadeEdges'] ) ) {
			$classes[] = 'fade-horizontal';
			$classes   = array_values( array_unique( $classes ) );
		} else {
			$classes = array_values( array_diff( $classes, [ 'fade-horizontal' ] ) );
		}

		// Apply blockGap as a CSS custom property for the marquee gap.
		$gap = $attrs['style']['spacing']['blockGap'] ?? null;
		if ( $gap || '0' === $gap ) {
			if ( is_array( $gap ) ) {
				$gap = $gap['horizontal'] ?? $gap['left'] ?? $gap['right'] ?? null;
			}
			if ( $gap ) {
				$styles['--marquee-gap'] = CSS::format_custom_property( $gap );
			}
		}

		$first->setAttribute( 'class', implode( ' ', $classes ) );
		$first->setAttribute( 'style', CSS::array_to_string( $styles ) );

		$uid = preg_replace( '/[^a-zA-Z0-9_-]/', '', wp_unique_id( 'aegis-marquee-' ) );
		if ( ! is_string( $uid ) || '' === $uid ) {
			$uid = 'aegis-marquee';
		}

		$wrap->setAttribute( 'class', 'is-marquee ' . $uid );
		$wrap_keys   = array(
			'--marquee-speed',
			'--marquee-speed-mobile',
			'--marquee-speed-desktop',
			'--marquee-direction',
			'--marquee-pause',
			'--marquee-gap',
		);
		$wrap_styles = array();
		foreach ( $wrap_keys as $key ) {
			if ( ! empty( $styles[ $key ] ) ) {
				$wrap_styles[ $key ] = $styles[ $key ];
			}
		}
		$wrap->setAttribute( 'style', CSS::array_to_string( $wrap_styles ) );

		$speed_mobile  = $wrap_styles['--marquee-speed-mobile'] ?? self::DEFAULT_SPEED_MOBILE . 's';
		$speed_desktop = $wrap_styles['--marquee-speed-desktop'] ?? $speed_mobile;
		$speed_css     = sprintf(
			'.is-marquee.%1$s .aegis-marquee-item{animation-duration:%2$s !important}@media (min-width:782px){.is-marquee.%1$s .aegis-marquee-item{animation-duration:%3$s !important}}',
			$uid,
			$speed_mobile,
			$speed_desktop
		);
		$style_el = DOM::create_element( 'style', $dom );

		// Snapshot children first; the live NodeList shrinks as items are moved.
		$to_move = array();
		$count   = $first->childNodes->count();
		for ( $i = 0; $i < $count; $i++ ) {
			$item = DOM::node_to_element( $first->childNodes->item( $i ) );
			if ( $item && 'style' !== strtolower( $item->tagName ) ) {
				$to_move[] = $item;
			}
		}

		foreach ( $to_move as $item ) {
			$item_classes = array_values(
				array_filter(
					explode( ' ', $item->getAttribute( 'class' ) )
				)
			);
			if ( ! in_array( 'aegis-marquee-item', $item_classes, true ) ) {
				$item_classes[] = 'aegis-marquee-item';
			}
			$item->setAttribute( 'class', implode( ' ', $item_classes ) );

			$wrap->appendChild( $item );

			for ( $j = 0; $j < $repeat; $j++ ) {
				$clone = DOM::node_to_element( $item->cloneNode( true ) );
				if ( ! $clone ) {
					continue;
				}
				$clone_classes   = explode( ' ', $clone->getAttribute( 'class' ) );
				$clone_classes[] = 'is-cloned';
				$clone->setAttribute( 'class', implode( ' ', $clone_classes ) );
				$wrap->appendChild( $clone );
			}
		}

		// Insert the new wrapper containing all original and cloned items into the main group block.
		$first->insertBefore( $wrap, $first->firstChild );
		if ( isset( $style_el ) && $style_el ) {
			$style_el->setAttribute( 'id', $uid . '-css' );
			$style_el->textContent = $speed_css;
			$first->insertBefore( $style_el, $wrap );
		}

		return $dom->saveHTML();
	}

	/**
	 * Register marquee attributes on core/group so they persist through render.
	 *
	 * @since 1.0.0
	 *
	 * @param array<string, mixed> $args       Block type arguments.
	 * @param string               $block_type Block name.
	 *
	 * @hook register_block_type_args
	 *
	 * @return array<string, mixed>
	 */
	public function register_attributes( array $args, string $block_type ): array {
		if ( 'core/group' !== $block_type ) {
			return $args;
		}

		if ( ! isset( $args['attributes'] ) || ! is_array( $args['attributes'] ) ) {
			$args['attributes'] = array();
		}

		$args['attributes'] = array_merge(
			$args['attributes'],
			array(
				'speedMobile'   => array( 'type' => 'string' ),
				'speedDesktop'  => array( 'type' => 'string' ),
				'reverse'       => array( 'type' => 'boolean' ),
				'pauseOnHover'  => array( 'type' => 'boolean' ),
				'repeatItems'   => array( 'type' => 'number' ),
				'fadeEdges'     => array( 'type' => 'boolean' ),
			)
		);

		return $args;
	}

	/**
	 * Remove marquee animation classes when the variation is disabled.
	 *
	 * Saved markup still has `is-marquee` from the editor. Without this
	 * strip, marquee.css would keep scrolling an ordinary Group.
	 *
	 * @param string $block_content Original group HTML.
	 */
	private function strip_marquee_markup( string $block_content ): string {
		if ( ! str_contains( $block_content, 'is-marquee' ) && ! str_contains( $block_content, 'fade-edges' ) ) {
			return $block_content;
		}

		$dom   = DOM::create( $block_content );
		$first = DOM::get_element( '*', $dom );
		if ( ! $first ) {
			return $block_content;
		}

		$classes = array_values(
			array_diff(
				array_filter(
					explode( ' ', $first->getAttribute( 'class' ) )
				),
				[ 'is-marquee', 'fade-edges' ]
			)
		);
		$first->setAttribute( 'class', implode( ' ', $classes ) );

		return $dom->saveHTML();
	}

	/**
	 * Apply speed, direction, and pause CSS variables honoring admin extras.
	 *
	 * @param array<string, string> $styles Existing inline styles.
	 * @param array<string, mixed>  $attrs  Block attributes.
	 * @return array<string, string>
	 */
	private function apply_feature_styles( array $styles, array $attrs ): array {
		$speed_mobile  = $this->resolve_speed(
			$attrs,
			$styles,
			'speedMobile',
			'--marquee-speed-mobile',
			self::DEFAULT_SPEED_MOBILE
		);
		$speed_desktop = $this->resolve_speed(
			$attrs,
			$styles,
			'speedDesktop',
			'--marquee-speed-desktop',
			self::DEFAULT_SPEED_DESKTOP
		);

		if ( ! ServiceProvider::is_block_enabled( 'marquee_speed' ) ) {
			$speed_mobile  = $this->format_speed( self::DEFAULT_SPEED_MOBILE, self::DEFAULT_SPEED_MOBILE );
			$speed_desktop = $this->format_speed( self::DEFAULT_SPEED_DESKTOP, self::DEFAULT_SPEED_DESKTOP );
		} elseif ( ! ServiceProvider::is_block_enabled( 'marquee_responsive_speed' ) ) {
			$speed_desktop = $speed_mobile;
		}

		$styles['--marquee-speed-mobile']  = $speed_mobile;
		$styles['--marquee-speed-desktop'] = $speed_desktop;
		$styles['--marquee-speed']         = $speed_mobile;

		$reverse = ! empty( $attrs['reverse'] );
		if ( ServiceProvider::is_block_enabled( 'marquee_direction' ) && $reverse ) {
			$styles['--marquee-direction'] = 'reverse';
		} else {
			$styles['--marquee-direction'] = 'forwards';
		}

		$pause_on_hover = $attrs['pauseOnHover'] ?? true;
		if ( ServiceProvider::is_block_enabled( 'marquee_pause_hover' ) && $pause_on_hover ) {
			$styles['--marquee-pause'] = 'paused';
		} else {
			$styles['--marquee-pause'] = 'running';
		}

		return $styles;
	}

	/**
	 * Resolve a duration from block attributes, then saved CSS vars.
	 *
	 * @param array<string, mixed>  $attrs     Block attributes.
	 * @param array<string, string> $styles    Parsed inline styles.
	 * @param string                $attr_key  Attribute name.
	 * @param string                $css_key   Custom property name.
	 * @param string                $fallback  Numeric seconds without unit.
	 */
	private function resolve_speed( array $attrs, array $styles, string $attr_key, string $css_key, string $fallback ): string {
		if ( isset( $attrs[ $attr_key ] ) && '' !== $attrs[ $attr_key ] && null !== $attrs[ $attr_key ] ) {
			return $this->format_speed( $attrs[ $attr_key ], $fallback );
		}

		if ( ! empty( $styles[ $css_key ] ) ) {
			return $this->format_speed( $styles[ $css_key ], $fallback );
		}

		$style_attr = $attrs['style'][ $css_key ] ?? '';
		if ( is_string( $style_attr ) && '' !== $style_attr ) {
			return $this->format_speed( $style_attr, $fallback );
		}

		if ( '--marquee-speed-mobile' === $css_key && ! empty( $styles['--marquee-speed'] ) ) {
			return $this->format_speed( $styles['--marquee-speed'], $fallback );
		}

		return $this->format_speed( $fallback, $fallback );
	}

	/**
	 * Trim CSS property names after parsing an inline style string.
	 *
	 * @param array<string, mixed> $styles Parsed styles.
	 * @return array<string, string>
	 */
	private function normalized_styles( array $styles ): array {
		$normalized = array();

		foreach ( $styles as $property => $value ) {
			$key = trim( (string) $property );
			if ( '' === $key || ! is_string( $value ) ) {
				continue;
			}
			$normalized[ $key ] = $value;
		}

		return $normalized;
	}

	/**
	 * Clone count for the seamless loop.
	 *
	 * @param array<string, mixed> $attrs Block attributes.
	 */
	private function repeat_count( array $attrs ): int {
		if ( ! ServiceProvider::is_block_enabled( 'marquee_repeat' ) ) {
			return self::DEFAULT_REPEAT;
		}

		$repeat = $attrs['repeatItems'] ?? self::DEFAULT_REPEAT;

		return max( 0, min( 10, (int) $repeat ) );
	}

	/**
	 * Normalize a speed attribute to a CSS duration.
	 *
	 * @param mixed  $value    Attribute value (number or "Ns").
	 * @param string $fallback Numeric seconds without unit.
	 */
	private function format_speed( mixed $value, string $fallback ): string {
		$raw = $fallback;

		if ( is_numeric( $value ) ) {
			$raw = (string) $value;
		} elseif ( is_string( $value ) && '' !== trim( $value ) ) {
			$raw = trim( $value );
		}

		$raw = strtolower( $raw );
		if ( preg_match( '/^[0-9]*\.?[0-9]+ms$/', $raw ) ) {
			return $raw;
		}
		if ( preg_match( '/^[0-9]*\.?[0-9]+s$/', $raw ) ) {
			return $raw;
		}

		if ( ! is_numeric( $raw ) ) {
			$raw = $fallback;
		}

		return $raw . 's';
	}
}
