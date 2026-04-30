<?php
/**
 * Query No Results Block Setting
 *
 * Provides a customizable "no results" template for the core/query block.
 *
 * Responsibilities:
 * - Registers no-results attributes on the core/query block for enable
 *   toggle, custom message, template style, icon choice, and search form
 * - Detects empty query results at render time and replaces the empty
 *   post template with a styled no-results container
 * - Builds accessible HTML output with role="status", aria-hidden icons,
 *   and optional inline search form via the core/search block
 * - Injects inline CSS for four template variants (default, minimal,
 *   card, centered) via the Styleable interface
 * - Supplies template and icon options to the editor via the Scriptable
 *   interface
 *
 * @package    Aegis\Framework\BlockSettings
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file.
declare( strict_types=1 );

// Declares the namespace for block settings within the Aegis Framework.
namespace Aegis\Framework\BlockSettings;

// Imports classes, interfaces, and functions used throughout this file.
use Aegis\Dom\DOM;
use Aegis\Framework\InlineAssets\Scriptable;
use Aegis\Framework\InlineAssets\Scripts;
use Aegis\Framework\InlineAssets\Styleable;
use Aegis\Framework\InlineAssets\Styles;
use Aegis\Framework\Interfaces\Renderable;
use WP_Block;
use function add_filter;
use function array_merge;
use function do_blocks;
use function esc_attr__;
use function esc_html__;
use function file_exists;
use function file_get_contents;
use function is_admin;
use function str_contains;
use function wp_kses_post;

/**
 * Query Loop no-results template.
 *
 * Replaces the empty post template inside the core/query block with
 * a configurable "no results" container when no posts match the query.
 * Supports four visual template variants, five icon choices, an optional
 * custom message, and an inline search form rendered via `do_blocks()`.
 *
 * Template and icon values are validated against internal allowlists
 * before rendering. The no-results container uses `role="status"` for
 * screen-reader announcements.
 *
 * @since 1.0.0
 */
class QueryNoResults implements Renderable, Scriptable, Styleable {

	/**
	 * Query block no-results attributes to register.
	 *
	 * Merged into the core/query block's attribute schema via the
	 * `register_block_type_args` filter. Controls whether the
	 * no-results template is active, its message, visual template,
	 * icon, and whether to include a search form.
	 *
	 * @since 1.0.0
	 *
	 * @var array<string, array{type: string, default: mixed}>
	 */
	private array $attributes = [
		'aegisNoResultsEnabled' => [
			'type'    => 'boolean',
			'default' => false,
		],
		'aegisNoResultsMessage' => [
			'type'    => 'string',
			'default' => '',
		],
		'aegisNoResultsTemplate' => [
			'type'    => 'string',
			'default' => 'default',
		],
		'aegisNoResultsIcon' => [
			'type'    => 'string',
			'default' => 'search',
		],
		'aegisNoResultsShowSearch' => [
			'type'    => 'boolean',
			'default' => false,
		],
	];

	/**
	 * Available no-results templates.
	 *
	 * Maps template slug to display label. Used as an allowlist
	 * for validating the `aegisNoResultsTemplate` attribute and
	 * as the source for editor select options.
	 *
	 * @since 1.0.0
	 *
	 * @var array<string, string>
	 */
	private array $templates = [
		'default'  => 'default',
		'minimal'  => 'minimal',
		'card'     => 'card',
		'centered' => 'centered',
	];

	/**
	 * Available icons.
	 *
	 * Maps icon slug to display label. Used as an allowlist for
	 * validating the `aegisNoResultsIcon` attribute. The 'none'
	 * value suppresses icon output entirely.
	 *
	 * @since 1.0.0
	 *
	 * @var array<string, string>
	 */
	private array $icons = [
		'search'   => 'Search',
		'folder'   => 'Folder',
		'document' => 'Document',
		'info'     => 'Info',
		'none'     => 'None',
	];

	/**
	 * Constructor.
	 *
	 * Registers the `register_block_type_args` filter to inject
	 * no-results attributes into the core/query block.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		add_filter( 'register_block_type_args', [ $this, 'add_attributes' ], 10, 2 );
	}

	/**
	 * Add custom attributes to the core/query block.
	 *
	 * Merges the no-results attributes into the block's schema.
	 * Only targets `core/query`; all other block types pass
	 * through unmodified.
	 *
	 * @since 1.0.0
	 *
	 * @hook  register_block_type_args
	 *
	 * @param array  $args       Block type arguments.
	 * @param string $block_type Block type name.
	 *
	 * @return array Modified block type arguments.
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
	 * Render the block with no-results template.
	 *
	 * When the feature is enabled and the query yields no posts,
	 * builds the no-results HTML, imports it into the block's DOM
	 * via `DOMDocument::importNode()`, and replaces the empty post
	 * template `<ul>`. Returns unmodified content when disabled or
	 * when posts exist.
	 *
	 * @since 1.0.0
	 *
	 * @hook  render_block_core/query
	 *
	 * @param string   $block_content The original block HTML.
	 * @param array    $block         The parsed block array.
	 * @param WP_Block $instance      The block instance.
	 *
	 * @return string Modified block HTML with no-results container.
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		$attrs = $block['attrs'] ?? [];

		// Check if no results template is enabled.
		$enabled = $attrs['aegisNoResultsEnabled'] ?? false;

		if ( ! $enabled ) {
			return $block_content;
		}

		// Check if there are no posts (look for empty post template).
		if ( ! $this->has_no_results( $block_content ) ) {
			return $block_content;
		}

		// Get template settings.
		$message     = $attrs['aegisNoResultsMessage'] ?? '';
		$template    = $attrs['aegisNoResultsTemplate'] ?? 'default';
		$icon        = $attrs['aegisNoResultsIcon'] ?? 'search';
		$show_search = $attrs['aegisNoResultsShowSearch'] ?? false;

		// Validate template against allowlist (QNR1).
		if ( ! isset( $this->templates[ $template ] ) ) {
			$template = 'default';
		}

		// Validate icon against allowlist.
		if ( ! isset( $this->icons[ $icon ] ) ) {
			$icon = 'search';
		}

		// Default message if empty.
		if ( empty( $message ) ) {
			$message = esc_html__( 'No posts found matching your criteria.', 'aegis' );
		}

		// Build no results HTML.
		$no_results_html = $this->build_no_results_html( $message, $template, $icon, $show_search );

		// Insert no results template into the query block (QNR2: use DOM import instead of appendXML).
		$dom = DOM::create( $block_content );
		$div = DOM::get_element( 'div', $dom );

		if ( $div ) {
			// Parse the no-results HTML into a temporary DOM.
			$temp_dom = DOM::create( $no_results_html );
			$temp_body = $temp_dom->getElementsByTagName( 'body' )->item( 0 );

			if ( $temp_body ) {
				// Find the post template container and replace/append.
				$post_template = $div->getElementsByTagName( 'ul' )->item( 0 );

				foreach ( iterator_to_array( $temp_body->childNodes ) as $child ) {
					$imported = $dom->importNode( $child, true );

					if ( $post_template && $post_template->parentNode ) {
						$post_template->parentNode->insertBefore( $imported, $post_template );
					} else {
						$div->appendChild( $imported );
					}
				}

				// Remove the empty post template.
				if ( $post_template && $post_template->parentNode ) {
					$post_template->parentNode->removeChild( $post_template );
				}
			}

			return $dom->saveHTML();
		}

		return $block_content;
	}

	/**
	 * Check if the query has no results.
	 *
	 * Detects an empty query by looking for a post template class
	 * without any `<li>` elements, or by checking whether the
	 * entire content is empty after stripping tags.
	 *
	 * @since 1.0.0
	 *
	 * @param string $content Block HTML content.
	 *
	 * @return bool True if the query produced no posts.
	 */
	private function has_no_results( string $content ): bool {
		// Check for empty post template (no list items)
		if ( str_contains( $content, 'wp-block-post-template' ) ) {
			// If there is a post template class but no list items, it is empty
			if ( ! str_contains( $content, '<li' ) ) {
				return true;
			}
		}

		// Check for completely empty content
		$stripped = strip_tags( $content );
		if ( empty( trim( $stripped ) ) ) {
			return true;
		}

		return false;
	}

	/**
	 * Build the no-results HTML.
	 *
	 * Assembles the container `<div>` with the chosen template
	 * modifier class, an optional decorative SVG icon, the
	 * sanitized message, and an optional inline search form.
	 * The container uses `role="status"` for accessibility.
	 *
	 * @since 1.0.0
	 *
	 * @param string $message     User-facing message (supports wp_kses_post HTML).
	 * @param string $template    Template variant slug (validated).
	 * @param string $icon        Icon slug (validated).
	 * @param bool   $show_search Whether to append an inline search form.
	 *
	 * @return string Complete no-results HTML string.
	 */
	private function build_no_results_html( string $message, string $template, string $icon, bool $show_search ): string {
		$icon_svg = $this->get_icon_svg( $icon );

		// QNR4: Add role="status" so screen readers announce dynamic no-results state.
		$html = sprintf(
			'<div class="aegis-query-no-results aegis-query-no-results--%s" role="status">',
			esc_attr( $template )
		);

		// QNR6: Icon container is decorative — add aria-hidden.
		if ( $icon !== 'none' && ! empty( $icon_svg ) ) {
			$html .= sprintf(
				'<div class="aegis-query-no-results__icon" aria-hidden="true">%s</div>',
				$icon_svg
			);
		}

		$html .= sprintf(
			'<p class="aegis-query-no-results__message">%s</p>',
			wp_kses_post( $message )
		);

		if ( $show_search ) {
			$html .= $this->get_search_form();
		}

		$html .= '</div>';

		return $html;
	}

	/**
	 * Get SVG icon markup.
	 *
	 * Returns a 48×48 Lucide-style SVG for the given icon slug.
	 * Each SVG includes `aria-hidden="true"` and `focusable="false"`
	 * to keep icons decorative. Returns an empty string for
	 * unrecognized slugs.
	 *
	 * @since 1.0.0
	 *
	 * @param string $icon Icon slug from {@see $icons}.
	 *
	 * @return string SVG markup or empty string.
	 */
	private function get_icon_svg( string $icon ): string {
		// QNR3: Add aria-hidden="true" and focusable="false" to all SVGs.
		$icons = [
			'search'   => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="48" height="48" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>',
			'folder'   => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="48" height="48" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M4 20h16a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.93a2 2 0 0 1-1.66-.9l-.82-1.2A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13c0 1.1.9 2 2 2Z"/></svg>',
			'document' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="48" height="48" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>',
			'info'     => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="48" height="48" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>',
		];

		return $icons[ $icon ] ?? '';
	}

	/**
	 * Get search form HTML.
	 *
	 * Renders the core/search block via `do_blocks()` with a
	 * hidden label, translatable placeholder, and button text.
	 *
	 * @since 1.0.0
	 *
	 * @return string Rendered search form HTML.
	 */
	private function get_search_form(): string {
		return do_blocks( '<!-- wp:search {"label":"","showLabel":false,"placeholder":"' . esc_attr__( 'Search...', 'aegis' ) . '","buttonText":"' . esc_attr__( 'Search', 'aegis' ) . '"} /-->' );
	}

	/**
	 * Add editor data for no-results controls.
	 *
	 * Passes the available template variants and icon choices to
	 * the editor script as value/label pairs for select controls.
	 * Only loaded in the admin context.
	 *
	 * @since 1.0.0
	 *
	 * @param Scripts $scripts Inline scripts service instance.
	 *
	 * @return void
	 */
	public function scripts( Scripts $scripts ): void {
		$scripts->add_data(
			'queryNoResults',
			[
				'templates' => array_map(
					fn( $value, $label ) => [ 'value' => $value, 'label' => $label ],
					array_keys( $this->templates ),
					array_values( $this->templates )
				),
				'icons' => array_map(
					fn( $value, $label ) => [ 'value' => $value, 'label' => $label ],
					array_keys( $this->icons ),
					array_values( $this->icons )
				),
			],
			[],
			is_admin()
		);
	}

	/**
	 * Add no-results styles.
	 *
	 * Loads the query no-results CSS from an external file following
	 * the framework's separation of concerns pattern. The CSS file
	 * contains styles for the base container, icon, message, and
	 * four template variants (default, minimal, card, centered).
	 *
	 * @since 1.0.0
	 *
	 * @param Styles $styles Inline styles service instance.
	 *
	 * @return void
	 */
	public function styles( Styles $styles ): void {
		$file = $styles->dir . 'core-blocks/query-no-results.css';
		if ( file_exists( $file ) ) {
			$styles->add_callback( fn() => file_get_contents( $file ) );
		}
	}
}
