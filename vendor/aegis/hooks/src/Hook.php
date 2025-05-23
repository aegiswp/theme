<?php
/**
 * Hook.php
 *
 * Utility class for registering and managing hooks via annotations in the Aegis WordPress theme.
 *
 * Based on Hook Annotations by Viktor Szépe.
 *
 * @package   Aegis\Hooks
 * @author    Atmostfear Entertainment
 * @copyright Copyright (c) 2025
 * @license   GPL-2.0-or-later
 * @link      https://github.com/aegiswp/theme
 * @since     1.0.0
 */

declare( strict_types=1 );

namespace Aegis\Hooks;

use ReflectionClass;
use ReflectionMethod;
use function add_filter;
use function explode;
use function preg_match_all;
use function str_replace;
use function trim;

/**
 * Hook class.
 */
class Hook {

	/**
	 * Hook methods based on annotation.
	 *
	 * @param object $object Object or class name.
	 *
	 * @return void
	 */
	public static function annotations( object $object ): void {
		$reflection     = new ReflectionClass( $object );
		$public_methods = $reflection->getMethods( ReflectionMethod::IS_PUBLIC );

		foreach ( $public_methods as $method ) {

			// Do not hook constructors.
			if ( $method->isConstructor() ) {
				continue;
			}

			$annotations = self::get_annotations( (string) $method->getDocComment() );

			if ( ! $annotations ) {
				continue;
			}

			foreach ( $annotations as $annotation ) {
				add_filter(
					$annotation['tag'],
					[ $object, $method->name ],
					$annotation['priority'],
					$method->getNumberOfParameters()
				);
			}
		}
	}

	/**
	 * Read hook tag from docblock.
	 *
	 * @param string $doc_block Method doc block.
	 *
	 * @return ?array
	 */
	private static function get_annotations( string $doc_block ): ?array {
		$pattern = '/@hook\s+([^\s]+)(\s+[0-9]+)?/';

		preg_match_all( $pattern, $doc_block, $matches );

		if ( ! isset( $matches[0] ) ) {
			return null;
		}

		$annotations = [];

		foreach ( $matches[0] as $annotation ) {
			$annotation = str_replace( '@hook', '', $annotation );
			$parts      = explode( ' ', trim( $annotation ) );
			$tag        = trim( $parts[0] ?? '' );

			$annotations[] = [
				'tag'      => $tag,
				'priority' => $parts[1] ?? 10,
			];
		}

		return $annotations;
	}

}
