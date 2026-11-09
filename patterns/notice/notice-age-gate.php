<?php
/**
 * Title: Age Verification Notice
 * Slug: notice-age-gate
 * Categories: notice
 * Keywords: notice, age, verification, gate, restriction, adult, 18
 * Description: An age verification gate notice with a lock icon and confirmation button.
 * Viewport Width: 600
 */
?>

<!-- wp:group {"metadata":{"categories":["notice"],"patternName":"notice-age-gate","name":"Age Verification Notice"},"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg"}},"border":{"width":"1px","color":"var:preset|color|neutral-200","radius":"8px"}},"backgroundColor":"neutral-50","layout":{"type":"constrained","contentSize":"480px"}} -->
<div class="wp-block-group alignwide has-border-color has-neutral-50-background-color has-background" style="border-color:var(--wp--preset--color--neutral-200);border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg)"><!-- wp:icon {"icon":"wordpress/lock","style":{"dimensions":{"width":"48px"}},"align":"center"} /-->
<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"24"} -->
	<h3 class="wp-block-heading has-text-align-center has-24-font-size" style="font-style:normal;font-weight:700"><?php echo esc_html__( 'Age Verification Required', 'aegis' ); ?></h3>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"14px"}},"textColor":"neutral-600"} -->
	<p class="aligncenter has-text-align-center has-neutral-600-color has-text-color aligncenter" style="font-size:14px"><?php echo esc_html__( 'The content you are trying to access is age-restricted. You must be at least 18 years old to view this content. By clicking the button below, you confirm that you meet the minimum age requirement.', 'aegis' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|sm"}}}} -->
	<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--sm)"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'I Am 18 or Older', 'aegis' ); ?></a></div>
<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
