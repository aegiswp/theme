<?php

/**
 * Title: 02. About Pattern
 * Slug: aegis/about-02
 * Categories: about
 * Description: Two-column layout with content and call-to-action on the left, and media, tagline, and social links on the right, ideal for introducing your organization.
 * Keywords: about, introduction, mission, social media, team, tagline
 * Viewport Width: 1400
 * Block Types: core/button, core/buttons, core/column, core/columns, core/group, core/heading, core/image, core/paragraph, core/separator, core/social-link, core/social-links
 * Inserter: true
 *
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"02. About Pattern","categories":["about"],"patternName":"aegis/about-02"},"gradient":"vertical-small-base-to-tertiary","layout":{"type":"default"}} -->
<div class="wp-block-group has-vertical-small-base-to-tertiary-gradient-background has-background">
	<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}}} -->
	<div class="wp-block-columns are-vertically-aligned-center" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)">
		<!-- wp:column {"verticalAlignment":"center"} -->
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

			<!-- wp:buttons {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|10","left":"var:preset|spacing|10"}}},"layout":{"type":"flex","flexWrap":"wrap","orientation":"horizontal","justifyContent":"left"}} -->
			<div class="wp-block-buttons">
				<!-- wp:button {"className":"is-style-dense-shadow"} -->
				<div class="wp-block-button is-style-dense-shadow"><a class="wp-block-button__link wp-element-button" href="#"><?php esc_html_e('Learn More', 'aegis'); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:image {"aspectRatio":"16/9","scale":"cover","sizeSlug":"large","linkDestination":"none","style":{"shadow":"var:preset|shadow|primary-faded-shadow-left-bottom","border":{"width":"2px"}},"borderColor":"base"} -->
			<figure class="wp-block-image size-large has-custom-border"><img src="<?php echo esc_url(get_theme_file_uri('assets/images/thumb_1920x1200_dark.webp')); ?>" alt="<?php echo esc_attr__( 'Placeholder image. Replace with your own image and descriptive alt text.', 'aegis' ); ?>" class="has-border-color has-base-border-color" style="border-width:2px;box-shadow:var(--wp--preset--shadow--primary-faded-shadow-left-bottom);aspect-ratio:16/9;object-fit:cover" /></figure>
			<!-- /wp:image -->

			<!-- wp:separator {"className":"is-style-default","backgroundColor":"foreground"} -->
			<hr class="wp-block-separator has-text-color has-foreground-color has-alpha-channel-opacity has-foreground-background-color has-background is-style-default" />
			<!-- /wp:separator -->

			<!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"500","textTransform":"uppercase"}},"fontSize":"small"} -->
			<p class="has-text-align-center has-small-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><?php esc_html_e('Connect With Us', 'aegis'); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:social-links {"iconColor":"foreground","iconColorValue":"#1c1c1e","openInNewTab":true,"size":"has-small-icon-size","className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"center","flexWrap":"wrap"}} -->
			<ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only">
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
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
