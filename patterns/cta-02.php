<?php
/**
 * Title: 02. CTA Pattern
 * Slug: aegis/cta-02
 * Categories: call-to-action
 * Description: Block pattern featuring a split layout with a bold headline, promotional text, product highlight, and call-to-action button. Designed for impactful promotions and accessibility.
 * Keywords: call-to-action, headline, buttons, promotion, product highlight, layout
 * Viewport Width: 1400
 * Block Types: core/button, core/buttons, core/columns, core/group, core/heading, core/image, core/paragraph
 * Inserter: true
 *
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"02. CTA Pattern","categories":["call-to-action"],"patternName":"aegis/cta-02"},"style":{"border":{"width":"2px"}},"borderColor":"contrast","layout":{"type":"default"}} -->
<div class="wp-block-group has-border-color has-contrast-border-color" style="border-width:2px"><!-- wp:columns {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"blockGap":{"top":"var:preset|spacing|20","left":"var:preset|spacing|20"}}}} -->
<div class="wp-block-columns" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"padding":{"right":"var:preset|spacing|small","left":"var:preset|spacing|small","top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}}},"backgroundColor":"contrast"} -->
<div class="wp-block-column is-vertically-aligned-center has-contrast-background-color has-background" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)"><!-- wp:spacer {"height":"120px"} -->
<div style="height:120px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:paragraph {"align":"center","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|small"}}},"textColor":"base"} -->
<p class="has-text-align-center has-base-color has-text-color" style="padding-bottom:var(--wp--preset--spacing--small)">
                    <?php echo wp_kses_post(_x('Save <strong>25% OFF</strong> on Summer Collection! Shop now during our Season Sale.', 'Promotional offer text', 'aegis')); ?>                </p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"letterSpacing":"10px","textTransform":"uppercase"},"spacing":{"margin":{"top":"0"}}},"textColor":"base","fontSize":"x-large"} -->
<h3 class="wp-block-heading has-text-align-center has-base-color has-text-color has-x-large-font-size" style="margin-top:0;letter-spacing:10px;text-transform:uppercase"><?php echo esc_html_x('LIMITED TIME', 'Promotional headline', 'aegis'); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"0"}}},"textColor":"base","fontSize":"small"} -->
<p class="has-text-align-center has-base-color has-text-color has-small-font-size" style="margin-top:0">
                    <?php echo esc_html_x('Ends Sunday - While supplies last', 'Urgency text for promotion', 'aegis'); ?>                </p>
<!-- /wp:paragraph -->

<!-- wp:spacer {"height":"120px"} -->
<div style="height:120px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}}}} -->
<div class="wp-block-column is-vertically-aligned-center" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--20)"><!-- wp:image {"width":"150px","aspectRatio":"1","scale":"cover","className":"aligncenter size-full is-resized is-style-rounded"} -->
<figure class="wp-block-image is-resized aligncenter size-full is-style-rounded"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/thumb_800x800_dark.webp' ) ); ?>" alt="<?php echo esc_attr__( 'Featured product image for the promotion', 'aegis' ); ?>" style="aspect-ratio:1;object-fit:cover;width:150px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"400"}},"fontSize":"x-large"} -->
<h3 class="wp-block-heading has-text-align-center has-x-large-font-size" style="font-style:normal;font-weight:400">
                    <strong><?php echo esc_html_x('New Summer Collection 2023', 'Featured product or collection name', 'aegis'); ?></strong>
                </h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">
                    <?php echo esc_html_x('Refresh your wardrobe with our stylish and affordable summer essentials.', 'Product description', 'aegis'); ?>                </p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|10","left":"var:preset|spacing|10"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-aegis-button-shadow is-style-dense-shadow"} -->
<div class="wp-block-button is-style-aegis-button-shadow is-style-dense-shadow"><a class="wp-block-button__link wp-element-button" href="#"><?php echo esc_html_x('Shop Now', 'Call-to-action button text', 'aegis'); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"backgroundColor":"tertiary","textColor":"contrast","className":"is-style-outline-shadow","style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}}} -->
<div class="wp-block-button is-style-outline-shadow"><a class="wp-block-button__link has-contrast-color has-tertiary-background-color has-text-color has-background has-link-color wp-element-button" href="#"><?php echo esc_html_x('Visit Shop', 'Secondary call-to-action button text', 'aegis'); ?> <?php echo esc_html_x('→', 'Arrow for CTA button', 'aegis'); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
