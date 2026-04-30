<?php
/**
 * Embed Component
 *
 * Customises the WordPress oEmbed provider output so that posts embedded
 * on external sites match the Aegis theme's design system.
 *
 * Responsibilities:
 * - Enqueues a dedicated embed stylesheet (`aegis-embed-template`)
 * - Registers and enforces a custom `aegis-embed` image size
 *   (640 × 360, hard-crop) for consistent featured-image cards
 * - Shortens the embed excerpt to 25 words and rewrites the
 *   "Continue reading" CTA to "Read more"
 * - Replaces the default site-title markup, removing the WordPress
 *   logo fallback and using the site icon when available
 * - Appends the publication date and primary taxonomy term below
 *   the excerpt (skipped when a custom embed-content.php template
 *   already renders them)
 * - Removes the share button and sharing dialog for a cleaner card
 *
 * @package    Aegis\Framework\DesignSystem
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file.
declare( strict_types=1 );

// Declares the namespace for design-system components within the Aegis Framework.
namespace Aegis\Framework\DesignSystem;

// Imports classes and functions used throughout this file.
use Aegis\Utilities\Debug;
use WP_HTML_Tag_Processor;
use function add_image_size;
use function esc_attr;
use function esc_html;
use function esc_html__;
use function esc_url;
use function get_bloginfo;
use function get_post_type;
use function get_site_icon_url;
use function get_template_directory;
use function get_template_directory_uri;
use function get_the_date;
use function get_the_ID;
use function get_the_terms;
use function home_url;
use function is_embed;
use function is_single;
use function is_wp_error;
use function remove_action;
use function wp_enqueue_style;

/**
 * Embed component.
 *
 * Customises every aspect of the WordPress oEmbed provider card so
 * that posts embedded on external sites are visually consistent with
 * the Aegis design system. Hooks into image size registration,
 * embed script/style enqueueing, excerpt filtering, site-title
 * markup, content meta output, and share-button removal.
 *
 * When the active theme ships its own `embed-content.php` template,
 * the date and terms hooks are automatically skipped to avoid
 * duplicate output.
 *
 * @since 1.0.0
 */
class Embed {

	/**
	 * Whether the theme provides a custom embed-content.php template.
	 *
	 * When `true`, date and terms are rendered directly in the
	 * template, so the `embed_content` hook callbacks should not
	 * duplicate them. Lazily resolved on first access via
	 * {@see has_custom_template()} and cached for the request.
	 *
	 * @since 1.0.0
	 *
	 * @var bool|null
	 */
	private ?bool $has_custom_template = null;

	/**
	 * Check if the theme has a custom embed-content.php template.
	 *
	 * Looks for `embed-content.php` in the active theme's root
	 * directory and caches the result in `$has_custom_template`.
	 *
	 * @since 1.0.0
	 *
	 * @return bool True when the template file exists.
	 */
	private function has_custom_template(): bool {
		if ( $this->has_custom_template === null ) {
			$this->has_custom_template = file_exists( get_template_directory() . '/embed-content.php' );
		}

		return $this->has_custom_template;
	}

	/**
	 * Register the custom embed image size.
	 *
	 * Adds the `aegis-embed` image size (640 × 360, hard-crop) used
	 * for featured-image thumbnails in oEmbed cards.
	 *
	 * @since 1.0.0
	 *
	 * @hook  after_setup_theme
	 *
	 * @return void
	 */
	public function register_image_size(): void {
		add_image_size( 'aegis-embed', 640, 360, true );
	}

	/**
	 * Enqueue the embed stylesheet.
	 *
	 * Registers `aegis-embed-template` with a dependency on
	 * `wp-embed-template`. Uses a timestamp version when debug
	 * mode is enabled for cache-busting during development.
	 *
	 * @since 1.0.0
	 *
	 * @hook  enqueue_embed_scripts
	 *
	 * @return void
	 */
	public function enqueue_styles(): void {
		wp_enqueue_style(
			'aegis-embed-template',
			get_template_directory_uri() . '/vendor/aegis/framework/public/css/embed-template.css',
			[ 'wp-embed-template' ],
			Debug::is_enabled() ? filemtime( get_template_directory() . '/vendor/aegis/framework/public/css/embed-template.css' ) : '1.0.0'
		);
	}

	/**
	 * Enforce rectangular (above-title) featured image layout.
	 *
	 * Returns `'rectangular'` so the thumbnail renders as a
	 * full-width banner above the embed title instead of a
	 * small square.
	 *
	 * @since 1.0.0
	 *
	 * @hook  embed_thumbnail_image_shape
	 *
	 * @return string Image shape identifier.
	 */
	public function enforce_image_shape(): string {
		return 'rectangular';
	}

	/**
	 * Use the custom embed image size for thumbnails.
	 *
	 * Returns the `aegis-embed` size registered by
	 * {@see register_image_size()} for consistently cropped
	 * featured images in oEmbed cards.
	 *
	 * @since 1.0.0
	 *
	 * @hook  embed_thumbnail_image_size
	 *
	 * @return string WordPress image-size slug.
	 */
	public function enforce_image_size(): string {
		return 'aegis-embed';
	}

	/**
	 * Shorten the excerpt to 25 words in embed context.
	 *
	 * Only overrides the default length when `is_embed()` is true;
	 * all other contexts pass through unchanged.
	 *
	 * @since 1.0.0
	 *
	 * @hook  excerpt_length
	 *
	 * @param int $length Default excerpt word count.
	 *
	 * @return int Filtered excerpt word count.
	 */
	public function shorten_excerpt( int $length ): int {
		return is_embed() ? 25 : $length;
	}

	/**
	 * Change the excerpt "Continue reading" CTA to "Read more".
	 *
	 * Uses `WP_HTML_Tag_Processor` to locate the anchor tag inside
	 * the default more string and rewrite its visible text. Only
	 * applies in the embed context.
	 *
	 * @since 1.0.0
	 *
	 * @hook  excerpt_more 21
	 *
	 * @param string $more_string The default more markup.
	 *
	 * @return string Filtered more markup.
	 */
	public function excerpt_cta( string $more_string ): string {
		if ( ! is_embed() ) {
			return $more_string;
		}

		$processor = new WP_HTML_Tag_Processor( $more_string );

		if ( $processor->next_tag( 'a' ) ) {
			$processor->next_token();
			$processor->set_modifiable_text( esc_html__( 'Read more', 'aegis' ) );
		}

		return $processor->get_updated_html();
	}

	/**
	 * Customise the site title in the embed footer.
	 *
	 * Renders the site icon (32 × 32, when set) alongside the site
	 * name, linking both to the home URL. Omits the WordPress logo
	 * fallback present in the default implementation.
	 *
	 * @since 1.0.0
	 *
	 * @hook  embed_site_title_html
	 *
	 * @return string Site-title HTML for the embed footer.
	 */
	public function site_title(): string {
		$site_name = esc_html( get_bloginfo( 'name' ) );
		$site_icon = get_site_icon_url( 32 );

		if ( $site_icon ) {
			return sprintf(
				'<div class="wp-embed-site-title"><a href="%s"><img src="%s" width="32" height="32" alt="%s" class="wp-embed-site-icon" /></a> <a href="%s">%s</a></div>',
				esc_url( home_url() ),
				esc_url( $site_icon ),
				esc_attr( $site_name ),
				esc_url( home_url() ),
				$site_name
			);
		}

		return sprintf(
			'<div class="wp-embed-site-title"><a href="%s">%s</a></div>',
			esc_url( home_url() ),
			$site_name
		);
	}

	/**
	 * Append the publication date for single posts.
	 *
	 * Outputs a `<time>` element with a W3C datetime attribute and
	 * a localised display date. Skipped when the theme ships a
	 * custom embed-content.php template or the current request is
	 * not a single post.
	 *
	 * @since 1.0.0
	 *
	 * @hook  embed_content
	 *
	 * @return void
	 */
	public function add_post_date(): void {
		if ( $this->has_custom_template() || ! is_single() ) {
			return;
		}

		$time = sprintf(
			'<time datetime="%1$s">%2$s</time>',
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() )
		);

		printf(
			'<p class="wp-embed-posted-on">%s</p>',
			sprintf(
				/* translators: %s: Publish date. */
				esc_html__( 'Posted on %s', 'aegis' ),
				$time // phpcs:ignore WordPress.Security.EscapeOutput
			)
		);
	}

	/**
	 * Append the primary category or tag below the excerpt.
	 *
	 * Tries the `category` taxonomy first, then `post_tag`, and
	 * outputs the first term found. Skipped when the theme ships a
	 * custom embed-content.php template or no terms are assigned.
	 *
	 * @since 1.0.0
	 *
	 * @hook  embed_content
	 *
	 * @return void
	 */
	public function add_post_terms(): void {
		if ( $this->has_custom_template() ) {
			return;
		}

		$post_type = get_post_type();

		if ( ! $post_type ) {
			return;
		}

		// Try category first, then post_tag.
		$taxonomies = [ 'category', 'post_tag' ];

		foreach ( $taxonomies as $taxonomy ) {
			$terms = get_the_terms( get_the_ID(), $taxonomy );

			if ( ! $terms || is_wp_error( $terms ) ) {
				continue;
			}

			$term = $terms[0];

			printf(
				'<p class="wp-embed-terms"><span class="wp-embed-term">%s</span></p>',
				esc_html( $term->name )
			);

			return;
		}
	}

	/**
	 * Remove the share button and sharing dialog for a cleaner embed card.
	 *
	 * Unhooks `print_embed_sharing_button` from `embed_content_meta`
	 * and `print_embed_sharing_dialog` from `embed_footer`.
	 *
	 * @since 1.0.0
	 *
	 * @hook  init
	 *
	 * @return void
	 */
	public function remove_share_button(): void {
		remove_action( 'embed_content_meta', 'print_embed_sharing_button' );
		remove_action( 'embed_footer', 'print_embed_sharing_dialog' );
	}
}
