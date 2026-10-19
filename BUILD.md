# Aegis Theme Build

The theme registers presentation assets and theme-owned custom blocks. Map, Modal, admin dashboard, and most settings live in the companion plugin.

## PHP Dependencies

```bash
cd wp-content/themes/aegis
composer install
composer install --no-dev   # Theme Directory / production ZIP
```

### Updating Composer Dependencies

`vendor/aegis/*` (framework, icons, utilities, dom, hooks, container) is first-party source committed to this repository. `composer.json` lists those folders as `path` repositories pointing at themselves, so Composer treats them as already in place.

- Update third-party packages by name, for example `composer update enshrined/svg-sanitize phpunit/phpunit --with-all-dependencies`. Run it with `--dry-run` first.
- Back up `vendor/aegis/` before any Composer update. If `vendor/composer/installed.json` records an `aegis/*` package as anything other than a `path` install, Composer deletes that folder before "reinstalling" it from itself.
- `enshrined/svg-sanitize` must stay on `^1.0`. `vendor/aegis/icons/composer.json` requires the same constraint.

## Theme Block Build

```bash
cd wp-content/themes/aegis
npm install
npm run build             # Theme blocks → src/Blocks/
npm run dev               # Watch mode
```

Builds six theme blocks: countdown, slider, slide, toggle, toggle-content, related-posts.

Compiled block assets in `src/Blocks/` are gitignored; run `npm run build` after clone or when changing block sources.

### Node and npm Dependencies

- Node 22.13 or later (`.nvmrc`: 22; CI reads the same file). `pa11y-ci` 5 requires it.
- The `@wordpress/*` packages, `@types/react` (18, matching the React version WordPress loads), and `@wordpress/element` are dev dependencies for linting and type checking only. The build externalizes them, so WordPress provides them at runtime.
- `npm audit` reports advisories in `braces`, `sprintf-js`, `js-yaml` 3, `katex`, and `postcss-selector-parser` 6. They come from `@wordpress/scripts`, `@wordpress/env`, and `markdownlint`, have no patched release in those dependency ranges, and only affect local tooling — nothing from `node_modules` ships in the theme zip. Don't run `npm audit fix --force`: it downgrades `@wordpress/scripts`.
- Patched transitive versions are pinned in `package.json` `overrides`.

## Clean

```bash
npm run clean             # Remove compiled block assets
make clean                # npm run clean + remove node_modules/ (Git Bash/WSL)
```

## Plugin Build

Map, Modal, admin UI, and editor extensions are built in the companion plugin:

```bash
cd wp-content/plugins/aegis
npm run build
```

See [`wp-content/plugins/aegis/BUILD.md`](../../plugins/aegis/BUILD.md).

## Documentation

- [Theme docs](docs/home.md)
- [Plugin docs](../../plugins/aegis/docs/home.md)
- [Pro docs](../../plugins/aegis-pro/docs/home.md)
