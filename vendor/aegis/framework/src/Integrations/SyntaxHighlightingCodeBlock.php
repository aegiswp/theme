<?php
/**
 * Syntax Highlighting Code Block Integration Component
 *
 * Overlay CSS and optional theme.json highlight.js theme lock for
 * Weston Ruter’s Syntax Highlighting Code Block plugin.
 *
 * @package    Aegis\Framework\Integrations
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 */

declare( strict_types=1 );

namespace Aegis\Framework\Integrations;

use Aegis\Container\Interfaces\Conditional;
use Aegis\Framework\InlineAssets\Styleable;
use Aegis\Framework\InlineAssets\Styles;
use function class_exists;
use function defined;
use function function_exists;
use function is_array;
use function is_string;
use function wp_get_global_settings;

class SyntaxHighlightingCodeBlock implements Conditional, Styleable {

	/**
	 * Condition.
	 *
	 * Prefer the plugin helper when the Aegis plugin is loaded.
	 *
	 * @since 1.0.0
	 *
	 * @return bool
	 */
	public static function condition(): bool {
		if ( class_exists( \Aegis\Plugin\Integrations\SyntaxHighlighting::class ) ) {
			return \Aegis\Plugin\Integrations\SyntaxHighlighting::is_plugin_active();
		}

		return defined( 'Syntax_Highlighting_Code_Block\\PLUGIN_VERSION' )
			|| function_exists( 'Syntax_Highlighting_Code_Block\\boot' );
	}

	/**
	 * Lock the highlight.js theme from theme.json when `custom.highlightJs` is set.
	 *
	 * Hooking `syntax_highlighting_code_block_style` hides the plugin’s
	 * Customizer theme picker, so only register when the theme actually
	 * defines a stylesheet name.
	 *
	 * @since 1.0.0
	 *
	 * @hook  after_setup_theme
	 *
	 * @return void
	 */
	public function maybe_lock_highlight_theme(): void {
		if ( $this->theme_json_highlight_js() === null ) {
			return;
		}

		add_filter( 'syntax_highlighting_code_block_style', [ $this, 'set_syntax_highlighting_code_theme' ] );
	}

	/**
	 * Set syntax highlighting colors defined in theme.json.
	 *
	 * @since 1.0.0
	 *
	 * @param string $theme The plugin default theme name.
	 *
	 * @return string
	 */
	public function set_syntax_highlighting_code_theme( string $theme ): string {
		$from_theme = $this->theme_json_highlight_js();

		return $from_theme ?? $theme;
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
			[
				'hljs',
				'shcb-',
			]
		);
	}

	/**
	 * Highlight.js stylesheet name from theme.json `settings.custom.highlightJs`.
	 */
	private function theme_json_highlight_js(): ?string {
		$custom = wp_get_global_settings()['custom'] ?? [];

		if ( ! is_array( $custom ) ) {
			return null;
		}

		$value = $custom['highlightJs'] ?? null;

		return is_string( $value ) && $value !== '' ? $value : null;
	}
}
