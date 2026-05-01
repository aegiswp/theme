<?php
/**
 * Title: Exhibition Event
 * Slug: event-exhibition
 * Categories: page, events
 * Keywords: exhibition, gallery, art, museum, visual, event
 * Description: A minimal and elegant full page layout for an art exhibition or gallery event.
 * Viewport Width: 1280
 * Block Types: core/post-content
 */
?>

<!-- wp:group {"metadata":{"categories":["page"],"patternName":"page-event-exhibition","name":"Exhibition Event"},"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull"><!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xxl","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained","contentSize":"900px"}} -->
    <div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--xxl);padding-bottom:var(--wp--preset--spacing--xl)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
        <div class="wp-block-group"><!-- wp:paragraph {"align":"center","className":"is-style-sub-heading","fontSize":"14"} -->
            <p class="aligncenter has-text-align-center is-style-sub-heading has-14-font-size aligncenter"><?php echo esc_html__( 'April 3 — June 15, 2026', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"textAlign":"center","level":1,"fontSize":"60"} -->
            <h1 class="wp-block-heading has-text-align-center has-60-font-size"><?php echo esc_html__( 'Between Light and Shadow', 'aegis' ); ?></h1>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"center","textColor":"neutral-500","fontSize":"18"} -->
            <p class="aligncenter has-text-align-center has-neutral-500-color has-text-color has-18-font-size aligncenter"><?php echo esc_html__( 'A retrospective of contemporary photography exploring the liminal spaces between presence and absence, curated by Valentina Ruiz.', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:separator {"opacity":"css","className":"is-style-wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md"}},"border":{"width":"1px"}}} -->
            <hr class="wp-block-separator has-css-opacity is-style-wide" style="border-width:1px;margin-top:var(--wp--preset--spacing--md);margin-bottom:var(--wp--preset--spacing--md)" />
            <!-- /wp:separator -->

            <!-- wp:group {"layout":{"type":"flex","justifyContent":"center"}} -->
            <div class="wp-block-group"><!-- wp:paragraph {"fontSize":"15"} -->
                <p class="has-15-font-size"><?php echo esc_html__( 'Museo de Arte Moderno', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"fontSize":"15"} -->
                <p class="has-15-font-size">|</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"fontSize":"15"} -->
                <p class="has-15-font-size"><?php echo esc_html__( 'Bogotá, Colombia', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"fontSize":"15"} -->
                <p class="has-15-font-size">|</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"fontSize":"15"} -->
                <p class="has-15-font-size"><?php echo esc_html__( 'Free Admission', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignfull" style="padding-bottom:var(--wp--preset--spacing--xl)"><!-- wp:gallery {"columns":3,"linkTo":"none","align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|xs","top":"var:preset|spacing|xs"}}}} -->
        <figure class="wp-block-gallery alignwide has-nested-images columns-3 is-cropped"><!-- wp:image {"aspectRatio":"3/4","scale":"cover"} -->
            <figure class="wp-block-image"><img alt="" style="aspect-ratio:3/4;object-fit:cover" /></figure>
            <!-- /wp:image -->

            <!-- wp:image {"aspectRatio":"3/4","scale":"cover"} -->
            <figure class="wp-block-image"><img alt="" style="aspect-ratio:3/4;object-fit:cover" /></figure>
            <!-- /wp:image -->

            <!-- wp:image {"aspectRatio":"3/4","scale":"cover"} -->
            <figure class="wp-block-image"><img alt="" style="aspect-ratio:3/4;object-fit:cover" /></figure>
            <!-- /wp:image -->
        </figure>
        <!-- /wp:gallery -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"align":"full","className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignfull is-style-surface" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)"><!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|xl"}}}} -->
        <div class="wp-block-columns alignwide"><!-- wp:column {"width":"40%"} -->
            <div class="wp-block-column" style="flex-basis:40%"><!-- wp:heading {"fontSize":"32"} -->
                <h2 class="wp-block-heading has-32-font-size"><?php echo esc_html__( 'About the Exhibition', 'aegis' ); ?></h2>
                <!-- /wp:heading -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"width":"60%"} -->
            <div class="wp-block-column" style="flex-basis:60%"><!-- wp:paragraph {"fontSize":"18"} -->
                <p class="has-18-font-size"><?php echo esc_html__( 'Between Light and Shadow brings together 47 works from 12 photographers across Latin America, spanning three decades of artistic exploration. The exhibition traces the evolution of photographic language from analog darkroom techniques to contemporary digital processes.', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|sm"}}},"fontSize":"16"} -->
                <p class="has-16-font-size" style="margin-top:var(--wp--preset--spacing--sm)"><?php echo esc_html__( 'Each room in the gallery represents a different threshold — doorways, windows, horizons, reflections — inviting visitors to consider what lies just beyond the frame. The works challenge our perception of documentation versus creation, asking whether the camera captures reality or constructs it.', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)"><!-- wp:heading {"textAlign":"center","fontSize":"32"} -->
        <h2 class="wp-block-heading has-text-align-center has-32-font-size"><?php echo esc_html__( 'Featured Artists', 'aegis' ); ?></h2>
        <!-- /wp:heading -->

        <!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|lg"},"blockGap":{"left":"var:preset|spacing|lg"}}}} -->
        <div class="wp-block-columns alignwide" style="margin-top:var(--wp--preset--spacing--lg)"><!-- wp:column -->
            <div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                <div class="wp-block-group"><!-- wp:image {"aspectRatio":"1","scale":"cover","style":{"border":{"radius":"4px"}}} -->
                    <figure class="wp-block-image has-custom-border" style="border-radius:4px"><img alt="" style="border-radius:4px;aspect-ratio:1;object-fit:cover" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:heading {"level":4,"fontSize":"18"} -->
                    <h4 class="wp-block-heading has-18-font-size"><?php echo esc_html__( 'Camila Echeverri', 'aegis' ); ?></h4>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0"}}},"textColor":"neutral-500","fontSize":"14"} -->
                    <p class="has-neutral-500-color has-text-color has-14-font-size" style="margin-top:0"><?php echo esc_html__( 'Medellín, Colombia — Large-format landscapes that dissolve the boundary between earth and atmosphere.', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                <div class="wp-block-group"><!-- wp:image {"aspectRatio":"1","scale":"cover","style":{"border":{"radius":"4px"}}} -->
                    <figure class="wp-block-image has-custom-border" style="border-radius:4px"><img alt="" style="border-radius:4px;aspect-ratio:1;object-fit:cover" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:heading {"level":4,"fontSize":"18"} -->
                    <h4 class="wp-block-heading has-18-font-size"><?php echo esc_html__( 'Rodrigo Fuentes', 'aegis' ); ?></h4>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0"}}},"textColor":"neutral-500","fontSize":"14"} -->
                    <p class="has-neutral-500-color has-text-color has-14-font-size" style="margin-top:0"><?php echo esc_html__( 'Mexico City, Mexico — Intimate portraits captured in the transitional moments of daily urban life.', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                <div class="wp-block-group"><!-- wp:image {"aspectRatio":"1","scale":"cover","style":{"border":{"radius":"4px"}}} -->
                    <figure class="wp-block-image has-custom-border" style="border-radius:4px"><img alt="" style="border-radius:4px;aspect-ratio:1;object-fit:cover" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:heading {"level":4,"fontSize":"18"} -->
                    <h4 class="wp-block-heading has-18-font-size"><?php echo esc_html__( 'Lucía Paredes', 'aegis' ); ?></h4>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0"}}},"textColor":"neutral-500","fontSize":"14"} -->
                    <p class="has-neutral-500-color has-text-color has-14-font-size" style="margin-top:0"><?php echo esc_html__( 'Buenos Aires, Argentina — Experimental darkroom processes that transform architectural spaces into abstract compositions.', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                <div class="wp-block-group"><!-- wp:image {"aspectRatio":"1","scale":"cover","style":{"border":{"radius":"4px"}}} -->
                    <figure class="wp-block-image has-custom-border" style="border-radius:4px"><img alt="" style="border-radius:4px;aspect-ratio:1;object-fit:cover" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:heading {"level":4,"fontSize":"18"} -->
                    <h4 class="wp-block-heading has-18-font-size"><?php echo esc_html__( 'Mateo Ríos', 'aegis' ); ?></h4>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0"}}},"textColor":"neutral-500","fontSize":"14"} -->
                    <p class="has-neutral-500-color has-text-color has-14-font-size" style="margin-top:0"><?php echo esc_html__( 'Lima, Peru — Cyanotype and platinum prints exploring memory and displacement in coastal communities.', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"align":"full","className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignfull is-style-surface" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)"><!-- wp:heading {"textAlign":"center","fontSize":"32"} -->
        <h2 class="wp-block-heading has-text-align-center has-32-font-size"><?php echo esc_html__( 'Guided Tours & Events', 'aegis' ); ?></h2>
        <!-- /wp:heading -->

        <!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|lg"},"blockGap":{"left":"var:preset|spacing|md"}}}} -->
        <div class="wp-block-columns alignwide" style="margin-top:var(--wp--preset--spacing--lg)"><!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}},"border":{"color":"var:preset|color|neutral-200","width":"1px","radius":"8px"}}} -->
            <div class="wp-block-column has-border-color" style="border-color:var(--wp--preset--color--neutral-200);border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)"><!-- wp:paragraph {"className":"is-style-sub-heading","textColor":"primary-400","fontSize":"12"} -->
                <p class="is-style-sub-heading has-primary-400-color has-text-color has-12-font-size"><?php echo esc_html__( 'Every Saturday', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"level":4,"fontSize":"20"} -->
                <h4 class="wp-block-heading has-20-font-size"><?php echo esc_html__( 'Curator\u2019s Tour', 'aegis' ); ?></h4>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"textColor":"neutral-400","fontSize":"14"} -->
                <p class="has-neutral-400-color has-text-color has-14-font-size"><?php echo esc_html__( '11:00 AM — 90 minutes with curator Valentina Ruiz. Limited to 15 guests. Reservation required.', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}},"border":{"color":"var:preset|color|neutral-200","width":"1px","radius":"8px"}}} -->
            <div class="wp-block-column has-border-color" style="border-color:var(--wp--preset--color--neutral-200);border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)"><!-- wp:paragraph {"className":"is-style-sub-heading","textColor":"primary-400","fontSize":"12"} -->
                <p class="is-style-sub-heading has-primary-400-color has-text-color has-12-font-size"><?php echo esc_html__( 'May 10, 2026', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"level":4,"fontSize":"20"} -->
                <h4 class="wp-block-heading has-20-font-size"><?php echo esc_html__( 'Artist Talk: Camila Echeverri', 'aegis' ); ?></h4>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"textColor":"neutral-400","fontSize":"14"} -->
                <p class="has-neutral-400-color has-text-color has-14-font-size"><?php echo esc_html__( '6:00 PM — An evening conversation about landscape, memory, and the act of seeing. Open to all.', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}},"border":{"radius":"8px","width":"1px"}},"borderColor":"primary-25"} -->
            <div class="wp-block-column has-border-color has-primary-25-border-color" style="border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)"><!-- wp:paragraph {"className":"is-style-sub-heading","textColor":"primary-400","fontSize":"12"} -->
                <p class="is-style-sub-heading has-primary-400-color has-text-color has-12-font-size"><?php echo esc_html__( 'June 1, 2026', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"level":4,"fontSize":"20"} -->
                <h4 class="wp-block-heading has-20-font-size"><?php echo esc_html__( 'Darkroom Workshop', 'aegis' ); ?></h4>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"textColor":"neutral-400","fontSize":"14"} -->
                <p class="has-neutral-400-color has-text-color has-14-font-size"><?php echo esc_html__( '2:00 PM — Hands-on analog printing workshop with Lucía Paredes. Materials provided. 10 spots available.', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->