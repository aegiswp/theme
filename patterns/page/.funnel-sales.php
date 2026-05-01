<?php
/**
 * Title: Funnel Sales Page
 * Slug: funnel-sales
 * Categories: page
 * Keywords: funnel, sales, long-form, conversion, woocommerce
 * Description: A long-form sales page with problem/solution framing, feature highlights, testimonials, FAQ, guarantee, and CTA — uses minimal header/footer.
 * Viewport Width: 1280
 * Block Types: core/post-content
 * Post Types: page
 */
?>

<!-- wp:group {"metadata":{"categories":["page"],"patternName":"funnel-sales","name":"Funnel Sales Page"},"align":"full","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull">

	<!-- wp:pattern {"slug":"header-store-minimal"} /-->

	<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xxl","bottom":"var:preset|spacing|xl"}}},"backgroundColor":"primary-900","textColor":"white","layout":{"type":"constrained","contentSize":"720px"}} -->
	<div class="wp-block-group alignfull has-white-color has-primary-900-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--xxl);padding-bottom:var(--wp--preset--spacing--xl)">
		<!-- wp:paragraph {"align":"center","style":{"typography":{"textTransform":"uppercase","letterSpacing":"2px"}},"fontSize":"14"} -->
		<p class="aligncenter has-text-align-center has-14-font-size aligncenter" style="letter-spacing:2px;text-transform:uppercase"><?php echo esc_html__( 'Special Offer — Limited Availability', 'aegis' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"lineHeight":"1.2"}},"fontSize":"42"} -->
		<h1 class="wp-block-heading has-text-align-center has-42-font-size" style="line-height:1.2"><?php echo esc_html__( 'Finally, a Solution That Actually Works', 'aegis' ); ?></h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|neutral-200"}}}},"textColor":"neutral-200","fontSize":"18"} -->
		<p class="aligncenter has-text-align-center has-neutral-200-color has-text-color has-link-color has-18-font-size aligncenter"><?php echo esc_html__( 'Stop wasting time and money on products that don\'t deliver. Our proven system has helped over 10,000 customers achieve real results.', 'aegis' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|sm"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
		<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--sm)">
			<!-- wp:button {"backgroundColor":"white","textColor":"primary-900","style":{"typography":{"fontSize":"18px"}},"className":"is-style-fill"} -->
			<div class="wp-block-button is-style-fill"><a class="wp-block-button__link has-primary-900-color has-white-background-color has-text-color has-background wp-element-button" style="font-size:18px"><?php echo esc_html__( 'Yes, I Want This! →', 'aegis' ); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained","contentSize":"720px"}} -->
	<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg)">
		<!-- wp:heading {"textAlign":"center","fontSize":"32"} -->
		<h2 class="wp-block-heading has-text-align-center has-32-font-size"><?php echo esc_html__( 'Does This Sound Familiar?', 'aegis' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs","margin":{"top":"var:preset|spacing|md"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
		<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--md)">
			<!-- wp:paragraph {"textColor":"neutral-700","fontSize":"16"} -->
			<p class="has-neutral-700-color has-text-color has-16-font-size"><?php echo esc_html__( '❌ You\'ve tried multiple solutions but nothing seems to stick', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"textColor":"neutral-700","fontSize":"16"} -->
			<p class="has-neutral-700-color has-text-color has-16-font-size"><?php echo esc_html__( '❌ You\'re overwhelmed by too many options and conflicting advice', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"textColor":"neutral-700","fontSize":"16"} -->
			<p class="has-neutral-700-color has-text-color has-16-font-size"><?php echo esc_html__( '❌ You\'re spending more time researching than actually making progress', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"textColor":"neutral-700","fontSize":"16"} -->
			<p class="has-neutral-700-color has-text-color has-16-font-size"><?php echo esc_html__( '❌ You feel like you\'re falling behind while others are getting ahead', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"var:preset|spacing|md"}}},"textColor":"primary-500","fontSize":"18"} -->
		<p class="aligncenter has-text-align-center has-primary-500-color has-text-color has-18-font-size aligncenter" style="margin-top:var(--wp--preset--spacing--md)"><?php echo esc_html__( 'There\'s a better way. And we\'re about to show you.', 'aegis' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg"}}},"backgroundColor":"neutral-50","layout":{"type":"constrained","contentSize":"720px"}} -->
	<div class="wp-block-group alignfull has-neutral-50-background-color has-background" style="padding-top:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg)">
		<!-- wp:heading {"textAlign":"center","fontSize":"32"} -->
		<h2 class="wp-block-heading has-text-align-center has-32-font-size"><?php echo esc_html__( 'Introducing the Complete Solution', 'aegis' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","textColor":"neutral-600","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|md"}}},"fontSize":"16"} -->
		<p class="aligncenter has-text-align-center has-neutral-600-color has-text-color has-16-font-size aligncenter" style="margin-bottom:var(--wp--preset--spacing--md)"><?php echo esc_html__( 'Everything you need in one package — no fluff, no filler, just results.', 'aegis' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","orientation":"vertical"}} -->
		<div class="wp-block-group">
			<!-- wp:paragraph {"fontSize":"16"} -->
			<p class="has-16-font-size"><?php echo esc_html__( '✅ Complete step-by-step system — no guesswork required', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"fontSize":"16"} -->
			<p class="has-16-font-size"><?php echo esc_html__( '✅ Proven results — backed by 10,000+ success stories', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"fontSize":"16"} -->
			<p class="has-16-font-size"><?php echo esc_html__( '✅ Expert support — get help whenever you need it', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"fontSize":"16"} -->
			<p class="has-16-font-size"><?php echo esc_html__( '✅ Lifetime updates — always stay current', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"fontSize":"16"} -->
			<p class="has-16-font-size"><?php echo esc_html__( '✅ Bonus resources — templates, checklists, and more', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained","contentSize":"800px"}} -->
	<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg)">
		<!-- wp:heading {"textAlign":"center","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|md"}}},"fontSize":"32"} -->
		<h2 class="wp-block-heading has-text-align-center has-32-font-size" style="margin-bottom:var(--wp--preset--spacing--md)"><?php echo esc_html__( 'Real Results from Real People', 'aegis' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|md"}}}} -->
		<div class="wp-block-columns">
			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
				<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)">
					<!-- wp:paragraph {"fontSize":"14"} -->
					<p class="has-14-font-size">⭐⭐⭐⭐⭐</p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"style":{"typography":{"fontStyle":"italic"}},"fontSize":"14"} -->
					<p class="has-14-font-size" style="font-style:italic"><?php echo esc_html__( '"I was skeptical at first, but the results speak for themselves. Within 30 days I saw a complete transformation."', 'aegis' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"textColor":"neutral-600","fontSize":"14"} -->
					<p class="has-neutral-600-color has-text-color has-14-font-size"><?php echo esc_html__( '— Michael R.', 'aegis' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
				<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)">
					<!-- wp:paragraph {"fontSize":"14"} -->
					<p class="has-14-font-size">⭐⭐⭐⭐⭐</p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"style":{"typography":{"fontStyle":"italic"}},"fontSize":"14"} -->
					<p class="has-14-font-size" style="font-style:italic"><?php echo esc_html__( '"Best investment I\'ve made this year. The support team is incredible and the product delivers exactly what it promises."', 'aegis' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"textColor":"neutral-600","fontSize":"14"} -->
					<p class="has-neutral-600-color has-text-color has-14-font-size"><?php echo esc_html__( '— Jennifer L.', 'aegis' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->

	<!-- wp:pattern {"slug":"commerce-guarantee"} /-->

	<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained","contentSize":"720px"}} -->
	<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg)">
		<!-- wp:heading {"textAlign":"center","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|md"}}},"fontSize":"32"} -->
		<h2 class="wp-block-heading has-text-align-center has-32-font-size" style="margin-bottom:var(--wp--preset--spacing--md)"><?php echo esc_html__( 'Frequently Asked Questions', 'aegis' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical"}} -->
		<div class="wp-block-group">
			<!-- wp:details {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs"}},"border":{"bottom":{"color":"var:preset|color|neutral-200","width":"1px"}}}} -->
			<details style="border-bottom-color:var(--wp--preset--color--neutral-200);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs)">
				<summary><?php echo esc_html__( 'How quickly will I see results?', 'aegis' ); ?></summary>
				<!-- wp:paragraph {"textColor":"neutral-600","fontSize":"14"} -->
				<p class="has-neutral-600-color has-text-color has-14-font-size"><?php echo esc_html__( 'Most customers report seeing meaningful improvements within the first 14 days. However, the full system is designed to deliver transformative results over 30 days.', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->
			</details>
			<!-- /wp:details -->

			<!-- wp:details {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs"}},"border":{"bottom":{"color":"var:preset|color|neutral-200","width":"1px"}}}} -->
			<details style="border-bottom-color:var(--wp--preset--color--neutral-200);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs)">
				<summary><?php echo esc_html__( 'Is there a money-back guarantee?', 'aegis' ); ?></summary>
				<!-- wp:paragraph {"textColor":"neutral-600","fontSize":"14"} -->
				<p class="has-neutral-600-color has-text-color has-14-font-size"><?php echo esc_html__( 'Absolutely. We offer a full 30-day money-back guarantee. If you\'re not satisfied for any reason, just let us know and we\'ll refund every penny.', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->
			</details>
			<!-- /wp:details -->

			<!-- wp:details {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs"}},"border":{"bottom":{"color":"var:preset|color|neutral-200","width":"1px"}}}} -->
			<details style="border-bottom-color:var(--wp--preset--color--neutral-200);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs)">
				<summary><?php echo esc_html__( 'Do I need any technical skills?', 'aegis' ); ?></summary>
				<!-- wp:paragraph {"textColor":"neutral-600","fontSize":"14"} -->
				<p class="has-neutral-600-color has-text-color has-14-font-size"><?php echo esc_html__( 'Not at all. Our system is designed for beginners and experts alike. Everything is explained step-by-step with clear instructions.', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->
			</details>
			<!-- /wp:details -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"backgroundColor":"primary-900","textColor":"white","layout":{"type":"constrained","contentSize":"640px"}} -->
	<div class="wp-block-group alignfull has-white-color has-primary-900-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
		<!-- wp:heading {"textAlign":"center","fontSize":"36"} -->
		<h2 class="wp-block-heading has-text-align-center has-36-font-size"><?php echo esc_html__( 'Don\'t Wait — Transform Your Results Today', 'aegis' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|neutral-200"}}}},"textColor":"neutral-200","fontSize":"16"} -->
		<p class="aligncenter has-text-align-center has-neutral-200-color has-text-color has-link-color has-16-font-size aligncenter"><?php echo esc_html__( 'Join 10,000+ satisfied customers. This special pricing won\'t last forever.', 'aegis' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|sm"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
		<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--sm)">
			<!-- wp:heading {"level":3,"style":{"typography":{"textDecoration":"line-through"}},"textColor":"neutral-400","fontSize":"20"} -->
			<h3 class="wp-block-heading has-neutral-400-color has-text-color has-20-font-size" style="text-decoration:line-through"><?php echo esc_html__( '$299', 'aegis' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:heading {"level":3,"fontSize":"36"} -->
			<h3 class="wp-block-heading has-36-font-size"><?php echo esc_html__( '$97', 'aegis' ); ?></h3>
			<!-- /wp:heading -->
		</div>
		<!-- /wp:group -->

		<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|sm"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
		<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--sm)">
			<!-- wp:button {"backgroundColor":"white","textColor":"primary-900","style":{"typography":{"fontSize":"18px"}},"className":"is-style-fill"} -->
			<div class="wp-block-button is-style-fill"><a class="wp-block-button__link has-primary-900-color has-white-background-color has-text-color has-background wp-element-button" style="font-size:18px"><?php echo esc_html__( 'Get Instant Access Now →', 'aegis' ); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->

		<!-- wp:paragraph {"align":"center","textColor":"neutral-400","style":{"spacing":{"margin":{"top":"var:preset|spacing|xs"}}},"fontSize":"12"} -->
		<p class="aligncenter has-text-align-center has-neutral-400-color has-text-color has-12-font-size aligncenter" style="margin-top:var(--wp--preset--spacing--xs)"><?php echo esc_html__( '30-day money-back guarantee · Secure checkout · Instant delivery', 'aegis' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:pattern {"slug":"footer-store-minimal"} /-->

</div>
<!-- /wp:group -->
