<?php
/**
 * Title: About Mission Vision
 * Slug: mission-vision
 * Categories: about
 * Keywords: about, mission, vision, purpose, company, values
 * Description: A two-column mission and vision section with large text.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["about"],"patternName":"mission-vision","name":"About Mission Vision"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
	<!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained","contentSize":"700px"}} -->
	<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--lg)">
		<!-- wp:paragraph {"align":"center","className":"is-style-sub-heading"} -->
		<p class="aligncenter has-text-align-center is-style-sub-heading aligncenter"><?php echo esc_html__( 'Who We Are', 'aegis' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"textAlign":"center","fontSize":"40"} -->
		<h2 class="wp-block-heading has-text-align-center has-40-font-size"><?php echo esc_html__( 'Driven by Purpose, Guided by Vision', 'aegis' ); ?></h2>
		<!-- /wp:heading -->
	</div>
	<!-- /wp:group -->

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|xl"}}}} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg","right":"var:preset|spacing|lg"}}}} -->
		<div class="wp-block-column is-style-surface" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
			<!-- wp:paragraph {"className":"is-style-sub-heading","fontSize":"14"} -->
			<p class="is-style-sub-heading has-14-font-size"><?php echo esc_html__( 'Our Mission', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":3,"fontSize":"28"} -->
			<h3 class="wp-block-heading has-28-font-size"><?php echo esc_html__( 'Democratize the tools that power great digital experiences.', 'aegis' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"textColor":"neutral-600","fontSize":"15"} -->
			<p class="has-neutral-600-color has-text-color has-15-font-size"><?php echo esc_html__( 'We believe every creator deserves access to professional-grade technology. Our mission is to remove the barriers between ideas and execution, so anyone can build something remarkable.', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg","right":"var:preset|spacing|lg"}}}} -->
		<div class="wp-block-column is-style-surface" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
			<!-- wp:paragraph {"className":"is-style-sub-heading","fontSize":"14"} -->
			<p class="is-style-sub-heading has-14-font-size"><?php echo esc_html__( 'Our Vision', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":3,"fontSize":"28"} -->
			<h3 class="wp-block-heading has-28-font-size"><?php echo esc_html__( 'A world where technology amplifies human creativity, not replaces it.', 'aegis' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"textColor":"neutral-600","fontSize":"15"} -->
			<p class="has-neutral-600-color has-text-color has-15-font-size"><?php echo esc_html__( 'We envision a future where the distance between imagination and reality is measured in minutes, not months. Where small teams compete with giants through better tools and sharper thinking.', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
