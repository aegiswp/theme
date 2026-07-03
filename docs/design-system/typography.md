# Typography

Aegis uses a carefully curated set of font families paired with a fluid type scale that adapts to viewport size. Typography tokens are defined in `theme.json` and available throughout the editor and CSS.

## Font Families

Aegis ships with three font families, each serving a specific role:

| Font | Role | Description |
|------|------|-------------|
| **Lexend** | Body text | A variable font designed for improved reading proficiency. Clean, modern sans-serif. |
| **Lexend Deca** | Headings | A geometric variant of Lexend with subtle character for display usage. |
| **JetBrains Mono** | Code | A monospace font optimized for code readability with ligature support. |

### Font Loading Strategy

Aegis uses a performance-optimized font loading approach:

- Fonts are self-hosted in the theme (no external requests to Google Fonts).
- Variable font files reduce the number of HTTP requests.
- Font files are loaded via `theme.json` font face declarations.
- The `font-display: swap` strategy prevents invisible text during loading.

See [[performance]] for more details on the font strategy.

## Type Scale

The type scale uses `clamp()` for fluid responsive sizing. Text smoothly scales between a minimum and maximum size based on the viewport width.

| Token | Min Size | Preferred | Max Size | Typical Usage |
|-------|----------|-----------|----------|---------------|
| `3xs` | 8px | — | 8px | Fine print, labels |
| `2xs` | 10px | — | 10px | Captions, small labels |
| `xs` | 12px | — | 12px | Small text, metadata |
| `sm` | 14px | — | 14px | Secondary text |
| `md` | 16px | — | 16px | Body text (base) |
| `lg` | 18px | clamp() | 20px | Large body, lead text |
| `xl` | 20px | clamp() | 24px | H6, small headings |
| `2xl` | 24px | clamp() | 30px | H5 |
| `3xl` | 30px | clamp() | 36px | H4 |
| `4xl` | 36px | clamp() | 48px | H3 |
| `5xl` | 48px | clamp() | 60px | H2 |
| `6xl` | 60px | clamp() | 72px | H1 |
| `7xl` | 72px | clamp() | 96px | Display headings |

### Fluid Typography Formula

Each fluid size uses a `clamp()` value that scales proportionally between breakpoints:

```css
/* Example: 4xl size */
font-size: clamp(2.25rem, 2rem + 1.25vw, 3rem);
```

This ensures:
- Minimum size on small viewports (mobile).
- Smooth scaling as the viewport grows.
- Maximum size on large viewports (desktop).

## Font Weights

All font weights are available as design tokens:

| Token | Weight | Name |
|-------|--------|------|
| `thin` | 100 | Thin |
| `extralight` | 200 | Extra Light |
| `light` | 300 | Light |
| `normal` | 400 | Normal (Regular) |
| `medium` | 500 | Medium |
| `semibold` | 600 | Semi Bold |
| `bold` | 700 | Bold |
| `extrabold` | 800 | Extra Bold |
| `black` | 900 | Black |

Because Lexend and Lexend Deca are variable fonts, all weights render smoothly without requiring separate font files for each weight.

## Default Element Styling

### Body Text

- Font family: Lexend
- Size: `md` (16px base)
- Weight: Normal (400)
- Line height: 1.6
- Color: `neutral-700` (light mode) / `neutral-200` (dark mode)

### Headings

- Font family: Lexend Deca
- Weight: Bold (700)
- Line height: 1.2
- Color: `neutral-900` (light mode) / `neutral-50` (dark mode)

| Level | Default Size Token |
|-------|-------------------|
| H1 | `6xl` |
| H2 | `5xl` |
| H3 | `4xl` |
| H4 | `3xl` |
| H5 | `2xl` |
| H6 | `xl` |

### Code

- Font family: JetBrains Mono
- Size: `sm` (14px)
- Weight: Normal (400)
- Used in: Code blocks, inline code, preformatted text

### Links

- Color: Inherits primary accent color
- Text decoration: Underline
- Hover: Color shift, decoration may change per style variation

## Using Typography in the Editor

### Setting Font Size

1. Select a text block (Paragraph, Heading, or similar).
2. In the right sidebar, find the **Typography** section.
3. Choose a size from the preset dropdown or enter a custom value.

### Setting Font Family

1. Select a text block.
2. In the Typography section, click the font family selector.
3. Choose from Lexend, Lexend Deca, or JetBrains Mono.

### Setting Font Weight

1. Select a text block.
2. In the Typography section, click **Appearance**.
3. Select the desired weight from the dropdown.

## CSS Custom Properties

Typography tokens are available as CSS custom properties:

```css
/* Font families */
var(--wp--preset--font-family--lexend)
var(--wp--preset--font-family--lexend-deca)
var(--wp--preset--font-family--jetbrains-mono)

/* Font sizes */
var(--wp--preset--font-size--3-xs)
var(--wp--preset--font-size--2-xs)
var(--wp--preset--font-size--xs)
var(--wp--preset--font-size--sm)
var(--wp--preset--font-size--md)
var(--wp--preset--font-size--lg)
var(--wp--preset--font-size--xl)
var(--wp--preset--font-size--2-xl)
var(--wp--preset--font-size--3-xl)
var(--wp--preset--font-size--4-xl)
var(--wp--preset--font-size--5-xl)
var(--wp--preset--font-size--6-xl)
var(--wp--preset--font-size--7-xl)
```

## Global Typography Customization

To change typography settings site-wide:

1. Open the Site Editor (**Appearance → Editor**).
2. Click the **Styles** icon.
3. Navigate to **Typography**.
4. Configure settings for Text, Links, Headings, Captions, and Buttons.
5. Save your changes.

See [[global-styles]] for more customization details.

## Next Steps

- [[color-palette]] — Understand the color system.
- [[spacing]] — Learn about the spacing scale.
- [[global-styles]] — Customize typography through Global Styles.
- [[css-variables-reference]] — Complete list of typography custom properties.
