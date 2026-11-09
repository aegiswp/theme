<?php
/**
 * Title: Warning Notice
 * Slug: notice-warning
 * Categories: notice
 * Keywords: notice, warning, caution, alert, attention, amber
 * Description: A warning notice box with an amber background and warning icon.
 * Viewport Width: 600
 */
?>

<!-- wp:group {"metadata":{"categories":["notice"],"patternName":"notice-warning","name":"Warning Notice"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|lg","right":"var:preset|spacing|lg"}},"border":{"radius":"8px","left":{"width":"4px","color":"var:preset|color|warning-500"},"top":[],"right":[],"bottom":[]}},"backgroundColor":"warning-100","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull has-warning-100-background-color has-background" style="border-radius:8px;border-left-color:var(--wp--preset--color--warning-500);border-left-width:4px;padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--lg);"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
	<div class="wp-block-group"><!-- wp:icon {"icon":"wordpress/warning","style":{"dimensions":{"width":"24px"}}} /-->
<!-- wp:group {"layout":{"type":"default"}} -->
		<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"16"} -->
			<p class="has-16-font-size" style="font-style:normal;font-weight:600"><?php echo esc_html__( 'Warning', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"style":{"typography":{"fontSize":"14px"}},"textColor":"neutral-600"} -->
			<p class="has-neutral-600-color has-text-color" style="font-size:14px"><?php echo esc_html__( 'This is a warning notice. Use it to caution readers about potential issues, risks, or important considerations before proceeding.', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
