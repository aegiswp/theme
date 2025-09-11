<?php
/**
 * TemplateTags Block Setting
 *
 * Provides support for parsing and rendering template tags in block content within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the logic for replacing template tags with dynamic values in block output
 * - Integrates with the Renderable interface for block output
 *
 * @package    Aegis\Framework\BlockSettings
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for block settings.
declare( strict_types=1 );

// Declares the namespace for block settings within the Aegis Framework.
namespace Aegis\Framework\BlockSettings;

// Imports utility classes and interfaces for renderable blocks, string operations, and WordPress functions.
use Aegis\Framework\Interfaces\Renderable;
use Aegis\Utilities\Str;
use WP_Block;
use WP_Block_Type_Registry;
use function add_filter;
use function apply_filters;
use function array_keys;
use function array_merge;
use function esc_html;
use function get_bloginfo;
use function get_post_field;
use function get_post_meta;
use function get_post_type;
use function get_post_type_object;
use function get_queried_object;
use function get_stylesheet;
use function get_the_archive_title;
use function get_the_ID;
use function get_the_title;
use function gmdate;
use function home_url;
use function in_array;
use function is_a;
use function is_archive;
use function is_author;
use function is_callable;
use function is_day;
use function is_home;
use function is_month;
use function is_null;
use function is_year;
use function preg_match_all;

// Implements the TemplateTags class to support dynamic template tag replacement in blocks.

use function shortcode_exists;
use function str_contains;
use function str_replace;
use function strip_tags;
use function strtolower;

/**
 * Provides a system for replacing dynamic template tags within block content.
 *
 * This class finds placeholder tags like `{post_title}` or `{current_year}` in
 * block content and replaces them with their corresponding dynamic values. It runs
 * at an early priority on the `render_block` filter to ensure tags are replaced
 * before other block modifications occur.
 *
 * The following are some of the available template tags:
 *
 * ### Post Tags
 * Any valid post field (e.g., `post_title`, `post_date`), any custom field key,
 * `post_id`, `permalink`, `post_type_label`, `read_time`.
 *
 * ### Archive Tags
 * `archive_title`, `archive_name`.
 *
 * ### Term Tags (on term archive pages)
 * `term_id`, `term_name`, `term_slug`, `term_description`.
 *
 * ### Site Tags
 * `year`, `current_year`, `date`, `home_url`, `site_title`, `site_name`,
 * `stylesheet`, `theme_name`.
 *
 * ### User Tags
 * `logout`, `logout_home`.
 *
 * The full list can be extended via the `aegis_template_tags` filter.
 *
 * @package Aegis\Framework\BlockSettings
 * @since   1.0.0
 */
class TemplateTags implements Renderable {

	/**
	 * Finds and replaces template tags in block content.
	 *
	 * This is the main render method, hooked into `render_block` at priority 8.
	 * It finds all occurrences of `{tag}` and attempts to resolve them. The
	 * resolution order is:
	 * 1. Post field (e.g., `post_title`).
	 * 2. Post meta (custom field).
	 * 3. Pre-defined tags from the `get_template_tags()` helper method.
	 *
	 * @since 1.0.0
	 *
	 * @param  string   $block_content The original block content.
	 * @param  array    $block         The full block object.
	 * @param  WP_Block $instance      The block instance.
	 *
	 * @hook   render_block 8
	 *
	 * @return string The block content with template tags replaced.
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		// --- Pre-checks and Normalization ---
		// Only run on blocks that are likely to contain text content.
		$block_name        = $block['blockName'] ?? '';
		$registered_blocks = WP_Block_Type_Registry::get_instance()->get_all_registered();
		if ( ! array_key_exists( $block_name, $registered_blocks ) ) {
			return $block_content;
		}
		$category     = $registered_blocks[ $block_name ]->category ?? '';
		$other_blocks = [ 'core/button', 'core/image', 'core/navigation-link', 'core/post-excerpt' ];
		if ( 'text' !== $category && ! in_array( $block_name, $other_blocks, true ) ) {
			return $block_content;
		}

		// Normalize encoded curly braces.
		$block_content = str_replace( [ '&#123;', '&#125;', '%7B', '%7D' ], [ '{', '}', '{', '}' ], $block_content );
		if ( ! str_contains( $block_content, '{' ) || ! str_contains( $block_content, '}' ) ) {
			return $block_content;
		}

		// --- Tag Matching and Replacement ---
		preg_match_all( '#\{(.*?)}#', $block_content, $matches );
		$without_brackets = $matches[1] ?? [];
		if ( empty( $without_brackets ) ) {
			return $block_content;
		}

		$post_id      = $instance->context['postId'] ?? get_the_ID();
		$replacements = [];

		foreach ( $without_brackets as $tag ) {
			$tag         = strtolower( $tag );
			$replacement = '';

			// Do not replace shortcodes.
			if ( shortcode_exists( $tag ) ) {
				continue;
			}

			// First, try to resolve the tag as a post field or post meta.
			if ( ! is_null( $post_id ) ) {
				$post_field = get_post_field( $tag, $post_id );
				if ( $post_field ) {
					$replacement = $post_field;
				} else {
					$post_meta = get_post_meta( $post_id, $tag, true );
					if ( $post_meta ) {
						$replacement = $post_meta;
					}
				}
			}

			// If not found, try to resolve it from the predefined list of tags.
			if ( ! $replacement ) {
				$tags = $this->get_template_tags( $post_id ?: null );
				if ( isset( $tags[ $tag ] ) ) {
					// If the tag value is a function, call it to get the dynamic value.
					$replacement = is_callable( $tags[ $tag ] ) ? call_user_func( $tags[ $tag ] ) : $tags[ $tag ];
				}
			}

			if ( $replacement ) {
				$replacements[ '{' . $tag . '}' ] = esc_html( $replacement );
			}
		}

		return str_replace( array_keys( $replacements ), array_values( $replacements ), $block_content );
	}

	/**
	 * Corrects the archive title on the main blog page.
	 *
	 * @since 1.0.0
	 *
	 * @param  string $title The original archive title.
	 *
	 * @hook   get_the_archive_title
	 *
	 * @return string The corrected title.
	 */
	public function get_the_archive_title_home( string $title ): string {
		if ( is_home() ) {
			$title = get_the_title( get_option( 'page_for_posts', true ) );
		}
		return $title;
	}

	/**
	 * Gathers template tags related to the current post.
	 *
	 * @since 1.0.0
	 *
	 * @param  ?int $post_id The current post ID.
	 *
	 * @return array An array of post-related template tags.
	 */
	private function get_post_template_tags( ?int $post_id ): array {
		if ( ! $post_id ) {
			return [];
		}

		$tags['post_id']   = $post_id;
		$tags['permalink'] = get_permalink( $post_id );

		$post_type_object = get_post_type_object( get_post_type( $post_id ) );
		if ( $post_type_object ) {
			$tags['post_type_label'] = $post_type_object->label;
		}

		return $tags;
	}

	/**
	 * Gathers template tags related to the current archive page.
	 *
	 * @since 1.0.0
	 *
	 * @return array An array of archive-related template tags.
	 */
	private function get_archive_template_tags(): array {
		if ( ! is_archive() && ! is_home() ) {
			return [];
		}

		// Provides a clean archive title without the "Archive: " prefix.
		$tags['archive_title'] = static function (): string {
			add_filter( 'get_the_archive_title_prefix', '__return_empty_string' );
			$title = get_the_archive_title();
			remove_filter( 'get_the_archive_title_prefix', '__return_empty_string' );
			return $title;
		};

		// Provides just the name of the archive (e.g., the term name, author name, or date).
		$tags['archive_name'] = static function (): string {
			$queried_object = get_queried_object();
			$name           = '';
			if ( is_a( $queried_object, 'WP_Term' ) ) {
				$name = $queried_object->name;
			} elseif ( is_home() ) {
				$name = get_post_field( 'post_name', get_option( 'page_for_posts', true ) );
			} elseif ( is_month() ) {
				$name = strip_tags( get_the_date( 'F Y' ) );
			} elseif ( is_year() ) {
				$name = strip_tags( get_the_date( 'Y' ) );
			} elseif ( is_day() ) {
				$name = strip_tags( get_the_date( 'F j, Y' ) );
			} elseif ( is_author() ) {
				$name = get_the_author();
			}
			return $name;
		};

		return $tags;
	}

	/**
	 * Gathers miscellaneous extra template tags.
	 *
	 * @since 1.0.0
	 *
	 * @param  ?int $post_id The current post ID.
	 *
	 * @return array An array of extra template tags.
	 */
	private function get_extra_template_tags( ?int $post_id ): array {
		$tags                = [];
		$tags['logout']      = esc_url( wp_logout_url() );
		$tags['logout_home'] = esc_url( wp_logout_url( home_url() ) );

		// Add term-specific tags if on a term archive page.
		$queried_object = get_queried_object();
		if ( is_a( $queried_object, 'WP_Term' ) ) {
			$tags['term_id']          = esc_html( $queried_object->term_id );
			$tags['term_name']        = esc_html( $queried_object->name );
			$tags['term_slug']        = esc_html( $queried_object->slug );
			$tags['term_description'] = esc_html( $queried_object->description );
			if ( $taxonomy = get_taxonomy( $queried_object->taxonomy )->labels ?? null ) {
				foreach ( $taxonomy as $key => $label ) {
					$tags[ 'taxonomy_' . $key ] = esc_html( $label );
				}
			}
		}

		// Add a calculated "read time" tag.
		if ( $post_id ) {
			$tags['read_time'] = static function () use ( $post_id ): string {
				$per_minute = apply_filters( 'aegis_words_per_minute', 200 );
				$words      = str_word_count( strip_tags( get_post_field( 'post_content', $post_id ) ) );
				$minutes    = floor( $words / $per_minute );
				return (string) $minutes;
			};
		}

		return $tags;
	}

	/**
	 * Assembles the complete list of available template tags.
	 *
	 * @since 1.0.0
	 *
	 * @param  ?int $post_id The current post ID.
	 *
	 * @return array The complete, filterable list of template tags.
	 */
	private function get_template_tags( ?int $post_id ): array {
		$year       = gmdate( 'Y' );
		$site_name  = get_bloginfo( 'name', 'display' );
		$stylesheet = get_stylesheet();
		$tags       = array_merge(
			[
				'year'         => $year,
				'current_year' => $year, // Backwards compatibility.
				'date'         => gmdate( 'm/d/Y' ),
				'home_url'     => home_url(),
				'site_title'   => $site_name,
				'site_name'    => $site_name,
				'stylesheet'   => $stylesheet,
				'theme_name'   => Str::title_case( $stylesheet ),
			],
			$this->get_post_template_tags( $post_id ),
			$this->get_archive_template_tags(),
			$this->get_extra_template_tags( $post_id )
		);

		/**
		 * Filters the complete list of available template tags.
		 *
		 * @since 1.0.0
		 *
		 * @param array $tags    The array of template tags.
		 * @param int   $post_id The current post ID.
		 */
		return apply_filters( 'aegis_template_tags', $tags, $post_id );
	}

}
