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
| Related Posts | `core/query` | A Query Loop preset filtered to related content. |
| SVG | `core/group` | A container for inline SVG markup. |

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

### Base Block

`core/group` with CSS animation and cloned content.

### Features

- Continuous horizontal scroll animation.
- Configurable speed and direction.
- Pause on hover option.
- Content duplicated for seamless loop.
- Accessible — can be paused, respects `prefers-reduced-motion`.

### Usage

1. Insert the **Marquee** block.
2. Add content (logos, text, images, or any blocks).
3. Set the scroll speed and direction.
4. Enable or disable pause on hover.

### Common Use Cases

- Client logo bars
- News ticker strips
- Decorative text banners
- Testimonial scrollers

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

## Related Posts (Query Variation)

A Query Loop variation preconfigured to display posts related to the current content.

### Base Block

`core/query` with taxonomy-based filtering.

### Features

- Automatic filtering by shared categories and tags.
- Configurable post count.
- Excludes the current post.
- Grid or list layout.
- All Query Loop display options available.

### Usage

1. Insert the **Related Posts** query variation.
2. The block automatically queries related content.
3. Configure the number of posts and layout.
4. Customize the post template (title, excerpt, thumbnail).

> **Note:** This is distinct from the `aegis/related-posts` custom block, which uses its own rendering logic. The query variation leverages core Query Loop infrastructure.

## SVG

A container for inserting inline SVG markup directly into the editor.

### Base Block

`core/group` with SVG content support.

### Features

- Paste or write SVG markup directly.
- SVG rendered inline (not as an image) for CSS styling.
- Color inheritance from parent text color.
- Size controls (width, height).
- Accessible `role` and `aria-label` attributes.

### Usage

1. Insert the **SVG** block.
2. Paste your SVG code into the content area.
3. Adjust dimensions in block settings.
4. Colors can be controlled via the parent block color settings if the SVG uses `currentColor`.

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
