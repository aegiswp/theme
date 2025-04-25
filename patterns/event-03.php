<?php
/**
 * Title: 03. Event Pattern
 * Slug: aegis/event-03
 * Categories: events
 * Description: Block pattern featuring an event layout with a headline, descriptive text, a vertical section marker, and cover blocks showcasing artwork with artist details.
 * Keywords: event, headline, artwork, artist, section, layout
 * Viewport Width: 1400
 * Block Types: core/group, core/columns, core/column, core/paragraph, core/heading, core/cover, core/buttons, core/social-links
 * Inserter: true
 *
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"03. Event Pattern","categories":["events"],"patternName":"aegis/event-03"},"align":"full","className":"is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|20","right":"var:preset|spacing|20"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"foreground","textColor":"background","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull is-style-default has-background-color has-foreground-background-color has-text-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--20)"><!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"verticalAlignment":"center","width":"","layout":{"type":"default"}} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group" style="padding-top:0;padding-bottom:0"><!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"500"}},"fontSize":"small"} -->
<p class="has-text-align-left has-small-font-size" style="font-style:normal;font-weight:500;letter-spacing:3px;text-transform:uppercase"><?php echo esc_html_x('Upcoming Events', 'Section tagline for art exhibition events', 'aegis'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"fontSize":"xx-large"} -->
<h3 class="wp-block-heading has-xx-large-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;text-transform:uppercase"><?php echo esc_html_x('Our Next Exhibition', 'Section heading for art exhibition events', 'aegis'); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"left","className":"has-text-align-center","style":{"spacing":{"margin":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}}} -->
<p class="has-text-align-left has-text-align-center" style="margin-top:var(--wp--preset--spacing--20);margin-bottom:var(--wp--preset--spacing--20)"><?php echo esc_html__('Explore our upcoming art exhibitions featuring inspiring works and talented artists. Join us for a celebration of creativity and culture.', 'aegis'); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:buttons {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|20","left":"var:preset|spacing|20"}}},"layout":{"type":"flex","justifyContent":"left"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"foreground","className":"is-style-dark-shadow is-style-dense-shadow"} -->
<div class="wp-block-button is-style-dark-shadow is-style-dense-shadow"><a class="wp-block-button__link has-foreground-background-color has-background wp-element-button" href="#"><?php echo esc_html_x('Get Tickets', 'Art exhibition ticket purchase button text', 'aegis'); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"backgroundColor":"foreground","className":"is-style-dark-shadow is-style-dense-shadow"} -->
<div class="wp-block-button is-style-dark-shadow is-style-dense-shadow"><a class="wp-block-button__link has-foreground-background-color has-background wp-element-button" href="#"><?php echo esc_html_x('Learn More →', 'Art exhibition secondary call-to-action button text', 'aegis'); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"top","width":"2%","className":"is-style-hide-mobile","style":{"spacing":{"padding":{"top":"0","bottom":"0"}}}} -->
<div class="wp-block-column is-vertically-aligned-top is-style-hide-mobile" style="padding-top:0;padding-bottom:0;flex-basis:2%"><!-- wp:paragraph {"align":"right","style":{"typography":{"fontSize":"4rem","lineHeight":"1","writingMode":"vertical-rl","textTransform":"uppercase","fontStyle":"normal","fontWeight":"600","letterSpacing":"3px"}}} -->
<p class="has-text-align-right" style="font-size:4rem;font-style:normal;font-weight:600;letter-spacing:3px;line-height:1;text-transform:uppercase;writing-mode:vertical-rl">
                <?php echo esc_html_x('Exhibition', 'Vertical section marker for art exhibition', 'aegis'); ?>            </p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"25%"} -->
<div class="wp-block-column" style="flex-basis:25%"><!-- wp:cover {"url":"https://aegis-rc1.local/wp-content/themes/aegis/assets/images/thumb_1200x1920_dark.webp","alt":"Abstract illustration featuring the theme\u0026#039;s logo. Please replace this image with your own.","dimRatio":60,"overlayColor":"foreground","isUserOverlayColor":true,"minHeight":75,"minHeightUnit":"vh","contentPosition":"bottom center","style":{"border":{"width":"1px"}},"borderColor":"background","layout":{"type":"default"}} -->
<div class="wp-block-cover has-custom-content-position is-position-bottom-center has-border-color has-background-border-color" style="border-width:1px;min-height:75vh"><img class="wp-block-cover__image-background" alt="Abstract illustration featuring the theme&#039;s logo. Please replace this image with your own." src="https://aegis-rc1.local/wp-content/themes/aegis/assets/images/thumb_1200x1920_dark.webp" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-foreground-background-color has-background-dim-60 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0"},"blockGap":"5px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center","verticalAlignment":"bottom","orientation":"vertical"}} -->
<div class="wp-block-group" style="padding-top:0;padding-bottom:0"><!-- wp:paragraph {"align":"center","fontSize":"medium"} -->
<p class="has-text-align-center has-medium-font-size">
                            <?php echo esc_html_x('Untitled Composition', 'Artwork title for art exhibition', 'aegis'); ?>                        </p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center","fontSize":"small"} -->
<p class="has-text-align-center has-small-font-size">
                            <?php echo esc_html_x('Jane Doe', 'Artist name for art exhibition', 'aegis'); ?>                        </p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"20%","className":"is-style-hide-mobile","style":{"spacing":{"padding":{"top":"0","bottom":"0"},"blockGap":"var:preset|spacing|30"}}} -->
<div class="wp-block-column is-style-hide-mobile" style="padding-top:0;padding-bottom:0;flex-basis:20%"><!-- wp:cover {"url":"https://aegis-rc1.local/wp-content/themes/aegis/assets/images/thumb_1200x1920_dark.webp","alt":"Abstract illustration featuring the theme\u0026#039;s logo. Please replace this image with your own.","dimRatio":60,"overlayColor":"foreground","isUserOverlayColor":true,"minHeight":50,"minHeightUnit":"vh","contentPosition":"bottom center","className":"is-style-dark-shadow","style":{"border":{"width":"1px"}},"borderColor":"background","layout":{"type":"default"}} -->
<div class="wp-block-cover has-custom-content-position is-position-bottom-center is-style-dark-shadow has-border-color has-background-border-color" style="border-width:1px;min-height:50vh"><img class="wp-block-cover__image-background" alt="Abstract illustration featuring the theme&#039;s logo. Please replace this image with your own." src="https://aegis-rc1.local/wp-content/themes/aegis/assets/images/thumb_1200x1920_dark.webp" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-foreground-background-color has-background-dim-60 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0"},"blockGap":"5px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center","verticalAlignment":"bottom","orientation":"vertical"}} -->
<div class="wp-block-group" style="padding-top:0;padding-bottom:0"><!-- wp:paragraph {"align":"center","fontSize":"medium"} -->
<p class="has-text-align-center has-medium-font-size">
                            <?php echo esc_html_x('Untitled Composition', 'Artwork title for art exhibition', 'aegis'); ?>                        </p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center","fontSize":"small"} -->
<p class="has-text-align-center has-small-font-size">
                            <?php echo esc_html_x('Jane Doe', 'Artist name for art exhibition', 'aegis'); ?>                        </p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->

<!-- wp:cover {"url":"https://aegis-rc1.local/wp-content/themes/aegis/assets/images/thumb_1200x1920_dark.webp","alt":"Abstract illustration featuring the theme\u0026#039;s logo. Please replace this image with your own.","dimRatio":60,"overlayColor":"foreground","isUserOverlayColor":true,"minHeight":30,"minHeightUnit":"vh","contentPosition":"bottom center","style":{"border":{"width":"1px"}},"borderColor":"background","layout":{"type":"default"}} -->
<div class="wp-block-cover has-custom-content-position is-position-bottom-center has-border-color has-background-border-color" style="border-width:1px;min-height:30vh"><img class="wp-block-cover__image-background" alt="Abstract illustration featuring the theme&#039;s logo. Please replace this image with your own." src="https://aegis-rc1.local/wp-content/themes/aegis/assets/images/thumb_1200x1920_dark.webp" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-foreground-background-color has-background-dim-60 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0"},"blockGap":"5px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center","verticalAlignment":"bottom","orientation":"vertical"}} -->
<div class="wp-block-group" style="padding-top:0;padding-bottom:0"><!-- wp:paragraph {"align":"center","fontSize":"medium"} -->
<p class="has-text-align-center has-medium-font-size">
                            <?php echo esc_html_x('Untitled Composition', 'Artwork title for art exhibition', 'aegis'); ?>                        </p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center","fontSize":"small"} -->
<p class="has-text-align-center has-small-font-size">
                            <?php echo esc_html_x('Jane Doe', 'Artist name for art exhibition', 'aegis'); ?>                        </p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
 