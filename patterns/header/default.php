<?php
/**
 * Title: Header Default
 * Slug: default
 * Categories: header
 * Block Types: core/template-part/header
 */
?>

<!-- wp:group {"metadata":{"categories":["header"],"patternName":"default"},"align":"full","className":"is-style-default","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"var:preset|spacing|xs","left":"var:preset|spacing|xs"}},"position":{"all":""},"overflow":{"all":"visible"},"display":{"mobile":"","all":""},"top":{"all":""},"right":{"all":""},"bottom":{"all":""},"left":{"all":""},"zIndex":{"all":"99"},"width":{"all":"100%"}},"layout":{"type":"constrained","orientation":"horizontal"}} -->
<div class="wp-block-group alignfull is-style-default"
	style="margin-top:0;margin-bottom:0;padding-right:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)">
	<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide"
		style="padding-top:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs)">
		<!-- wp:group {"style":{"spacing":{"blockGap":"4px"},"zIndex":{"all":"0"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"},"onclick":""} -->
		<div class="wp-block-group">
			<!-- wp:image {"className":"is-style-icon","iconSet":"social","iconName":"aegis","iconSize":"35px","iconSvgString":"\u003csvg xmlns=\u0022http://www.w3.org/2000/svg\u0022 viewBox=\u00220 0 24 24\u0022 fill=\u0022currentColor\u0022 role=\u0022img\u0022 aria-labelledby=\u0022icon-696a106ee5d63\u0022 data-icon=\u0022social-aegis\u0022 width=\u002224\u0022 height=\u002224\u0022\u003e\u003ctitle id=\u0022icon-696a106ee5d63\u0022\u003eAegis Icon\u003c/title\u003e\u003cpath fill-rule=\u0022evenodd\u0022 d=\u0022M10.06 7.75 L12.02 3.87 L13.95 7.72 L16.65 9.29 L12.03 0 L7.34 9.3 L10.06 7.75 Z M18.37 12.72 L18.2 12.36 L15.5 10.79 L17.02 13.68 L20.05 18.61 L12.02 15.17 L3.98 18.62 L6.96 13.68 L8.39 10.81 L5.67 12.39 L5.5 12.71 L0 22.87 L12.01 16.87 L24 22.94 L18.37 12.72 Z\u0022\u003e\u003c/path\u003e\u003c/svg\u003e"} -->
			<figure class="wp-block-image is-style-icon"
				style="--wp--custom--icon--size:35px;--wp--custom--icon--url:url('data:image/svg+xml;utf8,<svg xmlns=&quot;http://www.w3.org/2000/svg&quot; viewBox=&quot;0 0 24 24&quot; fill=&quot;currentColor&quot; role=&quot;img&quot; aria-labelledby=&quot;icon-696a106ee5d63&quot; data-icon=&quot;social-aegis&quot; width=&quot;24&quot; height=&quot;24&quot;&gt;<title id=&quot;icon-696a106ee5d63&quot;&gt;Aegis Icon</title&gt;<path fill-rule=&quot;evenodd&quot; d=&quot;M10.06 7.75 L12.02 3.87 L13.95 7.72 L16.65 9.29 L12.03 0 L7.34 9.3 L10.06 7.75 Z M18.37 12.72 L18.2 12.36 L15.5 10.79 L17.02 13.68 L20.05 18.61 L12.02 15.17 L3.98 18.62 L6.96 13.68 L8.39 10.81 L5.67 12.39 L5.5 12.71 L0 22.87 L12.01 16.87 L24 22.94 L18.37 12.72 Z&quot;&gt;</path&gt;</svg&gt;')">
				<img alt="" /></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right"}} -->
		<div class="wp-block-group">
			<!-- wp:group {"style":{"gridColumnStart":{"all":"3","mobile":"12"},"gridColumnEnd":{"all":"11","mobile":"13"},"gridRowStart":{"all":"1"},"gridRowEnd":{"all":"2"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"right"}} -->
			<div class="wp-block-group">
				<!-- wp:navigation {"ref":"","icon":"menu","metadata":{"ignoredHookedBlocks":["woocommerce/customer-account"]},"style":{"spacing":{"padding":{"top":"var:preset|spacing|xxs","bottom":"var:preset|spacing|xxs"}}},"layout":{"type":"flex","justifyContent":"right"}} /-->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|xs"}},"\u002d\u002dflex-direction":"row-reverse","\u002d\u002dflex-direction-desktop":"row"},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right"}} -->
			<div class="wp-block-group">
				<!-- wp:buttons {"style":{"position":{"all":"fixed"},"top":{"all":"20px"},"right":{"all":"20px"},"zIndex":{"all":"100"},"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}}} -->
				<div class="wp-block-buttons" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0">
					<!-- wp:button {"backgroundColor":"transparent","textColor":"current","className":"search-close","style":{"spacing":{"blockGap":"0","padding":{"top":"6px","right":"6px","bottom":"6px","left":"6px"}},"boxShadow":{"hover":{"color":"#f6f6f9","inset":"inset","spread":"20"},"color":"transparent","inset":"inset","spread":"20"},"display":{"all":"none"}},"fontSize":"14","onclick":"(() =\u003e {\n  const searchToggles = document.querySelectorAll('.search-toggle');\n  const searchCloses = document.querySelectorAll('.search-close');\n  const searchModals = document.querySelectorAll('.search-modal');\n\n  searchModals.forEach((search) =\u003e {\n    search.classList.add('has-display-none');\n  });\n\n  searchToggles.forEach((toggle) =\u003e {\n    toggle.classList.remove('has-display-none');\n    toggle.firstChild.classList.remove('has-display-none');\n  });\n\n  searchCloses.forEach((close) =\u003e {\n    close.classList.add('has-display-none');\n    close.parentElement.classList.add('has-display-none');\n  });\n})();\n","iconSet":"wordpress","iconName":"close","iconSize":"20px","iconPosition":"end","iconSvgString":"\u003csvg xmlns=\u0022http://www.w3.org/2000/svg\u0022 viewBox=\u00220 0 24 24\u0022\u003e\u003cpath d=\u0022m13 11.8 6.1-6.3-1-1-6.1 6.2-6.1-6.2-1 1 6.1 6.3-6.5 6.7 1 1 6.5-6.6 6.5 6.6 1-1z\u0022/\u003e\u003c/svg\u003e"} -->
					<div class="wp-block-button search-close has-box-shadow"
						style="padding-top:6px;padding-right:6px;padding-bottom:6px;padding-left:6px;--wp--custom--box-shadow--inset:inset;--wp--custom--box-shadow--hover--inset:inset;--wp--custom--box-shadow--spread:20px;--wp--custom--box-shadow--hover--spread:20px;--wp--custom--box-shadow--color:transparent;--wp--custom--box-shadow--hover--color:#f6f6f9;--wp--custom--icon--background:var(--wp--preset--color--transparent, currentColor);--wp--custom--icon--color:var(--wp--preset--color--current,currentColor);--wp--custom--icon--padding:6px 6px 6px 6px;--wp--custom--icon--size:20px;--wp--custom--icon--url:url('data:image/svg+xml;utf8,<svg xmlns=&quot;http://www.w3.org/2000/svg&quot; viewBox=&quot;0 0 24 24&quot;&gt;<path d=&quot;m13 11.8 6.1-6.3-1-1-6.1 6.2-6.1-6.2-1 1 6.1 6.3-6.5 6.7 1 1 6.5-6.6 6.5 6.6 1-1z&quot;/&gt;</svg&gt;')">
						<a class="wp-block-button__link has-current-color has-transparent-background-color has-text-color has-background has-14-font-size has-custom-font-size wp-element-button"
							style="padding-top:6px;padding-right:6px;padding-bottom:6px;padding-left:6px"></a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->

				<!-- wp:group {"align":"full","className":"search-modal","style":{"position":{"all":"fixed"},"top":{"all":"0px"},"right":{"all":"0px"},"bottom":{"all":"0px"},"left":{"all":"0px"},"zIndex":{"all":"99"},"width":{"all":"100vw"},"filter":{"blur":"16","backdrop":true},"maxWidth":{"all":"100vw"},"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}},"display":{"all":"none"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center","verticalAlignment":"top"},"onclick":"\n"} -->
				<div class="wp-block-group alignfull search-modal"
					style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm);backdrop-filter:blur(16px)">
					<!-- wp:group {"style":{"width":"","spacing":{"padding":{"top":"var:preset|spacing|xxl"},"margin":{"top":"0"}},"display":"","order":"","maxWidth":"","zIndex":{"all":"1"},"position":{"all":"relative"}},"layout":{"type":"default"}} -->
					<div class="wp-block-group" style="margin-top:0;padding-top:var(--wp--preset--spacing--xxl)">
						<!-- wp:search {"label":"","showLabel":false,"placeholder":"Search this site","width":100,"widthUnit":"%","buttonText":"Search","buttonPosition":"button-inside","buttonUseIcon":true,"style":{"maxWidth":{"all":"90vw"},"width":{"all":"600px"}},"textColor":"currentColor"} /-->
					</div>
					<!-- /wp:group -->
				</div>
				<!-- /wp:group -->

				<!-- wp:buttons {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"},"position":"","top":"","right":"","bottom":"","left":"","zIndex":""},"layout":{"type":"flex","justifyContent":"right","flexWrap":"nowrap"}} -->
				<div class="wp-block-buttons">
					<!-- wp:button {"backgroundColor":"transparent","textColor":"inherit","className":"search-toggle","style":{"spacing":{"blockGap":"0","padding":{"top":"4px","right":"4px","bottom":"4px","left":"4px"}},"boxShadow":{"hover":{"color":"#f6f6f9","inset":"inset","spread":"20"},"color":"transparent","inset":"inset","spread":"20"},"elements":{"link":{"color":{"text":"var:preset|color|inherit"}}}},"fontSize":"14","onclick":"(() =\u003e {\n  const searchCloses = document.querySelectorAll('.search-close');\n  const searchToggles = document.querySelectorAll('.search-toggle');\n  const searchModals = document.querySelectorAll('.search-modal');\n\n  searchModals.forEach((modal) =\u003e {\n    modal.classList.remove('has-display-none');\n  });\n\n  searchToggles.forEach((toggle) =\u003e {\n    toggle.classList.add('has-display-none');\n    toggle.firstChild.classList.add('has-display-none');\n  });\n\n  searchCloses.forEach((close) =\u003e {\n    close.classList.remove('has-display-none');\n    close.parentElement.classList.remove('has-display-none');\n  });\n})();\n","iconSet":"wordpress","iconName":"search","iconSize":"22px","iconPosition":"end","iconSvgString":"\u003csvg xmlns=\u0022http://www.w3.org/2000/svg\u0022 viewBox=\u00220 0 24 24\u0022\u003e\u003cpath d=\u0022M13.5 6C10.5 6 8 8.5 8 11.5c0 1.1.3 2.1.9 3l-3.4 3 1 1.1 3.4-2.9c1 .9 2.2 1.4 3.6 1.4 3 0 5.5-2.5 5.5-5.5C19 8.5 16.5 6 13.5 6zm0 9.5c-2.2 0-4-1.8-4-4s1.8-4 4-4 4 1.8 4 4-1.8 4-4 4z\u0022/\u003e\u003c/svg\u003e"} -->
					<div class="wp-block-button search-toggle has-box-shadow"
						style="padding-top:4px;padding-right:4px;padding-bottom:4px;padding-left:4px;--wp--custom--box-shadow--inset:inset;--wp--custom--box-shadow--hover--inset:inset;--wp--custom--box-shadow--spread:20px;--wp--custom--box-shadow--hover--spread:20px;--wp--custom--box-shadow--color:transparent;--wp--custom--box-shadow--hover--color:#f6f6f9;--wp--custom--icon--background:var(--wp--preset--color--transparent, currentColor);--wp--custom--icon--color:var(--wp--preset--color--inherit,currentColor);--wp--custom--icon--padding:4px 4px 4px 4px;--wp--custom--icon--size:22px;--wp--custom--icon--url:url('data:image/svg+xml;utf8,<svg xmlns=&quot;http://www.w3.org/2000/svg&quot; viewBox=&quot;0 0 24 24&quot;&gt;<path d=&quot;M13.5 6C10.5 6 8 8.5 8 11.5c0 1.1.3 2.1.9 3l-3.4 3 1 1.1 3.4-2.9c1 .9 2.2 1.4 3.6 1.4 3 0 5.5-2.5 5.5-5.5C19 8.5 16.5 6 13.5 6zm0 9.5c-2.2 0-4-1.8-4-4s1.8-4 4-4 4 1.8 4 4-1.8 4-4 4z&quot;/&gt;</svg&gt;')">
						<a class="wp-block-button__link has-inherit-color has-transparent-background-color has-text-color has-background has-link-color has-14-font-size has-custom-font-size wp-element-button"
							style="padding-top:4px;padding-right:4px;padding-bottom:4px;padding-left:4px"></a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->

				<!-- wp:woocommerce/customer-account {"displayStyle":"icon_only","iconStyle":"line","iconClass":"wc-block-customer-account__account-icon","style":{"typography":{"fontSize":"var(\u002d\u002dwp\u002d\u002dpreset\u002d\u002dfont-size\u002d\u002d14)"}}} /-->

				<!-- wp:woocommerce/mini-cart {"style":{"typography":{"fontSize":"var(\u002d\u002dwp\u002d\u002dpreset\u002d\u002dfont-size\u002d\u002d14)"}}} /-->

				<!-- wp:buttons {"style":{"spacing":{"blockGap":"12px"},"display":{"all":""}},"layout":{"type":"flex","justifyContent":"right","flexWrap":"nowrap","orientation":"horizontal"}} -->
				<div class="wp-block-buttons">
					<!-- wp:button {"className":"is-hide-mobile nowrap is-style-ghost","style":{"display":{"mobile":"none","all":"none"},"typography":{"lineHeight":"2"}},"onclick":"","layout":{"orientation":"horizontal"},"size":"small","iconSize":"20","iconPosition":"end"} -->
					<div class="wp-block-button is-hide-mobile nowrap is-style-ghost"><a
							class="wp-block-button__link wp-element-button" style="line-height:2">Subscribe</a></div>
					<!-- /wp:button -->

					<!-- wp:button {"className":"is-hide-mobile nowrap is-style-ghost","style":{"display":{"mobile":"none","all":""},"typography":{"lineHeight":"2"}},"onclick":"","layout":{"orientation":"horizontal"},"size":"small","iconSet":"wordpress","iconName":"comment-author-avatar","iconSize":"20px","iconPosition":"end","iconSvgString":"\u003csvg xmlns=\u0022http://www.w3.org/2000/svg\u0022 viewBox=\u00220 0 24 24\u0022 role=\u0022img\u0022 aria-labelledby=\u0022icon-696a106f33482\u0022 data-icon=\u0022wordpress-comment-author-avatar\u0022 width=\u002224\u0022 height=\u002224\u0022 fill=\u0022currentColor\u0022\u003e\u003ctitle id=\u0022icon-696a106f33482\u0022\u003eComment Author Avatar Icon\u003c/title\u003e\u003cpath fill-rule=\u0022evenodd\u0022 d=\u0022M7.25 16.437a6.5 6.5 0 1 1 9.5 0V16A2.75 2.75 0 0 0 14 13.25h-4A2.75 2.75 0 0 0 7.25 16v.437Zm1.5 1.193a6.47 6.47 0 0 0 3.25.87 6.47 6.47 0 0 0 3.25-.87V16c0-.69-.56-1.25-1.25-1.25h-4c-.69 0-1.25.56-1.25 1.25v1.63ZM4 12a8 8 0 1 1 16 0 8 8 0 0 1-16 0Zm10-2a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z\u0022 clip-rule=\u0022evenodd\u0022\u003e\u003c/path\u003e\u003c/svg\u003e"} -->
					<div class="wp-block-button is-hide-mobile nowrap is-style-ghost"
						style="--wp--custom--icon--size:20px;--wp--custom--icon--url:url('data:image/svg+xml;utf8,<svg xmlns=&quot;http://www.w3.org/2000/svg&quot; viewBox=&quot;0 0 24 24&quot; role=&quot;img&quot; aria-labelledby=&quot;icon-696a106f33482&quot; data-icon=&quot;wordpress-comment-author-avatar&quot; width=&quot;24&quot; height=&quot;24&quot; fill=&quot;currentColor&quot;&gt;<title id=&quot;icon-696a106f33482&quot;&gt;Comment Author Avatar Icon</title&gt;<path fill-rule=&quot;evenodd&quot; d=&quot;M7.25 16.437a6.5 6.5 0 1 1 9.5 0V16A2.75 2.75 0 0 0 14 13.25h-4A2.75 2.75 0 0 0 7.25 16v.437Zm1.5 1.193a6.47 6.47 0 0 0 3.25.87 6.47 6.47 0 0 0 3.25-.87V16c0-.69-.56-1.25-1.25-1.25h-4c-.69 0-1.25.56-1.25 1.25v1.63ZM4 12a8 8 0 1 1 16 0 8 8 0 0 1-16 0Zm10-2a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z&quot; clip-rule=&quot;evenodd&quot;&gt;</path&gt;</svg&gt;')">
						<a class="wp-block-button__link wp-element-button"
							href="https://www.atmostfear-entertainment.com/contact/" style="line-height:2">Log In</a>
					</div>
					<!-- /wp:button -->

					<!-- wp:button {"className":"is-hide-mobile nowrap is-style-fill","style":{"display":{"mobile":"none"},"typography":{"lineHeight":"2"}},"onclick":"","size":"small","iconSet":"wordpress","iconName":"people","iconSize":"20px","iconPosition":"end","iconSvgString":"\u003csvg xmlns=\u0022http://www.w3.org/2000/svg\u0022 viewBox=\u00220 0 24 24\u0022 role=\u0022img\u0022 aria-labelledby=\u0022icon-696a106f6515d\u0022 data-icon=\u0022wordpress-people\u0022 width=\u002224\u0022 height=\u002224\u0022 fill=\u0022currentColor\u0022\u003e\u003ctitle id=\u0022icon-696a106f6515d\u0022\u003ePeople Icon\u003c/title\u003e\u003cpath fill-rule=\u0022evenodd\u0022 d=\u0022M15.5 9.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 1.5a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5zm-2.25 6v-2a2.75 2.75 0 0 0-2.75-2.75h-4A2.75 2.75 0 0 0 3.75 15v2h1.5v-2c0-.69.56-1.25 1.25-1.25h4c.69 0 1.25.56 1.25 1.25v2h1.5zm7-2v2h-1.5v-2c0-.69-.56-1.25-1.25-1.25H15v-1.5h2.5A2.75 2.75 0 0 1 20.25 15zM9.5 8.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm1.5 0a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z\u0022\u003e\u003c/path\u003e\u003c/svg\u003e"} -->
					<div class="wp-block-button is-hide-mobile nowrap is-style-fill"
						style="--wp--custom--icon--size:20px;--wp--custom--icon--url:url('data:image/svg+xml;utf8,<svg xmlns=&quot;http://www.w3.org/2000/svg&quot; viewBox=&quot;0 0 24 24&quot; role=&quot;img&quot; aria-labelledby=&quot;icon-696a106f6515d&quot; data-icon=&quot;wordpress-people&quot; width=&quot;24&quot; height=&quot;24&quot; fill=&quot;currentColor&quot;&gt;<title id=&quot;icon-696a106f6515d&quot;&gt;People Icon</title&gt;<path fill-rule=&quot;evenodd&quot; d=&quot;M15.5 9.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 1.5a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5zm-2.25 6v-2a2.75 2.75 0 0 0-2.75-2.75h-4A2.75 2.75 0 0 0 3.75 15v2h1.5v-2c0-.69.56-1.25 1.25-1.25h4c.69 0 1.25.56 1.25 1.25v2h1.5zm7-2v2h-1.5v-2c0-.69-.56-1.25-1.25-1.25H15v-1.5h2.5A2.75 2.75 0 0 1 20.25 15zM9.5 8.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm1.5 0a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z&quot;&gt;</path&gt;</svg&gt;')">
						<a class="wp-block-button__link wp-element-button"
							href="https://paypal.me/aedonation?locale.x=en_US&amp;country.x=CO" style="line-height:2"
							target="_blank" rel="noreferrer noopener nofollow">Sign Up</a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->

				<!-- wp:buttons {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","justifyContent":"right","flexWrap":"nowrap"}} -->
				<div class="wp-block-buttons">
					<!-- wp:button {"backgroundColor":"transparent","textColor":"inherit","className":"hide-dark-mode is-style-fill","style":{"spacing":{"blockGap":"0","padding":{"top":"6px","right":"6px","bottom":"6px","left":"6px"}},"boxShadow":{"hover":{"color":"#f3f4f6","inset":"inset","spread":"22","blur":"0","y":"0","x":"0"},"color":"transparent","inset":"inset","spread":"22","blur":"0","x":"0","y":"0"}},"fontSize":"14","onclick":"( () =\u003e {\n\tdocument.body.classList.remove( 'is-style-light' );\n\tdocument.body.classList.add( 'is-style-dark' );\n\tdocument.cookie = 'aegisDarkMode=true;path=/;max-age=86400';\n} )();","iconSet":"wordpress","iconName":"moon","iconSize":"22px","iconPosition":"end","iconSvgString":"\u003csvg xmlns=\u0022http://www.w3.org/2000/svg\u0022 viewBox=\u00220 0 24 24\u0022\u003e\u003cpath d=\u0022M17.8 13.5c-2 .5-4.2 0-5.8-1.5s-2.1-3.8-1.5-5.8c.2-.6.4-1.1.7-1.7-.7.1-1.3.3-1.9.5-.9.4-1.8.9-2.6 1.7-2.9 2.9-2.9 7.7 0 10.6 2.9 2.9 7.7 2.9 10.6 0 .8-.8 1.3-1.6 1.7-2.6.2-.6.4-1.3.5-1.9-.5.3-1.1.6-1.7.7zm-1.5 2.7c-2.3 2.3-6.1 2.3-8.5 0-2.3-2.3-2.3-6.1 0-8.5.3-.3.7-.6 1-.8-.2 2.2.5 4.5 2.2 6.1s3.9 2.4 6.1 2.1c-.2.4-.5.8-.8 1.1z\u0022/\u003e\u003c/svg\u003e"} -->
					<div class="wp-block-button hide-dark-mode is-style-fill has-box-shadow"
						style="padding-top:6px;padding-right:6px;padding-bottom:6px;padding-left:6px;--wp--custom--box-shadow--inset:inset;--wp--custom--box-shadow--hover--inset:inset;--wp--custom--box-shadow--x:0px;--wp--custom--box-shadow--hover--x:0px;--wp--custom--box-shadow--y:0px;--wp--custom--box-shadow--hover--y:0px;--wp--custom--box-shadow--blur:0px;--wp--custom--box-shadow--hover--blur:0px;--wp--custom--box-shadow--spread:22px;--wp--custom--box-shadow--hover--spread:22px;--wp--custom--box-shadow--color:transparent;--wp--custom--box-shadow--hover--color:#f3f4f6;--wp--custom--icon--background:var(--wp--preset--color--transparent, currentColor);--wp--custom--icon--color:var(--wp--preset--color--inherit,currentColor);--wp--custom--icon--padding:6px 6px 6px 6px;--wp--custom--icon--size:22px;--wp--custom--icon--url:url('data:image/svg+xml;utf8,<svg xmlns=&quot;http://www.w3.org/2000/svg&quot; viewBox=&quot;0 0 24 24&quot;&gt;<path d=&quot;M17.8 13.5c-2 .5-4.2 0-5.8-1.5s-2.1-3.8-1.5-5.8c.2-.6.4-1.1.7-1.7-.7.1-1.3.3-1.9.5-.9.4-1.8.9-2.6 1.7-2.9 2.9-2.9 7.7 0 10.6 2.9 2.9 7.7 2.9 10.6 0 .8-.8 1.3-1.6 1.7-2.6.2-.6.4-1.3.5-1.9-.5.3-1.1.6-1.7.7zm-1.5 2.7c-2.3 2.3-6.1 2.3-8.5 0-2.3-2.3-2.3-6.1 0-8.5.3-.3.7-.6 1-.8-.2 2.2.5 4.5 2.2 6.1s3.9 2.4 6.1 2.1c-.2.4-.5.8-.8 1.1z&quot;/&gt;</svg&gt;')">
						<a class="wp-block-button__link has-inherit-color has-transparent-background-color has-text-color has-background has-14-font-size has-custom-font-size wp-element-button"
							style="padding-top:6px;padding-right:6px;padding-bottom:6px;padding-left:6px"></a></div>
					<!-- /wp:button -->

					<!-- wp:button {"backgroundColor":"transparent","textColor":"current","className":"hide-light-mode is-style-fill","style":{"spacing":{"blockGap":"0","padding":{"top":"6px","right":"6px","bottom":"6px","left":"6px"}},"boxShadow":{"hover":{"inset":"inset","color":"#f3f4f6","spread":"22","y":"0","x":"0","blur":"0"},"spread":"22","inset":"inset","color":"transparent","blur":"0","y":"0","x":"0"}},"fontSize":"14","onclick":"( () =\u003e {\n\tdocument.body.classList.remove( 'is-style-dark' );\n\tdocument.body.classList.add( 'is-style-light' );\n\tdocument.cookie = 'aegisDarkMode=false;path=/;max-age=86400';\n} )();","shadowPreset":"","shadowPresetHover":"","iconSet":"wordpress","iconName":"shadow","iconSize":"22px","iconPosition":"end","iconSvgString":"\u003csvg xmlns=\u0022http://www.w3.org/2000/svg\u0022 viewBox=\u00220 0 24 24\u0022\u003e\u003cpath d=\u0022M12 8c-2.2 0-4 1.8-4 4s1.8 4 4 4 4-1.8 4-4-1.8-4-4-4zm0 6.5c-1.4 0-2.5-1.1-2.5-2.5s1.1-2.5 2.5-2.5 2.5 1.1 2.5 2.5-1.1 2.5-2.5 2.5zM12.8 3h-1.5v3h1.5V3zm-1.6 18h1.5v-3h-1.5v3zm6.8-9.8v1.5h3v-1.5h-3zm-12 0H3v1.5h3v-1.5zm9.7 5.6 2.1 2.1 1.1-1.1-2.1-2.1-1.1 1.1zM8.3 7.2 6.2 5.1 5.1 6.2l2.1 2.1 1.1-1.1zM5.1 17.8l1.1 1.1 2.1-2.1-1.1-1.1-2.1 2.1zM18.9 6.2l-1.1-1.1-2.1 2.1 1.1 1.1 2.1-2.1z\u0022/\u003e\u003c/svg\u003e"} -->
					<div class="wp-block-button hide-light-mode is-style-fill has-box-shadow"
						style="padding-top:6px;padding-right:6px;padding-bottom:6px;padding-left:6px;--wp--custom--box-shadow--inset:inset;--wp--custom--box-shadow--hover--inset:inset;--wp--custom--box-shadow--x:0px;--wp--custom--box-shadow--hover--x:0px;--wp--custom--box-shadow--y:0px;--wp--custom--box-shadow--hover--y:0px;--wp--custom--box-shadow--blur:0px;--wp--custom--box-shadow--hover--blur:0px;--wp--custom--box-shadow--spread:22px;--wp--custom--box-shadow--hover--spread:22px;--wp--custom--box-shadow--color:transparent;--wp--custom--box-shadow--hover--color:#f3f4f6;--wp--custom--icon--background:var(--wp--preset--color--transparent, currentColor);--wp--custom--icon--color:var(--wp--preset--color--current,currentColor);--wp--custom--icon--padding:6px 6px 6px 6px;--wp--custom--icon--size:22px;--wp--custom--icon--url:url('data:image/svg+xml;utf8,<svg xmlns=&quot;http://www.w3.org/2000/svg&quot; viewBox=&quot;0 0 24 24&quot;&gt;<path d=&quot;M12 8c-2.2 0-4 1.8-4 4s1.8 4 4 4 4-1.8 4-4-1.8-4-4-4zm0 6.5c-1.4 0-2.5-1.1-2.5-2.5s1.1-2.5 2.5-2.5 2.5 1.1 2.5 2.5-1.1 2.5-2.5 2.5zM12.8 3h-1.5v3h1.5V3zm-1.6 18h1.5v-3h-1.5v3zm6.8-9.8v1.5h3v-1.5h-3zm-12 0H3v1.5h3v-1.5zm9.7 5.6 2.1 2.1 1.1-1.1-2.1-2.1-1.1 1.1zM8.3 7.2 6.2 5.1 5.1 6.2l2.1 2.1 1.1-1.1zM5.1 17.8l1.1 1.1 2.1-2.1-1.1-1.1-2.1 2.1zM18.9 6.2l-1.1-1.1-2.1 2.1 1.1 1.1 2.1-2.1z&quot;/&gt;</svg&gt;')">
						<a class="wp-block-button__link has-current-color has-transparent-background-color has-text-color has-background has-14-font-size has-custom-font-size wp-element-button"
							style="padding-top:6px;padding-right:6px;padding-bottom:6px;padding-left:6px"></a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->