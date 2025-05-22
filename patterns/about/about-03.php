<?php

/**
 * Title: 03. About Pattern
 * Slug: aegis/about-03
 * Categories: about
 * Description: Dual-column layout with an image on the left and a vertically aligned tagline, heading, paragraph, and social links on the right, designed for storytelling or team messaging.
 * Keywords: about, image, intro, mission, message, social links, team
 * Viewport Width: 1400
 * Block Types: core/column, core/columns, core/group, core/heading, core/image, core/paragraph, core/social-link, core/social-links
 * Inserter: true
 *
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"03. About Pattern","categories":["about"],"patternName":"aegis/about-03"},"className":"is-style-section-dark","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}},"gradient":"diagonal-primary-to-contrast-left-bottom","layout":{"type":"default"}} -->
<div class="wp-block-group is-style-section-dark has-diagonal-primary-to-contrast-left-bottom-gradient-background has-background" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)">
	<!-- wp:columns {"verticalAlignment":"center"} -->
	<div class="wp-block-columns are-vertically-aligned-center">
		<!-- wp:column {"verticalAlignment":"center","width":""} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:image {"aspectRatio":"16/9","scale":"cover","sizeSlug":"large","linkDestination":"none","style":{"shadow":"var:preset|shadow|primary-solid-shadow-right-bottom","border":{"width":"2px"}},"borderColor":"base"} -->
			<figure class="wp-block-image size-large has-custom-border"><img src="<?php echo esc_url(get_theme_file_uri('assets/images/thumb_1920x1200_dark.webp')); ?>" alt="<?php echo esc_attr__( 'Placeholder image. Replace with your own image and descriptive alt text.', 'aegis' ); ?>" class="has-border-color has-base-border-color" style="border-width:2px;box-shadow:var(--wp--preset--shadow--primary-solid-shadow-right-bottom);aspect-ratio:16/9;object-fit:cover" /></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":""} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:paragraph {"align":"left","metadata":{},"style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"500"}},"fontSize":"small"} -->
			<p class="has-text-align-left has-small-font-size" style="font-style:normal;font-weight:500;letter-spacing:3px;text-transform:uppercase"><?php esc_html_e( 'Our Commitment to Innovation', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"fontSize":"xx-large"} -->
			<h2 class="wp-block-heading has-xx-large-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;text-transform:uppercase"><?php esc_html_e('About Us', 'aegis'); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}}} -->
			<p style="margin-top:var(--wp--preset--spacing--20);margin-bottom:var(--wp--preset--spacing--20)"><?php esc_html_e('Write a concise paragraph summarizing your core values or mission (max. 250 characters).', 'aegis'); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|10","left":"var:preset|spacing|10"}}},"layout":{"type":"flex","flexWrap":"wrap","orientation":"horizontal","justifyContent":"left"}} -->
			<div class="wp-block-group">
				<!-- wp:paragraph {"align":"left","className":"is-style-outline-shadow","style":{"typography":{"textTransform":"uppercase"}},"fontSize":"small"} -->
				<p class="has-text-align-left is-style-outline-shadow has-small-font-size" style="text-transform:uppercase"><?php esc_html_e('Connect with us:', 'aegis'); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:social-links {"iconColor":"background","iconColorValue":"#f6f5f2","openInNewTab":true,"size":"has-small-icon-size","align":"left","className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"left","flexWrap":"wrap"}} -->
				<ul class="wp-block-social-links alignleft has-small-icon-size has-icon-color is-style-logos-only">
					<!-- wp:social-link {"url":"#","service":"facebook","label":"Facebook"} /-->

					<!-- wp:social-link {"url":"#","service":"linkedin","label":"LinkedIn"} /-->

					<!-- wp:social-link {"url":"#","service":"threads","label":"Threads"} /-->

					<!-- wp:social-link {"url":"#","service":"bluesky","label":"Bluesky"} /-->

					<!-- wp:social-link {"url":"#","service":"instagram","label":"Instagram"} /-->

					<!-- wp:social-link {"url":"#","service":"pinterest","label":"Pinterest"} /-->

					<!-- wp:social-link {"url":"#","service":"tiktok","label":"TikTok"} /-->
				</ul>
				<!-- /wp:social-links -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
