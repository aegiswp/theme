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
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for inline asset management.
declare(strict_types=1);

// Declares the namespace for inline assets components within the Aegis Framework.
namespace Aegis\Framework\InlineAssets;

// Declares the Scriptable interface for script registration in the design system.

interface Scriptable
{

	/**
	 * Register scripts.
	 *
	 * @since 1.0.0
	 *
	 * @param Scripts $scripts Inlinable service.
	 *
	 * @return void
	 */
	public function scripts(Scripts $scripts): void;

}
