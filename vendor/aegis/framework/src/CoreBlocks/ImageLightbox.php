<?php
/**
 * Enhances the WordPress core/image lightbox.
 *
 * @package Aegis\Framework\CoreBlocks
 * @since   1.0.0
 */

declare( strict_types=1 );

namespace Aegis\Framework\CoreBlocks;

use Aegis\Framework\InlineAssets\Scriptable;
use Aegis\Framework\InlineAssets\Scripts;
use Aegis\Framework\InlineAssets\Styleable;
use Aegis\Framework\InlineAssets\Styles;
use Aegis\Framework\Interfaces\Renderable;
use Aegis\Framework\ServiceProvider;
use WP_Block;
use WP_HTML_Tag_Processor;
use function esc_attr;
use function function_exists;
use function html_entity_decode;
use function in_array;
use function is_array;
use function is_string;
use function json_decode;
use function md5;
use function sprintf;
use function str_contains;
use function strpos;
use function strrpos;
use function substr;
use function wp_interactivity_state;
use function wp_json_encode;

/**
 * Adds gallery grouping, zoom, thumbnails, and swipe extras to core/image lightbox.
 */
class ImageLightbox implements Renderable, Scriptable, Styleable {

	private const PARENT_BLOCKS = [ 'core/gallery', 'core/group', 'core/column' ];

	private const JSON_FLAGS = JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP;

	/**
	 * Asset scan needles. `wp:image` matches serialized markup; the other two
	 * match rendered HTML or FrontendContentContext markers.
	 *
	 * @var string[]
	 */
	private const ASSET_MARKERS = [ 'wp:image', 'wp-lightbox-container', 'aegis-lightbox' ];

	/**
	 * @var array<string, string>
	 */
	private static array $parent_groups = [];

	/**
	 * @var array<string, int>
	 */
	private static array $group_order = [];

	/**
	 * Provide a shared group id to sibling images in Group/Row/Column/Gallery.
	 *
	 * @param array      $context       Block context.
	 * @param array      $parsed_block  Parsed block.
	 * @param array|null $parent_block  Parent parsed block.
	 *
	 * @hook render_block_context 10
	 *
	 * @return array
	 */
	public function provide_group_context( array $context, array $parsed_block, $parent_block = null ): array {
		if ( ! $this->needs_grouping() ) {
			return $context;
		}

		if ( ( $parsed_block['blockName'] ?? '' ) !== 'core/image' ) {
			return $context;
		}

		if ( ! empty( $context['galleryId'] ) ) {
			return $context;
		}

		$parent      = $this->parsed_block( $parent_block );
		$parent_name = (string) ( $parent['blockName'] ?? '' );

		if ( ! in_array( $parent_name, self::PARENT_BLOCKS, true ) ) {
			return $context;
		}

		$context['aegisLightboxGroup'] = $this->group_id_from_block( $parent_name, $parent );

		return $context;
	}

	/**
	 * Annotate lightbox figures after Core (priority 15) has wrapped them.
	 *
	 * @param string   $block_content Block HTML.
	 * @param array    $block         Block data.
	 * @param WP_Block $instance      Block instance.
	 *
	 * @hook render_block_core/image 16
	 *
	 * @return string
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		if ( ! $this->is_enabled() ) {
			return $block_content;
		}

		if ( ! str_contains( $block_content, 'wp-lightbox-container' ) ) {
			return $block_content;
		}

		$class_name = (string) ( $block['attrs']['className'] ?? '' );

		if ( str_contains( $class_name, 'is-style-svg' ) ) {
			return $block_content;
		}

		$group     = (string) ( $instance->context['aegisLightboxGroup'] ?? $instance->context['galleryId'] ?? '' );
		$processor = new WP_HTML_Tag_Processor( $block_content );

		if ( ! $processor->next_tag( 'figure' ) ) {
			return $block_content;
		}

		$processor->add_class( 'aegis-lightbox' );

		if ( $group !== '' && $this->needs_grouping() ) {
			$processor->set_attribute( 'data-aegis-lightbox-group', $group );
		}

		$image_id = $this->image_id_from_processor( $processor );

		if ( $image_id !== '' && function_exists( 'wp_interactivity_state' ) ) {
			$meta = [];

			if ( $group !== '' && $this->needs_grouping() && empty( $instance->context['galleryId'] ) ) {
				$meta['galleryId'] = $group;
				$meta['order']     = $this->next_order( $group );
			}

			if ( $meta !== [] ) {
				wp_interactivity_state(
					'core/image',
					[
						'metadata' => [
							$image_id => $meta,
						],
					]
				);
			}
		}

		return $processor->get_updated_html();
	}

	/**
	 * Expose Core gallery interactivity context on Group/Column wrappers so
	 * prev/next, keyboard, and swipe see sibling lightbox images as one set.
	 *
	 * @param string $block_content Block HTML.
	 * @param array  $block         Parsed block.
	 *
	 * @hook render_block_core/group 20
	 * @hook render_block_core/column 20
	 *
	 * @return string
	 */
	public function wrap_parent( string $block_content, array $block ): string {
		if ( ! $this->needs_grouping() ) {
			return $block_content;
		}

		if ( ! str_contains( $block_content, 'data-aegis-lightbox-group' ) ) {
			return $block_content;
		}

		$name  = (string) ( $block['blockName'] ?? '' );
		$group = $this->group_id_from_block( $name, $block );

		if ( ! str_contains( $block_content, $group ) ) {
			return $block_content;
		}

		return $this->attach_gallery_context( $block_content, $group );
	}

	/**
	 * @param Scripts $scripts Scripts service.
	 */
	public function scripts( Scripts $scripts ): void {
		if ( ! $this->is_enabled() ) {
			return;
		}

		$scripts->add_file( 'image-lightbox.js', self::ASSET_MARKERS );
		$scripts->add_data(
			'lightbox',
			[
				'galleryNav' => $this->feature( 'image_lightbox_gallery_nav' ),
				'zoom'       => $this->feature( 'image_lightbox_zoom' ),
				'thumbnails' => $this->feature( 'image_lightbox_thumbnails' ),
				'swipe'      => $this->feature( 'image_lightbox_swipe' ),
			],
			self::ASSET_MARKERS
		);
	}

	/**
	 * @param Styles $styles Styles service.
	 */
	public function styles( Styles $styles ): void {
		if ( ! $this->is_enabled() ) {
			return;
		}

		$styles->add_file( 'core-blocks/image-lightbox.css', self::ASSET_MARKERS );
	}

	private function is_enabled(): bool {
		return ServiceProvider::is_block_enabled( 'image_lightbox' );
	}

	private function feature( string $key ): bool {
		return ServiceProvider::is_block_enabled( $key );
	}

	private function needs_grouping(): bool {
		return $this->feature( 'image_lightbox_gallery_nav' )
			|| $this->feature( 'image_lightbox_swipe' )
			|| $this->feature( 'image_lightbox_thumbnails' );
	}

	/**
	 * Normalize render_block_context's parent argument (WP_Block or parsed array).
	 *
	 * @param mixed $block Parent block object or parsed array.
	 *
	 * @return array<string, mixed>
	 */
	private function parsed_block( $block ): array {
		if ( $block instanceof WP_Block ) {
			return is_array( $block->parsed_block ) ? $block->parsed_block : [];
		}

		return is_array( $block ) ? $block : [];
	}

	/**
	 * @param array<string, mixed> $block Parsed block.
	 */
	private function group_id_from_block( string $name, array $block ): string {
		$key = md5( $name . wp_json_encode( $block['innerContent'] ?? [] ) );

		if ( ! isset( self::$parent_groups[ $key ] ) ) {
			self::$parent_groups[ $key ] = 'aegis-lb-' . $key;
		}

		return self::$parent_groups[ $key ];
	}

	private function next_order( string $group ): int {
		if ( ! isset( self::$group_order[ $group ] ) ) {
			self::$group_order[ $group ] = 0;
		}

		$order = self::$group_order[ $group ];
		++self::$group_order[ $group ];

		return $order;
	}

	private function attach_gallery_context( string $html, string $group ): string {
		$processor = new WP_HTML_Tag_Processor( $html );

		if ( ! $processor->next_tag() ) {
			return $html;
		}

		$existing = $processor->get_attribute( 'data-wp-interactive' );

		if ( $existing === 'core/gallery' ) {
			return $html;
		}

		$context = wp_json_encode( [ 'galleryId' => $group ], self::JSON_FLAGS );

		if ( ! is_string( $context ) || $context === '' ) {
			return $html;
		}

		if ( ! $existing ) {
			$processor->set_attribute( 'data-wp-interactive', 'core/gallery' );
			$processor->set_attribute( 'data-wp-context', $context );

			return $processor->get_updated_html();
		}

		return $this->wrap_inner_with_gallery_context( $html, $context );
	}

	private function wrap_inner_with_gallery_context( string $html, string $context ): string {
		$gt = strpos( $html, '>' );

		if ( $gt === false ) {
			return $html;
		}

		$last = strrpos( $html, '<' );

		if ( $last === false || $last <= $gt ) {
			return $html;
		}

		$open = sprintf(
			'<div class="aegis-lightbox-group" data-wp-interactive="core/gallery" data-wp-context="%s">',
			esc_attr( $context )
		);

		return substr( $html, 0, $gt + 1 )
			. $open
			. substr( $html, $gt + 1, $last - $gt - 1 )
			. '</div>'
			. substr( $html, $last );
	}

	private function image_id_from_processor( WP_HTML_Tag_Processor $processor ): string {
		$raw = $processor->get_attribute( 'data-wp-context' );

		if ( ! is_string( $raw ) || $raw === '' ) {
			return '';
		}

		$decoded = json_decode( html_entity_decode( $raw, ENT_QUOTES | ENT_HTML5 ), true );

		if ( ! is_array( $decoded ) ) {
			return '';
		}

		$id = $decoded['imageId'] ?? '';

		return is_string( $id ) ? $id : '';
	}
}
