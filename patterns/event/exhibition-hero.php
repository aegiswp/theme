<?php
/**
 * Title: Exhibition Hero
 * Slug: event-exhibition-hero
 * Categories: event
 * Keywords: exhibition, art, gallery, museum, event, hero
 * Description: A cover hero section for an art exhibition with dates, description, and CTA buttons.
 * Viewport Width: 1280
 */
?>

<!-- wp:cover {"className":"is-style-dark","dimRatio":90,"overlayColor":"neutral-0","isUserOverlayColor":true,"minHeight":100,"minHeightUnit":"vh","isDark":true,"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xxl","bottom":"var:preset|spacing|xxl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull is-style-dark" style="padding-top:var(--wp--preset--spacing--xxl);padding-bottom:var(--wp--preset--spacing--xxl);min-height:100vh">
	<span aria-hidden="true" class="wp-block-cover__background has-neutral-0-background-color has-background-dim-90 has-background-dim"></span>
	<div class="wp-block-cover__inner-container">
		<!-- wp:group {"layout":{"type":"constrained","contentSize":"720px"}} -->
		<div class="wp-block-group">
			<!-- wp:paragraph {"align":"center","className":"is-style-sub-heading","textColor":"primary-600","fontSize":"14"} -->
			<p class="aligncenter has-text-align-center is-style-sub-heading has-primary-600-color has-text-color has-14-font-size aligncenter"><?php echo esc_html__( 'June 1 — September 15, 2026', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"textAlign":"center","level":1,"textColor":"neutral-950","fontSize":"56"} -->
			<h1 class="wp-block-heading has-text-align-center has-neutral-950-color has-text-color has-56-font-size"><?php echo esc_html__( 'Echoes in Form', 'aegis' ); ?></h1>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center","textColor":"neutral-500","fontSize":"18"} -->
			<p class="aligncenter has-text-align-center has-neutral-500-color has-text-color has-18-font-size aligncenter"><?php echo esc_html__( 'A groundbreaking exhibition exploring the intersection of sculpture, sound, and space. Featuring 40+ works from international artists who transform raw materials into immersive sensory experiences.', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|md"}}}} -->
			<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--md)">
				<!-- wp:button {"fontSize":"16"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-16-font-size has-custom-font-size wp-element-button" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'Plan Your Visit', 'aegis' ); ?></a></div>
<!-- /wp:button -->

				<!-- wp:button {"className":"is-style-outline","fontSize":"16"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-16-font-size has-custom-font-size wp-element-button" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'Virtual Preview', 'aegis' ); ?></a></div>
<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:group -->
	</div>
</div>
<!-- /wp:cover -->
