<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Aeon
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * aeon_before_single_post hook.
 *
 * @since 1.0.0
 */
do_action( 'aeon_before_single_post' ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php aeon_do_microdata( 'article' ); ?>>
	<?php
	/**
	 * aeon_before_single_post_entry hook.
	 *
	 * @since 1.0.0
	 */
	do_action( 'aeon_before_single_post_entry' ); ?>

	<?php aeon_single_post_structure(); ?>
	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'aeonwp' ),
				'after'  => '</div>',
			)
		);

		$term_separator = apply_filters( 'aeon_term_separator', _x( ', ', 'Used between list items, there is a space after the comma.', 'aeonwp' ), 'tags' );
		$tags_list = get_the_tag_list( '', $term_separator );

		if ( $tags_list ) {
			echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				'aeon_tag_list_output',
				sprintf(
					'<span class="tags-links">%3$s<span class="screen-reader-text">%1$s </span>%2$s</span> ',
					esc_html_x( 'Tags', 'Used before tag names.', 'aeonwp' ),
					$tags_list,
					aeon_get_svg_icon( 'tags' )
				)
			);
		}
		?>
	</div><!-- .entry-content -->

	<?php
	/**
	 * aeon_after_single_post_entry hook.
	 *
	 * @since 1.0.0
	 */
	do_action( 'aeon_after_single_post_entry' ); ?>

</article><!-- #post-<?php the_ID(); ?> -->

<?php
/**
 * aeon_after_single_post hook.
 *
 * @since 1.0.0
 */
do_action( 'aeon_after_single_post' );

aeon_single_post_nav();

/**
 * aeon_after_single_post_nav hook.
 *
 * @since 1.0.0
 */
do_action( 'aeon_after_single_post_nav' ); ?>
