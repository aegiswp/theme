<?php
/**
 * Title: Timeline Horizontal
 * Slug: horizontal
 * Categories: timeline
 * Keywords: timeline, horizontal, steps, process, roadmap, phases
 * Description: A horizontal timeline with numbered step cards.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["timeline"],"patternName":"horizontal","name":"Timeline Horizontal"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"backgroundColor":"neutral-50","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-neutral-50-background-color has-background" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
	<!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained","contentSize":"600px"}} -->
	<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--lg)">
		<!-- wp:paragraph {"align":"center","className":"is-style-sub-heading"} -->
		<p class="aligncenter has-text-align-center is-style-sub-heading aligncenter"><?php echo esc_html__( 'How It Works', 'aegis' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"textAlign":"center","fontSize":"40"} -->
		<h2 class="wp-block-heading has-text-align-center has-40-font-size"><?php echo esc_html__( 'Your Path to Success', 'aegis' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","textColor":"neutral-600"} -->
		<p class="aligncenter has-text-align-center has-neutral-600-color has-text-color aligncenter"><?php echo esc_html__( 'A simple, proven process that takes you from idea to launch in four clear phases.', 'aegis' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:separator {"align":"wide","backgroundColor":"primary-200"} -->
	<hr class="wp-block-separator alignwide has-text-color has-primary-200-color has-alpha-channel-opacity has-primary-200-background-color has-background" />
	<!-- /wp:separator -->

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|md"},"margin":{"top":"var:preset|spacing|lg"}}}} -->
	<div class="wp-block-columns alignwide" style="margin-top:var(--wp--preset--spacing--lg)">
		<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}}} -->
		<div class="wp-block-column">
			<!-- wp:paragraph {"className":"is-style-heading","textColor":"primary-500","fontSize":"40"} -->
			<p class="is-style-heading has-primary-500-color has-text-color has-40-font-size"><?php echo esc_html__( '01', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":3,"fontSize":"20"} -->
			<h3 class="wp-block-heading has-20-font-size"><?php echo esc_html__( 'Discovery', 'aegis' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"textColor":"neutral-600","fontSize":"15"} -->
			<p class="has-neutral-600-color has-text-color has-15-font-size"><?php echo esc_html__( 'We listen to your goals, analyze your market, and define a clear strategy that aligns with your vision.', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}}} -->
		<div class="wp-block-column">
			<!-- wp:paragraph {"className":"is-style-heading","textColor":"primary-500","fontSize":"40"} -->
			<p class="is-style-heading has-primary-500-color has-text-color has-40-font-size"><?php echo esc_html__( '02', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":3,"fontSize":"20"} -->
			<h3 class="wp-block-heading has-20-font-size"><?php echo esc_html__( 'Design', 'aegis' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"textColor":"neutral-600","fontSize":"15"} -->
			<p class="has-neutral-600-color has-text-color has-15-font-size"><?php echo esc_html__( 'Our team crafts wireframes and prototypes, iterating with your feedback until every detail is perfect.', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}}} -->
		<div class="wp-block-column">
			<!-- wp:paragraph {"className":"is-style-heading","textColor":"primary-500","fontSize":"40"} -->
			<p class="is-style-heading has-primary-500-color has-text-color has-40-font-size"><?php echo esc_html__( '03', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":3,"fontSize":"20"} -->
			<h3 class="wp-block-heading has-20-font-size"><?php echo esc_html__( 'Development', 'aegis' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"textColor":"neutral-600","fontSize":"15"} -->
			<p class="has-neutral-600-color has-text-color has-15-font-size"><?php echo esc_html__( 'We build with clean, scalable code. Regular check-ins keep you in the loop from sprint to sprint.', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}}} -->
		<div class="wp-block-column">
			<!-- wp:paragraph {"className":"is-style-heading","textColor":"primary-500","fontSize":"40"} -->
			<p class="is-style-heading has-primary-500-color has-text-color has-40-font-size"><?php echo esc_html__( '04', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":3,"fontSize":"20"} -->
			<h3 class="wp-block-heading has-20-font-size"><?php echo esc_html__( 'Launch', 'aegis' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"textColor":"neutral-600","fontSize":"15"} -->
			<p class="has-neutral-600-color has-text-color has-15-font-size"><?php echo esc_html__( 'Rigorous testing, seamless deployment, and ongoing support ensure your product thrives from day one.', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
