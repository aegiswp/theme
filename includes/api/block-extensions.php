<?php
/**
 * Block Extensions API
 *
 * Implements advanced block extension capabilities for WordPress block themes, including block supports, editor options, and rendering hooks.
 *
 * Responsibilities:
 * - Registers and manages additional block supports (responsive settings, positioning, filters, etc.)
 * - Adds custom block editor options for positioning, display, grid, overflow, pointer events, and more
 * - Hooks into the block rendering pipeline to inject custom classes and inline styles
 * - Provides utility functions for manipulating block attributes and styles
 *
 * Hooks/Filters Registered:
 * - 'aegis_editor_data': Registers responsive settings in the editor config
 * - 'aegis_inline_css': Adds extra utility CSS for blocks
 * - 'render_block': Adds position classes, responsive classes, inline styles, opacity, and backdrop blur
 *
 * @package    Aegis\Theme
 * @subpackage Block Extensions
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this doc update.
 */

declare( strict_types=1 );

namespace Aegis\Theme;

use function _wp_to_kebab_case;
use function add_filter;
use function array_merge;
use function implode;
use function sprintf;
use function str_contains;
use function str_replace;

/**
 * Returns the configuration array for block extension options.
 *
 * These options define additional block supports (position, display, grid, etc.) that are available in the Aegis Framework.
 * Used by the editor and in rendering logic to apply advanced controls and styles.
 *
 * @since 1.0.0
 *
 * @return array Associative array of block extension options and their settings.
 */
function get_block_extension_options(): array {
	return [
		'position'            => [
			'property' => 'position',
			'label'    => __( 'Position', 'aegis' ),
			'options'  => [
				[
					'label' => __( 'Default', 'aegis' ),
					'value' => 'default',
				],
				[
					'label' => __( 'Relative', 'aegis' ),
					'value' => 'relative',
				],
				[
					'label' => __( 'Absolute', 'aegis' ),
					'value' => 'absolute',
				],
				[
					'label' => __( 'Sticky', 'aegis' ),
					'value' => 'sticky',
				],
				[
					'label' => __( 'Fixed', 'aegis' ),
					'value' => 'fixed',
				],
				[
					'label' => __( 'Static', 'aegis' ),
					'value' => 'static',
				],
			],
		],
		'top'                 => [
			'property' => 'top',
			'label'    => __( 'Top', 'aegis' ),
		],
		'right'               => [
			'property' => 'right',
			'label'    => __( 'Right', 'aegis' ),
		],
		'bottom'              => [
			'property' => 'bottom',
			'label'    => __( 'Bottom', 'aegis' ),
		],
		'left'                => [
			'property' => 'left',
			'label'    => __( 'Left', 'aegis' ),
		],
		'zIndex'              => [
			'property' => 'z-index',
			'label'    => __( 'Z-Index', 'aegis' ),
		],
		'display'             => [
			'property' => 'display',
			'label'    => __( 'Display', 'aegis' ),
			'options'  => [
				[
					'label' => __('Default', 'aegis'),
					'value' => 'default',
				],
				[
					'label' => __( 'None', 'aegis' ),
					'value' => 'none',
				],
				[
					'label' => __( 'Flex', 'aegis' ),
					'value' => 'flex',
				],
				[
					'label' => __( 'Inline Flex', 'aegis' ),
					'value' => 'inline-flex',
				],
				[
					'label' => __( 'Block', 'aegis' ),
					'value' => 'block',
				],
				[
					'label' => __( 'Inline Block', 'aegis' ),
					'value' => 'inline-block',
				],
				[
					'label' => __( 'Inline', 'aegis' ),
					'value' => 'inline',
				],
				[
					'label' => __( 'Grid', 'aegis' ),
					'value' => 'grid',
				],
				[
					'label' => __( 'Inline Grid', 'aegis' ),
					'value' => 'inline-grid',
				],
				[
					'label' => __( 'Contents', 'aegis' ),
					'value' => 'contents',
				],
			],
		],
		'order'               => [
			'property' => 'order',
			'label'    => __( 'Order', 'aegis' ),
		],
		'gridTemplateColumns' => [
			'property' => 'grid-template-columns',
			'label'    => __( 'Columns', 'aegis' ),
		],
		'gridTemplateRows'    => [
			'property' => 'grid-template-rows',
			'label'    => __( 'Rows', 'aegis' ),
		],
		'gridColumnStart'     => [
			'property' => 'grid-column-start',
			'label'    => __( 'Column Start', 'aegis' ),
		],
		'gridColumnEnd'       => [
			'property' => 'grid-column-end',
			'label'    => __( 'Column End', 'aegis' ),
		],
		'gridRowStart'        => [
			'property' => 'grid-row-start',
			'label'    => __( 'Row Start', 'aegis' ),
		],
		'gridRowEnd'          => [
			'property' => 'grid-row-end',
			'label'    => __( 'Row End', 'aegis' ),
		],
		'overflow'            => [
			'property' => 'overflow',
			'label'    => __( 'Overflow', 'aegis' ),
			'options'  => [
				[
					'label' => __('Default', 'aegis'),
					'value' => 'default',
				],
				[
					'label' => __( 'Hidden', 'aegis' ),
					'value' => 'hidden',
				],
				[
					'label' => __( 'Visible', 'aegis' ),
					'value' => 'visible',
				],
			],
		],
		'pointerEvents'       => [
			'property' => 'pointer-events',
			'label'    => __( 'Pointer Events', 'aegis' ),
			'options'  => [
				[
					'label' => '',
					'value' => '',
				],
				[
					'label' => __( 'None', 'aegis' ),
					'value' => 'none',
				],
				[
					'label' => __( 'All', 'aegis' ),
					'value' => 'all',
				],
			],
		],
		'width'               => [
			'property' => 'width',
			'label'    => __( 'Width', 'aegis' ),
		],
		'minWidth'            => [
			'property' => 'min-width',
			'label'    => __( 'Min Width', 'aegis' ),
		],
		'maxWidth'            => [
			'property' => 'max-width',
			'label'    => __( 'Max Width', 'aegis' ),
		],
	];
}

/**
 * Returns available filter options for blocks.
 *
 * Used to provide filter controls (e.g., blur, brightness, contrast) in the block editor and front-end.
 *
 * @since 1.0.0
 *
 * @return array Associative array of filter options and their settings.
 */
function get_filter_options(): array {
	return [
		'blur'       => [
			'unit' => 'px',
			'min'  => 0,
			'max'  => 500,
		],
		'brightness' => [
			'unit' => '%',
			'min'  => 0,
			'max'  => 360,
		],
		'contrast'   => [
			'unit' => '%',
			'min'  => 0,
			'max'  => 200,
		],
		'grayscale'  => [
			'unit' => '%',
			'min'  => 0,
			'max'  => 100,
		],
		'hueRotate'  => [
			'unit' => 'deg',
			'min'  => -360,
			'max'  => 360,
		],
		'invert'     => [
			'unit' => '%',
			'min'  => 0,
			'max'  => 100,
		],
		'opacity'    => [
			'unit' => '%',
			'min'  => 0,
			'max'  => 100,
		],
		'saturate'   => [
			'unit' => '',
			'min'  => 0,
			'max'  => 100,
			'step' => 0.1,
		],
		'sepia'      => [
			'unit' => '%',
			'min'  => 0,
			'max'  => 100,
		],
	];
}

/**
 * Returns image-specific block extension options.
 *
 * Used to provide advanced image controls (object-fit, object-position, etc.) in the block editor and front-end.
 *
 * @since 1.0.0
 *
 * @return array Associative array of image option settings.
 */
function get_image_options(): array {
	return [
		'aspectRatio'    => [
			'property' => 'aspect-ratio',
			'label'    => __( 'Aspect Ratio', 'aegis' ),
			'options'  => [
				[
					'label' => '',
					'value' => '',
				],
				[
					'label' => '1/1',
					'value' => '1/1',
				],
				[
					'label' => '1/2',
					'value' => '1/2',
				],
				[
					'label' => '1/3',
					'value' => '1/3',
				],
				[
					'label' => '2/1',
					'value' => '2/1',
				],
				[
					'label' => '2/3',
					'value' => '2/3',
				],
				[
					'label' => '3/1',
					'value' => '3/1',
				],
				[
					'label' => '3/2',
					'value' => '3/2',
				],
				[
					'label' => '3/4',
					'value' => '3/4',
				],
				[
					'label' => '4/3',
					'value' => '4/3',
				],
				[
					'label' => '4/5',
					'value' => '4/5',
				],
				[
					'label' => '5/2',
					'value' => '5/2',
				],
				[
					'label' => '5/4',
					'value' => '5/4',
				],
				[
					'label' => '9/16',
					'value' => '9/16',
				],
				[
					'label' => '16/9',
					'value' => '16/9',
				],
			],
		],
		'height'         => [
			'property' => 'height',
			'label'    => __( 'Height', 'aegis' ),
		],
		'objectFit'      => [
			'property' => 'object-fit',
			'label'    => __( 'Object Fit', 'aegis' ),
			'options'  => [
				[
					'label' => '',
					'value' => '',
				],
				[
					'label' => __( 'Fill', 'aegis' ),
					'value' => 'fill',
				],
				[
					'label' => __( 'Contain', 'aegis' ),
					'value' => 'contain',
				],
				[
					'label' => __( 'Cover', 'aegis' ),
					'value' => 'cover',
				],
				[
					'label' => __( 'None', 'aegis' ),
					'value' => 'none',
				],
				[
					'label' => __( 'Scale Down', 'aegis' ),
					'value' => 'scale-down',
				],
			],
		],
		'objectPosition' => [
			'property' => 'object-position',
			'label'    => __( 'Object Position', 'aegis' ),
			'options'  => [
				[
					'label' => '',
					'value' => '',
				],
				[
					'label' => __( 'Top', 'aegis' ),
					'value' => 'top',
				],
				[
					'label' => __( 'Top Right', 'aegis' ),
					'value' => 'top right',
				],
				[
					'label' => __( 'Right', 'aegis' ),
					'value' => 'right',
				],
				[
					'label' => __( 'Bottom Right', 'aegis' ),
					'value' => 'bottom right',
				],
				[
					'label' => __( 'Bottom', 'aegis' ),
					'value' => 'bottom',
				],
				[
					'label' => __( 'Bottom Left', 'aegis' ),
					'value' => 'bottom left',
				],
				[
					'label' => __( 'Left', 'aegis' ),
					'value' => 'left',
				],
				[
					'label' => __( 'Top Left', 'aegis' ),
					'value' => 'top left',
				],
				[
					'label' => __( 'Center', 'aegis' ),
					'value' => 'center',
				],
				[
					'label' => __( 'None', 'aegis' ),
					'value' => 'none',
				],
			],
		],
	];
}

/**
 * Filter: 'aegis_editor_data'
 * Registers responsive settings into the Aegis editor config.
 *
 * @see register_responsive_settings()
 */
add_filter( 'aegis_editor_data', NS . 'register_responsive_settings', 11 );
/**
 * Registers default block supports (responsive settings) for the Aegis editor config.
 *
 * @since 1.0.0
 *
 * @param array $config Aegis editor config.
 * @return array Modified editor config with responsive settings.
 */
function register_responsive_settings( array $config = [] ): array {
	$config['extensionOptions'] = get_block_extension_options();
	$config['filterOptions']    = get_filter_options();
	$config['imageOptions']     = get_image_options();

	return $config;
}

/**
 * Filter: 'aegis_inline_css'
 * Adds extra utility CSS for blocks based on custom settings.
 *
 * @see get_block_extra_styles()
 */
add_filter( 'aegis_inline_css', NS . 'get_block_extra_styles', 11, 3 );
/**
 * Conditionally adds CSS for utility classes to the block output.
 *
 * This function inspects block content and settings, and injects additional CSS for utility classes as needed.
 *
 * @since 1.0.0
 *
 * @param string $css     Inline CSS.
 * @param string $content Page Content.
 * @param bool   $all     Whether this is the editor page.
 * @return string Modified CSS including extra utility styles.
 */
function get_block_extra_styles( string $css, string $content, bool $all ): string {
	$options = array_merge(
		get_block_extension_options(),
		get_image_options(),
	);
	$both    = '';
	$mobile  = '';
	$desktop = '';

	foreach ( $options as $key => $args ) {
		$property       = _wp_to_kebab_case( $key );
		$select_options = $args['options'] ?? [];

		foreach ( $select_options as $option ) {
			$value = $option['value'] ?? '';

			if ( ! $value ) {
				continue;
			}

			$formatted_value = $value;

			if ( 'aspect-ratio' === $property ) {
				$formatted_value = str_replace( '/', '\/', $formatted_value );
			}

			if ( $all || str_contains( $content, " has-{$property}-{$value}" ) ) {
				$both .= sprintf(
					'.has-%1$s-%3$s{%1$s:%2$s !important}',
					$property,
					$value,
					$formatted_value,
				);
			}

			if ( $all || str_contains( $content, " has-{$property}-{$value}-mobile" ) ) {
				$mobile .= sprintf(
					'.has-%1$s-%3$s-mobile{%1$s:%2$s !important}',
					$property,
					$value,
					$formatted_value,
				);
			}

			if ( $all || str_contains( $content, " has-{$property}-{$value}-desktop" ) ) {
				$desktop .= sprintf(
					'.has-%1$s-%3$s-desktop{%1$s:%2$s !important}',
					$property,
					$value,
					$formatted_value,
				);
			}
		}

		// Has custom value.
		if ( ! $select_options ) {

			if ( $all || str_contains( $content, " has-$property" ) ) {
				$both .= sprintf(
					'.has-%1$s{%1$s:var(--%1$s)}',
					$property
				);
			}

			if ( $all || str_contains( $content, "--$property-mobile" ) ) {
				$mobile .= sprintf(
					'.has-%1$s{%1$s:var(--%1$s-mobile,var(--%1$s))}',
					$property
				);
			}

			if ( $all || str_contains( $content, "--$property-desktop" ) ) {
				$desktop .= sprintf(
					'.has-%1$s{%1$s:var(--%1$s-desktop,var(--%1$s))}',
					$property
				);
			}
		}
	}

	if ( $both ) {
		$css .= $both;
	}

	if ( $mobile ) {
		$css .= sprintf( '@media(max-width:781px){%s}', $mobile );
	}

	if ( $desktop ) {
		$css .= sprintf( '@media(min-width:782px){%s}', $desktop );
	}

	return $css;
}

/**
 * Filter: 'render_block'
 * Adds inline block positioning classes during block rendering.
 *
 * @see add_position_classes()
 */
add_filter( 'render_block', NS . 'add_position_classes', 11, 2 );
/**
 * Adds inline block positioning classes to the rendered block HTML.
 *
 * Inspects block attributes and applies CSS classes for custom positioning (relative, absolute, sticky, etc.).
 *
 * @since 1.0.0
 *
 * @param string $html  Block content HTML.
 * @param array  $block Block data/attributes.
 * @return string Modified HTML with positioning classes.
 */
function add_position_classes( string $html, array $block ): string {
	$style = $block['attrs']['style'] ?? [];

	if ( ! $style ) {
		return $html;
	}

	return add_responsive_classes(
		$html,
		$block,
		get_block_extension_options()
	);
}

/**
 * Adds responsive classes for a given property to the block HTML.
 *
 * Generates utility classes for mobile/desktop/all breakpoints based on block attributes and options.
 *
 * @since 1.0.0
 *
 * @param string $html    Block HTML content.
 * @param array  $block   Block data/attributes.
 * @param array  $options Block options array.
 * @param bool   $image   Whether this is an image block.
 * @return string Modified HTML with responsive classes.
 */
function add_responsive_classes( string $html, array $block, array $options, bool $image = false ): string {
	$dom   = dom( $html );
	$first = get_dom_element( '*', $dom );

	if ( ! $first ) {
		return $html;
	}

	$element = $first;

	if ( $image ) {
		$link    = get_dom_element( 'a', $first );
		$element = $link ? get_dom_element( 'img', $link ) : get_dom_element( 'img', $first );
	}

	if ( ! $element ) {
		return $html;
	}

	$style   = $block['attrs']['style'] ?? [];
	$classes = explode( ' ', $element->getAttribute( 'class' ) );

	foreach ( $options as $key => $args ) {
		// Skip if style for this key is not set or empty
		if ( ! isset( $style[ $key ] ) || $style[ $key ] === '' ) {
			continue;
		}

		// Convert property name to kebab-case for CSS class
		$property = _wp_to_kebab_case( $key );

		if ( isset( $args['options'] ) ) {
			// Responsive: get values for all, mobile, desktop breakpoints
			$both    = $style[ $key ]['all'] ?? '';
			$mobile  = $style[ $key ]['mobile'] ?? '';
			$desktop = $style[ $key ]['desktop'] ?? '';

			// Add utility classes for each breakpoint if set
			if ( $both ) {
				$classes[] = "has-{$property}-{$both}";
			}

			if ( $mobile ) {
				$classes[] = "has-{$property}-{$mobile}-mobile";
			}

			if ( $desktop ) {
				$classes[] = "has-{$property}-{$desktop}-desktop";
			}
		} else {
			// Non-responsive: add base class
			$classes[] = "has-{$property}";
		}

		// Set the computed classes on the element
		$element->setAttribute( 'class', implode( ' ', $classes ) );

		// Update HTML with new class attribute
		$html = $dom->saveHTML();
	}

	return $html;
}

/**
 * Filter: 'render_block'
 * Adds inline positioning styles to rendered block HTML.
 *
 * @see add_position_styles()
 */
add_filter( 'render_block', NS . 'add_position_styles', 11, 2 );
/**
 * Adds inline positioning styles to the rendered block HTML.
 *
 * Applies custom CSS variables for block positioning based on block attributes and responsive settings.
 *
 * @since 1.0.0
 *
 * @param string $html  Block HTML.
 * @param array  $block Block data/attributes.
 * @return string Modified HTML with inline styles for positioning.
 */
function add_position_styles( string $html, array $block ): string {
	$style = $block['attrs']['style'] ?? [];

	if ( ! $style ) {
		return $html;
	}

	$options = get_block_extension_options();

	foreach ( $options as $key => $args ) {

		// Skip if style for this key is not set
		if ( ! isset( $style[ $key ] ) ) {
			continue;
		}

		// Skip if this property is handled by utility classes
		if ( isset( $args['options'] ) ) {
			continue;
		}

		// Get the first DOM element from the block HTML
		$dom   = dom( $html );
		$first = get_dom_element( '*', $dom );

		if ( ! $first ) {
			continue;
		}

		// Parse existing inline styles
		$styles   = css_string_to_array( $first->getAttribute( 'style' ) );
		$property = _wp_to_kebab_case( $key );
		$both     = $style[ $key ]['all'] ?? '';
		$mobile   = $style[ $key ]['mobile'] ?? '';
		$desktop  = $style[ $key ]['desktop'] ?? '';

		// Add CSS variables for each breakpoint if set
		if ( $both ) {
			$styles[ '--' . $property ] = $both;
		}

		if ( $mobile ) {
			$styles[ '--' . $property . '-mobile' ] = $mobile;
		}

		if ( $desktop ) {
			$styles[ '--' . $property . '-desktop' ] = $desktop;
		}

		// Set the updated style attribute
		$first->setAttribute( 'style', css_array_to_string( $styles ) );

		// Update HTML with new style attribute
		$html = $dom->saveHTML();
	}

	return $html;
}

/**
 * Filter: 'render_block'
 * Adds opacity style to rendered block HTML.
 *
 * @see add_opacity_style()
 */
add_filter( 'render_block', NS . 'add_opacity_style', 12, 2 );
/**
 * Adds opacity style to the rendered block HTML.
 *
 * Applies CSS opacity to the block based on filter settings in block attributes.
 *
 * @since 1.0.0
 *
 * @param string $html  Block HTML.
 * @param array  $block Block data/attributes.
 * @return string Modified HTML with opacity style applied.
 */
function add_opacity_style( string $html, array $block ): string {
	$opacity = $block['attrs']['style']['filter']['opacity'] ?? '';

	if ( $opacity ) {
		$dom   = dom( $html );
		$first = get_dom_element( '*', $dom );

		if ( ! $first ) {
			return $html;
		}

		$styles = css_string_to_array( $first->getAttribute( 'style' ) );

		$first->setAttribute( 'style', css_array_to_string( $styles ) );

		$html = $dom->saveHTML();
	}

	return $html;
}

/**
 * Filter: 'render_block'
 * Adds backdrop blur style to rendered block HTML.
 *
 * @see add_backdrop_blur()
 */
add_filter( 'render_block', NS . 'add_backdrop_blur', 12, 2 );
/**
 * Adds backdrop blur style to the rendered block HTML.
 *
 * Applies CSS backdrop-filter blur effect to the block if enabled in filter settings.
 *
 * @since 1.0.0
 *
 * @param string $html  Block HTML.
 * @param array  $block Block data/attributes.
 * @return string Modified HTML with backdrop blur style applied.
 */
function add_backdrop_blur( string $html, array $block ): string {
	$blur = (string) ( $block['attrs']['style']['filter']['blur'] ?? '' );

	if ( ! $blur ) {
		return $html;
	}

	$use_backdrop = (string) ( $block['attrs']['style']['filter']['backdrop'] ?? '' );

	if ( ! $use_backdrop ) {
		return $html;
	}

	$dom   = dom( $html );
	$first = get_dom_element( '*', $dom );

	if ( ! $first ) {
		return $html;
	}

	$styles = css_string_to_array( $first->getAttribute( 'style' ) );

	$backdrop_blur = 'blur(' . $blur . 'px)';

	unset( $styles['backdrop-filter'] );
	unset( $styles['-webkit-backdrop-filter'] );

	$styles['backdrop-filter']         = $backdrop_blur;
	$styles['-webkit-backdrop-filter'] = $backdrop_blur;

	$opacity = (int) ( $block['attrs']['style']['filter']['opacity'] ?? '' );

	if ( $opacity ) {
		$existing = $styles['filter'] ?? '';

		if ( $existing ) {
			$styles['filter'] = str_replace(
				' opacity(' . $opacity . '%)',
				'',
				$existing
			);
		}
	}

	$first->setAttribute( 'style', css_array_to_string( $styles ) );

	return $dom->saveHTML();
}
