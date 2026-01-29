<?php
/**
 * Title: Overlay Cards
 * Slug: overlay-cards
 * Categories: blog
 * Keywords: blog, overlay, cards, image, gradient, hover
 * Description: Blog cards with text overlay on images and hover effects.
 * Viewport Width: 1400
 */
?>

<!-- wp:group {"metadata":{"categories":["blog"],"patternName":"overlay-cards","name":"Overlay Cards"},"align":"wide","className":"is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"backgroundColor":"surface","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide is-style-default has-surface-background-color has-background" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
	<!-- wp:query {"queryId":0,"query":{"perPage":4,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|md"}}} -->
	<div class="wp-block-query alignwide"><!-- wp:post-template {"layout":{"type":"grid","columnCount":4}} -->
		<!-- wp:group {"className":"has-hover-opacity","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
		<div class="wp-block-group has-hover-opacity">
			<!-- wp:cover {"useFeaturedImage":true,"dimRatio":30,"isUserOverlayColor":true,"minHeight":480,"gradient":"primary-700-500","contentPosition":"bottom left","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}},"border":{"radius":{"topLeft":"4px","topRight":"4px","bottomLeft":"4px","bottomRight":"4px"}}}} -->
			<div class="wp-block-cover has-custom-content-position is-position-bottom-left has-primary-700-500-gradient-background has-background" style="border-top-left-radius:4px;border-top-right-radius:4px;border-bottom-left-radius:4px;border-bottom-right-radius:4px;padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md);min-height:480px">
				<span aria-hidden="true" class="wp-block-cover__background has-background-dim-30 has-background-dim has-background-gradient has-primary-700-500-gradient-background"></span>
				<div class="wp-block-cover__inner-container">
					<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","orientation":"vertical"}} -->
					<div class="wp-block-group">
						<!-- wp:post-terms {"term":"category","style":{"typography":{"textDecoration":"none","fontWeight":"600","textTransform":"uppercase","letterSpacing":"0.1em","fontStyle":"normal"},"elements":{"link":{"color":{"text":"var:preset|color|current"}}}},"textColor":"current","fontSize":"11"} /-->

						<!-- wp:post-title {"level":3,"isLink":true,"style":{"spacing":{"margin":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|current"}}}},"textColor":"current","fontSize":"20"} /-->

						<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
						<div class="wp-block-group">
							<!-- wp:post-date {"metadata":{"bindings":{"datetime":{"source":"core/post-data","args":{"field":"date"}}}},"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"current","fontSize":"13"} /-->
						</div>
						<!-- /wp:group -->
					</div>
					<!-- /wp:group -->
				</div>
			</div>
			<!-- /wp:cover -->
		</div>
		<!-- /wp:group -->
		<!-- /wp:post-template -->
	</div>
	<!-- /wp:query -->
</div>
<!-- /wp:group -->