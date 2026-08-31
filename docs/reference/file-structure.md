# File Structure

Directory layout of the Aegis theme repository.

## Top-Level Structure

```
aegis/
├── assets/                  # Fonts and static assets
├── docs/                    # Theme documentation (primary docs hub)
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
├── bootstrap.php
├── helpers.php
├── Admin/
│   └── CompanionNotice.php
└── Blocks/                  # block.json + TSX sources (compiled in place)
    ├── BlockRegistrar.php
    ├── RelatedPostsQuery.php
    ├── countdown/
    ├── slider/
    ├── slide/
    ├── toggle/
    ├── toggle-content/
    └── related-posts/
```

Engine PHP (patterns REST, template expander, dynamic parts, navigation overlay, editor overlay fix, Woo breadcrumbs) lives in `vendor/aegis/framework`. Admin dashboard, conditionals, and multi-step checkout live in the companion plugin.

### vendor/aegis/

Composer packages:

| Package | Role |
|---------|------|
| `framework/` | Design system engine, core block enhancements, patterns |
| `utilities/` | Pattern helper, shared utilities |
| `container/`, `dom/`, `hooks/` | Supporting libraries |
| `icons/` | Icon registry |

### patterns/

**Theme-owned** block patterns by category (`hero/`, `cta/`, `template/`, etc.) — generic sections and marketing layouts using core blocks. WooCommerce block patterns (`wp:woocommerce/*`) and the TI Wishlist pattern live in the **companion plugin**, not here.

Companion plugin pattern directories (see [Plugin File Structure](../../plugins/aegis/docs/development/file-structure.md)):

- `wp-content/plugins/aegis/patterns/woocommerce/` — gated on WooCommerce
- `wp-content/plugins/aegis/patterns/wishlist/` — gated on WooCommerce + TI Wishlist
- `wp-content/plugins/aegis/patterns/{slider,modal,contact,blog}/` — demo patterns

Pro premium patterns: `wp-content/plugins/aegis-pro/patterns/`.

### Companion Plugins (Separate Repositories)

| Path | Docs |
|------|------|
| `wp-content/plugins/aegis/` | [Plugin docs](../../plugins/aegis/docs/home.md) |
| `wp-content/plugins/aegis-pro/` | [Pro docs](../../plugins/aegis-pro/docs/home.md) |

## Generated / Excluded from Dev

- `node_modules/` — npm dependencies
- `vendor/bin/` — dev tools
- Source maps and dev configs excluded from release ZIP per `.distignore`

## Next Steps

- [[architecture]] — Technical architecture
- [[building-assets]] — Build commands
- [Plugin File Structure](../../plugins/aegis/docs/development/file-structure.md)
