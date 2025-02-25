<?php
/**
 * Title: 02. eCommerce Pattern
 * Slug: aegis/ecommerce-02
 * Categories: ecommerce
 * Description: Block pattern featuring three product columns with media effect, ratings, pricing, heading, description, and a call-to-action button.
 * Keywords: call-to-action, ecommerce, pricing, products, ratings, shop
 * Viewport Width: 1400
 * Block Types: core/group, core/columns, core/column, core/image, core/heading, core/paragraph, core/buttons
 * Inserter: true
 *
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"<?php echo esc_html_x('02. eCommerce Pattern', 'Name of the pattern', 'aegis'); ?>","categories":["<?php echo esc_html_x('ecommerce', 'Name of the category', 'aegis'); ?>"],"patternName":"aegis/ecommerce-02"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","right":"var:preset|spacing|30","left":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"tertiary","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-tertiary-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--30)">
    <!-- wp:columns {"align":"wide"} -->
    <div class="wp-block-columns alignwide">
        <!-- wp:column {"backgroundColor":"background"} -->
        <div class="wp-block-column has-background-background-color has-background">
            <!-- wp:image {"aspectRatio":"3/4","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"is-style-shine-hover"} -->
            <figure class="wp-block-image size-full is-style-shine-hover">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1200x1920_dark.webp" alt="<?php echo esc_html__( 'Abstract illustration featuring the theme\'s logo. Please replace this image with your own.', 'aegis' ); ?>" style="aspect-ratio:3/4;object-fit:cover" />
            </figure>
            <!-- /wp:image -->

            <!-- wp:group {"className":"is-style-default","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}}} -->
            <div class="wp-block-group is-style-default" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
                <!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
                <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                    <!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"fontSize":"tiny"} -->
                    <p class="has-tiny-font-size" style="letter-spacing:2px"><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-half"></span><span class="dashicons dashicons-star-empty"></span></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph -->
                    <p>
                        <strong><?php echo esc_html_e('$00.00', 'aegis'); ?></strong>
                    </p>
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
                    <!-- wp:button {"className":"is-style-outline-shadow"} -->
                    <div class="wp-block-button is-style-outline-shadow">
                        <a class="wp-block-button__link wp-element-button"><?php echo esc_html_x( 'Call to Action', 'Call-to-action button text', 'aegis' ); ?></a>
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
            <figure class="wp-block-image size-full is-style-shine-hover">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1200x1920_dark.webp" alt="<?php echo esc_html__( 'Abstract illustration featuring the theme\'s logo. Please replace this image with your own.', 'aegis' ); ?>" style="aspect-ratio:3/4;object-fit:cover" />
            </figure>
            <!-- /wp:image -->

            <!-- wp:group {"className":"is-style-default","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}}} -->
            <div class="wp-block-group is-style-default" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
                <!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
                <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                    <!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"fontSize":"tiny"} -->
                    <p class="has-tiny-font-size" style="letter-spacing:2px"><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-half"></span><span class="dashicons dashicons-star-empty"></span></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph -->
                    <p>
                        <strong><?php echo esc_html_e('$00.00', 'aegis'); ?></strong>
                    </p>
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
                    <!-- wp:button {"backgroundColor":"background","textColor":"foreground","className":"is-style-dense-shadow-outline is-style-outline-shadow","style":{"typography":{"fontStyle":"normal","fontWeight":"600"},"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"fontSize":"small"} -->
                    <div class="wp-block-button has-custom-font-size is-style-dense-shadow-outline is-style-outline-shadow has-small-font-size" style="font-style:normal;font-weight:600">
                        <a class="wp-block-button__link has-foreground-color has-background-background-color has-text-color has-background has-link-color wp-element-button">
                            <?php echo esc_html_x( 'Call to Action', 'Call-to-action button text', 'aegis' ); ?>
                        </a>
                    </div>
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
            <figure class="wp-block-image size-full is-style-shine-hover">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1200x1920_dark.webp" alt="<?php echo esc_html__( 'Abstract illustration featuring the theme\'s logo. Please replace this image with your own.', 'aegis' ); ?>" style="aspect-ratio:3/4;object-fit:cover" />
            </figure>
            <!-- /wp:image -->

            <!-- wp:group {"className":"is-style-default","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"textColor":"background"} -->
            <div class="wp-block-group is-style-default has-background-color has-text-color" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
                <!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
                <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                    <!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"fontSize":"tiny"} -->
                    <p class="has-tiny-font-size" style="letter-spacing:2px"><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-half"></span><span class="dashicons dashicons-star-empty"></span></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph -->
                    <p>
                        <strong><?php echo esc_html_e('$00.00', 'aegis'); ?></strong>
                    </p>
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
                    <!-- wp:button {"className":"is-style-dense-shadow-outline is-style-outline-shadow","style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"small"} -->
                    <div class="wp-block-button has-custom-font-size is-style-dense-shadow-outline is-style-outline-shadow has-small-font-size" style="font-style:normal;font-weight:600">
                        <a class="wp-block-button__link wp-element-button"><?php echo esc_html_x( 'Call to Action', 'Call-to-action button text', 'aegis' ); ?></a>
                    </div>
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