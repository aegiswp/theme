<?php
/**
 * Query Block
 *
 * Provides support for rendering query blocks within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the logic for displaying and styling query block content
 * - Integrates with utility classes for DOM and CSS
 *
 * @package    Aegis\Framework\CoreBlocks
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for query block.
declare( strict_types=1 );

// Declares the namespace for the query block.
namespace Aegis\Framework\CoreBlocks;

// Imports classes, interfaces, and functions used by the query block.
use Aegis\Dom\CSS;
use Aegis\Dom\DOM;
use Aegis\Framework\Interfaces\Renderable;
use WP_Block;
use function str_contains;

class Query implements Renderable {

	/**
	 * Number of query images to eager-load before lazy loading the rest.
	 *
	 * @var int
	 */
	private const LAZY_LOAD_PRELOAD_COUNT = 3;

	/**
	 * Modifies front end HTML output of block.
	 *
	 * @since 1.0.0
	 *
	 * @param string   $block_content Block HTML.
	 * @param array    $block         Block data.
	 * @param WP_Block $instance      Block instance.
	 *
	 * @hook  render_block_core/query
	 *
	 * @return string
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		$block_gap = $block['attrs']['style']['spacing']['blockGap'] ?? null;

		// Apply custom block gap as a CSS custom property.
		if ( $block_gap ) {
			$dom = DOM::create( $block_content );
			$div = DOM::get_element( 'div', $dom );

			if ( ! $div ) {
				return $block_content;
			}

			$styles = CSS::string_to_array( $div->getAttribute( 'style' ) );

			$styles['--wp--style--block-gap'] = CSS::format_custom_property( $block_gap );

			$div->setAttribute( 'style', CSS::array_to_string( $styles ) );

			$block_content = $dom->saveHTML();
		}

		$columns = $block['attrs']['displayLayout']['columns'] ?? null;

		// Set column count for nowrap flex layouts.
		if ( $columns && str_contains( $block_content, 'nowrap' ) ) {
			$dom = DOM::create( $block_content );
			$div = DOM::get_element( 'div', $dom );

			if ( $div ) {
				$styles              = CSS::string_to_array( $div->getAttribute( 'style' ) );
				$styles['--columns'] = $columns;
				$div->setAttribute( 'style', CSS::array_to_string( $styles ) );

				$block_content = $dom->saveHTML();
			}
		}

		if ( $this->should_lazy_load_query_images() ) {
			$block_content = $this->apply_lazy_loading( $block_content, self::LAZY_LOAD_PRELOAD_COUNT );
		}

		return $block_content;
	}

	/**
	 * Whether the free basic query image lazy-load should run.
	 *
	 * Pro QueryPerformance owns lazy-load when the plugin is active and the
	 * query_loop_performance toggle is enabled. This fallback runs only when
	 * Pro is not installed.
	 *
	 * @return bool
	 */
	private function should_lazy_load_query_images(): bool {
		if ( class_exists( '\AegisPro\Query\QueryPerformance' ) ) {
			return false;
		}

		if ( ! class_exists( '\Aegis\Plugin\Blocks\Settings' ) ) {
			return false;
		}

		return \Aegis\Plugin\Blocks\Settings::is_enabled( 'query_loop_performance' );
	}

	/**
	 * Apply native lazy loading to query images after the preload window.
	 *
	 * @param string $content       Block HTML.
	 * @param int    $preload_count Number of images to keep eager.
	 *
	 * @return string
	 */
	private function apply_lazy_loading( string $content, int $preload_count ): string {
		$image_count = 0;

		return (string) preg_replace_callback(
			'/<img([^>]*)>/i',
			static function ( array $matches ) use ( &$image_count, $preload_count ): string {
				++$image_count;
				$img_tag = $matches[0];

				if ( str_contains( $img_tag, 'loading=' ) ) {
					return $img_tag;
				}

				if ( $image_count <= $preload_count ) {
					if ( $image_count === 1 ) {
						return str_replace( '<img', '<img loading="eager" fetchpriority="high"', $img_tag );
					}

					return str_replace( '<img', '<img loading="eager"', $img_tag );
				}

				return str_replace( '<img', '<img loading="lazy"', $img_tag );
			},
			$content
		);
	}
}
