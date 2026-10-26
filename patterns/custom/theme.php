<?php
/**
 * Title: Custom Theme — Product Page
 * Slug: theme
 * Categories: custom
 * Keywords: aegis, theme, block theme, design system, patterns, style variations
 * Description: Full-page product pattern for the free Aegis block theme.
 * Viewport Width: 1280
 * Block Types: core/post-content
 * Post Types: page
 */
?>
<!-- wp:group {"metadata":{"name":"Custom Theme"},"align":"full","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull">
<!-- wp:group {"metadata":{"name":"Hero"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)"><!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|md"}}},"layout":{"type":"constrained","contentSize":"760px"}} -->
<div class="wp-block-group" style="padding-bottom:var(--wp--preset--spacing--md)"><!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"className":"is-style-sub-heading has-border-color has-neutral-950-border-color","style":{"border":{"width":"1px","radius":"99px"},"spacing":{"padding":{"top":"6px","bottom":"6px","right":"var:preset|spacing|xs","left":"var:preset|spacing|xs"},"margin":{"top":"0","bottom":"var:preset|spacing|xs"}},"typography":{"lineHeight":"1","textAlign":"center"}},"backgroundColor":"neutral-950","textColor":"primary-25","fontSize":"12"} -->
<p class="has-text-align-center is-style-sub-heading has-border-color has-neutral-950-border-color has-primary-25-color has-neutral-950-background-color has-text-color has-background has-12-font-size" style="border-width:1px;border-radius:99px;margin-top:0;margin-bottom:var(--wp--preset--spacing--xs);padding-top:6px;padding-right:var(--wp--preset--spacing--xs);padding-bottom:6px;padding-left:var(--wp--preset--spacing--xs);line-height:1"><?php echo esc_html__( 'FREE BLOCK THEME', 'aegis' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1,"style":{"spacing":{"padding":{"top":"var:preset|spacing|xs"}},"typography":{"textAlign":"center"}},"fontSize":"60"} -->
<h1 class="wp-block-heading has-text-align-center has-60-font-size" style="padding-top:var(--wp--preset--spacing--xs)"><?php echo esc_html__( 'The Design System WordPress Was Missing', 'aegis' ); ?></h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"}},"fontSize":"20"} -->
<p class="has-text-align-center has-20-font-size"><?php echo esc_html__( 'Aegis is a full-site-editing block theme built on tokens: 40 colors, 27 fluid type sizes, 11 spacing steps, 60 style variations, 234 patterns, and 50 templates. No page builder. No lock-in.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--md);margin-bottom:var(--wp--preset--spacing--md)"><!-- wp:button {"backgroundColor":"neutral-800","size":"large","iconSet":"remixicon","iconName":"download-2-line","iconSize":"16px","iconPosition":"end"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-neutral-800-background-color has-background wp-element-button" href="https://github.com/aegiswp/theme/releases/download/v1.0.1/aegis.zip"><?php echo esc_html__( 'Download Aegis — Free', 'aegis' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-ghost","size":"large","iconSet":"remixicon","iconName":"arrow-right-line","iconSize":"16px","iconPosition":"end"} -->
<div class="wp-block-button is-style-ghost"><a class="wp-block-button__link wp-element-button" href="https://www.atmostfear-entertainment.com/aegis/plugin/"><?php echo esc_html__( 'See the Free Plugin', 'aegis' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"}},"textColor":"neutral-500","fontSize":"14"} -->
<p class="has-text-align-center has-neutral-500-color has-text-color has-14-font-size"><?php echo esc_html__( 'WordPress 7.0+ · PHP 8.1+ · GPL-2.0-or-later', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:aegis/image-compare {"beforeImage":{"id":251646,"url":"https://www.atmostfear-entertainment.com/wp-content/uploads/2026/10/aegis_100_dark_mode.png","alt":"Aegis site in dark mode","width":1920,"height":938,"sizes":{"full":{"url":"https://www.atmostfear-entertainment.com/wp-content/uploads/2026/10/aegis_100_dark_mode.png","height":938,"width":1920,"orientation":"landscape"}}},"afterImage":{"id":251651,"url":"https://www.atmostfear-entertainment.com/wp-content/uploads/2026/10/aegis_100_light_mode.png","alt":"Aegis site in light mode","width":1920,"height":938,"sizes":{"full":{"url":"https://www.atmostfear-entertainment.com/wp-content/uploads/2026/10/aegis_100_light_mode.png","height":938,"width":1920,"orientation":"landscape"}}}} -->
<div class="wp-block-aegis-image-compare"><img src="https://www.atmostfear-entertainment.com/wp-content/uploads/2026/10/aegis_100_dark_mode.png" alt="Aegis site in dark mode"/><img src="https://www.atmostfear-entertainment.com/wp-content/uploads/2026/10/aegis_100_light_mode.png" alt="Aegis site in light mode"/></div>
<!-- /wp:aegis/image-compare --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Numbers"},"align":"full","className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|md","left":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-surface" style="padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--lg)"><!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|md"}},"layout":{"type":"grid","columnCount":5,"minimumColumnWidth":"120px"}} -->
<div class="wp-block-group alignwide"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"className":"is-style-heading","style":{"typography":{"lineHeight":"1","textAlign":"center"}},"fontSize":"48"} -->
<p class="has-text-align-center is-style-heading has-48-font-size" style="line-height:1">234</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"}},"textColor":"neutral-500","fontSize":"14"} -->
<p class="has-text-align-center has-neutral-500-color has-text-color has-14-font-size"><?php echo esc_html__( 'Block Patterns', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"className":"is-style-heading","style":{"typography":{"lineHeight":"1","textAlign":"center"}},"fontSize":"48"} -->
<p class="has-text-align-center is-style-heading has-48-font-size" style="line-height:1">60</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"}},"textColor":"neutral-500","fontSize":"14"} -->
<p class="has-text-align-center has-neutral-500-color has-text-color has-14-font-size"><?php echo esc_html__( 'Style Variations', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"className":"is-style-heading","style":{"typography":{"lineHeight":"1","textAlign":"center"}},"fontSize":"48"} -->
<p class="has-text-align-center is-style-heading has-48-font-size" style="line-height:1">50</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"}},"textColor":"neutral-500","fontSize":"14"} -->
<p class="has-text-align-center has-neutral-500-color has-text-color has-14-font-size"><?php echo esc_html__( 'Templates', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"className":"is-style-heading","style":{"typography":{"lineHeight":"1","textAlign":"center"}},"fontSize":"48"} -->
<p class="has-text-align-center is-style-heading has-48-font-size" style="line-height:1">27</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"}},"textColor":"neutral-500","fontSize":"14"} -->
<p class="has-text-align-center has-neutral-500-color has-text-color has-14-font-size"><?php echo esc_html__( 'Fluid Type Sizes', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"className":"is-style-heading","style":{"typography":{"lineHeight":"1","textAlign":"center"}},"fontSize":"48"} -->
<p class="has-text-align-center is-style-heading has-48-font-size" style="line-height:1">31</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"}},"textColor":"neutral-500","fontSize":"14"} -->
<p class="has-text-align-center has-neutral-500-color has-text-color has-14-font-size"><?php echo esc_html__( 'Gradients', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Tokens"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)"><!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}}} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Design system', 'aegis' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"fontSize":"48"} -->
<h2 class="wp-block-heading has-48-font-size"><?php echo esc_html__( 'Tokens First, Pixels Never Guessed', 'aegis' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"18"} -->
<p class="has-18-font-size"><?php echo esc_html__( 'Everything lives in theme.json, so one change in Global Styles updates every block, pattern, and template on the site.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"is-style-checklist","style":{"spacing":{"blockGap":"var:preset|spacing|xxs","margin":{"top":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
<ul style="margin-top:var(--wp--preset--spacing--sm)" class="wp-block-list is-style-checklist"><!-- wp:list-item -->
<li><?php echo esc_html__( '40 color tokens in Primary, Neutral, Success, Info, Warning, and Error scales', 'aegis' ); ?></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><?php echo esc_html__( '27 fluid clamp() font sizes and 9 weight tokens', 'aegis' ); ?></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><?php echo esc_html__( '11 spacing steps from 4px to 96px, seven of them fluid', 'aegis' ); ?></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><?php echo esc_html__( '8 shadow presets, 31 gradients, and 10 duotones', 'aegis' ); ?></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><?php echo esc_html__( 'Self-hosted Lexend, Lexend Deca, and JetBrains Mono — no Google Fonts calls', 'aegis' ); ?></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":251660,"aspectRatio":"16/9","scale":"cover","sizeSlug":"full","isDecorative":true} -->
<figure class="wp-block-image size-full"><img src="https://www.atmostfear-entertainment.com/wp-content/uploads/2026/10/aegis_100_editor_styles.png" alt="" class="wp-image-251660" style="aspect-ratio:16/9;object-fit:cover" role="none"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Variations"},"align":"full","className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-surface" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)"><!-- wp:columns {"verticalAlignment":"center","align":"wide","className":"is-reverse-on-mobile","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}}} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center is-reverse-on-mobile"><!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":251661,"aspectRatio":"16/9","scale":"cover","sizeSlug":"full","linkDestination":"none","isDecorative":true} -->
<figure class="wp-block-image size-full"><img src="https://www.atmostfear-entertainment.com/wp-content/uploads/2026/10/aegis_100_editor_starter_patterns.png" alt="" class="wp-image-251661" style="aspect-ratio:16/9;object-fit:cover" role="none"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Style variations', 'aegis' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"fontSize":"48"} -->
<h2 class="wp-block-heading has-48-font-size"><?php echo esc_html__( 'Rebrand the Whole Site in One Click', 'aegis' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"18"} -->
<p class="has-18-font-size"><?php echo esc_html__( '60 curated palettes — from Zinc and Slate to Emerald, Terracotta, and Midnight. Each ships its own dark mapping, so light and dark stay on-brand.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"is-style-checklist","style":{"spacing":{"blockGap":"var:preset|spacing|xxs","margin":{"top":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
<ul style="margin-top:var(--wp--preset--spacing--sm)" class="wp-block-list is-style-checklist"><!-- wp:list-item -->
<li><?php echo esc_html__( 'Visitor dark-mode toggle that remembers the choice', 'aegis' ); ?></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><?php echo esc_html__( 'Follows prefers-color-scheme until the visitor picks', 'aegis' ); ?></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><?php echo esc_html__( 'Per-section dark mode with a single class on any Group', 'aegis' ); ?></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><?php echo esc_html__( 'Midnight, Obsidian, and Zinc start dark by default', 'aegis' ); ?></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Patterns"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)"><!-- wp:group {"metadata":{"name":"Heading"},"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained","contentSize":"720px"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--lg)"><!-- wp:paragraph {"className":"is-style-sub-heading","style":{"typography":{"textAlign":"center"}}} -->
<p class="has-text-align-center is-style-sub-heading"><?php echo esc_html__( 'Pattern library', 'aegis' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"typography":{"textAlign":"center"}},"fontSize":"48"} -->
<h2 class="wp-block-heading has-text-align-center has-48-font-size"><?php echo esc_html__( '234 Patterns That Inherit Your Brand', 'aegis' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"}},"fontSize":"18"} -->
<p class="has-text-align-center has-18-font-size"><?php echo esc_html__( 'Every pattern uses tokens, not hard-coded values, so it matches your chosen style variation the moment you insert it.', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"grid","columnCount":3,"minimumColumnWidth":"280px"}} -->
<div class="wp-block-group alignwide"><!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"remixicon/layout-masonry-line","style":{"dimensions":{"width":"20px"}},"textColor":"primary-500"} /-->

<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Marketing', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Heroes, Features, and CTAs', 'aegis' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Hero, featured, CTA, stats, logos, and timeline sections ready to drop into any page.', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"remixicon/pages-line","style":{"dimensions":{"width":"20px"}},"textColor":"primary-500"} /-->

<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Pages', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( '20 Full Pages', 'aegis' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'About, services, landing, portfolio, contact, shop, plus sales, squeeze, and thank-you funnels.', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"remixicon/calendar-event-line","style":{"dimensions":{"width":"20px"}},"textColor":"primary-500"} /-->

<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Events', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( '28 Event Layouts', 'aegis' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Conferences, music festivals, cinema premieres, exhibitions, workshops, and talks.', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"remixicon/article-line","style":{"dimensions":{"width":"20px"}},"textColor":"primary-500"} /-->

<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Editorial', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Blog and Author', 'aegis' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( '16 blog layouts and 6 author layouts, including masonry grids and related-post designs.', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"remixicon/shopping-bag-3-line","style":{"dimensions":{"width":"20px"}},"textColor":"primary-500"} /-->

<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Commerce', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Commerce Sections', 'aegis' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Trust badges, payment icons, size guides, shipping info, reviews, and product comparisons.', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"remixicon/notification-3-line","style":{"dimensions":{"width":"20px"}},"textColor":"primary-500"} /-->

<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Compliance', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( '16 Notices and Disclaimers', 'aegis' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Affiliate, medical, financial, legal, and sponsored disclosures, plus alert boxes.', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Templates"},"align":"full","className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-surface" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)"><!-- wp:group {"metadata":{"name":"Heading"},"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained","contentSize":"720px"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--lg)"><!-- wp:paragraph {"className":"is-style-sub-heading","style":{"typography":{"textAlign":"center"}}} -->
<p class="has-text-align-center is-style-sub-heading"><?php echo esc_html__( 'Templates', 'aegis' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"typography":{"textAlign":"center"}},"fontSize":"48"} -->
<h2 class="wp-block-heading has-text-align-center has-48-font-size"><?php echo esc_html__( 'A Template for Every Page You Will Build', 'aegis' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"}},"fontSize":"18"} -->
<p class="has-text-align-center has-18-font-size"><?php echo esc_html__( '50 Site Editor templates. Shop templates appear only when WooCommerce is active, so your picker stays clean.', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"grid","columnCount":4,"minimumColumnWidth":"220px"}} -->
<div class="wp-block-group alignwide"><!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"remixicon/layout-4-line","style":{"dimensions":{"width":"20px"}},"textColor":"primary-500"} /-->

<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( '11 templates', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Site Templates', 'aegis' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Index, front page, blog home, single, page, archive, author, guest author, date, search, and 404.', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"remixicon/layout-column-line","style":{"dimensions":{"width":"20px"}},"textColor":"primary-500"} /-->

<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( '13 templates', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Page Layouts', 'aegis' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Blank, full width, boxed, no title, with sidebar, landing, contact, hero minimal, coming soon, and maintenance.', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"remixicon/file-list-3-line","style":{"dimensions":{"width":"20px"}},"textColor":"primary-500"} /-->

<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( '9 templates', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Content Archives', 'aegis' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Category archives for books, events, podcasts, portfolio, recipes, and video, plus tag archives.', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"remixicon/store-2-line","style":{"dimensions":{"width":"20px"}},"textColor":"primary-500"} /-->

<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( '17 templates', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Shop Templates', 'aegis' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Product, product landing, archives, cart, checkout, multi-step checkout, account, wishlist, and order confirmation.', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Blocks"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)"><!-- wp:group {"metadata":{"name":"Heading"},"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained","contentSize":"720px"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--lg)"><!-- wp:paragraph {"className":"is-style-sub-heading","style":{"typography":{"textAlign":"center"}}} -->
<p class="has-text-align-center is-style-sub-heading"><?php echo esc_html__( 'Editor toolkit', 'aegis' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"typography":{"textAlign":"center"}},"fontSize":"48"} -->
<h2 class="wp-block-heading has-text-align-center has-48-font-size"><?php echo esc_html__( 'More From the Blocks You Already Know', 'aegis' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"}},"fontSize":"18"} -->
<p class="has-text-align-center has-18-font-size"><?php echo esc_html__( 'Six custom blocks, seven variations, and 20+ inspector controls — loaded only on pages that use them.', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"grid","columnCount":3,"minimumColumnWidth":"280px"}} -->
<div class="wp-block-group alignwide"><!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"remixicon/timer-line","style":{"dimensions":{"width":"20px"}},"textColor":"primary-500"} /-->

<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Block', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Countdown', 'aegis' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Timers with segments, labels, timezone, expiry behavior, and Event schema.', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"remixicon/slideshow-3-line","style":{"dimensions":{"width":"20px"}},"textColor":"primary-500"} /-->

<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Block', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Slider', 'aegis' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Carousels with fade, navigation, pagination, autoplay, and keyboard support.', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"remixicon/toggle-line","style":{"dimensions":{"width":"20px"}},"textColor":"primary-500"} /-->

<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Block', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Toggle', 'aegis' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Two-view content switcher in pill, switch, or button style — perfect for monthly/yearly pricing.', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"remixicon/links-line","style":{"dimensions":{"width":"20px"}},"textColor":"primary-500"} /-->

<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Block', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Related Posts', 'aegis' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Posts related by shared terms, with grid, list, card, and minimal layouts plus a fallback.', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"remixicon/list-settings-line","style":{"dimensions":{"width":"20px"}},"textColor":"primary-500"} /-->

<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Variations', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Accordion, Counter, Marquee', 'aegis' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Expandable lists, count-up numbers, and scrolling tickers built on core blocks.', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"remixicon/quill-pen-line","style":{"dimensions":{"width":"20px"}},"textColor":"primary-500"} /-->

<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Variations', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Curved Text, Grid, SVG, Newsletter', 'aegis' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Text on a path, CSS grid containers, inline SVG logos, and an email signup field.', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"remixicon/magic-line","style":{"dimensions":{"width":"20px"}},"textColor":"primary-500"} /-->

<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Controls', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Motion and Effects', 'aegis' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Animation, backdrop blur, box and text shadow, CSS filters, transforms, and opacity on any block.', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"remixicon/eye-line","style":{"dimensions":{"width":"20px"}},"textColor":"primary-500"} /-->

<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Controls', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Responsive Controls', 'aegis' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Per-breakpoint layout and visibility, query layouts, empty states, and reading-time template tags.', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"remixicon/brush-line","style":{"dimensions":{"width":"20px"}},"textColor":"primary-500"} /-->

<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Styles', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( '23 Block Style Sets', 'aegis' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Surface, light, and dark groups, checklist lists, badge terms, ghost buttons, and wave spacers.', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Navigation"},"align":"full","className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-surface" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)"><!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}}} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Navigation', 'aegis' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"fontSize":"48"} -->
<h2 class="wp-block-heading has-48-font-size"><?php echo esc_html__( 'Headers That Feel Custom', 'aegis' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"18"} -->
<p class="has-18-font-size"><?php echo esc_html__( 'Build rich menus on the canvas with the Core Navigation Block — no menu plugin required.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"is-style-checklist","style":{"spacing":{"blockGap":"var:preset|spacing|xxs","margin":{"top":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
<ul style="margin-top:var(--wp--preset--spacing--sm)" class="wp-block-list is-style-checklist"><!-- wp:list-item -->
<li><?php echo esc_html__( 'Four overlay styles: slide-in right, slide-in left, fullscreen, and scroll', 'aegis' ); ?></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><?php echo esc_html__( 'Multi-column mega menus on navigation submenus', 'aegis' ); ?></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><?php echo esc_html__( 'Sticky, transparent, and absolutely positioned headers', 'aegis' ); ?></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><?php echo esc_html__( 'CSS-only search toggle with a full-screen option', 'aegis' ); ?></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><?php echo esc_html__( 'Six header and six footer patterns, including checkout-friendly minimal versions', 'aegis' ); ?></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":251668,"aspectRatio":"16/9","scale":"cover","focalPoint":{"x":1,"y":0.5},"sizeSlug":"full","isDecorative":true} -->
<figure class="wp-block-image size-full"><img src="https://www.atmostfear-entertainment.com/wp-content/uploads/2026/10/aegis_100_headers.png" alt="" class="wp-image-251668" style="aspect-ratio:16/9;object-fit:cover;object-position:100% 50%" role="none"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Commerce"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)"><!-- wp:columns {"verticalAlignment":"center","align":"wide","className":"is-reverse-on-mobile","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}}} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center is-reverse-on-mobile"><!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":251664,"aspectRatio":"16/9","scale":"cover","sizeSlug":"full","isDecorative":true} -->
<figure class="wp-block-image size-full"><img src="https://www.atmostfear-entertainment.com/wp-content/uploads/2026/10/aegis_100_shop.png" alt="" class="wp-image-251664" style="aspect-ratio:16/9;object-fit:cover" role="none"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'WooCommerce', 'aegis' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"fontSize":"48"} -->
<h2 class="wp-block-heading has-48-font-size"><?php echo esc_html__( 'A Storefront Ready on Day One', 'aegis' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"18"} -->
<p class="has-18-font-size"><?php echo esc_html__( 'Templates and commerce styling ship in the theme and switch on when WooCommerce is active.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"is-style-checklist","style":{"spacing":{"blockGap":"var:preset|spacing|xxs","margin":{"top":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
<ul style="margin-top:var(--wp--preset--spacing--sm)" class="wp-block-list is-style-checklist"><!-- wp:list-item -->
<li><?php echo esc_html__( '17 shop templates, including a single-product landing page', 'aegis' ); ?></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><?php echo esc_html__( 'Multi-step checkout template with shipping, payment, and review steps', 'aegis' ); ?></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><?php echo esc_html__( 'Store headers with mini-cart and minimal checkout headers and footers', 'aegis' ); ?></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><?php echo esc_html__( 'Sale badges, store breadcrumbs, and a product-gallery lightbox', 'aegis' ); ?></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><?php echo esc_html__( 'Wishlist page template for TI WooCommerce Wishlist', 'aegis' ); ?></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Quality"},"align":"full","className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-surface" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)"><!-- wp:group {"metadata":{"name":"Heading"},"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained","contentSize":"720px"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--lg)"><!-- wp:paragraph {"className":"is-style-sub-heading","style":{"typography":{"textAlign":"center"}}} -->
<p class="has-text-align-center is-style-sub-heading"><?php echo esc_html__( 'Quality', 'aegis' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"typography":{"textAlign":"center"}},"fontSize":"48"} -->
<h2 class="wp-block-heading has-text-align-center has-48-font-size"><?php echo esc_html__( 'Fast, Accessible, and Built to Last', 'aegis' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"}},"fontSize":"18"} -->
<p class="has-text-align-center has-18-font-size"><?php echo esc_html__( 'Aegis uses WordPress core APIs only, so it stays compatible as the editor evolves.', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"grid","columnCount":4,"minimumColumnWidth":"220px"}} -->
<div class="wp-block-group alignwide"><!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"remixicon/accessibility-line","style":{"dimensions":{"width":"20px"}},"textColor":"primary-500"} /-->

<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Accessibility-ready', 'aegis' ); ?></h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Skip links, landmarks, visible focus styles, and keyboard support on sliders, toggles, accordions, and search. Built to target WCAG 2.2 AA.', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"remixicon/speed-up-line","style":{"dimensions":{"width":"20px"}},"textColor":"primary-500"} /-->

<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Loads Only What You Use', 'aegis' ); ?></h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'CSS and JavaScript load per feature, not as one bundle. Fonts are self-hosted and video embeds use click-to-load facades.', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"remixicon/shield-check-line","style":{"dimensions":{"width":"20px"}},"textColor":"primary-500"} /-->

<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Tested in CI', 'aegis' ); ?></h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Every change runs pa11y-ci against WCAG 2 AA with a zero-error threshold, plus PHPCS and theme.json validation.', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"remixicon/earth-line","style":{"dimensions":{"width":"20px"}},"textColor":"primary-500"} /-->

<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Global by Default', 'aegis' ); ?></h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'RTL support, translation-ready strings, and reduced-motion handling — slider autoplay pauses for visitors who ask for it.', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Compatibility"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)"><!-- wp:group {"metadata":{"name":"Heading"},"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained","contentSize":"720px"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--lg)"><!-- wp:paragraph {"className":"is-style-sub-heading","style":{"typography":{"textAlign":"center"}}} -->
<p class="has-text-align-center is-style-sub-heading"><?php echo esc_html__( 'Compatibility', 'aegis' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"typography":{"textAlign":"center"}},"fontSize":"48"} -->
<h2 class="wp-block-heading has-text-align-center has-48-font-size"><?php echo esc_html__( 'Styled for the Plugins You Already Run', 'aegis' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"}},"fontSize":"18"} -->
<p class="has-text-align-center has-18-font-size"><?php echo esc_html__( 'Matching styles ship in the theme for 16 popular plugins, including Co-Authors Plus and BunnyCDN, and load only when that plugin is present.', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"grid","columnCount":4,"minimumColumnWidth":"240px"}} -->
<div class="wp-block-group alignwide"><!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"},"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)"><!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Commerce', 'aegis' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"integrations/woocommerce","style":{"dimensions":{"width":"28px"},"layout":{"selfStretch":"fixedNoShrink","flexSize":"28px"}}} /-->

<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'WooCommerce', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"integrations/easy-digital-downloads","style":{"dimensions":{"width":"28px"},"layout":{"selfStretch":"fixedNoShrink","flexSize":"28px"}}} /-->

<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Easy Digital Downloads', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"integrations/affiliatewp","style":{"dimensions":{"width":"28px"},"layout":{"selfStretch":"fixedNoShrink","flexSize":"28px"}}} /-->

<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'AffiliateWP', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"},"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)"><!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Forms and booking', 'aegis' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"integrations/gravity-forms","style":{"dimensions":{"width":"28px"},"layout":{"selfStretch":"fixedNoShrink","flexSize":"28px"}}} /-->

<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Gravity Forms', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"integrations/ninja-forms","style":{"dimensions":{"width":"28px"},"layout":{"selfStretch":"fixedNoShrink","flexSize":"28px"}}} /-->

<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Ninja Forms', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"integrations/fluent-forms","style":{"dimensions":{"width":"28px"},"layout":{"selfStretch":"fixedNoShrink","flexSize":"28px"}}} /-->

<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Fluent Forms', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"integrations/fluent-booking","style":{"dimensions":{"width":"28px"},"layout":{"selfStretch":"fixedNoShrink","flexSize":"28px"}}} /-->

<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Fluent Booking', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"},"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)"><!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Learning', 'aegis' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"integrations/learndash","style":{"dimensions":{"width":"28px"},"layout":{"selfStretch":"fixedNoShrink","flexSize":"28px"}}} /-->

<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'LearnDash', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"integrations/lifterlms","style":{"dimensions":{"width":"28px"},"layout":{"selfStretch":"fixedNoShrink","flexSize":"28px"}}} /-->

<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'LifterLMS', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"integrations/sensei-lms","style":{"dimensions":{"width":"28px"},"layout":{"selfStretch":"fixedNoShrink","flexSize":"28px"}}} /-->

<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Sensei LMS', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"},"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)"><!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Community and content', 'aegis' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"integrations/bbpress","style":{"dimensions":{"width":"28px"},"layout":{"selfStretch":"fixedNoShrink","flexSize":"28px"}}} /-->

<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'bbPress', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"integrations/meta-box","style":{"dimensions":{"width":"28px"},"layout":{"selfStretch":"fixedNoShrink","flexSize":"28px"}}} /-->

<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Meta Box', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"integrations/code-block-pro","style":{"dimensions":{"width":"28px"},"layout":{"selfStretch":"fixedNoShrink","flexSize":"28px"}}} /-->

<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Code Block Pro', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"integrations/syntax-highlighting-code-block","style":{"dimensions":{"width":"28px"},"layout":{"selfStretch":"fixedNoShrink","flexSize":"28px"}}} /-->

<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Syntax Highlighting Code Block', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Developers"},"align":"full","className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-surface" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)"><!-- wp:group {"metadata":{"name":"Heading"},"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained","contentSize":"720px"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--lg)"><!-- wp:paragraph {"className":"is-style-sub-heading","style":{"typography":{"textAlign":"center"}}} -->
<p class="has-text-align-center is-style-sub-heading"><?php echo esc_html__( 'For developers', 'aegis' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"typography":{"textAlign":"center"}},"fontSize":"48"} -->
<h2 class="wp-block-heading has-text-align-center has-48-font-size"><?php echo esc_html__( 'Clean Code You Can Extend', 'aegis' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"}},"fontSize":"18"} -->
<p class="has-text-align-center has-18-font-size"><?php echo esc_html__( 'A real framework underneath, with documented hooks instead of template overrides.', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"grid","columnCount":4,"minimumColumnWidth":"220px"}} -->
<div class="wp-block-group alignwide"><!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"remixicon/braces-line","style":{"dimensions":{"width":"20px"}},"textColor":"primary-500"} /-->

<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Child-theme Friendly', 'aegis' ); ?></h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Pattern and icon directories are read from parent and child themes, so overrides just work.', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"remixicon/git-branch-line","style":{"dimensions":{"width":"20px"}},"textColor":"primary-500"} /-->

<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Hooks and Filters', 'aegis' ); ?></h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Before/after hooks on every template part and the content area, plus filters for patterns, dark mode, fonts, and reading time.', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"remixicon/terminal-box-line","style":{"dimensions":{"width":"20px"}},"textColor":"primary-500"} /-->

<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Dynamic Template Parts', 'aegis' ); ?></h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Swap headers, footers, or sidebars at render time with one filter.', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"remixicon/code-box-line","style":{"dimensions":{"width":"20px"}},"textColor":"primary-500"} /-->

<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Modern PHP', 'aegis' ); ?></h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Strict types, PSR-4 services, and Composer packages — PHP 8.1 and up.', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Ecosystem"},"align":"full","className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-surface" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)"><!-- wp:group {"metadata":{"name":"Heading"},"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained","contentSize":"720px"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--lg)"><!-- wp:paragraph {"className":"is-style-sub-heading","style":{"typography":{"textAlign":"center"}}} -->
<p class="has-text-align-center is-style-sub-heading"><?php echo esc_html__( 'Better together', 'aegis' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"typography":{"textAlign":"center"}},"fontSize":"48"} -->
<h2 class="wp-block-heading has-text-align-center has-48-font-size"><?php echo esc_html__( 'One System, Three Layers', 'aegis' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"}},"fontSize":"18"} -->
<p class="has-text-align-center has-18-font-size"><?php echo esc_html__( 'Every layer uses the same tokens and the same Aegis dashboard. Add the next one when you need it.', 'aegis' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"grid","columnCount":2,"minimumColumnWidth":"320px"}} -->
<div class="wp-block-group alignwide"><!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"remixicon/dashboard-3-line","style":{"dimensions":{"width":"20px"}},"textColor":"primary-500"} /-->

<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Aegis Plugin — Free', 'aegis' ); ?></h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'The control center: Map and Modal blocks, 82 feature toggles, conditionals, snippets, and integrations.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><a href="https://www.atmostfear-entertainment.com/aegis/plugin/" data-type="page" data-id="251628"><?php echo esc_html__( 'Explore the Plugin →', 'aegis' ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"remixicon/vip-crown-2-line","style":{"dimensions":{"width":"20px"}},"textColor":"primary-500"} /-->

<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Aegis Pro — Coming Soon', 'aegis' ); ?></h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Video hosting, hook patterns, advanced conditions, Query Loop Pro, and 5,400+ icons.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><a href="https://www.atmostfear-entertainment.com/aegis/pro/" data-type="page" data-id="251620"><?php echo esc_html__( 'Explore Pro →', 'aegis' ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"FAQ"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)"><!-- wp:group {"metadata":{"name":"Heading"},"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained","contentSize":"720px"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--lg)"><!-- wp:paragraph {"className":"is-style-sub-heading","style":{"typography":{"textAlign":"center"}}} -->
<p class="has-text-align-center is-style-sub-heading"><?php echo esc_html__( 'FAQ', 'aegis' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"typography":{"textAlign":"center"}},"fontSize":"48"} -->
<h2 class="wp-block-heading has-text-align-center has-48-font-size"><?php echo esc_html__( 'Theme Questions, Answered', 'aegis' ); ?></h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:details {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
<details class="wp-block-details is-style-surface" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)"><summary><?php echo esc_html__( 'Is Aegis really free?', 'aegis' ); ?></summary><!-- wp:paragraph {"fontSize":"16"} -->
<p class="has-16-font-size"><?php echo esc_html__( 'Yes. The theme is GPL-licensed with no license key and no upsell prompts. Update checks go only to its public GitHub releases, and Pro features live in a separate plugin.', 'aegis' ); ?></p>
<!-- /wp:paragraph --></details>
<!-- /wp:details -->

<!-- wp:details {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
<details class="wp-block-details is-style-surface" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)"><summary><?php echo esc_html__( 'What do I need to run it?', 'aegis' ); ?></summary><!-- wp:paragraph {"fontSize":"16"} -->
<p class="has-16-font-size"><?php echo esc_html__( 'WordPress 7.0 or later and PHP 8.1 or later. Icon library collections use the Icon block in WordPress 7.1.', 'aegis' ); ?></p>
<!-- /wp:paragraph --></details>
<!-- /wp:details -->

<!-- wp:details {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
<details class="wp-block-details is-style-surface" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)"><summary><?php echo esc_html__( 'Do I need a page builder?', 'aegis' ); ?></summary><!-- wp:paragraph {"fontSize":"16"} -->
<p class="has-16-font-size"><?php echo esc_html__( 'No. Aegis is a full-site-editing block theme. Layouts and styling happen in the Site Editor with patterns and theme.json tokens.', 'aegis' ); ?></p>
<!-- /wp:paragraph --></details>
<!-- /wp:details -->

<!-- wp:details {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
<details class="wp-block-details is-style-surface" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)"><summary><?php echo esc_html__( 'Do I need the companion plugin?', 'aegis' ); ?></summary><!-- wp:paragraph {"fontSize":"16"} -->
<p class="has-16-font-size"><?php echo esc_html__( 'No. The theme, its blocks, patterns, and templates work on their own. The free plugin adds Map and Modal blocks, conditionals, snippets, and a settings dashboard.', 'aegis' ); ?></p>
<!-- /wp:paragraph --></details>
<!-- /wp:details --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:details {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
<details class="wp-block-details is-style-surface" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)"><summary><?php echo esc_html__( 'Are fonts loaded from Google?', 'aegis' ); ?></summary><!-- wp:paragraph {"fontSize":"16"} -->
<p class="has-16-font-size"><?php echo esc_html__( 'No. Lexend, Lexend Deca, and JetBrains Mono are bundled in the theme under the SIL Open Font License.', 'aegis' ); ?></p>
<!-- /wp:paragraph --></details>
<!-- /wp:details -->

<!-- wp:details {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
<details class="wp-block-details is-style-surface" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)"><summary><?php echo esc_html__( 'Is WooCommerce required?', 'aegis' ); ?></summary><!-- wp:paragraph {"fontSize":"16"} -->
<p class="has-16-font-size"><?php echo esc_html__( 'No. Shop templates and styles only switch on when WooCommerce is active.', 'aegis' ); ?></p>
<!-- /wp:paragraph --></details>
<!-- /wp:details -->

<!-- wp:details {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
<details class="wp-block-details is-style-surface" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)"><summary><?php echo esc_html__( 'Is Aegis WCAG certified?', 'aegis' ); ?></summary><!-- wp:paragraph {"fontSize":"16"} -->
<p class="has-16-font-size"><?php echo esc_html__( 'No theme can be certified on its own. Aegis provides an accessibility-ready foundation targeting WCAG 2.2 AA; your content choices complete it.', 'aegis' ); ?></p>
<!-- /wp:paragraph --></details>
<!-- /wp:details -->

<!-- wp:details {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
<details class="wp-block-details is-style-surface" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)"><summary><?php echo esc_html__( 'Can I build a child theme?', 'aegis' ); ?></summary><!-- wp:paragraph {"fontSize":"16"} -->
<p class="has-16-font-size"><?php echo esc_html__( 'Yes. The framework reads patterns and icons from the child theme, and documented filters cover the most common customizations.', 'aegis' ); ?></p>
<!-- /wp:paragraph --></details>
<!-- /wp:details --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"CTA"},"align":"full","className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|xl","left":"var:preset|spacing|lg"}}},"layout":{"type":"constrained","contentSize":"680px"}} -->
<div class="wp-block-group alignfull is-style-surface" style="padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--xl);padding-left:var(--wp--preset--spacing--lg)"><!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"remixicon/palette-line","style":{"dimensions":{"width":"40px"}},"textColor":"primary-500"} /-->

<!-- wp:heading {"style":{"typography":{"textAlign":"center"}},"fontSize":"40"} -->
<h2 class="wp-block-heading has-text-align-center has-40-font-size"><?php echo esc_html__( 'Start Designing in the Site Editor', 'aegis' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"}},"fontSize":"18"} -->
<p class="has-text-align-center has-18-font-size"><?php echo esc_html__( 'Download Aegis free, pick a style variation, and publish your first page in minutes.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"neutral-800"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-neutral-800-background-color has-background wp-element-button" href="https://github.com/aegiswp/theme/releases/download/v1.0.1/aegis.zip"><?php echo esc_html__( 'Download Aegis — Free', 'aegis' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-ghost"} -->
<div class="wp-block-button is-style-ghost"><a class="wp-block-button__link wp-element-button" href="https://www.atmostfear-entertainment.com/aegis/plugin/"><?php echo esc_html__( 'Add the Free Plugin', 'aegis' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
