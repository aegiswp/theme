<?php
/**
 * Title: Timeline Stacked
 * Slug: stacked
 * Categories: timeline
 * Keywords: timeline, stacked, minimal, history, changelog, updates
 * Description: A minimal stacked timeline with left border accent and date labels.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["timeline"],"patternName":"stacked","name":"Timeline Stacked"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
	<!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained","contentSize":"600px"}} -->
	<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--lg)">
		<!-- wp:paragraph {"align":"center","className":"is-style-sub-heading"} -->
		<p class="aligncenter has-text-align-center is-style-sub-heading aligncenter"><?php echo esc_html__( 'Changelog', 'aegis' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"textAlign":"center","fontSize":"40"} -->
		<h2 class="wp-block-heading has-text-align-center has-40-font-size"><?php echo esc_html__( 'What We Have Been Up To', 'aegis' ); ?></h2>
		<!-- /wp:heading -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","layout":{"type":"constrained","contentSize":"720px"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:group {"style":{"spacing":{"padding":{"left":"var:preset|spacing|md"}},"border":{"left":{"color":"var:preset|color|primary-500","width":"3px"}}},"layout":{"type":"constrained"}} -->
		<div class="wp-block-group" style="border-left-color:var(--wp--preset--color--primary-500);border-left-width:3px;padding-left:var(--wp--preset--spacing--md)">
			<!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--lg)">
				<!-- wp:paragraph {"className":"is-style-sub-heading","fontSize":"14"} -->
				<p class="is-style-sub-heading has-14-font-size"><?php echo esc_html__( 'March 2025', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"level":3,"fontSize":"24"} -->
				<h3 class="wp-block-heading has-24-font-size"><?php echo esc_html__( 'AI-Powered Recommendations', 'aegis' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"textColor":"neutral-600","fontSize":"15"} -->
				<p class="has-neutral-600-color has-text-color has-15-font-size"><?php echo esc_html__( 'Introduced machine learning models that analyze user behavior to deliver personalized content recommendations. Early adopters saw a 40% increase in engagement within the first month.', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--lg)">
				<!-- wp:paragraph {"className":"is-style-sub-heading","fontSize":"14"} -->
				<p class="is-style-sub-heading has-14-font-size"><?php echo esc_html__( 'January 2025', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"level":3,"fontSize":"24"} -->
				<h3 class="wp-block-heading has-24-font-size"><?php echo esc_html__( 'Enterprise Dashboard', 'aegis' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"textColor":"neutral-600","fontSize":"15"} -->
				<p class="has-neutral-600-color has-text-color has-15-font-size"><?php echo esc_html__( 'Launched a comprehensive analytics dashboard for enterprise clients, featuring real-time metrics, team collaboration tools, and exportable reports for stakeholders.', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--lg)">
				<!-- wp:paragraph {"className":"is-style-sub-heading","fontSize":"14"} -->
				<p class="is-style-sub-heading has-14-font-size"><?php echo esc_html__( 'October 2024', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"level":3,"fontSize":"24"} -->
				<h3 class="wp-block-heading has-24-font-size"><?php echo esc_html__( 'Mobile App Release', 'aegis' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"textColor":"neutral-600","fontSize":"15"} -->
				<p class="has-neutral-600-color has-text-color has-15-font-size"><?php echo esc_html__( 'Shipped native iOS and Android apps with offline support, push notifications, and biometric authentication. Reached 10,000 downloads in the first week.', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--lg)">
				<!-- wp:paragraph {"className":"is-style-sub-heading","fontSize":"14"} -->
				<p class="is-style-sub-heading has-14-font-size"><?php echo esc_html__( 'June 2024', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"level":3,"fontSize":"24"} -->
				<h3 class="wp-block-heading has-24-font-size"><?php echo esc_html__( 'API v2 and Integrations', 'aegis' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"textColor":"neutral-600","fontSize":"15"} -->
				<p class="has-neutral-600-color has-text-color has-15-font-size"><?php echo esc_html__( 'Rebuilt our public API from the ground up with GraphQL support, webhook events, and pre-built integrations for Slack, Zapier, and HubSpot.', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"layout":{"type":"constrained"}} -->
			<div class="wp-block-group">
				<!-- wp:paragraph {"className":"is-style-sub-heading","fontSize":"14"} -->
				<p class="is-style-sub-heading has-14-font-size"><?php echo esc_html__( 'February 2024', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"level":3,"fontSize":"24"} -->
				<h3 class="wp-block-heading has-24-font-size"><?php echo esc_html__( 'Platform Redesign', 'aegis' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"textColor":"neutral-600","fontSize":"15"} -->
				<p class="has-neutral-600-color has-text-color has-15-font-size"><?php echo esc_html__( 'Complete visual overhaul with a new design system, improved accessibility scoring to WCAG 2.2 AA, and a 60% reduction in page load times across the board.', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
