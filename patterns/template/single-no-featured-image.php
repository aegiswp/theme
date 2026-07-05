<?php
/**
 * Title: Single No Featured Image
 * Slug: single-no-featured-image
 * Categories: template
 * Template Types: single-no-featured-image
 * Inserter: false
 */
?>
<!-- wp:template-part {"slug":"header","tagName":"header","className":"site-header"} /-->
<!-- wp:group {"tagName":"main","anchor":"main","metadata":{"name":"Main"},"align":"full","className":"site-main","layout":{"type":"constrained"}} -->
<main id="main" class="wp-block-group alignfull site-main">
	<!-- wp:post-terms {"term":"category","className":"is-style-sub-heading","align":"center","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|xxs"}}}} /-->
	<!-- wp:post-title {"textAlign":"center","level":1} /-->
	<!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|md"}}},"layout":{"type":"flex","justifyContent":"center","flexWrap":"wrap"}} -->
	<div class="wp-block-group" style="padding-bottom:var(--wp--preset--spacing--md)">
		<!-- wp:post-author {"showAvatar":true,"avatarSize":32,"showBio":false,"fontSize":"14"} /-->
		<!-- wp:post-date {"fontSize":"14"} /-->
	</div>
	<!-- /wp:group -->
	<!-- wp:post-content /-->
	<!-- wp:post-comments-form /-->
</main>
<!-- /wp:group -->
<!-- wp:template-part {"slug":"footer","tagName":"footer","className":"site-footer"} /-->
