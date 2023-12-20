<?php
/**
 * 08. Blog Posts Grid Block Pattern
 */
return array(
	'title'	  => __( '08. Blog Posts Grid', 'aegis' ),
	'description' => __( 'Blog Posts Grid', 'aegis' ),
	'categories' => array( 'aegis-query' ),
	'content' => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"left":"0","top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","right":"0"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-right:0;padding-bottom:var(--wp--preset--spacing--50);padding-left:0">
    <!-- wp:query {"query":{"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","sticky":"exclude","perPage":"3","inherit":false},"enhancedPagination":true,"align":"wide","layout":{"type":"constrained"}} -->
    <div class="wp-block-query alignwide">
        <!-- wp:post-template {"align":"wide","layout":{"type":"grid","columnCount":3}} -->
        <!-- wp:post-featured-image {"isLink":true,"width":"","height":"","className":"is-style-aegis-post-featured-image-effect-2"} /-->

        <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"backgroundColor":"secondary","className":"negative-margin is-style-aegis-shadow","layout":{"type":"constrained"}} -->
        <div class="wp-block-group negative-margin is-style-aegis-shadow has-secondary-background-color has-background" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
            <!-- wp:post-title {"level":3,"isLink":true,"style":{"spacing":{"margin":{"top":"10px"}}},"className":"is-style-aegis-post-title-border"} /-->

            <!-- wp:post-excerpt {"moreText":"","className":"is-style-default"} /-->

            <!-- wp:post-date {"textAlign":"right","format":null,"style":{"typography":{"fontStyle":"normal","fontWeight":"300"},"spacing":{"margin":{"top":"10px","right":"0","bottom":"0","left":"0"},"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}},"className":"aegis-bottom-date","fontSize":"tiny"} /-->
        </div>
        <!-- /wp:group -->
        <!-- /wp:post-template -->
    </div>
    <!-- /wp:query -->
</div>
<!-- /wp:group -->',
);