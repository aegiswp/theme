<?php
/**
 * Title: 01. Audio Pattern
 * Slug: aegis/audio-01
 * Categories: audio
 * Description: Block pattern with two-column cover overlay on the left and tagline, headline, paragraph, audio player, social icons and call to action button on the right
 * Keywords: audio, call-to-action, music, podcast, radio
 * Viewport Width: 1400
 * Block Types: core/group, core/columns, core/column, core/cover, core/paragraph, core/heading, core/audio, core/buttons, core/social-links
 * Inserter: true
 * 
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}},"backgroundColor":"foreground","textColor":"background","layout":{"type":"constrained"},"metadata":{"name":"<?php echo esc_html_x('01. Audio Pattern', 'Name of the pattern', 'aegis'); ?>"}} -->
<div class="wp-block-group has-background-color has-foreground-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--30)">
    <!-- wp:columns {"verticalAlignment":null,"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|40"},"padding":{"top":"0px","right":"0px","bottom":"0px","left":"0px"}}}} -->
    <div class="wp-block-columns alignwide" style="padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px">
        <!-- wp:column {"width":"50%"} -->
        <div class="wp-block-column" style="flex-basis:50%">
            <!-- wp:cover {"url":"<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_light.webp","dimRatio":70,"overlayColor":"foreground","minHeight":370,"minHeightUnit":"px","contentPosition":"center center","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}}} -->
            <div class="wp-block-cover" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70);min-height:370px">
                <span aria-hidden="true" class="wp-block-cover__background has-foreground-background-color has-background-dim-70 has-background-dim"></span>
                    <img class="wp-block-cover__image-background" alt="<?php echo esc_attr_e('Add a brief description of the placeholder image and its context, non-text content for screen readers.', 'aegis'); ?>" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_light.webp" data-object-fit="cover" />
                <div class="wp-block-cover__inner-container">
                    <!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1","fontStyle":"normal","fontWeight":"100","fontSize":"10rem"}}} -->
                    <p class="has-text-align-center" style="font-size:10rem;font-style:normal;font-weight:100;line-height:1"><?php echo esc_html_x('[01]', 'Replace with a episode number.', 'aegis'); ?></p>
                    <!-- /wp:paragraph -->
                </div>
            </div>
            <!-- /wp:cover -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"50%","style":{"spacing":{"padding":{"left":"0","right":"0","top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}}} -->
        <div class="wp-block-column is-vertically-aligned-center" style="padding-top:var(--wp--preset--spacing--30);padding-right:0;padding-bottom:var(--wp--preset--spacing--30);padding-left:0;flex-basis:50%">
            <!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"},"spacing":{"margin":{"bottom":"0"}}},"fontSize":"tiny"} -->
            <p class="has-text-align-left has-tiny-font-size" style="margin-bottom:0;font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase"><?php echo esc_html_x('[Tagline]', 'Replace with a descriptive section tagline.', 'aegis'); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"fontSize":"gigantic"} -->
            <h3 class="wp-block-heading has-gigantic-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0"><?php echo esc_html_x('[Heading]', 'Replace with a descriptive section title.', 'aegis'); ?></h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}},"fontSize":"tiny"} -->
            <p class="has-tiny-font-size" style="margin-top:var(--wp--preset--spacing--30)"><?php echo esc_html_x('[Description (60 characters): Provide a brief overview of a specific podcast topic, radio show, interview, or discussion.]', 'Replace with a description of the section.', 'aegis'); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:audio {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}}} -->
            <figure class="wp-block-audio" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--30)"><audio controls src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/audios/sample.mp3"></audio></figure>
            <!-- /wp:audio -->

            <!-- wp:columns -->
            <div class="wp-block-columns">
                <!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
                <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">
                    <!-- wp:social-links {"iconColor":"foreground","iconColorValue":"#1c1c1e","iconBackgroundColor":"background","iconBackgroundColorValue":"#f6f5f2","layout":{"type":"flex","justifyContent":"left","orientation":"horizontal"}} -->
                    <ul class="wp-block-social-links has-icon-color has-icon-background-color">
                        <!-- wp:social-link {"url":"#","service":"spotify","label":"Spotify"} /-->
                        <!-- wp:social-link {"url":"#","service":"youtube","label":"YouTube"} /-->
                        <!-- wp:social-link {"url":"#","service":"soundcloud","label":"SoundCloud"} /-->
                        <!-- wp:social-link {"url":"#","service":"feed","label":"RSS Feed"} /-->
                    </ul>
                    <!-- /wp:social-links -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
                <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">
                    <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"right"}} -->
                    <div class="wp-block-buttons">
                        <!-- wp:button {"textColor":"white","width":100,"className":"is-style-dense-shadow-outline"} -->
                        <div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-dense-shadow-outline"><a class="wp-block-button__link has-white-color has-text-color wp-element-button" href="#"><?php echo esc_html_x( '[Call to Action]', 'Call to action button text.', 'aegis' ); ?></a></div>
                        <!-- /wp:button -->
                    </div>
                    <!-- /wp:buttons -->
                </div>
                <!-- /wp:column -->
            </div>
            <!-- /wp:columns -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->