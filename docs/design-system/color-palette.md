# Color Palette

Aegis uses a comprehensive color system based on the Tailwind CSS v3 scale, implemented as design tokens in `theme.json`. Every color is available as a CSS custom property and as a preset in the block editor color picker.

## Color Architecture

The palette is organized into these color families (no Secondary, Tertiary, or Quaternary scales):

- **Primary (Zinc)** — The main brand color used for key UI elements and default buttons.
- **Neutral** — Grayscale values for backgrounds, text, and borders.
- **Success (Green)** — Positive states, confirmations, and success messages.
- **Info (Blue)** — Informational states and accents.
- **Warning (Orange)** — Cautionary states and attention-drawing elements.
- **Error (Red)** — Error states, destructive actions, and alerts.
- **Utility** — Transparent, Current, Inherit, Shadow.

## Primary Colors (Zinc)

The primary palette provides 12 steps from near-white to near-black:

| Token | Shade | Typical Usage |
|-------|-------|---------------|
| `primary-25` | Lightest tint | Subtle backgrounds |
| `primary-50` | Very light | Hover states on light backgrounds |
| `primary-100` | Light | Secondary backgrounds |
| `primary-200` | Soft | Borders, dividers on light backgrounds |
| `primary-300` | Medium-light | Disabled states |
| `primary-400` | Medium | Placeholder text |
| `primary-500` | Base | Icons, secondary text |
| `primary-600` | Medium-dark | Body text alternative |
| `primary-700` | Dark | Headings, primary text |
| `primary-800` | Very dark | High emphasis text |
| `primary-900` | Darker | Dark backgrounds |
| `primary-950` | Darkest | Highest contrast backgrounds |

## Neutral Colors

The neutral palette provides pure grayscale values:

| Token | Shade | Typical Usage |
|-------|-------|---------------|
| `neutral-0` | White (#FFFFFF) | Page background (light mode) |
| `neutral-50` | Near-white | Card backgrounds, subtle surfaces |
| `neutral-100` | Very light gray | Section backgrounds |
| `neutral-200` | Light gray | Borders, dividers |
| `neutral-300` | Gray | Disabled borders |
| `neutral-400` | Medium gray (#666666) | Muted UI text that still meets ~4.5:1 on the default body background; prefer `neutral-600+` for small body copy |
| `neutral-500` | Mid gray | Secondary text, icons |
| `neutral-600` | Dark gray | Body text, fine print, disclaimers |
| `neutral-700` | Darker gray | Headings |
| `neutral-800` | Very dark gray | High emphasis text |
| `neutral-900` | Near-black | Primary text |
| `neutral-950` | Darkest (#0a0a0a) | Page background (dark mode) |

## Info Colors (Blue)

Informational accents and status. Ships only `info-100`, `info-500`, and `info-600`.

## Success Colors (Green)

Used for positive feedback, confirmation states, and success indicators:

| Token | Shade | Typical Usage |
|-------|-------|---------------|
| `success-100` | Light | Success alert / badge backgrounds |
| `success-500` | Base | Primary success indicators |
| `success-600` | Dark | Success text / high emphasis on light backgrounds |

Success ships only `success-100`, `success-500`, and `success-600`.

## Warning Colors (Orange)

Used for cautionary states, important notices, and attention elements:

| Token | Shade | Typical Usage |
|-------|-------|---------------|
| `warning-100` | Light | Warning alert / badge backgrounds |
| `warning-500` | Base | Primary warning indicators |
| `warning-600` | Dark | Warning text / high emphasis on light backgrounds |

Warning ships only `warning-100`, `warning-500`, and `warning-600`.

## Error Colors (Red)

Used for error states, destructive actions, and critical alerts:

| Token | Shade | Typical Usage |
|-------|-------|---------------|
| `error-100` | Light | Error alert / badge backgrounds |
| `error-500` | Base | Primary error indicators |
| `error-600` | Dark | Error text / high emphasis on light backgrounds |

Error ships only `error-100`, `error-500`, and `error-600`.

## Utility Colors

Additional colors used for specific interface needs:

| Token | Value | Usage |
|-------|-------|-------|
| `transparent` | transparent | Transparent backgrounds / overlays |
| `current` | currentColor | Inherits parent text color |
| `inherit` | inherit | Inherits parent color |
| `shadow` | rgba shadow token | Shared shadow tint |

## Using Colors in the Editor

### Block Color Settings

Most blocks expose color settings in the right sidebar:

1. Select a block.
2. Open the **Color** section in block settings.
3. Choose from the palette presets or enter a custom value.

Available color options vary by block but typically include:

- **Text** — The text color within the block.
- **Background** — The block background color.
- **Link** — The color of links within the block.

### Global Color Settings

To change colors site-wide, use Global Styles:

1. Open the Site Editor (**Appearance → Editor**).
2. Click the **Styles** icon.
3. Navigate to **Colors**.
4. Set colors for elements (background, text, links, headings, buttons).

See [[global-styles]] for detailed instructions.

## CSS Custom Properties

All colors are available as CSS custom properties following the WordPress preset naming convention:

```css
var(--wp--preset--color--primary-500)
var(--wp--preset--color--neutral-200)
var(--wp--preset--color--info-500)
var(--wp--preset--color--success-600)
var(--wp--preset--color--warning-500)
var(--wp--preset--color--error-500)
```

See [[css-variables-reference]] for the complete list of CSS custom properties.

## Dark Mode Color Mapping

In dark mode, the color scale effectively inverts. Light shades become backgrounds and dark shades become foregrounds:

| Usage | Light Mode Token | Dark Mode Token |
|-------|-----------------|-----------------|
| Page background | `neutral-0` | `neutral-950` |
| Card background | `neutral-50` | `neutral-900` |
| Border | `neutral-200` | `neutral-700` |
| Body text | `neutral-700` | `neutral-200` |
| Heading text | `neutral-900` | `neutral-50` |

See [[dark-mode]] for complete dark mode documentation.

## Contrast and Accessibility

The palette is tuned so default body text and interactive tokens can meet **WCAG 2.2 AA** contrast when used as documented:

- Body text on background: minimum 4.5:1 contrast ratio (`neutral-700` / `neutral-600` on the default surface).
- Large text on background: minimum 3:1 contrast ratio.
- Interactive elements and focus outlines: minimum 3:1 against adjacent colors.
- `neutral-400` (`#666666`) is the lightest gray intended for readable muted text on the default body background; do not use lighter neutrals (`neutral-300` and below) for essential copy.

Custom cover images, gradients, and editor-chosen colors still need a contrast check (WebAIM Contrast Checker or similar). See [[accessibility]].

## Next Steps

- [[typography]] — Learn about the font system.
- [[gradients]] — Explore gradient presets built from the color palette.
- [[dark-mode]] — Understand how colors adapt in dark mode.
- [[css-variables-reference]] — Full list of color custom properties.
