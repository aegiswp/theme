# Development Tools

Utility scripts in the theme `tools/` directory for builds, pattern audits, migrations, and WPAudit tests. See also `tools/README.md` in the repository.

## Repository policy

| Location | On GitHub | In theme zip |
|----------|-----------|--------------|
| `tools/` maintained scripts | Yes | No |
| `tools/wpaudit/` source (`src/`, `tests/`, `composer.json`/`lock`, configs) | Yes | No |
| `tools/scratch/` | No (gitignored) | No |
| `tools/wpaudit/vendor/`, `.phpunit.cache/`, `coverage/` | No (gitignored) | No |

## Build and translate

```bash
npm run build       # webpack + generate-blocks-manifest.php
npm run clean       # clean-build.js
npm run translate   # prepare-translate.js + wp i18n make-pot + finish-translate.js
```

On WordPress Studio sites, use `npm run translate:studio` instead of `npm run translate`. The prepare step copies Icon library PHP/JS and the plugin Blocks admin page into `build/` so those strings are included even though `vendor/` is excluded from the scan.

## audit-patterns.php

Validates pattern slugs, block references, and template cross-links across the theme, companion plugin, and Pro pattern trees.

```bash
make audit-patterns
# or
npm run audit-patterns
# WordPress Studio:
npm run audit-patterns:studio
```

**Scanned directories:**

- `wp-content/themes/aegis/patterns/`
- `wp-content/plugins/aegis/patterns/`
- `wp-content/plugins/aegis-pro/patterns/`

**Checks:** duplicate slugs, missing pattern references in templates, unregistered blocks, `theme.json` custom template file existence.

**Expected baseline (without WooCommerce active):** WooCommerce block warnings marked optional; Pro blocks error when Pro is inactive. Re-run after doc or pattern changes.

## migrate-aegis-video.php

Converts legacy **`aegis/video`** block markup to **`core/video`** in post content.

```bash
npm run migrate:video
# WordPress Studio:
npm run migrate:video:studio
```

Review affected pages in the Site Editor after running. See [[../getting-started/updating#aegisvideo--corevideo]].

## migrate-icons (WP-CLI)

Converts leftover **Image Icon** blocks (`core/image` + `is-style-icon`) and legacy `aegis/{set}/{name}` Icon IDs to the WordPress **Icon** block (`core/icon`).

```bash
wp aegis migrate-icons
# WordPress Studio:
studio wp aegis migrate-icons
studio wp aegis migrate-icons --dry-run
```

See [[../getting-started/updating#image-icon--coreicon]] and [[../features/svg-icons]].

## WPAudit (`tools/wpaudit/`)

PHPUnit suite for theme quality checks. CI runs `composer test:wpaudit` after `composer install` in `tools/wpaudit/`.

## Scratch scripts

One-off Site Editor probes and local diagnostics belong in `tools/scratch/` (gitignored). Do not document scratch scripts in this page unless they are promoted to the maintained list above.

## Next Steps

- [[testing]] — PHPUnit, performance, accessibility
- [[building-assets]] — Block build workflow
- [[../reference/file-structure]] — Repository layout
