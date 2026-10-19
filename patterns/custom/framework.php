<?php
/**
 * Title: Custom Framework — Product Page
 * Slug: framework
 * Categories: custom
 * Keywords: aegis, framework, performance, design system, grid, tokens, vanilla js, react
 * Description: Full-page pattern presenting the Aegis framework: performance, design system, grid, and developer tooling.
 * Viewport Width: 1280
 * Block Types: core/post-content
 * Post Types: page
 */
?>
<!-- wp:group {"metadata":{"name":"Custom Framework"},"align":"full","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull">
<!-- wp:group {"metadata":{"name":"Hero"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
<!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|md"}}},"layout":{"type":"constrained","contentSize":"760px"}} -->
<div class="wp-block-group" style="padding-bottom:var(--wp--preset--spacing--md)">
<!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group">
<!-- wp:paragraph {"align":"center","className":"is-style-sub-heading","style":{"border":{"width":"1px","radius":"99px"},"spacing":{"padding":{"top":"6px","bottom":"6px","right":"var:preset|spacing|xs","left":"var:preset|spacing|xs"},"margin":{"top":"0","bottom":"var:preset|spacing|xs"}},"typography":{"lineHeight":"1"}},"backgroundColor":"neutral-950","textColor":"primary-25","borderColor":"neutral-950","fontSize":"12"} -->
<p class="has-text-align-center is-style-sub-heading has-border-color has-neutral-950-border-color has-primary-25-color has-text-color has-neutral-950-background-color has-background has-12-font-size" style="border-width:1px;border-radius:99px;margin-top:0;margin-bottom:var(--wp--preset--spacing--xs);padding-top:6px;padding-right:var(--wp--preset--spacing--xs);padding-bottom:6px;padding-left:var(--wp--preset--spacing--xs);line-height:1"><?php echo esc_html__( 'THE AEGIS FRAMEWORK', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:heading {"textAlign":"center","level":1,"style":{"spacing":{"padding":{"top":"var:preset|spacing|xs"}}},"fontSize":"60"} -->
<h1 class="wp-block-heading has-text-align-center has-60-font-size" style="padding-top:var(--wp--preset--spacing--xs)"><?php echo esc_html__( 'Engineered for Velocity', 'aegis' ); ?></h1>
<!-- /wp:heading -->
<!-- wp:paragraph {"align":"center","fontSize":"20"} -->
<p class="has-text-align-center has-20-font-size"><?php echo esc_html__( 'The framework inside Aegis loads zero CSS, JavaScript, or font assets by default. Every style and script is tied to a block or feature, and only ships when a page actually uses it.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--md);margin-bottom:var(--wp--preset--spacing--md)">
<!-- wp:button {"backgroundColor":"neutral-800","size":"large","iconSet":"remixicon","iconName":"download-2-line","iconSize":"16px","iconPosition":"end"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-neutral-800-background-color has-background wp-element-button" href="https://github.com/aegiswp/theme/releases/tag/v1.0.0"><?php echo esc_html__( 'Download Free', 'aegis' ); ?></a></div>
<!-- /wp:button -->
<!-- wp:button {"size":"large","className":"is-style-ghost","iconSet":"remixicon","iconName":"github-line","iconSize":"16px","iconPosition":"end"} -->
<div class="wp-block-button is-style-ghost"><a class="wp-block-button__link wp-element-button" href="https://github.com/aegiswp/theme"><?php echo esc_html__( 'View on GitHub', 'aegis' ); ?></a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
<!-- wp:paragraph {"align":"center","textColor":"neutral-500","fontSize":"14"} -->
<p class="has-text-align-center has-neutral-500-color has-text-color has-14-font-size"><?php echo esc_html__( 'WordPress 7.0+ · PHP 8.1+ · GPL-2.0-or-later', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
<!-- wp:image {"aspectRatio":"16/9","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"wide"} -->
<figure class="wp-block-image alignwide size-full"><img alt="<?php echo esc_attr__( 'Image placeholder: framework overview', 'aegis' ); ?>" style="aspect-ratio:16/9;object-fit:cover"/></figure>
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
<p class="has-text-align-center is-style-heading has-48-font-size" style="line-height:1"><?php echo esc_html__( '0', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"align":"center","textColor":"neutral-500","fontSize":"14"} -->
<p class="has-text-align-center has-neutral-500-color has-text-color has-14-font-size"><?php echo esc_html__( 'Assets loaded by default', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group">
<!-- wp:paragraph {"align":"center","className":"is-style-heading","style":{"typography":{"lineHeight":"1"}},"fontSize":"48"} -->
<p class="has-text-align-center is-style-heading has-48-font-size" style="line-height:1"><?php echo esc_html__( '173', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"align":"center","textColor":"neutral-500","fontSize":"14"} -->
<p class="has-text-align-center has-neutral-500-color has-text-color has-14-font-size"><?php echo esc_html__( 'CSS partials on demand', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group">
<!-- wp:paragraph {"align":"center","className":"is-style-heading","style":{"typography":{"lineHeight":"1"}},"fontSize":"48"} -->
<p class="has-text-align-center is-style-heading has-48-font-size" style="line-height:1"><?php echo esc_html__( '26', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"align":"center","textColor":"neutral-500","fontSize":"14"} -->
<p class="has-text-align-center has-neutral-500-color has-text-color has-14-font-size"><?php echo esc_html__( 'Script modules on demand', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group">
<!-- wp:paragraph {"align":"center","className":"is-style-heading","style":{"typography":{"lineHeight":"1"}},"fontSize":"48"} -->
<p class="has-text-align-center is-style-heading has-48-font-size" style="line-height:1"><?php echo esc_html__( '21', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"align":"center","textColor":"neutral-500","fontSize":"14"} -->
<p class="has-text-align-center has-neutral-500-color has-text-color has-14-font-size"><?php echo esc_html__( 'Inspector controls', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group">
<!-- wp:paragraph {"align":"center","className":"is-style-heading","style":{"typography":{"lineHeight":"1"}},"fontSize":"48"} -->
<p class="has-text-align-center is-style-heading has-48-font-size" style="line-height:1"><?php echo esc_html__( '6', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"align":"center","textColor":"neutral-500","fontSize":"14"} -->
<p class="has-text-align-center has-neutral-500-color has-text-color has-14-font-size"><?php echo esc_html__( 'Composer packages', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Loading"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
<!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}}} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center">
<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center">
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Performance', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:heading {"fontSize":"48"} -->
<h2 class="wp-block-heading has-48-font-size"><?php echo esc_html__( 'Nothing Loads Until It Is Needed', 'aegis' ); ?></h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"18"} -->
<p class="has-18-font-size"><?php echo esc_html__( 'Most themes ship one large stylesheet and script bundle to every page. Aegis builds each page’s assets from what is actually on it.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group">
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/search-eye-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Step 1', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Scan', 'aegis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'The framework reads the rendered template and notes which blocks, styles, and features the page uses.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/stack-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Step 2', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Inline', 'aegis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Only the matching CSS partials are combined into a single inline stylesheet — no extra requests to block rendering.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/timer-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Step 3', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Defer', 'aegis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Scripts load deferred. Heavier libraries, like the slider and masonry engines, wait until their block scrolls near the screen.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:column -->
<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center">
<!-- wp:image {"aspectRatio":"4/5","scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img alt="<?php echo esc_attr__( 'Image placeholder: page weight comparison', 'aegis' ); ?>" style="aspect-ratio:4/5;object-fit:cover"/></figure>
<!-- /wp:image -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Design system"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}},"className":"is-style-surface","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-surface" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
<!-- wp:group {"metadata":{"name":"Heading"},"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained","contentSize":"720px"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--lg)">
<!-- wp:paragraph {"align":"center","className":"is-style-sub-heading"} -->
<p class="has-text-align-center is-style-sub-heading"><?php echo esc_html__( 'Design system', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:heading {"textAlign":"center","fontSize":"48"} -->
<h2 class="wp-block-heading has-text-align-center has-48-font-size"><?php echo esc_html__( 'One Source of Truth: theme.json', 'aegis' ); ?></h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"align":"center","fontSize":"18"} -->
<p class="has-text-align-center has-18-font-size"><?php echo esc_html__( 'Every color, size, and space on an Aegis site comes from a token, so a single change in Global Styles updates the whole site.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"grid","columnCount":3,"minimumColumnWidth":"280px"}} -->
<div class="wp-block-group alignwide">
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/palette-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Color', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Color Palette', 'aegis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( '40 semantic tokens in Primary, Neutral, Success, Info, Warning, and Error scales. Patterns never hard-code hex values.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/quill-pen-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Type', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Fluid Typography', 'aegis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( '27 clamp()-based sizes, 9 weight tokens, and three self-hosted variable fonts: Lexend, Lexend Deca, and JetBrains Mono.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/ruler-2-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Space', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Spacing Scale', 'aegis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( '11 steps from 4px to 96px, with the larger seven scaling to the screen, kept separate from font sizes so rhythm stays predictable.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/shadow-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Effects', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Depth and Effects', 'aegis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( '8 shadow presets, 31 gradients, and 10 duotones, all driven by the same color tokens.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/contrast-2-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Modes', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Dark Mode', 'aegis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'A class, not a second theme. Tokens remap per page or per section, and visitors can switch with a remembered toggle.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/brush-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Variations', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( '60 Style Variations', 'aegis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Complete palettes with their own dark mapping. Switch one and every block, pattern, and template follows.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Palette"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
<!-- wp:group {"metadata":{"name":"Heading"},"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained","contentSize":"720px"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--lg)">
<!-- wp:paragraph {"align":"center","className":"is-style-sub-heading"} -->
<p class="has-text-align-center is-style-sub-heading"><?php echo esc_html__( 'Palette', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:heading {"textAlign":"center","fontSize":"48"} -->
<h2 class="wp-block-heading has-text-align-center has-48-font-size"><?php echo esc_html__( 'Semantic Color, Ready for Any Brand', 'aegis' ); ?></h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"align":"center","fontSize":"18"} -->
<p class="has-text-align-center has-18-font-size"><?php echo esc_html__( 'These swatches are live tokens. Switch the style variation and they change with it.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide">
<!-- wp:paragraph {"className":"is-style-sub-heading","style":{"spacing":{"margin":{"top":"var:preset|spacing|md"}}}} -->
<p class="is-style-sub-heading" style="margin-top:var(--wp--preset--spacing--md)"><?php echo esc_html__( 'Primary', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"grid","columnCount":12,"minimumColumnWidth":"56px"}} -->
<div class="wp-block-group alignwide">
<!-- wp:paragraph {"backgroundColor":"primary-25","textColor":"neutral-950","style":{"border":{"radius":"6px"},"spacing":{"padding":{"top":"var:preset|spacing|xl","right":"var:preset|spacing|xxs","bottom":"var:preset|spacing|xxs","left":"var:preset|spacing|xxs"}}},"fontSize":"12"} -->
<p class="has-neutral-950-color has-text-color has-primary-25-background-color has-background has-12-font-size" style="border-radius:6px;padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--xxs);padding-bottom:var(--wp--preset--spacing--xxs);padding-left:var(--wp--preset--spacing--xxs)"><?php echo esc_html__( '25', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"backgroundColor":"primary-50","textColor":"neutral-950","style":{"border":{"radius":"6px"},"spacing":{"padding":{"top":"var:preset|spacing|xl","right":"var:preset|spacing|xxs","bottom":"var:preset|spacing|xxs","left":"var:preset|spacing|xxs"}}},"fontSize":"12"} -->
<p class="has-neutral-950-color has-text-color has-primary-50-background-color has-background has-12-font-size" style="border-radius:6px;padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--xxs);padding-bottom:var(--wp--preset--spacing--xxs);padding-left:var(--wp--preset--spacing--xxs)"><?php echo esc_html__( '50', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"backgroundColor":"primary-100","textColor":"neutral-950","style":{"border":{"radius":"6px"},"spacing":{"padding":{"top":"var:preset|spacing|xl","right":"var:preset|spacing|xxs","bottom":"var:preset|spacing|xxs","left":"var:preset|spacing|xxs"}}},"fontSize":"12"} -->
<p class="has-neutral-950-color has-text-color has-primary-100-background-color has-background has-12-font-size" style="border-radius:6px;padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--xxs);padding-bottom:var(--wp--preset--spacing--xxs);padding-left:var(--wp--preset--spacing--xxs)"><?php echo esc_html__( '100', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"backgroundColor":"primary-200","textColor":"neutral-950","style":{"border":{"radius":"6px"},"spacing":{"padding":{"top":"var:preset|spacing|xl","right":"var:preset|spacing|xxs","bottom":"var:preset|spacing|xxs","left":"var:preset|spacing|xxs"}}},"fontSize":"12"} -->
<p class="has-neutral-950-color has-text-color has-primary-200-background-color has-background has-12-font-size" style="border-radius:6px;padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--xxs);padding-bottom:var(--wp--preset--spacing--xxs);padding-left:var(--wp--preset--spacing--xxs)"><?php echo esc_html__( '200', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"backgroundColor":"primary-300","textColor":"neutral-950","style":{"border":{"radius":"6px"},"spacing":{"padding":{"top":"var:preset|spacing|xl","right":"var:preset|spacing|xxs","bottom":"var:preset|spacing|xxs","left":"var:preset|spacing|xxs"}}},"fontSize":"12"} -->
<p class="has-neutral-950-color has-text-color has-primary-300-background-color has-background has-12-font-size" style="border-radius:6px;padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--xxs);padding-bottom:var(--wp--preset--spacing--xxs);padding-left:var(--wp--preset--spacing--xxs)"><?php echo esc_html__( '300', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"backgroundColor":"primary-400","textColor":"neutral-950","style":{"border":{"radius":"6px"},"spacing":{"padding":{"top":"var:preset|spacing|xl","right":"var:preset|spacing|xxs","bottom":"var:preset|spacing|xxs","left":"var:preset|spacing|xxs"}}},"fontSize":"12"} -->
<p class="has-neutral-950-color has-text-color has-primary-400-background-color has-background has-12-font-size" style="border-radius:6px;padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--xxs);padding-bottom:var(--wp--preset--spacing--xxs);padding-left:var(--wp--preset--spacing--xxs)"><?php echo esc_html__( '400', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"backgroundColor":"primary-500","textColor":"neutral-0","style":{"border":{"radius":"6px"},"spacing":{"padding":{"top":"var:preset|spacing|xl","right":"var:preset|spacing|xxs","bottom":"var:preset|spacing|xxs","left":"var:preset|spacing|xxs"}}},"fontSize":"12"} -->
<p class="has-neutral-0-color has-text-color has-primary-500-background-color has-background has-12-font-size" style="border-radius:6px;padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--xxs);padding-bottom:var(--wp--preset--spacing--xxs);padding-left:var(--wp--preset--spacing--xxs)"><?php echo esc_html__( '500', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"backgroundColor":"primary-600","textColor":"neutral-0","style":{"border":{"radius":"6px"},"spacing":{"padding":{"top":"var:preset|spacing|xl","right":"var:preset|spacing|xxs","bottom":"var:preset|spacing|xxs","left":"var:preset|spacing|xxs"}}},"fontSize":"12"} -->
<p class="has-neutral-0-color has-text-color has-primary-600-background-color has-background has-12-font-size" style="border-radius:6px;padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--xxs);padding-bottom:var(--wp--preset--spacing--xxs);padding-left:var(--wp--preset--spacing--xxs)"><?php echo esc_html__( '600', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"backgroundColor":"primary-700","textColor":"neutral-0","style":{"border":{"radius":"6px"},"spacing":{"padding":{"top":"var:preset|spacing|xl","right":"var:preset|spacing|xxs","bottom":"var:preset|spacing|xxs","left":"var:preset|spacing|xxs"}}},"fontSize":"12"} -->
<p class="has-neutral-0-color has-text-color has-primary-700-background-color has-background has-12-font-size" style="border-radius:6px;padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--xxs);padding-bottom:var(--wp--preset--spacing--xxs);padding-left:var(--wp--preset--spacing--xxs)"><?php echo esc_html__( '700', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"backgroundColor":"primary-800","textColor":"neutral-0","style":{"border":{"radius":"6px"},"spacing":{"padding":{"top":"var:preset|spacing|xl","right":"var:preset|spacing|xxs","bottom":"var:preset|spacing|xxs","left":"var:preset|spacing|xxs"}}},"fontSize":"12"} -->
<p class="has-neutral-0-color has-text-color has-primary-800-background-color has-background has-12-font-size" style="border-radius:6px;padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--xxs);padding-bottom:var(--wp--preset--spacing--xxs);padding-left:var(--wp--preset--spacing--xxs)"><?php echo esc_html__( '800', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"backgroundColor":"primary-900","textColor":"neutral-0","style":{"border":{"radius":"6px"},"spacing":{"padding":{"top":"var:preset|spacing|xl","right":"var:preset|spacing|xxs","bottom":"var:preset|spacing|xxs","left":"var:preset|spacing|xxs"}}},"fontSize":"12"} -->
<p class="has-neutral-0-color has-text-color has-primary-900-background-color has-background has-12-font-size" style="border-radius:6px;padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--xxs);padding-bottom:var(--wp--preset--spacing--xxs);padding-left:var(--wp--preset--spacing--xxs)"><?php echo esc_html__( '900', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"backgroundColor":"primary-950","textColor":"neutral-0","style":{"border":{"radius":"6px"},"spacing":{"padding":{"top":"var:preset|spacing|xl","right":"var:preset|spacing|xxs","bottom":"var:preset|spacing|xxs","left":"var:preset|spacing|xxs"}}},"fontSize":"12"} -->
<p class="has-neutral-0-color has-text-color has-primary-950-background-color has-background has-12-font-size" style="border-radius:6px;padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--xxs);padding-bottom:var(--wp--preset--spacing--xxs);padding-left:var(--wp--preset--spacing--xxs)"><?php echo esc_html__( '950', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:paragraph {"className":"is-style-sub-heading","style":{"spacing":{"margin":{"top":"var:preset|spacing|md"}}}} -->
<p class="is-style-sub-heading" style="margin-top:var(--wp--preset--spacing--md)"><?php echo esc_html__( 'Neutral', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"grid","columnCount":12,"minimumColumnWidth":"56px"}} -->
<div class="wp-block-group alignwide">
<!-- wp:paragraph {"backgroundColor":"neutral-0","textColor":"neutral-950","style":{"border":{"radius":"6px"},"spacing":{"padding":{"top":"var:preset|spacing|xl","right":"var:preset|spacing|xxs","bottom":"var:preset|spacing|xxs","left":"var:preset|spacing|xxs"}}},"fontSize":"12"} -->
<p class="has-neutral-950-color has-text-color has-neutral-0-background-color has-background has-12-font-size" style="border-radius:6px;padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--xxs);padding-bottom:var(--wp--preset--spacing--xxs);padding-left:var(--wp--preset--spacing--xxs)"><?php echo esc_html__( '0', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"backgroundColor":"neutral-50","textColor":"neutral-950","style":{"border":{"radius":"6px"},"spacing":{"padding":{"top":"var:preset|spacing|xl","right":"var:preset|spacing|xxs","bottom":"var:preset|spacing|xxs","left":"var:preset|spacing|xxs"}}},"fontSize":"12"} -->
<p class="has-neutral-950-color has-text-color has-neutral-50-background-color has-background has-12-font-size" style="border-radius:6px;padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--xxs);padding-bottom:var(--wp--preset--spacing--xxs);padding-left:var(--wp--preset--spacing--xxs)"><?php echo esc_html__( '50', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"backgroundColor":"neutral-100","textColor":"neutral-950","style":{"border":{"radius":"6px"},"spacing":{"padding":{"top":"var:preset|spacing|xl","right":"var:preset|spacing|xxs","bottom":"var:preset|spacing|xxs","left":"var:preset|spacing|xxs"}}},"fontSize":"12"} -->
<p class="has-neutral-950-color has-text-color has-neutral-100-background-color has-background has-12-font-size" style="border-radius:6px;padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--xxs);padding-bottom:var(--wp--preset--spacing--xxs);padding-left:var(--wp--preset--spacing--xxs)"><?php echo esc_html__( '100', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"backgroundColor":"neutral-200","textColor":"neutral-950","style":{"border":{"radius":"6px"},"spacing":{"padding":{"top":"var:preset|spacing|xl","right":"var:preset|spacing|xxs","bottom":"var:preset|spacing|xxs","left":"var:preset|spacing|xxs"}}},"fontSize":"12"} -->
<p class="has-neutral-950-color has-text-color has-neutral-200-background-color has-background has-12-font-size" style="border-radius:6px;padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--xxs);padding-bottom:var(--wp--preset--spacing--xxs);padding-left:var(--wp--preset--spacing--xxs)"><?php echo esc_html__( '200', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"backgroundColor":"neutral-300","textColor":"neutral-950","style":{"border":{"radius":"6px"},"spacing":{"padding":{"top":"var:preset|spacing|xl","right":"var:preset|spacing|xxs","bottom":"var:preset|spacing|xxs","left":"var:preset|spacing|xxs"}}},"fontSize":"12"} -->
<p class="has-neutral-950-color has-text-color has-neutral-300-background-color has-background has-12-font-size" style="border-radius:6px;padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--xxs);padding-bottom:var(--wp--preset--spacing--xxs);padding-left:var(--wp--preset--spacing--xxs)"><?php echo esc_html__( '300', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"backgroundColor":"neutral-400","textColor":"neutral-950","style":{"border":{"radius":"6px"},"spacing":{"padding":{"top":"var:preset|spacing|xl","right":"var:preset|spacing|xxs","bottom":"var:preset|spacing|xxs","left":"var:preset|spacing|xxs"}}},"fontSize":"12"} -->
<p class="has-neutral-950-color has-text-color has-neutral-400-background-color has-background has-12-font-size" style="border-radius:6px;padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--xxs);padding-bottom:var(--wp--preset--spacing--xxs);padding-left:var(--wp--preset--spacing--xxs)"><?php echo esc_html__( '400', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"backgroundColor":"neutral-500","textColor":"neutral-0","style":{"border":{"radius":"6px"},"spacing":{"padding":{"top":"var:preset|spacing|xl","right":"var:preset|spacing|xxs","bottom":"var:preset|spacing|xxs","left":"var:preset|spacing|xxs"}}},"fontSize":"12"} -->
<p class="has-neutral-0-color has-text-color has-neutral-500-background-color has-background has-12-font-size" style="border-radius:6px;padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--xxs);padding-bottom:var(--wp--preset--spacing--xxs);padding-left:var(--wp--preset--spacing--xxs)"><?php echo esc_html__( '500', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"backgroundColor":"neutral-600","textColor":"neutral-0","style":{"border":{"radius":"6px"},"spacing":{"padding":{"top":"var:preset|spacing|xl","right":"var:preset|spacing|xxs","bottom":"var:preset|spacing|xxs","left":"var:preset|spacing|xxs"}}},"fontSize":"12"} -->
<p class="has-neutral-0-color has-text-color has-neutral-600-background-color has-background has-12-font-size" style="border-radius:6px;padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--xxs);padding-bottom:var(--wp--preset--spacing--xxs);padding-left:var(--wp--preset--spacing--xxs)"><?php echo esc_html__( '600', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"backgroundColor":"neutral-700","textColor":"neutral-0","style":{"border":{"radius":"6px"},"spacing":{"padding":{"top":"var:preset|spacing|xl","right":"var:preset|spacing|xxs","bottom":"var:preset|spacing|xxs","left":"var:preset|spacing|xxs"}}},"fontSize":"12"} -->
<p class="has-neutral-0-color has-text-color has-neutral-700-background-color has-background has-12-font-size" style="border-radius:6px;padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--xxs);padding-bottom:var(--wp--preset--spacing--xxs);padding-left:var(--wp--preset--spacing--xxs)"><?php echo esc_html__( '700', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"backgroundColor":"neutral-800","textColor":"neutral-0","style":{"border":{"radius":"6px"},"spacing":{"padding":{"top":"var:preset|spacing|xl","right":"var:preset|spacing|xxs","bottom":"var:preset|spacing|xxs","left":"var:preset|spacing|xxs"}}},"fontSize":"12"} -->
<p class="has-neutral-0-color has-text-color has-neutral-800-background-color has-background has-12-font-size" style="border-radius:6px;padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--xxs);padding-bottom:var(--wp--preset--spacing--xxs);padding-left:var(--wp--preset--spacing--xxs)"><?php echo esc_html__( '800', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"backgroundColor":"neutral-900","textColor":"neutral-0","style":{"border":{"radius":"6px"},"spacing":{"padding":{"top":"var:preset|spacing|xl","right":"var:preset|spacing|xxs","bottom":"var:preset|spacing|xxs","left":"var:preset|spacing|xxs"}}},"fontSize":"12"} -->
<p class="has-neutral-0-color has-text-color has-neutral-900-background-color has-background has-12-font-size" style="border-radius:6px;padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--xxs);padding-bottom:var(--wp--preset--spacing--xxs);padding-left:var(--wp--preset--spacing--xxs)"><?php echo esc_html__( '900', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"backgroundColor":"neutral-950","textColor":"neutral-0","style":{"border":{"radius":"6px"},"spacing":{"padding":{"top":"var:preset|spacing|xl","right":"var:preset|spacing|xxs","bottom":"var:preset|spacing|xxs","left":"var:preset|spacing|xxs"}}},"fontSize":"12"} -->
<p class="has-neutral-0-color has-text-color has-neutral-950-background-color has-background has-12-font-size" style="border-radius:6px;padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--xxs);padding-bottom:var(--wp--preset--spacing--xxs);padding-left:var(--wp--preset--spacing--xxs)"><?php echo esc_html__( '950', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:paragraph {"className":"is-style-sub-heading","style":{"spacing":{"margin":{"top":"var:preset|spacing|md"}}}} -->
<p class="is-style-sub-heading" style="margin-top:var(--wp--preset--spacing--md)"><?php echo esc_html__( 'Status', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"grid","columnCount":12,"minimumColumnWidth":"56px"}} -->
<div class="wp-block-group alignwide">
<!-- wp:paragraph {"backgroundColor":"success-100","textColor":"neutral-950","style":{"border":{"radius":"6px"},"spacing":{"padding":{"top":"var:preset|spacing|xl","right":"var:preset|spacing|xxs","bottom":"var:preset|spacing|xxs","left":"var:preset|spacing|xxs"}}},"fontSize":"12"} -->
<p class="has-neutral-950-color has-text-color has-success-100-background-color has-background has-12-font-size" style="border-radius:6px;padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--xxs);padding-bottom:var(--wp--preset--spacing--xxs);padding-left:var(--wp--preset--spacing--xxs)"><?php echo esc_html__( 'Success 100', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"backgroundColor":"success-500","textColor":"neutral-0","style":{"border":{"radius":"6px"},"spacing":{"padding":{"top":"var:preset|spacing|xl","right":"var:preset|spacing|xxs","bottom":"var:preset|spacing|xxs","left":"var:preset|spacing|xxs"}}},"fontSize":"12"} -->
<p class="has-neutral-0-color has-text-color has-success-500-background-color has-background has-12-font-size" style="border-radius:6px;padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--xxs);padding-bottom:var(--wp--preset--spacing--xxs);padding-left:var(--wp--preset--spacing--xxs)"><?php echo esc_html__( 'Success 500', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"backgroundColor":"success-600","textColor":"neutral-0","style":{"border":{"radius":"6px"},"spacing":{"padding":{"top":"var:preset|spacing|xl","right":"var:preset|spacing|xxs","bottom":"var:preset|spacing|xxs","left":"var:preset|spacing|xxs"}}},"fontSize":"12"} -->
<p class="has-neutral-0-color has-text-color has-success-600-background-color has-background has-12-font-size" style="border-radius:6px;padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--xxs);padding-bottom:var(--wp--preset--spacing--xxs);padding-left:var(--wp--preset--spacing--xxs)"><?php echo esc_html__( 'Success 600', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"backgroundColor":"info-100","textColor":"neutral-950","style":{"border":{"radius":"6px"},"spacing":{"padding":{"top":"var:preset|spacing|xl","right":"var:preset|spacing|xxs","bottom":"var:preset|spacing|xxs","left":"var:preset|spacing|xxs"}}},"fontSize":"12"} -->
<p class="has-neutral-950-color has-text-color has-info-100-background-color has-background has-12-font-size" style="border-radius:6px;padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--xxs);padding-bottom:var(--wp--preset--spacing--xxs);padding-left:var(--wp--preset--spacing--xxs)"><?php echo esc_html__( 'Info 100', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"backgroundColor":"info-500","textColor":"neutral-0","style":{"border":{"radius":"6px"},"spacing":{"padding":{"top":"var:preset|spacing|xl","right":"var:preset|spacing|xxs","bottom":"var:preset|spacing|xxs","left":"var:preset|spacing|xxs"}}},"fontSize":"12"} -->
<p class="has-neutral-0-color has-text-color has-info-500-background-color has-background has-12-font-size" style="border-radius:6px;padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--xxs);padding-bottom:var(--wp--preset--spacing--xxs);padding-left:var(--wp--preset--spacing--xxs)"><?php echo esc_html__( 'Info 500', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"backgroundColor":"info-600","textColor":"neutral-0","style":{"border":{"radius":"6px"},"spacing":{"padding":{"top":"var:preset|spacing|xl","right":"var:preset|spacing|xxs","bottom":"var:preset|spacing|xxs","left":"var:preset|spacing|xxs"}}},"fontSize":"12"} -->
<p class="has-neutral-0-color has-text-color has-info-600-background-color has-background has-12-font-size" style="border-radius:6px;padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--xxs);padding-bottom:var(--wp--preset--spacing--xxs);padding-left:var(--wp--preset--spacing--xxs)"><?php echo esc_html__( 'Info 600', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"backgroundColor":"warning-100","textColor":"neutral-950","style":{"border":{"radius":"6px"},"spacing":{"padding":{"top":"var:preset|spacing|xl","right":"var:preset|spacing|xxs","bottom":"var:preset|spacing|xxs","left":"var:preset|spacing|xxs"}}},"fontSize":"12"} -->
<p class="has-neutral-950-color has-text-color has-warning-100-background-color has-background has-12-font-size" style="border-radius:6px;padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--xxs);padding-bottom:var(--wp--preset--spacing--xxs);padding-left:var(--wp--preset--spacing--xxs)"><?php echo esc_html__( 'Warning 100', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"backgroundColor":"warning-500","textColor":"neutral-0","style":{"border":{"radius":"6px"},"spacing":{"padding":{"top":"var:preset|spacing|xl","right":"var:preset|spacing|xxs","bottom":"var:preset|spacing|xxs","left":"var:preset|spacing|xxs"}}},"fontSize":"12"} -->
<p class="has-neutral-0-color has-text-color has-warning-500-background-color has-background has-12-font-size" style="border-radius:6px;padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--xxs);padding-bottom:var(--wp--preset--spacing--xxs);padding-left:var(--wp--preset--spacing--xxs)"><?php echo esc_html__( 'Warning 500', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"backgroundColor":"warning-600","textColor":"neutral-0","style":{"border":{"radius":"6px"},"spacing":{"padding":{"top":"var:preset|spacing|xl","right":"var:preset|spacing|xxs","bottom":"var:preset|spacing|xxs","left":"var:preset|spacing|xxs"}}},"fontSize":"12"} -->
<p class="has-neutral-0-color has-text-color has-warning-600-background-color has-background has-12-font-size" style="border-radius:6px;padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--xxs);padding-bottom:var(--wp--preset--spacing--xxs);padding-left:var(--wp--preset--spacing--xxs)"><?php echo esc_html__( 'Warning 600', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"backgroundColor":"error-100","textColor":"neutral-950","style":{"border":{"radius":"6px"},"spacing":{"padding":{"top":"var:preset|spacing|xl","right":"var:preset|spacing|xxs","bottom":"var:preset|spacing|xxs","left":"var:preset|spacing|xxs"}}},"fontSize":"12"} -->
<p class="has-neutral-950-color has-text-color has-error-100-background-color has-background has-12-font-size" style="border-radius:6px;padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--xxs);padding-bottom:var(--wp--preset--spacing--xxs);padding-left:var(--wp--preset--spacing--xxs)"><?php echo esc_html__( 'Error 100', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"backgroundColor":"error-500","textColor":"neutral-0","style":{"border":{"radius":"6px"},"spacing":{"padding":{"top":"var:preset|spacing|xl","right":"var:preset|spacing|xxs","bottom":"var:preset|spacing|xxs","left":"var:preset|spacing|xxs"}}},"fontSize":"12"} -->
<p class="has-neutral-0-color has-text-color has-error-500-background-color has-background has-12-font-size" style="border-radius:6px;padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--xxs);padding-bottom:var(--wp--preset--spacing--xxs);padding-left:var(--wp--preset--spacing--xxs)"><?php echo esc_html__( 'Error 500', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"backgroundColor":"error-600","textColor":"neutral-0","style":{"border":{"radius":"6px"},"spacing":{"padding":{"top":"var:preset|spacing|xl","right":"var:preset|spacing|xxs","bottom":"var:preset|spacing|xxs","left":"var:preset|spacing|xxs"}}},"fontSize":"12"} -->
<p class="has-neutral-0-color has-text-color has-error-600-background-color has-background has-12-font-size" style="border-radius:6px;padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--xxs);padding-bottom:var(--wp--preset--spacing--xxs);padding-left:var(--wp--preset--spacing--xxs)"><?php echo esc_html__( 'Error 600', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Spacing"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}},"className":"is-style-surface","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-surface" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
<!-- wp:columns {"verticalAlignment":"center","align":"wide","className":"is-reverse-on-mobile","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}}} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center is-reverse-on-mobile">
<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center">
<!-- wp:image {"aspectRatio":"4/5","scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img alt="<?php echo esc_attr__( 'Image placeholder: spacing scale in the Site Editor', 'aegis' ); ?>" style="aspect-ratio:4/5;object-fit:cover"/></figure>
<!-- /wp:image -->
</div>
<!-- /wp:column -->
<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center">
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Padding and margins', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:heading {"fontSize":"48"} -->
<h2 class="wp-block-heading has-48-font-size"><?php echo esc_html__( 'Spacing You Can Reason About', 'aegis' ); ?></h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"18"} -->
<p class="has-18-font-size"><?php echo esc_html__( 'Fluid steps, root-padding-aware alignments, and a 720px content / 1200px wide layout keep every page on the same rhythm.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:table {"hasFixedLayout":false,"className":"is-style-stripes"} -->
<figure class="wp-block-table is-style-stripes"><table><thead><tr><th><?php echo esc_html__( 'Token', 'aegis' ); ?></th><th class="has-text-align-center" data-align="center"><?php echo esc_html__( 'Value', 'aegis' ); ?></th><th class="has-text-align-center" data-align="center"><?php echo esc_html__( 'Typical use', 'aegis' ); ?></th></tr></thead><tbody>
<tr><td><?php echo esc_html__( 'XXXS', 'aegis' ); ?></td><td class="has-text-align-center" data-align="center"><?php echo esc_html__( '4px', 'aegis' ); ?></td><td class="has-text-align-center" data-align="center"><?php echo esc_html__( 'Icon gaps, hairline offsets', 'aegis' ); ?></td></tr>
<tr><td><?php echo esc_html__( 'XXS', 'aegis' ); ?></td><td class="has-text-align-center" data-align="center"><?php echo esc_html__( '8px', 'aegis' ); ?></td><td class="has-text-align-center" data-align="center"><?php echo esc_html__( 'Tight inline groups', 'aegis' ); ?></td></tr>
<tr><td><?php echo esc_html__( '2XS', 'aegis' ); ?></td><td class="has-text-align-center" data-align="center"><?php echo esc_html__( '12px', 'aegis' ); ?></td><td class="has-text-align-center" data-align="center"><?php echo esc_html__( 'Compact controls', 'aegis' ); ?></td></tr>
<tr><td><?php echo esc_html__( 'XS', 'aegis' ); ?></td><td class="has-text-align-center" data-align="center"><?php echo esc_html__( '16px', 'aegis' ); ?></td><td class="has-text-align-center" data-align="center"><?php echo esc_html__( 'Card padding on mobile', 'aegis' ); ?></td></tr>
<tr><td><?php echo esc_html__( 'SM', 'aegis' ); ?></td><td class="has-text-align-center" data-align="center"><?php echo esc_html__( '20–24px', 'aegis' ); ?></td><td class="has-text-align-center" data-align="center"><?php echo esc_html__( 'Default block gap', 'aegis' ); ?></td></tr>
<tr><td><?php echo esc_html__( 'MD', 'aegis' ); ?></td><td class="has-text-align-center" data-align="center"><?php echo esc_html__( '24–32px', 'aegis' ); ?></td><td class="has-text-align-center" data-align="center"><?php echo esc_html__( 'Card padding', 'aegis' ); ?></td></tr>
<tr><td><?php echo esc_html__( 'ML', 'aegis' ); ?></td><td class="has-text-align-center" data-align="center"><?php echo esc_html__( '24–40px', 'aegis' ); ?></td><td class="has-text-align-center" data-align="center"><?php echo esc_html__( 'Sub-section spacing', 'aegis' ); ?></td></tr>
<tr><td><?php echo esc_html__( 'LG', 'aegis' ); ?></td><td class="has-text-align-center" data-align="center"><?php echo esc_html__( '24–48px', 'aegis' ); ?></td><td class="has-text-align-center" data-align="center"><?php echo esc_html__( 'Section padding and root gutter', 'aegis' ); ?></td></tr>
<tr><td><?php echo esc_html__( 'XL', 'aegis' ); ?></td><td class="has-text-align-center" data-align="center"><?php echo esc_html__( '40–64px', 'aegis' ); ?></td><td class="has-text-align-center" data-align="center"><?php echo esc_html__( 'Large section padding', 'aegis' ); ?></td></tr>
<tr><td><?php echo esc_html__( 'XLL', 'aegis' ); ?></td><td class="has-text-align-center" data-align="center"><?php echo esc_html__( '48–80px', 'aegis' ); ?></td><td class="has-text-align-center" data-align="center"><?php echo esc_html__( 'Hero breathing room', 'aegis' ); ?></td></tr>
<tr><td><?php echo esc_html__( 'XXL', 'aegis' ); ?></td><td class="has-text-align-center" data-align="center"><?php echo esc_html__( '56–96px', 'aegis' ); ?></td><td class="has-text-align-center" data-align="center"><?php echo esc_html__( 'Landmark sections', 'aegis' ); ?></td></tr>
</tbody></table></figure>
<!-- /wp:table -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Grid"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
<!-- wp:group {"metadata":{"name":"Heading"},"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained","contentSize":"720px"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--lg)">
<!-- wp:paragraph {"align":"center","className":"is-style-sub-heading"} -->
<p class="has-text-align-center is-style-sub-heading"><?php echo esc_html__( 'Grid system', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:heading {"textAlign":"center","fontSize":"48"} -->
<h2 class="wp-block-heading has-text-align-center has-48-font-size"><?php echo esc_html__( 'Intrinsic Layouts, Precise Control', 'aegis' ); ?></h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"align":"center","fontSize":"18"} -->
<p class="has-text-align-center has-18-font-size"><?php echo esc_html__( 'Layouts adapt to their container first, and you only step in where a breakpoint needs something different.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"grid","columnCount":4,"minimumColumnWidth":"220px"}} -->
<div class="wp-block-group alignwide">
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/layout-grid-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Grid', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Grid Variation', 'aegis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'A CSS grid container on the core Group block, with equal-height rows by default.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/layout-column-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Columns', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Responsive Columns', 'aegis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Set column counts per breakpoint — mobile, tablet from 782px, and desktop from 1024px.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/drag-move-2-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Control', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Per-breakpoint Layout', 'aegis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Display, order, position, offsets, z-index, width, and grid placement per screen size.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/layout-masonry-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Content', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Query Layouts', 'aegis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Responsive columns, featured first post, equal-height cards, and custom empty states on the Query Loop.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Placeholders"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}},"className":"is-style-surface","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-surface" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
<!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}}} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center">
<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center">
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Image placeholders', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:heading {"fontSize":"48"} -->
<h2 class="wp-block-heading has-48-font-size"><?php echo esc_html__( 'Layouts That Never Collapse', 'aegis' ); ?></h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"18"} -->
<p class="has-18-font-size"><?php echo esc_html__( 'An empty Image block renders a styled placeholder with the right ratio, so pages look finished while content is still in progress — and the placeholder styles load only when one is on the page.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:list {"className":"is-style-checklist","style":{"spacing":{"blockGap":"var:preset|spacing|xxs","margin":{"top":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
<ul style="margin-top:var(--wp--preset--spacing--sm)" class="wp-block-list is-style-checklist">
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Keeps aspect ratio, crop, and alignment of the final image', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Follows light and dark mode tokens', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Replaced automatically the moment you choose an image', 'aegis' ); ?></li>
<!-- /wp:list-item -->
</ul>
<!-- /wp:list -->
</div>
<!-- /wp:column -->
<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center">
<!-- wp:image {"aspectRatio":"4/3","scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img alt="<?php echo esc_attr__( 'Image placeholder: empty image block preview', 'aegis' ); ?>" style="aspect-ratio:4/3;object-fit:cover"/></figure>
<!-- /wp:image -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Code"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
<!-- wp:group {"metadata":{"name":"Heading"},"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained","contentSize":"720px"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--lg)">
<!-- wp:paragraph {"align":"center","className":"is-style-sub-heading"} -->
<p class="has-text-align-center is-style-sub-heading"><?php echo esc_html__( 'Under the hood', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:heading {"textAlign":"center","fontSize":"48"} -->
<h2 class="wp-block-heading has-text-align-center has-48-font-size"><?php echo esc_html__( 'Standards-Based, Top to Bottom', 'aegis' ); ?></h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"align":"center","fontSize":"18"} -->
<p class="has-text-align-center has-18-font-size"><?php echo esc_html__( 'The framework uses WordPress core APIs and the native block editor, so it moves forward with WordPress instead of around it.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"grid","columnCount":4,"minimumColumnWidth":"220px"}} -->
<div class="wp-block-group alignwide">
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/javascript-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Front end', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Vanilla JavaScript', 'aegis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Front-end behavior is written in small, deferred vanilla modules. No jQuery is loaded on the front end.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/reactjs-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Editor', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'React in the Editor', 'aegis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Inspector controls are built with @wordpress/scripts and core components, so they feel native to the block editor.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/code-s-slash-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Server', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Modern PHP', 'aegis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'PHP 8.1 with strict types and PSR-4 services, split into Composer packages: framework, utilities, icons, DOM, hooks, and container.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/git-branch-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Extend', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Hooks and Filters', 'aegis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Before/after hooks on every template part and the content area, plus filters for patterns, fonts, dark mode, and more.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Controls"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}},"className":"is-style-surface","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-surface" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
<!-- wp:columns {"verticalAlignment":"center","align":"wide","className":"is-reverse-on-mobile","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}}} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center is-reverse-on-mobile">
<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center">
<!-- wp:image {"aspectRatio":"4/5","scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img alt="<?php echo esc_attr__( 'Image placeholder: Aegis inspector controls', 'aegis' ); ?>" style="aspect-ratio:4/5;object-fit:cover"/></figure>
<!-- /wp:image -->
</div>
<!-- /wp:column -->
<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center">
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Editor controls', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:heading {"fontSize":"48"} -->
<h2 class="wp-block-heading has-48-font-size"><?php echo esc_html__( '21 Controls, Inside the Native Inspector', 'aegis' ); ?></h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"18"} -->
<p class="has-18-font-size"><?php echo esc_html__( 'Each control adds its CSS and script only to the blocks that use it.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide">
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:list {"className":"is-style-checklist","style":{"spacing":{"blockGap":"var:preset|spacing|xxs","margin":{"top":"var:preset|spacing|xxs"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
<ul style="margin-top:var(--wp--preset--spacing--xxs)" class="wp-block-list is-style-checklist">
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Animation', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Backdrop blur', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Box and text shadow', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'CSS filters', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Transform', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Opacity', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Responsive layout', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Visibility', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Sub-heading', 'aegis' ); ?></li>
<!-- /wp:list-item -->
</ul>
<!-- /wp:list -->
</div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:list {"className":"is-style-checklist","style":{"spacing":{"blockGap":"var:preset|spacing|xxs","margin":{"top":"var:preset|spacing|xxs"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
<ul style="margin-top:var(--wp--preset--spacing--xxs)" class="wp-block-list is-style-checklist">
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Template tags and reading time', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Query layout', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Query enhancements', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Query empty state', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Image options', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Inline color', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Inline SVG', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Copy to clipboard', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Click actions', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Placeholders', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Additional styles', 'aegis' ); ?></li>
<!-- /wp:list-item -->
</ul>
<!-- /wp:list -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Comparison"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
<!-- wp:group {"metadata":{"name":"Heading"},"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained","contentSize":"720px"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--lg)">
<!-- wp:paragraph {"align":"center","className":"is-style-sub-heading"} -->
<p class="has-text-align-center is-style-sub-heading"><?php echo esc_html__( 'Why Aegis', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:heading {"textAlign":"center","fontSize":"48"} -->
<h2 class="wp-block-heading has-text-align-center has-48-font-size"><?php echo esc_html__( 'How Aegis Differs From Other Themes', 'aegis' ); ?></h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"align":"center","fontSize":"18"} -->
<p class="has-text-align-center has-18-font-size"><?php echo esc_html__( 'A framework built on the platform, not on top of it.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide">
<!-- wp:table {"hasFixedLayout":false,"className":"is-style-stripes"} -->
<figure class="wp-block-table is-style-stripes"><table><thead><tr><th></th><th class="has-text-align-center" data-align="center"><?php echo esc_html__( 'Aegis', 'aegis' ); ?></th><th class="has-text-align-center" data-align="center"><?php echo esc_html__( 'Typical multipurpose theme', 'aegis' ); ?></th><th class="has-text-align-center" data-align="center"><?php echo esc_html__( 'Page builder', 'aegis' ); ?></th></tr></thead><tbody>
<tr><td><?php echo esc_html__( 'Assets loaded by default', 'aegis' ); ?></td><td class="has-text-align-center" data-align="center"><?php echo esc_html__( 'None', 'aegis' ); ?></td><td class="has-text-align-center" data-align="center"><?php echo esc_html__( 'Global bundle', 'aegis' ); ?></td><td class="has-text-align-center" data-align="center"><?php echo esc_html__( 'Builder runtime', 'aegis' ); ?></td></tr>
<tr><td><?php echo esc_html__( 'Front-end jQuery', 'aegis' ); ?></td><td class="has-text-align-center" data-align="center"><?php echo esc_html__( 'No', 'aegis' ); ?></td><td class="has-text-align-center" data-align="center"><?php echo esc_html__( 'Often', 'aegis' ); ?></td><td class="has-text-align-center" data-align="center"><?php echo esc_html__( 'Often', 'aegis' ); ?></td></tr>
<tr><td><?php echo esc_html__( 'Where you design', 'aegis' ); ?></td><td class="has-text-align-center" data-align="center"><?php echo esc_html__( 'Site Editor', 'aegis' ); ?></td><td class="has-text-align-center" data-align="center"><?php echo esc_html__( 'Theme options panel', 'aegis' ); ?></td><td class="has-text-align-center" data-align="center"><?php echo esc_html__( 'Proprietary editor', 'aegis' ); ?></td></tr>
<tr><td><?php echo esc_html__( 'Content after switching', 'aegis' ); ?></td><td class="has-text-align-center" data-align="center"><?php echo esc_html__( 'Core blocks, portable', 'aegis' ); ?></td><td class="has-text-align-center" data-align="center"><?php echo esc_html__( 'Shortcodes may remain', 'aegis' ); ?></td><td class="has-text-align-center" data-align="center"><?php echo esc_html__( 'Locked to the builder', 'aegis' ); ?></td></tr>
<tr><td><?php echo esc_html__( 'Design tokens', 'aegis' ); ?></td><td class="has-text-align-center" data-align="center"><?php echo esc_html__( 'theme.json', 'aegis' ); ?></td><td class="has-text-align-center" data-align="center"><?php echo esc_html__( 'Partial', 'aegis' ); ?></td><td class="has-text-align-center" data-align="center"><?php echo esc_html__( 'Builder-specific', 'aegis' ); ?></td></tr>
<tr><td><?php echo esc_html__( 'Accessibility checks', 'aegis' ); ?></td><td class="has-text-align-center" data-align="center"><?php echo esc_html__( 'Automated WCAG 2 AA tests', 'aegis' ); ?></td><td class="has-text-align-center" data-align="center"><?php echo esc_html__( 'Varies', 'aegis' ); ?></td><td class="has-text-align-center" data-align="center"><?php echo esc_html__( 'Varies', 'aegis' ); ?></td></tr>
<tr><td><?php echo esc_html__( 'Keeps pace with WordPress', 'aegis' ); ?></td><td class="has-text-align-center" data-align="center"><?php echo esc_html__( 'Built on core APIs', 'aegis' ); ?></td><td class="has-text-align-center" data-align="center"><?php echo esc_html__( 'Depends on theme updates', 'aegis' ); ?></td><td class="has-text-align-center" data-align="center"><?php echo esc_html__( 'Depends on builder updates', 'aegis' ); ?></td></tr>
</tbody></table></figure>
<!-- /wp:table -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Benefits"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}},"className":"is-style-surface","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-surface" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
<!-- wp:group {"metadata":{"name":"Heading"},"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained","contentSize":"720px"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--lg)">
<!-- wp:paragraph {"align":"center","className":"is-style-sub-heading"} -->
<p class="has-text-align-center is-style-sub-heading"><?php echo esc_html__( 'Benefits', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:heading {"textAlign":"center","fontSize":"48"} -->
<h2 class="wp-block-heading has-text-align-center has-48-font-size"><?php echo esc_html__( 'What It Means for Your Site', 'aegis' ); ?></h2>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->
<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"grid","columnCount":3,"minimumColumnWidth":"280px"}} -->
<div class="wp-block-group alignwide">
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/speed-up-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Faster Pages', 'aegis' ); ?></h3>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Less code per page means quicker loads and better Core Web Vitals.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/tools-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Less Maintenance', 'aegis' ); ?></h3>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Core APIs and blocks mean fewer breaking changes with each WordPress release.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/exchange-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Portable Content', 'aegis' ); ?></h3>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Everything is core blocks, so content survives a redesign or a theme switch.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/accessibility-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Accessible Foundation', 'aegis' ); ?></h3>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Landmarks, focus styles, and keyboard support are built in, aiming at WCAG 2.2 AA.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/braces-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Developer-friendly', 'aegis' ); ?></h3>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Child-theme ready, documented hooks, and typed, testable PHP.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/shield-check-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Secure by Design', 'aegis' ); ?></h3>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Sanitized SVG handling and no third-party runtime on the front end.', 'aegis' ); ?></p>
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
<h2 class="wp-block-heading has-text-align-center has-48-font-size"><?php echo esc_html__( 'Framework Questions', 'aegis' ); ?></h2>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->
<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide">
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:details {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
<details class="wp-block-details is-style-surface" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)"><summary><?php echo esc_html__( 'Is the framework a separate download?', 'aegis' ); ?></summary>
<!-- wp:paragraph {"fontSize":"16"} -->
<p class="has-16-font-size"><?php echo esc_html__( 'No. It is bundled with the Aegis theme and works the moment you activate it.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</details>
<!-- /wp:details -->
<!-- wp:details {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
<details class="wp-block-details is-style-surface" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)"><summary><?php echo esc_html__( 'What does "zero assets by default" mean?', 'aegis' ); ?></summary>
<!-- wp:paragraph {"fontSize":"16"} -->
<p class="has-16-font-size"><?php echo esc_html__( 'A page that uses no Aegis features loads no Aegis CSS, JavaScript, or fonts. Assets are added only for the blocks and settings on that page.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</details>
<!-- /wp:details -->
<!-- wp:details {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
<details class="wp-block-details is-style-surface" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)"><summary><?php echo esc_html__( 'Do I need to know React?', 'aegis' ); ?></summary>
<!-- wp:paragraph {"fontSize":"16"} -->
<p class="has-16-font-size"><?php echo esc_html__( 'No. You build with the block editor. React matters only if you want to write your own editor controls.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</details>
<!-- /wp:details -->
<!-- wp:details {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
<details class="wp-block-details is-style-surface" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)"><summary><?php echo esc_html__( 'Does it use jQuery?', 'aegis' ); ?></summary>
<!-- wp:paragraph {"fontSize":"16"} -->
<p class="has-16-font-size"><?php echo esc_html__( 'Not on the front end. Interactive features are vanilla JavaScript modules loaded only when needed.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</details>
<!-- /wp:details -->
</div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:details {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
<details class="wp-block-details is-style-surface" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)"><summary><?php echo esc_html__( 'Can I use it in a child theme?', 'aegis' ); ?></summary>
<!-- wp:paragraph {"fontSize":"16"} -->
<p class="has-16-font-size"><?php echo esc_html__( 'Yes. The framework reads patterns and icons from the child theme and exposes hooks and filters for customization.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</details>
<!-- /wp:details -->
<!-- wp:details {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
<details class="wp-block-details is-style-surface" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)"><summary><?php echo esc_html__( 'How do I change the design tokens?', 'aegis' ); ?></summary>
<!-- wp:paragraph {"fontSize":"16"} -->
<p class="has-16-font-size"><?php echo esc_html__( 'In Global Styles, or in theme.json for code-level control. Style variations swap the whole token set at once.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</details>
<!-- /wp:details -->
<!-- wp:details {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
<details class="wp-block-details is-style-surface" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)"><summary><?php echo esc_html__( 'What are the requirements?', 'aegis' ); ?></summary>
<!-- wp:paragraph {"fontSize":"16"} -->
<p class="has-16-font-size"><?php echo esc_html__( 'WordPress 7.0 or later and PHP 8.1 or later.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</details>
<!-- /wp:details -->
<!-- wp:details {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
<details class="wp-block-details is-style-surface" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)"><summary><?php echo esc_html__( 'Is it open source?', 'aegis' ); ?></summary>
<!-- wp:paragraph {"fontSize":"16"} -->
<p class="has-16-font-size"><?php echo esc_html__( 'Yes. The theme and framework are GPL-2.0-or-later and developed in the open on GitHub.', 'aegis' ); ?></p>
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
<!-- wp:icon {"icon":"remixicon/flashlight-line","textColor":"primary-500","style":{"dimensions":{"width":"40px"}}} /-->
<!-- wp:heading {"textAlign":"center","fontSize":"40"} -->
<h2 class="wp-block-heading has-text-align-center has-40-font-size"><?php echo esc_html__( 'Build on a Faster Foundation', 'aegis' ); ?></h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"align":"center","fontSize":"18"} -->
<p class="has-text-align-center has-18-font-size"><?php echo esc_html__( 'Download Aegis free and see how little a page really needs to load.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons">
<!-- wp:button {"backgroundColor":"neutral-800","iconSet":"remixicon","iconName":"download-2-line","iconSize":"16px","iconPosition":"end"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-neutral-800-background-color has-background wp-element-button" href="https://github.com/aegiswp/theme/releases/tag/v1.0.0"><?php echo esc_html__( 'Download Free', 'aegis' ); ?></a></div>
<!-- /wp:button -->
<!-- wp:button {"className":"is-style-ghost","iconSet":"remixicon","iconName":"github-line","iconSize":"16px","iconPosition":"end"} -->
<div class="wp-block-button is-style-ghost"><a class="wp-block-button__link wp-element-button" href="https://github.com/aegiswp/theme"><?php echo esc_html__( 'View on GitHub', 'aegis' ); ?></a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
