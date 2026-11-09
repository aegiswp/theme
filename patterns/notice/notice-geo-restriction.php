<?php
/**
 * Title: Geographic Restriction Notice
 * Slug: notice-geo-restriction
 * Categories: notice
 * Keywords: notice, geo, geographic, restriction, region, blocked, unavailable
 * Description: A geographic restriction notice for region-blocked content.
 * Viewport Width: 600
 */
?>

<!-- wp:group {"metadata":{"categories":["notice"],"patternName":"notice-geo-restriction","name":"Geographic Restriction Notice"},"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg"}},"border":{"width":"1px","color":"var:preset|color|neutral-200","radius":"8px"}},"backgroundColor":"neutral-50","layout":{"type":"constrained","contentSize":"480px"}} -->
<div class="wp-block-group alignwide has-border-color has-neutral-50-background-color has-background" style="border-color:var(--wp--preset--color--neutral-200);border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg)"><!-- wp:icon {"icon":"wordpress/globe","style":{"dimensions":{"width":"48px"}},"align":"center"} /-->
<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"24"} -->
	<h3 class="wp-block-heading has-text-align-center has-24-font-size" style="font-style:normal;font-weight:700"><?php echo esc_html__( 'Content Unavailable in Your Region', 'aegis' ); ?></h3>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"14px"}},"textColor":"neutral-600"} -->
	<p class="aligncenter has-text-align-center has-neutral-600-color has-text-color aligncenter" style="font-size:14px"><?php echo esc_html__( 'We are sorry, but the content you are trying to access is not available in your geographic region due to licensing or regulatory restrictions. If you believe this is an error, please contact our support team for assistance.', 'aegis' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
