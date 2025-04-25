<?php
/**
 * Title: 04. Event Pattern
 * Slug: aegis/event-04
 * Categories: events
 * Description: Block pattern featuring three-column event sections with full-height cover images, tagline, heading, brief description, and call-to-action buttons.
 * Keywords: call-to-action, event, images, layout, promotions, social
 * Viewport Width: 1400
 * Block Types: core/group, core/columns, core/column, core/cover, core/heading, core/paragraph, core/buttons, core/button, core/social-links
 * Inserter: true
 *
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"04. Event Pattern","categories":["events"],"patternName":"aegis/event-04"},"align":"full","style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"0"},"margin":{"top":"0","bottom":"0"}},"dimensions":{"minHeight":"100vh"}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignfull" style="min-height:100vh;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"0","left":"0"}}}} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"width":"33.33%","style":{"spacing":{"padding":{"right":"0","left":"0"},"blockGap":"0"}}} -->
<div class="wp-block-column" style="padding-right:0;padding-left:0;flex-basis:33.33%"><!-- wp:cover {"url":"https://aegis-rc1.local/wp-content/themes/aegis/assets/images/thumb_1200x1920_dark.webp","alt":"Abstract illustration featuring the theme\u0026#039;s logo. Please replace this image with your own.","dimRatio":70,"overlayColor":"contrast","isUserOverlayColor":true,"focalPoint":{"x":0.5,"y":0.5},"minHeight":100,"minHeightUnit":"vh","contentPosition":"bottom center","style":{"spacing":{"padding":{"right":"var:preset|spacing|20","left":"var:preset|spacing|20","top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}},"layout":{"type":"default"}} -->
<div class="wp-block-cover has-custom-content-position is-position-bottom-center" style="padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20);min-height:100vh"><img class="wp-block-cover__image-background" alt="Abstract illustration featuring the theme&#039;s logo. Please replace this image with your own." src="https://aegis-rc1.local/wp-content/themes/aegis/assets/images/thumb_1200x1920_dark.webp" style="object-position:50% 50%" data-object-fit="cover" data-object-position="50% 50%"/><span aria-hidden="true" class="wp-block-cover__background has-contrast-background-color has-background-dim-70 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"right":"var:preset|spacing|30"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--30)"><!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"500"}},"fontSize":"small"} -->
<p class="has-text-align-left has-small-font-size" style="font-style:normal;font-weight:500;letter-spacing:3px;text-transform:uppercase"><?php echo esc_html_x('Upcoming Events', 'Section tagline for events', 'aegis'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"fontSize":"xx-large"} -->
<h3 class="wp-block-heading has-xx-large-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;text-transform:uppercase"><?php echo esc_html_x('Event', 'Section heading for events', 'aegis'); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"left","className":"has-text-align-center","style":{"spacing":{"margin":{"top":"var:preset|spacing|20","bottom":"0"}}}} -->
<p class="has-text-align-left has-text-align-center" style="margin-top:var(--wp--preset--spacing--20);margin-bottom:0"><?php echo esc_html__('Discover our upcoming events designed to connect, inspire, and engage our community. Stay tuned for exciting experiences and opportunities to participate.', 'aegis'); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"},"blockGap":{"top":"var:preset|spacing|20","left":"var:preset|spacing|20"}}}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--50);margin-bottom:var(--wp--preset--spacing--50)"><!-- wp:button {"backgroundColor":"contrast","className":"is-style-outline","style":{"border":{"radius":"0px"}}} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-contrast-background-color has-background wp-element-button" style="border-radius:0px">
                            <?php echo esc_html_x('Call to Action', 'Event call-to-action button text', 'aegis'); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"33.33%","style":{"spacing":{"padding":{"right":"0","left":"0"},"blockGap":"0"}}} -->
<div class="wp-block-column" style="padding-right:0;padding-left:0;flex-basis:33.33%"><!-- wp:cover {"url":"https://aegis-rc1.local/wp-content/themes/aegis/assets/images/thumb_1200x1920_dark.webp","alt":"Abstract illustration featuring the theme\u0026#039;s logo. Please replace this image with your own.","dimRatio":70,"overlayColor":"contrast","isUserOverlayColor":true,"focalPoint":{"x":0.5,"y":0.5},"minHeight":100,"minHeightUnit":"vh","contentPosition":"bottom center","style":{"spacing":{"padding":{"right":"var:preset|spacing|20","left":"var:preset|spacing|20","top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}},"layout":{"type":"default"}} -->
<div class="wp-block-cover has-custom-content-position is-position-bottom-center" style="padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20);min-height:100vh"><img class="wp-block-cover__image-background" alt="Abstract illustration featuring the theme&#039;s logo. Please replace this image with your own." src="https://aegis-rc1.local/wp-content/themes/aegis/assets/images/thumb_1200x1920_dark.webp" style="object-position:50% 50%" data-object-fit="cover" data-object-position="50% 50%"/><span aria-hidden="true" class="wp-block-cover__background has-contrast-background-color has-background-dim-70 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"right":"var:preset|spacing|30"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--30)"><!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"500"}},"fontSize":"small"} -->
<p class="has-text-align-left has-small-font-size" style="font-style:normal;font-weight:500;letter-spacing:3px;text-transform:uppercase"><?php echo esc_html_x('Upcoming Events', 'Section tagline for events', 'aegis'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"fontSize":"xx-large"} -->
<h3 class="wp-block-heading has-xx-large-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;text-transform:uppercase"><?php echo esc_html_x('Event', 'Section heading for events', 'aegis'); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"left","className":"has-text-align-center","style":{"spacing":{"margin":{"top":"var:preset|spacing|20","bottom":"0"}}}} -->
<p class="has-text-align-left has-text-align-center" style="margin-top:var(--wp--preset--spacing--20);margin-bottom:0"><?php echo esc_html__('Discover our upcoming events designed to connect, inspire, and engage our community. Stay tuned for exciting experiences and opportunities to participate.', 'aegis'); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"},"blockGap":{"top":"var:preset|spacing|20","left":"var:preset|spacing|20"}}}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--50);margin-bottom:var(--wp--preset--spacing--50)"><!-- wp:button {"backgroundColor":"contrast","className":"is-style-outline","style":{"border":{"radius":"0px"}}} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-contrast-background-color has-background wp-element-button" style="border-radius:0px">
                            <?php echo esc_html_x('Call to Action', 'Event call-to-action button text', 'aegis'); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"33.33%","style":{"spacing":{"padding":{"right":"0","left":"0"},"blockGap":"0"}}} -->
<div class="wp-block-column" style="padding-right:0;padding-left:0;flex-basis:33.33%"><!-- wp:cover {"url":"https://aegis-rc1.local/wp-content/themes/aegis/assets/images/thumb_1200x1920_dark.webp","alt":"Abstract illustration featuring the theme\u0026#039;s logo. Please replace this image with your own.","dimRatio":70,"overlayColor":"contrast","isUserOverlayColor":true,"focalPoint":{"x":0.5,"y":0.5},"minHeight":100,"minHeightUnit":"vh","contentPosition":"bottom center","style":{"spacing":{"padding":{"right":"var:preset|spacing|20","left":"var:preset|spacing|20","top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}},"layout":{"type":"default"}} -->
<div class="wp-block-cover has-custom-content-position is-position-bottom-center" style="padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20);min-height:100vh"><img class="wp-block-cover__image-background" alt="Abstract illustration featuring the theme&#039;s logo. Please replace this image with your own." src="https://aegis-rc1.local/wp-content/themes/aegis/assets/images/thumb_1200x1920_dark.webp" style="object-position:50% 50%" data-object-fit="cover" data-object-position="50% 50%"/><span aria-hidden="true" class="wp-block-cover__background has-contrast-background-color has-background-dim-70 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"right":"var:preset|spacing|30"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--30)"><!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"500"}},"fontSize":"small"} -->
<p class="has-text-align-left has-small-font-size" style="font-style:normal;font-weight:500;letter-spacing:3px;text-transform:uppercase"><?php echo esc_html_x('Upcoming Events', 'Section tagline for events', 'aegis'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"fontSize":"xx-large"} -->
<h3 class="wp-block-heading has-xx-large-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;text-transform:uppercase"><?php echo esc_html_x('Event', 'Section heading for events', 'aegis'); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"left","className":"has-text-align-center","style":{"spacing":{"margin":{"top":"var:preset|spacing|20","bottom":"0"}}}} -->
<p class="has-text-align-left has-text-align-center" style="margin-top:var(--wp--preset--spacing--20);margin-bottom:0"><?php echo esc_html__('Discover our upcoming events designed to connect, inspire, and engage our community. Stay tuned for exciting experiences and opportunities to participate.', 'aegis'); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"},"blockGap":{"top":"var:preset|spacing|20","left":"var:preset|spacing|20"}}}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--50);margin-bottom:var(--wp--preset--spacing--50)"><!-- wp:button {"backgroundColor":"contrast","className":"is-style-outline","style":{"border":{"radius":"0px"}}} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-contrast-background-color has-background wp-element-button" style="border-radius:0px">
                            <?php echo esc_html_x('Call to Action', 'Event call-to-action button text', 'aegis'); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
