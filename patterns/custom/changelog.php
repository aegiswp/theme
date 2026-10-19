<?php
/**
 * Title: Custom Changelog — Page
 * Slug: changelog
 * Categories: custom
 * Keywords: aegis, changelog, releases, versions, theme, plugin, pro
 * Description: Full-page tabbed changelog for the Aegis theme, plugin, and Pro, styled as a timeline.
 * Viewport Width: 1280
 * Block Types: core/post-content
 * Post Types: page
 */
?>
<!-- wp:group {"metadata":{"name":"Custom Changelog"},"align":"full","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull">
<!-- wp:group {"metadata":{"name":"Hero"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
<!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|md"}}},"layout":{"type":"constrained","contentSize":"760px"}} -->
<div class="wp-block-group" style="padding-bottom:var(--wp--preset--spacing--md)">
<!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group">
<!-- wp:paragraph {"align":"center","className":"is-style-sub-heading","style":{"border":{"width":"1px","radius":"99px"},"spacing":{"padding":{"top":"6px","bottom":"6px","right":"var:preset|spacing|xs","left":"var:preset|spacing|xs"},"margin":{"top":"0","bottom":"var:preset|spacing|xs"}},"typography":{"lineHeight":"1"}},"backgroundColor":"neutral-950","textColor":"primary-25","borderColor":"neutral-950","fontSize":"12"} -->
<p class="has-text-align-center is-style-sub-heading has-border-color has-neutral-950-border-color has-primary-25-color has-text-color has-neutral-950-background-color has-background has-12-font-size" style="border-width:1px;border-radius:99px;margin-top:0;margin-bottom:var(--wp--preset--spacing--xs);padding-top:6px;padding-right:var(--wp--preset--spacing--xs);padding-bottom:6px;padding-left:var(--wp--preset--spacing--xs);line-height:1"><?php echo esc_html__( 'CHANGELOG', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:heading {"textAlign":"center","level":1,"style":{"spacing":{"padding":{"top":"var:preset|spacing|xs"}}},"fontSize":"60"} -->
<h1 class="wp-block-heading has-text-align-center has-60-font-size" style="padding-top:var(--wp--preset--spacing--xs)"><?php echo esc_html__( 'What\'s New in Aegis', 'aegis' ); ?></h1>
<!-- /wp:heading -->
<!-- wp:paragraph {"align":"center","fontSize":"20"} -->
<p class="has-text-align-center has-20-font-size"><?php echo esc_html__( 'Every release of the theme, plugin, and Pro in one place — what was added, what changed, and when.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--md);margin-bottom:var(--wp--preset--spacing--md)">
<!-- wp:button {"backgroundColor":"neutral-800","size":"large","iconSet":"remixicon","iconName":"download-2-line","iconSize":"16px","iconPosition":"end"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-neutral-800-background-color has-background wp-element-button" href="https://github.com/aegiswp/theme/releases/tag/v1.0.0"><?php echo esc_html__( 'Download Free', 'aegis' ); ?></a></div>
<!-- /wp:button -->
<!-- wp:button {"size":"large","className":"is-style-ghost","iconSet":"remixicon","iconName":"github-line","iconSize":"16px","iconPosition":"end"} -->
<div class="wp-block-button is-style-ghost"><a class="wp-block-button__link wp-element-button" href="https://github.com/aegiswp"><?php echo esc_html__( 'Releases on GitHub', 'aegis' ); ?></a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
<!-- wp:paragraph {"align":"center","textColor":"neutral-500","fontSize":"14"} -->
<p class="has-text-align-center has-neutral-500-color has-text-color has-14-font-size"><?php echo esc_html__( 'Semantic Versioning · Format based on Keep a Changelog', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
 
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Versions"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|md","left":"var:preset|spacing|lg"}}},"className":"is-style-surface","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-surface" style="padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--lg)">
<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"grid","columnCount":3,"minimumColumnWidth":"220px"}} -->
<div class="wp-block-group alignwide">
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/palette-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Theme', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:paragraph {"className":"is-style-heading","fontFamily":"jetbrains","style":{"typography":{"lineHeight":"1"}},"fontSize":"40"} -->
<p class="is-style-heading has-40-font-size has-jetbrains-font-family" style="line-height:1"><?php echo esc_html__( 'v1.0.1', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"textColor":"neutral-500","fontSize":"14"} -->
<p class="has-neutral-500-color has-text-color has-14-font-size"><?php echo esc_html__( 'Releasing Monday, October 19, 2026', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/dashboard-3-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Plugin', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:paragraph {"className":"is-style-heading","fontFamily":"jetbrains","style":{"typography":{"lineHeight":"1"}},"fontSize":"40"} -->
<p class="is-style-heading has-40-font-size has-jetbrains-font-family" style="line-height:1"><?php echo esc_html__( 'v1.0.0', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"textColor":"neutral-500","fontSize":"14"} -->
<p class="has-neutral-500-color has-text-color has-14-font-size"><?php echo esc_html__( 'Releasing Monday, October 19, 2026', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/vip-crown-2-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Pro', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:paragraph {"className":"is-style-heading","fontFamily":"jetbrains","style":{"typography":{"lineHeight":"1"}},"fontSize":"40"} -->
<p class="is-style-heading has-40-font-size has-jetbrains-font-family" style="line-height:1"><?php echo esc_html__( 'v1.0.0', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"textColor":"neutral-500","fontSize":"14"} -->
<p class="has-neutral-500-color has-text-color has-14-font-size"><?php echo esc_html__( 'Coming soon', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Changelog"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}},"anchor":"releases","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" id="releases" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
<!-- wp:group {"metadata":{"name":"Heading"},"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained","contentSize":"720px"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--lg)">
<!-- wp:paragraph {"align":"center","className":"is-style-sub-heading"} -->
<p class="has-text-align-center is-style-sub-heading"><?php echo esc_html__( 'Release notes', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:heading {"textAlign":"center","fontSize":"48"} -->
<h2 class="wp-block-heading has-text-align-center has-48-font-size"><?php echo esc_html__( 'Pick a Product', 'aegis' ); ?></h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"align":"center","fontSize":"18"} -->
<p class="has-text-align-center has-18-font-size"><?php echo esc_html__( 'Newest releases first. Each entry lists what was added and what changed.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide">
<!-- wp:tabs -->
<div class="wp-block-tabs"><!-- wp:tab-list -->
<div role="tablist" class="wp-block-tab-list"><button type="button" role="tab"><?php echo esc_html__( 'Theme', 'aegis' ); ?></button><button type="button" role="tab"><?php echo esc_html__( 'Plugin', 'aegis' ); ?></button><button type="button" role="tab"><?php echo esc_html__( 'Pro', 'aegis' ); ?></button></div>
<!-- /wp:tab-list -->

<!-- wp:tab-panels -->
<div class="wp-block-tab-panels"><!-- wp:tab-panel {"label":"Theme","anchor":"changelog-theme"} -->
<section role="tabpanel" tabindex="0" id="changelog-theme" class="wp-block-tab-panel"><!-- wp:group {"align":"wide","layout":{"type":"constrained","contentSize":"760px"}} -->
<div class="wp-block-group alignwide"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|md","left":"var:preset|spacing|md"}},"border":{"left":{"color":"var:preset|color|primary-500","width":"3px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="border-left-color:var(--wp--preset--color--primary-500);border-left-width:3px;padding-top:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)"><!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--xl)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-group">
<!-- wp:paragraph {"backgroundColor":"neutral-950","textColor":"primary-25","fontFamily":"jetbrains","style":{"border":{"radius":"99px"},"spacing":{"padding":{"top":"4px","right":"var:preset|spacing|xxs","bottom":"4px","left":"var:preset|spacing|xxs"}},"typography":{"lineHeight":"1","fontWeight":"500"}},"fontSize":"14"} -->
<p class="has-primary-25-color has-text-color has-neutral-950-background-color has-background has-14-font-size has-jetbrains-font-family" style="border-radius:99px;padding-top:4px;padding-right:var(--wp--preset--spacing--xxs);padding-bottom:4px;padding-left:var(--wp--preset--spacing--xxs);font-weight:500;line-height:1"><?php echo esc_html__( 'v1.0.1', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"backgroundColor":"info-100","textColor":"info-600","style":{"border":{"radius":"99px"},"spacing":{"padding":{"top":"4px","right":"var:preset|spacing|xxs","bottom":"4px","left":"var:preset|spacing|xxs"}},"typography":{"lineHeight":"1","fontWeight":"500"}},"fontSize":"12"} -->
<p class="has-info-600-color has-text-color has-info-100-background-color has-background has-12-font-size" style="border-radius:99px;padding-top:4px;padding-right:var(--wp--preset--spacing--xxs);padding-bottom:4px;padding-left:var(--wp--preset--spacing--xxs);font-weight:500;line-height:1"><?php echo esc_html__( 'Releasing Monday', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"is-style-sub-heading","fontSize":"14"} -->
<p class="is-style-sub-heading has-14-font-size"><?php echo esc_html__( 'October 19, 2026', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:heading {"level":3,"fontSize":"24"} -->
<h3 class="wp-block-heading has-24-font-size"><?php echo esc_html__( 'Native updates, editor dark preview, and mobile polish', 'aegis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"className":"is-style-sub-heading","textColor":"success-600","style":{"spacing":{"margin":{"top":"var:preset|spacing|sm"}}},"fontSize":"12"} -->
<p class="is-style-sub-heading has-success-600-color has-text-color has-12-font-size" style="margin-top:var(--wp--preset--spacing--sm)"><?php echo esc_html__( 'Added', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:list {"style":{"spacing":{"margin":{"top":"var:preset|spacing|xxs"}}},"fontSize":"15"} -->
<ul style="margin-top:var(--wp--preset--spacing--xxs)" class="wp-block-list has-15-font-size">
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Theme updates from GitHub releases through the native WordPress update screens, including auto-updates and release notes.', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Editor light and dark preview: a top-bar toggle switches the editor canvas between modes using the same tokens as the front end, saved per user.', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Audio block styling: a padded card with a full-width player that fits small screens, and the caption inside the card.', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Sticky header: the site header stays fixed at the top of the screen while scrolling.', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Mobile menu: tapping an item with sub-items slides in a panel with those items and a Back button.', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Three-image hero on the Home page: a centered main image with two images behind it.', 'aegis' ); ?></li>
<!-- /wp:list-item -->
</ul>
<!-- /wp:list -->
<!-- wp:paragraph {"className":"is-style-sub-heading","textColor":"info-600","style":{"spacing":{"margin":{"top":"var:preset|spacing|sm"}}},"fontSize":"12"} -->
<p class="is-style-sub-heading has-info-600-color has-text-color has-12-font-size" style="margin-top:var(--wp--preset--spacing--sm)"><?php echo esc_html__( 'Changed', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:list {"style":{"spacing":{"margin":{"top":"var:preset|spacing|xxs"}}},"fontSize":"15"} -->
<ul style="margin-top:var(--wp--preset--spacing--xxs)" class="wp-block-list has-15-font-size">
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Admin and docs labels renamed: Image Compare is now Compare, and Image Lightbox is now Lightbox. Block names and settings keys are unchanged.', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'bbPress styling: circular avatars, content-scale type, theme form fields, grid topic rows, WordPress-style breadcrumbs, aligned Subscribe and Favorite buttons, and a My Account–style member layout.', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Empty footer Navigation blocks no longer fall back to listing every page.', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'The default header has a Contact button instead of the People and avatar buttons.', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'The Home page hero links to the plugin download instead of the docs, and the release badge is removed.', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Navigation submenus open to the right of their parent item.', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Updated the theme screenshot to show the new Home page.', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'The companion plugin notice now installs the Aegis plugin from its latest GitHub release, with a manual download link if installation fails.', 'aegis' ); ?></li>
<!-- /wp:list-item -->
</ul>
<!-- /wp:list -->
<!-- wp:paragraph {"className":"is-style-sub-heading","textColor":"warning-600","style":{"spacing":{"margin":{"top":"var:preset|spacing|sm"}}},"fontSize":"12"} -->
<p class="is-style-sub-heading has-warning-600-color has-text-color has-12-font-size" style="margin-top:var(--wp--preset--spacing--sm)"><?php echo esc_html__( 'Fixed', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:list {"style":{"spacing":{"margin":{"top":"var:preset|spacing|xxs"}}},"fontSize":"15"} -->
<ul style="margin-top:var(--wp--preset--spacing--xxs)" class="wp-block-list has-15-font-size">
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Captions on images and other media are larger and easier to read: 14px, or 13px on phones (previously 11px).', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Mobile layout: nested full-width sections no longer stack side padding or overflow on phones.', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Spacing presets from sm to xxl are now fluid, so section and page padding scale down on small screens.', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Large font sizes scale down further on small screens.', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Added font sizes that patterns used but the theme did not define, so those blocks render at their intended size.', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Patterns no longer reference undefined spacing and color presets.', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Pro Tabs blocks no longer show as invalid in the editor.', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Header, footer, and content injection hooks now fire once per page, so hooked output no longer prints twice.', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Accessibility: better dark mode text contrast, clearer button and logo link names, unique icon and heading IDs, a keyboard-safe mini-cart drawer, and focus that stays clear of the sticky header.', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'No more "translation loading triggered too early" notice in WordPress 6.7 and later.', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Marquee and WooCommerce blocks in patterns no longer show as invalid in the editor.', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Without WooCommerce, the editor no longer shows unsupported WooCommerce blocks in the header and store patterns.', 'aegis' ); ?></li>
<!-- /wp:list-item -->
</ul>
<!-- /wp:list -->
</div>
<!-- /wp:group -->
<!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--xl)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-group">
<!-- wp:paragraph {"backgroundColor":"neutral-950","textColor":"primary-25","fontFamily":"jetbrains","style":{"border":{"radius":"99px"},"spacing":{"padding":{"top":"4px","right":"var:preset|spacing|xxs","bottom":"4px","left":"var:preset|spacing|xxs"}},"typography":{"lineHeight":"1","fontWeight":"500"}},"fontSize":"14"} -->
<p class="has-primary-25-color has-text-color has-neutral-950-background-color has-background has-14-font-size has-jetbrains-font-family" style="border-radius:99px;padding-top:4px;padding-right:var(--wp--preset--spacing--xxs);padding-bottom:4px;padding-left:var(--wp--preset--spacing--xxs);font-weight:500;line-height:1"><?php echo esc_html__( 'v1.0.0', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"backgroundColor":"success-100","textColor":"success-600","style":{"border":{"radius":"99px"},"spacing":{"padding":{"top":"4px","right":"var:preset|spacing|xxs","bottom":"4px","left":"var:preset|spacing|xxs"}},"typography":{"lineHeight":"1","fontWeight":"500"}},"fontSize":"12"} -->
<p class="has-success-600-color has-text-color has-success-100-background-color has-background has-12-font-size" style="border-radius:99px;padding-top:4px;padding-right:var(--wp--preset--spacing--xxs);padding-bottom:4px;padding-left:var(--wp--preset--spacing--xxs);font-weight:500;line-height:1"><?php echo esc_html__( 'Latest', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"is-style-sub-heading","fontSize":"14"} -->
<p class="is-style-sub-heading has-14-font-size"><?php echo esc_html__( 'October 14, 2026', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:heading {"level":3,"fontSize":"24"} -->
<h3 class="wp-block-heading has-24-font-size"><?php echo esc_html__( 'Initial stable release', 'aegis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"textColor":"neutral-600","fontSize":"15"} -->
<p class="has-neutral-600-color has-text-color has-15-font-size"><?php echo esc_html__( 'The first stable release of the block theme and design-system framework: design tokens, 60 style variations, 236 patterns, 50 templates, and six custom blocks.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:details {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}}},"expandIcon":"plus"} -->
<details class="wp-block-details is-style-surface" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)"><summary><?php echo esc_html__( 'Pre-release history: 9 alpha, beta, and RC builds since 2023', 'aegis' ); ?></summary>
<!-- wp:table {"hasFixedLayout":false,"className":"is-style-stripes"} -->
<figure class="wp-block-table is-style-stripes"><table><thead><tr><th><?php echo esc_html__( 'Version', 'aegis' ); ?></th><th class="has-text-align-center" data-align="center"><?php echo esc_html__( 'Date', 'aegis' ); ?></th></tr></thead><tbody>
<tr><td><?php echo esc_html__( '1.0.0-rc.3', 'aegis' ); ?></td><td class="has-text-align-center" data-align="center"><?php echo esc_html__( 'May 1, 2026', 'aegis' ); ?></td></tr>
<tr><td><?php echo esc_html__( '1.0.0-rc.2', 'aegis' ); ?></td><td class="has-text-align-center" data-align="center"><?php echo esc_html__( 'January 28, 2026', 'aegis' ); ?></td></tr>
<tr><td><?php echo esc_html__( '1.0.0-rc.1', 'aegis' ); ?></td><td class="has-text-align-center" data-align="center"><?php echo esc_html__( 'January 17, 2026', 'aegis' ); ?></td></tr>
<tr><td><?php echo esc_html__( '1.0.0-beta.3', 'aegis' ); ?></td><td class="has-text-align-center" data-align="center"><?php echo esc_html__( 'February 28, 2025', 'aegis' ); ?></td></tr>
<tr><td><?php echo esc_html__( '1.0.0-beta.2', 'aegis' ); ?></td><td class="has-text-align-center" data-align="center"><?php echo esc_html__( 'February 16, 2024', 'aegis' ); ?></td></tr>
<tr><td><?php echo esc_html__( '1.0.0-beta.1', 'aegis' ); ?></td><td class="has-text-align-center" data-align="center"><?php echo esc_html__( 'December 23, 2023', 'aegis' ); ?></td></tr>
<tr><td><?php echo esc_html__( '1.0.0-alpha.3', 'aegis' ); ?></td><td class="has-text-align-center" data-align="center"><?php echo esc_html__( 'November 10, 2023', 'aegis' ); ?></td></tr>
<tr><td><?php echo esc_html__( '1.0.0-alpha.2', 'aegis' ); ?></td><td class="has-text-align-center" data-align="center"><?php echo esc_html__( 'October 27, 2023', 'aegis' ); ?></td></tr>
<tr><td><?php echo esc_html__( '1.0.0-alpha.1', 'aegis' ); ?></td><td class="has-text-align-center" data-align="center"><?php echo esc_html__( 'October 13, 2023', 'aegis' ); ?></td></tr>
</tbody></table></figure>
<!-- /wp:table -->
</details>
<!-- /wp:details --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:tab-panel -->

<!-- wp:tab-panel {"label":"Plugin","anchor":"changelog-plugin"} -->
<section role="tabpanel" tabindex="0" id="changelog-plugin" class="wp-block-tab-panel"><!-- wp:group {"align":"wide","layout":{"type":"constrained","contentSize":"760px"}} -->
<div class="wp-block-group alignwide"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|md","left":"var:preset|spacing|md"}},"border":{"left":{"color":"var:preset|color|primary-500","width":"3px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="border-left-color:var(--wp--preset--color--primary-500);border-left-width:3px;padding-top:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)"><!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--xl)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-group">
<!-- wp:paragraph {"backgroundColor":"neutral-950","textColor":"primary-25","fontFamily":"jetbrains","style":{"border":{"radius":"99px"},"spacing":{"padding":{"top":"4px","right":"var:preset|spacing|xxs","bottom":"4px","left":"var:preset|spacing|xxs"}},"typography":{"lineHeight":"1","fontWeight":"500"}},"fontSize":"14"} -->
<p class="has-primary-25-color has-text-color has-neutral-950-background-color has-background has-14-font-size has-jetbrains-font-family" style="border-radius:99px;padding-top:4px;padding-right:var(--wp--preset--spacing--xxs);padding-bottom:4px;padding-left:var(--wp--preset--spacing--xxs);font-weight:500;line-height:1"><?php echo esc_html__( 'v1.0.0', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"backgroundColor":"info-100","textColor":"info-600","style":{"border":{"radius":"99px"},"spacing":{"padding":{"top":"4px","right":"var:preset|spacing|xxs","bottom":"4px","left":"var:preset|spacing|xxs"}},"typography":{"lineHeight":"1","fontWeight":"500"}},"fontSize":"12"} -->
<p class="has-info-600-color has-text-color has-info-100-background-color has-background has-12-font-size" style="border-radius:99px;padding-top:4px;padding-right:var(--wp--preset--spacing--xxs);padding-bottom:4px;padding-left:var(--wp--preset--spacing--xxs);font-weight:500;line-height:1"><?php echo esc_html__( 'Releasing Monday', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"is-style-sub-heading","fontSize":"14"} -->
<p class="is-style-sub-heading has-14-font-size"><?php echo esc_html__( 'October 19, 2026', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:heading {"level":3,"fontSize":"24"} -->
<h3 class="wp-block-heading has-24-font-size"><?php echo esc_html__( 'Initial release', 'aegis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"className":"is-style-sub-heading","textColor":"success-600","style":{"spacing":{"margin":{"top":"var:preset|spacing|sm"}}},"fontSize":"12"} -->
<p class="is-style-sub-heading has-success-600-color has-text-color has-12-font-size" style="margin-top:var(--wp--preset--spacing--sm)"><?php echo esc_html__( 'Added', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:list {"style":{"spacing":{"margin":{"top":"var:preset|spacing|xxs"}}},"fontSize":"15"} -->
<ul style="margin-top:var(--wp--preset--spacing--xxs)" class="wp-block-list has-15-font-size">
<!-- wp:list-item -->
<li><?php echo esc_html__( 'The Aegis dashboard: Blocks, Modals, Hooks, Code Snippets, Conditionals, Integrations, Connectors, Performance, and Settings.', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Community integration for bbPress and Content integration for Co-Authors Plus.', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Distinct SEO integrations for Rank Math, Yoast SEO, All in One SEO, and SEOPress.', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Modals screen, the [aegis_modal] shortcode, and Modal starter patterns.', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Hooks screen listing every injection location and instance; creating hook patterns requires Pro.', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Release tooling: coding standards checks, continuous integration, and clean release packages.', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Releases and native WordPress updates from GitHub.', 'aegis' ); ?></li>
<!-- /wp:list-item -->
</ul>
<!-- /wp:list -->
</div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:tab-panel -->

<!-- wp:tab-panel {"label":"Pro","anchor":"changelog-pro"} -->
<section role="tabpanel" tabindex="0" id="changelog-pro" class="wp-block-tab-panel"><!-- wp:group {"align":"wide","layout":{"type":"constrained","contentSize":"760px"}} -->
<div class="wp-block-group alignwide"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|md","left":"var:preset|spacing|md"}},"border":{"left":{"color":"var:preset|color|primary-500","width":"3px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="border-left-color:var(--wp--preset--color--primary-500);border-left-width:3px;padding-top:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)"><!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--xl)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-group">
<!-- wp:paragraph {"backgroundColor":"neutral-950","textColor":"primary-25","fontFamily":"jetbrains","style":{"border":{"radius":"99px"},"spacing":{"padding":{"top":"4px","right":"var:preset|spacing|xxs","bottom":"4px","left":"var:preset|spacing|xxs"}},"typography":{"lineHeight":"1","fontWeight":"500"}},"fontSize":"14"} -->
<p class="has-primary-25-color has-text-color has-neutral-950-background-color has-background has-14-font-size has-jetbrains-font-family" style="border-radius:99px;padding-top:4px;padding-right:var(--wp--preset--spacing--xxs);padding-bottom:4px;padding-left:var(--wp--preset--spacing--xxs);font-weight:500;line-height:1"><?php echo esc_html__( 'v1.0.0', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"backgroundColor":"warning-100","textColor":"warning-600","style":{"border":{"radius":"99px"},"spacing":{"padding":{"top":"4px","right":"var:preset|spacing|xxs","bottom":"4px","left":"var:preset|spacing|xxs"}},"typography":{"lineHeight":"1","fontWeight":"500"}},"fontSize":"12"} -->
<p class="has-warning-600-color has-text-color has-warning-100-background-color has-background has-12-font-size" style="border-radius:99px;padding-top:4px;padding-right:var(--wp--preset--spacing--xxs);padding-bottom:4px;padding-left:var(--wp--preset--spacing--xxs);font-weight:500;line-height:1"><?php echo esc_html__( 'Coming soon', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"is-style-sub-heading","fontSize":"14"} -->
<p class="is-style-sub-heading has-14-font-size"><?php echo esc_html__( 'Date to be announced', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:heading {"level":3,"fontSize":"24"} -->
<h3 class="wp-block-heading has-24-font-size"><?php echo esc_html__( 'Initial release', 'aegis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"className":"is-style-sub-heading","textColor":"success-600","style":{"spacing":{"margin":{"top":"var:preset|spacing|sm"}}},"fontSize":"12"} -->
<p class="is-style-sub-heading has-success-600-color has-text-color has-12-font-size" style="margin-top:var(--wp--preset--spacing--sm)"><?php echo esc_html__( 'Added', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:list {"style":{"spacing":{"margin":{"top":"var:preset|spacing|xxs"}}},"fontSize":"15"} -->
<ul style="margin-top:var(--wp--preset--spacing--xxs)" class="wp-block-list has-15-font-size">
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Hook patterns: create block layouts and inject them at any theme or plugin hook.', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Visibility presets: save rule sets once and reuse them on any block.', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'BunnyCDN video, Query Loop Pro, advanced conditions, Tabs and Compare blocks, and 5,400+ icons.', 'aegis' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php echo esc_html__( 'Release tooling: coding standards checks, continuous integration, and production-ready packages.', 'aegis' ); ?></li>
<!-- /wp:list-item -->
</ul>
<!-- /wp:list -->
</div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:tab-panel --></div>
<!-- /wp:tab-panels --></div>
<!-- /wp:tabs -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"How we release"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}}},"className":"is-style-surface","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-surface" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">
<!-- wp:group {"metadata":{"name":"Heading"},"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained","contentSize":"720px"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--lg)">
<!-- wp:paragraph {"align":"center","className":"is-style-sub-heading"} -->
<p class="has-text-align-center is-style-sub-heading"><?php echo esc_html__( 'How we release', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:heading {"textAlign":"center","fontSize":"48"} -->
<h2 class="wp-block-heading has-text-align-center has-48-font-size"><?php echo esc_html__( 'Predictable, Documented Updates', 'aegis' ); ?></h2>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->
<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"grid","columnCount":3,"minimumColumnWidth":"280px"}} -->
<div class="wp-block-group alignwide">
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/git-commit-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Versions', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Semantic Versioning', 'aegis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Major versions may break things, minor versions add features, and patch versions fix them. Updates you can plan around.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/list-settings-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Format', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Clear Categories', 'aegis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Every entry is grouped as Added, Changed, Fixed, or Removed, following Keep a Changelog.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/github-line","textColor":"primary-500","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
<p class="is-style-sub-heading"><?php echo esc_html__( 'Releases', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"500"}},"fontSize":"18"} -->
<h3 class="wp-block-heading has-18-font-size" style="font-weight:500"><?php echo esc_html__( 'Built in the Open', 'aegis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"15"} -->
<p class="has-15-font-size"><?php echo esc_html__( 'Each release is tagged and packaged on GitHub, with automated checks before it ships.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"CTA"},"align":"full","className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|xl","left":"var:preset|spacing|lg"}}},"layout":{"type":"constrained","contentSize":"680px"}} -->
<div class="wp-block-group alignfull is-style-surface" style="padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--xl);padding-left:var(--wp--preset--spacing--lg)">
<!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group">
<!-- wp:icon {"icon":"remixicon/notification-3-line","textColor":"primary-500","style":{"dimensions":{"width":"40px"}}} /-->
<!-- wp:heading {"textAlign":"center","fontSize":"40"} -->
<h2 class="wp-block-heading has-text-align-center has-40-font-size"><?php echo esc_html__( 'Never Miss a Release', 'aegis' ); ?></h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"align":"center","fontSize":"18"} -->
<p class="has-text-align-center has-18-font-size"><?php echo esc_html__( 'Release notes and tutorials are published on the blog as each version ships.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons">
<!-- wp:button {"backgroundColor":"neutral-800","iconSet":"remixicon","iconName":"arrow-right-line","iconSize":"16px","iconPosition":"end"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-neutral-800-background-color has-background wp-element-button" href="https://www.atmostfear-entertainment.com/blogs/aegis/"><?php echo esc_html__( 'Visit the blog', 'aegis' ); ?></a></div>
<!-- /wp:button -->
<!-- wp:button {"className":"is-style-ghost","iconSet":"remixicon","iconName":"download-2-line","iconSize":"16px","iconPosition":"end"} -->
<div class="wp-block-button is-style-ghost"><a class="wp-block-button__link wp-element-button" href="https://github.com/aegiswp/theme/releases/tag/v1.0.0"><?php echo esc_html__( 'Download Free', 'aegis' ); ?></a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
