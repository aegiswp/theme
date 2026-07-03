# File Structure

Directory layout of the Aegis theme repository.

## Top-Level Structure

```
aegis/
├── assets/                  # Fonts and static assets
├── build/                   # Compiled block assets (generated)
├── docs/                    # Theme documentation (primary docs hub)
├── parts/                   # Template parts (.html)
├── patterns/                # Block patterns (.php)
├── src/                     # PHP classes + block sources (PSR-4)
├── styles/                  # Style variation JSON files
├── templates/               # Page templates (.html)
├── tests/                   # PHPUnit tests
├── tools/                   # Dev utilities
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
├── BlockPatterns.php
├── Blocks/                  # block.json + TSX sources
│   ├── countdown/
│   ├── slider/
│   ├── slide/
│   ├── toggle/
│   ├── toggle-content/
│   ├── video/
│   └── related-posts/
├── Checkout/js/             # Multi-step checkout JS source
├── Navigation/
├── Core/
└── Admin/
```

### build/Blocks/

Webpack output from `npm run build`:

```
build/Blocks/
├── countdown/
├── slider/
├── slide/
├── toggle/
├── toggle-content/
├── video/
├── related-posts/
└── blocks-manifest.php
```

### vendor/aegis/

Composer packages:

| Package | Role |
|---------|------|
| `framework/` | Design system engine, core block enhancements, patterns |
| `utilities/` | Pattern helper, shared utilities |
| `container/`, `dom/`, `hooks/` | Supporting libraries |
| `icons/` | Icon registry |

### patterns/

Block patterns by category (`hero/`, `cta/`, `template/`, etc.). Pro patterns live in `plugins/aegis-pro/patterns/`.

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
- [Plugin File Structure](../../plugins/aegis/docs/development/architecture.md)
