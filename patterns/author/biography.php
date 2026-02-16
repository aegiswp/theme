<?php
/**
 * Title: Author Biography
 * Slug: biography
 * Categories: author
 * Keywords: author, biography, avatar, bio, profile
 * Description: A centered author biography section with large avatar, bio text, and social links.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["author"],"patternName":"biography"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xxl","bottom":"var:preset|spacing|xxl"}}},"backgroundColor":"neutral-50","layout":{"type":"constrained","contentSize":"640px"},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
<div class="wp-block-group alignfull has-neutral-50-background-color has-background has-animation" style="padding-top:var(--wp--preset--spacing--xxl);padding-bottom:var(--wp--preset--spacing--xxl);animation-iteration-count:"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|md"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
    <div class="wp-block-group has-animation" style="animation-iteration-count:"><!-- wp:avatar {"size":120,"style":{"border":{"radius":{"topLeft":"100%","topRight":"100%","bottomLeft":"100%","bottomRight":"100%"}}}} /-->

        <!-- wp:post-author-name {"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"40"} /-->

        <!-- wp:paragraph {"align":"center","className":"is-style-sub-heading","textColor":"primary-500","animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
        <p class="aligncenter has-text-align-center is-style-sub-heading has-primary-500-color has-text-color aligncenter has-animation" style="animation-iteration-count:"><?php echo esc_html__( 'Principal Director & Writer', 'aegis' ); ?></p>
        <!-- /wp:paragraph -->

        <!-- wp:separator {"opacity":"css","className":"has-text-color has-neutral-100-color is-style-wide","style":{"border":{"width":"1px"}}} -->
        <hr class="wp-block-separator has-css-opacity has-text-color has-neutral-100-color is-style-wide" style="border-width:1px" />
        <!-- /wp:separator -->

        <!-- wp:post-author-biography {"textAlign":"center","textColor":"neutral-400","fontSize":"18"} /-->

        <!-- wp:social-links {"iconColor":"neutral-500","iconColorValue":"#5d6b98","size":"has-normal-icon-size","className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"center"}} -->
        <ul class="wp-block-social-links has-normal-icon-size has-icon-color is-style-logos-only"><!-- wp:social-link {"url":"#","service":"deviantart"} /-->

            <!-- wp:social-link {"url":"#","service":"dribbble"} /-->

            <!-- wp:social-link {"url":"#","service":"fivehundredpx"} /-->

            <!-- wp:social-link {"url":"#","service":"github"} /-->

            <!-- wp:social-link {"url":"#","service":"mail"} /-->
        </ul>
        <!-- /wp:social-links -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->