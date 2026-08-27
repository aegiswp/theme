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
use function class_exists;
use function explode;
use function implode;
use function is_admin;
use function sanitize_html_class;
use function str_contains;

class Visibility implements Renderable, Scriptable, Styleable {

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
	 * @param array<string, mixed> $visibility Visibility settings.
	 */
	private function should_hide_server_side( array $visibility ): bool {
		if ( class_exists( '\Aegis\Plugin\Conditionals\Evaluator' ) ) {
			return ! ( new \Aegis\Plugin\Conditionals\Evaluator() )->should_render_visibility( $visibility );
		}

		return ! empty( $visibility['lockdown'] );
	}

	/**
	 * @param array<string, mixed> $visibility Visibility settings.
	 */
	private function apply_visibility_classes( string $block_content, array $visibility ): string {
		$classes = array();

		if ( ! empty( $visibility['hideOnMobile'] ) ) {
			$classes[] = 'aegis-hide-mobile';
		}
		if ( ! empty( $visibility['hideOnTablet'] ) ) {
			$classes[] = 'aegis-hide-tablet';
		}
		if ( ! empty( $visibility['hideOnDesktop'] ) ) {
			$classes[] = 'aegis-hide-desktop';
		}
		if ( ! empty( $visibility['screenReaderOnly'] ) ) {
			$classes[] = 'aegis-sr-only';
		}
		if ( ! empty( $visibility['reducedMotion'] ) ) {
			$classes[] = 'aegis-hide-reduced-motion';
		}
		if ( ! empty( $visibility['colorScheme'] ) && is_string( $visibility['colorScheme'] ) ) {
			$classes[] = 'aegis-hide-color-scheme-' . sanitize_html_class( $visibility['colorScheme'] );
		}
		if ( ! empty( $visibility['highContrast'] ) ) {
			$classes[] = 'aegis-hide-high-contrast';
		}
		if ( ! empty( $visibility['forcedColors'] ) ) {
			$classes[] = 'aegis-hide-forced-colors';
		}

		if ( empty( $classes ) ) {
			return $block_content;
		}

		$dom   = DOM::create( $block_content );
		$first = DOM::get_element( '*', $dom );

		if ( ! $first ) {
			return $block_content;
		}

		$existing = array_filter( explode( ' ', $first->getAttribute( 'class' ) ) );
		$first->setAttribute( 'class', implode( ' ', array_unique( array_merge( $existing, $classes ) ) ) );

		return $dom->saveHTML();
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
		$markers = array(
			'aegis-hide-mobile',
			'aegis-hide-tablet',
			'aegis-hide-desktop',
			'aegis-sr-only',
			'aegis-hide-reduced-motion',
			'aegis-hide-color-scheme-dark',
			'aegis-hide-color-scheme-light',
			'aegis-hide-high-contrast',
			'aegis-hide-forced-colors',
		);

		if ( ! $load_all ) {
			$needed = false;
			foreach ( $markers as $marker ) {
				if ( str_contains( $template_html, $marker ) ) {
					$needed = true;
					break;
				}
			}
			if ( ! $needed ) {
				return '';
			}
		}

		$css  = '.aegis-sr-only{position:absolute!important;width:1px!important;height:1px!important;padding:0!important;margin:-1px!important;overflow:hidden!important;clip:rect(0,0,0,0)!important;white-space:nowrap!important;border:0!important;}';
		$css .= '@media(max-width:479px){.aegis-hide-mobile{display:none!important;}}';
		$css .= '@media(min-width:768px) and (max-width:1023px){.aegis-hide-tablet{display:none!important;}}';
		$css .= '@media(min-width:1024px){.aegis-hide-desktop{display:none!important;}}';
		$css .= '@media(prefers-reduced-motion:reduce){.aegis-hide-reduced-motion{display:none!important;}}';
		$css .= '@media(prefers-color-scheme:dark){.aegis-hide-color-scheme-dark{display:none!important;}}';
		$css .= '@media(prefers-color-scheme:light){.aegis-hide-color-scheme-light{display:none!important;}}';
		$css .= '@media(prefers-contrast:more){.aegis-hide-high-contrast{display:none!important;}}';
		$css .= '@media(forced-colors:active){.aegis-hide-forced-colors{display:none!important;}}';

		return $css;
	}
}
