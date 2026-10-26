# File Structure

Directory layout of the Aegis theme repository.

## Top-Level Structure

```
aegis/
├── assets/                  # Fonts and static assets
├── docs/                    # Theme documentation (primary docs hub)
├── languages/               # aegis.pot (theme text domain; plugin has its own catalog)
├── parts/                   # Template parts (.html)
├── patterns/                # Block patterns (.php)
├── src/                     # Theme glue + block sources (PSR-4)
├── styles/                  # Style variation JSON files
├── templates/               # Page templates (.html)
├── tools/                   # Dev utilities (tracked in Git; excluded from release zip)
│   ├── scratch/             # Local-only probes (gitignored)
│   └── wpaudit/             # WPAudit PHPUnit suite (source tracked; vendor/ is not)
├── vendor/                  # Composer dependencies (framework, utilities)
├── functions.php            # Theme bootstrap
├── theme.json               # Design tokens
├── style.css                # Theme header
├── composer.json
├── package.json
└── webpack.config.js
```

## Key Directories

### src/

PHP services and block source files:

```
src/
├── bootstrap.php            # Starts theme services (see below)
├── helpers.php
├── NavigationFallback.php   # Short sample menu for empty Navigation blocks (1.0.1)
├── PatternDependencies.php  # Hides patterns whose blocks need an inactive plugin (1.0.1)
├── Admin/
│   ├── CompanionNotice.php  # Companion plugin install notice (installs the latest release)
│   └── GitHubUpdater.php    # Theme updates from GitHub releases (1.0.1)
└── Blocks/                  # block.json + TSX sources (compiled in place)
    ├── BlockRegistrar.php
    ├── RelatedPostsQuery.php
    ├── ToggleId.php         # Stable data-toggle-id for Toggle switchers
    ├── blocks-manifest.php  # Generated block metadata collection (npm run build)
    ├── countdown/
    ├── slider/
    ├── slide/
    ├── toggle/
    ├── toggle-content/
    └── related-posts/
```

`src/bootstrap.php` starts `CompanionNotice`, `GitHubUpdater`, `BlockRegistrar`, and `NavigationFallback`, and registers the theme's `payment`, `payment-brand`, and `integrations` icon sets. `blocks-manifest.php` is written by `tools/generate-blocks-manifest.php` at the end of `npm run build`; `BlockRegistrar` passes it to `wp_register_block_metadata_collection()`. Do not edit it by hand.

Engine PHP (patterns REST, template expander, dynamic parts, navigation overlay, editor overlay fix, Woo breadcrumbs including Store Breadcrumb delimiter wrap) lives in `vendor/aegis/framework`. Admin dashboard, conditionals, and multi-step checkout live in the companion plugin.

### vendor/aegis/

Composer packages:

| Package | Role |
|---------|------|
| `framework/` | Design system engine, core block enhancements, patterns |
| `utilities/` | Pattern helper, shared utilities |
| `container/`, `dom/`, `hooks/` | Supporting libraries |
| `icons/` | SVG files and `Aegis\Icons\Icon` utility (library registration lives in `framework/src/Icons/`) |

### patterns/

**Theme-owned** block patterns by category (`hero/`, `cta/`, `template/`, etc.) — generic sections and marketing layouts using core blocks. WooCommerce block patterns (`wp:woocommerce/*`) and the TI Wishlist pattern live in the **companion plugin**, not here. The theme keeps a Woo-free `header/default` so `parts/header.html` still resolves when WooCommerce is inactive.

Companion plugin pattern directories (see [Plugin File Structure](../../../../plugins/aegis/docs/development/file-structure.md)):

- `wp-content/plugins/aegis/patterns/woocommerce/` — gated on WooCommerce
- `wp-content/plugins/aegis/patterns/wishlist/` — gated on WooCommerce + TI Wishlist
- `wp-content/plugins/aegis/patterns/{slider,modal,contact}/` — demo patterns

Related Posts layouts (`blog-related-posts-*`) live in the **theme** `patterns/blog/related-posts-*.php`. They are not registered from the plugin.

Pro premium patterns: `wp-content/plugins/aegis-pro/patterns/`.

### Companion Plugins (Separate Repositories)

| Path | Docs |
|------|------|
| `wp-content/plugins/aegis/` | [Plugin docs](../../../../plugins/aegis/docs/home.md) |
| `wp-content/plugins/aegis-pro/` | [Pro docs](../../../../plugins/aegis-pro/docs/home.md) |

## Generated / Excluded from Dev

- `node_modules/` — npm dependencies
- `vendor/bin/` — dev tools
- Source maps and dev configs excluded from release ZIP per `.distignore`

## Next Steps

- [[architecture]] — Technical architecture
- [[building-assets]] — Build commands
- [Plugin File Structure](../../../../plugins/aegis/docs/development/file-structure.md)
