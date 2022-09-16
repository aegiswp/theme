<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Aeon
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

			</div><!-- #content -->
		</div><!-- #page -->

		<?php
		/**
		 * aeon_before_footer hook.
		 *
		 * @since 1.0.0
		 */
		do_action( 'aeon_before_footer' );

		/**
		 * aeon_before_footer_content hook.
		 *
		 * @since 1.0.0
		 */
		do_action( 'aeon_before_footer_content' );

		/**
		 * aeon_footer hook.
		 *
		 * @since 1.0.0
		 *
		 * @hooked aeon_get_footer
		 */
		do_action( 'aeon_footer' );

		/**
		 * aeon_after_footer_content hook.
		 *
		 * @since 1.0.0
		 */
		do_action( 'aeon_after_footer_content' );

		/**
		 * aeon_after_footer hook.
		 *
		 * @since 1.0.0
		 *
		 * @hooked aeon_scroll_up - 10
		 */
		do_action( 'aeon_after_footer' );

		wp_footer();
		?>

	</body>
</html>
