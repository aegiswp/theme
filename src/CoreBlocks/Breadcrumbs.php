<?php
/**
 * Breadcrumbs Block Support
 *
 * Customizes the core/breadcrumbs block for the Aegis Docs plugin's
 * aegis_doc post type, ensuring the doc_space taxonomy appears in
 * the breadcrumb trail using WordPress asset system.
 *
 * @package Aegis
 * @since   1.0.0
 */

declare( strict_types=1 );

namespace Aegis\CoreBlocks;

use function add_filter;
use function get_the_ID;
use function get_the_terms;
use function get_term_link;
use function get_post_type_archive_link;
use function is_singular;
use function is_wp_error;
use function untrailingslashit;

class Breadcrumbs {

	/**
	 * Initialize hooks.
	 *
	 * @return void
	 */
	public function init(): void {
		add_filter( 'block_core_breadcrumbs_post_type_settings', [ $this, 'docs_post_type_settings' ], 10, 3 );
		add_filter( 'block_core_breadcrumbs_items', [ $this, 'inject_doc_space' ] );
	}

	/**
	 * Set preferred taxonomy for aegis_doc breadcrumbs.
	 *
	 * @param array  $settings  Breadcrumb settings.
	 * @param string $post_type Post type slug.
	 * @param int    $post_id   Post ID.
	 *
	 * @return array
	 */
	public function docs_post_type_settings( array $settings, string $post_type, int $post_id ): array {
		if ( 'aegis_doc' !== $post_type ) {
			return $settings;
		}

		$settings['taxonomy'] = 'doc_space';

		// Use the first assigned space as the preferred term.
		$terms = get_the_terms( $post_id, 'doc_space' );

		if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
			$settings['term'] = $terms[0]->slug;
		}

		return $settings;
	}

	/**
	 * Inject doc_space term into breadcrumb trail for hierarchical aegis_doc posts.
	 *
	 * The core/breadcrumbs block uses hierarchical parent traversal for
	 * hierarchical post types, which skips taxonomy terms. This filter
	 * inserts the doc_space term after the archive link and before the
	 * parent/current post items.
	 *
	 * @param array $items Breadcrumb items.
	 *
	 * @return array
	 */
	public function inject_doc_space( array $items ): array {
		if ( ! is_singular( 'aegis_doc' ) ) {
			return $items;
		}

		$post_id = get_the_ID();

		if ( ! $post_id ) {
			return $items;
		}

		$terms = get_the_terms( $post_id, 'doc_space' );

		if ( empty( $terms ) || is_wp_error( $terms ) ) {
			return $items;
		}

		$term      = $terms[0];
		$term_link = get_term_link( $term );

		if ( is_wp_error( $term_link ) ) {
			return $items;
		}

		$space_item = [
			'label' => $term->name,
			'url'   => $term_link,
		];

		// Find the position after the archive link to insert the space.
		// Items: [Home, Archive, ...ancestors, Current]
		// We want: [Home, Archive, Space, ...ancestors, Current]
		$archive_link = get_post_type_archive_link( 'aegis_doc' );
		$insert_pos   = 1; // Default: after Home.

		foreach ( $items as $index => $item ) {
			if ( ! empty( $item['url'] ) && $archive_link && untrailingslashit( $item['url'] ) === untrailingslashit( $archive_link ) ) {
				$insert_pos = $index + 1;
				break;
			}
		}

		// Only inject if not already present.
		foreach ( $items as $item ) {
			if ( ! empty( $item['url'] ) && untrailingslashit( $item['url'] ) === untrailingslashit( $term_link ) ) {
				return $items;
			}
		}

		array_splice( $items, $insert_pos, 0, [ $space_item ] );

		return $items;
	}
}
