# Gradients

Aegis includes 31 gradient presets that add depth, visual interest, and creative flair to backgrounds, overlays, and decorative elements. All gradients are defined in `theme.json` and available in the block editor gradient picker.

## Using Gradients in the Editor

### Applying a Gradient Background

1. Select a block that supports gradient backgrounds (Group, Cover, Columns, Button, and others).
2. In the block settings sidebar, find the **Color** section.
3. Click **Background**.
4. Switch to the **Gradient** tab in the color picker.
5. Select a preset gradient or create a custom one.

### Applying a Gradient to Text (Duotone)

For Cover and Image blocks, gradients can be applied as an overlay:

1. Select the Cover or Image block.
2. In the block toolbar, click the **Overlay** or **Duotone** option.
3. Choose a gradient preset for the overlay effect.

## Available Gradient Presets

Aegis ships with 31 gradient presets organized by type:

### Directional Gradients

| Preset | Direction | Colors |
|--------|-----------|--------|
| Primary to Transparent | Top to bottom | Primary-500 → Transparent |
| Dark to Transparent | Top to bottom | Neutral-900 → Transparent |
| Light to Dark | Top to bottom | Neutral-100 → Neutral-800 |
| Left to Right | Left to right | Primary-400 → Primary-700 |
| Right to Left | Right to left | Primary-700 → Primary-400 |
| Diagonal | Top-left to bottom-right | Primary-400 → Primary-800 |

### Color-Based Gradients

| Preset | Description |
|--------|-------------|
| Sunrise | Warm orange to yellow horizontal sweep |
| Sunset | Deep orange to purple diagonal |
| Ocean | Deep blue to teal transition |
| Forest | Dark green to emerald |
| Lavender | Soft purple to light violet |
| Rose | Pink to soft red |
| Gold | Amber to warm yellow |
| Mint | Light green to teal |
| Berry | Purple to magenta |
| Flame | Red to orange |
| Sky | Light blue to white |
| Dusk | Purple to dark blue |
| Earth | Brown to warm beige |
| Arctic | Ice blue to white |
| Coral | Coral pink to peach |

### Utility Gradients

| Preset | Description |
|--------|-------------|
| Fade to White | Content → White (for text overlays) |
| Fade to Black | Content → Black (for image overlays) |
| Scrim Top | Transparent → Dark (top overlay for readability) |
| Scrim Bottom | Transparent → Dark (bottom overlay for readability) |
| Vignette | Radial dark edges (spotlight effect) |

### Multi-Stop Gradients

| Preset | Description |
|--------|-------------|
| Rainbow | Full spectrum multi-color |
| Aurora | Green to blue to purple |
| Neon | Bright cyan to magenta |
| Prism | Multiple vibrant color stops |
| Twilight | Orange to purple to dark blue |

## CSS Custom Properties

Gradient presets are available as CSS custom properties:

```css
var(--wp--preset--gradient--primary-to-transparent)
var(--wp--preset--gradient--sunrise)
var(--wp--preset--gradient--ocean)
var(--wp--preset--gradient--fade-to-white)
/* ... and so on for all 31 presets */
```

### Example Usage

```css
.my-hero-section {
    background: var(--wp--preset--gradient--sunset);
}

.my-overlay {
    background: var(--wp--preset--gradient--scrim-bottom);
}
```

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

### In Theme.json (Developers)

Add custom gradients to the `settings.color.gradients` array:

```json
{
  "settings": {
    "color": {
      "gradients": [
        {
          "slug": "my-custom-gradient",
          "name": "My Custom Gradient",
          "gradient": "linear-gradient(135deg, #667eea 0%, #764ba2 100%)"
        }
      ]
    }
  }
}
```

## Gradient Use Cases

| Use Case | Recommended Presets |
|----------|-------------------|
| Hero section backgrounds | Sunset, Ocean, Aurora, Twilight |
| Image overlays (readability) | Scrim Top, Scrim Bottom, Fade to Black |
| Card decorative accents | Primary to Transparent, Diagonal |
| Button hover effects | Left to Right, Flame, Berry |
| Section dividers | Fade to White, Light to Dark |
| Creative backgrounds | Rainbow, Neon, Prism |
| Subtle section tints | Primary to Transparent, Sky |

## Gradients and Dark Mode

Gradient presets automatically adapt in dark mode:

- Utility gradients (scrims, fades) adjust their target colors.
- Color-based gradients maintain their hues but may shift lightness values.
- Custom gradients using CSS custom property colors will inherit dark mode colors.

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
