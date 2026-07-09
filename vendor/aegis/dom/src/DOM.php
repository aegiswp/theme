<?php

// Enforces strict type checking for all code in this file, ensuring type safety for dom utility helpers.
declare( strict_types=1 );

// Declares the namespace for the dom utility helpers.
namespace Aegis\Dom;

// Imports classes, interfaces, and functions used by the dom utility helpers.
use DOMDocument;
use DOMElement;
use DOMXPath;
use Exception;
use WP_Error;
use function addslashes;
use function bin2hex;
use function current;
use function iconv;
use function is_a;
use function is_null;
use function libxml_clear_errors;
use function libxml_use_internal_errors;
use function ltrim;
use function preg_replace_callback;
use function sprintf;
use function strtoupper;
use const LIBXML_HTML_NODEFDTD;
use const LIBXML_HTML_NOIMPLIED;
use const XML_ELEMENT_NODE;

/**
 * DOM utility class for working with DOMDocument objects.
 *
 * Provides a set of static methods for creating, manipulating, and querying
 * DOM structures from HTML strings.
 *
 * @since 1.0.0
 */
class DOM {

	/**
	 * Creates a DOMDocument object from an HTML string.
	 *
	 * This method configures the DOMDocument for proper HTML parsing,
	 * handling potential errors and unicode characters gracefully.
	 *
	 * @since 1.0.0
	 *
	 * @param string $html HTML string to convert to a DOM object.
	 *
	 * @return DOMDocument The created DOMDocument object.
	 */
	public static function create( string $html ): DOMDocument {
		$dom = new DOMDocument();

		if ( ! $html ) {
			return $dom;
		}

		$dom->preserveWhiteSpace = false;
		$dom->formatOutput       = true;

		// Setting libxml options with bitwise operator.
		$options = 0;
		$options |= defined( 'LIBXML_HTML_NOIMPLIED' ) ? LIBXML_HTML_NOIMPLIED : 0;
		$options |= defined( 'LIBXML_HTML_NODEFDTD' ) ? LIBXML_HTML_NODEFDTD : 0;

		// Encode non-ASCII UTF-8 as numeric HTML entities before loadHTML().
		// libxml's HTML parser can mishandle raw multibyte characters; most
		// callers pass block output or user content that may include i18n text,
		// emoji, or SVG labels. ASCII-only input is unchanged by this step.
		$html = static::convert_unicode_to_html_entities( $html );

		// Suppress libxml warnings while parsing partial or invalid HTML fragments.
		libxml_use_internal_errors( true );

		$dom->loadHTML( $html, $options );

		// Discard parse warnings and restore libxml's default error handling.
		libxml_clear_errors();
		libxml_use_internal_errors( false );

		return $dom;
	}

	/**
	 * Retrieves a DOMElement by tag name from a DOMDocument or DOMElement.
	 *
	 * @since 1.0.0
	 *
	 * @param string           $tag            HTML tag name to search for.
	 * @param DOMDocument|DOMElement $dom_or_element The DOM context to search within.
	 * @param int              $index          The index of the element to retrieve.
	 *
	 * @return DOMElement|null The found DOMElement or null if not found.
	 */
	public static function get_element( string $tag, $dom_or_element, int $index = 0 ): ?DOMElement {
		if ( ! is_a( $dom_or_element, DOMDocument::class ) && ! is_a( $dom_or_element, DOMElement::class ) ) {
			return null;
		}

		$element = $dom_or_element->getElementsByTagName( $tag )->item( $index );

		if ( ! $element ) {
			return null;
		}

		return self::node_to_element( $element );
	}

	/**
	 * Casts a DOMNode to a DOMElement if it is an element node.
	 *
	 * @since 1.0.0
	 *
	 * @param mixed $node The DOMNode to cast.
	 *
	 * @return DOMElement|null The DOMElement or null if the node is not an element.
	 */
	public static function node_to_element( $node ): ?DOMElement {
		if ( $node && $node->nodeType === XML_ELEMENT_NODE ) {
			/* @var DOMElement $node DOM Element node */
			return $node;
		}

		return null;
	}

	/**
	 * Replaces the tag of a DOMElement while preserving its attributes and children.
	 *
	 * @since 1.0.0
	 *
	 * @param string     $name    The new tag name.
	 * @param DOMElement $element The DOMElement to modify.
	 *
	 * @return DOMElement|null The new DOMElement with the updated tag name.
	 */
	public static function change_tag_name( string $name, DOMElement $element ): ?DOMElement {
		if ( ! $element->ownerDocument ) {
			return null;
		}

		$child_nodes = [];

		foreach ( $element->childNodes as $child ) {
			$child_nodes[] = $child;
		}

		$new_element = $element->ownerDocument->createElement( $name );

		foreach ( $child_nodes as $child ) {
			$child2 = $element->ownerDocument->importNode( $child, true );
			$new_element->appendChild( $child2 );
		}

		foreach ( $element->attributes as $attr_node ) {
			$attr_name  = $attr_node->nodeName;
			$attr_value = $attr_node->nodeValue;

			$new_element->setAttribute( $attr_name, $attr_value );
		}

		if ( $element->parentNode ) {
			$element->parentNode->replaceChild( $new_element, $element );
		}

		return $new_element;
	}

	/**
	 * Finds all DOMElements with a specific class name.
	 *
	 * @since 1.0.0
	 *
	 * @param string      $class_name The class name to search for.
	 * @param DOMDocument $dom        The DOMDocument to search within.
	 * @param string      $tag        Optional. The tag name to limit the search to.
	 *
	 * @return DOMElement[] An array of found DOMElements.
	 */
	public static function get_elements_by_class_name( string $class_name, DOMDocument $dom, string $tag = '*' ): array {
		$xpath    = new DOMXPath( $dom );
		$query    = sprintf( "//%s[contains(concat(' ', normalize-space(@class), ' '), ' %s ')]", $tag, $class_name );
		$nodes    = $xpath->query( $query );
		$elements = [];

		if ( $nodes !== false ) {
			foreach ( $nodes as $node ) {
				if ( $node instanceof DOMElement ) {
					$elements[] = $node;
				}
			}
		}

		return $elements;
	}

	/**
	 * Safely creates a new DOMElement, handling potential exceptions.
	 *
	 * @since 1.0.0
	 *
	 * @param string      $tag The HTML tag for the new element.
	 * @param DOMDocument $dom The parent DOMDocument.
	 *
	 * @return DOMElement|null The new DOMElement or null on failure.
	 */
	public static function create_element( string $tag, DOMDocument $dom ): ?DOMElement {
		$element = null;

		try {
			$element = $dom->createElement( $tag );
		} catch ( Exception $e ) {
			new WP_Error( 'invalid_dom_tag', $e->getMessage() );
		}

		if ( is_null( $element ) ) {
			return null;
		}

		return self::node_to_element( $element );
	}

	/**
	 * Adds an array of CSS classes to a DOMElement.
	 *
	 * Merges the new classes with existing ones, ensuring no duplicates.
	 *
	 * @since 1.0.0
	 *
	 * @param DOMElement $element The DOMElement to modify.
	 * @param string[]   $classes An array of classes to add.
	 *
	 * @return void
	 */
	public static function add_classes( DOMElement $element, array $classes ): void {
		$element->setAttribute(
			'class',
			trim(
				implode(
					' ',
					array_unique(
						array_merge(
							self::get_classes( $element ),
							$classes
						)
					)
				)
			)
		);
	}

	/**
	 * Retrieves an array of CSS classes from a DOMElement.
	 *
	 * @since 1.0.0
	 *
	 * @param DOMElement $element The DOMElement to inspect.
	 *
	 * @return string[] An array of the element's classes.
	 */
	public static function get_classes( DOMElement $element ): array {
		$classes = explode( ' ', $element->getAttribute( 'class' ) );

		return array_filter( $classes );
	}

	/**
	 * Adds an array of inline CSS styles to a DOMElement.
	 *
	 * Merges the new styles with existing ones.
	 *
	 * @since 1.0.0
	 *
	 * @param DOMElement $element The DOMElement to modify.
	 * @param array      $styles  An associative array of styles to add.
	 *
	 * @return void
	 */
	public static function add_styles( DOMElement $element, array $styles ): void {
		$element->setAttribute(
			'style',
			CSS::array_to_string(
				array_merge(
					self::get_styles( $element ),
					$styles
				)
			)
		);
	}

	/**
	 * Retrieves an associative array of inline CSS styles from a DOMElement.
	 *
	 * @since 1.0.0
	 *
	 * @param DOMElement $element The DOMElement to inspect.
	 *
	 * @return array An associative array of the element's styles.
	 */
	public static function get_styles( DOMElement $element ): array {
		return CSS::string_to_array( $element->getAttribute( 'style' ) );
	}

	/**
	 * Finds all DOMElements that contain the specified text content.
	 *
	 * @since 1.0.0
	 *
	 * @param DOMDocument $dom  The DOMDocument to search within.
	 * @param string      $text The text content to search for.
	 * @param string      $tag  Optional. The tag name to limit the search to.
	 *
	 * @return DOMElement[] An array of found DOMElements.
	 */
	public static function get_elements_by_content( DOMDocument $dom, string $text, string $tag = '*' ): array {
		$xpath    = new DOMXPath( $dom );
		$query    = sprintf( "//%s[contains(., '%s')]", $tag, addslashes( $text ) );
		$nodes    = $xpath->query( $query );
		$elements = [];

		if ( ! $nodes ) {
			return $elements;
		}

		foreach ( $nodes as $node ) {
			if ( $node instanceof DOMElement ) {
				$elements[] = $node;
			}
		}

		return $elements;
	}

	/**
	 * Converts UTF-8 characters (U+0080–U+10FFFF) to numeric HTML entities.
	 *
	 * Used before loadHTML() because libxml does not consistently treat input
	 * as UTF-8. Applied for all create() calls; ASCII-only strings are unchanged.
	 *
	 * @since 1.0.0
	 *
	 * @param string $html The HTML string to process.
	 *
	 * @return string HTML with multibyte characters encoded as &#x...; entities.
	 */
	private static function convert_unicode_to_html_entities( string $html ): string {
		return preg_replace_callback(
			'/[\x{80}-\x{10FFFF}]/u',
			static fn( array $matches ): string => sprintf(
				'&#x%s;',
				ltrim(
					strtoupper(
						bin2hex(
							iconv(
								'UTF-8',
								'UCS-4',
								current( $matches )
							)
						)
					),
					'0'
				)
			),
			$html
		);
	}
}
