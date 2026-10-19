# Spacing

Aegis uses one spacing scale with 11 steps, defined in `theme.json` under `settings.spacing.spacingSizes`. The four smallest steps are fixed. The seven larger steps are fluid: each is a `clamp()` that grows from a mobile minimum to the named size as the viewport widens.

## Spacing Scale

| Slug | Editor name | Value | Range |
|------|-------------|-------|-------|
| `xxxs` | XXXS (4px) | `4px` | Fixed |
| `xxs` | XXS (8px) | `8px` | Fixed |
| `2xs` | 2XS (12px) | `12px` | Fixed |
| `xs` | XS (16px) | `16px` | Fixed |
| `sm` | S (24px) | `clamp(20px,calc(18.34px + 0.442vw),24px)` | 20–24px |
| `md` | M (32px) | `clamp(24px,calc(20.69px + 0.884vw),32px)` | 24–32px |
| `ml` | ML (40px) | `clamp(24px,calc(17.37px + 1.768vw),40px)` | 24–40px |
| `lg` | L (48px) | `clamp(24px,calc(14.06px + 2.652vw),48px)` | 24–48px |
| `xl` | XL (64px) | `clamp(40px,calc(30.06px + 2.652vw),64px)` | 40–64px |
| `xll` | XLL (80px) | `clamp(48px,calc(34.74px + 3.536vw),80px)` | 48–80px |
| `xxl` | XXL (96px) | `clamp(56px,calc(39.43px + 4.420vw),96px)` | 56–96px |

There are no `2xl`, `3xl`, or `4xl` slugs. Older copies of these docs listed them by mistake.

The editor names show the largest value of each fluid step. On a phone, `lg` is 24px, not 48px.

## Global Defaults

| Setting | Value |
|---------|-------|
| Block gap (`styles.spacing.blockGap`) | `var(--wp--preset--spacing--sm)` |
| Root padding, left and right (`styles.spacing.padding`) | `var(--wp--preset--spacing--lg)` |
| Spacing units | `%`, `em`, `px`, `rem`, `vh`, `vw` |
| Custom spacing sizes | On |
| Generated spacing scale (`spacingScale`) | Off (`steps: 0`) |

The layout widths in `theme.json` also subtract the `lg` step on both sides. See [[layout]].

## Using Spacing in the Editor

### Block Spacing (Gap)

Block spacing controls the distance between blocks within a container:

1. Select a Group, Columns, or other container block.
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

## Spacing in theme.json

An excerpt of the definition:

```json
{
  "settings": {
    "spacing": {
      "spacingSizes": [
        { "name": "XXXS (4px)", "slug": "xxxs", "size": "4px" },
        { "name": "XXS (8px)", "slug": "xxs", "size": "8px" },
        { "name": "2XS (12px)", "slug": "2xs", "size": "12px" },
        { "name": "XS (16px)", "slug": "xs", "size": "16px" },
        { "name": "S (24px)", "slug": "sm", "size": "clamp(20px,calc(18.34px + 0.442vw),24px)" },
        { "name": "M (32px)", "slug": "md", "size": "clamp(24px,calc(20.69px + 0.884vw),32px)" }
      ]
    }
  }
}
```

The full list is in `theme.json`.

## CSS Custom Properties

WordPress turns each slug into a preset variable. A slug that starts with a digit gets a hyphen, so `2xs` becomes `2-xs`.

```css
var(--wp--preset--spacing--xxxs)  /* 4px */
var(--wp--preset--spacing--xxs)   /* 8px */
var(--wp--preset--spacing--2-xs)  /* 12px */
var(--wp--preset--spacing--xs)    /* 16px */
var(--wp--preset--spacing--sm)    /* 20–24px */
var(--wp--preset--spacing--md)    /* 24–32px */
var(--wp--preset--spacing--ml)    /* 24–40px */
var(--wp--preset--spacing--lg)    /* 24–48px */
var(--wp--preset--spacing--xl)    /* 40–64px */
var(--wp--preset--spacing--xll)   /* 48–80px */
var(--wp--preset--spacing--xxl)   /* 56–96px */
```

In block markup, use the preset reference form: `"var:preset|spacing|md"`.

The framework also exposes `--wp--custom--spacing--gap`, which is `var(--wp--style--block-gap)`.

## Spacing Guidelines

### Section Spacing

| Context | Recommended Slug |
|---------|------------------|
| Between hero and first section | `xll` to `xxl` |
| Between content sections | `xl` to `xll` |
| Between related sub-sections | `lg` to `xl` |
| Between heading and content | `xs` to `sm` |

### Component Internal Spacing

| Context | Recommended Slug |
|---------|------------------|
| Card padding | `sm` to `md` |
| Input field padding | `2xs` to `xs` |
| List item gap | `xxs` to `2xs` |

Buttons use fixed padding from `styles.elements.button` (10px by 16px), not a spacing preset.

### Inline Spacing

| Context | Recommended Slug |
|---------|------------------|
| Icon to text gap | `xxs` to `2xs` |
| Between buttons | `xs` |
| Grid column gap | `sm` to `md` |
| Navigation item gap | `xs` to `sm` |

## Global Spacing Settings

To configure site-wide spacing defaults:

1. Open the Site Editor (**Appearance → Editor**).
2. Click the **Styles** icon.
3. Navigate to **Layout**.
4. Adjust **Padding** (space between content and viewport edges).
5. Adjust **Block spacing** (default gap between blocks).
6. Save your changes.

## Responsive Behavior

Because `sm` through `xxl` are fluid, section spacing shrinks on small screens without extra CSS. The fixed steps (`xxxs` to `xs`) stay the same size at every width, which keeps small gaps and icon spacing predictable.

- Use the fluid steps for section padding and large gaps.
- Use the fixed steps for tight inline spacing.
- The editor allows different padding values per side, enabling asymmetric spacing.

## Next Steps

- [[layout]] — Learn about content width and layout settings.
- [[typography]] — See how spacing relates to the type scale.
- [[css-variables-reference]] — Full list of spacing custom properties.
- [[global-styles]] — Configure spacing through Global Styles.
