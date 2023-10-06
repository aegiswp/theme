<?php
/**
 * Blog Layout 2 Block Pattern
 */
return array(
    'title'          => __( 'Blog Layout 2', 'aegis' ),
    'categories'     => array( 'aegis-query' ),
    'blockTypes'     => array( '' ),
    'description'    => __( 'A default blog archive block pattern', 'aegis' ),
    'keywords'       => array( 'blog', 'query', 'featured', 'posts' ),
    'viewportWidth'  => 1440,
    'postTypes'      => array( '' ),
    'inserter'       => true,
    'scope'          => 'all',
    'mode'           => 'auto',
    'orientation'    => 'horizontal',
    'supports'       => array( 'align', 'color', 'fontSize' ),
    'content'        => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"30px","left":"30px"}}},"layout":{"inherit":true,"type":"constrained"}} -->
	<div class="wp-block-group alignfull" style="padding-right:30px;padding-left:30px">
	<!-- wp:query {"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"displayLayout":{"type":"list"},"layout":{"inherit":false}} -->
	<div class="wp-block-query">
	<!-- wp:post-template -->
	<!-- wp:post-title {"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}}} /-->
	<!-- wp:post-featured-image {"isLink":true} /-->
	<!-- wp:group {"style":{"spacing":{"padding":{"bottom":"3rem","top":"15px"}}}} -->
	<div class="wp-block-group" style="padding-top:15px;padding-bottom:3rem">
	<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"blockGap":"0"}},"textColor":"background","className":"date-negative-margin","layout":{"type":"flex","justifyContent":"right"}} -->
	<div class="wp-block-group date-negative-margin has-background-color has-text-color" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:post-date {"format":"F j, Y","style":{"typography":{"fontStyle":"normal","fontWeight":"400"},"spacing":{"padding":{"top":"10px","right":"10px","bottom":"10px","left":"10px"},"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"backgroundColor":"background","textColor":"foreground","className":"is-style-aegis-post-date-border","fontSize":"tiny"} /--></div>
	<!-- /wp:group -->	
	<!-- wp:post-excerpt {"moreText":"Read More","style":{"spacing":{"margin":{"top":"var:preset|spacing|40","right":"0","bottom":"0","left":"0"},"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}},"className":"is-style-default"} /-->
	</div>
	<!-- /wp:group -->
	<!-- /wp:post-template -->
	<!-- wp:query-pagination {"paginationArrow":"arrow","align":"wide","layout":{"type":"flex","justifyContent":"space-between"}} -->
	<!-- wp:query-pagination-previous {"fontSize":"small"} /-->
	<!-- wp:query-pagination-numbers /-->
	<!-- wp:query-pagination-next {"fontSize":"small"} /-->
	<!-- /wp:query-pagination -->
	</div>
	<!-- /wp:query -->
	</div>
	<!-- /wp:group -->',
);