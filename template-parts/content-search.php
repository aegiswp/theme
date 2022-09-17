<?php
/**
 * Template part for displaying results in search pages.
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

			<div class="entry-content" <?php aeon_do_microdata( 'text' ); ?>>
				<?php the_excerpt(); ?>
			</div><!-- .entry-content -->
		</div>
		<?php
	} else {
		aeon_post_structure();
		?>
		<div class="entry-content" <?php aeon_do_microdata( 'text' ); ?>>
			<?php the_excerpt(); ?>
		</div><!-- .entry-content -->
		<?php
	} ?>
</article><!-- #post-<?php the_ID(); ?> -->
