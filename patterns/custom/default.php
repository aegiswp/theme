<?php

/**
 * Title: Publication Header
 * Slug: publication
 * Categories: header
 * Block Types: core/template-part/header
 * Viewport Width: 1280
 */
?>
<!-- wp:group {"metadata":{"name":"Custom Header"},"align":"full","style":{"spacing":{"blockGap":"0","margin":{"top":"0","bottom":"0"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0">
<!-- wp:html -->
<style>body{--wp--custom--header--position:relative;--wp--custom--header--top:0px}</style>
<!-- /wp:html -->

<!-- wp:group {"metadata":{"name":"Advertising"},"className":"is-style-surface","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"display":{"all":"none"},"position":{"all":"relative"},"overflow":{"all":"hidden"}},"backgroundColor":"neutral-50","layout":{"type":"constrained","orientation":"horizontal"}} -->
<div class="wp-block-group is-style-surface has-neutral-50-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"},"blockGap":{"top":"0","left":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
<!-- wp:advads/gblock {"itemID":"place_224110","width":"970","height":"250","align":"center"} /-->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Aegis CTA"},"align":"full","className":"is-style-ghost","style":{"display":{"mobile":"none"},"spacing":{"blockGap":"var:preset|spacing|xxs","margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|lg","right":"var:preset|spacing|lg"}},"typography":{"fontStyle":"normal","fontWeight":"600","textTransform":"uppercase","letterSpacing":"0.06em"}},"fontSize":"14","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"},"blockVisibility":{"controlSets":[{"id":1,"enable":true,"controls":{"urlPath":{"doesNotContain":"/aegis/"}}}]}} -->
<div class="wp-block-group alignfull is-style-ghost has-14-font-size" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--lg);font-style:normal;font-weight:600;letter-spacing:0.06em;text-transform:uppercase">
<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center"><?php echo esc_html__( 'Aegis — the WordPress Framework behind this publication.', 'aegis' ); ?> <a href="<?php echo esc_url( home_url( '/aegis/' ) ); ?>"><?php echo esc_html__( 'Explore Aegis', 'aegis' ); ?></a></p>
<!-- /wp:paragraph -->
<!-- wp:icon {"icon":"remixicon/arrow-right-line","style":{"dimensions":{"width":"15px"}}} /-->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Header"},"align":"full","className":"is-style-default","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"var:preset|spacing|xs","left":"var:preset|spacing|xs"},"blockGap":"0"},"overflow":{"all":"visible"}},"backgroundColor":"neutral-0","layout":{"type":"constrained","orientation":"horizontal"}} -->
<div class="wp-block-group alignfull is-style-default has-neutral-0-background-color has-background" style="margin-top:0;margin-bottom:0;padding-right:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)">
<!-- wp:columns {"verticalAlignment":"center","isStackedOnMobile":false,"align":"wide","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs"}},"position":{"all":"relative"},"zIndex":{"all":"1"}}} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center is-not-stacked-on-mobile" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs)">
<!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">
<!-- wp:group {"metadata":{"name":"Socials"},"style":{"spacing":{"blockGap":"var:preset|spacing|xs"},"display":{"mobile":"none"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/facebook-circle-line","url":"https://www.facebook.com/aeculture","linkTarget":"_blank","rel":"noopener","ariaLabel":"Facebook","style":{"dimensions":{"width":"16px"}}} /-->
<!-- wp:icon {"icon":"remixicon/bluesky-line","url":"https://bsky.app/profile/atmostfear.bsky.social","linkTarget":"_blank","rel":"noopener","ariaLabel":"Bluesky","style":{"dimensions":{"width":"16px"}}} /-->
<!-- wp:icon {"icon":"remixicon/instagram-line","url":"https://www.instagram.com/atmostfear_entertainment/","linkTarget":"_blank","rel":"noopener","ariaLabel":"Instagram","style":{"dimensions":{"width":"16px"}}} /-->
<!-- wp:icon {"icon":"remixicon/github-line","url":"https://github.com/aegiswp","linkTarget":"_blank","rel":"noopener","ariaLabel":"GitHub","style":{"dimensions":{"width":"16px"}}} /-->
</div>
<!-- /wp:group -->

<!-- wp:buttons {"metadata":{"name":"Menu Toggle"},"style":{"display":{"desktop":"none"},"spacing":{"margin":{"top":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
<div class="wp-block-buttons" style="margin-top:0">
<!-- wp:button {"backgroundColor":"transparent","textColor":"current","className":"mobile-menu-toggle","ariaLabel":"Open menu","style":{"spacing":{"blockGap":"0","padding":{"top":"4px","right":"4px","bottom":"4px","left":"4px"}}},"fontSize":"14","onclick":"(() =\u003e {\n  const menus = document.querySelectorAll('.mobile-menu');\n\n  menus.forEach((menu) =\u003e {\n    menu.classList.remove('has-display-none');\n    menu.setAttribute('role', 'dialog');\n    menu.setAttribute('aria-modal', 'true');\n    menu.setAttribute('aria-label', 'Menu');\n    menu.style.overflowY = 'auto';\n  });\n\n  document.documentElement.style.overflow = 'hidden';\n\n  if (!window.aegisMobileMenuEscape) {\n    window.aegisMobileMenuEscape = true;\n    document.addEventListener('keydown', (event) =\u003e {\n      const open = document.querySelector('.mobile-menu:not(.has-display-none)');\n      const close = document.querySelector('.mobile-menu-close button, .mobile-menu-close a');\n      if (event.key !== 'Escape' || !open) return;\n      if (close) close.click();\n    });\n  }\n\n  const close = document.querySelector('.mobile-menu-close button, .mobile-menu-close a');\n  if (close) close.focus();\n})();\n","iconSet":"remixicon","iconName":"menu-line","iconSize":"24px","iconPosition":"end","iconSvgString":"\u003csvg viewBox=\u00220 0 24 24\u0022 fill=\u0022currentColor\u0022 xmlns=\u0022http://www.w3.org/2000/svg\u0022\u003e\u003cpath d=\u0022M3 4H21V6H3V4ZM3 11H21V13H3V11ZM3 18H21V20H3V18Z\u0022/\u003e\u003c/svg\u003e"} /-->
</div>
<!-- /wp:buttons -->
</div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"33%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:33%">
<!-- wp:group {"metadata":{"name":"Logo"},"style":{"spacing":{"blockGap":"4px"},"zIndex":{"all":"0"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group">
<!-- wp:image {"lightbox":{"enabled":false},"width":"55px","linkDestination":"custom","className":"is-style-svg","style":{"svgString":"\u003csvg xmlns=\u0022http://www.w3.org/2000/svg\u0022 viewBox=\u00220 0 216.5 187.5\u0022\u003e\n  \u003cpolygon fill=\u0022currentColor\u0022 points=\u0022171.9 110.3 162.2 93.6 142.7 59.8 133 76.2 143.2 93.6 123.5 93.6 114 110.3 152.7 110.3 187.5 170.7 79.2 170.7 69.2 187.4 216.5 187.4 171.9 110.3\u0022/\u003e\n  \u003cpolygon fill=\u0022currentColor\u0022 points=\u002294.5 110.3 104 93.6 73.3 93.6 108.1 33.2 123.5 59.8 133.2 43.4 108.1 .1 54.1 93.6 44.6 110.3 0 187.4 50 187.4 59.7 170.7 28.7 170.7 63.8 110.3 94.5 110.3\u0022/\u003e\n\u003c/svg\u003e","width":{"all":"55px","mobile":"45px"}}} -->
<figure class="wp-block-image is-resized is-style-svg"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="data:image/svg+xml;utf8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20216.5%20187.5%22%3E%0A%20%20%3Cpolygon%20fill%3D%22currentColor%22%20points%3D%22171.9%20110.3%20162.2%2093.6%20142.7%2059.8%20133%2076.2%20143.2%2093.6%20123.5%2093.6%20114%20110.3%20152.7%20110.3%20187.5%20170.7%2079.2%20170.7%2069.2%20187.4%20216.5%20187.4%20171.9%20110.3%22%2F%3E%0A%20%20%3Cpolygon%20fill%3D%22currentColor%22%20points%3D%2294.5%20110.3%20104%2093.6%2073.3%2093.6%20108.1%2033.2%20123.5%2059.8%20133.2%2043.4%20108.1%20.1%2054.1%2093.6%2044.6%20110.3%200%20187.4%2050%20187.4%2059.7%20170.7%2028.7%20170.7%2063.8%20110.3%2094.5%20110.3%22%2F%3E%0A%3C%2Fsvg%3E" alt="<?php echo esc_attr__( 'Atmostfear Entertainment', 'aegis' ); ?>" style="width:55px;height:auto"/></a></figure>
<!-- /wp:image -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">
<!-- wp:group {"metadata":{"name":"Actions"},"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|xs"}},"\u002d\u002dflex-direction":"row-reverse","\u002d\u002dflex-direction-desktop":"row"},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right"}} -->
<div class="wp-block-group">
<!-- wp:buttons {"style":{"position":{"all":"fixed"},"top":{"all":"20px"},"right":{"all":"20px"},"zIndex":{"all":"100"},"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}}} -->
<div class="wp-block-buttons" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0">
<!-- wp:button {"backgroundColor":"transparent","textColor":"current","className":"search-close","ariaLabel":"Close search","style":{"spacing":{"blockGap":"0","padding":{"top":"6px","right":"6px","bottom":"6px","left":"6px"}},"boxShadow":{"hover":{"color":"var:preset|color|neutral-100","inset":"inset","spread":"20"},"color":"transparent","inset":"inset","spread":"20"},"display":{"all":"none"}},"fontSize":"14","onclick":"(() =\u003e {\n  const searchToggles = document.querySelectorAll('.search-toggle');\n  const searchCloses = document.querySelectorAll('.search-close');\n  const searchModals = document.querySelectorAll('.search-modal');\n\n  searchModals.forEach((modal) =\u003e {\n    modal.classList.add('has-display-none');\n    modal.setAttribute('aria-hidden', 'true');\n  });\n\n  searchToggles.forEach((toggle) =\u003e {\n    toggle.classList.remove('has-display-none');\n    toggle.firstChild.classList.remove('has-display-none');\n  });\n\n  searchCloses.forEach((close) =\u003e {\n    close.classList.add('has-display-none');\n    close.parentElement.classList.add('has-display-none');\n  });\n\n  const opener = document.querySelector('.search-toggle button, .search-toggle a');\n  if (opener) opener.focus();\n})();\n","iconSet":"remixicon","iconName":"close-line","iconSize":"20px","iconPosition":"end","iconSvgString":"\u003csvg viewBox=\u00220 0 24 24\u0022 fill=\u0022currentColor\u0022 xmlns=\u0022http://www.w3.org/2000/svg\u0022\u003e\u003cpath d=\u0022M11.9997 10.5865L16.9495 5.63672L18.3637 7.05093L13.4139 12.0007L18.3637 16.9504L16.9495 18.3646L11.9997 13.4149L7.04996 18.3646L5.63574 16.9504L10.5855 12.0007L5.63574 7.05093L7.04996 5.63672L11.9997 10.5865Z\u0022/\u003e\u003c/svg\u003e"} /-->
</div>
<!-- /wp:buttons -->

<!-- wp:group {"align":"full","className":"search-modal","style":{"position":{"all":"fixed"},"top":{"all":"0px"},"right":{"all":"0px"},"bottom":{"all":"0px"},"left":{"all":"0px"},"zIndex":{"all":"99"},"width":{"all":"100vw"},"filter":{"blur":"16","backdrop":true},"maxWidth":{"all":"100vw"},"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}},"display":{"all":"none"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center","verticalAlignment":"top"}} -->
<div class="wp-block-group alignfull search-modal" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm);backdrop-filter:blur(16px)">
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xxl"},"margin":{"top":"0"}},"zIndex":{"all":"1"},"position":{"all":"relative"}},"layout":{"type":"default"}} -->
<div class="wp-block-group" style="margin-top:0;padding-top:var(--wp--preset--spacing--xxl)">
<!-- wp:search {"label":"Search","showLabel":false,"placeholder":"Search this site","width":100,"widthUnit":"%","buttonText":"Search","buttonPosition":"button-inside","buttonUseIcon":true,"style":{"maxWidth":{"all":"90vw"},"width":{"all":"600px"}},"textColor":"current"} /-->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:buttons {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","justifyContent":"right","flexWrap":"nowrap"}} -->
<div class="wp-block-buttons">
<!-- wp:button {"backgroundColor":"transparent","textColor":"inherit","className":"search-toggle","ariaLabel":"Open search","style":{"spacing":{"blockGap":"0","padding":{"top":"6px","right":"6px","bottom":"6px","left":"6px"}},"boxShadow":{"hover":{"color":"var:preset|color|neutral-100","inset":"inset","spread":"20"},"color":"transparent","inset":"inset","spread":"20"},"elements":{"link":{"color":{"text":"var:preset|color|inherit"}}}},"fontSize":"14","onclick":"(() =\u003e {\n  const searchCloses = document.querySelectorAll('.search-close');\n  const searchToggles = document.querySelectorAll('.search-toggle');\n  const searchModals = document.querySelectorAll('.search-modal');\n\n  searchModals.forEach((modal) =\u003e {\n    modal.classList.remove('has-display-none');\n    modal.setAttribute('aria-hidden', 'false');\n  });\n\n  searchToggles.forEach((toggle) =\u003e {\n    toggle.classList.add('has-display-none');\n    toggle.firstChild.classList.add('has-display-none');\n  });\n\n  searchCloses.forEach((close) =\u003e {\n    close.classList.remove('has-display-none');\n    close.parentElement.classList.remove('has-display-none');\n  });\n\n  const input = document.querySelector('.search-modal input');\n  if (input) input.focus();\n})();\n","iconSet":"remixicon","iconName":"search-eye-line","iconSize":"16px","iconPosition":"end","iconSvgString":"\u003csvg viewBox=\u00220 0 24 24\u0022 fill=\u0022currentColor\u0022 xmlns=\u0022http://www.w3.org/2000/svg\u0022\u003e\u003cpath d=\u0022M18.031 16.6168L22.3137 20.8995L20.8995 22.3137L16.6168 18.031C15.0769 19.263 13.124 20 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2C15.968 2 20 6.032 20 11C20 13.124 19.263 15.0769 18.031 16.6168ZM16.0247 15.8748C17.2475 14.6146 18 12.8956 18 11C18 7.1325 14.8675 4 11 4C7.1325 4 4 7.1325 4 11C4 14.8675 7.1325 18 11 18C12.8956 18 14.6146 17.2475 15.8748 16.0247L16.0247 15.8748ZM12.1779 7.17624C11.4834 7.48982 11 8.18846 11 9C11 10.1046 11.8954 11 13 11C13.8115 11 14.5102 10.5166 14.8238 9.82212C14.9383 10.1945 15 10.59 15 11C15 13.2091 13.2091 15 11 15C8.79086 15 7 13.2091 7 11C7 8.79086 8.79086 7 11 7C11.41 7 11.8055 7.06167 12.1779 7.17624Z\u0022/\u003e\u003c/svg\u003e"} /-->
</div>
<!-- /wp:buttons -->

<!-- wp:buttons {"style":{"spacing":{"blockGap":"12px"},"display":{"mobile":"none"}},"layout":{"type":"flex","justifyContent":"right","flexWrap":"nowrap","orientation":"horizontal"}} -->
<div class="wp-block-buttons">
<!-- wp:button {"className":"is-hide-mobile nowrap is-style-ghost","style":{"display":{"mobile":"none"},"typography":{"lineHeight":"2"}},"size":"small","iconSet":"remixicon","iconName":"brain-2-line","iconSize":"16px","iconPosition":"end","iconSvgString":"\u003csvg viewBox=\u00220 0 24 24\u0022 fill=\u0022currentColor\u0022 xmlns=\u0022http://www.w3.org/2000/svg\u0022\u003e\u003cpath d=\u0022M7 6C7 6.23676 7.04072 6.46184 7.11469 6.66999C7.22686 6.98559 7.17357 7.33638 6.97276 7.60444C6.77194 7.8725 6.45026 8.02222 6.11585 8.00327C6.0776 8.0011 6.03898 8 6 8C4.89543 8 4 8.89543 4 10C4 10.5129 4.19174 10.9786 4.50903 11.3331C4.84885 11.7128 4.84885 12.2872 4.50903 12.6669C4.19174 13.0214 4 13.4871 4 14C4 14.8842 4.57447 15.6369 5.37327 15.9001C5.84924 16.057 6.1356 16.5419 6.04308 17.0345C6.01489 17.1846 6 17.3401 6 17.5C6 18.8807 7.11929 20 8.5 20C9.75862 20 10.8015 19.069 10.9746 17.8583C10.9806 17.8165 10.9891 17.7756 11 17.7358V6C11 4.89543 10.1046 4 9 4C7.89543 4 7 4.89543 7 6ZM13 17.7358C13.0109 17.7756 13.0194 17.8165 13.0254 17.8583C13.1985 19.069 14.2414 20 15.5 20C16.8807 20 18 18.8807 18 17.5C18 17.3401 17.9851 17.1846 17.9569 17.0345C17.8644 16.5419 18.1508 16.057 18.6267 15.9001C19.4255 15.6369 20 14.8842 20 14C20 13.4871 19.8083 13.0214 19.491 12.6669C19.1511 12.2872 19.1511 11.7128 19.491 11.3331C19.8083 10.9786 20 10.5129 20 10C20 8.89543 19.1046 8 18 8C17.961 8 17.9224 8.0011 17.8841 8.00327C17.5497 8.02222 17.2281 7.8725 17.0272 7.60444C16.8264 7.33638 16.7731 6.98559 16.8853 6.66999C16.9593 6.46184 17 6.23676 17 6C17 4.89543 16.1046 4 15 4C13.8954 4 13 4.89543 13 6V17.7358ZM9 2C10.1947 2 11.2671 2.52376 12 3.35418C12.7329 2.52376 13.8053 2 15 2C17.2091 2 19 3.79086 19 6C19 6.04198 18.9994 6.08382 18.9981 6.12552C20.7243 6.56889 22 8.13546 22 10C22 10.728 21.8049 11.4116 21.4646 12C21.8049 12.5884 22 13.272 22 14C22 15.4817 21.1949 16.7734 19.9999 17.4646L20 17.5C20 19.9853 17.9853 22 15.5 22C14.0859 22 12.8248 21.3481 12 20.3285C11.1752 21.3481 9.91405 22 8.5 22C6.01472 22 4 19.9853 4 17.5L4.00014 17.4646C2.80512 16.7734 2 15.4817 2 14C2 13.272 2.19513 12.5884 2.53536 12C2.19513 11.4116 2 10.728 2 10C2 8.13546 3.27573 6.56889 5.00194 6.12552C5.00065 6.08382 5 6.04198 5 6C5 3.79086 6.79086 2 9 2Z\u0022/\u003e\u003c/svg\u003e"} -->
<div class="wp-block-button is-hide-mobile nowrap is-style-ghost"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" style="line-height:2"><?php echo esc_html__( 'Contact', 'aegis' ); ?></a></div>
<!-- /wp:button -->
<!-- wp:button {"className":"is-hide-mobile nowrap is-style-fill","style":{"display":{"mobile":"none"},"typography":{"lineHeight":"2"}},"size":"small","iconSet":"remixicon","iconName":"heart-pulse-line","iconSize":"16px","iconPosition":"end","iconSvgString":"\u003csvg viewBox=\u00220 0 24 24\u0022 fill=\u0022currentColor\u0022 xmlns=\u0022http://www.w3.org/2000/svg\u0022\u003e\u003cpath d=\u0022M16.5 3C19.5376 3 22 5.5 22 9C22 16 14.5 20 12 21.5C10.0226 20.3135 4.91699 17.563 2.86894 13.001L1 13V11L2.21045 11.0009C2.07425 10.3633 2 9.69651 2 9C2 5.5 4.5 3 7.5 3C9.35997 3 11 4 12 5C13 4 14.64 3 16.5 3ZM16.5 5C15.4241 5 14.2593 5.56911 13.4142 6.41421L12 7.82843L10.5858 6.41421C9.74068 5.56911 8.5759 5 7.5 5C5.55906 5 4 6.6565 4 9C4 9.68542 4.09035 10.3516 4.26658 11.0004L6.43381 11L8.5 7.55635L11.5 12.5563L12.4338 11H17V13H13.5662L11.5 16.4437L8.5 11.4437L7.56619 13L5.10789 13.0006C5.89727 14.3737 7.09304 15.6681 8.64514 16.9029C9.39001 17.4955 10.1845 18.0485 11.0661 18.6038C11.3646 18.7919 11.6611 18.9729 12 19.1752C12.3389 18.9729 12.6354 18.7919 12.9339 18.6038C13.8155 18.0485 14.61 17.4955 15.3549 16.9029C18.3337 14.533 20 11.9435 20 9C20 6.64076 18.463 5 16.5 5Z\u0022/\u003e\u003c/svg\u003e"} -->
<div class="wp-block-button is-hide-mobile nowrap is-style-fill"><a class="wp-block-button__link wp-element-button" href="https://paypal.me/aedonation" target="_blank" rel="noreferrer noopener" style="line-height:2"><?php echo esc_html__( 'Sponsor', 'aegis' ); ?></a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->

<!-- wp:buttons {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","justifyContent":"right","flexWrap":"nowrap"}} -->
<div class="wp-block-buttons">
<!-- wp:button {"backgroundColor":"transparent","textColor":"inherit","className":"hide-dark-mode is-style-fill","ariaLabel":"Switch to dark mode","style":{"spacing":{"blockGap":"0","padding":{"top":"6px","right":"6px","bottom":"6px","left":"6px"}},"boxShadow":{"hover":{"color":"var:preset|color|neutral-100","inset":"inset","spread":"22","blur":"0","y":"0","x":"0"},"color":"transparent","inset":"inset","spread":"22","blur":"0","x":"0","y":"0"}},"fontSize":"14","onclick":"( () =\u003e {\n\tdocument.body.classList.remove( 'is-style-light' );\n\tdocument.body.classList.add( 'is-style-dark' );\n\tdocument.cookie = 'aegisDarkMode=true;path=/;max-age=86400;SameSite=Lax';\n} )()","iconSet":"remixicon","iconName":"moon-line","iconSize":"16px","iconPosition":"end","iconSvgString":"\u003csvg viewBox=\u00220 0 24 24\u0022 fill=\u0022currentColor\u0022 xmlns=\u0022http://www.w3.org/2000/svg\u0022\u003e\u003cpath d=\u0022M10 7C10 10.866 13.134 14 17 14C18.9584 14 20.729 13.1957 21.9995 11.8995C22 11.933 22 11.9665 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C12.0335 2 12.067 2 12.1005 2.00049C10.8043 3.27098 10 5.04157 10 7ZM4 12C4 16.4183 7.58172 20 12 20C15.0583 20 17.7158 18.2839 19.062 15.7621C18.3945 15.9187 17.7035 16 17 16C12.0294 16 8 11.9706 8 7C8 6.29648 8.08133 5.60547 8.2379 4.938C5.71611 6.28423 4 8.9417 4 12Z\u0022/\u003e\u003c/svg\u003e"} /-->
<!-- wp:button {"backgroundColor":"transparent","textColor":"current","className":"hide-light-mode is-style-fill","ariaLabel":"Switch to light mode","style":{"spacing":{"blockGap":"0","padding":{"top":"6px","right":"6px","bottom":"6px","left":"6px"}},"boxShadow":{"hover":{"inset":"inset","color":"var:preset|color|neutral-100","spread":"22","y":"0","x":"0","blur":"0"},"spread":"22","inset":"inset","color":"transparent","blur":"0","y":"0","x":"0"}},"fontSize":"14","onclick":"( () =\u003e {\n\tdocument.body.classList.remove( 'is-style-dark' );\n\tdocument.body.classList.add( 'is-style-light' );\n\tdocument.cookie = 'aegisDarkMode=false;path=/;max-age=86400;SameSite=Lax';\n} )()","iconSet":"remixicon","iconName":"sun-line","iconSize":"16px","iconPosition":"end","iconSvgString":"\u003csvg viewBox=\u00220 0 24 24\u0022 fill=\u0022currentColor\u0022 xmlns=\u0022http://www.w3.org/2000/svg\u0022\u003e\u003cpath d=\u0022M12 18C8.68629 18 6 15.3137 6 12C6 8.68629 8.68629 6 12 6C15.3137 6 18 8.68629 18 12C18 15.3137 15.3137 18 12 18ZM12 16C14.2091 16 16 14.2091 16 12C16 9.79086 14.2091 8 12 8C9.79086 8 8 9.79086 8 12C8 14.2091 9.79086 16 12 16ZM11 1H13V4H11V1ZM11 20H13V23H11V20ZM3.51472 4.92893L4.92893 3.51472L7.05025 5.63604L5.63604 7.05025L3.51472 4.92893ZM16.9497 18.364L18.364 16.9497L20.4853 19.0711L19.0711 20.4853L16.9497 18.364ZM19.0711 3.51472L20.4853 4.92893L18.364 7.05025L16.9497 5.63604L19.0711 3.51472ZM5.63604 16.9497L7.05025 18.364L4.92893 20.4853L3.51472 19.0711L5.63604 16.9497ZM23 11V13H20V11H23ZM4 11V13H1V11H4Z\u0022/\u003e\u003c/svg\u003e"} /-->
</div>
<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->

<!-- wp:group {"metadata":{"name":"Navigation Bar"},"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|xxs","bottom":"var:preset|spacing|xxs"}},"border":{"top":{"color":"#71717a3b","style":"solid","width":"1px"}},"display":{"mobile":"none"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="border-top-color:#71717a3b;border-top-style:solid;border-top-width:1px;margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--xxs);padding-bottom:var(--wp--preset--spacing--xxs)">
<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group alignwide">
<!-- wp:navigation {"overlayMenu":"never","icon":"menu","metadata":{"ignoredHookedBlocks":["woocommerce/customer-account"]},"style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs"}},"typography":{"fontStyle":"normal","fontWeight":"400"}},"fontSize":"16","layout":{"type":"flex","justifyContent":"center","flexWrap":"wrap"}} /-->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Mobile Menu"},"className":"mobile-menu","style":{"width":{"all":"100vw"},"maxWidth":{"all":"100vw"},"position":{"all":"fixed"},"top":{"all":"var(--wp-admin--admin-bar--height, 0px)"},"right":{"all":"auto"},"bottom":{"all":"0px"},"left":{"all":"0px"},"zIndex":{"all":"100"},"display":{"all":"none","desktop":"none"},"spacing":{"blockGap":"var:preset|spacing|sm","margin":{"top":"0","bottom":"0"},"padding":{"top":"0","right":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs"}}},"backgroundColor":"neutral-0","textColor":"neutral-900","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
<div class="wp-block-group mobile-menu has-neutral-900-color has-neutral-0-background-color has-text-color has-background" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)">
<!-- wp:columns {"verticalAlignment":"center","isStackedOnMobile":false,"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center is-not-stacked-on-mobile" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs)">
<!-- wp:column {"verticalAlignment":"center","width":"25%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:25%"></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">
<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group">
<!-- wp:image {"lightbox":{"enabled":false},"width":"55px","linkDestination":"custom","className":"is-style-svg","style":{"svgString":"\u003csvg xmlns=\u0022http://www.w3.org/2000/svg\u0022 viewBox=\u00220 0 216.5 187.5\u0022\u003e\n  \u003cpolygon fill=\u0022currentColor\u0022 points=\u0022171.9 110.3 162.2 93.6 142.7 59.8 133 76.2 143.2 93.6 123.5 93.6 114 110.3 152.7 110.3 187.5 170.7 79.2 170.7 69.2 187.4 216.5 187.4 171.9 110.3\u0022/\u003e\n  \u003cpolygon fill=\u0022currentColor\u0022 points=\u002294.5 110.3 104 93.6 73.3 93.6 108.1 33.2 123.5 59.8 133.2 43.4 108.1 .1 54.1 93.6 44.6 110.3 0 187.4 50 187.4 59.7 170.7 28.7 170.7 63.8 110.3 94.5 110.3\u0022/\u003e\n\u003c/svg\u003e","width":{"all":"55px","mobile":"45px"}}} -->
<figure class="wp-block-image is-resized is-style-svg"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="data:image/svg+xml;utf8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20216.5%20187.5%22%3E%0A%20%20%3Cpolygon%20fill%3D%22currentColor%22%20points%3D%22171.9%20110.3%20162.2%2093.6%20142.7%2059.8%20133%2076.2%20143.2%2093.6%20123.5%2093.6%20114%20110.3%20152.7%20110.3%20187.5%20170.7%2079.2%20170.7%2069.2%20187.4%20216.5%20187.4%20171.9%20110.3%22%2F%3E%0A%20%20%3Cpolygon%20fill%3D%22currentColor%22%20points%3D%2294.5%20110.3%20104%2093.6%2073.3%2093.6%20108.1%2033.2%20123.5%2059.8%20133.2%2043.4%20108.1%20.1%2054.1%2093.6%2044.6%20110.3%200%20187.4%2050%20187.4%2059.7%20170.7%2028.7%20170.7%2063.8%20110.3%2094.5%20110.3%22%2F%3E%0A%3C%2Fsvg%3E" alt="<?php echo esc_attr__( 'Atmostfear Entertainment', 'aegis' ); ?>" style="width:55px;height:auto"/></a></figure>
<!-- /wp:image -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"25%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:25%">
<!-- wp:buttons {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right"}} -->
<div class="wp-block-buttons">
<!-- wp:button {"backgroundColor":"transparent","textColor":"inherit","className":"hide-dark-mode is-style-fill","ariaLabel":"Switch to dark mode","style":{"spacing":{"blockGap":"0","padding":{"top":"6px","right":"6px","bottom":"6px","left":"6px"}},"boxShadow":{"hover":{"color":"var:preset|color|neutral-100","inset":"inset","spread":"22","blur":"0","y":"0","x":"0"},"color":"transparent","inset":"inset","spread":"22","blur":"0","x":"0","y":"0"}},"fontSize":"14","onclick":"( () =\u003e {\n\tdocument.body.classList.remove( 'is-style-light' );\n\tdocument.body.classList.add( 'is-style-dark' );\n\tdocument.cookie = 'aegisDarkMode=true;path=/;max-age=86400;SameSite=Lax';\n} )()","iconSet":"remixicon","iconName":"moon-line","iconSize":"16px","iconPosition":"end","iconSvgString":"\u003csvg viewBox=\u00220 0 24 24\u0022 fill=\u0022currentColor\u0022 xmlns=\u0022http://www.w3.org/2000/svg\u0022\u003e\u003cpath d=\u0022M10 7C10 10.866 13.134 14 17 14C18.9584 14 20.729 13.1957 21.9995 11.8995C22 11.933 22 11.9665 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C12.0335 2 12.067 2 12.1005 2.00049C10.8043 3.27098 10 5.04157 10 7ZM4 12C4 16.4183 7.58172 20 12 20C15.0583 20 17.7158 18.2839 19.062 15.7621C18.3945 15.9187 17.7035 16 17 16C12.0294 16 8 11.9706 8 7C8 6.29648 8.08133 5.60547 8.2379 4.938C5.71611 6.28423 4 8.9417 4 12Z\u0022/\u003e\u003c/svg\u003e"} /-->
<!-- wp:button {"backgroundColor":"transparent","textColor":"current","className":"hide-light-mode is-style-fill","ariaLabel":"Switch to light mode","style":{"spacing":{"blockGap":"0","padding":{"top":"6px","right":"6px","bottom":"6px","left":"6px"}},"boxShadow":{"hover":{"inset":"inset","color":"var:preset|color|neutral-100","spread":"22","y":"0","x":"0","blur":"0"},"spread":"22","inset":"inset","color":"transparent","blur":"0","y":"0","x":"0"}},"fontSize":"14","onclick":"( () =\u003e {\n\tdocument.body.classList.remove( 'is-style-dark' );\n\tdocument.body.classList.add( 'is-style-light' );\n\tdocument.cookie = 'aegisDarkMode=false;path=/;max-age=86400;SameSite=Lax';\n} )()","iconSet":"remixicon","iconName":"sun-line","iconSize":"16px","iconPosition":"end","iconSvgString":"\u003csvg viewBox=\u00220 0 24 24\u0022 fill=\u0022currentColor\u0022 xmlns=\u0022http://www.w3.org/2000/svg\u0022\u003e\u003cpath d=\u0022M12 18C8.68629 18 6 15.3137 6 12C6 8.68629 8.68629 6 12 6C15.3137 6 18 8.68629 18 12C18 15.3137 15.3137 18 12 18ZM12 16C14.2091 16 16 14.2091 16 12C16 9.79086 14.2091 8 12 8C9.79086 8 8 9.79086 8 12C8 14.2091 9.79086 16 12 16ZM11 1H13V4H11V1ZM11 20H13V23H11V20ZM3.51472 4.92893L4.92893 3.51472L7.05025 5.63604L5.63604 7.05025L3.51472 4.92893ZM16.9497 18.364L18.364 16.9497L20.4853 19.0711L19.0711 20.4853L16.9497 18.364ZM19.0711 3.51472L20.4853 4.92893L18.364 7.05025L16.9497 5.63604L19.0711 3.51472ZM5.63604 16.9497L7.05025 18.364L4.92893 20.4853L3.51472 19.0711L5.63604 16.9497ZM23 11V13H20V11H23ZM4 11V13H1V11H4Z\u0022/\u003e\u003c/svg\u003e"} /-->
<!-- wp:button {"backgroundColor":"transparent","textColor":"current","className":"mobile-menu-close","ariaLabel":"Close menu","style":{"spacing":{"blockGap":"0","padding":{"top":"4px","right":"4px","bottom":"4px","left":"4px"}}},"fontSize":"14","onclick":"(() =\u003e {\n  document.querySelectorAll('.mobile-menu').forEach((menu) =\u003e {\n    menu.classList.add('has-display-none');\n    menu.querySelectorAll('.wp-block-navigation').forEach((nav) =\u003e nav.dispatchEvent(new Event('aegis:drilldown-reset')));\n  });\n\n  document.documentElement.style.overflow = '';\n\n  const toggle = document.querySelector('.mobile-menu-toggle button, .mobile-menu-toggle a');\n  if (toggle) toggle.focus();\n})();\n","iconSet":"remixicon","iconName":"close-line","iconSize":"24px","iconPosition":"end","iconSvgString":"\u003csvg viewBox=\u00220 0 24 24\u0022 fill=\u0022currentColor\u0022 xmlns=\u0022http://www.w3.org/2000/svg\u0022\u003e\u003cpath d=\u0022M11.9997 10.5865L16.9495 5.63672L18.3637 7.05093L13.4139 12.0007L18.3637 16.9504L16.9495 18.3646L11.9997 13.4149L7.04996 18.3646L5.63574 16.9504L10.5855 12.0007L5.63574 7.05093L7.04996 5.63672L11.9997 10.5865Z\u0022/\u003e\u003c/svg\u003e"} /-->
</div>
<!-- /wp:buttons -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->

<!-- wp:search {"label":"Search","showLabel":false,"placeholder":"Search this site","width":100,"widthUnit":"%","buttonText":"Search","buttonPosition":"button-inside","buttonUseIcon":true,"textColor":"current"} /-->

<!-- wp:navigation {"overlayMenu":"never","className":"is-drilldown","metadata":{"ignoredHookedBlocks":["woocommerce/customer-account"]},"style":{"spacing":{"blockGap":"0"},"typography":{"fontStyle":"normal","fontWeight":"500","lineHeight":"2.2"}},"fontSize":"18","layout":{"type":"flex","orientation":"vertical"}} /-->

<!-- wp:group {"metadata":{"name":"Socials"},"style":{"spacing":{"blockGap":"var:preset|spacing|xs","padding":{"top":"var:preset|spacing|sm"}},"border":{"top":{"color":"#71717a3b","style":"solid","width":"1px"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group" style="border-top-color:#71717a3b;border-top-style:solid;border-top-width:1px;padding-top:var(--wp--preset--spacing--sm)">
<!-- wp:paragraph {"align":"center","className":"is-style-sub-heading","fontSize":"12"} -->
<p class="has-text-align-center is-style-sub-heading has-12-font-size"><?php echo esc_html__( 'Feel Free to Stalk Us', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/facebook-circle-line","url":"https://www.facebook.com/aeculture","linkTarget":"_blank","rel":"noopener","ariaLabel":"Facebook","style":{"dimensions":{"width":"16px"}}} /-->
<!-- wp:icon {"icon":"remixicon/bluesky-line","url":"https://bsky.app/profile/atmostfear.bsky.social","linkTarget":"_blank","rel":"noopener","ariaLabel":"Bluesky","style":{"dimensions":{"width":"16px"}}} /-->
<!-- wp:icon {"icon":"remixicon/instagram-line","url":"https://www.instagram.com/atmostfear_entertainment/","linkTarget":"_blank","rel":"noopener","ariaLabel":"Instagram","style":{"dimensions":{"width":"16px"}}} /-->
<!-- wp:icon {"icon":"remixicon/github-line","url":"https://github.com/aegiswp","linkTarget":"_blank","rel":"noopener","ariaLabel":"GitHub","style":{"dimensions":{"width":"16px"}}} /-->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:buttons {"metadata":{"name":"Actions"},"style":{"spacing":{"blockGap":"12px"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-buttons">
<!-- wp:button {"width":50,"className":"nowrap is-style-ghost","style":{"typography":{"lineHeight":"2"}},"size":"small","iconSet":"remixicon","iconName":"brain-2-line","iconSize":"16px","iconPosition":"end","iconSvgString":"\u003csvg viewBox=\u00220 0 24 24\u0022 fill=\u0022currentColor\u0022 xmlns=\u0022http://www.w3.org/2000/svg\u0022\u003e\u003cpath d=\u0022M7 6C7 6.23676 7.04072 6.46184 7.11469 6.66999C7.22686 6.98559 7.17357 7.33638 6.97276 7.60444C6.77194 7.8725 6.45026 8.02222 6.11585 8.00327C6.0776 8.0011 6.03898 8 6 8C4.89543 8 4 8.89543 4 10C4 10.5129 4.19174 10.9786 4.50903 11.3331C4.84885 11.7128 4.84885 12.2872 4.50903 12.6669C4.19174 13.0214 4 13.4871 4 14C4 14.8842 4.57447 15.6369 5.37327 15.9001C5.84924 16.057 6.1356 16.5419 6.04308 17.0345C6.01489 17.1846 6 17.3401 6 17.5C6 18.8807 7.11929 20 8.5 20C9.75862 20 10.8015 19.069 10.9746 17.8583C10.9806 17.8165 10.9891 17.7756 11 17.7358V6C11 4.89543 10.1046 4 9 4C7.89543 4 7 4.89543 7 6ZM13 17.7358C13.0109 17.7756 13.0194 17.8165 13.0254 17.8583C13.1985 19.069 14.2414 20 15.5 20C16.8807 20 18 18.8807 18 17.5C18 17.3401 17.9851 17.1846 17.9569 17.0345C17.8644 16.5419 18.1508 16.057 18.6267 15.9001C19.4255 15.6369 20 14.8842 20 14C20 13.4871 19.8083 13.0214 19.491 12.6669C19.1511 12.2872 19.1511 11.7128 19.491 11.3331C19.8083 10.9786 20 10.5129 20 10C20 8.89543 19.1046 8 18 8C17.961 8 17.9224 8.0011 17.8841 8.00327C17.5497 8.02222 17.2281 7.8725 17.0272 7.60444C16.8264 7.33638 16.7731 6.98559 16.8853 6.66999C16.9593 6.46184 17 6.23676 17 6C17 4.89543 16.1046 4 15 4C13.8954 4 13 4.89543 13 6V17.7358ZM9 2C10.1947 2 11.2671 2.52376 12 3.35418C12.7329 2.52376 13.8053 2 15 2C17.2091 2 19 3.79086 19 6C19 6.04198 18.9994 6.08382 18.9981 6.12552C20.7243 6.56889 22 8.13546 22 10C22 10.728 21.8049 11.4116 21.4646 12C21.8049 12.5884 22 13.272 22 14C22 15.4817 21.1949 16.7734 19.9999 17.4646L20 17.5C20 19.9853 17.9853 22 15.5 22C14.0859 22 12.8248 21.3481 12 20.3285C11.1752 21.3481 9.91405 22 8.5 22C6.01472 22 4 19.9853 4 17.5L4.00014 17.4646C2.80512 16.7734 2 15.4817 2 14C2 13.272 2.19513 12.5884 2.53536 12C2.19513 11.4116 2 10.728 2 10C2 8.13546 3.27573 6.56889 5.00194 6.12552C5.00065 6.08382 5 6.04198 5 6C5 3.79086 6.79086 2 9 2Z\u0022/\u003e\u003c/svg\u003e"} -->
<div class="wp-block-button has-custom-width wp-block-button__width-50 nowrap is-style-ghost"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" style="line-height:2"><?php echo esc_html__( 'Contact', 'aegis' ); ?></a></div>
<!-- /wp:button -->
<!-- wp:button {"width":50,"className":"nowrap is-style-fill","style":{"typography":{"lineHeight":"2"}},"size":"small","iconSet":"remixicon","iconName":"heart-pulse-line","iconSize":"16px","iconPosition":"end","iconSvgString":"\u003csvg viewBox=\u00220 0 24 24\u0022 fill=\u0022currentColor\u0022 xmlns=\u0022http://www.w3.org/2000/svg\u0022\u003e\u003cpath d=\u0022M16.5 3C19.5376 3 22 5.5 22 9C22 16 14.5 20 12 21.5C10.0226 20.3135 4.91699 17.563 2.86894 13.001L1 13V11L2.21045 11.0009C2.07425 10.3633 2 9.69651 2 9C2 5.5 4.5 3 7.5 3C9.35997 3 11 4 12 5C13 4 14.64 3 16.5 3ZM16.5 5C15.4241 5 14.2593 5.56911 13.4142 6.41421L12 7.82843L10.5858 6.41421C9.74068 5.56911 8.5759 5 7.5 5C5.55906 5 4 6.6565 4 9C4 9.68542 4.09035 10.3516 4.26658 11.0004L6.43381 11L8.5 7.55635L11.5 12.5563L12.4338 11H17V13H13.5662L11.5 16.4437L8.5 11.4437L7.56619 13L5.10789 13.0006C5.89727 14.3737 7.09304 15.6681 8.64514 16.9029C9.39001 17.4955 10.1845 18.0485 11.0661 18.6038C11.3646 18.7919 11.6611 18.9729 12 19.1752C12.3389 18.9729 12.6354 18.7919 12.9339 18.6038C13.8155 18.0485 14.61 17.4955 15.3549 16.9029C18.3337 14.533 20 11.9435 20 9C20 6.64076 18.463 5 16.5 5Z\u0022/\u003e\u003c/svg\u003e"} -->
<div class="wp-block-button has-custom-width wp-block-button__width-50 nowrap is-style-fill"><a class="wp-block-button__link wp-element-button" href="https://paypal.me/aedonation" target="_blank" rel="noreferrer noopener" style="line-height:2"><?php echo esc_html__( 'Sponsor', 'aegis' ); ?></a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
