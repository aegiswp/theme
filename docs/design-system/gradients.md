# Gradients

Aegis includes 31 gradient presets for backgrounds, overlays, and decorative elements. All of them are defined in `theme.json` under `settings.color.gradients` and appear in the block editor gradient picker. The WordPress default gradients are turned off (`defaultGradients: false`). Custom gradients are on.

## Using Gradients in the Editor

### Applying a Gradient Background

1. Select a block that supports gradient backgrounds (Group, Cover, Columns, Button, and others).
2. In the block settings sidebar, find the **Color** section.
3. Click **Background**.
4. Switch to the **Gradient** tab in the color picker.
5. Select a preset gradient or create a custom one.

### Overlays on Cover Blocks

Cover blocks accept a gradient as their overlay. The scrim and vignette presets below are made for this.

## Available Gradient Presets

### Brand and Neutral Blends

Two-color linear blends built from palette tokens. They follow the active style variation and dark mode.

| Name | Slug | Value |
|------|------|-------|
| Primary 700/500 | `primary-700-500` | `linear-gradient(135deg,var(--wp--preset--color--primary-700) 0%,var(--wp--preset--color--primary-500) 100%)` |
| Primary 500/300 | `primary-500-300` | `linear-gradient(135deg,var(--wp--preset--color--primary-500) 0%,var(--wp--preset--color--primary-300) 100%)` |
| Primary Transparent | `primary-transparent` | `linear-gradient(180deg,var(--wp--preset--color--transparent) 0%,var(--wp--preset--color--primary-100) 100%)` |
| Primary Foreground | `primary-foreground` | `linear-gradient(135deg,var(--wp--preset--color--primary-900) 0%,var(--wp--preset--color--neutral-950) 100%)` |
| Body/Heading | `body-heading` | `linear-gradient(135deg,var(--wp--preset--color--neutral-600) 0%,var(--wp--preset--color--neutral-950) 100%)` |
| Surface/Border | `surface-border` | `linear-gradient(135deg,var(--wp--preset--color--neutral-100) 0%,var(--wp--preset--color--neutral-200) 100%)` |

### Split Backgrounds

Hard 50% splits between the page background and transparent. Useful behind cards that overlap two sections.

| Name | Slug | Value |
|------|------|-------|
| Background/Transparent | `background-transparent` | `linear-gradient(0deg,var(--wp--custom--body--background) 50%,transparent 50%)` |
| Transparent/Background | `transparent-background` | `linear-gradient(180deg,var(--wp--custom--body--background) 50%,transparent 50%)` |

### Fades

Fade from the white base (`neutral-0`) to transparent, or from near-black (`rgba(9,9,11,…)`) to transparent.

| Name | Slug | Value |
|------|------|-------|
| Fade Left | `fade-left` | `linear-gradient(90deg,var(--wp--preset--color--neutral-0) 0%,transparent 100%)` |
| Fade Right | `fade-right` | `linear-gradient(-90deg,var(--wp--preset--color--neutral-0) 0%,transparent 100%)` |
| Fade Dark Top | `fade-dark-top` | `linear-gradient(180deg,rgba(9,9,11,0.80) 0%,rgba(9,9,11,0.4) 50%,transparent 100%)` |
| Fade Dark Bottom | `fade-dark-bottom` | `linear-gradient(0deg,rgba(9,9,11,0.80) 0%,rgba(9,9,11,0.4) 50%,transparent 100%)` |

### Textures

Repeating backgrounds.

| Name | Slug | Value |
|------|------|-------|
| Checkerboard | `checkerboard` | `repeating-conic-gradient(var(--wp--preset--color--neutral-200) 0% 25%, transparent 0% 50%) 50% / 16px 16px` |
| Grid | `grid` | `conic-gradient(from 90deg at 1px 1px,transparent 90deg,var(--wp--custom--gradient-grid--color,var(--wp--preset--color--neutral-100)) 0) -1px -1px / var(--wp--custom--gradient-grid--size,40px) var(--wp--custom--gradient-grid--size,40px)` |
| Diagonal Stripes | `diagonal-stripes` | `repeating-linear-gradient(135deg,transparent 0px,transparent 10px,rgba(9,9,11,0.1) 10px,rgba(9,9,11,0.1) 20px)` |

### Diagonal Cuts and Bands

Hard-edged shapes in `primary-950` or `neutral-0`.

| Name | Slug | Value |
|------|------|-------|
| Diagonal Cut Dark Left | `diagonal-cut-dark-left` | `linear-gradient(135deg,var(--wp--preset--color--primary-950) 0%,var(--wp--preset--color--primary-950) 50%,transparent 50%)` |
| Diagonal Cut Dark Right | `diagonal-cut-dark-right` | `linear-gradient(-135deg,var(--wp--preset--color--primary-950) 0%,var(--wp--preset--color--primary-950) 50%,transparent 50%)` |
| Diagonal Cut Light Left | `diagonal-cut-light-left` | `linear-gradient(135deg,transparent 0%,transparent 50%,var(--wp--preset--color--neutral-0) 50%)` |
| Diagonal Cut Light Right | `diagonal-cut-light-right` | `linear-gradient(-135deg,transparent 0%,transparent 50%,var(--wp--preset--color--neutral-0) 50%)` |
| Long Top Short Bottom | `long-top-short-bottom` | `linear-gradient(180deg,var(--wp--preset--color--primary-950) 0%,var(--wp--preset--color--primary-950) 70%,transparent 70%)` |
| Short Top Long Bottom | `short-top-long-bottom` | `linear-gradient(0deg,var(--wp--preset--color--primary-950) 0%,var(--wp--preset--color--primary-950) 70%,transparent 70%)` |
| Diagonal Triple | `diagonal-triple` | `linear-gradient(135deg,var(--wp--preset--color--primary-950) 0%,var(--wp--preset--color--primary-950) 33%,var(--wp--preset--color--primary-700) 33%,var(--wp--preset--color--primary-700) 66%,transparent 66%)` |
| Layered Bands | `layered-bands` | `linear-gradient(180deg,var(--wp--preset--color--primary-950) 0%,var(--wp--preset--color--primary-950) 25%,rgba(9,9,11,0.5) 25%,rgba(9,9,11,0.5) 75%,transparent 75%)` |

### Overlays and Scrims

Dark overlays for text on images and video.

| Name | Slug | Value |
|------|------|-------|
| Vignette Vertical | `vignette-vertical` | `linear-gradient(180deg,rgba(9,9,11,0.9) 0%,rgba(9,9,11,0.6) 30%,transparent 60%,rgba(9,9,11,0.6) 80%,rgba(9,9,11,0.9) 100%)` |
| Vignette Radial | `vignette-radial` | `radial-gradient(ellipse at center,transparent 0%,rgba(9,9,11,0.8) 100%)` |
| Diagonal Vignette | `diagonal-vignette` | `linear-gradient(135deg,rgba(9,9,11,0.9) 0%,transparent 50%,rgba(9,9,11,0.9) 100%)` |
| Scrim Bottom | `scrim-bottom` | `linear-gradient(180deg,transparent 0%,transparent 60%,rgba(9,9,11,0.95) 100%)` |
| Scrim Top | `scrim-top` | `linear-gradient(0deg,transparent 0%,transparent 60%,rgba(9,9,11,0.95) 100%)` |
| Spotlight Bottom Left | `spotlight-bottom-left` | `radial-gradient(circle at 0% 100%,rgba(9,9,11,0.9) 0%,transparent 70%)` |
| Spotlight Top Right | `spotlight-top-right` | `radial-gradient(circle at 100% 0%,rgba(9,9,11,0.9) 0%,transparent 70%)` |
| Cinematic Bars | `cinematic-bars` | `linear-gradient(90deg,rgba(9,9,11,0.9) 0%,transparent 40%,transparent 60%,rgba(9,9,11,0.9) 100%)` |

The Grid preset reads `--wp--custom--gradient-grid--color` when it is set, and otherwise uses `neutral-100`. The split presets read `--wp--custom--body--background`, which the dark mode styles set.

## CSS Custom Properties

Gradient presets are available as CSS custom properties:

```css
var(--wp--preset--gradient--primary-700-500)
var(--wp--preset--gradient--primary-500-300)
var(--wp--preset--gradient--primary-transparent)
var(--wp--preset--gradient--primary-foreground)
var(--wp--preset--gradient--body-heading)
var(--wp--preset--gradient--surface-border)
var(--wp--preset--gradient--background-transparent)
var(--wp--preset--gradient--transparent-background)
var(--wp--preset--gradient--fade-left)
var(--wp--preset--gradient--fade-right)
var(--wp--preset--gradient--checkerboard)
var(--wp--preset--gradient--grid)
var(--wp--preset--gradient--diagonal-cut-dark-left)
var(--wp--preset--gradient--diagonal-cut-dark-right)
var(--wp--preset--gradient--diagonal-cut-light-left)
var(--wp--preset--gradient--diagonal-cut-light-right)
var(--wp--preset--gradient--fade-dark-top)
var(--wp--preset--gradient--fade-dark-bottom)
var(--wp--preset--gradient--long-top-short-bottom)
var(--wp--preset--gradient--short-top-long-bottom)
var(--wp--preset--gradient--vignette-vertical)
var(--wp--preset--gradient--vignette-radial)
var(--wp--preset--gradient--diagonal-vignette)
var(--wp--preset--gradient--scrim-bottom)
var(--wp--preset--gradient--scrim-top)
var(--wp--preset--gradient--diagonal-triple)
var(--wp--preset--gradient--layered-bands)
var(--wp--preset--gradient--spotlight-bottom-left)
var(--wp--preset--gradient--spotlight-top-right)
var(--wp--preset--gradient--cinematic-bars)
var(--wp--preset--gradient--diagonal-stripes)
```

### Example Usage

```css
.my-hero-section {
    background: var(--wp--preset--gradient--primary-700-500);
}

.my-overlay {
    background: var(--wp--preset--gradient--scrim-bottom);
}
```

In block markup, a preset gradient is written as `"gradient":"scrim-bottom"`, which adds the class `has-scrim-bottom-gradient-background`.

## Creating Custom Gradients

### In the Editor

1. Select a block with a gradient background.
2. In the gradient picker, click **Custom**.
3. Use the gradient bar to:
   - Add color stops by clicking on the bar.
   - Drag stops to adjust positions.
   - Click a stop to change its color.
   - Change the gradient type (linear or radial).
   - Adjust the angle for linear gradients.
4. The custom gradient is saved with the block.

### In theme.json (Developers)

Add gradients to the `settings.color.gradients` array in a child theme:

```json
{
  "settings": {
    "color": {
      "gradients": [
        {
          "slug": "my-brand-blend",
          "name": "My Brand Blend",
          "gradient": "linear-gradient(135deg, var(--wp--preset--color--primary-500) 0%, var(--wp--preset--color--primary-900) 100%)"
        }
      ]
    }
  }
}
```

## Gradient Use Cases

| Use Case | Recommended Presets |
|----------|---------------------|
| Hero section backgrounds | Primary 700/500, Primary Foreground, Diagonal Triple |
| Image overlays (readability) | Scrim Bottom, Scrim Top, Fade Dark Bottom, Vignette Radial |
| Subtle section tints | Primary Transparent, Surface/Border |
| Overlapping cards between sections | Background/Transparent, Transparent/Background |
| Decorative backgrounds | Grid, Checkerboard, Diagonal Stripes |
| Section transitions | Long Top Short Bottom, Short Top Long Bottom, Diagonal Cut presets |

## Gradients and Dark Mode

- Presets built from palette tokens (`var(--wp--preset--color--…)`) follow dark mode, because dark mode remaps those tokens.
- The overlay presets use fixed `rgba(9,9,11,…)` values, so they stay dark in both modes.
- Custom gradients built from palette tokens also follow dark mode.

## Accessibility Notes

When using gradients as backgrounds for text:

- Ensure sufficient contrast between the text color and all parts of the gradient.
- Test readability at both the lightest and darkest points of the gradient.
- Use scrim overlays on image backgrounds to guarantee text readability.
- Avoid placing text on the transition zone of high-contrast gradients.

## Next Steps

- [[color-palette]] — Understand the colors used in gradient presets.
- [[shadows]] — Combine shadows with gradients for depth.
- [[borders]] — Learn about border tokens.
- [[css-variables-reference]] — Full list of gradient custom properties.
