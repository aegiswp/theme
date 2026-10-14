<?php
/**
 * Title: Template 404
 * Slug: 404
 * Categories: template
 * Template Types: template-404
 * Inserter: false
 */
?>

<!-- wp:template-part {"slug":"header","tagName":"header","className":"site-header"} /-->

<!-- wp:group {"tagName":"main","anchor":"main","metadata":{"name":"Main"},"align":"full","className":"site-main","layout":{"type":"constrained"}} -->
<main id="main" class="wp-block-group alignfull site-main">
	<!-- wp:paragraph {"align":"center","className":"is-style-sub-heading","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg"}}}} -->
	<p class="aligncenter has-text-align-center is-style-sub-heading aligncenter"
		style="padding-top:var(--wp--preset--spacing--lg)"><?php echo esc_html__( 'Error 404', 'aegis' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:heading {"textAlign":"center","level":1,"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|xs","top":"var:preset|spacing|xxs"}}},"fontSize":"48"} -->
	<h1 class="wp-block-heading has-text-align-center has-48-font-size" style="padding-top:var(--wp--preset--spacing--xxs);padding-bottom:var(--wp--preset--spacing--xs)"><?php echo esc_html__( 'Page not found', 'aegis' ); ?></h1>
	<!-- /wp:heading -->

	<!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group" style="padding-bottom:var(--wp--preset--spacing--lg)">
		<!-- wp:search {"label":"Search","showLabel":false,"placeholder":"Try another search","buttonText":"Search"} /-->
	</div>
	<!-- /wp:group -->
</main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","tagName":"footer","className":"site-footer"} /-->
