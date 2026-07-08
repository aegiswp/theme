# Development Tools

Utility scripts in the theme `tools/` directory for pattern audits, migrations, and Site Editor diagnostics.

## audit-patterns.php

Validates pattern slugs, block references, and template cross-links across the theme, companion plugin commerce patterns, and Pro patterns.

```bash
studio wp eval-file wp-content/themes/aegis/tools/audit-patterns.php
```

**Scanned directories:**

- `wp-content/themes/aegis/patterns/`
- `wp-content/plugins/aegis/patterns/woocommerce/`
- `wp-content/plugins/aegis/patterns/wishlist/`
- `wp-content/plugins/aegis-pro/patterns/`

**Checks:** duplicate slugs, missing pattern references in templates, unregistered blocks, `theme.json` custom template file existence.

**Expected baseline (without WooCommerce active):** ~4 errors (pre-existing Pro/utility duplicate slugs and unregistered Pro blocks when Pro inactive), many WooCommerce block warnings marked optional. Re-run after doc or pattern changes.

Also available via Makefile: `make audit-patterns`.

## migrate-aegis-video.php

Converts legacy **`aegis/video`** block markup to **`core/video`** in post content.

```bash
studio wp eval-file wp-content/themes/aegis/tools/migrate-aegis-video.php
```

Review affected pages in the Site Editor after running. See [[../getting-started/updating#aegisvideo--corevideo]].

## Next Steps

- [[testing]] — PHPUnit, performance, accessibility
- [[building-assets]] — Block build workflow
- [[../reference/file-structure]] — Repository layout
