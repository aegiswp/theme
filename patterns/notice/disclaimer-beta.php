<?php
/**
 * Title: Beta Disclaimer
 * Slug: disclaimer-beta
 * Categories: notice
 * Keywords: disclaimer, beta, experimental, early access, testing, preview
 * Description: A compact beta or experimental feature disclaimer tag.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["notice"],"patternName":"disclaimer-beta","name":"Beta Disclaimer"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|sm","right":"var:preset|spacing|sm"}},"border":{"radius":"100px","width":"1px","color":"var:preset|color|neutral-200"}},"backgroundColor":"neutral-50","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group has-border-color has-neutral-50-background-color has-background" style="border-color:var(--wp--preset--color--neutral-200);border-width:1px;border-radius:100px;padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--sm)"><!-- wp:icon {"icon":"wordpress/bug","iconSvgString":"<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\" role=\"img\" aria-labelledby=\"icon-6a2cc03b65ce8\" data-icon=\"wordpress-bug\" style=\"min-width:16px;height:16px\" fill=\"currentColor\"><title id=\"icon-6a2cc03b65ce8\">Bug Icon</title><path fill-rule=\"evenodd\" d=\"m6.13 5.5 1.926 1.927A4.975 4.975 0 0 0 7.025 10H5v1.5h2V13H5v1.5h2.1a5.002 5.002 0 0 0 9.8 0H19V13h-2v-1.5h2V10h-2.025a4.979 4.979 0 0 0-1.167-2.74l1.76-1.76-1.061-1.06-1.834 1.834A4.977 4.977 0 0 0 12 5.5c-1.062 0-2.046.33-2.855.895L7.19 4.44 6.13 5.5zm2.37 5v3a3.5 3.5 0 1 0 7 0v-3a3.5 3.5 0 1 0-7 0z\" clip-rule=\"evenodd\"></path></svg>","style":{"dimensions":{"width":"16px"}}} /-->
<!-- wp:paragraph {"style":{"typography":{"fontStyle":"italic","fontWeight":"400","fontSize":"13px"}},"textColor":"neutral-500"} -->
	<p class="has-neutral-500-color has-text-color" style="font-size:13px;font-style:italic;font-weight:400"><?php echo esc_html__( 'This feature is currently in beta. Functionality may change, and you may encounter unexpected behavior. Please report any issues you find.', 'aegis' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
