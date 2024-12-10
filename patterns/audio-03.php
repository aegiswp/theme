<?php
/**
 * Title: 03. Audio Pattern
 * Slug: aegis/audio-03
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

<!-- wp:group {"metadata":{"name":"<?php echo esc_html_x('03. Audio Pattern', 'Name of the pattern', 'aegis'); ?>","categories":["audio"],"patternName":"aegis/audio-03"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"textColor":"background","gradient":"diagonal-transparent-to-large-foreground-left-bottom","layout":{"type":"default"}} -->
<div class="wp-block-group has-background-color has-diagonal-transparent-to-large-foreground-left-bottom-gradient-background has-text-color has-background" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--40)">
    <!-- wp:columns {"verticalAlignment":"center","align":"wide"} -->
    <div class="wp-block-columns alignwide are-vertically-aligned-center">
        <!-- wp:column {"verticalAlignment":"center","width":"30%"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:30%">
            <!-- wp:cover {"url":"<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_800x800_light.webp","alt":"<?php echo esc_html__( 'Abstract illustration featuring the theme\'s logo. Please replace this image with your own.', 'aegis' ); ?>","dimRatio":70,"overlayColor":"foreground","isUserOverlayColor":true,"minHeight":370,"minHeightUnit":"px","contentPosition":"center center","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}},"shadow":"var:preset|shadow|primary-solid-shadow-left-top","border":{"width":"2px"},"dimensions":{"aspectRatio":"1"}},"borderColor":"background"} -->
            <div class="wp-block-cover has-border-color has-background-border-color" style="border-width:2px;padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70);box-shadow:var(--wp--preset--shadow--primary-solid-shadow-left-top);min-height:370px">
                <span aria-hidden="true" class="wp-block-cover__background has-foreground-background-color has-background-dim-70 has-background-dim"></span><img class="wp-block-cover__image-background" alt="<?php echo esc_html__( 'Abstract illustration featuring the theme\'s logo. Please replace this image with your own.', 'aegis' ); ?>" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_800x800_light.webp" data-object-fit="cover" />
                <div class="wp-block-cover__inner-container">
                    <!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1","fontStyle":"normal","fontWeight":"100","fontSize":"10rem"}}} -->
                    <p class="has-text-align-center" style="font-size:10rem;font-style:normal;font-weight:100;line-height:1"><?php echo esc_html_x('01', 'Replace with a episode number.', 'aegis'); ?></p>
                    <!-- /wp:paragraph -->
                </div>
            </div>
            <!-- /wp:cover -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"70%","style":{"spacing":{"padding":{"left":"var:preset|spacing|30","right":"var:preset|spacing|30","top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"},"blockGap":"0"}},"gradient":"diagonal-primary-to-transparent-right-top"} -->
        <div class="wp-block-column is-vertically-aligned-center has-diagonal-primary-to-transparent-right-top-gradient-background has-background" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30);flex-basis:70%">
            <!-- wp:paragraph {"align":"left","metadata":{"name":"Tagline"},"style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"500"},"spacing":{"margin":{"bottom":"-15px"}}},"fontSize":"tiny"} -->
            <p class="has-text-align-left has-tiny-font-size" style="margin-bottom:-15px;font-style:normal;font-weight:500;letter-spacing:3px;text-transform:uppercase"><?php echo esc_html_x( 'Tagline', 'Enter a brief and descriptive tagline here.', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"fontSize":"gigantic"} -->
            <h2 class="wp-block-heading has-gigantic-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;text-transform:uppercase"><?php echo esc_html_x( 'Heading', 'Enter a compelling headline for this section.', 'aegis' ); ?></h2>
            <!-- /wp:heading -->

            <!-- wp:audio {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}}} -->
            <figure style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--30)" class="wp-block-audio"><audio controls src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/audios/sample.mp3"></audio></figure>
            <!-- /wp:audio -->

            <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}}} -->
            <p style="margin-top:var(--wp--preset--spacing--40);margin-bottom:var(--wp--preset--spacing--40)">
                <?php echo esc_html_x( 'Provide a concise description, up to 60 characters, summarizing podcast topic, radio show, interview, or discussion for easy understanding.', 'aegis' ); ?>
            </p>
            <!-- /wp:paragraph -->

            <!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"right","orientation":"horizontal"}} -->
            <div class="wp-block-group">
                <!-- wp:social-links {"iconColor":"background","iconColorValue":"#f6f5f2","iconBackgroundColor":"primary","iconBackgroundColorValue":"#252528","layout":{"type":"flex","justifyContent":"right","orientation":"horizontal"}} -->
                <ul class="wp-block-social-links has-icon-color has-icon-background-color">
                    <!-- wp:social-link {"url":"#","service":"spotify","label":"Spotify"} /-->

                    <!-- wp:social-link {"url":"#","service":"youtube","label":"YouTube"} /-->

                    <!-- wp:social-link {"url":"#","service":"soundcloud","label":"SoundCloud"} /-->

                    <!-- wp:social-link {"url":"#","service":"feed","label":"RSS Feed"} /-->
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