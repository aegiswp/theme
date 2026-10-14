# Aegis Theme Build

The theme registers presentation assets and theme-owned custom blocks. Map, Modal, admin dashboard, and most settings live in the companion plugin.

## PHP Dependencies

```bash
cd wp-content/themes/aegis
composer install
composer install --no-dev   # Theme Directory / production ZIP
```

## Theme Block Build

```bash
cd wp-content/themes/aegis
npm install
npm run build             # Theme blocks → src/Blocks/
npm run dev               # Watch mode
```

Builds six theme blocks: countdown, slider, slide, toggle, toggle-content, related-posts.

Compiled block assets in `src/Blocks/` are gitignored; run `npm run build` after clone or when changing block sources.

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

See [`wp-content/plugins/aegis/BUILD.md`](../plugins/aegis/BUILD.md).

## Documentation

- [Theme docs](docs/home.md)
- [Plugin docs](../plugins/aegis/docs/home.md)
- [Pro docs](../plugins/aegis-pro/docs/home.md)
