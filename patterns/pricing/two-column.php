<?php
/**
 * Title: Pricing Two Column
 * Slug: two-column
 * Categories: pricing
 * Keywords: pricing, two column, plans, comparison, subscription
 * Description: A two-column pricing comparison layout.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["pricing"],"patternName":"two-column","name":"Pricing Two Column"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
	<!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained","contentSize":"600px"}} -->
	<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--lg)">
		<!-- wp:paragraph {"align":"center","className":"is-style-sub-heading"} -->
		<p class="aligncenter has-text-align-center is-style-sub-heading aligncenter"><?php echo esc_html__( 'Retainers', 'aegis' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"textAlign":"center","fontSize":"40"} -->
		<h2 class="wp-block-heading has-text-align-center has-40-font-size"><?php echo esc_html__( 'Simple Retainer Pricing', 'aegis' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","textColor":"neutral-600"} -->
		<p class="aligncenter has-text-align-center has-neutral-600-color has-text-color aligncenter"><?php echo esc_html__( 'Pick the creative support level that fits your workflow. No hidden fees, cancel anytime.', 'aegis' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|md"}}}} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg","right":"var:preset|spacing|lg"}}}} -->
		<div class="wp-block-column is-style-surface" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
			<!-- wp:heading {"level":3,"fontSize":"24"} -->
			<h3 class="wp-block-heading has-24-font-size"><?php echo esc_html__( 'Starter', 'aegis' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"textColor":"neutral-600","fontSize":"15"} -->
			<p class="has-neutral-600-color has-text-color has-15-font-size"><?php echo esc_html__( 'Perfect for freelancers and solo makers with one brand.', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md"}}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"bottom"}} -->
			<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--md);margin-bottom:var(--wp--preset--spacing--md)">
				<!-- wp:paragraph {"className":"is-style-heading","fontSize":"48"} -->
				<p class="is-style-heading has-48-font-size"><?php echo esc_html__( '$49', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"textColor":"neutral-500"} -->
				<p class="has-neutral-500-color has-text-color"><?php echo esc_html__( '/month', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:list {"style":{"spacing":{"padding":{"left":"var:preset|spacing|sm"}}},"textColor":"neutral-600"} -->
			<ul class="has-neutral-600-color has-text-color wp-block-list" style="padding-left:var(--wp--preset--spacing--sm)">
				<!-- wp:list-item -->
				<li><?php echo esc_html__( '1 brand included', 'aegis' ); ?></li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li><?php echo esc_html__( '8 design hours / month', 'aegis' ); ?></li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li><?php echo esc_html__( 'Brand guidelines kit', 'aegis' ); ?></li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li><?php echo esc_html__( '2 revision rounds', 'aegis' ); ?></li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li><?php echo esc_html__( 'Email support', 'aegis' ); ?></li>
				<!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->

			<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|md"}}}} -->
			<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--md)">
				<!-- wp:button {"width":100,"className":"is-style-ghost"} -->
<div class="wp-block-button is-style-ghost has-custom-width wp-block-button__width-100"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'Get Started', 'aegis' ); ?></a></div>
<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg","right":"var:preset|spacing|lg"}},"border":{"width":"2px"}},"borderColor":"primary-500","backgroundColor":"primary-50"} -->
		<div class="wp-block-column has-border-color has-primary-500-border-color has-primary-50-background-color has-background" style="border-width:2px;padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
			<div class="wp-block-group">
				<!-- wp:heading {"level":3,"fontSize":"24"} -->
				<h3 class="wp-block-heading has-24-font-size"><?php echo esc_html__( 'Studio', 'aegis' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"6px","bottom":"6px","left":"12px","right":"12px"}},"border":{"radius":"20px"},"typography":{"lineHeight":"1"}},"backgroundColor":"primary-500","textColor":"neutral-0","fontSize":"12"} -->
				<p class="has-neutral-0-color has-primary-500-background-color has-text-color has-background has-12-font-size" style="border-radius:20px;padding-top:6px;padding-right:12px;padding-bottom:6px;padding-left:12px;line-height:1"><?php echo esc_html__( 'Popular', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:paragraph {"textColor":"neutral-600","fontSize":"15"} -->
			<p class="has-neutral-600-color has-text-color has-15-font-size"><?php echo esc_html__( 'For growing teams that need more brands and faster turnarounds.', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md"}}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"bottom"}} -->
			<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--md);margin-bottom:var(--wp--preset--spacing--md)">
				<!-- wp:paragraph {"className":"is-style-heading","fontSize":"48"} -->
				<p class="is-style-heading has-48-font-size"><?php echo esc_html__( '$129', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"textColor":"neutral-500"} -->
				<p class="has-neutral-500-color has-text-color"><?php echo esc_html__( '/month', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:list {"style":{"spacing":{"padding":{"left":"var:preset|spacing|sm"}}},"textColor":"neutral-600"} -->
			<ul class="has-neutral-600-color has-text-color wp-block-list" style="padding-left:var(--wp--preset--spacing--sm)">
				<!-- wp:list-item -->
				<li><?php echo esc_html__( 'Up to 5 brands', 'aegis' ); ?></li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li><?php echo esc_html__( '20 design hours / month', 'aegis' ); ?></li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li><?php echo esc_html__( 'Priority revisions', 'aegis' ); ?></li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li><?php echo esc_html__( 'Source files included', 'aegis' ); ?></li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li><?php echo esc_html__( 'Shared feedback board', 'aegis' ); ?></li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li><?php echo esc_html__( 'Monthly strategy call', 'aegis' ); ?></li>
				<!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->

			<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|md"}}}} -->
			<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--md)">
				<!-- wp:button {"width":100} -->
<div class="wp-block-button has-custom-width wp-block-button__width-100"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'Get Started', 'aegis' ); ?></a></div>
<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
