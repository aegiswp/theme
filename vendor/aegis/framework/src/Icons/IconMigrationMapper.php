<?php
/**
 * Maps legacy core/image icon block attributes to core/icon.
 *
 * @package Aegis\Framework\Icons
 * @since   1.0.0
 */

// Enforces strict type checking for all code in this file, ensuring type safety for maps legacy core/image icon block attributes to core/icon.
declare( strict_types=1 );

// Declares the namespace for the maps legacy core/image icon block attributes to core/icon.
namespace Aegis\Framework\Icons;

// Imports classes, interfaces, and functions used by the maps legacy core/image icon block attributes to core/icon.
use Aegis\Icons\Icon;
use function array_filter;
use function explode;
use function is_array;
use function str_contains;
use function trim;

/**
 * Single source of truth for icon block migration (PHP CLI + editor transform rules).
 */
class IconMigrationMapper {

	/**
	 * Cached core icon slugs from manifest.
	 *
	 * @var array<string, true>|null
	 */
	private static ?array $core_slugs = null;

	/**
	 * Whether legacy image block attrs represent an icon variation.
	 *
	 * @param array<string, mixed> $attrs Block attributes.
	 */
	public static function is_legacy_image_icon( array $attrs ): bool {
		$class_name = (string) ( $attrs['className'] ?? '' );

		if ( str_contains( $class_name, 'is-style-icon' ) ) {
			return true;
		}

		if ( ! empty( $attrs['iconSvgString'] ) ) {
			return true;
		}

		return ! empty( $attrs['iconSet'] ) && ! empty( $attrs['iconName'] );
	}

	/**
	 * Maps legacy core/image icon attributes to core/icon attributes.
	 *
	 * @param array<string, mixed> $attrs Legacy attributes.
	 *
	 * @return array<string, mixed>
	 */
	public static function map_image_icon_to_core_icon( array $attrs ): array {
		$set  = strtolower( (string) ( $attrs['iconSet'] ?? 'wordpress' ) );
		$name = strtolower( (string) ( $attrs['iconName'] ?? '' ) );
		$icon = self::resolve_icon_id( $set, $name );

		$mapped = [
			'icon' => $icon,
		];

		if ( ! empty( $attrs['gradient'] ) ) {
			$mapped['gradient'] = $attrs['gradient'];
		}

		if ( ! empty( $attrs['url'] ) ) {
			$mapped['url'] = $attrs['url'];
		}

		if ( ! empty( $attrs['linkTarget'] ) ) {
			$mapped['linkTarget'] = $attrs['linkTarget'];
		}

		if ( ! empty( $attrs['rel'] ) ) {
			$mapped['rel'] = $attrs['rel'];
		}

		if ( ! empty( $attrs['textColor'] ) ) {
			$mapped['textColor'] = $attrs['textColor'];
		}

		if ( ! empty( $attrs['backgroundColor'] ) ) {
			$mapped['backgroundColor'] = $attrs['backgroundColor'];
		}

		if ( ! empty( $attrs['gradient'] ) && empty( $mapped['textColor'] ) ) {
			// Preserve gradient-driven color behavior.
		}

		$aria = $attrs['alt'] ?? $attrs['title'] ?? '';
		if ( $aria ) {
			$mapped['ariaLabel'] = (string) $aria;
		}

		if ( ! empty( $attrs['animation'] ) ) {
			$mapped['animation'] = $attrs['animation'];
		}

		$style = is_array( $attrs['style'] ?? null ) ? $attrs['style'] : [];

		if ( ! empty( $attrs['iconSize'] ) ) {
			$style['dimensions']            = is_array( $style['dimensions'] ?? null ) ? $style['dimensions'] : [];
			$style['dimensions']['width']   = (string) $attrs['iconSize'];
		}

		if ( ! empty( $style['color']['text'] ) && empty( $mapped['textColor'] ) ) {
			$mapped['style'] = [ 'color' => [ 'text' => $style['color']['text'] ] ];
		} elseif ( ! empty( $style ) ) {
			$mapped['style'] = $style;
		}

		$class_name = self::strip_icon_variation_classes( (string) ( $attrs['className'] ?? '' ) );
		if ( ! empty( $attrs['animation'] ) ) {
			$class_name = trim( $class_name . ' has-animation' );
		}
		if ( $class_name ) {
			$mapped['className'] = $class_name;
		}

		if ( ! empty( $attrs['align'] ) ) {
			$mapped['align'] = $attrs['align'];
		}

		return $mapped;
	}

	/**
	 * Resolves icon registry id from set + name.
	 */
	public static function resolve_icon_id( string $set, string $name ): string {
		if ( $set === 'wordpress' && self::core_slug_exists( $name ) ) {
			return 'core/' . $name;
		}

		return 'aegis/' . strtolower( $set ) . '/' . strtolower( $name );
	}

	/**
	 * Export mapping rules for the block editor (JSON-friendly).
	 *
	 * @return array<string, mixed>
	 */
	public static function get_rules_for_editor(): array {
		return [
			'coreManifestSlugs' => array_keys( self::get_core_slugs() ),
		];
	}

	/**
	 * @return array<string, true>
	 */
	private static function get_core_slugs(): array {
		if ( self::$core_slugs !== null ) {
			return self::$core_slugs;
		}

		self::$core_slugs = [];

		$manifest = ABSPATH . 'wp-includes/assets/icon-library-manifest.php';

		if ( is_readable( $manifest ) ) {
			/** @var array<string, array<string, mixed>> $collection */
			$collection = include $manifest;

			foreach ( array_keys( $collection ) as $slug ) {
				self::$core_slugs[ $slug ] = true;
			}
		}

		return self::$core_slugs;
	}

	private static function core_slug_exists( string $slug ): bool {
		$slugs = self::get_core_slugs();

		return isset( $slugs[ $slug ] );
	}

	/**
	 * Migrates block comments in post content or pattern source.
	 */
	public static function migrate_block_comments( string $content ): string {
		$search  = '<!-- wp:image ';
		$offset  = 0;
		$length  = strlen( $search );

		while ( ( $pos = strpos( $content, $search, $offset ) ) !== false ) {
			$json_start = strpos( $content, '{', $pos + $length );

			if ( $json_start === false ) {
				break;
			}

			$depth   = 0;
			$in_str  = false;
			$escape  = false;
			$end     = $json_start;
			$max     = strlen( $content );

			for ( $i = $json_start; $i < $max; $i++ ) {
				$char = $content[ $i ];

				if ( $in_str ) {
					if ( $escape ) {
						$escape = false;
					} elseif ( $char === '\\' ) {
						$escape = true;
					} elseif ( $char === '"' ) {
						$in_str = false;
					}
					continue;
				}

				if ( $char === '"' ) {
					$in_str = true;
					continue;
				}

				if ( $char === '{' ) {
					++$depth;
				} elseif ( $char === '}' ) {
					--$depth;
					if ( $depth === 0 ) {
						$end = $i;
						break;
					}
				}
			}

			$json = substr( $content, $json_start, $end - $json_start + 1 );
			$attrs = json_decode( $json, true );

			if ( is_array( $attrs ) && self::is_legacy_image_icon( $attrs ) ) {
				$mapped  = self::map_image_icon_to_core_icon( $attrs );
				$encoded = wp_json_encode( $mapped, JSON_UNESCAPED_SLASHES ) ?: '{}';
				$open    = '<!-- wp:icon ' . $encoded . ' /-->';
				$tag_end = $end + 1;
				$tail    = substr( $content, $tag_end );

				if ( preg_match( '/^\s*\/-->/', $tail, $self_closing_match ) === 1 ) {
					$tag_end += strlen( $self_closing_match[0] );
				} else {
					$suffix = substr( $content, $tag_end, 4 );

					if ( $suffix === ' -->' ) {
						$tag_end += 4;
					}
				}

				$content = substr_replace( $content, $open, $pos, $tag_end - $pos );
				$offset  = $pos + strlen( $open );

				// Remove legacy static <figure class="wp-block-image is-style-icon"> markup.
				if ( preg_match( '/\s*<figure[^>]*is-style-icon[^>]*>.*?<\/figure>\s*/s', $content, $figure_match, 0, $offset ) ) {
					$match_pos = $figure_match[0][1] ?? -1;
					if ( $match_pos >= $offset && $match_pos < $offset + 5000 ) {
						$content = substr_replace( $content, "\n", $match_pos, strlen( $figure_match[0][0] ) );
					}
				}

				$close_pos = strpos( $content, '<!-- /wp:image -->', $offset );
				if ( $close_pos !== false && $close_pos < $offset + 5000 ) {
					$content = substr_replace( $content, '', $close_pos, strlen( '<!-- /wp:image -->' ) );
				}

				continue;
			}

			$offset = $end + 1;
		}

		return $content;
	}

	private static function strip_icon_variation_classes( string $class_name ): string {
		$parts = array_filter(
			explode( ' ', $class_name ),
			static fn( string $class ): bool => ! in_array(
				$class,
				[ 'is-style-icon', 'all-icons' ],
				true
			)
		);

		return implode( ' ', $parts );
	}
}
