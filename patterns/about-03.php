<?php
/**
 * Title:03. About Pattern
 * Slug: aegis/about-03
 * Categories: about
 * Description: A block pattern featuring an about section with an image on the left and content on the right, including a tagline, heading, description, and call-to-action button.
 * Keywords: about, media, full-width, call-to-action, image
 * Viewport Width: 1400
 * Block Types: core/group, core/media-text, core/image, core/paragraph, core/heading, core/button, core/buttons
 * Inserter: true
 * 
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"gradient":"diagonal-tertiary-to-background","layout":{"type":"constrained"},"metadata":{"name":"<?php echo esc_html_x('03. About Pattern', 'Name of the pattern', 'aegis'); ?>"}} -->
<div class="wp-block-group has-diagonal-tertiary-to-background-gradient-background has-background" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)">
    <!-- wp:media-text {"align":"wide","mediaId":1410,"mediaLink":"<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_dark.webp","mediaType":"image","imageFill":false} -->
    <div class="wp-block-media-text alignwide is-stacked-on-mobile">
        <figure class="wp-block-media-text__media"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_dark.webp" alt="<?php echo esc_attr_e('Add a brief description of the placeholder image and its context, non-text content for screen readers.', 'aegis'); ?>" class="wp-image-1410 size-full" /></figure>
        <div class="wp-block-media-text__content">
            <!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"},"spacing":{"margin":{"bottom":"0"}}},"fontSize":"tiny"} -->
            <p class="has-text-align-left has-tiny-font-size" style="margin-bottom:0;font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase"><?php echo esc_html_x('[Tagline]', 'Replace with a descriptive section tagline.', 'aegis'); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"fontSize":"gigantic"} -->
            <h2 class="wp-block-heading has-gigantic-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;text-transform:uppercase"><?php echo esc_html_x('[Heading]', 'Replace with a descriptive section title.', 'aegis'); ?></h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}}} -->
            <p style="margin-top:var(--wp--preset--spacing--30)"><?php echo esc_html_x('[Description (333 characters): Detail the core principles, values, or characteristics of the organization, project or subject.]', 'Replace with a description of the section.', 'aegis'); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:buttons -->
            <div class="wp-block-buttons">
                <!-- wp:button {"className":"is-style-dense-shadow"} -->
                <div class="wp-block-button is-style-dense-shadow"><a class="wp-block-button__link wp-element-button" href="#"><?php echo esc_html_x( '[Call to Action]', 'Call to action button text', 'aegis' ); ?></a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
    </div>
    <!-- /wp:media-text -->
</div>
<!-- /wp:group -->
