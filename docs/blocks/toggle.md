# Toggle and Toggle Content Blocks

The **Toggle** block (`aegis/toggle`) creates expandable accordion sections. Content lives in the **`aegis/toggle-content`** child block.

## Overview

| Block | Name | Role |
|-------|------|------|
| Toggle | `aegis/toggle` | Clickable header + expand/collapse behavior |
| Toggle Content | `aegis/toggle-content` | Hidden/shown content area |

Toggle Content **only** inserts inside a Toggle block.

## Toggle attributes

| Attribute | Type | Default | Description |
|-----------|------|---------|-------------|
| `heading` | string | `""` | Visible header text |
| `headingTag` | string | `h3` | `h2`–`h6` or `p` |
| `isOpen` | boolean | `false` | Start expanded |
| `iconPosition` | string | `right` | `left` or `right` |
| `iconType` | string | `chevron` | `chevron`, `plus`, or `arrow` |
| `allowMultiple` | boolean | `true` | Allow multiple open toggles in a group |
| `animationDuration` | number | `300` | Open/close animation ms |
| `faqSchema` | boolean | `false` | FAQ structured data |

## Usage

1. Insert the **Toggle** block.
2. Enter the **Heading** text.
3. Add blocks inside **Toggle Content** (paragraphs, lists, images, etc.).
4. Set **Open by default** if the section should start expanded.
5. Repeat for FAQ-style layouts.

Compare with the framework **Accordion List** variation on `core/list` — see [[block-variations#comparison-with-toggle-block]].

## Developer notes

- Source: `src/Blocks/toggle/`, `src/Blocks/toggle-content/`
- Frontend: `view.js` handles `aria-expanded`, keyboard (Enter/Space)
- Dynamic render via `render.php`

## Next Steps

- [[custom-blocks]] — Block index
- [[../features/accessibility|Accessibility]] — Toggle keyboard support
