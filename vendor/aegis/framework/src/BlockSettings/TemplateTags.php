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

// Enforces strict type checking for all code in this file, ensuring type safety for templatetags block setting.
declare( strict_types=1 );

// Declares the namespace for the templatetags block setting.
namespace Aegis\Framework\BlockSettings;

// Imports classes, interfaces, and functions used by the templatetags block setting.
use Aegis\Framework\Interfaces\Renderable;
use Aegis\Utilities\Str;
use WP_Block;
use WP_Block_Type_Registry;
use WP_HTML_Tag_Processor;
use function add_filter;
use function apply_filters;
use function array_keys;
use function array_merge;
use function esc_html;
use function esc_url_raw;
use function html_entity_decode;
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
use function shortcode_exists;
use function current_user_can;
use function is_post_publicly_viewable;
use function is_protected_meta;
use function is_scalar;
use function post_password_required;
use function str_contains;
use function str_replace;
use function str_starts_with;
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
 * Public post fields (e.g., `post_title`, `post_date`), any non-protected custom field key,
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
	 * Attributes whose value is a URL.
	 *
	 * @since 1.1.0
	 */
	private const URL_ATTRIBUTES = [ 'href', 'src', 'action', 'formaction', 'poster', 'cite', 'data', 'background', 'xlink:href', 'longdesc', 'usemap', 'ping' ];

	/**
	 * Attributes that never get template tags (CSS, multi-URL, and script contexts).
	 *
	 * @since 1.1.0
	 */
	private const SKIPPED_ATTRIBUTES = [ 'style', 'srcset', 'imagesrcset' ];

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
		// --- Pre-checks ---
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

		$normalized = str_replace( [ '&#123;', '&#125;', '%7B', '%7D' ], [ '{', '}', '{', '}' ], $block_content );
		if ( ! str_contains( $normalized, '{' ) || ! str_contains( $normalized, '}' ) ) {
			return $block_content;
		}

		// --- Tag Replacement ---
		// Tags are replaced after save-time kses, so each value is escaped for
		// the context it lands in: text nodes get the viewer's data, attributes
		// only get data that is already public, URL attributes are limited to
		// allowed protocols, and style or event-handler attributes are skipped.
		$post_id   = $instance->context['postId'] ?? get_the_ID();
		$processor = new WP_HTML_Tag_Processor( $block_content );

		while ( $processor->next_token() ) {
			$type = $processor->get_token_type();

			if ( '#text' === $type ) {
				$text = $processor->get_modifiable_text();
				$new  = $this->replace_tags( $text, $post_id, false );

				if ( $new !== $text ) {
					$processor->set_modifiable_text( $new );
				}

				continue;
			}

			if ( '#tag' !== $type || $processor->is_tag_closer() ) {
				continue;
			}

			foreach ( $processor->get_attribute_names_with_prefix( '' ) ?? [] as $name ) {
				if ( in_array( $name, self::SKIPPED_ATTRIBUTES, true ) || str_starts_with( $name, 'on' ) ) {
					continue;
				}

				$value = $processor->get_attribute( $name );
				if ( ! is_string( $value ) ) {
					continue;
				}

				$new = $this->replace_tags( $value, $post_id, true );
				if ( $new === $value ) {
					continue;
				}

				if ( in_array( $name, self::URL_ATTRIBUTES, true ) ) {
					$new = esc_url_raw( $new );
				}

				$processor->set_attribute( $name, $new );
			}
		}

		return $processor->get_updated_html();
	}

	/**
	 * Replaces template tags inside an inline script, such as an `onclick` handler.
	 *
	 * Values are escaped with `esc_js()` so they stay inside the JS string
	 * literal the handler author wrapped them in.
	 *
	 * @since 1.1.0
	 *
	 * @param string   $script   Inline script.
	 * @param WP_Block $instance Block instance.
	 *
	 * @return string
	 */
	public function render_script( string $script, WP_Block $instance ): string {
		$post_id = $instance->context['postId'] ?? get_the_ID();

		return $this->replace_tags( $script, $post_id, false, 'esc_js' );
	}

	/**
	 * Replaces every resolvable `{tag}` in a string with its raw value.
	 *
	 * @since 1.1.0
	 *
	 * @param string        $text        Text that may contain tags.
	 * @param mixed         $post_id     Context post ID.
	 * @param bool          $public_only Only resolve post data that is publicly viewable.
	 * @param callable|null $escape      Optional escaping for each value.
	 *
	 * @return string The text with tags replaced, or the original text if none resolved.
	 */
	private function replace_tags( string $text, $post_id, bool $public_only, ?callable $escape = null ): string {
		$normalized = str_replace( [ '%7B', '%7D' ], [ '{', '}' ], $text );

		if ( ! preg_match_all( '#\{(.*?)}#', $normalized, $matches ) ) {
			return $text;
		}

		$replacements = [];

		foreach ( $matches[1] as $tag ) {
			$tag   = strtolower( $tag );
			$value = $this->resolve_tag( $tag, $post_id, $public_only );

			if ( $value !== '' ) {
				$replacements[ '{' . $tag . '}' ] = $escape ? $escape( $value ) : $value;
			}
		}

		if ( ! $replacements ) {
			return $text;
		}

		return str_replace( array_keys( $replacements ), array_values( $replacements ), $normalized );
	}

	/**
	 * Resolves one template tag to its raw (unescaped) value.
	 *
	 * The resolution order is post field, post meta, then the predefined tags.
	 *
	 * @since 1.1.0
	 *
	 * @param string $tag         Lowercase tag name, without braces.
	 * @param mixed  $post_id     Context post ID.
	 * @param bool   $public_only Only resolve post data that is publicly viewable.
	 *
	 * @return string Empty string when the tag does not resolve.
	 */
	private function resolve_tag( string $tag, $post_id, bool $public_only ): string {
		// Do not replace shortcodes.
		if ( shortcode_exists( $tag ) ) {
			return '';
		}

		$replacement = '';

		// First, try to resolve the tag as a public post field or custom field.
		if ( ! is_null( $post_id ) && $this->can_read_post_data( (int) $post_id, $public_only ) ) {
			$post_field = in_array( $tag, $this->get_post_fields(), true ) ? get_post_field( $tag, $post_id ) : '';
			if ( $post_field ) {
				$replacement = $post_field;
			} elseif ( ! is_protected_meta( $tag, 'post' ) ) {
				$post_meta = get_post_meta( $post_id, $tag, true );
				if ( is_scalar( $post_meta ) && $post_meta ) {
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

		if ( ! $replacement ) {
			return '';
		}

		// Some values are stored or prepared HTML-escaped; callers escape for their own context.
		return html_entity_decode( (string) $replacement, ENT_QUOTES | ENT_HTML5, 'UTF-8' );
	}

	/**
	 * Post fields that `{field}` tags may print.
	 *
	 * Fields such as `post_password` and raw `post_content` are left out:
	 * the tag text is chosen by whoever writes the block, while the post it
	 * reads can be another author's (for example inside a Query Loop).
	 *
	 * @since 1.0.2
	 *
	 * @return string[]
	 */
	private function get_post_fields(): array {
		/**
		 * Filters the post fields available as template tags.
		 *
		 * @since 1.0.2
		 *
		 * @param string[] $fields Post field names.
		 */
		return (array) apply_filters(
			'aegis_template_tag_post_fields',
			[
				'post_author',
				'post_date',
				'post_date_gmt',
				'post_title',
				'post_excerpt',
				'post_status',
				'post_name',
				'post_modified',
				'post_modified_gmt',
				'post_parent',
				'post_type',
				'comment_count',
			]
		);
	}

	/**
	 * Whether the current viewer may see field and meta values of a post.
	 *
	 * With `$public_only`, the viewer's own read access does not count. That is
	 * used for attribute values: the block author chooses where those point, so
	 * a privileged viewer's private data must not be sent to them.
	 *
	 * @since 1.0.2
	 *
	 * @param int  $post_id     Post ID.
	 * @param bool $public_only Require the post to be publicly viewable.
	 *
	 * @return bool
	 */
	private function can_read_post_data( int $post_id, bool $public_only = false ): bool {
		if ( ! $post_id || post_password_required( $post_id ) ) {
			return false;
		}

		if ( is_post_publicly_viewable( $post_id ) ) {
			return true;
		}

		return ! $public_only && current_user_can( 'read_post', $post_id );
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
