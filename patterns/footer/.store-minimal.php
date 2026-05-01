<?php
/**
 * Title: Store Footer Minimal
 * Slug: store-minimal
 * Categories: footer
 * Block Types: core/template-part/footer
 * Keywords: footer, store, minimal, funnel, checkout, woocommerce
 * Description: A minimal store footer with copyright, privacy/terms links, and payment icons — ideal for checkout and funnel pages.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["footer"],"patternName":"store-minimal","name":"Store Footer Minimal"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"},"margin":{"top":"0","bottom":"0"}},"border":{"top":{"color":"var:preset|color|neutral-200","width":"1px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="border-top-color:var(--wp--preset--color--neutral-200);border-top-width:1px;margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--xs)">
	<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:group {"style":{"spacing":{"blockGap":"4px"}},"layout":{"type":"flex","flexWrap":"nowrap"},"fontSize":"14"} -->
		<div class="wp-block-group has-14-font-size">
			<!-- wp:paragraph {"textColor":"neutral-600"} -->
			<p class="has-neutral-600-color has-text-color"><?php echo esc_html__( '© Copyright {year}', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:site-title {"level":0,"style":{"typography":{"fontSize":"14px"}},"textColor":"neutral-600"} /-->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","flexWrap":"nowrap"},"fontSize":"14"} -->
		<div class="wp-block-group has-14-font-size">
			<!-- wp:paragraph {"textColor":"neutral-600"} -->
			<p class="has-neutral-600-color has-text-color"><a href="/privacy-policy" style="color:inherit"><?php echo esc_html__( 'Privacy Policy', 'aegis' ); ?></a></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"textColor":"neutral-600"} -->
			<p class="has-neutral-600-color has-text-color"><a href="/terms-and-conditions" style="color:inherit"><?php echo esc_html__( 'Terms & Conditions', 'aegis' ); ?></a></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"textColor":"neutral-600"} -->
			<p class="has-neutral-600-color has-text-color"><a href="/refund-policy" style="color:inherit"><?php echo esc_html__( 'Refund Policy', 'aegis' ); ?></a></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
		<div class="wp-block-group">
			<!-- wp:html -->
			<svg xmlns="http://www.w3.org/2000/svg" width="32" height="20" viewBox="0 0 48 32" fill="none" role="img" aria-label="Visa"><rect width="48" height="32" rx="4" fill="#1A1F71"/><path d="M19.5 21h-2.7l1.7-10.5h2.7L19.5 21zm-4.8 0h-2.8l-2.5-8.1-.3 1.6-.9 5.3s-.1 1.2-1.3 1.2H3l-.1-.3s1.4-.3 3-1.3l2.5 9.6h2.8l4.3-10.5h-1.8zm20.7-10.5l-2 7.2-.2-1.1-1.2-5.1s-.1-1-1.4-1h-4.3l-.1.3s1.5.3 3 1.5l2.5 8.7h2.8l4.3-10.5h-3.4zm-7.1 10.5h2.6l-2.2-10.5h-2.2c-1 0-1.2.8-1.2.8l-3.8 9.7h2.8l.5-1.5h3.2l.3 1.5z" fill="#fff"/></svg>
			<!-- /wp:html -->

			<!-- wp:html -->
			<svg xmlns="http://www.w3.org/2000/svg" width="32" height="20" viewBox="0 0 48 32" fill="none" role="img" aria-label="Mastercard"><rect width="48" height="32" rx="4" fill="#252525"/><circle cx="19" cy="16" r="8" fill="#EB001B"/><circle cx="29" cy="16" r="8" fill="#F79E1B"/><path d="M24 9.8a8 8 0 0 1 0 12.4 8 8 0 0 1 0-12.4z" fill="#FF5F00"/></svg>
			<!-- /wp:html -->

			<!-- wp:html -->
			<svg xmlns="http://www.w3.org/2000/svg" width="32" height="20" viewBox="0 0 48 32" fill="none" role="img" aria-label="PayPal"><rect width="48" height="32" rx="4" fill="#fff" stroke="#e5e5e5"/><path d="M18.5 8h4.2c2.3 0 3.5 1.2 3.3 3.2-.3 2.8-2.2 4.3-4.5 4.3h-1.1c-.3 0-.6.3-.7.6l-.6 3.5c0 .2-.2.4-.5.4h-2.2c-.3 0-.4-.2-.4-.5l1.5-11c.1-.3.3-.5.6-.5h.4z" fill="#003087"/><path d="M32.5 8h4.2c2.3 0 3.5 1.2 3.3 3.2-.3 2.8-2.2 4.3-4.5 4.3h-1.1c-.3 0-.6.3-.7.6l-.6 3.5c0 .2-.2.4-.5.4h-2.2c-.3 0-.4-.2-.4-.5l1.5-11c.1-.3.3-.5.6-.5h.4z" fill="#0070E0"/></svg>
			<!-- /wp:html -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
