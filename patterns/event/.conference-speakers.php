<?php
/**
 * Title: Conference Speakers
 * Slug: event-conference-speakers
 * Categories: event
 * Keywords: conference, speakers, keynote, presenters, event
 * Description: A keynote speakers section with avatar cards showing name, role, and bio.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
    <!-- wp:heading {"textAlign":"center","fontSize":"36"} -->
    <h2 class="wp-block-heading has-text-align-center has-36-font-size"><?php echo esc_html__( 'Keynote Speakers', 'aegis' ); ?></h2>
    <!-- /wp:heading -->

    <!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|lg"},"blockGap":{"left":"var:preset|spacing|md"}}}} -->
    <div class="wp-block-columns alignwide" style="margin-top:var(--wp--preset--spacing--lg)">
        <!-- wp:column {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}}}} -->
        <div class="wp-block-column is-style-surface" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--md)">
            <!-- wp:image {"width":"100px","height":"100px","scale":"cover","style":{"border":{"radius":"100%"}}} -->
            <figure class="wp-block-image is-resized"><img style="border-radius:100%;object-fit:cover;width:100px;height:100px" alt="" /></figure>
            <!-- /wp:image -->

            <!-- wp:heading {"level":4,"fontSize":"20"} -->
            <h4 class="wp-block-heading has-20-font-size"><?php echo esc_html__( 'Dr. Amara Osei', 'aegis' ); ?></h4>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"textColor":"primary-500","fontSize":"14"} -->
            <p class="has-primary-500-color has-text-color has-14-font-size"><?php echo esc_html__( 'VP of Engineering, Quantum Labs', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph {"textColor":"neutral-600","fontSize":"14","style":{"spacing":{"margin":{"top":"var:preset|spacing|xs"}}}} -->
            <p class="has-neutral-600-color has-text-color has-14-font-size" style="margin-top:var(--wp--preset--spacing--xs)"><?php echo esc_html__( 'Leading the charge on distributed systems at planetary scale. Former architect at NASA JPL.', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}}}} -->
        <div class="wp-block-column is-style-surface" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--md)">
            <!-- wp:image {"width":"100px","height":"100px","scale":"cover","style":{"border":{"radius":"100%"}}} -->
            <figure class="wp-block-image is-resized"><img style="border-radius:100%;object-fit:cover;width:100px;height:100px" alt="" /></figure>
            <!-- /wp:image -->

            <!-- wp:heading {"level":4,"fontSize":"20"} -->
            <h4 class="wp-block-heading has-20-font-size"><?php echo esc_html__( 'Kai Nakamura', 'aegis' ); ?></h4>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"textColor":"primary-500","fontSize":"14"} -->
            <p class="has-primary-500-color has-text-color has-14-font-size"><?php echo esc_html__( 'CTO, Meridian Systems', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph {"textColor":"neutral-600","fontSize":"14","style":{"spacing":{"margin":{"top":"var:preset|spacing|xs"}}}} -->
            <p class="has-neutral-600-color has-text-color has-14-font-size" style="margin-top:var(--wp--preset--spacing--xs)"><?php echo esc_html__( 'Pioneering edge computing frameworks that power real-time applications for 200M+ users worldwide.', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}}}} -->
        <div class="wp-block-column is-style-surface" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--md)">
            <!-- wp:image {"width":"100px","height":"100px","scale":"cover","style":{"border":{"radius":"100%"}}} -->
            <figure class="wp-block-image is-resized"><img style="border-radius:100%;object-fit:cover;width:100px;height:100px" alt="" /></figure>
            <!-- /wp:image -->

            <!-- wp:heading {"level":4,"fontSize":"20"} -->
            <h4 class="wp-block-heading has-20-font-size"><?php echo esc_html__( 'Sofia Restrepo', 'aegis' ); ?></h4>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"textColor":"primary-500","fontSize":"14"} -->
            <p class="has-primary-500-color has-text-color has-14-font-size"><?php echo esc_html__( 'Founder, Open Source Collective', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph {"textColor":"neutral-600","fontSize":"14","style":{"spacing":{"margin":{"top":"var:preset|spacing|xs"}}}} -->
            <p class="has-neutral-600-color has-text-color has-14-font-size" style="margin-top:var(--wp--preset--spacing--xs)"><?php echo esc_html__( 'Building sustainable open-source ecosystems. Her projects have been adopted by Fortune 500 companies globally.', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->
