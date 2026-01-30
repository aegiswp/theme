<?php
/**
 * Title: Hero Video
 * Slug: video
 * Categories: hero
 * Keywords: hero, video, background, fullscreen, media
 * Description: A hero section with video background placeholder.
 * Viewport Width: 1280
 */
?>

<!-- wp:cover {"dimRatio":60,"overlayColor":"neutral-950","isUserOverlayColor":true,"minHeight":85,"minHeightUnit":"vh","isDark":false,"metadata":{"categories":["hero"],"patternName":"video","name":"Hero Video"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xxl","bottom":"var:preset|spacing|xxl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull is-light" style="padding-top:var(--wp--preset--spacing--xxl);padding-bottom:var(--wp--preset--spacing--xxl);min-height:85vh">
    <span aria-hidden="true" class="wp-block-cover__background has-neutral-950-background-color has-background-dim-60 has-background-dim"></span>
    <div class="wp-block-cover__inner-container">
        <!-- wp:group {"layout":{"type":"constrained","contentSize":"800px"}} -->
        <div class="wp-block-group">
            <!-- wp:heading {"textAlign":"center","level":1,"textColor":"white","fontSize":"60"} -->
            <h1 class="wp-block-heading has-text-align-center has-white-color has-text-color has-60-font-size">Crafting Digital Experiences That Inspire</h1>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"center","textColor":"neutral-200","fontSize":"20"} -->
            <p class="aligncenter has-text-align-center has-neutral-200-color has-text-color has-20-font-size aligncenter">
                We blend creativity with technology to deliver solutions that drive growth and leave lasting
                impressions.</p>
            <!-- /wp:paragraph -->

            <!-- wp:buttons {"style":{"spacing":{"blockGap":"var:preset|spacing|xs","margin":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
            <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--md);margin-bottom:var(--wp--preset--spacing--xl)">
                <!-- wp:button {"onclick":"","size":"large","iconSize":"20px","iconPosition":"end"} -->
                <div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#pricing">Explore Our Work</a></div>
                <!-- /wp:button -->

                <!-- wp:button {"className":"is-style-ghost","onclick":"","size":"large","iconSize":"20px","iconPosition":"end"} -->
                <div class="wp-block-button is-style-ghost"><a class="wp-block-button__link wp-element-button" href="#features">Contact Us</a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:group -->
    </div>
</div>
<!-- /wp:cover -->