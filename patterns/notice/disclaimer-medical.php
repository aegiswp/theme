<?php
/**
 * Title: Medical Disclaimer
 * Slug: disclaimer-medical
 * Categories: notice
 * Keywords: disclaimer, medical, health, warning, advice, professional
 * Description: A prominent medical disclaimer warning that content is not professional health advice.
 * Viewport Width: 600
 */
?>

<!-- wp:group {"metadata":{"categories":["notice"],"patternName":"disclaimer-medical","name":"Medical Disclaimer"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md"}}},"backgroundColor":"warning-100","layout":{"type":"constrained","contentSize":"720px"}} -->
<div class="wp-block-group alignfull has-warning-100-background-color has-background" style="padding-top:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md)"><!-- wp:icon {"icon":"wordpress/warning","style":{"dimensions":{"width":"48px"}},"align":"center"} /-->
<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"20"} -->
	<h3 class="wp-block-heading has-text-align-center has-20-font-size" style="font-style:normal;font-weight:700"><?php echo esc_html__( 'Medical Disclaimer', 'aegis' ); ?></h3>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"14px"}},"textColor":"neutral-600"} -->
	<p class="aligncenter has-text-align-center has-neutral-600-color has-text-color aligncenter" style="font-size:14px"><?php echo esc_html__( 'The information provided on this website is for general informational purposes only and is not intended as a substitute for professional medical advice, diagnosis, or treatment. Always seek the advice of your physician or other qualified health provider with any questions you may have regarding a medical condition. Never disregard professional medical advice or delay in seeking it because of something you have read on this site.', 'aegis' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
