<?php
/**
 * Title: Box
 * Slug: box
 * Categories: cta
 * Keywords: cta, box, call to action, button
 * Description: A boxed call-to-action section.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["cta"],"patternName":"box","name":"Box"},"align":"wide","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|sm","top":"var:preset|spacing|sm"}}},"layout":{"inherit":true,"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm)"><!-- wp:group {"align":"wide","className":"is-style-surface","style":{"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg"}}},"backgroundColor":"neutral-50","layout":{"contentSize":"600px","type":"constrained"}} -->
	<div class="wp-block-group alignwide is-style-surface has-neutral-50-background-color has-background" style="margin-top:0;padding-top:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg)"><!-- wp:heading {"textAlign":"center","className":"has-48-font-size"} -->
		<h2 class="wp-block-heading has-text-align-center has-48-font-size"><?php echo esc_html__( 'Ready to Collaborate?', 'aegis' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center"} -->
		<p class="aligncenter has-text-align-center aligncenter"><?php echo esc_html__( 'We are currently accepting new commissions for the upcoming quarter. Secure your production slot to transform your concept into reality.', 'aegis' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
		<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-transparent","iconSet":"WordPress","iconName":"calendar","iconSize":"20px","iconPosition":"end","iconSvgString":"<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\" role=\"img\" aria-labelledby=\"icon-696a6a1c63217\" data-icon=\"wordpress-calendar\" width=\"24\" height=\"24\" fill=\"currentColor\"><title id=\"icon-696a6a1c63217\">Calendar Icon</title><path d=\"M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm.5 16c0 .3-.2.5-.5.5H5c-.3 0-.5-.2-.5-.5V7h15v12zM9 10H7v2h2v-2zm0 4H7v2h2v-2zm4-4h-2v2h2v-2zm4 0h-2v2h2v-2zm-4 4h-2v2h2v-2zm4 0h-2v2h2v-2z\"></path></svg>"} -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#"><?php echo esc_html__( 'Book Consultation', 'aegis' ); ?></a></div>
<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->