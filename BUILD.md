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
npm run build             # Theme blocks → build/Blocks/
npm run dev               # Watch mode
```

<<<<<<< Updated upstream
Builds: countdown, slider, slide, toggle, toggle-content, video, related-posts.
=======
Builds six theme blocks: countdown, slider, slide, toggle, toggle-content, related-posts.
>>>>>>> Stashed changes

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
