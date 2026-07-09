# Theme development tools

Utility scripts for building, translating, auditing, and migrating the Aegis theme. These files are tracked in Git for contributors but **excluded from the WordPress.org release zip** (see `.distignore`).

## Tracked scripts (maintained)

| Script | Purpose |
|--------|---------|
| `generate-blocks-manifest.php` | Post-build block manifest (`npm run build`) |
| `clean-build.js` | Remove build artifacts (`npm run clean`) |
| `prepare-translate.js` / `finish-translate.js` | POT generation helpers (`npm run translate`) |
| `audit-patterns.php` | Pattern slug, block, and template validation |
| `migrate-aegis-video.php` | Migrate legacy `aegis/video` blocks to `core/video` |
| `wpaudit/` | WPAudit PHPUnit suite (CI via `composer test:wpaudit`) |

## Commands

```bash
make audit-patterns          # or: npm run audit-patterns
npm run audit-patterns:studio   # WordPress Studio sites
npm run translate            # Regenerate languages/aegis.pot
composer test:wpaudit          # Run WPAudit unit tests
```

See `docs/development/tools.md` for full usage.

## Scratch scripts

Local-only probes and one-off diagnostics live in `tools/scratch/`. That directory is gitignored — move experimental scripts there instead of committing them.
