<?php
/**
 * Title: 07. Hero Pattern
 * Slug: aegis/hero-07
 * Categories: hero
 * Description: Block pattern featuring a full-screen parallax cover with a vertical headline, concise description, and a call-to-action button. Designed to maximize visual impact and accessibility with a modern layout.
 * Keywords: hero, cover, parallax, vertical headline, description, call-to-action
 * Viewport Width: 1400
 * Block Types: core/button, core/buttons, core/cover, core/group, core/heading, core/paragraph
 * Inserter: true
 *
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"<?php echo esc_html_x('07. Hero Pattern', 'Name of the pattern', 'aegis'); ?>","categories":["<?php echo esc_html_x('hero', 'Name of the category', 'aegis'); ?>"],"patternName":"aegis/hero-07"},"align":"full","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"},"dimensions":{"minHeight":"100vh"}},"backgroundColor":"color-three"} -->
<div class="wp-block-group alignfull has-color-three-background-color has-background" style="min-height:100vh;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
	<!-- wp:cover {"url":"<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_dark.webp","alt":"<?php echo esc_html__( 'Abstract illustration featuring the theme\'s logo. Please replace this image with your own.', 'aegis' ); ?>","hasParallax":true,"dimRatio":60,"isUserOverlayColor":true,"minHeight":100,"minHeightUnit":"vh","gradient":"diagonal-transparent-to-large-foreground-right-bottom","contentPosition":"center center","align":"full","className":"is-style-container-stretch","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"margin":{"top":"0","bottom":"0"}},"color":{"duotone":"unset"}}} -->
	<div class="wp-block-cover alignfull has-parallax is-style-container-stretch" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:var(--wp--preset--spacing--40);padding-bottom:0;padding-left:var(--wp--preset--spacing--40);min-height:100vh">
		<span aria-hidden="true" class="wp-block-cover__background has-background-dim-60 has-background-dim wp-block-cover__gradient-background has-background-gradient has-diagonal-transparent-to-large-foreground-right-bottom-gradient-background"></span>
		<div role="img" aria-label="<?php echo esc_html__( 'Abstract illustration featuring the theme\'s logo. Please replace this image with your own.', 'aegis' ); ?>" class="wp-block-cover__image-background has-parallax" style="background-position:50% 50%;background-image:url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_dark.webp)">
		</div>
		<div class="wp-block-cover__inner-container">
			<!-- wp:group {"style":{"dimensions":{"minHeight":"px"},"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"horizontal","justifyContent":"space-between","verticalAlignment":"center"}} -->
			<div class="wp-block-group" style="min-height:px">
				<!-- wp:heading {"textAlign":"right","style":{"typography":{"writingMode":"vertical-rl","lineHeight":"1","textTransform":"uppercase","fontSize":"8rem"},"spacing":{"margin":{"right":"0","left":"calc( var(\u002d\u002dwp\u002d\u002dpreset\u002d\u002dspacing\u002d\u002d20) * -1)"}}}} -->
				<h2 class="wp-block-heading has-text-align-right" style="margin-right:0;margin-left:calc( var(--wp--preset--spacing--20) * -1);font-size:8rem;line-height:1;text-transform:uppercase;writing-mode:vertical-rl">
					<mark style="background-color:#f6f5f2" class="has-inline-color has-foreground-color"><?php echo wp_kses_post( _x( 'Head</mark>ing', 'Enter a compelling headline for this section.', 'aegis' ) ); ?>
				</h2>
				<!-- /wp:heading -->

				<!-- wp:group {"layout":{"type":"constrained","contentSize":"300px"}} -->
				<div class="wp-block-group">
					<!-- wp:paragraph {"style":{"layout":{"selfStretch":"fixed","flexSize":"50%"}}} -->
					<p><?php echo esc_html_x('Provide a concise description, up to 155 characters, summarizing the key points of an offer, article, or news update.', 'Replace with a description of the section.', 'aegis'); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:buttons {"layout":{"type":"flex","flexWrap":"nowrap","orientation":"horizontal"}} -->
					<div class="wp-block-buttons">
						<!-- wp:button {"className":"is-style-outline-shadow"} -->
						<div class="wp-block-button is-style-outline-shadow"><a class="wp-block-button__link wp-element-button" href="#"><?php echo esc_html_x( 'Call to Action', 'Call-to-action button text', 'aegis' ); ?></a>
						</div>
						<!-- /wp:button -->
					</div>
					<!-- /wp:buttons -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
	</div>
	<!-- /wp:cover -->
</div>
<!-- /wp:group -->