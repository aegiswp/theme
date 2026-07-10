# Common Issues

This page documents frequently encountered problems when using the Aegis theme and their solutions.

## Installation Issues

### Fatal Error After Activation

**Symptom:** A white screen or PHP fatal error appears after activating Aegis.

**Cause:** The `vendor/` directory is missing. Aegis requires Composer dependencies to function.

**Solution:**

1. Connect to your server via FTP or file manager.
2. Verify that the `vendor/` directory exists inside `wp-content/themes/aegis/`.
3. If missing, download the theme from the [GitHub Releases page](https://github.com/aegiswp/theme/releases/) (release packages include `vendor/`).
4. Alternatively, run `composer install --no-dev` in the theme directory if you have SSH access.

### Theme Does Not Appear in Theme List

**Symptom:** Aegis does not show up under **Appearance → Themes**.

**Cause:** The theme folder may be nested incorrectly or the `style.css` header is not readable.

**Solution:**

1. Verify the theme is located at `wp-content/themes/aegis/style.css` (not nested deeper).
2. Check file permissions — WordPress needs read access to the theme directory.
3. Ensure the folder name is `aegis` (lowercase).

### "This theme requires WordPress 7.0"

**Symptom:** WordPress prevents activation with a version requirement message.

**Cause:** Your WordPress version is older than the minimum required version.

**Solution:**

Update WordPress to version 7.0 or later via **Dashboard → Updates**.

### "This theme requires PHP 8.1"

**Symptom:** WordPress prevents activation with a PHP version requirement message.

**Cause:** Your server PHP version is older than 8.1.

**Solution:**

1. Check your PHP version in **Tools → Site Health → Info → Server**.
2. Contact your hosting provider to upgrade PHP, or change the PHP version in your hosting control panel.

## Editor Issues

### Block Patterns Not Showing

**Symptom:** The pattern categories are empty or patterns do not appear in the inserter.

**Cause:** Pattern files may not have loaded correctly, or WooCommerce/plugin patterns are gated.

**Solution:**

1. Clear all caches (browser, page cache plugin, server cache).
2. Deactivate and reactivate the theme.
3. Ensure the theme `patterns/` directory exists and contains PHP files.
4. For **WooCommerce shop patterns**, install and activate **WooCommerce** and the **Aegis companion plugin**. See [[faq#why-dont-i-see-shop-or-product-patterns-in-the-inserter]].
5. Check the PHP error log for any pattern registration errors.

### Site Editor Shows Blank Page

**Symptom:** Opening **Appearance → Editor** shows a blank or loading screen.

**Cause:** JavaScript errors, plugin conflicts, or insufficient server resources.

**Solution:**

1. Open browser developer tools (F12) and check the Console tab for errors.
2. Deactivate all plugins except WooCommerce (if used) and test.
3. Increase PHP memory limit to 256 MB.
4. Clear browser cache and try in an incognito window.

### Templates Not Loading Correctly

**Symptom:** Pages show incorrect layouts or missing template parts.

**Cause:** Template customizations may be conflicting, or the template files are corrupted.

**Solution:**

1. In the Site Editor, navigate to **Templates**.
2. Select the problematic template.
3. Click the Options menu (three dots) and select **Clear customizations**.
4. Check if the issue resolves.
5. If not, re-upload the theme files.

## Display Issues

### Fonts Not Loading

**Symptom:** Text displays in a system font instead of Lexend or Lexend Deca.

**Cause:** Font files may be missing, blocked by the server, or a caching issue.

**Solution:**

1. Verify font files exist in `assets/fonts/` within the theme directory.
2. Check browser developer tools Network tab for failed font requests (404 errors).
3. Ensure your server allows serving `.woff2` files (check MIME types).
4. Clear CDN cache if using a CDN.
5. Disable any browser extensions that might block font loading.

### Dark Mode Not Working

**Symptom:** The site stays in light mode regardless of settings.

**Cause:** The `is-style-dark` class is not being applied, or CSS is not loading.

**Solution:**

1. Verify the `is-style-dark` class is applied to the appropriate element.
2. Check if a caching plugin is serving a cached light-mode version.
3. Inspect the element in browser developer tools to confirm the class is present.
4. Clear all caches.

See [[dark-mode]] for configuration details.

### Style Variation Colors Not Applying

**Symptom:** Changing the style variation does not update the site colors.

**Cause:** Browser cache, page cache, or custom Global Styles overrides taking precedence.

**Solution:**

1. Clear browser cache (Ctrl + Shift + R for hard refresh).
2. Clear page cache plugins.
3. Check if you have custom color overrides in **Styles → Colors** that take precedence.
4. Reset Global Styles if necessary (Styles → Options → Reset to defaults).

### Layout Breaking on Mobile

**Symptom:** Content overflows or layout breaks on small screens.

**Cause:** Content (images, tables, code blocks) may exceed the viewport width.

**Solution:**

1. Ensure images do not have fixed widths larger than the viewport.
2. Wrap wide tables in a Group block with overflow handling.
3. Use responsive alignment (avoid fixed pixel widths on blocks).
4. Test with browser developer tools responsive mode.

## Performance Issues

### Slow Page Load

**Symptom:** Pages take a long time to load despite the zero-base loading strategy.

**Cause:** External resources, unoptimized images, or plugin conflicts.

**Solution:**

1. Run a Lighthouse audit to identify bottlenecks.
2. Check for large unoptimized images.
3. Verify that only necessary plugin scripts are loading.
4. Enable page caching.
5. Check server response time (TTFB).
6. See [[performance]] for theme optimization strategies.
7. Enable plugin toggles at **Aegis → Blocks → Performance** (oEmbed, dashicons, heartbeat) — see [[../../plugins/aegis/docs/features/performance|Plugin Performance]].
8. For Query Loops, enable **Performance Optimization** under **Aegis → Blocks → Query Loop**; with Pro, configure per-block options in [[../../plugins/aegis-pro/docs/features/query-performance|Query Performance (Pro)]].

### Assets Loading on Every Page

**Symptom:** Theme CSS/JS files load on pages that do not use the corresponding blocks.

**Cause:** A plugin or custom code may be force-enqueueing styles.

**Solution:**

1. Check if any plugins are enqueueing Aegis styles globally.
2. Verify no custom code uses `wp_enqueue_style` for theme assets unconditionally.
3. Use browser developer tools to identify which styles are loading and trace their source.

## WooCommerce Issues

### WooCommerce Templates Not Loading

**Symptom:** WooCommerce pages use generic layouts instead of the Aegis templates.

**Cause:** WooCommerce may be using legacy PHP templates instead of block templates.

**Solution:**

1. Ensure WooCommerce is updated to version 8.0 or later.
2. Check that WooCommerce block templates are enabled (not legacy mode).
3. Navigate to **WooCommerce → Settings → Advanced** and verify page assignments.
4. Clear WooCommerce transients.

### Multi-Step Checkout Not Working

**Symptom:** The checkout displays as a single page instead of multiple steps.

**Cause:** The page is not using the multi-step checkout template.

**Solution:**

1. Edit the checkout page.
2. Change the template to **Multi-Step Checkout**.
3. Or verify the template is correctly assigned in the Site Editor.

### Wishlist Page Empty

**Symptom:** The wishlist page shows no products, displays `[ti_wishlisttable]` as plain text, or is blank.

**Cause:** The TI WooCommerce Wishlist plugin is missing, inactive, WooCommerce or the Aegis companion plugin is inactive, or the page is not using the Wishlist template.

**Solution:**

1. Install and activate **WooCommerce**, the **Aegis companion plugin**, and [TI WooCommerce Wishlist](https://wordpress.org/plugins/ti-woocommerce-wishlist/).
2. Edit the wishlist page and confirm **Template** is set to **Wishlist** (visible only when dependencies are active).
3. The Wishlist FSE template loads the companion plugin's `template-page-wishlist` pattern, which includes the `[ti_wishlisttable]` shortcode.
4. Clear page and object caches, then reload the page while logged in as a customer who has saved items.

See [[woocommerce-integration#wishlist-ti-woocommerce-wishlist]] for full setup steps.

### Shop or Product Patterns Missing

**Symptom:** WooCommerce block patterns (cart, checkout, product grids, store headers) do not appear in the pattern inserter.

**Cause:** WooCommerce block patterns are registered by the **Aegis companion plugin** only when **WooCommerce is active**.

**Solution:**

1. Install and activate **WooCommerce** and the **Aegis companion plugin**.
2. Confirm WooCommerce block templates are enabled.
3. See [[faq#why-dont-i-see-shop-or-product-patterns-in-the-inserter]] and [Plugin Patterns](../../plugins/aegis/docs/features/plugin-patterns.md).

## Plugin Conflicts

### General Debugging Steps

When you suspect a plugin conflict:

1. Deactivate all plugins.
2. Check if the issue resolves.
3. Reactivate plugins one by one to identify the conflict.
4. Report the conflict on [GitHub](https://github.com/aegiswp/theme/issues) with details.

### Common Conflicting Plugin Types

- **Optimization plugins** that aggressively combine or defer CSS/JS.
- **Security plugins** that block certain file types (fonts, SVGs).
- **Page builder plugins** that inject their own styling frameworks.

## Update Issues

See [[updating]] for detailed update troubleshooting, including failed updates and rollback procedures.

## Getting Help

If your issue is not listed here:

1. Search the [GitHub Issues](https://github.com/aegiswp/theme/issues) for similar reports.
2. Check the [[faq]] for additional answers.
3. Open a new issue with:
   - WordPress version
   - PHP version
   - Aegis version
   - Steps to reproduce
   - Expected vs. actual behavior
   - Error messages (from PHP error log or browser console)

## Related Pages

- [[faq]] — Frequently asked questions.
- [[updating]] — Update troubleshooting.
- [[requirements]] — Verify system requirements.
- [[performance]] — Theme performance optimization.
- [[../../plugins/aegis/docs/features/performance|Plugin Performance]] — Site-wide and Query Loop toggles.
