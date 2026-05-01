<?php
/**
 * Title: Conference Venue
 * Slug: event-conference-venue
 * Categories: event
 * Keywords: conference, venue, travel, location, hotel, event
 * Description: A venue and travel section with image and location details including hotel partners.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
    <!-- wp:heading {"textAlign":"center","fontSize":"32"} -->
    <h2 class="wp-block-heading has-text-align-center has-32-font-size"><?php echo esc_html__( 'Venue & Travel', 'aegis' ); ?></h2>
    <!-- /wp:heading -->

    <!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|lg"},"blockGap":{"left":"var:preset|spacing|xl"}}}} -->
    <div class="wp-block-columns alignwide" style="margin-top:var(--wp--preset--spacing--lg)">
        <!-- wp:column {"width":"50%"} -->
        <div class="wp-block-column" style="flex-basis:50%">
            <!-- wp:image {"aspectRatio":"16/9","scale":"cover","style":{"border":{"radius":"8px"}}} -->
            <figure class="wp-block-image"><img style="border-radius:8px;aspect-ratio:16/9;object-fit:cover" alt="<?php echo esc_attr__( 'Conference venue', 'aegis' ); ?>" /></figure>
            <!-- /wp:image -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">
            <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|md"}},"layout":{"type":"flex","orientation":"vertical"}} -->
            <div class="wp-block-group">
                <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                <div class="wp-block-group">
                    <!-- wp:heading {"level":4,"fontSize":"20"} -->
                    <h4 class="wp-block-heading has-20-font-size"><?php echo esc_html__( 'Centro de Convenciones Ágora', 'aegis' ); ?></h4>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"textColor":"neutral-600","fontSize":"15"} -->
                    <p class="has-neutral-600-color has-text-color has-15-font-size"><?php echo esc_html__( 'Calle 24 #5-60, Bogotá, Colombia. A state-of-the-art venue in the heart of the city, minutes from the historic La Candelaria district.', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                <div class="wp-block-group">
                    <!-- wp:heading {"level":4,"fontSize":"20"} -->
                    <h4 class="wp-block-heading has-20-font-size"><?php echo esc_html__( 'Hotel Partners', 'aegis' ); ?></h4>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"textColor":"neutral-600","fontSize":"15"} -->
                    <p class="has-neutral-600-color has-text-color has-15-font-size"><?php echo esc_html__( 'Discounted rates at partner hotels within walking distance. Use code CONSTRUCT26 when booking.', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:buttons -->
                <div class="wp-block-buttons">
                    <!-- wp:button {"className":"is-style-outline","fontSize":"14"} -->
                    <div class="wp-block-button is-style-outline has-custom-font-size has-14-font-size"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'View Hotels', 'aegis' ); ?></a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->
