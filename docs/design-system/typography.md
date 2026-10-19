# Typography

Aegis pairs three self-hosted variable fonts with a fluid type scale of 27 sizes. Typography tokens are defined in `theme.json` and available throughout the editor and CSS.

## Font Families

| Font | Slug | Role | Weights | File |
|------|------|------|---------|------|
| **Lexend** | `lexend` | Body text | 300–900 | `assets/fonts/lexend.woff2` |
| **Lexend Deca** | `lexend-deca` | Headings | 300–900 | `assets/fonts/lexend-deca.woff2` |
| **JetBrains** (JetBrains Mono) | `jetbrains` | Code | 100–900 | `assets/fonts/` |

Each family falls back to a system stack: Lexend to `--wp--preset--font-family--sans-serif`, Lexend Deca to Lexend, and JetBrains to `--wp--preset--font-family--monospace`. The system stacks come from the framework (`aegis_system_fonts` filter).

### Font Loading Strategy

- Fonts are self-hosted in the theme (no external requests to Google Fonts).
- Each family is one variable `woff2` file.
- Font faces are declared in `theme.json` (`fontFace`).
- Every face uses `font-display: swap`, so text stays visible while fonts load.

See [[performance]] for more details on the font strategy.

## Type Scale

Font-size slugs are the pixel size: `96`, `88`, … `8`. Each size is a `clamp()` between a mobile minimum and the named maximum, so large sizes shrink on phones. `theme.json` sets `defaultFontSizes` to `false`, so the WordPress default sizes are not offered.

| Slug | Min | Max | Value | Default use |
|------|-----|-----|-------|-------------|
| `96` | 56px | 96px | `clamp(56px,calc(39.43px + 4.420vw),96px)` | Display |
| `88` | 52px | 88px | `clamp(52px,calc(37.08px + 3.978vw),88px)` | Display |
| `80` | 48px | 80px | `clamp(48px,calc(34.74px + 3.536vw),80px)` | Display |
| `72` | 44px | 72px | `clamp(44px,calc(32.40px + 3.094vw),72px)` | Display |
| `64` | 40px | 64px | `clamp(40px,calc(30.06px + 2.652vw),64px)` | Display |
| `60` | 38px | 60px | `clamp(38px,calc(28.88px + 2.431vw),60px)` |  |
| `56` | 37px | 56px | `clamp(37px,calc(29.13px + 2.099vw),56px)` |  |
| `52` | 36px | 52px | `clamp(36px,calc(29.37px + 1.768vw),52px)` |  |
| `48` | 34px | 48px | `clamp(34px,calc(28.20px + 1.547vw),48px)` |  |
| `44` | 32px | 44px | `clamp(32px,calc(27.03px + 1.326vw),44px)` | H1 |
| `42` | 31px | 42px | `clamp(31px,calc(26.44px + 1.215vw),42px)` |  |
| `40` | 30px | 40px | `clamp(30px,calc(25.86px + 1.105vw),40px)` |  |
| `36` | 28px | 36px | `clamp(28px,calc(24.69px + 0.884vw),36px)` | H2 |
| `32` | 28px | 32px | `clamp(28px,3.2vw,32px)` | H3 |
| `28` | 24px | 28px | `clamp(24px,2.8vw,28px)` | H4 |
| `24` | 22px | 24px | `clamp(22px,2.4vw,24px)` | H5 |
| `22` | 20px | 22px | `clamp(20px,2.2vw,22px)` |  |
| `20` | 19px | 20px | `clamp(19px,2vw,20px)` | H6 |
| `18` | 17px | 18px | `clamp(17px,1.8vw,18px)` |  |
| `16` | 15px | 16px | `clamp(15px,1.6vw,16px)` | Body text (root) |
| `15` | 14px | 15px | `clamp(14px,calc(13.59px + 0.110vw),15px)` |  |
| `14` | 13px | 14px | `clamp(13px,1.4vw,14px)` | Buttons, code, captions |
| `13` | 12px | 13px | `clamp(12px,calc(11.59px + 0.110vw),13px)` |  |
| `12` | 11px | 12px | `clamp(11px,1.2vw,12px)` |  |
| `11` | 10px | 11px | `clamp(10px,calc(9.59px + 0.110vw),11px)` |  |
| `10` | 9px | 10px | `clamp(9px,1vw,10px)` |  |
| `8` | 7px | 8px | `clamp(7px,0.8vw,8px)` |  |

The 56, 42, 15, 13, and 11 sizes were added in 1.0.1. The scale also includes an **Inherit** preset (`inherit`), which takes the parent's size.

### Fluid Typography Formula

Each fluid size interpolates linearly between its minimum and maximum:

```css
/* Example: the 44 size, used for H1 */
font-size: clamp(32px, calc(27.03px + 1.326vw), 44px);
```

This ensures:
- Minimum size on small viewports (mobile).
- Smooth scaling as the viewport grows.
- Maximum size on large viewports (desktop).

## Font Weights

Font weights are custom tokens (`settings.custom.fontWeight`), output as `--wp--custom--font-weight--{name}`:

| Token | Weight |
|-------|--------|
| `thin` | 100 |
| `extralight` | 200 |
| `light` | 300 |
| `normal` | 400 |
| `medium` | 500 |
| `semibold` | 600 |
| `bold` | 700 |
| `extrabold` | 800 |
| `black` | 900 |

Because all three fonts are variable, every weight in a font's range renders from the same file.

## Default Element Styling

### Body Text

- Font family: Lexend
- Size: `16`
- Weight: `normal` (400)
- Line height: 1.6
- Color: `neutral-700` on a `neutral-0` background. Dark mode remaps both tokens.

### Headings

- Font family: Lexend Deca
- Weight: `semibold` (600)
- Line height: 1.4 on the heading element. Each level then sets its own line height from the size scale.
- Color: `neutral-800`. Dark mode remaps the token.

| Level | Size | Line height |
|-------|------|-------------|
| H1 | `44` | `52` |
| H2 | `36` | `44` |
| H3 | `32` | `40` |
| H4 | `28` | `36` |
| H5 | `24` | `32` |
| H6 | `20` | `28` |

### Code

- Font family: JetBrains
- Code block (`core/code`): size `14`, weight `medium` (500), `neutral-100` background
- **Inline code** (`:not(pre) > code`): `1em` (matches surrounding text); light `neutral-100` surface; linked hover uses `neutral-200` with dark text for contrast

### Links

- Color: inherits the surrounding text color
- Text decoration: underline
- Hover and focus: `primary-500`; focus also draws a 2px `primary-500` outline with a 2px offset

### Buttons and Captions

- Buttons: size `14`, weight `semibold`, line height `20`
- Captions: size `14` (13–14px), left-aligned. Before 1.0.1 captions used `12`, which rendered at 11px on most screens.

## Using Typography in the Editor

### Setting Font Size

1. Select a text block (Paragraph, Heading, or similar).
2. In the right sidebar, find the **Typography** section.
3. Choose a size from the preset dropdown or enter a custom value.

### Setting Font Family

1. Select a text block.
2. In the Typography section, click the font family selector.
3. Choose from Lexend, Lexend Deca, or JetBrains.

### Setting Font Weight

1. Select a text block.
2. In the Typography section, click **Appearance**.
3. Select the desired weight from the dropdown.

## CSS Custom Properties

```css
/* Font families */
var(--wp--preset--font-family--lexend)
var(--wp--preset--font-family--lexend-deca)
var(--wp--preset--font-family--jetbrains)

/* Font sizes */
var(--wp--preset--font-size--96)  /* 56px–96px */
var(--wp--preset--font-size--88)  /* 52px–88px */
var(--wp--preset--font-size--80)  /* 48px–80px */
var(--wp--preset--font-size--72)  /* 44px–72px */
var(--wp--preset--font-size--64)  /* 40px–64px */
var(--wp--preset--font-size--60)  /* 38px–60px */
var(--wp--preset--font-size--56)  /* 37px–56px */
var(--wp--preset--font-size--52)  /* 36px–52px */
var(--wp--preset--font-size--48)  /* 34px–48px */
var(--wp--preset--font-size--44)  /* 32px–44px */
var(--wp--preset--font-size--42)  /* 31px–42px */
var(--wp--preset--font-size--40)  /* 30px–40px */
var(--wp--preset--font-size--36)  /* 28px–36px */
var(--wp--preset--font-size--32)  /* 28px–32px */
var(--wp--preset--font-size--28)  /* 24px–28px */
var(--wp--preset--font-size--24)  /* 22px–24px */
var(--wp--preset--font-size--22)  /* 20px–22px */
var(--wp--preset--font-size--20)  /* 19px–20px */
var(--wp--preset--font-size--18)  /* 17px–18px */
var(--wp--preset--font-size--16)  /* 15px–16px */
var(--wp--preset--font-size--15)  /* 14px–15px */
var(--wp--preset--font-size--14)  /* 13px–14px */
var(--wp--preset--font-size--13)  /* 12px–13px */
var(--wp--preset--font-size--12)  /* 11px–12px */
var(--wp--preset--font-size--11)  /* 10px–11px */
var(--wp--preset--font-size--10)  /* 9px–10px */
var(--wp--preset--font-size--8)  /* 7px–8px */
var(--wp--preset--font-size--inherit)

/* Font weights */
var(--wp--custom--font-weight--normal)    /* 400 */
var(--wp--custom--font-weight--semibold)  /* 600 */
```

In block markup, a preset size is written as `"fontSize":"24"`, which adds the class `has-24-font-size`.

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
