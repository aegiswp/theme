<?php
/**
 * Title: Workshop Hero
 * Slug: workshop-hero
 * Categories: event
 * Keywords: workshop, class, hands-on, creative, event, hero
 * Description: A cover hero section for a workshop with instructor, date, and CTA buttons.
 * Viewport Width: 1280
 */
?>

<!-- wp:cover {"dimRatio":85,"overlayColor":"neutral-950","isUserOverlayColor":true,"minHeight":100,"minHeightUnit":"vh","isDark":false,"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xxl","bottom":"var:preset|spacing|xxl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull is-light" style="padding-top:var(--wp--preset--spacing--xxl);padding-bottom:var(--wp--preset--spacing--xxl);min-height:100vh">
    <span aria-hidden="true" class="wp-block-cover__background has-neutral-950-background-color has-background-dim-80 has-background-dim"></span>
    <div class="wp-block-cover__inner-container">
        <!-- wp:group {"layout":{"type":"constrained","contentSize":"720px"}} -->
        <div class="wp-block-group">
            <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","justifyContent":"center"}} -->
            <div class="wp-block-group">
                <!-- wp:paragraph {"className":"is-style-sub-heading","textColor":"primary-400","fontSize":"14"} -->
                <p class="is-style-sub-heading has-primary-400-color has-text-color has-14-font-size"><?php echo esc_html__( '2-Day Workshop', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"textColor":"neutral-500","fontSize":"14"} -->
                <p class="has-neutral-500-color has-text-color has-14-font-size"><?php echo esc_html__( '· April 5 — 6, 2026', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->

            <!-- wp:heading {"textAlign":"center","level":1,"textColor":"white","fontSize":"52"} -->
            <h1 class="wp-block-heading has-text-align-center has-white-color has-text-color has-52-font-size"><?php echo esc_html__( 'Ceramic Arts Intensive', 'aegis' ); ?></h1>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"center","textColor":"neutral-400","fontSize":"18"} -->
            <p class="aligncenter has-text-align-center has-neutral-400-color has-text-color has-18-font-size aligncenter"><?php echo esc_html__( 'A hands-on weekend workshop exploring wheel throwing, hand-building, and glazing techniques. From raw clay to finished piece — guided by master ceramicist Hana Mori.', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:columns {"style":{"spacing":{"margin":{"top":"var:preset|spacing|lg"},"blockGap":{"left":"var:preset|spacing|lg"}}}} -->
            <div class="wp-block-columns" style="margin-top:var(--wp--preset--spacing--lg)">
                <!-- wp:column -->
                <div class="wp-block-column">
                    <!-- wp:group {"style":{"spacing":{"blockGap":"2px"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
                    <div class="wp-block-group">
                        <!-- wp:paragraph {"align":"center","className":"is-style-sub-heading","textColor":"neutral-500","fontSize":"12"} -->
                        <p class="aligncenter has-text-align-center is-style-sub-heading has-neutral-500-color has-text-color has-12-font-size aligncenter"><?php echo esc_html__( 'Level', 'aegis' ); ?></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:paragraph {"align":"center","textColor":"white","fontSize":"15"} -->
                        <p class="aligncenter has-text-align-center has-white-color has-text-color has-15-font-size aligncenter"><?php echo esc_html__( 'All Levels Welcome', 'aegis' ); ?></p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column -->
                <div class="wp-block-column">
                    <!-- wp:group {"style":{"spacing":{"blockGap":"2px"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
                    <div class="wp-block-group">
                        <!-- wp:paragraph {"align":"center","className":"is-style-sub-heading","textColor":"neutral-500","fontSize":"12"} -->
                        <p class="aligncenter has-text-align-center is-style-sub-heading has-neutral-500-color has-text-color has-12-font-size aligncenter"><?php echo esc_html__( 'Class Size', 'aegis' ); ?></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:paragraph {"align":"center","textColor":"white","fontSize":"15"} -->
                        <p class="aligncenter has-text-align-center has-white-color has-text-color has-15-font-size aligncenter"><?php echo esc_html__( 'Max 12 Students', 'aegis' ); ?></p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column -->
                <div class="wp-block-column">
                    <!-- wp:group {"style":{"spacing":{"blockGap":"2px"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
                    <div class="wp-block-group">
                        <!-- wp:paragraph {"align":"center","className":"is-style-sub-heading","textColor":"neutral-500","fontSize":"12"} -->
                        <p class="aligncenter has-text-align-center is-style-sub-heading has-neutral-500-color has-text-color has-12-font-size aligncenter"><?php echo esc_html__( 'Investment', 'aegis' ); ?></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:paragraph {"align":"center","textColor":"white","fontSize":"15"} -->
                        <p class="aligncenter has-text-align-center has-white-color has-text-color has-15-font-size aligncenter"><?php echo esc_html__( '$350 · Materials Included', 'aegis' ); ?></p>
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
                <div class="wp-block-button has-custom-font-size has-16-font-size"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'Enroll Now', 'aegis' ); ?></a></div>
                <!-- /wp:button -->

                <!-- wp:button {"className":"is-style-ghost","fontSize":"16"} -->
                <div class="wp-block-button is-style-ghost has-custom-font-size has-16-font-size"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'View Gallery', 'aegis' ); ?></a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:group -->
    </div>
</div>
<!-- /wp:cover -->
