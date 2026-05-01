<?php
/**
 * Title: Cinema Event
 * Slug: event-cinema
 * Categories: page, events
 * Keywords: cinema, film, movie, screening, premiere, event
 * Description: A full page layout for a cinema screening or film premiere event.
 * Viewport Width: 1280
 * Block Types: core/post-content
 */
?>

<!-- wp:group {"metadata":{"categories":["page","events"],"patternName":"event-cinema"},"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull">

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

    <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"backgroundColor":"neutral-950","layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignfull has-neutral-950-background-color has-background" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
        <!-- wp:heading {"textAlign":"center","textColor":"white","fontSize":"32"} -->
        <h2 class="wp-block-heading has-text-align-center has-white-color has-text-color has-32-font-size"><?php echo esc_html__( 'Cast & Crew', 'aegis' ); ?></h2>
        <!-- /wp:heading -->

        <!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|lg"},"blockGap":{"left":"var:preset|spacing|md"}}}} -->
        <div class="wp-block-columns alignwide" style="margin-top:var(--wp--preset--spacing--lg)">
            <!-- wp:column -->
            <div class="wp-block-column">
                <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
                <div class="wp-block-group">
                    <!-- wp:image {"width":"140px","height":"140px","scale":"cover","style":{"border":{"radius":"100%"}}} -->
                    <figure class="wp-block-image is-resized"><img style="border-radius:100%;object-fit:cover;width:140px;height:140px" alt="" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:paragraph {"align":"center","className":"is-style-heading","textColor":"white","fontSize":"16"} -->
                    <p class="aligncenter has-text-align-center is-style-heading has-white-color has-text-color has-16-font-size aligncenter"><?php echo esc_html__( 'Elias Varga', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"align":"center","textColor":"neutral-500","fontSize":"14"} -->
                    <p class="aligncenter has-text-align-center has-neutral-500-color has-text-color has-14-font-size aligncenter"><?php echo esc_html__( 'The Cartographer', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column">
                <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
                <div class="wp-block-group">
                    <!-- wp:image {"width":"140px","height":"140px","scale":"cover","style":{"border":{"radius":"100%"}}} -->
                    <figure class="wp-block-image is-resized"><img style="border-radius:100%;object-fit:cover;width:140px;height:140px" alt="" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:paragraph {"align":"center","className":"is-style-heading","textColor":"white","fontSize":"16"} -->
                    <p class="aligncenter has-text-align-center is-style-heading has-white-color has-text-color has-16-font-size aligncenter"><?php echo esc_html__( 'Lena Ostrova', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"align":"center","textColor":"neutral-500","fontSize":"14"} -->
                    <p class="aligncenter has-text-align-center has-neutral-500-color has-text-color has-14-font-size aligncenter"><?php echo esc_html__( 'Isabelle', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column">
                <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
                <div class="wp-block-group">
                    <!-- wp:image {"width":"140px","height":"140px","scale":"cover","style":{"border":{"radius":"100%"}}} -->
                    <figure class="wp-block-image is-resized"><img style="border-radius:100%;object-fit:cover;width:140px;height:140px" alt="" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:paragraph {"align":"center","className":"is-style-heading","textColor":"white","fontSize":"16"} -->
                    <p class="aligncenter has-text-align-center is-style-heading has-white-color has-text-color has-16-font-size aligncenter"><?php echo esc_html__( 'Tomás Herrera', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"align":"center","textColor":"neutral-500","fontSize":"14"} -->
                    <p class="aligncenter has-text-align-center has-neutral-500-color has-text-color has-14-font-size aligncenter"><?php echo esc_html__( 'The Guide', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column">
                <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
                <div class="wp-block-group">
                    <!-- wp:image {"width":"140px","height":"140px","scale":"cover","style":{"border":{"radius":"100%"}}} -->
                    <figure class="wp-block-image is-resized"><img style="border-radius:100%;object-fit:cover;width:140px;height:140px" alt="" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:paragraph {"align":"center","className":"is-style-heading","textColor":"white","fontSize":"16"} -->
                    <p class="aligncenter has-text-align-center is-style-heading has-white-color has-text-color has-16-font-size aligncenter"><?php echo esc_html__( 'Maren Solberg', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"align":"center","textColor":"neutral-500","fontSize":"14"} -->
                    <p class="aligncenter has-text-align-center has-neutral-500-color has-text-color has-14-font-size aligncenter"><?php echo esc_html__( 'Director', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
        <!-- wp:group {"layout":{"type":"constrained","contentSize":"720px"}} -->
        <div class="wp-block-group">
            <!-- wp:heading {"textAlign":"center","fontSize":"32"} -->
            <h2 class="wp-block-heading has-text-align-center has-32-font-size"><?php echo esc_html__( 'About the Film', 'aegis' ); ?></h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"center","textColor":"neutral-600","fontSize":"18","style":{"spacing":{"margin":{"top":"var:preset|spacing|md"}}}} -->
            <p class="aligncenter has-text-align-center has-neutral-600-color has-text-color has-18-font-size aligncenter" style="margin-top:var(--wp--preset--spacing--md)"><?php echo esc_html__( 'Winner of the Golden Bear at the 76th Berlin International Film Festival, The Last Meridian is a meditative masterpiece that redefines the boundaries of cinematic storytelling. Shot entirely on 35mm film across the windswept plains of southern Argentina.', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:columns {"style":{"spacing":{"margin":{"top":"var:preset|spacing|lg"},"blockGap":{"left":"var:preset|spacing|lg"}}}} -->
            <div class="wp-block-columns" style="margin-top:var(--wp--preset--spacing--lg)">
                <!-- wp:column -->
                <div class="wp-block-column">
                    <!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"},"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
                    <div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)">
                        <!-- wp:paragraph {"align":"center","className":"is-style-heading","fontSize":"36"} -->
                        <p class="aligncenter has-text-align-center is-style-heading has-36-font-size aligncenter"><?php echo esc_html__( '4.8', 'aegis' ); ?></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:paragraph {"align":"center","textColor":"neutral-500","fontSize":"14"} -->
                        <p class="aligncenter has-text-align-center has-neutral-500-color has-text-color has-14-font-size aligncenter"><?php echo esc_html__( 'Critics Rating', 'aegis' ); ?></p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column -->
                <div class="wp-block-column">
                    <!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"},"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
                    <div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)">
                        <!-- wp:paragraph {"align":"center","className":"is-style-heading","fontSize":"36"} -->
                        <p class="aligncenter has-text-align-center is-style-heading has-36-font-size aligncenter"><?php echo esc_html__( '12', 'aegis' ); ?></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:paragraph {"align":"center","textColor":"neutral-500","fontSize":"14"} -->
                        <p class="aligncenter has-text-align-center has-neutral-500-color has-text-color has-14-font-size aligncenter"><?php echo esc_html__( 'Festival Awards', 'aegis' ); ?></p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column -->
                <div class="wp-block-column">
                    <!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"},"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
                    <div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)">
                        <!-- wp:paragraph {"align":"center","className":"is-style-heading","fontSize":"36"} -->
                        <p class="aligncenter has-text-align-center is-style-heading has-36-font-size aligncenter"><?php echo esc_html__( '35mm', 'aegis' ); ?></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:paragraph {"align":"center","textColor":"neutral-500","fontSize":"14"} -->
                        <p class="aligncenter has-text-align-center has-neutral-500-color has-text-color has-14-font-size aligncenter"><?php echo esc_html__( 'Shot on Film', 'aegis' ); ?></p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:column -->
            </div>
            <!-- /wp:columns -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"backgroundColor":"neutral-950","layout":{"type":"constrained","contentSize":"600px"}} -->
    <div class="wp-block-group alignfull has-neutral-950-background-color has-background" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
        <!-- wp:heading {"textAlign":"center","textColor":"white","fontSize":"36"} -->
        <h2 class="wp-block-heading has-text-align-center has-white-color has-text-color has-36-font-size"><?php echo esc_html__( 'Don\'t Miss the Premiere', 'aegis' ); ?></h2>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center","textColor":"neutral-400","fontSize":"16"} -->
        <p class="aligncenter has-text-align-center has-neutral-400-color has-text-color has-16-font-size aligncenter"><?php echo esc_html__( 'Limited seating available. Includes a post-screening Q&A with director Maren Solberg and lead actor Elias Varga.', 'aegis' ); ?></p>
        <!-- /wp:paragraph -->

        <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|md"}}}} -->
        <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--md)">
            <!-- wp:button {"width":75,"fontSize":"18"} -->
            <div class="wp-block-button has-custom-width wp-block-button__width-75 has-custom-font-size has-18-font-size"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'Get Your Tickets Now', 'aegis' ); ?></a></div>
            <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->
    </div>
    <!-- /wp:group -->

</div>
<!-- /wp:group -->
