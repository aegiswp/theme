<?php
/**
 * Title: Payment Icons
 * Slug: payment-icons
 * Categories: commerce
 * Keywords: payment, icons, visa, mastercard, paypal, apple pay, google pay
 * Description: Accepted payment method inline SVG icons row — theme-color-adaptive.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["commerce"],"patternName":"payment-icons","name":"Payment Icons"},"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm)">
	<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
	<div class="wp-block-group">
		<!-- wp:paragraph {"align":"center","textColor":"neutral-600","fontSize":"14"} -->
		<p class="aligncenter has-text-align-center has-neutral-600-color has-text-color has-14-font-size aligncenter"><?php echo esc_html__( 'We accept', 'aegis' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|sm","margin":{"top":"var:preset|spacing|xs"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
	<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--xs)">
		<!-- wp:html -->
		<svg xmlns="http://www.w3.org/2000/svg" width="48" height="32" viewBox="0 0 48 32" fill="none" role="img" aria-label="Visa">
			<rect width="48" height="32" rx="4" fill="#1A1F71"/>
			<path d="M19.5 21h-2.7l1.7-10.5h2.7L19.5 21zm-4.8 0h-2.8l-2.5-8.1-.3 1.6-.9 5.3s-.1 1.2-1.3 1.2H3l-.1-.3s1.4-.3 3-1.3l2.5 9.6h2.8l4.3-10.5h-1.8zm20.7-10.5l-2 7.2-.2-1.1-1.2-5.1s-.1-1-1.4-1h-4.3l-.1.3s1.5.3 3 1.5l2.5 8.7h2.8l4.3-10.5h-3.4zm-7.1 10.5h2.6l-2.2-10.5h-2.2c-1 0-1.2.8-1.2.8l-3.8 9.7h2.8l.5-1.5h3.2l.3 1.5z" fill="#fff"/>
		</svg>
		<!-- /wp:html -->

		<!-- wp:html -->
		<svg xmlns="http://www.w3.org/2000/svg" width="48" height="32" viewBox="0 0 48 32" fill="none" role="img" aria-label="Mastercard">
			<rect width="48" height="32" rx="4" fill="#252525"/>
			<circle cx="19" cy="16" r="8" fill="#EB001B"/>
			<circle cx="29" cy="16" r="8" fill="#F79E1B"/>
			<path d="M24 9.8a8 8 0 0 1 0 12.4 8 8 0 0 1 0-12.4z" fill="#FF5F00"/>
		</svg>
		<!-- /wp:html -->

		<!-- wp:html -->
		<svg xmlns="http://www.w3.org/2000/svg" width="48" height="32" viewBox="0 0 48 32" fill="none" role="img" aria-label="American Express">
			<rect width="48" height="32" rx="4" fill="#006FCF"/>
			<path d="M7 13h3l.7 1.6.7-1.6h3v5.5l-2.3-2.8-2.4 2.8H7V13zm1.3 1v1.3h1.8l-1.3 1.5 1.3 1.5h-1.8V19.6h-1.3V14zm5.7 0v5.6h1.3v-2l1.1 2h1.5l-1.3-2.2 1.3-1.8h-1.5l-1.1 1.6V14H14zM24 13l-2 5.6h1.4l.4-1h2.4l.4 1h1.4L26 13h-2zm0 1.4l.8 2.2h-1.6l.8-2.2zM29 13v5.6h1.3v-2h1.1l1.2 2h1.5l-1.3-2.1c.7-.3 1.1-.9 1.1-1.7 0-1.1-.8-1.8-2-1.8H29zm1.3 1h1.2c.5 0 .8.3.8.7s-.3.7-.8.7h-1.2V14zM36 13v5.6h4.5v-1H37.3v-1.2h3v-1h-3V14h3.2v-1H36z" fill="#fff"/>
		</svg>
		<!-- /wp:html -->

		<!-- wp:html -->
		<svg xmlns="http://www.w3.org/2000/svg" width="48" height="32" viewBox="0 0 48 32" fill="none" role="img" aria-label="PayPal">
			<rect width="48" height="32" rx="4" fill="#fff" stroke="#e5e5e5"/>
			<path d="M18.5 8h4.2c2.3 0 3.5 1.2 3.3 3.2-.3 2.8-2.2 4.3-4.5 4.3h-1.1c-.3 0-.6.3-.7.6l-.6 3.5c0 .2-.2.4-.5.4h-2.2c-.3 0-.4-.2-.4-.5l1.5-11c.1-.3.3-.5.6-.5h.4z" fill="#003087"/>
			<path d="M32.5 8h4.2c2.3 0 3.5 1.2 3.3 3.2-.3 2.8-2.2 4.3-4.5 4.3h-1.1c-.3 0-.6.3-.7.6l-.6 3.5c0 .2-.2.4-.5.4h-2.2c-.3 0-.4-.2-.4-.5l1.5-11c.1-.3.3-.5.6-.5h.4z" fill="#0070E0"/>
			<path d="M21 22l.4-2.5.6-3.5c.1-.3.4-.6.7-.6h1.1c2.3 0 4.2-1.5 4.5-4.3.1-.8 0-1.5-.3-2 .8.5 1.2 1.4 1.1 2.5-.3 2.8-2.2 4.3-4.5 4.3h-1.1c-.3 0-.6.3-.7.6l-.6 3.5c0 .2-.2.4-.5.4h-1.5l.8.1z" fill="#003087" opacity=".5"/>
		</svg>
		<!-- /wp:html -->

		<!-- wp:html -->
		<svg xmlns="http://www.w3.org/2000/svg" width="48" height="32" viewBox="0 0 48 32" fill="none" role="img" aria-label="Apple Pay">
			<rect width="48" height="32" rx="4" fill="#000"/>
			<path d="M15.2 10.8c-.5.6-1.3 1-2 1-.1-.8.3-1.6.7-2.1.5-.6 1.3-1 2-1 .1.8-.2 1.6-.7 2.1zm.7 1.1c-1.1-.1-2.1.6-2.6.6s-1.4-.6-2.3-.6c-1.2 0-2.3.7-2.9 1.8-1.2 2.1-.3 5.3.9 7 .6.9 1.3 1.8 2.2 1.8.9 0 1.2-.6 2.3-.6 1 0 1.3.6 2.3.6.9 0 1.6-.9 2.2-1.8.7-1 1-2 1-2-.1 0-1.9-.7-1.9-2.8 0-1.8 1.4-2.6 1.5-2.7-.8-1.2-2.1-1.3-2.6-1.3h-.1zm8.1-.8v10.5h1.6v-3.6h2.2c2 0 3.4-1.4 3.4-3.5s-1.4-3.4-3.3-3.4H24zm1.6 1.3h1.8c1.4 0 2.2.7 2.2 2.1s-.8 2.2-2.2 2.2H25.6v-4.3zm9.7 9.3c1 0 2-.5 2.4-1.3h.1v1.2h1.5V15.9c0-1.5-1.2-2.5-3-2.5-1.7 0-2.9.9-3 2.3h1.4c.2-.6.8-1 1.6-1 1 0 1.6.5 1.6 1.4v.6l-2.1.1c-1.9.1-3 .9-3 2.4 0 1.4 1.1 2.4 2.5 2.4zm.4-1.2c-.9 0-1.4-.4-1.4-1.1 0-.7.5-1.1 1.6-1.2l1.9-.1v.6c0 1-.9 1.8-2.1 1.8zm5.4 3.9c1.5 0 2.2-.6 2.9-2.3l2.7-7.7h-1.6l-1.8 5.8h-.1l-1.8-5.8h-1.7l2.6 7.3-.1.5c-.3.8-.7 1.1-1.4 1.1-.1 0-.4 0-.5-.1v1.2h.8z" fill="#fff"/>
		</svg>
		<!-- /wp:html -->

		<!-- wp:html -->
		<svg xmlns="http://www.w3.org/2000/svg" width="48" height="32" viewBox="0 0 48 32" fill="none" role="img" aria-label="Google Pay">
			<rect width="48" height="32" rx="4" fill="#fff" stroke="#e5e5e5"/>
			<path d="M22.7 16.1v3.1h-1v-7.7h2.6c.6 0 1.2.2 1.7.7.5.4.7 1 .7 1.6 0 .7-.2 1.2-.7 1.6-.5.5-1 .7-1.7.7h-1.6zm0-3.7v2.8h1.7c.4 0 .8-.2 1-.4.3-.3.4-.6.4-1s-.1-.7-.4-1c-.3-.3-.6-.4-1-.4h-1.7zm6.6 1.4c.7 0 1.3.2 1.7.6.4.4.6 1 .6 1.6v3.2h-1v-.7c-.4.6-.9.8-1.5.8-.6 0-1.1-.2-1.5-.5-.4-.3-.5-.8-.5-1.3 0-.5.2-1 .5-1.3.4-.3.8-.5 1.4-.5.5 0 1 .2 1.3.5v-.3c0-.4-.1-.7-.4-.9-.3-.3-.6-.4-1-.4-.6 0-1 .2-1.3.7l-.8-.5c.5-.7 1.2-1 2-1zm-1.1 4.5c.2.2.5.3.9.3.3 0 .7-.1.9-.4.3-.2.4-.5.4-.9-.3-.3-.8-.5-1.3-.5-.4 0-.7.1-1 .3-.2.2-.3.5-.3.8 0 .2.1.3.4.4zm6.7-4.4l-2.5 5.8c-.5 1.2-1.2 1.7-2.1 1.7-.2 0-.5 0-.7-.1v-.9c.2.1.4.1.6.1.5 0 .8-.3 1-.8l.2-.4-2.2-5.4h1.1l1.6 4.2 1.6-4.2h1.4z" fill="#5F6368"/>
			<path d="M21.2 15.5c0-.3 0-.6-.1-.9h-4.4v1.7h2.5c-.1.6-.4 1-1 1.4v1.1h1.5c.9-.8 1.5-2 1.5-3.3z" fill="#4285F4"/>
			<path d="M16.7 18.8c1.3 0 2.4-.4 3.2-1.2l-1.5-1.1c-.4.3-1 .5-1.7.5-1.3 0-2.4-.9-2.8-2h-1.6v1.2c.8 1.5 2.4 2.6 4.4 2.6z" fill="#34A853"/>
			<path d="M13.9 15c0-.4.1-.7.2-1v-1.2h-1.6c-.3.7-.5 1.4-.5 2.2s.2 1.5.5 2.2l1.6-1.2c-.1-.3-.2-.7-.2-1z" fill="#FBBC05"/>
			<path d="M16.7 12c.7 0 1.4.3 1.9.7l1.4-1.4c-.9-.8-2-1.3-3.3-1.3-2 0-3.6 1.1-4.4 2.6l1.6 1.2c.4-1.2 1.5-1.8 2.8-1.8z" fill="#EA4335"/>
		</svg>
		<!-- /wp:html -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
