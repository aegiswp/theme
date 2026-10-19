<?php
/**
 * Title: Store Footer Default
 * Slug: store-default
 * Categories: footer
 * Block Types: core/template-part/footer
 * Keywords: footer, store, woocommerce, shop, links, payment
 * Description: A full store footer with shop links, customer service links, payment icons, and newsletter signup.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["footer"],"patternName":"store-default","name":"Store Footer Default"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|md","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"},"margin":{"top":"0","bottom":"0"}},"border":{"top":{"color":"var:preset|color|neutral-200","width":"1px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="border-top-color:var(--wp--preset--color--neutral-200);border-top-width:1px;margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--xs)">
	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|lg"}}}} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"width":"33.33%"} -->
		<div class="wp-block-column" style="flex-basis:33.33%">
			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","orientation":"vertical"}} -->
			<div class="wp-block-group">
				<!-- wp:icon {"icon":"social/aegis","url":"<?php echo esc_url( home_url( '/' ) ); ?>","iconSvgString":"<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\" role=\"img\" aria-labelledby=\"icon-footer-store-aegis\" data-icon=\"social-aegis\" style=\"min-width:35px;height:35px\" fill=\"currentColor\"><title id=\"icon-footer-store-aegis\">Aegis Icon</title><path d=\"M10.06 7.75 L12.02 3.87 L13.95 7.72 L16.65 9.29 L12.03 0 L7.34 9.3 L10.06 7.75 Z M18.37 12.72 L18.2 12.36 L15.5 10.79 L17.02 13.68 L20.05 18.61 L12.02 15.17 L3.98 18.62 L6.96 13.68 L8.39 10.81 L5.67 12.39 L5.5 12.71 L0 22.87 L12.01 16.87 L24 22.94 L18.37 12.72 Z\" stroke=\"none\" fill-rule=\"evenodd\"></path></svg>","style":{"dimensions":{"width":"35px"}}} /-->

				<!-- wp:paragraph {"textColor":"neutral-600","fontSize":"14"} -->
				<p class="has-neutral-600-color has-text-color has-14-font-size"><?php echo esc_html__( 'Quality products with fast shipping and exceptional customer service. Your satisfaction is our priority.', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:social-links {"iconColor":"neutral-600","size":"has-small-icon-size","className":"is-style-logos-only","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|xs"}}},"layout":{"type":"flex"}} -->
				<ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only">
					<!-- wp:social-link {"url":"#","service":"facebook"} /-->
					<!-- wp:social-link {"url":"#","service":"instagram"} /-->
					<!-- wp:social-link {"url":"#","service":"x"} /-->
					<!-- wp:social-link {"url":"#","service":"pinterest"} /-->
				</ul>
				<!-- /wp:social-links -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"16.66%"} -->
		<div class="wp-block-column" style="flex-basis:16.66%">
			<!-- wp:heading {"level":4,"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|xs"}}},"fontSize":"16"} -->
			<h4 class="wp-block-heading has-16-font-size" style="margin-bottom:var(--wp--preset--spacing--xs)"><?php echo esc_html__( 'Shop', 'aegis' ); ?></h4>
			<!-- /wp:heading -->

			<!-- wp:list {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"className":"is-style-none","fontSize":"14"} -->
			<ul class="is-style-none has-14-font-size wp-block-list">
				<!-- wp:list-item -->
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'All Products', 'aegis' ); ?></a></li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'On Sale', 'aegis' ); ?></a></li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'Featured', 'aegis' ); ?></a></li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'New Arrivals', 'aegis' ); ?></a></li>
				<!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"16.66%"} -->
		<div class="wp-block-column" style="flex-basis:16.66%">
			<!-- wp:heading {"level":4,"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|xs"}}},"fontSize":"16"} -->
			<h4 class="wp-block-heading has-16-font-size" style="margin-bottom:var(--wp--preset--spacing--xs)"><?php echo esc_html__( 'Customer Service', 'aegis' ); ?></h4>
			<!-- /wp:heading -->

			<!-- wp:list {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"className":"is-style-none","fontSize":"14"} -->
			<ul class="is-style-none has-14-font-size wp-block-list">
				<!-- wp:list-item -->
				<li><a href="<?php echo esc_url( aegis_url( '/contact/' ) ); ?>"><?php echo esc_html__( 'Contact Us', 'aegis' ); ?></a></li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li><a href="<?php echo esc_url( aegis_url( '/shipping-returns/' ) ); ?>"><?php echo esc_html__( 'Shipping & Returns', 'aegis' ); ?></a></li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li><a href="<?php echo esc_url( aegis_url( '/faq/' ) ); ?>"><?php echo esc_html__( 'FAQ', 'aegis' ); ?></a></li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li><a href="<?php echo esc_url( aegis_wc_page_url( 'myaccount' ) ); ?>"><?php echo esc_html__( 'My Account', 'aegis' ); ?></a></li>
				<!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"33.33%"} -->
		<div class="wp-block-column" style="flex-basis:33.33%">
			<!-- wp:heading {"level":4,"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|xs"}}},"fontSize":"16"} -->
			<h4 class="wp-block-heading has-16-font-size" style="margin-bottom:var(--wp--preset--spacing--xs)"><?php echo esc_html__( 'Stay Connected', 'aegis' ); ?></h4>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"textColor":"neutral-600","fontSize":"14"} -->
			<p class="has-neutral-600-color has-text-color has-14-font-size"><?php echo esc_html__( 'Subscribe for exclusive deals and new arrivals.', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:html -->
			<form class="aegis-store-newsletter" style="display:flex;align-items:center;gap:8px;margin-top:8px">
				<label for="store-footer-email" class="screen-reader-text"><?php echo esc_html__( 'Your email', 'aegis' ); ?></label>
				<input type="email" id="store-footer-email" name="email" placeholder="<?php echo esc_attr__( 'Your email', 'aegis' ); ?>" style="flex:1 1 auto;min-width:0;box-sizing:border-box;height:42px;margin:0;padding:0 14px;border:1px solid var(--wp--preset--color--neutral-300);border-radius:6px;font-size:14px;line-height:42px;background:var(--wp--preset--color--neutral-0);color:inherit;align-self:center" required />
				<button type="submit" style="box-sizing:border-box;flex:0 0 auto;height:42px;margin:0;padding:0 20px;background:var(--wp--preset--color--primary-500);color:var(--wp--preset--color--neutral-0);border:1px solid transparent;border-radius:6px;font-size:14px;line-height:42px;font-weight:600;cursor:pointer;white-space:nowrap;display:inline-flex;align-items:center;justify-content:center;align-self:center"><?php echo esc_html__( 'Subscribe', 'aegis' ); ?></button>
			</form>
			<!-- /wp:html -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->

	<!-- wp:separator {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md"}}},"className":"is-style-wide"} -->
	<hr class="wp-block-separator alignwide is-style-wide has-alpha-channel-opacity" style="margin-top:var(--wp--preset--spacing--md);margin-bottom:var(--wp--preset--spacing--md)" />
	<!-- /wp:separator -->

	<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:group {"style":{"spacing":{"blockGap":"4px"}},"layout":{"type":"flex","flexWrap":"nowrap"},"fontSize":"14"} -->
		<div class="wp-block-group has-14-font-size">
			<!-- wp:paragraph {"textColor":"neutral-600"} -->
			<p class="has-neutral-600-color has-text-color"><?php echo esc_html__( '© Copyright {year}', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:site-title {"level":0,"style":{"typography":{"fontSize":"14px"}},"textColor":"neutral-600"} /-->

			<!-- wp:paragraph {"textColor":"neutral-600"} -->
			<p class="has-neutral-600-color has-text-color"><?php echo esc_html__( '· All rights reserved.', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"aegis-payment-icons","style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
		<div class="wp-block-group aegis-payment-icons">
			<!-- wp:icon {"icon":"payment/visa","ariaLabel":"Visa","style":{"dimensions":{"width":"38px"}}} /-->

			<!-- wp:icon {"icon":"payment/mastercard","ariaLabel":"Mastercard","style":{"dimensions":{"width":"38px"}}} /-->

			<!-- wp:icon {"icon":"payment/paypal","ariaLabel":"PayPal","style":{"dimensions":{"width":"38px"}}} /-->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
