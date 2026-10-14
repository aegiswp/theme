<?php
/**
 * Title: Category Events
 * Slug: taxonomy-category-events
 * Categories: template
 * Template Types: taxonomy-category-events
 * Inserter: false
 */
?>
<!-- wp:template-part {"slug":"header","tagName":"header","className":"site-header"} /-->

<!-- wp:group {"tagName":"main","anchor":"main","metadata":{"name":"Main"},"align":"full","className":"site-main","layout":{"type":"constrained"}} -->
<main id="main" class="wp-block-group alignfull site-main">
	<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md"},"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md)">
		<!-- wp:query-title {"type":"archive","textAlign":"center"} /-->
		<!-- wp:term-description {"textAlign":"center","textColor":"neutral-600","fontSize":"16"} /-->
	</div>
	<!-- /wp:group -->
	<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|sm","top":"var:preset|spacing|xs"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--sm)">
		<!-- wp:query {"queryId":16,"query":{"perPage":10,"pages":"","offset":"","postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true,"parents":[],"taxQuery":null,"format":[]},"align":"wide","layout":{"inherit":false},"style":{"spacing":{"blockGap":"1.5em"}}} -->
		<div class="wp-block-query alignwide">
			<!-- wp:post-template {"layout":{"type":"default"}} -->
			<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|md"}}}} -->
			<div class="wp-block-columns are-vertically-aligned-center">
				<!-- wp:column {"verticalAlignment":"center","width":"28%"} -->
				<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:28%">
					<!-- wp:post-featured-image {"isLink":true,"style":{"aspectRatio":{"all":"4/3"},"objectFit":{"all":"cover"},"objectPosition":{"all":"center"}}} /-->
				</div>
				<!-- /wp:column -->
				<!-- wp:column {"verticalAlignment":"center","width":"72%"} -->
				<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:72%">
					<!-- wp:post-date {"fontSize":"12"} /-->
					<!-- wp:post-title {"level":3,"isLink":true,"fontSize":"24"} /-->
					<!-- wp:post-excerpt {"excerptLength":22,"hideReadMore":true,"fontSize":"14"} /-->
				</div>
				<!-- /wp:column -->
			</div>
			<!-- /wp:columns -->
			<!-- /wp:post-template -->
			<!-- wp:query-pagination {"paginationArrow":"arrow","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs"}}},"layout":{"type":"flex","justifyContent":"space-between"}} -->
			<!-- wp:query-pagination-previous /-->
			<!-- wp:query-pagination-numbers /-->
			<!-- wp:query-pagination-next /-->
			<!-- /wp:query-pagination -->
			<!-- wp:query-no-results -->
			<!-- wp:paragraph -->
			<p><?php echo esc_html__( 'No upcoming events.', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- /wp:query-no-results -->
		</div>
		<!-- /wp:query -->
	</div>
	<!-- /wp:group -->
</main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","tagName":"footer","className":"site-footer"} /-->
