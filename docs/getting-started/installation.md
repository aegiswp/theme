# Installation

This page describes how to install and activate the Aegis theme on your WordPress site.

## Prerequisites

Before installing Aegis, ensure your environment meets the [[requirements]].

## Installation Methods

### Method 1: Upload via WordPress Admin

1. Download `aegis.zip` from the latest Aegis release on the [GitHub Releases page](https://github.com/aegiswp/theme/releases/).
2. Log in to your WordPress admin dashboard.
3. Navigate to **Appearance → Themes**.
4. Click the **Add New Theme** button at the top of the page.
5. Click the **Upload Theme** button.
6. Click **Choose File** and select the downloaded `.zip` file.
7. Click **Install Now**.
8. Once the installation is complete, click **Activate**.

### Method 2: Manual Installation via FTP or File Manager

1. Download `aegis.zip` from the latest Aegis release on the [GitHub Releases page](https://github.com/aegiswp/theme/releases/).
2. Extract the `.zip` file on your local machine.
3. Connect to your server via FTP or use your hosting control panel file manager.
4. Navigate to the `wp-content/themes/` directory.
5. Upload the extracted `aegis` folder into the `themes` directory.
6. Log in to your WordPress admin dashboard.
7. Navigate to **Appearance → Themes**.
8. Locate the Aegis theme and click **Activate**.

### Method 3: Using Composer

If your project uses Composer for dependency management, you can install Aegis as a package:

```bash
composer require aegiswp/theme
```

Ensure the theme is placed in the correct `wp-content/themes/aegis` directory.

### Method 4: Using Git (Development)

For development purposes, you can clone the repository directly:

```bash
cd wp-content/themes/
git clone https://github.com/aegiswp/theme.git aegis
cd aegis
composer install
npm install
npm run build
```

## Post-Installation Steps

### Install PHP Dependencies

The Aegis theme requires PHP dependencies managed by Composer. The `vendor/` directory must exist in the theme folder for the theme to function correctly.

If you installed Aegis from a release package, the `vendor/` directory is already included. If you cloned the repository, run:

```bash
composer install --no-dev
```

> **Important:** Deploying the theme without the `vendor/` directory will cause a fatal error when WordPress attempts to load the theme.

### Verify Activation

After activating Aegis:

1. Visit your site frontend to confirm the theme is rendering correctly.
2. Navigate to **Appearance → Editor** to access the Site Editor.
3. Check that block patterns are available in the block inserter.

### Optional: Install Companion Plugins

The theme works standalone (templates, patterns, theme blocks). For Map, Modal, the Aegis admin dashboard, integrations (including **Community → bbPress** and **SEO**), snippets, conditionals, and analytics, install the companion plugins:

- **Aegis Plugin** (free) — [docs](../../../../plugins/aegis/docs/getting-started/installation.md) · [Wiki](https://github.com/aegiswp/plugin/wiki)
- **Aegis Pro** — Coming soon. Requires the Aegis theme; [docs](../../../../plugins/aegis-pro/docs/getting-started/installation.md) · [Wiki](https://github.com/aegiswp/pro/wiki)

#### Installing the Companion Plugin From the Theme Notice

While the companion plugin is inactive, **Appearance → Themes** shows an admin notice to administrators who can install plugins.

- If the plugin is not installed, **Install** downloads and installs the latest release from GitHub: `https://github.com/aegiswp/plugin/releases/latest/download/aegis.zip`. The plugin is not hosted on WordPress.org.
- If the plugin is installed but inactive, **Activate** turns it on.
- After install or activation, you land on the Aegis dashboard.
- If the automatic install fails, the notice links to the [plugin releases page](https://github.com/aegiswp/plugin/releases). Download `aegis.zip` there and upload it under **Plugins → Add New Plugin → Upload Plugin**.
- Dismissing the notice hides it for your user account.

Developers can pin a release or use a mirror with the `aegis_companion_package_url` filter. See [Hooks and Filters](../reference/hooks-and-filters.md#theme-filters).

## Next Steps

- [[quick-start-guide]] — Learn how to start building with Aegis.
- [[site-editor]] — Explore the Full Site Editing experience.
- [[block-patterns]] — Discover the available patterns for rapid page building.
- [Aegis Plugin docs](../../../../plugins/aegis/docs/home.md) · [Wiki](https://github.com/aegiswp/plugin/wiki) — Map, Modal, admin, integrations.
- [Aegis Pro docs](../../../../plugins/aegis-pro/docs/home.md) · [Wiki](https://github.com/aegiswp/pro/wiki) — Video, query, Pro blocks.
