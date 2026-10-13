<?php

// Enforces strict type checking for all code in this file, ensuring type safety for hook annotation dispatch.
declare( strict_types=1 );

// Declares the namespace for the hook annotation dispatch.
namespace Aegis\Hooks;

// Imports classes, interfaces, and functions used by the hook annotation dispatch.
use ReflectionClass;
use ReflectionException;
use ReflectionMethod;
use function add_filter;
use function explode;
use function is_string;
use function preg_match_all;
use function str_replace;
use function trim;

/**
 * Handles WordPress hooks automatically based on method annotations.
 *
 * This class scans a given object or class for public methods with `@hook`
 * annotations in their docblocks and registers them with the WordPress
 * filter and action system.
 *
 * Based on Hook Annotations by Viktor Szépe.
 *
 * @link https://github.com/szepeviktor/SentencePress
 */
class Hook {

	/**
	 * Registers methods as WordPress hooks based on their annotations.
	 *
	 * It uses reflection to find all public methods in the given class or object,
	 * parses their docblocks for `@hook` annotations, and attaches them to the
	 * corresponding WordPress filter or action.
	 *
	 * @param object|string $object_or_class The object or class to scan for hooks.
	 *
	 * @return void
	 */
	public static function annotations( $object_or_class ): void {
		try {
			$reflection = new ReflectionClass( $object_or_class );
		} catch ( ReflectionException $e ) {
			return;
		}

		$public_methods = $reflection->getMethods( ReflectionMethod::IS_PUBLIC );

		foreach ( $public_methods as $method ) {

			// Do not hook constructors.
			if ( $method->isConstructor() ) {
				continue;
			}

			// Do not hook non-static methods for non-object classes.
			if ( is_string( $object_or_class ) && $method->isStatic() ) {
				continue;
			}

			$annotations = self::get_annotations( (string) $method->getDocComment() );

			if ( ! $annotations ) {
				continue;
			}

			foreach ( $annotations as $annotation ) {
				add_filter(
					$annotation['tag'],
					[ $object_or_class, $method->name ],
					$annotation['priority'],
					$method->getNumberOfParameters()
				);
			}
		}
	}

	/**
	 * Parses a docblock to find all `@hook` annotations.
	 *
	 * This method uses a regular expression to extract the hook tag and priority
	 * from the docblock.
	 *
	 * @param string $doc_block The docblock to parse.
	 *
	 * @return array|null An array of found annotations or null if none exist.
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
