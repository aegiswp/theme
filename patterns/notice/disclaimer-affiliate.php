<?php
/**
 * Title: Affiliate Disclaimer
 * Slug: disclaimer-affiliate
 * Categories: notice
 * Keywords: disclaimer, affiliate, ftc, disclosure, earnings, commission
 * Description: A standard FTC-style affiliate earnings disclosure notice with an info icon.
 * Viewport Width: 600
 */
?>

<!-- wp:group {"metadata":{"categories":["notice"],"patternName":"disclaimer-affiliate","name":"Affiliate Disclaimer"},"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm","right":"var:preset|spacing|sm"}},"border":{"width":"1px","color":"var:preset|color|neutral-200","radius":"8px"}},"backgroundColor":"neutral-50","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide has-border-color has-neutral-50-background-color has-background" style="border-color:var(--wp--preset--color--neutral-200);border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
	<div class="wp-block-group"><!-- wp:icon {"icon":"core/info","style":{"dimensions":{"width":"24px"}}} /-->
<!-- wp:group {"layout":{"type":"constrained"}} -->
		<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"16"} -->
			<p class="has-16-font-size" style="font-style:normal;font-weight:600"><?php echo esc_html__( 'Affiliate Disclosure', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"style":{"typography":{"fontSize":"14px"}},"textColor":"neutral-500"} -->
			<p class="has-neutral-500-color has-text-color" style="font-size:14px"><?php echo esc_html__( 'This page contains affiliate links. If you make a purchase through these links, we may earn a small commission at no additional cost to you. We only recommend products and services we genuinely believe in. This helps support the ongoing operation of this site.', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
