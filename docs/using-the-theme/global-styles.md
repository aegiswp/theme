# Global Styles

Global Styles is the system that controls your site-wide design settings in the WordPress Site Editor. Through Global Styles, you can customize typography, colors, spacing, and layout at the global level or per-block type.

## Accessing Global Styles

1. Navigate to **Appearance → Editor** to open the Site Editor.
2. Click the **Styles** icon (half-filled circle) in the top-right toolbar.
3. The Styles panel opens on the right side.

## Styles Panel Overview

The Global Styles panel contains the following sections:

| Section | What It Controls |
|---------|-----------------|
| Browse styles | Style variation selector |
| Typography | Font families, sizes, weights, line heights |
| Colors | Palette, backgrounds, text, links, buttons |
| Layout | Content width, padding, block gap |
| Blocks | Per-block type style overrides |

## Typography Settings

### Global Typography

Configure site-wide text settings:

1. Click **Typography** in the Styles panel.
2. Choose an element to configure:
   - **Text** — Body text defaults.
   - **Links** — Link appearance and hover states.
   - **Headings** — All heading levels (H1–H6).
   - **Captions** — Image and block captions.
   - **Buttons** — Button text styling.

### Available Typography Options

| Option | Description |
|--------|-------------|
| Font family | Choose from Lexend (body), Lexend Deca (headings), or JetBrains Mono (code). |
| Size | Select from the fluid type scale (8px to 96px with `clamp()`). |
| Appearance | Font weight (thin through black) and style (normal or italic). |
| Line height | Relative line height value. |
| Letter spacing | Additional space between characters. |
| Text decoration | Underline, strikethrough, or none. |
| Text transform | Uppercase, lowercase, capitalize, or none. |

See [[typography]] for the full type scale and font details.

## Color Settings

### Palette

Aegis provides a comprehensive color palette based on the Tailwind CSS v3 scale:

- **Primary (Zinc)** — 25 through 950 shades.
- **Neutral** — 0 through 950 shades.
- **Success (Green)** — 50 through 950 shades.
- **Warning (Orange)** — 50 through 950 shades.
- **Error (Red)** — 50 through 950 shades.

See [[color-palette]] for the complete color reference.

### Color Elements

Configure colors for specific elements:

| Element | What It Affects |
|---------|----------------|
| Background | Page and section backgrounds |
| Text | Default body text color |
| Links | Anchor text color and hover state |
| Headings | Heading text color (H1–H6) |
| Captions | Caption text color |
| Buttons | Button background and text color |

### Custom Colors

To add a custom color:

1. In the Colors section, click **Palette**.
2. Switch to the **Custom** tab.
3. Click the **+** button to add a new color.
4. Use the color picker or enter a hex/RGB value.
5. Name the color for easy reference.

## Layout Settings

Configure content dimensions and spacing:

| Setting | Default | Description |
|---------|---------|-------------|
| Content size | 720px (max) | Maximum width for standard content. |
| Wide size | 1620px (max) | Maximum width for wide-aligned blocks. |
| Padding | Based on spacing scale | Space between content and viewport edges. |
| Block spacing | Based on spacing scale | Vertical gap between blocks. |

See [[layout]] for detailed layout configuration.

## Per-Block Styling

Global Styles allows you to set default styles for specific block types:

1. In the Styles panel, scroll to the **Blocks** section.
2. Click **Blocks** or search for a specific block type.
3. Configure typography, colors, dimensions, and spacing for that block.
4. These settings become the default for all instances of that block type.

### Example: Styling All Buttons

1. Navigate to **Styles → Blocks → Button**.
2. Set the background color, text color, border radius, and padding.
3. Save — all Button blocks across your site will use these defaults.

Individual blocks can still override these defaults through their own block settings.

## Exporting and Importing Styles

### Exporting Your Styles

The Site Editor does not provide a direct export button, but your style customizations are stored in the database as a `wp_global_styles` custom post type. You can export them by:

1. Copying the relevant portions of your customized `theme.json` structure.
2. Using the WordPress REST API to retrieve the global styles object.

### Resetting Styles

To clear all style customizations and return to the theme defaults:

1. Open the Styles panel.
2. Click the **Options** menu (three dots at the top).
3. Select **Reset to defaults**.
4. Confirm the action.

This removes all your custom overrides but does not change which style variation is active.

## Styles and Theme.json

Global Styles in the editor correspond directly to the `theme.json` configuration:

- **Settings** define what options are available (which fonts, which colors, which sizes).
- **Styles** define the default values applied to elements and blocks.

When you make changes in the Styles panel, WordPress stores them as overrides on top of the `theme.json` file shipped with Aegis. The original file is never modified.

## Tips for Working with Global Styles

- **Start with a style variation** that is close to your desired design, then fine-tune individual settings.
- **Use the per-block section** to maintain consistency across all instances of a block type.
- **Test on multiple templates** to ensure your style changes look correct on posts, pages, and archives.
- **Save regularly** — the Styles panel requires an explicit save action.

## Next Steps

- [[style-variations]] — Choose a style variation as your starting point.
- [[color-palette]] — Understand the full color system.
- [[typography]] — Explore the type scale and font options.
- [[spacing]] — Learn about the spacing scale.
- [[dark-mode]] — Configure dark mode styling.
