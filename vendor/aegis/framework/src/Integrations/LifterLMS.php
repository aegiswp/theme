<?php
/**
 * LifterLMS Integration Component
 *
 * Provides support for integrating LifterLMS plugin compatibility in the Aegis Framework.
 *
 * Responsibilities:
 * - Checks for LifterLMS plugin presence and conditionally adds theme support
 * - Integrates with the Aegis container and conditional system
 * - Controls LifterLMS block patterns via Aegis Pro pattern control
 * - Registers LifterLMS styling and body classes
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
use WP_Block_Patterns_Registry;
use function add_filter;
use function add_theme_support;
use function class_exists;
use function defined;
use function function_exists;
use function get_option;
use function get_post_type;
use function in_array;
use function is_array;
use function is_post_type_archive;
use function is_string;
use function is_tax;
use function str_contains;
use function str_starts_with;

class LifterLMS implements Conditional, Styleable {

	/**
	 * Condition.
	 *
	 * @since 1.0.0
	 *
	 * @return bool
	 */
	public static function condition(): bool {
		if ( class_exists( '\\Aegis\\Plugin\\Integrations\\LifterLMS' ) ) {
			return \Aegis\Plugin\Integrations\LifterLMS::is_plugin_active();
		}

		return class_exists( 'LifterLMS' )
			|| function_exists( 'LLMS' )
			|| defined( 'LLMS_VERSION' )
			|| defined( 'LLMS_PLUGIN_FILE' );
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
			'plugins/lifterlms.css',
			[
				'lifterlms',
				'llms',
				'llms-loop',
				'single-course',
				'llms-syllabus-wrapper',
				'llms-lesson-preview',
				'llms-course',
				'llms-lesson',
				'aegis-lifterlms-page',
			]
		);
	}

	/**
	 * Adds theme support for LifterLMS course and lesson sidebars.
	 *
	 * @since 1.0.0
	 *
	 * @hook  after_setup_theme
	 *
	 * @return void
	 */
	public function add_lifterlms_support(): void {
		if ( class_exists( '\\LifterLMS' ) || function_exists( 'LLMS' ) ) {
			// Register LifterLMS theme support and suppress the default sidebar.
			add_theme_support( 'lifterlms' );
			add_theme_support( 'lifterlms-sidebars' );
			add_filter( 'llms_get_theme_default_sidebar', static fn() => null );
		}
	}

	/**
	 * Unregister LifterLMS block patterns to use theme patterns instead.
	 *
	 * @since 1.0.0
	 *
	 * @hook init 11
	 *
	 * @return void
	 */
	public function unregister_lifterlms_block_patterns(): void {
		$control = get_option( 'aegis_pattern_control', [] );
		$remove  = is_array( $control ) && ! empty( $control['lifterlms_keep_patterns'] );

		if ( ! $remove || ! defined( 'AEGIS_PRO_VERSION' ) ) {
			return;
		}

		$registry = WP_Block_Patterns_Registry::get_instance();
		$patterns = $registry->get_all_registered();

		foreach ( $patterns as $pattern ) {
			$name = $pattern['name'] ?? '';

			if ( empty( $name ) || str_starts_with( $name, 'aegis/' ) || str_starts_with( $name, 'aegis-pro/' ) ) {
				continue;
			}

			if ( str_starts_with( $name, 'lifterlms/' ) || str_starts_with( $name, 'llms/' ) || str_contains( $name, 'lifterlms' ) ) {
				$registry->unregister( $name );
			}
		}
	}

	/**
	 * Add body classes for LifterLMS pages.
	 *
	 * @since 1.0.0
	 *
	 * @hook body_class
	 *
	 * @param array $classes The body classes.
	 *
	 * @return array
	 */
	public function add_body_classes( array $classes ): array {
		if ( ! is_array( $classes ) ) {
			$classes = [];
		}

		if ( $this->is_lifterlms_page() ) {
			$classes[] = 'aegis-lifterlms-page';
		}

		return $classes;
	}

	/**
	 * Check if current page is a LifterLMS page.
	 *
	 * @since 1.0.0
	 *
	 * @return bool
	 */
	private function is_lifterlms_page(): bool {
		if ( function_exists( 'is_lifterlms' ) && is_lifterlms() ) {
			return true;
		}

		if ( function_exists( 'is_course' ) && is_course() ) {
			return true;
		}

		if ( function_exists( 'is_lesson' ) && is_lesson() ) {
			return true;
		}

		if ( function_exists( 'is_membership' ) && is_membership() ) {
			return true;
		}

		$post_type = get_post_type();
		if ( is_string( $post_type ) && in_array( $post_type, [ 'course', 'lesson', 'llms_membership', 'llms_quiz' ], true ) ) {
			return true;
		}

		if ( is_post_type_archive( [ 'course', 'llms_membership' ] ) ) {
			return true;
		}

		if ( is_tax( [ 'course_cat', 'course_tag', 'course_track', 'course_difficulty', 'membership_cat', 'membership_tag' ] ) ) {
			return true;
		}

		return false;
	}
}
