<?php
/**
 * Title: 04. Audio Pattern
 * Slug: aegis/audio-04
 * Categories: audio
 * Description: Block pattern featuring an episode number over a cover image on the left, and a tagline, heading, audio player, concise description, and social links on the right.
 * Keywords: audio, cover, episode, heading, social, tagline
 * Viewport Width: 1400
 * Block Types: core/audio, core/column, core/columns, core/cover, core/group, core/heading, core/paragraph, core/social-link, core/social-links
 * Inserter: true
 *
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"<?php echo esc_html_x('04. Audio Pattern', 'Name of the pattern', 'aegis'); ?>","categories":["audio"],"patternName":"aegis/audio-04"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"textColor":"background","gradient":"diagonal-primary-to-transparent-left-bottom","layout":{"type":"default"}} -->
<div class="wp-block-group has-background-color has-diagonal-primary-to-transparent-left-bottom-gradient-background has-text-color has-background" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--40)">
    <!-- wp:columns {"verticalAlignment":"center","align":"wide","gradient":"vertical-small-primary-to-foreground"} -->
    <div class="wp-block-columns alignwide are-vertically-aligned-center has-vertical-small-primary-to-foreground-gradient-background has-background">
        <!-- wp:column {"verticalAlignment":"center","width":"30%"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:30%">
            <!-- wp:cover {"url":"<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_800x800_light.webp","alt":"<?php echo esc_html__( 'Podcast episode cover image. Replace with your episode artwork.', 'aegis' ); ?>","dimRatio":70,"overlayColor":"foreground","isUserOverlayColor":true,"minHeight":370,"minHeightUnit":"px","contentPosition":"center center","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}},"border":{"width":"2px"},"dimensions":{"aspectRatio":"1"}},"borderColor":"background"} -->
            <div class="wp-block-cover has-border-color has-background-border-color" style="border-width:2px;padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70);min-height:370px">
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

        <!-- wp:column {"verticalAlignment":"center","width":"70%","style":{"spacing":{"padding":{"left":"var:preset|spacing|30","right":"var:preset|spacing|30","top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"},"blockGap":"0"}}} -->
        <div class="wp-block-column is-vertically-aligned-center" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30);flex-basis:70%">
            <!-- wp:paragraph {"align":"left","metadata":{"name":"Tagline"},"style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"500"},"spacing":{"margin":{"bottom":"-15px"}}},"fontSize":"tiny"} -->
            <p class="has-text-align-left has-tiny-font-size" style="margin-bottom:-15px;font-style:normal;font-weight:500;letter-spacing:3px;text-transform:uppercase"><?php echo esc_html_x( 'Podcast Series', 'Podcast series name (15-25 characters recommended)', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"fontSize":"gigantic"} -->
            <h2 class="wp-block-heading has-gigantic-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;text-transform:uppercase"><?php echo esc_html_x( 'Episode Title', 'Episode title (20-40 characters recommended)', 'aegis' ); ?></h2>
            <!-- /wp:heading -->

            <!-- wp:audio {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}}} -->
            <figure style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--30)" class="wp-block-audio"><audio controls src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/audios/sample.mp3" preload="metadata"></audio></figure>
            <!-- /wp:audio -->

            <!-- wp:paragraph {"className":"screen-reader-text"} -->
            <p class="screen-reader-text"><?php echo esc_html_x('Listen to this episode using the audio player above', 'Screen reader text for audio player', 'aegis'); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}}} -->
            <p style="margin-top:var(--wp--preset--spacing--40);margin-bottom:var(--wp--preset--spacing--40)">
                <?php echo esc_html_x( 'Brief episode summary highlighting key topics and guests featured in this episode.', 'Episode description (60-120 characters recommended)', 'aegis' ); ?>
            </p>
            <!-- /wp:paragraph -->

            <!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"right","orientation":"horizontal"}} -->
            <div class="wp-block-group">
                <!-- wp:social-links {"iconColor":"background","iconColorValue":"#f6f5f2","iconBackgroundColor":"foreground","iconBackgroundColorValue":"#1c1c1e","layout":{"type":"flex","justifyContent":"right","orientation":"horizontal"}} -->
                <ul class="wp-block-social-links has-icon-color has-icon-background-color">
                    <!-- wp:social-link {"url":"#","service":"spotify","label":"<?php echo esc_html_x( 'Listen on Spotify', 'Social media platform accessibility label', 'aegis' ); ?>"} /-->

                    <!-- wp:social-link {"url":"#","service":"youtube","label":"<?php echo esc_html_x( 'Watch on YouTube', 'Social media platform accessibility label', 'aegis' ); ?>"} /-->

                    <!-- wp:social-link {"url":"#","service":"soundcloud","label":"<?php echo esc_html_x( 'Listen on SoundCloud', 'Social media platform accessibility label', 'aegis' ); ?>"} /-->

                    <!-- wp:social-link {"url":"#","service":"feed","label":"<?php echo esc_html_x( 'Subscribe via RSS', 'Social media platform accessibility label', 'aegis' ); ?>"} /-->
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