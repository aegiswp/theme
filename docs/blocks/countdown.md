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

## Pro sub-features

When **Aegis Pro** is active, additional Countdown options may appear under **Aegis → Blocks → Countdown** (evergreen timer, animations). See [Plugin Block Variations](../../plugins/aegis/docs/blocks/block-variations.md).

## Developer notes

- Source: `src/Blocks/countdown/` — `block.json`, `edit.tsx`, `view.ts`, `render.php`
- Frontend animation runs in `view.js`; digits update on an interval
- Build output: `build/Blocks/countdown/`

## Next Steps

- [[custom-blocks]] — All theme blocks
- [[block-variations]] — Framework variations
- [Plugin Blocks toggles](../../plugins/aegis/docs/blocks/block-variations.md)
