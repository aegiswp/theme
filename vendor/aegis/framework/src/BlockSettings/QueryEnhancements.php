<?php
/**
 * Query Enhancements Block Setting
 *
 * Provides advanced query parameters for the core/query block including
 * multiple post types, taxonomy filtering, meta queries, and custom ordering.
 *
 * @package    Aegis\Framework\BlockSettings
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 */

declare( strict_types=1 );

namespace Aegis\Framework\BlockSettings;

use Aegis\Framework\InlineAssets\Scriptable;
use Aegis\Framework\InlineAssets\Scripts;
use WP_Block;
use function absint;
use function add_filter;
use function array_filter;
use function array_map;
use function array_merge;
use function esc_html__;
use function explode;
use function get_option;
use function get_post_types;
use function get_taxonomy;
use function get_taxonomies;
use function in_array;
use function is_array;
use function is_admin;
use function get_post_type_object;
use function post_type_exists;
use function sanitize_key;
use function sanitize_text_field;
use function taxonomy_exists;
use function trim;

/**
 * Handles Query Loop enhancements.
 *
 * @since 1.0.0
 */
class QueryEnhancements implements Scriptable {

	/**
	 * Allowed meta compare operators.
	 */
	private const ALLOWED_META_COMPARE = [
		'=', '!=', '>', '>=', '<', '<=',
		'LIKE', 'NOT LIKE', 'IN', 'NOT IN',
		'BETWEEN', 'NOT BETWEEN', 'EXISTS', 'NOT EXISTS',
	];

	/**
	 * Allowed meta value types.
	 */
	private const ALLOWED_META_TYPES = [
		'CHAR', 'NUMERIC', 'DECIMAL', 'DATE',
		'DATETIME', 'TIME', 'SIGNED', 'UNSIGNED',
	];

	/**
	 * Allowed taxonomy query operators.
	 */
	private const ALLOWED_TAX_OPERATORS = [
		'IN', 'NOT IN', 'AND', 'EXISTS', 'NOT EXISTS',
	];

	/**
	 * Query block attributes to register.
	 *
	 * @var array
	 */
	private array $attributes = [
		// Multiple post types
		'aegisPostTypes' => [
			'type'    => 'array',
			'default' => [],
		],
		// Taxonomy query
		'aegisTaxQuery' => [
			'type'    => 'array',
			'default' => [],
		],
		// Include specific posts
		'aegisIncludePosts' => [
			'type'    => 'array',
			'default' => [],
		],
		// Exclude specific posts
		'aegisExcludePosts' => [
			'type'    => 'array',
			'default' => [],
		],
		// Offset
		'aegisOffset' => [
			'type'    => 'number',
			'default' => 0,
		],
		// Sticky posts handling
		'aegisStickyPosts' => [
			'type'    => 'string',
			'default' => 'include', // include, exclude, only
		],
		// Meta query - key
		'aegisMetaKey' => [
			'type'    => 'string',
			'default' => '',
		],
		// Meta query - value
		'aegisMetaValue' => [
			'type'    => 'string',
			'default' => '',
		],
		// Meta query - compare operator
		'aegisMetaCompare' => [
			'type'    => 'string',
			'default' => '=',
		],
		// Meta query - value type
		'aegisMetaType' => [
			'type'    => 'string',
			'default' => 'CHAR',
		],
		// Order by meta key
		'aegisOrderByMeta' => [
			'type'    => 'boolean',
			'default' => false,
		],
		// Meta key for ordering
		'aegisOrderMetaKey' => [
			'type'    => 'string',
			'default' => '',
		],
		// Meta type for ordering
		'aegisOrderMetaType' => [
			'type'    => 'string',
			'default' => 'CHAR',
		],
		// Extended order by options
		'aegisOrderBy' => [
			'type'    => 'string',
			'default' => '',
		],
		// Random seed for consistent random ordering
		'aegisRandomSeed' => [
			'type'    => 'number',
			'default' => 0,
		],
	];

	/**
	 * Constructor - registers filters.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		add_filter( 'register_block_type_args', [ $this, 'add_attributes' ], 10, 2 );
		add_filter( 'query_loop_block_query_vars', [ $this, 'modify_query' ], 10, 3 );
	}

	/**
	 * Add custom attributes to core/query block.
	 *
	 * @since 1.0.0
	 *
	 * @param array  $args       Block type arguments.
	 * @param string $block_type Block type name.
	 *
	 * @return array
	 */
	public function add_attributes( array $args, string $block_type ): array {
		if ( $block_type !== 'core/query' ) {
			return $args;
		}

		if ( ! isset( $args['attributes'] ) ) {
			$args['attributes'] = [];
		}

		$args['attributes'] = array_merge( $args['attributes'], $this->attributes );

		return $args;
	}

	/**
	 * Modify query variables based on custom attributes.
	 *
	 * @since 1.0.0
	 *
	 * @param array    $query    Query arguments.
	 * @param WP_Block $block    Block instance.
	 * @param int      $page     Current page.
	 *
	 * @return array
	 */
	public function modify_query( array $query, WP_Block $block, int $page ): array {
		$attrs = $block->attributes ?? [];

		// Multiple post types (QE1: validate against registered public post types).
		$post_types = $attrs['aegisPostTypes'] ?? [];
		if ( ! empty( $post_types ) && is_array( $post_types ) ) {
			$valid_types = array_filter( $post_types, function ( string $type ): bool {
				if ( ! post_type_exists( $type ) ) {
					return false;
				}
				$obj = get_post_type_object( $type );
				return $obj && $obj->public;
			} );

			if ( ! empty( $valid_types ) ) {
				$query['post_type'] = array_values( $valid_types );
			}
		}

		// Taxonomy query.
		$tax_query = $attrs['aegisTaxQuery'] ?? [];
		if ( ! empty( $tax_query ) && is_array( $tax_query ) ) {
			$query['tax_query'] = $this->build_tax_query( $tax_query );
		}

		// Include specific posts.
		$include_posts = $attrs['aegisIncludePosts'] ?? [];
		if ( ! empty( $include_posts ) && is_array( $include_posts ) ) {
			$query['post__in'] = array_map( 'absint', $include_posts );
			$query['orderby']  = 'post__in';
		}

		// Exclude specific posts.
		$exclude_posts = $attrs['aegisExcludePosts'] ?? [];
		if ( ! empty( $exclude_posts ) && is_array( $exclude_posts ) ) {
			$query['post__not_in'] = array_map( 'absint', $exclude_posts );
		}

		// Offset.
		$offset = $attrs['aegisOffset'] ?? 0;
		if ( $offset > 0 ) {
			$query['offset'] = absint( $offset );
		}

		// Sticky posts handling (QE7: merge with existing post__in instead of overwriting).
		$sticky_posts = $attrs['aegisStickyPosts'] ?? 'include';
		if ( $sticky_posts === 'exclude' ) {
			$query['ignore_sticky_posts'] = true;
		} elseif ( $sticky_posts === 'only' ) {
			$sticky_ids = get_option( 'sticky_posts' );
			if ( ! empty( $sticky_ids ) && is_array( $sticky_ids ) ) {
				$existing_in = $query['post__in'] ?? [];
				if ( ! empty( $existing_in ) ) {
					// Intersect: only sticky posts that are also in the include list.
					$query['post__in'] = array_values( array_intersect( $sticky_ids, $existing_in ) );
				} else {
					$query['post__in'] = array_map( 'absint', $sticky_ids );
				}
			}
		}

		// Meta query (QE2/QE3/QE4: validate compare, type, and sanitize key).
		$meta_key = sanitize_key( $attrs['aegisMetaKey'] ?? '' );
		if ( ! empty( $meta_key ) ) {
			$meta_value   = sanitize_text_field( $attrs['aegisMetaValue'] ?? '' );
			$meta_compare = $attrs['aegisMetaCompare'] ?? '=';
			$meta_type    = $attrs['aegisMetaType'] ?? 'CHAR';

			// Validate compare operator against allowlist (QE2).
			if ( ! in_array( $meta_compare, self::ALLOWED_META_COMPARE, true ) ) {
				$meta_compare = '=';
			}

			// Validate meta type against allowlist (QE3).
			if ( ! in_array( $meta_type, self::ALLOWED_META_TYPES, true ) ) {
				$meta_type = 'CHAR';
			}

			$meta_query = [
				'key'     => $meta_key,
				'compare' => $meta_compare,
				'type'    => $meta_type,
			];

			// Only add value if compare operator requires it.
			$no_value_operators = [ 'EXISTS', 'NOT EXISTS' ];
			if ( ! in_array( $meta_compare, $no_value_operators, true ) ) {
				$meta_query['value'] = $meta_value;
			}

			if ( ! isset( $query['meta_query'] ) ) {
				$query['meta_query'] = [];
			}

			$query['meta_query'][] = $meta_query;
		}

		// Order by meta key.
		$order_by_meta = $attrs['aegisOrderByMeta'] ?? false;
		if ( $order_by_meta ) {
			$order_meta_key  = sanitize_key( $attrs['aegisOrderMetaKey'] ?? '' );
			$order_meta_type = $attrs['aegisOrderMetaType'] ?? 'CHAR';

			// Validate order meta type (QE3).
			if ( ! in_array( $order_meta_type, self::ALLOWED_META_TYPES, true ) ) {
				$order_meta_type = 'CHAR';
			}

			if ( ! empty( $order_meta_key ) ) {
				$query['meta_key'] = $order_meta_key;
				$query['orderby']  = 'meta_value';

				// Use meta_value_num for numeric types.
				if ( in_array( $order_meta_type, [ 'NUMERIC', 'DECIMAL', 'SIGNED', 'UNSIGNED' ], true ) ) {
					$query['orderby'] = 'meta_value_num';
				}
			}
		}

		// Extended order by options (validated via allowlist in switch).
		$order_by = $attrs['aegisOrderBy'] ?? '';
		if ( ! empty( $order_by ) && ! $order_by_meta ) {
			switch ( $order_by ) {
				case 'rand':
					$query['orderby'] = 'rand';
					// Use seed for consistent random ordering across pagination.
					$random_seed = absint( $attrs['aegisRandomSeed'] ?? 0 );
					if ( $random_seed > 0 ) {
						$query['orderby'] = 'RAND(' . $random_seed . ')';
					}
					break;

				case 'comment_count':
				case 'modified':
				case 'menu_order':
				case 'title':
				case 'author':
				case 'name':
				case 'parent':
					$query['orderby'] = $order_by;
					break;
			}
		}

		return $query;
	}

	/**
	 * Build taxonomy query from attribute data.
	 *
	 * @since 1.0.0
	 *
	 * @param array $tax_query_data Taxonomy query data from attribute.
	 *
	 * @return array
	 */
	private function build_tax_query( array $tax_query_data ): array {
		$tax_query = [ 'relation' => 'AND' ];

		foreach ( $tax_query_data as $item ) {
			if ( empty( $item['taxonomy'] ) || empty( $item['terms'] ) ) {
				continue;
			}

			$taxonomy = sanitize_key( $item['taxonomy'] );

			// Validate taxonomy exists and is public (QE6).
			if ( ! taxonomy_exists( $taxonomy ) ) {
				continue;
			}

			$tax_obj = get_taxonomy( $taxonomy );
			if ( ! $tax_obj || ! $tax_obj->public ) {
				continue;
			}

			// Validate operator against allowlist (QE5).
			$operator = $item['operator'] ?? 'IN';
			if ( ! in_array( $operator, self::ALLOWED_TAX_OPERATORS, true ) ) {
				$operator = 'IN';
			}

			$tax_query[] = [
				'taxonomy' => $taxonomy,
				'field'    => 'term_id',
				'terms'    => array_map( 'absint', (array) $item['terms'] ),
				'operator' => $operator,
			];
		}

		return $tax_query;
	}

	/**
	 * Add editor data for query enhancements.
	 *
	 * @since 1.0.0
	 *
	 * @param Scripts $scripts Scripts service.
	 *
	 * @return void
	 */
	public function scripts( Scripts $scripts ): void {
		$scripts->add_data(
			'queryEnhancements',
			fn() => [
				'postTypes'  => $this->get_post_types(),
				'taxonomies' => $this->get_taxonomies(),
				'metaCompareOperators' => $this->get_meta_compare_operators(),
				'metaTypes'  => $this->get_meta_types(),
				'orderByOptions' => $this->get_order_by_options(),
			],
			[],
			is_admin()
		);
	}

	/**
	 * Get available post types for the editor.
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	private function get_post_types(): array {
		$post_types = get_post_types(
			[
				'public'       => true,
				'show_in_rest' => true,
			],
			'objects'
		);

		$result = [];
		foreach ( $post_types as $post_type ) {
			if ( $post_type->name === 'attachment' ) {
				continue;
			}

			$result[] = [
				'value' => $post_type->name,
				'label' => $post_type->labels->singular_name,
			];
		}

		return $result;
	}

	/**
	 * Get available taxonomies for the editor.
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	private function get_taxonomies(): array {
		$taxonomies = get_taxonomies(
			[
				'public'       => true,
				'show_in_rest' => true,
			],
			'objects'
		);

		$result = [];
		foreach ( $taxonomies as $taxonomy ) {
			$result[] = [
				'value'     => $taxonomy->name,
				'label'     => $taxonomy->labels->singular_name,
				'postTypes' => $taxonomy->object_type,
				'restBase'  => $taxonomy->rest_base ?: $taxonomy->name,
			];
		}

		return $result;
	}

	/**
	 * Get meta compare operators.
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	private function get_meta_compare_operators(): array {
		return [
			[ 'value' => '=', 'label' => esc_html__( 'Equals (=)', 'aegis' ) ],
			[ 'value' => '!=', 'label' => esc_html__( 'Not Equals (!=)', 'aegis' ) ],
			[ 'value' => '>', 'label' => esc_html__( 'Greater Than (>)', 'aegis' ) ],
			[ 'value' => '>=', 'label' => esc_html__( 'Greater or Equal (>=)', 'aegis' ) ],
			[ 'value' => '<', 'label' => esc_html__( 'Less Than (<)', 'aegis' ) ],
			[ 'value' => '<=', 'label' => esc_html__( 'Less or Equal (<=)', 'aegis' ) ],
			[ 'value' => 'LIKE', 'label' => esc_html__( 'Contains (LIKE)', 'aegis' ) ],
			[ 'value' => 'NOT LIKE', 'label' => esc_html__( 'Not Contains (NOT LIKE)', 'aegis' ) ],
			[ 'value' => 'IN', 'label' => esc_html__( 'In List (IN)', 'aegis' ) ],
			[ 'value' => 'NOT IN', 'label' => esc_html__( 'Not In List (NOT IN)', 'aegis' ) ],
			[ 'value' => 'BETWEEN', 'label' => esc_html__( 'Between (BETWEEN)', 'aegis' ) ],
			[ 'value' => 'NOT BETWEEN', 'label' => esc_html__( 'Not Between (NOT BETWEEN)', 'aegis' ) ],
			[ 'value' => 'EXISTS', 'label' => esc_html__( 'Exists (EXISTS)', 'aegis' ) ],
			[ 'value' => 'NOT EXISTS', 'label' => esc_html__( 'Not Exists (NOT EXISTS)', 'aegis' ) ],
		];
	}

	/**
	 * Get meta value types.
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	private function get_meta_types(): array {
		return [
			[ 'value' => 'CHAR', 'label' => esc_html__( 'Text (CHAR)', 'aegis' ) ],
			[ 'value' => 'NUMERIC', 'label' => esc_html__( 'Number (NUMERIC)', 'aegis' ) ],
			[ 'value' => 'DECIMAL', 'label' => esc_html__( 'Decimal (DECIMAL)', 'aegis' ) ],
			[ 'value' => 'DATE', 'label' => esc_html__( 'Date (DATE)', 'aegis' ) ],
			[ 'value' => 'DATETIME', 'label' => esc_html__( 'Date & Time (DATETIME)', 'aegis' ) ],
			[ 'value' => 'TIME', 'label' => esc_html__( 'Time (TIME)', 'aegis' ) ],
			[ 'value' => 'SIGNED', 'label' => esc_html__( 'Signed Integer (SIGNED)', 'aegis' ) ],
			[ 'value' => 'UNSIGNED', 'label' => esc_html__( 'Unsigned Integer (UNSIGNED)', 'aegis' ) ],
		];
	}

	/**
	 * Get extended order by options.
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	private function get_order_by_options(): array {
		return [
			[ 'value' => '', 'label' => esc_html__( 'Default', 'aegis' ) ],
			[ 'value' => 'title', 'label' => esc_html__( 'Title', 'aegis' ) ],
			[ 'value' => 'modified', 'label' => esc_html__( 'Last Modified', 'aegis' ) ],
			[ 'value' => 'comment_count', 'label' => esc_html__( 'Comment Count', 'aegis' ) ],
			[ 'value' => 'menu_order', 'label' => esc_html__( 'Menu Order', 'aegis' ) ],
			[ 'value' => 'author', 'label' => esc_html__( 'Author', 'aegis' ) ],
			[ 'value' => 'name', 'label' => esc_html__( 'Slug (Name)', 'aegis' ) ],
			[ 'value' => 'parent', 'label' => esc_html__( 'Parent', 'aegis' ) ],
			[ 'value' => 'rand', 'label' => esc_html__( 'Random', 'aegis' ) ],
		];
	}
}
