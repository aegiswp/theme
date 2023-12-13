<?php
/**
 * 02. Blog Archive Block Pattern
 */
return array(
	'title'	  => __( '02. Blog Archive', 'aegis' ),
	'description' => __( 'Blog Archive', 'aegis' ),
	'categories' => array( 'aegis-query' ),
	'content' => '
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30","top":"0","bottom":"var:preset|spacing|50"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:query {"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"enhancedPagination":true,"layout":{"inherit":false}} -->
	<div class="wp-block-query">
		<!-- wp:post-template {"layout":{"type":"default"}} -->
		<!-- wp:post-title {"isLink":true,"className":"is-style-aegis-post-title-border"} /-->

		<!-- wp:post-featured-image {"isLink":true} /-->

		<!-- wp:group {"style":{"spacing":{"padding":{"bottom":"0","top":"0","right":"0"}}}} -->
		<div class="wp-block-group" style="padding-top:0;padding-right:0;padding-bottom:0">
			<!-- wp:post-excerpt {"moreText":"Read More","style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"},"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}},"className":"is-style-default"} /-->
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