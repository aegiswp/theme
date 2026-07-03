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
7. **Version bump** — Update version numbers in `style.css`, `package.json`, and `readme.txt`.
8. **Build** — Run `npm run build` for production assets.
9. **Tag** — Create a Git tag with the version number.
10. **GitHub Release** — Create a release with the built `.zip` file.
11. **Update checker fires** — Sites with Aegis see the update notification.

### Building a Release Package

```bash
# Ensure clean state
git checkout main
git pull origin main

# Install production dependencies
composer install --no-dev
npm ci
npm run build

# Create the release zip
npm run package
```

The package command creates a distributable `.zip` file excluding development files:

- `node_modules/` excluded
- `tests/` excluded
- `.git/` excluded
- Source maps excluded (unless debug release)
- Development configuration files excluded

## Server Deployment

### Requirements

| Requirement | Details |
|-------------|---------|
| PHP | 8.1 or later |
| WordPress | 7.0 or later |
| `vendor/` directory | Must be present (Composer production dependencies) |
| `build/` directory | Must be present (compiled assets) |

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
| `build/` | `node_modules/` |
| `vendor/` (no-dev) | `tests/` |
| `blocks/` (block.json files) | `.git/` |
| `inc/` | `.github/` |
| `parts/` | `assets/` (source files) |
| `patterns/` | `*.config.js` |
| `styles/` | `phpunit.xml.dist` |
| `templates/` | `composer.lock` (optional) |
| `theme.json` | `.wp-env.json` |
| `style.css` | `.editorconfig` |
| `functions.php` | |

### Deployment Checklist

Before deploying to production:

- [ ] All tests pass.
- [ ] Build completes without errors.
- [ ] Version numbers are updated.
- [ ] Changelog is updated.
- [ ] `composer install --no-dev` (no development packages).
- [ ] `npm run build` (production build, not dev).
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

- Ensure the CDN serves files from the `build/` directory.
- Set appropriate cache headers for versioned assets (long TTL).
- Purge CDN cache after deployment.
- Fonts and images should be served via CDN for performance.

## Automatic Updates

The theme includes a built-in update mechanism that checks the GitHub repository:

- Checks for new releases periodically.
- Displays update notifications in the WordPress admin.
- Supports one-click update through the admin interface.

This is configured through the `aegis_theme_updater_config` filter.

## Next Steps

- [[contributing]] — How to contribute changes.
- [[building-assets]] — Understanding the build output.
- [[performance]] — Post-deployment performance verification.
- [[common-issues]] — Troubleshooting deployment problems.
