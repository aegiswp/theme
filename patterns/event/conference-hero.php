<?php
/**
 * Title: Conference Hero
 * Slug: event-conference-hero
 * Categories: event
 * Keywords: conference, summit, tech, speakers, event, hero
 * Description: A dark hero section for a tech conference with stats and CTA buttons.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xxl","bottom":"var:preset|spacing|xxl"}}},"backgroundColor":"neutral-950","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-neutral-950-background-color has-background" style="padding-top:var(--wp--preset--spacing--xxl);padding-bottom:var(--wp--preset--spacing--xxl)">
    <!-- wp:group {"layout":{"type":"constrained","contentSize":"720px"}} -->
    <div class="wp-block-group">
        <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","justifyContent":"center"}} -->
        <div class="wp-block-group">
            <!-- wp:paragraph {"className":"is-style-sub-heading","textColor":"primary-400","fontSize":"14"} -->
            <p class="is-style-sub-heading has-primary-400-color has-text-color has-14-font-size"><?php echo esc_html__( 'October 8 — 10, 2026', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph {"textColor":"neutral-500","fontSize":"14"} -->
            <p class="has-neutral-500-color has-text-color has-14-font-size"><?php echo esc_html__( '· Bogotá, Colombia', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->

        <!-- wp:heading {"textAlign":"center","level":1,"textColor":"white","fontSize":"56"} -->
        <h1 class="wp-block-heading has-text-align-center has-white-color has-text-color has-56-font-size"><?php echo esc_html__( 'Construct 2026', 'aegis' ); ?></h1>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center","textColor":"neutral-400","fontSize":"18"} -->
        <p class="aligncenter has-text-align-center has-neutral-400-color has-text-color has-18-font-size aligncenter"><?php echo esc_html__( 'Where engineering leaders, architects, and builders gather to shape the next decade of software. Three days of deep technical talks, workshops, and unfiltered conversations.', 'aegis' ); ?></p>
        <!-- /wp:paragraph -->

        <!-- wp:columns {"style":{"spacing":{"margin":{"top":"var:preset|spacing|lg"},"blockGap":{"left":"var:preset|spacing|lg"}}}} -->
        <div class="wp-block-columns" style="margin-top:var(--wp--preset--spacing--lg)">
            <!-- wp:column -->
            <div class="wp-block-column">
                <!-- wp:group {"style":{"spacing":{"blockGap":"2px"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
                <div class="wp-block-group">
                    <!-- wp:paragraph {"align":"center","className":"is-style-heading","textColor":"white","fontSize":"32"} -->
                    <p class="aligncenter has-text-align-center is-style-heading has-white-color has-text-color has-32-font-size aligncenter"><?php echo esc_html__( '40+', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"align":"center","textColor":"neutral-500","fontSize":"14"} -->
                    <p class="aligncenter has-text-align-center has-neutral-500-color has-text-color has-14-font-size aligncenter"><?php echo esc_html__( 'Speakers', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column">
                <!-- wp:group {"style":{"spacing":{"blockGap":"2px"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
                <div class="wp-block-group">
                    <!-- wp:paragraph {"align":"center","className":"is-style-heading","textColor":"white","fontSize":"32"} -->
                    <p class="aligncenter has-text-align-center is-style-heading has-white-color has-text-color has-32-font-size aligncenter"><?php echo esc_html__( '3', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"align":"center","textColor":"neutral-500","fontSize":"14"} -->
                    <p class="aligncenter has-text-align-center has-neutral-500-color has-text-color has-14-font-size aligncenter"><?php echo esc_html__( 'Days', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column">
                <!-- wp:group {"style":{"spacing":{"blockGap":"2px"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
                <div class="wp-block-group">
                    <!-- wp:paragraph {"align":"center","className":"is-style-heading","textColor":"white","fontSize":"32"} -->
                    <p class="aligncenter has-text-align-center is-style-heading has-white-color has-text-color has-32-font-size aligncenter"><?php echo esc_html__( '6', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"align":"center","textColor":"neutral-500","fontSize":"14"} -->
                    <p class="aligncenter has-text-align-center has-neutral-500-color has-text-color has-14-font-size aligncenter"><?php echo esc_html__( 'Tracks', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column">
                <!-- wp:group {"style":{"spacing":{"blockGap":"2px"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
                <div class="wp-block-group">
                    <!-- wp:paragraph {"align":"center","className":"is-style-heading","textColor":"white","fontSize":"32"} -->
                    <p class="aligncenter has-text-align-center is-style-heading has-white-color has-text-color has-32-font-size aligncenter"><?php echo esc_html__( '2K+', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"align":"center","textColor":"neutral-500","fontSize":"14"} -->
                    <p class="aligncenter has-text-align-center has-neutral-500-color has-text-color has-14-font-size aligncenter"><?php echo esc_html__( 'Attendees', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->

        <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|md"}}}} -->
        <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--md)">
            <!-- wp:button {"fontSize":"16"} -->
            <div class="wp-block-button has-custom-font-size has-16-font-size"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'Register Now', 'aegis' ); ?></a></div>
            <!-- /wp:button -->

            <!-- wp:button {"className":"is-style-ghost","fontSize":"16"} -->
            <div class="wp-block-button is-style-ghost has-custom-font-size has-16-font-size"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'View Schedule', 'aegis' ); ?></a></div>
            <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->
