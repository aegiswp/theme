<?php
/**
 * Title: Cinema Hero
 * Slug: event-cinema-hero
 * Categories: event
 * Keywords: cinema, film, movie, screening, premiere, event, hero
 * Description: A dark cover hero section for a cinema screening or film premiere with poster, details, and CTA buttons.
 * Viewport Width: 1280
 */
?>

<!-- wp:cover {"dimRatio":90,"overlayColor":"neutral-950","isUserOverlayColor":true,"minHeight":100,"minHeightUnit":"vh","isDark":false,"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xxl","bottom":"var:preset|spacing|xxl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull is-light" style="padding-top:var(--wp--preset--spacing--xxl);padding-bottom:var(--wp--preset--spacing--xxl);min-height:100vh">
    <span aria-hidden="true" class="wp-block-cover__background has-neutral-950-background-color has-background-dim-90 has-background-dim"></span>
    <div class="wp-block-cover__inner-container">
        <!-- wp:group {"layout":{"type":"constrained","contentSize":"900px"}} -->
        <div class="wp-block-group">
            <!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|xl"}}}} -->
            <div class="wp-block-columns are-vertically-aligned-center">
                <!-- wp:column {"verticalAlignment":"center","width":"45%"} -->
                <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:45%">
                    <!-- wp:image {"aspectRatio":"2/3","scale":"cover","className":"is-style-default","style":{"border":{"radius":"8px"}}} -->
                    <figure class="wp-block-image is-style-default"><img style="border-radius:8px;aspect-ratio:2/3;object-fit:cover" alt="<?php echo esc_attr__( 'Film poster', 'aegis' ); ?>" /></figure>
                    <!-- /wp:image -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column {"verticalAlignment":"center","width":"55%"} -->
                <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:55%">
                    <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                    <div class="wp-block-group">
                        <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                        <div class="wp-block-group">
                            <!-- wp:paragraph {"className":"is-style-sub-heading","textColor":"primary-400","fontSize":"14"} -->
                            <p class="is-style-sub-heading has-primary-400-color has-text-color has-14-font-size"><?php echo esc_html__( 'World Premiere', 'aegis' ); ?></p>
                            <!-- /wp:paragraph -->

                            <!-- wp:paragraph {"textColor":"neutral-600","fontSize":"14"} -->
                            <p class="has-neutral-600-color has-text-color has-14-font-size"><?php echo esc_html__( '/ Drama / 2h 18min / R', 'aegis' ); ?></p>
                            <!-- /wp:paragraph -->
                        </div>
                        <!-- /wp:group -->

                        <!-- wp:heading {"level":1,"textColor":"white","fontSize":"52"} -->
                        <h1 class="wp-block-heading has-white-color has-text-color has-52-font-size"><?php echo esc_html__( 'The Last Meridian', 'aegis' ); ?></h1>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"textColor":"neutral-400","fontSize":"18"} -->
                        <p class="has-neutral-400-color has-text-color has-18-font-size"><?php echo esc_html__( 'A haunting exploration of memory and loss set against the vast landscapes of Patagonia. When a retired cartographer receives a letter from a woman he mapped the world for, he embarks on one final journey.', 'aegis' ); ?></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:paragraph {"className":"is-style-heading","textColor":"neutral-300","fontSize":"14"} -->
                        <p class="is-style-heading has-neutral-300-color has-text-color has-14-font-size"><?php echo esc_html__( 'Directed by Maren Solberg', 'aegis' ); ?></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:separator {"opacity":"css","className":"is-style-wide","style":{"color":{"background":"var:preset|color|neutral-200"}}} -->
                        <hr class="wp-block-separator has-css-opacity is-style-wide has-background" style="background-color:var(--wp--preset--color--neutral-200)" />
                        <!-- /wp:separator -->

                        <!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|md"}}}} -->
                        <div class="wp-block-columns">
                            <!-- wp:column -->
                            <div class="wp-block-column">
                                <!-- wp:paragraph {"className":"is-style-sub-heading","textColor":"neutral-500","fontSize":"12"} -->
                                <p class="is-style-sub-heading has-neutral-500-color has-text-color has-12-font-size"><?php echo esc_html__( 'Date', 'aegis' ); ?></p>
                                <!-- /wp:paragraph -->

                                <!-- wp:paragraph {"textColor":"white","fontSize":"16"} -->
                                <p class="has-white-color has-text-color has-16-font-size"><?php echo esc_html__( 'March 14, 2026', 'aegis' ); ?></p>
                                <!-- /wp:paragraph -->
                            </div>
                            <!-- /wp:column -->

                            <!-- wp:column -->
                            <div class="wp-block-column">
                                <!-- wp:paragraph {"className":"is-style-sub-heading","textColor":"neutral-500","fontSize":"12"} -->
                                <p class="is-style-sub-heading has-neutral-500-color has-text-color has-12-font-size"><?php echo esc_html__( 'Showtime', 'aegis' ); ?></p>
                                <!-- /wp:paragraph -->

                                <!-- wp:paragraph {"textColor":"white","fontSize":"16"} -->
                                <p class="has-white-color has-text-color has-16-font-size"><?php echo esc_html__( '7:30 PM & 10:00 PM', 'aegis' ); ?></p>
                                <!-- /wp:paragraph -->
                            </div>
                            <!-- /wp:column -->

                            <!-- wp:column -->
                            <div class="wp-block-column">
                                <!-- wp:paragraph {"className":"is-style-sub-heading","textColor":"neutral-500","fontSize":"12"} -->
                                <p class="is-style-sub-heading has-neutral-500-color has-text-color has-12-font-size"><?php echo esc_html__( 'Venue', 'aegis' ); ?></p>
                                <!-- /wp:paragraph -->

                                <!-- wp:paragraph {"textColor":"white","fontSize":"16"} -->
                                <p class="has-white-color has-text-color has-16-font-size"><?php echo esc_html__( 'Grand Lumiere Theater', 'aegis' ); ?></p>
                                <!-- /wp:paragraph -->
                            </div>
                            <!-- /wp:column -->
                        </div>
                        <!-- /wp:columns -->

                        <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|sm"}}}} -->
                        <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--sm)">
                            <!-- wp:button {"fontSize":"16"} -->
                            <div class="wp-block-button has-custom-font-size has-16-font-size"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'Reserve Tickets', 'aegis' ); ?></a></div>
                            <!-- /wp:button -->

                            <!-- wp:button {"className":"is-style-outline","fontSize":"16"} -->
                            <div class="wp-block-button is-style-outline has-custom-font-size has-16-font-size"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'Watch Trailer', 'aegis' ); ?></a></div>
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
    </div>
</div>
<!-- /wp:cover -->
