# Theme development tools

Utility scripts for building, translating, auditing, and migrating the Aegis theme. Maintained files are tracked on GitHub for contributors. The whole `tools/` tree is **excluded from the WordPress.org release zip** (`.distignore` and `.gitattributes` `export-ignore`).

## GitHub vs local vs zip

| Path | GitHub | Why |
|------|--------|-----|
| `generate-blocks-manifest.php` | Yes | `npm run build` |
| `clean-build.js` | Yes | `npm run clean` |
| `prepare-translate.js` / `finish-translate.js` | Yes | `npm run translate` |
| `audit-patterns.php` | Yes | `npm run audit-patterns` |
| `migrate-aegis-video.php` | Yes | `npm run migrate:video` |
| `README.md`, `.gitignore` | Yes | Contributor docs / ignore rules |
| `wpaudit/src/`, `wpaudit/tests/`, `wpaudit/composer.json`, `wpaudit/composer.lock` | Yes | CI PHPUnit suite |
| `wpaudit/phpunit.xml`, `wpaudit/phpcs.xml`, `wpaudit/phpstan.neon` | Yes | Package quality config |
| `wpaudit/config/.wpauditrc.example.json`, `wpaudit/config/.wpauditrc.schema.json` | Yes | Optional audit config examples |
| `scratch/` | **No** | Local probes (gitignored) |
| `wpaudit/vendor/` | **No** | `composer install --working-dir=tools/wpaudit` in CI |
| `wpaudit/.phpunit.cache/`, `wpaudit/coverage/` | **No** | Test caches / coverage output |
| `wpaudit/.github/` | **No** | Nested workflows not used |

## Commands

```bash
make audit-patterns             # or: npm run audit-patterns
npm run audit-patterns:studio   # WordPress Studio sites
npm run translate               # Regenerate theme languages/aegis.pot (not the plugin catalog)
npm run migrate:video           # Legacy aegis/video → core/video
studio wp aegis migrate-icons   # Legacy Image Icon / aegis/{set}/{name} → core/icon
composer test:wpaudit           # Run WPAudit unit tests
```

See `docs/development/tools.md` for full usage.

## Scratch scripts

Local-only probes and one-off diagnostics live in `tools/scratch/`. That directory is gitignored — move experimental scripts there instead of committing them.
