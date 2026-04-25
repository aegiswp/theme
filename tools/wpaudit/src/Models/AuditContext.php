<?php
/**
 * AuditContext model for shared audit context.
 *
 * @package WPAudit
 */

declare( strict_types=1 );

namespace WPAudit\Models;

/**
 * Shared context for analyzers during audit execution.
 */
class AuditContext {
	/**
	 * Configuration object.
	 *
	 * @var Configuration
	 */
	public Configuration $config;

	/**
	 * Theme metadata.
	 *
	 * @var ThemeMetadata
	 */
	public ThemeMetadata $theme;

	/**
	 * File registry.
	 *
	 * @var FileRegistry
	 */
	public FileRegistry $files;

	/**
	 * Shared data between analyzers.
	 *
	 * @var array
	 */
	public array $shared_data;

	/**
	 * Constructor.
	 *
	 * @param Configuration $config      Configuration object.
	 * @param ThemeMetadata $theme       Theme metadata.
	 * @param FileRegistry  $files       File registry.
	 * @param array         $shared_data Shared data (optional).
	 */
	public function __construct(
		Configuration $config,
		ThemeMetadata $theme,
		FileRegistry $files,
		array $shared_data = array()
	) {
		$this->config      = $config;
		$this->theme       = $theme;
		$this->files       = $files;
		$this->shared_data = $shared_data;
	}

	/**
	 * Get theme root directory.
	 *
	 * @return string Theme root path.
	 */
	public function get_theme_root(): string {
		return $this->theme->root_path;
	}

	/**
	 * Check if a file is excluded by configuration.
	 *
	 * @param string $path File path to check.
	 * @return bool True if file should be excluded.
	 */
	public function is_file_excluded( string $path ): bool {
		$exclusions = $this->config->get( 'exclusions.files', array() );

		foreach ( $exclusions as $pattern ) {
			if ( fnmatch( $pattern, $path ) ) {
				return true;
			}
		}

		return false;
	}

	/**
	 * Get rule configuration.
	 *
	 * @param string $rule_id Rule identifier (e.g., 'perf-001').
	 * @return array|null Rule configuration or null if not found.
	 */
	public function get_rule_config( string $rule_id ): ?array {
		// Extract category from rule ID (e.g., 'perf' from 'perf-001').
		$parts = explode( '-', $rule_id );
		if ( count( $parts ) < 2 ) {
			return null;
		}

		$category_map = array(
			'perf'   => 'performance',
			'seo'    => 'seo',
			'a11y'   => 'accessibility',
			'sec'    => 'security',
			'scale'  => 'scalability',
		);

		$category = $category_map[ $parts[0] ] ?? null;
		if ( ! $category ) {
			return null;
		}

		return $this->config->get( "categories.{$category}.rules.{$rule_id}" );
	}

	/**
	 * Set shared data.
	 *
	 * @param string $key   Data key.
	 * @param mixed  $value Data value.
	 * @return void
	 */
	public function set_shared( string $key, $value ): void {
		$this->shared_data[ $key ] = $value;
	}

	/**
	 * Get shared data.
	 *
	 * @param string $key     Data key.
	 * @param mixed  $default Default value if key not found.
	 * @return mixed Data value or default.
	 */
	public function get_shared( string $key, $default = null ) {
		return $this->shared_data[ $key ] ?? $default;
	}
}
