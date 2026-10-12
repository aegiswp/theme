<?php
/**
 * ThemeFile model representing a theme file.
 *
 * @package WPAudit
 */

declare( strict_types=1 );

namespace WPAudit\Models;

use WPAudit\Enums\FileType;

/**
 * Represents a WordPress theme file.
 */
class ThemeFile {
	/**
	 * Relative path from theme root.
	 *
	 * @var string
	 */
	public string $path;

	/**
	 * Full filesystem path.
	 *
	 * @var string
	 */
	public string $absolute_path;

	/**
	 * File type.
	 *
	 * @var string
	 */
	public string $type;

	/**
	 * File contents.
	 *
	 * @var string
	 */
	public string $content;

	/**
	 * Parsed AST (for PHP/JS files).
	 *
	 * @var array|null
	 */
	public ?array $ast;

	/**
	 * Additional file metadata.
	 *
	 * @var array
	 */
	public array $metadata;

	/**
	 * Constructor.
	 *
	 * @param string $path          Relative path from theme root.
	 * @param string $absolute_path Full filesystem path.
	 * @param string $content       File contents.
	 * @param string $type          File type (optional, auto-detected if not provided).
	 * @param array  $metadata      Additional metadata (optional).
	 */
	public function __construct(
		string $path,
		string $absolute_path,
		string $content,
		string $type = '',
		array $metadata = array()
	) {
		$this->path          = $path;
		$this->absolute_path = $absolute_path;
		$this->content       = $content;
		$this->type          = $type ?: FileType::from_filename( $path );
		$this->ast           = null;
		$this->metadata      = $metadata;
	}

	/**
	 * Get file extension.
	 *
	 * @return string File extension (lowercase).
	 */
	public function get_extension(): string {
		return strtolower( pathinfo( $this->path, PATHINFO_EXTENSION ) );
	}

	/**
	 * Check if this is a template file.
	 *
	 * @return bool True if template file.
	 */
	public function is_template(): bool {
		// WordPress template files are typically in root or templates/ directory.
		$template_patterns = array(
			'/^(index|single|page|archive|search|404|front-page|home)\.php$/',
			'/^templates\/.*\.html$/',
			'/^parts\/.*\.html$/',
			'/^patterns\/.*\.php$/',
		);

		foreach ( $template_patterns as $pattern ) {
			if ( preg_match( $pattern, $this->path ) ) {
				return true;
			}
		}

		return false;
	}

	/**
	 * Check if this is a partial/template part.
	 *
	 * @return bool True if partial file.
	 */
	public function is_partial(): bool {
		$partial_patterns = array(
			'/^parts\//',
			'/^template-parts\//',
			'/^partials\//',
		);

		foreach ( $partial_patterns as $pattern ) {
			if ( preg_match( $pattern, $this->path ) ) {
				return true;
			}
		}

		return false;
	}

	/**
	 * Get related files (e.g., CSS for a PHP template).
	 *
	 * @return array Array of potential related file paths.
	 */
	public function get_related_files(): array {
		$related = array();
		$base    = pathinfo( $this->path, PATHINFO_FILENAME );
		$dir     = pathinfo( $this->path, PATHINFO_DIRNAME );

		// For PHP files, look for corresponding CSS/JS.
		if ( FileType::PHP === $this->type ) {
			$related[] = $dir . '/' . $base . '.css';
			$related[] = $dir . '/' . $base . '.js';
		}

		return $related;
	}

	/**
	 * Set parsed AST.
	 *
	 * @param array $ast Parsed abstract syntax tree.
	 * @return void
	 */
	public function set_ast( array $ast ): void {
		$this->ast = $ast;
	}

	/**
	 * Check if AST is available.
	 *
	 * @return bool True if AST is parsed and available.
	 */
	public function has_ast(): bool {
		return null !== $this->ast;
	}
}
