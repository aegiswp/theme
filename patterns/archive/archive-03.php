<?php

/**
 * Title: 03. Archive Pattern
 * Slug: aegis/archive-03
 * Categories: archives
 * Description: Immersive full-height cover archive pattern with dark overlay, titles, metadata, and excerpts, ideal for visually rich archives or feature sections.
 * Keywords: archive, cover, grid, excerpt, featured image, overlay, dark theme, metadata, pagination
 * Viewport Width: 1400
 * Block Types: core/group, core/cover, core/post-date, core/post-excerpt, core/post-template, core/post-terms, core/post-title, core/query, core/query-pagination, core/query-pagination-next, core/query-pagination-numbers, core/query-pagination-previous, core/query-title
 * Inserter: true
 *
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"03. Archive Pattern","categories":["archives"],"patternName":"aegis/archive-03"},"style":{"spacing":{"padding":{"top":"0","bottom":"0"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group" style="padding-top:0;padding-bottom:0">
	<!-- wp:group {"layout":{"type":"flex","orientation":"vertical"}} -->
	<div class="wp-block-group"><!-- wp:query-title {"type":"archive","level":2} /--></div>
	<!-- /wp:group -->

	<!-- wp:query {"query":{"perPage":6,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","inherit":false},"align":"wide","layout":{"type":"default"}} -->
	<div class="wp-block-query alignwide">
		<!-- wp:post-template {"align":"wide","layout":{"type":"default"}} -->
		<!-- wp:group {"className":"is-style-section-dark","style":{"spacing":{"padding":{"bottom":"0"},"margin":{"bottom":"var:preset|spacing|50"}}},"backgroundColor":"contrast"} -->
		<div class="wp-block-group is-style-section-dark has-contrast-background-color has-background" style="margin-bottom:var(--wp--preset--spacing--50);padding-bottom:0">
			<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","dimRatio":100,"gradient":"diagonal-transparent-to-tiny-contrast-left-bottom","style":{"color":{}}} /-->

			<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|20","left":"var:preset|spacing|20","top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"}},"layout":{"type":"default"}} -->
			<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)">
				<!-- wp:post-title {"level":3,"isLink":true,"style":{"elements":{"link":{":hover":{"color":{"text":"var:preset|color|quaternary"}},"color":{"text":"var:preset|color|base"}}},"spacing":{"padding":{"top":"0","bottom":"0"}}},"textColor":"base","fontSize":"xx-large"} /-->

				<!-- wp:post-excerpt {"moreText":"","showMoreOnNewLine":false,"style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"},"margin":{"top":"0","bottom":"0"}}}} /-->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|20","left":"var:preset|spacing|20","bottom":"0"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"}},"backgroundColor":"primary","layout":{"type":"flex","justifyContent":"left","orientation":"horizontal"}} -->
			<div class="wp-block-group has-primary-background-color has-background" style="margin-top:0;margin-bottom:0;padding-right:var(--wp--preset--spacing--20);padding-bottom:0;padding-left:var(--wp--preset--spacing--20)">
				<!-- wp:paragraph {"style":{"spacing":{"padding":{"right":"5px"}}},"fontSize":"small"} -->
				<p class="has-small-font-size" style="padding-right:5px"><?php esc_html_e('Published:', 'aegis'); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:post-date {"style":{"spacing":{"padding":{"top":"0","bottom":"0","right":"var:preset|spacing|20"}},"elements":{"link":{":hover":{"color":{"text":"var:preset|color|quaternary"}},"color":{"text":"var:preset|color|base"}}}},"textColor":"base","fontSize":"small"} /-->

				<!-- wp:post-terms {"term":"category","textAlign":"right","prefix":"Category: ","style":{"spacing":{"padding":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"0","right":"0"},"margin":{"top":"0","bottom":"0","left":"0","right":"0"}},"elements":{"link":{":hover":{"color":{"text":"var:preset|color|quaternary"}},"color":{"text":"var:preset|color|base"}}}},"textColor":"base","fontSize":"small"} /-->
			</div>
			<!-- /wp:group -->
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
