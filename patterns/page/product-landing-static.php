<?php
/**
 * Title: Product Landing Page (Static)
 * Slug: product-landing-static
 * Categories: page
 * Keywords: product, landing, static, woocommerce, sales
 * Description: A static product landing page with hero, features, testimonials, trust badges, and CTA — ideal for a single flagship product.
 * Viewport Width: 1280
 * Block Types: core/post-content
 * Post Types: page
 */
?>

<!-- wp:group {"metadata":{"categories":["page"],"patternName":"product-landing-static","name":"Product Landing Page (Static)"},"align":"full","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull">

	<!-- wp:pattern {"slug":"header-store-default"} /-->

	<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xxl","bottom":"var:preset|spacing|xxl"}}},"backgroundColor":"neutral-50","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignfull has-neutral-50-background-color has-background" style="padding-top:var(--wp--preset--spacing--xxl);padding-bottom:var(--wp--preset--spacing--xxl)">
		<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|lg"}}}} -->
		<div class="wp-block-columns alignwide">
			<!-- wp:column {"width":"50%","layout":{"type":"default"}} -->
			<div class="wp-block-column" style="flex-basis:50%">
				<!-- wp:image {"aspectRatio":"4/3","scale":"cover","className":"is-style-rounded","style":{"border":{"radius":"12px"}}} -->
				<figure class="wp-block-image is-style-rounded" style="border-radius:12px"><img alt="" style="aspect-ratio:4/3;object-fit:cover" /></figure>
				<!-- /wp:image -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"width":"50%","verticalAlignment":"center"} -->
			<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">
				<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"2px"}},"textColor":"primary-500","fontSize":"14"} -->
				<p class="has-primary-500-color has-text-color has-14-font-size" style="letter-spacing:2px;text-transform:uppercase"><?php echo esc_html__( 'New Release', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"level":1,"style":{"typography":{"lineHeight":"1.2"}},"fontSize":"42"} -->
				<h1 class="wp-block-heading has-42-font-size" style="line-height:1.2"><?php echo esc_html__( 'The Ultimate Product for Your Needs', 'aegis' ); ?></h1>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"textColor":"neutral-600","fontSize":"18"} -->
				<p class="has-neutral-600-color has-text-color has-18-font-size"><?php echo esc_html__( 'Crafted with precision and designed for performance. Experience the difference that quality makes in every detail.', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs","margin":{"top":"var:preset|spacing|sm"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
				<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--sm)">
					<!-- wp:heading {"level":3,"style":{"typography":{"textDecoration":"line-through"}},"textColor":"neutral-400","fontSize":"20"} -->
					<h3 class="wp-block-heading has-neutral-400-color has-text-color has-20-font-size" style="text-decoration:line-through"><?php echo esc_html__( '$149.99', 'aegis' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:heading {"level":3,"textColor":"primary-500","fontSize":"28"} -->
					<h3 class="wp-block-heading has-primary-500-color has-text-color has-28-font-size"><?php echo esc_html__( '$99.99', 'aegis' ); ?></h3>
					<!-- /wp:heading -->
				</div>
				<!-- /wp:group -->

				<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|sm"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
				<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--sm)">
					<!-- wp:button {"fontSize":"16"} -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#"><?php echo esc_html__( 'Add to Cart', 'aegis' ); ?></a></div>
<!-- /wp:button -->

					<!-- wp:button {"className":"is-style-outline","fontSize":"16"} -->
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

	<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg)">
		<!-- wp:heading {"textAlign":"center","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|md"}}},"fontSize":"32"} -->
		<h2 class="wp-block-heading has-text-align-center has-32-font-size" style="margin-bottom:var(--wp--preset--spacing--md)"><?php echo esc_html__( 'Why You\'ll Love It', 'aegis' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|md"}}}} -->
		<div class="wp-block-columns alignwide">
			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
				<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)">
					<!-- wp:image {"className":"is-style-icon","iconSet":"wordpress","iconName":"color","iconSize":"36px","iconSvgString":"\u003csvg xmlns=\u0022http://www.w3.org/2000/svg\u0022 viewBox=\u00220 0 24 24\u0022 role=\u0022img\u0022 aria-labelledby=\u0022icon-6a2ccd2c1b580\u0022 data-icon=\u0022wordpress-color\u0022 style=\u0022min-width:36px;height:36px\u0022 fill=\u0022currentColor\u0022\u003e\u003ctitle id=\u0022icon-6a2ccd2c1b580\u0022\u003eColor Icon\u003c/title\u003e\u003cpath d=\u0022M17.2 10.9c-.5-1-1.2-2.1-2.1-3.2-.6-.9-1.3-1.7-2.1-2.6L12 4l-1 1.1c-.6.9-1.3 1.7-2 2.6-.8 1.2-1.5 2.3-2 3.2-.6 1.2-1 2.2-1 3 0 3.4 2.7 6.1 6.1 6.1s6.1-2.7 6.1-6.1c0-.8-.3-1.8-1-3zm-5.1 7.6c-2.5 0-4.6-2.1-4.6-4.6 0-.3.1-1 .8-2.3.5-.9 1.1-1.9 2-3.1.7-.9 1.3-1.7 1.8-2.3.7.8 1.3 1.6 1.8 2.3.8 1.1 1.5 2.2 2 3.1.7 1.3.8 2 .8 2.3 0 2.5-2.1 4.6-4.6 4.6z\u0022\u003e\u003c/path\u003e\u003c/svg\u003e"} --><figure class="wp-block-image is-style-icon" style="--wp--custom--icon--size:36px;--wp--custom--icon--url:url('data:image/svg+xml;utf8,<svg xmlns=&quot;http://www.w3.org/2000/svg&quot; viewBox=&quot;0 0 24 24&quot; role=&quot;img&quot; aria-labelledby=&quot;icon-6a2ccd2c1b580&quot; data-icon=&quot;wordpress-color&quot; style=&quot;min-width:36px;height:36px&quot; fill=&quot;currentColor&quot;><title id=&quot;icon-6a2ccd2c1b580&quot;>Color Icon</title><path d=&quot;M17.2 10.9c-.5-1-1.2-2.1-2.1-3.2-.6-.9-1.3-1.7-2.1-2.6L12 4l-1 1.1c-.6.9-1.3 1.7-2 2.6-.8 1.2-1.5 2.3-2 3.2-.6 1.2-1 2.2-1 3 0 3.4 2.7 6.1 6.1 6.1s6.1-2.7 6.1-6.1c0-.8-.3-1.8-1-3zm-5.1 7.6c-2.5 0-4.6-2.1-4.6-4.6 0-.3.1-1 .8-2.3.5-.9 1.1-1.9 2-3.1.7-.9 1.3-1.7 1.8-2.3.7.8 1.3 1.6 1.8 2.3.8 1.1 1.5 2.2 2 3.1.7 1.3.8 2 .8 2.3 0 2.5-2.1 4.6-4.6 4.6z&quot;></path></svg>')"><img alt="" /></figure><!-- /wp:image -->
<!-- wp:heading {"textAlign":"center","level":4,"fontSize":"18"} -->
					<h4 class="wp-block-heading has-text-align-center has-18-font-size"><?php echo esc_html__( 'Premium Quality', 'aegis' ); ?></h4>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"align":"center","textColor":"neutral-600","fontSize":"14"} -->
					<p class="aligncenter has-text-align-center has-neutral-600-color has-text-color has-14-font-size aligncenter"><?php echo esc_html__( 'Made from the finest materials with meticulous attention to every detail.', 'aegis' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
				<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)">
					<!-- wp:image {"className":"is-style-icon","iconSet":"wordpress","iconName":"block-default","iconSize":"36px","iconSvgString":"\u003csvg xmlns=\u0022http://www.w3.org/2000/svg\u0022 viewBox=\u00220 0 24 24\u0022 role=\u0022img\u0022 aria-labelledby=\u0022icon-6a2ccd2c26930\u0022 data-icon=\u0022wordpress-block-default\u0022 style=\u0022min-width:36px;height:36px\u0022 fill=\u0022currentColor\u0022\u003e\u003ctitle id=\u0022icon-6a2ccd2c26930\u0022\u003eBlock Default Icon\u003c/title\u003e\u003cpath d=\u0022M19 8h-1V6h-5v2h-2V6H6v2H5c-1.1 0-2 .9-2 2v8c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2v-8c0-1.1-.9-2-2-2zm.5 10c0 .3-.2.5-.5.5H5c-.3 0-.5-.2-.5-.5v-8c0-.3.2-.5.5-.5h14c.3 0 .5.2.5.5v8z\u0022\u003e\u003c/path\u003e\u003c/svg\u003e"} --><figure class="wp-block-image is-style-icon" style="--wp--custom--icon--size:36px;--wp--custom--icon--url:url('data:image/svg+xml;utf8,<svg xmlns=&quot;http://www.w3.org/2000/svg&quot; viewBox=&quot;0 0 24 24&quot; role=&quot;img&quot; aria-labelledby=&quot;icon-6a2ccd2c26930&quot; data-icon=&quot;wordpress-block-default&quot; style=&quot;min-width:36px;height:36px&quot; fill=&quot;currentColor&quot;><title id=&quot;icon-6a2ccd2c26930&quot;>Block Default Icon</title><path d=&quot;M19 8h-1V6h-5v2h-2V6H6v2H5c-1.1 0-2 .9-2 2v8c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2v-8c0-1.1-.9-2-2-2zm.5 10c0 .3-.2.5-.5.5H5c-.3 0-.5-.2-.5-.5v-8c0-.3.2-.5.5-.5h14c.3 0 .5.2.5.5v8z&quot;></path></svg>')"><img alt="" /></figure><!-- /wp:image -->
<!-- wp:heading {"textAlign":"center","level":4,"fontSize":"18"} -->
					<h4 class="wp-block-heading has-text-align-center has-18-font-size"><?php echo esc_html__( 'Lightning Fast', 'aegis' ); ?></h4>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"align":"center","textColor":"neutral-600","fontSize":"14"} -->
					<p class="aligncenter has-text-align-center has-neutral-600-color has-text-color has-14-font-size aligncenter"><?php echo esc_html__( 'Optimized for speed and performance so you never have to wait.', 'aegis' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
				<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)">
					<!-- wp:image {"className":"is-style-icon","iconSet":"wordpress","iconName":"box","iconSize":"36px","iconSvgString":"\u003csvg xmlns=\u0022http://www.w3.org/2000/svg\u0022 viewBox=\u00220 0 24 24\u0022 role=\u0022img\u0022 aria-labelledby=\u0022icon-6a2ccd2c280a0\u0022 data-icon=\u0022wordpress-box\u0022 style=\u0022min-width:36px;height:36px\u0022 fill=\u0022currentColor\u0022\u003e\u003ctitle id=\u0022icon-6a2ccd2c280a0\u0022\u003eBox Icon\u003c/title\u003e\u003cpath fill-rule=\u0022evenodd\u0022 d=\u0022M5 5.5h14a.5.5 0 0 1 .5.5v1.5a.5.5 0 0 1-.5.5H5a.5.5 0 0 1-.5-.5V6a.5.5 0 0 1 .5-.5zM4 9.232A2 2 0 0 1 3 7.5V6a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v1.5a2 2 0 0 1-1 1.732V18a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9.232zm1.5.268V18a.5.5 0 0 0 .5.5h12a.5.5 0 0 0 .5-.5V9.5h-13z\u0022 clip-rule=\u0022evenodd\u0022\u003e\u003c/path\u003e\u003c/svg\u003e"} --><figure class="wp-block-image is-style-icon" style="--wp--custom--icon--size:36px;--wp--custom--icon--url:url('data:image/svg+xml;utf8,<svg xmlns=&quot;http://www.w3.org/2000/svg&quot; viewBox=&quot;0 0 24 24&quot; role=&quot;img&quot; aria-labelledby=&quot;icon-6a2ccd2c280a0&quot; data-icon=&quot;wordpress-box&quot; style=&quot;min-width:36px;height:36px&quot; fill=&quot;currentColor&quot;><title id=&quot;icon-6a2ccd2c280a0&quot;>Box Icon</title><path fill-rule=&quot;evenodd&quot; d=&quot;M5 5.5h14a.5.5 0 0 1 .5.5v1.5a.5.5 0 0 1-.5.5H5a.5.5 0 0 1-.5-.5V6a.5.5 0 0 1 .5-.5zM4 9.232A2 2 0 0 1 3 7.5V6a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v1.5a2 2 0 0 1-1 1.732V18a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9.232zm1.5.268V18a.5.5 0 0 0 .5.5h12a.5.5 0 0 0 .5-.5V9.5h-13z&quot; clip-rule=&quot;evenodd&quot;></path></svg>')"><img alt="" /></figure><!-- /wp:image -->
<!-- wp:heading {"textAlign":"center","level":4,"fontSize":"18"} -->
					<h4 class="wp-block-heading has-text-align-center has-18-font-size"><?php echo esc_html__( 'Guaranteed', 'aegis' ); ?></h4>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"align":"center","textColor":"neutral-600","fontSize":"14"} -->
					<p class="aligncenter has-text-align-center has-neutral-600-color has-text-color has-14-font-size aligncenter"><?php echo esc_html__( 'Backed by our 30-day money-back guarantee. Zero risk.', 'aegis' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg"}}},"backgroundColor":"neutral-50","layout":{"type":"constrained","contentSize":"800px"}} -->
	<div class="wp-block-group alignfull has-neutral-50-background-color has-background" style="padding-top:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg)">
		<!-- wp:heading {"textAlign":"center","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|md"}}},"fontSize":"32"} -->
		<h2 class="wp-block-heading has-text-align-center has-32-font-size" style="margin-bottom:var(--wp--preset--spacing--md)"><?php echo esc_html__( 'What Our Customers Say', 'aegis' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
		<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)">
			<!-- wp:paragraph {"align":"center","fontSize":"14"} -->
			<p class="aligncenter has-text-align-center has-14-font-size aligncenter">⭐⭐⭐⭐⭐</p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"italic"}},"fontSize":"18"} -->
			<p class="aligncenter has-text-align-center has-18-font-size aligncenter" style="font-style:italic"><?php echo esc_html__( '"This product exceeded all my expectations. The quality is outstanding and the customer service was incredible. Highly recommend!"', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"align":"center","textColor":"neutral-600","fontSize":"14"} -->
			<p class="aligncenter has-text-align-center has-neutral-600-color has-text-color has-14-font-size aligncenter"><?php echo esc_html__( '— Sarah M., Verified Buyer', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->

	<!-- wp:pattern {"slug":"commerce-trust-badges"} /-->

	<!-- wp:pattern {"slug":"commerce-payment-icons"} /-->

	<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg"}}},"backgroundColor":"primary-900","textColor":"white","layout":{"type":"constrained","contentSize":"640px"}} -->
	<div class="wp-block-group alignfull has-white-color has-primary-900-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg)">
		<!-- wp:heading {"textAlign":"center","fontSize":"32"} -->
		<h2 class="wp-block-heading has-text-align-center has-32-font-size"><?php echo esc_html__( 'Ready to Get Started?', 'aegis' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|neutral-200"}}}},"textColor":"neutral-200","fontSize":"16"} -->
		<p class="aligncenter has-text-align-center has-neutral-200-color has-text-color has-link-color has-16-font-size aligncenter"><?php echo esc_html__( 'Join thousands of satisfied customers. Order now and experience the difference.', 'aegis' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|sm"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
		<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--sm)">
			<!-- wp:button {"backgroundColor":"white","textColor":"primary-900","fontSize":"16"} -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button has-white-background-color has-background has-primary-900-color" href="#"><?php echo esc_html__( 'Buy Now — $99.99', 'aegis' ); ?></a></div>
<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->

	<!-- wp:pattern {"slug":"footer-store-default"} /-->

</div>
<!-- /wp:group -->
