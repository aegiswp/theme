<?php
/**
 * Aegis Embed Content Template
 *
 * Custom embed content template that replaces the WordPress default
 * (wp-includes/theme-compat/embed-content.php). Provides full structural
 * control over how Aegis posts appear when embedded on external sites.
 *
 * Enhancements over the default:
 * - Always renders featured image in rectangular (above-title) layout
 * - Adds Article schema.org structured data
 * - Reorders content: image → title → date → excerpt → terms → footer
 * - Cleaner footer with site icon + name (no WP logo fallback)
 *
 * @package Aegis
 * @since   1.0.0
 *
 * @see wp-includes/theme-compat/embed-content.php
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<div <?php post_class( 'wp-embed' ); ?>>

	<?php
	// --- Featured Image (always rectangular / above title) ---
	$thumbnail_id = 0;

	if ( has_post_thumbnail() ) {
		$thumbnail_id = get_post_thumbnail_id();
	}

	if ( 'attachment' === get_post_type() && wp_attachment_is_image() ) {
		$thumbnail_id = get_the_ID();
	}

	/** This filter is documented in wp-includes/theme-compat/embed-content.php */
	$thumbnail_id = apply_filters( 'embed_thumbnail_id', $thumbnail_id );

	if ( $thumbnail_id ) :
		/** This filter is documented in wp-includes/theme-compat/embed-content.php */
		$image_size = apply_filters( 'embed_thumbnail_image_size', 'aegis-embed', $thumbnail_id );
		?>
		<div class="wp-embed-featured-image rectangular">
			<a href="<?php the_permalink(); ?>" target="_top">
				<?php echo wp_get_attachment_image( $thumbnail_id, $image_size ); ?>
			</a>
		</div>
	<?php endif; ?>

	<?php // --- Title --- ?>
	<p class="wp-embed-heading">
		<a href="<?php the_permalink(); ?>" target="_top">
			<?php the_title(); ?>
		</a>
	</p>

	<?php // --- Publication Date (posts only) --- ?>
	<?php if ( is_single() ) : ?>
		<p class="wp-embed-posted-on">
			<?php
			printf(
				/* translators: %s: Publish date. */
				esc_html__( 'Posted on %s', 'aegis' ),
				sprintf(
					'<time datetime="%1$s">%2$s</time>',
					esc_attr( get_the_date( DATE_W3C ) ),
					esc_html( get_the_date() )
				)
			);
			?>
		</p>
	<?php endif; ?>

	<?php // --- Excerpt --- ?>
	<div class="wp-embed-excerpt"><?php the_excerpt_embed(); ?></div>

	<?php
	// --- Primary Term ---
	$aegis_embed_term = null;

	foreach ( [ 'category', 'post_tag' ] as $aegis_embed_taxonomy ) {
		$aegis_embed_terms = get_the_terms( get_the_ID(), $aegis_embed_taxonomy );

		if ( $aegis_embed_terms && ! is_wp_error( $aegis_embed_terms ) ) {
			$aegis_embed_term = $aegis_embed_terms[0];
			break;
		}
	}

	if ( $aegis_embed_term ) :
		?>
		<p class="wp-embed-terms">
			<span class="wp-embed-term"><?php echo esc_html( $aegis_embed_term->name ); ?></span>
		</p>
	<?php endif; ?>

	<?php
	/**
	 * Prints additional content after the embed excerpt.
	 *
	 * @since 4.4.0
	 */
	do_action( 'embed_content' );
	?>

	<?php // --- Footer --- ?>
	<div class="wp-embed-footer">
		<?php the_embed_site_title(); ?>

		<div class="wp-embed-meta">
			<?php
			/**
			 * Prints additional meta content in the embed template.
			 *
			 * @since 4.4.0
			 */
			do_action( 'embed_content_meta' );
			?>
		</div>
	</div>

	<?php
	// --- Article Schema.org Structured Data ---
	$aegis_embed_schema = [
		'@context'      => 'https://schema.org',
		'@type'         => 'Article',
		'headline'      => get_the_title(),
		'url'           => get_permalink(),
		'datePublished' => get_the_date( DATE_W3C ),
		'dateModified'  => get_the_modified_date( DATE_W3C ),
		'author'        => [
			'@type' => 'Person',
			'name'  => get_the_author(),
		],
		'publisher'     => [
			'@type' => 'Organization',
			'name'  => get_bloginfo( 'name' ),
		],
	];

	if ( $thumbnail_id ) {
		$aegis_embed_thumb_url = wp_get_attachment_image_url( $thumbnail_id, 'full' );

		if ( $aegis_embed_thumb_url ) {
			$aegis_embed_schema['image'] = $aegis_embed_thumb_url;
		}
	}

	$aegis_embed_excerpt = get_the_excerpt();

	if ( $aegis_embed_excerpt ) {
		$aegis_embed_schema['description'] = wp_strip_all_tags( $aegis_embed_excerpt );
	}

	$site_icon = get_site_icon_url( 512 );

	if ( $site_icon ) {
		$aegis_embed_schema['publisher']['logo'] = [
			'@type' => 'ImageObject',
			'url'   => $site_icon,
		];
	}
	?>
	<script type="application/ld+json"><?php echo wp_json_encode( $aegis_embed_schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ); ?></script>

</div>
<?php
