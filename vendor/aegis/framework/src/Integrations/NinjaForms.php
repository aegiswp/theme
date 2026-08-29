<?php
/**
 * NinjaForms Integration Component
 *
 * Provides support for integrating Ninja Forms plugin compatibility in the Aegis Framework.
 *
 * Responsibilities:
 * - Checks for Ninja Forms plugin presence and conditionally dequeues plugin styles
 * - Integrates with the Aegis container and conditional system
 *
 * @package    Aegis\Framework\Integrations
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for ninjaforms integration component.
declare( strict_types=1 );

// Declares the namespace for the ninjaforms integration component.
namespace Aegis\Framework\Integrations;

// Imports classes, interfaces, and functions used by the ninjaforms integration component.
use Aegis\Container\Interfaces\Conditional;
use Aegis\Framework\InlineAssets\Styleable;
use Aegis\Framework\InlineAssets\Styles;
use function wp_dequeue_style;

class NinjaForms implements Conditional, Styleable {

	/**
	 * Condition.
	 *
	 * @since 1.0.0
	 *
	 * @return bool
	 */
	public static function condition(): bool {
		return class_exists( 'Ninja_Forms' );
	}

	public function styles( Styles $styles ): void {
		$styles->add_file(
			'plugins/ninja-forms.css',
			[
				'ninja-forms',
				'nf-form',
				'nf-field',
			]
		);
	}

	/**
	 * Dequeue Ninja Forms CSS.
	 *
	 * @since 1.0.0
	 *
	 * @hook  nf_display_enqueue_scripts
	 *
	 * @return void
	 */
	public function dequeue_ninja_forms_css(): void {
		wp_dequeue_style( 'nf-display' );
	}
}
