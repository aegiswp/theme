<?php
/**
 * Theme template helpers used by block patterns.
 *
 * @package Aegis
 * @since   1.0.0
 */

declare( strict_types=1 );

if ( ! function_exists( 'aegis_url' ) ) {
	/**
	 * Returns an absolute site URL for a path.
	 *
	 * @param string $path Site path, e.g. `/contact/`.
	 */
	function aegis_url( string $path = '' ): string {
		return home_url( $path );
	}
}

if ( ! function_exists( 'aegis_wc_page_url' ) ) {
	/**
	 * Returns a WooCommerce page URL, with sensible fallbacks when WooCommerce is inactive.
	 *
	 * @param string $page WooCommerce page key, e.g. `myaccount`.
	 */
	function aegis_wc_page_url( string $page ): string {
		if ( function_exists( 'wc_get_page_permalink' ) ) {
			$permalink = wc_get_page_permalink( $page );

			if ( is_string( $permalink ) && $permalink !== '' ) {
				return $permalink;
			}
		}

		$fallbacks = array(
			'shop'      => '/shop/',
			'cart'      => '/cart/',
			'checkout'  => '/checkout/',
			'myaccount' => '/my-account/',
		);

		return home_url( $fallbacks[ $page ] ?? '/' );
	}
}
