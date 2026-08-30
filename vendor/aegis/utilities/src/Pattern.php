<?php

// Enforces strict type checking for all code in this file, ensuring type safety for block pattern registration utilities.
declare( strict_types=1 );

// Declares the namespace for the block pattern registration utilities.
namespace Aegis\Utilities;

// Imports classes, interfaces, and functions used by the block pattern registration utilities.
use function _cleanup_header_comment;
use function explode;
use function get_file_data;
use function get_stylesheet;
use function get_stylesheet_directory;
use function get_template;
use function get_template_directory;
use function in_array;
use function is_readable;
use function ob_get_clean;
use function ob_start;
use function preg_match;
use function preg_quote;
use function register_block_pattern;
use function register_block_pattern_category;
use function str_contains;
use function str_replace;
use function strtoupper;
use function ucwords;
use function wp_get_global_settings;

/**
 * Utility class for registering and parsing WordPress block patterns from files.
 *
 * This class provides methods to read pattern data from a PHP file's header
 * comment and register it as a block pattern, including its categories.
 *
 * @since 1.0.0
 */
class Pattern {

	/**
	 * Parses and registers a block pattern from a PHP file.
	 *
	 * This method reads the pattern's metadata from the file's header comment,
	 * registers its categories, and then registers the block pattern itself.
	 *
	 * @since 1.0.0
	 *
	 * @param string $file The absolute path to the pattern's PHP file.
	 *
	 * @return void
	 */
	public static function register_from_file( string $file ): void {
		$pattern = self::parse_file( $file );

		if ( ! isset( $pattern['slug'] ) ) {
			return;
		}

		$categories = $pattern['categories'] ?? [];

		foreach ( $categories as $category ) {
			$category = trim( (string) $category );

			if ( ctype_digit( $category ) ) {
				$category = 'error-' . $category;
			}

			if ( in_array( $category, [ 'cta', 'faq' ], true ) ) {
				$label = strtoupper( $category );
			} else {
				$label = ucwords( str_replace( '-', ' ', $category ) );
			}

			register_block_pattern_category(
				$category,
				[
					'label' => $label,
				]
			);
		}

		register_block_pattern( $pattern['slug'], $pattern );
	}

	/**
	 * Parses a file for block pattern metadata and content.
	 *
	 * This method reads a PHP file's header for pattern details (Title, Slug,
	 * Categories, etc.) and uses the file's output as the pattern content.
	 * It can also parse the metadata from a string containing the file's content.
	 *
	 * @since 1.0.0
	 *
	 * @param string $file The file path or a string containing the file's content.
	 *
	 * @return array An array of parsed pattern data or an empty array on failure.
	 */
	public static function parse_file( string $file ): array {
		if ( ! $file ) {
			return [];
		}

		$content         = '';
		$default_headers = [
			'categories'  => 'Categories',
			'title'       => 'Title',
			'slug'        => 'Slug',
			'block_types' => 'Block Types',
			'inserter'    => 'Inserter',
			'ID'          => 'ID',
			'theme'       => 'Theme',
		];

		if ( is_readable( $file ) ) {
			$headers = get_file_data( $file, $default_headers );

			ob_start();
			$global_settings = wp_get_global_settings();

			include $file;
			$content = ob_get_clean();

		} else {
			if ( str_contains( $file, 'Title: ' ) ) {
				$content = $file;
				$headers = $default_headers;

				// Use regex from get_file_data().
				foreach ( $headers as $field => $regex ) {
					if ( preg_match( '/^(?:[ \t]*<\?php)?[ \t\/*#@]*' . preg_quote( $regex, '/' ) . ':(.*)$/mi', $file, $match ) && $match[1] ) {
						$headers[ $field ] = _cleanup_header_comment( $match[1] );
					} else {
						$headers[ $field ] = '';
					}
				}
			}
		}

		if ( ! isset( $headers['title'], $headers['slug'], $headers['categories'] ) ) {
			return [];
		}

		$categories = explode( ',', $headers['categories'] );

		$theme = $headers['theme'] ?? null;

		if ( ! $theme ) {
			$stylesheet_dir = get_stylesheet_directory();
			$template_dir   = get_template_directory();

			if ( $stylesheet_dir === $template_dir ) {
				$theme = get_template();
			} else {
				if ( str_contains( $file, $stylesheet_dir ) ) {
					$theme = get_stylesheet();
				} else {
					if ( str_contains( $file, $template_dir ) ) {
						$theme = get_template();
					}
				}
			}
		}

		$slug = ( $categories[0] ?? 'common' ) . '-' . $headers['slug'];

		$content = Str::replace_first(
			Str::between( '<?php', '?>', $content ),
			'',
			$content
		);

		$pattern = [
			'slug'        => $slug,
			'title'       => $headers['title'],
			'content'     => $content,
			'categories'  => [ ...$categories ],
			'description' => $headers['description'] ?? '',
			'blockTypes'  => explode( ',', $headers['block_types'] ?? [] ),
			'ID'          => $headers['ID'] ?? null,
			'theme'       => $theme,
		];

		if ( ( $headers['inserter'] ?? null ) === 'false' ) {
			$pattern['inserter'] = false;
		}

		return $pattern;
	}

}
