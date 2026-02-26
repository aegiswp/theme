<?php
/**
 * Query No Results Block Setting
 *
 * Provides customizable "no results" template for the core/query block
 * when no posts match the query criteria.
 *
 * @package    Aegis\Framework\BlockSettings
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 */

declare( strict_types=1 );

namespace Aegis\Framework\BlockSettings;

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
use function esc_html__;
use function is_admin;
use function sprintf;
use function str_contains;
use function wp_kses_post;

/**
 * Handles Query Loop no results template.
 *
 * @since 1.0.0
 */
class QueryNoResults implements Renderable, Scriptable, Styleable {

	/**
	 * Query block no results attributes to register.
	 *
	 * @var array
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
	 * Available no results templates.
	 *
	 * @var array
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
	 * @var array
	 */
	private array $icons = [
		'search'   => 'Search',
		'folder'   => 'Folder',
		'document' => 'Document',
		'info'     => 'Info',
		'none'     => 'None',
	];

	/**
	 * Constructor - registers filters.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		add_filter( 'register_block_type_args', [ $this, 'add_attributes' ], 10, 2 );
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
	 * Renders the block with no results template.
	 *
	 * @since 1.0.0
	 *
	 * @param string   $block_content The original block content.
	 * @param array    $block         The full block object.
	 * @param WP_Block $instance      The block instance.
	 *
	 * @hook render_block_core/query
	 *
	 * @return string The modified block content.
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
	 * @since 1.0.0
	 *
	 * @param string $content Block content.
	 *
	 * @return bool
	 */
	private function has_no_results( string $content ): bool {
		// Check for empty post template (no list items)
		if ( str_contains( $content, 'wp-block-post-template' ) ) {
			// If there's a post template class but no list items, it's empty
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
	 * Build the no results HTML.
	 *
	 * @since 1.0.0
	 *
	 * @param string $message     The message to display.
	 * @param string $template    The template style.
	 * @param string $icon        The icon to display.
	 * @param bool   $show_search Whether to show search form.
	 *
	 * @return string
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
	 * @since 1.0.0
	 *
	 * @param string $icon Icon name.
	 *
	 * @return string
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
	 * @since 1.0.0
	 *
	 * @return string
	 */
	private function get_search_form(): string {
		return do_blocks( '<!-- wp:search {"label":"","showLabel":false,"placeholder":"' . esc_attr__( 'Search...', 'aegis' ) . '","buttonText":"' . esc_attr__( 'Search', 'aegis' ) . '"} /-->' );
	}

	/**
	 * Add editor data for no results controls.
	 *
	 * @since 1.0.0
	 *
	 * @param Scripts $scripts Scripts service.
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
	 * Add no results styles.
	 *
	 * @since 1.0.0
	 *
	 * @param Styles $styles Styles service.
	 *
	 * @return void
	 */
	public function styles( Styles $styles ): void {
		$css = $this->get_no_results_css();
		$styles->add_callback( fn() => $css );
	}

	/**
	 * Get no results CSS.
	 *
	 * @since 1.0.0
	 *
	 * @return string
	 */
	private function get_no_results_css(): string {
		return '
/* Query No Results */
.aegis-query-no-results {
	padding: 3rem 2rem;
	text-align: center;
	color: var(--wp--preset--color--contrast, #333);
}

.aegis-query-no-results__icon {
	margin-bottom: 1rem;
	opacity: 0.5;
}

.aegis-query-no-results__icon svg {
	width: 48px;
	height: 48px;
}

.aegis-query-no-results__message {
	font-size: 1.125rem;
	margin-bottom: 1.5rem;
	color: var(--wp--preset--color--contrast, #666);
}

/* Template: Minimal */
.aegis-query-no-results--minimal {
	padding: 2rem 1rem;
}

.aegis-query-no-results--minimal .aegis-query-no-results__icon svg {
	width: 32px;
	height: 32px;
}

.aegis-query-no-results--minimal .aegis-query-no-results__message {
	font-size: 1rem;
}

/* Template: Card */
.aegis-query-no-results--card {
	background: var(--wp--preset--color--base, #fff);
	border: 1px solid var(--wp--preset--color--contrast, #e0e0e0);
	border-radius: 8px;
	box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
	max-width: 500px;
	margin: 2rem auto;
}

/* Template: Centered */
.aegis-query-no-results--centered {
	display: flex;
	flex-direction: column;
	align-items: center;
	justify-content: center;
	min-height: 300px;
}

/* Search form within no results */
.aegis-query-no-results .wp-block-search {
	max-width: 400px;
	margin: 0 auto;
}
';
	}
}
