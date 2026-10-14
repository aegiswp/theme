<?php
/**
 * Title: Single Full Width
 * Slug: single-full-width
 * Categories: template
 * Template Types: single-full-width
 * Inserter: false
 */
?>
<!-- wp:template-part {"slug":"header","tagName":"header","className":"site-header"} /-->
<!-- wp:group {"tagName":"main","anchor":"main","align":"full","className":"site-main","layout":{"type":"default"},"metadata":{"name":"Main"}} -->
<main id="main" class="wp-block-group alignfull site-main">
	<!-- wp:post-featured-image {"align":"full","style":{"aspectRatio":{"all":"21/9"},"objectFit":{"all":"cover"}}} /-->
	<!-- wp:group {"layout":{"type":"constrained","contentSize":"840px"}} -->
	<div class="wp-block-group">
		<!-- wp:post-title {"level":1,"style":{"spacing":{"padding":{"top":"var:preset|spacing|md"}}},"fontSize":"52"} /-->
		<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"left"}} -->
		<div class="wp-block-group">
			<!-- wp:post-author {"showAvatar":true,"avatarSize":32,"showBio":false,"fontSize":"14"} /-->
			<!-- wp:post-date {"fontSize":"14"} /-->
		</div>
		<!-- /wp:group -->
		<!-- wp:post-content /-->
		<!-- wp:post-comments-form /-->
	</div>
	<!-- /wp:group -->
</main>
<!-- /wp:group -->
<!-- wp:template-part {"slug":"footer","tagName":"footer","className":"site-footer"} /-->
