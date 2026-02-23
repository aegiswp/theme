<?php
/**
 * Related Posts Block - Server-side Render
 *
 * Queries and displays posts related to the current content by shared taxonomy
 * terms. Supports multiple layout variants, configurable display options, and
 * fallback to latest posts when no related content is found.
 *
 * @package Aegis
 * @since   1.0.0
 *
 * @var array    $attributes Block attributes.
 * @var string   $content    Block inner content (empty for dynamic blocks).
 * @var WP_Block $block      Block instance.
 */

declare(strict_types=1);

// Exit if accessed directly.
defined('ABSPATH') || exit;

// Only render on singular views (not archives, front page, etc.).
if ( ! is_singular() || is_front_page() ) {
	return '';
}

$current_post_id   = get_the_ID();
$current_post_type = get_post_type();

if ( ! $current_post_id || ! $current_post_type ) {
	return '';
}

// Extract attributes with defaults.
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

// Sanitize heading tag.
$allowed_tags = [ 'h2', 'h3', 'h4', 'h5', 'h6' ];
if ( ! in_array( $heading_tag, $allowed_tags, true ) ) {
	$heading_tag = 'h2';
}

// Build taxonomy query based on source.
$tax_query = [ 'relation' => 'OR' ];
$has_terms = false;

if ( 'auto' === $taxonomy_source ) {
	$taxonomies = get_object_taxonomies( $current_post_type, 'objects' );
	foreach ( $taxonomies as $taxonomy ) {
		if ( ! $taxonomy->public ) {
			continue;
		}
		$terms = get_the_terms( $current_post_id, $taxonomy->name );
		if ( ! $terms || is_wp_error( $terms ) ) {
			continue;
		}
		$tax_query[] = [
			'taxonomy'         => $taxonomy->name,
			'terms'            => wp_list_pluck( $terms, 'term_id' ),
			'include_children' => false,
		];
		$has_terms = true;
	}
} else {
	$terms = get_the_terms( $current_post_id, $taxonomy_source );
	if ( $terms && ! is_wp_error( $terms ) ) {
		$tax_query[] = [
			'taxonomy'         => $taxonomy_source,
			'terms'            => wp_list_pluck( $terms, 'term_id' ),
			'include_children' => false,
		];
		$has_terms = true;
	}
}

// Build query arguments.
$query_args = [
	'post_type'           => $current_post_type,
	'posts_per_page'      => $posts_per_page,
	'post__not_in'        => [ $current_post_id ],
	'order'               => 'DESC',
	'orderby'             => 'date',
	'ignore_sticky_posts' => true,
	'no_found_rows'       => true,
];

if ( $has_terms ) {
	$query_args['tax_query'] = $tax_query;
}

$related_query = new WP_Query( $query_args );

// Fallback: if no related posts found, try latest posts or hide.
if ( ! $related_query->have_posts() ) {
	if ( 'hide' === $fallback_behavior ) {
		wp_reset_postdata();
		return '';
	}

	// Fallback to latest posts (remove tax_query).
	unset( $query_args['tax_query'] );
	$related_query = new WP_Query( $query_args );

	if ( ! $related_query->have_posts() ) {
		wp_reset_postdata();
		return '';
	}
}

// Build wrapper classes.
$wrapper_classes = [
	'wp-block-aegis-related-posts',
	'is-style-' . sanitize_html_class( $style_variant ),
	'columns-' . $columns,
];

if ( ! empty( $attributes['className'] ) ) {
	$wrapper_classes[] = $attributes['className'];
}

if ( ! empty( $attributes['align'] ) ) {
	$wrapper_classes[] = 'align' . $attributes['align'];
}

$wrapper_attrs = get_block_wrapper_attributes( [
	'class'      => implode( ' ', $wrapper_classes ),
	'aria-label' => esc_attr( $heading ?: __( 'Related Posts', 'aegis' ) ),
] );

// Excerpt filter for custom length.
$original_excerpt_length = null;
$excerpt_filter = function () use ( $excerpt_length ) {
	return $excerpt_length;
};
add_filter( 'excerpt_length', $excerpt_filter, 999 );

$excerpt_more_filter = function () {
	return '&hellip;';
};
add_filter( 'excerpt_more', $excerpt_more_filter, 999 );

?>
<section <?php echo $wrapper_attrs; ?>>

	<?php if ( ! empty( $heading ) ) : ?>
		<<?php echo esc_attr( $heading_tag ); ?> class="wp-block-aegis-related-posts__heading">
			<?php echo esc_html( $heading ); ?>
		</<?php echo esc_attr( $heading_tag ); ?>>
	<?php endif; ?>

	<div class="wp-block-aegis-related-posts__grid">
		<?php while ( $related_query->have_posts() ) : $related_query->the_post(); ?>
			<article class="wp-block-aegis-related-posts__post">

				<?php if ( $show_image && has_post_thumbnail() ) : ?>
					<a href="<?php the_permalink(); ?>" class="wp-block-aegis-related-posts__image" aria-hidden="true" tabindex="-1">
						<?php the_post_thumbnail( 'medium_large', [
							'loading' => 'lazy',
							'style'   => 'aspect-ratio: ' . esc_attr( $image_aspect_ratio ) . '; object-fit: cover;',
						] ); ?>
					</a>
				<?php endif; ?>

				<div class="wp-block-aegis-related-posts__content">

					<?php if ( $show_category ) :
						$categories = get_the_category();
						if ( ! empty( $categories ) ) : ?>
							<span class="wp-block-aegis-related-posts__category">
								<a href="<?php echo esc_url( get_category_link( $categories[0]->term_id ) ); ?>">
									<?php echo esc_html( $categories[0]->name ); ?>
								</a>
							</span>
						<?php endif;
					endif; ?>

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

// Remove excerpt filters.
remove_filter( 'excerpt_length', $excerpt_filter, 999 );
remove_filter( 'excerpt_more', $excerpt_more_filter, 999 );
