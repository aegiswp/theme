# Enhanced Core Blocks

The Aegis **framework** (`vendor/aegis/framework`) enhances 37 WordPress core blocks with additional styling, configuration options, and design system integration. Enhancements apply automatically when the theme is active.

## How Enhancements Work

The framework applies enhancements through:

- **theme.json styling** — Default colors, typography, spacing, and border settings for each block.
- **Block styles** — Additional style variations registered for specific blocks.
- **Block supports** — Enabling additional WordPress block features (like border, shadow, and spacing) where core has not enabled them by default.
- **Custom CSS** — Targeted styles for improved design and responsiveness.

No core block functionality is removed or broken. All enhancements are additive.

## Enhanced Blocks

Each block below has a class in `vendor/aegis/framework/src/CoreBlocks/` that filters its front-end output (`render_block_core/{name}`). That folder also holds `IconBlockAttributes.php` (extra attributes for Icon) and `ImageLightbox.php` (lightbox extras for Image), which are helpers, not separate blocks. Blocks not listed here, such as Gallery, Media & Text, Table, Pullquote, or Separator, have no framework class. They get at most `theme.json` styling and block styles.

### Text Blocks

| Block | Enhancements |
|-------|-------------|
| Paragraph | Ensures the `wp-block-paragraph` class, applies custom margin and padding, and fixes malformed URLs |
| Heading | Custom spacing, a unique `id` for anchor links, and better heading text on search results pages |
| List | Flexbox layout controls, custom spacing, and a URL formatting fix. Block styles add checklists, dashes, and more (see below) |
| Code | Applies the block's margin settings to the `<pre>` element. Copy-to-clipboard control |
| Details | Custom expand and collapse icons, custom padding, and a script for smooth open and close animation |
| Shortcode | Runs shortcodes in the block and strips the stray `<p>` tags WordPress adds |

### Media Blocks

| Block | Enhancements |
|-------|-------------|
| Image | Shadow options, border radius, hover effects, aspect ratio presets. Lightbox overlay follows light/dark (or the Site Editor background). Expand-on-click trigger sits on the image, not the full-width figure. Image captions stay on the figure, not the overlay. The former Image Icon variation was removed — use `core/icon`. Extra lightbox features are gated at **Aegis → Blocks → Lightbox** — see [Lightbox](../features/image-lightbox.md). The same Aspect Ratio / Height / Object Fit / Object Position inspector also applies to Pro `aegis/image-compare` (`render_block_aegis/image-compare`; height uses CSS custom properties on the wrapper) |
| Icon | WordPress Icon library (`core/{name}`) plus Aegis collections (`social/{name}`, Pro sets). Custom SVG, gradients, gallery, and `currentColor` for dark mode — see [[svg-icons]] |
| Cover | Fallback placeholder image, custom padding, and z-index control through a CSS custom property |
| Audio | Styled as a card in `theme.json`: Neutral 100 background, the theme border radius, and `xs` inner padding. The player fills the card and can shrink below core's 300px minimum, so it fits narrow columns and phones. The caption sits inside the card at caption size, without the default caption padding. Overrides that need more than `theme.json` live in `vendor/aegis/framework/public/css/core-blocks/audio.css`, which loads only when an Audio block is on the page (and in the editor). Margin and padding are adjustable per block under **Dimensions** |
| Video | Moves the background color to a custom property and loads the Aegis video player assets once per request — see [[core-video]] for plugin and Pro enhancements |

### Layout Blocks

| Block | Enhancements |
|-------|-------------|
| Group | `minHeight`, custom spacing, and accessibility handling when the HTML tag is `<main>` |
| Columns | Custom margin, an `is-stacked-on-mobile` or `is-not-stacked-on-mobile` class, and the column count as a data attribute |
| Buttons | Custom margin and padding on the button group wrapper |
| Button | Custom icons, responsive controls, CSS transforms, button text repair, and URL fixes |
| Spacer | Merges margin settings and drops the fixed width when a responsive width is set |
| Template Part | Applies color settings to the part wrapper and fires the `aegis_before_{slug}` and `aegis_after_{slug}` hooks (see [[hook-patterns]]). Skip links are left untouched |

### Navigation Blocks

| Block | Enhancements |
|-------|-------------|
| Navigation | Overlay menu styles, CSS filters, dynamic submenu border CSS from `theme.json`, and accessibility fixes in the markup |
| Navigation Submenu | Converts color and spacing settings into CSS custom properties on the submenu list. Supports multi-column mega menus |
| Page List | Applies the block gap as a CSS custom property |
| Search | Input and button styling, shadow presets, custom box shadows, and the CSS search toggle |
| Social Links | Replaces inline hex colors with the matching palette variables, so icons follow style variations and dark mode |
| Social Link | Renders icons from the Aegis social icon set |
| Table of Contents | Rebuilds the list from the page title and in-content headings, applies block gap, and detects sidebar placement |

### Post and Query Blocks

| Block | Enhancements |
|-------|-------------|
| Post Title | Uses the posts page title on the blog index and sets a heading `id` from the anchor or text |
| Post Content | Custom spacing, an optional content limit, and the `aegis_before_content` / `aegis_after_content` hooks |
| Post Excerpt | Visibility on singular pages, Read More link handling, length limits, and custom styling. Adds excerpt support to pages |
| Post Featured Image | Box shadows, CSS transforms, and CSS filters for normal and hover states |
| Post Date | Applies custom margin to the wrapper |
| Post Terms | Can rebuild the list to show all terms of a taxonomy, and styles terms as badges |
| Post Author | Custom border and spacing; the name wrapper becomes a `<span>` |
| Post Comments Form | Configurable title heading tag (`aegis_comments_form_title_tag`) and the context `core/comments` needs |
| Post Template | Grid or flex layout and spacing for each Query Loop item |
| Query | Responsive columns, gaps, featured-first, equal-height, no-results — gated at **Aegis → Blocks → Query Loop**. See [Plugin Query Loop](../../../../plugins/aegis/docs/blocks/query-loop.md). |
| Query Pagination | Merges margin, padding, and border radius into the pagination `<nav>` |
| Query Title | Renders the posts page title on the blog index (and a placeholder in the editor) when WordPress outputs none |
| Calendar | Moves color classes from the `<table>` to the wrapper so padding and margins display |
| Tag Cloud | Enforces a minimum font size from the block's size settings |

## Block Styles

The framework registers these styles (`vendor/aegis/framework/src/DesignSystem/BlockStyles.php`). They appear in the **Styles** panel when you select a block:

| Block | Styles |
|-------|--------|
| Archive Title | Sub-heading |
| Buttons | Surface |
| Button | Ghost |
| Code | Surface, Light, Dark |
| Columns | Surface, Light, Dark |
| Column | Surface, Light, Dark |
| Comment Author Name | Heading |
| Details | Heading (summary) |
| Group | Surface, Light, Dark |
| List | Checklist, Check outline, Check circle, Square, List heading, Dash, None |
| List Item | Surface |
| Navigation | Heading |
| Page List | None |
| Paragraph | Sub-heading, Notice, Heading |
| Post Author Name | Heading |
| Post Terms | List, Sub-heading, Badges |
| Post Title | Sub-heading |
| Query Pagination | Badges |
| Read More | Button |
| Site Title | Heading |
| Spacer | Angle, Curve, Round, Wave, Fade |
| Tag Cloud | Badges |
| Quote | Surface |

Quote gets only the Surface style.

The framework also **removes** some core styles: Rounded and Default from Image and Site Logo, and **Wide and Dots from Separator**. Separator keeps only its default style.

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

`theme.json` turns on appearance tools, border controls (color, radius, style, width), link color, custom spacing sizes, and custom duotones and gradients for every block. Per-block defaults (colors, typography, spacing, borders) for 35 core blocks live under `styles.blocks` in `theme.json`. The framework inspector controls (animation, box shadow, filters, transforms, responsive visibility, and more) are documented in [[introduction-inventory]].

## Responsive Behavior

Responsive improvements in the enhanced blocks:

- **Columns** collapse to a single column on narrow viewports unless stacking is turned off (`is-not-stacked-on-mobile`).
- **Navigation** switches to its overlay menu on small screens, using one of the Aegis overlay styles (Slide-in, Slide-in Left, Fullscreen, Scroll).

### Core Responsive States and Aegis Breakpoints

WordPress Core responsive style states (viewport-specific spacing, color, typography, and related supports in the Site Editor) apply to blocks that use standard block supports. Aegis continues to provide complementary controls Core does not fully replace:

| Concern | Handled by |
|---------|------------|
| Per-viewport styles on standard supports | Core responsive style states |
| Show/hide by viewport (`aegis-hide-mobile`, and related) | Aegis visibility |
| Display, order, and width per device | Aegis Display panel |
| Landscape / tablet editor breakpoints | Aegis responsive breakpoint UI |
| Query column counts per breakpoint | Aegis Query layout |

Keep both systems. Prefer Core for ordinary style changes; use Aegis for visibility, layout, and query column behavior. If editor preview controls look duplicated after a WordPress update, see [[common-issues]].

### Breadcrumbs

`core/breadcrumbs` receives theme.json styles and the `breadcrumbs.css` stylesheet (also applied when `.rank-math-breadcrumb`, `.seopress-breadcrumbs`, `#breadcrumbs`, or `.yoast-breadcrumbs` markup is present; separators styled via Rank Math `.separator` and SEOPress `.breadcrumb-sep`; Yoast current crumb via `.breadcrumb_last` without a forced flex wrapper). WooCommerce Store Breadcrumbs (`woocommerce/breadcrumbs`) use `woocommerce-breadcrumbs.css` and wrap the delimiter in `.aegis-breadcrumb-separator`, same as classic Woo breadcrumbs. See [[woocommerce-integration#breadcrumbs]] and [SEO Schema Delegation](../../../../plugins/aegis/docs/features/seo-schema-delegation.md).

## Accessibility

Enhanced blocks maintain or improve the theme’s accessibility-ready foundation:

- Focus indicators remain visible on interactive blocks (`:focus` / `:focus-visible`, including breadcrumbs and post meta links).
- ARIA attributes are preserved and enhanced where appropriate.
- Default color tokens target WCAG 2.2 AA contrast; custom colors still need verification.
- Keyboard navigation works across enhancements.
- Screen reader announcements are not altered.

See [[accessibility]] for landmarks, skip links, and content-author responsibilities.

## Next Steps

- [[custom-blocks]] — Learn about blocks built specifically for Aegis.
- [[block-variations]] — Explore custom variations of core blocks.
- [[global-styles]] — Configure default block styling site-wide.
- [[css-variables-reference]] — Reference design tokens used in block styles.
