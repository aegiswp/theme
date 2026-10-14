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
use function defined;
use function explode;
use function file_get_contents;
use function implode;
use function in_array;
use function is_array;
use function is_dir;
use function is_readable;
use function is_string;
use function json_decode;
use function preg_match;
use function preg_replace_callback;
use function str_contains;
use function str_ends_with;
use function strlen;
use function strpos;
use function strtolower;
use function strip_tags;
use function stripslashes;
use function substr;
use function substr_replace;
use function trim;
use function usort;

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
		[ $set, $name ] = self::resolve_set_and_name( $attrs );
		$icon           = $name !== '' ? self::resolve_icon_id( $set, $name ) : '';

		$mapped = [];

		if ( $icon !== '' ) {
			$mapped['icon'] = $icon;
		}

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

		if ( ! empty( $attrs['iconSvgString'] ) ) {
			$mapped['iconSvgString'] = (string) $attrs['iconSvgString'];
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
		return Icon::to_registry_id( $set, $name );
	}

	/**
	 * Rewrites `wordpress/{core-slug}` ids to `core/{slug}` so WP 7.1 can resolve them.
	 */
	public static function normalize_icon_ids_in_content( string $content ): string {
		if ( ! str_contains( $content, '"icon":"wordpress/' ) && ! str_contains( $content, '"icon": "wordpress/' ) ) {
			return $content;
		}

		$updated = preg_replace_callback(
			'/"icon"\s*:\s*"wordpress\/([a-z0-9_-]*)"/',
			static function ( array $matches ): string {
				$name = $matches[1];

				if ( $name === '' ) {
					return $matches[0];
				}

				return '"icon":"' . Icon::to_registry_id( 'wordpress', $name ) . '"';
			},
			$content
		);

		return is_string( $updated ) ? $updated : $content;
	}

	/**
	 * Restores truncated `wordpress/` icon ids using the following heading label.
	 *
	 * @param array<string, array{icon: string, width?: string}> $heading_map Lowercased heading => icon data.
	 */
	public static function restore_empty_icon_ids( string $content, array $heading_map ): string {
		$search = '<!-- wp:icon {"icon":"wordpress/"} /-->';

		if ( ! str_contains( $content, $search ) || $heading_map === [] ) {
			return $content;
		}

		$offset = 0;

		while ( ( $pos = strpos( $content, $search, $offset ) ) !== false ) {
			$after   = substr( $content, $pos + strlen( $search ), 2000 );
			$label   = self::extract_following_label( $after );
			$key     = strtolower( $label );
			$icon_id = $heading_map[ $key ]['icon'] ?? '';
			$width   = $heading_map[ $key ]['width'] ?? '';

			if ( $icon_id === '' || str_ends_with( $icon_id, '/' ) ) {
				$offset = $pos + strlen( $search );
				continue;
			}

			$attrs = [ 'icon' => $icon_id ];

			if ( $width !== '' ) {
				$attrs['style'] = [ 'dimensions' => [ 'width' => $width ] ];
			}

			$encoded = wp_json_encode( $attrs, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) ?: '{"icon":"' . $icon_id . '"}';
			$open    = '<!-- wp:icon ' . $encoded . ' /-->';
			$content = substr_replace( $content, $open, $pos, strlen( $search ) );
			$offset  = $pos + strlen( $open );
		}

		return $content;
	}

	/**
	 * Builds heading-label => icon id map from pattern PHP sources.
	 *
	 * @return array<string, array{icon: string, width?: string}>
	 */
	public static function heading_icon_map_from_patterns( string $patterns_dir ): array {
		$map = [];

		if ( ! is_dir( $patterns_dir ) ) {
			return $map;
		}

		$iterator = new \RecursiveIteratorIterator(
			new \RecursiveDirectoryIterator( $patterns_dir, \FilesystemIterator::SKIP_DOTS )
		);

		foreach ( $iterator as $file ) {
			if ( ! $file instanceof \SplFileInfo || strtolower( $file->getExtension() ) !== 'php' ) {
				continue;
			}

			$source = (string) file_get_contents( $file->getPathname() );
			$search = '<!-- wp:icon ';
			$offset = 0;

			while ( ( $pos = strpos( $source, $search, $offset ) ) !== false ) {
				$json_start = strpos( $source, '{', $pos + strlen( $search ) );

				if ( $json_start === false ) {
					break;
				}

				$end = self::find_json_object_end( $source, $json_start );

				if ( $end === null ) {
					break;
				}

				$attrs = json_decode( substr( $source, $json_start, $end - $json_start + 1 ), true );
				$icon  = is_array( $attrs ) ? (string) ( $attrs['icon'] ?? '' ) : '';
				$width = is_array( $attrs ) ? (string) ( $attrs['style']['dimensions']['width'] ?? '' ) : '';

				$tag_end = $end + 1;
				$tail    = substr( $source, $tag_end );

				if ( preg_match( '/^\s*\/-->/', $tail, $self_closing ) === 1 ) {
					$tag_end += strlen( $self_closing[0] );
				} elseif ( preg_match( '/^\s*-->/', $tail, $open_match ) === 1 ) {
					$tag_end += strlen( $open_match[0] );
				}

				$label = self::extract_following_label( substr( $source, $tag_end, 2000 ) );
				$key   = strtolower( $label );

				if ( $icon !== '' && ! str_ends_with( $icon, '/' ) && $key !== '' && ! isset( $map[ $key ] ) ) {
					$entry = [ 'icon' => Icon::to_registry_id( ...self::split_icon_id( $icon ) ) ];

					if ( $width !== '' ) {
						$entry['width'] = $width;
					}

					$map[ $key ] = $entry;
				}

				$offset = $tag_end;
			}
		}

		return $map;
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

	public static function is_core_icon( string $slug ): bool {
		return self::core_slug_exists( strtolower( $slug ) );
	}

	/**
	 * @return array<string, true>
	 */
	private static function get_core_slugs(): array {
		if ( self::$core_slugs !== null ) {
			return self::$core_slugs;
		}

		self::$core_slugs = [];

		if ( ! defined( 'ABSPATH' ) || ! defined( 'WPINC' ) ) {
			return self::$core_slugs;
		}

		$manifest = ABSPATH . WPINC . '/assets/icon-library-manifest.php';

		if ( is_readable( $manifest ) ) {
			$collection = include $manifest;

			if ( is_array( $collection ) ) {
				foreach ( array_keys( $collection ) as $slug ) {
					self::$core_slugs[ (string) $slug ] = true;
				}
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
		$content = self::migrate_icon_attribute_ids( $content );

		$search  = '<!-- wp:image ';
		$offset  = 0;
		$length  = strlen( $search );

		while ( ( $pos = strpos( $content, $search, $offset ) ) !== false ) {
			$json_start = strpos( $content, '{', $pos + $length );

			if ( $json_start === false ) {
				break;
			}

			$end = self::find_json_object_end( $content, $json_start );

			if ( $end === null ) {
				break;
			}

			$json  = substr( $content, $json_start, $end - $json_start + 1 );
			$attrs = json_decode( $json, true );

			if ( is_array( $attrs ) && self::is_legacy_image_icon( $attrs ) ) {
				$mapped  = self::map_image_icon_to_core_icon( $attrs );
				$encoded = wp_json_encode( $mapped, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) ?: '{}';
				$open    = '<!-- wp:icon ' . $encoded . ' /-->';
				$tag_end = $end + 1;
				$tail    = substr( $content, $tag_end );

				if ( preg_match( '/^\s*\/-->/', $tail, $self_closing_match ) === 1 ) {
					$tag_end += strlen( $self_closing_match[0] );
				} elseif ( preg_match( '/^\s*-->/', $tail, $open_match ) === 1 ) {
					$tag_end += strlen( $open_match[0] );
					$close_pos = strpos( $content, '<!-- /wp:image -->', $tag_end );

					if ( $close_pos !== false ) {
						$tag_end = $close_pos + strlen( '<!-- /wp:image -->' );
					}
				}

				$content = substr_replace( $content, $open, $pos, $tag_end - $pos );
				$offset  = $pos + strlen( $open );

				continue;
			}

			$offset = $end + 1;
		}

		return self::normalize_icon_ids_in_content( $content );
	}

	/**
	 * Rewrites legacy `aegis/{set}/{name}` core/icon ids to library ids.
	 */
	private static function migrate_icon_attribute_ids( string $content ): string {
		if ( ! str_contains( $content, '"icon":"aegis/' ) && ! str_contains( $content, '"icon": "aegis/' ) ) {
			return $content;
		}

		$updated = preg_replace_callback(
			'/"icon"\s*:\s*"aegis\/([a-z0-9_-]+)\/([a-z0-9_-]+)"/',
			static function ( array $matches ): string {
				return '"icon":"' . Icon::to_registry_id( $matches[1], $matches[2] ) . '"';
			},
			$content
		);

		return is_string( $updated ) ? $updated : $content;
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

	/**
	 * @return array{0: string, 1: string}
	 */
	private static function resolve_set_and_name( array $attrs ): array {
		$set  = strtolower( trim( (string) ( $attrs['iconSet'] ?? '' ) ) );
		$name = strtolower( trim( (string) ( $attrs['iconName'] ?? '' ) ) );
		$svg  = (string) ( $attrs['iconSvgString'] ?? '' );

		if ( $svg !== '' && ( $set === '' || $name === '' ) ) {
			$inferred = self::infer_from_svg( $svg );

			if ( $inferred !== null ) {
				$set  = $set !== '' ? $set : $inferred['set'];
				$name = $name !== '' ? $name : $inferred['name'];
			}
		}

		if ( $set === '' ) {
			$set = 'wordpress';
		}

		return [ $set, $name ];
	}

	/**
	 * @return array{set: string, name: string}|null
	 */
	private static function infer_from_svg( string $svg ): ?array {
		if ( preg_match( '/data-icon=["\']([a-z0-9_-]+)["\']/i', $svg, $matches ) !== 1 ) {
			if ( preg_match( '/<title[^>]*>\s*([^<]+?)\s*(?:Icon)?\s*<\/title>/i', $svg, $title_match ) === 1 ) {
				$slug = strtolower( trim( (string) preg_replace( '/[^a-z0-9]+/i', '-', (string) $title_match[1] ), '-' ) );
				$slug = preg_replace( '/-icon$/', '', $slug ) ?? $slug;

				return $slug !== '' ? [ 'set' => 'wordpress', 'name' => $slug ] : null;
			}

			return null;
		}

		$data_icon = strtolower( $matches[1] );
		$sets      = array_keys( Icon::get_icon_sets() );

		usort(
			$sets,
			static fn( string $left, string $right ): int => strlen( (string) $right ) <=> strlen( (string) $left )
		);

		foreach ( $sets as $set ) {
			$set    = strtolower( (string) $set );
			$prefix = $set . '-';

			if ( $set !== '' && str_starts_with( $data_icon, $prefix ) ) {
				$name = substr( $data_icon, strlen( $prefix ) );

				if ( $name !== '' ) {
					return [ 'set' => $set, 'name' => $name ];
				}
			}
		}

		if ( str_contains( $data_icon, '-' ) ) {
			$parts = explode( '-', $data_icon, 2 );

			return [ 'set' => $parts[0], 'name' => $parts[1] ];
		}

		return [ 'set' => 'wordpress', 'name' => $data_icon ];
	}

	private static function extract_following_label( string $after ): string {
		$after = preg_replace( '/^\s*(?:<!-- wp:icon \{[^}]*\} \/?-->\s*)+/', '', $after ) ?? $after;

		if ( preg_match( "/esc_html__\(\s*'((?:\\\\'|[^'])*)'/", $after, $matches ) === 1 ) {
			return trim( stripslashes( $matches[1] ) );
		}

		if ( preg_match( '/<h[1-6][^>]*>(.*?)<\/h[1-6]>/is', $after, $matches ) === 1 ) {
			$label = self::plain_text( $matches[1] );

			if ( $label !== '' ) {
				return $label;
			}
		}

		if ( preg_match( '/<p[^>]*>(.*?)<\/p>/is', $after, $matches ) === 1 ) {
			return self::plain_text( $matches[1] );
		}

		return '';
	}

	private static function plain_text( string $html ): string {
		$text = html_entity_decode( strip_tags( $html ), ENT_QUOTES | ENT_HTML5, 'UTF-8' );

		return trim( preg_replace( '/\s+/', ' ', $text ) ?? $text );
	}

	/**
	 * @return array{0: string, 1: string}
	 */
	private static function split_icon_id( string $icon ): array {
		$parsed = Icon::from_registry_id( $icon );

		if ( $parsed === null ) {
			return [ 'wordpress', '' ];
		}

		return [ (string) $parsed['set'], (string) $parsed['name'] ];
	}

	private static function find_json_object_end( string $content, int $json_start ): ?int {
		$depth  = 0;
		$in_str = false;
		$escape = false;
		$max    = strlen( $content );

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
					return $i;
				}
			}
		}

		return null;
	}
}
