<?php
/**
 * Title: Talk Topics
 * Slug: event-talk-topics
 * Categories: event
 * Keywords: talk, topics, learn, takeaways, presentation, event
 * Description: A what you will learn section with topic cards for a talk or lecture.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"backgroundColor":"neutral-50","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-neutral-50-background-color has-background" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
    <!-- wp:heading {"textAlign":"center","fontSize":"32"} -->
    <h2 class="wp-block-heading has-text-align-center has-32-font-size"><?php echo esc_html__( 'What You\'ll Learn', 'aegis' ); ?></h2>
    <!-- /wp:heading -->

    <!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|lg"},"blockGap":{"left":"var:preset|spacing|md"}}}} -->
    <div class="wp-block-columns alignwide" style="margin-top:var(--wp--preset--spacing--lg)">
        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","orientation":"vertical"}} -->
            <div class="wp-block-group">
                <!-- wp:paragraph {"className":"is-style-heading","textColor":"primary-500","fontSize":"32"} -->
                <p class="is-style-heading has-primary-500-color has-text-color has-32-font-size"><?php echo esc_html__( '01', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"level":4,"fontSize":"18"} -->
                <h4 class="wp-block-heading has-18-font-size"><?php echo esc_html__( 'The Hidden Cost of Choice', 'aegis' ); ?></h4>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"textColor":"neutral-600","fontSize":"14"} -->
                <p class="has-neutral-600-color has-text-color has-14-font-size"><?php echo esc_html__( 'Why more options lead to worse outcomes, and how to design constraint-based systems that improve decision quality.', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","orientation":"vertical"}} -->
            <div class="wp-block-group">
                <!-- wp:paragraph {"className":"is-style-heading","textColor":"primary-500","fontSize":"32"} -->
                <p class="is-style-heading has-primary-500-color has-text-color has-32-font-size"><?php echo esc_html__( '02', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"level":4,"fontSize":"18"} -->
                <h4 class="wp-block-heading has-18-font-size"><?php echo esc_html__( 'Bias in Complex Systems', 'aegis' ); ?></h4>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"textColor":"neutral-600","fontSize":"14"} -->
                <p class="has-neutral-600-color has-text-color has-14-font-size"><?php echo esc_html__( 'How confirmation bias, anchoring, and availability heuristics compound in organizational decision-making.', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","orientation":"vertical"}} -->
            <div class="wp-block-group">
                <!-- wp:paragraph {"className":"is-style-heading","textColor":"primary-500","fontSize":"32"} -->
                <p class="is-style-heading has-primary-500-color has-text-color has-32-font-size"><?php echo esc_html__( '03', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"level":4,"fontSize":"18"} -->
                <h4 class="wp-block-heading has-18-font-size"><?php echo esc_html__( 'Designing Decision Frameworks', 'aegis' ); ?></h4>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"textColor":"neutral-600","fontSize":"14"} -->
                <p class="has-neutral-600-color has-text-color has-14-font-size"><?php echo esc_html__( 'Practical tools and mental models for building systems that help humans make better choices under pressure.', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->
