# Custom Blocks

The Aegis **theme** registers custom blocks from `src/Blocks/`. Map and Modal blocks require the [Aegis companion plugin](../../plugins/aegis/docs/blocks/custom-blocks.md). Pro adds [tabs, image compare, and block sub-features](../../plugins/aegis-pro/docs/features/pro-blocks.md).

Block feature toggles are at **Aegis → Blocks** when the plugin is active.

## Theme-Registered Blocks

| Block | Namespace | Description |
|-------|-----------|-------------|
| Countdown | `aegis/countdown` | Animated countdown timer to a target date. |
| Slider | `aegis/slider` | A carousel container for sliding content. |
| Slide | `aegis/slide` | An individual slide within a Slider block. |
| Toggle | `aegis/toggle` | An expandable/collapsible content wrapper. |
| Toggle Content | `aegis/toggle-content` | The content area within a Toggle block. |
| Video | `aegis/video` | Enhanced video embed with performance optimizations. |
| Related Posts | `aegis/related-posts` | Displays posts related to the current content. |

## Plugin Blocks

| Block | Namespace | Documentation |
|-------|-----------|---------------|
| Map | `aegis/map` | [Plugin — Custom Blocks](../../plugins/aegis/docs/blocks/custom-blocks.md) |
| Modal | `aegis/modal` | [Plugin — Modals](../../plugins/aegis/docs/blocks/modals.md) |

> **Note:** Map and Modal require the free Aegis Plugin. Theme blocks work without the plugin when using the Aegis theme.

## Countdown

The Countdown block displays an animated timer counting down to a specified date and time.

### Features

- Configurable target date and time.
- Displays days, hours, minutes, and seconds.
- Customizable labels for each unit.
- Animated digit transitions.
- Expiry message when the countdown reaches zero.
- Responsive layout adapts to available space.

### Usage

1. Insert the **Countdown** block from the block inserter.
2. Set the **Target date** in the block settings sidebar.
3. Optionally customize unit labels (for example, "Days" vs "D").
4. Set an expiry message that displays after the countdown ends.
5. Style with color, typography, and spacing controls.

### Common Use Cases

- Product launch countdowns
- Event start timers
- Sale or promotion deadlines
- Limited-time offers

## Slider

The Slider block creates a horizontal carousel that cycles through its child Slide blocks.

### Features

- Automatic and manual slide advancement.
- Configurable autoplay interval.
- Navigation arrows and dot indicators.
- Swipe support on touch devices.
- Infinite loop option.
- Accessible keyboard navigation.
- Customizable transition effects.

### Usage

1. Insert the **Slider** block.
2. Add **Slide** blocks inside it (one per slide).
3. Build each slide content using any combination of blocks.
4. Configure slider options in the block settings:
   - Autoplay on/off and interval.
   - Show/hide navigation arrows.
   - Show/hide dot indicators.
   - Loop behavior.

## Slide

The Slide block is a container for individual slide content within a Slider block.

### Features

- Full block editor support for slide content.
- Background color and image settings.
- Overlay options for text readability.
- Alignment and sizing controls.

### Usage

Slide blocks can only be inserted as direct children of a Slider block. Each Slide can contain any arrangement of blocks — text, images, buttons, and more.

## Toggle

The Toggle block creates expandable and collapsible content sections, commonly known as accordions.

### Features

- Click-to-expand interaction.
- Customizable toggle header text and styling.
- Animated open/close transitions.
- Multiple toggles can be used together for FAQ-style layouts.
- Option for exclusive behavior (only one open at a time) when used in a group.
- Accessible ARIA attributes for screen readers.

### Usage

1. Insert the **Toggle** block.
2. Enter the toggle header text (the always-visible clickable area).
3. Add content blocks inside the **Toggle Content** area.
4. Configure whether the toggle starts open or closed.
5. Repeat for additional toggle items.

### Common Use Cases

- FAQ sections
- Expandable documentation
- Product specification details
- Collapsible navigation sections

## Toggle Content

The Toggle Content block is the expandable area within a Toggle block. It contains the content that is shown or hidden when the toggle header is clicked.

This block is automatically inserted as part of a Toggle block and cannot be used independently.

## Video

The Video block provides an enhanced video embedding experience with performance optimizations.

### Features

- Lazy loading (video does not load until interaction).
- Facade/thumbnail display before playback (reduces page weight).
- Support for self-hosted videos and external sources.
- Customizable poster/thumbnail image.
- Play button overlay styling.
- Responsive aspect ratio handling.
- Accessible playback controls.

### Usage

1. Insert the **Video** block.
2. Enter the video URL or upload a video file.
3. Set a poster image (thumbnail displayed before playback).
4. Configure playback options (autoplay, loop, muted, controls).
5. The block displays a lightweight facade until the visitor clicks play.

### Performance Benefits

The Video block uses a facade pattern that:

- Displays a static image instead of loading the full video player.
- Only initializes the video player when the visitor clicks play.
- Eliminates multiple HTTP requests for video player scripts on page load.

## Related Posts

The Related Posts block dynamically displays posts related to the current content based on shared categories and tags.

### Features

- Automatic relevance matching via taxonomy relationships.
- Configurable number of posts to display.
- Layout options (grid, list, or cards).
- Customizable post information display (title, excerpt, date, thumbnail).
- Fallback behavior when no related posts exist.
- Excludes the current post from results.

### Usage

1. Insert the **Related Posts** block (typically in a single post template).
2. Configure the number of posts to display.
3. Choose the layout style.
4. Select which post metadata to show.
5. Set fallback content for when no related posts are found.

## Map and Modal (Plugin)

Map (`aegis/map`) and Modal (`aegis/modal`) are registered by the **Aegis companion plugin**, not the theme. See:

- [Plugin — Custom Blocks](../../plugins/aegis/docs/blocks/custom-blocks.md)
- [Plugin — Modals tab](../../plugins/aegis/docs/blocks/modals.md)

## Block Dependencies

| Block | Requires |
|-------|----------|
| Countdown | Aegis theme only |
| Slider / Slide | Aegis theme only |
| Toggle / Toggle Content | Aegis theme only |
| Video | Aegis theme only |
| Related Posts | Aegis theme only |
| Map | Aegis Plugin (free) |
| Modal | Aegis Plugin (free) |

## Next Steps

- [[enhanced-core-blocks]] — Framework core block enhancements.
- [[block-variations]] — Framework block variations.
- [[block-patterns]] — Pre-built layouts using these blocks.
- [Map and Modal (Plugin)](../../plugins/aegis/docs/blocks/custom-blocks.md)
- [Conditional Logic (Plugin)](../../plugins/aegis/docs/features/conditional-logic.md)
