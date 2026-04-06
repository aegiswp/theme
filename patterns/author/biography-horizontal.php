<?php
/**
 * Title: Author Biography Horizontal
 * Slug: biography-horizontal
 * Categories: author
 * Keywords: author, biography, horizontal, strip, inline
 * Description: A slim horizontal author strip with avatar, name, bio, and social links in a single row.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["author"],"patternName":"biography-horizontal"},"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md"}},"border":{"top":{"color":"var:preset|color|neutral-100","width":"1px"},"bottom":{"color":"var:preset|color|neutral-100","width":"1px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="border-top-color:var(--wp--preset--color--neutral-100);border-top-width:1px;border-bottom-color:var(--wp--preset--color--neutral-100);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md)"><!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|md"}}}} -->
    <div class="wp-block-columns alignwide are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"64px"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:64px"><!-- wp:avatar {"size":64} /--></div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center"} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"style":{"spacing":{"blockGap":"2px"}},"layout":{"type":"flex","orientation":"vertical"}} -->
            <div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":{"left":"3px"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group"><!-- wp:paragraph {"className":"is-style-default","style":{"typography":{"fontStyle":"normal","fontWeight":"500"}},"fontSize":"16"} -->
                    <p class="is-style-default has-16-font-size" style="font-style:normal;font-weight:500"><?php echo esc_html__( 'Written by', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:post-author-name {"style":{"typography":{"fontStyle":"normal","fontWeight":"500"}}} /-->
                </div>
                <!-- /wp:group -->

                <!-- wp:paragraph {"textColor":"neutral-400","fontSize":"14"} -->
                <p class="has-neutral-400-color has-text-color has-14-font-size"><?php echo esc_html__( 'Principal Director with a decade of experience in digital product design. Passionate about design systems, accessibility, and the intersection of art and engineering.', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"160px"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:160px"><!-- wp:social-links {"iconColor":"neutral-500","size":"has-small-icon-size","className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"right"}} -->
            <ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only"><!-- wp:social-link {"url":"#","service":"linkedin"} /-->

                <!-- wp:social-link {"url":"#","service":"bluesky"} /-->

                <!-- wp:social-link {"url":"#","service":"mail"} /-->
            </ul>
            <!-- /wp:social-links -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->