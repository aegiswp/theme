<?php
/**
 * Title: Talk Hero
 * Slug: event-talk-hero
 * Categories: event
 * Keywords: talk, lecture, speaker, presentation, event, hero
 * Description: A dark hero section for a talk or lecture with speaker details and CTA buttons.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xxl","bottom":"var:preset|spacing|xxl"}}},"backgroundColor":"neutral-950","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-neutral-950-background-color has-background" style="padding-top:var(--wp--preset--spacing--xxl);padding-bottom:var(--wp--preset--spacing--xxl)">
    <!-- wp:group {"layout":{"type":"constrained","contentSize":"720px"}} -->
    <div class="wp-block-group">
        <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","justifyContent":"center"}} -->
        <div class="wp-block-group">
            <!-- wp:paragraph {"className":"is-style-sub-heading","textColor":"primary-400","fontSize":"14"} -->
            <p class="is-style-sub-heading has-primary-400-color has-text-color has-14-font-size"><?php echo esc_html__( 'Public Lecture', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph {"textColor":"neutral-500","fontSize":"14"} -->
            <p class="has-neutral-500-color has-text-color has-14-font-size"><?php echo esc_html__( '· November 20, 2026 · 7:00 PM', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->

        <!-- wp:heading {"textAlign":"center","level":1,"textColor":"white","fontSize":"48"} -->
        <h1 class="wp-block-heading has-text-align-center has-white-color has-text-color has-48-font-size"><?php echo esc_html__( 'The Architecture of Decisions', 'aegis' ); ?></h1>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center","textColor":"neutral-400","fontSize":"18"} -->
        <p class="aligncenter has-text-align-center has-neutral-400-color has-text-color has-18-font-size aligncenter"><?php echo esc_html__( 'How cognitive biases shape the systems we build — and how to design better frameworks for human judgment in an age of information overload.', 'aegis' ); ?></p>
        <!-- /wp:paragraph -->

        <!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|md"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
        <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--md)">
            <!-- wp:image {"width":"64px","height":"64px","scale":"cover","style":{"border":{"radius":"100%"}}} -->
            <figure class="wp-block-image is-resized"><img style="border-radius:100%;object-fit:cover;width:64px;height:64px" alt="" /></figure>
            <!-- /wp:image -->

            <!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical"}} -->
            <div class="wp-block-group">
                <!-- wp:paragraph {"className":"is-style-heading","textColor":"white","fontSize":"16"} -->
                <p class="is-style-heading has-white-color has-text-color has-16-font-size"><?php echo esc_html__( 'Dr. Lena Voss', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"textColor":"neutral-500","fontSize":"14"} -->
                <p class="has-neutral-500-color has-text-color has-14-font-size"><?php echo esc_html__( 'Cognitive Scientist & Author', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->

        <!-- wp:separator {"opacity":"css","className":"is-style-wide","style":{"color":{"background":"var:preset|color|neutral-200"}}} -->
        <hr class="wp-block-separator has-css-opacity is-style-wide has-background" style="background-color:var(--wp--preset--color--neutral-200)" />
        <!-- /wp:separator -->

        <!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|md"}}}} -->
        <div class="wp-block-columns">
            <!-- wp:column -->
            <div class="wp-block-column">
                <!-- wp:paragraph {"className":"is-style-sub-heading","textColor":"neutral-500","fontSize":"12"} -->
                <p class="is-style-sub-heading has-neutral-500-color has-text-color has-12-font-size"><?php echo esc_html__( 'Venue', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"textColor":"white","fontSize":"15"} -->
                <p class="has-white-color has-text-color has-15-font-size"><?php echo esc_html__( 'Athenaeum Hall, Cambridge', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column">
                <!-- wp:paragraph {"className":"is-style-sub-heading","textColor":"neutral-500","fontSize":"12"} -->
                <p class="is-style-sub-heading has-neutral-500-color has-text-color has-12-font-size"><?php echo esc_html__( 'Duration', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"textColor":"white","fontSize":"15"} -->
                <p class="has-white-color has-text-color has-15-font-size"><?php echo esc_html__( '90 minutes + Q&A', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column">
                <!-- wp:paragraph {"className":"is-style-sub-heading","textColor":"neutral-500","fontSize":"12"} -->
                <p class="is-style-sub-heading has-neutral-500-color has-text-color has-12-font-size"><?php echo esc_html__( 'Admission', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"textColor":"white","fontSize":"15"} -->
                <p class="has-white-color has-text-color has-15-font-size"><?php echo esc_html__( 'Free · RSVP Required', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->

        <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|md"}}}} -->
        <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--md)">
            <!-- wp:button {"fontSize":"16"} -->
            <div class="wp-block-button has-custom-font-size has-16-font-size"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'Reserve Your Seat', 'aegis' ); ?></a></div>
            <!-- /wp:button -->

            <!-- wp:button {"className":"is-style-ghost","fontSize":"16"} -->
            <div class="wp-block-button is-style-ghost has-custom-font-size has-16-font-size"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'Watch Previous Talks', 'aegis' ); ?></a></div>
            <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->
