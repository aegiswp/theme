<?php
/**
 * Aegis: Block Patterns
 *
 * @since aegis 1.0.0
 */

/**
 * Registers block patterns and categories.
 *
 * @since aegis 1.0
 */
function aegis_register_block_patterns() {
	$block_pattern_categories = array(
		'aegis-header'			=> array( 'label' => __( 'Header', 'aegis' ) ),
		'aegis-footer'			=> array( 'label' => __( 'Footer', 'aegis' ) ),
		'aegis-hero'				=> array( 'label' => __( 'Hero', 'aegis' ) ),
		'aegis-about'			=> array( 'label' => __( 'About', 'aegis' ) ),
		'aegis-team'				=> array( 'label' => __( 'Team', 'aegis' ) ),
		'aegis-testimonials'		=> array( 'label' => __( 'Testimonials', 'aegis' ) ),
		'aegis-faq'				=> array( 'label' => __( 'FAQ', 'aegis' ) ),
		'aegis-pricing'			=> array( 'label' => __( 'Pricing Table', 'aegis' ) ),
		'aegis-contact'			=> array( 'label' => __( 'Contact', 'aegis' ) ),
		'aegis-woocommerce'		=> array( 'label' => __( 'WooCommerce', 'aegis' ) ),
		'aegis-pages'			=> array( 'label' => __( 'Pages', 'aegis' ) ),
		'aegis-query'			=> array( 'label' => __( 'Blog Layout', 'aegis' ) ),
	);

	/**
	 * Filters the theme block pattern categories.
	 *
	 * @since aegis 1.0
	 *
	 * @param array[] $block_pattern_categories {
	 *	 An associative array of block pattern categories, keyed by category name.
	 *
	 *	 @type array[] $properties {
	 *		 An array of block category properties.
	 *
	 *		 @type string $label A human-readable label for the pattern category.
	 *	 }
	 * }
	 */
	$block_pattern_categories = apply_filters( 'aegis_block_pattern_categories', $block_pattern_categories );

	foreach ( $block_pattern_categories as $name => $properties ) {
		register_block_pattern_category( $name, $properties );
	}

	$block_patterns = array(
		'header/header-1',
		'header/header-2',
		'header/header-3',
		'header/header-4',
		'footer/footer-1',
		'footer/footer-2',
		'footer/footer-3',
		'footer/footer-4',
		'general/hero-1',
		'general/hero-2',
		'general/hero-3',
		'general/hero-4',
		'general/about-1',
		'general/about-2',
		'general/about-3',
		'general/about-4',
		'general/team-1',
		'general/team-2',
		'general/testimonials-1',
		'general/testimonials-2',
		'general/faq-1',
		'general/faq-2',
		'general/contact-1',
		'general/contact-2',
		'woocommerce/woocommerce-1',
		'woocommerce/woocommerce-2',
		'woocommerce/woocommerce-3',
		'woocommerce/woocommerce-4',
		'pages/home',
		'pages/home-1',
		'pages/home-2',
		'pages/home-3',
		'pages/home-4',
		'pages/about',
		'pages/shop',
		'pages/shop-1',
		'pages/shop-2',
		'query/query-1',
		'query/query-2',
		'query/query-3',
		'query/query-4',
		'hidden/hidden-404',
	);

	/**
	 * Filters the theme block patterns.
	 *
	 * @since aegis 1.0.0
	 *
	 * @param $block_patterns array List of block patterns by name.
	 */
	$block_patterns = apply_filters( 'aegis_block_patterns', $block_patterns );

	foreach ( $block_patterns as $block_pattern ) {
		register_block_pattern(
			'aegis/' . $block_pattern,
			require get_template_directory() . '/patterns/' . $block_pattern . '.php'

		);
	}
}
add_action( 'init', 'aegis_register_block_patterns', 9 );