<?php
/**
 * Woocommerce functions
 *
 * @package Aegis
 * @since 1.0.0
 */

// Enable WooCommerce support.
add_theme_support('woocommerce');

// Enable WooCommerce product gallery features.
add_theme_support('wc-product-gallery-zoom');
add_theme_support('wc-product-gallery-lightbox');
add_theme_support('wc-product-gallery-slider');

// Configure WooCommerce support.
add_theme_support(
	'woocommerce',
	array(
		'thumbnail_image_width' => 600,
		'single_image_width'    => 1400,
	)
);


/**
 * Woocommerce functions
 *
 * @package Aegis
 * @since 1.0.0
 */

/**
 * Filter the number of columns in the shop loop.
 * 
 * @param int $columns The default number of columns.
 * @return int The modified number of columns.
 */
add_filter('loop_shop_columns', 'loop_columns', 999);

/**
 * Check if the function loop_columns does not already exist.
 * If it does not, define the function.
 */
if (!function_exists('loop_columns')) {
	/**
	 * Get the number of products per row in the shop loop.
	 *
	 * @return int The number of products per row.
	 */
	function loop_columns()
	{
		return 3; // 3 products per row.
	}
}