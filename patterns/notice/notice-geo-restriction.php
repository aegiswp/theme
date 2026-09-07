<?php
/**
 * Title: Geographic Restriction Notice
 * Slug: notice-geo-restriction
 * Categories: notice
 * Keywords: notice, geo, geographic, restriction, region, blocked, unavailable
 * Description: A geographic restriction notice for region-blocked content.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["notice"],"patternName":"notice-geo-restriction","name":"Geographic Restriction Notice"},"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg"}},"border":{"width":"1px","color":"var:preset|color|neutral-200","radius":"4px"}},"backgroundColor":"neutral-50","layout":{"type":"constrained","contentSize":"480px"}} -->
<div class="wp-block-group alignwide has-border-color has-neutral-50-background-color has-background" style="border-color:var(--wp--preset--color--neutral-200);border-width:1px;border-radius:4px;padding-top:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg)"><!-- wp:icon {"icon":"wordpress/globe","iconSvgString":"<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\" role=\"img\" aria-labelledby=\"icon-6a2cc03b854d0\" data-icon=\"wordpress-globe\" style=\"min-width:48px;height:48px\" fill=\"currentColor\"><title id=\"icon-6a2cc03b854d0\">Globe Icon</title><path d=\"M12 3.3c-4.8 0-8.8 3.9-8.8 8.8 0 4.8 3.9 8.8 8.8 8.8 4.8 0 8.8-3.9 8.8-8.8s-4-8.8-8.8-8.8zm6.5 5.5h-2.6C15.4 7.3 14.8 6 14 5c2 .6 3.6 2 4.5 3.8zm.7 3.2c0 .6-.1 1.2-.2 1.8h-2.9c.1-.6.1-1.2.1-1.8s-.1-1.2-.1-1.8H19c.2.6.2 1.2.2 1.8zM12 18.7c-1-.7-1.8-1.9-2.3-3.5h4.6c-.5 1.6-1.3 2.9-2.3 3.5zm-2.6-4.9c-.1-.6-.1-1.1-.1-1.8 0-.6.1-1.2.1-1.8h5.2c.1.6.1 1.1.1 1.8s-.1 1.2-.1 1.8H9.4zM4.8 12c0-.6.1-1.2.2-1.8h2.9c-.1.6-.1 1.2-.1 1.8 0 .6.1 1.2.1 1.8H5c-.2-.6-.2-1.2-.2-1.8zM12 5.3c1 .7 1.8 1.9 2.3 3.5H9.7c.5-1.6 1.3-2.9 2.3-3.5zM10 5c-.8 1-1.4 2.3-1.8 3.8H5.5C6.4 7 8 5.6 10 5zM5.5 15.3h2.6c.4 1.5 1 2.8 1.8 3.7-1.8-.6-3.5-2-4.4-3.7zM14 19c.8-1 1.4-2.2 1.8-3.7h2.6C17.6 17 16 18.4 14 19z\"></path></svg>","style":{"dimensions":{"width":"48px"}},"align":"center"} /-->
<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"24"} -->
	<h3 class="wp-block-heading has-text-align-center has-24-font-size" style="font-style:normal;font-weight:700"><?php echo esc_html__( 'Content Unavailable in Your Region', 'aegis' ); ?></h3>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"14px"}},"textColor":"neutral-600"} -->
	<p class="aligncenter has-text-align-center has-neutral-600-color has-text-color aligncenter" style="font-size:14px"><?php echo esc_html__( 'We are sorry, but the content you are trying to access is not available in your geographic region due to licensing or regulatory restrictions. If you believe this is an error, please contact our support team for assistance.', 'aegis' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
