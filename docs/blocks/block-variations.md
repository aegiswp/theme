# Block Variations

The Aegis **framework** (`vendor/aegis/framework`) registers block variations that extend WordPress core blocks. Variations appear as distinct entries in the block inserter.

When the **Aegis plugin** is active, enable or disable variations and sub-features at **Aegis → Blocks**. See [Plugin Block Variations](../../plugins/aegis/docs/blocks/block-variations.md).

## Understanding Block Variations

A block variation is a preconfigured version of an existing block with specific attributes, inner blocks, or settings preset. They leverage core block infrastructure with framework-provided JavaScript and CSS.

## Available Variations

| Variation | Base Block | Description |
|-----------|-----------|-------------|
| Accordion List | `core/list` | An expandable list where items collapse and expand. |
| Counter | `core/paragraph` | An animated number counter that counts up on scroll. |
| Curved Text | `core/paragraph` | Text rendered along a curved SVG path. |
| Grid | `core/group` | A CSS Grid container with configurable columns. |
| Marquee | `core/group` | Continuously scrolling horizontal content. |
| Newsletter | `core/search` | Search form styled as an email signup (`is-style-newsletter`). |
| SVG | `core/image` | Inline SVG markup on an Image block (`is-style-svg`). Decorative icons use `core/icon` instead — see [[svg-icons]]. |

> **Related posts:** Use the **`aegis/related-posts`** theme block (see [[custom-blocks]]). The former `core/query` Related Posts variation was removed. For advanced related-post querying on Query Loop, enable **`aegisProRelatedPosts`** on `core/query` with [Aegis Pro](../../plugins/aegis-pro/docs/features/query-loop-pro.md).

## Accordion List

An interactive list where each item can be expanded to reveal additional content.

### Base Block

`core/list` with the `is-style-accordion` class. The style is registered once in PHP (`AccordionList::register_style()`), gated by **Aegis → Blocks → Accordion**. Other list styles (`checklist`, `dash`, and so on) stay on `BlockStyles`.

### Features

- Click any list item to expand its content.
- Smooth animated open/close transitions.
- Optional exclusive mode (only one item open at a time).
- Full styling control via List block settings.
- Accessible ARIA expanded/collapsed states.

### Usage

1. Insert the **Accordion List** block from the inserter.
2. Add list items with your heading text.
3. Each item expands to show content below it.
4. Configure behavior in block settings (exclusive mode, initial state).

### Comparison with Toggle Block

| Feature | Accordion List | Toggle Block |
|---------|---------------|--------------|
| Structure | List items as expand/collapse | Two inner views + switcher control |
| Content flexibility | Text-focused list | Any blocks in each view |
| Best for | FAQ sections | Pricing monthly/yearly, compare plans, before/after |

## Counter

An animated number that counts up from zero to a target value when the element scrolls into view.

### Base Block

`core/paragraph` with custom attributes and intersection observer script.

### Features

- Configurable target number.
- Animated counting effect triggered on scroll.
- Customizable duration and easing.
- Optional prefix and suffix (for example, "$" or "%").
- Thousand separator formatting.
- Only animates once (first time visible).

### Usage

1. Insert the **Counter** block.
2. Enter the target number.
3. Optionally set a prefix (such as "$") or suffix (such as "+").
4. Configure the animation duration.
5. Style using standard Paragraph block controls.

### Common Use Cases

- Statistics sections ("10,000+ customers")
- Achievement highlights ("99% uptime")
- Pricing displays ("$49/month")

## Curved Text

Text rendered along a circular or curved SVG path for decorative headings and badges.

### Base Block

`core/paragraph` with SVG path rendering.

### Features

- Text follows a configurable arc.
- Adjustable curve radius and direction.
- Repeating text option for full circles.
- Font size and family controls.
- Responsive sizing.
- Accessible — original text remains in the DOM for screen readers.

### Usage

1. Insert the **Curved Text** block.
2. Enter your text content.
3. Adjust the curve radius and direction in block settings.
4. Style with color and typography controls.

## Grid

A CSS Grid container that arranges child blocks into a configurable grid layout.

### Base Block

`core/group` with grid layout attributes.

### Features

- Configurable column count (1–6).
- Configurable minimum column width for auto-fit behavior.
- Gap control using the spacing scale.
- Items automatically flow into the grid.
- Responsive — columns reduce on smaller viewports.

### Usage

1. Insert the **Grid** block.
2. Add child blocks (cards, images, or any content).
3. Configure columns count or minimum width.
4. Adjust gap spacing.
5. Items fill the grid automatically.

### Grid vs Columns

| Feature | Grid | Columns |
|---------|------|---------|
| Equal height items | Yes (automatic) | Manual |
| Auto-flowing content | Yes | No (fixed structure) |
| Dynamic item count | Yes | Fixed at creation |
| Best for | Card layouts, galleries | Fixed multi-column sections |

## Marquee

A continuously scrolling horizontal band of content that loops infinitely.

Enable extras at **Aegis → Blocks → Marquee**. See [Plugin Marquee](../../plugins/aegis/docs/blocks/marquee.md).

### Base Block

`core/group` with CSS animation and cloned content (`layout.orientation` is `marquee`). Not the Slider block’s `type: marquee` option.

### Features

- Continuous horizontal scroll animation (CSS only; no frontend Marquee JS).
- Speed (loop duration in seconds; lower is faster), direction, pause on hover, and repeat clones — each gated by a Blocks extra.
- Pro: separate **Desktop** duration from **Mobile** (**Responsive Speed**, from 782px wide).
- Fade edges via the `fade-horizontal` utility (always available while Marquee is on).
- Accessible — pause on hover when that extra is on; frontend respects `prefers-reduced-motion`.

### Usage

1. Enable Marquee at **Aegis → Blocks → Marquee**.
2. Insert the **Marquee** block (Group variation).
3. Add content (logos, text, images, or any blocks).
4. Set loop duration, direction, repeats, pause, and fade edges in **Marquee Settings**.

When Marquee is off, the variation is hidden from the inserter and `is-marquee` is stripped so saved blocks render as ordinary Groups.

### Common Use Cases

- Client logo bars
- News ticker strips
- Decorative text banners
- Testimonial scrollers

Theme **Feature Banner** (`patterns/cta/banner.php`) is a scrolling announcement. Pro **Feature Icon Boxes** uses two logo marquees.

## Newsletter

A Search block variation that turns the search form into an email signup field.

Enable extras at **Aegis → Blocks → Newsletter**. See [Plugin Newsletter](../../plugins/aegis/docs/blocks/newsletter.md).

### Base Block

`core/search` with `className` `is-style-newsletter`. The style is registered once in PHP (`Newsletter::register_style()`), gated by Newsletter extras. Not a Group pattern and not the Modal Newsletter starter.

### Features

- Strips search `action` / `method` so submit does not run a site search.
- **Signup** fields (a submit button, or `no-button` with an email-like saved placeholder) are required. Decorative no-button skins (name, phone) are not.
- Email validation (`type="email"`), success message, and custom placeholder — each gated by a Blocks extra. Success and `aegis-newsletter-submit` run only on signup fields.
- Dispatches `aegis-newsletter-submit` with the email so a mailing-list plugin or snippet can subscribe the visitor.
- Search icon is omitted on the frontend while Newsletter is on.

### Usage

1. Enable Newsletter extras at **Aegis → Blocks → Newsletter**.
2. Insert the **Newsletter** block (Search variation) or apply the Newsletter style to Search.
3. Set button text (default **Subscribe**) and, with Custom Placeholder on, the email placeholder.
4. Listen for `aegis-newsletter-submit` or replace the block with a form plugin when you need a real list API.

When Newsletter is off, the variation is hidden from the inserter and `is-style-newsletter` is stripped so saved blocks render as ordinary Search forms (search icon included).

Theme **Newsletter CTA** / **Commerce Newsletter** use this variation. The **Newsletter** pattern category (banner, inline, split) is Group + Button marketing CTAs, not this Search variation.

### Common Use Cases

- Footer or sidebar email capture
- Blog page signup (theme Blog pattern)
- Store newsletter CTA with a discount line

## SVG

An Image block variation for inserting inline SVG markup (logos, wordmarks, illustrations). For library glyphs, use the WordPress **Icon** block (`core/icon`) instead — see [[svg-icons]]. Media Library `.svg` uploads are **Aegis → Settings**, not this section.

### Base Block

`core/image` with the `is-style-svg` class (inserter name **SVG**). The style is registered once in PHP (`Svg::register_style()`).

There is no parent SVG toggle. Enabling any extra at **Aegis → Blocks → SVG** implies the variation. Without the plugin, all extras behave as on.

| Extra | Inspector / render | Off fallback |
|-------|--------------------|--------------|
| `svg_markup` | Implies the variation (paste markup stays available on saved blocks) | Variation hidden from the inserter when no SVG extra is on |
| `svg_mask` | Preview mask (CSS mask / `currentColor`) | Inline `<svg>` instead of a mask |
| `svg_onclick` | Image onclick kept on the inlined SVG or mask span | onclick not copied after the `img` is removed |
| `svg_inline` | Rich-text **Inline SVG** format in paragraphs | Format hidden; CSS-masked `has-inline-svg` images stay as images |
| `svg_inline_file` | Inline `.svg` files on Image, Button, Site Logo, Featured Image | `img src="*.svg"` stays an image |

Saved `is-style-svg` blocks still inline on the front end when the variation is implied off, so theme patterns (logo clouds, home brand marks) keep working.

### Features

- Paste SVG markup on the Image block (administrators only; capability is checked with `manage_options`, not an empty `roles` array). The inspector is `svg-editor.js`. There is no Optimize SVG / SVGOMG control.
- An empty SVG variation shows the Aegis image placeholder and a hint to paste markup in **SVG Settings**. That glyph is preview-only (not saved in `svgString`). Do not store an empty `data:image/svg+xml` URL. Placeholder CSS loads on any template that outputs `is-placeholder`.
- SVG rendered inline (not as a raster) unless Mask Mode is on.
- Independent width and height (not square like `core/icon`). Aegis stores these as `style.width.all` / `style.height.all`; the variation reads those when inlining. Per-breakpoint Image size vars apply to the figure after the SVG is inlined.
- Color inheritance from parent text color when the SVG uses `currentColor` or Mask Mode.
- Skipped by Image lightbox.

### Usage

1. Enable at least one extra at **Aegis → Blocks → SVG** (Paste Markup is enough).
2. Insert the **SVG** variation (Image block).
3. Paste SVG markup in **SVG Settings**.
4. Adjust width and height in block settings.
5. Optionally enable Mask Mode so the glyph follows text color.

## Inserting Variations

Block variations appear in the block inserter alongside regular blocks:

1. Open the block inserter (+).
2. Search for the variation name (for example, "Counter" or "Marquee").
3. Click to insert.

Some variations also appear under their parent block in the inserter hierarchy.

## Next Steps

- [[custom-blocks]] — Theme custom blocks.
- [[enhanced-core-blocks]] — Framework core block enhancements.
- [[block-patterns]] — Pre-built layouts using variations.
- [Block variation toggles (Plugin)](../../plugins/aegis/docs/blocks/block-variations.md)
- [Plugin Newsletter](../../plugins/aegis/docs/blocks/newsletter.md)
- [[svg-icons]] — Using SVGs with the icon system.
