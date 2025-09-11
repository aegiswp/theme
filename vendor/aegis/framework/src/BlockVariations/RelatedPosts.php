<?php
/**
 * RelatedPosts Block Variation
 *
 * Provides support for querying and displaying related posts within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the logic for retrieving and filtering related posts for block queries
 * - Integrates with the block query loop for dynamic content
 *
 * @package    Aegis\Framework\BlockVariations
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for blocks variations.
declare( strict_types=1 );

// Declares the namespace for block variations within the Aegis Framework.
namespace Aegis\Framework\BlockVariations;

// Imports WordPress and utility functions for taxonomy, post, and query manipulation.
use WP_Block;
use function array_replace_recursive;
use function get_object_taxonomies;
use function get_post_type;
use function get_the_ID;
use function get_the_terms;
use function is_front_page;
use function is_singular;
use function str_contains;

// Implements the RelatedPosts class to support related posts block queries.

/**
 * Handles the "Related Posts" variation for the Query Loop block.
 *
 * This class modifies the database query of a `core/query` block to fetch
 * posts that are related to the current post, based on shared taxonomy terms.
 * This is triggered by adding the `is-related-posts` class to the Query Loop block.
 *
 * @package Aegis\Framework\BlockVariations
 * @since   1.0.0
 */
class RelatedPosts {

	/**
	 * Modifies the query arguments for a Query Loop block to fetch related posts.
	 *
	 * This method is hooked into the `query_loop_block_query_vars` filter. If it
	 * detects the `is-related-posts` class on a Query Loop block on a singular
	 * page, it overwrites the default query.
	 *
	 * The new query finds all posts that share at least one taxonomy term (e.g.,
	 * category or tag) with the current post, excluding the current post itself.
	 *
	 * @since 1.0.0
	 *
	 * @param  array    $query The original query arguments for the Query Loop.
	 * @param  WP_Block $block The block instance.
	 * @param  int      $page  The current page number for pagination.
	 *
	 * @hook   query_loop_block_query_vars
	 *
	 * @return array The modified query arguments.
	 */
	public function related_posts_query_block( array $query, WP_Block $block, int $page ): array {
		$class_name = $block->attributes['className'] ?? '';

		// Only run on blocks with the `is-related-posts` class.
		if ( ! str_contains( $class_name, 'is-related-posts' ) ) {
			return $query;
		}

		// Only run on single post/page views, not on archives or the front page.
		if ( ! is_singular() || is_front_page() ) {
			return $query;
		}

		// This check seems redundant but may be a failsafe. If the class isn't in the
		// raw HTML, return an empty query to show nothing.
		if ( ! str_contains( $block->inner_html, 'is-related-posts' ) ) {
			return [];
		}

		// --- Build the new query ---
		// Get all taxonomies associated with the current post's type.
		$term_types = get_object_taxonomies( get_post_type() );
		$tax_query  = [
			'relation' => 'OR', // Find posts that match in ANY of the taxonomies.
		];

		// For each taxonomy, get the terms of the current post.
		foreach ( $term_types as $term_type ) {
			$terms = get_the_terms( get_the_ID(), $term_type );
			if ( ! $terms ) {
				continue;
			}

			// Add a query clause to find posts that are in any of these terms.
			$tax_query[] = [
				'taxonomy'         => $term_type,
				'terms'            => wp_list_pluck( $terms, 'term_id' ),
				'include_children' => false,
			];
		}

		// Replace the original query with our new related posts query.
		return array_replace_recursive(
			$query,
			[
				'post_type'    => get_post_type(),
				'order'        => 'DESC',
				'orderby'      => 'date',
				'post__not_in' => [ get_the_ID() ], // Exclude the current post from the results.
				'tax_query'    => $tax_query,
			]
		);
	}
}
