<?php
/**
 * Title: Success Notice
 * Slug: notice-success
 * Categories: notice
 * Keywords: notice, success, confirmation, positive, complete, done
 * Description: A success notice box with a green background and check icon.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["notice"],"patternName":"notice-success","name":"Success Notice"},"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm","right":"var:preset|spacing|sm"}},"border":{"left":{"width":"4px","color":"var:preset|color|success-500"},"top":{},"right":{},"bottom":{}},"borderRadius":"4px"},"backgroundColor":"success-100","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide has-success-100-background-color has-background" style="border-radius:4px;border-left-color:var(--wp--preset--color--success-500);border-left-width:4px;padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
	<div class="wp-block-group"><!-- wp:image {"className":"is-style-icon","iconSet":"wordpress","iconName":"check","iconSize":"24px","iconSvgString":"\u003csvg xmlns=\u0022http://www.w3.org/2000/svg\u0022 viewBox=\u00220 0 24 24\u0022 role=\u0022img\u0022 aria-labelledby=\u0022icon-notice-check-1\u0022 data-icon=\u0022wordpress-check\u0022 width=\u002224\u0022 height=\u002224\u0022 fill=\u0022currentColor\u0022\u003e\u003ctitle id=\u0022icon-notice-check-1\u0022\u003eCheck Icon\u003c/title\u003e\u003cpath d=\u0022m16.7 7.1-6.3 8.5-3.3-2.5-.9 1.2 4.5 3.4L17.9 8z\u0022\u003e\u003c/path\u003e\u003c/svg\u003e"} -->
		<figure class="wp-block-image is-style-icon" style="--wp--custom--icon--size:24px;--wp--custom--icon--url:url('data:image/svg+xml;utf8,<svg xmlns=&quot;http://www.w3.org/2000/svg&quot; viewBox=&quot;0 0 24 24&quot; role=&quot;img&quot; aria-labelledby=&quot;icon-notice-check-1&quot; data-icon=&quot;wordpress-check&quot; width=&quot;24&quot; height=&quot;24&quot; fill=&quot;currentColor&quot;&gt;<title id=&quot;icon-notice-check-1&quot;&gt;Check Icon</title&gt;<path d=&quot;m16.7 7.1-6.3 8.5-3.3-2.5-.9 1.2 4.5 3.4L17.9 8z&quot;&gt;</path&gt;</svg&gt;')"><img alt="" /></figure>
		<!-- /wp:image -->

		<!-- wp:group {"layout":{"type":"constrained"}} -->
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
