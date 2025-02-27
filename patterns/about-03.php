<?php
/**
 * Title: 03. About Pattern
 * Slug: aegis/about-03
 * Categories: about
 * Description: Block pattern featuring an image on the left and a tagline, heading, paragraph, and social links on the right.
 * Keywords: about, description, heading, image, social, tagline
 * Viewport Width: 1400
 * Block Types: core/column, core/columns, core/group, core/heading, core/image, core/paragraph, core/social-link, core/social-links
 * Inserter: true
 *
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"<?php echo esc_html_x( '03. About Pattern', 'Name of the pattern', 'aegis' ); ?>","categories":["<?php echo esc_html_x( 'about', 'Name of the category', 'aegis' ); ?>"],"patternName":"aegis/about-03"},"className":"is-style-section-dark","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"gradient":"diagonal-primary-to-foreground-left-bottom","layout":{"type":"default"}} -->
<div class="wp-block-group is-style-section-dark has-diagonal-primary-to-foreground-left-bottom-gradient-background has-background" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
	<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}},"gradient":"diagonal-primary-to-foreground-left-bottom"} -->
	<div class="wp-block-columns are-vertically-aligned-center has-diagonal-primary-to-foreground-left-bottom-gradient-background has-background" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
		<!-- wp:column {"verticalAlignment":"center","width":""} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:image {"aspectRatio":"16/9","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"is-style-default"} -->
			<figure class="wp-block-image size-large is-style-default">
				<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_light.webp" alt="<?php echo esc_html__( 'Abstract illustration featuring the theme\'s logo. Please replace this image with your own.', 'aegis' ); ?>" style="aspect-ratio:16/9;object-fit:cover" /></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:paragraph {"align":"left","metadata":{"name":"Tagline"},"style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"},"spacing":{"margin":{"bottom":"-15px"}}},"fontSize":"tiny"} -->
			<p class="has-text-align-left has-tiny-font-size" style="margin-bottom:-15px;font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase"><?php echo esc_html_x( 'Tagline', 'Enter a brief tagline (15-25 characters recommended)', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":3,"style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"fontSize":"gigantic"} -->
			<h3 class="wp-block-heading has-gigantic-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;text-transform:uppercase"><?php echo esc_html_x( 'Heading', 'Enter a main heading (20-40 characters recommended)', 'aegis' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p><?php echo esc_html_x( 'Provide a concise description, up to 250 characters, summarizing your core principles, values, or key characteristics for easy understanding.', 'Paragraph content guidance with character limit', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"left"}} -->
			<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--40)">
				<!-- wp:paragraph {"align":"left","metadata":{"name":"Tagline"},"style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"500"},"spacing":{"margin":{"bottom":"0"}}},"fontSize":"tiny"} -->
				<p class="has-text-align-left has-tiny-font-size" style="margin-bottom:0;font-style:normal;font-weight:500;letter-spacing:3px;text-transform:uppercase" id="social-links-label"><?php echo esc_html_x( 'Socials:', 'Label for social media links', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:social-links {"iconColor":"background","iconColorValue":"#f6f5f2","openInNewTab":true,"align":"left","className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"left","flexWrap":"wrap"},"aria-labelledby":"social-links-label"} -->
				<ul class="wp-block-social-links alignleft has-icon-color is-style-logos-only">
					<!-- wp:social-link {"url":"#","service":"facebook","label":"<?php echo esc_html_x( 'Facebook', 'Social media platform name', 'aegis' ); ?>"} /-->

					<!-- wp:social-link {"url":"#","service":"linkedin","label":"<?php echo esc_html_x( 'LinkedIn', 'Social media platform name', 'aegis' ); ?>"} /-->

					<!-- wp:social-link {"url":"#","service":"threads","label":"<?php echo esc_html_x( 'Threads', 'Social media platform name', 'aegis' ); ?>"} /-->

					<!-- wp:social-link {"url":"#","service":"x","label":"<?php echo esc_html_x( 'X', 'Social media platform name', 'aegis' ); ?>"} /-->

					<!-- wp:social-link {"url":"#","service":"instagram","label":"<?php echo esc_html_x( 'Instagram', 'Social media platform name', 'aegis' ); ?>"} /-->

					<!-- wp:social-link {"url":"#","service":"pinterest","label":"<?php echo esc_html_x( 'Pinterest', 'Social media platform name', 'aegis' ); ?>"} /-->

					<!-- wp:social-link {"url":"#","service":"tiktok","label":"<?php echo esc_html_x( 'TikTok', 'Social media platform name', 'aegis' ); ?>"} /-->
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