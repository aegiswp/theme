<?php
/**
 * Title: Landing Page
 * Slug: landing
 * Categories: page
 * Keywords: landing, page, marketing, conversion, sales
 * Description: A high-converting landing page for products or services.
 * Viewport Width: 1280
 * Block Types: core/post-content
 */
?>

<!-- wp:group {"metadata":{"categories":["page"],"patternName":"landing","name":"Landing Page"},"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull">

	<!-- wp:cover {"dimRatio":80,"overlayColor":"neutral-950","isUserOverlayColor":true,"minHeight":90,"minHeightUnit":"vh","isDark":false,"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xxl","bottom":"var:preset|spacing|xxl"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-cover alignfull is-light" style="padding-top:var(--wp--preset--spacing--xxl);padding-bottom:var(--wp--preset--spacing--xxl);min-height:90vh">
		<span aria-hidden="true" class="wp-block-cover__background has-neutral-950-background-color has-background-dim-80 has-background-dim"></span>
		<div class="wp-block-cover__inner-container">
			<!-- wp:group {"layout":{"type":"constrained","contentSize":"800px"}} -->
			<div class="wp-block-group">
				<!-- wp:paragraph {"align":"center","className":"is-style-sub-heading","textColor":"primary-400"} -->
				<p class="aligncenter has-text-align-center is-style-sub-heading has-primary-400-color has-text-color aligncenter"><?php echo esc_html__( 'Introducing the Future', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"textAlign":"center","level":1,"textColor":"white","fontSize":"60"} -->
				<h1 class="wp-block-heading has-text-align-center has-white-color has-text-color has-60-font-size"><?php echo esc_html__( 'Build Faster. Launch Smarter. Scale Effortlessly.', 'aegis' ); ?></h1>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","textColor":"neutral-300","fontSize":"20"} -->
				<p class="aligncenter has-text-align-center has-neutral-300-color has-text-color has-20-font-size aligncenter"><?php echo esc_html__( 'The all-in-one platform that empowers teams to create, collaborate, and deliver exceptional digital experiences.', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|md"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
				<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--md)">
					<!-- wp:button {"fontSize":"18"} -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#"><?php echo esc_html__( 'Start Free Trial', 'aegis' ); ?></a></div>
<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
