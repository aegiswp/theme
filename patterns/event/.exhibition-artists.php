<?php
/**
 * Title: Exhibition Artists
 * Slug: event-exhibition-artists
 * Categories: event
 * Keywords: exhibition, artists, featured, profiles, event
 * Description: A featured artists section with cards showing artist name, medium, and description.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
    <!-- wp:heading {"textAlign":"center","fontSize":"32"} -->
    <h2 class="wp-block-heading has-text-align-center has-32-font-size"><?php echo esc_html__( 'Featured Artists', 'aegis' ); ?></h2>
    <!-- /wp:heading -->

    <!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|lg"},"blockGap":{"left":"var:preset|spacing|md"}}}} -->
    <div class="wp-block-columns alignwide" style="margin-top:var(--wp--preset--spacing--lg)">
        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:image {"aspectRatio":"1","scale":"cover","style":{"border":{"radius":"8px"}}} -->
            <figure class="wp-block-image"><img style="border-radius:8px;aspect-ratio:1;object-fit:cover" alt="" /></figure>
            <!-- /wp:image -->

            <!-- wp:heading {"level":4,"fontSize":"18","style":{"spacing":{"margin":{"top":"var:preset|spacing|sm"}}}} -->
            <h4 class="wp-block-heading has-18-font-size" style="margin-top:var(--wp--preset--spacing--sm)"><?php echo esc_html__( 'Yuki Tanaka', 'aegis' ); ?></h4>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"textColor":"primary-500","fontSize":"13"} -->
            <p class="has-primary-500-color has-text-color has-13-font-size"><?php echo esc_html__( 'Kinetic Sculpture · Tokyo', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph {"textColor":"neutral-600","fontSize":"14"} -->
            <p class="has-neutral-600-color has-text-color has-14-font-size"><?php echo esc_html__( 'Creates mechanical sculptures that respond to ambient sound, translating audio frequencies into physical movement.', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:image {"aspectRatio":"1","scale":"cover","style":{"border":{"radius":"8px"}}} -->
            <figure class="wp-block-image"><img style="border-radius:8px;aspect-ratio:1;object-fit:cover" alt="" /></figure>
            <!-- /wp:image -->

            <!-- wp:heading {"level":4,"fontSize":"18","style":{"spacing":{"margin":{"top":"var:preset|spacing|sm"}}}} -->
            <h4 class="wp-block-heading has-18-font-size" style="margin-top:var(--wp--preset--spacing--sm)"><?php echo esc_html__( 'Amira Bey', 'aegis' ); ?></h4>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"textColor":"primary-500","fontSize":"13"} -->
            <p class="has-primary-500-color has-text-color has-13-font-size"><?php echo esc_html__( 'Sound Installation · Tunis', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph {"textColor":"neutral-600","fontSize":"14"} -->
            <p class="has-neutral-600-color has-text-color has-14-font-size"><?php echo esc_html__( 'Explores the architecture of silence through immersive sound environments that challenge spatial perception.', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:image {"aspectRatio":"1","scale":"cover","style":{"border":{"radius":"8px"}}} -->
            <figure class="wp-block-image"><img style="border-radius:8px;aspect-ratio:1;object-fit:cover" alt="" /></figure>
            <!-- /wp:image -->

            <!-- wp:heading {"level":4,"fontSize":"18","style":{"spacing":{"margin":{"top":"var:preset|spacing|sm"}}}} -->
            <h4 class="wp-block-heading has-18-font-size" style="margin-top:var(--wp--preset--spacing--sm)"><?php echo esc_html__( 'Carlos Mena', 'aegis' ); ?></h4>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"textColor":"primary-500","fontSize":"13"} -->
            <p class="has-primary-500-color has-text-color has-13-font-size"><?php echo esc_html__( 'Mixed Media · Mexico City', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph {"textColor":"neutral-600","fontSize":"14"} -->
            <p class="has-neutral-600-color has-text-color has-14-font-size"><?php echo esc_html__( 'Combines geological samples with digital projection to create landscapes that exist between the real and imagined.', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->
