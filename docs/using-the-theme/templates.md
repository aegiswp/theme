# Templates

Aegis provides 50 templates that control the layout of different page types across your site. Each template is a collection of blocks that defines how content is structured and displayed.

## Understanding Templates

In a block theme, templates are HTML files composed entirely of block markup. They live in the `templates/` directory and determine the layout for specific pages or content types. WordPress automatically selects the appropriate template based on the page being viewed, following the [template hierarchy](https://developer.wordpress.org/themes/basics/template-hierarchy/).

## Available Templates

The theme ships 50 template files. 40 of them are registered in `theme.json` as `customTemplates`, so they show up in the template picker for the post types they list. The full list, with files, post types, and the pattern each one loads, is in the [Template Reference](../reference/template-reference.md).

| Group | Templates |
| --- | --- |
| Hierarchy (10) | Index, Front Page, Blog Home, Page, Single, Archive, Author, Date, Search, 404 |
| Page and post layouts (11) | Blank, Full Width, Page (No Title), Page: Boxed, Page: Hero Minimal, Page: Contact, Page: Landing, Page: With Sidebar, Single: Full Width, Single: No Featured Image, Author: Guest |
| Utility (3) | Maintenance, Coming Soon, Page: Coming Soon |
| Content archives (9) | Category Archives; Category: Books, Events, Podcasts, Portfolio, Recipes, Video; Tag Archives; Tag: Featured |
| WooCommerce (17) | Archive: Product, Single item: Product, Single Product: Landing, Product Search Results, Search: Product, Taxonomy Product Category, Taxonomy Product Tag, Product Attribute, Product Category: Clothing / Digital / Outlet, Page: Cart, Page: Checkout, Page: Checkout Multi-Step, Order Confirmation, Page: My Account, Page: Wishlist |

WooCommerce templates are hidden from the Site Editor template picker when WooCommerce is inactive. Page: Wishlist is also hidden unless TI WooCommerce Wishlist is active.

Each template file loads one pattern from `patterns/template/` (for example `template-single`). To change a template's default layout in code, edit that pattern.

## Using Templates

### Assigning a Template to a Page

When editing a page in the block editor:

1. Open the **Page** tab in the right sidebar.
2. Under **Template**, click the current template name.
3. Select a different template from the list.
4. Update or publish the page.

### Editing a Template

To modify the structure of a template:

1. Navigate to **Appearance → Editor**.
2. Click **Templates** in the left sidebar.
3. Select the template you want to edit.
4. Add, remove, or rearrange blocks.
5. Click **Save**.

### Creating a Custom Template

1. In the Site Editor, go to **Templates**.
2. Click the **+** button to add a new template.
3. Choose what the template applies to (specific page, post type, or taxonomy).
4. Build the layout using blocks and patterns.
5. Save the template.

## Template Structure

Most Aegis templates follow a consistent structure:

```
┌─────────────────────────────────────┐
│ Template Part: Header               │
├─────────────────────────────────────┤
│                                     │
│ Main Content Area                   │
│                                     │
│ (varies by template type)           │
│                                     │
├─────────────────────────────────────┤
│ Template Part: Footer               │
└─────────────────────────────────────┘
```

The **Blank** template is an exception. It has no header or footer, only a skip link and a `<main>` group with Post Content.

## Template Hierarchy in Aegis

WordPress uses the following priority when selecting a template:

1. **Custom template** assigned to a specific page or post.
2. **Specific template** matching the content type (for example, `single.html` for posts).
3. **Archive template** for listing pages.
4. **Index template** as the ultimate fallback.

## WooCommerce Template Details

### Multi-Step Checkout

The multi-step checkout template (`page-checkout-multi-step.html`) splits the checkout process into distinct stages:

1. **Shipping** — Customer shipping address and method selection.
2. **Payment** — Payment method and billing details.
3. **Review** — Order summary and confirmation.

This template requires WooCommerce to be active and **Aegis → Integrations → E-commerce → WooCommerce** on. Checkout CSS/JS live in the companion plugin and load on this template (or when the page contains `aegis-checkout-multi-step` markup). See [WooCommerce Checkout](../../../../plugins/aegis/docs/features/woocommerce-checkout.md).

### Product Templates

WooCommerce templates are hidden from the template list when WooCommerce is inactive. Cart, checkout, my-account, and other commerce templates use the same gating (not only product-archive templates).

### Wishlist Page

The **Wishlist** template requires **WooCommerce**, the **Aegis companion plugin**, and [TI WooCommerce Wishlist](https://wordpress.org/plugins/ti-woocommerce-wishlist/):

1. Install and activate **WooCommerce**, the **Aegis plugin**, and **TI WooCommerce Wishlist**.
2. Create a new page (for example, **Wishlist**).
3. In the page sidebar, set **Template** to **Wishlist** (visible only when dependencies are active).
4. Publish the page — the template loads the companion plugin's `template-page-wishlist` pattern with the `[ti_wishlisttable]` shortcode.
5. Link to the page from your navigation or My Account area as needed.

See [[woocommerce-integration#wishlist-ti-woocommerce-wishlist]] for shortcode details and troubleshooting.

## bbPress

There is no dedicated `single-forum.html` (or similar) template. When **Aegis → Integrations → Community → bbPress** is on, the framework wraps bbPress views in the **Page** template: `locate_block_template( $template, 'page', array( 'page.php' ) )`. WordPress resolves `templates/page.html`; the PHP fallback from bbPress theme-compat is kept. Editing **Page** in the Site Editor is what changes the forum chrome (header, footer, and surrounding layout).

## Maintenance and Coming Soon

Aegis includes utility templates for planned outages and launch pages:

| Template | Filename | Description |
|----------|----------|-------------|
| Maintenance | `maintenance.html` | On-brand maintenance page (loads `template-maintenance`). |
| Coming Soon | `coming-soon.html` | Site-wide coming soon layout. |
| Page Coming Soon | `page-coming-soon.html` | Page-assigned coming soon layout. |

Forcing the Maintenance template for logged-out visitors requires a small `template_include` hook in a child theme or plugin. See [[maintenance-mode]] for the full advanced how-to and code snippets.

## Customization Tips

- Use the **Full Width** template for portfolio or gallery pages that benefit from wider layouts.
- Use the **Blank** template for marketing landing pages where you want complete control.
- Use the **Page (No Title)** template when the page content includes its own heading design.
- Duplicate an existing template as a starting point for custom layouts.

## Next Steps

- [[template-parts]] — Learn about the header, footer, and sidebar parts used within templates.
- [[template-reference]] — View the complete template reference table.
- [[site-editor]] — Learn how to edit templates in the Site Editor.
