<?php
/**
 * 02. Event Block Pattern
 */
return array(
    'title'      => __('02. Event', 'aegis'),
    'description' => __('Event Schedule with image, heading, date, paragraph, buttons, and social icons', 'aegis'),
    'categories' => array('aegis-event'),
    'content' => '
<!-- wp:group {"tagName":"section","align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|40","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}},"gradient":"diagonal-secondary-to-background","className":"event","layout":{"type":"default"},"metadata":{"name":"' . esc_html__('Event Section', 'aegis') . '"}} -->
<section class="wp-block-group alignfull event has-diagonal-secondary-to-background-gradient-background has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--30)">
    <!-- wp:columns {"align":"wide","style":{"spacing":{"padding":{"bottom":"0","top":"0"}}}} -->
    <div class="wp-block-columns alignwide" style="padding-top:0;padding-bottom:0">
        <!-- wp:column {"verticalAlignment":"top","width":"33.33%"} -->
        <div class="wp-block-column is-vertically-aligned-top" style="flex-basis:33.33%">
            <!-- wp:group {"gradient":"horizontal-primary-to-background"} -->
            <div class="wp-block-group has-horizontal-primary-to-background-gradient-background has-background">
                <!-- wp:image {"lightbox":{"enabled":false},"scale":"cover","sizeSlug":"full","linkDestination":"none","className":"is-style-aegis-effect-3-image"} -->
                <figure class="wp-block-image size-full is-style-aegis-effect-3-image"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1200x1920_dark.webp" alt="' . esc_attr__('Describe the main elements of the image and its context.', 'aegis') . '" style="object-fit:cover" /></figure>
                <!-- /wp:image -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"66.66%","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}}} -->
        <div class="wp-block-column is-vertically-aligned-center" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;flex-basis:66.66%">
            <!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|40"},"padding":{"bottom":"0"}}},"layout":{"type":"default"}} -->
            <div class="wp-block-group alignwide" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--40);padding-bottom:0">
                <!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"}},"className":"tagline","fontSize":"tiny"} -->
                <p class="has-text-align-left tagline has-tiny-font-size" style="font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase">' . esc_html__('Event', 'aegis') . '</p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"300"},"spacing":{"margin":{"top":"5px","bottom":"10px"}}},"fontSize":"gigantic"} -->
                <h3 class="wp-block-heading has-gigantic-font-size" style="margin-top:5px;margin-bottom:10px;font-style:normal;font-weight:300"><strong>' . esc_html__('[Event Title]', 'aegis') . '</strong></h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph -->
                <p>' . esc_html__('Event Description (133 characters): [Provide details about upcoming events, including themes, or special highlights.]', 'aegis') . '</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->

            <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"0","right":"0","left":"0"}}}} -->
            <div class="wp-block-group alignfull" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                <!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
                <div class="wp-block-group alignwide">
                    <!-- wp:query {"query":{"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"perPage":"5"},"enhancedPagination":true,"align":"wide"} -->
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
                                <!-- wp:post-title {"level":4,"isLink":true,"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"className":"is-style-aegis-post-title-border"} /-->
                            </div>
                            <!-- /wp:column -->
                        </div>
                        <!-- /wp:columns -->

                        <!-- wp:separator {"backgroundColor":"foreground","className":"is-style-wide"} -->
                        <hr class="wp-block-separator has-text-color has-foreground-color has-alpha-channel-opacity has-foreground-background-color has-background is-style-wide" />
                        <!-- /wp:separator -->
                        <!-- /wp:post-template -->
                    </div>
                    <!-- /wp:query -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->

            <!-- wp:group {"layout":{"type":"default"}} -->
            <div class="wp-block-group">
                <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"space-between"}} -->
                <div class="wp-block-buttons">
                    <!-- wp:button {"textAlign":"center","width":50,"className":"is-style-aegis-button-effect-2"} -->
                    <div class="wp-block-button has-custom-width wp-block-button__width-50 is-style-aegis-button-effect-2">
                        <a class="wp-block-button__link has-text-align-center wp-element-button" href="#">' . esc_html__('Call to Action', 'aegis') . '</a></div>
                    <!-- /wp:button -->

                    <!-- wp:button {"textAlign":"center","width":50,"className":"is-style-aegis-button-effect-2"} -->
                    <div class="wp-block-button has-custom-width wp-block-button__width-50 is-style-aegis-button-effect-2">
                        <a class="wp-block-button__link has-text-align-center wp-element-button" href="#">' . esc_html__('Add to Cart', 'aegis') . '</a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:group -->

            <!-- wp:group {"layout":{"type":"default"}} -->
            <div class="wp-block-group">
                <!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap"}} -->
                <div class="wp-block-group">
                    <!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"tiny"} -->
                    <p class="has-tiny-font-size" style="font-style:normal;font-weight:600">' . esc_html__('Support Organizer:', 'aegis') . '</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:social-links {"iconColor":"foreground","iconColorValue":"#1c1c1e","openInNewTab":true,"size":"has-small-icon-size","style":{"spacing":{"blockGap":"20px","margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"left"}} -->
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
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</section>
<!-- /wp:group -->',
);