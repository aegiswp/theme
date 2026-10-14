# Shadows

Aegis provides a set of 8 box shadow presets that create depth and visual hierarchy. These shadow tokens are defined in `theme.json` and available for use in the block editor and custom CSS.

## Shadow Scale

The shadow scale ranges from no shadow to extra-extra-large, with increasing size and spread:

| Token | Name | Description |
|-------|------|-------------|
| `none` | None | No shadow. Used to remove inherited shadows. |
| `xxs` | 2XS | Barely visible. Subtle lift for small elements. |
| `xs` | XS | Light shadow. Cards and interactive elements at rest. |
| `sm` | SM | Small shadow. Buttons, inputs, and small cards. |
| `md` | MD | Medium shadow. Standard card elevation. |
| `lg` | LG | Large shadow. Elevated panels and dropdowns. |
| `xl` | XL | Extra large. Modal dialogs and popovers. |
| `xxl` | 2XL | Maximum elevation. Floating action elements. |

## Shadow Values

Each preset defines a multi-layer shadow for realistic depth:

| Token | CSS Value |
|-------|-----------|
| `none` | `none` |
| `xxs` | `0 1px 2px 0 rgb(0 0 0 / 0.05)` |
| `xs` | `0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1)` |
| `sm` | `0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1)` |
| `md` | `0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1)` |
| `lg` | `0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1)` |
| `xl` | `0 25px 50px -12px rgb(0 0 0 / 0.25)` |
| `xxl` | `0 35px 60px -15px rgb(0 0 0 / 0.3)` |

## Using Shadows in the Editor

### Applying a Shadow to a Block

1. Select a block that supports shadows (Group, Column, Image, Button, and others).
2. In the block settings sidebar, find the **Shadow** option under **Border** or **Styles**.
3. Click the shadow picker to see the preset options.
4. Select a shadow preset from the scale.
5. The shadow is applied immediately.

### Removing a Shadow

1. Select the block with the shadow applied.
2. Open the shadow picker.
3. Select **None** to remove the shadow.

## Common Shadow Usage

| Element | Recommended Shadow |
|---------|-------------------|
| Cards at rest | `xs` or `sm` |
| Cards on hover | `md` or `lg` |
| Buttons at rest | `xxs` or `xs` |
| Buttons on hover | `sm` |
| Dropdown menus | `lg` |
| Modal dialogs | `xl` |
| Floating elements | `xl` or `xxl` |
| Tooltips | `sm` |
| Navigation dropdowns | `md` or `lg` |

## CSS Custom Properties

Shadow tokens are available as CSS custom properties:

```css
var(--wp--preset--shadow--none)
var(--wp--preset--shadow--xxs)
var(--wp--preset--shadow--xs)
var(--wp--preset--shadow--sm)
var(--wp--preset--shadow--md)
var(--wp--preset--shadow--lg)
var(--wp--preset--shadow--xl)
var(--wp--preset--shadow--xxl)
```

### Example Usage in Custom CSS

```css
.my-custom-card {
    box-shadow: var(--wp--preset--shadow--sm);
    transition: box-shadow 0.2s ease;
}

.my-custom-card:hover {
    box-shadow: var(--wp--preset--shadow--lg);
}
```

## Theme.json Configuration

Shadows are defined in `theme.json` under `settings.shadow.presets`:

```json
{
  "settings": {
    "shadow": {
      "presets": [
        { "slug": "none", "name": "None", "shadow": "none" },
        { "slug": "xxs", "name": "2XS", "shadow": "0 1px 2px 0 rgb(0 0 0 / 0.05)" },
        { "slug": "xs", "name": "XS", "shadow": "0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1)" },
        { "slug": "sm", "name": "SM", "shadow": "0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1)" },
        { "slug": "md", "name": "MD", "shadow": "0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1)" },
        { "slug": "lg", "name": "LG", "shadow": "0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1)" },
        { "slug": "xl", "name": "XL", "shadow": "0 25px 50px -12px rgb(0 0 0 / 0.25)" },
        { "slug": "xxl", "name": "2XL", "shadow": "0 35px 60px -15px rgb(0 0 0 / 0.3)" }
      ]
    }
  }
}
```

## Shadows in Dark Mode

In dark mode, shadows behave differently because they are less visible against dark backgrounds. The shadow system uses semi-transparent black values that adapt naturally:

- On light backgrounds, shadows are clearly visible and create depth.
- On dark backgrounds, shadows are more subtle and may appear as a slightly darker area.

For enhanced visibility in dark mode, consider using higher shadow levels (one step up from what you would use in light mode).

## Design Guidelines

### Elevation Hierarchy

Use shadows consistently to establish visual hierarchy:

1. **Base level** (no shadow) — Static content, backgrounds.
2. **Low elevation** (`xxs`–`xs`) — Cards, panels, subtle containers.
3. **Medium elevation** (`sm`–`md`) — Interactive elements, hover states.
4. **High elevation** (`lg`–`xl`) — Overlays, modals, popovers.
5. **Maximum elevation** (`xxl`) — Critical floating elements.

### Transition Between States

When elements change elevation (for example, on hover), animate the transition:

```css
transition: box-shadow 0.2s ease-in-out;
```

This creates a smooth, natural feeling of the element lifting off the surface.

## Next Steps

- [[borders]] — Learn about border tokens that complement shadows.
- [[gradients]] — Explore gradient presets for additional depth.
- [[css-variables-reference]] — Full list of shadow custom properties.
