# Template Reference

This page provides a complete reference of all 23 templates included in the Aegis theme.

## Core WordPress Templates

| # | Template | Filename | Area | Description |
|---|----------|----------|------|-------------|
| 1 | Index | `index.html` | Blog | The default fallback template. Displays a post list with pagination. |
| 2 | Front Page | `front-page.html` | Homepage | Static homepage when configured in Settings → Reading. |
| 3 | Page | `page.html` | Pages | Default template for static pages. Includes title, content, header, and footer. |
| 4 | Single Post | `single.html` | Posts | Individual blog post view with title, meta, content, and comments. |
| 5 | Archive | `archive.html` | Archives | Displays posts for categories, tags, dates, and custom taxonomies. |
| 6 | Author | `author.html` | Archives | Displays an author bio and their published posts. |
| 7 | Date | `date.html` | Archives | Displays posts filtered by year, month, or day. |
| 8 | Search Results | `search.html` | Search | Shows results matching the visitor search query. |
| 9 | 404 (Not Found) | `404.html` | Error | Displayed when a page does not exist. Includes a search form and helpful links. |

## Custom Page Templates

| # | Template | Filename | Area | Description |
|---|----------|----------|------|-------------|
| 10 | Page (No Title) | `page-no-title.html` | Pages | A page layout that omits the page title block. Useful for landing pages with custom hero sections. |
| 11 | Full Width | `full-width.html` | Pages | Content spans the full wide width (1620px) without sidebar or narrow constraints. |
| 12 | Blank | `blank.html` | Pages | Minimal template with no header, footer, or wrapper. Contains only the Post Content block. |

## WooCommerce Templates

These templates are active only when WooCommerce is installed:

| # | Template | Filename | Area | Description |
|---|----------|----------|------|-------------|
| 13 | Product Archive | `archive-product.html` | Shop | The main shop page. Displays product grid with filtering and sorting. |
| 14 | Single Product | `single-product.html` | Products | Individual product detail page with gallery, price, add-to-cart, and tabs. |
| 15 | Product Search Results | `product-search-results.html` | Search | Results from product-specific searches. |
| 16 | Product Category | `taxonomy-product_cat.html` | Taxonomy | Products filtered by a specific WooCommerce category. |
| 17 | Product Tag | `taxonomy-product_tag.html` | Taxonomy | Products filtered by a specific WooCommerce tag. |
| 18 | Cart | `page-cart.html` | Checkout | Shopping cart with item list, quantities, and totals. |
| 19 | Checkout | `page-checkout.html` | Checkout | Standard single-page checkout with all fields on one page. |
| 20 | Multi-Step Checkout | `page-checkout-multi-step.html` | Checkout | Three-step checkout: Shipping → Payment → Review. |
| 21 | Order Confirmation | `order-confirmation.html` | Checkout | Thank-you page displayed after successful order placement. |
| 22 | My Account | `page-my-account.html` | Account | Customer account dashboard: orders, addresses, downloads, and settings. |
| 23 | Wishlist | `page-wishlist.html` | Account | Customer product wishlist with saved items. |

## Template Structure

### Standard Templates

Most templates follow this block structure:

```
Template Part: Header (parts/header.html)
└── Group (main wrapper)
    └── Content area (varies by template)
Template Part: Footer (parts/footer.html)
```

### Blank Template

The Blank template contains minimal structure:

```
Post Content block only
```

No header, footer, or wrapper blocks are included.

## Template Hierarchy

WordPress selects templates in priority order. For Aegis:

| Request Type | Template Priority |
|--------------|-------------------|
| Front page | front-page.html → page.html → index.html |
| Static page | Custom template → page.html → index.html |
| Single post | single.html → index.html |
| Category archive | archive.html → index.html |
| Author archive | author.html → archive.html → index.html |
| Date archive | date.html → archive.html → index.html |
| Search | search.html → index.html |
| 404 | 404.html → index.html |
| WooCommerce shop | archive-product.html → archive.html → index.html |
| WooCommerce product | single-product.html → single.html → index.html |

## Assigning Templates to Pages

1. Edit a page in the block editor.
2. Open the **Page** tab in the right sidebar.
3. Click the template name under **Template**.
4. Select the desired template from the list.
5. Update the page.

## Editing Templates

1. Navigate to **Appearance → Editor → Templates**.
2. Select a template to edit.
3. Modify the block structure.
4. Save changes.

To revert a modified template to its original state:

1. Select the template in the Site Editor.
2. Click the Options menu (three dots).
3. Select **Clear customizations**.

## Related Pages

- [[templates]] — Detailed usage guide for templates.
- [[template-parts]] — Header, footer, and sidebar parts used in templates.
- [[woocommerce-integration]] — WooCommerce template details.
- [[site-editor]] — How to edit templates in the editor.
