<?php
/**
 * Aegis Hook Utility
 *
 * Provides annotation-based hook registration for the Aegis Framework, enabling automatic binding of class methods to WordPress hooks.
 *
 * Responsibilities:
 * - Parses docblock annotations and registers methods as WordPress hooks
 * - Integrates with the Aegis Framework's onboarding and developer experience
 *
 * @package    Aegis\Hooks
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for hook utilities.
declare(strict_types=1);

// Declares the namespace for hook utilities within the Aegis Framework.
namespace Aegis\Hooks;

// Imports reflection and WordPress utility functions for annotation-based hook registration.
use ReflectionClass;
use ReflectionMethod;
use function add_filter;
use function explode;
use function preg_match_all;
use function str_replace;
use function trim;

// Implements the Aegis hook utility class for annotation-driven hook registration.

class Hook
{

	/**
	 * Hook methods based on annotation.
	 *
	 * @param object $object Object or class name.
	 *
	 * @return void
	 */
	public static function annotations(object $object): void
	{
		$reflection = new ReflectionClass($object);
		$public_methods = $reflection->getMethods(ReflectionMethod::IS_PUBLIC);

		foreach ($public_methods as $method) {

			// Do not hook constructors.
			if ($method->isConstructor()) {
				continue;
			}

			$annotations = self::get_annotations((string) $method->getDocComment());

			if (!$annotations) {
				continue;
			}

			foreach ($annotations as $annotation) {
				add_filter(
					$annotation['tag'],
					[$object, $method->name],
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
	private static function get_annotations(string $doc_block): ?array
	{
		$pattern = '/@hook\s+([^\s]+)(\s+[0-9]+)?/';

		preg_match_all($pattern, $doc_block, $matches);

		if (!isset($matches[0])) {
			return null;
		}

		$annotations = [];

		foreach ($matches[0] as $annotation) {
			$annotation = str_replace('@hook', '', $annotation);
			$parts = explode(' ', trim($annotation));
			$tag = trim($parts[0] ?? '');

			$annotations[] = [
				'tag' => $tag,
				'priority' => $parts[1] ?? 10,
			];
		}

		return $annotations;
	}
}
