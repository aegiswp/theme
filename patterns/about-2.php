<?php
/**
 * Title: 02. About Pattern
 * Slug: aegis/about-2
 * Categories: about
 * Description: This pattern offers a sophisticated layout with a columnar arrangement, featuring an image on the left and detailed text content on the right. It’s designed to provide an engaging introduction to an organization, highlighting its mission or values through a visually balanced presentation. The pattern includes a tagline, a heading, a descriptive paragraph, and a call-to-action button, alongside high-quality images. This layout is enhanced with a diagonal gradient background, wide alignment for the media-text blocks, and responsive design elements for optimal viewing across devices.
 * Keywords: about, image, text, columns, tagline, heading, paragraph, button, responsive, diagonal gradient, wide alignment
 * Viewport Width: 1400
 * Block Types: core/group, core/columns, core/column, core/paragraph, core/heading, core/button, core/image
 * Inserter: true
 * 
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","right":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"},"metadata":{"name":"<?php echo esc_html_x('01. About Pattern', 'Name of the pattern', 'aegis'); ?>"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--30)">
    <!-- wp:columns {"align":"wide"} -->
    <div class="wp-block-columns alignwide">
        <!-- wp:column {"verticalAlignment":"center","width":"40%"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:40%">
            <!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"},"spacing":{"margin":{"bottom":"0"}}},"fontSize":"tiny"} -->
            <p class="has-text-align-left has-tiny-font-size" style="margin-bottom:0;font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase"><?php echo esc_html_x('[Tagline]', 'Replace with a descriptive tagline', 'aegis'); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"fontSize":"gigantic"} -->
            <h2 class="wp-block-heading has-gigantic-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;text-transform:uppercase"><?php echo esc_html_x('[Heading]', 'Replace with a descriptive title', 'aegis'); ?></h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}}} -->
            <p style="margin-top:var(--wp--preset--spacing--30)"><?php echo esc_html_x('[Description (333 characters): Detail the core principles, values, or characteristics of the organization or subject.]', 'Replace with a description of the section', 'aegis'); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:buttons -->
            <div class="wp-block-buttons">
                <!-- wp:button {"className":"is-style-aegis-button-shadow"} -->
                <div class="wp-block-button is-style-aegis-button-shadow"><a class="wp-block-button__link wp-element-button" href="#"><?php echo esc_html_x( '[Call to Action]', 'Call to action button text', 'aegis' ); ?></a></div>
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
                    <!-- wp:image {"aspectRatio":"3/4","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"is-style-aegis-effect-2-image"} -->
                    <figure class="wp-block-image size-full is-style-aegis-effect-2-image"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1200x1920_dark.webp" alt="<?php echo esc_attr__('Placeholder image - Replace with an image, photograph, or artwork.', 'aegis'); ?>" style="aspect-ratio:3/4;object-fit:cover" /></figure>
                    <!-- /wp:image -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50"}}},"className":"is-hidden-on-mobile"} -->
                <div class="wp-block-column is-hidden-on-mobile" style="padding-top:var(--wp--preset--spacing--50)">
                    <!-- wp:image {"aspectRatio":"3/4","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"is-style-aegis-effect-2-image"} -->
                    <figure class="wp-block-image size-full is-style-aegis-effect-2-image"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1200x1920_dark.webp" alt="<?php echo esc_attr__('Placeholder image - Replace with an image, photograph, or artwork.', 'aegis'); ?>" style="aspect-ratio:3/4;object-fit:cover" /></figure>
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