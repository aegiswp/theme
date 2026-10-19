# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

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

