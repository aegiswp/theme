<?php

/**
 * Title: 04. Archive Pattern
 * Slug: aegis/archive-04
 * Categories: archives
 * Description: Modern archive layout with a grid-based post listing, large heading, metadata, excerpts, and pagination — ideal for content hubs or landing pages.
 * Keywords: archive, posts, grid, excerpt, metadata, pagination, blog
 * Viewport Width: 1400
 * Block Types: core/group, core/post-date, core/post-excerpt, core/post-featured-image, core/post-template, core/post-terms, core/post-title, core/query, core/query-pagination, core/query-pagination-next, core/query-pagination-numbers, core/query-pagination-previous, core/query-title
 * Inserter: true
 *
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"04. Archive Pattern","categories":["archives"],"patternName":"aegis/archive-04"},"style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:group {"layout":{"type":"flex","orientation":"vertical"}} -->
	<div class="wp-block-group"><!-- wp:query-title {"type":"archive","level":2} /--></div>
	<!-- /wp:group -->

	<!-- wp:query {"query":{"perPage":6,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","inherit":false},"align":"wide","layout":{"type":"default"}} -->
	<div class="wp-block-query alignwide">
		<!-- wp:post-template {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"grid","columnCount":null,"minimumColumnWidth":"35rem"}} -->
		<!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|30"},"margin":{"bottom":"0"}}},"backgroundColor":"tertiary"} -->
		<div class="wp-block-group has-tertiary-background-color has-background" style="margin-bottom:0;padding-bottom:var(--wp--preset--spacing--30)"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9"} /-->

			<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|20","left":"var:preset|spacing|20","top":"var:preset|spacing|10","bottom":"var:preset|spacing|10"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"}},"backgroundColor":"quaternary","layout":{"type":"flex","justifyContent":"space-between","orientation":"horizontal"}} -->
			<div class="wp-block-group has-quaternary-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--20)">
				<!-- wp:post-terms {"term":"category","textAlign":"right","style":{"spacing":{"padding":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"0","right":"0"},"margin":{"top":"0","bottom":"0","left":"0","right":"0"}},"elements":{"link":{":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"fontSize":"small"} /-->

				<!-- wp:post-date {"style":{"spacing":{"padding":{"top":"0","bottom":"0"}},"elements":{"link":{":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"fontSize":"small"} /-->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|20","left":"var:preset|spacing|20","top":"0","bottom":"var:preset|spacing|20"}}},"layout":{"type":"default"}} -->
			<div class="wp-block-group" style="padding-top:0;padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)">
				<!-- wp:post-title {"level":3,"isLink":true,"className":"is-style-hide-underline","style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}},"elements":{"link":{":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"textColor":"foreground","fontSize":"x-large"} /-->

				<!-- wp:post-excerpt {"moreText":"","showMoreOnNewLine":false,"excerptLength":25} /-->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
		<!-- /wp:post-template -->

		<!-- wp:query-pagination {"paginationArrow":"arrow","align":"wide","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"},":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"textColor":"primary","fontSize":"small","layout":{"type":"flex","justifyContent":"space-between","orientation":"horizontal"}} -->
		<!-- wp:query-pagination-previous {"label":"Previous Posts"} /-->

		<!-- wp:query-pagination-numbers /-->

		<!-- wp:query-pagination-next {"label":"Next Posts"} /-->
		<!-- /wp:query-pagination -->
	</div>
	<!-- /wp:query -->
</div>
<!-- /wp:group -->
