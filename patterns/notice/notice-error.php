<?php
/**
 * Title: Error Notice
 * Slug: notice-error
 * Categories: notice
 * Keywords: notice, error, danger, critical, alert, red
 * Description: A critical error notice box with a red background and error icon.
 * Viewport Width: 600
 */
?>

<!-- wp:group {"metadata":{"categories":["notice"],"patternName":"notice-error","name":"Error Notice"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|lg","right":"var:preset|spacing|lg"}},"border":{"radius":"8px","left":{"width":"4px","color":"var:preset|color|error-500"},"top":[],"right":[],"bottom":[]}},"backgroundColor":"error-100","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull has-error-100-background-color has-background" style="border-radius:8px;border-left-color:var(--wp--preset--color--error-500);border-left-width:4px;padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--lg);"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
	<div class="wp-block-group"><!-- wp:icon {"icon":"wordpress/cancel-circle-filled","style":{"dimensions":{"width":"24px"}}} /-->
<!-- wp:group {"layout":{"type":"default"}} -->
		<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"16"} -->
			<p class="has-16-font-size" style="font-style:normal;font-weight:600"><?php echo esc_html__( 'Error', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"style":{"typography":{"fontSize":"14px"}},"textColor":"neutral-600"} -->
			<p class="has-neutral-600-color has-text-color" style="font-size:14px"><?php echo esc_html__( 'This is an error notice. Use it to alert readers about critical issues, failures, or actions that require immediate attention.', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
