<?php
/**
 * Title: 03. About Pattern
 * Slug: aegis/about-03
 * Categories: about
 * Description: Block pattern with image, tagline, heading, description, separators, and social links.
 * Keywords: about, heading, description, image, tagline, social links, separators, gradient
 * Viewport Width: 1400
 * Block Types: core/group, core/columns, core/column, core/heading, core/paragraph, core/image, core/separator, core/social-links, core/social-link
 * Inserter: true
 * 
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"<?php echo esc_html_x('03. About Pattern', 'Name of the pattern', 'aegis'); ?>","categories":["<?php echo esc_html_x('about', 'Name of the category', 'aegis'); ?>"],"patternName":"aegis/about-03"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"gradient":"diagonal-foreground-to-transparent-right-bottom","layout":{"type":"default"}} -->
<div class="wp-block-group has-diagonal-foreground-to-transparent-right-bottom-gradient-background has-background" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
	<!-- wp:columns {"verticalAlignment":null,"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}},"backgroundColor":"background"} -->
	<div class="wp-block-columns has-background-background-color has-background" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:image {"aspectRatio":"16/9","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"is-style-default","style":{"shadow":"var:preset|shadow|foreground-outlined-shadow-right-bottom","border":{"width":"2px"}},"borderColor":"foreground"} -->
			<figure class="wp-block-image size-large has-custom-border is-style-default"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_dark.webp" alt="<?php echo esc_html__('Abstract illustration featuring the theme\'s logo. Please replace this image with your own.', 'aegis'); ?>" class="has-border-color has-foreground-border-color" style="border-width:2px;box-shadow:var(--wp--preset--shadow--foreground-outlined-shadow-right-bottom);aspect-ratio:16/9;object-fit:cover" /></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:paragraph {"align":"left","metadata":{"name":"Tagline"},"style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"},"spacing":{"margin":{"bottom":"-15px"}}},"fontSize":"tiny"} -->
			<p class="has-text-align-left has-tiny-font-size" style="margin-bottom:-15px;font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase"><?php echo esc_html_x('Tagline', 'Enter a brief and descriptive tagline here.', 'aegis'); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":3,"style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"fontSize":"gigantic"} -->
			<h3 class="wp-block-heading has-gigantic-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;text-transform:uppercase"><?php echo esc_html_x('Heading', 'Enter a compelling headline for this section.', 'aegis'); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:separator {"className":"is-style-default"} -->
			<hr class="wp-block-separator has-alpha-channel-opacity is-style-default" />
			<!-- /wp:separator -->

			<!-- wp:paragraph -->
			<p><?php echo esc_html_x('Provide a concise description, up to 333 characters, summarizing your core principles, values, or key characteristics for easy understanding.', 'aegis'); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:separator {"className":"is-style-default"} -->
			<hr class="wp-block-separator has-alpha-channel-opacity is-style-default" />
			<!-- /wp:separator -->

			<!-- wp:social-links {"iconColor":"foreground","iconColorValue":"#1c1c1e","openInNewTab":true,"align":"left","className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"left","flexWrap":"wrap"}} -->
			<ul class="wp-block-social-links alignleft has-icon-color is-style-logos-only">

				<!-- wp:social-link {"url":"#","service":"facebook","label":""} /-->

				<!-- wp:social-link {"url":"#","service":"linkedin","label":""} /-->

				<!-- wp:social-link {"url":"#","service":"threads","label":""} /-->

				<!-- wp:social-link {"url":"#","service":"x"} /-->

				<!-- wp:social-link {"url":"#","service":"instagram","label":""} /-->

				<!-- wp:social-link {"url":"#","service":"pinterest","label":""} /-->

				<!-- wp:social-link {"url":"#","service":"tiktok"} /-->
			</ul>
			<!-- /wp:social-links -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
