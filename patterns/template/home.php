<?php
/**
 * Title: Blog Home
 * Slug: home
 * Categories: template
 * Template Types: home
 * Inserter: false
 */
?>
<!-- wp:template-part {"slug":"header","tagName":"header","className":"site-header"} /-->
<!-- wp:group {"tagName":"main","anchor":"main","metadata":{"name":"Main"},"align":"full","className":"site-main","layout":{"type":"constrained"}} -->
<main id="main" class="wp-block-group alignfull site-main">
	<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|md"}}},"layout":{"type":"constrained","contentSize":"720px"}} -->
	<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--md)">
		<!-- wp:paragraph {"align":"center","className":"is-style-sub-heading"} -->
		<p class="aligncenter has-text-align-center is-style-sub-heading aligncenter"><?php echo esc_html__( 'Blog', 'aegis' ); ?></p>
		<!-- /wp:paragraph -->
		<!-- wp:heading {"textAlign":"center","level":1,"fontSize":"52"} -->
		<h1 class="wp-block-heading has-text-align-center has-52-font-size"><?php echo esc_html__( 'Latest Articles', 'aegis' ); ?></h1>
		<!-- /wp:heading -->
	</div>
	<!-- /wp:group -->
	<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|sm","top":"var:preset|spacing|xs"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--sm)">
		<!-- wp:query {"queryId":10,"query":{"perPage":10,"pages":"","offset":"","postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true,"parents":[],"taxQuery":null,"format":[]},"align":"wide","layout":{"inherit":false},"style":{"spacing":{"blockGap":"1.5em"}}} -->
		<div class="wp-block-query alignwide">
			<!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
			<!-- wp:post-featured-image {"isLink":true,"style":{"aspectRatio":{"all":"16/9"},"objectFit":{"all":"cover"},"objectPosition":{"all":"center"},"height":{"all":"100%"},"width":{"all":"100%"}}} /-->
			<!-- wp:post-date {"fontSize":"12"} /-->
			<!-- wp:post-title {"level":3,"isLink":true,"fontSize":"24"} /-->
			<!-- wp:post-excerpt {"excerptLength":20,"hideReadMore":true,"fontSize":"14"} /-->
			<!-- /wp:post-template -->
			<!-- wp:query-pagination {"paginationArrow":"arrow","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs"}}},"layout":{"type":"flex","justifyContent":"space-between"}} -->
			<!-- wp:query-pagination-previous /-->
			<!-- wp:query-pagination-numbers /-->
			<!-- wp:query-pagination-next /-->
			<!-- /wp:query-pagination -->
			<!-- wp:query-no-results -->
			<!-- wp:paragraph -->
			<p><?php echo esc_html__( 'No posts yet.', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- /wp:query-no-results -->
		</div>
		<!-- /wp:query -->
	</div>
	<!-- /wp:group -->
</main>
<!-- /wp:group -->
<!-- wp:template-part {"slug":"footer","tagName":"footer","className":"site-footer"} /-->
