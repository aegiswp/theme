# Deployment

This page documents the release process and deployment strategies for the Aegis theme, from development to production.

## Release Process

### Versioning

Aegis follows semantic versioning (SemVer):

| Type | Format | When |
|------|--------|------|
| Patch | 1.0.x | Bug fixes, documentation updates |
| Minor | 1.x.0 | New features, backwards compatible |
| Major | x.0.0 | Breaking changes, major rewrites |

### Release Workflow

1. **Feature development** — Work happens on feature branches.
2. **Pull request** — Submit PR to `develop` branch.
3. **Code review** — PR is reviewed by maintainers.
4. **CI passes** — All tests, linting, and checks must pass.
5. **Merge to develop** — PR is merged into the development branch.
6. **Release preparation** — When ready, `develop` is merged to `main`.
7. **Version bump** — Update version numbers in `style.css`, `package.json`, and `readme.txt`, and update `CHANGELOG.md`.
8. **Tag** — Push a tag in the form `v1.2.3` (or `v1.2.3-rc1`).
9. **Automated build** — The tag starts `.github/workflows/release.yml`, which builds and uploads the package (see below).
10. **Publish** — Review the draft release on GitHub and publish it. Sites update only after the release is published.

The companion plugin is released separately from its own repository (`aegiswp/plugin`).

### The Release Workflow (`release.yml`)

Pushing a `v*` tag runs **Release Aegis Theme**:

1. Checks that the tag is semantic (`v1.2.3` or `v1.2.3-rc1`).
2. Runs `npm ci` and `npm run build` (Node 20).
3. Installs Composer dependencies with dev packages (PHP 8.3) and runs `npm run lint:js`, `npm run lint:css`, `vendor/bin/phpcs`, and `composer validate --strict`.
4. Reinstalls Composer dependencies with `--no-dev --optimize-autoloader`.
5. Copies the theme into an `aegis/` folder with `rsync`, skipping everything in `.distignore`.
6. Checks that `aegis/style.css`, `functions.php`, `vendor/autoload.php`, `screenshot.png`, and `src/Blocks/` exist, and that `tools/`, `vendor/aegis/wpaudit/`, `languages/`, and `LICENSE` are **not** in the package.
7. Zips it as `aegis.zip` (the zip's root folder is `aegis/`) and writes `aegis.zip.sha256`.
8. Creates a **draft** GitHub release with both files attached and generated release notes.

The theme's GitHub updater installs the `aegis.zip` asset from the latest **published** release, so a draft is never offered to sites. Keep the asset name `aegis.zip` and the `aegis/` root folder: the updater and the upload installer both rely on them. See [[updating]].

### Building a Release Package Locally

There is no `npm run package` script. To reproduce the workflow's package on your machine:

```bash
# Ensure clean state
git checkout main
git pull origin main

# Build assets and install production dependencies
npm ci
npm run build
composer install --no-dev --optimize-autoloader

# Copy into an aegis/ folder, skipping .distignore entries, then zip it
rsync -am ./ aegis/ --exclude-from='.distignore'
zip -r aegis.zip aegis
```

`.distignore` keeps these out of the package, among others:

- `node_modules/`, `tests/`, `.git/`, and `.github/`
- `docs/`, `tools/`, `build/`, `languages/`, and `LICENSE`
- Build configuration (`package.json`, `webpack.config.js`, `composer.json`, `phpcs.xml`, `phpunit.xml`)
- TypeScript and SCSS sources and source maps in `src/Blocks/`
- Development-only Composer packages in `vendor/`

## Server Deployment

### Requirements

| Requirement | Details |
|-------------|---------|
| PHP | 8.1 or later |
| WordPress | 7.0 or later |
| `vendor/` directory | Must be present (Composer production dependencies) |
| Compiled block assets | Must be present in `src/Blocks/` (built by `npm run build`) |

### Deployment via Upload

1. Download the release `.zip` from GitHub Releases.
2. Upload through **Appearance → Themes → Add New → Upload**.
3. Activate the theme.

### Deployment via Git

For servers with Git access:

```bash
cd wp-content/themes/aegis
git fetch origin
git checkout v1.0.0  # specific release tag
composer install --no-dev --optimize-autoloader
```

> **Note:** Running `npm run build` on the server is not recommended. Always deploy pre-built assets.

### Deployment via CI/CD

Automated deployment pipeline example:

```yaml
deploy:
  steps:
    - checkout code
    - composer install --no-dev --optimize-autoloader
    - npm ci
    - npm run build
    - rsync to production (excluding dev files)
    - clear caches
```

### Files to Deploy

| Include | Exclude |
|---------|---------|
| `src/` (PHP, plus compiled block JS/CSS and `block.json` in `src/Blocks/`) | `node_modules/` |
| `vendor/` (no-dev) | `tests/` |
| `assets/` (fonts, icons, images) | `.git/`, `.github/` |
| `parts/` | `build/`, `tools/`, `docs/` |
| `patterns/` | `webpack.config.js`, `eslint.config.cjs`, `tsconfig.json` |
| `styles/` | `phpunit.xml`, `phpcs.xml` |
| `templates/` | `composer.json`, `composer.lock`, `package.json` |
| `theme.json`, `style.css`, `functions.php`, `index.php`, `embed-content.php`, `screenshot.png`, `readme.txt` | `.wp-env.json`, `.editorconfig` |

`.distignore` is the full exclusion list.

### Deployment Checklist

Before deploying to production:

- [ ] All tests pass.
- [ ] Build completes without errors.
- [ ] Version numbers are updated.
- [ ] Changelog is updated.
- [ ] `composer install --no-dev` (no development packages).
- [ ] `npm run build` (production build, not `build:dev`).
- [ ] No source maps in production (unless intentional).
- [ ] Backup the production site.

## Post-Deployment

After deploying a new version:

1. **Clear caches** — Purge page cache, object cache, and CDN cache.
2. **Verify the site** — Check the homepage, key pages, and WooCommerce.
3. **Check the error log** — Look for any new PHP errors or warnings.
4. **Test critical paths** — Complete a test purchase (if WooCommerce), submit a form.
5. **Run a Lighthouse audit** — Ensure performance did not regress.

## Rollback Procedure

If a deployment causes issues:

### Via Theme Upload

1. Download the previous release from GitHub Releases.
2. Upload and activate the previous version.

### Via Git

```bash
cd wp-content/themes/aegis
git checkout v1.0.0-previous  # previous release tag
composer install --no-dev --optimize-autoloader
```

### Via Backup

Restore the full site backup taken before deployment.

## Environment-Specific Configuration

### Development

```php
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
define( 'SCRIPT_DEBUG', true );
```

### Staging

```php
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
define( 'SCRIPT_DEBUG', false );
```

### Production

```php
define( 'WP_DEBUG', false );
define( 'SCRIPT_DEBUG', false );
```

## CDN Considerations

When using a CDN:

- Ensure the CDN serves the theme's `src/Blocks/`, `vendor/aegis/*/public/`, and `assets/` files.
- Set appropriate cache headers for versioned assets (long TTL).
- Purge CDN cache after deployment.
- Fonts and images should be served via CDN for performance.

## Next Steps

- [[contributing]] — How to contribute changes.
- [[building-assets]] — Understanding the build output.
- [[performance]] — Post-deployment performance verification.
- [[common-issues]] — Troubleshooting deployment problems.
