<?php
/**
 * Title: 06. CTA Pattern
 * Slug: aegis/cta-06
 * Categories: call-to-action
 * Description: Block pattern featuring a tagline, heading, description, and call-to-action buttons, with a centered layout and gradient background.
 * Keywords: call-to-action, buttons, tagline, heading, description, gradient, centered
 * Viewport Width: 1400
 * Block Types: core/button, core/buttons, core/group, core/heading, core/paragraph
 * Inserter: true
 *
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"06. CTA Pattern","categories":["call-to-action"],"patternName":"aegis/cta-06"},"className":"is-style-section-dark","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}}},"gradient":"diagonal-foreground-to-primary-left-bottom","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-section-dark has-diagonal-foreground-to-primary-left-bottom-gradient-background has-background" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--20)"><!-- wp:group {"gradient":"diagonal-foreground-to-primary-left-bottom","layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center","justifyContent":"center"}} -->
<div class="wp-block-group has-diagonal-foreground-to-primary-left-bottom-gradient-background has-background"><!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"500"}},"fontSize":"small"} -->
<p class="has-text-align-left has-small-font-size" style="font-style:normal;font-weight:500;letter-spacing:3px;text-transform:uppercase"><?php echo esc_html_x( 'Limited Offer', 'CTA tagline', 'aegis' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"fontSize":"xx-large"} -->
<h3 class="wp-block-heading has-xx-large-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;text-transform:uppercase"><?php echo esc_html_x( 'Act Now', 'CTA heading', 'aegis' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center"><?php echo esc_html__( 'This special promotion ends soon. Join hundreds of satisfied customers who have already taken advantage of our exclusive pricing.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--40)"><!-- wp:buttons {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|20","left":"var:preset|spacing|20"}}}} -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-outline","style":{"border":{"radius":"0px"}}} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="#" style="border-radius:0px"><?php echo esc_html_x( 'Get Started', 'Primary CTA button text', 'aegis' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"style":{"border":{"radius":"0px"}}} -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#" style="border-radius:0px"><?php echo esc_html_x( 'Learn More', 'Secondary CTA button text', 'aegis' ); ?> <span class="wp-element-button__arrow" aria-hidden="true"><?php echo esc_html_x( '→', 'Arrow for CTA button', 'aegis' ); ?></span></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->