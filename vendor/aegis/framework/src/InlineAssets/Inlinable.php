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

/**
 * Defines the contract for classes that manage inlineable assets (CSS or JS).
 *
 * This interface ensures that any class responsible for handling inline assets,
 * such as the `Styles` or `Scripts` services, adheres to a consistent API for
 * registering and enqueueing those assets.
 *
 * @package Aegis\Framework\InlineAssets
 * @since   1.0.0
 */
interface Inlinable {

	/**
	 * Constructor that sets up the asset manager's context.
	 *
	 * @param string $file The full path to the main theme or plugin file (e.g., __FILE__),
	 *                     used to determine asset paths and URLs.
	 */
	public function __construct( string $file );

	/**
	 * Registers an asset file for conditional loading.
	 *
	 * @since 1.0.0
	 *
	 * @param string $file      The name of the file inside the `public/{type}` directory.
	 * @param array  $strings   Optional. An array of substrings to look for in the page's HTML.
	 *                          The asset will only be loaded if one of these strings is found.
	 * @param bool   $condition Optional. A boolean that must be true for the asset to be loaded.
	 *
	 * @return self Returns the instance for method chaining.
	 */
	public function add_file( string $file, array $strings = [], bool $condition = true ): self;

	/**
	 * Registers a callback function that dynamically generates asset content.
	 *
	 * @since 1.0.0
	 *
	 * @param callable $callback The function to call. It will receive the page HTML, a
	 *                           `$load_all` flag, and the current class instance. It
	 *                           should return a string of CSS or JS.
	 *
	 * @return self Returns the instance for method chaining.
	 */
	public function add_callback( callable $callback ): self;

	/**
	 * Registers a raw string of CSS or JavaScript for conditional inclusion.
	 *
	 * @since 1.0.0
	 *
	 * @param string $string  The raw CSS or JavaScript code to add.
	 * @param array  $strings Optional. An array of substrings to look for in the page's HTML.
	 *                        The string will only be added if one of these is found.
	 *
	 * @return self Returns the instance for method chaining.
	 */
	public function add_string( string $string, array $strings = [] ): self;

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
	public function enqueue(): void;

}
