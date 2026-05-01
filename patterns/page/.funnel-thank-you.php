<?php
/**
 * Title: Funnel Thank You Page
 * Slug: funnel-thank-you
 * Categories: page
 * Keywords: funnel, thank you, confirmation, upsell, woocommerce
 * Description: A post-purchase thank you page with order confirmation message, next steps, upsell product grid, and social sharing — uses minimal header/footer.
 * Viewport Width: 1280
 * Block Types: core/post-content
 * Post Types: page
 */
?>

<!-- wp:group {"metadata":{"categories":["page"],"patternName":"funnel-thank-you","name":"Funnel Thank You Page"},"align":"full","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull">

	<!-- wp:pattern {"slug":"header-store-minimal"} /-->

	<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xxl","bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained","contentSize":"640px"}} -->
	<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--xxl);padding-bottom:var(--wp--preset--spacing--lg)">
		<!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
		<div class="wp-block-group">
			<!-- wp:image {"className":"is-style-icon","iconSize":"64px","iconSvgString":"\u003csvg xmlns=\u0022http://www.w3.org/2000/svg\u0022 viewBox=\u00220 0 24 24\u0022 fill=\u0022none\u0022 stroke=\u0022currentColor\u0022 stroke-width=\u00221.5\u0022 stroke-linecap=\u0022round\u0022 stroke-linejoin=\u0022round\u0022\u003e\u003cpath d=\u0022M22 11.08V12a10 10 0 1 1-5.93-9.14\u0022/\u003e\u003cpolyline points=\u002222 4 12 14.01 9 11.01\u0022/\u003e\u003c/svg\u003e"} -->
			<figure class="wp-block-image is-style-icon" style="--wp--custom--icon--color:#22c55e;--wp--custom--icon--size:64px;--wp--custom--icon--url:url('data:image/svg+xml;utf8,<svg xmlns=&quot;http://www.w3.org/2000/svg&quot; viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;1.5&quot; stroke-linecap=&quot;round&quot; stroke-linejoin=&quot;round&quot;><path d=&quot;M22 11.08V12a10 10 0 1 1-5.93-9.14&quot;/><polyline points=&quot;22 4 12 14.01 9 11.01&quot;/></svg>')"><img alt="" /></figure>
			<!-- /wp:image -->

			<!-- wp:heading {"textAlign":"center","level":1,"fontSize":"36"} -->
			<h1 class="wp-block-heading has-text-align-center has-36-font-size"><?php echo esc_html__( 'Thank You for Your Purchase!', 'aegis' ); ?></h1>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center","textColor":"neutral-600","fontSize":"18"} -->
			<p class="aligncenter has-text-align-center has-neutral-600-color has-text-color has-18-font-size aligncenter"><?php echo esc_html__( 'Your order has been confirmed and is being processed. You\'ll receive a confirmation email shortly with your order details.', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"},"margin":{"top":"var:preset|spacing|sm"}},"border":{"radius":"12px"}},"backgroundColor":"neutral-50","layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
			<div class="wp-block-group is-style-surface has-neutral-50-background-color has-background" style="border-radius:12px;margin-top:var(--wp--preset--spacing--sm);padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)">
				<!-- wp:heading {"textAlign":"center","level":3,"fontSize":"20"} -->
				<h3 class="wp-block-heading has-text-align-center has-20-font-size"><?php echo esc_html__( 'What Happens Next?', 'aegis' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","orientation":"vertical"}} -->
				<div class="wp-block-group">
					<!-- wp:paragraph {"fontSize":"16"} -->
					<p class="has-16-font-size"><?php echo esc_html__( '1. Check your email for order confirmation and receipt', 'aegis' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"fontSize":"16"} -->
					<p class="has-16-font-size"><?php echo esc_html__( '2. Your order will be prepared and shipped within 24 hours', 'aegis' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"fontSize":"16"} -->
					<p class="has-16-font-size"><?php echo esc_html__( '3. You\'ll receive a tracking number once your order ships', 'aegis' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->

			<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|sm"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
			<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--sm)">
				<!-- wp:button {"fontSize":"16"} -->
				<div class="wp-block-button has-custom-font-size has-16-font-size"><a class="wp-block-button__link wp-element-button" href="/my-account"><?php echo esc_html__( 'View My Orders', 'aegis' ); ?></a></div>
				<!-- /wp:button -->

				<!-- wp:button {"className":"is-style-outline","fontSize":"16"} -->
				<div class="wp-block-button is-style-outline has-custom-font-size has-16-font-size"><a class="wp-block-button__link wp-element-button" href="/shop"><?php echo esc_html__( 'Continue Shopping', 'aegis' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg"}}},"backgroundColor":"neutral-50","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignfull has-neutral-50-background-color has-background" style="padding-top:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg)">
		<!-- wp:heading {"textAlign":"center","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|xs"}}},"fontSize":"28"} -->
		<h2 class="wp-block-heading has-text-align-center has-28-font-size" style="margin-bottom:var(--wp--preset--spacing--xs)"><?php echo esc_html__( 'You Might Also Like', 'aegis' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","textColor":"neutral-600","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|md"}}},"fontSize":"16"} -->
		<p class="aligncenter has-text-align-center has-neutral-600-color has-text-color has-16-font-size aligncenter" style="margin-bottom:var(--wp--preset--spacing--md)"><?php echo esc_html__( 'Customers who bought this also loved these products.', 'aegis' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:woocommerce/product-collection {"queryId":13,"query":{"perPage":4,"pages":0,"offset":0,"postType":"product","order":"desc","orderBy":"popularity","search":"","exclude":[],"inherit":false,"taxQuery":{},"isProductCollectionBlock":true,"featured":false,"woocommerceOnSale":false,"woocommerceStockStatus":["instock","onbackorder"],"woocommerceAttributes":[],"woocommerceHandPickedProducts":[],"filterable":false},"tagName":"div","displayLayout":{"type":"flex","columns":4,"shrinkColumns":true},"dimensions":{"widthType":"fill"},"queryContextIncludes":["collection"],"align":"wide"} -->
		<div class="wp-block-woocommerce-product-collection alignwide">
			<!-- wp:woocommerce/product-template -->
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"var:preset|spacing|sm","left":"0"}}},"backgroundColor":"white","layout":{"type":"flex","orientation":"vertical"}} -->
			<div class="wp-block-group has-white-background-color has-background" style="padding-top:0;padding-right:0;padding-bottom:var(--wp--preset--spacing--sm);padding-left:0">
				<!-- wp:woocommerce/product-image {"imageSizing":"thumbnail","isDescendentOfQueryLoop":true} /-->

				<!-- wp:post-title {"textAlign":"center","level":3,"isLink":true,"style":{"spacing":{"margin":{"bottom":"0","top":"0"}},"typography":{"lineHeight":"1.4","fontSize":"16px"}},"__woocommerceNamespace":"woocommerce/product-collection/product-title"} /-->

				<!-- wp:woocommerce/product-price {"isDescendentOfQueryLoop":true,"textAlign":"center","style":{"typography":{"fontSize":"16px"}}} /-->

				<!-- wp:group {"style":{"spacing":{"padding":{"left":"var:preset|spacing|sm","right":"var:preset|spacing|sm"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
				<div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
					<!-- wp:woocommerce/product-button {"textAlign":"center","isDescendentOfQueryLoop":true,"fontSize":"small"} /-->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
			<!-- /wp:woocommerce/product-template -->
		</div>
		<!-- /wp:woocommerce/product-collection -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md"}}},"layout":{"type":"constrained","contentSize":"480px"}} -->
	<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md)">
		<!-- wp:heading {"textAlign":"center","level":4,"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|xs"}}},"fontSize":"18"} -->
		<h4 class="wp-block-heading has-text-align-center has-18-font-size" style="margin-bottom:var(--wp--preset--spacing--xs)"><?php echo esc_html__( 'Share Your Purchase', 'aegis' ); ?></h4>
		<!-- /wp:heading -->

		<!-- wp:social-links {"iconColor":"neutral-500","size":"has-normal-icon-size","className":"is-style-logos-only","style":{"spacing":{"blockGap":{"left":"20px"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
		<ul class="wp-block-social-links has-normal-icon-size has-icon-color is-style-logos-only">
			<!-- wp:social-link {"url":"#","service":"facebook"} /-->
			<!-- wp:social-link {"url":"#","service":"x"} /-->
			<!-- wp:social-link {"url":"#","service":"linkedin"} /-->
			<!-- wp:social-link {"url":"#","service":"mail"} /-->
		</ul>
		<!-- /wp:social-links -->
	</div>
	<!-- /wp:group -->

	<!-- wp:pattern {"slug":"footer-store-minimal"} /-->

</div>
<!-- /wp:group -->
