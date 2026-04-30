<?php
/**
 * Title: Landing Page
 * Slug: landing
 * Categories: page
 * Keywords: landing, page, marketing, conversion, sales
 * Description: A high-converting landing page for products or services.
 * Viewport Width: 1280
 * Block Types: core/post-content
 */
?>

<!-- wp:group {"metadata":{"categories":["page"],"patternName":"landing","name":"Landing Page"},"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull">

    <!-- wp:cover {"dimRatio":80,"overlayColor":"neutral-950","isUserOverlayColor":true,"minHeight":90,"minHeightUnit":"vh","isDark":false,"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xxl","bottom":"var:preset|spacing|xxl"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-cover alignfull is-light" style="padding-top:var(--wp--preset--spacing--xxl);padding-bottom:var(--wp--preset--spacing--xxl);min-height:90vh">
        <span aria-hidden="true" class="wp-block-cover__background has-neutral-950-background-color has-background-dim-80 has-background-dim"></span>
        <div class="wp-block-cover__inner-container">
            <!-- wp:group {"layout":{"type":"constrained","contentSize":"800px"}} -->
            <div class="wp-block-group">
                <!-- wp:paragraph {"align":"center","className":"is-style-sub-heading","textColor":"primary-400"} -->
                <p class="aligncenter has-text-align-center is-style-sub-heading has-primary-400-color has-text-color aligncenter"><?php echo esc_html__( 'Introducing the Future', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"textAlign":"center","level":1,"textColor":"white","fontSize":"60"} -->
                <h1 class="wp-block-heading has-text-align-center has-white-color has-text-color has-60-font-size"><?php echo esc_html__( 'Build Faster. Launch Smarter. Scale Effortlessly.', 'aegis' ); ?></h1>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"align":"center","textColor":"neutral-300","fontSize":"20"} -->
                <p class="aligncenter has-text-align-center has-neutral-300-color has-text-color has-20-font-size aligncenter"><?php echo esc_html__( 'The all-in-one platform that empowers teams to create, collaborate, and deliver exceptional digital experiences.', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|md"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
                <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--md)">
                    <!-- wp:button {"fontSize":"18"} -->
                    <div class="wp-block-button has-custom-font-size has-18-font-size"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'Start Free Trial', 'aegis' ); ?></a></div>
                    <!-- /wp:button -->

                    <!-- wp:button {"className":"is-style-ghost","fontSize":"18"} -->
                    <div class="wp-block-button is-style-ghost has-custom-font-size has-18-font-size"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'Watch Demo', 'aegis' ); ?></a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->

                <!-- wp:paragraph {"align":"center","textColor":"neutral-500","fontSize":"14"} -->
                <p class="aligncenter has-text-align-center has-neutral-500-color has-text-color has-14-font-size aligncenter"><?php echo esc_html__( 'No credit card required • 14-day free trial • Cancel anytime', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
    </div>
    <!-- /wp:cover -->

    <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
        <!-- wp:paragraph {"align":"center","textColor":"neutral-500","fontSize":"14"} -->
        <p class="aligncenter has-text-align-center has-neutral-500-color has-text-color has-14-font-size aligncenter"><?php echo esc_html__( 'TRUSTED BY LEADING COMPANIES WORLDWIDE', 'aegis' ); ?></p>
        <!-- /wp:paragraph -->

        <!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|md"}}}} -->
        <div class="wp-block-columns alignwide" style="margin-top:var(--wp--preset--spacing--md)">
            <!-- wp:column -->
            <div class="wp-block-column">
                <!-- wp:paragraph {"align":"center","className":"is-style-heading","textColor":"neutral-300","fontSize":"24"} -->
                <p class="aligncenter has-text-align-center is-style-heading has-neutral-300-color has-text-color has-24-font-size aligncenter"><?php echo esc_html__( 'Acme Corp', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column">
                <!-- wp:paragraph {"align":"center","className":"is-style-heading","textColor":"neutral-300","fontSize":"24"} -->
                <p class="aligncenter has-text-align-center is-style-heading has-neutral-300-color has-text-color has-24-font-size aligncenter"><?php echo esc_html__( 'TechFlow', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column">
                <!-- wp:paragraph {"align":"center","className":"is-style-heading","textColor":"neutral-300","fontSize":"24"} -->
                <p class="aligncenter has-text-align-center is-style-heading has-neutral-300-color has-text-color has-24-font-size aligncenter"><?php echo esc_html__( 'Innovate', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column">
                <!-- wp:paragraph {"align":"center","className":"is-style-heading","textColor":"neutral-300","fontSize":"24"} -->
                <p class="aligncenter has-text-align-center is-style-heading has-neutral-300-color has-text-color has-24-font-size aligncenter"><?php echo esc_html__( 'Quantum', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column">
                <!-- wp:paragraph {"align":"center","className":"is-style-heading","textColor":"neutral-300","fontSize":"24"} -->
                <p class="aligncenter has-text-align-center is-style-heading has-neutral-300-color has-text-color has-24-font-size aligncenter"><?php echo esc_html__( 'Nexus', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"backgroundColor":"neutral-50","layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignfull has-neutral-50-background-color has-background" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
        <!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained","contentSize":"600px"}} -->
        <div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--lg)">
            <!-- wp:heading {"textAlign":"center","fontSize":"40"} -->
            <h2 class="wp-block-heading has-text-align-center has-40-font-size"><?php echo esc_html__( 'Everything You Need to Succeed', 'aegis' ); ?></h2>
            <!-- /wp:heading -->
        </div>
        <!-- /wp:group -->

        <!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|md"}}}} -->
        <div class="wp-block-columns alignwide">
            <!-- wp:column {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}}}} -->
            <div class="wp-block-column is-style-surface" style="padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)">
                <!-- wp:paragraph {"className":"is-style-heading","fontSize":"32"} -->
                <p class="is-style-heading has-32-font-size">⚡</p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"level":3,"fontSize":"20"} -->
                <h3 class="wp-block-heading has-20-font-size"><?php echo esc_html__( 'Lightning Fast', 'aegis' ); ?></h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"textColor":"neutral-600","fontSize":"15"} -->
                <p class="has-neutral-600-color has-text-color has-15-font-size"><?php echo esc_html__( 'Optimized performance ensures your projects load instantly.', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}}}} -->
            <div class="wp-block-column is-style-surface" style="padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)">
                <!-- wp:paragraph {"className":"is-style-heading","fontSize":"32"} -->
                <p class="is-style-heading has-32-font-size">🔒</p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"level":3,"fontSize":"20"} -->
                <h3 class="wp-block-heading has-20-font-size"><?php echo esc_html__( 'Enterprise Security', 'aegis' ); ?></h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"textColor":"neutral-600","fontSize":"15"} -->
                <p class="has-neutral-600-color has-text-color has-15-font-size"><?php echo esc_html__( 'Bank-level encryption keeps your data safe and secure.', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}}}} -->
            <div class="wp-block-column is-style-surface" style="padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)">
                <!-- wp:paragraph {"className":"is-style-heading","fontSize":"32"} -->
                <p class="is-style-heading has-32-font-size">🚀</p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"level":3,"fontSize":"20"} -->
                <h3 class="wp-block-heading has-20-font-size"><?php echo esc_html__( 'Easy Integration', 'aegis' ); ?></h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"textColor":"neutral-600","fontSize":"15"} -->
                <p class="has-neutral-600-color has-text-color has-15-font-size"><?php echo esc_html__( 'Connect with 100+ tools you already use and love.', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"backgroundColor":"neutral-950","layout":{"type":"constrained","contentSize":"600px"}} -->
    <div class="wp-block-group alignfull has-neutral-950-background-color has-background" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
        <!-- wp:heading {"textAlign":"center","textColor":"white","fontSize":"36"} -->
        <h2 class="wp-block-heading has-text-align-center has-white-color has-text-color has-36-font-size"><?php echo esc_html__( 'Ready to Get Started?', 'aegis' ); ?></h2>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center","textColor":"neutral-400"} -->
        <p class="aligncenter has-text-align-center has-neutral-400-color has-text-color aligncenter"><?php echo esc_html__( 'Join thousands of teams already using our platform to build amazing products.', 'aegis' ); ?></p>
        <!-- /wp:paragraph -->

        <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
        <div class="wp-block-buttons">
            <!-- wp:button -->
            <div class="wp-block-button"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'Start Your Free Trial', 'aegis' ); ?></a></div>
            <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->
    </div>
    <!-- /wp:group -->

</div>
<!-- /wp:group -->
