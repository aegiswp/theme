<?php
/**
 * Title: Exhibition Tours
 * Slug: event-exhibition-tours
 * Categories: event
 * Keywords: exhibition, tours, guided, art, museum, event
 * Description: A guided tours section with tour options showing times, descriptions, and booking buttons.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"backgroundColor":"neutral-950","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-neutral-950-background-color has-background" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
    <!-- wp:heading {"textAlign":"center","textColor":"white","fontSize":"32"} -->
    <h2 class="wp-block-heading has-text-align-center has-white-color has-text-color has-32-font-size"><?php echo esc_html__( 'Guided Tours', 'aegis' ); ?></h2>
    <!-- /wp:heading -->

    <!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|lg"},"blockGap":{"left":"var:preset|spacing|md"}}}} -->
    <div class="wp-block-columns alignwide" style="margin-top:var(--wp--preset--spacing--lg)">
        <!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}},"border":{"width":"1px","color":"var:preset|color|neutral-200","radius":"8px"}}} -->
        <div class="wp-block-column has-border-color" style="border-color:var(--wp--preset--color--neutral-200);border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)">
            <!-- wp:paragraph {"className":"is-style-sub-heading","textColor":"primary-400","fontSize":"12"} -->
            <p class="is-style-sub-heading has-primary-400-color has-text-color has-12-font-size"><?php echo esc_html__( 'Daily · 11:00 AM & 2:00 PM', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"level":4,"textColor":"white","fontSize":"20"} -->
            <h4 class="wp-block-heading has-white-color has-text-color has-20-font-size"><?php echo esc_html__( 'General Tour', 'aegis' ); ?></h4>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"textColor":"neutral-400","fontSize":"14"} -->
            <p class="has-neutral-400-color has-text-color has-14-font-size"><?php echo esc_html__( 'A 60-minute guided experience through all three floors. Perfect for first-time visitors.', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|sm"}}}} -->
            <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--sm)">
                <!-- wp:button {"className":"is-style-outline","fontSize":"14"} -->
                <div class="wp-block-button is-style-outline has-custom-font-size has-14-font-size"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'Book Tour — Free', 'aegis' ); ?></a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}},"border":{"width":"1px","color":"var:preset|color|neutral-200","radius":"8px"}}} -->
        <div class="wp-block-column has-border-color" style="border-color:var(--wp--preset--color--neutral-200);border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)">
            <!-- wp:paragraph {"className":"is-style-sub-heading","textColor":"primary-400","fontSize":"12"} -->
            <p class="is-style-sub-heading has-primary-400-color has-text-color has-12-font-size"><?php echo esc_html__( 'Weekends · 4:00 PM', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"level":4,"textColor":"white","fontSize":"20"} -->
            <h4 class="wp-block-heading has-white-color has-text-color has-20-font-size"><?php echo esc_html__( 'Curator\'s Insight', 'aegis' ); ?></h4>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"textColor":"neutral-400","fontSize":"14"} -->
            <p class="has-neutral-400-color has-text-color has-14-font-size"><?php echo esc_html__( 'A 90-minute deep dive with Dr. Helena Voss into the creative process and stories behind select works.', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|sm"}}}} -->
            <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--sm)">
                <!-- wp:button {"className":"is-style-outline","fontSize":"14"} -->
                <div class="wp-block-button is-style-outline has-custom-font-size has-14-font-size"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'Book Tour — $25', 'aegis' ); ?></a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}},"border":{"width":"1px","color":"var:preset|color|neutral-200","radius":"8px"}}} -->
        <div class="wp-block-column has-border-color" style="border-color:var(--wp--preset--color--neutral-200);border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)">
            <!-- wp:paragraph {"className":"is-style-sub-heading","textColor":"primary-400","fontSize":"12"} -->
            <p class="is-style-sub-heading has-primary-400-color has-text-color has-12-font-size"><?php echo esc_html__( 'By Appointment', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"level":4,"textColor":"white","fontSize":"20"} -->
            <h4 class="wp-block-heading has-white-color has-text-color has-20-font-size"><?php echo esc_html__( 'Private Group', 'aegis' ); ?></h4>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"textColor":"neutral-400","fontSize":"14"} -->
            <p class="has-neutral-400-color has-text-color has-14-font-size"><?php echo esc_html__( 'Exclusive after-hours access for groups of up to 20. Includes wine reception and artist meet-and-greet.', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|sm"}}}} -->
            <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--sm)">
                <!-- wp:button {"className":"is-style-outline","fontSize":"14"} -->
                <div class="wp-block-button is-style-outline has-custom-font-size has-14-font-size"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'Inquire — $500', 'aegis' ); ?></a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->
