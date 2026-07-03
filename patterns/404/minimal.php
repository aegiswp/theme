<?php
/**
 * Title: 404 Minimal
 * Slug: minimal
 * Categories: 404
 * Keywords: 404, not found, error, minimal, simple
 * Description: A minimal 404 error page with heading and navigation link.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["404"],"patternName":"minimal","name":"404 Minimal"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}},"dimensions":{"minHeight":"60vh"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center","verticalAlignment":"center"}} -->
<div class="wp-block-group alignfull" style="min-height:60vh;padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
	<!-- wp:paragraph {"className":"is-style-heading","textColor":"primary-500","fontSize":"72","style":{"typography":{"lineHeight":"1"}}} -->
	<p class="is-style-heading has-primary-500-color has-text-color has-72-font-size" style="line-height:1"><?php echo esc_html__( '404', 'aegis' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:heading {"textAlign":"center","fontSize":"36"} -->
	<h2 class="wp-block-heading has-text-align-center has-36-font-size"><?php echo esc_html__( 'Page Not Found', 'aegis' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","textColor":"neutral-600","style":{"layout":{"selfStretch":"fit"}}} -->
	<p class="aligncenter has-text-align-center has-neutral-600-color has-text-color aligncenter"><?php echo esc_html__( 'The page you are looking for does not exist, has been moved, or is temporarily unavailable.', 'aegis' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|sm"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--sm)">
		<!-- wp:button {"backgroundColor":"neutral-800","className":"is-style-fill","fontSize":"15"} -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button has-neutral-800-background-color has-background" href="/"><?php echo esc_html__( 'Back to Homepage', 'aegis' ); ?></a></div>
<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
