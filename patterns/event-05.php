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

<!-- wp:group {"metadata":{"name":"<?php echo esc_html_x('05. Event Pattern', 'Name of the pattern', 'aegis'); ?>","categories":["<?php echo esc_html_x('events', 'Name of the category', 'aegis'); ?>"],"patternName":"aegis/event-05"},"align":"full","style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"0"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"},"dimensions":{"minHeight":"px"}},"layout":{"type":"default"},"className":"event-main-container"} -->
<div class="wp-block-group alignfull event-main-container" style="min-height:px;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
    <!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"top":"0","left":"0"},"padding":{"right":"0","left":"0"}}}} -->
    <div class="wp-block-columns alignwide are-vertically-aligned-center" style="padding-right:0;padding-left:0">
        <!-- wp:column {"verticalAlignment":"center","width":"66.66%","style":{"spacing":{"padding":{"right":"0","left":"0"}}},"layout":{"type":"default"},"className":"event-main-column"} -->
        <div class="wp-block-column is-vertically-aligned-center event-main-column" style="padding-right:0;padding-left:0;flex-basis:66.66%">
            <!-- wp:cover {"url":"<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_dark.webp","alt":"<?php echo esc_attr_x('Event featured image - concert venue with lighting effects', 'Cover image alternative text', 'aegis'); ?>","dimRatio":60,"minHeight":100,"minHeightUnit":"vh","contentPosition":"center center","style":{"spacing":{"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"default"},"className":"event-main-cover"} -->
            <div class="wp-block-cover event-main-cover" style="padding-right:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30);min-height:100vh">
                <span aria-hidden="true" class="wp-block-cover__background has-background-dim-60 has-background-dim"></span>
                <img class="wp-block-cover__image-background" alt="<?php echo esc_attr_x('Event featured image - concert venue with lighting effects', 'Cover image alternative text', 'aegis'); ?>" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_dark.webp" data-object-fit="cover"/>
                <div class="wp-block-cover__inner-container">
                    <!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"left":"0","right":"var:preset|spacing|30"}}},"layout":{"type":"flex","orientation":"vertical"},"className":"event-header"} -->
                    <div class="wp-block-group event-header" style="padding-right:var(--wp--preset--spacing--30);padding-left:0">
                        <!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"}},"fontSize":"tiny","className":"event-tagline"} -->
                        <p class="has-text-align-left has-tiny-font-size event-tagline" style="font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase">
                            <?php echo esc_html_x('Annual Music Festival', 'Event tagline example', 'aegis'); ?>
                        </p>
                        <!-- /wp:paragraph -->

                        <!-- wp:heading {"level":1,"style":{"spacing":{"margin":{"right":"0px","left":"0px","top":"0px","bottom":"0px"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"typography":{"textTransform":"none","fontSize":"5.8rem"}},"className":"event-heading"} -->
                        <h1 class="wp-block-heading event-heading" style="margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;font-size:5.8rem;text-transform:none">
                            <?php echo esc_html_x('Summer Sounds 2025', 'Event heading example', 'aegis'); ?>
                        </h1>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0"}}},"className":"event-description"} -->
                        <p class="event-description" style="margin-top:0">
                            <?php echo esc_html_x('Join us for three days of music, art, and community as we celebrate our 10th anniversary with performances from over 20 artists across multiple stages.', 'Event description example', 'aegis'); ?>
                        </p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->

                    <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}},"className":"event-buttons"} -->
                    <div class="wp-block-buttons event-buttons" style="margin-top:var(--wp--preset--spacing--50)">
                        <!-- wp:button {"className":"is-style-outline event-cta"} -->
                        <div class="wp-block-button is-style-outline event-cta">
                            <a class="wp-block-button__link wp-element-button" href="#">
                                <?php echo esc_html_x('Get Tickets', 'Call-to-action button text', 'aegis'); ?>
                            </a>
                        </div>
                        <!-- /wp:button -->
                    </div>
                    <!-- /wp:buttons -->

                    <!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"left"},"className":"event-social-container"} -->
                    <div class="wp-block-group event-social-container">
                        <!-- wp:paragraph {"style":{"typography":{"textTransform":"none","fontStyle":"normal","fontWeight":"600"}},"fontSize":"tiny","className":"event-social-label"} -->
                        <p class="has-tiny-font-size event-social-label" style="font-style:normal;font-weight:600;text-transform:none">
                            <?php echo esc_html_x('Follow us:', 'Social media section label', 'aegis'); ?>
                        </p>
                        <!-- /wp:paragraph -->

                        <!-- wp:social-links {"iconColor":"background","iconColorValue":"#f9f9f9","size":"has-small-icon-size","className":"is-style-logos-only event-social-links","style":{"spacing":{"blockGap":"20px","margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"layout":{"type":"flex","justifyContent":"left"}} -->
                        <ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only event-social-links" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--30)">
                            <!-- wp:social-link {"url":"#","service":"facebook","label":"<?php echo esc_attr_x('Follow our event on Facebook', 'Social link label', 'aegis'); ?>"} /-->
                            <!-- wp:social-link {"url":"#","service":"instagram","label":"<?php echo esc_attr_x('Follow our event on Instagram', 'Social link label', 'aegis'); ?>"} /-->
                            <!-- wp:social-link {"url":"#","service":"spotify","label":"<?php echo esc_attr_x('Listen to our event playlist on Spotify', 'Social link label', 'aegis'); ?>"} /-->
                            <!-- wp:social-link {"url":"#","service":"youtube","label":"<?php echo esc_attr_x('Watch past performances on YouTube', 'Social link label', 'aegis'); ?>"} /-->
                        </ul>
                        <!-- /wp:social-links -->
                    </div>
                    <!-- /wp:group -->
                </div>
            </div>
            <!-- /wp:cover -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"33.33%","layout":{"type":"default"},"className":"event-details-column"} -->
        <div class="wp-block-column is-vertically-aligned-center event-details-column" style="flex-basis:33.33%">
            <!-- wp:cover {"url":"<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1200x1920_dark.webp","alt":"<?php echo esc_attr_x('Event details background with artistic lighting', 'Cover image alternative text', 'aegis'); ?>","dimRatio":60,"overlayColor":"foreground","isUserOverlayColor":true,"minHeight":100,"minHeightUnit":"vh","contentPosition":"center center","style":{"spacing":{"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"default"},"className":"event-details-cover"} -->
            <div class="wp-block-cover event-details-cover" style="padding-right:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30);min-height:100vh">
                <span aria-hidden="true" class="wp-block-cover__background has-foreground-background-color has-background-dim-60 has-background-dim"></span>
                <img class="wp-block-cover__image-background" alt="<?php echo esc_attr_x('Event details background with artistic lighting', 'Cover image alternative text', 'aegis'); ?>" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1200x1920_dark.webp" data-object-fit="cover"/>
                <div class="wp-block-cover__inner-container">
                    <!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","allowOrientation":false,"justifyContent":"center","flexWrap":"wrap"},"className":"event-date-container"} -->
                    <div class="wp-block-group event-date-container">
                        <!-- wp:image {"width":"40px","sizeSlug":"full","linkDestination":"none","className":"event-decorative-image is-style-hidden-element"} -->
                        <figure class="wp-block-image size-full is-resized event-decorative-image is-style-hidden-element">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/icons/laurel_left.svg" alt="" style="width:40px"/>
                        </figure>
                        <!-- /wp:image -->

                        <!-- wp:group {"style":{"spacing":{"padding":{"right":"5px","left":"5px"}}},"className":"event-date-group"} -->
                        <div class="wp-block-group event-date-group" style="padding-right:5px;padding-left:5px">
                            <!-- wp:heading {"textAlign":"left","style":{"typography":{"fontStyle":"normal","fontWeight":"500","textTransform":"uppercase","lineHeight":"1","letterSpacing":"3px"},"spacing":{"margin":{"bottom":"0"}}},"fontSize":"small","className":"event-date-heading"} -->
                            <h2 class="wp-block-heading has-text-align-left has-small-font-size event-date-heading" style="margin-bottom:0;font-style:normal;font-weight:500;letter-spacing:3px;line-height:1;text-transform:uppercase">
                                <?php echo esc_html_x('Summer Festival', 'Event name', 'aegis'); ?>
                            </h2>
                            <!-- /wp:heading -->

                            <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"0"}},"typography":{"textTransform":"uppercase"}},"fontSize":"small","className":"event-date-text"} -->
                            <p class="has-text-align-center has-small-font-size event-date-text" style="margin-top:0;text-transform:uppercase">
                                <?php echo esc_html_x('July 15-17, 2025', 'Event date', 'aegis'); ?>
                            </p>
                            <!-- /wp:paragraph -->
                        </div>
                        <!-- /wp:group -->

                        <!-- wp:image {"width":"40px","sizeSlug":"full","linkDestination":"none","className":"event-decorative-image is-style-hidden-element"} -->
                        <figure class="wp-block-image size-full is-resized event-decorative-image is-style-hidden-element">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/icons/laurel_right.svg" alt="" style="width:40px"/>
                        </figure>
                        <!-- /wp:image -->
                    </div>
                    <!-- /wp:group -->

                    <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0"},"blockGap":"5px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center","verticalAlignment":"bottom","orientation":"vertical"},"className":"event-featured-container"} -->
                    <div class="wp-block-group event-featured-container" style="padding-top:0;padding-bottom:0">
                        <!-- wp:paragraph {"align":"center","fontSize":"medium","className":"event-featured-label"} -->
                        <p class="has-text-align-center has-medium-font-size event-featured-label">
                            <?php echo esc_html_x('Featuring', 'Featured artist label', 'aegis'); ?>
                        </p>
                        <!-- /wp:paragraph -->

                        <!-- wp:paragraph {"align":"center","fontSize":"small","className":"event-featured-text"} -->
                        <p class="has-text-align-center has-small-font-size event-featured-text">
                            <?php echo esc_html_x('Over 20 Artists & Bands', 'Featured artist text', 'aegis'); ?>
                        </p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
            </div>
            <!-- /wp:cover -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->