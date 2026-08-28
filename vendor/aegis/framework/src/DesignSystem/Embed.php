<?php
/**
 * Embed Block Enhancements
 *
 * Replaces heavy third-party iframes with a click-to-load facade for
 * supported providers (YouTube, Vimeo).
 *
 * @package Aegis\Framework\DesignSystem
 * @since   1.0.0
 */

declare( strict_types=1 );

namespace Aegis\Framework\DesignSystem;

use Aegis\Framework\InlineAssets\Scriptable;
use Aegis\Framework\InlineAssets\Scripts;
use Aegis\Framework\InlineAssets\Styleable;
use Aegis\Framework\InlineAssets\Styles;
use Aegis\Framework\Interfaces\Renderable;
use WP_Block;
use function esc_attr;
use function esc_html__;
use function esc_url;
use function get_block_wrapper_attributes;
use function preg_match;
use function sprintf;
use function str_contains;
use function wp_parse_args;
use function wp_strip_all_tags;

/**
 * Facade pattern for core/embed blocks.
 */
class Embed implements Renderable, Scriptable, Styleable {

	/**
	 * Replace iframe embeds with a lightweight facade.
	 *
	 * @param string   $block_content Block HTML.
	 * @param array    $block         Block data.
	 * @param WP_Block $instance      Block instance.
	 *
	 * @hook render_block_core/embed 10
	 *
	 * @return string
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		if ( ! $this->is_facade_enabled() || ! str_contains( $block_content, '<iframe' ) ) {
			return $block_content;
		}

		$provider = (string) ( $block['attrs']['providerNameSlug'] ?? '' );
		$url      = (string) ( $block['attrs']['url'] ?? '' );

		if ( ! preg_match( '/src=["\']([^"\']+)["\']/i', $block_content, $matches ) ) {
			return $block_content;
		}

		$iframe_src = html_entity_decode( $matches[1], ENT_QUOTES );
		$poster     = $this->get_poster_url( $provider, $url, $iframe_src );

		if ( $poster === '' ) {
			return $block_content;
		}

		$aspect_ratio = $this->get_aspect_ratio( $block['attrs'] ?? [] );
		$title        = (string) ( $block['attrs']['caption'] ?? __( 'Embedded content', 'aegis' ) );

		$wrapper_attributes = get_block_wrapper_attributes(
			[
				'class' => 'aegis-embed aegis-embed--facade',
			]
		);

		return sprintf(
			'<figure %1$s><div class="wp-block-embed__wrapper aegis-embed__wrapper" style="aspect-ratio:%2$s"><div class="aegis-embed__facade" role="group" aria-label="%3$s"><img class="aegis-embed__poster" src="%4$s" alt="" loading="lazy" decoding="async" width="1280" height="720" /><button type="button" class="aegis-embed__activate" aria-label="%5$s" data-embed-src="%6$s"><span class="aegis-embed__activate-icon" aria-hidden="true"></span><span class="aegis-embed__activate-label">%7$s</span></button></div><div class="aegis-embed__player" hidden></div></div></figure>',
			$wrapper_attributes,
			esc_attr( $aspect_ratio ),
			esc_attr( wp_strip_all_tags( $title ) ),
			esc_url( $poster ),
			esc_attr( sprintf(
				/* translators: %s: embed provider name. */
				__( 'Play %s video', 'aegis' ),
				$provider !== '' ? ucfirst( $provider ) : __( 'embedded', 'aegis' )
			) ),
			esc_attr( $iframe_src ),
			esc_html__( 'Play video', 'aegis' )
		);
	}

	/**
	 * Register facade activation script.
	 *
	 * @param Scripts $scripts Scripts service.
	 *
	 * @return void
	 */
	public function scripts( Scripts $scripts ): void {
		$scripts->add_file( 'embed-facade.js', [ 'aegis-embed__facade', 'aegis-embed--facade' ] );
	}

	/**
	 * Register facade styles.
	 *
	 * @param Styles $styles Styles service.
	 *
	 * @return void
	 */
	public function styles( Styles $styles ): void {
		$styles->add_file( 'core-blocks/embed.css', [ 'wp-block-embed', 'aegis-embed__facade' ] );
		$styles->add_file( 'core-blocks/embed-facade.css', [ 'aegis-embed__facade', 'aegis-embed--facade' ] );
	}

	/**
	 * Whether embed facades are enabled.
	 *
	 * @return bool
	 */
	private function is_facade_enabled(): bool {
		if ( class_exists( '\Aegis\Plugin\Blocks\Settings' ) ) {
			return \Aegis\Plugin\Blocks\Settings::is_enabled( 'embed_facades' );
		}

		return true;
	}

	/**
	 * Resolve a poster image for supported providers.
	 *
	 * @param string $provider   Provider slug.
	 * @param string $url        Original embed URL.
	 * @param string $iframe_src Resolved iframe source.
	 *
	 * @return string
	 */
	private function get_poster_url( string $provider, string $url, string $iframe_src ): string {
		if ( $provider === 'youtube' || str_contains( $iframe_src, 'youtube.com' ) || str_contains( $url, 'youtu' ) ) {
			$video_id = $this->get_youtube_id( $url, $iframe_src );

			return $video_id !== '' ? 'https://i.ytimg.com/vi/' . $video_id . '/hqdefault.jpg' : '';
		}

		if ( $provider === 'vimeo' || str_contains( $iframe_src, 'vimeo.com' ) || str_contains( $url, 'vimeo.com' ) ) {
			$video_id = $this->get_vimeo_id( $url, $iframe_src );

			return $video_id !== '' ? 'https://vumbnail.com/' . $video_id . '.jpg' : '';
		}

		return '';
	}

	/**
	 * Extract a YouTube video ID.
	 *
	 * @param string $url        Source URL.
	 * @param string $iframe_src Iframe source URL.
	 *
	 * @return string
	 */
	private function get_youtube_id( string $url, string $iframe_src ): string {
		foreach ( [ $url, $iframe_src ] as $candidate ) {
			if ( preg_match( '#(?:youtube\.com/(?:watch\?v=|embed/|shorts/)|youtu\.be/)([a-zA-Z0-9_-]{11})#', $candidate, $matches ) ) {
				return $matches[1];
			}
		}

		return '';
	}

	/**
	 * Extract a Vimeo video ID.
	 *
	 * @param string $url        Source URL.
	 * @param string $iframe_src Iframe source URL.
	 *
	 * @return string
	 */
	private function get_vimeo_id( string $url, string $iframe_src ): string {
		foreach ( [ $url, $iframe_src ] as $candidate ) {
			if ( preg_match( '#vimeo\.com/(?:video/)?(\d+)#', $candidate, $matches ) ) {
				return $matches[1];
			}
		}

		return '';
	}

	/**
	 * Resolve aspect ratio from block attributes.
	 *
	 * @param array<string, mixed> $attrs Block attributes.
	 *
	 * @return string
	 */
	private function get_aspect_ratio( array $attrs ): string {
		$defaults = [
			'aspectRatio' => '16 / 9',
		];

		$attrs = wp_parse_args( $attrs, $defaults );
		$ratio = (string) ( $attrs['aspectRatio'] ?? '16 / 9' );

		return str_contains( $ratio, '/' ) ? $ratio : '16 / 9';
	}
}
