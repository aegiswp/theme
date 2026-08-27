<?php
/**
 * core/icon bridge, gradient mask, and link enhancements.
 *
 * @package Aegis\Framework\CoreBlocks
 * @since   1.0.0
 */

// Enforces strict type checking for all code in this file, ensuring type safety for core/icon bridge, gradient mask, and link enhancements.
declare( strict_types=1 );

// Declares the namespace for the core/icon bridge, gradient mask, and link enhancements.
namespace Aegis\Framework\CoreBlocks;

// Imports classes, interfaces, and functions used by the core/icon bridge, gradient mask, and link enhancements.
use Aegis\Dom\CSS;
use Aegis\Dom\DOM;
use Aegis\Framework\Interfaces\Renderable;
use Aegis\Framework\ServiceProvider;
use Aegis\Icons\Icon as IconUtility;
use WP_Block;
use WP_HTML_Tag_Processor;
use function esc_attr;
use function esc_url;
use function get_block_wrapper_attributes;
use function implode;
use function preg_match;
use function sprintf;
use function str_contains;
use function str_starts_with;
use function wp_style_engine_get_styles;

/**
 * Renders Aegis icon IDs and enhances core/icon output.
 */
class Icon implements Renderable {

	/**
	 * @hook render_block 11
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		// Bail out on unsupported WordPress versions.
		if ( version_compare( get_bloginfo( 'version' ), '7.0', '<' ) ) {
			return $block_content;
		}

		// Only process core/icon blocks.
		if ( ( $block['blockName'] ?? '' ) !== 'core/icon' ) {
			return $block_content;
		}

		if ( ! ServiceProvider::is_block_enabled( 'icon' ) ) {
			return $block_content;
		}

		$attrs = $block['attrs'] ?? [];
		$icon  = (string) ( $attrs['icon'] ?? '' );

		if ( $icon === '' ) {
			return $block_content;
		}

		// Replace core output with Aegis registry SVG markup.
		if ( str_starts_with( $icon, 'aegis/' ) ) {
			$block_content = $this->render_aegis_icon( $attrs, $icon );
		}

		if ( $block_content === '' ) {
			return $block_content;
		}

		// Apply gradient mask, link wrapper, and animation classes.
		return $this->apply_enhancements( $block_content, $attrs );
	}

	/**
	 * Builds core/icon markup for Aegis registry IDs.
	 *
	 * @param array<string, mixed> $attrs Block attributes.
	 * @param string               $icon  Registry id.
	 */
	private function render_aegis_icon( array $attrs, string $icon ): string {
		// Resolve the icon from the Aegis registry.
		$parsed = IconUtility::from_registry_id( $icon );

		if ( $parsed === null || $parsed['namespace'] !== 'aegis' ) {
			return '';
		}

		$width = $attrs['style']['dimensions']['width'] ?? null;
		$svg   = IconUtility::get_svg( $parsed['set'], $parsed['name'], $width );

		if ( $svg === '' ) {
			return '';
		}

		// Build inline styles from block color, border, spacing, and dimensions.
		$color_styles = $this->get_color_styles( $attrs );
		$styles       = wp_style_engine_get_styles(
			[
				'color'      => $color_styles,
				'border'     => $this->get_border_styles( $attrs ),
				'spacing'    => $this->get_spacing_styles( $attrs ),
				'dimensions' => $this->get_dimensions_styles( $attrs ),
			]
		);

		// Apply styles and accessibility attributes to the SVG element.
		$processor = new WP_HTML_Tag_Processor( $svg );
		if ( $processor->next_tag( 'svg' ) ) {
			if ( ! empty( $styles['css'] ) ) {
				$processor->set_attribute( 'style', $styles['css'] );
			}
			if ( ! empty( $styles['classnames'] ) ) {
				$processor->add_class( $styles['classnames'] );
			}

			$aria_label = (string) ( $attrs['ariaLabel'] ?? '' );
			if ( $aria_label === '' ) {
				$processor->set_attribute( 'aria-hidden', 'true' );
				$processor->set_attribute( 'focusable', 'false' );
			} else {
				$processor->set_attribute( 'role', 'img' );
				$processor->set_attribute( 'aria-label', $aria_label );
			}
		}

		// Wrap the SVG in standard block wrapper markup.
		$wrapper = get_block_wrapper_attributes();
		$svg_html = $processor->get_updated_html();

		return sprintf( '<div %s>%s</div>', $wrapper, $svg_html );
	}

	/**
	 * Applies gradient mask, link wrapper, and animation classes.
	 *
	 * @param array<string, mixed> $attrs Block attributes.
	 */
	private function apply_enhancements( string $block_content, array $attrs ): string {
		$gradient  = $attrs['gradient'] ?? null;
		$animation = $attrs['animation'] ?? null;
		$url       = $attrs['url'] ?? null;

		if ( $gradient ) {
			$block_content = $this->apply_gradient_mask( $block_content, $attrs );
		}

		// Add animation class to the wrapper when configured.
		if ( $animation ) {
			$dom = DOM::create( $block_content );
			$wrapper = DOM::get_element( 'div', $dom );
			if ( $wrapper ) {
				$classes = DOM::get_classes( $wrapper );
				$classes[] = 'has-animation';
				$wrapper->setAttribute( 'class', implode( ' ', array_unique( $classes ) ) );
				$block_content = $dom->saveHTML();
			}
		}

		// Wrap the icon in a link when a URL is set.
		if ( $url ) {
			$block_content = $this->wrap_with_link( $block_content, $attrs );
		}

		return $block_content;
	}

	/**
	 * @param array<string, mixed> $attrs Block attributes.
	 */
	private function apply_gradient_mask( string $block_content, array $attrs ): string {
		// Extract the SVG markup from block content.
		if ( ! preg_match( '/<svg\b[^>]*>.*?<\/svg>/is', $block_content, $matches ) ) {
			return $block_content;
		}

		$svg = IconUtility::sanitize_svg( $matches[0] );
		$dom = DOM::create( $block_content );
		$wrapper = DOM::get_element( 'div', $dom );

		if ( ! $wrapper ) {
			return $block_content;
		}

		// Mark the wrapper as gradient-enabled and set mask custom properties.
		$classes = DOM::get_classes( $wrapper );
		$classes[] = 'has-gradient';
		$wrapper->setAttribute( 'class', implode( ' ', array_unique( $classes ) ) );

		$styles = CSS::string_to_array( $wrapper->getAttribute( 'style' ) );
		$styles['--wp--custom--icon--url'] = 'url(\'data:image/svg+xml;utf8,' . $svg . '\')';

		$gradient = (string) ( $attrs['gradient'] ?? '' );
		if ( ( $attrs['textColor'] ?? null ) || ( $attrs['style']['color']['text'] ?? null ) ) {
			$styles['--wp--custom--icon--background'] = "var(--wp--preset--gradient--{$gradient})";
		} else {
			$styles['--wp--custom--icon--color'] = "var(--wp--preset--gradient--{$gradient})";
		}

		$size = $attrs['style']['dimensions']['width'] ?? '1.5em';
		$styles['--wp--custom--icon--size'] = (string) $size;

		$wrapper->setAttribute( 'style', CSS::array_to_string( $styles ) );

		// Remove the inline SVG; the mask uses the data URI instead.
		$svg_el = DOM::get_element( 'svg', $wrapper );
		if ( $svg_el ) {
			$svg_el->parentNode->removeChild( $svg_el );
		}

		return $dom->saveHTML();
	}

	/**
	 * @param array<string, mixed> $attrs Block attributes.
	 */
	private function wrap_with_link( string $block_content, array $attrs ): string {
		$url = esc_url( (string) $attrs['url'] );

		if ( $url === '' ) {
			return $block_content;
		}

		// Build optional target and rel attributes for the link.
		$target = ! empty( $attrs['linkTarget'] ) ? sprintf( ' target="%s"', esc_attr( (string) $attrs['linkTarget'] ) ) : '';
		$rel    = ! empty( $attrs['rel'] ) ? sprintf( ' rel="%s"', esc_attr( (string) $attrs['rel'] ) ) : '';

		return sprintf(
			'<a href="%1$s"%2$s%3$s>%4$s</a>',
			$url,
			$target,
			$rel,
			$block_content
		);
	}

	/**
	 * @param array<string, mixed> $attrs Block attributes.
	 *
	 * @return array<string, string|null>
	 */
	private function get_color_styles( array $attrs ): array {
		// Resolve preset and custom text colors.
		$preset_text = array_key_exists( 'textColor', $attrs ) ? "var:preset|color|{$attrs['textColor']}" : null;
		$custom_text = $attrs['style']['color']['text'] ?? null;

		// Resolve preset and custom background colors.
		$preset_bg = array_key_exists( 'backgroundColor', $attrs ) ? "var:preset|color|{$attrs['backgroundColor']}" : null;
		$custom_bg = $attrs['style']['color']['background'] ?? null;

		return [
			'text'       => $preset_text ?: $custom_text,
			'background' => $preset_bg ?: $custom_bg,
		];
	}

	/**
	 * @param array<string, mixed> $attrs Block attributes.
	 *
	 * @return array<string, mixed>
	 */
	private function get_border_styles( array $attrs ): array {
		$border_styles = [];
		$sides         = [ 'top', 'right', 'bottom', 'left' ];

		if ( isset( $attrs['style']['border']['radius'] ) ) {
			$border_styles['radius'] = $attrs['style']['border']['radius'];
		}

		// Resolve preset or custom border color.
		$preset = array_key_exists( 'borderColor', $attrs ) ? "var:preset|color|{$attrs['borderColor']}" : null;
		$custom = $attrs['style']['border']['color'] ?? null;
		$border_styles['color'] = $preset ?: $custom;

		// Collect per-side border width, style, and color values.
		foreach ( $sides as $side ) {
			$border = $attrs['style']['border'][ $side ] ?? null;
			$border_styles[ $side ] = [
				'color' => $border['color'] ?? null,
				'style' => $border['style'] ?? null,
				'width' => $border['width'] ?? null,
			];
		}

		return $border_styles;
	}

	/**
	 * @param array<string, mixed> $attrs Block attributes.
	 *
	 * @return array<string, mixed>
	 */
	private function get_spacing_styles( array $attrs ): array {
		$spacing = [];

		if ( isset( $attrs['style']['spacing']['padding'] ) ) {
			$spacing['padding'] = $attrs['style']['spacing']['padding'];
		}

		return $spacing;
	}

	/**
	 * @param array<string, mixed> $attrs Block attributes.
	 *
	 * @return array<string, mixed>
	 */
	private function get_dimensions_styles( array $attrs ): array {
		$dimensions = [];

		if ( isset( $attrs['style']['dimensions']['width'] ) ) {
			$dimensions['width'] = $attrs['style']['dimensions']['width'];
		}

		return $dimensions;
	}
}
