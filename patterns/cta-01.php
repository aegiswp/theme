<?php
/**
 * Title: 01. CTA Pattern
 * Slug: aegis/cta-01
 * Categories: call-to-action
 * Description: Two-column with heading, paragraph, image, and call to action button
 * Keywords: marketing, promotion, sale
 * Viewport Width: 1400
 * Block Types: core/group, core/columns, core/column, core/heading, core/paragraph, core/image, core/button
 * Inserter: true
 * 
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"default"},"metadata":{"name":"<?php echo esc_html_x('01. CTA Pattern', 'Name of the pattern', 'aegis'); ?>"}} -->
<div class="wp-block-group alignwide" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
    <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}},"border":{"width":"1px"}},"borderColor":"foreground"} -->
    <div class="wp-block-group has-border-color has-foreground-border-color" style="border-width:1px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
        <!-- wp:columns -->
        <div class="wp-block-columns">
            <!-- wp:column {"verticalAlignment":"center"} -->
            <div class="wp-block-column is-vertically-aligned-center">
                <!-- wp:paragraph {"align":"center"} -->
                <p class="has-text-align-center"><?php echo wp_kses_post( _x( 'Grab Your <strong>[Discount]%</strong> Off! Shop [Product/Collection] Now During Our [Event Name] Sale.', 'Replace with a descriptive call-to-action sales promotion.', 'aegis' ) ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"textAlign":"center","level":4,"style":{"typography":{"letterSpacing":"10px","textTransform":"uppercase"},"spacing":{"margin":{"top":"var:preset|spacing|30"}}},"fontSize":"gigantic"} -->
                <h4 class="wp-block-heading has-text-align-center has-gigantic-font-size" style="margin-top:var(--wp--preset--spacing--30);letter-spacing:10px;text-transform:uppercase"><?php echo esc_html_x('[Heading]', 'Replace with a descriptive section title.', 'aegis'); ?></h4>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"0"}}},"fontSize":"small"} -->
                <p class="has-text-align-center has-small-font-size" style="margin-top:0">
                    <em><?php echo esc_html_x('[Description (38 characters): Enter a brief limited time offer and prompt action.]', 'Call to action product sale.', 'aegis'); ?></em>
                </p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"width":"1px","backgroundColor":"foreground"} -->
            <div class="wp-block-column has-foreground-background-color has-background" style="flex-basis:1px"></div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column">
                <!-- wp:image {"width":"150px","aspectRatio":"1","scale":"cover","className":"aligncenter size-full is-resized is-style-rounded"} -->
                <figure class="wp-block-image is-resized aligncenter size-full is-style-rounded">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_800x800_dark.webp" alt="<?php echo esc_attr__('Add a brief description of the placeholder image and its context, non-text content for screen readers.', 'aegis'); ?>" style="aspect-ratio:1;object-fit:cover;width:150px" />
                </figure>
                <!-- /wp:image -->

                <!-- wp:heading {"textAlign":"center","level":5,"style":{"typography":{"fontStyle":"normal","fontWeight":"400"}}} -->
                <h5 class="wp-block-heading has-text-align-center" style="font-style:normal;font-weight:400"><strong><?php echo esc_html_x( '[New Item/Collection]', 'Call to action product sale.', 'aegis' ); ?></strong></h5>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"align":"center"} -->
                <p class="has-text-align-center"><?php echo esc_html_x('[Description (75 characters): Enter a brief overview of a discount, promotion, or overview on specific items or collections.]', 'Call to action product sale.', 'aegis'); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:buttons {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
                <div class="wp-block-buttons">
                    <!-- wp:button {"className":"is-style-dense-shadow"} -->
                    <div class="wp-block-button is-style-dense-shadow"><a class="wp-block-button__link wp-element-button"><?php echo esc_html_x( '[Call to Action]', 'Call to action button text.', 'aegis' ); ?></a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->