<?php

// Enforces strict type checking for all code in this file, ensuring type safety for data object helpers.
declare( strict_types=1 );

// Declares the namespace for the data object helpers.
namespace Aegis\Utilities;

// Imports classes, interfaces, and functions used by the data object helpers.
use WP_Theme;
use function basename;
use function dirname;
use function function_exists;
use function get_plugin_data;
use function get_template;
use function plugin_basename;
use function plugin_dir_url;
use function str_contains;
use function strip_tags;
use function trailingslashit;
use function wp_get_theme;

/**
 * A unified data object for WordPress plugins and themes.
 *
 * This class inspects a given file path to determine if it's a plugin or theme
 * and populates its properties with relevant metadata like name, version, author,
 * and paths.
 *
 * @since 1.0.0
 */
class Data {

	/** @var string The absolute path to the main plugin/theme file. */
	public string $file = '';

	/** @var string The absolute path to the plugin/theme directory. */
	public string $dir = '';

	/** @var string The plugin/theme basename (e.g., 'my-plugin/my-plugin.php'). */
	public string $basename = '';

	/** @var string The URL to the plugin/theme directory. */
	public string $url = '';

	/** @var string The slug (text domain) of the plugin/theme. */
	public string $slug = '';

	/** @var string The name of the plugin/theme. */
	public string $name = '';

	/** @var string The description of the plugin/theme. */
	public string $description = '';

	/** @var string The author of the plugin/theme. */
	public string $author = '';

	/** @var string The author's website URL. */
	public string $author_uri = '';

	/** @var string The version number of the plugin/theme. */
	public string $version = '';

	/** @var string The minimum required PHP version. */
	public string $min_php = '';

	/** @var string The minimum required WordPress version. */
	public string $min_wp = '';

	/** @var string The path to the language files. */
	public string $domain_path = '';

	/** @var string The plugin/theme's website URL. */
	public string $uri = '';

	/** @var string The update URI for custom update checks. */
	public string $update_uri = '';

	/**
	 * Initializes the data object by determining the source type (plugin or theme)
	 * and populating the properties accordingly.
	 *
	 * @param string $file The absolute path to the main plugin or theme file.
	 */
	public function __construct( string $file ) {
		// Populate metadata from a plugin file path.
		if ( str_contains( $file, 'content/plugins' ) ) {
			if ( ! function_exists( 'get_plugin_data' ) ) {
				require_once ABSPATH . 'wp-admin/includes/plugin.php';
			}

			$this->from_plugin( $file, get_plugin_data( $file ) );
		} elseif ( str_contains( $file, 'content/themes' ) ) {
			// Populate metadata from the active theme.
			$this->from_theme( wp_get_theme( get_template() ) );
		}
	}

	/**
	 * Static factory to create or retrieve a cached instance of the Data object.
	 *
	 * This prevents redundant object creation for the same file.
	 *
	 * @param string $file The absolute path to the main plugin or theme file.
	 *
	 * @return self The Data object instance.
	 */
	public static function from( string $file ): self {
		// Static cache to hold Data instances.
		static $instances = [];

		// If no instance exists for this file, create and store it.
		if ( ! isset( $instances[ $file ] ) ) {
			$instances[ $file ] = new self( $file );
		}

		// Return the existing or newly created instance.
		return $instances[ $file ];
	}

	/**
	 * Populates the object properties from plugin data.
	 *
	 * @param string $file The absolute path to the main plugin file.
	 * @param array  $data The data extracted from the plugin's header.
	 *
	 * @return void
	 */
	private function from_plugin( string $file, array $data ): void {
		// Set path and URL properties from the plugin file.
		$this->file        = $file;
		$this->dir         = trailingslashit( dirname( $file ) );
		$this->url         = trailingslashit( plugin_dir_url( $file ) );
		$this->basename    = plugin_basename( $file );
		// Map plugin header fields to object properties.
		$this->name        = $data['Name'] ?? '';
		$this->slug        = $data['TextDomain'] ?? '';
		$this->description = $data['Description'] ?? '';
		$this->author      = strip_tags( $data['Author'] ?? '' );
		$this->author_uri  = $data['AuthorURI'] ?? '';
		$this->version     = $data['Version'] ?? '';
		$this->uri         = $data['PluginURI'] ?? '';
		$this->domain_path = $data['DomainPath'] ?? '';
		$this->min_wp      = $data['RequiresWP'] ?? '';
		$this->min_php     = $data['RequiresPHP'] ?? '';
		$this->update_uri  = $data['UpdateURI'] ?? '';
	}

	/**
	 * Populates the object properties from a WP_Theme object.
	 *
	 * @param WP_Theme $theme The theme object.
	 *
	 * @return void
	 */
	private function from_theme( WP_Theme $theme ): void {
		// Set path and URL properties from the theme object.
		$this->dir         = trailingslashit( $theme->get_template_directory() );
		$this->url         = trailingslashit( $theme->get_template_directory_uri() );
		$this->slug        = $theme->get_template();
		$this->file        = $this->dir . DIRECTORY_SEPARATOR . $this->slug . '.php';
		$this->basename    = basename( $this->dir ) . DIRECTORY_SEPARATOR . basename( $this->file );
		// Map theme header fields to object properties.
		$this->name        = $theme->get( 'Name' );
		$this->description = $theme->get( 'Description' );
		$this->author      = $theme->get( 'Author' );
		$this->author_uri  = $theme->get( 'AuthorURI' );
		$this->version     = $theme->get( 'Version' );
		$this->min_php     = $theme->get( 'RequiresPHP' );
		$this->min_wp      = $theme->get( 'RequiresWP' );
		$this->uri         = $theme->get( 'ThemeURI' );
		$this->domain_path = $theme->get( 'DomainPath' );
		$this->update_uri  = $theme->get( 'UpdateURI' );
	}
}
