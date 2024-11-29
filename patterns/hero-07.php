<?php
/**
 * Title: 07. Hero Pattern
 * Slug: aegis/hero-07
 * Categories: hero
 * Description: Full-width hero pattern with a vertical social links column, tagline, heading, description, and call-to-action button.
 * Keywords: hero, heading, social links, tagline, parallax, description, call-to-action, cover
 * Viewport Width: 1400
 * Block Types: core/group, core/cover, core/columns, core/column, core/heading, core/paragraph, core/social-links, core/social-link, core/buttons, core/button
 * Inserter: true
 * 
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"<?php echo esc_html_x('07. Hero Pattern', 'Name of the pattern', 'aegis'); ?>"},"categories":["<?php echo esc_html_x('hero', 'Name of the category', 'aegis'); ?>"],"align":"full","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"}}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
	<!-- wp:cover {"url":"<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_dark.webp","alt":"<?php echo esc_html__( 'Abstract illustration featuring the theme\'s logo. Please replace this image with your own.', 'aegis' ); ?>","hasParallax":true,"dimRatio":60,"isUserOverlayColor":true,"minHeight":100,"minHeightUnit":"vh","gradient":"diagonal-transparent-to-large-foreground-left-bottom","contentPosition":"center center","align":"full","className":"is-style-container-stretch","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"margin":{"top":"0","bottom":"0"}},"color":{"duotone":"unset"}}} -->
	<div class="wp-block-cover alignfull has-parallax is-style-container-stretch" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:var(--wp--preset--spacing--40);padding-bottom:0;padding-left:var(--wp--preset--spacing--40);min-height:100vh">
		<span aria-hidden="true" class="wp-block-cover__background has-background-dim-60 has-background-dim wp-block-cover__gradient-background has-background-gradient has-diagonal-transparent-to-large-foreground-left-bottom-gradient-background"></span>
		<div role="img" aria-label="<?php echo esc_html__( 'Abstract illustration featuring the theme\'s logo. Please replace this image with your own.', 'aegis' ); ?>" class="wp-block-cover__image-background has-parallax" style="background-position:50% 50%;background-image:url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_dark.webp)">
		</div>
		<div class="wp-block-cover__inner-container">
			<!-- wp:columns -->
			<div class="wp-block-columns">
				<!-- wp:column {"width":"3%"} -->
				<div class="wp-block-column" style="flex-basis:3%">
					<!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
					<div class="wp-block-group">
						<!-- wp:social-links {"iconColor":"background","iconColorValue":"#f6f5f2","openInNewTab":true,"className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"center","orientation":"vertical"}} -->
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

						<!-- wp:paragraph {"align":"right","style":{"typography":{"textTransform":"uppercase","writingMode":"vertical-rl"}}} -->
						<p class="has-text-align-right" style="text-transform:uppercase;writing-mode:vertical-rl"><?php echo esc_html_x( 'Tagline', 'Enter a brief and descriptive tagline here.', 'aegis' ); ?></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->
				</div>
				<!-- /wp:column -->

				<!-- wp:column {"verticalAlignment":"center","width":"33.33%","style":{"spacing":{"blockGap":"var:preset|spacing|30","padding":{"left":"var:preset|spacing|30"}},"border":{"left":{"color":"var:preset|color|background","width":"2px"}}}} -->
				<div class="wp-block-column is-vertically-aligned-center" style="border-left-color:var(--wp--preset--color--background);border-left-width:2px;padding-left:var(--wp--preset--spacing--30);flex-basis:33.33%">
					<!-- wp:paragraph {"align":"left","metadata":{"name":"Tagline"},"style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"},"spacing":{"margin":{"bottom":"-20px"}}},"fontSize":"tiny"} -->
					<p class="has-text-align-left has-tiny-font-size" style="margin-bottom:-20px;font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase"><?php echo esc_html_x( 'Tagline', 'Enter a brief and descriptive tagline here.', 'aegis' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:heading {"level":2,"style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"fontSize":"gigantic"} -->
					<h2 class="wp-block-heading has-gigantic-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;text-transform:uppercase"><?php echo esc_html_x( 'Heading', 'Enter a compelling headline for this section.', 'aegis' ); ?></h2>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"style":{"layout":{"selfStretch":"fixed","flexSize":"50%"},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}}}} -->
					<p style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
					<?php echo esc_html_x('Provide a concise description, up to 155 characters, summarizing the key points of an offer, article, or news update.', 'Replace with a description of the section.', 'aegis'); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:buttons {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
					<div class="wp-block-buttons">
						<!-- wp:button {"className":"is-style-outline-shadow"} -->
						<div class="wp-block-button is-style-outline-shadow"><a class="wp-block-button__link wp-element-button" href="#"><?php echo esc_html_x( 'Call to Action', 'Call-to-action button text', 'aegis' ); ?></a>
						</div>
						<!-- /wp:button -->
					</div>
					<!-- /wp:buttons -->
				</div>
				<!-- /wp:column -->
			</div>
			<!-- /wp:columns -->
		</div>
	</div>
	<!-- /wp:cover -->
</div>
<!-- /wp:group -->