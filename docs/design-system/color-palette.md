# Color Palette

Aegis uses a comprehensive color system based on the Tailwind CSS v3 scale, implemented as design tokens in `theme.json`. Every color is available as a CSS custom property and as a preset in the block editor color picker.

## Color Architecture

The palette is organized into five color families, each with a full range of shades:

- **Primary (Zinc)** — The main brand color used for key UI elements.
- **Neutral** — Grayscale values for backgrounds, text, and borders.
- **Success (Green)** — Positive states, confirmations, and success messages.
- **Warning (Orange)** — Cautionary states and attention-drawing elements.
- **Error (Red)** — Error states, destructive actions, and alerts.

## Primary Colors (Zinc)

The primary palette provides 22 shades from near-white to near-black:

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
| `neutral-400` | Medium gray | Placeholder text, disabled text |
| `neutral-500` | Mid gray | Secondary text, icons |
| `neutral-600` | Dark gray | Body text |
| `neutral-700` | Darker gray | Headings |
| `neutral-800` | Very dark gray | High emphasis text |
| `neutral-900` | Near-black | Primary text |
| `neutral-950` | Darkest (#0a0a0a) | Page background (dark mode) |

## Success Colors (Green)

Used for positive feedback, confirmation states, and success indicators:

| Token | Shade | Typical Usage |
|-------|-------|---------------|
| `success-50` | Lightest green | Success alert background |
| `success-100` | Light green | Success badge background |
| `success-200` | Soft green | Light borders |
| `success-300` | Medium-light | Icons |
| `success-400` | Medium | Secondary success elements |
| `success-500` | Base green | Primary success indicators |
| `success-600` | Dark green | Success text on light backgrounds |
| `success-700` | Darker green | High emphasis success |
| `success-800` | Very dark | Dark success backgrounds |
| `success-900` | Darkest | Deepest success tone |
| `success-950` | Near-black green | Maximum contrast |

## Warning Colors (Orange)

Used for cautionary states, important notices, and attention elements:

| Token | Shade | Typical Usage |
|-------|-------|---------------|
| `warning-50` | Lightest orange | Warning alert background |
| `warning-100` | Light orange | Warning badge background |
| `warning-200` | Soft orange | Light borders |
| `warning-300` | Medium-light | Icons |
| `warning-400` | Medium | Secondary warning elements |
| `warning-500` | Base orange | Primary warning indicators |
| `warning-600` | Dark orange | Warning text on light backgrounds |
| `warning-700` | Darker orange | High emphasis warnings |
| `warning-800` | Very dark | Dark warning backgrounds |
| `warning-900` | Darkest | Deep warning tone |
| `warning-950` | Near-black orange | Maximum contrast |

## Error Colors (Red)

Used for error states, destructive actions, and critical alerts:

| Token | Shade | Typical Usage |
|-------|-------|---------------|
| `error-50` | Lightest red | Error alert background |
| `error-100` | Light red | Error badge background |
| `error-200` | Soft red | Light borders |
| `error-300` | Medium-light | Icons |
| `error-400` | Medium | Secondary error elements |
| `error-500` | Base red | Primary error indicators |
| `error-600` | Dark red | Error text on light backgrounds |
| `error-700` | Darker red | High emphasis errors |
| `error-800` | Very dark | Dark error backgrounds |
| `error-900` | Darkest | Deep error tone |
| `error-950` | Near-black red | Maximum contrast |

## Utility Colors

Additional colors used for specific interface needs:

| Token | Value | Usage |
|-------|-------|-------|
| `white` | #FFFFFF | Pure white |
| `black` | #000000 | Pure black |
| `transparent` | transparent | No color |
| `current` | currentColor | Inherits parent text color |

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

The color system is designed to meet WCAG 2.1 AA contrast requirements:

- Body text on background: minimum 4.5:1 contrast ratio.
- Large text on background: minimum 3:1 contrast ratio.
- Interactive elements: minimum 3:1 against adjacent colors.

When choosing colors for custom designs, always verify contrast using the WebAIM Contrast Checker or similar tools.

## Next Steps

- [[typography]] — Learn about the font system.
- [[gradients]] — Explore gradient presets built from the color palette.
- [[dark-mode]] — Understand how colors adapt in dark mode.
- [[css-variables-reference]] — Full list of color custom properties.
