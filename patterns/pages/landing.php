<?php
/**
 * Title: Landing Page
 * Slug: landing
 * Categories: pages
 * Keywords: landing, page, marketing, conversion, sales, contact, form
 * Description: A full landing page with hero, features, social proof, testimonials, contact form, and closing CTA.
 * Viewport Width: 1280
 * Block Types: core/post-content
 */
?>

<!-- wp:group {"metadata":{"categories":["pages"],"patternName":"landing","name":"Landing Page"},"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull">

	<!-- wp:cover {"className":"is-style-dark","dimRatio":90,"overlayColor":"neutral-0","isUserOverlayColor":true,"minHeight":90,"minHeightUnit":"vh","isDark":true,"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xxl","bottom":"var:preset|spacing|xxl","left":"var:preset|spacing|lg","right":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-cover alignfull is-style-dark" style="padding-top:var(--wp--preset--spacing--xxl);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--xxl);padding-left:var(--wp--preset--spacing--lg);min-height:90vh">
		<span aria-hidden="true" class="wp-block-cover__background has-neutral-0-background-color has-background-dim-90 has-background-dim"></span>
		<div class="wp-block-cover__inner-container">
			<!-- wp:group {"layout":{"type":"constrained","contentSize":"800px"}} -->
			<div class="wp-block-group">
				<!-- wp:paragraph {"align":"center","className":"is-style-sub-heading","textColor":"primary-600"} -->
				<p class="has-text-align-center is-style-sub-heading has-primary-600-color has-text-color"><?php echo esc_html__( 'Introducing the Future', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"textAlign":"center","level":1,"textColor":"neutral-950","fontSize":"60"} -->
				<h1 class="wp-block-heading has-text-align-center has-neutral-950-color has-text-color has-60-font-size"><?php echo esc_html__( 'Build Faster. Launch Smarter. Scale Effortlessly.', 'aegis' ); ?></h1>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","textColor":"neutral-600","fontSize":"20"} -->
				<p class="has-text-align-center has-neutral-600-color has-text-color has-20-font-size"><?php echo esc_html__( 'The all-in-one platform that empowers teams to create, collaborate, and deliver exceptional digital experiences.', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|md"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
				<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--md)">
					<!-- wp:button {"fontSize":"18"} -->
					<div class="wp-block-button"><a class="wp-block-button__link has-18-font-size has-custom-font-size wp-element-button" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'Start Free Trial', 'aegis' ); ?></a></div>
					<!-- /wp:button -->

					<!-- wp:button {"className":"is-style-ghost","fontSize":"18"} -->
					<div class="wp-block-button is-style-ghost"><a class="wp-block-button__link has-18-font-size has-custom-font-size wp-element-button" href="#contact"><?php echo esc_html__( 'Talk to Sales', 'aegis' ); ?></a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:group -->
		</div>
	</div>
	<!-- /wp:cover -->

	<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg","right":"var:preset|spacing|lg"}},"border":{"bottom":{"color":"var:preset|color|neutral-100","width":"1px"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignfull" style="border-bottom-color:var(--wp--preset--color--neutral-100);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
		<!-- wp:paragraph {"align":"center","textColor":"neutral-400","fontSize":"14","style":{"typography":{"textTransform":"uppercase","letterSpacing":"1px"}}} -->
		<p class="has-text-align-center has-neutral-400-color has-text-color has-14-font-size" style="letter-spacing:1px;text-transform:uppercase"><?php echo esc_html__( 'Trusted by teams at', 'aegis' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|md"},"blockGap":"var:preset|spacing|lg"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
		<div class="wp-block-group alignwide" style="margin-top:var(--wp--preset--spacing--md)">
			<!-- wp:paragraph {"textColor":"neutral-500","fontSize":"18","style":{"typography":{"fontWeight":"600"}}} -->
			<p class="has-neutral-500-color has-text-color has-18-font-size" style="font-weight:600"><?php echo esc_html__( 'Northstar', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"textColor":"neutral-500","fontSize":"18","style":{"typography":{"fontWeight":"600"}}} -->
			<p class="has-neutral-500-color has-text-color has-18-font-size" style="font-weight:600"><?php echo esc_html__( 'Lumen', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"textColor":"neutral-500","fontSize":"18","style":{"typography":{"fontWeight":"600"}}} -->
			<p class="has-neutral-500-color has-text-color has-18-font-size" style="font-weight:600"><?php echo esc_html__( 'Cascade', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"textColor":"neutral-500","fontSize":"18","style":{"typography":{"fontWeight":"600"}}} -->
			<p class="has-neutral-500-color has-text-color has-18-font-size" style="font-weight:600"><?php echo esc_html__( 'Orbit', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"textColor":"neutral-500","fontSize":"18","style":{"typography":{"fontWeight":"600"}}} -->
			<p class="has-neutral-500-color has-text-color has-18-font-size" style="font-weight:600"><?php echo esc_html__( 'Vertex', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl","left":"var:preset|spacing|lg","right":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--xl);padding-left:var(--wp--preset--spacing--lg)">
		<!-- wp:group {"layout":{"type":"constrained","contentSize":"720px"}} -->
		<div class="wp-block-group">
			<!-- wp:paragraph {"align":"center","className":"is-style-sub-heading"} -->
			<p class="has-text-align-center is-style-sub-heading"><?php echo esc_html__( 'Features', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"textAlign":"center","fontSize":"36"} -->
			<h2 class="wp-block-heading has-text-align-center has-36-font-size"><?php echo esc_html__( 'Everything you need to ship with confidence', 'aegis' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center","textColor":"neutral-600","fontSize":"18"} -->
			<p class="has-text-align-center has-neutral-600-color has-text-color has-18-font-size"><?php echo esc_html__( 'A focused toolkit that removes busywork so your team can focus on product, design, and growth.', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|lg"},"blockGap":{"left":"var:preset|spacing|md"}}}} -->
		<div class="wp-block-columns alignwide" style="margin-top:var(--wp--preset--spacing--lg)">
			<!-- wp:column {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg","right":"var:preset|spacing|lg"}}}} -->
			<div class="wp-block-column is-style-surface" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
				<!-- wp:heading {"level":3,"fontSize":"22"} -->
				<h3 class="wp-block-heading has-22-font-size"><?php echo esc_html__( 'Lightning-fast builds', 'aegis' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"textColor":"neutral-600","fontSize":"16"} -->
				<p class="has-neutral-600-color has-text-color has-16-font-size"><?php echo esc_html__( 'Ship pages and campaigns in hours, not weeks, with reusable patterns and a zero-bloat foundation.', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg","right":"var:preset|spacing|lg"}}}} -->
			<div class="wp-block-column is-style-surface" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
				<!-- wp:heading {"level":3,"fontSize":"22"} -->
				<h3 class="wp-block-heading has-22-font-size"><?php echo esc_html__( 'Collaboration built in', 'aegis' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"textColor":"neutral-600","fontSize":"16"} -->
				<p class="has-neutral-600-color has-text-color has-16-font-size"><?php echo esc_html__( 'Keep designers, marketers, and developers aligned with shared styles, clear structure, and predictable output.', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg","right":"var:preset|spacing|lg"}}}} -->
			<div class="wp-block-column is-style-surface" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
				<!-- wp:heading {"level":3,"fontSize":"22"} -->
				<h3 class="wp-block-heading has-22-font-size"><?php echo esc_html__( 'Scale without friction', 'aegis' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"textColor":"neutral-600","fontSize":"16"} -->
				<p class="has-neutral-600-color has-text-color has-16-font-size"><?php echo esc_html__( 'Grow from launch to enterprise with performance-first architecture and flexible content systems.', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl","left":"var:preset|spacing|lg","right":"var:preset|spacing|lg"}}},"backgroundColor":"neutral-50","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignfull has-neutral-50-background-color has-background" style="padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--xl);padding-left:var(--wp--preset--spacing--lg)">
		<!-- wp:heading {"textAlign":"center","fontSize":"36"} -->
		<h2 class="wp-block-heading has-text-align-center has-36-font-size"><?php echo esc_html__( 'How it works', 'aegis' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|lg"},"blockGap":{"left":"var:preset|spacing|lg"}}}} -->
		<div class="wp-block-columns alignwide" style="margin-top:var(--wp--preset--spacing--lg)">
			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:paragraph {"className":"is-style-sub-heading","textColor":"primary-500"} -->
				<p class="is-style-sub-heading has-primary-500-color has-text-color">01</p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"level":3,"fontSize":"22"} -->
				<h3 class="wp-block-heading has-22-font-size"><?php echo esc_html__( 'Choose your starting point', 'aegis' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"textColor":"neutral-600","fontSize":"16"} -->
				<p class="has-neutral-600-color has-text-color has-16-font-size"><?php echo esc_html__( 'Start from a polished landing layout and adapt copy, media, and CTAs to your offer.', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:paragraph {"className":"is-style-sub-heading","textColor":"primary-500"} -->
				<p class="is-style-sub-heading has-primary-500-color has-text-color">02</p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"level":3,"fontSize":"22"} -->
				<h3 class="wp-block-heading has-22-font-size"><?php echo esc_html__( 'Customize in the editor', 'aegis' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"textColor":"neutral-600","fontSize":"16"} -->
				<p class="has-neutral-600-color has-text-color has-16-font-size"><?php echo esc_html__( 'Swap sections, refine messaging, and connect forms without leaving the WordPress editor.', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:paragraph {"className":"is-style-sub-heading","textColor":"primary-500"} -->
				<p class="is-style-sub-heading has-primary-500-color has-text-color">03</p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"level":3,"fontSize":"22"} -->
				<h3 class="wp-block-heading has-22-font-size"><?php echo esc_html__( 'Publish and convert', 'aegis' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"textColor":"neutral-600","fontSize":"16"} -->
				<p class="has-neutral-600-color has-text-color has-16-font-size"><?php echo esc_html__( 'Go live with a conversion-ready page that looks sharp on every screen size.', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl","left":"var:preset|spacing|lg","right":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--xl);padding-left:var(--wp--preset--spacing--lg)">
		<!-- wp:heading {"textAlign":"center","fontSize":"36"} -->
		<h2 class="wp-block-heading has-text-align-center has-36-font-size"><?php echo esc_html__( 'Loved by growing teams', 'aegis' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|lg"},"blockGap":{"left":"var:preset|spacing|md"}}}} -->
		<div class="wp-block-columns alignwide" style="margin-top:var(--wp--preset--spacing--lg)">
			<!-- wp:column {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg","right":"var:preset|spacing|lg"}}}} -->
			<div class="wp-block-column is-style-surface" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
				<!-- wp:paragraph {"fontSize":"16","style":{"typography":{"fontStyle":"italic"}}} -->
				<p class="has-16-font-size" style="font-style:italic"><?php echo esc_html__( '“We replaced three tools with one workflow. Launch time dropped from weeks to a single afternoon.”', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"textColor":"neutral-600","fontSize":"14"} -->
				<p class="has-neutral-600-color has-text-color has-14-font-size"><?php echo esc_html__( '— Maya Chen, Head of Product', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg","right":"var:preset|spacing|lg"}}}} -->
			<div class="wp-block-column is-style-surface" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
				<!-- wp:paragraph {"fontSize":"16","style":{"typography":{"fontStyle":"italic"}}} -->
				<p class="has-16-font-size" style="font-style:italic"><?php echo esc_html__( '“The landing patterns feel intentional, not generic. Our conversion rate jumped within the first month.”', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"textColor":"neutral-600","fontSize":"14"} -->
				<p class="has-neutral-600-color has-text-color has-14-font-size"><?php echo esc_html__( '— Jordan Blake, Growth Lead', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg","right":"var:preset|spacing|lg"}}}} -->
			<div class="wp-block-column is-style-surface" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
				<!-- wp:paragraph {"fontSize":"16","style":{"typography":{"fontStyle":"italic"}}} -->
				<p class="has-16-font-size" style="font-style:italic"><?php echo esc_html__( '“Finally a stack our designers and developers both enjoy. Clean markup, clear structure, no clutter.”', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"textColor":"neutral-600","fontSize":"14"} -->
				<p class="has-neutral-600-color has-text-color has-14-font-size"><?php echo esc_html__( '— Sam Rivera, Creative Director', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"anchor":"contact","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl","left":"var:preset|spacing|lg","right":"var:preset|spacing|lg"}}},"backgroundColor":"neutral-50","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignfull has-neutral-50-background-color has-background" id="contact" style="padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--xl);padding-left:var(--wp--preset--spacing--lg)">
		<!-- wp:group {"layout":{"type":"constrained","contentSize":"720px"}} -->
		<div class="wp-block-group">
			<!-- wp:paragraph {"align":"center","className":"is-style-sub-heading"} -->
			<p class="has-text-align-center is-style-sub-heading"><?php echo esc_html__( 'Contact', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"textAlign":"center","fontSize":"36"} -->
			<h2 class="wp-block-heading has-text-align-center has-36-font-size"><?php echo esc_html__( 'Ready to get started?', 'aegis' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center","textColor":"neutral-600","fontSize":"18"} -->
			<p class="has-text-align-center has-neutral-600-color has-text-color has-18-font-size"><?php echo esc_html__( 'Tell us about your project and we’ll follow up within one business day.', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|lg"},"blockGap":{"left":"var:preset|spacing|xl"}}}} -->
		<div class="wp-block-columns alignwide" style="margin-top:var(--wp--preset--spacing--lg)">
			<!-- wp:column {"width":"60%"} -->
			<div class="wp-block-column" style="flex-basis:60%">
				<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg","right":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
				<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
					<!-- wp:heading {"level":3,"fontSize":"24"} -->
					<h3 class="wp-block-heading has-24-font-size"><?php echo esc_html__( 'Send a message', 'aegis' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:html -->
					<form action="#" method="POST" style="display:flex;flex-direction:column;gap:1.5rem">
						<div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem">
							<div>
								<label for="landing-name" style="display:block;margin-bottom:0.5rem;font-weight:500"><?php echo esc_html__( 'Name', 'aegis' ); ?></label>
								<input type="text" id="landing-name" name="name" required style="width:100%;box-sizing:border-box;padding:0.75rem;border:1px solid var(--wp--preset--color--neutral-300);border-radius:6px;background:var(--wp--preset--color--neutral-0);color:inherit" />
							</div>
							<div>
								<label for="landing-email" style="display:block;margin-bottom:0.5rem;font-weight:500"><?php echo esc_html__( 'Email', 'aegis' ); ?></label>
								<input type="email" id="landing-email" name="email" required style="width:100%;box-sizing:border-box;padding:0.75rem;border:1px solid var(--wp--preset--color--neutral-300);border-radius:6px;background:var(--wp--preset--color--neutral-0);color:inherit" />
							</div>
						</div>
						<div>
							<label for="landing-company" style="display:block;margin-bottom:0.5rem;font-weight:500"><?php echo esc_html__( 'Company', 'aegis' ); ?></label>
							<input type="text" id="landing-company" name="company" style="width:100%;box-sizing:border-box;padding:0.75rem;border:1px solid var(--wp--preset--color--neutral-300);border-radius:6px;background:var(--wp--preset--color--neutral-0);color:inherit" />
						</div>
						<div>
							<label for="landing-message" style="display:block;margin-bottom:0.5rem;font-weight:500"><?php echo esc_html__( 'How can we help?', 'aegis' ); ?></label>
							<textarea id="landing-message" name="message" rows="5" required style="width:100%;box-sizing:border-box;padding:0.75rem;border:1px solid var(--wp--preset--color--neutral-300);border-radius:6px;resize:vertical;background:var(--wp--preset--color--neutral-0);color:inherit"></textarea>
						</div>
						<div class="wp-block-buttons">
							<div class="wp-block-button has-custom-width wp-block-button__width-100">
								<button type="submit" class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'Request a Demo', 'aegis' ); ?></button>
							</div>
						</div>
					</form>
					<!-- /wp:html -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"width":"40%"} -->
			<div class="wp-block-column" style="flex-basis:40%">
				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|lg"}},"layout":{"type":"flex","orientation":"vertical"}} -->
				<div class="wp-block-group">
					<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","orientation":"vertical"}} -->
					<div class="wp-block-group">
						<!-- wp:heading {"level":4,"fontSize":"20"} -->
						<h4 class="wp-block-heading has-20-font-size"><?php echo esc_html__( 'Prefer email?', 'aegis' ); ?></h4>
						<!-- /wp:heading -->

						<!-- wp:paragraph {"textColor":"neutral-600"} -->
						<p class="has-neutral-600-color has-text-color"><a href="mailto:hello@example.com">hello@example.com</a></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->

					<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","orientation":"vertical"}} -->
					<div class="wp-block-group">
						<!-- wp:heading {"level":4,"fontSize":"20"} -->
						<h4 class="wp-block-heading has-20-font-size"><?php echo esc_html__( 'Call us', 'aegis' ); ?></h4>
						<!-- /wp:heading -->

						<!-- wp:paragraph {"textColor":"neutral-600"} -->
						<p class="has-neutral-600-color has-text-color"><a href="tel:+15551234567">+1 (555) 123-4567</a></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->

					<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","orientation":"vertical"}} -->
					<div class="wp-block-group">
						<!-- wp:heading {"level":4,"fontSize":"20"} -->
						<h4 class="wp-block-heading has-20-font-size"><?php echo esc_html__( 'Office hours', 'aegis' ); ?></h4>
						<!-- /wp:heading -->

						<!-- wp:paragraph {"textColor":"neutral-600"} -->
						<p class="has-neutral-600-color has-text-color"><?php echo esc_html__( 'Monday – Friday, 9:00 AM – 6:00 PM', 'aegis' ); ?></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"className":"is-style-dark","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl","left":"var:preset|spacing|lg","right":"var:preset|spacing|lg"}}},"layout":{"type":"constrained","contentSize":"720px"}} -->
	<div class="wp-block-group alignfull is-style-dark" style="padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--xl);padding-left:var(--wp--preset--spacing--lg)">
		<!-- wp:heading {"textAlign":"center","textColor":"neutral-950","fontSize":"36"} -->
		<h2 class="wp-block-heading has-text-align-center has-neutral-950-color has-text-color has-36-font-size"><?php echo esc_html__( 'Start building today', 'aegis' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","textColor":"neutral-600","fontSize":"18"} -->
		<p class="has-text-align-center has-neutral-600-color has-text-color has-18-font-size"><?php echo esc_html__( 'Join teams who launch faster with a cleaner, more intentional WordPress foundation.', 'aegis' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|md"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
		<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--md)">
			<!-- wp:button {"fontSize":"18"} -->
			<div class="wp-block-button"><a class="wp-block-button__link has-18-font-size has-custom-font-size wp-element-button" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'Start Free Trial', 'aegis' ); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
