<?php
/**
 * Inlinable Interface
 *
 * Defines the contract for classes that support inline asset management in the Aegis Framework.
 *
 * Responsibilities:
 * - Ensures implementing classes provide methods for adding and registering inline assets
 * - Supports both file-based and callback-based asset registration
 *
 * @package    Aegis\Framework\InlineAssets
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for inline asset management.
declare( strict_types=1 );

// Declares the namespace for inline assets components within the Aegis Framework.
namespace Aegis\Framework\InlineAssets;

// Declares the Inlinable interface for asset management in the design system.

interface Inlinable {

	/**
	 * Inline asset constructor.
	 *
	 * @param string $file Main plugin or theme file.
	 *
	 * @return void
	 */
	public function __construct( string $file );

	/**
	 * Register inline styles from file.
	 *
	 * @since 1.0.0
	 *
	 * @param string $file      Callable with access to template HTML.
	 * @param array  $strings   Array of strings to check for in the template HTML.
	 * @param bool   $condition Condition to check for.
	 *
	 * @return self
	 */
	public function add_file( string $file, array $strings = [], bool $condition = true ): self;

	/**
	 * Register inline styles from callback.
	 *
	 * @since 1.0.0
	 *
	 * @param callable $callback Receives $template_html, $load_all and $styles.
	 *
	 * @return self
	 */
	public function add_callback( callable $callback ): self;

	/**
	 * Register inline styles from string.
	 *
	 * @since 1.0.0
	 *
	 * @param string $string  String to add to the template HTML.
	 * @param array  $strings Array of strings to check for in the template HTML.
	 *
	 * @return self
	 */
	public function add_string( string $string, array $strings = [] ): self;

	/**
	 * Enqueue inline assets.
	 *
	 * @hook enqueue_block_assets
	 *
	 * @return void
	 */
	public function enqueue(): void;

}
