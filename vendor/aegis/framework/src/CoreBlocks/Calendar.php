<?php
/**
 * Calendar.php
 *
 * Handles the calendar core block logic for the Aegis WordPress theme.
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

use Aegis\Dom\DOM;
use Aegis\Framework\Interfaces\Renderable;
use Aegis\Utilities\Str;
use WP_Block;
use function explode;
use function implode;

/**
 * Calendar block.
 *
 * @since 1.0.0
 */
class Calendar implements Renderable {

	/**
	 * Render core/calendar block.
	 *
	 * @param string   $block_content The block content being rendered.
	 * @param array    $block         The block being rendered.
	 * @param WP_Block $instance      The block instance.
	 *
	 * @hook render_block_core/calendar
	 *
	 * @return string
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		$dom   = DOM::create( $block_content );
		$div   = DOM::get_element( 'div', $dom );
		$table = DOM::get_element( 'table', $div );

		if ( ! $table ) {
			return $block_content;
		}

		$div_classes   = explode( ' ', $div->getAttribute( 'class' ) );
		$table_classes = explode( ' ', $table->getAttribute( 'class' ) );

		foreach ( $table_classes as $index => $table_class ) {
			if ( Str::contains_any( $table_class, 'background', 'color' ) ) {
				$div_classes[] = $table_class;
				unset( $table_classes[ $index ] );
			}
		}

		$div->setAttribute( 'class', implode( ' ', $div_classes ) );
		$table->setAttribute( 'class', implode( ' ', $table_classes ) );

		return $dom->saveHTML();
	}

}
