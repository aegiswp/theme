<?php
/**
 * FileRegistry model for managing theme files.
 *
 * @package WPAudit
 */

declare( strict_types=1 );

namespace WPAudit\Models;

/**
 * Registry of theme files for the audit.
 */
class FileRegistry {
	/**
	 * Registered files.
	 *
	 * @var ThemeFile[]
	 */
	private array $files;

	/**
	 * Constructor.
	 *
	 * @param ThemeFile[] $files Array of theme files.
	 */
	public function __construct( array $files = array() ) {
		$this->files = $files;
	}

	/**
	 * Add a file to the registry.
	 *
	 * @param ThemeFile $file File to add.
	 * @return void
	 */
	public function add( ThemeFile $file ): void {
		$this->files[] = $file;
	}

	/**
	 * Get all files.
	 *
	 * @return ThemeFile[] All registered files.
	 */
	public function get_all(): array {
		return $this->files;
	}

	/**
	 * Get files by type.
	 *
	 * @param string $type File type.
	 * @return ThemeFile[] Filtered files.
	 */
	public function get_by_type( string $type ): array {
		return array_filter(
			$this->files,
			function ( ThemeFile $file ) use ( $type ) {
				return $file->type === $type;
			}
		);
	}

	/**
	 * Get file by path.
	 *
	 * @param string $path File path.
	 * @return ThemeFile|null File or null if not found.
	 */
	public function get_by_path( string $path ): ?ThemeFile {
		foreach ( $this->files as $file ) {
			if ( $file->path === $path ) {
				return $file;
			}
		}
		return null;
	}

	/**
	 * Get total file count.
	 *
	 * @return int Number of files.
	 */
	public function count(): int {
		return count( $this->files );
	}
}
