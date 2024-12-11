<?php
/**
 * Title: 04. Hero Pattern
 * Slug: aegis/hero-04
 * Categories: hero, podcast
 * Description: Block pattern featuring a full-screen cover with a headline, description, and social links designed for podcasts, enabling easy navigation to platforms like Spotify, SoundCloud, and YouTube while maintaining accessibility and visual appeal.
 * Keywords: hero, cover, podcast, headline, social links, Spotify, SoundCloud, YouTube
 * Viewport Width: 1400
 * Block Types: core/cover, core/group, core/heading, core/paragraph, core/social-link, core/social-links
 * Inserter: true
 *
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"<?php echo esc_html_x('04. Hero Pattern', 'Name of the pattern', 'aegis'); ?>","categories":["<?php echo esc_html_x('hero, podcast', 'Name of the categories', 'aegis'); ?>"],"patternName":"aegis/hero-04"},"align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}}} -->
<div class="wp-block-group alignfull" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
	<!-- wp:cover {"url":"<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_dark.webp","alt":"<?php echo esc_html__( 'Abstract illustration featuring the theme\'s logo. Please replace this image with your own.', 'aegis' ); ?>","dimRatio":60,"overlayColor":"foreground","isUserOverlayColor":true,"minHeight":100,"minHeightUnit":"vh","contentPosition":"center center","align":"full","className":"is-style-default","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","bottom":"0"}}}} -->
	<div class="wp-block-cover alignfull is-style-default" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;min-height:100vh">
		<span aria-hidden="true" class="wp-block-cover__background has-foreground-background-color has-background-dim-60 has-background-dim"></span><img class="wp-block-cover__image-background" alt="<?php echo esc_html__( 'Abstract illustration featuring the theme\'s logo. Please replace this image with your own.', 'aegis' ); ?>" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_dark.webp" data-object-fit="cover" />
		<div class="wp-block-cover__inner-container">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","right":"var:preset|spacing|30","left":"var:preset|spacing|30","bottom":"0"},"blockGap":"0"}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group" style="padding-top:0;padding-right:var(--wp--preset--spacing--30);padding-bottom:0;padding-left:var(--wp--preset--spacing--30)">
				<!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center","verticalAlignment":"center","flexWrap":"wrap"}} -->
				<div class="wp-block-group" style="margin-top:0;margin-bottom:0">
					<!-- wp:paragraph {"align":"center","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"}},"fontSize":"tiny"} -->
					<p class="has-text-align-center has-tiny-font-size" style="font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase">
					<?php echo esc_html_x('Provide a concise description, up to 155 characters, summarizing the key points of an offer, article, or news update.', 'Replace with a description of the section.', 'aegis'); ?>
					</p>
					<!-- /wp:paragraph -->

					<!-- wp:heading {"textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"600","textTransform":"uppercase","fontSize":"6rem"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|30"}}}} -->
					<h2 class="wp-block-heading has-text-align-center" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--30);font-size:6rem;font-style:normal;font-weight:600;text-transform:uppercase"><?php echo esc_html_x( 'Heading', 'Enter a compelling headline for this section.', 'aegis' ); ?></h2>
					<!-- /wp:heading -->

					<!-- wp:social-links {"iconColor":"foreground","iconColorValue":"#1c1c1e","iconBackgroundColor":"background","iconBackgroundColorValue":"#f6f5f2","showLabels":true,"layout":{"type":"flex","justifyContent":"center","orientation":"horizontal"}} -->
					<ul class="wp-block-social-links has-visible-labels has-icon-color has-icon-background-color">
						<!-- wp:social-link {"url":"#","service":"spotify","label":"Spotify"} /-->

						<!-- wp:social-link {"url":"#","service":"soundcloud","label":"SoundCloud"} /-->

						<!-- wp:social-link {"url":"#","service":"youtube","label":"YouTube"} /-->

						<!-- wp:social-link {"url":"#","service":"patreon","label":""} /-->
					</ul>
					<!-- /wp:social-links -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
	</div>
	<!-- /wp:cover -->
</div>
<!-- /wp:group -->