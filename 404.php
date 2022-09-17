<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Aeon
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<?php
			/**
			 * aeon_before_main_content hook.
			 *
			 * @since 1.0.0
			 */
			do_action( 'aeon_before_main_content' );

			echo aeon_get_svg_icon( 'error' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in function.
			?>

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'aeonwp' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'aeonwp' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

			<?php
			/**
			 * aeon_after_main_content hook.
			 *
			 * @since 1.0.0
			 */
			do_action( 'aeon_after_main_content' );
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
