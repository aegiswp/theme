<?php
/**
 * LearnDash LMS Integration Component
 *
 * Provides deep integration for LearnDash LMS plugin compatibility in the Aegis Framework.
 *
 * Responsibilities:
 * - Checks for LearnDash LMS plugin presence and conditionally registers hooks
 * - Integrates Focus Mode with theme styling
 * - Applies theme colors and typography to LearnDash elements
 * - Unregisters default LearnDash block patterns in favor of theme patterns
 * - Integrates with the Aegis container and inline assets system
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
use function class_exists;
use function defined;
use function did_action;
use function do_action;
use function function_exists;
use function get_bloginfo;
use function get_option;
use function get_post_type;
use function get_theme_mod;
use function in_array;
use function is_array;
use function is_string;
use function str_contains;
use function str_starts_with;
use function trim;
use function wp_get_attachment_image_url;

class LearnDash implements Conditional, Styleable {

	/**
	 * Condition.
	 *
	 * @since 1.0.0
	 *
	 * @return bool
	 */
	public static function condition(): bool {
		if ( class_exists( '\\Aegis\\Plugin\\Integrations\\LearnDash' ) ) {
			return \Aegis\Plugin\Integrations\LearnDash::is_plugin_active();
		}

		return defined( 'LEARNDASH_VERSION' )
			|| class_exists( 'SFWD_LMS' )
			|| defined( 'LEARNDASH_LMS_PLUGIN_DIR' )
			|| function_exists( 'learndash_init' );
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
			'plugins/learndash.css',
			[
				'learndash-wrapper',
				'learndash',
				'ld-focus',
				'ld-course',
				'ld-lesson',
				'sfwd-courses',
				'sfwd-lessons',
				'sfwd-topic',
				'sfwd-quiz',
				'aegis-learndash',
			]
		);
	}

	/**
	 * Unregister LearnDash block patterns to use theme patterns instead.
	 *
	 * @since 1.0.0
	 *
	 * @hook init 11
	 *
	 * @return void
	 */
	public function unregister_learndash_block_patterns(): void {
		$control = get_option( 'aegis_pattern_control', [] );
		$remove  = is_array( $control ) && ! empty( $control['learndash_keep_patterns'] );

		if ( ! $remove || ! defined( 'AEGIS_PRO_VERSION' ) ) {
			return;
		}

		$registry   = WP_Block_Patterns_Registry::get_instance();
		$registered = $registry->get_all_registered();

		foreach ( $registered as $pattern ) {
			$name = $pattern['name'] ?? '';

			if ( $name === '' || str_starts_with( $name, 'aegis/' ) || str_starts_with( $name, 'aegis-pro/' ) ) {
				continue;
			}

			if ( str_starts_with( $name, 'learndash/' ) || str_contains( $name, 'learndash' ) ) {
				$registry->unregister( $name );
			}
		}
	}

	/**
	 * Add theme wrapper class to LearnDash content.
	 *
	 * @since 1.0.0
	 *
	 * @hook learndash_wrapper_class
	 *
	 * @param string     $wrapper_class      The wrapper class.
	 * @param int|object $post               The post object or ID.
	 * @param string     $additional_classes Additional classes.
	 *
	 * @return string
	 */
	public function add_theme_wrapper_class( string $wrapper_class = '', $post = null, string $additional_classes = '' ): string {
		return trim( $wrapper_class . ' aegis-learndash' );
	}

	/**
	 * Set Focus Mode logo from theme custom logo.
	 *
	 * @since 1.0.0
	 *
	 * @hook learndash_focus_header_logo_url
	 * @hook learndash_focus_mode_logo
	 *
	 * @param string $logo_url  The logo URL.
	 * @param int    $course_id The course ID.
	 * @param int    $user_id   The user ID.
	 *
	 * @return string
	 */
	public function focus_mode_logo( string $logo_url = '', int $course_id = 0, int $user_id = 0 ): string {
		$custom_logo_id = get_theme_mod( 'custom_logo' );

		if ( $custom_logo_id ) {
			$url = wp_get_attachment_image_url( $custom_logo_id, 'full' );

			if ( is_string( $url ) && '' !== $url ) {
				return $url;
			}
		}

		return $logo_url;
	}

	/**
	 * Set Focus Mode logo alt text from site name.
	 *
	 * @since 1.0.0
	 *
	 * @hook learndash_focus_header_logo_alt
	 *
	 * @param string $alt_text  The alt text.
	 * @param int    $course_id The course ID.
	 * @param int    $user_id   The user ID.
	 *
	 * @return string
	 */
	public function focus_mode_logo_alt( string $alt_text = '', int $course_id = 0, int $user_id = 0 ): string {
		$site_name = get_bloginfo( 'name' );

		return is_string( $site_name ) && '' !== $site_name ? $site_name : $alt_text;
	}

	/**
	 * Add theme header to Focus Mode.
	 *
	 * @since 1.0.0
	 *
	 * @hook learndash-focus-template-start
	 *
	 * @param int $course_id The course ID.
	 *
	 * @return void
	 */
	public function focus_mode_header( int $course_id = 0 ): void {
		if ( ! did_action( 'aegis_learndash_focus_header' ) ) {
			do_action( 'aegis_learndash_focus_header', $course_id );
		}
	}

	/**
	 * Add theme footer to Focus Mode.
	 *
	 * @since 1.0.0
	 *
	 * @hook learndash-focus-template-end
	 *
	 * @param int $course_id The course ID.
	 *
	 * @return void
	 */
	public function focus_mode_footer( int $course_id = 0 ): void {
		if ( ! did_action( 'aegis_learndash_focus_footer' ) ) {
			do_action( 'aegis_learndash_focus_footer', $course_id );
		}
	}

	/**
	 * Add body classes for LearnDash pages.
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
		if ( $this->is_learndash_page() ) {
			$classes[] = 'aegis-learndash-page';
		}

		return $classes;
	}

	/**
	 * Check if current page is a LearnDash page.
	 *
	 * @since 1.0.0
	 *
	 * @return bool
	 */
	private function is_learndash_page(): bool {
		$learndash_post_types = [
			'sfwd-courses',
			'sfwd-lessons',
			'sfwd-topic',
			'sfwd-quiz',
			'sfwd-certificates',
			'sfwd-assignment',
			'sfwd-essays',
			'groups',
		];

		if ( function_exists( 'get_post_type' ) ) {
			$post_type = get_post_type();

			if ( is_string( $post_type ) && in_array( $post_type, $learndash_post_types, true ) ) {
				return true;
			}
		}

		if ( function_exists( 'is_post_type_archive' ) && is_post_type_archive( $learndash_post_types ) ) {
			return true;
		}

		if ( function_exists( 'is_tax' ) && is_tax( [ 'ld_course_category', 'ld_course_tag', 'ld_lesson_category', 'ld_lesson_tag', 'ld_topic_category', 'ld_topic_tag' ] ) ) {
			return true;
		}

		return false;
	}
}
