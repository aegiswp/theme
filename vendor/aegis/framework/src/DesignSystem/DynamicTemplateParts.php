<?php
/**
 * Dynamic Template Parts
 *
 * Swaps `core/template-part` slugs at render time via `render_block_data`
 * so one template can load context-specific headers, footers, or sidebars.
 *
 * @package Aegis\Framework\DesignSystem
 * @since   1.0.0
 */

declare( strict_types=1 );

namespace Aegis\Framework\DesignSystem;

use function apply_filters;
use function get_block_theme_folders;
use function is_admin;
use function is_string;
use function locate_template;

/**
 * Contextually loads alternate template parts.
 */
final class DynamicTemplateParts {

	/**
	 * Swap a template part slug when a filter returns an alternate that exists.
	 *
	 * @param array $parsed_block The block being rendered.
	 * @return array The possibly modified block data.
	 *
	 * @hook render_block_data
	 */
	public function swap_template_part( array $parsed_block ): array {
		if (
			is_admin()
			|| ( $parsed_block['blockName'] ?? '' ) !== 'core/template-part'
			|| empty( $parsed_block['attrs']['slug'] )
		) {
			return $parsed_block;
		}

		$original = $parsed_block['attrs']['slug'];

		/**
		 * Filter the template part slug before rendering.
		 *
		 * Return a different slug to load an alternate part contextually.
		 * The swap only occurs when `parts/{slug}.html` exists in the theme
		 * (or child theme). Returning the original slug leaves behavior unchanged.
		 *
		 * @since 1.0.0
		 *
		 * @param string $slug          The current template part slug.
		 * @param array  $parsed_block  The parsed `core/template-part` block.
		 */
		$slug = apply_filters( 'aegis_dynamic_template_part_slug', $original, $parsed_block );

		if ( $slug === $original || ! is_string( $slug ) || '' === $slug ) {
			return $parsed_block;
		}

		$parts_dir = get_block_theme_folders()['wp_template_part'];

		if ( locate_template( "{$parts_dir}/{$slug}.html" ) ) {
			$parsed_block['attrs']['slug'] = $slug;
		}

		return $parsed_block;
	}
}
