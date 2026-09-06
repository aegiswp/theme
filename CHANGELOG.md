# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Breaking Changes

- Removed **`aegis/video`** custom block. Use **`core/video`** with Aegis framework, companion plugin, and Pro enhancements. Migrate existing content with `tools/migrate-aegis-video.php` (see `docs/getting-started/updating.md`).
- Removed **`core/query` Related Posts** block variation. Use the **`aegis/related-posts`** theme block instead. Advanced related-post querying on Query Loop remains available via **`aegisProRelatedPosts`** in Aegis Pro.
- Removed the **Image Icon** variation (`core/image` + `is-style-icon`). Use the WordPress **Icon** block (`core/icon`). Convert leftover content with `wp aegis migrate-icons` (Studio: `studio wp aegis migrate-icons`).

### Icons

- Custom Aegis and Pro icon sets register on the WordPress Icon library (`wp_register_icon_collection` / `wp_register_icon`) on WordPress 7.1+. IDs are `{collection}/{name}` (`core/home`, `social/facebook`). Glyphs Core already ships are not duplicated.
- Front-end Icon rendering preserves stroke/outline sets and maps literal black fills to `currentColor` so icons follow light and dark mode.
- Skip-to-content is injected after template-part rendering so the header landmark (and header icons) is not nested inside the skip link.

### Image Lightbox

- **Aegis → Blocks → Image Lightbox** extras now run on the WordPress Image lightbox: grouped navigation for images in Group/Row/Column, pinch/wheel/double-click zoom, thumbnail strips (4+ images), and swipe. Core **Expand on click** remains the lightbox itself. Image captions stay on the figure; they are not shown in the overlay. Group/Column wrappers receive Core’s gallery interactivity context so prev/next and swipe work outside Gallery blocks. Inline JS/CSS load from serialized `wp:image` markup. Overlay scrim and controls follow light/dark (or the Site Editor background). The expand trigger is wrapped to the image so it is not offset by Aegis’s centered full-width figure.

### Documentation

- Reorganized documentation for the theme/plugin/Pro split.
- Plugin-specific docs moved to `wp-content/plugins/aegis/docs/` and `wp-content/plugins/aegis-pro/docs/`.
- Theme docs updated for four-layer architecture (theme, framework, free plugin, Pro).
- Map docs cover Static Maps facade styles, vendored MarkerClusterer, and Pro editor preview (custom icons, custom JSON, clustering).
- Marquee docs cover **Aegis → Blocks → Marquee** extras (pause, direction, loop duration, repeat, Pro responsive speed), frontend duration on cloned items, fade-edge class cleanup, and the Feature Banner pattern.
- Related Posts docs cover **Aegis → Blocks → Related Posts** extras, inspector/frontend fallbacks, theme `blog-related-posts-*` patterns, and the split from Query Loop Pro `aegisProRelatedPosts`.
- Slider docs cover **Aegis → Blocks → Slider** extras, inspector/frontend fallbacks, plugin `aegis/slider-*` pattern gating, Pro Splide extras (not Swiper), Splide handle registration, compiled `style-index.css`, default `perPage` 1, and saved-content `perPage` on existing templates.
- SVG Image variation extras at **Aegis → Blocks → SVG** now apply: Paste Markup implies the variation, Mask Mode inlines as a CSS mask, Onclick is kept on the inlined SVG, Inline SVG in text and Inline SVG files are gated. Saved `is-style-svg` blocks still render when the variation is implied off. An empty SVG block shows the Aegis placeholder (preview-only) instead of the Image upload UI. The SVGOMG Optimize control is removed from the inspector and from the bundled editor script. SVG, Newsletter, and Accordion styles are registered once in PHP (`register_style()`), not also via `BlockStyles`. Inlined SVGs receive Image width/height responsive vars on the figure. Placeholder CSS loads whenever `is-placeholder` is in the HTML. Docs and `languages/aegis.pot` match: Accordion PHP style strings are in the translate scan; SVG inspector strings come from `svg-editor.js`.
- Countdown docs cover **Aegis → Blocks** extras (inspector/frontend fallbacks). Toggle is a two-view content switcher (pill / switch / buttons, alignment, labels), not an accordion. Accordion leftover extras (`toggle_faq`, heading/icon/allow-multiple) are removed. Pill and button styles use Aegis body/button custom properties so labels stay readable in light and dark. Styles compile to `style-index.css`. Pro URL sync, persist, animations, nested, and conditional visibility bind to the switcher DOM; fade/slide/flip/scale run on click (`aegis:toggle:changed` then `animateTransition()`). Nested queries, persist ids, pill indicator, switch-track clicks, duplicate slot assignment, editor view switching, and ARIA tab/panel ids are scoped per instance.
- Pro testimonial, hero, CTA, contact, and feature patterns no longer concatenate a missing `placeholder.svg` onto image filenames. Empty `core/image` blocks use the framework placeholder.

### Architecture

- Companion plugin owns admin dashboard, Map/Modal blocks, analytics, snippets, conditionals, and integrations (requires Aegis theme).
- Theme registers six custom blocks: countdown, slider, slide, toggle, toggle-content, and related-posts.

### Slider

- Splide JS and CSS register as WordPress script/style handles so the slider view script mounts a real carousel (arrows, dots, horizontal track). Default **Slides Per Page** is 1; saved blocks keep their stored `perPage`. Webpack compiles slider/slide `style.scss` to `style-index.css`. The editor lays slides out horizontally to match.

### SVG

- **Aegis → Blocks → SVG** extras now apply on the Image SVG variation: Paste Markup implies the variation in the inserter, Mask Mode uses a CSS mask, Onclick is copied onto the inlined SVG, Inline SVG in text and Inline SVG files honor their toggles. Saved `is-style-svg` content still inlines when the variation is implied off.

### Translations

- Regenerated theme `languages/aegis.pot`, plugin `languages/aegis.pot`, and Pro `languages/aegis-pro.pot` for Countdown, Toggle content-switcher, and Slider inspector strings.

### Map

- **Aegis → Blocks → Map** extras now apply on the plugin `aegis/map` block: multiple markers, style presets, map controls, OSM fallback, and schema. Pro extras (directions, clustering, geolocation, heatmap, drawing, KML/GeoJSON, dynamic markers, custom icons, custom style JSON) honor their toggles on the frontend and in the editor.
- Static Maps facade uses the same style presets (and Pro custom JSON when enabled). Marker clustering loads a vendored MarkerClusterer instead of unpkg. Custom icons, custom style JSON, and clustering preview in the block editor.
- Restored missing map block CSS, Google Maps style application, editor map preview, and the `is-activated` handshake Pro view scripts need after the click-to-load facade.
- Removed duplicate theme `form-map` / `form-map-overlay` patterns (plugin-owned). Pro contact patterns no longer ship leftover `aegis/google-map` inner HTML. Accidental webpack copies of map/modal metadata under plugin `assets/*/build/Blocks` were deleted.

### Marquee

- **Aegis → Blocks → Marquee** extras now apply to the Group Marquee variation: pause on hover, direction, loop duration (lower is faster), repeat clones, and Pro responsive desktop speed from 782px. The variation unregisters when Marquee is off; `is-marquee` is stripped so saved Groups do not keep scrolling. Fade edges use the `fade-horizontal` utility (legacy `fade-edges` class is stripped on render).
- Frontend render clones items onto an inner track and sets per-block `animation-duration` on `.aegis-marquee-item` so inspector durations apply on the live site. Theme Feature Banner pattern now uses marquee layout (it previously kept leftover marquee attributes on a constrained Group). Pro Feature Icon Boxes logo strips use `fade-horizontal` instead of the unused `fade-edges` class.

### Related Posts

- **Aegis → Blocks → Related Posts** extras now gate the `aegis/related-posts` inspector (Related By, Order By, Fallback, Style Variants, Excerpt Length, Image Aspect Ratio) to match frontend fallbacks. Feature flags are inlined as `window.aegisRelatedPostsFeatures` on the block editor script. Duplicate plugin copies of the theme related-posts patterns were removed; theme patterns `blog-related-posts-*` unregister when the block is implied off. Leftover `core/query` Related Posts variation unregisters were deleted. Webpack remaps `file:index.js` / `file:view.js` entries to `index.tsx` / `view.ts` so theme blocks compile from TypeScript.

### Slider

- **Aegis → Blocks → Slider** extras now gate the `aegis/slider` inspector (Fade, Navigation, Pagination, Loop, Keyboard, Responsive, Autoplay) to match frontend fallbacks. Feature flags are inlined as `window.aegisSliderFeatures`. Plugin `aegis/slider-*` patterns register only when the block is implied on. Pro extras (thumbnails, lightbox, mousewheel, aspect ratio, lazy load, arrow/dot styles) honor admin toggles on Splide; leftover Swiper view code, unused `config/slider.php`, and never-registered Ken Burns/parallax pattern demos were removed.

## [1.0.0] - 0000-00-00

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
