# Building Assets

Aegis uses a **dual build** workflow: the theme compiles theme-owned blocks; the companion plugin compiles Map, Modal, admin, and editor assets.

## Theme Build

```bash
cd wp-content/themes/aegis
composer install
npm install
npm run build             # Theme blocks → build/Blocks/
npm run dev               # Watch mode
```

Output: `build/Blocks/` (countdown, slider, slide, toggle, toggle-content, related-posts).

Video uses WordPress **`core/video`** — editor assets are built in the companion plugin. See [Plugin Building Assets](../../plugins/aegis/docs/development/building-assets.md).

## Plugin Build

```bash
cd wp-content/plugins/aegis
npm install
npm run build             # Map, modal, admin, video editor
```

See [Plugin Building Assets](../../plugins/aegis/docs/development/building-assets.md).

## Build Toolchain

| Tool | Purpose |
|------|---------|
| `@wordpress/scripts` | WordPress-specific Webpack configuration |
| Webpack | Module bundler |
| Babel | JavaScript transpilation |
| PostCSS | CSS processing |
| Sass (optional) | CSS preprocessor support |

## Available Commands

### Production Build

```bash
npm run build
```

Creates optimized, minified production-ready assets:

- JavaScript is minified and tree-shaken.
- CSS is minified and autoprefixed.
- Source maps are generated for debugging.
- Asset files include content hashes for cache busting.

### Development Build

```bash
npm run build:dev
```

Creates unminified development assets:

- No minification (easier to debug).
- Full source maps.
- No content hashes in filenames.
- Faster build time.

### Development Watch Mode

```bash
npm run dev
```

Starts Webpack in watch mode:

- Watches source files for changes.
- Automatically rebuilds on file save.
- Provides fast incremental builds (only rebuilds what changed).
- Outputs development-friendly (unminified) assets.
- Console output shows build status and errors.

Press `Ctrl + C` to stop the watcher.

## Build Output

Compiled assets are placed in the `build/Blocks/` directory:

```
build/Blocks/
├── countdown/
├── slider/
├── slide/
├── toggle/
├── toggle-content/
├── related-posts/
└── blocks-manifest.php
```

### Asset PHP Files

Each compiled JavaScript file generates a companion `.asset.php` file:

```php
<?php return array(
    'dependencies' => array('wp-element', 'wp-blocks', 'wp-i18n'),
    'version'      => 'abc123def456',
);
```

This file declares WordPress script dependencies and provides a version hash for cache busting. WordPress uses this during `wp_enqueue_script()`.

## Source File Structure

Block source files live in `src/Blocks/`:

```
src/Blocks/
├── countdown/
│   ├── block.json
│   ├── index.tsx
│   ├── edit.tsx
│   └── view.ts
├── slider/
├── slide/
├── toggle/
├── toggle-content/
└── related-posts/
```

Video editor assets are built in the companion plugin (`wp-content/plugins/aegis`).

## Webpack Configuration

Aegis extends the default `@wordpress/scripts` Webpack config:

```javascript
// webpack.config.js
const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );

module.exports = {
    ...defaultConfig,
    entry: {
        ...defaultConfig.entry(),
        // Additional entry points if needed
    },
};
```

The default configuration handles:

- Block JavaScript compilation (JSX, ES modules).
- CSS extraction and processing.
- Asset copying and hashing.
- WordPress dependency extraction.

## CSS Processing

CSS files are processed through PostCSS with the following plugins:

| Plugin | Purpose |
|--------|---------|
| Autoprefixer | Adds vendor prefixes for browser compatibility |
| postcss-import | Allows `@import` statements |
| cssnano (production) | Minifies CSS output |

### Writing CSS

Aegis stylesheets use standard CSS with CSS custom properties:

```css
.wp-block-aegis-countdown {
    display: flex;
    gap: var(--wp--preset--spacing--md);
    font-family: var(--wp--preset--font-family--lexend-deca);
}
```

## JavaScript Processing

JavaScript is compiled through Babel with WordPress presets:

- JSX transformation for React-based block editor components.
- Modern JavaScript (ES2020+) transpiled for browser compatibility.
- WordPress package externals (wp.element, wp.blocks, and others) are not bundled.

### Writing JavaScript

Block scripts use WordPress packages as externals:

```javascript
import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps } from '@wordpress/block-editor';

registerBlockType( 'aegis/countdown', {
    edit: Edit,
    save: Save,
} );
```

## Cleaning Build Output

To remove all compiled assets:

```bash
npm run clean
```

Or manually delete the `build/` directory.

## Environment Variables

| Variable | Purpose | Default |
|----------|---------|---------|
| `NODE_ENV` | Build mode | `production` (build) / `development` (dev) |
| `SCRIPT_DEBUG` | WordPress debug mode | Loads unminified assets |

## Troubleshooting

### Build Fails with Module Errors

```bash
rm -rf node_modules
npm install
npm run build
```

### Stale Build Output

```bash
npm run clean
npm run build
```

### Watch Mode Not Detecting Changes

- Ensure your editor saves files to disk (not just to memory).
- Check that file watchers are not being blocked (increase `fs.inotify.max_user_watches` on Linux).
- Restart the watcher.

## Next Steps

- [[development-setup]] — Complete local setup guide.
- [[code-quality]] — Linting the compiled output.
- [[testing]] — Running tests after building.
- [[deployment]] — Deploying built assets to production.
