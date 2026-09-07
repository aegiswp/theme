<?php
/**
 * Title: Warning Notice
 * Slug: notice-warning
 * Categories: notice
 * Keywords: notice, warning, caution, alert, attention, amber
 * Description: A warning notice box with an amber background and warning icon.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["notice"],"patternName":"notice-warning","name":"Warning Notice"},"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm","right":"var:preset|spacing|sm"}},"border":{"left":{"width":"4px","color":"var:preset|color|warning-500"},"top":[],"right":[],"bottom":[]},"borderRadius":"4px"},"backgroundColor":"warning-100","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide has-warning-100-background-color has-background" style="border-radius:4px;border-left-color:var(--wp--preset--color--warning-500);border-left-width:4px;padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
	<div class="wp-block-group"><!-- wp:icon {"icon":"wordpress/warning","iconSvgString":"<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"-2 -2 24 24\" role=\"img\" aria-labelledby=\"icon-6a2cc03b94ed0\" data-icon=\"wordpress-warning\" style=\"min-width:24px;height:24px\" fill=\"currentColor\"><title id=\"icon-6a2cc03b94ed0\">Warning Icon</title><path d=\"M10 2c4.42 0 8 3.58 8 8s-3.58 8-8 8-8-3.58-8-8 3.58-8 8-8zm1.13 9.38.35-6.46H8.52l.35 6.46h2.26zm-.09 3.36c.24-.23.37-.55.37-.96 0-.42-.12-.74-.36-.97s-.59-.35-1.06-.35-.82.12-1.07.35-.37.55-.37.97c0 .41.13.73.38.96.26.23.61.34 1.06.34s.8-.11 1.05-.34z\"></path></svg>","style":{"dimensions":{"width":"24px"}}} /-->
<!-- wp:group {"layout":{"type":"constrained"}} -->
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
