<?php
/**
 * Sensei LMS Integration Component
 *
 * Provides support for integrating Sensei LMS plugin compatibility in the Aegis Framework.
 *
 * Responsibilities:
 * - Checks for Sensei LMS plugin presence and conditionally adds theme support or styles
 * - Integrates with the Aegis container and conditional system
 *
 * @package    Aegis\Framework\Integrations
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 */

// Enforces strict type checking for all code in this file, ensuring type safety for sensei lms integration component.
declare( strict_types=1 );

// Declares the namespace for the sensei lms integration component.
namespace Aegis\Framework\Integrations;

// Imports classes, interfaces, and functions used by the sensei lms integration component.
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

class SenseiLMS implements Conditional, Styleable {

	/**
	 * Condition.
	 *
	 * @since 1.0.0
	 *
	 * @return bool
	 */
	public static function condition(): bool {
		if ( class_exists( '\Aegis\Plugin\Integrations\SenseiLMS' ) ) {
			return \Aegis\Plugin\Integrations\SenseiLMS::is_plugin_active();
		}

		return class_exists( '\Sensei_Main' )
			|| function_exists( 'Sensei' )
			|| class_exists( 'Sensei' )
			|| defined( 'SENSEI_VERSION' )
			|| defined( 'SENSEI_PLUGIN_FILE' );
	}

	/**
	 * Register styles.
	 *
	 * @since 1.0.0
	 *
	 * @param Styles $styles Styles instance.
	 *
	 * @return void
	 */
	public function styles( Styles $styles ): void {
		$styles->add_file(
			'plugins/sensei-lms.css',
			[
				'sensei-lms',
				'sensei',
				'sensei-course',
				'sensei-lesson',
				'sensei-course-wrapper',
				'sensei-lesson-wrapper',
				'sensei-lesson-preview',
				'sensei-course-container',
				'sensei-lesson-container',
				'sensei-quiz-container',
				'sensei-progress',
				'sensei-button',
				'sensei-message',
				'wp-block-sensei-lms-course-list',
				'wp-block-sensei-lms-lesson-list',
				'wp-block-sensei-lms-course-progress',
				'aegis-sensei-video-wrapper',
				'aegis-sensei-page',
			]
		);
	}

	/**
	 * Adds theme support or disables default Sensei styles (optional).
	 *
	 * @since 1.0.0
	 * @hook after_setup_theme
	 *
	 * @return void
	 */
	public function add_senseilms_support(): void {
		if ( class_exists( '\Sensei_Main' ) || function_exists( 'Sensei' ) || class_exists( 'Sensei' ) ) {
			// Enable Sensei support and disable default plugin styles.
			add_theme_support( 'sensei' );
			add_theme_support( 'sensei-lms' );
			add_filter( 'sensei_disable_styles', '__return_true' );
		}
	}

	/**
	 * Unregister Sensei LMS block patterns to use theme patterns instead.
	 *
	 * @since 1.0.0
	 *
	 * @hook init 11
	 *
	 * @return void
	 */
	public function unregister_sensei_block_patterns(): void {
		$control = get_option( 'aegis_pattern_control', [] );
		$remove  = is_array( $control ) && ! empty( $control['sensei_keep_patterns'] );

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

			if ( str_starts_with( $name, 'sensei-lms/' ) || str_starts_with( $name, 'sensei/' ) || str_contains( $name, 'sensei' ) ) {
				$registry->unregister( $name );
			}
		}
	}

	/**
	 * Add body classes for Sensei LMS pages.
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

		if ( $this->is_sensei_page() ) {
			$classes[] = 'aegis-sensei-page';
		}

		return $classes;
	}

	/**
	 * Check if current page is a Sensei LMS page.
	 *
	 * @since 1.0.0
	 *
	 * @return bool
	 */
	private function is_sensei_page(): bool {
		if ( function_exists( 'is_sensei' ) && is_sensei() ) {
			return true;
		}

		$post_type = get_post_type();
		if ( is_string( $post_type ) && in_array( $post_type, [ 'course', 'lesson', 'quiz', 'question', 'sensei_message' ], true ) ) {
			return true;
		}

		if ( is_post_type_archive( [ 'course', 'lesson', 'quiz' ] ) ) {
			return true;
		}

		if ( is_tax( [ 'course-category', 'lesson-tag', 'module', 'quiz-type', 'question-type' ] ) ) {
			return true;
		}

		return false;
	}
}
