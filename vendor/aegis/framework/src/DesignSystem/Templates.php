<?php
/**
 * Templates Component
 *
 * Provides support for customizing and extending the template hierarchy in the Aegis Framework.
 *
 * Responsibilities:
 * - Updates and customizes template hierarchy for search and archive pages
 * - Integrates with the block editor and WordPress template system
 *
 * @package    Aegis\Framework\DesignSystem
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for design system components.
declare(strict_types=1);

// Declares the namespace for design system components within the Aegis Framework.
namespace Aegis\Framework\DesignSystem;

// Imports WordPress classes and helpers for template management and file system access.
use WP_Block_Template;
use function array_unshift;
use function class_exists;
use function file_exists;
use function get_post_type;
use function get_queried_object;
use function get_stylesheet_directory;
use function get_template;
use function get_template_directory;
use function in_array;
use function is_post_type_archive;
use function is_search;
use function str_contains;

// Implements the Templates class to support template hierarchy customization for the design system.

class Templates
{

	/**
	 * Updates search template hierarchy.
	 *
	 * @since 1.0.0
	 *
	 * @param array $templates Template files to search for, in order.
	 *
	 * @hook  search_template_hierarchy
	 *
	 * @return array
	 */
	public function update_search_template_hierarchy(array $templates): array
	{
		if (is_search() && is_post_type_archive()) {
			$post_type = get_queried_object()->name ?? get_post_type();
			$slug = "search-$post_type";
			$child = get_stylesheet_directory() . "/templates/$slug.html";
			$parent = get_template_directory() . "/templates/$slug.html";

			if (file_exists($child) || file_exists($parent)) {
				array_unshift($templates, $slug);
			}
		}

		return $templates;
	}

	/**
	 * Remove unused templates from editor.
	 *
	 * @since 1.0.0
	 *
	 * @param ?WP_Block_Template[] $query_result  The query result.
	 * @param array                $query         The query.
	 * @param string               $template_type The template type.
	 *
	 * @hook  get_block_templates
	 *
	 * @return array
	 */
	public function remove_templates(?array $query_result, array $query, string $template_type): array
	{
		if ('wp_template' !== $template_type) {
			return $query_result;
		}

		$woocommerce = class_exists('WooCommerce');
		$template = get_template();
		$stylesheet = get_stylesheet();

		foreach ($query_result as $index => $wp_block_template) {
			$slug = $wp_block_template->slug;
			$theme = $wp_block_template->theme;

			if (!in_array($theme, [$template, $stylesheet])) {
				continue;
			}

			if (!$woocommerce && str_contains($slug, 'product')) {
				unset($query_result[$index]);
			}
		}

		return $query_result;
	}
}
