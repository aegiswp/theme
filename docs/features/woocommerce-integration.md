# WooCommerce Integration

<<<<<<< Updated upstream
Aegis provides deep integration with WooCommerce, including dedicated templates, block patterns, and a multi-step checkout experience. The theme is designed to work with WooCommerce out of the box without additional configuration.
=======
Aegis provides deep integration with WooCommerce, including dedicated FSE templates, a multi-step checkout experience, and commerce block patterns registered by the companion plugin when WooCommerce is active.
>>>>>>> Stashed changes

## Requirements

- WooCommerce 8.0 or later.
- WordPress 7.0 or later.
- WooCommerce block-based templates enabled (default in current versions).
<<<<<<< Updated upstream

## WooCommerce Templates

Aegis includes 11 dedicated WooCommerce templates that replace the default WooCommerce page layouts:
=======
- **Aegis companion plugin** (free) for WooCommerce **block patterns** in the inserter (shop headers, product grids, template patterns).
- **TI WooCommerce Wishlist** (optional) for the Wishlist template and wishlist pattern — see [Wishlist (TI WooCommerce Wishlist)](#wishlist-ti-woocommerce-wishlist).

## WooCommerce Templates

FSE **templates** remain in the theme (`templates/` + `theme.json`). They are **hidden from the Site Editor template picker** when WooCommerce is inactive.

Aegis includes dedicated WooCommerce templates that replace the default WooCommerce page layouts:
>>>>>>> Stashed changes

| Template | Filename | Purpose |
|----------|----------|---------|
| Product Archive | `archive-product.html` | The main shop page showing all products. |
| Single Product | `single-product.html` | Individual product detail pages. |
| Product Search Results | `product-search-results.html` | Results from product-specific searches. |
| Product Category | `taxonomy-product_cat.html` | Products filtered by category. |
| Product Tag | `taxonomy-product_tag.html` | Products filtered by tag. |
| Cart | `page-cart.html` | Shopping cart page. |
| Checkout | `page-checkout.html` | Standard single-page checkout. |
| Multi-Step Checkout | `page-checkout-multi-step.html` | Enhanced multi-step checkout flow. |
| Order Confirmation | `order-confirmation.html` | Thank-you page after purchase. |
| My Account | `page-my-account.html` | Customer account dashboard. |
<<<<<<< Updated upstream
| Wishlist | `page-wishlist.html` | Customer product wishlist. |
=======
| Wishlist | `page-wishlist.html` | Customer product wishlist (requires TI WooCommerce Wishlist + companion plugin pattern). |

## WooCommerce Block Patterns (Companion Plugin)

Block patterns that contain `wp:woocommerce/*` blocks (product grids, store headers, cart/checkout template patterns, etc.) are registered by the **Aegis companion plugin** from `wp-content/plugins/aegis/patterns/woocommerce/` **only when WooCommerce is active**. This prevents missing-block errors in the Site Editor when WooCommerce is not installed.

Generic commerce **marketing** patterns without WooCommerce blocks (for example trust badges, shipping info) remain in the theme `patterns/commerce/` directory.

See [Plugin Patterns](../../plugins/aegis/docs/features/plugin-patterns.md).
>>>>>>> Stashed changes

## Multi-Step Checkout

The multi-step checkout template splits the checkout process into distinct, manageable steps that reduce cognitive load and improve completion rates.

### Steps

1. **Shipping** — Customer enters shipping address and selects a shipping method.
2. **Payment** — Customer provides payment details and billing information.
3. **Review** — Customer reviews the complete order before confirming.

### Enabling Multi-Step Checkout

1. Open the Site Editor (**Appearance → Editor**).
2. Navigate to **Templates**.
3. Locate the **Multi-Step Checkout** template.
4. Ensure it is assigned to your checkout page (or create a new page and assign the template).

Alternatively, edit your checkout page and select the **Multi-Step Checkout** template from the page template selector.

> **Note:** Multi-step checkout assets load when the WooCommerce integration is enabled at **Aegis → Integrations**. See [WooCommerce Checkout](../../plugins/aegis/docs/features/woocommerce-checkout.md).

### Multi-Step Checkout Features

- Visual progress indicator showing current step.
- Form validation at each step before advancing.
- Back navigation to previous steps without data loss.
- Order summary sidebar visible throughout.
- Responsive layout — steps stack vertically on mobile.
- Accessible step navigation with ARIA landmarks.

## Product Archive (Shop Page)

The product archive template includes:

- Configurable product grid (2, 3, or 4 columns).
- Product filtering by category and attributes.
- Sorting options (price, popularity, date, rating).
- Pagination or load-more button.
- Sidebar for product filters (optional).

### Customizing the Shop Layout

1. Open the Site Editor.
2. Navigate to **Templates → Product Archive**.
3. Edit the product grid layout, filters, and sorting blocks.
4. Save your changes.

## Single Product Page

The single product template provides a complete product detail experience:

- Product image gallery with zoom.
- Product title, price, and description.
- Add-to-cart button with quantity selector.
- Product meta (SKU, categories, tags).
- Product tabs (description, additional information, reviews).
- Related products section.
- Upsell products section.

<<<<<<< Updated upstream
=======
## Wishlist (TI WooCommerce Wishlist)

The **Wishlist** template (`page-wishlist.html`) provides a styled layout for saved products. It requires:

- The free [TI WooCommerce Wishlist](https://wordpress.org/plugins/ti-woocommerce-wishlist/) plugin
- **WooCommerce** active
- The **Aegis companion plugin** (registers the `template-page-wishlist` pattern when both WooCommerce and TI Wishlist are active)

The wishlist template is **hidden from the template picker** when TI Wishlist or WooCommerce is inactive.

### Setup

1. Install and activate **TI WooCommerce Wishlist**.
2. Create a page titled **Wishlist** (or your preferred title).
3. Assign the **Wishlist** template to that page (**Page → Template → Wishlist**).
4. Publish the page.
5. Optional: add a link to the page in your header navigation or account menu.

The template pattern renders the `[ti_wishlisttable]` shortcode, which displays the customer's saved products. The **Continue Shopping** button links to the WooCommerce shop page when WooCommerce is active.

### Shortcode

| Shortcode | Purpose |
|-----------|---------|
| `[ti_wishlisttable]` | Displays the wishlist table on the wishlist page. |

If you customize the template in the Site Editor, keep the Shortcode block with `[ti_wishlisttable]` in the main content area.

### Wishlist Troubleshooting

**Wishlist page is empty or shows raw shortcode text**

- Confirm **TI WooCommerce Wishlist** is installed and activated.
- Verify the page uses the **Wishlist** template (not the default Page template).
- Ensure the Shortcode block contains `[ti_wishlisttable]` exactly.
- Clear page and object caches after installing the plugin.

**Add to wishlist button missing on product pages**

- Check **TI WooCommerce Wishlist → Settings** for button placement and visibility options.
- Confirm the single product template still includes product action blocks.

>>>>>>> Stashed changes
## WooCommerce Block Patterns

Aegis includes product-focused patterns in the **Commerce** and **Product** categories:

| Pattern Type | Description |
|--------------|-------------|
| Product grids | Showcase featured products in various layouts. |
| Product hero | Large featured product with CTA. |
| Sale banners | Promotional banners for discounts. |
| Category navigation | Visual category browsing grids. |
| Trust signals | Shipping info, return policy, guarantee badges. |
| Cart cross-sell | Recommended products for cart page. |

## WooCommerce Styling

All WooCommerce elements are styled to match the active style variation:

- **Buttons** — Add-to-cart and checkout buttons use the primary color.
- **Forms** — Input fields, selects, and labels use theme typography and spacing.
- **Notifications** — Success, error, and info messages use the status color tokens.
- **Badges** — Sale badges, out-of-stock indicators follow the design system.
- **Tables** — Cart and order tables use the theme table styling.

### Price Display

Prices are styled with:

- Regular price in standard body text.
- Sale price emphasized with the Error (red) color token.
- Original price shown with strikethrough.

## WooCommerce and Dark Mode

WooCommerce templates and elements fully support dark mode:

- Product cards adapt backgrounds and borders.
- Form inputs switch to dark-appropriate styling.
- Notification colors adjust for dark backgrounds.
- Images maintain their appearance while surrounding UI adapts.

See [[dark-mode]] for dark mode configuration.

## Performance

WooCommerce pages use the same conditional asset loading as the rest of Aegis:

- WooCommerce-specific styles load only on WooCommerce pages.
- Cart and checkout scripts load only when needed.
- Product images use lazy loading.
- The facade pattern applies to product videos.

See [[performance]] for the full performance strategy.

## Customization Tips

### Customizing the Cart Page

1. Edit the **Cart** template in the Site Editor.
2. Add cross-sell patterns above or below the cart block.
3. Include trust signal patterns (shipping info, guarantees).

### Customizing the Checkout Page

1. Edit the **Checkout** or **Multi-Step Checkout** template.
2. Add a progress bar if not already present.
3. Include trust badges near the payment form.

### Adding a Mini Cart

Include the WooCommerce Mini Cart block in your header template part:

1. Edit the Header template part.
2. Insert the **Mini Cart** block.
3. Position it near the navigation.
4. Save.

## Troubleshooting

### WooCommerce Templates Not Appearing

- Ensure WooCommerce is activated.
- Clear any page caches.
- Check that WooCommerce block templates are enabled (not legacy PHP templates).

### Checkout Not Working

- Verify that WooCommerce pages (Cart, Checkout, My Account) are assigned in **WooCommerce → Settings → Advanced**.
- Ensure the correct template is assigned to each page.

## Next Steps

- [[templates]] — See all available templates including WooCommerce.
- [[plugin-integrations]] — Other supported plugin integrations.
- [[performance]] — Performance optimizations for WooCommerce.
- [[block-patterns]] — Browse the Commerce and Product pattern categories.
