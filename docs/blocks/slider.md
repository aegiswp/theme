# Slider and Slide Blocks

The **Slider** block (`aegis/slider`) is a carousel container powered by Splide.js. Each slide is an **`aegis/slide`** child block.

## Overview

| Block | Name | Role |
|-------|------|------|
| Slider | `aegis/slider` | Carousel wrapper — settings, navigation, autoplay |
| Slide | `aegis/slide` | Single panel — holds any inner blocks |

Slide blocks **only** insert inside a Slider (`parent: aegis/slider` in `block.json`).

## Slider attributes

| Attribute | Type | Default | Description |
|-----------|------|---------|-------------|
| `type` | string | `slider` | `slider`, `marquee` (Splide AutoScroll; not the Group Marquee variation), or `fade` |
| `perPage` | number | `1` | Visible slides |
| `perMove` | number | `1` | Slides advanced per navigation |
| `autoplay` | boolean | `false` | Auto-advance |
| `pauseOnHover` | boolean | `true` | Pause autoplay on hover |
| `loop` | boolean | `false` | Infinite loop |
| `drag` | boolean | `true` | Touch/mouse drag |
| `showArrows` / `showDots` | boolean | `true` | Navigation UI |
| `speed` | number | `400` | Transition ms |
| `interval` | number | `5000` | Autoplay interval ms |
| `direction` | string | `ltr` | `ltr`, `rtl`, or `ttb` |
| `height` | string | `""` | Optional fixed height |
| `breakpoints` | boolean | `true` | Responsive perPage |
| `keyboard` | boolean | `true` | Arrow keys when the slider is focused |

## Slide block

- Container for slide content — images, text, buttons, etc.
- Supports background and text colors, padding
- Renders as `<div class="splide__slide">` via `render.php`

## Usage

1. Insert the **Slider** block (defaults include three Slide children, one visible at a time).
2. Build content inside each **Slide**.
3. Configure autoplay, arrows, dots, and loop in Slider settings. Raise **Slides Per Page** to show more than one slide at once.
4. Set **Type** to `marquee` for continuous scrolling (uses Splide AutoScroll). That is not the Group **Marquee** variation — see [[block-variations#marquee]] and [Plugin Marquee](../../plugins/aegis/docs/blocks/marquee.md).
5. Set **Type** to `fade` when the Fade extra is on (Splide fade; one slide per page).

New sliders default to **Slides Per Page** 1. Saved blocks keep their stored `perPage`. A template that still has `"perPage":3` with three slides shows every slide at once, so Splide hides overflow arrows and dots. Set **Slides Per Page** to 1 or add more slides. See [[../troubleshooting/common-issues#slider-arrows-and-dots-missing]].

## Aegis → Blocks → Slider

There is no parent Slider toggle. Enabling any extra implies the block (same pattern as Related Posts). Without the plugin, all extras behave as on. The `aegis/slide` child uses the same parent key.

| Extra | Inspector | Off fallback |
|-------|-----------|--------------|
| `slider_slide` | Implies the block (default slide type stays available) | Slide type remains the default |
| `slider_fade` | Type: Fade | Fade remaps to slide |
| `slider_navigation` | Show Arrows | arrows off |
| `slider_pagination` | Show Dots | dots off |
| `slider_loop` | Loop | loop off |
| `slider_keyboard` | Keyboard Navigation | keyboard off |
| `slider_responsive` | Responsive Breakpoints | breakpoints off |
| `slider_autoplay` | Autoplay / Interval / Pause on Hover (Pro extra) | autoplay off |

Type (slider/marquee), per page, per move, speed, direction, height, and drag stay available when the block is registered.

Plugin demo patterns `aegis/slider-*` register only when Slider is implied on. Inspector extras are passed as `window.aegisSliderFeatures` on the block editor script.

## Pro sub-features

**Aegis → Blocks → Slider** Pro extras (when Aegis Pro is active): fade effect, thumbnails, lightbox, mousewheel, aspect ratio, lazy loading, arrow styles, dot styles, and an autoplay pause control. Each extra is gated like Map/Countdown. The inspector reads `window.aegisSliderEditor.features`. Frontend extras run on **Splide**. Swiper-only effects (cube, coverflow, flip, cards, creative) were leftover from an older stack and are not offered.

See [Plugin Block Variations](../../plugins/aegis/docs/blocks/block-variations.md) and [Pro Block Extensions](../../plugins/aegis-pro/docs/features/block-extensions.md).

## Developer notes

- Source: `src/Blocks/slider/`, `src/Blocks/slide/`
- Registration: `src/Blocks/BlockRegistrar.php` — directory `slide` maps to parent key `slider`; extras imply that parent
- Inspector extras: `window.aegisSliderFeatures` inlined on the registered editor script handle
- Splide JS/CSS register from `vendor/aegis/framework/public` on `init` 8 (`splide` and `splide-autoscroll` scripts; `splide` style). On `init` 20 the generated slider view handle depends on `splide`.
- Styles: `block.json` `style` is `file:style-index.css` plus the `splide` handle. Webpack compiles `style.scss` because `index.tsx` imports it (same pattern as Related Posts).
- View scripts: `view.js`, `splide`, `splide-autoscroll`. `view.ts` waits until `Splide` is defined before mounting.
- Editor canvas lays slides in a horizontal row (`--aegis-slider-per-page`). Arrows and dots in the editor are decorative chrome, not interactive Splide controls.
- Accessibility: keyboard arrow navigation — see [[../features/accessibility|Accessibility]]

## Next Steps

- [[custom-blocks]] — Block index
- [[block-patterns]] — Slider category patterns (plugin demos)
