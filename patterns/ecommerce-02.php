<?php
/**
 * Title: 02. eCommerce Pattern
 * Slug: aegis/ecommerce-02
 * Categories: ecommerce
 * Description: Three-column products with media effect, rating, pricing, heading, paragraph and call to action button
 * Keywords: call-to-action, ecommerce, pricing, products, ratings, shop
 * Viewport Width: 1400
 * Block Types: core/group, core/columns, core/column, core/image, core/heading, core/paragraph, core/buttons
 * Inserter: true
 * 
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","right":"var:preset|spacing|30","left":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"tertiary","layout":{"type":"constrained"},"metadata":{"name":"<?php echo esc_html_x('02. eCommerce Pattern', 'Name of the pattern', 'aegis'); ?>"}} -->
<div class="wp-block-group alignfull has-tertiary-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--30)">
    <!-- wp:columns {"align":"wide"} -->
    <div class="wp-block-columns alignwide">
        <!-- wp:column {"backgroundColor":"background"} -->
        <div class="wp-block-column has-background-background-color has-background">
            <!-- wp:image {"aspectRatio":"3/4","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"is-style-shine-hover"} -->
            <figure class="wp-block-image size-full is-style-shine-hover"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1200x1920_dark.webp" alt="<?php echo esc_attr__('Add a brief description of the placeholder image and its context, non-text content for screen readers.', 'aegis'); ?>" style="aspect-ratio:3/4;object-fit:cover" /></figure>
            <!-- /wp:image -->

            <!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"className":"is-style-default"} -->
            <div class="wp-block-group is-style-default" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
                <!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
                <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                    <!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"fontSize":"tiny"} -->
                    <p class="has-tiny-font-size" style="letter-spacing:2px"><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-half"></span><span class="dashicons dashicons-star-empty"></span></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph -->
                    <p><strong><?php echo esc_html_e('$00.00', 'aegis'); ?></strong></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:heading {"level":3,"className":"has-large-font-size"} -->
                <h3 class="wp-block-heading has-large-font-size"><?php echo esc_html_e('[Product]', 'aegis'); ?></h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph -->
                <p><?php echo esc_html_x('[Description (50-150 characters): Enter a brief overview of a product.]', 'Replace with a product description.', 'aegis'); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:buttons {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-buttons">
                    <!-- wp:button {"backgroundColor":"background","className":"is-style-dense-shadow-outline"} -->
                    <div class="wp-block-button is-style-dense-shadow-outline">
                        <a class="wp-block-button__link has-background-background-color has-background wp-element-button"><?php echo esc_html_x( '[Call to Action]', 'Call to action button text', 'aegis' ); ?></a>
                    </div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"backgroundColor":"quinary"} -->
        <div class="wp-block-column has-quinary-background-color has-background">
            <!-- wp:image {"aspectRatio":"3/4","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"is-style-shine-hover"} -->
            <figure class="wp-block-image size-full is-style-shine-hover"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1200x1920_dark.webp" alt="<?php echo esc_attr__('Add a brief description of the placeholder image and its context, non-text content for screen readers.', 'aegis'); ?>" style="aspect-ratio:3/4;object-fit:cover" /></figure>
            <!-- /wp:image -->

            <!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"className":"is-style-default"} -->
            <div class="wp-block-group is-style-default" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
                <!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
                <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                    <!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"fontSize":"tiny"} -->
                    <p class="has-tiny-font-size" style="letter-spacing:2px"><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-half"></span><span class="dashicons dashicons-star-empty"></span></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph -->
                    <p><strong><?php echo esc_html_e('$00.00', 'aegis'); ?></strong></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:heading {"level":3,"className":"has-large-font-size"} -->
                <h3 class="wp-block-heading has-large-font-size"><?php echo esc_html_e('[Product]', 'aegis'); ?></h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph -->
                <p><?php echo esc_html_x('[Description (50-150 characters): Enter a brief overview of a product.]', 'Replace with a product description.', 'aegis'); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:buttons {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-buttons">
                    <!-- wp:button {"backgroundColor":"quinary","style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"className":"is-style-dense-shadow-outline","fontSize":"small"} -->
                    <div class="wp-block-button has-custom-font-size is-style-dense-shadow-outline has-small-font-size" style="font-style:normal;font-weight:600"><a class="wp-block-button__link has-quinary-background-color has-background wp-element-button"><?php echo esc_html_x( '[Call to Action]', 'Call to action button text.', 'aegis' ); ?></a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"backgroundColor":"foreground"} -->
        <div class="wp-block-column has-foreground-background-color has-background">
            <!-- wp:image {"aspectRatio":"3/4","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"is-style-shine-hover"} -->
            <figure class="wp-block-image size-full is-style-shine-hover"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1200x1920_dark.webp" alt="<?php echo esc_attr__('Add a brief description of the placeholder image and its context, non-text content for screen readers.', 'aegis'); ?>" style="aspect-ratio:3/4;object-fit:cover" /></figure>
            <!-- /wp:image -->

            <!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"textColor":"background","className":"is-style-default"} -->
            <div class="wp-block-group is-style-default has-background-color has-text-color" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
                <!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
                <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                    <!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"fontSize":"tiny"} -->
                    <p class="has-tiny-font-size" style="letter-spacing:2px"><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-half"></span><span class="dashicons dashicons-star-empty"></span></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph -->
                    <p><strong><?php echo esc_html_e('$00.00', 'aegis'); ?></strong></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:heading {"level":3,"className":"has-large-font-size"} -->
                <h3 class="wp-block-heading has-large-font-size"><?php echo esc_html_e('[Product]', 'aegis'); ?></h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph -->
                <p><?php echo esc_html_x('[Description (50-150 characters): Enter a brief overview of a product.]', 'Replace with a product description.', 'aegis'); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:buttons {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-buttons">
                    <!-- wp:button {"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"className":"is-style-dense-shadow-outline","fontSize":"small"} -->
                    <div class="wp-block-button has-custom-font-size is-style-dense-shadow-outline has-small-font-size" style="font-style:normal;font-weight:600"><a class="wp-block-button__link wp-element-button"><?php echo esc_html_x( '[Call to Action]', 'Call to action button text.', 'aegis' ); ?></a></div>
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