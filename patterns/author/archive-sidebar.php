<?php
/**
 * Title: Author Archive with Sidebar
 * Slug: archive-sidebar
 * Categories: author
 * Keywords: author, archive, sidebar, posts, list
 * Description: An author archive with a sticky sidebar containing author details and a post list.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["author"],"patternName":"archive-sidebar"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
<div class="wp-block-group alignfull has-animation" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl);animation-iteration-count:"><!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|xl"}}},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
    <div class="wp-block-columns alignwide has-animation" style="animation-iteration-count:"><!-- wp:column {"width":"66.66%","animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
        <div class="wp-block-column has-animation" style="flex-basis:66.66%;animation-iteration-count:"><!-- wp:query-title {"type":"archive","fontSize":"40"} /-->

            <!-- wp:separator {"opacity":"css","className":"has-text-color has-neutral-100-color is-style-wide","style":{"border":{"width":"1px"}}} -->
            <hr class="wp-block-separator has-css-opacity has-text-color has-neutral-100-color is-style-wide" style="border-width:1px" />
            <!-- /wp:separator -->

            <!-- wp:query {"queryId":0,"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"style":{"spacing":{"blockGap":"0"}}} -->
            <div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"default"}} -->
                <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md"}},"border":{"bottom":{"color":"var:preset|color|neutral-100","width":"1px"}}},"layout":{"type":"default"},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
                <div class="wp-block-group has-animation" style="border-bottom-color:var(--wp--preset--color--neutral-100);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);animation-iteration-count:"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|md"}}},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
                    <div class="wp-block-columns are-vertically-aligned-center has-animation" style="animation-iteration-count:"><!-- wp:column {"verticalAlignment":"center","width":"30%","animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
                        <div class="wp-block-column is-vertically-aligned-center has-animation" style="flex-basis:30%;animation-iteration-count:"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"4/3","style":{"aspectRatio":{"all":""},"objectFit":{"all":""}}} /--></div>
                        <!-- /wp:column -->

                        <!-- wp:column {"verticalAlignment":"center","width":"70%","animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
                        <div class="wp-block-column is-vertically-aligned-center has-animation" style="flex-basis:70%;animation-iteration-count:"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","orientation":"vertical"},"animation":{"duration":"","delay":"","iterationCount":"","event":""}} -->
                            <div class="wp-block-group has-animation" style="animation-iteration-count:"><!-- wp:post-terms {"term":"category","className":"is-style-sub-heading"} /-->

                                <!-- wp:post-title {"level":3,"isLink":true,"style":{"spacing":{"margin":{"top":"0"}}},"fontSize":"24"} /-->

                                <!-- wp:post-excerpt {"excerptLength":14,"style":{"spacing":{"margin":{"top":"0"}}},"hideReadMore":true} /-->

                                <!-- wp:post-date {"metadata":{"bindings":{"datetime":{"source":"core/post-data","args":{"field":"date"}}}},"textColor":"neutral-400","fontSize":"14"} /-->
                            </div>
                            <!-- /wp:group -->
                        </div>
                        <!-- /wp:column -->
                    </div>
                    <!-- /wp:columns -->
                </div>
                <!-- /wp:group -->
                <!-- /wp:post-template -->

                <!-- wp:query-pagination {"paginationArrow":"arrow","style":{"spacing":{"margin":{"top":"var:preset|spacing|lg"}}},"layout":{"type":"flex","justifyContent":"space-between"}} -->
                <!-- wp:query-pagination-previous /-->

                <!-- wp:query-pagination-numbers /-->

                <!-- wp:query-pagination-next /-->
                <!-- /wp:query-pagination -->

                <!-- wp:query-no-results -->
                <!-- wp:paragraph {"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
                <p class="undefined has-animation" style="animation-iteration-count:"><?php echo esc_html__( 'No posts found by this author.', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->
                <!-- /wp:query-no-results -->
            </div>
            <!-- /wp:query -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"33.33%","style":{"position":{"type":"sticky","top":"0px"}},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
        <div class="wp-block-column has-animation" style="flex-basis:33.33%;animation-iteration-count:"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"var:preset|spacing|md","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|md"},"blockGap":"var:preset|spacing|sm"},"border":{"radius":"var:preset|custom|border\u002d\u002dradius"}},"backgroundColor":"neutral-50","layout":{"type":"flex","orientation":"vertical","justifyContent":"center"},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
            <div class="wp-block-group has-neutral-50-background-color has-background has-animation" style="border-radius:var(--wp--preset--custom--border-radius);padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--md);animation-iteration-count:"><!-- wp:avatar {"size":120,"style":{"border":{"radius":"100%"}}} /-->

                <!-- wp:post-author-name {"textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"500"}},"fontSize":"20"} /-->

                <!-- wp:post-author-biography {"textAlign":"center","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|xs"}}},"textColor":"neutral-400","fontSize":"14"} /-->

                <!-- wp:social-links {"iconColor":"neutral-500","iconColorValue":"#5d6b98","size":"has-small-icon-size","className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"center"}} -->
                <ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

                    <!-- wp:social-link {"url":"#","service":"linkedin"} /-->

                    <!-- wp:social-link {"url":"#","service":"bluesky"} /-->

                    <!-- wp:social-link {"url":"#","service":"instagram"} /-->
                </ul>
                <!-- /wp:social-links -->
            </div>
            <!-- /wp:group -->

            <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|md","right":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md"},"blockGap":"var:preset|spacing|sm"},"border":{"radius":"var:preset|custom|border\u002d\u002dradius"}},"backgroundColor":"neutral-50","layout":{"type":"flex","orientation":"vertical"},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
            <div class="wp-block-group has-neutral-50-background-color has-background has-animation" style="border-radius:var(--wp--preset--custom--border-radius);padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md);animation-iteration-count:"><!-- wp:heading {"level":4,"fontSize":"18","animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
                <h4 class="wp-block-heading has-18-font-size has-animation" style="animation-iteration-count:"><?php echo esc_html__( 'Topics', 'aegis' ); ?></h4>
                <!-- /wp:heading -->

                <!-- wp:tag-cloud {"taxonomy":"category","smallestFontSize":"14px","largestFontSize":"14px"} /-->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->