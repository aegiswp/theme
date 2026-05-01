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

				<!-- wp:social-links {"iconColor":"neutral-400","size":"has-small-icon-size","className":"is-style-logos-only","style":{"spacing":{"blockGap":{"left":"16px"}}},"layout":{"type":"flex"}} -->
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
			<ul style="list-style-type:none" class="is-style-none has-14-font-size">
				<!-- wp:list-item -->
				<li><a href="/shop"><?php echo esc_html__( 'All Products', 'aegis' ); ?></a></li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li><a href="/shop?on_sale=true"><?php echo esc_html__( 'On Sale', 'aegis' ); ?></a></li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li><a href="/shop?featured=true"><?php echo esc_html__( 'Featured', 'aegis' ); ?></a></li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li><a href="/shop?orderby=date"><?php echo esc_html__( 'New Arrivals', 'aegis' ); ?></a></li>
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
			<ul style="list-style-type:none" class="is-style-none has-14-font-size">
				<!-- wp:list-item -->
				<li><a href="/contact"><?php echo esc_html__( 'Contact Us', 'aegis' ); ?></a></li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li><a href="/shipping-returns"><?php echo esc_html__( 'Shipping & Returns', 'aegis' ); ?></a></li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li><a href="/faq"><?php echo esc_html__( 'FAQ', 'aegis' ); ?></a></li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li><a href="/my-account"><?php echo esc_html__( 'My Account', 'aegis' ); ?></a></li>
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
				<input type="email" placeholder="<?php echo esc_attr__( 'Your email', 'aegis' ); ?>" style="flex:1;padding:10px 14px;border:1px solid var(--wp--preset--color--neutral-300);border-radius:6px;font-size:14px;background:var(--wp--preset--color--neutral-0);color:inherit" required />
				<button type="submit" style="padding:10px 20px;background:var(--wp--preset--color--primary-500);color:var(--wp--preset--color--neutral-0);border:none;border-radius:6px;font-size:14px;cursor:pointer;white-space:nowrap"><?php echo esc_html__( 'Subscribe', 'aegis' ); ?></button>
			</form>
			<!-- /wp:html -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->

	<!-- wp:separator {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md"}}},"className":"is-style-wide"} -->
	<hr class="wp-block-separator alignwide is-style-wide" style="margin-top:var(--wp--preset--spacing--md);margin-bottom:var(--wp--preset--spacing--md)" />
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

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
		<div class="wp-block-group">
			<!-- wp:html -->
			<svg xmlns="http://www.w3.org/2000/svg" width="38" height="24" viewBox="0 0 48 32" fill="none" role="img" aria-label="Visa"><rect width="48" height="32" rx="4" fill="#1A1F71"/><path d="M19.5 21h-2.7l1.7-10.5h2.7L19.5 21zm-4.8 0h-2.8l-2.5-8.1-.3 1.6-.9 5.3s-.1 1.2-1.3 1.2H3l-.1-.3s1.4-.3 3-1.3l2.5 9.6h2.8l4.3-10.5h-1.8zm20.7-10.5l-2 7.2-.2-1.1-1.2-5.1s-.1-1-1.4-1h-4.3l-.1.3s1.5.3 3 1.5l2.5 8.7h2.8l4.3-10.5h-3.4zm-7.1 10.5h2.6l-2.2-10.5h-2.2c-1 0-1.2.8-1.2.8l-3.8 9.7h2.8l.5-1.5h3.2l.3 1.5z" fill="#fff"/></svg>
			<!-- /wp:html -->

			<!-- wp:html -->
			<svg xmlns="http://www.w3.org/2000/svg" width="38" height="24" viewBox="0 0 48 32" fill="none" role="img" aria-label="Mastercard"><rect width="48" height="32" rx="4" fill="#252525"/><circle cx="19" cy="16" r="8" fill="#EB001B"/><circle cx="29" cy="16" r="8" fill="#F79E1B"/><path d="M24 9.8a8 8 0 0 1 0 12.4 8 8 0 0 1 0-12.4z" fill="#FF5F00"/></svg>
			<!-- /wp:html -->

			<!-- wp:html -->
			<svg xmlns="http://www.w3.org/2000/svg" width="38" height="24" viewBox="0 0 48 32" fill="none" role="img" aria-label="PayPal"><rect width="48" height="32" rx="4" fill="#fff" stroke="#e5e5e5"/><path d="M18.5 8h4.2c2.3 0 3.5 1.2 3.3 3.2-.3 2.8-2.2 4.3-4.5 4.3h-1.1c-.3 0-.6.3-.7.6l-.6 3.5c0 .2-.2.4-.5.4h-2.2c-.3 0-.4-.2-.4-.5l1.5-11c.1-.3.3-.5.6-.5h.4z" fill="#003087"/><path d="M32.5 8h4.2c2.3 0 3.5 1.2 3.3 3.2-.3 2.8-2.2 4.3-4.5 4.3h-1.1c-.3 0-.6.3-.7.6l-.6 3.5c0 .2-.2.4-.5.4h-2.2c-.3 0-.4-.2-.4-.5l1.5-11c.1-.3.3-.5.6-.5h.4z" fill="#0070E0"/></svg>
			<!-- /wp:html -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
