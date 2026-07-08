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
| `type` | string | `slider` | `slider` or `marquee` |
| `perPage` | number | `3` | Visible slides |
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

## Slide block

- Container for slide content — images, text, buttons, etc.
- Supports background and text colors, padding
- Renders as `<div class="splide__slide">` via `render.php`

## Usage

1. Insert the **Slider** block (defaults include three Slide children).
2. Build content inside each **Slide**.
3. Configure autoplay, arrows, dots, and loop in Slider settings.
4. Set **Type** to `marquee` for continuous scrolling (uses Splide AutoScroll).

## Pro sub-features

**Slider lightbox** and other sub-features are toggled at **Aegis → Blocks → Slider** when the companion plugin is active. See [Plugin Block Variations](../../plugins/aegis/docs/blocks/block-variations.md).

## Developer notes

- Source: `src/Blocks/slider/`, `src/Blocks/slide/`
- View scripts: `view.js`, `splide`, `splide-autoscroll`
- Accessibility: keyboard arrow navigation — see [[../features/accessibility|Accessibility]]

## Next Steps

- [[custom-blocks]] — Block index
- [[block-patterns]] — Slider category patterns (theme + plugin demos)
