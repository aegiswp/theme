<?php
/**
 * ThemeMetadata model for theme information.
 *
 * @package WPAudit
 */

declare( strict_types=1 );

namespace WPAudit\Models;

/**
 * Metadata about the WordPress theme being audited.
 */
class ThemeMetadata {
	/**
	 * Theme name.
	 *
	 * @var string
	 */
	public string $name;

	/**
	 * Theme version.
	 *
	 * @var string
	 */
	public string $version;

	/**
	 * Theme root path.
	 *
	 * @var string
	 */
	public string $root_path;

	/**
	 * Whether this is a block theme.
	 *
	 * @var bool
	 */
	public bool $is_block_theme;

	/**
	 * Additional metadata.
	 *
	 * @var array
	 */
	public array $metadata;

	/**
	 * Constructor.
	 *
	 * @param string $name           Theme name.
	 * @param string $version        Theme version.
	 * @param string $root_path      Theme root path.
	 * @param bool   $is_block_theme Whether this is a block theme.
	 * @param array  $metadata       Additional metadata (optional).
	 */
	public function __construct(
		string $name,
		string $version,
		string $root_path,
		bool $is_block_theme = false,
		array $metadata = array()
	) {
		$this->name           = $name;
		$this->version        = $version;
		$this->root_path      = $root_path;
		$this->is_block_theme = $is_block_theme;
		$this->metadata       = $metadata;
	}

	/**
	 * Convert to array.
	 *
	 * @return array Associative array representation.
	 */
	public function to_array(): array {
		return array(
			'name'         => $this->name,
			'version'      => $this->version,
			'rootPath'     => $this->root_path,
			'isBlockTheme' => $this->is_block_theme,
			'metadata'     => $this->metadata,
		);
	}

	/**
	 * Create from theme directory.
	 *
	 * @param string $theme_path Path to theme directory.
	 * @return self New ThemeMetadata instance.
	 */
	public static function from_directory( string $theme_path ): self {
		$name           = basename( $theme_path );
		$version        = '1.0.0';
		$is_block_theme = false;

		// Check for theme.json (indicates block theme).
		if ( file_exists( $theme_path . '/theme.json' ) ) {
			$is_block_theme = true;
		}

		// Try to read style.css for theme metadata.
		$style_css = $theme_path . '/style.css';
		if ( file_exists( $style_css ) ) {
			$content = file_get_contents( $style_css );
			if ( preg_match( '/Theme Name:\s*(.+)/i', $content, $matches ) ) {
				$name = trim( $matches[1] );
			}
			if ( preg_match( '/Version:\s*(.+)/i', $content, $matches ) ) {
				$version = trim( $matches[1] );
			}
		}

		return new self( $name, $version, $theme_path, $is_block_theme );
	}
}
