<?php
/**
 * Title: 01. Event Pattern
 * Slug: aegis/event-01
 * Categories: event
 * Description: Block pattern featuring an event layout with a centered tagline, heading, event description, video content, dynamic event query, and social links.
 * Keywords: event, video, query, social, layout, call-to-action
 * Viewport Width: 1400
 * Block Types: core/group, core/columns, core/column, core/paragraph, core/heading, core/video, core/query, core/buttons, core/social-links
 * Inserter: true
 *
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}},"gradient":"diagonal-tertiary-to-background-right-bottom","layout":{"type":"constrained"},"metadata":{"name":"<?php echo esc_html_x('01. Event Pattern', 'Name of the pattern', 'aegis'); ?>"}} -->
<div class="wp-block-group alignfull has-diagonal-tertiary-to-background-right-bottom-gradient-background has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--30)">
    <!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|40"},"padding":{"bottom":"0","top":"0"}}},"layout":{"type":"default"}} -->
    <div class="wp-block-group alignwide" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--40);padding-top:0;padding-bottom:0">
        <!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"right":"var:preset|spacing|30"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
        <div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--30)">
            <!-- wp:paragraph {"align":"center","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"}},"fontSize":"tiny"} -->
            <p class="has-text-align-center has-tiny-font-size" style="font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase">
                <?php echo esc_html_x( 'Tagline', 'Enter a brief and descriptive tagline here.', 'aegis' ); ?>
            </p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"textAlign":"center","level":3,"style":{"spacing":{"margin":{"right":"0px","left":"0px","top":"0px","bottom":"0px"},"padding":{"top":"0","bottom":"0"}},"typography":{"textTransform":"none"}},"fontSize":"gigantic"} -->
            <h3 class="wp-block-heading has-text-align-center has-gigantic-font-size" style="margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;padding-top:0;padding-bottom:0;text-transform:none">
                <?php echo esc_html_x( 'Heading', 'Enter a compelling headline for this section.', 'aegis' ); ?>
            </h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"0"}}}} -->
            <p class="has-text-align-center" style="margin-top:0">
                <?php echo esc_html_x('Provide a concise description, up to 160 characters, summarizing the key of a specific event, or events.', 'Replace with a description of the section.', 'aegis'); ?>
            </p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->

    <!-- wp:columns {"align":"wide","style":{"spacing":{"padding":{"bottom":"0","top":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"var:preset|spacing|40"},"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}}} -->
    <div class="wp-block-columns alignwide" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--40);padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
        <!-- wp:column {"verticalAlignment":"top","width":"","style":{"spacing":{"padding":{"top":"0","bottom":"0"}}},"className":"is-style-default"} -->
        <div class="wp-block-column is-vertically-aligned-top is-style-default" style="padding-top:0;padding-bottom:0">
            <!-- wp:video -->
            <figure class="wp-block-video">
                <video controls poster="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1200x1920_dark.webp" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/videos/sample.mp4" playsinline></video>
            </figure>
            <!-- /wp:video -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}}} -->
        <div class="wp-block-column is-vertically-aligned-center" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
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
                        <!-- wp:post-title {"level":4,"isLink":true,"className":"is-style-aegis-post-title-hide-underline is-style-hide-underline","style":{"spacing":{"padding":{"top":"0","bottom":"0"},"margin":{"top":"0","bottom":"0"}}}} /-->
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
                    <!-- wp:button {"backgroundColor":"foreground","width":100,"className":"is-style-dark-shadow"} -->
                    <div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-dark-shadow">
                        <a class="wp-block-button__link has-foreground-background-color has-background wp-element-button" href="#"><?php echo esc_html_x( 'Call to Action', 'Call-to-action button text', 'aegis' ); ?></a>
                    </div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:query -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->

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
<!-- /wp:group -->