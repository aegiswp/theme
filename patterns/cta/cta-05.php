<?php
/**
 * Title: 05. CTA Pattern
 * Slug: aegis/cta-05
 * Categories: call-to-action
 * Description: Block pattern featuring a tagline, heading, description, call-to-action buttons, and an image in a two-column layout.
 * Keywords: call-to-action, buttons, image, tagline, heading, description, columns
 * Viewport Width: 1400
 * Block Types: core/button, core/buttons, core/column, core/columns, core/group, core/heading, core/image, core/paragraph
 * Inserter: true
 *
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"05. CTA Pattern","categories":["call-to-action"],"patternName":"aegis/cta-05"},"className":"is-style-section-dark","style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}}},"gradient":"diagonal-primary-to-contrast","layout":{"type":"default"}} -->
<div class="wp-block-group is-style-section-dark has-diagonal-primary-to-contrast-gradient-background has-background" style="padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--20);padding-right:0;padding-bottom:var(--wp--preset--spacing--20);padding-left:0"><!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|30"}}}} -->
<div class="wp-block-column is-vertically-aligned-center" style="padding-bottom:var(--wp--preset--spacing--30)"><!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"500"}},"fontSize":"small"} -->
<p class="has-text-align-left has-small-font-size" style="font-style:normal;font-weight:500;letter-spacing:3px;text-transform:uppercase">Early Access</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"fontSize":"xx-large"} -->
<h2 class="wp-block-heading has-xx-large-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;text-transform:uppercase">Premium Offer</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}}} -->
<p style="margin-top:var(--wp--preset--spacing--20);margin-bottom:var(--wp--preset--spacing--20)">Be the first to access our premium service with exclusive features. Limited spots available for founding members who sign up during this special promotion period.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|20","left":"var:preset|spacing|20"},"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}},"layout":{"type":"flex","justifyContent":"left"}} -->
<div class="wp-block-buttons" style="padding-top:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20)"><!-- wp:button {"className":"is-style-dense-shadow","style":{"border":{"radius":"0px","width":"2px"}},"borderColor":"contrast"} -->
<div class="wp-block-button is-style-dense-shadow"><a class="wp-block-button__link has-border-color has-contrast-border-color wp-element-button" href="#" style="border-width:2px;border-radius:0px">Join Waitlist</a></div>
<!-- /wp:button -->

<!-- wp:button {"backgroundColor":"primary","textColor":"base","className":"is-style-fill","style":{"border":{"radius":"0px"},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}}} -->
<div class="wp-block-button is-style-fill"><a class="wp-block-button__link has-base-color has-primary-background-color has-text-color has-background has-link-color wp-element-button" href="#" style="border-radius:0px">View Details <span class="wp-element-button__arrow" aria-hidden="true">→</span></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":""} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"aspectRatio":"16/9","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"is-style-default","mediaLink":"<?php echo esc_url( get_theme_file_uri( 'assets/images/thumb_1920x1200_dark.webp' ) ); ?>"} -->
<figure class="wp-block-image size-large is-style-default"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/thumb_1920x1200_dark.webp' ) ); ?>" alt="<?php echo esc_attr__( 'Premium service visual representation highlighting key features', 'aegis' ); ?>" style="aspect-ratio:16/9;object-fit:cover"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
