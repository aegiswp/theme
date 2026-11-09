<?php
/**
 * Title: Newsletter Inline
 * Slug: inline
 * Categories: newsletter
 * Keywords: newsletter, email, subscribe, signup, inline, form
 * Description: A compact inline newsletter signup with input and button side by side.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["newsletter"],"patternName":"inline","name":"Newsletter Inline"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained","contentSize":"640px"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg)">
	<!-- wp:heading {"textAlign":"center","fontSize":"28"} -->
	<h2 class="wp-block-heading has-text-align-center has-28-font-size"><?php echo esc_html__( 'Stay in the Loop', 'aegis' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","textColor":"neutral-600","fontSize":"15"} -->
	<p class="aligncenter has-text-align-center has-neutral-600-color has-text-color has-15-font-size aligncenter"><?php echo esc_html__( 'Get product updates, tips, and insights delivered to your inbox. No spam, unsubscribe anytime.', 'aegis' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|md"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--md)">
		<!-- wp:search {"label":"","showLabel":false,"placeholder":"Email address","width":100,"widthUnit":"%","buttonText":"Subscribe","buttonPosition":"button-outside","buttonUseIcon":false,"className":"is-style-newsletter"} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:paragraph {"align":"center","textColor":"neutral-400","fontSize":"13","style":{"spacing":{"margin":{"top":"var:preset|spacing|xs"}}}} -->
	<p class="aligncenter has-text-align-center has-neutral-400-color has-text-color has-13-font-size aligncenter" style="margin-top:var(--wp--preset--spacing--xs)"><?php echo esc_html__( 'Join 5,000+ subscribers. We respect your privacy.', 'aegis' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
