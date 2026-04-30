<?php
/**
 * Title: Exhibition About
 * Slug: event-exhibition-about
 * Categories: event
 * Keywords: exhibition, art, about, curator, event
 * Description: An about section for an exhibition with curator statement and exhibition details.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"backgroundColor":"neutral-50","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-neutral-50-background-color has-background" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
    <!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|xl"}}}} -->
    <div class="wp-block-columns alignwide">
        <!-- wp:column {"width":"60%"} -->
        <div class="wp-block-column" style="flex-basis:60%">
            <!-- wp:heading {"fontSize":"32"} -->
            <h2 class="wp-block-heading has-32-font-size"><?php echo esc_html__( 'About the Exhibition', 'aegis' ); ?></h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"textColor":"neutral-600","fontSize":"16","style":{"spacing":{"margin":{"top":"var:preset|spacing|sm"}}}} -->
            <p class="has-neutral-600-color has-text-color has-16-font-size" style="margin-top:var(--wp--preset--spacing--sm)"><?php echo esc_html__( 'Echoes in Form challenges the traditional boundaries between visual and auditory art. Each installation in this collection responds to its environment — sculptures that hum with resonant frequencies, walls that breathe with projected light, and floors that shift beneath your feet.', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph {"textColor":"neutral-600","fontSize":"16"} -->
            <p class="has-neutral-600-color has-text-color has-16-font-size"><?php echo esc_html__( 'Curated by Dr. Helena Voss, the exhibition brings together 18 artists from 12 countries, each exploring how physical form can capture and release sound, memory, and emotion.', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"40%"} -->
        <div class="wp-block-column" style="flex-basis:40%">
            <!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"},"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","orientation":"vertical"}} -->
            <div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)">
                <!-- wp:group {"style":{"spacing":{"blockGap":"2px"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                <div class="wp-block-group">
                    <!-- wp:paragraph {"className":"is-style-sub-heading","textColor":"neutral-500","fontSize":"12"} -->
                    <p class="is-style-sub-heading has-neutral-500-color has-text-color has-12-font-size"><?php echo esc_html__( 'Curator', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"fontSize":"15"} -->
                    <p class="has-15-font-size"><?php echo esc_html__( 'Dr. Helena Voss', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:separator {"opacity":"css","className":"is-style-wide"} -->
                <hr class="wp-block-separator has-css-opacity is-style-wide" />
                <!-- /wp:separator -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"2px"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                <div class="wp-block-group">
                    <!-- wp:paragraph {"className":"is-style-sub-heading","textColor":"neutral-500","fontSize":"12"} -->
                    <p class="is-style-sub-heading has-neutral-500-color has-text-color has-12-font-size"><?php echo esc_html__( 'Artists', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"fontSize":"15"} -->
                    <p class="has-15-font-size"><?php echo esc_html__( '18 artists from 12 countries', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:separator {"opacity":"css","className":"is-style-wide"} -->
                <hr class="wp-block-separator has-css-opacity is-style-wide" />
                <!-- /wp:separator -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"2px"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                <div class="wp-block-group">
                    <!-- wp:paragraph {"className":"is-style-sub-heading","textColor":"neutral-500","fontSize":"12"} -->
                    <p class="is-style-sub-heading has-neutral-500-color has-text-color has-12-font-size"><?php echo esc_html__( 'Works', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"fontSize":"15"} -->
                    <p class="has-15-font-size"><?php echo esc_html__( '40+ installations across 3 floors', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->
