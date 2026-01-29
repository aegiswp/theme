<?php
/**
 * Title: List with Author
 * Slug: list-author
 * Categories: author
 * Keywords: blog, list, author, posts, horizontal
 * Description: A horizontal list layout with author information.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["blog"],"patternName":"list-author","name":"List with Author"},"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
    <!-- wp:query {"queryId":0,"query":{"perPage":5,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"align":"wide","style":{"spacing":{"blockGap":"0"}}} -->
    <div class="wp-block-query alignwide"><!-- wp:post-template {"layout":{"type":"default"}} -->
        <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md"}},"border":{"bottom":{"color":"var:preset|color|neutral-100","width":"1px"}}},"layout":{"type":"default"}} -->
        <div class="wp-block-group" style="border-bottom-color:var(--wp--preset--color--neutral-100);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md)">
            <!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|md","left":"var:preset|spacing|lg"}}}} -->
            <div class="wp-block-columns are-vertically-aligned-center">
                <!-- wp:column {"verticalAlignment":"center","width":"35%"} -->
                <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:35%">
                    <!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","style":{"aspectRatio":{"all":"16/9"},"objectFit":{"all":"cover"},"border":{"radius":"8px"}}} /-->
                </div>
                <!-- /wp:column -->

                <!-- wp:column {"verticalAlignment":"center","width":"65%"} -->
                <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:65%">
                    <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                    <div class="wp-block-group">
                        <!-- wp:post-terms {"term":"category","className":"is-style-default","style":{"typography":{"textDecoration":"none","fontWeight":"600","textTransform":"uppercase","letterSpacing":"0.05em"}},"fontSize":"12"} /-->

                        <!-- wp:post-title {"isLink":true,"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"28"} /-->

                        <!-- wp:post-excerpt {"excerptLength":20,"style":{"spacing":{"margin":{"top":"var:preset|spacing|xxs","bottom":"0"}}},"hideReadMore":true} /-->

                        <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|sm","margin":{"top":"var:preset|spacing|sm"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                        <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--sm)">
                            <!-- wp:post-author {"avatarSize":40,"showBio":false,"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} /-->

                            <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"neutral-300"} -->
                            <p class="has-neutral-300-color has-text-color" style="margin-top:0;margin-bottom:0">·</p>
                            <!-- /wp:paragraph -->

                            <!-- wp:post-date {"metadata":{"bindings":{"datetime":{"source":"core/post-data","args":{"field":"date"}}}},"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} /-->

                            <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"neutral-300"} -->
                            <p class="has-neutral-300-color has-text-color" style="margin-top:0;margin-bottom:0">·</p>
                            <!-- /wp:paragraph -->

                            <!-- wp:read-more {"content":"Read article →","style":{"typography":{"fontWeight":"500"},"elements":{"link":{"color":{"text":"var:preset|color|primary-500"}}}}} /-->
                        </div>
                        <!-- /wp:group -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:column -->
            </div>
            <!-- /wp:columns -->
        </div>
        <!-- /wp:group -->
        <!-- /wp:post-template -->

        <!-- wp:query-pagination {"style":{"spacing":{"margin":{"top":"var:preset|spacing|lg"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
        <!-- wp:query-pagination-previous /-->

        <!-- wp:query-pagination-numbers /-->

        <!-- wp:query-pagination-next /-->
        <!-- /wp:query-pagination -->
    </div>
    <!-- /wp:query -->
</div>
<!-- /wp:group -->