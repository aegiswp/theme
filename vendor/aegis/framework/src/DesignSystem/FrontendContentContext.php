<?php
/**
 * Frontend Content Context
 *
 * Resolves block template markup before asset enqueue so conditional inline
 * CSS/JS can match markers present on the current request.
 *
 * @package Aegis\Framework\DesignSystem
 * @since   1.0.0
 */

declare( strict_types=1 );

namespace Aegis\Framework\DesignSystem;

use WP_Post;
use function apply_filters;
use function array_merge;
use function current_theme_supports;
use function file_get_contents;
use function get_block_template;
use function get_post_format;
use function get_page_template_slug;
use function get_queried_object;
use function get_queried_object_id;
use function get_query_var;
use function get_stylesheet;
use function implode;
use function is_404;
use function is_admin;
use function is_archive;
use function is_attachment;
use function is_author;
use function is_category;
use function is_date;
use function is_embed;
use function is_front_page;
use function is_home;
use function is_page;
use function is_post_type_archive;
use function is_privacy_policy;
use function is_search;
use function is_singular;
use function is_tag;
use function is_tax;
use function parse_blocks;
use function resolve_block_template;
use function serialize_blocks;
use function str_contains;
use function urldecode;
use function validate_file;
use function wp_doing_ajax;
use function wp_doing_cron;

/**
 * Populates the global template_html string used by inline asset loading.
 */
final class FrontendContentContext {

	/**
	 * Block names mapped to HTML/markup markers used by conditional assets.
	 *
	 * @var array<string, string[]>
	 */
	private const BLOCK_MARKERS = [
		'aegis/slider'     => [ 'splide', 'wp-block-aegis-slider', 'wp:aegis/slider' ],
		'core/embed'       => [ 'wp-block-embed', 'wp:embed', 'aegis-embed__facade' ],
		'core/navigation'  => [ 'wp-block-navigation__submenu-container' ],
		'aegis/map'        => [ 'aegis-map', 'wp-block-aegis-map' ],
	];

	/**
	 * Capture frontend markup for conditional asset loading.
	 *
	 * @hook wp 1
	 *
	 * @return void
	 */
	public function capture(): void {
		if ( is_admin() || wp_doing_ajax() || wp_doing_cron() ) {
			return;
		}

		$markup = $this->collect_markup();

		if ( $markup === '' ) {
			return;
		}

		$GLOBALS['template_html'] = apply_filters( 'aegis_template_html', $markup );
	}

	/**
	 * Collect expanded template, template parts, and singular post markup.
	 *
	 * @return string
	 */
	private function collect_markup(): string {
		$parts = [];

		$template_content = $this->get_resolved_template_content();

		if ( $template_content !== '' ) {
			$parts[] = $this->expand_markup( $template_content );
		}

		if ( is_singular() ) {
			$post = get_queried_object();

			if ( $post instanceof WP_Post && $post->post_content !== '' ) {
				$parts[] = $post->post_content;
			}
		}

		$markup = implode( "\n", $parts );

		return $this->append_block_markers( $markup );
	}

	/**
	 * Resolve the active block template content for the current request.
	 *
	 * @return string
	 */
	private function get_resolved_template_content(): string {
		if ( ! current_theme_supports( 'block-templates' ) ) {
			return '';
		}

		[ $type, $hierarchy ] = $this->get_template_hierarchy();

		$block_template = resolve_block_template( $type, $hierarchy, '' );

		if ( ! $block_template ) {
			return '';
		}

		$content = (string) $block_template->content;

		if ( $content === '' && ! empty( $block_template->has_theme_file ) ) {
			$theme_file = _get_block_template_file( 'wp_template', $block_template->slug );

			if ( is_array( $theme_file ) && ! empty( $theme_file['path'] ) && is_readable( $theme_file['path'] ) ) {
				$content = (string) file_get_contents( $theme_file['path'] );
			}
		}

		return $content;
	}

	/**
	 * Mirror template-loader.php hierarchy without loading template-canvas.php.
	 *
	 * @return array{0: string, 1: string[]}
	 */
	private function get_template_hierarchy(): array {
		if ( is_embed() ) {
			return [ 'embed', apply_filters( 'embed_template_hierarchy', $this->embed_templates() ) ];
		}

		if ( is_404() ) {
			return [ '404', apply_filters( '404_template_hierarchy', [ '404.php' ] ) ];
		}

		if ( is_search() ) {
			return [ 'search', apply_filters( 'search_template_hierarchy', [ 'search.php' ] ) ];
		}

		if ( is_front_page() ) {
			return [ 'frontpage', apply_filters( 'frontpage_template_hierarchy', [ 'front-page.php' ] ) ];
		}

		if ( is_home() ) {
			return [ 'home', apply_filters( 'home_template_hierarchy', [ 'home.php', 'index.php' ] ) ];
		}

		if ( is_privacy_policy() ) {
			return [ 'privacypolicy', apply_filters( 'privacypolicy_template_hierarchy', [ 'privacy-policy.php' ] ) ];
		}

		if ( is_post_type_archive() ) {
			return [ 'archive', apply_filters( 'archive_template_hierarchy', [ 'archive.php' ] ) ];
		}

		if ( is_tax() ) {
			return [ 'taxonomy', apply_filters( 'taxonomy_template_hierarchy', [ 'taxonomy.php' ] ) ];
		}

		if ( is_attachment() ) {
			return [ 'attachment', apply_filters( 'attachment_template_hierarchy', [ 'attachment.php' ] ) ];
		}

		if ( is_single() ) {
			return [ 'single', apply_filters( 'single_template_hierarchy', $this->single_templates() ) ];
		}

		if ( is_page() ) {
			return [ 'page', apply_filters( 'page_template_hierarchy', $this->page_templates() ) ];
		}

		if ( is_singular() ) {
			return [ 'singular', apply_filters( 'singular_template_hierarchy', [ 'singular.php' ] ) ];
		}

		if ( is_category() ) {
			return [ 'category', apply_filters( 'category_template_hierarchy', [ 'category.php' ] ) ];
		}

		if ( is_tag() ) {
			return [ 'tag', apply_filters( 'tag_template_hierarchy', [ 'tag.php' ] ) ];
		}

		if ( is_author() ) {
			return [ 'author', apply_filters( 'author_template_hierarchy', [ 'author.php' ] ) ];
		}

		if ( is_date() ) {
			return [ 'date', apply_filters( 'date_template_hierarchy', [ 'date.php' ] ) ];
		}

		if ( is_archive() ) {
			return [ 'archive', apply_filters( 'archive_template_hierarchy', [ 'archive.php' ] ) ];
		}

		return [ 'index', apply_filters( 'index_template_hierarchy', [ 'index.php' ] ) ];
	}

	/**
	 * Build embed template hierarchy candidates.
	 *
	 * @return string[]
	 */
	private function embed_templates(): array {
		$object    = get_queried_object();
		$templates = [];

		if ( ! empty( $object->post_type ) ) {
			$post_format = get_post_format( $object );

			if ( $post_format ) {
				$templates[] = "embed-{$object->post_type}-{$post_format}.php";
			}

			$templates[] = "embed-{$object->post_type}.php";
		}

		$templates[] = 'embed.php';

		return $templates;
	}

	/**
	 * Build single template hierarchy candidates.
	 *
	 * @return string[]
	 */
	private function single_templates(): array {
		$object    = get_queried_object();
		$templates = [];

		if ( ! empty( $object->post_type ) ) {
			$template = get_page_template_slug( $object );

			if ( $template && 0 === validate_file( $template ) ) {
				$templates[] = $template;
			}

			$name_decoded = urldecode( (string) $object->post_name );

			if ( $name_decoded !== $object->post_name ) {
				$templates[] = "single-{$object->post_type}-{$name_decoded}.php";
			}

			$templates[] = "single-{$object->post_type}-{$object->post_name}.php";
			$templates[] = "single-{$object->post_type}.php";
		}

		$templates[] = 'single.php';

		return $templates;
	}

	/**
	 * Build page template hierarchy candidates.
	 *
	 * @return string[]
	 */
	private function page_templates(): array {
		$id       = get_queried_object_id();
		$template = get_page_template_slug();
		$pagename = get_query_var( 'pagename' );
		$templates = [];

		if ( ! $pagename && $id ) {
			$post = get_queried_object();

			if ( $post instanceof WP_Post ) {
				$pagename = $post->post_name;
			}
		}

		if ( $template && 0 === validate_file( $template ) ) {
			$templates[] = $template;
		}

		if ( $pagename ) {
			$pagename_decoded = urldecode( (string) $pagename );

			if ( $pagename_decoded !== $pagename ) {
				$templates[] = "page-{$pagename_decoded}.php";
			}

			$templates[] = "page-{$pagename}.php";
		}

		if ( $id ) {
			$templates[] = "page-{$id}.php";
		}

		$templates[] = 'page.php';

		return $templates;
	}

	/**
	 * Expand patterns and inline template parts.
	 *
	 * @param string $markup Block markup.
	 *
	 * @return string
	 */
	private function expand_markup( string $markup ): string {
		$markup = $this->expand_patterns( $markup );

		return $this->inline_template_parts( $markup );
	}

	/**
	 * Expand wp:pattern placeholders via TemplatePatternExpander.
	 *
	 * @param string $content Block markup.
	 *
	 * @return string
	 */
	private function expand_patterns( string $content ): string {
		return TemplatePatternExpander::expand_pattern_content( $content );
	}

	/**
	 * Replace template-part blocks with their part markup for scanning.
	 *
	 * @param string $markup Block markup.
	 *
	 * @return string
	 */
	private function inline_template_parts( string $markup ): string {
		if ( ! str_contains( $markup, 'wp:template-part' ) ) {
			return $markup;
		}

		$blocks = parse_blocks( $markup );
		$blocks = $this->expand_template_part_blocks( $blocks );

		return serialize_blocks( $blocks );
	}

	/**
	 * Recursively flatten template-part blocks into their content.
	 *
	 * @param array<int, array<string, mixed>> $blocks Parsed blocks.
	 *
	 * @return array<int, array<string, mixed>>
	 */
	private function expand_template_part_blocks( array $blocks ): array {
		$expanded = [];

		foreach ( $blocks as $block ) {
			if ( ( $block['blockName'] ?? '' ) === 'core/template-part' ) {
				$slug  = (string) ( $block['attrs']['slug'] ?? '' );
				$theme = (string) ( $block['attrs']['theme'] ?? get_stylesheet() );

				if ( $slug !== '' ) {
					$part_content = $this->load_template_part_content( $slug, $theme );

					if ( $part_content !== '' ) {
						$part_blocks = parse_blocks( $this->expand_markup( $part_content ) );
						$expanded    = array_merge( $expanded, $this->expand_template_part_blocks( $part_blocks ) );
						continue;
					}
				}
			}

			if ( ! empty( $block['innerBlocks'] ) ) {
				$block['innerBlocks'] = $this->expand_template_part_blocks( $block['innerBlocks'] );
			}

			$expanded[] = $block;
		}

		return $expanded;
	}

	/**
	 * Load a template part's raw block markup.
	 *
	 * @param string $slug  Template part slug.
	 * @param string $theme Theme slug.
	 *
	 * @return string
	 */
	private function load_template_part_content( string $slug, string $theme ): string {
		$template = get_block_template( $theme . '//' . $slug, 'wp_template_part' );

		if ( ! $template ) {
			return '';
		}

		$content = (string) $template->content;

		if ( $content === '' && ! empty( $template->has_theme_file ) ) {
			$theme_file = _get_block_template_file( 'wp_template_part', $slug );

			if ( is_array( $theme_file ) && ! empty( $theme_file['path'] ) && is_readable( $theme_file['path'] ) ) {
				$content = (string) file_get_contents( $theme_file['path'] );
			}
		}

		return $content;
	}

	/**
	 * Append synthetic markers for blocks that only expose classes after render.
	 *
	 * @param string $markup Combined markup string.
	 *
	 * @return string
	 */
	private function append_block_markers( string $markup ): string {
		$blocks  = parse_blocks( $markup );
		$markers = [];
		$this->collect_block_markers( $blocks, $markers );

		if ( $markers === [] ) {
			return $markup;
		}

		return $markup . "\n<!-- aegis-markers:" . implode( ' ', array_unique( $markers ) ) . ' -->';
	}

	/**
	 * Walk parsed blocks and collect conditional asset markers.
	 *
	 * @param array<int, array<string, mixed>> $blocks  Parsed blocks.
	 * @param string[]                         $markers Collected markers.
	 *
	 * @return void
	 */
	private function collect_block_markers( array $blocks, array &$markers ): void {
		foreach ( $blocks as $block ) {
			$name = (string) ( $block['blockName'] ?? '' );

			if ( $name !== '' && isset( self::BLOCK_MARKERS[ $name ] ) ) {
				$markers = array_merge( $markers, self::BLOCK_MARKERS[ $name ] );
			}

			if ( ! empty( $block['innerBlocks'] ) ) {
				$this->collect_block_markers( $block['innerBlocks'], $markers );
			}
		}
	}
}
