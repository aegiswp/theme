<?php
/**
 * NinjaForms Integration Component
 *
 * Provides support for integrating Ninja Forms plugin compatibility in the Aegis Framework.
 *
 * Responsibilities:
 * - Checks for Ninja Forms plugin presence and conditionally registers styles
 * - Dequeues default Ninja Forms CSS so theme tokens and design rules apply
 * - Integrates with the Aegis container and conditional system
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
use function add_action;
use function class_exists;
use function defined;
use function function_exists;
use function is_admin;
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
		if ( class_exists( '\\Aegis\\Plugin\\Integrations\\NinjaForms' ) ) {
			return \Aegis\Plugin\Integrations\NinjaForms::is_plugin_active();
		}

		return class_exists( 'Ninja_Forms' )
			|| function_exists( 'Ninja_Forms' )
			|| defined( 'NF_PLUGIN_VERSION' )
			|| defined( 'NF_VERSION' );
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
			'plugins/ninja-forms.css',
			[
				'ninja-forms',
				'ninja_forms',
				'ninja_form',
				'nf-form',
				'nf-field',
				'nf-form-cont',
				'nf-form-content',
			]
		);
	}

	/**
	 * Dequeue Ninja Forms CSS so theme design tokens apply.
	 *
	 * @since 1.0.0
	 *
	 * @hook  nf_display_enqueue_scripts 20
	 * @hook  wp_enqueue_scripts 20
	 * @hook  wp_print_styles
	 *
	 * @return void
	 */
	public function dequeue_ninja_forms_css(): void {
		if ( is_admin() ) {
			return;
		}

		wp_dequeue_style( 'nf-display' );
		wp_dequeue_style( 'ninja-forms-display' );
		wp_dequeue_style( 'ninja-forms-display-opinions' );
		wp_dequeue_style( 'nf-display-opinions' );
		wp_dequeue_style( 'nf-layout-front-end' );
	}

	/**
	 * Remove default Ninja Forms styles (alias for dequeue_ninja_forms_css).
	 *
	 * @since 1.0.0
	 *
	 * @hook  init
	 *
	 * @return void
	 */
	public function remove_default_styles(): void {
		add_action( 'nf_display_enqueue_scripts', [ $this, 'dequeue_ninja_forms_css' ], 20 );
		add_action( 'wp_enqueue_scripts', [ $this, 'dequeue_ninja_forms_css' ], 20 );
		add_action( 'wp_print_styles', [ $this, 'dequeue_ninja_forms_css' ] );
		$this->dequeue_ninja_forms_css();
	}
}
