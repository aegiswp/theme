<?php
/**
 * Styleable Interface
 *
 * Defines the contract for classes that support style registration in the Aegis Framework.
 *
 * Responsibilities:
 * - Ensures implementing classes provide a method for registering styles
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
 * Defines the contract for classes that can register their own CSS assets.
 *
 * Any class that needs to add styles to the page should implement this interface.
 * The main `Aegis` class will then identify these classes and call their `styles`
 * method, passing the central `Styles` service instance. This allows for a
 * decentralized yet organized way of managing style assets across the theme.
 *
 * @package Aegis\Framework\InlineAssets
 * @since   1.0.0
 */
interface Styleable {

	/**
	 * Registers styles with the central Styles service.
	 *
	 * This method is the designated place for a class to register its
	 * CSS files or inline style blocks using the provided `Styles` service
	 * instance.
	 *
	 * @since 1.0.0
	 *
	 * @param Styles $styles The central `Styles` service instance, used to
	 *                       add files and strings.
	 *
	 * @return void
	 */
	public function styles( Styles $styles ): void;

}
