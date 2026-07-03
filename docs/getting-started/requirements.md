# Requirements

This page outlines the system requirements for running the Aegis theme in production and for local development.

## Production Requirements

The following are the minimum requirements for running Aegis on a live WordPress site:

| Requirement | Minimum Version |
|-------------|-----------------|
| WordPress | 7.0 or later |
| PHP | 8.1 or later |
| MySQL | 5.7 or later (or MariaDB 10.3 or later) |
| HTTPS | Recommended for all sites |

### PHP Extensions

The following PHP extensions are required or recommended:

- **Required:** `json`, `mbstring`, `openssl`
- **Recommended:** `imagick` or `gd` (for image processing), `xml`, `curl`, `zip`

### Server Requirements

- The `vendor/` directory (Composer dependencies) must be present in the theme folder.
- Sufficient memory limit for PHP (128 MB minimum, 256 MB recommended).
- File permissions that allow WordPress to read all theme files.

## Development Requirements

For local development and building theme assets, you will need:

| Requirement | Minimum Version |
|-------------|-----------------|
| Node.js | 20 or later |
| npm | 9 or later |
| PHP | 8.1 or later |
| Composer | 2 or later |
| Git | Any recent version |
| Docker | Latest (for wp-env) |

### Node.js Version

The theme includes an `.nvmrc` file that specifies the recommended Node.js version. If you use `nvm` (Node Version Manager), you can run:

```bash
nvm use
```

This will automatically switch to the correct Node.js version.

### Docker (Optional)

Docker is required only if you plan to use `wp-env` for local development. It is not required for theme building or deployment.

## Browser Support

Aegis supports all modern browsers:

| Browser | Supported Versions |
|---------|-------------------|
| Google Chrome | Latest 2 versions |
| Mozilla Firefox | Latest 2 versions |
| Apple Safari | Latest 2 versions |
| Microsoft Edge | Latest 2 versions |

Aegis does not support Internet Explorer.

## WordPress Plugins

### Required Plugins

Aegis does not require any plugins to function as a theme. All core functionality works without additional plugins.

### Recommended Plugins

| Plugin | Purpose |
|--------|---------|
| **Aegis Plugin** (free) | Map and Modal blocks, admin dashboard, integrations, snippets, conditionals, analytics — [Plugin docs](../../plugins/aegis/docs/home.md) |
| **Aegis Pro** | Hook patterns, video stack, query conditions, Pro blocks — requires Aegis theme — [Pro docs](../../plugins/aegis-pro/docs/home.md) |

### Plugin Requirements (Separate Products)

| Product | WordPress | PHP |
|---------|-----------|-----|
| Aegis theme | 7.0+ | 8.1+ |
| Aegis plugin | 6.9+ | 7.4+ |
| Aegis Pro | 6.4+ (requires Aegis theme 1.0.0+) | 7.4+ |

### Compatible Plugins

Framework styling integrations (when plugin toggles enabled):

- WooCommerce, Fluent Forms, Gravity Forms, LifterLMS, Sensei LMS, Easy Digital Downloads, AffiliateWP, bbPress, Syntax Highlighting Code Block

Additional integrations (ACF, SEO plugins, Google Maps, analytics) are configured in the [Aegis plugin Integrations dashboard](../../plugins/aegis/docs/features/integrations-dashboard.md).

## Checking Your Environment

### Check PHP Version

You can check your PHP version in the WordPress admin under **Tools → Site Health → Info → Server**.

Alternatively, from the command line:

```bash
php --version
```

### Check WordPress Version

Navigate to **Dashboard → Updates** to see your current WordPress version.

### Check Node.js and npm (Development)

```bash
node --version
npm --version
```

## Next Steps

- [[installation]] — Install the Aegis theme.
- [[development-setup]] — Set up a local development environment.
