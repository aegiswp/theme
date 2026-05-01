<?php
/**
 * Configuration Manager for loading and merging configurations.
 *
 * @package WPAudit
 */

declare( strict_types=1 );

namespace WPAudit;

use WPAudit\Models\Configuration;
use WPAudit\Utils\ArrayUtils;
use InvalidArgumentException;
use RuntimeException;

/**
 * Manages configuration loading, merging, and persistence.
 */
class ConfigurationManager {
	/**
	 * Default configuration file name.
	 */
	private const CONFIG_FILE = '.wpauditrc.json';

	/**
	 * Load default configuration.
	 *
	 * @return Configuration Default configuration instance.
	 */
	public function load_defaults(): Configuration {
		return new Configuration( array(), false );
	}

	/**
	 * Load configuration from file.
	 *
	 * @param string $file_path Path to configuration file.
	 * @return Configuration Configuration instance.
	 * @throws RuntimeException If file cannot be read or parsed.
	 * @throws InvalidArgumentException If configuration is invalid.
	 */
	public function load_from_file( string $file_path ): Configuration {
		if ( ! file_exists( $file_path ) ) {
			throw new RuntimeException( "Configuration file not found: {$file_path}" );
		}

		if ( ! is_readable( $file_path ) ) {
			throw new RuntimeException( "Configuration file is not readable: {$file_path}" );
		}

		$content = file_get_contents( $file_path );
		if ( false === $content ) {
			throw new RuntimeException( "Failed to read configuration file: {$file_path}" );
		}

		$data = json_decode( $content, true );
		if ( null === $data && JSON_ERROR_NONE !== json_last_error() ) {
			throw new RuntimeException(
				sprintf(
					'Failed to parse configuration file: %s (Error: %s)',
					$file_path,
					json_last_error_msg()
				)
			);
		}

		return Configuration::from_array( $data );
	}

	/**
	 * Load configuration from project directory.
	 *
	 * Looks for .wpauditrc.json in the specified directory.
	 *
	 * @param string $project_path Path to project directory.
	 * @return Configuration|null Configuration instance or null if not found.
	 * @throws RuntimeException If file exists but cannot be read or parsed.
	 * @throws InvalidArgumentException If configuration is invalid.
	 */
	public function load_from_project( string $project_path ): ?Configuration {
		$config_file = rtrim( $project_path, '/' ) . '/' . self::CONFIG_FILE;

		if ( ! file_exists( $config_file ) ) {
			return null;
		}

		return $this->load_from_file( $config_file );
	}

	/**
	 * Merge multiple configurations with proper precedence.
	 *
	 * Later configurations in the array take precedence over earlier ones.
	 * CLI options > project config > defaults.
	 *
	 * @param Configuration ...$configs Configurations to merge (in order of precedence).
	 * @return Configuration Merged configuration.
	 */
	public function merge( Configuration ...$configs ): Configuration {
		if ( empty( $configs ) ) {
			return $this->load_defaults();
		}

		$merged_data = array();

		foreach ( $configs as $config ) {
			$merged_data = ArrayUtils::merge_recursive_distinct(
				$merged_data,
				$config->to_array()
			);
		}

		return Configuration::from_array( $merged_data, false );
	}

	/**
	 * Save configuration to file.
	 *
	 * @param Configuration $config      Configuration to save.
	 * @param string        $file_path   Path to save configuration file.
	 * @param bool          $pretty_print Whether to format JSON with indentation.
	 * @return bool True on success.
	 * @throws RuntimeException If file cannot be written.
	 */
	public function save( Configuration $config, string $file_path, bool $pretty_print = true ): bool {
		$data = $config->to_array();

		$flags = 0;
		if ( $pretty_print ) {
			$flags = JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES;
		}

		$json = json_encode( $data, $flags );
		if ( false === $json ) {
			throw new RuntimeException(
				sprintf(
					'Failed to encode configuration: %s',
					json_last_error_msg()
				)
			);
		}

		// Ensure directory exists.
		$dir = dirname( $file_path );
		if ( ! is_dir( $dir ) ) {
			if ( ! mkdir( $dir, 0755, true ) && ! is_dir( $dir ) ) {
				throw new RuntimeException( "Failed to create directory: {$dir}" );
			}
		}

		$result = file_put_contents( $file_path, $json );
		if ( false === $result ) {
			throw new RuntimeException( "Failed to write configuration file: {$file_path}" );
		}

		return true;
	}

	/**
	 * Load configuration with precedence: CLI > project > defaults.
	 *
	 * @param string|null $project_path Path to project directory.
	 * @param array       $cli_options  CLI options to override.
	 * @return Configuration Merged configuration.
	 */
	public function load( ?string $project_path = null, array $cli_options = array() ): Configuration {
		$configs = array();

		// Start with defaults.
		$configs[] = $this->load_defaults();

		// Load project configuration if available.
		if ( null !== $project_path ) {
			$project_config = $this->load_from_project( $project_path );
			if ( null !== $project_config ) {
				$configs[] = $project_config;
			}
		}

		// Apply CLI options.
		if ( ! empty( $cli_options ) ) {
			$configs[] = Configuration::from_array( $cli_options, false );
		}

		return $this->merge( ...$configs );
	}

}
