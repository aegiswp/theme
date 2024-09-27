<?php
/**
 * Title: 02. Hero Pattern
 * Slug: aegis/hero-02
 * Categories: hero
 * Description: Full-width cover hero with a left-aligned headline, paragraph, and call to action button
 * Keywords: banner, call to action, hero, promotion
 * Viewport Width: 1400
 * Block Types: core/group, core/cover, core/heading, core/paragraph, core/buttons
 * Inserter: true
 * 
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"<?php echo esc_html_x('02. Hero Pattern', 'Name of the pattern', 'aegis'); ?>","categories":["<?php echo esc_html_x('hero', 'Name of the category', 'aegis'); ?>"],"patternName":"aegis/hero-02"},"align":"full","className":"is-style-section-dark","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"dimensions":{"minHeight":""}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignfull is-style-section-dark" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
	<!-- wp:cover {"url":"<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_dark.webp","alt":"<?php echo esc_attr__('Placeholder image depicting abstract mountains and a sun. Replace with your image.', 'aegis'); ?>","hasParallax":true,"isRepeated":true,"dimRatio":60,"isUserOverlayColor":true,"minHeight":100,"minHeightUnit":"vh","gradient":"diagonal-foreground-to-primary","contentPosition":"center left","align":"wide","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"var:preset|spacing|50","left":"var:preset|spacing|50"}}}} -->
	<div class="wp-block-cover alignwide has-parallax is-repeated has-custom-content-position is-position-center-left" style="margin-top:0;margin-bottom:0;padding-right:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50);min-height:100vh">
		<span aria-hidden="true" class="wp-block-cover__background has-background-dim-60 has-background-dim wp-block-cover__gradient-background has-background-gradient has-diagonal-foreground-to-primary-gradient-background"></span>
		<div role="img" aria-label="<?php echo esc_attr__('Placeholder image depicting abstract mountains and a sun. Replace with your image.', 'aegis'); ?>" class="wp-block-cover__image-background has-parallax is-repeated" style="background-position:50% 50%;background-image:url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_dark.webp)">
		</div>
		<div class="wp-block-cover__inner-container">
			<!-- wp:group {"style":{"spacing":{"padding":{"right":"0","left":"0"}}},"layout":{"type":"constrained","contentSize":"40%","justifyContent":"left"}} -->
			<div class="wp-block-group" style="padding-right:0;padding-left:0">
				<!-- wp:paragraph {"align":"left","metadata":{"name":"Tagline"},"style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"},"spacing":{"margin":{"bottom":"-20px"}}},"fontSize":"medium"} -->
				<p class="has-text-align-left has-medium-font-size" style="margin-bottom:-20px;font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase">
					<mark style="background-color:#f6f5f2" class="has-inline-color has-foreground-color"><?php echo esc_html_x('Tagline', 'Replace with a descriptive section tagline.', 'aegis'); ?></mark>
				</p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"level":3,"style":{"typography":{"textTransform":"uppercase","fontSize":"6rem"},"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}}} -->
				<h3 class="wp-block-heading" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;font-size:6rem;text-transform:uppercase">
					<?php echo esc_html_x('Heading', 'Replace with a descriptive section headline.', 'aegis'); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"style":{"border":{"left":{"width":"6px"}},"spacing":{"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30"}}}} -->
				<p style="border-left-width:6px;padding-right:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
					<?php echo esc_html_x('Provide a brief description with a maximum of 155 characters. Summarize the key points of an offer, article, or news update concisely.', 'Replace with a description of the section.', 'aegis'); ?>
				</p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"left","flexWrap":"wrap"}} -->
				<div class="wp-block-buttons">
					<!-- wp:button {"className":"is-style-outline-shadow"} -->
					<div class="wp-block-button is-style-outline-shadow"><a class="wp-block-button__link wp-element-button" href="#"><?php echo esc_html_x( 'Call to Action', 'Call to action button text', 'aegis' ); ?></a>
					</div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:group -->
		</div>
	</div>
	<!-- /wp:cover -->
</div>
<!-- /wp:group -->