<?php
/**
 * Title: Horizontal
 * Slug: horizontal
 * Categories: cta
 * Keywords: cta, horizontal, call to action, button
 * Description: A horizontal call-to-action section.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["cta"],"patternName":"horizontal","name":"Horizontal"},"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md)"><!-- wp:columns {"verticalAlignment":"center","align":"wide","className":"is-style-surface","style":{"spacing":{"margin":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md"},"padding":{"right":"var:preset|spacing|lg","left":"var:preset|spacing|lg","top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg"}}},"backgroundColor":"neutral-50","shadowPreset":"","shadowPresetHover":""} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center is-style-surface has-neutral-50-background-color has-background" style="margin-top:var(--wp--preset--spacing--md);margin-bottom:var(--wp--preset--spacing--md);padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)"><!-- wp:column {"verticalAlignment":"center","width":"66%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:66%"><!-- wp:heading {"level":3,"className":"has-text-align-left has-48-font-size"} -->
			<h3 class="wp-block-heading has-text-align-left has-48-font-size"><?php echo esc_html__( 'Ready to Collaborate?', 'aegis' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"className":"has-18-font-size"} -->
			<p class="has-18-font-size"><?php echo esc_html__( 'Secure your production slot to transform your concept into reality.', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center"><!-- wp:buttons {"layout":{"type":"flex","justifyContent":"right","orientation":"horizontal"}} -->
			<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-fill","onclick":"","size":"large","iconSet":"WordPress","iconName":"external","iconSize":"20px","iconPosition":"end","iconSvgString":"<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\" role=\"img\" aria-labelledby=\"icon-697bcb78d4ff5\" data-icon=\"wordpress-external\" width=\"24\" height=\"24\" fill=\"currentColor\"><title id=\"icon-697bcb78d4ff5\">External Icon</title><path d=\"M19.5 4.5h-7V6h4.44l-5.97 5.97 1.06 1.06L18 7.06v4.44h1.5v-7Zm-13 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-3H17v3a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h3V5.5h-3Z\"></path></svg>"} -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#"><?php echo esc_html__( 'Get Started', 'aegis' ); ?></a></div>
<!-- /wp:button -->

				<!-- wp:button {"className":"is-style-ghost","onclick":"","size":"large","iconSet":"WordPress","iconName":"arrow-right","iconSize":"20px","iconPosition":"end","iconSvgString":"<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\" role=\"img\" aria-labelledby=\"icon-690364284e77a\" data-icon=\"wordpress-arrow-right\" width=\"24\" height=\"24\" fill=\"currentColor\"><title id=\"icon-690364284e77a\">Arrow Right Icon</title><path d=\"m14.5 6.5-1 1 3.7 3.7H4v1.6h13.2l-3.7 3.7 1 1 5.6-5.5z\"></path></svg>"} -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#"><?php echo esc_html__( 'Learn More', 'aegis' ); ?></a></div>
<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->