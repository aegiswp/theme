<?php
/**
 * Title: Age Verification Notice
 * Slug: notice-age-gate
 * Categories: notice
 * Keywords: notice, age, verification, gate, restriction, adult, 18
 * Description: An age verification gate notice with a lock icon and confirmation button.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["notice"],"patternName":"notice-age-gate","name":"Age Verification Notice"},"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg"}},"border":{"width":"1px","color":"var:preset|color|neutral-200","radius":"4px"}},"backgroundColor":"neutral-50","layout":{"type":"constrained","contentSize":"480px"}} -->
<div class="wp-block-group alignwide has-border-color has-neutral-50-background-color has-background" style="border-color:var(--wp--preset--color--neutral-200);border-width:1px;border-radius:4px;padding-top:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg)"><!-- wp:image {"className":"is-style-icon","iconSet":"wordpress","iconName":"lock","iconSize":"48px","iconSvgString":"\u003csvg xmlns=\u0022http://www.w3.org/2000/svg\u0022 viewBox=\u00220 0 24 24\u0022 role=\u0022img\u0022 aria-labelledby=\u0022icon-notice-lock-1\u0022 data-icon=\u0022wordpress-lock\u0022 width=\u002224\u0022 height=\u002224\u0022 fill=\u0022currentColor\u0022\u003e\u003ctitle id=\u0022icon-notice-lock-1\u0022\u003eLock Icon\u003c/title\u003e\u003cpath d=\u0022M17 10h-1.2V7c0-2.1-1.7-3.8-3.8-3.8-2.1 0-3.8 1.7-3.8 3.8v3H7c-.6 0-1 .4-1 1v8c0 .6.4 1 1 1h10c.6 0 1-.4 1-1v-8c0-.6-.4-1-1-1zm-2.8 0H9.8V7c0-1.2 1-2.2 2.2-2.2s2.2 1 2.2 2.2v3z\u0022\u003e\u003c/path\u003e\u003c/svg\u003e","align":"center"} -->
	<figure class="wp-block-image aligncenter is-style-icon" style="--wp--custom--icon--size:48px;--wp--custom--icon--url:url('data:image/svg+xml;utf8,<svg xmlns=&quot;http://www.w3.org/2000/svg&quot; viewBox=&quot;0 0 24 24&quot; role=&quot;img&quot; aria-labelledby=&quot;icon-notice-lock-1&quot; data-icon=&quot;wordpress-lock&quot; width=&quot;24&quot; height=&quot;24&quot; fill=&quot;currentColor&quot;&gt;<title id=&quot;icon-notice-lock-1&quot;&gt;Lock Icon</title&gt;<path d=&quot;M17 10h-1.2V7c0-2.1-1.7-3.8-3.8-3.8-2.1 0-3.8 1.7-3.8 3.8v3H7c-.6 0-1 .4-1 1v8c0 .6.4 1 1 1h10c.6 0 1-.4 1-1v-8c0-.6-.4-1-1-1zm-2.8 0H9.8V7c0-1.2 1-2.2 2.2-2.2s2.2 1 2.2 2.2v3z&quot;&gt;</path&gt;</svg&gt;')"><img alt="" /></figure>
	<!-- /wp:image -->

	<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"24"} -->
	<h3 class="wp-block-heading has-text-align-center has-24-font-size" style="font-style:normal;font-weight:700"><?php echo esc_html__( 'Age Verification Required', 'aegis' ); ?></h3>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"14px"}},"textColor":"neutral-600"} -->
	<p class="aligncenter has-text-align-center has-neutral-600-color has-text-color aligncenter" style="font-size:14px"><?php echo esc_html__( 'The content you are trying to access is age-restricted. You must be at least 18 years old to view this content. By clicking the button below, you confirm that you meet the minimum age requirement.', 'aegis' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|sm"}}}} -->
	<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--sm)"><!-- wp:button -->
		<div class="wp-block-button"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'I Am 18 or Older', 'aegis' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
