<?php
/**
 * Title: Blog Page
 * Slug: blog
 * Categories: page
 * Keywords: blog, page, posts, articles, news
 * Description: A complete blog page with featured post and grid layout.
 * Viewport Width: 1280
 * Block Types: core/post-content
 */
?>

<!-- wp:group {"metadata":{"categories":["page"],"patternName":"blog","name":"Blog Page"},"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull"><!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xxl","bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--xxl);padding-bottom:var(--wp--preset--spacing--lg)"><!-- wp:group {"layout":{"type":"constrained","contentSize":"720px"}} -->
        <div class="wp-block-group"><!-- wp:paragraph {"align":"center","className":"is-style-sub-heading"} -->
            <p class="aligncenter has-text-align-center is-style-sub-heading aligncenter"><?php echo esc_html__( 'Our Blog', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"textAlign":"center","level":1,"fontSize":"52"} -->
            <h1 class="wp-block-heading has-text-align-center has-52-font-size"><?php echo esc_html__( 'Insights & Updates', 'aegis' ); ?></h1>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"center","fontSize":"18"} -->
            <p class="aligncenter has-text-align-center has-18-font-size aligncenter"><?php echo esc_html__( 'Explore our latest articles on design, development, and digital strategy. Stay informed with industry trends and expert insights.', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--lg)"><!-- wp:query {"queryId":0,"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"align":"wide","style":{"spacing":{"blockGap":"0"}}} -->
        <div class="wp-block-query alignwide"><!-- wp:post-template {"layout":{"type":"default"}} -->
            <!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|xl"}}}} -->
            <div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"55%"} -->
                <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:55%"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","style":{"border":{"radius":"12px"}}} /--></div>
                <!-- /wp:column -->

                <!-- wp:column {"verticalAlignment":"center","width":"45%"} -->
                <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:45%"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                    <div class="wp-block-group"><!-- wp:paragraph {"className":"is-style-sub-heading"} -->
                        <p class="is-style-sub-heading"><?php echo esc_html__( 'Featured Article', 'aegis' ); ?></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:post-title {"isLink":true,"style":{"spacing":{"margin":{"top":"0"}}},"fontSize":"32"} /-->

                        <!-- wp:post-excerpt {"excerptLength":30,"hideReadMore":true} /-->

                        <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs","margin":{"top":"0","bottom":"var:preset|spacing|xxs"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                        <div class="wp-block-group" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--xxs)"><!-- wp:post-author {"avatarSize":40,"showBio":false,"fontSize":"14"} /-->

                            <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"3px","left":"3px"}}},"textColor":"neutral-200"} -->
                            <p class="has-neutral-200-color has-text-color" style="margin-top:0;margin-bottom:0;padding-right:3px;padding-left:3px">|</p>
                            <!-- /wp:paragraph -->

                            <!-- wp:post-date {"metadata":{"bindings":{"datetime":{"source":"core/post-data","args":{"field":"date"}}}},"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"14"} /-->
                        </div>
                        <!-- /wp:group -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:column -->
            </div>
            <!-- /wp:columns -->
            <!-- /wp:post-template -->
        </div>
        <!-- /wp:query -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|xl"}}},"backgroundColor":"neutral-50","layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignfull has-neutral-50-background-color has-background" style="padding-top:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--xl)"><!-- wp:heading {"align":"wide","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|md"}}},"fontSize":"28"} -->
        <h2 class="wp-block-heading alignwide has-28-font-size" style="margin-bottom:var(--wp--preset--spacing--md)"><?php echo esc_html__( 'Latest Articles', 'aegis' ); ?></h2>
        <!-- /wp:heading -->

        <!-- wp:query {"queryId":1,"query":{"perPage":10,"pages":0,"offset":"1","postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|md"}}} -->
        <div class="wp-block-query alignwide"><!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
            <!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"blockGap":"0"}},"backgroundColor":"white","layout":{"type":"default"}} -->
            <div class="wp-block-group is-style-surface has-white-background-color has-background" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","style":{"spacing":{"margin":{"bottom":"0"}}}} /-->

                <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|md","right":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md"},"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)"><!-- wp:post-terms {"term":"category","style":{"typography":{"textDecoration":"none","fontWeight":"500","fontStyle":"normal"}},"fontSize":"14"} /-->

                    <!-- wp:post-title {"level":3,"isLink":true,"style":{"spacing":{"margin":{"top":"0"}}},"fontSize":"20"} /-->

                    <!-- wp:post-date {"metadata":{"bindings":{"datetime":{"source":"core/post-data","args":{"field":"date"}}}},"style":{"spacing":{"margin":{"top":"var:preset|spacing|xxs"}}},"textColor":"neutral-500","fontSize":"14"} /-->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
            <!-- /wp:post-template -->

            <!-- wp:query-pagination {"paginationArrow":"arrow","style":{"spacing":{"margin":{"top":"var:preset|spacing|lg"}}},"layout":{"type":"flex","justifyContent":"space-between"}} -->
            <!-- wp:query-pagination-previous /-->

            <!-- wp:query-pagination-numbers /-->

            <!-- wp:query-pagination-next /-->
            <!-- /wp:query-pagination -->

            <!-- wp:query-no-results -->
            <!-- wp:paragraph {"align":"center","placeholder":"Add text or blocks that will display when a query returns no results."} -->
            <p class="aligncenter has-text-align-center aligncenter"><?php echo esc_html__( 'No posts found.', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->
            <!-- /wp:query-no-results -->
        </div>
        <!-- /wp:query -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained","contentSize":"600px"}} -->
    <div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)"><!-- wp:heading {"textAlign":"center","fontSize":"32"} -->
        <h2 class="wp-block-heading has-text-align-center has-32-font-size"><?php echo esc_html__( 'Subscribe to Our Newsletter', 'aegis' ); ?></h2>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center","textColor":"neutral-600"} -->
        <p class="aligncenter has-text-align-center has-neutral-600-color has-text-color aligncenter"><?php echo esc_html__( 'Get the latest articles and insights delivered straight to your inbox. No spam, unsubscribe anytime.', 'aegis' ); ?></p>
        <!-- /wp:paragraph -->

        <!-- wp:search {"showLabel":false,"placeholder":"Email address","buttonText":"Subscribe","className":"is-style-newsletter"} /-->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->