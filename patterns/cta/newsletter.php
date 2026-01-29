<?php
/**
 * Title: Newsletter CTA
 * Slug: newsletter
 * Categories: cta
 * Keywords: cta, newsletter, subscribe, email, signup
 * Description: A newsletter subscription call-to-action section.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["cta"],"patternName":"newsletter","name":"Newsletter CTA"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"backgroundColor":"neutral-50","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-neutral-50-background-color has-background" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
    <!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|xl"}}}} -->
    <div class="wp-block-columns alignwide are-vertically-aligned-center">
        <!-- wp:column {"verticalAlignment":"center","width":"60%"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:60%">
            <!-- wp:heading {"fontSize":"32"} -->
            <h2 class="wp-block-heading has-32-font-size">Stay Ahead of the Curve</h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"textColor":"neutral-600"} -->
            <p class="has-neutral-600-color has-text-color">Join 10,000+ designers and developers who receive our weekly insights on design trends, development tips, and industry news.</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"40%"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:40%">
            <!-- wp:search {"showLabel":false,"placeholder":"Email address","buttonText":"Subscribe","className":"is-style-newsletter"} /-->

            <!-- wp:paragraph {"textColor":"neutral-500","fontSize":"14"} -->
            <p class="has-neutral-500-color has-text-color has-14-font-size">No spam. Unsubscribe anytime.</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->