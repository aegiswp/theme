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

<!-- wp:group {"metadata":{"categories":["notice"],"patternName":"notice-warning","name":"Warning Notice"},"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm","right":"var:preset|spacing|sm"}},"border":{"left":{"width":"4px","color":"var:preset|color|warning-500"},"top":{},"right":{},"bottom":{}},"borderRadius":"4px"},"backgroundColor":"warning-100","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide has-warning-100-background-color has-background" style="border-radius:4px;border-left-color:var(--wp--preset--color--warning-500);border-left-width:4px;padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
	<div class="wp-block-group"><!-- wp:image {"className":"is-style-icon","iconSet":"wordpress","iconName":"warning","iconSize":"24px","iconSvgString":"\u003csvg xmlns=\u0022http://www.w3.org/2000/svg\u0022 viewBox=\u0022-2 -2 24 24\u0022 role=\u0022img\u0022 aria-labelledby=\u0022icon-notice-warning-2\u0022 data-icon=\u0022wordpress-warning\u0022 width=\u002224\u0022 height=\u002224\u0022 fill=\u0022currentColor\u0022\u003e\u003ctitle id=\u0022icon-notice-warning-2\u0022\u003eWarning Icon\u003c/title\u003e\u003cpath d=\u0022M10 2c4.42 0 8 3.58 8 8s-3.58 8-8 8-8-3.58-8-8 3.58-8 8-8zm1.13 9.38.35-6.46H8.52l.35 6.46h2.26zm-.09 3.36c.24-.23.37-.55.37-.96 0-.42-.12-.74-.36-.97s-.59-.35-1.06-.35-.82.12-1.07.35-.37.55-.37.97c0 .41.13.73.38.96.26.23.61.34 1.06.34s.8-.11 1.05-.34z\u0022\u003e\u003c/path\u003e\u003c/svg\u003e"} -->
		<figure class="wp-block-image is-style-icon" style="--wp--custom--icon--size:24px;--wp--custom--icon--url:url('data:image/svg+xml;utf8,<svg xmlns=&quot;http://www.w3.org/2000/svg&quot; viewBox=&quot;-2 -2 24 24&quot; role=&quot;img&quot; aria-labelledby=&quot;icon-notice-warning-2&quot; data-icon=&quot;wordpress-warning&quot; width=&quot;24&quot; height=&quot;24&quot; fill=&quot;currentColor&quot;&gt;<title id=&quot;icon-notice-warning-2&quot;&gt;Warning Icon</title&gt;<path d=&quot;M10 2c4.42 0 8 3.58 8 8s-3.58 8-8 8-8-3.58-8-8 3.58-8 8-8zm1.13 9.38.35-6.46H8.52l.35 6.46h2.26zm-.09 3.36c.24-.23.37-.55.37-.96 0-.42-.12-.74-.36-.97s-.59-.35-1.06-.35-.82.12-1.07.35-.37.55-.37.97c0 .41.13.73.38.96.26.23.61.34 1.06.34s.8-.11 1.05-.34z&quot;&gt;</path&gt;</svg&gt;')"><img alt="" /></figure>
		<!-- /wp:image -->

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
