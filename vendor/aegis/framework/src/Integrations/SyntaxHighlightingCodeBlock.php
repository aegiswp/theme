<?php
/**
 * SyntaxHighlightingCodeBlock Integration Component
 *
 * Provides support for integrating Syntax Highlighting Code Block plugin compatibility in the Aegis Framework.
 *
 * Responsibilities:
 * - Checks for Syntax Highlighting Code Block plugin presence and conditionally sets theme colors
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
declare( strict_types=1 );

// Declares the namespace for integration components within the Aegis Framework.
namespace Aegis\Framework\Integrations;

// Imports interfaces and helpers for conditional logic, inline assets, and global settings.
use Aegis\Container\Interfaces\Conditional;
use Aegis\Framework\InlineAssets\Styleable;
use Aegis\Framework\InlineAssets\Styles;
use function defined;
use function wp_get_global_settings;

// Implements the SyntaxHighlightingCodeBlock integration class for the design system.

class SyntaxHighlightingCodeBlock implements Conditional, Styleable {

	/**
	 * Condition.
	 *
	 * @since 1.0.0
	 *
	 * @return bool
	 */
	public static function condition(): bool {
		return defined( '\\Syntax_Highlighting_Code_Block\\PLUGIN_VERSION' );
	}

	/**
	 * Set syntax highlighting colors defined in theme.json.
	 *
	 * @since 1.0.0
	 *
	 * @param string $theme The theme to use.
	 *
	 * @hook  syntax_highlighting_code_block_style
	 *
	 * @return string
	 */
	public function set_syntax_highlighting_code_theme( string $theme ): string {
		$global_settings = wp_get_global_settings();

		return $global_settings['custom']['highlightJs'] ?? 'atom-one-dark';
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
	public function styles( Styles $styles ): void {
		$styles->add_file(
			'plugins/syntax-highlighting-code-block.css',
			[ 'wp-block-code' ],
			static::condition()
		);
	}

}
