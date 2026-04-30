<?php
/**
 * Co-Authors Plus Integration Component
 *
 * Provides integration for the Co-Authors Plus plugin in the Aegis Framework.
 *
 * Responsibilities:
 * - Checks for Co-Authors Plus plugin presence and conditionally registers hooks
 * - Replaces single-author block output with multi-author display
 * - Hooks render_block for core/post-author, core/post-author-name, core/post-author-biography
 * - Adds aegis-coauthors-plus body class
 *
 * @package    Aegis\Framework\Integrations\Plugins
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 */

// Enable strict type checking for all function arguments and return values.
declare( strict_types=1 );

// Plugin integrations live under the Framework's Integrations\Plugins namespace.
namespace Aegis\Framework\Integrations\Plugins;

// Framework interfaces.
use Aegis\Container\Interfaces\Conditional;
use Aegis\Framework\InlineAssets\Styleable;
use Aegis\Framework\InlineAssets\Styles;

// WordPress classes.
use WP_Block;

// WordPress functions — explicitly imported for static analysis in strict namespaced PHP.
use function add_filter;
use function function_exists;
use function get_the_ID;
use function get_avatar;
use function esc_html;
use function esc_url;
use function get_author_posts_url;
use function add_action;
use function is_singular;
use function get_avatar_url;
use function wp_json_encode;

/**
 * Co-Authors Plus integration for block-based author display.
 *
 * Intercepts the rendering of three core author blocks (post-author,
 * post-author-name, post-author-biography) and replaces single-author
 * output with multi-author markup when a post has more than one
 * co-author assigned via the Co-Authors Plus plugin.
 *
 * Implements {@see Conditional} so the service provider only instantiates
 * this class when the Co-Authors Plus plugin is active (i.e. the global
 * `get_coauthors()` function exists).
 *
 * Implements {@see Styleable} to register a dedicated CSS file that is
 * conditionally inlined when the `aegis-coauthors-plus` body class is
 * present in the rendered template.
 *
 * Also outputs JSON-LD Person schema in `wp_head` for multi-author
 * singular posts, providing structured data for search engines.
 *
 * @since 1.0.0
 */
class CoAuthorsPlus implements Conditional, Styleable {

	/**
	 * Determine whether the Co-Authors Plus plugin is active.
	 *
	 * Checks for the existence of the `get_coauthors()` function, which
	 * is defined by the Co-Authors Plus plugin. The framework's service
	 * provider calls this before instantiation — if it returns false,
	 * the class is never loaded and no hooks are registered.
	 *
	 * @since 1.0.0
	 *
	 * @return bool True when Co-Authors Plus is active.
	 */
	public static function condition(): bool {
		return function_exists( 'get_coauthors' );
	}

	/**
	 * Register WordPress hooks for block rendering and frontend output.
	 *
	 * Filters three core author blocks via their block-specific render
	 * hooks (`render_block_{block_name}`) so only author blocks are
	 * intercepted — not every block on the page.
	 *
	 * Also adds a body class for CSS scoping and outputs structured
	 * data at priority 5 (before most SEO plugins) in `wp_head`.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function hooks(): void {
		add_filter( 'render_block_core/post-author', [ $this, 'render_post_author' ], 10, 3 );
		add_filter( 'render_block_core/post-author-name', [ $this, 'render_post_author_name' ], 10, 3 );
		add_filter( 'render_block_core/post-author-biography', [ $this, 'render_post_author_biography' ], 10, 3 );
		add_filter( 'body_class', [ $this, 'add_body_class' ] );
		add_action( 'wp_head', [ $this, 'output_author_schema' ], 5 );
	}

	/**
	 * Register the Co-Authors Plus stylesheet for conditional inlining.
	 *
	 * The CSS file is only inlined when the `aegis-coauthors-plus` body
	 * class is detected in the serialized template HTML, avoiding any
	 * CSS payload on pages where the integration is irrelevant.
	 *
	 * @since 1.0.0
	 *
	 * @param Styles $styles The framework's inline styles registry.
	 *
	 * @return void
	 */
	public function styles( Styles $styles ): void {
		$styles->add_file(
			'plugins/co-authors-plus.css',
			[
				'aegis-coauthors-plus',
			],
			static::condition()
		);
	}

	/**
	 * Replace the core/post-author block with a co-authors list.
	 *
	 * Builds a horizontal list of co-author cards, each with an optional
	 * avatar and a linked (or plain) display name. Authors are separated
	 * by a comma span. The wrapper reuses the `wp-block-post-author`
	 * class so existing block styles (spacing, typography) still apply.
	 *
	 * Returns the original `$block_content` unchanged when the post has
	 * zero or one author, letting the core block handle single-author
	 * rendering natively.
	 *
	 * @since 1.0.0
	 *
	 * @hook  render_block_core/post-author
	 *
	 * @param string   $block_content The original single-author block HTML.
	 * @param array    $block         The parsed block array including `attrs`.
	 * @param WP_Block $instance      The block instance with context data.
	 *
	 * @return string Replaced multi-author HTML, or original content for single authors.
	 */
	public function render_post_author( string $block_content, array $block, WP_Block $instance ): string {
		$post_id = get_the_ID();

		if ( ! $post_id ) {
			return $block_content;
		}

		$coauthors = get_coauthors( $post_id );

		// Bail early for single-author posts — let core handle them.
		if ( empty( $coauthors ) || count( $coauthors ) <= 1 ) {
			return $block_content;
		}

		// Respect the block's editor-configurable attributes.
		$show_avatar = $block['attrs']['showAvatar'] ?? true;
		$avatar_size = $block['attrs']['avatarSize'] ?? 48;
		$is_link     = $block['attrs']['isLink'] ?? true;
		$output      = '<div class="aegis-coauthors-list wp-block-post-author">';

		foreach ( $coauthors as $i => $coauthor ) {
			$name       = esc_html( $coauthor->display_name );
			$author_url = get_author_posts_url( (int) $coauthor->ID, $coauthor->user_nicename );

			$output .= '<div class="aegis-coauthor">';

			if ( $show_avatar ) {
				$avatar  = get_avatar( $coauthor->ID, (int) $avatar_size );
				$output .= '<div class="aegis-coauthor-avatar wp-block-post-author__avatar">' . $avatar . '</div>';
			}

			$output .= '<div class="aegis-coauthor-content wp-block-post-author__content">';

			if ( $is_link ) {
				$output .= '<span class="wp-block-post-author__name"><a href="' . esc_url( $author_url ) . '">' . $name . '</a></span>';
			} else {
				$output .= '<span class="wp-block-post-author__name">' . $name . '</span>';
			}

			$output .= '</div>';
			$output .= '</div>';

			// Add a comma separator between authors, but not after the last one.
			if ( $i < count( $coauthors ) - 1 ) {
				$output .= '<span class="aegis-coauthor-separator">,</span>';
			}
		}

		$output .= '</div>';

		return $output;
	}

	/**
	 * Replace the core/post-author-name block with a comma-and-ampersand
	 * formatted co-authors name string.
	 *
	 * Produces an inline name list in the form "Alice, Bob & Carol".
	 * The last author is joined with an ampersand (`&amp;`) instead of a
	 * comma for grammatically correct English enumeration.
	 *
	 * @since 1.0.0
	 *
	 * @hook  render_block_core/post-author-name
	 *
	 * @param string   $block_content The original single-author name HTML.
	 * @param array    $block         The parsed block array including `attrs`.
	 * @param WP_Block $instance      The block instance with context data.
	 *
	 * @return string Formatted co-author names, or original content for single authors.
	 */
	public function render_post_author_name( string $block_content, array $block, WP_Block $instance ): string {
		$post_id = get_the_ID();

		if ( ! $post_id ) {
			return $block_content;
		}

		$coauthors = get_coauthors( $post_id );

		if ( empty( $coauthors ) || count( $coauthors ) <= 1 ) {
			return $block_content;
		}

		$is_link = $block['attrs']['isLink'] ?? true;
		$names   = [];

		foreach ( $coauthors as $coauthor ) {
			$name       = esc_html( $coauthor->display_name );
			$author_url = get_author_posts_url( (int) $coauthor->ID, $coauthor->user_nicename );

			if ( $is_link ) {
				$names[] = '<a href="' . esc_url( $author_url ) . '">' . $name . '</a>';
			} else {
				$names[] = $name;
			}
		}

		// Pop the last name so it can be joined with "&" instead of ",".
		$last = array_pop( $names );
		$list = empty( $names ) ? $last : implode( ', ', $names ) . ' &amp; ' . $last;

		return '<p class="wp-block-post-author-name aegis-coauthors-names">' . $list . '</p>';
	}

	/**
	 * Replace the core/post-author-biography block with stacked
	 * co-author biography sections.
	 *
	 * Each co-author's biography is rendered as a separate card with
	 * a name heading and a biography paragraph. Co-authors without a
	 * biography (`description` field empty) are silently skipped.
	 *
	 * Biography content is sanitized with `wp_kses_post()` to allow
	 * safe HTML (links, emphasis, etc.) while stripping dangerous tags.
	 *
	 * @since 1.0.0
	 *
	 * @hook  render_block_core/post-author-biography
	 *
	 * @param string   $block_content The original single-author biography HTML.
	 * @param array    $block         The parsed block array including `attrs`.
	 * @param WP_Block $instance      The block instance with context data.
	 *
	 * @return string Stacked co-author biographies, or original content for single authors.
	 */
	public function render_post_author_biography( string $block_content, array $block, WP_Block $instance ): string {
		$post_id = get_the_ID();

		if ( ! $post_id ) {
			return $block_content;
		}

		$coauthors = get_coauthors( $post_id );

		if ( empty( $coauthors ) || count( $coauthors ) <= 1 ) {
			return $block_content;
		}

		$output = '<div class="aegis-coauthors-biographies">';

		foreach ( $coauthors as $coauthor ) {
			$bio = $coauthor->description ?? '';

			// Skip co-authors who haven't filled in a biography.
			if ( empty( $bio ) ) {
				continue;
			}

			$name    = esc_html( $coauthor->display_name );
			$output .= '<div class="aegis-coauthor-bio">';
			$output .= '<p class="aegis-coauthor-bio-name">' . $name . '</p>';
			$output .= '<p class="wp-block-post-author-biography aegis-coauthor-bio-text">' . wp_kses_post( $bio ) . '</p>';
			$output .= '</div>';
		}

		$output .= '</div>';

		return $output;
	}

	/**
	 * Output JSON-LD structured data for co-authors on singular posts.
	 *
	 * Renders a `schema.org/ItemList` containing `Person` objects for each
	 * co-author, including name, author archive URL, and 96px avatar.
	 * This provides search engines with explicit multi-author metadata
	 * that the default WordPress markup does not convey.
	 *
	 * Only fires on singular `post` pages with multiple co-authors.
	 * The redundant `function_exists` check guards against edge cases
	 * where the plugin may be deactivated mid-request (e.g. during
	 * plugin updates).
	 *
	 * Hooked at priority 5 to run before most SEO plugins, which
	 * typically operate at priority 10 and may want to reference or
	 * merge this structured data.
	 *
	 * @since 1.0.0
	 *
	 * @hook  wp_head 5
	 *
	 * @return void
	 */
	public function output_author_schema(): void {
		if ( ! is_singular( 'post' ) || ! function_exists( 'get_coauthors' ) ) {
			return;
		}

		$post_id   = get_the_ID();
		$coauthors = get_coauthors( $post_id );

		// Only output structured data when there are multiple authors.
		if ( empty( $coauthors ) || count( $coauthors ) <= 1 ) {
			return;
		}

		$persons = [];

		foreach ( $coauthors as $coauthor ) {
			$person = [
				'@type' => 'Person',
				'name'  => $coauthor->display_name,
				'url'   => get_author_posts_url( (int) $coauthor->ID, $coauthor->user_nicename ),
			];

			// Include avatar only if one is available (Gravatar or local).
			$avatar_url = get_avatar_url( $coauthor->ID, [ 'size' => 96 ] );
			if ( $avatar_url ) {
				$person['image'] = $avatar_url;
			}

			$persons[] = $person;
		}

		$schema = [
			'@context' => 'https://schema.org',
			'@type'    => 'ItemList',
			'name'     => 'Authors',
			'itemListElement' => $persons,
		];

		echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>' . "\n";
	}

	/**
	 * Add an `aegis-coauthors-plus` body class for CSS scoping.
	 *
	 * This class serves a dual purpose:
	 * 1. Acts as the trigger string for the Styles registry to inline
	 *    the `plugins/co-authors-plus.css` stylesheet.
	 * 2. Provides a global CSS hook for theme or child-theme authors
	 *    to scope custom co-author styles.
	 *
	 * @since 1.0.0
	 *
	 * @hook  body_class
	 *
	 * @param string[] $classes Existing body CSS classes.
	 *
	 * @return string[] Modified classes with `aegis-coauthors-plus` appended.
	 */
	public function add_body_class( array $classes ): array {
		$classes[] = 'aegis-coauthors-plus';

		return $classes;
	}
}
