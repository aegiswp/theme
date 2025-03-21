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

<!-- wp:group {"metadata":{"name":"<?php echo esc_html_x('02. CTA Pattern', 'Name of the pattern', 'aegis'); ?>","categories":["<?php echo esc_html_x('call-to-action', 'Name of the categories', 'aegis'); ?>"],"patternName":"aegis/cta-02"},"layout":{"type":"default"}} -->
<div class="wp-block-group">
    <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}},"border":{"width":"1px"}},"borderColor":"foreground"} -->
    <div class="wp-block-group has-border-color has-foreground-border-color" style="border-width:1px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
        <!-- wp:columns -->
        <div class="wp-block-columns">
            <!-- wp:column {"verticalAlignment":"center"} -->
            <div class="wp-block-column is-vertically-aligned-center">
                <!-- wp:paragraph {"align":"center"} -->
                <p class="has-text-align-center">
                    <?php echo wp_kses_post( _x( 'Save <strong>25% OFF</strong> on Summer Collection! Shop now during our Season Sale.', 'Promotional offer text (50-80 characters recommended)', 'aegis' ) ); ?>
                </p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"textAlign":"center","level":4,"style":{"typography":{"letterSpacing":"10px","textTransform":"uppercase"},"spacing":{"margin":{"top":"var:preset|spacing|30"}}},"fontSize":"gigantic"} -->
                <h4 class="wp-block-heading has-text-align-center has-gigantic-font-size" style="margin-top:var(--wp--preset--spacing--30);letter-spacing:10px;text-transform:uppercase"><?php echo esc_html_x( 'LIMITED TIME', 'Promotional headline (10-20 characters recommended)', 'aegis' ); ?></h4>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"0"}}},"fontSize":"small"} -->
                <p class="has-text-align-center has-small-font-size" style="margin-top:0">
                    <?php echo esc_html_x( 'Ends Sunday - While supplies last', 'Urgency text for promotion (20-40 characters recommended)', 'aegis' ); ?>
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
                <figure class="wp-block-image is-resized aligncenter size-full is-style-rounded"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_800x800_dark.webp" alt="<?php echo esc_html__( 'Featured product image for the promotion', 'aegis' ); ?>" style="aspect-ratio:1;object-fit:cover;width:150px" /></figure>
                <!-- /wp:image -->

                <!-- wp:heading {"textAlign":"center","level":5,"style":{"typography":{"fontStyle":"normal","fontWeight":"400"}}} -->
                <h5 class="wp-block-heading has-text-align-center" style="font-style:normal;font-weight:400">
                    <strong><?php echo esc_html_x( 'New Summer Collection 2023', 'Featured product or collection name (20-40 characters recommended)', 'aegis' ); ?></strong>
                </h5>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"align":"center"} -->
                <p class="has-text-align-center">
                    <?php echo esc_html_x( 'Refresh your wardrobe with our stylish and affordable summer essentials.', 'Product description (50-80 characters recommended)', 'aegis' ); ?>
                </p>
                <!-- /wp:paragraph -->

                <!-- wp:buttons {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
                <div class="wp-block-buttons">
                    <!-- wp:button {"className":"is-style-aegis-button-shadow"} -->
                    <div class="wp-block-button is-style-aegis-button-shadow"><a class="wp-block-button__link wp-element-button" href="#"><?php echo esc_html_x( 'Shop Now', 'Call-to-action button text (10-15 characters recommended)', 'aegis' ); ?></a>
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
</div>
<!-- /wp:group -->