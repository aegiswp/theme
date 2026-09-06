# Toggle and Toggle Content Blocks

The **Toggle** block (`aegis/toggle`) is a **content switcher**: two labeled views, one visible at a time. It is not an accordion. For FAQ expand/collapse, use the **Accordion List** variation on `core/list` — see [[block-variations#accordion-list]].

This matches the Gutenberg [Toggle Content](https://wordpress.org/plugins/toggle-content/) pattern (primary / secondary inner content and a pill, switch, or button control).

## Overview

| Block | Name | Role |
|-------|------|------|
| Toggle | `aegis/toggle` | Switcher control + two views |
| Toggle Content | `aegis/toggle-content` | One view (`slot` `a` or `b`) |

Toggle Content **only** inserts inside a Toggle block. The inserter template creates both views.

## Toggle attributes

| Attribute | Type | Default | Description |
|-----------|------|---------|-------------|
| `switchStyle` | string | `switch` | `pill`, `switch`, or `buttons` (limited to enabled extras) |
| `alignment` | string | `center` | `left`, `center`, or `right` |
| `primaryLabel` | string | empty | Label for view `a` (translated “First” when empty) |
| `secondaryLabel` | string | empty | Label for view `b` (translated “Second” when empty) |
| `initialContent` | string | `a` | Which view is shown first |
| `animationDuration` | number | `300` | Transition duration in ms (pill/switch motion and Pro animations) |
| `allowNested` | boolean | `false` | Allow a Toggle inside Toggle Content (Pro extra `toggle_nested`) |
| `instanceId` | string | empty | Stable id for persist/ARIA, set from the editor `clientId` |

Saved accordion-era Toggle blocks (heading + one content pane) migrate to a switcher: the heading becomes the primary label, existing content becomes view `a`, and an empty view `b` is added. Migration only runs when inner blocks are not already Toggle Content.

## Usage

1. Enable at least one extra at **Aegis → Blocks → Toggle** (Pill, Switch, or Buttons is enough).
2. Insert the **Toggle** block.
3. Edit the two labels (with Custom Labels on) and add blocks inside each **Toggle Content** view.
4. Click a label to preview the other view in the editor. Selecting a block inside a view also switches the preview to that view.
5. Optionally set alignment and which view is shown first.

## Appearance (light and dark)

Pill, switch, and button styles use Aegis mode tokens so labels stay readable in light and dark:

- Pill chip and switch thumb: `--wp--custom--body--background` (page surface)
- Pill active label: `--wp--custom--body--color`
- Buttons active fill/text: `--wp--custom--button--background` and `--wp--custom--button--color` (same as theme `core/button`)

Do not use WordPress `base` / `contrast` presets — this theme does not define them.

## Aegis → Blocks → Toggle

There is no parent Toggle toggle. Enabling any extra implies the block (same pattern as Related Posts and Slider). Without the plugin, all extras behave as on. The `aegis/toggle-content` child uses the same parent key.

| Extra | Inspector / render | Off fallback |
|-------|--------------------|--------------|
| `toggle_pill` | Pill switcher style | Style unavailable; another enabled style (or Switch) is used |
| `toggle_switch` | Switch (track + thumb) style | Style unavailable |
| `toggle_buttons` | Separate button style | Style unavailable |
| `toggle_position` | Alignment (`left` / `center` / `right`) | `center` |
| `toggle_labels` | Editable primary and secondary labels | Labels stay “First” / “Second” |
| `toggle_animations` | Animation duration (Pro extra, shown in the free inspector) | `300` ms |

Inspector extras are passed as `window.aegisToggleFeatures` on the block editor script.

## Pro sub-features

**Aegis → Blocks → Toggle** Pro extras (when Aegis Pro is active): URL sync (`?param=a` / `b`), state persistence, animations (fade, slide, flip, scale), nested toggles inside Toggle Content, and conditional visibility of other elements. Duration stays on the theme inspector so it is not duplicated in the Pro panel. The inspector reads `window.aegisToggleEditor.features`. Nested Toggle inserts require the extra **and** **Allow Nested Toggles** on that block.

On click, the theme script updates the control and dispatches `aegis:toggle:changed` without swapping panel `.is-active` when a Pro animation class is present. Pro `toggle-view.js` then runs `animateTransition()`. URL init, persist restore, and `prefers-reduced-motion: reduce` swap instantly. A URL param wins over stored state. Nested switcher events are ignored. Persist keys use `data-toggle-id` from the HTML anchor, else saved `instanceId`, else a hash of the block source. Back/forward with URL sync also updates conditional visibility.

FAQ schema is not part of this block. Accordion List has `accordion_faq_schema`.

See [Plugin Block Variations](../../plugins/aegis/docs/blocks/block-variations.md) and [Pro Block Extensions](../../plugins/aegis-pro/docs/features/block-extensions.md).

## Developer notes

- Source: `src/Blocks/toggle/`, `src/Blocks/toggle-content/`
- Registration: `src/Blocks/BlockRegistrar.php` — directory `toggle-content` maps to parent key `toggle`; extras imply that parent
- Styles compile from `style.scss` via `import './style.scss'` to `style-index.css` (same as Slider)
- Frontend: `view.js` scopes clicks and panel updates to this instance (`:scope > .aegis-toggle__control` / `:scope > .aegis-toggle__panels`), then dispatches `aegis:toggle:changed`. Hidden views use `data-active` / `data-slot` (not a global `:not(.is-active)` hide, which would blank the editor canvas)
- Editor: `templateLock` is off so inner paragraphs stay editable; the parent appender is hidden so a third view is not offered. Selecting inner content switches only the Toggle that owns that Toggle Content
- Duration is output as `--aegis-toggle-duration` and `--toggle-animation-duration` on the wrapper
- Dynamic render via `render.php`

## Next Steps

- [[custom-blocks]] — Block index
- [[block-variations#accordion-list]] — FAQ accordion
- [[../features/accessibility|Accessibility]] — Switcher keyboard support
