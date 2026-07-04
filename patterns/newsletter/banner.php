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

<!-- wp:group {"metadata":{"categories":["newsletter"],"patternName":"banner","name":"Newsletter Banner"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"backgroundColor":"neutral-800","textColor":"neutral-50","layout":{"type":"constrained","contentSize":"640px"}} -->
<div class="wp-block-group alignfull has-neutral-50-color has-neutral-800-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
	<!-- wp:heading {"textAlign":"center","textColor":"neutral-50","fontSize":"36"} -->
	<h2 class="wp-block-heading has-text-align-center has-neutral-50-color has-text-color has-36-font-size"><?php echo esc_html__( 'Ready to Level Up?', 'aegis' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","textColor":"neutral-300","fontSize":"16"} -->
	<p class="aligncenter has-text-align-center has-neutral-300-color has-text-color has-16-font-size aligncenter"><?php echo esc_html__( 'Join thousands of professionals who get our weekly breakdown of tools, tactics, and trends. Free forever.', 'aegis' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|md"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--md)">
		<!-- wp:button {"backgroundColor":"primary-25","textColor":"neutral-800","className":"is-style-fill","fontSize":"15"} -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button has-primary-25-background-color has-background has-neutral-800-color" href="#"><?php echo esc_html__( 'Subscribe Now', 'aegis' ); ?></a></div>
<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->

	<!-- wp:paragraph {"align":"center","textColor":"neutral-500","fontSize":"13"} -->
	<p class="aligncenter has-text-align-center has-neutral-500-color has-text-color has-13-font-size aligncenter"><?php echo esc_html__( 'No spam. Unsubscribe with one click.', 'aegis' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
