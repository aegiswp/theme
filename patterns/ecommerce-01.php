<?php
/**
 * Title: 01. eCommerce Pattern
 * Slug: aegis/ecommerce-01
 * Categories: ecommerce
 * Description: Block pattern featuring a three-column product showcase with product images, ratings, product title, description, and call-to-action buttons.
 * Keywords: ecommerce, product, showcase, shop, call-to-action, button, rating
 * Viewport Width: 1400
 * Block Types: core/group, core/columns, core/column, core/image, core/heading, core/paragraph, core/buttons, core/button
 * Inserter: true
 *
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","right":"var:preset|spacing|30","bottom":"var:preset|spacing|50","left":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"},"metadata":{"name":"<?php echo esc_html_x('01. eCommerce Pattern', 'Name of the pattern', 'aegis'); ?>"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--30)">
    <!-- wp:columns {"align":"wide"} -->
    <div class="wp-block-columns alignwide">
        <!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"backgroundColor":"tertiary","className":"is-style-default"} -->
        <div class="wp-block-column is-style-default has-tertiary-background-color has-background" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
            <!-- wp:image {"align":"center","aspectRatio":"3/4","scale":"cover","className":"size-large is-style-default"} -->
            <figure class="wp-block-image aligncenter size-large is-style-default">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1200x1920_dark.webp" alt="<?php echo esc_html__( 'Abstract illustration featuring the theme\'s logo. Please replace this image with your own.', 'aegis' ); ?>" style="aspect-ratio:3/4;object-fit:cover" />
            </figure>
            <!-- /wp:image -->

            <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
            <div class="wp-block-group" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                <!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"fontSize":"tiny"} -->
                <p class="has-tiny-font-size" style="letter-spacing:2px"><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-half"></span><span class="dashicons dashicons-star-empty"></span></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph -->
                <p><strong><?php echo esc_html_e('$00.00', 'aegis'); ?></strong></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->

            <!-- wp:heading {"level":3,"className":"has-large-font-size"} -->
            <h3 class="wp-block-heading has-large-font-size">
                <?php echo esc_html_e('Product', 'aegis'); ?>
            </h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph -->
            <p>
                <?php echo esc_html_x('Provide a concise description, up to 150 characters, summarizing the product.', 'Replace with a product description.', 'aegis'); ?>
            </p>
            <!-- /wp:paragraph -->

            <!-- wp:buttons {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
            <div class="wp-block-buttons">
                <!-- wp:button {"className":"is-style-dense-shadow"} -->
                <div class="wp-block-button is-style-dense-shadow"><a class="wp-block-button__link wp-element-button">
                    <?php echo esc_html_x( 'Call to Action', 'Call-to-action button text', 'aegis' ); ?></a>
                </div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"backgroundColor":"quinary","className":"is-style-default"} -->
        <div class="wp-block-column is-style-default has-quinary-background-color has-background" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
            <!-- wp:image {"align":"center","aspectRatio":"3/4","scale":"cover","className":"size-large is-style-default"} -->
            <figure class="wp-block-image aligncenter size-large is-style-default">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1200x1920_dark.webp" alt="<?php echo esc_html__( 'Abstract illustration featuring the theme\'s logo. Please replace this image with your own.', 'aegis' ); ?>" style="aspect-ratio:3/4;object-fit:cover" />
            </figure>
            <!-- /wp:image -->

            <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
            <div class="wp-block-group" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                <!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"fontSize":"tiny"} -->
                <p class="has-tiny-font-size" style="letter-spacing:2px"><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-half"></span><span class="dashicons dashicons-star-empty"></span></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph -->
                <p><strong><?php echo esc_html_e('$00.00', 'aegis'); ?></strong></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->

            <!-- wp:heading {"level":3,"className":"has-large-font-size"} -->
            <h3 class="wp-block-heading has-large-font-size">
                <?php echo esc_html_e('Product', 'aegis'); ?>
            </h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph -->
            <p>
                <?php echo esc_html_x('Provide a concise description, up to 150 characters, summarizing the product.', 'Replace with a product description.', 'aegis'); ?>
            </p>
            <!-- /wp:paragraph -->

            <!-- wp:buttons {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
            <div class="wp-block-buttons">
                <!-- wp:button {"backgroundColor":"foreground","textColor":"background","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"className":"is-style-dense-shadow-outline"} -->
                <div class="wp-block-button is-style-dense-shadow-outline">
                    <a class="wp-block-button__link has-background-color has-foreground-background-color has-text-color has-background has-link-color wp-element-button">
                        <?php echo esc_html_x( 'Call to Action', 'Call-to-action button text', 'aegis' ); ?>
                    </a>
                </div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"backgroundColor":"foreground","textColor":"background","className":"is-style-default"} -->
        <div class="wp-block-column is-style-default has-background-color has-foreground-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
            <!-- wp:image {"align":"center","aspectRatio":"3/4","scale":"cover","className":"size-full size-large is-style-default"} -->
            <figure class="wp-block-image aligncenter size-full size-large is-style-default">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1200x1920_light.webp" alt="<?php echo esc_html__( 'Abstract illustration featuring the theme\'s logo. Please replace this image with your own.', 'aegis' ); ?>" style="aspect-ratio:3/4;object-fit:cover" />
            </figure>
            <!-- /wp:image -->

            <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
            <div class="wp-block-group" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                <!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"fontSize":"tiny"} -->
                <p class="has-tiny-font-size" style="letter-spacing:2px"><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-half"></span><span class="dashicons dashicons-star-empty"></span></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph -->
                <p><strong><?php echo esc_html_e('$00.00', 'aegis'); ?></strong></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->

            <!-- wp:heading {"level":3,"className":"has-large-font-size"} -->
            <h3 class="wp-block-heading has-large-font-size">
                <?php echo esc_html_e('Product', 'aegis'); ?>
            </h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph -->
            <p>
                <?php echo esc_html_x('Provide a concise description, up to 150 characters, summarizing the product.', 'Replace with a product description.', 'aegis'); ?>
            </p>
            <!-- /wp:paragraph -->

            <!-- wp:buttons {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
            <div class="wp-block-buttons">
                <!-- wp:button {"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"className":"is-style-dense-shadow-outline","fontSize":"small"} -->
                <div class="wp-block-button has-custom-font-size is-style-dense-shadow-outline has-small-font-size" style="font-style:normal;font-weight:600">
                <a class="wp-block-button__link wp-element-button">
                    <?php echo esc_html_x( 'Call to Action', 'Call-to-action button text', 'aegis' ); ?>
                </a>
                </div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->