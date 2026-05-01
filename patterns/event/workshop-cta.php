<?php
/**
 * Title: Workshop CTA
 * Slug: event-workshop-cta
 * Categories: event
 * Keywords: workshop, enroll, register, included, cta, event
 * Description: A dark call-to-action section for workshop enrollment with included items list.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"backgroundColor":"neutral-950","layout":{"type":"constrained","contentSize":"600px"}} -->
<div class="wp-block-group alignfull has-neutral-950-background-color has-background" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
    <!-- wp:heading {"textAlign":"center","textColor":"white","fontSize":"36"} -->
    <h2 class="wp-block-heading has-text-align-center has-white-color has-text-color has-36-font-size"><?php echo esc_html__( 'What\'s Included', 'aegis' ); ?></h2>
    <!-- /wp:heading -->

    <!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|md"},"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
    <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--md)">
        <!-- wp:paragraph {"align":"center","textColor":"neutral-400","fontSize":"15"} -->
        <p class="aligncenter has-text-align-center has-neutral-400-color has-text-color has-15-font-size aligncenter"><?php echo esc_html__( '✓ 12 hours of hands-on instruction', 'aegis' ); ?></p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph {"align":"center","textColor":"neutral-400","fontSize":"15"} -->
        <p class="aligncenter has-text-align-center has-neutral-400-color has-text-color has-15-font-size aligncenter"><?php echo esc_html__( '✓ All clay, tools, and glazes provided', 'aegis' ); ?></p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph {"align":"center","textColor":"neutral-400","fontSize":"15"} -->
        <p class="aligncenter has-text-align-center has-neutral-400-color has-text-color has-15-font-size aligncenter"><?php echo esc_html__( '✓ Kiln firing of all finished pieces', 'aegis' ); ?></p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph {"align":"center","textColor":"neutral-400","fontSize":"15"} -->
        <p class="aligncenter has-text-align-center has-neutral-400-color has-text-color has-15-font-size aligncenter"><?php echo esc_html__( '✓ Light lunch and refreshments both days', 'aegis' ); ?></p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph {"align":"center","textColor":"neutral-400","fontSize":"15"} -->
        <p class="aligncenter has-text-align-center has-neutral-400-color has-text-color has-15-font-size aligncenter"><?php echo esc_html__( '✓ Take home up to 4 finished pieces', 'aegis' ); ?></p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|lg"}}}} -->
    <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--lg)">
        <!-- wp:button {"width":75,"fontSize":"18"} -->
        <div class="wp-block-button has-custom-width wp-block-button__width-75 has-custom-font-size has-18-font-size"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'Enroll — $350', 'aegis' ); ?></a></div>
        <!-- /wp:button -->
    </div>
    <!-- /wp:buttons -->

    <!-- wp:paragraph {"align":"center","textColor":"neutral-600","fontSize":"13","style":{"spacing":{"margin":{"top":"var:preset|spacing|xs"}}}} -->
    <p class="aligncenter has-text-align-center has-neutral-600-color has-text-color has-13-font-size aligncenter" style="margin-top:var(--wp--preset--spacing--xs)"><?php echo esc_html__( 'Only 4 spots remaining · Full refund up to 7 days before', 'aegis' ); ?></p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
