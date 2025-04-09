<?php

/**
 * Title: 02. Archive Pattern
 * Slug: aegis/archive-02
 * Categories: archives
 * Description: Minimal archive layout with featured image overlays, titles, excerpts, and pagination, ideal for showcasing content in a clean visual grid.
 * Keywords: archive, content grid, posts, summary, featured image, excerpt, pagination
 * Viewport Width: 1400
 * Block Types: core/group, core/post-excerpt, core/post-featured-image, core/post-template, core/post-title, core/query, core/query-pagination, core/query-pagination-next, core/query-pagination-numbers, core/query-pagination-previous, core/query-title
 * Inserter: true
 *
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"02. Archive Pattern","categories":["archives"],"patternName":"aegis/archive-02"},"style":{"spacing":{"padding":{"top":"0","bottom":"0"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group" style="padding-top:0;padding-bottom:0">
	<!-- wp:group {"layout":{"type":"flex","orientation":"vertical"}} -->
	<div class="wp-block-group"><!-- wp:query-title {"type":"archive","level":2} /--></div>
	<!-- /wp:group -->

	<!-- wp:query {"query":{"perPage":6,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","inherit":false},"align":"wide","layout":{"type":"default"}} -->
	<div class="wp-block-query alignwide">
		<!-- wp:post-template {"align":"wide","layout":{"type":"default"}} -->
		<!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|30"},"margin":{"bottom":"var:preset|spacing|30"}}}} -->
		<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
			<!-- wp:post-title {"level":3,"isLink":true,"style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"},":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"textColor":"foreground","fontSize":"xx-large"} /-->

			<!-- wp:group {"style":{"spacing":{"padding":{"right":"0","left":"0","top":"var:preset|spacing|10","bottom":"0"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"}},"layout":{"type":"flex","justifyContent":"left","orientation":"horizontal"}} -->
			<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--10);padding-right:0;padding-bottom:0;padding-left:0">
				<!-- wp:paragraph {"style":{"spacing":{"padding":{"right":"5px"}}},"fontSize":"small"} -->
				<p class="has-small-font-size" style="padding-right:5px"><?php esc_html_e('Published:', 'aegis'); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:post-date {"style":{"spacing":{"padding":{"top":"0","bottom":"0","right":"var:preset|spacing|20"}},"elements":{"link":{":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"fontSize":"small"} /-->

				<!-- wp:post-terms {"term":"category","textAlign":"right","prefix":"Category: ","style":{"spacing":{"padding":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"0","right":"0"},"margin":{"top":"0","bottom":"0","left":"0","right":"0"}},"elements":{"link":{":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"fontSize":"small"} /-->
			</div>
			<!-- /wp:group -->

			<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9"} /-->

			<!-- wp:post-excerpt {"moreText":"","showMoreOnNewLine":false} /-->
		</div>
		<!-- /wp:group -->
		<!-- /wp:post-template -->

		<!-- wp:query-pagination {"paginationArrow":"arrow","align":"wide","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"},":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"fontSize":"small","layout":{"type":"flex","justifyContent":"space-between"}} -->
		<!-- wp:query-pagination-previous {"label":"Previous Posts"} /-->

		<!-- wp:query-pagination-numbers /-->

		<!-- wp:query-pagination-next {"label":"Next Posts"} /-->
		<!-- /wp:query-pagination -->
	</div>
	<!-- /wp:query -->
</div>
<!-- /wp:group -->
