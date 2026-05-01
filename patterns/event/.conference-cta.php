<?php
/**
 * Title: Conference CTA
 * Slug: event-conference-cta
 * Categories: event
 * Keywords: conference, register, pricing, early bird, cta, event
 * Description: A dark call-to-action section for conference registration with early bird pricing.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"backgroundColor":"neutral-950","layout":{"type":"constrained","contentSize":"600px"}} -->
<div class="wp-block-group alignfull has-neutral-950-background-color has-background" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
    <!-- wp:heading {"textAlign":"center","textColor":"white","fontSize":"36"} -->
    <h2 class="wp-block-heading has-text-align-center has-white-color has-text-color has-36-font-size"><?php echo esc_html__( 'Early Bird Pricing Ends Soon', 'aegis' ); ?></h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"align":"center","textColor":"neutral-400"} -->
    <p class="aligncenter has-text-align-center has-neutral-400-color has-text-color aligncenter"><?php echo esc_html__( 'Save 40% on your conference pass when you register before August 1st. Group discounts available for teams of 5+.', 'aegis' ); ?></p>
    <!-- /wp:paragraph -->

    <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|md"}}}} -->
    <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--md)">
        <!-- wp:button {"width":75,"fontSize":"18"} -->
        <div class="wp-block-button has-custom-width wp-block-button__width-75 has-custom-font-size has-18-font-size"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'Register Now — $349', 'aegis' ); ?></a></div>
        <!-- /wp:button -->
    </div>
    <!-- /wp:buttons -->

    <!-- wp:paragraph {"align":"center","textColor":"neutral-600","fontSize":"13","style":{"spacing":{"margin":{"top":"var:preset|spacing|xs"}}}} -->
    <p class="aligncenter has-text-align-center has-neutral-600-color has-text-color has-13-font-size aligncenter" style="margin-top:var(--wp--preset--spacing--xs)"><?php echo esc_html__( 'Regular price $579 · Students $149 · Group rates available', 'aegis' ); ?></p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
