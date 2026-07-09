# Templates

Aegis provides 23 templates that control the layout of different page types across your site. Each template is a collection of blocks that defines how content is structured and displayed.

## Understanding Templates

In a block theme, templates are HTML files composed entirely of block markup. They live in the `templates/` directory and determine the layout for specific pages or content types. WordPress automatically selects the appropriate template based on the page being viewed, following the [template hierarchy](https://developer.wordpress.org/themes/basics/template-hierarchy/).

## Available Templates

### Core WordPress Templates

| Template | Filename | Description |
|----------|----------|-------------|
| Index | `index.html` | The fallback template used when no more specific template is available. Displays a standard blog layout. |
| Front Page | `front-page.html` | The site homepage when configured to show a static page under **Settings → Reading**. |
| Page | `page.html` | The default template for static pages. |
| Single Post | `single.html` | The template for individual blog posts. |
| Archive | `archive.html` | Used for category, tag, date, and author archive listings. |
| Author | `author.html` | Displays posts by a specific author with author information. |
| Date | `date.html` | Displays posts filtered by date (year, month, or day). |
| Search Results | `search.html` | Displays search results when a visitor uses the site search. |
| 404 (Not Found) | `404.html` | Displayed when a requested page does not exist. |

### Custom Page Templates

| Template | Filename | Description |
|----------|----------|-------------|
| Page (No Title) | `page-no-title.html` | A page template that omits the page title, useful for landing pages. |
| Full Width | `full-width.html` | A page template without sidebar constraints, spanning the full viewport. |
| Blank | `blank.html` | A minimal template with no header, footer, or surrounding structure. Ideal for custom landing pages and sales pages. |

### WooCommerce Templates

| Template | Filename | Description |
|----------|----------|-------------|
| Product Archive | `archive-product.html` | The main shop page displaying all products. |
| Single Product | `single-product.html` | Individual product detail pages. |
| Product Search Results | `product-search-results.html` | Displays results from a product-specific search. |
| Product Category | `taxonomy-product_cat.html` | Products filtered by category taxonomy. |
| Product Tag | `taxonomy-product_tag.html` | Products filtered by tag taxonomy. |
| Cart | `page-cart.html` | The shopping cart page. |
| Checkout | `page-checkout.html` | The standard single-page checkout. |
| Multi-Step Checkout | `page-checkout-multi-step.html` | An enhanced checkout split across multiple steps for improved user experience. |
| Order Confirmation | `order-confirmation.html` | Displayed after a successful order is placed. |
| My Account | `page-my-account.html` | Customer account dashboard and management pages. |
| Wishlist | `page-wishlist.html` | Customer product wishlist page. |

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

The **Blank** template is an exception — it contains only a Post Content block with no header or footer.

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

This template requires WooCommerce to be active and configured.

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

## Customization Tips

- Use the **Full Width** template for portfolio or gallery pages that benefit from wider layouts.
- Use the **Blank** template for marketing landing pages where you want complete control.
- Use the **Page (No Title)** template when the page content includes its own heading design.
- Duplicate an existing template as a starting point for custom layouts.

## Next Steps

- [[template-parts]] — Learn about the header, footer, and sidebar parts used within templates.
- [[template-reference]] — View the complete template reference table.
- [[site-editor]] — Learn how to edit templates in the Site Editor.
