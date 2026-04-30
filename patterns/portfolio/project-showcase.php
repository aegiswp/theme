<?php
/**
 * Title: Project Showcase
 * Slug: project-showcase
 * Categories: portfolio
 * Keywords: portfolio, project, showcase, case study, work
 * Description: A detailed project showcase layout.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["portfolio"],"patternName":"project-showcase","name":"Project Showcase"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull"
    style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
    <!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained","contentSize":"600px"}} -->
    <div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--lg)">
        <!-- wp:paragraph {"align":"center","className":"is-style-sub-heading"} -->
        <p class="aligncenter has-text-align-center is-style-sub-heading aligncenter"><?php echo esc_html__( 'Featured Work', 'aegis' ); ?></p>
        <!-- /wp:paragraph -->

        <!-- wp:heading {"textAlign":"center","fontSize":"40"} -->
        <h2 class="wp-block-heading has-text-align-center has-40-font-size"><?php echo esc_html__( 'Recent Projects', 'aegis' ); ?></h2>
        <!-- /wp:heading -->
    </div>
    <!-- /wp:group -->

    <!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|md"},"margin":{"bottom":"var:preset|spacing|md"}}}} -->
    <div class="wp-block-columns alignwide" style="margin-bottom:var(--wp--preset--spacing--md)"><!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"var:preset|spacing|md","left":"0"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
            <div class="wp-block-group is-style-surface"
                style="padding-top:0;padding-right:0;padding-bottom:var(--wp--preset--spacing--md);padding-left:0">
                <!-- wp:image {"aspectRatio":"16/9","scale":"cover","style":{"border":{"radius":{"topLeft":"6px","topRight":"6px"}}}} -->
                <figure class="wp-block-image has-custom-border"
                    style="border-top-left-radius:6px;border-top-right-radius:6px"><img alt=""
                        style="border-top-left-radius:6px;border-top-right-radius:6px;aspect-ratio:16/9;object-fit:cover" />
                </figure>
                <!-- /wp:image -->

                <!-- wp:group {"style":{"spacing":{"padding":{"left":"var:preset|spacing|md","right":"var:preset|spacing|md"},"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                <div class="wp-block-group"
                    style="padding-right:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)">
                    <!-- wp:paragraph {"textColor":"primary-500","fontSize":"12"} -->
                    <p class="has-primary-500-color has-text-color has-12-font-size"><?php echo esc_html__( 'DEVELOPMENT', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:heading {"level":3,"fontSize":"24"} -->
                    <h3 class="wp-block-heading has-24-font-size"><?php echo esc_html__( 'E-Commerce Platform Redesign', 'aegis' ); ?></h3>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"textColor":"neutral-600","fontSize":"14"} -->
                    <p class="has-neutral-600-color has-text-color has-14-font-size"><?php echo esc_html__( 'Complete overhaul of an online retail platform resulting in 40% increase in conversions.', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"var:preset|spacing|md","left":"0"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
            <div class="wp-block-group is-style-surface"
                style="padding-top:0;padding-right:0;padding-bottom:var(--wp--preset--spacing--md);padding-left:0">
                <!-- wp:image {"aspectRatio":"16/9","scale":"cover","style":{"border":{"radius":{"topLeft":"6px","topRight":"6px"}}}} -->
                <figure class="wp-block-image has-custom-border"
                    style="border-top-left-radius:6px;border-top-right-radius:6px"><img alt=""
                        style="border-top-left-radius:6px;border-top-right-radius:6px;aspect-ratio:16/9;object-fit:cover" />
                </figure>
                <!-- /wp:image -->

                <!-- wp:group {"style":{"spacing":{"padding":{"left":"var:preset|spacing|md","right":"var:preset|spacing|md"},"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                <div class="wp-block-group"
                    style="padding-right:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)">
                    <!-- wp:paragraph {"textColor":"primary-500","fontSize":"12"} -->
                    <p class="has-primary-500-color has-text-color has-12-font-size"><?php echo esc_html__( 'BRANDING', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:heading {"level":3,"fontSize":"24"} -->
                    <h3 class="wp-block-heading has-24-font-size"><?php echo esc_html__( 'Tech Startup Brand Identity', 'aegis' ); ?></h3>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"textColor":"neutral-600","fontSize":"14"} -->
                    <p class="has-neutral-600-color has-text-color has-14-font-size"><?php echo esc_html__( 'Full brand identity system including logo, guidelines, and marketing collateral.', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"var:preset|spacing|md","left":"0"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
            <div class="wp-block-group is-style-surface"
                style="padding-top:0;padding-right:0;padding-bottom:var(--wp--preset--spacing--md);padding-left:0">
                <!-- wp:image {"aspectRatio":"16/9","scale":"cover","style":{"border":{"radius":{"topLeft":"6px","topRight":"6px"}}}} -->
                <figure class="wp-block-image has-custom-border"
                    style="border-top-left-radius:6px;border-top-right-radius:6px"><img alt=""
                        style="border-top-left-radius:6px;border-top-right-radius:6px;aspect-ratio:16/9;object-fit:cover" />
                </figure>
                <!-- /wp:image -->

                <!-- wp:group {"style":{"spacing":{"padding":{"left":"var:preset|spacing|md","right":"var:preset|spacing|md"},"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                <div class="wp-block-group"
                    style="padding-right:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)">
                    <!-- wp:paragraph {"textColor":"primary-500","fontSize":"12"} -->
                    <p class="has-primary-500-color has-text-color has-12-font-size"><?php echo esc_html__( 'MOBILE APP', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:heading {"level":3,"fontSize":"24"} -->
                    <h3 class="wp-block-heading has-24-font-size"><?php echo esc_html__( 'Fitness Tracking Application', 'aegis' ); ?></h3>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"textColor":"neutral-600","fontSize":"14"} -->
                    <p class="has-neutral-600-color has-text-color has-14-font-size"><?php echo esc_html__( 'iOS and Android app design with intuitive UX and gamification elements.', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->

    <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
    <div class="wp-block-buttons"><!-- wp:button {"className":"is-style-ghost"} -->
        <div class="wp-block-button is-style-ghost"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'View All Projects', 'aegis' ); ?></a></div>
        <!-- /wp:button -->
    </div>
    <!-- /wp:buttons -->
</div>
<!-- /wp:group -->