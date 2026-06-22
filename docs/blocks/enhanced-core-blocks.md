# Enhanced Core Blocks

Aegis enhances 37 WordPress core blocks with additional styling, configuration options, and design system integration. These enhancements are applied automatically — you do not need to install anything extra.

## How Enhancements Work

Aegis applies enhancements to core blocks through:

- **theme.json styling** — Default colors, typography, spacing, and border settings for each block.
- **Block styles** — Additional style variations registered for specific blocks.
- **Block supports** — Enabling additional WordPress block features (like border, shadow, and spacing) where core has not enabled them by default.
- **Custom CSS** — Targeted styles for improved design and responsiveness.

No core block functionality is removed or broken. All enhancements are additive.

## Enhanced Blocks

The following 37 core blocks receive enhancements in Aegis:

### Text Blocks

| Block | Enhancements |
|-------|-------------|
| Paragraph | Fluid font sizes, lead text style, drop cap styling |
| Heading | Fluid responsive sizing, extended weight options, gradient text support |
| List | Custom bullet/number styling, spacing controls, icon list style |
| Quote | Multiple visual styles (bordered, large, minimal), citation styling |
| Pullquote | Accent border styling, typography presets |
| Preformatted | Code font, background styling, border radius |
| Code | Syntax-aware styling, dark background, scrollable overflow |
| Verse | Monospace styling, subtle background |

### Media Blocks

| Block | Enhancements |
|-------|-------------|
| Image | Shadow options, border radius, hover effects, aspect ratio presets |
| Gallery | Gap controls, rounded styles, hover overlay effects |
| Cover | Gradient overlay presets, minimum height options, parallax improvements |
| Media & Text | Responsive stacking improvements, gap controls |
| Video | Aspect ratio options, rounded corners, shadow |

### Layout Blocks

| Block | Enhancements |
|-------|-------------|
| Group | Shadow presets, border styles, background patterns, multiple layout types |
| Columns | Responsive breakpoint improvements, vertical alignment, gap presets |
| Column | Individual padding, background, and border support |
| Row | Extended alignment and wrapping controls |
| Stack | Gap presets, responsive spacing |
| Separator | Color options, width variations (short, medium, wide), thickness control |
| Spacer | Preset height options matching the spacing scale |

### Navigation Blocks

| Block | Enhancements |
|-------|-------------|
| Navigation | Mobile menu styling, hamburger variants, submenu animations |
| Navigation Link | Active state styling, icon support |
| Site Logo | Size presets, border radius, dark mode inversion |
| Site Title | Typography presets, link styling |

### Widget Blocks

| Block | Enhancements |
|-------|-------------|
| Search | Expanded styling options, button variants, icon toggle |
| Social Icons | Color schemes, hover effects, size presets |
| Post Title | Fluid typography, gradient text support |
| Post Excerpt | Line clamp options, read-more styling |
| Post Featured Image | Aspect ratio, shadow, border radius, hover effects |
| Post Date | Icon prefix, relative date formatting |
| Post Terms | Chip/badge styling, separator options |
| Post Author | Avatar styling, layout options |
| Post Navigation Link | Arrow styling, card layout option |

### Dynamic Blocks

| Block | Enhancements |
|-------|-------------|
| Query Loop | Grid layout options, masonry style, load more styling |
| Pagination | Styled number navigation, accessible landmarks |
| Comments | Thread styling, alternating backgrounds, avatar sizes |
| Table | Responsive horizontal scroll, striped rows, border options |

## Block Styles

Many enhanced blocks register additional style variations. Block styles appear in the **Styles** panel when you select a block:

### Example: Quote Block Styles

| Style | Description |
|-------|-------------|
| Default | Standard blockquote with left border accent |
| Large | Oversized quote marks with larger text |
| Minimal | No border, subtle indentation only |
| Bordered | Full border wrap with padding |

### Example: Separator Block Styles

| Style | Description |
|-------|-------------|
| Default | Full width thin line |
| Wide | Wider than content, thinner line |
| Dots | Three centered dots |
| Short | Centered short accent line |

## Global Block Styling

Aegis applies consistent styling across all enhanced blocks through `theme.json`:

- All blocks use the design system spacing tokens for margin and padding.
- Colors, typography, and shadows inherit from Global Styles.
- Blocks automatically adapt to style variations and dark mode.

### Per-Block Global Styles

You can override the default styling of any block type:

1. Open the Site Editor (**Appearance → Editor**).
2. Click the **Styles** icon.
3. Navigate to **Blocks**.
4. Search for or select a specific block type.
5. Adjust colors, typography, dimensions, and border settings.
6. Save — all instances of that block type will update.

## Block Supports

Aegis enables additional block supports that WordPress core does not enable by default for some blocks:

| Support | Description | Blocks Affected |
|---------|-------------|----------------|
| Border | Border width, color, radius | Group, Column, Image |
| Shadow | Box shadow presets | Group, Column, Button, Image |
| Spacing | Margin and padding controls | Most layout blocks |
| Typography | Extended font size and family | All text blocks |
| Color | Background, text, link colors | Most blocks |

## Responsive Behavior

All enhanced blocks include responsive improvements:

- **Columns** collapse to a single column on narrow viewports.
- **Navigation** switches to a mobile hamburger menu below a configurable breakpoint.
- **Media & Text** stacks vertically on mobile.
- **Table** becomes horizontally scrollable on small screens.
- **Gallery** adjusts column count based on available width.

## Accessibility

Enhanced blocks maintain or improve accessibility:

- Focus indicators remain visible on all interactive blocks.
- ARIA attributes are preserved and enhanced where appropriate.
- Color contrast meets WCAG 2.1 AA requirements.
- Keyboard navigation works correctly across all enhancements.
- Screen reader announcements are not altered.

## Next Steps

- [[custom-blocks]] — Learn about blocks built specifically for Aegis.
- [[block-variations]] — Explore custom variations of core blocks.
- [[global-styles]] — Configure default block styling site-wide.
- [[css-variables-reference]] — Reference design tokens used in block styles.
