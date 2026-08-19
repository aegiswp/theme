<?php
/**
 * Related Posts query builder.
 *
 * @package Aegis
 * @since   1.0.0
 */

declare( strict_types=1 );

namespace Aegis\Blocks;

use WP_Query;
use function apply_filters;
use function get_object_taxonomies;
use function get_post_type;
use function get_the_terms;
use function is_wp_error;
use function wp_list_pluck;

/**
 * Builds WP_Query instances for related post displays.
 */
final class RelatedPostsQuery {

	/**
	 * Run a related posts query with optional fallback.
	 *
	 * @param int                  $post_id         Current post ID.
	 * @param array<string, mixed> $options         Query options.
	 * @param string               $filter_context  Context passed to aegis_related_posts_query.
	 *
	 * @return WP_Query|null Null when no posts should display.
	 */
	public static function query( int $post_id, array $options = array(), string $filter_context = 'block' ): ?WP_Query {
		$post_type = get_post_type( $post_id );

		if ( ! $post_type ) {
			return null;
		}

		$posts_per_page    = (int) ( $options['postsPerPage'] ?? 3 );
		$taxonomy_source   = (string) ( $options['taxonomySource'] ?? 'auto' );
		$fallback_behavior = (string) ( $options['fallbackBehavior'] ?? 'latest' );

		$query_args = self::build_args( $post_id, $post_type, $posts_per_page, $taxonomy_source );
		$query_args = apply_filters( 'aegis_related_posts_query', $query_args, $post_id, $filter_context );

		$related_query = new WP_Query( $query_args );

		if ( $related_query->have_posts() ) {
			return $related_query;
		}

		if ( 'hide' === $fallback_behavior ) {
			return null;
		}

		unset( $query_args['tax_query'] );
		$query_args = apply_filters( 'aegis_related_posts_query', $query_args, $post_id, $filter_context . '-fallback' );

		$fallback_query = new WP_Query( $query_args );

		return $fallback_query->have_posts() ? $fallback_query : null;
	}

	/**
	 * Build base query arguments.
	 *
	 * @param int    $post_id         Post ID.
	 * @param string $post_type       Post type slug.
	 * @param int    $posts_per_page  Posts to fetch.
	 * @param string $taxonomy_source auto|category|post_tag.
	 *
	 * @return array<string, mixed>
	 */
	public static function build_args( int $post_id, string $post_type, int $posts_per_page, string $taxonomy_source ): array {
		$query_args = array(
			'post_type'           => $post_type,
			'posts_per_page'      => $posts_per_page,
			'post__not_in'        => array( $post_id ),
			'order'               => 'DESC',
			'orderby'             => 'date',
			'ignore_sticky_posts' => true,
			'no_found_rows'       => true,
		);

		$tax_query = self::build_tax_query( $post_id, $post_type, $taxonomy_source );

		if ( ! empty( $tax_query ) ) {
			$query_args['tax_query'] = $tax_query;
		}

		return $query_args;
	}

	/**
	 * Build taxonomy query clauses.
	 *
	 * @param int    $post_id         Post ID.
	 * @param string $post_type       Post type slug.
	 * @param string $taxonomy_source Taxonomy source mode.
	 *
	 * @return array<int|string, mixed>
	 */
	private static function build_tax_query( int $post_id, string $post_type, string $taxonomy_source ): array {
		$tax_query = array( 'relation' => 'OR' );
		$has_terms = false;

		if ( 'auto' === $taxonomy_source ) {
			$taxonomies = get_object_taxonomies( $post_type, 'objects' );

			foreach ( $taxonomies as $taxonomy ) {
				if ( ! $taxonomy->public ) {
					continue;
				}

				$terms = get_the_terms( $post_id, $taxonomy->name );

				if ( ! $terms || is_wp_error( $terms ) ) {
					continue;
				}

				$tax_query[] = array(
					'taxonomy'         => $taxonomy->name,
					'terms'            => wp_list_pluck( $terms, 'term_id' ),
					'include_children' => false,
				);
				$has_terms   = true;
			}
		} else {
			$terms = get_the_terms( $post_id, $taxonomy_source );

			if ( $terms && ! is_wp_error( $terms ) ) {
				$tax_query[] = array(
					'taxonomy'         => $taxonomy_source,
					'terms'            => wp_list_pluck( $terms, 'term_id' ),
					'include_children' => false,
				);
				$has_terms   = true;
			}
		}

		return $has_terms ? $tax_query : array();
	}
}
