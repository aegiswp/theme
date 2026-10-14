<?php
/**
 * Title: Newsletter CTA
 * Slug: newsletter
 * Categories: cta
 * Keywords: cta, newsletter, subscribe, email, signup
 * Description: A newsletter subscription call-to-action section.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["cta"],"patternName":"newsletter","name":"Newsletter CTA"},"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md)"><!-- wp:columns {"verticalAlignment":"center","align":"wide","className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg","right":"var:preset|spacing|lg"},"blockGap":{"left":"var:preset|spacing|xl"}}},"backgroundColor":"neutral-50"} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center is-style-surface has-neutral-50-background-color has-background" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)"><!-- wp:column {"verticalAlignment":"center","width":"55%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:55%"><!-- wp:heading {"fontSize":"32"} -->
			<h2 class="wp-block-heading has-32-font-size"><?php echo esc_html__( 'Stay Ahead of the Curve', 'aegis' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"textColor":"neutral-600"} -->
			<p class="has-neutral-600-color has-text-color"><?php echo esc_html__( 'Join 10,000+ designers and developers who receive our weekly insights on design trends, development tips, and industry news.', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"45%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:45%"><!-- wp:search {"label":"","showLabel":false,"placeholder":"Email address","width":100,"widthUnit":"%","buttonText":"Subscribe","buttonPosition":"button-outside","buttonUseIcon":false,"className":"is-style-newsletter"} /-->

			<!-- wp:paragraph {"textColor":"neutral-500","fontSize":"14","style":{"spacing":{"margin":{"top":"var:preset|spacing|xs"}}}} -->
			<p class="has-neutral-500-color has-text-color has-14-font-size" style="margin-top:var(--wp--preset--spacing--xs)"><?php echo esc_html__( 'No spam. Unsubscribe anytime.', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
