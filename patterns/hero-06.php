<?php
/**
 * Title: 06. Hero Pattern
 * Slug: aegis/hero-06
 * Categories: hero
 * Description: Dual background hero with heading, paragraph, and call to action button on the left and video on the right
 * Keywords: hero, video
 * Viewport Width: 1400
 * Block Types: core/group, core/columns, core/column, core/heading, core/paragraph, core/buttons, core/video
 * Inserter: true
 * 
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","right":"var:preset|spacing|30","left":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}}},"gradient":"vertical-background-to-foreground","className":"has-no-gradient-on-mobile","layout":{"type":"default"},"metadata":{"name":"<?php echo esc_html_x('06. Hero Pattern', 'Name of the pattern', 'aegis'); ?>"}} -->
<div class="wp-block-group alignwide has-no-gradient-on-mobile has-vertical-background-to-foreground-gradient-background has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--30)">
    <!-- wp:columns {"align":"wide"} -->
    <div class="wp-block-columns alignwide">
        <!-- wp:column {"verticalAlignment":"center","width":""} -->
        <div class="wp-block-column is-vertically-aligned-center">
            <!-- wp:heading {"level":1,"style":{"typography":{"fontStyle":"normal","fontWeight":"300","fontSize":"3.6rem"}}} -->
            <h1 class="wp-block-heading" style="font-size:3.6rem;font-style:normal;font-weight:300"><?php echo wp_kses_post( _x( '<strong>Main</strong> Heading', 'Replace with a descriptive section title.', 'aegis' ) ); ?></h1>
            <!-- /wp:heading -->

            <!-- wp:paragraph -->
            <p><?php echo esc_html_x('[Description (155 characters): Enter a brief overview of an offer, article, or overview of a news update.]', 'Replace with a description of the section', 'aegis'); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:buttons {"layout":{"type":"flex","flexWrap":"wrap"}} -->
            <div class="wp-block-buttons">
                <!-- wp:button {"className":"is-style-aegis-button-shadow"} -->
                <div class="wp-block-button is-style-aegis-button-shadow"><a class="wp-block-button__link wp-element-button" href="#"><?php echo esc_html_x( '[Call to Action]', 'Call to action button text.', 'aegis' ); ?></a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"60%","style":{"spacing":{"padding":{"top":"0","bottom":"0"}}}} -->
        <div class="wp-block-column" style="padding-top:0;padding-bottom:0;flex-basis:60%">
            <!-- wp:video {"className":"is-style-aegis-shadow"} -->
            <figure class="wp-block-video is-style-aegis-shadow"><video controls poster="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_dark.webp" preload="auto" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/videos/sample.mp4" playsinline></video></figure>
            <!-- /wp:video -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->