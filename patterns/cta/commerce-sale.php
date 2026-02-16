<?php
/**
 * Title: Commerce Sale CTA
 * Slug: commerce-sale
 * Categories: cta
 * Keywords: cta, sale, commerce, discount, promo, woocommerce
 * Description: A bold sale banner CTA with countdown urgency, discount code, and shop button.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["cta"],"patternName":"commerce-sale","name":"Commerce Sale CTA"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg"}}},"backgroundColor":"primary-900","textColor":"white","layout":{"type":"constrained","contentSize":"720px"},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
<div class="wp-block-group alignfull has-white-color has-primary-900-background-color has-text-color has-background has-animation" style="padding-top:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);animation-iteration-count:"><!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
	<div class="wp-block-group"><!-- wp:paragraph {"align":"center","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px"}},"fontSize":"14"} -->
		<p class="aligncenter has-text-align-center has-14-font-size aligncenter" style="letter-spacing:3px;text-transform:uppercase"><?php echo esc_html__( 'Limited Time Offer', 'aegis' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"textAlign":"center","style":{"typography":{"lineHeight":"1.2"},"elements":{"link":{"color":{"text":"var:preset|color|neutral-100"}}}},"textColor":"neutral-100","fontSize":"48"} -->
		<h2 class="wp-block-heading has-text-align-center has-neutral-100-color has-text-color has-link-color has-48-font-size" style="line-height:1.2"><?php echo esc_html__( 'Up to 50% Off Everything', 'aegis' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|neutral-200"}}}},"textColor":"neutral-200","fontSize":"16"} -->
		<p class="aligncenter has-text-align-center has-neutral-200-color has-text-color has-link-color has-16-font-size aligncenter"><?php echo esc_html__( 'Use code SAVE50 at checkout. Offer ends soon — don\'t miss out on our biggest sale of the year.', 'aegis' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|xs"},"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}},"border":{"radius":"8px","width":"1px"}},"borderColor":"neutral-600","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
		<div class="wp-block-group has-border-color has-neutral-600-border-color" style="border-width:1px;border-radius:8px;margin-top:var(--wp--preset--spacing--xs);padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--md)"><!-- wp:paragraph {"style":{"typography":{"fontFamily":"monospace","letterSpacing":"2px"}},"fontSize":"20"} -->
			<p class="has-20-font-size" style="font-family:monospace;letter-spacing:2px">SAVE50</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|sm"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
		<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--sm)"><!-- wp:button {"backgroundColor":"white","textColor":"primary-900","fontSize":"16"} -->
			<div class="wp-block-button"><a class="wp-block-button__link has-primary-900-color has-white-background-color has-text-color has-background has-16-font-size has-custom-font-size wp-element-button" href="/shop"><?php echo esc_html__( 'Shop the Sale', 'aegis' ); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->