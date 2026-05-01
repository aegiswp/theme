<?php
/**
 * Title: Talk Speaker
 * Slug: event-talk-speaker
 * Categories: event
 * Keywords: talk, speaker, bio, about, presenter, event
 * Description: An about the speaker section with image, bio, and credentials.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
    <!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|xl"}}}} -->
    <div class="wp-block-columns alignwide">
        <!-- wp:column {"verticalAlignment":"center","width":"40%"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:40%">
            <!-- wp:image {"aspectRatio":"3/4","scale":"cover","style":{"border":{"radius":"8px"}}} -->
            <figure class="wp-block-image"><img style="border-radius:8px;aspect-ratio:3/4;object-fit:cover" alt="<?php echo esc_attr__( 'Dr. Lena Voss', 'aegis' ); ?>" /></figure>
            <!-- /wp:image -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"60%"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:60%">
            <!-- wp:heading {"fontSize":"32"} -->
            <h2 class="wp-block-heading has-32-font-size"><?php echo esc_html__( 'About the Speaker', 'aegis' ); ?></h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"textColor":"neutral-600","fontSize":"16","style":{"spacing":{"margin":{"top":"var:preset|spacing|sm"}}}} -->
            <p class="has-neutral-600-color has-text-color has-16-font-size" style="margin-top:var(--wp--preset--spacing--sm)"><?php echo esc_html__( 'Dr. Lena Voss is a cognitive scientist at the MIT Media Lab and bestselling author of "Thinking in Systems." Her research focuses on how humans make decisions under uncertainty and how organizational structures can be redesigned to reduce cognitive load.', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph {"textColor":"neutral-600","fontSize":"16"} -->
            <p class="has-neutral-600-color has-text-color has-16-font-size"><?php echo esc_html__( 'She has advised governments and Fortune 100 companies on decision architecture, and her TED Talk on "The Paradox of Choice in Complex Systems" has been viewed over 8 million times.', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|md"},"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
            <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--md)">
                <!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|sm","right":"var:preset|spacing|sm"},"blockGap":"2px"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                <div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--sm)">
                    <!-- wp:paragraph {"className":"is-style-heading","fontSize":"20"} -->
                    <p class="is-style-heading has-20-font-size"><?php echo esc_html__( '3', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"textColor":"neutral-500","fontSize":"12"} -->
                    <p class="has-neutral-500-color has-text-color has-12-font-size"><?php echo esc_html__( 'Books Published', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|sm","right":"var:preset|spacing|sm"},"blockGap":"2px"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                <div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--sm)">
                    <!-- wp:paragraph {"className":"is-style-heading","fontSize":"20"} -->
                    <p class="is-style-heading has-20-font-size"><?php echo esc_html__( '8M+', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"textColor":"neutral-500","fontSize":"12"} -->
                    <p class="has-neutral-500-color has-text-color has-12-font-size"><?php echo esc_html__( 'TED Views', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|sm","right":"var:preset|spacing|sm"},"blockGap":"2px"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                <div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--sm)">
                    <!-- wp:paragraph {"className":"is-style-heading","fontSize":"20"} -->
                    <p class="is-style-heading has-20-font-size"><?php echo esc_html__( '15+', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"textColor":"neutral-500","fontSize":"12"} -->
                    <p class="has-neutral-500-color has-text-color has-12-font-size"><?php echo esc_html__( 'Years Research', 'aegis' ); ?></p>
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
