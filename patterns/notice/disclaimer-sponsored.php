<?php
/**
 * Title: Sponsored Content Disclaimer
 * Slug: disclaimer-sponsored
 * Categories: notice
 * Keywords: disclaimer, sponsored, paid, partnership, promotion, content
 * Description: A compact inline disclosure for sponsored or paid partnership content.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["notice"],"patternName":"disclaimer-sponsored","name":"Sponsored Content Disclaimer"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|sm","right":"var:preset|spacing|sm"}},"border":{"radius":"100px","width":"1px","color":"var:preset|color|neutral-200"}},"backgroundColor":"neutral-50","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group has-border-color has-neutral-50-background-color has-background" style="border-color:var(--wp--preset--color--neutral-200);border-width:1px;border-radius:100px;padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--sm)"><!-- wp:icon {"icon":"core/receipt","iconSvgString":"<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\" role=\"img\" aria-labelledby=\"icon-6a2cc03b7d7d0\" data-icon=\"wordpress-receipt\" style=\"min-width:16px;height:16px\" fill=\"currentColor\"><title id=\"icon-6a2cc03b7d7d0\">Receipt Icon</title><path fill-rule=\"evenodd\" d=\"m16.83 6.342.602.3.625-.25.443-.176v12.569l-.443-.178-.625-.25-.603.301-1.444.723-2.41-.804-.475-.158-.474.158-2.41.803-1.445-.722-.603-.3-.625.25-.443.177V6.215l.443.178.625.25.603-.301 1.444-.722 2.41.803.475.158.474-.158 2.41-.803 1.445.722zM20 4l-1.5.6-1 .4-2-1-3 1-3-1-2 1-1-.4L5 4v17l1.5-.6 1-.4 2 1 3-1 3 1 2-1 1 .4 1.5.6V4zm-3.5 6.25v-1.5h-8v1.5h8zm0 3v-1.5h-8v1.5h8zm-8 3v-1.5h8v1.5h-8z\" clip-rule=\"evenodd\"></path></svg>","style":{"dimensions":{"width":"16px"}}} /-->
<!-- wp:paragraph {"style":{"typography":{"fontStyle":"italic","fontWeight":"400","fontSize":"13px"}},"textColor":"neutral-500"} -->
	<p class="has-neutral-500-color has-text-color" style="font-size:13px;font-style:italic;font-weight:400"><?php echo esc_html__( 'This is a sponsored post. We have been compensated for this content, but all opinions expressed are our own.', 'aegis' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
