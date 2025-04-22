<?php
/**
 * Title: 01. CTA Pattern
 * Slug: aegis/cta-01
 * Categories: call-to-action
 * Description: Block pattern featuring a gradient background, bold typography, and a call-to-action layout with a tagline, headline, and buttons, designed for accessibility and user engagement.
 * Keywords: call-to-action, buttons, headline, tagline, gradient
 * Viewport Width: 1400
 * Block Types: core/button, core/buttons, core/columns, core/group, core/heading, core/paragraph
 * Inserter: true
 *
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"01. CTA Pattern","categories":["call-to-action"],"patternName":"aegis/cta-01"},"backgroundColor":"contrast","layout":{"type":"default"}} -->
<div class="wp-block-group has-contrast-background-color has-background"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"padding":{"right":"var:preset|spacing|20","left":"var:preset|spacing|20","top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}},"gradient":"diagonal-tertiary-to-transparent-right-top"} -->
<div class="wp-block-columns are-vertically-aligned-center has-diagonal-tertiary-to-transparent-right-top-gradient-background has-background" style="padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)"><!-- wp:column {"verticalAlignment":"center","width":"60%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:60%"><!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"500"}},"fontSize":"small"} -->
<p class="has-text-align-left has-small-font-size" style="font-style:normal;font-weight:500;letter-spacing:3px;text-transform:uppercase"><?php echo esc_html_x('Limited time offer', 'CTA tagline', 'aegis'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"700","fontSize":"3rem"},"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}}} -->
<h3 class="wp-block-heading" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;font-size:3rem;font-style:normal;font-weight:700;text-transform:uppercase"><?php echo esc_html_x('Take Action Today', 'CTA heading', 'aegis'); ?></h3>
<!-- /wp:heading --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"40%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:40%"><!-- wp:buttons {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|10","left":"var:preset|spacing|10"}}},"layout":{"type":"flex","justifyContent":"right"}} -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-dense-shadow","style":{"border":{"width":"2px"}},"borderColor":"background"} -->
<div class="wp-block-button is-style-dense-shadow"><a class="wp-block-button__link has-border-color has-background-border-color wp-element-button" href="#" style="border-width:2px"><?php echo esc_html_x('Sign Up Now', 'CTA primary button', 'aegis'); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"backgroundColor":"tertiary","textColor":"contrast","className":"is-style-outline-shadow","style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}}} -->
<div class="wp-block-button is-style-outline-shadow"><a class="wp-block-button__link has-contrast-color has-tertiary-background-color has-text-color has-background has-link-color wp-element-button" href="#">
                        <?php echo esc_html_x('Learn More', 'CTA secondary button', 'aegis'); ?> <span class="wp-element-button__arrow" aria-hidden="true"><?php echo esc_html_x('→', 'Arrow for CTA button', 'aegis'); ?></span>
                    </a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->