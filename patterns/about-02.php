<?php
/**
 * Title: 02. About Pattern
 * Slug: aegis/about-02
 * Categories: about
 * Description: Block pattern featuring a heading, paragraph, and call-to-action button on the left, and an image, tagline, separator, and social links on the right.
 * Keywords: about, call-to-action, description, heading, image, social, tagline
 * Viewport Width: 1400
 * Block Types: core/button, core/buttons, core/column, core/columns, core/group, core/heading, core/image, core/paragraph, core/separator, core/social-link, core/social-links
 * Inserter: true
 *
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"<?php echo esc_html_x( '02. About Pattern', 'Name of the pattern', 'aegis' ); ?>","categories":["<?php echo esc_html_x( 'about', 'Name of the category', 'aegis' ); ?>"],"patternName":"aegis/about-02"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"margin":{"top":"0","bottom":"0"}}},"gradient":"vertical-small-background-to-tertiary","layout":{"type":"default"}} -->
<div class="wp-block-group has-vertical-small-background-to-tertiary-gradient-background has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40)">
	<!-- wp:columns {"verticalAlignment":"center"} -->
	<div class="wp-block-columns are-vertically-aligned-center">
		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:paragraph {"align":"left","metadata":{"name":"Tagline"},"style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"500"},"spacing":{"margin":{"bottom":"-15px"}}},"fontSize":"tiny"} -->
			<p class="has-text-align-left has-tiny-font-size" style="margin-bottom:-15px;font-style:normal;font-weight:500;letter-spacing:3px;text-transform:uppercase"><?php echo esc_html_x( 'Tagline', 'Enter a brief and descriptive tagline here.', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"fontSize":"gigantic"} -->
			<h2 class="wp-block-heading has-gigantic-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;text-transform:uppercase"><?php echo esc_html_x( 'Heading', 'Enter a compelling headline for this section.', 'aegis' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}}} -->
			<p style="margin-top:var(--wp--preset--spacing--40);margin-bottom:var(--wp--preset--spacing--40)"><?php echo esc_html_x( 'Provide a concise description, up to 333 characters, summarizing your core principles, values, or key characteristics for easy understanding.', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"layout":{"type":"flex","flexWrap":"nowrap","orientation":"horizontal"}} -->
			<div class="wp-block-buttons">
				<!-- wp:button {"className":"is-style-dense-shadow"} -->
				<div class="wp-block-button is-style-dense-shadow"><a class="wp-block-button__link wp-element-button"href="#"><?php echo esc_html_x( 'Call to Action', 'Call-to-action button text', 'aegis' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:image {"aspectRatio":"16/9","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"is-style-default","style":{"shadow":"var:preset|shadow|primary-faded-shadow-left-bottom"}} -->
			<figure class="wp-block-image size-large is-style-default"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_dark.webp" alt="<?php echo esc_html__( 'Abstract illustration featuring the theme\'s logo. Please replace this image with your own.', 'aegis' ); ?>" style="box-shadow:var(--wp--preset--shadow--primary-faded-shadow-left-bottom);aspect-ratio:16/9;object-fit:cover" /></figure>
			<!-- /wp:image -->

			<!-- wp:paragraph {"align":"center","style":{"typography":{"letterSpacing":"3px","textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"tiny"} -->
			<p class="has-text-align-center has-tiny-font-size" style="font-style:normal;font-weight:500;letter-spacing:3px;text-transform:uppercase"><?php echo esc_html_x( 'Tagline', 'Enter a brief and descriptive tagline here.', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:separator {"className":"is-style-default","backgroundColor":"foreground"} -->
			<hr class="wp-block-separator has-text-color has-foreground-color has-alpha-channel-opacity has-foreground-background-color has-background is-style-default" />
			<!-- /wp:separator -->

			<!-- wp:social-links {"iconColor":"foreground","iconColorValue":"#1c1c1e","openInNewTab":true,"className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"center","flexWrap":"wrap"}} -->
			<ul class="wp-block-social-links has-icon-color is-style-logos-only">

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