<?php
/**
 * Title: Financial Disclaimer
 * Slug: disclaimer-financial
 * Categories: notice
 * Keywords: disclaimer, financial, investment, advice, risk, not financial advice
 * Description: An investment and financial information disclaimer with a currency icon.
 * Viewport Width: 600
 */
?>

<!-- wp:group {"metadata":{"categories":["notice"],"patternName":"disclaimer-financial","name":"Financial Disclaimer"},"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm","right":"var:preset|spacing|sm"}},"border":{"bottom":{"width":"2px","color":"var:preset|color|neutral-200"}}},"backgroundColor":"neutral-50","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide has-neutral-50-background-color has-background" style="border-bottom-color:var(--wp--preset--color--neutral-200);border-bottom-width:2px;padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
	<div class="wp-block-group"><!-- wp:icon {"icon":"wordpress/currency-dollar","style":{"dimensions":{"width":"24px"}}} /-->
<!-- wp:group {"layout":{"type":"constrained"}} -->
		<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"16"} -->
			<p class="has-16-font-size" style="font-style:normal;font-weight:600"><?php echo esc_html__( 'Financial Disclaimer', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"style":{"typography":{"fontSize":"14px"}},"textColor":"neutral-500"} -->
			<p class="has-neutral-500-color has-text-color" style="font-size:14px"><?php echo esc_html__( 'The content on this website is for informational purposes only and does not constitute financial, investment, or tax advice. You should consult with a qualified financial advisor before making any investment decisions. Past performance is not indicative of future results, and all investments carry risk, including the potential loss of principal.', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
