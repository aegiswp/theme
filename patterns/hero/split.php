<?php
/**
 * Title: Hero Split
 * Slug: split
 * Categories: hero
 * Keywords: hero, split, two column, image, text
 * Description: A split hero section with text and image side by side.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["hero"],"patternName":"split","name":"Hero Split"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
    <!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|xl"}}}} -->
    <div class="wp-block-columns alignwide are-vertically-aligned-center">
        <!-- wp:column {"verticalAlignment":"center"} -->
        <div class="wp-block-column is-vertically-aligned-center">
            <!-- wp:paragraph {"className":"is-style-sub-heading"} -->
            <p class="is-style-sub-heading">Welcome to Aegis</p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"level":1,"style":{"typography":{"lineHeight":"1.1"}},"fontSize":"52"} -->
            <h1 class="wp-block-heading has-52-font-size" style="line-height:1.1">Design Systems Built for the Modern Web</h1>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"textColor":"neutral-600","fontSize":"18"} -->
            <p class="has-neutral-600-color has-text-color has-18-font-size">Create stunning websites with our
                comprehensive block framework. Zero dependencies, maximum performance, endless possibilities.</p>
            <!-- /wp:paragraph -->

            <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|md"}}}} -->
            <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--md)"><!-- wp:button -->
                <div class="wp-block-button"><a class="wp-block-button__link wp-element-button">Get Started Free</a>
                </div>
                <!-- /wp:button -->

                <!-- wp:button {"className":"is-style-ghost"} -->
                <div class="wp-block-button is-style-ghost"><a class="wp-block-button__link wp-element-button">View Documentation</a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center"} -->
        <div class="wp-block-column is-vertically-aligned-center">
            <!-- wp:image {"aspectRatio":"4/3","scale":"cover"} -->
            <figure class="wp-block-image"><img alt="" style="aspect-ratio:4/3;object-fit:cover" /></figure>
            <!-- /wp:image -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->