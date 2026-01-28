<?php
/**
 * LifterLMS Plugin Integration Component
 *
 * Provides deep integration for LifterLMS plugin compatibility in the Aegis Framework.
 *
 * Responsibilities:
 * - Checks for LifterLMS plugin presence and conditionally registers hooks
 * - Applies theme colors and typography to LifterLMS elements
 * - Unregisters default LifterLMS block patterns in favor of theme patterns
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

// Imports interfaces and helpers for conditional logic, inline assets, and hook management.
use Aegis\Container\Interfaces\Conditional;
use Aegis\Framework\InlineAssets\Styleable;
use Aegis\Framework\InlineAssets\Styles;
use WP_Block_Patterns_Registry;
use function add_action;
use function add_filter;
use function class_exists;
use function function_exists;
use function get_bloginfo;
use function get_post_type;
use function get_theme_mod;
use function in_array;
use function str_contains;
use function wp_get_attachment_image_url;

// Implements the LifterLMS integration class for the design system.

class LifterLMS implements Conditional, Styleable {

	/**
	 * Condition.
	 *
	 * @since 1.0.0
	 *
	 * @return bool
	 */
	public static function condition(): bool {
		return class_exists( 'LifterLMS' );
	}

	/**
	 * Register hooks.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function hooks(): void {
		add_action( 'init', [ $this, 'unregister_lifterlms_block_patterns' ], 11 );
		add_filter( 'llms_get_theme_default_sidebar', [ $this, 'set_default_sidebar' ] );
		add_filter( 'lifterlms_before_main_content', [ $this, 'before_main_content' ], 5 );
		add_filter( 'lifterlms_after_main_content', [ $this, 'after_main_content' ], 50 );
		add_filter( 'body_class', [ $this, 'add_body_classes' ] );
		add_filter( 'llms_get_loop_list_classes', [ $this, 'add_loop_classes' ] );
		add_filter( 'lifterlms_loop_columns', [ $this, 'set_loop_columns' ] );
		add_action( 'lifterlms_before_student_dashboard', [ $this, 'dashboard_header' ] );
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
				'llms-loop',
				'llms-course',
				'llms-lesson',
				'llms-quiz',
				'llms-membership',
				'llms-student-dashboard',
			],
			static::condition()
		);
	}

	/**
	 * Unregister LifterLMS block patterns to use theme patterns instead.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function unregister_lifterlms_block_patterns(): void {
		$registry   = WP_Block_Patterns_Registry::get_instance();
		$registered = $registry->get_all_registered();

		foreach ( $registered as $pattern ) {
			$name = $pattern['name'];

			if ( str_contains( $name, 'lifterlms' ) || str_contains( $name, 'llms' ) ) {
				$registry->unregister( $name );
			}
		}
	}

	/**
	 * Set default sidebar for LifterLMS pages.
	 *
	 * @since 1.0.0
	 *
	 * @hook  llms_get_theme_default_sidebar
	 *
	 * @param string $sidebar The sidebar ID.
	 *
	 * @return string
	 */
	public function set_default_sidebar( string $sidebar ): string {
		return 'sidebar-1';
	}

	/**
	 * Add wrapper before main content.
	 *
	 * @since 1.0.0
	 *
	 * @hook  lifterlms_before_main_content
	 *
	 * @return void
	 */
	public function before_main_content(): void {
		echo '<div class="aegis-lifterlms-wrapper">';
	}

	/**
	 * Close wrapper after main content.
	 *
	 * @since 1.0.0
	 *
	 * @hook  lifterlms_after_main_content
	 *
	 * @return void
	 */
	public function after_main_content(): void {
		echo '</div>';
	}

	/**
	 * Add body classes for LifterLMS pages.
	 *
	 * @since 1.0.0
	 *
	 * @hook  body_class
	 *
	 * @param array $classes The body classes.
	 *
	 * @return array
	 */
	public function add_body_classes( array $classes ): array {
		if ( $this->is_lifterlms_page() ) {
			$classes[] = 'aegis-lifterlms-page';
		}

		return $classes;
	}

	/**
	 * Add theme classes to course/membership loop.
	 *
	 * @since 1.0.0
	 *
	 * @hook  llms_get_loop_list_classes
	 *
	 * @param array $classes The loop classes.
	 *
	 * @return array
	 */
	public function add_loop_classes( array $classes ): array {
		$classes[] = 'aegis-lifterlms-loop';

		return $classes;
	}

	/**
	 * Set number of columns for course/membership loop.
	 *
	 * @since 1.0.0
	 *
	 * @hook  lifterlms_loop_columns
	 *
	 * @param int $columns The number of columns.
	 *
	 * @return int
	 */
	public function set_loop_columns( int $columns ): int {
		return 3;
	}

	/**
	 * Add custom header to student dashboard.
	 *
	 * @since 1.0.0
	 *
	 * @hook  lifterlms_before_student_dashboard
	 *
	 * @return void
	 */
	public function dashboard_header(): void {
		// Allow themes to add custom header content in student dashboard.
		do_action( 'aegis_lifterlms_dashboard_header' );
	}

	/**
	 * Check if current page is a LifterLMS page.
	 *
	 * @since 1.0.0
	 *
	 * @return bool
	 */
	private function is_lifterlms_page(): bool {
		if ( ! function_exists( 'get_post_type' ) ) {
			return false;
		}

		$lifterlms_post_types = [
			'course',
			'lesson',
			'llms_quiz',
			'llms_question',
			'llms_certificate',
			'llms_my_certificate',
			'llms_membership',
			'llms_engagement',
			'llms_order',
			'llms_transaction',
			'llms_achievement',
			'llms_my_achievement',
			'llms_access_plan',
			'llms_coupon',
			'llms_email',
			'llms_notification',
			'llms_review',
			'llms_voucher',
			'llms_form',
		];

		$post_type = get_post_type();

		if ( in_array( $post_type, $lifterlms_post_types, true ) ) {
			return true;
		}

		// Check for LifterLMS pages using functions if available.
		if ( function_exists( 'is_llms_checkout' ) && is_llms_checkout() ) {
			return true;
		}

		if ( function_exists( 'is_llms_account_page' ) && is_llms_account_page() ) {
			return true;
		}

		if ( function_exists( 'is_lifterlms' ) && is_lifterlms() ) {
			return true;
		}

		return false;
	}
}
