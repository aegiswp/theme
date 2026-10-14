<?php
/**
 * Registers theme custom blocks from block.json metadata.
 *
 * @package Aegis
 * @since   1.0.0
 */

declare( strict_types=1 );

namespace Aegis\Blocks;

use Aegis\Framework\ServiceProvider;
use WP_Block;
use WP_Block_Type;
use WP_Block_Type_Registry;
use function function_exists;
use function get_template_directory;
use function get_template_directory_uri;
use function glob;
use function is_array;
use function is_readable;
use function register_block_type;
use function unregister_block_pattern;
use function wp_add_inline_script;
use function wp_json_encode;
use function wp_register_block_metadata_collection;
use function wp_register_script;
use function wp_register_style;
use function wp_script_is;
use function wp_scripts;

/**
 * Registers theme block directories that contain block.json.
 */
final class BlockRegistrar {

	/**
	 * Boot block registration on init (priority 9, before Pro enhancements at 10).
	 *
	 * @return void
	 */
	public static function init(): void {
		add_action( 'init', array( self::class, 'register_splide_assets' ), 8 );
		add_action( 'init', array( self::class, 'register' ), 9 );
		add_action( 'init', array( self::class, 'sync_related_posts_patterns' ), 20 );
		add_action( 'init', array( self::class, 'bind_slider_view_dependencies' ), 20 );
		add_action( 'enqueue_block_editor_assets', array( self::class, 'localize_related_posts_features' ) );
		add_action( 'enqueue_block_editor_assets', array( self::class, 'localize_slider_features' ) );
		add_action( 'enqueue_block_editor_assets', array( self::class, 'localize_countdown_features' ) );
		add_action( 'enqueue_block_editor_assets', array( self::class, 'localize_toggle_features' ) );
		add_filter( 'render_block_context', array( self::class, 'provide_toggle_content_context' ), 10, 3 );
	}

	/**
	 * Register Splide so slider viewScript handles resolve and CSS loads.
	 *
	 * @return void
	 */
	public static function register_splide_assets(): void {
		$js_dir  = get_template_directory() . '/vendor/aegis/framework/public/js/';
		$js_url  = get_template_directory_uri() . '/vendor/aegis/framework/public/js/';
		$css_url = get_template_directory_uri() . '/vendor/aegis/framework/public/css/components/splide.css';

		$splide_asset = array( 'version' => '1.0.0' );
		$auto_asset   = array( 'version' => '1.0.0' );

		if ( is_readable( $js_dir . 'splide.asset.php' ) ) {
			$loaded = require $js_dir . 'splide.asset.php';
			if ( is_array( $loaded ) ) {
				$splide_asset = $loaded;
			}
		}

		if ( is_readable( $js_dir . 'splide-autoscroll.asset.php' ) ) {
			$loaded = require $js_dir . 'splide-autoscroll.asset.php';
			if ( is_array( $loaded ) ) {
				$auto_asset = $loaded;
			}
		}

		$splide_ver = isset( $splide_asset['version'] ) ? (string) $splide_asset['version'] : '1.0.0';
		$auto_ver   = isset( $auto_asset['version'] ) ? (string) $auto_asset['version'] : '1.0.0';

		wp_register_script(
			'splide',
			$js_url . 'splide.js',
			array(),
			$splide_ver,
			array(
				'in_footer' => true,
				'strategy'  => 'defer',
			)
		);

		wp_register_script(
			'splide-autoscroll',
			$js_url . 'splide-autoscroll.js',
			array( 'splide' ),
			$auto_ver,
			array(
				'in_footer' => true,
				'strategy'  => 'defer',
			)
		);

		wp_register_style( 'splide', $css_url, array(), $splide_ver );
	}

	/**
	 * Ensure the slider view script waits for Splide.
	 *
	 * @return void
	 */
	public static function bind_slider_view_dependencies(): void {
		$block = WP_Block_Type_Registry::get_instance()->get_registered( 'aegis/slider' );

		if ( ! $block instanceof WP_Block_Type ) {
			return;
		}

		$scripts = wp_scripts();

		foreach ( $block->view_script_handles ?? array() as $handle ) {
			if ( ! is_string( $handle ) || $handle === 'splide' || $handle === 'splide-autoscroll' ) {
				continue;
			}

			if ( ! isset( $scripts->registered[ $handle ] ) ) {
				continue;
			}

			$deps = $scripts->registered[ $handle ]->deps;

			if ( ! in_array( 'splide', $deps, true ) ) {
				$scripts->registered[ $handle ]->deps[] = 'splide';
			}
		}
	}

	/**
	 * Register theme block types from metadata.
	 *
	 * @return void
	 */
	public static function register(): void {
		$blocks_dir = get_template_directory() . '/src/Blocks';
		$manifest   = $blocks_dir . '/blocks-manifest.php';

		if ( function_exists( 'wp_register_block_metadata_collection' ) && is_readable( $manifest ) ) {
			wp_register_block_metadata_collection( $blocks_dir, $manifest );
		}

		self::register_from_glob( $blocks_dir );
	}

	/**
	 * Register each block directory that contains block.json.
	 *
	 * @param string $blocks_dir Absolute path to src/Blocks.
	 *
	 * @return void
	 */
	private static function register_from_glob( string $blocks_dir ): void {
		$registry = WP_Block_Type_Registry::get_instance();

		$block_json_files = glob( $blocks_dir . '/*/block.json' );

		foreach ( is_array( $block_json_files ) ? $block_json_files : array() as $block_json ) {
			$block_dir = dirname( $block_json );
			$dir_name  = basename( $block_dir );

			if ( ! is_readable( $block_json ) ) {
				continue;
			}

			$parent_key = self::parent_block_key( $dir_name );
			$enabled    = $parent_key === '' || ServiceProvider::is_block_enabled( $parent_key );

			if ( $parent_key !== '' && ! $enabled ) {
				continue;
			}

			$metadata = wp_json_file_decode( $block_json, array( 'associative' => true ) );

			if ( ! is_array( $metadata ) || empty( $metadata['name'] ) ) {
				continue;
			}

			$name = (string) $metadata['name'];

			if ( ! str_starts_with( $name, 'aegis/' ) ) {
				continue;
			}

			if ( $registry->is_registered( $name ) ) {
				continue;
			}

			register_block_type( $block_dir );
		}
	}

	/**
	 * Map block directory names to parent block setting keys.
	 *
	 * @param string $dir_name Block directory basename.
	 *
	 * @return string
	 */
	private static function parent_block_key( string $dir_name ): string {
		return match ( $dir_name ) {
			'slide' => 'slider',
			'toggle-content' => 'toggle',
			'related-posts' => 'related_posts',
			default => $dir_name,
		};
	}

	/**
	 * Hide Related Posts patterns when the block is not implied on.
	 *
	 * Theme file patterns always register. Extras imply `related_posts`, so
	 * these layouts should not appear when the block itself is unregistered.
	 *
	 * @return void
	 */
	public static function sync_related_posts_patterns(): void {
		if ( ServiceProvider::is_block_enabled( 'related_posts' ) ) {
			return;
		}

		foreach ( self::related_posts_pattern_slugs() as $slug ) {
			unregister_block_pattern( $slug );
		}
	}

	/**
	 * Pass Related Posts extras to the block editor inspector.
	 *
	 * @return void
	 */
	public static function localize_related_posts_features(): void {
		self::localize_features_json(
			'aegis/related-posts',
			'aegisRelatedPostsFeatures',
			array(
				'taxonomySource' => ServiceProvider::is_block_enabled( 'related_posts_taxonomy_source' ),
				'orderBy'        => ServiceProvider::is_block_enabled( 'related_posts_orderby' ),
				'fallback'       => ServiceProvider::is_block_enabled( 'related_posts_fallback' ),
				'styleVariants'  => ServiceProvider::is_block_enabled( 'related_posts_style_variants' ),
				'excerptLength'  => ServiceProvider::is_block_enabled( 'related_posts_excerpt_length' ),
				'imageRatio'     => ServiceProvider::is_block_enabled( 'related_posts_image_ratio' ),
			)
		);
	}

	/**
	 * Pass Slider extras to the block editor inspector.
	 *
	 * @return void
	 */
	public static function localize_slider_features(): void {
		self::localize_features_json(
			'aegis/slider',
			'aegisSliderFeatures',
			array(
				'slide'      => ServiceProvider::is_block_enabled( 'slider_slide' ),
				'fade'       => ServiceProvider::is_block_enabled( 'slider_fade' ),
				'navigation' => ServiceProvider::is_block_enabled( 'slider_navigation' ),
				'pagination' => ServiceProvider::is_block_enabled( 'slider_pagination' ),
				'loop'       => ServiceProvider::is_block_enabled( 'slider_loop' ),
				'keyboard'   => ServiceProvider::is_block_enabled( 'slider_keyboard' ),
				'responsive' => ServiceProvider::is_block_enabled( 'slider_responsive' ),
				'autoplay'   => ServiceProvider::is_block_enabled( 'slider_autoplay' ),
			)
		);
	}

	/**
	 * Pass Countdown extras to the block editor inspector.
	 *
	 * @return void
	 */
	public static function localize_countdown_features(): void {
		self::localize_features_json(
			'aegis/countdown',
			'aegisCountdownFeatures',
			array(
				'segments'      => ServiceProvider::is_block_enabled( 'countdown_segments' ),
				'labels'        => ServiceProvider::is_block_enabled( 'countdown_labels' ),
				'separator'     => ServiceProvider::is_block_enabled( 'countdown_separator' ),
				'layout'        => ServiceProvider::is_block_enabled( 'countdown_layout' ),
				'expiryMessage' => ServiceProvider::is_block_enabled( 'countdown_expiry_message' ),
				'timezone'      => ServiceProvider::is_block_enabled( 'countdown_timezone' ),
				'schema'        => ServiceProvider::is_block_enabled( 'countdown_schema' ),
			)
		);
	}

	/**
	 * Pass Toggle extras to the block editor inspector.
	 *
	 * @return void
	 */
	public static function localize_toggle_features(): void {
		$features = array(
			'pill'       => ServiceProvider::is_block_enabled( 'toggle_pill' ),
			'switch'     => ServiceProvider::is_block_enabled( 'toggle_switch' ),
			'buttons'    => ServiceProvider::is_block_enabled( 'toggle_buttons' ),
			'position'   => ServiceProvider::is_block_enabled( 'toggle_position' ),
			'labels'     => ServiceProvider::is_block_enabled( 'toggle_labels' ),
			'animations' => ServiceProvider::is_block_enabled( 'toggle_animations' ),
			'nested'     => ServiceProvider::is_block_enabled( 'toggle_nested' ),
		);

		self::localize_features_json( 'aegis/toggle', 'aegisToggleFeatures', $features );
		self::localize_features_json( 'aegis/toggle-content', 'aegisToggleFeatures', $features );
	}

	/**
	 * Pass the parent switcher DOM id into Toggle Content for ARIA wiring.
	 *
	 * @param array<string, mixed> $context      Block context.
	 * @param array<string, mixed> $parsed_block Parsed block.
	 * @param WP_Block|null        $parent_block Parent block instance.
	 *
	 * @return array<string, mixed>
	 */
	public static function provide_toggle_content_context( array $context, array $parsed_block, $parent_block ): array {
		if ( ( $parsed_block['blockName'] ?? '' ) !== 'aegis/toggle-content' ) {
			return $context;
		}

		if ( ! $parent_block instanceof WP_Block || $parent_block->name !== 'aegis/toggle' ) {
			return $context;
		}

		$parent_attrs = is_array( $parent_block->attributes ) ? $parent_block->attributes : array();
		$context['aegis/toggleDomId'] = ToggleId::from_block( $parent_block, $parent_attrs );

		return $context;
	}

	/**
	 * Inline feature flags as real JSON booleans on a block editor script.
	 *
	 * @param string               $block_name Registered block name.
	 * @param string               $js_var     window.* variable name.
	 * @param array<string, bool>  $features   Feature map.
	 *
	 * @return void
	 */
	private static function localize_features_json( string $block_name, string $js_var, array $features ): void {
		$block = WP_Block_Type_Registry::get_instance()->get_registered( $block_name );

		if ( ! $block instanceof WP_Block_Type ) {
			return;
		}

		$handles = $block->editor_script_handles ?? array();

		if ( $handles === array() && is_string( $block->editor_script ) && $block->editor_script !== '' ) {
			$handles = array( $block->editor_script );
		}

		$json = wp_json_encode( $features );

		if ( ! is_string( $json ) ) {
			return;
		}

		foreach ( $handles as $handle ) {
			if ( ! is_string( $handle ) || ! wp_script_is( $handle, 'registered' ) ) {
				continue;
			}

			wp_add_inline_script(
				$handle,
				'window.' . $js_var . ' = ' . $json . ';',
				'before'
			);
			return;
		}
	}

	/**
	 * Theme Related Posts pattern slugs (`{category}-{file-slug}`).
	 *
	 * @return array<int, string>
	 */
	private static function related_posts_pattern_slugs(): array {
		$files = glob( get_template_directory() . '/patterns/blog/related-posts-*.php' );
		$slugs = array();

		foreach ( is_array( $files ) ? $files : array() as $file ) {
			$slugs[] = 'blog-' . basename( $file, '.php' );
		}

		return $slugs;
	}
}
