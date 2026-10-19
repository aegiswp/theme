<?php
/**
 * Limits empty Navigation block page-list fallbacks.
 *
 * Empty `core/navigation` blocks fall back to every published page, which
 * explodes footers (and is especially visible when bbPress uses the FSE Page
 * template). Replace that unbounded page list with a compact sample menu.
 *
 * @package Aegis
 * @since   1.0.0
 */

declare( strict_types=1 );

namespace Aegis;

use function __;
use function add_filter;
use function home_url;
use function is_array;

/**
 * Softens WordPress Navigation page-list fallback for empty nav blocks.
 */
final class NavigationFallback {

	/**
	 * Registers the fallback filter.
	 *
	 * @return void
	 */
	public static function init(): void {
		add_filter( 'block_core_navigation_render_fallback', array( self::class, 'limit_page_list_fallback' ) );
	}

	/**
	 * Keeps an empty Navigation block from listing every page.
	 *
	 * @param array<int, array<string, mixed>>|false|null $fallback Fallback blocks.
	 * @return array<int, array<string, mixed>>|false|null
	 */
	public static function limit_page_list_fallback( $fallback ) {
		if ( ! is_array( $fallback ) || $fallback === array() ) {
			return $fallback;
		}

		$only_page_list = true;

		foreach ( $fallback as $block ) {
			if ( ! is_array( $block ) || ( $block['blockName'] ?? '' ) !== 'core/page-list' ) {
				$only_page_list = false;
				break;
			}
		}

		if ( ! $only_page_list ) {
			return $fallback;
		}

		$links = array(
			array(
				'label' => __( 'Home', 'aegis' ),
				'url'   => home_url( '/' ),
			),
			array(
				'label' => __( 'Blog', 'aegis' ),
				'url'   => home_url( '/blog/' ),
			),
			array(
				'label' => __( 'About', 'aegis' ),
				'url'   => home_url( '/about/' ),
			),
			array(
				'label' => __( 'Contact', 'aegis' ),
				'url'   => home_url( '/contact/' ),
			),
		);

		$blocks = array();

		foreach ( $links as $link ) {
			$blocks[] = array(
				'blockName'    => 'core/navigation-link',
				'attrs'        => array(
					'label' => $link['label'],
					'url'   => $link['url'],
					'kind'  => 'custom',
					'isTopLevelLink' => true,
				),
				'innerBlocks'  => array(),
				'innerContent' => array(),
			);
		}

		return $blocks;
	}
}
