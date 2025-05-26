<?php
/**
 * Image.php
 *
 * Handles the image core block logic for the Aegis WordPress theme.
 *
 * @package   Aegis\Framework\CoreBlocks
 * @author    Atmostfear Entertainment
 * @copyright Copyright (c) 2025
 * @license   GPL-2.0-or-later
 * @link      https://github.com/aegiswp/theme
 * @since     1.0.0
 */

declare( strict_types=1 );

namespace Aegis\Framework\CoreBlocks;

use Aegis\Dom\CSS;
use Aegis\Dom\DOM;
use Aegis\Framework\BlockSettings\Image as ImageSettings;
use Aegis\Framework\BlockSettings\Responsive;
use Aegis\Framework\Interfaces\Renderable;
use WP_Block;
use function in_array;

/**
 * Image class.
 *
 * @since 1.0.0
 */
class Image implements Renderable {

	/**
	 * Responsive.
	 *
	 * @var Responsive
	 */
	private Responsive $responsive;

	/**
	 * Image constructor.
	 *
	 * @param Responsive $responsive Responsive.
	 *
	 * @return void
	 */
	public function __construct( Responsive $responsive ) {
		$this->responsive = $responsive;
	}

	/**
	 * Modifies front end HTML output of block.
	 *
	 * @since 1.0.0
	 *
	 * @param string   $block_content Block HTML.
	 * @param array    $block         Block data.
	 * @param WP_Block $instance      Block object.
	 *
	 * @hook  render_block
	 *
	 * @return string
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		$name = $block['blockName'] ?? '';

		if ( ! in_array( $name, [ 'core/image', 'core/post-featured-image', 'aegis/image-compare' ], true ) ) {
			return $block_content;
		}

		$attrs         = $block['attrs'] ?? [];
		$id            = $attrs['id'] ?? '';
		$has_icon      = ( $attrs['iconSet'] ?? '' ) && ( $attrs['iconName'] ?? '' ) || ( $attrs['iconSvgString'] ?? '' );
		$style         = $attrs['style'] ?? [];
		$has_svg       = $style['svgString'] ?? '';
		$margin        = $style['spacing']['margin'] ?? '';
		$border_radius = $style['border']['radius'] ?? '';

		// Image options.
		if ( ! $has_icon && ! $has_svg ) {

			if ( in_array( $name, [ 'core/image', 'core/post-featured-image' ], true ) ) {
				$block_content = $this->responsive->add_responsive_classes(
					$block_content,
					$block,
					ImageSettings::SETTINGS,
					(bool) $id
				);
			}
		}

		$dom    = DOM::create( $block_content );
		$figure = DOM::get_element( 'figure', $dom );

		if ( $figure ) {
			$styles = CSS::string_to_array( $figure->getAttribute( 'style' ) );

			if ( $margin ) {
				$styles = CSS::add_shorthand_property( $styles, 'margin', $style['spacing']['margin'] ?? [] );
			}

			if ( $border_radius ) {
				$styles = CSS::add_shorthand_property( $styles, 'border-radius', $style['border']['radius'] ?? [] );
			}

			$figure->setAttribute(
				'style',
				CSS::array_to_string( $styles )
			);
		}

		return $dom->saveHTML();
	}

}
