<?php
/**
 * Renderable Interface
 *
 * Defines the contract for objects that can be rendered as part of the Aegis Framework block system.
 *
 * Responsibilities:
 * - Provides a standard render method for block content
 * - Ensures compatibility with WordPress block and instance structures
 *
 * @package    Aegis\Framework\Interfaces
 * @since      1.0.0
 * @author     @atmostfear-entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for interface contracts.
declare( strict_types=1 );

// Declares the namespace for interfaces within the Aegis Framework.
namespace Aegis\Framework\Interfaces;

// Imports the WP_Block class for block instance typing.
use WP_Block;

/**
 * Defines a contract for classes that render WordPress blocks.
 *
 * This interface is designed to be used by classes that are responsible for
 * outputting the final HTML of a WordPress block. Its `render` method signature
 * matches the arguments provided by the `render_block` filter, allowing for a
 * standardized, object-oriented approach to block rendering logic.
 *
 * @package Aegis\Framework\Interfaces
 * @since   1.0.0
 */
interface Renderable {

	/**
	 * Renders a WordPress block.
	 *
	 * This method is intended to be used as a callback for the `render_block`
	 * WordPress filter. It receives the block's content and context, and should
	 * return the final, modified HTML for the block.
	 *
	 * @since 1.0.0
	 *
	 * @param string   $block_content The original, pre-rendered content of the block.
	 * @param array    $block         The full block object, including its name, attributes, and inner blocks.
	 * @param WP_Block $instance      The block instance, providing access to block properties and methods.
	 *
	 * @return string The modified block content.
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string;

}
