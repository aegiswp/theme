<?php
/**
 * Title: Beta Disclaimer
 * Slug: disclaimer-beta
 * Categories: notice
 * Keywords: disclaimer, beta, experimental, early access, testing, preview
 * Description: A compact beta or experimental feature disclaimer tag.
 * Viewport Width: 600
 */
?>

<!-- wp:group {"metadata":{"categories":["notice"],"patternName":"disclaimer-beta","name":"Beta Disclaimer"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|sm","right":"var:preset|spacing|sm"}},"border":{"radius":"8px","width":"1px","color":"var:preset|color|neutral-200"}},"backgroundColor":"neutral-50","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group has-border-color has-neutral-50-background-color has-background" style="border-color:var(--wp--preset--color--neutral-200);border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--sm)"><!-- wp:icon {"icon":"wordpress/bug","style":{"dimensions":{"width":"16px"}}} /-->
<!-- wp:paragraph {"style":{"typography":{"fontStyle":"italic","fontWeight":"400","fontSize":"13px"}},"textColor":"neutral-500"} -->
	<p class="has-neutral-500-color has-text-color" style="font-size:13px;font-style:italic;font-weight:400"><?php echo esc_html__( 'This feature is currently in beta. Functionality may change, and you may encounter unexpected behavior. Please report any issues you find.', 'aegis' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
