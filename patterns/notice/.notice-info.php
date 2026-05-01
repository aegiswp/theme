<?php
/**
 * Title: Info Notice
 * Slug: notice-info
 * Categories: notice
 * Keywords: notice, info, information, callout, alert, tip
 * Description: A general informational notice box with an info icon.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["notice"],"patternName":"notice-info","name":"Info Notice"},"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm","right":"var:preset|spacing|sm"}},"border":{"left":{"width":"4px","color":"var:preset|color|primary-500"},"top":{},"right":{},"bottom":{}},"borderRadius":"4px"},"backgroundColor":"neutral-50","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide has-neutral-50-background-color has-background" style="border-radius:4px;border-left-color:var(--wp--preset--color--primary-500);border-left-width:4px;padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
	<div class="wp-block-group"><!-- wp:image {"className":"is-style-icon","iconSet":"wordpress","iconName":"info","iconSize":"24px","iconSvgString":"\u003csvg xmlns=\u0022http://www.w3.org/2000/svg\u0022 viewBox=\u00220 0 24 24\u0022 role=\u0022img\u0022 aria-labelledby=\u0022icon-notice-info-2\u0022 data-icon=\u0022wordpress-info\u0022 width=\u002224\u0022 height=\u002224\u0022 fill=\u0022currentColor\u0022\u003e\u003ctitle id=\u0022icon-notice-info-2\u0022\u003eInfo Icon\u003c/title\u003e\u003cpath d=\u0022M12 3.2c-4.8 0-8.8 3.9-8.8 8.8 0 4.8 3.9 8.8 8.8 8.8 4.8 0 8.8-3.9 8.8-8.8 0-4.8-4-8.8-8.8-8.8zm0 16c-4 0-7.2-3.3-7.2-7.2C4.8 8 8 4.8 12 4.8s7.2 3.3 7.2 7.2c0 4-3.2 7.2-7.2 7.2zM11 17h2v-6h-2v6zm0-8h2V7h-2v2z\u0022\u003e\u003c/path\u003e\u003c/svg\u003e"} -->
		<figure class="wp-block-image is-style-icon" style="--wp--custom--icon--size:24px;--wp--custom--icon--url:url('data:image/svg+xml;utf8,<svg xmlns=&quot;http://www.w3.org/2000/svg&quot; viewBox=&quot;0 0 24 24&quot; role=&quot;img&quot; aria-labelledby=&quot;icon-notice-info-2&quot; data-icon=&quot;wordpress-info&quot; width=&quot;24&quot; height=&quot;24&quot; fill=&quot;currentColor&quot;&gt;<title id=&quot;icon-notice-info-2&quot;&gt;Info Icon</title&gt;<path d=&quot;M12 3.2c-4.8 0-8.8 3.9-8.8 8.8 0 4.8 3.9 8.8 8.8 8.8 4.8 0 8.8-3.9 8.8-8.8 0-4.8-4-8.8-8.8-8.8zm0 16c-4 0-7.2-3.3-7.2-7.2C4.8 8 8 4.8 12 4.8s7.2 3.3 7.2 7.2c0 4-3.2 7.2-7.2 7.2zM11 17h2v-6h-2v6zm0-8h2V7h-2v2z&quot;&gt;</path&gt;</svg&gt;')"><img alt="" /></figure>
		<!-- /wp:image -->

		<!-- wp:group {"layout":{"type":"constrained"}} -->
		<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"16"} -->
			<p class="has-16-font-size" style="font-style:normal;font-weight:600"><?php echo esc_html__( 'Information', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"style":{"typography":{"fontSize":"14px"}},"textColor":"neutral-600"} -->
			<p class="has-neutral-600-color has-text-color" style="font-size:14px"><?php echo esc_html__( 'This is an informational notice. Use it to highlight important details, tips, or supplementary information that your readers should be aware of.', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
