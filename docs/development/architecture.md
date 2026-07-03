# Architecture

Technical architecture of the Aegis theme and its relationship to the framework and companion plugins.

## Four-Layer Model

| Layer | Location | Responsibility |
|-------|----------|----------------|
| **Theme** | `wp-content/themes/aegis` | FSE templates, patterns, theme blocks, thin PHP glue |
| **Framework** | `vendor/aegis/framework` | Core block enhancements, variations, design system engine, injection hook firing |
| **Free plugin** | `wp-content/plugins/aegis` | Admin, map/modal, snippets, conditionals, integrations, analytics |
| **Pro plugin** | `wp-content/plugins/aegis-pro` | Hook pattern CPT, video stack, query pro, license |

## Theme Overview

- **PSR-4 autoloading** via Composer — namespace `Aegis\` mapped to `src/`
- **Framework bootstrap** — `Aegis::register()` from `vendor/aegis/framework`
- **Theme services** — wired in `src/bootstrap.php`

## Namespace Structure (`src/`)

```
src/
├── bootstrap.php              # Composer autoload entry — wires init services
├── helpers.php                # Pattern and URL helpers
├── BlockPatterns.php          # Pattern registration bridge
├── BlockPatternsRest.php      # REST payload trimming for Site Editor
├── TemplatePatternExpander.php
├── Core/
│   └── AssetManager.php       # Theme-local asset enqueue
├── Blocks/
│   └── BlockRegistrar.php     # Theme custom blocks (countdown, slider, …)
├── Navigation/
│   └── Overlay.php            # Navigation overlay block styles
├── Checkout/
│   └── MultiStep.php          # WooCommerce multi-step checkout
├── CoreBlocks/
│   └── Breadcrumbs.php        # Breadcrumb trail filters
├── Editor/
│   └── EditorOverlayFix.php   # WP 7.0 editor workaround
├── Admin/
│   ├── CompanionNotice.php    # Install companion plugin notice
│   └── …                      # Legacy facades delegating to plugin
└── Blocks/                    # Block source (TSX) → build/Blocks/
```

## Framework (`vendor/aegis/framework`)

Registered via `ServiceProvider` when `Aegis::register()` runs:

- 37+ core block render filters (`CoreBlocks\`)
- Block settings (Visibility, Animation, Query enhancements, …)
- Block variations (Accordion, Counter, Marquee, …)
- Design system (Patterns scanner, DarkMode, BlockStyles, EditorAssets)
- Integration CSS (gated by plugin settings when plugin active)
- Injection hook firing on template parts and post content

## Bootstrap Flow

### 1. functions.php

Loads Composer autoload, helpers, pattern bridge, registers framework, loads `src/bootstrap.php`.

### 2. src/bootstrap.php

Initializes theme services: AssetManager, BlockRegistrar, Navigation Overlay, WooCommerce MultiStep, CompanionNotice, etc.

### 3. Aegis::register()

Boots the framework ServiceProvider (~100 services).

## What Moved to Plugins

These features are **not** in theme PHP — see plugin docs:

| Feature | Documentation |
|---------|---------------|
| Analytics | [Plugin Analytics](../../plugins/aegis/docs/features/analytics.md) |
| Conditionals admin/evaluator | [Conditional Logic](../../plugins/aegis/docs/features/conditional-logic.md) |
| Integrations dashboard | [Integrations Dashboard](../../plugins/aegis/docs/features/integrations-dashboard.md) |
| Hook pattern CPT | [Pro Hook Patterns](../../plugins/aegis-pro/docs/features/hook-patterns-pro.md) |
| Map / Modal blocks | [Plugin Custom Blocks](../../plugins/aegis/docs/blocks/custom-blocks.md) |

## Build Pipeline

Dual build — see [[building-assets]]:

- **Theme:** `npm run build` → `build/Blocks/` (theme-owned blocks)
- **Plugin:** `npm run build` in `wp-content/plugins/aegis` (map, modal, admin)

## Next Steps

- [[file-structure]] — Directory layout
- [[building-assets]] — Build commands
- [Plugin Architecture](../../plugins/aegis/docs/development/architecture.md)
