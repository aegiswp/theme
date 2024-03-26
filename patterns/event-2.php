<?php
/**
 * Title: 02. Event Pattern
 * Slug: aegis/event-2
 * Categories: call-to-action, events, media, video
 * Description: Two-column block pattern with image poster on the left; tagline, heading, paragraph, postings, and social links on the right
 * Keywords: call to action, events, media, posts, query, video, social links
 * Viewport Width: 1400
 * Block Types: core/column, core/columns, core/group, core/heading, core/image, core/paragraph, core/query, core/social-links, core/button
 * Inserter: true
 * 
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}},"gradient":"diagonal-background-to-secondary","layout":{"type":"constrained"},"metadata":{"name":"<?php echo esc_html_x('02. Event Pattern', 'Name of the pattern', 'aegis'); ?>"}} -->
<div class="wp-block-group alignfull has-diagonal-background-to-secondary-gradient-background has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
    <!-- wp:columns {"align":"wide","style":{"spacing":{"padding":{"bottom":"0","top":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"var:preset|spacing|40"},"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}}} -->
    <div class="wp-block-columns alignwide" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--40);padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
        <!-- wp:column {"verticalAlignment":"top","width":"33.33%","style":{"spacing":{"padding":{"top":"0","bottom":"0"}}},"className":"is-style-default"} -->
        <div class="wp-block-column is-vertically-aligned-top is-style-default" style="padding-top:0;padding-bottom:0;flex-basis:33.33%">
            <!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"is-style-aegis-shadow-image"} -->
            <figure class="wp-block-image size-full is-style-aegis-shadow-image"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1200x1920_dark.webp" alt="<?php echo esc_attr__('Placeholder image: Brief description of the image and its context, non-text content for screen readers.', 'aegis'); ?>" /></figure>
            <!-- /wp:image -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"66.66%","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}},"className":"is-vertically-aligned-center"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;flex-basis:66.66%">
            <!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|40"},"padding":{"bottom":"0","top":"0","left":"0","right":"0"}}},"layout":{"type":"default"}} -->
            <div class="wp-block-group alignwide" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--40);padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                <!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"right":"var:preset|spacing|30"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
                <div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--30)">
                    <!-- wp:paragraph {"align":"center","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"}},"fontSize":"tiny"} -->
                    <p class="has-text-align-center has-tiny-font-size" style="font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase"><?php echo esc_html_x('[Tagline]', 'Replace with a descriptive tagline', 'aegis'); ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:heading {"textAlign":"center","level":3,"style":{"spacing":{"margin":{"right":"0px","left":"0px","top":"0px","bottom":"0px"},"padding":{"top":"0","bottom":"0"}},"typography":{"textTransform":"none"}},"fontSize":"gigantic"} -->
                    <h3 class="wp-block-heading has-text-align-center has-gigantic-font-size" style="margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;padding-top:0;padding-bottom:0;text-transform:none"><?php echo esc_html_x('[Heading]', 'Replace with a descriptive title', 'aegis'); ?></h3>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"0"}}}} -->
                    <p class="has-text-align-center" style="margin-top:0"><?php echo esc_html_x('[Description (160 characters): Enter a brief overview of a specific event, or events.]', 'Replace with a description of the section', 'aegis'); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->

            <!-- wp:query {"query":{"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"perPage":"4"},"enhancedPagination":true,"align":"wide"} -->
            <div class="wp-block-query alignwide">
                <!-- wp:post-template {"layout":{"type":"default"}} -->
                <!-- wp:columns {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
                <div class="wp-block-columns" style="margin-top:0;margin-bottom:0">
                    <!-- wp:column {"verticalAlignment":"center","width":"10em"} -->
                    <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:10em">
                        <!-- wp:post-date {"textAlign":"center","style":{"spacing":{"padding":{"top":"10px","right":"15px","bottom":"10px","left":"15px"}}},"backgroundColor":"foreground","textColor":"background","fontSize":"small"} /-->
                    </div>
                    <!-- /wp:column -->

                    <!-- wp:column {"verticalAlignment":"center","width":""} -->
                    <div class="wp-block-column is-vertically-aligned-center">
                        <!-- wp:post-title {"level":4,"isLink":true,"style":{"spacing":{"padding":{"top":"0","bottom":"0"},"margin":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|foreground"},":hover":{"color":{"text":"var:preset|color|primary"}}}}},"textColor":"foreground","className":"is-style-aegis-post-title-border"} /-->
                    </div>
                    <!-- /wp:column -->
                </div>
                <!-- /wp:columns -->

                <!-- wp:separator {"backgroundColor":"foreground","className":"is-style-default"} -->
                <hr class="wp-block-separator has-text-color has-foreground-color has-alpha-channel-opacity has-foreground-background-color has-background is-style-default" />
                <!-- /wp:separator -->
                <!-- /wp:post-template -->

                <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
                <div class="wp-block-buttons">
                    <!-- wp:button {"backgroundColor":"foreground","width":50,"className":"is-style-aegis-3d-button-dark"} -->
                    <div class="wp-block-button has-custom-width wp-block-button__width-50 is-style-aegis-3d-button-dark">
                        <a class="wp-block-button__link has-foreground-background-color has-background wp-element-button" href="#"><?php echo esc_html_x( '[Call to Action]', 'Call to action button text', 'aegis' ); ?></a></div>
                    <!-- /wp:button -->

                    <!-- wp:button {"backgroundColor":"foreground","width":50,"className":"is-style-aegis-3d-button-dark"} -->
                    <div class="wp-block-button has-custom-width wp-block-button__width-50 is-style-aegis-3d-button-dark">
                        <a class="wp-block-button__link has-foreground-background-color has-background wp-element-button" href="#"><?php echo esc_html_x( '[Call to Action]', 'Call to action button text', 'aegis' ); ?></a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:query -->

            <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
            <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                <!-- wp:social-links {"iconColor":"foreground","iconColorValue":"#1c1c1e","size":"has-small-icon-size","style":{"spacing":{"blockGap":"20px","margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"center"}} -->
                <ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--30)">
                    <!-- wp:social-link {"url":"#","service":"facebook","label":"Facebook"} /-->
                    <!-- wp:social-link {"url":"#","service":"meetup","label":"Meetup"} /-->
                    <!-- wp:social-link {"url":"#","service":"patreon","label":"Patreon"} /-->
                    <!-- wp:social-link {"url":"#","service":"google","label":"Google"} /-->
                </ul>
                <!-- /wp:social-links -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->