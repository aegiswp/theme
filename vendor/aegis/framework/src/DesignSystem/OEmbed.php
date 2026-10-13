<?php
/**
 * oEmbed provider styling.
 *
 * Enqueues theme styles for WordPress oEmbed cards when this site's
 * posts are embedded on external sites.
 *
 * @package Aegis\Framework\DesignSystem
 * @since   1.0.0
 */

declare( strict_types=1 );

namespace Aegis\Framework\DesignSystem;

use Aegis\Dom\CSS;
use Aegis\Utilities\Debug;
use function add_image_size;
use function array_filter;
use function file_exists;
use function filemtime;
use function function_exists;
use function get_template_directory;
use function get_template_directory_uri;
use function wp_add_inline_style;
use function wp_enqueue_global_styles;
use function wp_enqueue_style;
use function wp_style_is;

/**
 * oEmbed card styles and thumbnail size.
 */
class OEmbed {

	/**
	 * Register the featured-image size used by embed-content.php.
	 *
	 * @since 1.0.0
	 *
	 * @hook after_setup_theme
	 *
	 * @return void
	 */
	public function register_image_size(): void {
		add_image_size( 'aegis-embed', 640, 360, true );
	}

	/**
	 * Enqueue oEmbed stylesheet and theme design tokens.
	 *
	 * @since 1.0.0
	 *
	 * @hook enqueue_embed_scripts
	 *
	 * @return void
	 */
	public function enqueue_styles(): void {
		$path = get_template_directory() . '/vendor/aegis/framework/public/css/elements/oembed.css';

		if ( ! file_exists( $path ) ) {
			return;
		}

		// Ensure theme.json presets/custom properties exist inside the embed iframe.
		if ( function_exists( 'wp_enqueue_global_styles' ) ) {
			wp_enqueue_global_styles();
		}

		$deps = [ 'wp-embed-template' ];

		if ( wp_style_is( 'global-styles', 'registered' ) || wp_style_is( 'global-styles', 'enqueued' ) ) {
			$deps[] = 'global-styles';
		}

		wp_enqueue_style(
			'aegis-oembed',
			get_template_directory_uri() . '/vendor/aegis/framework/public/css/elements/oembed.css',
			$deps,
			Debug::is_enabled() ? (string) filemtime( $path ) : '1.0.0'
		);

		// Framework-derived tokens (--wp--custom--body/heading/…) for active style variation.
		$custom_properties = ( new CustomProperties() )->get_custom_properties();
		$custom_properties = array_filter(
			$custom_properties,
			static fn( $value ): bool => null !== $value && '' !== $value
		);

		if ( $custom_properties ) {
			wp_add_inline_style(
				'aegis-oembed',
				':root{' . CSS::array_to_string( $custom_properties ) . '}'
			);
		}
	}
}
