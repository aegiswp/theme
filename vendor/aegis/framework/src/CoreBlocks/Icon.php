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
use Aegis\Framework\BlockSettings\Responsive;
use Aegis\Framework\Interfaces\Renderable;
use Aegis\Framework\ServiceProvider;
use Aegis\Icons\Icon as IconUtility;
use Aegis\Utilities\Block;
use WP_Block;
use WP_HTML_Tag_Processor;
use function do_blocks;
use function esc_attr;
use function esc_url;
use function get_block_wrapper_attributes;
use function implode;
use function preg_match;
use function sprintf;
use function str_contains;
use function str_starts_with;
use function strtolower;
use function wp_style_engine_get_styles;

/**
 * Renders Aegis icon IDs and enhances core/icon output.
 */
class Icon implements Renderable {

	/**
	 * The Responsive settings handler.
	 *
	 * @var Responsive
	 */
	private Responsive $responsive;

	/**
	 * @param Responsive $responsive The Responsive settings handler instance.
	 */
	public function __construct( Responsive $responsive ) {
		$this->responsive = $responsive;
	}

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
		$class = (string) ( $attrs['className'] ?? '' );

		if ( str_contains( $class, 'all-icons' ) ) {
			if ( ! ServiceProvider::is_block_enabled( 'icon_gallery' ) ) {
				return $block_content;
			}

			$set = 'wordpress';
			$parsed = IconUtility::from_registry_id( (string) ( $attrs['icon'] ?? '' ) );

			if ( is_array( $parsed ) && ! empty( $parsed['set'] ) ) {
				$set = (string) $parsed['set'];
			}

			return $this->render_all_icons( $set );
		}
		$icon       = (string) ( $attrs['icon'] ?? '' );
		$svg_string = ServiceProvider::is_block_enabled( 'icon_custom_svg' )
			? (string) ( $attrs['iconSvgString'] ?? '' )
			: '';

		if ( $icon === '' && $svg_string === '' ) {
			return $block_content;
		}

		if ( $svg_string !== '' ) {
			$custom = $this->wrap_icon_svg( $attrs, IconUtility::sanitize_svg( $svg_string ) );

			if ( $custom !== '' ) {
				$block_content = $custom;
			} elseif ( $this->should_render_library_icon( $icon, $block_content ) ) {
				$library = $this->render_aegis_icon( $attrs, $icon );

				if ( $library !== '' ) {
					$block_content = $library;
				}
			}
		} elseif ( $this->should_render_library_icon( $icon, $block_content ) ) {
			$library = $this->render_aegis_icon( $attrs, $icon );

			if ( $library !== '' ) {
				$block_content = $library;
			}
		}

		if ( $block_content === '' ) {
			return $block_content;
		}

		$block_content = $this->apply_enhancements( $block_content, $attrs );

		if ( ServiceProvider::is_block_enabled( 'icon_responsive' ) ) {
			$block_content = $this->responsive->add_responsive_classes( $block_content, $block, Responsive::SETTINGS );
			$block_content = $this->responsive->add_responsive_styles( $block_content, $block, Responsive::SETTINGS );
		}

		return $block_content;
	}

	/**
	 * Builds core/icon markup for Aegis registry IDs.
	 *
	 * @param array<string, mixed> $attrs Block attributes.
	 * @param string               $icon  Registry id.
	 */
	private function render_aegis_icon( array $attrs, string $icon ): string {
		$parsed = IconUtility::from_registry_id( $icon );

		if ( $parsed === null ) {
			return '';
		}

		$width = $attrs['style']['dimensions']['width'] ?? null;
		$svg   = IconUtility::get_svg( $parsed['set'], $parsed['name'], $width );

		if ( $svg === '' ) {
			return '';
		}

		return $this->wrap_icon_svg( $attrs, $svg );
	}

	/**
	 * Whether Aegis should render the icon from the local library.
	 */
	private function should_render_library_icon( string $icon, string $block_content ): bool {
		if ( $icon === '' ) {
			return false;
		}

		if ( str_starts_with( $icon, 'aegis/' ) ) {
			return true;
		}

		if ( $block_content === '' ) {
			return true;
		}

		$parsed = IconUtility::from_registry_id( $icon );

		if ( $parsed === null ) {
			return false;
		}

		// Core's kses sanitizer strips stroke/opacity; re-render Aegis sets from disk.
		return ( $parsed['namespace'] ?? '' ) !== 'core';
	}

	/**
	 * Wraps SVG markup in the core/icon block wrapper.
	 *
	 * @param array<string, mixed> $attrs Block attributes.
	 * @param string               $svg   SVG markup.
	 */
	private function wrap_icon_svg( array $attrs, string $svg ): string {
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
			$fill = (string) $processor->get_attribute( 'fill' );

			if ( $fill === '' || $fill === 'black' || strtolower( $fill ) === '#000' || strtolower( $fill ) === '#000000' ) {
				$processor->set_attribute( 'fill', 'currentColor' );
			}
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
		$wrapper  = get_block_wrapper_attributes();
		$svg_html = $processor->get_updated_html();

		return sprintf( '<div %s>%s</div>', $wrapper, $svg_html );
	}

	/**
	 * Applies gradient mask, link wrapper, and animation classes.
	 *
	 * @param array<string, mixed> $attrs Block attributes.
	 */
	private function apply_enhancements( string $block_content, array $attrs ): string {
		$gradient  = ServiceProvider::is_block_enabled( 'icon_gradient' ) ? ( $attrs['gradient'] ?? null ) : null;
		$animation = ServiceProvider::is_block_enabled( 'icon_animation' ) ? ( $attrs['animation'] ?? null ) : null;
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

	/**
	 * Renders a grid of all icons from a set when the all-icons class is present.
	 */
	private function render_all_icons( string $set = 'wordpress' ): string {
		$icons        = IconUtility::get_icon_data( null )[ $set ] ?? [];
		$inner_blocks = [];
		$limit        = 300;

		foreach ( $icons as $icon => $svg ) {
			unset( $svg );

			if ( $limit-- <= 0 ) {
				break;
			}

			$inner_blocks[] = [
				'blockName' => 'core/icon',
				'attrs'     => [
					'icon'  => IconUtility::to_registry_id( $set, (string) $icon ),
					'style' => [
						'dimensions' => [ 'width' => '1em' ],
					],
				],
			];
		}

		$block = [
			'blockName'   => 'core/group',
			'attrs'       => [
				'style'     => [
					'spacing'             => [ 'blockGap' => 'var(--wp--preset--spacing--sm)' ],
					'display'             => [ 'all' => 'grid' ],
					'gridTemplateColumns' => [ 'all' => 'repeat(auto-fill, minmax(1.5em, 1fr))' ],
				],
				'fontSize'  => '24',
				'textColor' => 'heading',
				'layout'    => [ 'type' => 'flex', 'orientation' => 'grid' ],
			],
			'innerBlocks' => $inner_blocks,
		];

		return do_blocks( Block::get_html( $block ) );
	}
}
