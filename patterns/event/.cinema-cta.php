<?php
/**
 * Title: Cinema CTA
 * Slug: event-cinema-cta
 * Categories: event
 * Keywords: cinema, film, premiere, tickets, cta, event
 * Description: A dark call-to-action section for a cinema premiere with ticket button.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"backgroundColor":"neutral-950","layout":{"type":"constrained","contentSize":"600px"}} -->
<div class="wp-block-group alignfull has-neutral-950-background-color has-background" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
    <!-- wp:heading {"textAlign":"center","textColor":"white","fontSize":"36"} -->
    <h2 class="wp-block-heading has-text-align-center has-white-color has-text-color has-36-font-size"><?php echo esc_html__( 'Don\'t Miss the Premiere', 'aegis' ); ?></h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"align":"center","textColor":"neutral-400","fontSize":"16"} -->
    <p class="aligncenter has-text-align-center has-neutral-400-color has-text-color has-16-font-size aligncenter"><?php echo esc_html__( 'Limited seating available. Includes a post-screening Q&A with director Maren Solberg and lead actor Elias Varga.', 'aegis' ); ?></p>
    <!-- /wp:paragraph -->

    <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|md"}}}} -->
    <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--md)">
        <!-- wp:button {"width":75,"fontSize":"18"} -->
        <div class="wp-block-button has-custom-width wp-block-button__width-75 has-custom-font-size has-18-font-size"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'Get Your Tickets Now', 'aegis' ); ?></a></div>
        <!-- /wp:button -->
    </div>
    <!-- /wp:buttons -->
</div>
<!-- /wp:group -->
