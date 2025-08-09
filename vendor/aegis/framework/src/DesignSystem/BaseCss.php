<?php
/**
 * Base CSS Component
 *
 * Provides support for registering and managing base CSS stylesheets within the Aegis Framework.
 *
 * Responsibilities:
 * - Registers core CSS files and style groups for the design system
 * - Integrates with the styles service for dynamic stylesheet loading
 *
 * @package    Aegis\Framework\DesignSystem
 * @since      1.0.0
 * @author     @atmostfear-entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for design system components.
declare( strict_types=1 );

// Declares the namespace for design system components within the Aegis Framework.
namespace Aegis\Framework\DesignSystem;

// Imports interfaces and helpers for styling, stylesheet management, and debugging.
use Aegis\Framework\InlineAssets\Styleable;
use Aegis\Framework\InlineAssets\Styles;
use Aegis\Utilities\Debug;
use function function_exists;

// Implements the BaseCss class to support base CSS registration and management.

/**
 * Handles the conditional loading of all modular CSS files.
 *
 * This class is the central registry for the theme's stylesheets. It uses a
 * conditional loading system, managed by the `Styles` service, to ensure that
 * CSS files are only enqueued on pages where their corresponding elements,
 * classes, or styles are actually present. This is a major performance
 * optimization.
 *
 * @package Aegis\Framework\DesignSystem
 * @since   1.0.0
 */
class BaseCss implements Styleable {

	/**
	 * Registers all conditional stylesheets with the Styles service.
	 *
	 * This method retrieves a large mapping of stylesheets to their trigger
	 * strings and registers each one with the `Styles` service.
	 *
	 * @since 1.0.0
	 *
	 * @param Styles $styles The Styles service instance.
	 */
	public function styles( Styles $styles ): void {
		$style_groups = $this->get_stylesheets();

		foreach ( $style_groups as $group => $stylesheets ) {
			foreach ( $stylesheets as $name => $strings ) {
				$styles->add_file( $group . '/' . $name . '.css', $strings );
			}
		}
	}

	/**
	 * Defines the mapping of CSS files to their conditional triggers.
	 *
	 * This method returns a structured array that serves as the configuration
	 * for the conditional CSS loading system.
	 *
	 * The structure is:
	 * `['group' => ['filename' => ['trigger_string_1', 'trigger_string_2']]]`
	 *
	 * A stylesheet (e.g., `elements/anchor.css`) will only be loaded if one of
	 * its trigger strings (e.g., '<a') is found in the page's HTML content.
	 * An empty array of triggers means the file will always be loaded.
	 *
	 * @since 1.0.0
	 *
	 * @return array The array of stylesheet configurations.
	 */
	private function get_stylesheets(): array {
		$styles = [];

		// --- Base HTML element styles ---
		$styles['elements'] = [
			'all'        => [],
			'anchor'     => [ '<a' ],
			'big'        => [ '<big' ],
			'blockquote' => [ '<blockquote' ],
			'body'       => [],
			'button'     => [ '<button', 'type="button"', 'type="submit"', 'type="reset"', 'nf-form', 'wp-element-button' ],
			'caption'    => [ 'wp-element-caption' ],
			'checkbox'   => [ 'type="checkbox"' ],
			'cite'       => [ '<cite' ],
			'code'       => [ '<code' ],
			'hr'         => [ '<hr' ],
			'form'       => [ '<fieldset', '<form', '<input', 'nf-form', 'wp-block-search' ],
			'heading'    => [],
			'html'       => [],
			'list'       => [ '<ul', '<ol' ],
			'mark'       => [ '<mark' ],
			'pre'        => [ '<pre' ],
			'radio'      => [ 'type="radio"' ],
			'small'      => [ '<small' ],
			'strong'     => [ '<strong' ],
			'sub'        => [ '<sub' ],
			'sup'        => [ '<sup' ],
			'svg'        => [ '<svg' ],
			'table'      => [ '<table' ],
		];

		// --- Custom Block Style Variations ---
		$styles['block-styles'] = [
			'badge'            => [ 'is-style-badge' ],
			'button-outline'   => [ 'is-style-outline' ],
			'button-secondary' => [ 'is-style-secondary' ],
			'button-ghost'     => [ 'is-style-ghost' ],
			'check-circle'     => [ 'is-style-check-circle' ],
			'check-outline'    => [ 'is-style-check-outline', 'is-style-checklist-circle' ],
			'checklist'        => [ 'is-style-checklist' ],
			'curved-text'      => [ 'is-style-curved-text' ],
			'divider-angle'    => [ 'is-style-angle' ],
			'divider-curve'    => [ 'is-style-curve' ],
			'divider-fade'     => [ 'is-style-fade' ],
			'divider-round'    => [ 'is-style-round' ],
			'divider-wave'     => [ 'is-style-wave' ],
			'heading'          => [ 'is-style-heading', 'is-style-summary-heading', 'is-style-list-heading' ],
			'list-dash'        => [ 'is-style-dash' ],
			'list-heading'     => [ 'is-style-heading' ],
			'list-none'        => [ 'is-style-none' ],
			'notice'           => [ 'is-style-notice' ],
			'numbered-list'    => [ 'is-style-numbered' ],
			'search-toggle'    => [ 'is-style-toggle' ],
			'square-list'      => [ 'is-style-square' ],
			'sub-heading'      => [ 'is-style-sub-heading' ],
			'surface'          => [ 'is-style-surface' ],
		];

		// --- Custom Block Variations that require PHP logic ---
		$styles['block-variations'] = [
			'accordion'  => [ 'is-style-accordion' ],
			'counter'    => [ 'is-style-counter' ],
			'icon'       => [ 'is-style-icon' ],
			'marquee'    => [ 'is-marquee' ],
			'newsletter' => [ 'is-style-newsletter' ],
			'svg'        => [ 'is-style-svg' ],
		];

		// --- Custom Block Settings (Extensions) ---
		// Note: Placeholder is handled by its own service.
		$styles['block-extensions'] = [
			'animation'         => [ 'has-animation', 'will-animate', 'has-scroll-animation' ],
			'aspect-ratio'      => [ 'has-aspect-ratio-' ],
			'box-shadow'        => [ 'has-box-shadow' ],
			'copy-to-clipboard' => [ 'copy-to-clipboard' ],
			'filter'            => [ '--filter-hover' ],
			'gradient-mask'     => [ '-gradient-background' ],
			'inline-image'      => [ 'wp-image-' ],
			'on-click'          => [ 'onclick="' ],
			'shadow'            => [ 'has-shadow', 'has-box-shadow', 'has-text-shadow' ],
			'transform'         => [ 'has-transform' ],
		];

		// --- General Theme Components ---
		// Note: Admin bar is handled by its own service.
		$styles['components'] = [
			'border'             => [ 'border-width:', 'border-top-width:', 'border-right-width:', 'border-bottom-width:', 'border-left-width:' ],
			'edit-link'          => [ 'edit-link' ],
			'screen-reader-text' => [],
			'site-blocks'        => [],
			'splide'             => [ 'splide' ],
		];

		// --- Debugging Tool Styles ---
		if ( Debug::is_enabled() && function_exists( 'xdebug_is_debugger_active' ) ) {
			$styles['components']['xdebug'] = [];
		}
		if ( Debug::is_enabled() && function_exists( 'd' ) && function_exists( 's' ) ) {
			$styles['components']['kint'] = [];
		}

		// --- Custom Text Formats (Underlines, Highlights, etc.) ---
		$styles['text-formats'] = [
			'animation'  => [ 'has-text-animation', 'typewriter' ],
			'arrow'      => [ 'is-underline-arrow' ],
			'brush'      => [ 'is-underline-brush' ],
			'circle'     => [ 'is-underline-circle' ],
			'scribble'   => [ 'is-underline-scribble' ],
			'gradient'   => [ 'has-text-gradient' ],
			'highlight'  => [ 'has-inline-color' ],
			'underline'  => [ 'has-text-underline' ],
			'font-size'  => [ 'has-inline-font-size' ],
			'inline-svg' => [ 'inline-svg' ],
			'outline'    => [ 'has-text-outline' ],
		];

		// --- General Utility Classes ---
		$styles['utilities'] = [
			'align'     => [ 'vertical-align-top' ],
			'dark-mode' => [ 'is-style-light', 'is-style-dark', 'hide-light-mode', 'hide-dark-mode' ],
			'fade'      => [ 'fade-top', 'fade-right', 'fade-bottom', 'fade-left', 'fade-horizontal', 'fade-vertical' ],
			'flex'      => [ 'flex', 'justify-center', 'justify-space-between', 'align-content-center', 'align-stretch' ],
			'height'    => [ 'height-100', 'height-auto' ],
			'margin'    => [ 'margin-auto', 'margin-top-auto', 'margin-left-auto', 'margin-right-auto', 'margin-bottom-auto', 'no-margin' ],
			'wrap'      => [ 'nowrap', 'wrap' ],
		];

		return $styles;
	}
}
