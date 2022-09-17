<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Aeon
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main archive-main">
			<?php
			/**
			 * aeon_before_main_content hook.
			 *
			 * @since 1.0.0
			 */
			do_action( 'aeon_before_main_content' );
			
			if ( have_posts() ) :

				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					aeon_do_template_part( 'archive' );

				endwhile;

				/**
				 * aeon_after_loop hook.
				 *
				 * @since 1.0.0
				 */
				do_action( 'aeon_after_loop', 'archive' );

			else :

				aeon_do_template_part( 'none' );

			endif;

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
do_action( 'aeon_sidebar' );
get_footer();
