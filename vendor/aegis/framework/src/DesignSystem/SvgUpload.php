<?php
/**
 * SVG Upload Component
 *
 * Provides secure SVG file upload support for WordPress in the Aegis Framework.
 *
 * Responsibilities:
 * - Enables SVG file uploads in the WordPress media library
 * - Sanitizes SVG files to prevent XSS, XXE, and SSRF attacks
 * - Removes dangerous elements, attributes, and external references
 * - Restricts SVG uploads to users with upload_files capability
 *
 * @package    Aegis\Framework\DesignSystem
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 */

// Enforces strict type checking for all code in this file, ensuring type safety for design system components.
declare(strict_types=1);

// Declares the namespace for design system components within the Aegis Framework.
namespace Aegis\Framework\DesignSystem;

// Imports DOM classes and WordPress functions for capability checks and file handling.
use DOMDocument;
use DOMElement;
use DOMXPath;
use function __;
use function add_filter;
use function current_user_can;
use function esc_attr;
use function explode;
use function file_exists;
use function file_get_contents;
use function file_put_contents;
use function gzdecode;
use function gzencode;
use function in_array;
use function libxml_clear_errors;
use function libxml_disable_entity_loader;
use function libxml_use_internal_errors;
use function pathinfo;
use function preg_match;
use function preg_replace;
use function str_contains;
use function str_starts_with;
use function strtolower;
use function trim;

// Implements the SvgUpload class to support secure SVG file uploads.

class SvgUpload
{

	/**
	 * Allowed SVG elements.
	 *
	 * @var array
	 */
	private const ALLOWED_ELEMENTS = [
		'svg',
		'g',
		'path',
		'rect',
		'circle',
		'ellipse',
		'line',
		'polyline',
		'polygon',
		'text',
		'tspan',
		'textpath',
		'defs',
		'symbol',
		'use',
		'image',
		'clippath',
		'mask',
		'pattern',
		'lineargradient',
		'radialgradient',
		'stop',
		'filter',
		'fegaussianblur',
		'feoffset',
		'feblend',
		'fecolormatrix',
		'fecomponenttransfer',
		'fecomposite',
		'feconvolvematrix',
		'fediffuselighting',
		'fedisplacementmap',
		'feflood',
		'feimage',
		'femerge',
		'femergenode',
		'femorphology',
		'fepointlight',
		'fespecularlighting',
		'fespotlight',
		'fetile',
		'feturbulence',
		'title',
		'desc',
		'metadata',
		'switch',
		'foreignobject',
		'a',
		'marker',
		'view',
	];

	/**
	 * Allowed SVG attributes.
	 *
	 * @var array
	 */
	private const ALLOWED_ATTRIBUTES = [
		// Core attributes.
		'id',
		'class',
		'style',
		'lang',
		'tabindex',

		// Presentation attributes.
		'fill',
		'fill-opacity',
		'fill-rule',
		'stroke',
		'stroke-dasharray',
		'stroke-dashoffset',
		'stroke-linecap',
		'stroke-linejoin',
		'stroke-miterlimit',
		'stroke-opacity',
		'stroke-width',
		'color',
		'opacity',
		'visibility',
		'display',
		'overflow',
		'clip',
		'clip-path',
		'clip-rule',
		'mask',
		'filter',
		'flood-color',
		'flood-opacity',
		'lighting-color',
		'stop-color',
		'stop-opacity',
		'marker',
		'marker-start',
		'marker-mid',
		'marker-end',
		'color-interpolation',
		'color-interpolation-filters',

		// Geometry attributes.
		'x',
		'y',
		'x1',
		'y1',
		'x2',
		'y2',
		'cx',
		'cy',
		'r',
		'rx',
		'ry',
		'width',
		'height',
		'd',
		'points',
		'pathlength',

		// Transform attributes.
		'transform',
		'transform-origin',

		// Viewbox and coordinate attributes.
		'viewbox',
		'preserveaspectratio',
		'xmlns',
		'xmlns:xlink',
		'version',

		// Text attributes.
		'font-family',
		'font-size',
		'font-style',
		'font-variant',
		'font-weight',
		'font-stretch',
		'text-anchor',
		'text-decoration',
		'dominant-baseline',
		'alignment-baseline',
		'baseline-shift',
		'letter-spacing',
		'word-spacing',
		'writing-mode',
		'direction',
		'dx',
		'dy',
		'rotate',
		'textlength',
		'lengthadjust',

		// Gradient and pattern attributes.
		'gradientunits',
		'gradienttransform',
		'spreadmethod',
		'fx',
		'fy',
		'offset',
		'patternunits',
		'patterncontentunits',
		'patterntransform',

		// Filter attributes.
		'filterunits',
		'primitiveunits',
		'in',
		'in2',
		'result',
		'stddeviation',
		'mode',
		'type',
		'values',
		'k1',
		'k2',
		'k3',
		'k4',
		'operator',
		'scale',
		'xchannelselector',
		'ychannelselector',
		'basefrequency',
		'numoctaves',
		'seed',
		'stitchtiles',
		'surfacescale',
		'specularconstant',
		'specularexponent',
		'diffuseconstant',
		'kernelmatrix',
		'divisor',
		'bias',
		'targetx',
		'targety',
		'edgemode',
		'kernelunitlength',
		'preservealpha',
		'radius',

		// Clip and mask attributes.
		'clippathunits',
		'maskunits',
		'maskcontentunits',

		// Reference attributes (sanitized separately).
		'href',
		'xlink:href',

		// Marker attributes.
		'markerunits',
		'markerwidth',
		'markerheight',
		'orient',
		'refx',
		'refy',

		// Symbol and use attributes.
		'symbol',

		// Aria attributes for accessibility.
		'role',
		'aria-label',
		'aria-labelledby',
		'aria-describedby',
		'aria-hidden',
		'focusable',
	];

	/**
	 * Dangerous elements to remove.
	 *
	 * @var array
	 */
	private const DANGEROUS_ELEMENTS = [
		'script',
		'handler',
		'set',
		'animate',
		'animatemotion',
		'animatetransform',
		'animatecolor',
		'listener',
	];

	/**
	 * Register hooks.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function hooks(): void
	{
		add_filter('upload_mimes', [$this, 'allow_svg_upload']);
		add_filter('wp_check_filetype_and_ext', [$this, 'check_filetype'], 10, 5);
		add_filter('wp_handle_upload_prefilter', [$this, 'sanitize_svg']);
	}

	/**
	 * Allow SVG uploads for users with upload capability.
	 *
	 * @since 1.0.0
	 *
	 * @hook  upload_mimes
	 *
	 * @param array $mimes Allowed mime types.
	 *
	 * @return array
	 */
	public function allow_svg_upload(array $mimes): array
	{
		if (current_user_can('upload_files')) {
			$mimes['svg'] = 'image/svg+xml';
			$mimes['svgz'] = 'image/svg+xml';
		}

		return $mimes;
	}

	/**
	 * Fix file type detection for SVG files.
	 *
	 * WordPress may fail to detect SVG mime type correctly.
	 *
	 * @since 1.0.0
	 *
	 * @hook  wp_check_filetype_and_ext
	 *
	 * @param array       $data     File data.
	 * @param string      $file     Full path to the file.
	 * @param string      $filename The name of the file.
	 * @param array|null  $mimes    Allowed mime types.
	 * @param string|bool $real_mime The real mime type.
	 *
	 * @return array
	 */
	public function check_filetype(array $data, string $file, string $filename, ?array $mimes, $real_mime): array
	{
		if (!current_user_can('upload_files')) {
			return $data;
		}

		$ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

		if ('svg' === $ext || 'svgz' === $ext) {
			$data['ext'] = $ext;
			$data['type'] = 'image/svg+xml';
		}

		return $data;
	}

	/**
	 * Sanitize SVG file before upload.
	 *
	 * @since 1.0.0
	 *
	 * @hook  wp_handle_upload_prefilter
	 *
	 * @param array $file File data from $_FILES.
	 *
	 * @return array
	 */
	public function sanitize_svg(array $file): array
	{
		if (!isset($file['type'])) {
			return $file;
		}

		if ('image/svg+xml' !== $file['type']) {
			$ext = strtolower(pathinfo($file['name'] ?? '', PATHINFO_EXTENSION));

			if ('svg' !== $ext && 'svgz' !== $ext) {
				return $file;
			}
		}

		if (!current_user_can('upload_files')) {
			$file['error'] = __('You do not have permission to upload SVG files.', 'aegis');
			return $file;
		}

		$tmp_file = $file['tmp_name'] ?? '';

		if (!$tmp_file || !file_exists($tmp_file)) {
			return $file;
		}

		$svg_content = file_get_contents($tmp_file);

		if (false === $svg_content) {
			$file['error'] = __('Could not read SVG file.', 'aegis');
			return $file;
		}

		// Handle gzipped SVGs.
		if (str_contains($file['name'] ?? '', '.svgz')) {
			$svg_content = gzdecode($svg_content);

			if (false === $svg_content) {
				$file['error'] = __('Could not decompress SVGZ file.', 'aegis');
				return $file;
			}
		}

		$sanitized = $this->sanitize($svg_content);

		if (false === $sanitized) {
			$file['error'] = __('SVG file failed security validation.', 'aegis');
			return $file;
		}

		// Handle gzipped SVGs on save.
		if (str_contains($file['name'] ?? '', '.svgz')) {
			$sanitized = gzencode($sanitized);
		}

		file_put_contents($tmp_file, $sanitized);

		return $file;
	}

	/**
	 * Sanitize SVG content.
	 *
	 * @since 1.0.0
	 *
	 * @param string $svg_content Raw SVG content.
	 *
	 * @return string|false Sanitized SVG or false on failure.
	 */
	public function sanitize(string $svg_content)
	{
		// Remove PHP tags.
		$svg_content = preg_replace('/<\?php.*?\?>/si', '', $svg_content);
		$svg_content = preg_replace('/<\?.*?\?>/s', '', $svg_content);

		// Remove DOCTYPE to prevent XXE attacks.
		$svg_content = preg_replace('/<!DOCTYPE[^>]*>/i', '', $svg_content);

		// Remove ENTITY declarations.
		$svg_content = preg_replace('/<!ENTITY[^>]*>/i', '', $svg_content);

		// Remove CDATA sections that might contain scripts.
		$svg_content = preg_replace('/<!\[CDATA\[.*?\]\]>/s', '', $svg_content);

		// Remove comments.
		$svg_content = preg_replace('/<!--.*?-->/s', '', $svg_content);

		// Disable external entity loading.
		if (\PHP_VERSION_ID < 80000) {
			// phpcs:ignore Generic.PHP.DeprecatedFunctions.Deprecated
			libxml_disable_entity_loader(true);
		}

		libxml_use_internal_errors(true);

		$dom = new DOMDocument();
		$dom->formatOutput = false;
		$dom->preserveWhiteSpace = true;
		$dom->strictErrorChecking = false;

		// Load SVG with security flags.
		$loaded = $dom->loadXML(
			$svg_content,
			LIBXML_NONET | LIBXML_NOENT | LIBXML_NOCDATA
		);

		if (!$loaded) {
			libxml_clear_errors();
			return false;
		}

		$xpath = new DOMXPath($dom);

		// Remove dangerous elements.
		foreach (self::DANGEROUS_ELEMENTS as $tag) {
			$nodes = $xpath->query('//' . $tag);

			if ($nodes) {
				foreach ($nodes as $node) {
					$node->parentNode->removeChild($node);
				}
			}
		}

		// Process all elements.
		$all_elements = $dom->getElementsByTagName('*');
		$to_remove = [];

		foreach ($all_elements as $element) {
			if (!$element instanceof DOMElement) {
				continue;
			}

			$tag_name = strtolower($element->tagName);

			// Remove namespace prefix for comparison.
			if (str_contains($tag_name, ':')) {
				$tag_name = explode(':', $tag_name)[1];
			}

			// Remove disallowed elements.
			if (!in_array($tag_name, self::ALLOWED_ELEMENTS, true)) {
				$to_remove[] = $element;
				continue;
			}

			// Sanitize attributes.
			$this->sanitize_attributes($element);
		}

		// Remove collected elements.
		foreach ($to_remove as $element) {
			if ($element->parentNode) {
				$element->parentNode->removeChild($element);
			}
		}

		libxml_clear_errors();

		$svg = $dom->saveXML($dom->documentElement);

		if (!$svg) {
			return false;
		}

		return $svg;
	}

	/**
	 * Sanitize element attributes.
	 *
	 * @since 1.0.0
	 *
	 * @param DOMElement $element The element to sanitize.
	 *
	 * @return void
	 */
	private function sanitize_attributes(DOMElement $element): void
	{
		$attributes_to_remove = [];

		foreach ($element->attributes as $attr) {
			$attr_name = strtolower($attr->name);
			$attr_value = $attr->value;

			// Remove event handlers (onclick, onload, onerror, etc.).
			if (str_starts_with($attr_name, 'on')) {
				$attributes_to_remove[] = $attr->name;
				continue;
			}

			// Remove disallowed attributes.
			if (!in_array($attr_name, self::ALLOWED_ATTRIBUTES, true)) {
				// Allow data-* attributes.
				if (!str_starts_with($attr_name, 'data-')) {
					$attributes_to_remove[] = $attr->name;
					continue;
				}
			}

			// Sanitize href and xlink:href attributes.
			if ('href' === $attr_name || 'xlink:href' === $attr_name) {
				$sanitized_value = $this->sanitize_href($attr_value);

				if (false === $sanitized_value) {
					$attributes_to_remove[] = $attr->name;
				} else {
					$element->setAttribute($attr->name, $sanitized_value);
				}

				continue;
			}

			// Check for javascript: or data: URLs in any attribute.
			if ($this->contains_dangerous_url($attr_value)) {
				$attributes_to_remove[] = $attr->name;
				continue;
			}

			// Check for CSS expressions in style attribute.
			if ('style' === $attr_name && $this->contains_dangerous_css($attr_value)) {
				$attributes_to_remove[] = $attr->name;
			}
		}

		foreach ($attributes_to_remove as $attr_name) {
			$element->removeAttribute($attr_name);
		}
	}

	/**
	 * Sanitize href attribute value.
	 *
	 * @since 1.0.0
	 *
	 * @param string $href The href value.
	 *
	 * @return string|false Sanitized href or false if dangerous.
	 */
	private function sanitize_href(string $href): string|false
	{
		$href = trim($href);

		// Allow internal references (starts with #).
		if (str_starts_with($href, '#')) {
			return esc_attr($href);
		}

		// Allow relative URLs to images.
		if (
			preg_match('/\.(png|jpg|jpeg|gif|webp|svg)$/i', $href) &&
			!str_contains($href, ':')
		) {
			return esc_attr($href);
		}

		// Allow https URLs to images.
		if (
			str_starts_with($href, 'https://') &&
			preg_match('/\.(png|jpg|jpeg|gif|webp|svg)$/i', $href)
		) {
			return esc_attr($href);
		}

		// Block everything else (javascript:, data:, http:, etc.).
		return false;
	}

	/**
	 * Check if value contains dangerous URL schemes.
	 *
	 * @since 1.0.0
	 *
	 * @param string $value The value to check.
	 *
	 * @return bool
	 */
	private function contains_dangerous_url(string $value): bool
	{
		$value = strtolower(preg_replace('/\s+/', '', $value));

		$dangerous_schemes = [
			'javascript:',
			'data:',
			'vbscript:',
			'file:',
			'blob:',
		];

		foreach ($dangerous_schemes as $scheme) {
			if (str_contains($value, $scheme)) {
				return true;
			}
		}

		return false;
	}

	/**
	 * Check if CSS contains dangerous expressions.
	 *
	 * @since 1.0.0
	 *
	 * @param string $css The CSS value to check.
	 *
	 * @return bool
	 */
	private function contains_dangerous_css(string $css): bool
	{
		$css = strtolower(preg_replace('/\s+/', '', $css));

		$dangerous_patterns = [
			'expression(',
			'javascript:',
			'vbscript:',
			'behavior:',
			'-moz-binding:',
			'url(data:',
			'url(javascript:',
		];

		foreach ($dangerous_patterns as $pattern) {
			if (str_contains($css, $pattern)) {
				return true;
			}
		}

		return false;
	}
}
