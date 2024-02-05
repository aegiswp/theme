<?php
/**
 * Aegis: Block Patterns
 *
 * @since 1.0.0
 */

/**
 * Registers block patterns and categories.
 *
 * @since 1.0.0
 */
function aegis_register_block_patterns() {
	$block_pattern_categories = array(
		'aegis-about'           => array('label' => __('About', 'aegis')),
		'aegis-audio'           => array('label' => __('Audio', 'aegis')),
		'aegis-query'           => array('label' => __('Blog', 'aegis')),
		'aegis-contact'         => array('label' => __('Contact', 'aegis')),
		'aegis-ecommerce'       => array('label' => __('eCommerce', 'aegis')),
		'aegis-event'           => array('label' => __('Event', 'aegis')),
		'aegis-faq'             => array('label' => __('FAQ', 'aegis')),
		'aegis-feature'         => array('label' => __('Feature', 'aegis')),
		'aegis-footer'          => array('label' => __('Footer', 'aegis')),
		'aegis-gallery'         => array('label' => __('Gallery', 'aegis')),
		'aegis-header'          => array('label' => __('Header', 'aegis')),
		'aegis-hero'            => array('label' => __('Hero', 'aegis')),
		'aegis-marketing'       => array('label' => __('Marketing', 'aegis')),
		'aegis-pricing'         => array('label' => __('Pricing', 'aegis')),
		'aegis-review'          => array('label' => __('Review', 'aegis')),
		'aegis-team'            => array('label' => __('Team', 'aegis')),
		'aegis-testimonial'     => array('label' => __('Testimonial', 'aegis')),
		'aegis-video'           => array('label' => __('Video', 'aegis')),
	);

	/**
	 * Filters the theme block pattern categories.
	 *
	 * @since 1.0.0
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
	'about/about-1',
	'about/about-2',
	'about/about-3',
	'about/about-4',
	'about/about-5',
	'about/about-6',
	'about/about-7',
	'audio/audio-1',
	'query/query-1',
	'query/query-2',
	'query/query-3',
	'query/query-4',
	'query/query-5',
	'query/query-6',
	'query/query-7',
	'query/query-8',
	'query/query-9',
	'contact/contact-1',
	'ecommerce/ecommerce-1',
	'ecommerce/ecommerce-2',
	'event/event-1',
	'event/event-2',
	'faq/faq-1',
	'faq/faq-2',
	'feature/feature-1',
	'footer/footer-1',
	'footer/footer-2',
	'footer/footer-3',
	'footer/footer-4',
	'gallery/gallery-1',
	'gallery/gallery-2',
	'gallery/gallery-3',
	'gallery/gallery-4',
	'gallery/gallery-5',
	'gallery/gallery-6',
	'header/header-1',
	'header/header-2',
	'header/header-3',
	'header/header-4',
	'header/header-5',
	'header/header-6',
	'header/header-7',
	'header/header-8',
	'header/header-9',
	'header/header-10',
	'hero/hero-1',
	'hero/hero-2',
	'hero/hero-3',
	'hero/hero-4',
	'hero/hero-5',
	'hero/hero-6',
	'hero/hero-7',
	'hero/hero-8',
	'hidden/hidden-404',
	'marketing/marketing-1',
	'pricing/pricing-1',
	'review/review-1',
	'team/team-1',
	'team/team-2',
	'testimonial/testimonial-1',
	'testimonial/testimonial-2',
	'video/video-1',
	'video/video-2',
	'video/video-3',
	'video/video-4',
	);

	/**
	 * Filters the theme block patterns.
	 *
	 * @since 1.0.0
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