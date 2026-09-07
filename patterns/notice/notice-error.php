<?php
/**
 * Title: Error Notice
 * Slug: notice-error
 * Categories: notice
 * Keywords: notice, error, danger, critical, alert, red
 * Description: A critical error notice box with a red background and error icon.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["notice"],"patternName":"notice-error","name":"Error Notice"},"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm","right":"var:preset|spacing|sm"}},"border":{"left":{"width":"4px","color":"var:preset|color|error-500"},"top":[],"right":[],"bottom":[]},"borderRadius":"4px"},"backgroundColor":"error-100","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide has-error-100-background-color has-background" style="border-radius:4px;border-left-color:var(--wp--preset--color--error-500);border-left-width:4px;padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
	<div class="wp-block-group"><!-- wp:icon {"icon":"wordpress/cancel-circle-filled","iconSvgString":"<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\" role=\"img\" aria-labelledby=\"icon-6a2cc03b83978\" data-icon=\"wordpress-cancel-circle-filled\" style=\"min-width:24px;height:24px\" fill=\"currentColor\"><title id=\"icon-6a2cc03b83978\">Cancel Circle Filled Icon</title><path d=\"M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm3.53-12.53a.75.75 0 0 1 0 1.06L13.06 12l2.47 2.47a.75.75 0 1 1-1.06 1.06L12 13.06l-2.47 2.47a.75.75 0 0 1-1.06-1.06L10.94 12 8.47 9.53a.75.75 0 0 1 1.06-1.06L12 10.94l2.47-2.47a.75.75 0 0 1 1.06 0Z\"></path></svg>","style":{"dimensions":{"width":"24px"}}} /-->
<!-- wp:group {"layout":{"type":"constrained"}} -->
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
