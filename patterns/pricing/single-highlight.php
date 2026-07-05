<?php
/**
 * Title: Pricing Single Highlight
 * Slug: single-highlight
 * Categories: pricing
 * Keywords: pricing, single, highlight, featured, plan, card
 * Description: A single highlighted pricing card with feature list and CTA.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["pricing"],"patternName":"single-highlight","name":"Pricing Single Highlight"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
	<!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained","contentSize":"600px"}} -->
	<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--lg)">
		<!-- wp:paragraph {"align":"center","className":"is-style-sub-heading"} -->
		<p class="aligncenter has-text-align-center is-style-sub-heading aligncenter"><?php echo esc_html__( 'Pricing', 'aegis' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"textAlign":"center","fontSize":"40"} -->
		<h2 class="wp-block-heading has-text-align-center has-40-font-size"><?php echo esc_html__( 'One Plan, Everything Included', 'aegis' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","textColor":"neutral-600"} -->
		<p class="aligncenter has-text-align-center has-neutral-600-color has-text-color aligncenter"><?php echo esc_html__( 'No tiers, no upsells. Get the full platform at one transparent price.', 'aegis' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"layout":{"type":"constrained","contentSize":"520px"}} -->
	<div class="wp-block-group">
		<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg","right":"var:preset|spacing|lg"}},"border":{"width":"2px","color":"var:preset|color|primary-500","radius":"12px"}},"layout":{"type":"constrained"}} -->
		<div class="wp-block-group is-style-surface has-border-color" style="border-color:var(--wp--preset--color--primary-500);border-width:2px;border-radius:12px;padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
			<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"bottom","justifyContent":"center"}} -->
			<div class="wp-block-group">
				<!-- wp:paragraph {"className":"wp-block-heading is-style-heading","style":{"typography":{"lineHeight":"1"}},"fontSize":"72"} -->
				<p class="wp-block-heading is-style-heading has-72-font-size" style="line-height:1"><sup>$</sup>99</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph -->
				<p><?php echo esc_html__( '/ month', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"var:preset|spacing|xs"}}},"textColor":"neutral-500","fontSize":"14"} -->
			<p class="aligncenter has-text-align-center has-neutral-500-color has-text-color has-14-font-size aligncenter" style="margin-top:var(--wp--preset--spacing--xs)"><?php echo esc_html__( 'Billed annually. Cancel anytime.', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:separator {"style":{"border":{"width":"1px"}},"textColor":"neutral-200"} -->
			<hr class="wp-block-separator has-alpha-channel-opacity has-neutral-200-color has-text-color" style="border-width:1px" />
			<!-- /wp:separator -->

			<!-- wp:columns {"style":{"spacing":{"margin":{"top":"var:preset|spacing|sm"}}}} -->
			<div class="wp-block-columns" style="margin-top:var(--wp--preset--spacing--sm)">
				<!-- wp:column -->
				<div class="wp-block-column">
					<!-- wp:list {"className":"is-style-checklist","style":{"spacing":{"blockGap":"var:preset|spacing|xs"}}} -->
					<ul class="wp-block-list is-style-checklist">
						<!-- wp:list-item -->
						<li><?php echo esc_html__( 'Unlimited projects', 'aegis' ); ?></li>
						<!-- /wp:list-item -->

						<!-- wp:list-item -->
						<li><?php echo esc_html__( 'Priority support', 'aegis' ); ?></li>
						<!-- /wp:list-item -->

						<!-- wp:list-item -->
						<li><?php echo esc_html__( 'Custom domains', 'aegis' ); ?></li>
						<!-- /wp:list-item -->

						<!-- wp:list-item -->
						<li><?php echo esc_html__( 'Advanced analytics', 'aegis' ); ?></li>
						<!-- /wp:list-item -->
					</ul>
					<!-- /wp:list -->
				</div>
				<!-- /wp:column -->

				<!-- wp:column -->
				<div class="wp-block-column">
					<!-- wp:list {"className":"is-style-checklist","style":{"spacing":{"blockGap":"var:preset|spacing|xs"}}} -->
					<ul class="wp-block-list is-style-checklist">
						<!-- wp:list-item -->
						<li><?php echo esc_html__( 'Team collaboration', 'aegis' ); ?></li>
						<!-- /wp:list-item -->

						<!-- wp:list-item -->
						<li><?php echo esc_html__( 'API access', 'aegis' ); ?></li>
						<!-- /wp:list-item -->

						<!-- wp:list-item -->
						<li><?php echo esc_html__( 'White-label option', 'aegis' ); ?></li>
						<!-- /wp:list-item -->

						<!-- wp:list-item -->
						<li><?php echo esc_html__( 'SSO integration', 'aegis' ); ?></li>
						<!-- /wp:list-item -->
					</ul>
					<!-- /wp:list -->
				</div>
				<!-- /wp:column -->
			</div>
			<!-- /wp:columns -->

			<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|md"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
			<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--md)">
				<!-- wp:button {"backgroundColor":"neutral-800","width":100,"className":"is-style-fill","fontSize":"16"} -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button has-neutral-800-background-color has-background" href="#"><?php echo esc_html__( 'Get Started Today', 'aegis' ); ?></a></div>
<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
