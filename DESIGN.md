# Aegis Design System

Aegis implements a token-based design system modelled on the Tailwind CSS v3 scale. All tokens live in `theme.json` and are consumed as WordPress CSS custom properties (`--wp--preset--*` and `--wp--custom--*`). No design values are hardcoded in patterns or stylesheets — always reference a token.

---

## Colour Palette

The palette is organised into semantic groups. Each group follows the Tailwind numeric step scale: **50 → 100 → 200 → 300 → 400 → 500 → 600 → 700 → 800 → 900 → 950**. Lower numbers are lighter; higher numbers are darker.

### Primary — Tailwind Zinc

Used for branded UI elements, interactive controls, and the default text/surface hierarchy.

| Slug | Hex | Tailwind ref |
|------|-----|-------------|
| `primary-25` | `#fcfcfd` | — (extension) |
| `primary-50` | `#fafafa` | Zinc 50 |
| `primary-100` | `#f4f4f5` | Zinc 100 |
| `primary-200` | `#e4e4e7` | Zinc 200 |
| `primary-300` | `#d4d4d8` | Zinc 300 |
| `primary-400` | `#a1a1aa` | Zinc 400 |
| `primary-500` | `#71717a` | Zinc 500 |
| `primary-600` | `#52525b` | Zinc 600 |
| `primary-700` | `#3f3f46` | Zinc 700 |
| `primary-800` | `#27272a` | Zinc 800 |
| `primary-900` | `#18181b` | Zinc 900 |
| `primary-950` | `#09090b` | Zinc 950 |

### Neutral — Tailwind Neutral

Pure grays with no hue tint. Used for body text, borders, backgrounds, and surfaces.

| Slug | Hex | Tailwind ref |
|------|-----|-------------|
| `neutral-0` | `#ffffff` | — (white extension) |
| `neutral-50` | `#fafafa` | Neutral 50 |
| `neutral-100` | `#f5f5f5` | Neutral 100 |
| `neutral-200` | `#e5e5e5` | Neutral 200 |
| `neutral-300` | `#d4d4d4` | Neutral 300 |
| `neutral-400` | `#a3a3a3` | Neutral 400 |
| `neutral-500` | `#737373` | Neutral 500 |
| `neutral-600` | `#525252` | Neutral 600 |
| `neutral-700` | `#404040` | Neutral 700 |
| `neutral-800` | `#262626` | Neutral 800 |
| `neutral-900` | `#171717` | Neutral 900 |
| `neutral-950` | `#0a0a0a` | Neutral 950 |

### Success — Tailwind Green

Positive feedback states: confirmations, availability, valid inputs.

| Slug | Hex | Tailwind ref |
|------|-----|-------------|
| `success-50` | `#f0fdf4` | Green 50 |
| `success-100` | `#dcfce7` | Green 100 |
| `success-200` | `#bbf7d0` | Green 200 |
| `success-300` | `#86efac` | Green 300 |
| `success-400` | `#4ade80` | Green 400 |
| `success-500` | `#22c55e` | Green 500 |
| `success-600` | `#16a34a` | Green 600 |
| `success-700` | `#15803d` | Green 700 |
| `success-800` | `#166534` | Green 800 |
| `success-900` | `#14532d` | Green 900 |
| `success-950` | `#052e16` | Green 950 |

### Warning — Tailwind Orange

Caution states: non-blocking alerts, pending actions, low-stock notices.

| Slug | Hex | Tailwind ref |
|------|-----|-------------|
| `warning-50` | `#fff7ed` | Orange 50 |
| `warning-100` | `#ffedd5` | Orange 100 |
| `warning-200` | `#fed7aa` | Orange 200 |
| `warning-300` | `#fdba74` | Orange 300 |
| `warning-400` | `#fb923c` | Orange 400 |
| `warning-500` | `#f97316` | Orange 500 |
| `warning-600` | `#ea580c` | Orange 600 |
| `warning-700` | `#c2410c` | Orange 700 |
| `warning-800` | `#9a3412` | Orange 800 |
| `warning-900` | `#7c2d12` | Orange 900 |
| `warning-950` | `#431407` | Orange 950 |

### Error — Tailwind Red

Destructive and error states: validation failures, deletions, critical alerts.

| Slug | Hex | Tailwind ref |
|------|-----|-------------|
| `error-50` | `#fef2f2` | Red 50 |
| `error-100` | `#fee2e2` | Red 100 |
| `error-200` | `#fecaca` | Red 200 |
| `error-300` | `#fca5a5` | Red 300 |
| `error-400` | `#f87171` | Red 400 |
| `error-500` | `#ef4444` | Red 500 |
| `error-600` | `#dc2626` | Red 600 |
| `error-700` | `#b91c1c` | Red 700 |
| `error-800` | `#991b1b` | Red 800 |
| `error-900` | `#7f1d1d` | Red 900 |
| `error-950` | `#450a0a` | Red 950 |

### Utility Colours

Special-purpose tokens with no numeric step.

| Slug | Value | Use |
|------|-------|-----|
| `transparent` | `transparent` | Backgrounds, borders |
| `current` | `currentcolor` | Icon fills inheriting text colour |
| `inherit` | `inherit` | Explicit cascade inheritance |
| `shadow` | `rgba(107,114,128,0.07)` | Box-shadow colour token |

---

## CSS Variable Reference

WordPress generates CSS custom properties from `theme.json` slugs using the pattern:

```
--wp--preset--color--{slug}       → colour palette
--wp--preset--spacing--{slug}     → spacing scale
--wp--preset--font-size--{slug}   → type scale
--wp--preset--shadow--{slug}      → shadow presets
--wp--custom--{key}--{subkey}     → custom tokens
```

In block markup, reference colours with `var:preset|color|{slug}` and in PHP/HTML with `var(--wp--preset--color--{slug})`.

---

## Typography

### Font Families

| Slug | Family | Use |
|------|--------|-----|
| `lexend` | Lexend | Body text (default) |
| `lexend-deca` | Lexend Deca | Headings |
| `jetbrains` | JetBrains Mono | Code, pre |

All fonts are self-hosted from `assets/fonts/` with `font-display: swap`.

### Type Scale

All sizes use `clamp(min, vw, max)` for fluid scaling. Slugs are the **pixel value at max viewport**.

| Slug | Max | Min | CSS variable |
|------|-----|-----|-------------|
| `8` | 8px | 7px | `--wp--preset--font-size--8` |
| `10` | 10px | 9px | `--wp--preset--font-size--10` |
| `12` | 12px | 11px | `--wp--preset--font-size--12` |
| `14` | 14px | 13px | `--wp--preset--font-size--14` |
| `16` | 16px | 15px | `--wp--preset--font-size--16` |
| `18` | 18px | 17px | `--wp--preset--font-size--18` |
| `20` | 20px | 19px | `--wp--preset--font-size--20` |
| `22` | 22px | 20px | `--wp--preset--font-size--22` |
| `24` | 24px | 22px | `--wp--preset--font-size--24` |
| `28` | 28px | 24px | `--wp--preset--font-size--28` |
| `32` | 32px | 28px | `--wp--preset--font-size--32` |
| `36` | 36px | 32px | `--wp--preset--font-size--36` |
| `40` | 40px | 36px | `--wp--preset--font-size--40` |
| `44` | 44px | 40px | `--wp--preset--font-size--44` |
| `48` | 48px | 40px | `--wp--preset--font-size--48` |
| `52` | 52px | 44px | `--wp--preset--font-size--52` |
| `60` | 60px | 48px | `--wp--preset--font-size--60` |
| `64` | 64px | 52px | `--wp--preset--font-size--64` |
| `72` | 72px | 56px | `--wp--preset--font-size--72` |
| `80` | 80px | 64px | `--wp--preset--font-size--80` |
| `88` | 88px | 72px | `--wp--preset--font-size--88` |
| `96` | 96px | 80px | `--wp--preset--font-size--96` |

### Font Weights

Matches Tailwind naming exactly (all lowercase).

| Key | Value | CSS variable |
|-----|-------|-------------|
| `thin` | 100 | `--wp--custom--font-weight--thin` |
| `extralight` | 200 | `--wp--custom--font-weight--extralight` |
| `light` | 300 | `--wp--custom--font-weight--light` |
| `normal` | 400 | `--wp--custom--font-weight--normal` |
| `medium` | 500 | `--wp--custom--font-weight--medium` |
| `semibold` | 600 | `--wp--custom--font-weight--semibold` |
| `bold` | 700 | `--wp--custom--font-weight--bold` |
| `extrabold` | 800 | `--wp--custom--font-weight--extrabold` |
| `black` | 900 | `--wp--custom--font-weight--black` |

---

## Spacing Scale

Based on Tailwind's 4px base unit. All values are fixed pixels (not coupled to font-size tokens). Slugs follow a T-shirt naming convention.

| Slug | Size | Tailwind equivalent |
|------|------|-------------------|
| `xxxs` | 4px | `1` (4px) |
| `xxs` | 8px | `2` (8px) |
| `2xs` | 12px | `3` (12px) |
| `xs` | 16px | `4` (16px) |
| `sm` | 24px | `6` (24px) |
| `md` | 32px | `8` (32px) |
| `ml` | 40px | `10` (40px) |
| `lg` | 48px | `12` (48px) |
| `xl` | 64px | `16` (64px) |
| `xll` | 80px | `20` (80px) |
| `xxl` | 96px | `24` (96px) |

CSS variable pattern: `--wp--preset--spacing--{slug}`

---

## Shadow Scale

All shadows use `--wp--custom--box-shadow--color` which resolves to the `shadow` palette entry (`rgba(107,114,128,0.07)`).

| Slug | CSS variable |
|------|-------------|
| `none` | `--wp--preset--shadow--none` |
| `xxs` | `--wp--preset--shadow--xxs` |
| `xs` | `--wp--preset--shadow--xs` |
| `sm` | `--wp--preset--shadow--sm` |
| `md` | `--wp--preset--shadow--md` |
| `lg` | `--wp--preset--shadow--lg` |
| `xl` | `--wp--preset--shadow--xl` |
| `xxl` | `--wp--preset--shadow--xxl` |

---

## Border Tokens

Defined under `settings.custom.border`. Referenced as `--wp--custom--border--{property}`.

| Token | Value | CSS variable |
|-------|-------|-------------|
| Width | `1px` | `--wp--custom--border--width` |
| Style | `solid` | `--wp--custom--border--style` |
| Colour | `var(--wp--preset--color--neutral-200)` | `--wp--custom--border--color` |
| Radius | `6px` | `--wp--custom--border--radius` |

---

## Layout

| Property | Value |
|----------|-------|
| Content width | `min(calc(100dvw - var(--wp--preset--spacing--lg) * 2), 720px)` |
| Wide width | `min(calc(100dvw - var(--wp--preset--spacing--lg) * 2), 1620px)` |

---

## Conventions

- **Never hardcode hex values in patterns.** Use `var:preset|color|{slug}` in block markup.
- **Never hardcode px values for spacing.** Use `var:preset|spacing|{slug}`.
- **Dark mode** is toggled by adding `is-style-dark` / `is-style-light` to `document.body`. Style variations should override the token values for the dark context.
- **No default WordPress assets.** `defaultPalette`, `defaultGradients`, `defaultDuotone`, and `defaultFontSizes` are all `false`. Do not re-enable them.
- **Pattern slugs must be namespaced** with the `aegis/` prefix (e.g. `aegis/hero-split`).
