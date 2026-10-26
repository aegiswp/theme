=== Aegis ===
Contributors: atmostfearentertainment
Requires at least: 7.0
Tested up to: 7.1.3
Requires PHP: 8.1
Stable tag: 1.0.2
License: GPL-2.0-or-later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

== Description ==

Aegis is a WordPress block theme and design-system framework built on systematic design tokens: structured colour scales, fluid typography, and constraint-based spacing for visual consistency across patterns and templates. It ships self-hosted Lexend and JetBrains Mono fonts, compiled custom blocks, 234 patterns for blog, commerce, events, portfolio, and contact, plus WooCommerce templates, dark/light mode, RTL support, and an accessibility-ready foundation aimed at WCAG 2.2 Level AA (full conformance still depends on site content).

== Installation ==

1. Upload the theme folder to `/wp-content/themes/` or install the zip via **Appearance → Themes → Add New → Upload Theme**.
2. Activate **Aegis** under **Appearance → Themes**.
3. Open **Appearance → Editor** to customize templates, template parts, and global styles.
4. Optional: install the free Aegis companion plugin for Map/Modal, the Integrations dashboard (including **Community → bbPress** and **SEO**), and admin settings. WooCommerce templates apply when WooCommerce is active.

== Frequently Asked Questions ==

= Does Aegis require a page builder? =

No. Aegis is a full-site editing block theme. Layout and styling use the Site Editor, block patterns, and `theme.json` tokens.

= Are fonts loaded from Google Fonts? =

No. Lexend, Lexend Deca, and JetBrains Mono are bundled under `assets/fonts/` under the SIL Open Font License 1.1.

= Does the theme phone home or require a license? =

The WordPress.org build does not include license activation or purchase prompts. Optional commercial extensions are separate plugins.

= Is WooCommerce required? =

No. WooCommerce templates and patterns are included but only apply when WooCommerce is active.

= Is Aegis WCAG certified? =

No. Aegis provides accessibility-ready infrastructure (skip links, landmarks, focus styles, keyboard support, reduced motion, labeled demo forms) targeting WCAG 2.2 Level AA. Editors remain responsible for alt text, heading order, link purpose, and contrast of custom colors or media. Verify with keyboard, screen reader, and tools such as pa11y/axe on your live pages.

= Does the Blank template include a skip link? =

Yes. Templates with a header get an injected skip link. The Blank template has no header, so it includes the Skip to Content pattern and a `<main id="main">` landmark around post content. Authors should supply exactly one `<h1>` in the page content on Blank and Page No Title templates.

== Screenshots ==

1. Native Block Framework showcase with light/dark mode, Site Editor styles panel, and block patterns.

== Changelog ==

= 1.0.2 - 2026-10-26 =
* Added: Navigation blocks with the is-drilldown class use the same slide-through submenus as the mobile menu, including a Back button.
* Added: Books Slider and Latest Posts Carousel patterns.
* Changed: The Home page hero shows Open Editor and Read Docs buttons again. Read Docs links to the Aegis docs on atmostfear-entertainment.com.
* Changed: Patterns load only when used, and pattern headers and icon lists are cached, so pages load much faster.
* Changed: Template tags print public post fields only, and Query Loop blocks ignore private meta keys unless a filter allows them.
* Changed: The onclick block setting and unrestricted Additional Styles are kept only for users who can post unfiltered HTML.
* Changed: Links that open in a new tab always get rel="noopener", and video facades only play YouTube and Vimeo.
* Removed: SVG uploads to the Media Library. SVGs already uploaded stay where they are.
* Reverted: Sticky site header from 1.0.1. The header scrolls with the page again.
* Fixed: Slider arrows sit over a single slide and beside multi-slide carousels; dots stay clear of the cards.
* Fixed: Slides always render as a slider item, including patterns that save only their inner blocks.
* Fixed: Circular avatars in slides stay square, and book covers keep their own aspect ratio
* Fixed: Hero, Features, Portfolio, and Team slider patterns use theme colors, with the lightbox off.
* Fixed: Faster page loads on every host, especially hosts that restrict file access with open_basedir.
* Fixed: WooCommerce variation scripts no longer load on every page.
* Fixed: WooCommerce patterns used in templates render on the front end.
* Fixed: Copy-to-clipboard buttons copy code exactly as written.
* Fixed: Structured data for embeds, FAQ accordions, and countdowns is escaped safely.
* Fixed: The block inserter's Patterns tab lists patterns again.
* Fixed: The Icon block's icon library loads its icons, including All and search, in under a second.

= 1.0.1 - 2026-10-19 =
* Added: Theme updates from GitHub releases appear in Dashboard → Updates and on the Themes screen, with one-click updates, auto-updates, and release notes.
* Added: A light/dark toggle in the editor top bar previews the canvas in either mode, remembered per user.
* Added: Audio block styling: a padded card with a full-width player that fits small screens, and the caption inside the card.
* Added: The site header stays fixed at the top of the screen while scrolling.
* Added: In the mobile menu, tapping an item with sub-items slides in a panel with those items and a Back button.
* Added: The Home page hero shows three images: a centered main image with two images behind it.
* Changed: The default header has a Contact button instead of the People and avatar buttons.
* Changed: The Home page hero links to the plugin download instead of the docs, and the release badge is removed.
* Changed: Navigation submenus open to the right of their parent item.
* Changed: Updated the theme screenshot to show the new Home page.
* Fixed: Captions on images and other media were too small; they now use the 14px size (13px on phones).
* Renamed Image Compare and Image Lightbox labels to Compare and Lightbox in docs and related UI copy.
* bbPress framework styles (avatars, forms, topic rows, breadcrumbs, Subscribe/Favorite, member layout) when the Aegis plugin Community integration is on.
* Empty footer Navigation blocks no longer list every page as a fallback.
* The companion plugin notice now installs the Aegis plugin from its latest GitHub release, with a link to the releases page as a fallback.
* Fixed: Mobile layout no longer squeezes or overflows content; spacing presets and large font sizes now scale with screen size.
* Fixed: Font sizes used by patterns but missing from theme.json (56, 42, 15, 13, 11) are now defined.
* Fixed: Patterns no longer reference spacing and color presets the theme doesn't define, so their padding and colors now apply.
* Fixed: Pro Tabs blocks no longer show as invalid in the editor (tab icon styles are no longer saved into the tab markup).
* Fixed: Header, footer, and content injection hooks fire once per page instead of twice.
* Fixed: Accessibility improvements: dark mode text contrast, button and logo link names, unique icon and heading IDs, the closed mini-cart drawer, and focus under the sticky header.
* Fixed: No more "translation loading triggered too early" notice in WordPress 6.7 and later.
* Fixed: Marquee and WooCommerce blocks in patterns no longer show as invalid in the editor.
* Fixed: Countdown block styles now load on the front end.
* Fixed: Pages with a Tag Cloud block no longer fail on a new site that has no tags yet.
* Fixed: Text contrast in dark sections, notices in dark mode, and several event, hero and footer patterns.
* Fixed: Without WooCommerce, the editor no longer shows unsupported WooCommerce blocks in the header and store patterns.

= 1.0.0 - 2026-10-14 =
* Initial release.

== Copyright ==

Aegis WordPress Theme, 2022 - 2026 Atmostfear Entertainment S.A.S.
Aegis is distributed under the terms of the GNU GPL.

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

This theme bundles the following third-party resources:

Composer
License: MIT
License URL: https://github.com/composer/composer/blob/main/LICENSE

enshrined/svg-sanitize 1.0.0
Copyright (c) Daryll Doyle
License: GPL-2.0-or-later
License URL: https://www.gnu.org/licenses/gpl-2.0.html
Source: https://github.com/darylldoyle/svg-sanitizer

psr/container
Copyright PHP Framework Interoperability Group
License: MIT
License URL: https://github.com/php-fig/container/blob/master/LICENSE

Aegis Framework (vendor/aegis/framework)
Copyright 2022-2026 Atmostfear Entertainment S.A.S.
License: GPL-2.0-or-later

Aegis Utilities (vendor/aegis/utilities)
Copyright 2022-2026 Atmostfear Entertainment S.A.S.
License: GPL-2.0-or-later

Aegis Icons (vendor/aegis/icons)
Copyright 2022-2026 Atmostfear Entertainment S.A.S.
License: GPL-2.0-or-later

WordPress & Social Icons
License: GPL-2.0-or-later
License URL: https://github.com/WordPress/WordPress/blob/master/license.txt

Lexend Font
Copyright 2018-2024 Thomas Jockin (https://thomasjockin.com/)
License: SIL Open Font License, 1.1, https://opensource.org/licenses/OFL-1.1
Source: https://github.com/googlefonts/lexend

Lexend Deca Font
Copyright 2018-2024 Thomas Jockin (https://thomasjockin.com/)
License: SIL Open Font License, 1.1, https://opensource.org/licenses/OFL-1.1
Source: https://github.com/googlefonts/lexend

JetBrains Mono Font
Copyright 2020 The JetBrains Mono Project Authors (https://github.com/JetBrains/JetBrainsMono)
License: SIL Open Font License, 1.1, https://opensource.org/licenses/OFL-1.1
Source: https://github.com/JetBrains/JetBrainsMono
