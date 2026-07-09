<?php
/**
 * Related Posts Block - Server-side Render
 *
 * @package Aegis
 * @since   1.0.0
 *
 * @var array    $attributes Block attributes.
 * @var string   $content    Block inner content (empty for dynamic blocks).
 * @var WP_Block $block      Block instance.
 */

declare(strict_types=1);

defined( 'ABSPATH' ) || exit;

use Aegis\Blocks\RelatedPostsQuery;

if ( ! is_singular() || is_front_page() ) {
	return '';
}

$current_post_id = get_the_ID();

if ( ! $current_post_id ) {
	return '';
}

$posts_per_page     = (int) ( $attributes['postsPerPage'] ?? 3 );
$columns            = (int) ( $attributes['columns'] ?? 3 );
$show_image         = (bool) ( $attributes['showFeaturedImage'] ?? true );
$show_date          = (bool) ( $attributes['showDate'] ?? true );
$show_excerpt       = (bool) ( $attributes['showExcerpt'] ?? true );
$show_category      = (bool) ( $attributes['showCategory'] ?? true );
$heading            = $attributes['heading'] ?? __( 'Related Posts', 'aegis' );
$heading_tag        = $attributes['headingTag'] ?? 'h2';
$style_variant      = $attributes['styleVariant'] ?? 'grid';
$taxonomy_source    = $attributes['taxonomySource'] ?? 'auto';
$fallback_behavior  = $attributes['fallbackBehavior'] ?? 'latest';
$excerpt_length     = (int) ( $attributes['excerptLength'] ?? 20 );
$image_aspect_ratio = $attributes['imageAspectRatio'] ?? '16/9';

if ( class_exists( '\Aegis\Plugin\Settings\Repository' ) ) {
	if ( ! \Aegis\Plugin\Settings\Repository::is_block_enabled( 'related_posts_taxonomy_source' ) ) {
		$taxonomy_source = 'auto';
	}

	if ( ! \Aegis\Plugin\Settings\Repository::is_block_enabled( 'related_posts_fallback' ) ) {
		$fallback_behavior = 'latest';
	}

	if ( ! \Aegis\Plugin\Settings\Repository::is_block_enabled( 'related_posts_style_variants' ) ) {
		$style_variant = 'grid';
	}

	if ( ! \Aegis\Plugin\Settings\Repository::is_block_enabled( 'related_posts_excerpt_length' ) ) {
		$excerpt_length = 20;
	}

	if ( ! \Aegis\Plugin\Settings\Repository::is_block_enabled( 'related_posts_image_ratio' ) ) {
		$image_aspect_ratio = '16/9';
	}
}

$allowed_tags = array( 'h2', 'h3', 'h4', 'h5', 'h6' );
if ( ! in_array( $heading_tag, $allowed_tags, true ) ) {
	$heading_tag = 'h2';
}

$related_query = RelatedPostsQuery::query(
	$current_post_id,
	array(
		'postsPerPage'     => $posts_per_page,
		'taxonomySource'   => $taxonomy_source,
		'fallbackBehavior' => $fallback_behavior,
	)
);

if ( ! $related_query instanceof WP_Query ) {
	return '';
}

$wrapper_classes = array(
	'wp-block-aegis-related-posts',
	'is-style-' . sanitize_html_class( $style_variant ),
	'columns-' . $columns,
);

if ( ! empty( $attributes['className'] ) ) {
	$wrapper_classes[] = $attributes['className'];
}

if ( ! empty( $attributes['align'] ) ) {
	$wrapper_classes[] = 'align' . $attributes['align'];
}

$wrapper_attrs = get_block_wrapper_attributes(
	array(
		'class'      => implode( ' ', $wrapper_classes ),
		'aria-label' => esc_attr( ! empty( $heading ) ? $heading : __( 'Related Posts', 'aegis' ) ),
	)
);

$excerpt_filter = static function () use ( $excerpt_length ) {
	return $excerpt_length;
};
add_filter( 'excerpt_length', $excerpt_filter, 999 );

$excerpt_more_filter = static function () {
	return '&hellip;';
};
add_filter( 'excerpt_more', $excerpt_more_filter, 999 );

?>
<section <?php echo $wrapper_attrs; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>

	<?php if ( ! empty( $heading ) ) : ?>
		<<?php echo esc_attr( $heading_tag ); ?> class="wp-block-aegis-related-posts__heading">
			<?php echo esc_html( $heading ); ?>
		</<?php echo esc_attr( $heading_tag ); ?>>
	<?php endif; ?>

	<div class="wp-block-aegis-related-posts__grid">
		<?php
		while ( $related_query->have_posts() ) :
			$related_query->the_post();
			?>
			<article class="wp-block-aegis-related-posts__post">

				<?php if ( $show_image && has_post_thumbnail() ) : ?>
					<a href="<?php the_permalink(); ?>" class="wp-block-aegis-related-posts__image" aria-hidden="true" tabindex="-1">
						<?php
						the_post_thumbnail(
							'medium_large',
							array(
								'loading' => 'lazy',
								'style'   => 'aspect-ratio: ' . esc_attr( $image_aspect_ratio ) . '; object-fit: cover;',
							)
						);
						?>
					</a>
				<?php endif; ?>

				<div class="wp-block-aegis-related-posts__content">

					<?php
					if ( $show_category ) :
						$categories = get_the_category();
						if ( ! empty( $categories ) ) :
							?>
							<span class="wp-block-aegis-related-posts__category">
								<a href="<?php echo esc_url( get_category_link( $categories[0]->term_id ) ); ?>">
									<?php echo esc_html( $categories[0]->name ); ?>
								</a>
							</span>
							<?php
						endif;
					endif;
					?>

					<h3 class="wp-block-aegis-related-posts__title">
						<a href="<?php the_permalink(); ?>">
							<?php the_title(); ?>
						</a>
					</h3>

					<?php if ( $show_date ) : ?>
						<time class="wp-block-aegis-related-posts__date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
							<?php echo esc_html( get_the_date() ); ?>
						</time>
					<?php endif; ?>

					<?php if ( $show_excerpt ) : ?>
						<p class="wp-block-aegis-related-posts__excerpt">
							<?php echo esc_html( get_the_excerpt() ); ?>
						</p>
					<?php endif; ?>

				</div>
			</article>
		<?php endwhile; ?>
	</div>

</section>
<?php

wp_reset_postdata();

remove_filter( 'excerpt_length', $excerpt_filter, 999 );
remove_filter( 'excerpt_more', $excerpt_more_filter, 999 );
