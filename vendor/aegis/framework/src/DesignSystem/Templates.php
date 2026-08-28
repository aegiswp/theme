<?php
/**
 * Templates Component
 *
 * Provides support for customizing and extending the template hierarchy in the Aegis Framework.
 *
 * Responsibilities:
 * - Updates and customizes template hierarchy for search and archive pages
 * - Integrates with the block editor and WordPress template system
 *
 * @package    Aegis\Framework\DesignSystem
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for templates component.
declare( strict_types=1 );

// Declares the namespace for the templates component.
namespace Aegis\Framework\DesignSystem;

// Imports classes, interfaces, and functions used by the templates component.
use WP_Block_Template;
use function array_unshift;
use function class_exists;
use function defined;
use function file_exists;
use function function_exists;
use function get_post_type;
use function get_queried_object;
use function get_stylesheet_directory;
use function get_template;
use function get_template_directory;
use function in_array;
use function is_post_type_archive;
use function is_search;
use function str_contains;
use function str_starts_with;

class Templates {

	/**
	 * WooCommerce FSE template slugs registered by the Aegis theme.
	 *
	 * @var string[]
	 */
	private const WOOCOMMERCE_TEMPLATE_SLUGS = array(
		'archive-product',
		'single-product',
		'product-search-results',
		'single-product-landing',
		'taxonomy-product_cat',
		'taxonomy-product_tag',
		'taxonomy-product_attribute',
		'taxonomy-product_cat-clothing',
		'taxonomy-product_cat-digital',
		'taxonomy-product_cat-outlet',
		'page-cart',
		'page-checkout',
		'page-checkout-multi-step',
		'page-coming-soon',
		'order-confirmation',
		'page-my-account',
	);

	/**
	 * Updates search template hierarchy.
	 *
	 * @since 1.0.0
	 *
	 * @param array $templates Template files to search for, in order.
	 *
	 * @hook  search_template_hierarchy
	 *
	 * @return array
	 */
	public function update_search_template_hierarchy( array $templates ): array {
		// Prioritize post-type-specific search templates when available.
		if ( is_search() && is_post_type_archive() ) {
			$post_type = get_queried_object()->name ?? get_post_type();
			$slug      = "search-$post_type";
			$child     = get_stylesheet_directory() . "/templates/$slug.html";
			$parent    = get_template_directory() . "/templates/$slug.html";

			if ( file_exists( $child ) || file_exists( $parent ) ) {
				array_unshift( $templates, $slug );
			}
		}

		return $templates;
	}

	/**
	 * Remove unused templates from editor.
	 *
	 * @since 1.0.0
	 *
	 * @param ?WP_Block_Template[] $query_result  The query result.
	 * @param array                $query         The query.
	 * @param string               $template_type The template type.
	 *
	 * @hook  get_block_templates
	 *
	 * @return array
	 */
	public function remove_templates( ?array $query_result, array $query, string $template_type ): array {
		if ( 'wp_template' !== $template_type || ! is_array( $query_result ) ) {
			return $query_result ?? array();
		}

		$woocommerce   = class_exists( 'WooCommerce' );
		$ti_wishlist   = defined( 'TINVWL_VERSION' ) || function_exists( 'tinvwl_get_wishlist' );
		$edd           = class_exists( 'Easy_Digital_Downloads' );
		$template      = get_template();
		$stylesheet    = get_stylesheet();

		foreach ( $query_result as $index => $wp_block_template ) {
			$slug  = $wp_block_template->slug;
			$theme = $wp_block_template->theme;

			if ( ! in_array( $theme, [ $template, $stylesheet ], true ) ) {
				continue;
			}

			if ( ! $woocommerce && $this->is_woocommerce_template_slug( $slug ) ) {
				unset( $query_result[ $index ] );
				continue;
			}

			if ( ( ! $woocommerce || ! $ti_wishlist ) && 'page-wishlist' === $slug ) {
				unset( $query_result[ $index ] );
				continue;
			}

			if ( ! $edd && str_contains( $slug, 'download' ) ) {
				unset( $query_result[ $index ] );
			}
		}

		return $query_result;
	}

	/**
	 * Whether a template slug belongs to the WooCommerce template set.
	 *
	 * @param string $slug Template slug.
	 */
	private function is_woocommerce_template_slug( string $slug ): bool {
		if ( in_array( $slug, self::WOOCOMMERCE_TEMPLATE_SLUGS, true ) ) {
			return true;
		}

		return str_starts_with( $slug, 'taxonomy-product_' )
			|| str_contains( $slug, 'product' );
	}
}
