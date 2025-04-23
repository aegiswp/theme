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

<!-- wp:group {"metadata":{"name":"01. eCommerce Pattern","categories":["ecommerce"],"patternName":"aegis/ecommerce-01"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","right":"0","bottom":"var:preset|spacing|50","left":"0"},"margin":{"top":"0","bottom":"0"},"blockGap":"var:preset|spacing|20"}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-right:0;padding-bottom:var(--wp--preset--spacing--50);padding-left:0"><!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"className":"is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|20","right":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20"}}},"backgroundColor":"tertiary"} -->
<div class="wp-block-column is-style-default has-tertiary-background-color has-background" style="padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)"><!-- wp:image {"aspectRatio":"3/4","scale":"cover","align":"center","className":"size-large is-style-default"} -->
<figure class="wp-block-image aligncenter size-large is-style-default"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/thumb_1200x1920_dark.webp' ) ); ?>" alt="<?php echo esc_attr__( 'Premium leather backpack product image', 'aegis' ); ?>" style="aspect-ratio:3/4;object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"fontSize":"tiny"} -->
<p class="has-tiny-font-size" style="letter-spacing:2px"><p class="has-tiny-font-size" style="letter-spacing:2px" aria-label="<?php echo esc_attr_x( '3.5 out of 5 stars', 'Product rating accessibility label', 'aegis' ); ?>"><span class="dashicons dashicons-star-filled" aria-hidden="true"></span><span class="dashicons dashicons-star-filled" aria-hidden="true"></span><span class="dashicons dashicons-star-filled" aria-hidden="true"></span><span class="dashicons dashicons-star-half" aria-hidden="true"></span><span class="dashicons dashicons-star-empty" aria-hidden="true"></span></p></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><strong><?php echo esc_html_x( '$129.99', 'Product price example', 'aegis' ); ?></strong></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:heading {"level":3,"fontSize":"large"} -->
<h3 class="wp-block-heading has-large-font-size"><?php echo esc_html_x( 'Leather Backpack', 'Product name example', 'aegis' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php echo esc_html__( 'Premium full-grain leather backpack with padded laptop compartment, water-resistant finish, and ergonomic straps for all-day comfort.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|20","left":"var:preset|spacing|20"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-dense-shadow"} -->
<div class="wp-block-button is-style-dense-shadow"><a class="wp-block-button__link wp-element-button" href="#">
                    <?php echo esc_html_x( 'Add to Cart', 'Product purchase button text', 'aegis' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|20","right":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20"}}},"backgroundColor":"quaternary"} -->
<div class="wp-block-column is-style-default has-quaternary-background-color has-background" style="padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)"><!-- wp:image {"aspectRatio":"3/4","scale":"cover","align":"center","className":"size-large is-style-default"} -->
<figure class="wp-block-image aligncenter size-large is-style-default"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/thumb_1200x1920_dark.webp' ) ); ?>" alt="<?php echo esc_attr__( 'Wireless noise-canceling headphones product image', 'aegis' ); ?>" style="aspect-ratio:3/4;object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"fontSize":"tiny"} -->
<p class="has-tiny-font-size" style="letter-spacing:2px"><p class="has-tiny-font-size" style="letter-spacing:2px" aria-label="<?php echo esc_attr_x( '3.5 out of 5 stars', 'Product rating', 'aegis' ); ?>"><span class="dashicons dashicons-star-filled" aria-hidden="true"></span><span class="dashicons dashicons-star-filled" aria-hidden="true"></span><span class="dashicons dashicons-star-filled" aria-hidden="true"></span><span class="dashicons dashicons-star-half" aria-hidden="true"></span><span class="dashicons dashicons-star-empty" aria-hidden="true"></span></p></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><strong><?php echo esc_html_x( '$249.99', 'Product price example', 'aegis' ); ?></strong></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:heading {"level":3,"fontSize":"large"} -->
<h3 class="wp-block-heading has-large-font-size"><?php echo esc_html_x( 'Wireless Headphones', 'Product name example', 'aegis' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php echo esc_html__( 'Premium noise-canceling headphones with 30-hour battery life, comfortable over-ear design, and crystal-clear sound quality for immersive listening.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|20","left":"var:preset|spacing|20"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-dense-shadow"} -->
<div class="wp-block-button is-style-dense-shadow"><a class="wp-block-button__link wp-element-button" href="#">
                    <?php echo esc_html_x( 'Add to Cart', 'Product purchase button text', 'aegis' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|20","right":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20"}}},"backgroundColor":"contrast","textColor":"base"} -->
<div class="wp-block-column is-style-default has-base-color has-contrast-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)"><!-- wp:image {"aspectRatio":"3/4","scale":"cover","align":"center","className":"size-large is-style-default"} -->
<figure class="wp-block-image aligncenter size-large is-style-default"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/thumb_1200x1920_dark.webp' ) ); ?>" alt="<?php echo esc_attr__( 'Premium leather backpack product image', 'aegis' ); ?>" style="aspect-ratio:3/4;object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"fontSize":"tiny"} -->
<p class="has-tiny-font-size" style="letter-spacing:2px"><p class="has-tiny-font-size" style="letter-spacing:2px" aria-label="<?php echo esc_attr_x( '3.5 out of 5 stars', 'Product rating accessibility label', 'aegis' ); ?>"><span class="dashicons dashicons-star-filled" aria-hidden="true"></span><span class="dashicons dashicons-star-filled" aria-hidden="true"></span><span class="dashicons dashicons-star-filled" aria-hidden="true"></span><span class="dashicons dashicons-star-half" aria-hidden="true"></span><span class="dashicons dashicons-star-empty" aria-hidden="true"></span></p></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><strong><?php echo esc_html_x( '$179.99', 'Product price example', 'aegis' ); ?></strong></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:heading {"level":3,"fontSize":"large"} -->
<h3 class="wp-block-heading has-large-font-size"><?php echo esc_html_x( 'Smart Watch Pro', 'Product name example', 'aegis' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php echo esc_html__( 'Advanced fitness tracker with heart rate monitoring, sleep analysis, GPS, and 7-day battery life. Water-resistant design perfect for active lifestyles.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|20","left":"var:preset|spacing|20"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-dense-shadow"} -->
<div class="wp-block-button is-style-dense-shadow"><a class="wp-block-button__link wp-element-button" href="#">
                    <?php echo esc_html_x( 'Add to Cart', 'Product purchase button text', 'aegis' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->