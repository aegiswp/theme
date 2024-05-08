<?php
/**
 * Title: 05. Hero Pattern
 * Slug: aegis/hero-05
 * Categories: hero
 * Description: Dual background hero with heading, paragraph, and call to action button on the left and parallel vertical images on the right
 * Keywords: call to action, gallery, hero
 * Viewport Width: 1400
 * Block Types: core/group, core/columns, core/column, core/heading, core/paragraph, core/buttons, core/image
 * Inserter: true
 * 
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","right":"var:preset|spacing|30","left":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}},"dimensions":{"minHeight":"100vh"}},"gradient":"vertical-background-to-foreground","className":"grid-gallery","layout":{"type":"default"},"metadata":{"name":"<?php echo esc_html_x('05. Hero Pattern', 'Name of the pattern', 'aegis'); ?>"}} -->
<div class="wp-block-group alignfull grid-gallery has-vertical-background-to-foreground-gradient-background has-background"
    style="min-height:100vh;margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--30)">
    <!-- wp:columns {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}}} -->
    <div class="wp-block-columns alignwide" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
        <!-- wp:column {"verticalAlignment":"center"} -->
        <div class="wp-block-column is-vertically-aligned-center">
            <!-- wp:heading {"level":1,"style":{"typography":{"fontStyle":"normal","fontWeight":"300"}},"fontSize":"gigantic"} -->
            <h1 class="wp-block-heading has-gigantic-font-size" style="font-style:normal;font-weight:300"><?php echo wp_kses_post( _x( '<strong>Main</strong> Heading', 'Replace with a descriptive title', 'aegis' ) ); ?></h1>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"0","right":"var:preset|spacing|80","bottom":"0","left":"0"}}},"className":"mobile-padding-paragraph"} -->
            <p class="mobile-padding-paragraph" style="padding-top:0;padding-right:var(--wp--preset--spacing--80);padding-bottom:0;padding-left:0"><?php echo esc_html_x('[Description (335 characters): Enter a brief overview of an offer, article, or overview of a news update.]', 'Call to action section text', 'aegis'); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:buttons -->
            <div class="wp-block-buttons">
                <!-- wp:button {"className":"is-style-aegis-button-effect-2"} -->
                <div class="wp-block-button is-style-aegis-button-effect-2"><a class="wp-block-button__link wp-element-button"><?php echo esc_html_x( '[Call to Action]', 'Call to action button text', 'aegis' ); ?></a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:columns -->
            <div class="wp-block-columns">
                <!-- wp:column -->
                <div class="wp-block-column">
                    <!-- wp:image {"aspectRatio":"9/16","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"is-style-aegis-effect-3-image"} -->
                    <figure class="wp-block-image size-large is-style-aegis-effect-3-image"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1200x1920_dark.webp" alt="<?php echo esc_attr__('Placeholder image: Brief description of the image and its context, non-text content for screen readers.', 'aegis'); ?>" style="aspect-ratio:9/16;object-fit:cover" /></figure>
                    <!-- /wp:image -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column -->
                <div class="wp-block-column">
                    <!-- wp:image {"aspectRatio":"9/16","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"is-hidden-on-mobile is-style-aegis-effect-3-image"} -->
                    <figure class="wp-block-image size-large is-hidden-on-mobile is-style-aegis-effect-3-image"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1200x1920_light.webp" alt="<?php echo esc_attr__('Placeholder image: Brief description of the image and its context, non-text content for screen readers.', 'aegis'); ?>" style="aspect-ratio:9/16;object-fit:cover" /></figure>
                    <!-- /wp:image -->
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
