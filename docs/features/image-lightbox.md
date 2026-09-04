# Image Lightbox

Aegis enhances the WordPress **Image** block lightbox (`core/image` with **Expand on click**). The lightbox itself is Core. Toggles at **Aegis → Blocks → Image Lightbox** add extras on top.

`theme.json` enables lightbox support (`settings.lightbox.enabled`). Editors still turn **Expand on click** on per image (or via Global Styles for the Image block).

The overlay scrim and close/prev/next controls follow the active color scheme (light or dark) using `--wp--custom--body--background` and `--wp--custom--body--color`. Changing the site background or text color in the Site Editor updates those tokens. Core bakes a light-mode hex into the overlay HTML; Aegis overrides it so dark mode is not stuck on the cream surface.

Image captions stay on the figure in the content. They are not shown in the lightbox overlay.

## Feature Toggles

Features are off by default when the companion plugin is active. Enable All on the Image Lightbox section, or turn on individual extras:

| Toggle | What it adds |
|--------|----------------|
| Gallery Navigation | Treats lightbox images in the same Group, Row, Stack, Column, or Gallery as a set. Shows Core prev/next arrows and allows arrow-key navigation. |
| Zoom | Double-click, scroll wheel, and pinch-to-zoom with pan on the enlarged image. Clicking the image while zoomed does not close the overlay; swipe is paused while zoomed. |
| Thumbnail Strip | Thumbnail row when a grouped set has **4 or more** images. |
| Swipe Gestures | Groups sibling lightbox images so Core’s touch swipe can move between them. Core arrows stay hidden unless Gallery Navigation is also on. |

Slider lightbox (`slider_lightbox`) is a separate Pro feature on the Slider block, not this section.

## Requirements

- WordPress Image lightbox (Expand on click) enabled on the image.
- Linked images (`linkDestination` other than none) do not use Core lightbox; Aegis extras do not apply.
- SVG Image variation (`is-style-svg`) is skipped.

## How grouping works

WordPress already groups images inside a **Gallery** block (Core sets `galleryId` and `data-wp-interactive="core/gallery"` on the gallery wrapper). Aegis grouping also covers lightbox images that share a Group (including Row and Stack layouts) or Column parent when Gallery Navigation, Swipe, or Thumbnails is on. Those wrappers get the same Core gallery interactivity context so prev/next, keyboard, and touch swipe work. Images in separate columns stay separate sets — use a Gallery block to group a row of images across columns.

## Next Steps

- [[enhanced-core-blocks]] — Other Image block enhancements.
- [[svg-icons]] — Icons use `core/icon`, not Image.
- [Plugin Custom Blocks](../../plugins/aegis/docs/blocks/custom-blocks.md) — Block feature toggles.
