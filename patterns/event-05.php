<?php
/**
 * Title: 05. Event Pattern
 * Slug: aegis/event-05
 * Categories: events
 * Description: Block pattern featuring a full-width event layout with a prominent image background, tagline, heading, event details, call-to-action buttons, and social media links.
 * Keywords: event, promotion, call-to-action, social, image, layout
 * Viewport Width: 1400
 * Block Types: core/group, core/columns, core/column, core/cover, core/heading, core/paragraph, core/buttons, core/social-links, core/image
 * Inserter: true
 *
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"05. Event Pattern","categories":["events"],"patternName":"aegis/event-05"},"align":"full","className":"event-main-container","style":{"dimensions":{"minHeight":"px"}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignfull event-main-container" style="min-height:px"><!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"top":"0","left":"0"},"padding":{"right":"0","left":"0"}}}} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center" style="padding-right:0;padding-left:0"><!-- wp:column {"verticalAlignment":"center","width":"66.66%","style":{"spacing":{"padding":{"right":"0","left":"0"}}},"layout":{"type":"default"}} -->
<div class="wp-block-column is-vertically-aligned-center" style="padding-right:0;padding-left:0;flex-basis:66.66%"><!-- wp:cover {"url":"https://aegis-rc1.local/wp-content/themes/aegis/assets/images/thumb_1920x1200_dark.webp","alt":"<?php echo esc_attr_x('Event featured image - concert venue with lighting effects', 'Cover image alternative text', 'aegis'); ?>","dimRatio":60,"overlayColor":"contrast","isUserOverlayColor":true,"minHeight":100,"minHeightUnit":"vh","contentPosition":"center center","className":"event-main-cover","style":{"spacing":{"padding":{"right":"var:preset|spacing|20","left":"var:preset|spacing|20"}}},"layout":{"type":"default"}} -->
<div class="wp-block-cover event-main-cover" style="padding-right:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20);min-height:100vh"><img class="wp-block-cover__image-background" alt="<?php echo esc_attr_x('Event featured image - concert venue with lighting effects', 'Cover image alternative text', 'aegis'); ?>" src="https://aegis-rc1.local/wp-content/themes/aegis/assets/images/thumb_1920x1200_dark.webp" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-contrast-background-color has-background-dim-60 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:group {"className":"event-header","style":{"spacing":{"blockGap":"0","padding":{"left":"0","right":"var:preset|spacing|30"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group event-header" style="padding-right:var(--wp--preset--spacing--30);padding-left:0"><!-- wp:paragraph {"align":"left","className":"event-tagline","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"}},"fontSize":"tiny"} -->
<p class="has-text-align-left event-tagline has-tiny-font-size" style="font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase">
                            <?php echo esc_html_x('Annual Music Festival', 'Event tagline example', 'aegis'); ?>                        </p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1,"className":"event-heading","style":{"spacing":{"margin":{"right":"0px","left":"0px","top":"0px","bottom":"0px"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"typography":{"textTransform":"none"}},"fontSize":"xx-large"} -->
<h1 class="wp-block-heading event-heading has-xx-large-font-size" style="margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;text-transform:none">
                            <?php echo esc_html_x('Summer Sounds 2025', 'Event heading example', 'aegis'); ?>                        </h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"left","className":"has-text-align-center","style":{"spacing":{"margin":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}}} -->
<p class="has-text-align-left has-text-align-center" style="margin-top:var(--wp--preset--spacing--20);margin-bottom:var(--wp--preset--spacing--20)"><?php echo esc_html_x('Join us for three days of music, art, and community as we celebrate our 10th anniversary with performances from over 20 artists across multiple stages.', 'Event description example', 'aegis'); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"},"blockGap":{"top":"var:preset|spacing|20","left":"var:preset|spacing|20"}}}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--50);margin-bottom:var(--wp--preset--spacing--50)"><!-- wp:button {"backgroundColor":"contrast","className":"is-style-outline","style":{"border":{"radius":"0px"}}} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-contrast-background-color has-background wp-element-button" style="border-radius:0px"><?php echo esc_html_x('Get Tickets', 'Call-to-action button text', 'aegis'); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|10","left":"var:preset|spacing|10"}}},"layout":{"type":"flex","flexWrap":"wrap","orientation":"horizontal","justifyContent":"left"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"align":"left","className":"is-style-outline-shadow","style":{"typography":{"textTransform":"uppercase"}},"fontSize":"medium"} -->
<p class="has-text-align-left is-style-outline-shadow has-medium-font-size" style="text-transform:uppercase"><?php echo esc_html_x('Follow us:', 'Social media section label', 'aegis'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:social-links {"iconColor":"background","iconColorValue":"#f6f5f2","size":"has-normal-icon-size","align":"left","className":"is-style-logos-only","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|10"}}},"layout":{"type":"flex","justifyContent":"left","flexWrap":"wrap"}} -->
<ul class="wp-block-social-links alignleft has-normal-icon-size has-icon-color is-style-logos-only"><!-- wp:social-link {"url":"#","service":"facebook","label":"<?php echo esc_attr_x('Follow our event on Facebook', 'Social link label', 'aegis'); ?>"} /-->

<!-- wp:social-link {"url":"#","service":"linkedin","label":"<?php echo esc_attr_x('Follow our event on LinkedIn', 'Social link label', 'aegis'); ?>"} /-->

<!-- wp:social-link {"url":"#","service":"threads","label":"<?php echo esc_attr_x('Follow our event on Threads', 'Social link label', 'aegis'); ?>"} /-->

<!-- wp:social-link {"url":"#","service":"bluesky","label":"<?php echo esc_attr_x('Follow our event on Bluesky', 'Social link label', 'aegis'); ?>"} /-->

<!-- wp:social-link {"url":"#","service":"instagram","label":"<?php echo esc_attr_x('Follow our event on Instagram', 'Social link label', 'aegis'); ?>"} /-->

<!-- wp:social-link {"url":"#","service":"pinterest","label":"<?php echo esc_attr_x('Follow our event on Pinterest', 'Social link label', 'aegis'); ?>"} /-->

<!-- wp:social-link {"url":"#","service":"tiktok","label":"<?php echo esc_attr_x('Follow our event on TikTok', 'Social link label', 'aegis'); ?>"} /--></ul>
<!-- /wp:social-links --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"33.33%","className":"event-details-column","style":{"spacing":{"padding":{"right":"0","left":"0"}}},"layout":{"type":"default"}} -->
<div class="wp-block-column is-vertically-aligned-center event-details-column" style="padding-right:0;padding-left:0;flex-basis:33.33%"><!-- wp:cover {"url":"https://aegis-rc1.local/wp-content/themes/aegis/assets/images/thumb_1200x1920_dark.webp","alt":"<?php echo esc_attr_x('Event details background with artistic lighting', 'Cover image alternative text', 'aegis'); ?>","dimRatio":60,"overlayColor":"contrast","isUserOverlayColor":true,"minHeight":100,"minHeightUnit":"vh","contentPosition":"center center","className":"event-details-cover","style":{"spacing":{"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"default"}} -->
<div class="wp-block-cover event-details-cover" style="padding-right:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30);min-height:100vh"><img class="wp-block-cover__image-background" alt="<?php echo esc_attr_x('Event details background with artistic lighting', 'Cover image alternative text', 'aegis'); ?>" src="https://aegis-rc1.local/wp-content/themes/aegis/assets/images/thumb_1200x1920_dark.webp" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-contrast-background-color has-background-dim-60 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:group {"className":"event-date-container","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","allowOrientation":false,"justifyContent":"center","flexWrap":"wrap"}} -->
<div class="wp-block-group event-date-container"><!-- wp:image {"width":"40px","sizeSlug":"full","linkDestination":"none","className":"event-decorative-image is-style-hidden-element"} -->
<figure class="wp-block-image size-full is-resized event-decorative-image is-style-hidden-element"><img src="https://aegis-rc1.local/wp-content/themes/aegis/assets/icons/laurel_left.svg" alt="" style="width:40px"/></figure>
<!-- /wp:image -->

<!-- wp:group {"className":"event-date-group","style":{"spacing":{"padding":{"right":"5px","left":"5px"}}}} -->
<div class="wp-block-group event-date-group" style="padding-right:5px;padding-left:5px"><!-- wp:heading {"textAlign":"left","className":"event-date-heading","style":{"typography":{"fontStyle":"normal","fontWeight":"500","textTransform":"uppercase","lineHeight":"1","letterSpacing":"3px"},"spacing":{"margin":{"bottom":"0"}}},"fontSize":"small"} -->
<h2 class="wp-block-heading has-text-align-left event-date-heading has-small-font-size" style="margin-bottom:0;font-style:normal;font-weight:500;letter-spacing:3px;line-height:1;text-transform:uppercase">
                                <?php echo esc_html_x('Summer Festival', 'Event name', 'aegis'); ?>                            </h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","className":"event-date-text","style":{"spacing":{"margin":{"top":"0"}},"typography":{"textTransform":"uppercase"}},"fontSize":"small"} -->
<p class="has-text-align-center event-date-text has-small-font-size" style="margin-top:0;text-transform:uppercase">
                                <?php echo esc_html_x('July 15-17, 2025', 'Event date', 'aegis'); ?>                            </p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:image {"width":"40px","sizeSlug":"full","linkDestination":"none","className":"event-decorative-image is-style-hidden-element"} -->
<figure class="wp-block-image size-full is-resized event-decorative-image is-style-hidden-element"><img src="https://aegis-rc1.local/wp-content/themes/aegis/assets/icons/laurel_right.svg" alt="" style="width:40px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"event-featured-container","style":{"spacing":{"padding":{"top":"0","bottom":"0"},"blockGap":"5px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center","verticalAlignment":"bottom","orientation":"vertical"}} -->
<div class="wp-block-group event-featured-container" style="padding-top:0;padding-bottom:0"><!-- wp:paragraph {"align":"center","className":"event-featured-label","fontSize":"medium"} -->
<p class="has-text-align-center event-featured-label has-medium-font-size">
                            <?php echo esc_html_x('Featuring', 'Featured artist label', 'aegis'); ?>                        </p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center","className":"event-featured-text","fontSize":"small"} -->
<p class="has-text-align-center event-featured-text has-small-font-size">
                            <?php echo esc_html_x('Over 20 Artists & Bands', 'Featured artist text', 'aegis'); ?>                        </p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
 