# Updating

This page explains how to update the Aegis theme to the latest version safely and efficiently.

## Before Updating

Before performing any update, take the following precautions:

1. **Back up your site** — Create a full backup of your database and files.
2. **Check the changelog** — Review the [release notes](https://github.com/aegiswp/theme/releases) for breaking changes.
3. **Test in staging** — If possible, test the update on a staging environment first.
4. **Check plugin compatibility** — Ensure your companion plugins (Aegis Plugin, Aegis Pro) are compatible with the new theme version.

## Update Methods

### Method 1: Manual Update via Upload

1. Download the latest release `.zip` from the [GitHub Releases page](https://github.com/aegiswp/theme/releases/).
2. Navigate to **Appearance → Themes**.
3. Click **Add New Theme** and then **Upload Theme**.
4. Select the downloaded `.zip` file.
5. Click **Install Now**.
6. When prompted, choose **Replace current with uploaded** to overwrite the existing installation.
7. Click **Activate** if the theme was deactivated during the process.

### Method 2: Manual Update via FTP

1. Download and extract the latest release.
2. Connect to your server via FTP.
3. Navigate to `wp-content/themes/`.
4. Rename the existing `aegis` folder to `aegis-backup` (as a safety measure).
5. Upload the new `aegis` folder.
6. Verify the site works correctly.
7. Delete the `aegis-backup` folder once confirmed.

### Method 3: Using Git (Development)

If you installed Aegis via Git:

```bash
cd wp-content/themes/aegis
git fetch origin
git checkout main
git pull origin main
composer install --no-dev
npm install
npm run build
```

### Method 4: Using Composer

If you manage Aegis through Composer:

```bash
composer update aegiswp/theme
```

## Updating Companion Plugins

When updating the theme, you should also check for updates to companion plugins:

| Plugin | Update Location |
|--------|----------------|
| Aegis Plugin (free) | **Plugins → Installed Plugins** |
| Aegis Pro | **Plugins → Installed Plugins** or license portal |

Always update the theme and plugins together to ensure compatibility.

## Version Compatibility

Aegis follows semantic versioning (SemVer):

| Version Change | Meaning | Action Required |
|----------------|---------|-----------------|
| Patch (1.0.x) | Bug fixes, no breaking changes | Safe to update immediately |
| Minor (1.x.0) | New features, backwards compatible | Review new features, safe to update |
| Major (x.0.0) | Breaking changes possible | Read migration guide before updating |

## What Gets Preserved During Updates

The following customizations are preserved when you update:

- **Global Styles** — Colors, typography, and layout changes made in the Site Editor.
- **Template modifications** — Custom templates created in the Site Editor.
- **User-created patterns** — Patterns you have created yourself.
- **Database content** — Posts, pages, and media are never affected.
- **Plugin settings** — Companion plugin configurations remain intact.

## What May Be Overwritten

The following are overwritten during an update:

- **Theme files** — All PHP, JSON, and asset files in the theme directory.
- **Default templates** — Original templates are replaced with updated versions.
- **Default patterns** — Bundled patterns are replaced with updated versions.

> **Note:** If you have modified theme files directly (not recommended), those changes will be lost during an update. Always use child themes or the Site Editor for customizations.

## Troubleshooting Updates

### Update Failed

If an update fails:

1. Check file permissions on the `wp-content/themes/` directory.
2. Ensure sufficient disk space is available.
3. Check the PHP error log for specific error messages.
4. Try the manual FTP method as a fallback.

### Site Broken After Update

If your site does not work correctly after updating:

1. Clear all caches (browser, plugin, server).
2. Deactivate and reactivate the theme.
3. Check **Tools → Site Health** for any reported issues.
4. If the issue persists, restore your backup and report the issue on [GitHub](https://github.com/aegiswp/theme/issues).

### Rolling Back

To revert to a previous version:

1. Download the previous release from [GitHub Releases](https://github.com/aegiswp/theme/releases/).
2. Follow the manual update process (Method 1 or Method 2) using the older version file.

## Staying Informed

To be notified of new releases:

- Watch the [GitHub repository](https://github.com/aegiswp/theme) for release notifications.
- Follow [@aegiswp](https://github.com/aegiswp) on GitHub.

## Next Steps

- [[requirements]] — Verify your environment meets the latest requirements.
- [[common-issues]] — Solutions to common problems after updating.
