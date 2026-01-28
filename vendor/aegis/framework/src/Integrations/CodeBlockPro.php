<?php
/**
 * Code Block Pro Integration Component
 *
 * Provides support for integrating Code Block Pro plugin compatibility in the Aegis Framework.
 *
 * Responsibilities:
 * - Checks for Code Block Pro plugin presence and conditionally registers styles
 * - Integrates with the Aegis container and inline assets system
 *
 * @package    Aegis\Framework\Integrations
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for integration components.
declare(strict_types=1);

// Declares the namespace for integration components within the Aegis Framework.
namespace Aegis\Framework\Integrations;

// Imports interfaces and helpers for conditional logic and inline assets.
use Aegis\Container\Interfaces\Conditional;
use Aegis\Framework\InlineAssets\Styleable;
use Aegis\Framework\InlineAssets\Styles;
use function defined;

// Implements the Code Block Pro integration class for the design system.

class CodeBlockPro implements Conditional, Styleable
{

	/**
	 * Condition.
	 *
	 * @since 1.0.0
	 *
	 * @return bool
	 */
	public static function condition(): bool
	{
		return defined('CODE_BLOCK_PRO_VERSION');
	}

	/**
	 * Register styles.
	 *
	 * @since 1.0.0
	 *
	 * @param Styles $styles The styles instance.
	 *
	 * @return void
	 */
	public function styles(Styles $styles): void
	{
		$styles->add_file(
			'plugins/code-block-pro.css',
			['wp-block-kevinbatdorf-code-block-pro'],
			static::condition()
		);
	}
}
