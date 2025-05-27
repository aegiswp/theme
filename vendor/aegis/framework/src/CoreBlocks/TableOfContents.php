<?php
/**
 * TableOfContents.php
 *
 * Handles the table of contents core block logic for the Aegis WordPress theme.
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

use Aegis\Container\Interfaces\Conditional;
use Aegis\Framework\Interfaces\Renderable;
use Aegis\Dom\CSS;
use Aegis\Dom\DOM;
use WP_Block;
use function do_blocks;
use function esc_html__;
use function get_the_content;
use function get_the_title;
use function in_array;
use function is_admin;
use function sanitize_title;

/**
 * TableOfContents class.
 *
 * @since 1.0.0
 */
class TableOfContents implements Renderable, Conditional {

	/**
	 * Condition.
	 *
	 * @since 1.0.0
	 *
	 * @return bool
	 */
	public static function condition(): bool {
		return ! is_admin();
	}

	/**
	 * Render Table of Contents block.
	 *
	 * @param string   $block_content The block content.
	 * @param array    $block         The block.
	 * @param WP_Block $instance      The block instance.
	 *
	 * @hook render_block_core/table-of-contents
	 *
	 * @return string
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		$headings = $block['attrs']['headings'] ?? [];
		$sidebar  = false;

		foreach ( $headings as $heading ) {
			$content = $heading['content'] ?? '';

			if ( in_array(
				$content,
				[
					esc_html__( 'Table of Contents', 'aegis' ),
					esc_html__( 'Contents', 'aegis' ),
					esc_html__( 'Table of contents', 'aegis' ),
				],
				true
			) ) {
				$sidebar = true;
			}
		}

		if ( $sidebar ) {
			$content_headings = [
				get_the_title(),
			];
			$content_dom      = DOM::create( do_blocks( get_the_content() ) );

			foreach ( $content_dom->getElementsByTagName( '*' ) as $element ) {
				if ( in_array(
					$element->tagName,
					[ 'h2', 'h3', 'h4', 'h5', 'h6' ],
					true
				) ) {
					$content_headings[] = $element->textContent;
				}
			}

			$dom = DOM::create( $block_content );
			$nav = DOM::get_element( 'nav', $dom );

			if ( ! $nav ) {
				return $block_content;
			}

			$nav->removeChild( $nav->firstChild );

			$ol = DOM::create_element( 'ol', $dom );

			$nav->appendChild( $ol );

			foreach ( $content_headings as $content_heading ) {
				$link = DOM::create_element( 'a', $dom );

				$link->setAttribute( 'href', '#' . sanitize_title( $content_heading ) );

				$link->textContent = $content_heading;

				$li = DOM::create_element( 'li', $dom );

				$li->appendChild( $link );
				$ol->appendChild( $li );
			}

			$nav_styles = CSS::string_to_array( $nav->getAttribute( 'style' ) );

			$gap = $block['attrs']['style']['spacing']['blockGap'] ?? null;

			if ( $gap ) {
				$nav_styles['gap'] = CSS::format_custom_property( $gap );
			}

			$ol->setAttribute( 'style', CSS::array_to_string( $nav_styles ) );

			$nav->removeAttribute( 'style' );

			$block_content = $dom->saveHTML();
		}

		return $block_content;
	}

}
