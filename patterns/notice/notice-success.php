<?php
/**
 * Title: Success Notice
 * Slug: notice-success
 * Categories: notice
 * Keywords: notice, success, confirmation, positive, complete, done
 * Description: A success notice box with a green background and check icon.
 * Viewport Width: 600
 */
?>

<!-- wp:group {"metadata":{"categories":["notice"],"patternName":"notice-success","name":"Success Notice"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|lg","right":"var:preset|spacing|lg"}},"border":{"radius":"8px","left":{"width":"4px","color":"var:preset|color|success-500"},"top":[],"right":[],"bottom":[]}},"backgroundColor":"success-100","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull has-success-100-background-color has-background" style="border-radius:8px;border-left-color:var(--wp--preset--color--success-500);border-left-width:4px;padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--lg)"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
	<div class="wp-block-group"><!-- wp:icon {"icon":"core/check","style":{"dimensions":{"width":"24px"}}} /-->
<!-- wp:group {"layout":{"type":"default"}} -->
		<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"16"} -->
			<p class="has-16-font-size" style="font-style:normal;font-weight:600"><?php echo esc_html__( 'Success', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"style":{"typography":{"fontSize":"14px"}},"textColor":"neutral-600"} -->
			<p class="has-neutral-600-color has-text-color" style="font-size:14px"><?php echo esc_html__( 'This is a success notice. Use it to confirm that an action has been completed, a goal has been reached, or to share positive outcomes with your readers.', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
