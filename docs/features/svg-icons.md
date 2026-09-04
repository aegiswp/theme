# SVG Icons

Aegis uses the WordPress **Icon** block (`core/icon`) for decorative SVGs. Custom collections register on the Core Icon library (WordPress 7.1+). Icons inherit theme colors through `currentColor`, including dark mode.

There is no Image Icon variation. Do not insert an Image block and style it as an icon.

## Overview

- Inline SVG (not icon fonts) for performance and accessibility.
- WordPress Core ships the `core` collection. Aegis registers additional collections and skips icons Core already provides.
- Icon IDs are `{collection}/{name}` — for example `core/home` or `social/facebook`.
- Hardcoded black fills are rewritten to `currentColor` so icons follow text color and dark/light mode.
- Button and tab icons (`iconSet` / `iconName` on `core/button` and `aegis/tab`) are separate from the Icon block and still work as before.

## Using the Icon Block

1. Open the block inserter (+).
2. Search for **Icon**.
3. Insert the Icon block.
4. Choose an icon from the library, or paste custom SVG in **Custom SVG**.
5. Set size, text color, alignment, and (optionally) a link.

WordPress 7.1+ lists Aegis collections beside Core icons in the native picker. On WordPress 7.0, Aegis merges custom sets into the editor via REST when **REST API Endpoint** is enabled at **Aegis → Blocks → Icon**.

### Custom SVG on the Icon Block

When **Custom SVG** is enabled at **Aegis → Blocks**:

1. Select an Icon block.
2. Open **Custom SVG** in the sidebar.
3. Paste SVG markup. That markup overrides the selected library icon.

Prefer `viewBox` and `fill="currentColor"`. Remove fixed width/height so the block can size the glyph.

### SVG Image Variation

The **SVG** variation is still an Image block (`core/image` with `is-style-svg`) for pasted inline SVG files. It is not a replacement for the Icon block. See [[block-variations]].

## Icon Library Collections

Collections register with `wp_register_icon_collection()` / `wp_register_icon()` when the Icon feature is enabled and WordPress is 7.1 or later.

| Collection | IDs | Source |
|------------|-----|--------|
| Core | `core/{name}` | WordPress (`wp-includes` icon library) |
| Aegis | `wordpress/{name}` | Gutenberg-only SVGs that Core does not ship |
| Social | `social/{name}` | Theme social set (brands Core does not include) |
| Remix Icon | `remixicon/{name}` | Aegis Pro |
| Phosphor Duotone | `phosphor-duotone/{name}` | Aegis Pro |
| Heroicons | `heroicons/{name}` | Aegis Pro |
| Feather | `feather/{name}` | Aegis Pro |
| Hand Drawn | `hand-drawn/{name}` | Aegis Pro |
| Plugins | `plugin/{name}` | Aegis Pro |
| Brand | `brand/{name}` | Aegis Pro |

Aegis does not duplicate Core glyphs. A former `wordpress/star-filled` icon is stored as `core/star-filled`. Legacy saved IDs `aegis/{set}/{name}` still resolve when content is rendered or migrated.

## Icon Properties

| Property | Control | Description |
|----------|---------|-------------|
| Icon | Library picker | `{collection}/{name}` on the block `icon` attribute |
| Size | Dimensions | Width (height follows `aspect-ratio: 1`) |
| Color | Text color | Fill uses `currentColor` unless the SVG sets a non-ink color |
| Gradient | Icon gradient (optional) | CSS mask gradient when enabled at **Aegis → Blocks** |
| Alignment | Block toolbar | Left, center, right, or inline |
| Link | Icon link | Optional URL, target, and rel |
| Gallery | Icon gallery | Adds `all-icons` to render every glyph in the selected set |

## Color and Dark Mode

Icons use `currentColor` by default:

- They inherit the parent text color.
- In dark mode (`is-style-dark`), they invert with the text tokens.
- The Color panel **Text** setting overrides the inherited color.

Stroked icons (outline sets) keep `fill="none"` and `stroke="currentColor"`. Aegis re-renders non-`core` library icons on the front end so WordPress SVG sanitization does not strip stroke attributes.

For SVGs with multiple decorative colors, those fills are preserved. Theme color applies only to `currentColor` and literal ink (`#000`, `black`).

See [[dark-mode]].

## Accessibility

### Decorative icons

Next to text that already conveys the meaning: keep the SVG `aria-hidden` and do not add a label.

### Informational icons

When the glyph is the only meaning: set an accessible label in Advanced settings (`aria-label` / `<title>`).

### Icon buttons

A button that shows only an icon needs an `aria-label` describing the action (for example “Close”).

### Skip link and header icons

The skip-to-content link is injected **after** the header template part is rendered, so it never wraps the `<header>` landmark. If header icons (including dark-mode toggles) appear in the editor but not on the front end, see [[common-issues#icons-visible-in-the-editor-but-missing-on-the-front-end]].

## Feature Toggles

With the companion plugin active, **Aegis → Blocks → Icon** gates extras on `core/icon` (it does not register a second icon block):

| Toggle | Effect |
|--------|--------|
| Gradient Colors | Gradient picker on the Icon block |
| Animations | Animation settings on icon elements |
| Custom SVG | Paste SVG markup on the block |
| Icon Gallery | Grid of every icon in the selected set |
| Responsive Sizing | Per-breakpoint icon size |
| REST API Endpoint | `aegis/v1/icons` for the button/tab picker; on WordPress 7.0 also merges sets into `wp/v2/icons` |

## Migrating Legacy Image Icons

Content that still uses `<!-- wp:image -->` with `is-style-icon`, or Icon blocks with `aegis/{set}/{name}` IDs, can be converted:

```bash
wp aegis migrate-icons
# WordPress Studio:
studio wp aegis migrate-icons
# Preview only:
studio wp aegis migrate-icons --dry-run
```

The command updates posts, pages, other post types, and `widget_block` widgets. Review affected templates in the Site Editor afterward.

See [[../getting-started/updating#image-icon--coreicon]].

## Adding Custom Icons to the Library

Pro (and child themes) add directories through the `Aegis\Icons\Icon::FILTER` (`aegis_icon_sets`). Each folder name becomes a collection slug; each `*.svg` file becomes `{folder}/{basename}`.

Requirements:

- Collection and icon slugs: lowercase `a-z`, `0-9`, hyphen, underscore.
- Do not add SVGs whose names already exist in the Core library (those IDs stay `core/{name}`).
- Use `viewBox` and `currentColor` (or literal black, which Aegis maps to `currentColor`).

## Icon Sizing

| Size | Typical use |
|------|-------------|
| 16px | Inline with small text, metadata |
| 20px | Inline with body text |
| 24px | Standard icon size, buttons |
| 32px | Medium emphasis |
| 48px | Feature icons, card headers |
| 64px | Large decorative icons |
| 96px+ | Hero section decorations |

Relative units (`em` / `rem`) scale with surrounding type.

## Using Icons in Patterns

Theme patterns use `<!-- wp:icon {"icon":"core/home"} /-->` (or `social/…`, Pro sets, and so on). The **Icon grid (library)** pattern is a static sample of Core/Aegis glyphs.

## Social Icons Block

The WordPress **Social Icons** block (`core/social-links`) is separate from the Icon library. Aegis still enhances it with styles, size presets, and hover options.

## Performance

- Only icons present in the HTML are sent to the browser (no icon font, no sprite of unused glyphs).
- Core icons render from the WordPress library; Aegis collections render from local SVG files.
- Markup is compact and gzip-friendly.

## Next Steps

- [[block-variations]] — SVG Image variation (`is-style-svg`).
- [[image-lightbox]] — Image lightbox extras on `core/image`.
- [[svg-upload]] — Uploading `.svg` files to the Media Library.
- [[enhanced-core-blocks]] — Other core block enhancements.
- [[accessibility]] — Skip links and labeling.
- [[dark-mode]] — Color tokens icons inherit.
- [Plugin Block Variations](../../plugins/aegis/docs/blocks/block-variations.md) — Icon feature toggles.
- [Pro Fonts and Icons](../../plugins/aegis-pro/docs/features/fonts-and-icons.md) — Extra collections.
