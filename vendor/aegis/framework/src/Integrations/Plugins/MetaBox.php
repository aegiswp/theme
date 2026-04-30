<?php
/**
 * Meta Box Integration Component
 *
 * Provides deep integration for Meta Box plugin compatibility in the
 * Aegis Framework.
 *
 * Responsibilities:
 * - Conditionally loads only when the Meta Box plugin is active
 *   (`RWMB_Loader` class or `rwmb_meta()` function exists)
 * - Registers an `aegis/metabox` Block Bindings source (WordPress
 *   6.5+) so Meta Box fields can be bound to core block attributes
 *   inside Query Loop and single-post templates
 * - Formats Meta Box field values for different block attribute types
 *   (URL/src, alt, id, content) including image-array-to-URL conversion
 * - Injects the theme.json colour palette into Meta Box's
 *   `wpColorPicker` via the `rwmb_enqueue_scripts` hook
 * - Registers a conditional inline stylesheet (`plugins/meta-box.css`)
 *   through the framework's {@see Styleable} contract
 *
 * @package    Aegis\Framework\Integrations\Plugins
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file.
declare( strict_types=1 );

// Declares the namespace for plugin integrations within the Aegis Framework.
namespace Aegis\Framework\Integrations\Plugins;

// Imports interfaces, classes, and functions used throughout this file.
use Aegis\Container\Interfaces\Conditional;
use Aegis\Framework\InlineAssets\Styleable;
use Aegis\Framework\InlineAssets\Styles;
use Aegis\Framework\ServiceProvider;
use function add_action;
use function class_exists;
use function function_exists;
use function get_the_ID;
use function in_array;
use function is_array;
use function is_numeric;
use function wp_get_attachment_url;
use function wp_json_encode;

/**
 * Meta Box plugin integration.
 *
 * Implements the {@see Conditional} interface so the service is only
 * booted when Meta Box is active, and the {@see Styleable} interface
 * to register conditional CSS via the framework's inline-assets
 * system. Provides Block Bindings API support for binding Meta Box
 * fields to core block attributes, injects the theme colour palette
 * into Meta Box colour pickers, and applies theme-consistent styling.
 *
 * @since 1.0.0
 */
class MetaBox implements Conditional, Styleable {

	/**
	 * Determine whether this service should be loaded.
	 *
	 * Returns `true` when either the `RWMB_Loader` class or the
	 * `rwmb_meta()` helper function exists, indicating that the
	 * Meta Box plugin is active.
	 *
	 * @since 1.0.0
	 *
	 * @return bool True when Meta Box is active.
	 */
	public static function condition(): bool {
		return class_exists( 'RWMB_Loader' ) || function_exists( 'rwmb_meta' );
	}

	/**
	 * Register hooks.
	 *
	 * Attaches the Block Bindings source registration on `init` and
	 * the colour-palette injection on `rwmb_enqueue_scripts`.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function hooks(): void {
		// Block Bindings API integration (WordPress 6.5+).
		add_action( 'init', [ $this, 'register_block_bindings_source' ] );

		// Theme color palette integration.
		add_action( 'rwmb_enqueue_scripts', [ $this, 'add_color_picker_palette' ] );
	}

	/**
	 * Register conditional inline styles.
	 *
	 * Adds `plugins/meta-box.css` to the framework's inline-styles
	 * system. The CSS is only injected when one of the marker strings
	 * (`rwmb-`, `rwmb_`, `meta-box`, `metabox`) is detected in the
	 * rendered page output.
	 *
	 * @since 1.0.0
	 *
	 * @param Styles $styles The framework Styles collector.
	 *
	 * @return void
	 */
	public function styles( Styles $styles ): void {
		$styles->add_file(
			'plugins/meta-box.css',
			[
				'rwmb-',
				'rwmb_',
				'meta-box',
				'metabox',
			]
		);
	}

	/**
	 * Register Meta Box as a Block Bindings source.
	 *
	 * Creates the `aegis/metabox` binding source so Meta Box custom
	 * fields can be bound to core block attributes (e.g. paragraph
	 * content, image src) inside Query Loop and single-post
	 * templates. Requires the Block Bindings API introduced in
	 * WordPress 6.5; silently returns on older versions.
	 *
	 * @since 1.0.0
	 *
	 * @hook  init
	 *
	 * @return void
	 */
	public function register_block_bindings_source(): void {
		if ( ! function_exists( 'register_block_bindings_source' ) ) {
			return;
		}

		register_block_bindings_source(
			'aegis/metabox',
			[
				'label'              => __( 'Meta Box Field', 'aegis' ),
				'get_value_callback' => [ $this, 'get_metabox_field_value' ],
				'uses_context'       => [ 'postId', 'postType' ],
			]
		);
	}

	/**
	 * Get Meta Box field value for Block Bindings.
	 *
	 * Callback for the `aegis/metabox` bindings source. Retrieves
	 * the field value via `rwmb_meta()` using the `key` (or `field`)
	 * source argument and the current post ID from block context.
	 * The raw value is then formatted for the target block attribute
	 * via {@see format_field_value_for_attribute()}.
	 *
	 * @since 1.0.0
	 *
	 * @param array    $source_args    Source arguments; expects 'key' or 'field'.
	 * @param WP_Block $block_instance The block instance with post context.
	 * @param string   $attribute_name The block attribute being bound.
	 *
	 * @return mixed The formatted field value, or null on failure.
	 */
	public function get_metabox_field_value( array $source_args, $block_instance, string $attribute_name ) {
		if ( ! function_exists( 'rwmb_meta' ) ) {
			return null;
		}

		$field_key = $source_args['key'] ?? $source_args['field'] ?? '';

		if ( empty( $field_key ) ) {
			return null;
		}

		$post_id = $block_instance->context['postId'] ?? get_the_ID();

		if ( ! $post_id ) {
			return null;
		}

		$value = rwmb_meta( sanitize_key( $field_key ), [], absint( $post_id ) );

		if ( $value ) {
			$value = $this->format_field_value_for_attribute( $value, $attribute_name );
		}

		return $value;
	}

	/**
	 * Format a Meta Box field value for a specific block attribute.
	 *
	 * Converts raw Meta Box return values into the type expected by
	 * the target block attribute:
	 * - `url`, `src`, `href` — extracts the first image URL from an
	 *   `image_advanced` array, resolves attachment IDs, or passes
	 *   through a URL string
	 * - `alt` — extracts alt text from an image array or attachment
	 * - `id` — extracts the attachment ID as an integer
	 * - `content`, `text`, `value` — implodes arrays into a
	 *   comma-separated string
	 *
	 * @since 1.0.0
	 *
	 * @param mixed  $value          The raw Meta Box field value.
	 * @param string $attribute_name The block attribute name.
	 *
	 * @return mixed The formatted value.
	 */
	private function format_field_value_for_attribute( $value, string $attribute_name ) {
		// Handle image fields bound to url/src attributes.
		if ( in_array( $attribute_name, [ 'url', 'src', 'href' ], true ) ) {
			// Meta Box image_advanced returns array of arrays.
			if ( is_array( $value ) ) {
				$first = reset( $value );

				if ( is_array( $first ) && isset( $first['url'] ) ) {
					return $first['url'];
				}

				if ( is_array( $first ) && isset( $first['full_url'] ) ) {
					return $first['full_url'];
				}
			}

			// Single image ID.
			if ( is_numeric( $value ) ) {
				return wp_get_attachment_url( absint( $value ) );
			}

			// Already a URL string.
			if ( is_string( $value ) ) {
				return $value;
			}
		}

		// Handle image fields bound to alt attribute.
		if ( $attribute_name === 'alt' ) {
			if ( is_array( $value ) ) {
				$first = reset( $value );

				if ( is_array( $first ) && isset( $first['alt'] ) ) {
					return $first['alt'];
				}
			}

			if ( is_numeric( $value ) ) {
				return get_post_meta( absint( $value ), '_wp_attachment_image_alt', true );
			}
		}

		// Handle image fields bound to id attribute.
		if ( $attribute_name === 'id' ) {
			if ( is_array( $value ) ) {
				$first = reset( $value );

				if ( is_array( $first ) && isset( $first['ID'] ) ) {
					return (int) $first['ID'];
				}
			}

			if ( is_numeric( $value ) ) {
				return absint( $value );
			}
		}

		// Handle content/text attributes.
		if ( in_array( $attribute_name, [ 'content', 'text', 'value' ], true ) ) {
			if ( is_array( $value ) ) {
				return implode( ', ', array_map( 'strval', $value ) );
			}
		}

		return $value;
	}

	/**
	 * Add theme colour palette to Meta Box colour picker fields.
	 *
	 * Reads the `color.palette.theme` array from the global
	 * `theme.json` settings via {@see ServiceProvider::get_global_settings()}
	 * and injects the hex values into jQuery's `wpColorPicker`
	 * prototype so every Meta Box colour field presents the theme
	 * palette by default.
	 *
	 * @since 1.0.0
	 *
	 * @hook  rwmb_enqueue_scripts
	 *
	 * @return void
	 */
	public function add_color_picker_palette(): void {
		$global_settings = ServiceProvider::get_global_settings();
		$palette         = $global_settings['color']['palette']['theme'] ?? [];

		if ( empty( $palette ) ) {
			return;
		}

		$colors = [];
		foreach ( $palette as $color ) {
			$colors[] = $color['color'];
		}

		if ( empty( $colors ) ) {
			return;
		}

		$colors_json = wp_json_encode( $colors );
		?>
		<script type="text/javascript">
		(function($) {
			$(document).on('ready', function() {
				if (typeof $.wp === 'object' && typeof $.wp.wpColorPicker === 'function') {
					$.wp.wpColorPicker.prototype.options.palettes = <?php echo $colors_json; ?>;
				}
			});
		})(jQuery);
		</script>
		<?php
	}
}
