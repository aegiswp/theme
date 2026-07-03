# SVG Icons

Aegis includes an icon system that leverages the WordPress `core/icon` block for inline SVG rendering. Icons are lightweight, scalable, and fully customizable through the block editor.

## Overview

The icon system provides:

- Inline SVG rendering (not icon fonts) for performance and accessibility.
- Full color control via the block editor color picker.
- Scalable sizing without quality loss.
- Dark mode compatibility through `currentColor`.
- Accessible labeling with ARIA attributes.
- No external icon library dependencies.

## Using Icons

### The core/icon Block (experimental)

WordPress provides an experimental Icon block that Aegis enhances:

1. Open the block inserter (+).
2. Search for "Icon."
3. Insert the Icon block.
4. Choose an icon from the library or paste custom SVG code.
5. Configure size, color, and alignment.

### SVG Block Variation

Aegis registers an SVG block variation for inserting custom SVG markup:

1. Insert the **SVG** block from the block inserter.
2. Paste your SVG code.
3. The SVG renders inline in the editor and on the frontend.
4. Adjust size and color through block settings.

See [[block-variations]] for more about the SVG variation.

## Icon Properties

| Property | Control | Description |
|----------|---------|-------------|
| Size | Block settings | Width and height in pixels or relative units |
| Color | Color picker | Fill color (overrides inline SVG fill) |
| Alignment | Block toolbar | Left, center, right, or inline |
| Label | Advanced settings | Accessible text for screen readers |

## Color Behavior

Icons use `currentColor` by default, which means they inherit the text color of their parent element:

- In a dark-colored section, icons automatically appear in the text color.
- In dark mode, icons invert along with text.
- You can override with a specific color from the palette.

### Setting Icon Color

1. Select the icon block.
2. In the Color section of block settings, set the **Text** color.
3. The icon fill updates to match.

### Multi-Color SVGs

For SVGs with multiple colors, the individual path fills are preserved. The block color setting only applies to paths using `currentColor` or no explicit fill.

## Icon Sizing

Icons support fixed size values:

| Size | Typical Use |
|------|-------------|
| 16px | Inline with small text, metadata |
| 20px | Inline with body text |
| 24px | Standard icon size, buttons |
| 32px | Medium emphasis |
| 48px | Feature icons, card headers |
| 64px | Large decorative icons |
| 96px+ | Hero section decorations |

### Responsive Sizing

For icons that should scale with the viewport, use relative units (em or rem) or the fluid type scale tokens.

## Accessibility

### Decorative Icons

Icons that are purely decorative (next to text that already conveys the meaning):

- Set `aria-hidden="true"` on the SVG element.
- Do not add a label — the adjacent text provides context.

### Informational Icons

Icons that convey meaning without accompanying text:

- Add an accessible label in the block Advanced settings.
- The label is rendered as `aria-label` on the SVG element.
- Screen readers announce the label text.

### Icon Buttons

When an icon is used inside a button without visible text:

- The button must have an `aria-label` describing the action.
- Example: A close button with an X icon needs `aria-label="Close"`.

## Using Icons in Patterns

Many Aegis block patterns include icons for:

- Feature section icons (checkmarks, stars, arrows).
- Contact information (phone, email, location markers).
- Social media profile links.
- Navigation indicators (chevrons, hamburger menus).
- Status indicators (success, warning, error).

## Adding Custom Icons

### Paste SVG Code

1. Insert an SVG block variation.
2. Paste the SVG markup directly.
3. Ensure the SVG uses `viewBox` for proper scaling.
4. Remove hardcoded width/height attributes (let the block control sizing).
5. Replace hardcoded fill colors with `currentColor` for theme color inheritance.

### SVG Best Practices

When preparing custom SVGs for use in Aegis:

| Practice | Reason |
|----------|--------|
| Use `viewBox` | Enables proper scaling |
| Remove fixed dimensions | Block controls handle sizing |
| Use `currentColor` for fills | Enables color inheritance |
| Optimize with SVGO | Reduces file size |
| Include `role="img"` | Proper semantic role |
| Remove editor metadata | Clean output (no Illustrator/Figma data) |

### Example: Clean SVG

```svg
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
</svg>
```

## Social Icons

The WordPress Social Icons block is enhanced in Aegis with:

- Additional icon styles (filled, outlined, pill-shaped).
- Size presets matching the spacing scale.
- Color schemes that adapt to style variations.
- Hover effect options.

### Adding Social Icons

1. Insert the **Social Icons** block.
2. Click the + to add individual social icon links.
3. Enter your profile URLs.
4. Choose the icon style and size from block settings.
5. Configure colors and spacing.

## Performance

The icon system is performance-optimized:

- **Inline SVG** — No additional HTTP requests for icons.
- **No icon font** — No heavy font file downloads.
- **No sprite sheet** — Only the icons actually used are included in the page.
- **Minimal markup** — SVG code is compact and gzip-friendly.

## Next Steps

- [[block-variations]] — The SVG block variation.
- [[custom-blocks]] — Blocks that use icons internally.
- [[accessibility]] — Icon accessibility guidelines.
- [[performance]] — How inline SVGs contribute to performance.
