<?php
/**
 * Title: Newsletter Banner
 * Slug: banner
 * Categories: newsletter
 * Keywords: newsletter, email, subscribe, signup, banner, full width
 * Description: A full-width dark newsletter banner with centered content.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"className":"is-style-dark","metadata":{"categories":["newsletter"],"patternName":"banner","name":"Newsletter Banner"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"backgroundColor":"neutral-0","layout":{"type":"constrained","contentSize":"640px"}} -->
<div class="wp-block-group alignfull has-neutral-0-background-color has-background is-style-dark" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
	<!-- wp:heading {"textAlign":"center","textColor":"neutral-950","fontSize":"36"} -->
	<h2 class="wp-block-heading has-text-align-center has-neutral-950-color has-text-color has-36-font-size"><?php echo esc_html__( 'Ready to Level Up?', 'aegis' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","textColor":"neutral-500","fontSize":"16"} -->
	<p class="aligncenter has-text-align-center has-neutral-500-color has-text-color has-16-font-size aligncenter"><?php echo esc_html__( 'Join thousands of professionals who get our weekly breakdown of tools, tactics, and trends. Free forever.', 'aegis' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|md"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--md)">
		<!-- wp:search {"label":"","showLabel":false,"placeholder":"Email address","width":100,"widthUnit":"%","buttonText":"Subscribe","buttonPosition":"button-outside","buttonUseIcon":false,"className":"is-style-newsletter"} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:paragraph {"align":"center","textColor":"neutral-400","fontSize":"13","style":{"spacing":{"margin":{"top":"var:preset|spacing|xs"}}}} -->
	<p class="aligncenter has-text-align-center has-neutral-400-color has-text-color has-13-font-size aligncenter" style="margin-top:var(--wp--preset--spacing--xs)"><?php echo esc_html__( 'No spam. Unsubscribe with one click.', 'aegis' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
