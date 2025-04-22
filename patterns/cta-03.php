<?php
/**
 * Title: 03. CTA Pattern
 * Slug: aegis/cta-03
 * Categories: call-to-action
 * Description: Block pattern featuring a wide layout with a background image, tagline, bold headline, descriptive text, and call-to-action buttons. Designed for impactful messaging and accessibility.
 * Keywords: call-to-action, background image, headline, tagline, description, buttons
 * Viewport Width: 1400
 * Block Types: core/button, core/buttons, core/columns, core/group, core/heading, core/image, core/paragraph
 * Inserter: true
 *
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"categories":["call-to-action"],"patternName":"aegis/cta-03","name":"03. CTA Pattern"},"align":"wide"} -->
<div class="wp-block-group alignwide"><!-- wp:image {"aspectRatio":"16/9","scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/thumb_1920x1200_dark.webp' ) ); ?>" alt="<?php echo esc_attr__( 'Featured background image for the call to action section', 'aegis' ); ?>" style="aspect-ratio:16/9;object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"verticalAlignment":"top"} -->
<div class="wp-block-column is-vertically-aligned-top"><!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"500"}},"fontSize":"small"} -->
<p class="has-text-align-left has-small-font-size" style="font-style:normal;font-weight:500;letter-spacing:3px;text-transform:uppercase"><?php echo esc_html_x( 'Special Opportunity', 'CTA tagline', 'aegis' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"fontSize":"xx-large"} -->
<h2 class="wp-block-heading has-xx-large-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;text-transform:uppercase"><?php echo esc_html_x( 'Don\'t Miss Out', 'CTA heading', 'aegis' ); ?></h2>
<!-- /wp:heading --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"bottom","style":{"spacing":{"padding":{"bottom":"6rem"}}}} -->
<div class="wp-block-column is-vertically-aligned-bottom" style="padding-bottom:6rem"><!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}}} -->
<p style="margin-top:var(--wp--preset--spacing--20);margin-bottom:var(--wp--preset--spacing--20)"><?php echo esc_html_x( 'Join thousands of satisfied customers who have already taken advantage of this exclusive offer. Limited availability means this opportunity won\'t last long.', 'CTA description', 'aegis' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|20","left":"var:preset|spacing|20"}}},"layout":{"type":"flex","justifyContent":"right"}} -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-dense-shadow","style":{"border":{"radius":"0px","width":"2px"}},"borderColor":"contrast"} -->
<div class="wp-block-button is-style-dense-shadow"><a class="wp-block-button__link has-border-color has-contrast-border-color wp-element-button" href="#" style="border-width:2px;border-radius:0px"><?php echo esc_html_x( 'Learn More', 'Secondary CTA button text', 'aegis' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"backgroundColor":"base","textColor":"contrast","className":"is-style-fill","style":{"border":{"radius":"0px"},"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}}} -->
<div class="wp-block-button is-style-fill"><a class="wp-block-button__link has-contrast-color has-base-background-color has-text-color has-background has-link-color wp-element-button" href="#" style="border-radius:0px"><?php echo esc_html_x( 'Start Now', 'Primary CTA button text', 'aegis' ); ?> <span class="wp-element-button__arrow" aria-hidden="true"><?php echo esc_html_x( '→', 'Arrow for CTA button', 'aegis' ); ?></span></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
 