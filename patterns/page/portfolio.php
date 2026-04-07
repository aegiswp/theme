<?php
/**
 * Title: Portfolio Page
 * Slug: portfolio
 * Categories: page
 * Keywords: portfolio, page, work, projects, gallery
 * Description: A complete portfolio page showcasing projects and work.
 * Viewport Width: 1280
 * Block Types: core/post-content
 */
?>

<!-- wp:group {"metadata":{"categories":["page"],"patternName":"portfolio","name":"Portfolio Page"},"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull">

    <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xxl","bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignfull"
        style="padding-top:var(--wp--preset--spacing--xxl);padding-bottom:var(--wp--preset--spacing--lg)">
        <!-- wp:group {"layout":{"type":"constrained","contentSize":"720px"}} -->
        <div class="wp-block-group">
            <!-- wp:paragraph {"align":"center","className":"is-style-sub-heading"} -->
            <p class="aligncenter has-text-align-center is-style-sub-heading aligncenter"><?php echo esc_html__( 'Our Work', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"textAlign":"center","level":1,"fontSize":"52"} -->
            <h1 class="wp-block-heading has-text-align-center has-52-font-size"><?php echo esc_html__( 'Selected Projects', 'aegis' ); ?></h1>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"center","textColor":"neutral-600","fontSize":"18"} -->
            <p class="aligncenter has-text-align-center has-neutral-600-color has-text-color has-18-font-size aligncenter"><?php echo esc_html__( 'Explore our portfolio of successful projects spanning web design, branding, and digital experiences.', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignfull"
        style="padding-top:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--xl)">
        <!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|md"},"margin":{"bottom":"var:preset|spacing|md"}}}} -->
        <div class="wp-block-columns alignwide" style="margin-bottom:var(--wp--preset--spacing--md)">
            <!-- wp:column {"width":"60%"} -->
            <div class="wp-block-column" style="flex-basis:60%">
                <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                <div class="wp-block-group">
                    <!-- wp:cover {"dimRatio":30,"overlayColor":"neutral-950","isUserOverlayColor":true,"minHeight":450,"contentPosition":"bottom left","isDark":false,"style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}}}} -->
                    <div class="wp-block-cover is-light" style="border-radius:12px;padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md);min-height:450px">
                        <span aria-hidden="true" class="wp-block-cover__background has-neutral-950-background-color has-background-dim-30 has-background-dim"></span>
                        <div class="wp-block-cover__inner-container">
                            <!-- wp:paragraph {"textColor":"white","fontSize":"12"} -->
                            <p class="has-white-color has-text-color has-12-font-size"><?php echo esc_html__( 'WEB DESIGN • BRANDING', 'aegis' ); ?></p>
                            <!-- /wp:paragraph -->

                            <!-- wp:heading {"level":3,"textColor":"white","fontSize":"28"} -->
                            <h3 class="wp-block-heading has-white-color has-text-color has-28-font-size"><?php echo esc_html__( 'Nexus Financial Platform', 'aegis' ); ?></h3>
                            <!-- /wp:heading -->
                        </div>
                    </div>
                    <!-- /wp:cover -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"width":"40%"} -->
            <div class="wp-block-column" style="flex-basis:40%">
                <!-- wp:cover {"dimRatio":30,"overlayColor":"neutral-950","isUserOverlayColor":true,"minHeight":450,"contentPosition":"bottom left","isDark":false,"style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}}}} -->
                <div class="wp-block-cover is-light" style="border-radius:12px;padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md);min-height:450px">
                    <span aria-hidden="true" class="wp-block-cover__background has-neutral-950-background-color has-background-dim-30 has-background-dim"></span>
                    <div class="wp-block-cover__inner-container">
                        <!-- wp:paragraph {"textColor":"white","fontSize":"12"} -->
                        <p class="has-white-color has-text-color has-12-font-size"><?php echo esc_html__( 'E-COMMERCE', 'aegis' ); ?></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:heading {"level":3,"textColor":"white","fontSize":"28"} -->
                        <h3 class="wp-block-heading has-white-color has-text-color has-28-font-size"><?php echo esc_html__( 'Artisan Goods Store', 'aegis' ); ?></h3>
                        <!-- /wp:heading -->
                    </div>
                </div>
                <!-- /wp:cover -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->

        <!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|md"},"margin":{"bottom":"var:preset|spacing|md"}}}} -->
        <div class="wp-block-columns alignwide" style="margin-bottom:var(--wp--preset--spacing--md)">
            <!-- wp:column -->
            <div class="wp-block-column">
                <!-- wp:cover {"dimRatio":30,"overlayColor":"neutral-950","isUserOverlayColor":true,"minHeight":350,"contentPosition":"bottom left","isDark":false,"style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}}}} -->
                <div class="wp-block-cover is-light" style="border-radius:12px;padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md);min-height:350px">
                    <span aria-hidden="true" class="wp-block-cover__background has-neutral-950-background-color has-background-dim-30 has-background-dim"></span>
                    <div class="wp-block-cover__inner-container">
                        <!-- wp:paragraph {"textColor":"white","fontSize":"12"} -->
                        <p class="has-white-color has-text-color has-12-font-size"><?php echo esc_html__( 'MOBILE APP', 'aegis' ); ?></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:heading {"level":3,"textColor":"white","fontSize":"24"} -->
                        <h3 class="wp-block-heading has-white-color has-text-color has-24-font-size"><?php echo esc_html__( 'Wellness Tracker', 'aegis' ); ?></h3>
                        <!-- /wp:heading -->
                    </div>
                </div>
                <!-- /wp:cover -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column">
                <!-- wp:cover {"dimRatio":30,"overlayColor":"neutral-950","isUserOverlayColor":true,"minHeight":350,"contentPosition":"bottom left","isDark":false,"style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}}}} -->
                <div class="wp-block-cover is-light" style="border-radius:12px;padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md);min-height:350px">
                    <span aria-hidden="true" class="wp-block-cover__background has-neutral-950-background-color has-background-dim-30 has-background-dim"></span>
                    <div class="wp-block-cover__inner-container">
                        <!-- wp:paragraph {"textColor":"white","fontSize":"12"} -->
                        <p class="has-white-color has-text-color has-12-font-size"><?php echo esc_html__( 'BRANDING', 'aegis' ); ?></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:heading {"level":3,"textColor":"white","fontSize":"24"} -->
                        <h3 class="wp-block-heading has-white-color has-text-color has-24-font-size"><?php echo esc_html__( 'Horizon Studios', 'aegis' ); ?></h3>
                        <!-- /wp:heading -->
                    </div>
                </div>
                <!-- /wp:cover -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column">
                <!-- wp:cover {"dimRatio":30,"overlayColor":"neutral-950","isUserOverlayColor":true,"minHeight":350,"contentPosition":"bottom left","isDark":false,"style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}}}} -->
                <div class="wp-block-cover is-light" style="border-radius:12px;padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md);min-height:350px">
                    <span aria-hidden="true" class="wp-block-cover__background has-neutral-950-background-color has-background-dim-30 has-background-dim"></span>
                    <div class="wp-block-cover__inner-container">
                        <!-- wp:paragraph {"textColor":"white","fontSize":"12"} -->
                        <p class="has-white-color has-text-color has-12-font-size"><?php echo esc_html__( 'WEB DEVELOPMENT', 'aegis' ); ?></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:heading {"level":3,"textColor":"white","fontSize":"24"} -->
                        <h3 class="wp-block-heading has-white-color has-text-color has-24-font-size"><?php echo esc_html__( 'TechStart SaaS', 'aegis' ); ?></h3>
                        <!-- /wp:heading -->
                    </div>
                </div>
                <!-- /wp:cover -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->

        <!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|md"}}}} -->
        <div class="wp-block-columns alignwide">
            <!-- wp:column {"width":"40%"} -->
            <div class="wp-block-column" style="flex-basis:40%">
                <!-- wp:cover {"dimRatio":30,"overlayColor":"neutral-950","isUserOverlayColor":true,"minHeight":400,"contentPosition":"bottom left","isDark":false,"style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}}}} -->
                <div class="wp-block-cover is-light" style="border-radius:12px;padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md);min-height:400px">
                    <span aria-hidden="true" class="wp-block-cover__background has-neutral-950-background-color has-background-dim-30 has-background-dim"></span>
                    <div class="wp-block-cover__inner-container">
                        <!-- wp:paragraph {"textColor":"white","fontSize":"12"} -->
                        <p class="has-white-color has-text-color has-12-font-size"><?php echo esc_html__( 'UI/UX DESIGN', 'aegis' ); ?></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:heading {"level":3,"textColor":"white","fontSize":"28"} -->
                        <h3 class="wp-block-heading has-white-color has-text-color has-28-font-size"><?php echo esc_html__( 'CloudSync Dashboard', 'aegis' ); ?></h3>
                        <!-- /wp:heading -->
                    </div>
                </div>
                <!-- /wp:cover -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"width":"60%"} -->
            <div class="wp-block-column" style="flex-basis:60%">
                <!-- wp:cover {"dimRatio":30,"overlayColor":"neutral-950","isUserOverlayColor":true,"minHeight":400,"contentPosition":"bottom left","isDark":false,"style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}}}} -->
                <div class="wp-block-cover is-light" style="border-radius:12px;padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md);min-height:400px">
                    <span aria-hidden="true" class="wp-block-cover__background has-neutral-950-background-color has-background-dim-30 has-background-dim"></span>
                    <div class="wp-block-cover__inner-container">
                        <!-- wp:paragraph {"textColor":"white","fontSize":"12"} -->
                        <p class="has-white-color has-text-color has-12-font-size"><?php echo esc_html__( 'FULL REBRAND', 'aegis' ); ?></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:heading {"level":3,"textColor":"white","fontSize":"28"} -->
                        <h3 class="wp-block-heading has-white-color has-text-color has-28-font-size"><?php echo esc_html__( 'Metropolitan Real Estate', 'aegis' ); ?></h3>
                        <!-- /wp:heading -->
                    </div>
                </div>
                <!-- /wp:cover -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"backgroundColor":"neutral-950","layout":{"type":"constrained","contentSize":"600px"}} -->
    <div class="wp-block-group alignfull has-neutral-950-background-color has-background"
        style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
        <!-- wp:heading {"textAlign":"center","textColor":"white","fontSize":"36"} -->
        <h2 class="wp-block-heading has-text-align-center has-white-color has-text-color has-36-font-size"><?php echo esc_html__( 'Have a Project in Mind?', 'aegis' ); ?></h2>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center","textColor":"neutral-400"} -->
        <p class="aligncenter has-text-align-center has-neutral-400-color has-text-color aligncenter"><?php echo esc_html__( 'We\'d love to hear about your project and explore how we can help bring your vision to life.', 'aegis' ); ?></p>
        <!-- /wp:paragraph -->

        <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
        <div class="wp-block-buttons">
            <!-- wp:button -->
            <div class="wp-block-button"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'Start a Conversation', 'aegis' ); ?></a></div>
            <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->
    </div>
    <!-- /wp:group -->

</div>
<!-- /wp:group -->
