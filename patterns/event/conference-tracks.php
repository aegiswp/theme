<?php
/**
 * Title: Conference Tracks
 * Slug: event-conference-tracks
 * Categories: event
 * Keywords: conference, tracks, topics, sessions, event
 * Description: A conference tracks section with bordered cards showing track names and descriptions.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"backgroundColor":"neutral-50","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-neutral-50-background-color has-background" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
    <!-- wp:heading {"textAlign":"center","fontSize":"32"} -->
    <h2 class="wp-block-heading has-text-align-center has-32-font-size"><?php echo esc_html__( 'Conference Tracks', 'aegis' ); ?></h2>
    <!-- /wp:heading -->

    <!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|lg"},"blockGap":{"top":"var:preset|spacing|md","left":"var:preset|spacing|md"}}}} -->
    <div class="wp-block-columns alignwide" style="margin-top:var(--wp--preset--spacing--lg)">
        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"},"blockGap":"var:preset|spacing|xs"},"border":{"left":{"color":"var:preset|color|primary-500","width":"3px"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
            <div class="wp-block-group" style="border-left-color:var(--wp--preset--color--primary-500);border-left-width:3px;padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)">
                <!-- wp:heading {"level":4,"fontSize":"18"} -->
                <h4 class="wp-block-heading has-18-font-size"><?php echo esc_html__( 'Systems Architecture', 'aegis' ); ?></h4>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"textColor":"neutral-600","fontSize":"14"} -->
                <p class="has-neutral-600-color has-text-color has-14-font-size"><?php echo esc_html__( 'Distributed systems, microservices, and infrastructure patterns for the modern stack.', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"},"blockGap":"var:preset|spacing|xs"},"border":{"left":{"color":"var:preset|color|primary-500","width":"3px"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
            <div class="wp-block-group" style="border-left-color:var(--wp--preset--color--primary-500);border-left-width:3px;padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)">
                <!-- wp:heading {"level":4,"fontSize":"18"} -->
                <h4 class="wp-block-heading has-18-font-size"><?php echo esc_html__( 'AI & Machine Learning', 'aegis' ); ?></h4>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"textColor":"neutral-600","fontSize":"14"} -->
                <p class="has-neutral-600-color has-text-color has-14-font-size"><?php echo esc_html__( 'From LLMs to production ML pipelines — practical approaches to intelligent systems.', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"},"blockGap":"var:preset|spacing|xs"},"border":{"left":{"color":"var:preset|color|primary-500","width":"3px"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
            <div class="wp-block-group" style="border-left-color:var(--wp--preset--color--primary-500);border-left-width:3px;padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)">
                <!-- wp:heading {"level":4,"fontSize":"18"} -->
                <h4 class="wp-block-heading has-18-font-size"><?php echo esc_html__( 'Developer Experience', 'aegis' ); ?></h4>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"textColor":"neutral-600","fontSize":"14"} -->
                <p class="has-neutral-600-color has-text-color has-14-font-size"><?php echo esc_html__( 'Tooling, workflows, and culture that make engineering teams thrive at any scale.', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->

    <!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|md"},"blockGap":{"top":"var:preset|spacing|md","left":"var:preset|spacing|md"}}}} -->
    <div class="wp-block-columns alignwide" style="margin-top:var(--wp--preset--spacing--md)">
        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"},"blockGap":"var:preset|spacing|xs"},"border":{"left":{"color":"var:preset|color|neutral-300","width":"3px"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
            <div class="wp-block-group" style="border-left-color:var(--wp--preset--color--neutral-300);border-left-width:3px;padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)">
                <!-- wp:heading {"level":4,"fontSize":"18"} -->
                <h4 class="wp-block-heading has-18-font-size"><?php echo esc_html__( 'Security & Privacy', 'aegis' ); ?></h4>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"textColor":"neutral-600","fontSize":"14"} -->
                <p class="has-neutral-600-color has-text-color has-14-font-size"><?php echo esc_html__( 'Zero-trust architectures, supply chain security, and privacy-first engineering.', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"},"blockGap":"var:preset|spacing|xs"},"border":{"left":{"color":"var:preset|color|neutral-300","width":"3px"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
            <div class="wp-block-group" style="border-left-color:var(--wp--preset--color--neutral-300);border-left-width:3px;padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)">
                <!-- wp:heading {"level":4,"fontSize":"18"} -->
                <h4 class="wp-block-heading has-18-font-size"><?php echo esc_html__( 'Platform Engineering', 'aegis' ); ?></h4>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"textColor":"neutral-600","fontSize":"14"} -->
                <p class="has-neutral-600-color has-text-color has-14-font-size"><?php echo esc_html__( 'Internal developer platforms, Kubernetes, and the future of cloud-native infrastructure.', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"},"blockGap":"var:preset|spacing|xs"},"border":{"left":{"color":"var:preset|color|neutral-300","width":"3px"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
            <div class="wp-block-group" style="border-left-color:var(--wp--preset--color--neutral-300);border-left-width:3px;padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)">
                <!-- wp:heading {"level":4,"fontSize":"18"} -->
                <h4 class="wp-block-heading has-18-font-size"><?php echo esc_html__( 'Open Source', 'aegis' ); ?></h4>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"textColor":"neutral-600","fontSize":"14"} -->
                <p class="has-neutral-600-color has-text-color has-14-font-size"><?php echo esc_html__( 'Sustainability, governance, and community building in the open-source ecosystem.', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->
