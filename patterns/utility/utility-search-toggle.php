<?php
/**
 * Title: Utility Search Toggle
 * Slug: utility-search-toggle
 * Categories: utility
 */
?>

<!-- wp:buttons {"style":{"position":{"all":"fixed"},"top":{"all":"20px"},"right":{"all":"20px"},"zIndex":{"all":"100"},"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}}} -->
<div class="wp-block-buttons" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0">
    <!-- wp:button {"backgroundColor":"transparent","textColor":"neutral-900","style":{"spacing":{"blockGap":"0","padding":{"top":"6px","right":"6px","bottom":"6px","left":"6px"}},"boxShadow":{"hover":{"color":"#f6f6f9","inset":"inset","spread":"20"},"color":"transparent","inset":"inset","spread":"20"},"display":{"all":"none"}},"className":"search-close","fontSize":"14","onclick":"(() => {\n  const searchToggles = document.querySelectorAll('.search-toggle');\n  const searchCloses = document.querySelectorAll('.search-close');\n  const searchModals = document.querySelectorAll('.search-modal');\n\n  searchModals.forEach((search) => {\n    search.classList.add('has-display-none');\n  });\n\n  searchToggles.forEach((toggle) => {\n    toggle.classList.remove('has-display-none');\n    toggle.firstChild.classList.remove('has-display-none');\n  });\n\n  searchCloses.forEach((close) => {\n    close.classList.add('has-display-none');\n    close.parentElement.classList.add('has-display-none');\n  });\n})();\n","iconSet":"wordpress","iconName":"close","iconSize":"20px","iconPosition":"end","iconSvgString":"<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\"><path d=\"m13 11.8 6.1-6.3-1-1-6.1 6.2-6.1-6.2-1 1 6.1 6.3-6.5 6.7 1 1 6.5-6.6 6.5 6.6 1-1z\"/></svg>"} /-->
</div>
<!-- /wp:buttons -->
<!-- wp:group {"align":"full","style":{"position":{"all":"fixed"},"top":{"all":"0px"},"right":{"all":"0px"},"bottom":{"all":"0px"},"left":{"all":"0px"},"zIndex":{"all":"99"},"width":{"all":"100vw"},"filter":{"blur":"16","backdrop":true},"maxWidth":{"all":"100vw"},"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}},"display":{"all":"none"}},"className":"search-modal","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center","verticalAlignment":"top"},"onclick":"\n"} -->
<div class="wp-block-group alignfull search-modal"
    style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm);backdrop-filter:blur(16px)">
    <!-- wp:spacer {"height":"100vh","width":"0px","style":{"position":{"all":"absolute"},"top":{"all":"0px"},"right":{"all":"0px"},"bottom":{"all":"0px"},"left":{"all":"0px"},"filter":{"opacity":"50"},"layout":{"flexSize":"100vh","selfStretch":"fixed"},"width":{"all":"100%"}},"backgroundColor":"neutral-0"} -->
    <div style="height:100vh;width:0px;filter:opacity(50%)" aria-hidden="true"
        class="wp-block-spacer has-neutral-0-background-color has-background"></div>
    <!-- /wp:spacer -->
    <!-- wp:group {"style":{"width":"","spacing":{"padding":{"top":"var:preset|spacing|xxl"},"margin":{"top":"0"}},"display":"","order":"","maxWidth":"","zIndex":{"all":"1"},"position":{"all":"relative"}},"layout":{"type":"default"}} -->
    <div class="wp-block-group" style="margin-top:0;padding-top:var(--wp--preset--spacing--xxl)">
        <!-- wp:search {"label":"","showLabel":false,"placeholder":"Search this site","width":100,"widthUnit":"%","buttonText":"Search","buttonPosition":"button-inside","buttonUseIcon":true,"style":{"maxWidth":{"all":"90vw"},"width":{"all":"600px"}},"textColor":"currentColor"} /-->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->
<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"right","flexWrap":"nowrap"},"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"},"position":"","top":"","right":"","bottom":"","left":"","zIndex":""}} -->
<div class="wp-block-buttons">
    <!-- wp:button {"backgroundColor":"transparent","textColor":"neutral-800","style":{"spacing":{"blockGap":"0","padding":{"top":"4px","right":"4px","bottom":"4px","left":"4px"}},"boxShadow":{"hover":{"color":"#f6f6f9","inset":"inset","spread":"20"},"color":"transparent","inset":"inset","spread":"20"}},"className":"search-toggle","fontSize":"14","onclick":"(() => {\n  const searchCloses = document.querySelectorAll('.search-close');\n  const searchToggles = document.querySelectorAll('.search-toggle');\n  const searchModals = document.querySelectorAll('.search-modal');\n\n  searchModals.forEach((modal) => {\n    modal.classList.remove('has-display-none');\n  });\n\n  searchToggles.forEach((toggle) => {\n    toggle.classList.add('has-display-none');\n    toggle.firstChild.classList.add('has-display-none');\n  });\n\n  searchCloses.forEach((close) => {\n    close.classList.remove('has-display-none');\n    close.parentElement.classList.remove('has-display-none');\n  });\n})();\n","iconSet":"wordpress","iconName":"search","iconSize":"22px","iconPosition":"end","iconSvgString":"<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\"><path d=\"M13.5 6C10.5 6 8 8.5 8 11.5c0 1.1.3 2.1.9 3l-3.4 3 1 1.1 3.4-2.9c1 .9 2.2 1.4 3.6 1.4 3 0 5.5-2.5 5.5-5.5C19 8.5 16.5 6 13.5 6zm0 9.5c-2.2 0-4-1.8-4-4s1.8-4 4-4 4 1.8 4 4-1.8 4-4 4z\"/></svg>"} /-->
</div>