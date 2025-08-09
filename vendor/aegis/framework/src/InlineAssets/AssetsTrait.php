<?php
/**
 * AssetsTrait Component
 *
 * Provides shared logic for managing inline assets such as scripts and styles in the Aegis Framework.
 *
 * Responsibilities:
 * - Handles directory and URL management for asset files
 * - Supplies helper methods for asset handling and registration
 *
 * @package    Aegis\Framework\InlineAssets
 * @since      1.0.0
 * @author     @atmostfear-entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for inline asset management.
declare( strict_types=1 );

// Declares the namespace for inline assets components within the Aegis Framework.
namespace Aegis\Framework\InlineAssets;

// Imports utility classes and functions for asset path, string, and file handling.
use Aegis\Utilities\Path;
use Aegis\Utilities\Str;
use function basename;
use function dirname;
use function get_class;
use function str_contains;
use function strtolower;
use function uniqid;

/**
 * A trait for managing and conditionally loading CSS or JavaScript assets.
 *
 * This trait provides a powerful and efficient mechanism for loading assets
 * only when they are needed. It can conditionally load assets based on the
 * presence of specific strings in the page's HTML content, which is ideal
 * for loading block-specific assets only when that block is on the page.
 *
 * It supports adding assets from files, raw strings, or dynamic callbacks.
 *
 * @package Aegis\Framework\InlineAssets
 */
trait AssetsTrait {

	/**
	 * The absolute file system path to the asset directory (e.g., /.../wp-content/themes/aegis/public/css/).
	 *
	 * @var string
	 */
	public string $dir;

	/**
	 * The public URL to the asset directory (e.g., https://.../wp-content/themes/aegis/public/css/).
	 *
	 * @var string
	 */
	public string $url;

	/**
	 * The base handle used for WordPress asset registration (e.g., 'aegis').
	 *
	 * @var string
	 */
	public string $handle;

	/**
	 * An array of callbacks that dynamically generate asset content.
	 *
	 * Each callback receives the page's HTML content and should return a string
	 * of CSS or JavaScript.
	 *
	 * @var callable[]
	 */
	private array $callbacks = [];

	/**
	 * A registry of asset files to be conditionally loaded.
	 *
	 * The key is the filename. The value is an array containing:
	 * 0: An array of strings to search for in the HTML.
	 * 1: A boolean condition that must be true to load the file.
	 *
	 * @var array<string, array{0: string[], 1: bool}>
	 */
	private array $files = [];

	/**
	 * A registry of raw asset strings to be conditionally added.
	 *
	 * The key is the CSS/JS string. The value is an array containing:
	 * 0: An array of strings to search for in the HTML.
	 * 1: A boolean condition that must be true to add the string.
	 *
	 * @var array<string, array{0: string[], 1: bool}>
	 */
	private array $strings = [];

	/**
	 * A registry of data to be localized for scripts or used for CSS custom properties.
	 *
	 * The key is the name/handle for the data. The value is an array containing:
	 * 0: The actual data array.
	 * 1: An array of strings to search for in the HTML.
	 * 2: A boolean condition that must be true to add the data.
	 *
	 * @var array<string, array{0: array, 1: string[], 2: bool}>
	 */
	private array $data = [];

	/**
	 * The type of asset being managed ('css' or 'js').
	 *
	 * This is determined automatically based on the class name using this trait.
	 *
	 * @var string
	 */
	private string $type = '';

	/**
	 * Sets up the asset manager's properties based on the theme or plugin's file structure.
	 *
	 * It automatically determines the asset directory, URL, and a unique handle.
	 * It also infers the asset type ('css' or 'js') from the name of the class
	 * that uses this trait (e.g., `Styles` -> 'css', `Scripts` -> 'js').
	 *
	 * @param string $file The full path to the main theme or plugin file (e.g., __FILE__).
	 */
	public function __construct( string $file ) {
		$project_dir = dirname( $file );
		$package_dir = dirname( __DIR__, 2 );
		$dir         = Path::get_package_dir( $project_dir, $package_dir );
		$url         = Path::get_package_url( $project_dir, $package_dir );
		$this->type  = str_contains( static::class, 'Style' ) ? 'css' : 'js';
		$this->dir   = "{$dir}public/{$this->type}/";
		$this->url   = "{$url}public/{$this->type}/";
		// Create a handle from the name of the theme/plugin directory.
		$this->handle = strtolower( basename( dirname( $file ), '.php' ) );
	}

	/**
	 * Registers an asset file for conditional loading.
	 *
	 * @since 1.0.0
	 *
	 * @param string $file      The name of the file inside the `public/{$type}` directory.
	 * @param array  $strings   Optional. An array of substrings to look for in the page's HTML.
	 *                          The asset will only be loaded if one of these strings is found.
	 *                          If empty, the asset is loaded based on the `$condition` only.
	 * @param bool   $condition Optional. A boolean that must be true for the asset to be loaded.
	 *
	 * @return self Returns the instance for method chaining.
	 */
	public function add_file( string $file, array $strings = [], bool $condition = true ): self {
		$this->files[ $file ] = [ $strings, $condition ];
		return $this;
	}

	/**
	 * Registers a callback function that dynamically generates asset content.
	 *
	 * The callback will be executed during the enqueue process.
	 *
	 * @since 1.0.0
	 *
	 * @param callable $callback The function to call. It will receive the page HTML, a
	 *                           `$load_all` flag, and the current class instance. It
	 *                           should return a string of CSS or JS.
	 *
	 * @return self Returns the instance for method chaining.
	 */
	public function add_callback( callable $callback ): self {
		$this->callbacks[] = $callback;
		return $this;
	}

	/**
	 * Registers a raw string of CSS or JavaScript for conditional inclusion.
	 *
	 * @since 1.0.0
	 *
	 * @param string $string    The raw CSS or JavaScript code to add.
	 * @param array  $strings   Optional. An array of substrings to look for in the page's HTML.
	 *                          The string will only be added if one of these is found.
	 * @param bool   $condition Optional. A boolean that must be true for the string to be added.
	 *
	 * @return self Returns the instance for method chaining.
	 */
	public function add_string( string $string, array $strings = [], bool $condition = true ): self {
		$this->strings[ $string ] = [ $strings, $condition ];
		return $this;
	}

	/**
	 * Registers data to be made available to scripts (via localization) or styles (as CSS custom properties).
	 *
	 * For scripts, this is equivalent to `wp_localize_script`.
	 * For styles, this is used to generate and inject a block of CSS custom properties.
	 *
	 * @param string $key       The key or handle for the data. For scripts, this is the object name
	 *                          (e.g., 'aegisData'). For styles, it is often a component name.
	 * @param array  $value     An associative array of data.
	 * @param array  $strings   Optional. An array of substrings to look for in the page's HTML.
	 *                          The data will only be added if one of these is found.
	 * @param bool   $condition Optional. A boolean that must be true for the data to be added.
	 *
	 * @return self Returns the instance for method chaining.
	 */
	public function add_data(
		string $key,
		array  $value,
		array  $strings = [],
		bool   $condition = true
	): self {
		$this->data[ $key ] = [ $value, $strings, $condition ];
		return $this;
	}

	/**
	 * An abstract method that must be implemented by the consuming class.
	 *
	 * This method is responsible for hooking into WordPress and triggering the
	 * asset enqueueing process at the correct time (e.g., `enqueue_block_assets`).
	 *
	 * @hook enqueue_block_assets Typically hooked here.
	 *
	 * @return void
	 */
	abstract public function enqueue(): void;

	/**
	 * Gathers, concatenates, and returns all inline assets that meet their conditions.
	 *
	 * This method orchestrates the collection of all registered assets (from strings,
	 * callbacks, and files), filters them based on the provided HTML content, and
	 * combines them into a single string for injection.
	 *
	 * @param ?string $template_html The full HTML content of the current page.
	 * @param bool    $load_all      If true, all registered assets will be loaded,
	 *                               bypassing conditional checks.
	 *
	 * @return string A single string containing all the combined and minified assets.
	 */
	private function get_inline_assets( ?string $template_html, bool $load_all ): string {
		$string = '';
		$assets = $this->get_assets( $template_html ?? '', $load_all );

		foreach ( $assets as $asset ) {
			$string .= Str::remove_line_breaks( $asset );
		}

		/**
		 * Filters the final combined inline asset string.
		 *
		 * This allows themes or other plugins to modify the final CSS or JS output
		 * before it is printed on the page.
		 *
		 * @since 1.0.0
		 *
		 * @param string  $string        The combined inline asset content.
		 * @param ?string $template_html The full HTML content of the current page.
		 * @param bool    $load_all      Whether the asset loading was forced.
		 * @param object  $instance      The instance of the asset manager class.
		 */
		return apply_filters(
			"{$this->handle}_inline_{$this->type}",
			$string,
			$template_html,
			$load_all,
			$this
		);
	}

	/**
	 * Collects all asset content from registered sources that satisfy their loading conditions.
	 *
	 * This is the core logic engine. It iterates through registered strings, callbacks,
	 * and files, checks their conditions against the page's HTML content, and
	 * collects the content of those that pass.
	 *
	 * @param string $template_html The full HTML content of the current page.
	 * @param bool   $load_all      If true, bypass all conditional checks.
	 *
	 * @return array An associative array of asset content, keyed by a unique identifier.
	 */
	private function get_assets( string $template_html, bool $load_all ): array {
		$assets = [];

		// Process registered asset strings
		foreach ( $this->strings as $string => $args ) {
			$strings   = $args[0] ?? [];
			$condition = $args[1] ?? true;

			// Load if forced, no string conditions, a string is found, or the boolean condition is met.
			if ( $load_all || ! $strings || Str::contains_any( $template_html, ...$strings ) || $condition ) {
				$id            = uniqid( static::class );
				$assets[ $id ] = $string;
			}
		}

		// Process registered callbacks
		foreach ( $this->callbacks as $callback ) {
			$id = is_array( $callback ) ? get_class( $callback[0] ) . '\\' . $callback[1] ?? '' : $callback;
			// The callback itself is responsible for its own conditional logic.
			$assets[ $id ] = $callback( $template_html, $load_all, $this );
		}

		// Process registered asset files
		foreach ( $this->files as $file => $args ) {
			$strings   = $args[0] ?? [];
			$condition = $args[1] ?? true;

			// Skip if the boolean condition is explicitly false AND no trigger strings are found.
			// This allows for a file to be loaded EITHER by string match OR by the condition being true.
			if ( ! $condition && ! Str::contains_any( $template_html, ...$strings ) ) {
				continue;
			}

			// Load if forced, no string conditions, or a string is found.
			if ( $load_all || ! $strings || Str::contains_any( $template_html, ...$strings ) ) {
				if ( file_exists( $this->dir . $file ) ) {
					$assets[ $file ] = file_get_contents( $this->dir . $file );
				}
			}
		}

		return $assets;
	}
}
