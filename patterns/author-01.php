<?php
/**
 * Title: 01. Author Pattern
 * Slug: aegis/author-01
 * Categories: author, archives
 * Description: Dual-column author archive layout combining profile, ad space, product feature, and a modern post list with negative margins, overlays, and pagination.
 * Keywords: archive, author, bio, ads, product, grid, blog, pagination
 * Viewport Width: 1400
 * Block Types: core/button, core/buttons, core/columns, core/column, core/cover, core/group, core/heading, core/image, core/paragraph, core/post-date, core/post-excerpt, core/post-featured-image, core/post-template, core/post-terms, core/post-title, core/query, core/query-pagination, core/query-pagination-next, core/query-pagination-numbers, core/query-pagination-previous, core/query-title, core/social-link, core/social-links
 * Inserter: true
 *
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"01. Author Pattern","categories":["author"],"patternName":"aegis/author-01"},"style":{"spacing":{"padding":{"top":"0","bottom":"0"},"margin":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--small);margin-bottom:var(--wp--preset--spacing--small);padding-top:0;padding-bottom:0">
	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"width":"22.22%"} -->
		<div class="wp-block-column" style="flex-basis:22.22%">
			<!-- wp:group {"className":"is-style-section-dark","style":{"spacing":{"padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}}}} -->
			<div class="wp-block-group is-style-section-dark" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--20)">
				<!-- wp:avatar {"size":100,"align":"center","style":{"border":{"radius":"100%","width":"2px"}},"borderColor":"base"} /-->

				<!-- wp:post-author-name {"textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"large"} /-->

				<!-- wp:post-author-biography {"textAlign":"center"} /-->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"77.77%"} -->
		<div class="wp-block-column" style="flex-basis:77.77%">
			<!-- wp:query {"query":{"perPage":6,"postType":"post","order":"desc","orderBy":"date","inherit":false}} -->
			<div class="wp-block-query">
				<!-- wp:post-template {"layout":{"type":"default","columnCount":3}} -->
				<!-- wp:columns {"verticalAlignment":null,"style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}}},"backgroundColor":"tertiary"} -->
				<div class="wp-block-columns has-tertiary-background-color has-background" style="padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)">
					<!-- wp:column {"verticalAlignment":"top","width":"44.44%","style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"0"}}}} -->
					<div class="wp-block-column is-vertically-aligned-top" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;flex-basis:44.44%"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9"} /--></div>
					<!-- /wp:column -->

					<!-- wp:column {"width":"55.55%","style":{"spacing":{"padding":{"right":"0","left":"0"}}}} -->
					<div class="wp-block-column" style="padding-right:0;padding-left:0;flex-basis:55.55%">
						<!-- wp:post-title {"level":3,"isLink":true,"fontSize":"x-large"} /-->

						<!-- wp:post-excerpt {"excerptLength":40} /-->
					</div>
					<!-- /wp:column -->
				</div>
				<!-- /wp:columns -->
				<!-- /wp:post-template -->

				<!-- wp:query-pagination {"paginationArrow":"arrow","align":"wide","fontSize":"small","layout":{"type":"flex","justifyContent":"space-between"}} -->
				<!-- wp:query-pagination-previous {"label":"Previous Posts"} /-->

				<!-- wp:query-pagination-numbers /-->

				<!-- wp:query-pagination-next {"label":"Next Posts"} /-->
				<!-- /wp:query-pagination -->
			</div>
			<!-- /wp:query -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
