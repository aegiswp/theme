# Countdown Block

The **Countdown** block (`aegis/countdown`) displays an animated timer counting down to a target date and time.

## Overview

| Property | Value |
|----------|-------|
| Block name | `aegis/countdown` |
| Registered by | Aegis theme |
| Render | Dynamic (`render.php` + `view.js`) |
| Requires plugin | No (Pro sub-features optional) |

## Key attributes

| Attribute | Type | Default | Description |
|-----------|------|---------|-------------|
| `datetime` | string | `""` | Target date/time (ISO 8601) |
| `showDays` / `showHours` / `showMinutes` / `showSeconds` | boolean | `true` | Visible time units |
| `labels` | object | Days, Hours, … | Unit labels |
| `separator` | string | `colon` | `colon`, `dot`, `dash`, or `none` |
| `layout` | string | `inline` | `inline` or `stacked` |
| `expiryMessage` | string | `""` | Shown when countdown reaches zero |
| `timezone` | string | `utc` | `utc` or `local` |
| `schemaEnabled` | boolean | `false` | Event schema markup |
| `schemaEventName` / `Description` / `Location` / `Url` | string | `""` | Schema.org Event fields |

## Usage

1. Insert the **Countdown** block from the block inserter.
2. Set **Target date** in the block sidebar.
3. Toggle which units to display (days, hours, minutes, seconds).
4. Customize labels, separator, and layout.
5. Add an **Expiry message** for when the timer ends.
6. Optionally enable **Event schema** for SEO.

## Aegis → Blocks → Countdown

There is no parent Countdown toggle. Enabling any extra implies the block (same pattern as Related Posts and Slider). Without the plugin, all extras behave as on.

| Extra | Inspector | Off fallback |
|-------|-----------|--------------|
| `countdown_segments` | Show Days / Hours / Minutes / Seconds | all units on |
| `countdown_labels` | Days / Hours / Minutes / Seconds labels | default English labels |
| `countdown_separator` | Separator | `colon` |
| `countdown_layout` | Layout | `inline` |
| `countdown_expiry_message` | Expiry Message | empty (timer stays visible at zero) |
| `countdown_timezone` | Timezone | `utc` |
| `countdown_schema` | Schema.org Event | schema not output |

The datetime picker stays available when the block is registered. Inspector extras are passed as `window.aegisCountdownFeatures` on the block editor script.

## Pro sub-features

**Aegis → Blocks → Countdown** Pro extras (when Aegis Pro is active): evergreen timer, animation styles, auto-restart, expiry actions, and urgency styling. Each extra is gated like Map/Slider. The inspector reads `window.aegisCountdownEditor.features`.

See [Plugin Block Variations](../../plugins/aegis/docs/blocks/block-variations.md) and [Pro Block Extensions](../../plugins/aegis-pro/docs/features/block-extensions.md).

## Developer notes

- Source: `src/Blocks/countdown/` — `block.json`, `edit.tsx`, `view.ts`, `render.php`
- Registration: `src/Blocks/BlockRegistrar.php` — extras imply `countdown`
- Inspector extras: `window.aegisCountdownFeatures` inlined on the registered editor script handle
- Frontend animation runs in `view.js`; digits update on an interval
- Compiled output: webpack writes `index.js` / `view.js` in place. `block.json` still points at `file:style.css` (no SCSS import yet, unlike Slider)

## Next Steps

- [[custom-blocks]] — All theme blocks
- [[block-variations]] — Framework variations
- [Plugin Blocks toggles](../../plugins/aegis/docs/blocks/block-variations.md)
