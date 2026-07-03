# Spacing

Aegis uses a consistent spacing scale with 11 steps, based on the Tailwind CSS v3 spacing system. These tokens ensure visual consistency across all components, patterns, and layouts.

## Spacing Scale

The spacing scale ranges from 4px to 96px:

| Token | Value | Pixels | Typical Usage |
|-------|-------|--------|---------------|
| `xxxs` | 0.25rem | 4px | Tight inline gaps, icon spacing |
| `xxs` | 0.5rem | 8px | Compact element spacing |
| `xs` | 0.75rem | 12px | Small internal padding |
| `sm` | 1rem | 16px | Default padding, small gaps |
| `md` | 1.5rem | 24px | Medium section padding |
| `lg` | 2rem | 32px | Large internal spacing |
| `xl` | 2.5rem | 40px | Section gaps |
| `2xl` | 3rem | 48px | Large section spacing |
| `3xl` | 4rem | 64px | Major section divisions |
| `4xl` | 5rem | 80px | Large layout spacing |
| `xxl` | 6rem | 96px | Maximum section separation |

## Using Spacing in the Editor

### Block Spacing (Gap)

Block spacing controls the vertical distance between blocks within a container:

1. Select a Group, Column, or other container block.
2. In the block settings sidebar, find **Dimensions**.
3. Adjust **Block spacing** using the preset scale or a custom value.

### Padding

Padding adds internal space between a block boundary and its content:

1. Select any block.
2. In the block settings, find **Dimensions → Padding**.
3. Use the linked or individual controls for top, right, bottom, and left padding.
4. Select from the preset scale or enter a custom value.

### Margin

Margin adds external space around a block:

1. Select any block.
2. In the block settings, find **Dimensions → Margin**.
3. Adjust top and bottom margins (horizontal margins are controlled by alignment).

## Spacing in Theme.json

The spacing scale is defined in `theme.json` under `settings.spacing.spacingSizes`:

```json
{
  "settings": {
    "spacing": {
      "spacingSizes": [
        { "slug": "xxxs", "size": "0.25rem", "name": "3XS" },
        { "slug": "xxs", "size": "0.5rem", "name": "2XS" },
        { "slug": "xs", "size": "0.75rem", "name": "XS" },
        { "slug": "sm", "size": "1rem", "name": "SM" },
        { "slug": "md", "size": "1.5rem", "name": "MD" },
        { "slug": "lg", "size": "2rem", "name": "LG" },
        { "slug": "xl", "size": "2.5rem", "name": "XL" },
        { "slug": "2xl", "size": "3rem", "name": "2XL" },
        { "slug": "3xl", "size": "4rem", "name": "3XL" },
        { "slug": "4xl", "size": "5rem", "name": "4XL" },
        { "slug": "xxl", "size": "6rem", "name": "XXL" }
      ]
    }
  }
}
```

## CSS Custom Properties

Spacing tokens are available as CSS custom properties:

```css
var(--wp--preset--spacing--xxxs)   /* 0.25rem (4px) */
var(--wp--preset--spacing--xxs)    /* 0.5rem (8px) */
var(--wp--preset--spacing--xs)     /* 0.75rem (12px) */
var(--wp--preset--spacing--sm)     /* 1rem (16px) */
var(--wp--preset--spacing--md)     /* 1.5rem (24px) */
var(--wp--preset--spacing--lg)     /* 2rem (32px) */
var(--wp--preset--spacing--xl)     /* 2.5rem (40px) */
var(--wp--preset--spacing--2-xl)   /* 3rem (48px) */
var(--wp--preset--spacing--3-xl)   /* 4rem (64px) */
var(--wp--preset--spacing--4-xl)   /* 5rem (80px) */
var(--wp--preset--spacing--xxl)    /* 6rem (96px) */
```

## Spacing Guidelines

### Section Spacing

For vertical spacing between major page sections:

| Context | Recommended Token |
|---------|-------------------|
| Between hero and first section | `3xl` to `xxl` |
| Between content sections | `2xl` to `3xl` |
| Between related sub-sections | `xl` to `2xl` |
| Between heading and content | `sm` to `md` |

### Component Internal Spacing

For padding within components like cards, callouts, and containers:

| Context | Recommended Token |
|---------|-------------------|
| Card padding | `md` to `lg` |
| Button padding (horizontal) | `md` |
| Button padding (vertical) | `xs` to `sm` |
| Input field padding | `xs` to `sm` |
| List item gap | `xs` to `sm` |

### Inline Spacing

For horizontal gaps between inline elements:

| Context | Recommended Token |
|---------|-------------------|
| Icon to text gap | `xxs` to `xs` |
| Between buttons | `sm` |
| Grid column gap | `md` to `lg` |
| Navigation item gap | `sm` to `md` |

## Global Spacing Settings

To configure site-wide spacing defaults:

1. Open the Site Editor (**Appearance → Editor**).
2. Click the **Styles** icon.
3. Navigate to **Layout**.
4. Adjust **Padding** (space between content and viewport edges).
5. Adjust **Block spacing** (default gap between blocks).
6. Save your changes.

## Responsive Behavior

The spacing scale uses fixed `rem` values, which means spacing remains consistent relative to the root font size. On smaller viewports, you may want to reduce spacing for specific sections:

- Use smaller spacing tokens for mobile layouts.
- The editor allows different padding values per side, enabling asymmetric spacing.
- Container blocks can have responsive padding set through the interface.

## Next Steps

- [[layout]] — Learn about content width and layout settings.
- [[typography]] — See how spacing relates to the type scale.
- [[css-variables-reference]] — Full list of spacing custom properties.
- [[global-styles]] — Configure spacing through Global Styles.
