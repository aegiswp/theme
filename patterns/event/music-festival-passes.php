<?php
/**
 * Title: Music Festival Passes
 * Slug: event-music-festival-passes
 * Categories: event
 * Keywords: music, festival, passes, tickets, pricing, event
 * Description: A festival passes pricing section with tiered options and features.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"backgroundColor":"neutral-950","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-neutral-950-background-color has-background" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
    <!-- wp:heading {"textAlign":"center","textColor":"white","fontSize":"36"} -->
    <h2 class="wp-block-heading has-text-align-center has-white-color has-text-color has-36-font-size"><?php echo esc_html__( 'Festival Passes', 'aegis' ); ?></h2>
    <!-- /wp:heading -->

    <!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|lg"},"blockGap":{"left":"var:preset|spacing|md"}}}} -->
    <div class="wp-block-columns alignwide" style="margin-top:var(--wp--preset--spacing--lg)">
        <!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}},"border":{"width":"1px","color":"var:preset|color|neutral-200","radius":"8px"}}} -->
        <div class="wp-block-column has-border-color" style="border-color:var(--wp--preset--color--neutral-200);border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--md)">
            <!-- wp:paragraph {"className":"is-style-sub-heading","textColor":"neutral-500","fontSize":"13"} -->
            <p class="is-style-sub-heading has-neutral-500-color has-text-color has-13-font-size"><?php echo esc_html__( 'Single Day', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph {"className":"is-style-heading","textColor":"white","fontSize":"40"} -->
            <p class="is-style-heading has-white-color has-text-color has-40-font-size"><?php echo esc_html__( '$89', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs","margin":{"top":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
            <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--sm)">
                <!-- wp:paragraph {"textColor":"neutral-400","fontSize":"14"} -->
                <p class="has-neutral-400-color has-text-color has-14-font-size"><?php echo esc_html__( '✓ Access to all 4 stages', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"textColor":"neutral-400","fontSize":"14"} -->
                <p class="has-neutral-400-color has-text-color has-14-font-size"><?php echo esc_html__( '✓ Food & drink vendors', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"textColor":"neutral-400","fontSize":"14"} -->
                <p class="has-neutral-400-color has-text-color has-14-font-size"><?php echo esc_html__( '✓ Art installations', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->

            <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|md"}}}} -->
            <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--md)">
                <!-- wp:button {"width":100,"className":"is-style-outline","fontSize":"14"} -->
                <div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-outline has-custom-font-size has-14-font-size"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'Get Day Pass', 'aegis' ); ?></a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}},"border":{"width":"2px","color":"var:preset|color|primary-500","radius":"8px"}}} -->
        <div class="wp-block-column has-border-color" style="border-color:var(--wp--preset--color--primary-500);border-width:2px;border-radius:8px;padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--md)">
            <!-- wp:paragraph {"className":"is-style-sub-heading","textColor":"primary-400","fontSize":"13"} -->
            <p class="is-style-sub-heading has-primary-400-color has-text-color has-13-font-size"><?php echo esc_html__( '3-Day Pass · Most Popular', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph {"className":"is-style-heading","textColor":"white","fontSize":"40"} -->
            <p class="is-style-heading has-white-color has-text-color has-40-font-size"><?php echo esc_html__( '$219', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs","margin":{"top":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
            <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--sm)">
                <!-- wp:paragraph {"textColor":"neutral-400","fontSize":"14"} -->
                <p class="has-neutral-400-color has-text-color has-14-font-size"><?php echo esc_html__( '✓ All single-day benefits', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"textColor":"neutral-400","fontSize":"14"} -->
                <p class="has-neutral-400-color has-text-color has-14-font-size"><?php echo esc_html__( '✓ Priority entry', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"textColor":"neutral-400","fontSize":"14"} -->
                <p class="has-neutral-400-color has-text-color has-14-font-size"><?php echo esc_html__( '✓ Camping access', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"textColor":"neutral-400","fontSize":"14"} -->
                <p class="has-neutral-400-color has-text-color has-14-font-size"><?php echo esc_html__( '✓ Festival merch pack', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->

            <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|md"}}}} -->
            <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--md)">
                <!-- wp:button {"width":100,"fontSize":"14"} -->
                <div class="wp-block-button has-custom-width wp-block-button__width-100 has-custom-font-size has-14-font-size"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'Get 3-Day Pass', 'aegis' ); ?></a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}},"border":{"width":"1px","color":"var:preset|color|neutral-200","radius":"8px"}}} -->
        <div class="wp-block-column has-border-color" style="border-color:var(--wp--preset--color--neutral-200);border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--md)">
            <!-- wp:paragraph {"className":"is-style-sub-heading","textColor":"neutral-500","fontSize":"13"} -->
            <p class="is-style-sub-heading has-neutral-500-color has-text-color has-13-font-size"><?php echo esc_html__( 'VIP Experience', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph {"className":"is-style-heading","textColor":"white","fontSize":"40"} -->
            <p class="is-style-heading has-white-color has-text-color has-40-font-size"><?php echo esc_html__( '$499', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs","margin":{"top":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
            <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--sm)">
                <!-- wp:paragraph {"textColor":"neutral-400","fontSize":"14"} -->
                <p class="has-neutral-400-color has-text-color has-14-font-size"><?php echo esc_html__( '✓ All 3-day benefits', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"textColor":"neutral-400","fontSize":"14"} -->
                <p class="has-neutral-400-color has-text-color has-14-font-size"><?php echo esc_html__( '✓ Backstage lounge access', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"textColor":"neutral-400","fontSize":"14"} -->
                <p class="has-neutral-400-color has-text-color has-14-font-size"><?php echo esc_html__( '✓ Artist meet & greet', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"textColor":"neutral-400","fontSize":"14"} -->
                <p class="has-neutral-400-color has-text-color has-14-font-size"><?php echo esc_html__( '✓ Premium glamping', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->

            <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|md"}}}} -->
            <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--md)">
                <!-- wp:button {"width":100,"className":"is-style-outline","fontSize":"14"} -->
                <div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-outline has-custom-font-size has-14-font-size"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'Get VIP Pass', 'aegis' ); ?></a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->
