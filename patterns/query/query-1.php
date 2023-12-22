<?php
/**
 * 01. Block Archive Block Pattern
 */
return array(
	'title'	  => __( '01. Blog Archive', 'aegis' ),
	'description' => __( 'Blog Archive', 'aegis' ),
	'categories' => array( 'aegis-query' ),
	'content' => '
<!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-right:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:query {"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true,"parents":[],"taxQuery":null},"enhancedPagination":true,"align":"wide","layout":{"type":"default"}} -->
	<div class="wp-block-query alignwide">
		<!-- wp:post-template {"align":"wide","layout":{"type":"default"}} -->
		<!-- wp:post-featured-image {"isLink":true} /-->

		<!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|30"}}}} -->
		<div class="wp-block-group" style="padding-bottom:var(--wp--preset--spacing--30)">
			<!-- wp:group {"style":{"spacing":{"padding":{"right":"20px","bottom":"20px","left":"20px","top":"25px"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"secondary","className":"is-style-default negative-margin","layout":{"type":"flex","justifyContent":"space-between"}} -->
			<div class="wp-block-group is-style-default negative-margin has-secondary-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:25px;padding-right:20px;padding-bottom:20px;padding-left:20px">
				<!-- wp:post-date {"format":"F j, Y","style":{"typography":{"fontStyle":"normal","fontWeight":"400"},"spacing":{"padding":{"top":"0","bottom":"0"}}},"fontSize":"tiny"} /-->

				<!-- wp:post-terms {"term":"category","textAlign":"right","style":{"spacing":{"padding":{"top":"0","bottom":"0"}}},"fontSize":"tiny"} /-->
			</div>
			<!-- /wp:group -->

			<!-- wp:post-title {"isLink":true,"style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"className":"is-style-aegis-post-title-border","fontSize":"var(--wp--custom--typography--font-size--huge, clamp(2.25rem, 4vw, 2.75rem))"} /-->

			<!-- wp:post-excerpt {"moreText":"Read More","className":"is-style-default"} /-->
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