<?php
/**
 * Title: Feature Images Two Column
 * Slug: images-two-column
 * Categories: feature
 * Keywords: feature, images, two column, gallery, layout
 * Description: A two-column feature section with staggered images.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"lock":{"move":false,"remove":false},"metadata":{"name":"Feature Images Two Column","categories":["feature"],"patternName":"images-two-column"},"align":"full","className":"is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-default" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg)">
    <!-- wp:columns {"verticalAlignment":"center","align":"wide","className":"is-reverse-on-mobile is-reverse-mobile","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md"},"blockGap":{"top":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}},"u002du002dflex-direction":"column-reverse","u002du002dflex-direction-desktop":"row"}} -->
    <div class="wp-block-columns alignwide are-vertically-aligned-center is-reverse-on-mobile is-reverse-mobile" style="padding-top:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md)">
        <!-- wp:column {"verticalAlignment":"center","style":{"position":{"all":"relative"},"overflow":{"all":"hidden"}},"layout":{"inherit":false}} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:columns -->
            <div class="wp-block-columns"><!-- wp:column -->
                <div class="wp-block-column"><!-- wp:image {"aspectRatio":"3/4","scale":"cover","className":""} -->
                    <figure class="wp-block-image"><img alt="" style="aspect-ratio:3/4;object-fit:cover" /></figure>
                    <!-- /wp:image -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|lg"}}}} -->
                <div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--lg)">
                    <!-- wp:image {"aspectRatio":"3/4","scale":"cover","className":""} -->
                    <figure class="wp-block-image"><img alt="" style="aspect-ratio:3/4;object-fit:cover" /></figure>
                    <!-- /wp:image -->
                </div>
                <!-- /wp:column -->
            </div>
            <!-- /wp:columns -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","style":{"order":{"all":"","mobile":"2"}}} -->
        <div class="wp-block-column is-vertically-aligned-center">
            <!-- wp:group {"metadata":{"name":"Heading"},"layout":{"type":"constrained","justifyContent":"left"}} -->
            <div class="wp-block-group"><!-- wp:paragraph {"align":"left","className":"is-style-sub-heading"} -->
                <p class="alignleft has-text-align-left is-style-sub-heading alignleft">Patterns</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->

            <!-- wp:heading {"textAlign":"left","style":{"display":{"all":"","mobile":""}},"fontSize":"48"} -->
            <h2 class="wp-block-heading has-text-align-left has-48-font-size">Modular Architecture</h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"fontSize":"18"} -->
            <p class="has-18-font-size">Build with velocity using pre-engineered layout blocks.</p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph {"fontSize":"18"} -->
            <p class="has-18-font-size">These responsive patterns adapt intelligently to your global rules, allowing you
                to assemble complex interfaces rapidly without starting from zero.</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->