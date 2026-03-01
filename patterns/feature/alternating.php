<?php
/**
 * Title: Feature Alternating
 * Slug: alternating
 * Categories: feature
 * Keywords: feature, alternating, zigzag, content, image
 * Description: Alternating feature sections with images and text.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["feature"],"patternName":"alternating","name":"Feature Alternating"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
    <!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|xl"},"margin":{"bottom":"var:preset|spacing|xl"}}}} -->
    <div class="wp-block-columns alignwide are-vertically-aligned-center" style="margin-bottom:var(--wp--preset--spacing--xl)"><!-- wp:column {"verticalAlignment":"center"} -->
        <div class="wp-block-column is-vertically-aligned-center">
            <!-- wp:image {"aspectRatio":"4/3","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"aspectRatio":{"all":""},"objectFit":{"all":""}}} -->
            <figure class="wp-block-image size-full"><img alt="" style="aspect-ratio:4/3;object-fit:cover" /></figure>
            <!-- /wp:image -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center"} -->
        <div class="wp-block-column is-vertically-aligned-center">
            <!-- wp:paragraph {"className":"is-style-sub-heading"} -->
            <p class="is-style-sub-heading"><?php echo esc_html__( 'Intuitive Design', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"fontSize":"32"} -->
            <h2 class="wp-block-heading has-32-font-size"><?php echo esc_html__( 'Create Without Limitations', 'aegis' ); ?></h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"textColor":"neutral-600"} -->
            <p class="has-neutral-600-color has-text-color"><?php echo esc_html__( 'Our visual editor puts the power of professional design in your hands. Drag, drop, and customize every element to match your vision perfectly.', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:list {"textColor":"neutral-600"} -->
            <ul class="wp-block-list has-neutral-600-color has-text-color"><!-- wp:list-item -->
                <li><?php echo esc_html__( 'Real-time preview as you build', 'aegis' ); ?></li>
                <!-- /wp:list-item -->

                <!-- wp:list-item -->
                <li><?php echo esc_html__( 'Pre-built patterns for quick starts', 'aegis' ); ?></li>
                <!-- /wp:list-item -->

                <!-- wp:list-item -->
                <li><?php echo esc_html__( 'Global styles for consistency', 'aegis' ); ?></li>
                <!-- /wp:list-item -->
            </ul>
            <!-- /wp:list -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->

    <!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|xl"}}}} -->
    <div class="wp-block-columns alignwide are-vertically-aligned-center">
        <!-- wp:column {"verticalAlignment":"center"} -->
        <div class="wp-block-column is-vertically-aligned-center">
            <!-- wp:paragraph {"className":"is-style-sub-heading"} -->
            <p class="is-style-sub-heading"><?php echo esc_html__( 'Performance First', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"fontSize":"32"} -->
            <h2 class="wp-block-heading has-32-font-size"><?php echo esc_html__( 'Speed That Converts', 'aegis' ); ?></h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"textColor":"neutral-600"} -->
            <p class="has-neutral-600-color has-text-color"><?php echo esc_html__( 'Every millisecond counts. Our optimized codebase ensures your site loads instantly, keeping visitors engaged and improving your search rankings.', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:list {"textColor":"neutral-600"} -->
            <ul class="wp-block-list has-neutral-600-color has-text-color"><!-- wp:list-item -->
                <li><?php echo esc_html__( 'Zero external dependencies', 'aegis' ); ?></li>
                <!-- /wp:list-item -->

                <!-- wp:list-item -->
                <li><?php echo esc_html__( 'Optimized asset delivery', 'aegis' ); ?></li>
                <!-- /wp:list-item -->

                <!-- wp:list-item -->
                <li><?php echo esc_html__( 'Core Web Vitals optimized', 'aegis' ); ?></li>
                <!-- /wp:list-item -->
            </ul>
            <!-- /wp:list -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center"} -->
        <div class="wp-block-column is-vertically-aligned-center">
            <!-- wp:image {"aspectRatio":"4/3","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"aspectRatio":{"all":""},"objectFit":{"all":""}}} -->
            <figure class="wp-block-image size-full"><img alt="" style="aspect-ratio:4/3;object-fit:cover" /></figure>
            <!-- /wp:image -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->