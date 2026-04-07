<?php
/**
 * Title: Services Page
 * Slug: services
 * Categories: page
 * Keywords: services, page, offerings, solutions, features
 * Description: A complete services page layout showcasing offerings.
 * Viewport Width: 1280
 * Block Types: core/post-content
 */
?>

<!-- wp:group {"metadata":{"categories":["page"],"patternName":"services","name":"Services Page"},"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull">
    <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xxl","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--xxl);padding-bottom:var(--wp--preset--spacing--xl)">
        <!-- wp:group {"layout":{"type":"constrained","contentSize":"720px"}} -->
        <div class="wp-block-group"><!-- wp:paragraph {"align":"center","className":"is-style-sub-heading"} -->
            <p class="aligncenter has-text-align-center is-style-sub-heading aligncenter"><?php echo esc_html__( 'What We Do', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"textAlign":"center","level":1,"fontSize":"52"} -->
            <h1 class="wp-block-heading has-text-align-center has-52-font-size"><?php echo esc_html__( 'Services Tailored to Your Success', 'aegis' ); ?></h1>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"center","textColor":"neutral-600","fontSize":"18"} -->
            <p
                class="aligncenter has-text-align-center has-neutral-600-color has-text-color has-18-font-size aligncenter">
                <?php echo esc_html__( 'From concept to launch and beyond, we provide end-to-end digital solutions that transform ideas into impactful experiences.', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--xl)">
        <!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|xl"},"margin":{"bottom":"var:preset|spacing|xl"}}}} -->
        <div class="wp-block-columns alignwide are-vertically-aligned-center"
            style="margin-bottom:var(--wp--preset--spacing--xl)"><!-- wp:column {"verticalAlignment":"center"} -->
            <div class="wp-block-column is-vertically-aligned-center">
                <!-- wp:paragraph {"className":"is-style-sub-heading"} -->
                <p class="is-style-sub-heading">01</p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"fontSize":"36"} -->
                <h2 class="wp-block-heading has-36-font-size"><?php echo esc_html__( 'Web Design & Development', 'aegis' ); ?></h2>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"textColor":"neutral-600"} -->
                <p class="has-neutral-600-color has-text-color"><?php echo esc_html__( 'We create stunning, responsive websites that captivate visitors and convert them into customers. Our development process ensures fast load times, accessibility, and seamless user experiences across all devices.', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:list {"textColor":"neutral-600"} -->
                <ul class="wp-block-list has-neutral-600-color has-text-color"><!-- wp:list-item -->
                    <li><?php echo esc_html__( 'Custom WordPress Development', 'aegis' ); ?></li>
                    <!-- /wp:list-item -->

                    <!-- wp:list-item -->
                    <li><?php echo esc_html__( 'E-commerce Solutions', 'aegis' ); ?></li>
                    <!-- /wp:list-item -->

                    <!-- wp:list-item -->
                    <li><?php echo esc_html__( 'Progressive Web Applications', 'aegis' ); ?></li>
                    <!-- /wp:list-item -->

                    <!-- wp:list-item -->
                    <li><?php echo esc_html__( 'Performance Optimization', 'aegis' ); ?></li>
                    <!-- /wp:list-item -->
                </ul>
                <!-- /wp:list -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"verticalAlignment":"center"} -->
            <div class="wp-block-column is-vertically-aligned-center">
                <!-- wp:image {"aspectRatio":"4/3","scale":"cover"} -->
                <figure class="wp-block-image"><img alt="" style="aspect-ratio:4/3;object-fit:cover" /></figure>
                <!-- /wp:image -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->

        <!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|xl"},"margin":{"bottom":"var:preset|spacing|xl"}}}} -->
        <div class="wp-block-columns alignwide are-vertically-aligned-center"
            style="margin-bottom:var(--wp--preset--spacing--xl)"><!-- wp:column {"verticalAlignment":"center"} -->
            <div class="wp-block-column is-vertically-aligned-center">
                <!-- wp:image {"aspectRatio":"4/3","scale":"cover"} -->
                <figure class="wp-block-image"><img alt="" style="aspect-ratio:4/3;object-fit:cover" /></figure>
                <!-- /wp:image -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"verticalAlignment":"center"} -->
            <div class="wp-block-column is-vertically-aligned-center">
                <!-- wp:paragraph {"className":"is-style-sub-heading"} -->
                <p class="is-style-sub-heading">02</p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"fontSize":"36"} -->
                <h2 class="wp-block-heading has-36-font-size"><?php echo esc_html__( 'Brand Identity & Strategy', 'aegis' ); ?></h2>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"textColor":"neutral-600"} -->
                <p class="has-neutral-600-color has-text-color"><?php echo esc_html__( 'Your brand is more than a logo—it\'s the complete experience customers have with your business. We develop cohesive brand identities that communicate your values and resonate with your target audience.', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:list {"textColor":"neutral-600"} -->
                <ul class="wp-block-list has-neutral-600-color has-text-color"><!-- wp:list-item -->
                    <li><?php echo esc_html__( 'Logo & Visual Identity Design', 'aegis' ); ?></li>
                    <!-- /wp:list-item -->

                    <!-- wp:list-item -->
                    <li><?php echo esc_html__( 'Brand Guidelines & Systems', 'aegis' ); ?></li>
                    <!-- /wp:list-item -->

                    <!-- wp:list-item -->
                    <li><?php echo esc_html__( 'Market Research & Positioning', 'aegis' ); ?></li>
                    <!-- /wp:list-item -->

                    <!-- wp:list-item -->
                    <li><?php echo esc_html__( 'Brand Voice & Messaging', 'aegis' ); ?></li>
                    <!-- /wp:list-item -->
                </ul>
                <!-- /wp:list -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->

        <!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|xl"}}}} -->
        <div class="wp-block-columns alignwide are-vertically-aligned-center">
            <!-- wp:column {"verticalAlignment":"center"} -->
            <div class="wp-block-column is-vertically-aligned-center">
                <!-- wp:paragraph {"className":"is-style-sub-heading"} -->
                <p class="is-style-sub-heading">03</p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"fontSize":"36"} -->
                <h2 class="wp-block-heading has-36-font-size"><?php echo esc_html__( 'Digital Marketing & SEO', 'aegis' ); ?></h2>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"textColor":"neutral-600"} -->
                <p class="has-neutral-600-color has-text-color"><?php echo esc_html__( 'Drive qualified traffic and increase conversions with data-driven marketing strategies. We combine creative content with technical expertise to maximize your online visibility and ROI.', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:list {"textColor":"neutral-600"} -->
                <ul class="wp-block-list has-neutral-600-color has-text-color"><!-- wp:list-item -->
                    <li><?php echo esc_html__( 'Search Engine Optimization', 'aegis' ); ?></li>
                    <!-- /wp:list-item -->

                    <!-- wp:list-item -->
                    <li><?php echo esc_html__( 'Content Marketing Strategy', 'aegis' ); ?></li>
                    <!-- /wp:list-item -->

                    <!-- wp:list-item -->
                    <li><?php echo esc_html__( 'Social Media Management', 'aegis' ); ?></li>
                    <!-- /wp:list-item -->

                    <!-- wp:list-item -->
                    <li><?php echo esc_html__( 'Analytics & Reporting', 'aegis' ); ?></li>
                    <!-- /wp:list-item -->
                </ul>
                <!-- /wp:list -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"verticalAlignment":"center"} -->
            <div class="wp-block-column is-vertically-aligned-center">
                <!-- wp:image {"aspectRatio":"4/3","scale":"cover"} -->
                <figure class="wp-block-image"><img alt="" style="aspect-ratio:4/3;object-fit:cover" /></figure>
                <!-- /wp:image -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"backgroundColor":"neutral-950","layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignfull has-neutral-950-background-color has-background" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
        <!-- wp:group {"layout":{"type":"constrained","contentSize":"720px"}} -->
        <div class="wp-block-group">
            <!-- wp:paragraph {"align":"center","className":"is-style-sub-heading","textColor":"primary-400"} -->
            <p class="aligncenter has-text-align-center is-style-sub-heading has-primary-400-color has-text-color aligncenter">
                <?php echo esc_html__( 'Our Process', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"textAlign":"center","textColor":"white","fontSize":"40"} -->
            <h2 class="wp-block-heading has-text-align-center has-white-color has-text-color has-40-font-size"><?php echo esc_html__( 'How We Work', 'aegis' ); ?></h2>
            <!-- /wp:heading -->
        </div>
        <!-- /wp:group -->

        <!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|lg"},"blockGap":{"left":"var:preset|spacing|md"}}}} -->
        <div class="wp-block-columns alignwide" style="margin-top:var(--wp--preset--spacing--lg)">
            <!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}},"border":{"width":"1px","color":"var:preset|color|neutral-700","radius":"8px"}}} -->
            <div class="wp-block-column has-border-color" style="border-color:var(--wp--preset--color--neutral-700);border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)">
                <!-- wp:paragraph {"className":"is-style-heading","textColor":"primary-400","fontSize":"36"} -->
                <p class="is-style-heading has-primary-400-color has-text-color has-36-font-size">01</p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"level":3,"textColor":"white","fontSize":"24"} -->
                <h3 class="wp-block-heading has-white-color has-text-color has-24-font-size"><?php echo esc_html__( 'Discovery', 'aegis' ); ?></h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"textColor":"neutral-400","fontSize":"15"} -->
                <p class="has-neutral-400-color has-text-color has-15-font-size"><?php echo esc_html__( 'We dive deep into understanding your business, goals, audience, and competitive landscape to inform our strategy.', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}},"border":{"width":"1px","color":"var:preset|color|neutral-700","radius":"8px"}}} -->
            <div class="wp-block-column has-border-color" style="border-color:var(--wp--preset--color--neutral-700);border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)">
                <!-- wp:paragraph {"className":"is-style-heading","textColor":"primary-400","fontSize":"36"} -->
                <p class="is-style-heading has-primary-400-color has-text-color has-36-font-size">02</p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"level":3,"textColor":"white","fontSize":"24"} -->
                <h3 class="wp-block-heading has-white-color has-text-color has-24-font-size"><?php echo esc_html__( 'Strategy', 'aegis' ); ?></h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"textColor":"neutral-400","fontSize":"15"} -->
                <p class="has-neutral-400-color has-text-color has-15-font-size"><?php echo esc_html__( 'We develop a comprehensive roadmap that aligns creative vision with business objectives and technical requirements.', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}},"border":{"width":"1px","color":"var:preset|color|neutral-700","radius":"8px"}}} -->
            <div class="wp-block-column has-border-color" style="border-color:var(--wp--preset--color--neutral-700);border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)">
                <!-- wp:paragraph {"className":"is-style-heading","textColor":"primary-400","fontSize":"36"} -->
                <p class="is-style-heading has-primary-400-color has-text-color has-36-font-size">03</p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"level":3,"textColor":"white","fontSize":"24"} -->
                <h3 class="wp-block-heading has-white-color has-text-color has-24-font-size"><?php echo esc_html__( 'Creation', 'aegis' ); ?></h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"textColor":"neutral-400","fontSize":"15"} -->
                <p class="has-neutral-400-color has-text-color has-15-font-size"><?php echo esc_html__( 'Our team brings concepts to life through iterative design and development, with regular check-ins and feedback loops.', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}},"border":{"width":"1px","color":"var:preset|color|neutral-700","radius":"8px"}}} -->
            <div class="wp-block-column has-border-color" style="border-color:var(--wp--preset--color--neutral-700);border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)">
                <!-- wp:paragraph {"className":"is-style-heading","textColor":"primary-400","fontSize":"36"} -->
                <p class="is-style-heading has-primary-400-color has-text-color has-36-font-size">04</p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"level":3,"textColor":"white","fontSize":"24"} -->
                <h3 class="wp-block-heading has-white-color has-text-color has-24-font-size"><?php echo esc_html__( 'Launch & Grow', 'aegis' ); ?></h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"textColor":"neutral-400","fontSize":"15"} -->
                <p class="has-neutral-400-color has-text-color has-15-font-size"><?php echo esc_html__( 'We ensure a smooth launch and provide ongoing support to optimize performance and drive continuous improvement.', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained","contentSize":"600px"}} -->
    <div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
        <!-- wp:heading {"textAlign":"center","fontSize":"36"} -->
        <h2 class="wp-block-heading has-text-align-center has-36-font-size"><?php echo esc_html__( 'Let\'s Build Something Great Together', 'aegis' ); ?></h2>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center","textColor":"neutral-600"} -->
        <p class="aligncenter has-text-align-center has-neutral-600-color has-text-color aligncenter"><?php echo esc_html__( 'Ready to transform your digital presence? Contact us today for a free consultation and discover how we can help achieve your goals.', 'aegis' ); ?></p>
        <!-- /wp:paragraph -->

        <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
        <div class="wp-block-buttons"><!-- wp:button -->
            <div class="wp-block-button"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'Start a Project', 'aegis' ); ?></a></div>
            <!-- /wp:button -->

            <!-- wp:button {"className":"is-style-ghost"} -->
            <div class="wp-block-button is-style-ghost"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'View Pricing', 'aegis' ); ?></a></div>
            <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->