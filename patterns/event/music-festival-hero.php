<?php
/**
 * Title: Music Festival Hero
 * Slug: event-music-festival-hero
 * Categories: event
 * Keywords: music, festival, concert, live, event, hero
 * Description: A vibrant cover hero section for a music festival with date, description, and CTA buttons.
 * Viewport Width: 1280
 */
?>

<!-- wp:cover {"dimRatio":80,"overlayColor":"neutral-950","isUserOverlayColor":true,"minHeight":100,"minHeightUnit":"vh","isDark":false,"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xxl","bottom":"var:preset|spacing|xxl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull is-light" style="padding-top:var(--wp--preset--spacing--xxl);padding-bottom:var(--wp--preset--spacing--xxl);min-height:100vh">
    <span aria-hidden="true" class="wp-block-cover__background has-neutral-950-background-color has-background-dim-80 has-background-dim"></span>
    <div class="wp-block-cover__inner-container">
        <!-- wp:group {"layout":{"type":"constrained","contentSize":"720px"}} -->
        <div class="wp-block-group">
            <!-- wp:paragraph {"align":"center","className":"is-style-sub-heading","textColor":"primary-400","fontSize":"14"} -->
            <p class="aligncenter has-text-align-center is-style-sub-heading has-primary-400-color has-text-color has-14-font-size aligncenter"><?php echo esc_html__( 'August 15 — 17, 2026', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"textAlign":"center","level":1,"textColor":"white","fontSize":"64"} -->
            <h1 class="wp-block-heading has-text-align-center has-white-color has-text-color has-64-font-size"><?php echo esc_html__( 'Solstice', 'aegis' ); ?></h1>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"center","textColor":"neutral-400","fontSize":"20"} -->
            <p class="aligncenter has-text-align-center has-neutral-400-color has-text-color has-20-font-size aligncenter"><?php echo esc_html__( 'Three days of music, art, and community in the rolling hills of the Willamette Valley. Featuring 60+ artists across 4 stages.', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph {"align":"center","textColor":"neutral-500","fontSize":"14"} -->
            <p class="aligncenter has-text-align-center has-neutral-500-color has-text-color has-14-font-size aligncenter"><?php echo esc_html__( 'Willamette Valley, Oregon', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|md"}}}} -->
            <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--md)">
                <!-- wp:button {"fontSize":"16"} -->
                <div class="wp-block-button has-custom-font-size has-16-font-size"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'Get Passes', 'aegis' ); ?></a></div>
                <!-- /wp:button -->

                <!-- wp:button {"className":"is-style-outline","fontSize":"16"} -->
                <div class="wp-block-button is-style-outline has-custom-font-size has-16-font-size"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'See Lineup', 'aegis' ); ?></a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:group -->
    </div>
</div>
<!-- /wp:cover -->
