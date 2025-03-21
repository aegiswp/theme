<?php
/**
 * Title: 01. Audio Pattern
 * Slug: aegis/audio-01
 * Categories: audio
 * Description: Block pattern featuring an episode number over a cover image on the left, and a tagline, heading, audio player, concise description, social links, and a call-to-action button on the right.
 * Keywords: audio, cover, episode, heading, social, tagline, call-to-action
 * Viewport Width: 1400
 * Block Types: core/audio, core/button, core/buttons, core/column, core/columns, core/cover, core/group, core/heading, core/image, core/paragraph, core/social-link, core/social-links
 * Inserter: true
 *
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"<?php echo esc_html_x('01. Audio Pattern', 'Name of the pattern', 'aegis'); ?>","categories":["audio"],"patternName":"aegis/audio-01"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"textColor":"background","gradient":"diagonal-foreground-to-background","layout":{"type":"default"}} -->
<div class="wp-block-group has-background-color has-diagonal-foreground-to-background-gradient-background has-text-color has-background" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--40)">
    <!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40"}}},"gradient":"diagonal-tertiary-to-transparent-left-bottom"} -->
    <div class="wp-block-columns alignwide are-vertically-aligned-center has-diagonal-tertiary-to-transparent-left-bottom-gradient-background has-background" style="padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
        <!-- wp:column {"verticalAlignment":"center","width":"30%"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:30%">
            <!-- wp:cover {"url":"<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_800x800_light.webp","alt":"<?php echo esc_html__( 'Podcast episode cover image. Replace with your episode artwork.', 'aegis' ); ?>","dimRatio":70,"overlayColor":"foreground","isUserOverlayColor":true,"minHeight":370,"minHeightUnit":"px","contentPosition":"center center","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}},"border":{"width":"2px"},"dimensions":{"aspectRatio":"1"},"shadow":"var:preset|shadow|quinary-solid-shadow-left-top"},"borderColor":"background"} -->
            <div class="wp-block-cover has-border-color has-background-border-color" style="border-width:2px;padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70);box-shadow:var(--wp--preset--shadow--quinary-solid-shadow-left-top);min-height:370px">
                <span aria-hidden="true" class="wp-block-cover__background has-foreground-background-color has-background-dim-70 has-background-dim"></span><img class="wp-block-cover__image-background" alt="<?php echo esc_html__( 'Podcast episode cover image. Replace with your episode artwork.', 'aegis' ); ?>" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_800x800_light.webp" data-object-fit="cover" />
                <div class="wp-block-cover__inner-container">
                    <!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1","fontStyle":"normal","fontWeight":"100","fontSize":"10rem"}}} -->
                    <p class="has-text-align-center" style="font-size:10rem;font-style:normal;font-weight:100;line-height:1"><?php echo esc_html_x('01', 'Episode number (1-3 characters recommended)', 'aegis'); ?></p>
                    <!-- /wp:paragraph -->
                </div>
            </div>
            <!-- /wp:cover -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"70%","style":{"spacing":{"padding":{"left":"0","right":"0","top":"0","bottom":"0"},"blockGap":"0"}}} -->
        <div class="wp-block-column is-vertically-aligned-center" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;flex-basis:70%">
            <!-- wp:paragraph {"align":"left","metadata":{"name":"Tagline"},"style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"500"},"spacing":{"margin":{"bottom":"-15px"}},"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"textColor":"foreground","fontSize":"tiny"} -->
            <p class="has-text-align-left has-foreground-color has-text-color has-link-color has-tiny-font-size" style="margin-bottom:-15px;font-style:normal;font-weight:500;letter-spacing:3px;text-transform:uppercase"><?php echo esc_html_x( 'Podcast Series', 'Podcast series name (15-25 characters recommended)', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"textColor":"foreground","fontSize":"gigantic"} -->
            <h2 class="wp-block-heading has-foreground-color has-text-color has-link-color has-gigantic-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;text-transform:uppercase"><?php echo esc_html_x( 'Episode Title', 'Episode title (20-40 characters recommended)', 'aegis' ); ?></h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"className":"is-style-default","style":{"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|30"}}},"textColor":"foreground"} -->
            <p class="is-style-default has-foreground-color has-text-color" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--30)"><?php echo esc_html_x( 'Provide a concise description, up to 60 characters, summarizing this episode.', 'Episode description guidance', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
            <div class="wp-block-group">
                <!-- wp:image {"width":"70px","aspectRatio":"1","scale":"cover","sizeSlug":"large","linkDestination":"none","align":"center","className":"is-resized is-style-rounded","style":{"color":{"duotone":"unset"},"border":{"width":"2px"}},"borderColor":"quaternary"} -->
                <figure class="wp-block-image aligncenter size-large is-resized has-custom-border is-style-rounded"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_800x800_dark.webp" alt="<?php echo esc_html__( 'Host profile photo. Replace with actual host image.', 'aegis' ); ?>" class="has-border-color has-quaternary-border-color" style="border-width:2px;aspect-ratio:1;object-fit:cover;width:70px" /></figure>
                <!-- /wp:image -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                <div class="wp-block-group">
                    <!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"textColor":"foreground"} -->
                    <p class="has-foreground-color has-text-color" style="font-style:normal;font-weight:500;text-transform:uppercase"><?php echo esc_html_x('Host', 'Host label text', 'aegis'); ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"textColor":"foreground","fontSize":"small"} -->
                    <p class="has-foreground-color has-text-color has-small-font-size"><?php echo esc_html_x('Host Name', 'Host name (15-30 characters recommended)', 'aegis'); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->

            <!-- wp:audio {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}}} -->
            <figure style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--30)" class="wp-block-audio"><audio controls src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/audios/sample.mp3" preload="metadata"></audio></figure>
            <!-- /wp:audio -->

            <!-- wp:paragraph {"className":"screen-reader-text"} -->
            <p class="screen-reader-text"><?php echo esc_html_x('Listen to this episode using the audio player above', 'Screen reader text for audio player', 'aegis'); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","orientation":"horizontal"}} -->
            <div class="wp-block-group">
                <!-- wp:social-links {"iconColor":"foreground","iconColorValue":"#1c1c1e","className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"left","orientation":"horizontal"}} -->
                <ul class="wp-block-social-links has-icon-color is-style-logos-only">
                    <!-- wp:social-link {"url":"#","service":"spotify","label":"<?php echo esc_html_x( 'Listen on Spotify', 'Social media platform accessibility label', 'aegis' ); ?>"} /-->

                    <!-- wp:social-link {"url":"#","service":"youtube","label":"<?php echo esc_html_x( 'Watch on YouTube', 'Social media platform accessibility label', 'aegis' ); ?>"} /-->

                    <!-- wp:social-link {"url":"#","service":"soundcloud","label":"<?php echo esc_html_x( 'Listen on SoundCloud', 'Social media platform accessibility label', 'aegis' ); ?>"} /-->

                    <!-- wp:social-link {"url":"#","service":"feed","label":"<?php echo esc_html_x( 'Subscribe via RSS', 'Social media platform accessibility label', 'aegis' ); ?>"} /-->
                </ul>
                <!-- /wp:social-links -->

                <!-- wp:buttons -->
                <div class="wp-block-buttons">
                    <!-- wp:button {"className":"is-style-dense-shadow","style":{"border":{"width":"2px"}},"borderColor":"senary"} -->
                    <div class="wp-block-button is-style-dense-shadow"><a class="wp-block-button__link has-border-color has-senary-border-color wp-element-button" style="border-width:2px" href="#"><?php echo esc_html_x( 'Subscribe Now', 'Call-to-action button text (10-20 characters recommended)', 'aegis' ); ?></a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->