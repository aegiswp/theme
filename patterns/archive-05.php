<?php

/**
 * Title: 05. Archive Pattern
 * Slug: aegis/archive-05
 * Categories: archives
 * Description: Archive layout combining featured images with gradient overlays, category metadata, titles, excerpts, and pagination in a stylish grid format.
 * Keywords: archive, blog, grid, metadata, featured image, gradient, pagination
 * Viewport Width: 1400
 * Block Types: core/group, core/post-date, core/post-excerpt, core/post-featured-image, core/post-template, core/post-terms, core/post-title, core/query, core/query-pagination, core/query-pagination-next, core/query-pagination-numbers, core/query-pagination-previous, core/query-title
 * Inserter: true
 *
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"05. Archive Pattern","categories":["archives"],"patternName":"aegis/archive-05"},"layout":{"type":"default"}} -->
<div class="wp-block-group">
	<!-- wp:group {"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
	<div class="wp-block-group"><!-- wp:query-title {"type":"archive","level":2} /--></div>
	<!-- /wp:group -->

	<!-- wp:query {"query":{"perPage":6,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","inherit":false},"align":"wide","layout":{"type":"default"}} -->
	<div class="wp-block-query alignwide">
		<!-- wp:post-template {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"grid","columnCount":null,"minimumColumnWidth":"35rem"}} -->
		<!-- wp:group {"style":{"spacing":{"padding":{"bottom":"0","right":"0"},"margin":{"bottom":"0"},"blockGap":"0"}},"gradient":"diagonal-tertiary-to-transparent-right-bottom"} -->
		<div class="wp-block-group has-diagonal-tertiary-to-transparent-right-bottom-gradient-background has-background" style="margin-bottom:0;padding-right:0;padding-bottom:0">
			<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","dimRatio":100,"gradient":"diagonal-transparent-to-tiny-tertiary-right-bottom"} /-->

			<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|20","left":"var:preset|spacing|20","top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}},"layout":{"type":"default"}} -->
			<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)">
				<!-- wp:group {"style":{"spacing":{"padding":{"left":"0px","right":"0px","top":"0px","bottom":"0px"},"margin":{"top":"0px"}}},"layout":{"type":"flex","justifyContent":"space-between","verticalAlignment":"center","orientation":"horizontal"}} -->
				<div class="wp-block-group" style="margin-top:0px;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px">
					<!-- wp:post-terms {"term":"category","textAlign":"right","style":{"spacing":{"padding":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|contrast"},":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"textColor":"contrast","fontSize":"small"} /-->

					<!-- wp:post-date {"style":{"spacing":{"padding":{"top":"0","bottom":"0"}}},"fontSize":"small"} /-->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"style":{"spacing":{"padding":{"right":"0","left":"0"}}},"layout":{"type":"default"}} -->
				<div class="wp-block-group" style="padding-right:0;padding-left:0">
					<!-- wp:post-title {"level":3,"isLink":true,"className":"is-style-hide-underline","style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}},"elements":{"link":{"color":{"text":"var:preset|color|foreground"},":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"textColor":"foreground","fontSize":"x-large"} /-->

					<!-- wp:post-excerpt {"moreText":"","showMoreOnNewLine":false,"excerptLength":25} /-->
				</div>
				<!-- /wp:group -->
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
