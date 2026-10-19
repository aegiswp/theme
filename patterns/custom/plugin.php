<?php
/**
 * Title: Custom Plugin — Product Page
 * Slug: plugin
 * Categories: custom
 * Keywords: aegis, plugin, free, blocks, map, modal, conditionals, snippets, integrations
 * Description: Full-page product pattern for the free Aegis companion plugin.
 * Viewport Width: 1280
 * Block Types: core/post-content
 * Post Types: page
 */
?>
<!-- wp:group {"metadata":{"name":"Custom Plugin"},"align":"full","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull">
<!-- wp:group {"metadata":{"name":"Hero"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
<!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|md"}}},"layout":{"type":"constrained","contentSize":"760px"}} -->
<div class="wp-block-group" style="padding-bottom:var(--wp--preset--spacing--md)">
<!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group">
<!-- wp:paragraph {"align":"center","className":"is-style-sub-heading","style":{"border":{"width":"1px","radius":"99px"},"spacing":{"padding":{"top":"6px","bottom":"6px","right":"var:preset|spacing|xs","left":"var:preset|spacing|xs"},"margin":{"top":"0","bottom":"var:preset|spacing|xs"}},"typography":{"lineHeight":"1"}},"backgroundColor":"neutral-950","textColor":"primary-25","borderColor":"neutral-950","fontSize":"12"} -->
<p class="has-text-align-center is-style-sub-heading has-border-color has-neutral-950-border-color has-primary-25-color has-text-color has-neutral-950-background-color has-background has-12-font-size" style="border-width:1px;border-radius:99px;margin-top:0;margin-bottom:var(--wp--preset--spacing--xs);padding-top:6px;padding-right:var(--wp--preset--spacing--xs);padding-bottom:6px;padding-left:var(--wp--preset--spacing--xs);line-height:1"><?php echo esc_html__( 'FREE COMPANION PLUGIN', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:heading {"textAlign":"center","level":1,"style":{"spacing":{"padding":{"top":"var:preset|spacing|xs"}}},"fontSize":"60"} -->
<h1 class="wp-block-heading has-text-align-center has-60-font-size" style="padding-top:var(--wp--preset--spacing--xs)"><?php echo esc_html__( 'One dashboard to control every block', 'aegis' ); ?></h1>
<!-- /wp:heading -->
<!-- wp:paragraph {"align":"center","fontSize":"20"} -->
<p class="has-text-align-center has-20-font-size"><?php echo esc_html__( 'The free Aegis plugin adds Map and Modal blocks, about 150 feature toggles, conditional visibility, code snippets, 22 plugin integrations, and privacy-first analytics — all inside WordPress, no page builder.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--md);margin-bottom:var(--wp--preset--spacing--md)">
<!-- wp:button {"backgroundColor":"neutral-800","size":"large","iconSet":"remixicon","iconName":"download-2-line","iconSize":"16px","iconPosition":"end"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-neutral-800-background-color has-background wp-element-button" href="<?php echo esc_url( home_url( '/download/#aegis-plugin' ) ); ?>"><?php echo esc_html__( 'Download the plugin — free', 'aegis' ); ?></a></div>
<!-- /wp:button -->
<!-- wp:button {"size":"large","className":"is-style-ghost","iconSet":"remixicon","iconName":"time-line","iconSize":"16px","iconPosition":"end"} -->
<div class="wp-block-button is-style-ghost"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/pro/' ) ); ?>"><?php echo esc_html__( 'Pro — coming soon', 'aegis' ); ?></a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
<!-- wp:paragraph {"align":"center","textColor":"neutral-500","fontSize":"14"} -->
<p class="has-text-align-center has-neutral-500-color has-text-color has-14-font-size"><?php echo esc_html__( 'Requires the free Aegis theme · Nothing is sent to third parties until you configure it', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
<!-- wp:image {"aspectRatio":"16/9","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"wide"} -->
<figure class="wp-block-image alignwide size-full"><img alt="<?php echo esc_attr__( 'Screenshot placeholder: Aegis dashboard with Blocks, Conditionals, and Integrations tabs', 'aegis' ); ?>" style="aspect-ratio:16/9;object-fit:cover"/></figure>
<!-- /wp:image -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Numbers"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|md","left":"var:preset|spacing|lg"}}},"className":"is-style-surface","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-surface" style="padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--lg)">
<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|md"}},"layout":{"type":"grid","columnCount":5,"minimumColumnWidth":"120px"}} -->
<div class="wp-block-group alignwide">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group">
<!-- wp:paragraph {"align":"center","className":"is-style-heading","style":{"typography":{"lineHeight":"1"}},"fontSize":"48"} -->
<p class="has-text-align-center is-style-heading has-48-font-size" style="line-height:1"><?php echo esc_html__( '12', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"align":"center","textColor":"neutral-500","fontSize":"14"} -->
<p class="has-text-align-center has-neutral-500-color has-text-color has-14-font-size"><?php echo esc_html__( 'Admin screens', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group">
<!-- wp:paragraph {"align":"center","className":"is-style-heading","style":{"typography":{"lineHeight":"1"}},"fontSize":"48"} -->
<p class="has-text-align-center is-style-heading has-48-font-size" style="line-height:1"><?php echo esc_html__( '150+', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"align":"center","textColor":"neutral-500","fontSize":"14"} -->
<p class="has-text-align-center has-neutral-500-color has-text-color has-14-font-size"><?php echo esc_html__( 'Feature toggles', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group">
<!-- wp:paragraph {"align":"center","className":"is-style-heading","style":{"typography":{"lineHeight":"1"}},"fontSize":"48"} -->
<p class="has-text-align-center is-style-heading has-48-font-size" style="line-height:1"><?php echo esc_html__( '22', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"align":"center","textColor":"neutral-500","fontSize":"14"} -->
<p class="has-text-align-center has-neutral-500-color has-text-color has-14-font-size"><?php echo esc_html__( 'Plugin integrations', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group">
<!-- wp:paragraph {"align":"center","className":"is-style-heading","style":{"typography":{"lineHeight":"1"}},"fontSize":"48"} -->
<p class="has-text-align-center is-style-heading has-48-font-size" style="line-height:1"><?php echo esc_html__( '9', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"align":"center","textColor":"neutral-500","fontSize":"14"} -->
<p class="has-text-align-center has-neutral-500-color has-text-color has-14-font-size"><?php echo esc_html__( 'Service connectors', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group">
<!-- wp:paragraph {"align":"center","className":"is-style-heading","style":{"typography":{"lineHeight":"1"}},"fontSize":"48"} -->
<p class="has-text-align-center is-style-heading has-48-font-size" style="line-height:1"><?php echo esc_html__( '4', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"align":"center","textColor":"neutral-500","fontSize":"14"} -->
<p class="has-text-align-center has-neutral-500-color has-text-color has-14-font-size"><?php echo esc_html__( 'Snippet languages', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Blocks"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
<!-- wp:group {"metadata":{"name":"Heading"},"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained","contentSize":"720px"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--lg)">
<!-- wp:paragraph {"align":"center","className":"is-style-sub-heading"} -->
<p class="has-text-align-center is-style-sub-heading"><?php echo esc_html__( 'Two new blocks', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:heading {"textAlign":"center","fontSize":"48"} -->
<h2 class="wp-block-heading has-text-align-center has-48-font-size"><?php echo esc_html__( 'Map and Modal, Done Right', 'aegis' ); ?></h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"align":"center","fontSize":"18"} -->
<p class="has-text-align-center has-18-font-size"><?php echo esc_html__( 'Both blocks follow your theme tokens and only load their scripts on pages that use them.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"grid","columnCount":2,"minimumColumnWidth":"340px"}} -->
<div class="wp-block-group alignwide">
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/map-pin-2-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'aegis/map', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Map Block', 'aegis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Google Maps or OpenStreetMap with a privacy-friendly click-to-load preview.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:list {"className":"is-style-checklist","style":{"spacing":{"blockGap":"var:preset|spacing|xxs","margin":{"top":"var:preset|spacing|xxs"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
<ul style="margin-top:var(--wp--preset--spacing--xxs)" class="wp-block-list is-style-checklist">
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Silver, Dark, Retro, Night, and Aubergine styles', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Multiple markers with info windows', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Zoom, map type, street view, and fullscreen controls', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Automatic OpenStreetMap fallback without an API key', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'LocalBusiness schema from the block', 'aegis' ); ?></li>
<!-- /wp:list-item -->
</ul>
<!-- /wp:list -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/window-2-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'aegis/modal', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Modal Block', 'aegis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Accessible popups with focus trap, Escape to close, and light/dark styling.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:list {"className":"is-style-checklist","style":{"spacing":{"blockGap":"var:preset|spacing|xxs","margin":{"top":"var:preset|spacing|xxs"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
<ul style="margin-top:var(--wp--preset--spacing--xxs)" class="wp-block-list is-style-checklist">
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Popup, off-canvas, bottom sheet, and fullscreen layouts', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Open from a button, icon, text, or image', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Fade, slide, and zoom animations', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Contact, video, newsletter, and cookie-consent starters', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Reuse anywhere with the [aegis_modal] shortcode', 'aegis' ); ?></li>
<!-- /wp:list-item -->
</ul>
<!-- /wp:list -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Studio"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}},"className":"is-style-surface","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-surface" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
<!-- wp:group {"metadata":{"name":"Heading"},"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained","contentSize":"720px"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--lg)">
<!-- wp:paragraph {"align":"center","className":"is-style-sub-heading"} -->
<p class="has-text-align-center is-style-sub-heading"><?php echo esc_html__( 'Blocks studio', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:heading {"textAlign":"center","fontSize":"48"} -->
<h2 class="wp-block-heading has-text-align-center has-48-font-size"><?php echo esc_html__( 'Turn on Only What You Need', 'aegis' ); ?></h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"align":"center","fontSize":"18"} -->
<p class="has-text-align-center has-18-font-size"><?php echo esc_html__( 'Every block feature has its own switch under Aegis → Blocks. Off means no inspector panel, no CSS, and no JavaScript on the front end.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"grid","columnCount":3,"minimumColumnWidth":"280px"}} -->
<div class="wp-block-group alignwide">
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/list-settings-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Accordion and Toggle', 'aegis' ); ?></h3>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Expandable lists and pill, switch, or button content switchers.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/timer-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Countdown and Counter', 'aegis' ); ?></h3>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Segments, labels, expiry messages, timezone, Event schema, and count-up numbers.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/image-2-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Lightbox', 'aegis' ); ?></h3>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Grouped navigation, zoom, thumbnails, and swipe on core images.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/slideshow-3-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Slider and Marquee', 'aegis' ); ?></h3>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Fade, navigation, pagination, autoplay, and keyboard; tickers with pause on hover.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/mail-send-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Newsletter Field', 'aegis' ); ?></h3>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Email validation, custom placeholder, and a success message on signup forms.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/play-circle-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Video Player', 'aegis' ); ?></h3>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Custom player chrome, theater mode, keyboard shortcuts, and Video schema on core/video.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/layout-grid-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Query Loop Extras', 'aegis' ); ?></h3>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Multiple post types, taxonomy and custom-field filters, extended ordering, responsive columns, featured first post, equal-height cards, and empty states.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/links-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Related Posts', 'aegis' ); ?></h3>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Relate by terms, order, fallback, layout variants, excerpt length, and image ratio.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/shapes-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Icons and SVG', 'aegis' ); ?></h3>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Icon library collections, custom SVG, inline SVG files, mask mode, and paste-in markup.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
<!-- wp:image {"aspectRatio":"16/9","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"wide"} -->
<figure class="wp-block-image alignwide size-full"><img alt="<?php echo esc_attr__( 'Screenshot placeholder: Aegis → Blocks feature toggles', 'aegis' ); ?>" style="aspect-ratio:16/9;object-fit:cover"/></figure>
<!-- /wp:image -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Conditionals"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
<!-- wp:group {"metadata":{"name":"Heading"},"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained","contentSize":"720px"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--lg)">
<!-- wp:paragraph {"align":"center","className":"is-style-sub-heading"} -->
<p class="has-text-align-center is-style-sub-heading"><?php echo esc_html__( 'Conditional logic', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:heading {"textAlign":"center","fontSize":"48"} -->
<h2 class="wp-block-heading has-text-align-center has-48-font-size"><?php echo esc_html__( 'Show the Right Block to the Right Visitor', 'aegis' ); ?></h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"align":"center","fontSize":"18"} -->
<p class="has-text-align-center has-18-font-size"><?php echo esc_html__( 'Server-side rules remove hidden blocks from the HTML, so private or off-schedule content never reaches the page.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"grid","columnCount":4,"minimumColumnWidth":"220px"}} -->
<div class="wp-block-group alignwide">
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/eye-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Where', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Visibility', 'aegis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Hide by screen size, custom breakpoint, page type, browser or device, URL query string, or lock a block down entirely.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/user-settings-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Who', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'User', 'aegis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Show blocks to logged-in or logged-out visitors, by role, capability, or specific users.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/calendar-schedule-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'When', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Schedule', 'aegis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Date and time windows, days of the week, and daily time ranges in any timezone.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/accessibility-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'How', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Accessibility', 'aegis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'React to reduced motion, high contrast, forced colors, and light or dark mode, or keep content for screen readers only.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Snippets"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}},"className":"is-style-surface","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-surface" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
<!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}}} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center">
<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center">
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Code snippets and hooks', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:heading {"fontSize":"48"} -->
<h2 class="wp-block-heading has-48-font-size"><?php echo esc_html__( 'Add Code Without Touching the Theme', 'aegis' ); ?></h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"18"} -->
<p class="has-18-font-size"><?php echo esc_html__( 'Snippets are stored in uploads, so theme and plugin updates never wipe them.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:list {"className":"is-style-checklist","style":{"spacing":{"blockGap":"var:preset|spacing|xxs","margin":{"top":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
<ul style="margin-top:var(--wp--preset--spacing--sm)" class="wp-block-list is-style-checklist">
<!-- wp:list-item -->
<li><?php echo esc_html__( 'CSS, JavaScript, HTML, and PHP snippets at theme and integration hook locations', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'PHP snippets need an explicit opt-in and switch off automatically on fatal errors', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'A catalog of every injection location with click-to-copy hook names', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Front-end preview that highlights hook and snippet positions for admins', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Checkout and cart locations when WooCommerce is active', 'aegis' ); ?></li>
<!-- /wp:list-item -->
</ul>
<!-- /wp:list -->
</div>
<!-- /wp:column -->
<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center">
<!-- wp:image {"aspectRatio":"16/9","scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img alt="<?php echo esc_attr__( 'Screenshot placeholder: snippet editor and injection preview overlay', 'aegis' ); ?>" style="aspect-ratio:16/9;object-fit:cover"/></figure>
<!-- /wp:image -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Integrations"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
<!-- wp:group {"metadata":{"name":"Heading"},"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained","contentSize":"720px"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--lg)">
<!-- wp:paragraph {"align":"center","className":"is-style-sub-heading"} -->
<p class="has-text-align-center is-style-sub-heading"><?php echo esc_html__( 'Integrations', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:heading {"textAlign":"center","fontSize":"48"} -->
<h2 class="wp-block-heading has-text-align-center has-48-font-size"><?php echo esc_html__( 'Works with the Plugins You Already Use', 'aegis' ); ?></h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"align":"center","fontSize":"18"} -->
<p class="has-text-align-center has-18-font-size"><?php echo esc_html__( 'Switch each integration on or off. Aegis reminds you when a supported plugin is installed but its integration is disabled.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"grid","columnCount":4,"minimumColumnWidth":"220px"}} -->
<div class="wp-block-group alignwide">
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/store-2-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'E-commerce', 'aegis' ); ?></h3>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'WooCommerce, Easy Digital Downloads, and AffiliateWP.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/graduation-cap-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Learning', 'aegis' ); ?></h3>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'LearnDash, LifterLMS, and Sensei LMS.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/survey-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Forms and Booking', 'aegis' ); ?></h3>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Gravity Forms, Ninja Forms, Fluent Forms, and Fluent Booking.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/seo-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'SEO', 'aegis' ); ?></h3>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Rank Math, Yoast SEO, All in One SEO, and SEOPress, with schema delegation and breadcrumb styling.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/chat-3-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Community and Content', 'aegis' ); ?></h3>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'bbPress forums and Co-Authors Plus, with optional author schema.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/user-heart-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'CRM', 'aegis' ); ?></h3>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'FluentCRM and WP Fusion.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/database-2-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Developer', 'aegis' ); ?></h3>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Advanced Custom Fields, Meta Box, Code Block Pro, and Syntax Highlighting Code Block.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Connectors"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}},"className":"is-style-surface","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-surface" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
<!-- wp:columns {"verticalAlignment":"center","align":"wide","className":"is-reverse-on-mobile","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}}} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center is-reverse-on-mobile">
<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center">
<!-- wp:image {"aspectRatio":"16/9","scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img alt="<?php echo esc_attr__( 'Screenshot placeholder: Aegis → Connectors with analytics providers', 'aegis' ); ?>" style="aspect-ratio:16/9;object-fit:cover"/></figure>
<!-- /wp:image -->
</div>
<!-- /wp:column -->
<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center">
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Connectors and privacy', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:heading {"fontSize":"48"} -->
<h2 class="wp-block-heading has-48-font-size"><?php echo esc_html__( 'Analytics Without the Guilt', 'aegis' ); ?></h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"18"} -->
<p class="has-18-font-size"><?php echo esc_html__( 'Add a provider by pasting an ID. Consent and Do Not Track are respected before any tag loads.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:list {"className":"is-style-checklist","style":{"spacing":{"blockGap":"var:preset|spacing|xxs","margin":{"top":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
<ul style="margin-top:var(--wp--preset--spacing--sm)" class="wp-block-list is-style-checklist">
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Google Analytics 4, Tag Manager, Microsoft Clarity, Plausible, Fathom, Matomo, and Meta Pixel', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Google Maps browser and server keys with a built-in connection test', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Require consent, honor DNT and GPC, and integrate with Complianz', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Serve analytics scripts locally where the provider allows it', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'BunnyCDN credentials stored here, ready for Pro video', 'aegis' ); ?></li>
<!-- /wp:list-item -->
</ul>
<!-- /wp:list -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"More"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
<!-- wp:group {"metadata":{"name":"Heading"},"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained","contentSize":"720px"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--lg)">
<!-- wp:paragraph {"align":"center","className":"is-style-sub-heading"} -->
<p class="has-text-align-center is-style-sub-heading"><?php echo esc_html__( 'And more', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:heading {"textAlign":"center","fontSize":"48"} -->
<h2 class="wp-block-heading has-text-align-center has-48-font-size"><?php echo esc_html__( 'The Small Things That Save Hours', 'aegis' ); ?></h2>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->
<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"grid","columnCount":4,"minimumColumnWidth":"220px"}} -->
<div class="wp-block-group alignwide">
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/speed-up-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Speed', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Performance', 'aegis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Remove oEmbed, guest dashicons, front-end heartbeat, XML-RPC, and head clutter. Click-to-load YouTube and Vimeo embeds. Trim WooCommerce cart fragments and off-store assets.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/seo-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Search', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'SEO Schema', 'aegis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'FAQ, Event, LocalBusiness, and Video structured data from your blocks — or hand it to your SEO plugin to avoid duplicates.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/shopping-cart-2-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Store', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Commerce Patterns', 'aegis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'WooCommerce shop, product, cart, and checkout patterns, a multi-step checkout, and a wishlist page.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/settings-4-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Workflow', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Admin That Stays Out of the Way', 'aegis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Instant tab switching, export, import, and reset on every settings screen, plus sanitized SVG uploads.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Upgrade"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}},"className":"is-style-surface","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-surface" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
<!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}}} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center">
<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center">
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Coming soon', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:heading {"fontSize":"48"} -->
<h2 class="wp-block-heading has-48-font-size"><?php echo esc_html__( 'Pro Will Unlock the Toggles You Already See', 'aegis' ); ?></h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"18"} -->
<p class="has-18-font-size"><?php echo esc_html__( 'At launch, install Pro and the same screens light up — no second dashboard, no migration.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:list {"className":"is-style-checklist","style":{"spacing":{"blockGap":"var:preset|spacing|xxs","margin":{"top":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
<ul style="margin-top:var(--wp--preset--spacing--sm)" class="wp-block-list is-style-checklist">
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Map directions, store locator, heatmaps, and marker clustering', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Exit-intent, scroll-depth, and timed modals that show once', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Cookie, referral, location, and post-meta conditions plus reusable presets', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Hook patterns: design blocks once and inject them at any hook', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'BunnyCDN video, AJAX Query Loops, and 5,400+ icons', 'aegis' ); ?></li>
<!-- /wp:list-item -->
</ul>
<!-- /wp:list -->
<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm"}}},"layout":{"type":"flex","justifyContent":"left"}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--sm);margin-bottom:var(--wp--preset--spacing--sm)">
<!-- wp:button {"backgroundColor":"neutral-800","iconSet":"remixicon","iconName":"arrow-right-line","iconSize":"16px","iconPosition":"end"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-neutral-800-background-color has-background wp-element-button" href="<?php echo esc_url( home_url( '/pro/' ) ); ?>"><?php echo esc_html__( 'Preview Pro', 'aegis' ); ?></a></div>
<!-- /wp:button -->
<!-- wp:button {"className":"is-style-ghost","iconSet":"remixicon","iconName":"price-tag-3-line","iconSize":"16px","iconPosition":"end"} -->
<div class="wp-block-button is-style-ghost"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/pro/#pricing' ) ); ?>"><?php echo esc_html__( 'See planned pricing', 'aegis' ); ?></a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
</div>
<!-- /wp:column -->
<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center">
<!-- wp:image {"aspectRatio":"16/9","scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img alt="<?php echo esc_attr__( 'Screenshot placeholder: Pro toggles unlocked in Aegis → Blocks', 'aegis' ); ?>" style="aspect-ratio:16/9;object-fit:cover"/></figure>
<!-- /wp:image -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Ecosystem"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}},"className":"is-style-surface","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-surface" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
<!-- wp:group {"metadata":{"name":"Heading"},"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained","contentSize":"720px"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--lg)">
<!-- wp:paragraph {"align":"center","className":"is-style-sub-heading"} -->
<p class="has-text-align-center is-style-sub-heading"><?php echo esc_html__( 'Better together', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:heading {"textAlign":"center","fontSize":"48"} -->
<h2 class="wp-block-heading has-text-align-center has-48-font-size"><?php echo esc_html__( 'One System, Three Layers', 'aegis' ); ?></h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"align":"center","fontSize":"18"} -->
<p class="has-text-align-center has-18-font-size"><?php echo esc_html__( 'Every layer uses the same tokens and the same Aegis dashboard. Add the next one when you need it.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"grid","columnCount":2,"minimumColumnWidth":"320px"}} -->
<div class="wp-block-group alignwide">
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/palette-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Aegis Theme — Free', 'aegis' ); ?></h3>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'The design system underneath: tokens, 60 style variations, 236 patterns, and 50 templates.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><a href="<?php echo esc_url( home_url( '/theme/' ) ); ?>"><?php echo esc_html__( 'Explore the theme →', 'aegis' ); ?></a></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/vip-crown-2-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Aegis Pro — Coming Soon', 'aegis' ); ?></h3>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Video hosting, hook patterns, advanced conditions, Query Loop Pro, and 5,400+ icons.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><a href="<?php echo esc_url( home_url( '/pro/' ) ); ?>"><?php echo esc_html__( 'Explore Pro →', 'aegis' ); ?></a></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"FAQ"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
<!-- wp:group {"metadata":{"name":"Heading"},"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained","contentSize":"720px"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--lg)">
<!-- wp:paragraph {"align":"center","className":"is-style-sub-heading"} -->
<p class="has-text-align-center is-style-sub-heading"><?php echo esc_html__( 'FAQ', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:heading {"textAlign":"center","fontSize":"48"} -->
<h2 class="wp-block-heading has-text-align-center has-48-font-size"><?php echo esc_html__( 'Plugin Questions, Answered', 'aegis' ); ?></h2>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->
<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide">
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:details {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
<details class="wp-block-details is-style-surface" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)"><summary><?php echo esc_html__( 'Do I need the Aegis theme?', 'aegis' ); ?></summary>
<!-- wp:paragraph {"fontSize":"16"} -->
<p class="has-16-font-size"><?php echo esc_html__( 'Yes. The plugin is a companion to the Aegis theme and does not load on other themes.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</details>
<!-- /wp:details -->
<!-- wp:details {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
<details class="wp-block-details is-style-surface" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)"><summary><?php echo esc_html__( 'Is it really free?', 'aegis' ); ?></summary>
<!-- wp:paragraph {"fontSize":"16"} -->
<p class="has-16-font-size"><?php echo esc_html__( 'Yes. Map, Modal, every free toggle, conditionals, snippets, integrations, connectors, and performance tools are free and GPL-licensed.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</details>
<!-- /wp:details -->
<!-- wp:details {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
<details class="wp-block-details is-style-surface" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)"><summary><?php echo esc_html__( 'Will it slow my site down?', 'aegis' ); ?></summary>
<!-- wp:paragraph {"fontSize":"16"} -->
<p class="has-16-font-size"><?php echo esc_html__( 'No. Features are off until you turn them on, and their assets load only on pages that use them.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</details>
<!-- /wp:details -->
<!-- wp:details {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
<details class="wp-block-details is-style-surface" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)"><summary><?php echo esc_html__( 'Does it send data anywhere?', 'aegis' ); ?></summary>
<!-- wp:paragraph {"fontSize":"16"} -->
<p class="has-16-font-size"><?php echo esc_html__( 'Not by default. Maps and analytics connect only after you add credentials and enable a provider.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</details>
<!-- /wp:details -->
</div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:details {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
<details class="wp-block-details is-style-surface" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)"><summary><?php echo esc_html__( 'Can I use conditionals without Pro?', 'aegis' ); ?></summary>
<!-- wp:paragraph {"fontSize":"16"} -->
<p class="has-16-font-size"><?php echo esc_html__( 'Yes. Visibility, user, schedule, and accessibility rules are free. Presets, extra rules, and plugin-specific conditions need Pro.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</details>
<!-- /wp:details -->
<!-- wp:details {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
<details class="wp-block-details is-style-surface" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)"><summary><?php echo esc_html__( 'Can I move settings between sites?', 'aegis' ); ?></summary>
<!-- wp:paragraph {"fontSize":"16"} -->
<p class="has-16-font-size"><?php echo esc_html__( 'Yes. Each settings screen exports and imports JSON, and you can reset any screen to defaults.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</details>
<!-- /wp:details -->
<!-- wp:details {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
<details class="wp-block-details is-style-surface" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)"><summary><?php echo esc_html__( 'What changes when I add Pro?', 'aegis' ); ?></summary>
<!-- wp:paragraph {"fontSize":"16"} -->
<p class="has-16-font-size"><?php echo esc_html__( 'Pro activates under Aegis → License and unlocks the toggles marked Pro in the same dashboard. Your free settings stay as they are.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</details>
<!-- /wp:details -->
<!-- wp:details {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
<details class="wp-block-details is-style-surface" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)"><summary><?php echo esc_html__( 'Do I need to know code?', 'aegis' ); ?></summary>
<!-- wp:paragraph {"fontSize":"16"} -->
<p class="has-16-font-size"><?php echo esc_html__( 'No. Everything is a switch or a block setting. Snippets and hooks are there when you want them.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</details>
<!-- /wp:details -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"CTA"},"align":"full","className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|xl","left":"var:preset|spacing|lg"}}},"layout":{"type":"constrained","contentSize":"680px"}} -->
<div class="wp-block-group alignfull is-style-surface" style="padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--xl);padding-left:var(--wp--preset--spacing--lg)">
<!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/dashboard-3-line","textColor":"primary-500","style":{"dimensions":{"width":"40px"}}} /-->
<!-- wp:heading {"textAlign":"center","fontSize":"40"} -->
<h2 class="wp-block-heading has-text-align-center has-40-font-size"><?php echo esc_html__( 'Take Control of Your Blocks', 'aegis' ); ?></h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"align":"center","fontSize":"18"} -->
<p class="has-text-align-center has-18-font-size"><?php echo esc_html__( 'Install the free plugin beside the Aegis theme and open Aegis → Dashboard.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons">
<!-- wp:button {"backgroundColor":"neutral-800"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-neutral-800-background-color has-background wp-element-button" href="<?php echo esc_url( home_url( '/download/#aegis-plugin' ) ); ?>"><?php echo esc_html__( 'Download the plugin — free', 'aegis' ); ?></a></div>
<!-- /wp:button -->
<!-- wp:button {"className":"is-style-ghost"} -->
<div class="wp-block-button is-style-ghost"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/pro/' ) ); ?>"><?php echo esc_html__( 'Compare Pro', 'aegis' ); ?></a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
