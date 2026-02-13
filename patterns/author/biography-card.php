<?php
/**
 * Title: Author Biography Card
 * Slug: biography-card
 * Categories: author
 * Keywords: author, biography, card, avatar, compact
 * Description: A compact author card with avatar, name, role, short bio, and social links.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["author"],"patternName":"author-biography-card"},"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
<div class="wp-block-group alignwide has-animation" style="padding-top:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);animation-iteration-count:"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}},"border":{"color":"var:preset|color|neutral-100","width":"1px","radius":"var:preset|custom|border\u002d\u002dradius"}},"layout":{"type":"default"},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
    <div class="wp-block-group has-border-color has-animation" style="border-color:var(--wp--preset--color--neutral-100);border-width:1px;border-radius:var(--wp--preset--custom--border-radius);padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg);animation-iteration-count:"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|lg"}}},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
        <div class="wp-block-columns are-vertically-aligned-center has-animation" style="animation-iteration-count:"><!-- wp:column {"verticalAlignment":"center","width":"120px","animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
            <div class="wp-block-column is-vertically-aligned-center has-animation" style="flex-basis:120px;animation-iteration-count:"><!-- wp:avatar {"size":120,"style":{"border":{"radius":{"topLeft":"100%","topRight":"100%","bottomLeft":"100%","bottomRight":"100%"}}}} /--></div>
            <!-- /wp:column -->

            <!-- wp:column {"verticalAlignment":"center","animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
            <div class="wp-block-column is-vertically-aligned-center has-animation" style="animation-iteration-count:"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","orientation":"vertical"},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
                <div class="wp-block-group has-animation" style="animation-iteration-count:"><!-- wp:post-author-name {"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"28"} /-->

                    <!-- wp:paragraph {"className":"is-style-sub-heading","style":{"spacing":{"margin":{"top":"0"}}},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
                    <p class="is-style-sub-heading has-animation" style="margin-top:0;animation-iteration-count:"><?php echo esc_html__( 'Technical Lead', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:post-author-biography {"style":{"spacing":{"margin":{"top":"var:preset|spacing|xxs"}}},"textColor":"neutral-400","fontSize":"16"} /-->

                    <!-- wp:social-links {"iconColor":"neutral-500","iconColorValue":"#5d6b98","size":"has-small-icon-size","className":"is-style-logos-only","style":{"spacing":{"margin":{"top":"var:preset|spacing|xxs"}}},"layout":{"type":"flex","justifyContent":"left"}} -->
                    <ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only" style="margin-top:var(--wp--preset--spacing--xxs)"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

                        <!-- wp:social-link {"url":"#","service":"linkedin"} /-->

                        <!-- wp:social-link {"url":"#","service":"bluesky"} /-->

                        <!-- wp:social-link {"url":"#","service":"instagram"} /-->

                        <!-- wp:social-link {"url":"#","service":"mail"} /-->
                    </ul>
                    <!-- /wp:social-links -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->