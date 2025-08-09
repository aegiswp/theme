<?php
/**
 * Scriptable Interface
 *
 * Defines the contract for classes that support script registration in the Aegis Framework.
 *
 * Responsibilities:
 * - Ensures implementing classes provide a method for registering scripts
 * - Integrates with the Aegis inline assets system
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
 * Defines the contract for classes that can register their own JavaScript assets.
 *
 * Any class that needs to add scripts to the page should implement this interface.
 * The main `Aegis` class will then identify these classes and call their `scripts`
 * method, passing the central `Scripts` service instance. This allows for a
 * decentralized yet organized way of managing script assets across the theme.
 *
 * @package Aegis\Framework\InlineAssets
 * @since   1.0.0
 */
interface Scriptable {

	/**
	 * Registers scripts with the central Scripts service.
	 *
	 * This method is the designated place for a class to register its
	 * JavaScript files, inline scripts, or localized data using the provided
	 * `Scripts` service instance.
	 *
	 * @since 1.0.0
	 *
	 * @param Scripts $scripts The central `Scripts` service instance, used to
	 *                         add files, strings, and data.
	 *
	 * @return void
	 */
	public function scripts( Scripts $scripts ): void;

}
