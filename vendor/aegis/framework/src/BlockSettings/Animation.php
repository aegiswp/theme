<?php
/**
 * Animation Block Setting
 *
 * Provides animation support for blocks in the Aegis Framework, including
 * dynamic CSS and JavaScript asset management.
 *
 * Responsibilities:
 * - Handles animation-related block settings and rendering
 * - Integrates with Styleable and Scriptable interfaces for asset output
 * - Manages CSS and JS assets for block animations
 *
 * @package    Aegis\Framework\BlockSettings
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for block settings.
declare( strict_types=1 );

// Declares the namespace for block settings within the Aegis Framework.
namespace Aegis\Framework\BlockSettings;

// Imports interfaces and utility classes for asset management, DOM manipulation, and rendering.
use Aegis\Framework\InlineAssets\Scriptable;
use Aegis\Framework\InlineAssets\Scripts;
use Aegis\Framework\InlineAssets\Styleable;
use Aegis\Framework\InlineAssets\Styles;
use Aegis\Dom\CSS;
use Aegis\Dom\DOM;
use Aegis\Framework\Interfaces\Renderable;
use WP_Block;
use function array_diff;
use function array_keys;
use function array_unique;
use function esc_attr;
use function explode;
use function file_exists;
use function file_get_contents;
use function is_admin;
use function str_contains;

// Implements the Animation class to support block animation settings and assets.

/**
 * Handles the animation block setting.
 *
 * This class provides a comprehensive animation system for blocks. It works by:
 * 1. Parsing a static CSS file to discover all available `@keyframes` animations.
 * 2. Conditionally loading JS and CSS assets only when they are needed on a page.
 * 3. Applying animation settings from block attributes to the block's wrapper element.
 * 4. Dynamically generating and injecting only the `@keyframes` CSS that is actually
 *    used on the current page, which is highly efficient.
 *
 * @package Aegis\Framework\BlockSettings
 * @since   1.0.0
 */
class Animation implements Renderable, Styleable, Scriptable {

	/**
	 * The directory path to the theme's CSS files.
	 *
	 * @var   string
	 * @since 1.0.0
	 */
	private string $css_dir;

	/**
	 * Animation constructor.
	 *
	 * Injects the Styles service to get the path to the CSS directory.
	 *
	 * @since 1.0.0
	 * @param Styles $styles The Styles service instance.
	 */
	public function __construct( Styles $styles ) {
		$this->css_dir = $styles->dir;
	}

	/**
	 * Applies animation attributes to the block's wrapper element.
	 *
	 * This method is hooked into the `render_block` filter. It reads the
	 * `animation` attribute and applies the necessary classes and inline styles
	 * to trigger the CSS animations and configure their behavior (e.g., for
	 * infinite or scroll-triggered animations).
	 *
	 * @since 1.0.0
	 *
	 * @param  string   $block_content The original block content.
	 * @param  array    $block         The full block object.
	 * @param  WP_Block $instance      The block instance.
	 *
	 * @hook   render_block
	 *
	 * @return string The modified block content.
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		$attrs     = $block['attrs'] ?? [];
		$animation = $attrs['animation'] ?? [];

		if ( empty( $animation ) ) {
			return $block_content;
		}

		$dom   = DOM::create( $block_content );
		$first = DOM::get_element( '*', $dom );
		if ( ! $first ) {
			return $block_content;
		}

		$classes = array_unique( explode( ' ', $first->getAttribute( 'class' ) ) );
		$styles  = CSS::string_to_array( $first->getAttribute( 'style' ) );

		// --- Animation Type Handling ---
		$infinite = ( '-1' === ( $animation['iterationCount'] ?? null ) ) || ( 'infinite' === ( $animation['event'] ?? null ) );
		unset( $styles['animation-play-state'] );

		// For infinite animations, set the iteration count directly.
		if ( $infinite ) {
			unset( $styles['--animation-event'] );
			$styles['animation-iteration-count'] = 'infinite';
		} else {
			// For standard animations, set the name as a CSS variable for the JS to use.
			unset( $styles['animation-name'] );
			$styles['--animation-name'] = esc_attr( $animation['name'] ?? '' );
		}

		// --- Scroll-triggered Animation Logic ---
		if ( 'scroll' === ( $animation['event'] ?? '' ) ) {
			$classes[] = 'animate';
			$classes[] = 'has-scroll-animation';
			$classes   = array_diff( $classes, [ 'has-animation' ] );

			// Use the --scroll CSS variable (provided by scroll.js) to drive the animation delay.
			$styles['animation-delay']      = 'calc(var(--scroll) * -1s)';
			$styles['animation-play-state'] = 'paused';
			$styles['animation-duration']   = '1s';
			$styles['animation-fill-mode']  = 'both';
			unset( $styles['--animation-event'] );

			// Set the trigger offset for the scroll animation.
			$offset = $animation['offset'] ?? '0';
			if ( '0' === $offset ) {
				$offset = '0.01'; // Avoid a true zero value.
			}
			$first->setAttribute( 'data-offset', esc_attr( $offset ) );
		}

		// Apply the final classes and styles.
		if ( $styles ) {
			$first->setAttribute( 'style', CSS::array_to_string( $styles ) );
		}
		$first->setAttribute( 'class', implode( ' ', $classes ) );

		return $dom->saveHTML();
	}

	/**
	 * Registers the dynamic CSS generation for animations.
	 *
	 * @since 1.0.0
	 * @param Styles $styles The Styles service instance.
	 */
	public function styles( Styles $styles ): void {
		$styles->add_callback( [ $this, 'get_animation_styles' ] );
	}

	/**
	 * Registers and conditionally enqueues animation-related JavaScript files.
	 *
	 * @since 1.0.0
	 * @param Scripts $scripts The Scripts service instance.
	 */
	public function scripts( Scripts $scripts ): void {
		// Make the list of available animation names available to the client-side scripts.
		$scripts->add_data(
			'animations',
			array_keys( $this->get_animations() ),
			[],
			is_admin()
		);

		// Conditionally load JS files based on classes/attributes found in the page content.
		$scripts->add_file( 'animation.js', [ 'has-animation', 'has-scroll-animation' ] );
		$scripts->add_file( 'scroll.js', [ 'animation-event:scroll', 'has-scroll-animation' ] );
		$scripts->add_file( 'packery.js', [ 'packery' ] );
		$scripts->add_file( 'typewriter.js', [ 'has-typewriter-animation' ] );
	}

	/**
	 * Generates and returns only the CSS `@keyframes` rules used on the current page.
	 *
	 * This is a performance optimization. Instead of loading a large stylesheet
	 * with all possible animations, this function scans the page's HTML for
	 * animation names and injects only the `@keyframes` for those specific animations.
	 *
	 * @since 1.0.0
	 *
	 * @param  string $template_html The HTML content of the current template.
	 * @param  bool   $load_all      Whether to load all styles regardless of content.
	 *
	 * @return string The dynamically generated CSS string of `@keyframes`.
	 */
	public function get_animation_styles( string $template_html, bool $load_all ): string {
		$animations = $this->get_animations();
		$css        = '';

		// Find which animations are used on the page and build the CSS string.
		foreach ( $animations as $name => $animation ) {
			if ( $load_all || str_contains( $template_html, "animation-name:{$name}" ) ) {
				$css .= "@keyframes $name" . trim( $animation );
			}
		}

		return $css;
	}

	/**
	 * Parses the main animation stylesheet to get a list of available animations.
	 *
	 * This method reads a static CSS file and explodes it by the `@keyframes`
	 * keyword to build an associative array of all defined animations, where the
	 * key is the animation name and the value is the CSS rule body.
	 *
	 * @since 1.0.0
	 *
	 * @return array An associative array of animation names and their CSS content.
	 */
	private function get_animations(): array {
		$file = $this->css_dir . 'block-extensions/animations.css';
		if ( ! file_exists( $file ) ) {
			return [];
		}

		// Split the file content into individual @keyframes blocks.
		$parts      = explode( '@keyframes', file_get_contents( $file ) );
		$animations = [];
		unset( $parts[0] );

		// Extract the name and body of each animation.
		foreach ( $parts as $animation ) {
			$name                 = trim( explode( '{', $animation )[0] ?? '' );
			$animations[ $name ] = trim( str_replace( $name, '', $animation ) );
		}

		return $animations;
	}
	
}
