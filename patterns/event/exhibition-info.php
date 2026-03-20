<?php
/**
 * Title: Exhibition Info
 * Slug: event-exhibition-info
 * Categories: event
 * Keywords: exhibition, hours, location, contact, info, event
 * Description: An information section with museum hours, location, and contact details.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
    <!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|xl"}}}} -->
    <div class="wp-block-columns alignwide">
        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:heading {"level":4,"fontSize":"20"} -->
            <h4 class="wp-block-heading has-20-font-size"><?php echo esc_html__( 'Hours', 'aegis' ); ?></h4>
            <!-- /wp:heading -->

            <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs","margin":{"top":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
            <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--sm)">
                <!-- wp:paragraph {"textColor":"neutral-600","fontSize":"15"} -->
                <p class="has-neutral-600-color has-text-color has-15-font-size"><?php echo esc_html__( 'Monday — Friday: 10 AM — 6 PM', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"textColor":"neutral-600","fontSize":"15"} -->
                <p class="has-neutral-600-color has-text-color has-15-font-size"><?php echo esc_html__( 'Saturday — Sunday: 10 AM — 8 PM', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"textColor":"neutral-600","fontSize":"15"} -->
                <p class="has-neutral-600-color has-text-color has-15-font-size"><?php echo esc_html__( 'Closed Tuesdays', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:heading {"level":4,"fontSize":"20"} -->
            <h4 class="wp-block-heading has-20-font-size"><?php echo esc_html__( 'Location', 'aegis' ); ?></h4>
            <!-- /wp:heading -->

            <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs","margin":{"top":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
            <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--sm)">
                <!-- wp:paragraph {"textColor":"neutral-600","fontSize":"15"} -->
                <p class="has-neutral-600-color has-text-color has-15-font-size"><?php echo esc_html__( 'Nordisk Kunsthall', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"textColor":"neutral-600","fontSize":"15"} -->
                <p class="has-neutral-600-color has-text-color has-15-font-size"><?php echo esc_html__( 'Havnegade 42, Copenhagen', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"textColor":"neutral-600","fontSize":"15"} -->
                <p class="has-neutral-600-color has-text-color has-15-font-size"><?php echo esc_html__( 'Denmark 1058', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:heading {"level":4,"fontSize":"20"} -->
            <h4 class="wp-block-heading has-20-font-size"><?php echo esc_html__( 'Contact', 'aegis' ); ?></h4>
            <!-- /wp:heading -->

            <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs","margin":{"top":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
            <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--sm)">
                <!-- wp:paragraph {"textColor":"neutral-600","fontSize":"15"} -->
                <p class="has-neutral-600-color has-text-color has-15-font-size"><?php echo esc_html__( 'info@nordiskkunsthall.dk', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"textColor":"neutral-600","fontSize":"15"} -->
                <p class="has-neutral-600-color has-text-color has-15-font-size"><?php echo esc_html__( '+45 33 12 00 00', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"textColor":"neutral-600","fontSize":"15"} -->
                <p class="has-neutral-600-color has-text-color has-15-font-size"><?php echo esc_html__( '@nordiskkunsthall', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->
