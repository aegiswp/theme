<?php
/**
 * Advanced Custom Fields Integration Component
 *
 * Provides deep integration for ACF plugin compatibility in the Aegis Framework.
 *
 * Responsibilities:
 * - Checks for ACF plugin presence and conditionally registers hooks
 * - Sets ACF JSON save/load paths to theme directory
 * - Provides block registration helpers with theme.json support
 * - Integrates theme color palette with ACF color picker fields
 * - Registers ACF as a Block Bindings source for Query Loop integration
 *
 * @package    Aegis\Framework\Integrations
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for integration components.
declare(strict_types=1);

// Declares the namespace for integration components within the Aegis Framework.
namespace Aegis\Framework\Integrations;

// Imports interfaces and helpers for conditional logic and hook management.
use Aegis\Container\Interfaces\Conditional;
use function add_action;
use function add_filter;
use function class_exists;
use function function_exists;
use function get_stylesheet_directory;
use function get_template_directory;
use function is_dir;
use function mkdir;
use Aegis\Framework\ServiceProvider;

// Implements the Advanced Custom Fields integration class for the design system.

class AdvancedCustomFields implements Conditional
{

	/**
	 * Condition.
	 *
	 * @since 1.0.0
	 *
	 * @return bool
	 */
	public static function condition(): bool
	{
		return class_exists('ACF') || function_exists('acf_register_block_type');
	}

	/**
	 * Register hooks.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function hooks(): void
	{
		// ACF JSON sync paths.
		add_filter('acf/settings/save_json', [$this, 'set_acf_json_save_path']);
		add_filter('acf/settings/load_json', [$this, 'set_acf_json_load_paths']);

		// Theme color palette integration.
		add_action('acf/input/admin_footer', [$this, 'add_color_picker_palette']);

		// Block Bindings API integration (WordPress 6.5+).
		add_action('init', [$this, 'register_block_bindings_source']);
	}

	/**
	 * Set ACF JSON save path to child theme directory.
	 *
	 * Creates the acf-json directory if it does not exist.
	 *
	 * @since 1.0.0
	 *
	 * @hook  acf/settings/save_json
	 *
	 * @param string $path The default save path.
	 *
	 * @return string
	 */
	public function set_acf_json_save_path(string $path): string
	{
		$child_theme_path = get_stylesheet_directory() . '/acf-json';

		// Create directory if it doesn't exist.
		if (!is_dir($child_theme_path)) {
			mkdir($child_theme_path, 0755, true);
		}

		return $child_theme_path;
	}

	/**
	 * Set ACF JSON load paths to include both parent and child theme.
	 *
	 * @since 1.0.0
	 *
	 * @hook  acf/settings/load_json
	 *
	 * @param array $paths The default load paths.
	 *
	 * @return array
	 */
	public function set_acf_json_load_paths(array $paths): array
	{
		// Remove default path.
		unset($paths[0]);

		// Add child theme path first (higher priority).
		$child_theme_path = get_stylesheet_directory() . '/acf-json';
		if (is_dir($child_theme_path)) {
			$paths[] = $child_theme_path;
		}

		// Add parent theme path.
		$parent_theme_path = get_template_directory() . '/acf-json';
		if (is_dir($parent_theme_path) && $parent_theme_path !== $child_theme_path) {
			$paths[] = $parent_theme_path;
		}

		return $paths;
	}

	/**
	 * Add theme color palette to ACF color picker fields.
	 *
	 * Injects theme.json color palette into ACF's color picker.
	 *
	 * @since 1.0.0
	 *
	 * @hook  acf/input/admin_footer
	 *
	 * @return void
	 */
	public function add_color_picker_palette(): void
	{
		$global_settings = ServiceProvider::get_global_settings();
		$palette = $global_settings['color']['palette']['theme'] ?? [];

		if (empty($palette)) {
			return;
		}

		$colors = [];
		foreach ($palette as $color) {
			$colors[] = $color['color'];
		}

		if (empty($colors)) {
			return;
		}

		$colors_json = wp_json_encode($colors);
		?>
		<script type="text/javascript">
			(function ($) {
				acf.add_filter('color_picker_args', function (args, $field) {
					args.palettes = <?php echo $colors_json; ?>;
					return args;
				});
			})(jQuery);
		</script>
		<?php
	}

	/**
	 * Register ACF as a Block Bindings source.
	 *
	 * Allows ACF fields to be bound to core block attributes in Query Loop.
	 * Requires WordPress 6.5+.
	 *
	 * @since 1.0.0
	 *
	 * @hook  init
	 *
	 * @return void
	 */
	public function register_block_bindings_source(): void
	{
		// Check if Block Bindings API is available (WordPress 6.5+).
		if (!function_exists('register_block_bindings_source')) {
			return;
		}

		register_block_bindings_source(
			'aegis/acf',
			[
				'label' => __('ACF Field', 'aegis'),
				'get_value_callback' => [$this, 'get_acf_field_value'],
				'uses_context' => ['postId', 'postType'],
			]
		);
	}

	/**
	 * Get ACF field value for Block Bindings.
	 *
	 * Callback for the block bindings source to retrieve ACF field values.
	 *
	 * @since 1.0.0
	 *
	 * @param array    $source_args    The source arguments containing field key.
	 * @param WP_Block $block_instance The block instance.
	 * @param string   $attribute_name The attribute being bound.
	 *
	 * @return mixed The field value or null.
	 */
	public function get_acf_field_value(array $source_args, $block_instance, string $attribute_name)
	{
		if (!function_exists('get_field')) {
			return null;
		}

		$field_key = $source_args['key'] ?? $source_args['field'] ?? '';

		if (empty($field_key)) {
			return null;
		}

		// Get post ID from block context.
		$post_id = $block_instance->context['postId'] ?? get_the_ID();

		if (!$post_id) {
			return null;
		}

		$value = get_field($field_key, $post_id);

		// Handle different field types based on attribute being bound.
		if ($value) {
			$value = $this->format_field_value_for_attribute($value, $attribute_name);
		}

		return $value;
	}

	/**
	 * Format ACF field value for specific block attributes.
	 *
	 * Handles conversion of ACF field values to appropriate formats
	 * for different block attributes (e.g., image arrays to URLs).
	 *
	 * @since 1.0.0
	 *
	 * @param mixed  $value          The ACF field value.
	 * @param string $attribute_name The block attribute name.
	 *
	 * @return mixed The formatted value.
	 */
	private function format_field_value_for_attribute($value, string $attribute_name)
	{
		// Handle image fields bound to url/src attributes.
		if (in_array($attribute_name, ['url', 'src', 'href'], true)) {
			if (is_array($value) && isset($value['url'])) {
				return $value['url'];
			}
			if (is_numeric($value)) {
				return wp_get_attachment_url((int) $value);
			}
		}

		// Handle image fields bound to alt attribute.
		if ($attribute_name === 'alt') {
			if (is_array($value) && isset($value['alt'])) {
				return $value['alt'];
			}
			if (is_numeric($value)) {
				return get_post_meta((int) $value, '_wp_attachment_image_alt', true);
			}
		}

		// Handle image fields bound to id attribute.
		if ($attribute_name === 'id') {
			if (is_array($value) && isset($value['id'])) {
				return $value['id'];
			}
			if (is_numeric($value)) {
				return (int) $value;
			}
		}

		// Handle content/text attributes.
		if (in_array($attribute_name, ['content', 'text', 'value'], true)) {
			if (is_array($value)) {
				return implode(', ', $value);
			}
		}

		return $value;
	}
}
