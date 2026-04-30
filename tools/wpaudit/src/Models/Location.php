<?php
/**
 * Location model for audit findings.
 *
 * @package WPAudit
 */

declare( strict_types=1 );

namespace WPAudit\Models;

/**
 * Represents a location in a file (file path, line number, column).
 */
class Location {
	/**
	 * File path.
	 *
	 * @var string
	 */
	public string $file;

	/**
	 * Line number (1-indexed).
	 *
	 * @var int
	 */
	public int $line;

	/**
	 * Column number (1-indexed, optional).
	 *
	 * @var int|null
	 */
	public ?int $column;

	/**
	 * Constructor.
	 *
	 * @param string   $file   File path.
	 * @param int      $line   Line number.
	 * @param int|null $column Column number (optional).
	 */
	public function __construct( string $file, int $line = 1, ?int $column = null ) {
		$this->file   = $file;
		$this->line   = $line;
		$this->column = $column;
	}

	/**
	 * Convert to array.
	 *
	 * @return array Associative array representation.
	 */
	public function to_array(): array {
		$data = array(
			'file' => $this->file,
			'line' => $this->line,
		);

		if ( null !== $this->column ) {
			$data['column'] = $this->column;
		}

		return $data;
	}

	/**
	 * Create from array.
	 *
	 * @param array $data Associative array with location data.
	 * @return self New Location instance.
	 */
	public static function from_array( array $data ): self {
		return new self(
			$data['file'] ?? '',
			$data['line'] ?? 1,
			$data['column'] ?? null
		);
	}
}
