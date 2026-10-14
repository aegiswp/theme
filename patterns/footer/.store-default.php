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
				<!-- wp:group {"style":{"spacing":{"blockGap":"4px"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
				<div class="wp-block-group">
					<!-- wp:site-logo {"width":30} /-->
					<!-- wp:site-title {"level":0,"style":{"typography":{"fontSize":"18px","fontWeight":"700"}}} /-->
				</div>
				<!-- /wp:group -->

				<!-- wp:paragraph {"textColor":"neutral-600","fontSize":"14"} -->
				<p class="has-neutral-600-color has-text-color has-14-font-size"><?php echo esc_html__( 'Quality products with fast shipping and exceptional customer service. Your satisfaction is our priority.', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:social-links {"iconColor":"neutral-600","size":"has-small-icon-size","className":"is-style-logos-only","style":{"spacing":{"blockGap":{"left":"16px"}}},"layout":{"type":"flex"}} -->
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
			<form style="display:flex;gap:8px;margin-top:8px">
				<label for="store-footer-draft-email" class="screen-reader-text"><?php echo esc_html__( 'Your email', 'aegis' ); ?></label>
				<input type="email" id="store-footer-draft-email" name="email" placeholder="<?php echo esc_attr__( 'Your email', 'aegis' ); ?>" style="flex:1;padding:10px 14px;border:1px solid var(--wp--preset--color--neutral-300);border-radius:6px;font-size:14px;background:var(--wp--preset--color--neutral-0);color:inherit" required />
				<button type="submit" style="padding:10px 20px;background:var(--wp--preset--color--primary-500);color:var(--wp--preset--color--neutral-0);border:none;border-radius:6px;font-size:14px;cursor:pointer;white-space:nowrap"><?php echo esc_html__( 'Subscribe', 'aegis' ); ?></button>
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
