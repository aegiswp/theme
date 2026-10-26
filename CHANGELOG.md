# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [1.0.2] - 2026-10-26

### Added

- Slide-through submenus on inline Navigation blocks. A block with the `is-drilldown` class and no overlay gets the same **Back** button, parent title, and nested panels as the mobile overlay menu. Inline menus do not trap Tab, and they return to the top level when something dispatches `aegis:drilldown-reset`. Drilldown rows use a 44px target.
- Books Slider pattern (`books`): one book per view, a 2:3 cover, arrows outside the slide (`is-arrows-outside`), and the lightbox off.
- Latest Posts Carousel pattern (`latest-posts`): post cards with the featured image, category, date, title, and excerpt, using the Pro query carousel (3 / 2 / 1 slides per view).
- `Pattern::parse_headers()` reads a pattern file's header without running the file and returns the pattern with `filePath` instead of `content`. `Pattern::register()` registers an already parsed pattern and its categories.
- `aegis_template_tag_post_fields` filter: the post fields that `{field}` template tags can print.
- `aegis_query_protected_meta_keys` filter: the `_`-prefixed meta keys that Query Loop blocks can filter and sort by. It defaults to WooCommerce's product keys (`_price`, `_regular_price`, `_sale_price`, `_stock`, `_wc_average_rating`, `_wc_review_count`).
- `DOM::set_link_target()` sets a link's `target` and `rel` from block attributes.

### Changed

- Theme patterns load lazily. `Pattern::register_from_file()` reads only the file header and registers the pattern with `filePath`, so WordPress runs a pattern file only when its content is used.
- Pattern folder listings and parsed headers are cached in the `aegis_pattern_headers` option (not autoloaded). A folder is listed again when its modified time changes, which adding, removing, or renaming a pattern does. The editor, REST API, and WP-CLI re-read a file's header when the file's modified time changes. Front-end requests use the cached headers, and pattern content is always read from the file. If a template asks for a pattern slug that is not registered, that request re-checks every file, so a renamed slug works on the front end right away. The cache starts fresh when the active theme or its version changes, so theme updates never serve outdated pattern headers.
- The icon library caches each icon folder's SVG file names in the `aegis_icon_files` option (not autoloaded) and lists the folder again when its modified time changes. Before, it listed about 5,700 SVG files on every request.
- WooCommerce plugin patterns (`woocommerce/`) are removed right before the editor loads the pattern list, not on every `init`. Reading the whole pattern registry on `init` loaded every pattern file.
- `{field}` template tags print public post fields only: title, excerpt, dates, author, status, slug, parent, post type, and comment count. Custom fields still work, except `_`-prefixed ones. Nothing is printed for password-protected posts or posts the visitor cannot read.
- Meta Box block bindings skip `_`-prefixed fields, password-protected posts, and posts the visitor cannot read, the same as core's post meta binding.
- Query Loop meta filters and meta sorting ignore `_`-prefixed keys unless the `aegis_query_protected_meta_keys` filter lists them.
- Button and image links that open in a new tab always get `rel="noopener"`. `target` accepts `_blank` or `_self` only.
- Video embed facades only play YouTube (`youtube.com`, `youtube-nocookie.com`) and Vimeo (`player.vimeo.com`) player URLs over HTTPS. Other embeds render as before, without a facade.
- Inline SVG replaces an image only when it points to an `.svg` file inside `wp-content`.
- Inline styles built from block settings skip a value that contains `;`, `{`, or `}` outside quotes or parentheses. **Additional Styles** saved by users without the `unfiltered_html` capability keep only the CSS properties WordPress allows in post content.
- The `onclick` block setting is kept only when the user who saves the content has the `unfiltered_html` capability.

### Removed

- SVG uploads. The theme no longer adds SVG or SVGZ to the allowed upload types, so WordPress's default applies and SVG files cannot be uploaded to the Media Library. SVGs already in the Media Library stay where they are. The `aegis_svg_settings` filter and the `svg_upload`, `svg_strip_colors`, `svg_strip_dimensions`, and `svg_strip_styles` settings no longer do anything.
- The unused `data-ajax` option on copy-to-clipboard buttons.

### Reverted

- Sticky site header from 1.0.1. `settings.custom.header` in `theme.json` is `position: relative`, `top: 0px`, and `scrollPadding: 0px`. Set `position` back to `sticky` and `scrollPadding` to `5rem` to restore that behavior.
- Home page hero (`pages-home`) buttons from 1.0.1. The hero shows **Open Editor** and **Read Docs** again, and **Read Docs** links to `https://www.atmostfear-entertainment.com/docs/aegis/`. The three-image layout stays, and the release badge stays removed.

### Fixed

- Slider controls. On a single visible slide, arrows sit over the media. When more than one slide is visible, or the slider has `is-arrows-outside`, they sit in gutters beside the slides. Dots stay clear of the cards, except on full-bleed cover heroes. Chevrons and dots use Neutral 950.
- Slide markup. Patterns that save only inner blocks still get a `.splide__slide` wrapper, with `role="group"` and the "slide" role description. Content that already has that wrapper is not wrapped again. The block can be renamed in the editor, and older saves are covered by deprecations so the editor does not throw on color supports.
- Images inside slides. Circular avatars stay square and shrink-wrapped. Covers that set their own aspect ratio (the 2:3 book covers) are not forced to 1:1.
- Hero, Features, Portfolio, and Team slider patterns use theme colors and image placeholders, with the lightbox off.
- Page load times. The theme no longer lists every icon or runs every pattern file on each request, so pages load much faster on every host. The gain is largest on hosts that restrict file access with `open_basedir`, where each file check is costly.
- WooCommerce's variation scripts (`underscore`, `wp-util`, and `wc-add-to-cart-variation`) loaded on every page, because running every pattern file enqueued them. They now load only where a variable product form needs them.
- `woocommerce/` patterns used in templates or content rendered empty on the front end, because they were removed on every request. They now render.
- Copy-to-clipboard buttons copy code exactly as written, including text that looks like HTML.
- Structured data (`application/ld+json`) for embeds, FAQ accordions, and countdowns escapes `<` and `>`.
- `aegis/pattern` blocks with an unusual slug render the matching pattern instead of misreading the slug.
- The block inserter's **Patterns** tab was empty, and `GET /wp/v2/block-patterns/patterns` returned a critical error. The **Patterns** utility pattern (`utility/patterns.php`) set a `$patterns` variable, and WordPress runs pattern files inside the pattern registry, where that name holds the registry's own list. The variable is now `$category_patterns`.
- The Icon block's **Icon library** never showed any icons. WordPress's `GET /wp/v2/icons` reads and sanitizes every registered SVG (about 5,800 with the Aegis sets) before it filters by collection or search. `Icons\RestIconsList` now serves the two icon list routes. It filters first, then loads only the matching icons, and keeps each collection's sanitized SVGs in an `aegis_icon_content_{collection}` option (not autoloaded). The option is rebuilt when an icon is added, removed, or renamed, or when the theme version changes. Core's permission check, arguments, and response format are unchanged. On a local site, one collection now loads in under 0.1 s and the whole library in about 0.6 s, instead of 15 s.

## [1.0.1] - 2026-10-19

### Added

- Theme updates from GitHub releases through WordPress's native update screens. `style.css` declares `Update URI: https://github.com/aegiswp/theme`, and `GitHubUpdater` answers core's `update_themes_github.com` check with the latest release's `aegis.zip`, so new versions appear in Dashboard → Updates and on the Themes screen with "update now", auto-updates, and release notes. The repository is filterable via `aegis_theme_update_repository`.
- Editor light/dark preview toggle: a top-bar button beside Settings and Styles (and "Preview in dark/light mode" in the View menu) switches the editor canvas between light and dark using the same tokens as the front end. The choice is saved per user; the WordPress interface itself is unchanged. Available in the post and Site Editor, and skipped when dark mode is disabled.
- Audio block styling in `theme.json`: a card with the Neutral 100 background, the theme border radius, and inner padding. The player fills the card and can shrink below core's 300px minimum on narrow screens, and the caption sits inside the card. Supporting CSS loads only on pages with an Audio block.
- Sticky site header: the header template part stays fixed at the top while scrolling, below the admin bar on desktop and at the very top on phones, with an opaque Neutral 0 background. Controlled by `settings.custom.header` in `theme.json` (`position`, `top`, `zIndex`, `background`).
- Slide-through submenus in the mobile (overlay) menu: submenus start closed, and tapping a parent item or its arrow slides in a panel with its sub-items, a **Back** button, and the parent as a title link. Works for every Navigation block, including nested submenus and Page List items. Escape goes back one level, focus stays inside the menu, and the menu reopens at the top level. Without JavaScript the menu falls back to core's expanded list. The script (`navigation-drilldown.js`) loads only on pages with submenus.
- Three-image hero on the Home page pattern: a centered main image on top, with two images behind it on either side (the side images are hidden on phones).

### Changed

- Renamed admin and docs labels **Image Compare** → **Compare** and **Image Lightbox** → **Lightbox** (block names and settings keys unchanged).
- bbPress framework styles: circular avatars, content-scale type, theme form fields, grid topic rows, WordPress-style breadcrumbs, Subscribe/Favorite alignment, My Account–style member layout.
- Empty footer Navigation blocks no longer fall back to listing every page (`NavigationFallback` + footer pattern sample links).
- Companion plugin notice now installs the Aegis plugin from the latest GitHub release (`aegiswp/plugin`) instead of WordPress.org, where it isn't listed. If installation fails, the notice links to the releases page for a manual download. The package URL is filterable via `aegis_companion_package_url`.
- Default header: the People button is now a **Contact** button with a mail icon that links to the site's `/contact/` page (hidden on phones), and the comment-author avatar button is removed.
- Home page hero: the **Read Docs** button is now **Get Plugin**, linking to the Aegis plugin download page, and the release badge above the heading is removed.
- Theme screenshot (`screenshot.png`, 1200×900) updated to show the new Home page: the sticky header with the Contact button, the Get Plugin hero, and the three-image layout.
- Navigation submenus now open to the right of their parent item, including in right-aligned menus. In right-aligned menus, the last top-level item still opens toward the left so its submenu stays on screen.

### Fixed

- Captions on images, galleries, tables, embeds, video, and audio were too small to read comfortably (11px on most screens). They now use the 14px preset (13px on phones).
- Mobile layout: full-width sections inside `main` now cancel the root padding (`style.css`), so nested full-width groups no longer stack side padding and squeeze or overflow content on phones.
- `theme.json`: spacing presets `sm` through `xxl` are now fluid (for example, `lg` scales from 24px on phones to 48px on desktop), including the page's side padding.
- `theme.json`: large font sizes (36px and up) scale down further on small screens (for example, 96px now goes down to 56px instead of 80px).
- `theme.json`: added the `56`, `42`, `15`, `13` and `11` font sizes used by patterns but previously undefined, so those blocks render at their intended size.
- Patterns: 97 hard-coded spacing values (16px and up) in the footer, slider, team, Funnel Thank You, and Order Confirmation patterns now use the fluid spacing presets (`xs`, `sm`, `md`, `2xs`), so they scale down on phones like the rest of the theme.
- Patterns: replaced spacing and color presets that `theme.json` doesn't define (spacing `20`–`70`; colors `primary`, `contrast`, `background`, `gray-400`, `currentColor`) with the closest theme presets. These blocks previously rendered without that padding or color.
- Pro Tabs: `aegis/tab` blocks no longer show as invalid in the editor. The icon extension (`icon-block-editor.js`) no longer writes `--wp--custom--icon--*` variables into the tab's saved markup; tab icons are rendered in the tabs nav instead.
- Layout injection hooks (`aegis_before_{slug}`, `aegis_after_{slug}`, `aegis_before_content`, `aegis_after_content`) fired twice per render, so hooked output printed twice. The duplicate `DesignSystem\Hooks` registration is removed; `CoreBlocks\TemplatePart` and `CoreBlocks\PostContent` fire each hook once.
- Accessibility: text in dark mode meets WCAG AA contrast. Neutral 400 and 500 text is lighter in dark mode, Primary 500 uses the lighter shade, and sub-headings use Primary 600.
- Accessibility: icons next to a button label are hidden from screen readers, so buttons are announced by their label only (for example "Get Plugin", not "Get Plugin Plugins Icon"). Icon-only buttons keep a name.
- Accessibility: linked Icon blocks without a label are named after the site (home links) or the icon, so the header logo link has an accessible name.
- Accessibility: icons no longer repeat the same `id` when used more than once on a page, and automatic heading IDs no longer clash with section anchors (a clash adds `-2`).
- Accessibility: the closed WooCommerce mini-cart drawer is removed from the keyboard tab order.
- Accessibility: in-page links and keyboard focus scroll clear of the sticky header (`settings.custom.header.scrollPadding`).
- Removed an empty, hidden button from the default header.
- WordPress 6.7+ no longer logs "translation loading for the aegis domain was triggered too early": framework services register their assets on `init`.
- Marquee groups no longer show as invalid in the editor when the marquee speed or direction settings are off. Those settings still apply on the front end.
- WooCommerce patterns and templates (shop, product archives, cart, Coming Soon) no longer show invalid filter, cart, and Coming Soon blocks in the editor.
- Removed a console error in the editor when Inline SVG is turned off.
- Without WooCommerce, the editor no longer shows "unsupported block" placeholders: header patterns drop the cart and account icons, and patterns built on WooCommerce blocks are hidden. Patterns that use the Aegis plugin's map block are hidden when the plugin is inactive (`PatternDependencies`).
- Accessibility: sub-headings in sections with their own background and text color follow that text color, so they stay readable on dark sections.
- Accessibility: outline buttons in dark sections keep a transparent background instead of the filled dark-section button style.
- Accessibility: in dark mode, the soft Success, Warning, Error and Info backgrounds become dark tints, so notice text stays readable.
- Accessibility: text in dark-styled event patterns (cinema, conference, workshop, music festival), the Hero Video overlay, the Wide footer search button and the Slider Hero outline button now meets WCAG AA contrast in light and dark mode.
- Pages with a Tag Cloud block (including the Sidebar pattern) no longer stop with a fatal error on a site that has no tags yet. Curved Text and Social Link rendering also skip missing elements instead of failing.
- Portfolio page pattern: the project cards use a 60% overlay so their white titles stay readable over light images.
- Countdown block: its front-end styles (segment layout and spacing) now load. `block.json` pointed to a stylesheet the build never produced.
- `composer.json` no longer sets a `version` field, so `composer validate --strict` in the release workflow passes.

## [1.0.0] - 2026-10-14

- Initial release.

## [1.0.0-rc.3] - 2026-05-01

- RC 3 Release

## [1.0.0-rc.2] - 2026-01-28

- RC 2 Release

## [1.0.0-rc.1] - 2026-01-17

- RC 1 Release

## [1.0.0-beta.3] - 2025-02-28

- Beta 3 Release

## [1.0.0-beta.2] - 2024-02-16

- Beta 2 Release

## [1.0.0-beta.1] - 2023-12-23

- Beta 1 Release

## [1.0.0-alpha.3] - 2023-11-10

- Alpha 3 Release

## [1.0.0-alpha.2] - 2023-10-27

- Alpha 2 Release

## [1.0.0-alpha.1] - 2023-10-13

- Alpha 1 Release

