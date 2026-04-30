<?php
/**
 * Title: Talk Series
 * Slug: event-talk-series
 * Categories: event
 * Keywords: talk, lecture, series, upcoming, events, event
 * Description: An upcoming lecture series section with event cards showing dates and topics.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"backgroundColor":"neutral-950","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-neutral-950-background-color has-background" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
    <!-- wp:heading {"textAlign":"center","textColor":"white","fontSize":"32"} -->
    <h2 class="wp-block-heading has-text-align-center has-white-color has-text-color has-32-font-size"><?php echo esc_html__( 'Upcoming in This Series', 'aegis' ); ?></h2>
    <!-- /wp:heading -->

    <!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|lg"},"blockGap":{"left":"var:preset|spacing|md"}}}} -->
    <div class="wp-block-columns alignwide" style="margin-top:var(--wp--preset--spacing--lg)">
        <!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}},"border":{"width":"1px","color":"var:preset|color|neutral-200","radius":"8px"}}} -->
        <div class="wp-block-column has-border-color" style="border-color:var(--wp--preset--color--neutral-200);border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)">
            <!-- wp:paragraph {"className":"is-style-sub-heading","textColor":"primary-400","fontSize":"12"} -->
            <p class="is-style-sub-heading has-primary-400-color has-text-color has-12-font-size"><?php echo esc_html__( 'December 11, 2026', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"level":4,"textColor":"white","fontSize":"18"} -->
            <h4 class="wp-block-heading has-white-color has-text-color has-18-font-size"><?php echo esc_html__( 'The Empathy Algorithm', 'aegis' ); ?></h4>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"textColor":"neutral-500","fontSize":"14"} -->
            <p class="has-neutral-500-color has-text-color has-14-font-size"><?php echo esc_html__( 'Dr. Marcus Chen · Behavioral Economist', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}},"border":{"width":"1px","color":"var:preset|color|neutral-200","radius":"8px"}}} -->
        <div class="wp-block-column has-border-color" style="border-color:var(--wp--preset--color--neutral-200);border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)">
            <!-- wp:paragraph {"className":"is-style-sub-heading","textColor":"primary-400","fontSize":"12"} -->
            <p class="is-style-sub-heading has-primary-400-color has-text-color has-12-font-size"><?php echo esc_html__( 'January 22, 2027', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"level":4,"textColor":"white","fontSize":"18"} -->
            <h4 class="wp-block-heading has-white-color has-text-color has-18-font-size"><?php echo esc_html__( 'Maps of Meaning', 'aegis' ); ?></h4>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"textColor":"neutral-500","fontSize":"14"} -->
            <p class="has-neutral-500-color has-text-color has-14-font-size"><?php echo esc_html__( 'Prof. Anika Patel · Semiotician', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}},"border":{"width":"1px","color":"var:preset|color|neutral-200","radius":"8px"}}} -->
        <div class="wp-block-column has-border-color" style="border-color:var(--wp--preset--color--neutral-200);border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)">
            <!-- wp:paragraph {"className":"is-style-sub-heading","textColor":"primary-400","fontSize":"12"} -->
            <p class="is-style-sub-heading has-primary-400-color has-text-color has-12-font-size"><?php echo esc_html__( 'February 19, 2027', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"level":4,"textColor":"white","fontSize":"18"} -->
            <h4 class="wp-block-heading has-white-color has-text-color has-18-font-size"><?php echo esc_html__( 'The Silence Between Notes', 'aegis' ); ?></h4>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"textColor":"neutral-500","fontSize":"14"} -->
            <p class="has-neutral-500-color has-text-color has-14-font-size"><?php echo esc_html__( 'Yuki Sato · Composer & Neuroscientist', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->

    <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|lg"}}}} -->
    <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--lg)">
        <!-- wp:button {"className":"is-style-outline","fontSize":"14"} -->
        <div class="wp-block-button is-style-outline has-custom-font-size has-14-font-size"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'View Full Series', 'aegis' ); ?></a></div>
        <!-- /wp:button -->
    </div>
    <!-- /wp:buttons -->
</div>
<!-- /wp:group -->
