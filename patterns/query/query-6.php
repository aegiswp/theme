<?php
/**
 * 06. Blog Posts Grid Block Pattern
 */
return array(
	'title'	  => __( '06. Blog Posts Grid', 'aegis' ),
	'description' => __( 'Blog Posts Grid', 'aegis' ),
	'categories' => array( 'aegis-query' ),
	'content' => '
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","right":"var:preset|spacing|30","left":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--30)">
    <!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"right":"0","left":"0"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignwide" style="padding-right:0;padding-left:0">
        <!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"className":"is-style-default"} -->
        <div class="wp-block-columns alignwide is-style-default" style="margin-top:0;margin-bottom:0">
            <!-- wp:column {"width":""} -->
            <div class="wp-block-column">
                <!-- wp:group {"align":"full","style":{"spacing":{"blockGap":"0","padding":{"right":"0"}}}} -->
                <div class="wp-block-group alignfull" style="padding-right:0">
                    <!-- wp:group {"style":{"spacing":{"padding":{"right":"0","left":"0"}}},"className":"is-style-default","layout":{"type":"default"}} -->
                    <div class="wp-block-group is-style-default" style="padding-right:0;padding-left:0">
                        <!-- wp:query {"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"enhancedPagination":true,"layout":{"inherit":false}} -->
                        <div class="wp-block-query">
                            <!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
                            <!-- wp:group {"backgroundColor":"foreground","textColor":"background","layout":{"type":"default"}} -->
                            <div
                                class="wp-block-group has-background-color has-foreground-background-color has-text-color has-background">
                                <!-- wp:post-featured-image {"isLink":true,"dimRatio":100,"gradient":"diagonal-secondary-to-foreground","style":{"color":{"duotone":"unset"}},"className":"is-style-default"} /-->

                                <!-- wp:group {"style":{"spacing":{"padding":{"top":"15px","bottom":"0"}}}} -->
                                <div class="wp-block-group" style="padding-top:15px;padding-bottom:0">
                                    <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"blockGap":"0"}},"className":"has-negative-margin","layout":{"type":"flex","justifyContent":"right","flexWrap":"nowrap"}} -->
                                    <div class="wp-block-group has-negative-margin" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                                        <!-- wp:post-date {"style":{"typography":{"fontStyle":"normal","fontWeight":"400"},"spacing":{"padding":{"top":"10px","right":"10px","bottom":"10px","left":"0px"},"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"textColor":"background","className":"is-style-default","fontSize":"tiny"} /-->
                                    </div>
                                    <!-- /wp:group -->

                                    <!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|30","right":"var:preset|spacing|30","left":"var:preset|spacing|30","top":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}}}} -->
                                    <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
                                        <!-- wp:post-title {"isLink":true,"style":{"spacing":{"margin":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|background"},":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"className":"is-style-aegis-post-title-border","fontSize":"extra-large"} /-->

                                        <!-- wp:post-excerpt {"moreText":"","showMoreOnNewLine":false,"excerptLength":25,"className":"is-style-default","fontSize":"small"} /-->
                                    </div>
                                    <!-- /wp:group -->
                                </div>
                                <!-- /wp:group -->
                            </div>
                            <!-- /wp:group -->
                            <!-- /wp:post-template -->
                        </div>
                        <!-- /wp:query -->
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
</div>
<!-- /wp:group -->',
);