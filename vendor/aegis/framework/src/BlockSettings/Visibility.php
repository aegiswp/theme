<?php
/**
 * Block Visibility Setting
 *
 * Server-side conditional visibility for blocks via the `visibility` attribute.
 *
 * @package    Aegis\Framework\BlockSettings
 * @since      1.0.0
 */

declare( strict_types=1 );

namespace Aegis\Framework\BlockSettings;

use Aegis\Dom\DOM;
use Aegis\Framework\InlineAssets\Scriptable;
use Aegis\Framework\InlineAssets\Scripts;
use Aegis\Framework\InlineAssets\Styleable;
use Aegis\Framework\InlineAssets\Styles;
use Aegis\Framework\Interfaces\Renderable;
use WP_Block;
use function absint;
use function add_filter;
use function array_filter;
use function array_merge;
use function array_unique;
use function class_exists;
use function esc_attr;
use function explode;
use function implode;
use function in_array;
use function is_array;
use function preg_match_all;
use function sprintf;

class Visibility implements Renderable, Scriptable, Styleable {

	public function __construct() {
		add_filter( 'register_block_type_args', array( $this, 'add_attributes' ), 10, 2 );
	}

	/**
	 * Register the visibility object attribute on every block type.
	 *
	 * @hook register_block_type_args 10
	 *
	 * @param array<string, mixed> $args       Block type args.
	 * @param string               $block_type Block name.
	 * @return array<string, mixed>
	 */
	public function add_attributes( array $args, string $block_type ): array {
		unset( $block_type );

		if ( ! isset( $args['attributes'] ) || ! is_array( $args['attributes'] ) ) {
			$args['attributes'] = array();
		}

		if ( ! isset( $args['attributes']['visibility'] ) ) {
			$args['attributes']['visibility'] = array(
				'type' => 'object',
			);
		}

		return $args;
	}

	/**
	 * Evaluate block visibility and apply CSS utility classes.
	 *
	 * @hook render_block 10
	 *
	 * @param string   $block_content Block content.
	 * @param array    $block         Block data.
	 * @param WP_Block $instance      Block instance.
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		if ( $block_content === '' ) {
			return $block_content;
		}

		$visibility = $block['attrs']['visibility'] ?? [];

		if ( empty( $visibility ) || ! is_array( $visibility ) ) {
			return $block_content;
		}

		if ( $this->should_hide_server_side( $visibility ) ) {
			return '';
		}

		return $this->apply_visibility_classes( $block_content, $visibility );
	}

	/**
	 * CSS class names for a visibility/conditions payload.
	 *
	 * Used by block render and hook-pattern wrappers.
	 *
	 * @param array<string, mixed> $visibility Visibility settings.
	 * @return array<int, string>
	 */
	public static function css_classes( array $visibility ): array {
		$classes = array();

		if ( self::extra_enabled( 'visibility', 'screen_size' ) ) {
			if ( ! empty( $visibility['hideOnMobile'] ) ) {
				$classes[] = 'aegis-hide-mobile';
			}
			if ( ! empty( $visibility['hideOnTablet'] ) ) {
				$classes[] = 'aegis-hide-tablet';
			}
			if ( ! empty( $visibility['hideOnDesktop'] ) ) {
				$classes[] = 'aegis-hide-desktop';
			}
		}

		if ( self::extra_enabled( 'visibility', 'custom_breakpoints' ) ) {
			$below = absint( $visibility['hideBelowWidth'] ?? 0 );
			$above = absint( $visibility['hideAboveWidth'] ?? 0 );
			if ( $below > 0 ) {
				$classes[] = 'aegis-hide-below-' . $below;
			}
			if ( $above > 0 ) {
				$classes[] = 'aegis-hide-above-' . $above;
			}
		}

		if ( self::extra_enabled( 'accessibility', 'screen_reader_only' ) && ! empty( $visibility['screenReaderOnly'] ) ) {
			$classes[] = 'aegis-sr-only';
		}
		if ( self::extra_enabled( 'accessibility', 'reduced_motion' ) && ! empty( $visibility['reducedMotion'] ) ) {
			$classes[] = 'aegis-hide-reduced-motion';
		}
		if ( self::extra_enabled( 'accessibility', 'color_scheme' ) ) {
			$scheme = $visibility['colorScheme'] ?? '';
			if ( in_array( $scheme, array( 'dark', 'light' ), true ) ) {
				$classes[] = 'aegis-hide-color-scheme-' . $scheme;
			}
		}
		if ( self::extra_enabled( 'accessibility', 'high_contrast' ) && ! empty( $visibility['highContrast'] ) ) {
			$classes[] = 'aegis-hide-high-contrast';
		}
		if ( self::extra_enabled( 'accessibility', 'forced_colors' ) && ! empty( $visibility['forcedColors'] ) ) {
			$classes[] = 'aegis-hide-forced-colors';
		}

		return $classes;
	}

	/**
	 * Add viewport and accessibility classes to the first root element.
	 *
	 * Used for blocks and post-level `_aegis_conditions` so layout classes
	 * on `core/post-content` stay on the existing wrapper.
	 *
	 * @param array<string, mixed> $visibility Visibility settings.
	 */
	public static function apply_classes( string $content, array $visibility ): string {
		$classes = self::css_classes( $visibility );

		if ( $classes === array() || $content === '' ) {
			return $content;
		}

		$dom   = DOM::create( $content );
		$first = DOM::get_element( '*', $dom );

		if ( ! $first ) {
			return self::wrap( $content, $visibility );
		}

		$existing = array_filter( explode( ' ', $first->getAttribute( 'class' ) ) );
		$first->setAttribute( 'class', implode( ' ', array_unique( array_merge( $existing, $classes ) ) ) );

		return $dom->saveHTML();
	}

	/**
	 * Wrap markup so viewport and accessibility CSS classes apply.
	 *
	 * Used for hook patterns (often several top-level blocks). Post content
	 * uses apply_classes() instead so it does not add an extra wrapper.
	 *
	 * @param array<string, mixed> $visibility Visibility settings.
	 */
	public static function wrap( string $content, array $visibility ): string {
		if ( $content === '' ) {
			return $content;
		}

		$classes = self::css_classes( $visibility );
		$css     = self::custom_breakpoint_css( $visibility );

		if ( $classes === array() && $css === '' ) {
			return $content;
		}

		$class_attr = $classes !== array()
			? ' class="' . esc_attr( implode( ' ', $classes ) ) . '"'
			: '';
		$style = $css !== '' ? '<style>' . $css . '</style>' : '';

		return $style . '<div' . $class_attr . '>' . $content . '</div>';
	}

	/**
	 * Inline CSS for custom breakpoint classes (hook patterns inject outside template HTML).
	 *
	 * @param array<string, mixed> $visibility Visibility settings.
	 */
	public static function custom_breakpoint_css( array $visibility ): string {
		if ( ! self::extra_enabled( 'visibility', 'custom_breakpoints' ) ) {
			return '';
		}

		$css   = '';
		$below = absint( $visibility['hideBelowWidth'] ?? 0 );
		$above = absint( $visibility['hideAboveWidth'] ?? 0 );

		if ( $below > 0 ) {
			$css .= sprintf( '@media(max-width:%1$dpx){.aegis-hide-below-%1$d{display:none!important;}}', $below );
		}
		if ( $above > 0 ) {
			$css .= sprintf( '@media(min-width:%1$dpx){.aegis-hide-above-%1$d{display:none!important;}}', $above );
		}

		return $css;
	}

	/**
	 * @param array<string, mixed> $visibility Visibility settings.
	 */
	private function should_hide_server_side( array $visibility ): bool {
		if ( class_exists( '\Aegis\Plugin\Conditionals\Evaluator' ) ) {
			return ! ( new \Aegis\Plugin\Conditionals\Evaluator() )->should_render_visibility( $visibility );
		}

		return self::extra_enabled( 'visibility', 'lockdown' ) && ! empty( $visibility['lockdown'] );
	}

	/**
	 * @param array<string, mixed> $visibility Visibility settings.
	 */
	private function apply_visibility_classes( string $block_content, array $visibility ): string {
		return self::apply_classes( $block_content, $visibility );
	}

	public function scripts( Scripts $scripts ): void {
		unset( $scripts );
	}

	public function styles( Styles $styles ): void {
		$styles->add_callback( array( $this, 'get_styles' ) );
	}

	/**
	 * Inline CSS for visibility utility classes.
	 */
	public function get_styles( string $template_html, bool $load_all ): string {
		$css = '';

		if ( $load_all || self::extra_enabled( 'accessibility', 'screen_reader_only' ) ) {
			$css .= '.aegis-sr-only{position:absolute!important;width:1px!important;height:1px!important;padding:0!important;margin:-1px!important;overflow:hidden!important;clip:rect(0,0,0,0)!important;clip-path:inset(50%)!important;white-space:nowrap!important;border:0!important;}';
		}

		if ( $load_all || self::extra_enabled( 'accessibility', 'reduced_motion' ) ) {
			$css .= '@media(prefers-reduced-motion:reduce){.aegis-hide-reduced-motion{display:none!important;}}';
		}

		if ( $load_all || self::extra_enabled( 'accessibility', 'color_scheme' ) ) {
			$css .= 'body.is-style-dark .aegis-hide-color-scheme-dark{display:none!important;}';
			$css .= 'body.is-style-light:not(.is-style-dark) .aegis-hide-color-scheme-light{display:none!important;}';
			$css .= 'body.default-mode-dark:not(.is-style-light) .aegis-hide-color-scheme-dark{display:none!important;}';
			$css .= 'body.default-mode-light:not(.is-style-dark) .aegis-hide-color-scheme-light{display:none!important;}';
			$css .= 'body.default-mode-system:not(.is-style-light):not(.is-style-dark) .aegis-hide-color-scheme-light{display:none!important;}';
			$css .= '@media(prefers-color-scheme:dark){';
			$css .= 'body.default-mode-system:not(.is-style-light):not(.is-style-dark) .aegis-hide-color-scheme-dark{display:none!important;}';
			$css .= 'body.default-mode-system:not(.is-style-light):not(.is-style-dark) .aegis-hide-color-scheme-light{display:revert!important;}';
			$css .= 'body:not([class*="default-mode-"]):not(.is-style-light):not(.is-style-dark) .aegis-hide-color-scheme-dark{display:none!important;}';
			$css .= '}';
			$css .= '@media(prefers-color-scheme:light){body:not([class*="default-mode-"]):not(.is-style-light):not(.is-style-dark) .aegis-hide-color-scheme-light{display:none!important;}}';
		}

		if ( $load_all || self::extra_enabled( 'accessibility', 'high_contrast' ) ) {
			$css .= '@media(prefers-contrast:more){.aegis-hide-high-contrast{display:none!important;}}';
		}

		if ( $load_all || self::extra_enabled( 'accessibility', 'forced_colors' ) ) {
			$css .= '@media(forced-colors:active){.aegis-hide-forced-colors{display:none!important;}}';
		}

		if ( $load_all || self::extra_enabled( 'visibility', 'screen_size' ) ) {
			$css .= '@media(max-width:479px){.aegis-hide-mobile{display:none!important;}}';
			$css .= '@media(min-width:480px) and (max-width:1023px){.aegis-hide-tablet{display:none!important;}}';
			$css .= '@media(min-width:1024px){.aegis-hide-desktop{display:none!important;}}';
		}

		if ( $load_all || self::extra_enabled( 'visibility', 'custom_breakpoints' ) ) {
			$css .= self::breakpoint_css_from_html( $template_html );
		}

		return $css;
	}

	/**
	 * Whether a conditionals extra is on (theme-without-plugin treats extras as on).
	 */
	private static function extra_enabled( string $group, string $key ): bool {
		if ( ! class_exists( '\Aegis\Plugin\Conditionals\Settings' ) ) {
			return true;
		}

		return \Aegis\Plugin\Conditionals\Settings::is_enabled( $group, $key );
	}

	/**
	 * @param string $html Template or block HTML.
	 */
	private static function breakpoint_css_from_html( string $html ): string {
		$css = '';

		if ( preg_match_all( '/aegis-hide-below-(\d+)/', $html, $below ) ) {
			foreach ( array_unique( $below[1] ) as $px ) {
				$css .= sprintf( '@media(max-width:%1$dpx){.aegis-hide-below-%1$d{display:none!important;}}', (int) $px );
			}
		}

		if ( preg_match_all( '/aegis-hide-above-(\d+)/', $html, $above ) ) {
			foreach ( array_unique( $above[1] ) as $px ) {
				$css .= sprintf( '@media(min-width:%1$dpx){.aegis-hide-above-%1$d{display:none!important;}}', (int) $px );
			}
		}

		return $css;
	}
}
