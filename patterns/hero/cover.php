<?php
/**
 * Title: Hero Cover
 * Slug: cover
 * Categories: hero
 * Keywords: hero, cover, fullscreen, background
 * Description: A full-screen hero cover section.
 * Viewport Width: 1280
 */
?>

<!-- wp:cover {"dimRatio":90,"overlayColor":"neutral-100","isUserOverlayColor":true,"minHeight":90,"minHeightUnit":"vh","isDark":false,"metadata":{"categories":["hero"],"patternName":"cover","name":"Hero Cover"},"align":"full","style":{"spacing":{"padding":{"right":"0","left":"0","top":"var:preset|spacing|xxl","bottom":"var:preset|spacing|xxl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull is-light" style="padding-top:var(--wp--preset--spacing--xxl);padding-right:0;padding-bottom:var(--wp--preset--spacing--xxl);padding-left:0;min-height:90vh">
	<span aria-hidden="true" class="wp-block-cover__background has-neutral-100-background-color has-background-dim-90 has-background-dim"></span>
	<div class="wp-block-cover__inner-container">
		<!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"640px"},"onclick":""} -->
		<div class="wp-block-group" style="margin-top:0;margin-bottom:0">
			<!-- wp:paragraph {"align":"center","className":"is-style-sub-heading"} -->
			<p class="aligncenter has-text-align-center is-style-sub-heading aligncenter">Block Editor</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"lineHeight":"1"},"elements":{"link":{"color":{"text":"var:preset|color|neutral-950"}}}},"textColor":"neutral-950","fontSize":"60"} -->
			<h1 class="wp-block-heading has-text-align-center has-neutral-950-color has-text-color has-link-color has-60-font-size" style="line-height:1">Native Block Framework</h1>
			<!-- /wp:heading -->

			<!-- wp:group {"layout":{"type":"constrained","contentSize":"640px"},"onclick":""} -->
			<div class="wp-block-group">
				<!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|neutral-600"}}}},"textColor":"neutral-600"} -->
				<p class="aligncenter has-text-align-center has-neutral-600-color has-text-color has-link-color aligncenter">
					Wireframe, build, and ship high-performance sites without the bloat—a zero-dependency architecture
					for total creative freedom.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:buttons {"style":{"spacing":{"blockGap":"var:preset|spacing|xs","margin":{"top":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
			<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--sm);margin-bottom:var(--wp--preset--spacing--sm)">
				<!-- wp:button {"onclick":"","size":"large","iconSize":"20px","iconPosition":"end"} -->
				<div class="wp-block-button"><a class="wp-block-button__link wp-element-button">Get started</a></div>
				<!-- /wp:button -->

				<!-- wp:button {"className":"is-style-ghost","onclick":"","size":"large","iconSize":"20px","iconPosition":"end"} -->
				<div class="wp-block-button is-style-ghost"><a class="wp-block-button__link wp-element-button">Learn more</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:group -->
	</div>
</div>
<!-- /wp:cover -->