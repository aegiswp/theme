# Development Tools

Utility scripts in the theme `tools/` directory for builds, pattern audits, migrations, and WPAudit tests. See also `tools/README.md` in the repository.

## Repository policy

| Location | On GitHub | In theme zip |
|----------|-----------|--------------|
| `tools/` (maintained scripts) | Yes | No |
| `tools/scratch/` | No (gitignored) | No |
| `tools/wpaudit/` | Yes (source only; `vendor/` installed in CI) | No |

## Build and translate

```bash
npm run build       # webpack + generate-blocks-manifest.php
npm run clean       # clean-build.js
npm run translate   # prepare-translate.js + wp i18n make-pot + finish-translate.js
```

On WordPress Studio sites, use `npm run translate:studio` instead of `npm run translate`.

## audit-patterns.php

Validates pattern slugs, block references, and template cross-links across the theme, companion plugin commerce patterns, and Pro patterns.

```bash
make audit-patterns
# or
npm run audit-patterns
# WordPress Studio:
npm run audit-patterns:studio
```

**Scanned directories:**

- `wp-content/themes/aegis/patterns/`
- `wp-content/plugins/aegis/patterns/woocommerce/`
- `wp-content/plugins/aegis/patterns/wishlist/`
- `wp-content/plugins/aegis-pro/patterns/`

**Checks:** duplicate slugs, missing pattern references in templates, unregistered blocks, `theme.json` custom template file existence.

**Expected baseline (without WooCommerce active):** ~4 errors (pre-existing Pro/utility duplicate slugs and unregistered Pro blocks when Pro inactive), many WooCommerce block warnings marked optional. Re-run after doc or pattern changes.

## migrate-aegis-video.php

Converts legacy **`aegis/video`** block markup to **`core/video`** in post content.

```bash
studio wp eval-file wp-content/themes/aegis/tools/migrate-aegis-video.php
```

Review affected pages in the Site Editor after running. See [[../getting-started/updating#aegisvideo--corevideo]].

## WPAudit (`tools/wpaudit/`)

PHPUnit suite for theme quality checks. CI runs `composer test:wpaudit` after `composer install` in `tools/wpaudit/`.

## Scratch scripts

One-off Site Editor probes and local diagnostics belong in `tools/scratch/` (gitignored). Do not document scratch scripts in this page unless they are promoted to the maintained list above.

## Next Steps

- [[testing]] — PHPUnit, performance, accessibility
- [[building-assets]] — Block build workflow
- [[../reference/file-structure]] — Repository layout
