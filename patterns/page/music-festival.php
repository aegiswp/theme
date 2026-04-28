<?php
/**
 * Title: Music Festival
 * Slug: event-music-festival
 * Categories: page, events
 * Keywords: music, festival, concert, live, band, event
 * Description: A vibrant full page layout for a music festival or concert event.
 * Viewport Width: 1280
 * Block Types: core/post-content
 */
?>

<!-- wp:group {"metadata":{"categories":["page","events"],"patternName":"event-music-festival"},"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull">

    <!-- wp:cover {"dimRatio":70,"overlayColor":"neutral-950","isUserOverlayColor":true,"minHeight":90,"minHeightUnit":"vh","isDark":false,"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xxl","bottom":"var:preset|spacing|xxl"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-cover alignfull is-light" style="padding-top:var(--wp--preset--spacing--xxl);padding-bottom:var(--wp--preset--spacing--xxl);min-height:90vh">
        <span aria-hidden="true" class="wp-block-cover__background has-neutral-950-background-color has-background-dim-70 has-background-dim"></span>
        <div class="wp-block-cover__inner-container">
            <!-- wp:group {"layout":{"type":"constrained","contentSize":"800px"}} -->
            <div class="wp-block-group">
                <!-- wp:paragraph {"align":"center","className":"is-style-sub-heading","textColor":"primary-400","fontSize":"16"} -->
                <p class="aligncenter has-text-align-center is-style-sub-heading has-primary-400-color has-text-color has-16-font-size aligncenter"><?php echo esc_html__( 'June 20 — 22, 2026', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"textAlign":"center","level":1,"textColor":"white","fontSize":"72"} -->
                <h1 class="wp-block-heading has-text-align-center has-white-color has-text-color has-72-font-size"><?php echo esc_html__( 'Resonance', 'aegis' ); ?></h1>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"align":"center","textColor":"neutral-300","fontSize":"20"} -->
                <p class="aligncenter has-text-align-center has-neutral-300-color has-text-color has-20-font-size aligncenter"><?php echo esc_html__( 'Three days of boundary-pushing sound across five stages in the heart of the Andes. Electronic, ambient, jazz fusion, and experimental — all converging under the open sky.', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|md"}}}} -->
                <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--md)">
                    <!-- wp:button {"fontSize":"18"} -->
                    <div class="wp-block-button has-custom-font-size has-18-font-size"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'Get Passes', 'aegis' ); ?></a></div>
                    <!-- /wp:button -->

                    <!-- wp:button {"className":"is-style-ghost","fontSize":"18"} -->
                    <div class="wp-block-button is-style-ghost has-custom-font-size has-18-font-size"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'View Lineup', 'aegis' ); ?></a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:group -->
        </div>
    </div>
    <!-- /wp:cover -->

    <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
        <!-- wp:heading {"textAlign":"center","fontSize":"36"} -->
        <h2 class="wp-block-heading has-text-align-center has-36-font-size"><?php echo esc_html__( 'Lineup', 'aegis' ); ?></h2>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center","textColor":"neutral-500","fontSize":"14","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|lg"}}}} -->
        <p class="aligncenter has-text-align-center has-neutral-500-color has-text-color has-14-font-size aligncenter" style="margin-bottom:var(--wp--preset--spacing--lg)"><?php echo esc_html__( 'More artists to be announced', 'aegis' ); ?></p>
        <!-- /wp:paragraph -->

        <!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"constrained"}} -->
        <div class="wp-block-group alignwide">
            <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md"}},"border":{"bottom":{"color":"var:preset|color|neutral-100","width":"1px"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
            <div class="wp-block-group" style="border-bottom-color:var(--wp--preset--color--neutral-100);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md)">
                <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group">
                    <!-- wp:paragraph {"className":"is-style-sub-heading","textColor":"primary-500","fontSize":"14"} -->
                    <p class="is-style-sub-heading has-primary-500-color has-text-color has-14-font-size"><?php echo esc_html__( 'Headliner', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"className":"is-style-heading","fontSize":"24"} -->
                    <p class="is-style-heading has-24-font-size"><?php echo esc_html__( 'Nils Frahm', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group">
                    <!-- wp:paragraph {"textColor":"neutral-500","fontSize":"14"} -->
                    <p class="has-neutral-500-color has-text-color has-14-font-size"><?php echo esc_html__( 'Main Stage', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"textColor":"neutral-500","fontSize":"14"} -->
                    <p class="has-neutral-500-color has-text-color has-14-font-size"><?php echo esc_html__( 'Fri 9:30 PM', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->

            <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md"}},"border":{"bottom":{"color":"var:preset|color|neutral-100","width":"1px"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
            <div class="wp-block-group" style="border-bottom-color:var(--wp--preset--color--neutral-100);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md)">
                <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group">
                    <!-- wp:paragraph {"className":"is-style-sub-heading","textColor":"primary-500","fontSize":"14"} -->
                    <p class="is-style-sub-heading has-primary-500-color has-text-color has-14-font-size"><?php echo esc_html__( 'Headliner', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"className":"is-style-heading","fontSize":"24"} -->
                    <p class="is-style-heading has-24-font-size"><?php echo esc_html__( 'Bonobo', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group">
                    <!-- wp:paragraph {"textColor":"neutral-500","fontSize":"14"} -->
                    <p class="has-neutral-500-color has-text-color has-14-font-size"><?php echo esc_html__( 'Main Stage', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"textColor":"neutral-500","fontSize":"14"} -->
                    <p class="has-neutral-500-color has-text-color has-14-font-size"><?php echo esc_html__( 'Sat 10:00 PM', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->

            <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md"}},"border":{"bottom":{"color":"var:preset|color|neutral-100","width":"1px"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
            <div class="wp-block-group" style="border-bottom-color:var(--wp--preset--color--neutral-100);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md)">
                <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group">
                    <!-- wp:paragraph {"className":"is-style-sub-heading","textColor":"neutral-400","fontSize":"14"} -->
                    <p class="is-style-sub-heading has-neutral-400-color has-text-color has-14-font-size"><?php echo esc_html__( 'Featured', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"className":"is-style-heading","fontSize":"24"} -->
                    <p class="is-style-heading has-24-font-size"><?php echo esc_html__( 'Floating Points', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group">
                    <!-- wp:paragraph {"textColor":"neutral-500","fontSize":"14"} -->
                    <p class="has-neutral-500-color has-text-color has-14-font-size"><?php echo esc_html__( 'Horizon Stage', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"textColor":"neutral-500","fontSize":"14"} -->
                    <p class="has-neutral-500-color has-text-color has-14-font-size"><?php echo esc_html__( 'Sat 7:00 PM', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->

            <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md"}},"border":{"bottom":{"color":"var:preset|color|neutral-100","width":"1px"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
            <div class="wp-block-group" style="border-bottom-color:var(--wp--preset--color--neutral-100);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md)">
                <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group">
                    <!-- wp:paragraph {"className":"is-style-sub-heading","textColor":"neutral-400","fontSize":"14"} -->
                    <p class="is-style-sub-heading has-neutral-400-color has-text-color has-14-font-size"><?php echo esc_html__( 'Featured', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"className":"is-style-heading","fontSize":"24"} -->
                    <p class="is-style-heading has-24-font-size"><?php echo esc_html__( 'Khruangbin', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group">
                    <!-- wp:paragraph {"textColor":"neutral-500","fontSize":"14"} -->
                    <p class="has-neutral-500-color has-text-color has-14-font-size"><?php echo esc_html__( 'Sunset Stage', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"textColor":"neutral-500","fontSize":"14"} -->
                    <p class="has-neutral-500-color has-text-color has-14-font-size"><?php echo esc_html__( 'Sun 6:00 PM', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->

            <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
            <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md)">
                <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group">
                    <!-- wp:paragraph {"className":"is-style-sub-heading","textColor":"neutral-400","fontSize":"14"} -->
                    <p class="is-style-sub-heading has-neutral-400-color has-text-color has-14-font-size"><?php echo esc_html__( 'Featured', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"className":"is-style-heading","fontSize":"24"} -->
                    <p class="is-style-heading has-24-font-size"><?php echo esc_html__( 'Ólafur Arnalds', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group">
                    <!-- wp:paragraph {"textColor":"neutral-500","fontSize":"14"} -->
                    <p class="has-neutral-500-color has-text-color has-14-font-size"><?php echo esc_html__( 'Intimate Stage', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"textColor":"neutral-500","fontSize":"14"} -->
                    <p class="has-neutral-500-color has-text-color has-14-font-size"><?php echo esc_html__( 'Sun 9:00 PM', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"backgroundColor":"neutral-50","layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignfull has-neutral-50-background-color has-background" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
        <!-- wp:heading {"textAlign":"center","fontSize":"32"} -->
        <h2 class="wp-block-heading has-text-align-center has-32-font-size"><?php echo esc_html__( 'Festival Passes', 'aegis' ); ?></h2>
        <!-- /wp:heading -->

        <!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|lg"},"blockGap":{"left":"var:preset|spacing|md"}}}} -->
        <div class="wp-block-columns alignwide" style="margin-top:var(--wp--preset--spacing--lg)">
            <!-- wp:column {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg","right":"var:preset|spacing|lg"}}}} -->
            <div class="wp-block-column is-style-surface" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
                <!-- wp:paragraph {"className":"is-style-sub-heading","textColor":"neutral-500","fontSize":"14"} -->
                <p class="is-style-sub-heading has-neutral-500-color has-text-color has-14-font-size"><?php echo esc_html__( 'Day Pass', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"level":3,"fontSize":"40"} -->
                <h3 class="wp-block-heading has-40-font-size"><?php echo esc_html__( '$95', 'aegis' ); ?></h3>
                <!-- /wp:heading -->

                <!-- wp:list {"textColor":"neutral-600","fontSize":"15","style":{"spacing":{"margin":{"top":"var:preset|spacing|sm"}}}} -->
                <ul class="has-neutral-600-color has-text-color has-15-font-size" style="margin-top:var(--wp--preset--spacing--sm)">
                    <!-- wp:list-item -->
                    <li><?php echo esc_html__( 'Single day access to all stages', 'aegis' ); ?></li>
                    <!-- /wp:list-item -->

                    <!-- wp:list-item -->
                    <li><?php echo esc_html__( 'Food court access', 'aegis' ); ?></li>
                    <!-- /wp:list-item -->

                    <!-- wp:list-item -->
                    <li><?php echo esc_html__( 'Festival merchandise discount', 'aegis' ); ?></li>
                    <!-- /wp:list-item -->
                </ul>
                <!-- /wp:list -->

                <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|md"}}}} -->
                <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--md)">
                    <!-- wp:button {"className":"is-style-outline","width":100} -->
                    <div class="wp-block-button is-style-outline has-custom-width wp-block-button__width-100"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'Select', 'aegis' ); ?></a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg","right":"var:preset|spacing|lg"}},"border":{"color":"var:preset|color|primary-500","width":"2px"}}} -->
            <div class="wp-block-column is-style-surface has-border-color" style="border-color:var(--wp--preset--color--primary-500);border-width:2px;padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
                <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
                <div class="wp-block-group">
                    <!-- wp:paragraph {"className":"is-style-sub-heading","textColor":"primary-500","fontSize":"14"} -->
                    <p class="is-style-sub-heading has-primary-500-color has-text-color has-14-font-size"><?php echo esc_html__( 'Full Festival', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"className":"is-style-sub-heading","textColor":"primary-500","fontSize":"12"} -->
                    <p class="is-style-sub-heading has-primary-500-color has-text-color has-12-font-size"><?php echo esc_html__( 'Most Popular', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:heading {"level":3,"fontSize":"40"} -->
                <h3 class="wp-block-heading has-40-font-size"><?php echo esc_html__( '$229', 'aegis' ); ?></h3>
                <!-- /wp:heading -->

                <!-- wp:list {"textColor":"neutral-600","fontSize":"15","style":{"spacing":{"margin":{"top":"var:preset|spacing|sm"}}}} -->
                <ul class="has-neutral-600-color has-text-color has-15-font-size" style="margin-top:var(--wp--preset--spacing--sm)">
                    <!-- wp:list-item -->
                    <li><?php echo esc_html__( 'All 3 days access to all stages', 'aegis' ); ?></li>
                    <!-- /wp:list-item -->

                    <!-- wp:list-item -->
                    <li><?php echo esc_html__( 'Priority entry & food court', 'aegis' ); ?></li>
                    <!-- /wp:list-item -->

                    <!-- wp:list-item -->
                    <li><?php echo esc_html__( 'Exclusive festival tote bag', 'aegis' ); ?></li>
                    <!-- /wp:list-item -->

                    <!-- wp:list-item -->
                    <li><?php echo esc_html__( 'Camping pass included', 'aegis' ); ?></li>
                    <!-- /wp:list-item -->
                </ul>
                <!-- /wp:list -->

                <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|md"}}}} -->
                <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--md)">
                    <!-- wp:button {"width":100} -->
                    <div class="wp-block-button has-custom-width wp-block-button__width-100"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'Select', 'aegis' ); ?></a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg","right":"var:preset|spacing|lg"}}}} -->
            <div class="wp-block-column is-style-surface" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
                <!-- wp:paragraph {"className":"is-style-sub-heading","textColor":"neutral-500","fontSize":"14"} -->
                <p class="is-style-sub-heading has-neutral-500-color has-text-color has-14-font-size"><?php echo esc_html__( 'VIP Experience', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"level":3,"fontSize":"40"} -->
                <h3 class="wp-block-heading has-40-font-size"><?php echo esc_html__( '$499', 'aegis' ); ?></h3>
                <!-- /wp:heading -->

                <!-- wp:list {"textColor":"neutral-600","fontSize":"15","style":{"spacing":{"margin":{"top":"var:preset|spacing|sm"}}}} -->
                <ul class="has-neutral-600-color has-text-color has-15-font-size" style="margin-top:var(--wp--preset--spacing--sm)">
                    <!-- wp:list-item -->
                    <li><?php echo esc_html__( 'Everything in Full Festival', 'aegis' ); ?></li>
                    <!-- /wp:list-item -->

                    <!-- wp:list-item -->
                    <li><?php echo esc_html__( 'VIP lounge & viewing area', 'aegis' ); ?></li>
                    <!-- /wp:list-item -->

                    <!-- wp:list-item -->
                    <li><?php echo esc_html__( 'Meet & greet with artists', 'aegis' ); ?></li>
                    <!-- /wp:list-item -->

                    <!-- wp:list-item -->
                    <li><?php echo esc_html__( 'Complimentary drinks & food', 'aegis' ); ?></li>
                    <!-- /wp:list-item -->
                </ul>
                <!-- /wp:list -->

                <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|md"}}}} -->
                <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--md)">
                    <!-- wp:button {"className":"is-style-outline","width":100} -->
                    <div class="wp-block-button is-style-outline has-custom-width wp-block-button__width-100"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'Select', 'aegis' ); ?></a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
        <!-- wp:heading {"textAlign":"center","fontSize":"32"} -->
        <h2 class="wp-block-heading has-text-align-center has-32-font-size"><?php echo esc_html__( 'Essential Info', 'aegis' ); ?></h2>
        <!-- /wp:heading -->

        <!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|lg"},"blockGap":{"left":"var:preset|spacing|lg"}}}} -->
        <div class="wp-block-columns alignwide" style="margin-top:var(--wp--preset--spacing--lg)">
            <!-- wp:column -->
            <div class="wp-block-column">
                <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                <div class="wp-block-group">
                    <!-- wp:heading {"level":4,"fontSize":"18"} -->
                    <h4 class="wp-block-heading has-18-font-size"><?php echo esc_html__( 'Location', 'aegis' ); ?></h4>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"textColor":"neutral-600","fontSize":"15"} -->
                    <p class="has-neutral-600-color has-text-color has-15-font-size"><?php echo esc_html__( 'Valle del Cocora, Quindío, Colombia. Shuttle buses run from Armenia and Pereira airports every 30 minutes during festival days.', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column">
                <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                <div class="wp-block-group">
                    <!-- wp:heading {"level":4,"fontSize":"18"} -->
                    <h4 class="wp-block-heading has-18-font-size"><?php echo esc_html__( 'Camping', 'aegis' ); ?></h4>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"textColor":"neutral-600","fontSize":"15"} -->
                    <p class="has-neutral-600-color has-text-color has-15-font-size"><?php echo esc_html__( 'On-site camping available with Full Festival and VIP passes. Glamping upgrades available for an additional fee. Showers and facilities provided.', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column">
                <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                <div class="wp-block-group">
                    <!-- wp:heading {"level":4,"fontSize":"18"} -->
                    <h4 class="wp-block-heading has-18-font-size"><?php echo esc_html__( 'Sustainability', 'aegis' ); ?></h4>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"textColor":"neutral-600","fontSize":"15"} -->
                    <p class="has-neutral-600-color has-text-color has-15-font-size"><?php echo esc_html__( 'Resonance is a zero-waste festival. We use renewable energy, compostable packaging, and donate proceeds to local reforestation projects.', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->

</div>
<!-- /wp:group -->
