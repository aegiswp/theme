<?php
/**
 * Title: Image
 * Slug: image
 * Categories: feature
 * Keywords: feature, image, content, layout
 * Description: A feature section with image and content.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"lock":{"move":false,"remove":false},"metadata":{"name":"Image","categories":["feature"],"patternName":"image"},"align":"full","className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-surface" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg)">
    <!-- wp:columns {"verticalAlignment":"center","align":"wide","className":"is-reverse-on-mobile is-reverse-mobile","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md"},"blockGap":{"top":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}},"u002du002dflex-direction":"column-reverse","u002du002dflex-direction-desktop":"row"}} -->
    <div class="wp-block-columns alignwide are-vertically-aligned-center is-reverse-on-mobile is-reverse-mobile" style="padding-top:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md)">
        <!-- wp:column {"verticalAlignment":"center","style":{"order":{"all":"","mobile":"1"}}} -->
        <div class="wp-block-column is-vertically-aligned-center">
            <!-- wp:image {"aspectRatio":"16/9","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"aspectRatio":{"all":""},"objectFit":{"all":""}}} -->
            <figure class="wp-block-image size-full"><img alt="" style="aspect-ratio:16/9;object-fit:cover" /></figure>
            <!-- /wp:image -->
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
            <p class="has-18-font-size">Build with velocity using pre-engineered layout blocks. These responsive
                patterns adapt intelligently to your global rules, allowing you to assemble complex interfaces rapidly
                without starting from zero.</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->