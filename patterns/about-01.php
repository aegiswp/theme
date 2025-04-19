<?php
/**
 * Title: 01. About Pattern
 * Slug: aegis/about-01
 * Categories: about
 * Description: Two-column layout featuring an image on the left and a heading, paragraph, and call-to-action button on the right over a diagonal gradient background.
 * Keywords: introduction, mission, values, branding, call-to-action
 * Viewport Width: 1400
 * Block Types: core/button, core/buttons, core/column, core/columns, core/group, core/heading, core/image, core/paragraph
 * Inserter: true
 *
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"01. About Pattern"},"gradient":"diagonal-transparent-to-large-tertiary-left-top","layout":{"type":"default"}} -->
<div class="wp-block-group has-diagonal-transparent-to-large-tertiary-left-top-gradient-background has-background">
	<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}}} -->
	<div class="wp-block-columns are-vertically-aligned-center" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)">
		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:image {"aspectRatio":"16/9","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"is-style-default","style":{"shadow":"var:preset|shadow|primary-solid-shadow-right-bottom","border":{"width":"2px"}},"borderColor":"base"} -->
			<figure class="wp-block-image size-large has-custom-border is-style-default"><img src="<?php echo esc_url(get_theme_file_uri( 'assets/images/thumb_1920x1200_dark.webp' )); ?>" alt="<?php echo esc_attr__( 'Placeholder image. Replace with your own image and descriptive alt text.', 'aegis' ); ?>" class="has-border-color has-base-border-color" style="border-width:2px;box-shadow:var(--wp--preset--shadow--primary-solid-shadow-right-bottom);aspect-ratio:16/9;object-fit:cover" /></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:paragraph {"align":"left","metadata":{},"style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"500"}},"fontSize":"small"} -->
			<p class="has-text-align-left has-small-font-size" style="font-style:normal;font-weight:500;letter-spacing:3px;text-transform:uppercase"><?php esc_html_e( 'Our Commitment to Innovation', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"fontSize":"xx-large"} -->
			<h2 class="wp-block-heading has-xx-large-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;text-transform:uppercase"><?php esc_html_e( 'About Us', 'aegis' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}}} -->
			<p style="margin-top:var(--wp--preset--spacing--20);margin-bottom:var(--wp--preset--spacing--20)"><?php esc_html_e( 'Write a concise paragraph summarizing your core values or mission (max. 250 characters).', 'aegis' ); ?> </p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|10","left":"var:preset|spacing|10"}}},"layout":{"type":"flex","flexWrap":"wrap","orientation":"horizontal","justifyContent":"left"}} -->
			<div class="wp-block-buttons">
				<!-- wp:button {"className":"is-style-outline-shadow"} -->
<div class="wp-block-button is-style-outline-shadow"><a class="wp-block-button__link wp-element-button" href="#"><?php esc_html_e( 'Learn More', 'aegis' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
