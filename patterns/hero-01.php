<?php
/**
 * Title: 01. Hero Pattern
 * Slug: aegis/hero-1
 * Categories: hero
 * Description: Full-width cover hero with a centered headline, paragraph, and call to action button
 * Keywords: banner, call to action, hero, promotion
 * Viewport Width: 1400
 * Block Types: core/group, core/cover, core/heading, core/paragraph, core/buttons
 * Inserter: true
 * 
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"<?php echo esc_html_x('01. Hero Pattern', 'Name of the pattern', 'aegis'); ?>","categories":["<?php echo esc_html_x('hero', 'Name of the category', 'aegis'); ?>"],"patternName":"aegis/hero-1"},"align":"full","className":"is-style-section-dark","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignfull is-style-section-dark" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
    <!-- wp:cover {"url":"<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_dark.webp","alt":"<?php echo esc_attr__('Placeholder image depicting abstract mountains and a sun. Replace with your image.', 'aegis'); ?>","hasParallax":true,"isRepeated":true,"dimRatio":60,"overlayColor":"foreground","isUserOverlayColor":true,"minHeight":100,"minHeightUnit":"vh","contentPosition":"center center","align":"full","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"default"}} -->
    <div class="wp-block-cover alignfull has-parallax is-repeated" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;min-height:100vh">
        <span aria-hidden="true" class="wp-block-cover__background has-foreground-background-color has-background-dim-60 has-background-dim"></span>
        <div role="img" aria-label="<?php echo esc_attr__('Placeholder image depicting abstract mountains and a sun. Replace with your image.', 'aegis'); ?>" class="wp-block-cover__image-background has-parallax is-repeated" style="background-position:50% 50%;background-image:url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_dark.webp)">
        </div>
        <div class="wp-block-cover__inner-container">
            <!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
                <!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontStyle":"normal","fontWeight":"400"}},"fontSize":"gigantic"} -->
                <h1 class="wp-block-heading has-text-align-center has-gigantic-font-size" style="font-style:normal;font-weight:400"><?php echo wp_kses_post( _x( '<strong>Main</strong> Heading', 'Replace with a descriptive section title.', 'aegis' ) ); ?></h1>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"align":"center"} -->
                <p class="has-text-align-center">
                    <?php echo esc_html_x('Provide a brief description with a maximum of 155 characters. Summarize the key points of an offer, article, or news update concisely.', 'Replace with a description of the section.', 'aegis'); ?>
                </p>
                <!-- /wp:paragraph -->

                <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center","flexWrap":"nowrap","orientation":"horizontal"}} -->
                <div class="wp-block-buttons">
                    <!-- wp:button {"className":"is-style-dense-shadow"} -->
                    <div class="wp-block-button is-style-dense-shadow"><a class="wp-block-button__link wp-element-button" href="#"><?php echo esc_html_x( 'Call to Action', 'Call to action button text', 'aegis' ); ?></a>
                    </div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:group -->
        </div>
    </div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->