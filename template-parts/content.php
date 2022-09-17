<?php
/**
 * Template part for displaying posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Aeon
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry-post' ); ?> <?php aeon_do_microdata( 'article' ); ?>>
	<?php
	if ( aeon_blog_thumbnails() ) {
		aeon_post_thumbnail();
		?>
		<div class="entry-wrap">
			<?php aeon_post_heading() ?>

			<?php
			if ( aeon_show_excerpt() ) {
				?>
				<div class="entry-content" <?php aeon_do_microdata( 'text' ); ?>>
					<?php the_excerpt(); ?>
				</div>
				<?php
			} else {
				?>
				<div class="entry-content" <?php aeon_do_microdata( 'text' ); ?>>
					<?php
					the_content();

					wp_link_pages(
						array(
							'before' => '<div class="page-links">' . __( 'Pages:', 'aeonwp' ),
							'after'  => '</div>',
						)
					);
					?>
				</div>
				<?php
			}
			?>
		</div>
		<?php
	} else {
		aeon_post_structure();

		if ( aeon_show_excerpt() ) {
			?>
			<div class="entry-content" <?php aeon_do_microdata( 'text' ); ?>>
				<?php the_excerpt(); ?>
			</div>
			<?php
		} else {
			?>
			<div class="entry-content" <?php aeon_do_microdata( 'text' ); ?>>
				<?php
				the_content();

				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . __( 'Pages:', 'aeonwp' ),
						'after'  => '</div>',
					)
				);
				?>
			</div>
			<?php
		}
	} ?>
</article><!-- #post-<?php the_ID(); ?> -->
