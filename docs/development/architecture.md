# Architecture

Technical architecture of the Aegis theme and its relationship to the framework and companion plugins.

## Four-Layer Model

| Layer | Location | Responsibility |
|-------|----------|----------------|
| **Theme** | `wp-content/themes/aegis` | FSE templates, generic theme patterns (excluding WC/TI block patterns), theme blocks, thin PHP glue |
| **Framework** | `vendor/aegis/framework` | Core block enhancements, variations, design system engine, injection hook firing |
| **Free plugin** | `wp-content/plugins/aegis` | Admin, map/modal, snippets, conditionals, integrations, analytics, **WooCommerce/TI Wishlist block patterns** (gated) |
| **Pro plugin** | `wp-content/plugins/aegis-pro` | Hook pattern CPT, video stack, query pro, license, Pro patterns |

## Template gating

FSE **templates** remain in the theme (`templates/` + `theme.json`). WooCommerce and wishlist templates are **hidden from the Site Editor template picker** when dependencies are inactive via `vendor/aegis/framework/src/DesignSystem/Templates.php` (`get_block_templates` filter). See [[../reference/template-reference]].

## Theme Overview

- **PSR-4 autoloading** via Composer — namespace `Aegis\` mapped to `src/` (theme glue + blocks)
- **Framework bootstrap** — `Aegis::register()` from `vendor/aegis/framework`
- **Theme services** — `BlockRegistrar` and `CompanionNotice` in `src/bootstrap.php`

## Namespace Structure (`src/`)

```
src/
├── bootstrap.php              # Composer files autoload — BlockRegistrar + CompanionNotice
├── helpers.php                # Pattern URL helpers (required from functions.php)
├── Admin/
│   └── CompanionNotice.php    # Install companion plugin notice
└── Blocks/                    # block.json + TSX sources (compiled in place)
    ├── BlockRegistrar.php
    └── RelatedPostsQuery.php
```

## Framework (`vendor/aegis/framework`)

Registered via `ServiceProvider` when `Aegis::register()` runs:

- 37+ core block render filters (`CoreBlocks\`), including `core/icon` and Image lightbox extras
- Icon library registration (`Icons\Library`) on WordPress 7.1+; `wp aegis migrate-icons` for leftover Image icons
- Block settings (Visibility, Animation, Query enhancements, …)
- Block variations (Accordion, Counter, Marquee, SVG Image — not Image Icon). Marquee extras are gated at **Aegis → Blocks → Marquee**.
- Design system (Patterns scanner, REST trim, template pattern expander, dynamic template parts, DarkMode, SkipLink, BlockStyles, EditorAssets, navigation overlay, editor overlay fix)
- Integration CSS (gated by plugin settings when plugin active)
- Injection hook firing on template parts and post content

## Bootstrap Flow

### 1. functions.php

Loads Composer autoload, helpers, textdomain, and `Aegis::register()`.

### 2. src/bootstrap.php

Initializes `CompanionNotice` and `BlockRegistrar`.

### 3. Aegis::register()

Boots the framework ServiceProvider (design system, core blocks, integrations).

## What Moved to Plugins

These features are **not** in theme PHP — see plugin docs:

| Feature | Documentation |
|---------|---------------|
| Analytics | [Plugin Analytics](../../plugins/aegis/docs/features/analytics.md) |
| Conditionals admin/evaluator | [Conditional Logic](../../plugins/aegis/docs/features/conditional-logic.md) |
| Admin dashboard | [Plugin Architecture](../../plugins/aegis/docs/development/architecture.md) |
| Multi-step checkout | [WooCommerce Checkout](../../plugins/aegis/docs/features/woocommerce-checkout.md) |
| Integrations dashboard | [Integrations Dashboard](../../plugins/aegis/docs/features/integrations-dashboard.md) |
| Hook pattern CPT | [Pro Hook Patterns](../../plugins/aegis-pro/docs/features/hook-patterns-pro.md) |
| Map / Modal blocks | [Plugin Custom Blocks](../../plugins/aegis/docs/blocks/custom-blocks.md) |

## Build Pipeline

Dual build — see [[building-assets]]:

- **Theme:** `npm run build` → compiled assets in `src/Blocks/` (theme-owned blocks)
- **Plugin:** `npm run build` in `wp-content/plugins/aegis` (map, modal, admin)

## Next Steps

- [[file-structure]] — Directory layout
- [[building-assets]] — Build commands
- [Plugin Architecture](../../plugins/aegis/docs/development/architecture.md)
