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
| Newsletter | `core/group` | Pre-configured email signup section. |
| SVG | `core/image` | Inline SVG markup on an Image block (`is-style-svg`). Decorative icons use `core/icon` instead — see [[svg-icons]]. |

> **Related posts:** Use the **`aegis/related-posts`** theme block (see [[custom-blocks]]). The former `core/query` Related Posts variation was removed. For advanced related-post querying on Query Loop, enable **`aegisProRelatedPosts`** on `core/query` with [Aegis Pro](../../plugins/aegis-pro/docs/features/query-loop-pro.md).

## Accordion List

An interactive list where each item can be expanded to reveal additional content.

### Base Block

`core/list` with custom attributes and JavaScript interaction.

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
| Structure | List-based | Container-based |
| Content flexibility | Text-focused | Any blocks |
| Best for | Simple FAQ items | Complex expandable sections |

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
- Speed, direction, pause on hover, and repeat clones — each gated by a Blocks extra.
- Pro: separate desktop duration (**Responsive Speed**).
- Fade edges via the `fade-horizontal` utility (always available while Marquee is on).
- Accessible — pause on hover when that extra is on; respects `prefers-reduced-motion`.

### Usage

1. Enable Marquee at **Aegis → Blocks → Marquee**.
2. Insert the **Marquee** block (Group variation).
3. Add content (logos, text, images, or any blocks).
4. Set speed, direction, repeats, pause, and fade edges in **Marquee Settings**.

When Marquee is off, the variation is hidden from the inserter and saved marquees render as ordinary Groups.

### Common Use Cases

- Client logo bars
- News ticker strips
- Decorative text banners
- Testimonial scrollers

Theme **Feature Banner** (`patterns/cta/banner.php`) is a scrolling announcement. Pro **Feature Icon Boxes** uses two logo marquees.

## Newsletter

A pre-configured email signup section with input field, submit button, and supporting text.

### Base Block

`core/group` with pre-arranged inner blocks.

### Features

- Ready-to-use email signup layout.
- Integrates with form plugins (Fluent Forms, or custom endpoints).
- Customizable heading, description, and button text.
- Responsive layout (stacks on mobile).
- Style variation support.

### Usage

1. Insert the **Newsletter** block.
2. Customize the heading and description text.
3. Configure the form action (connect to your email service).
4. Style using Group block controls.

## SVG

An Image block variation for inserting inline SVG markup. For library glyphs, use the WordPress **Icon** block (`core/icon`) instead of this variation — see [[svg-icons]].

### Base Block

`core/image` with the `is-style-svg` style.

### Features

- Paste or write SVG markup on the Image block.
- SVG rendered inline (not as a raster image) for CSS styling.
- Color inheritance from parent text color when the SVG uses `currentColor`.
- Size controls (width, height).
- Accessible `role` and `aria-label` attributes.

### Usage

1. Insert the **SVG** variation (Image block).
2. Paste your SVG code into the content area.
3. Adjust dimensions in block settings.
4. Colors follow the parent text color when the SVG uses `currentColor`.

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
- [[svg-icons]] — Using SVGs with the icon system.
