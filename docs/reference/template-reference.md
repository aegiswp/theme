# Template Reference

Aegis ships **50 templates** in `templates/`. `theme.json` registers 40 of them as `customTemplates` with a title and post types. The other 10 are WordPress hierarchy templates that apply by filename.

Each template file is a thin wrapper: it loads one pattern from `patterns/template/` (for example `templates/single.html` loads `template-single`). Edit the pattern file to change a template's default layout. `front-page.html` is the exception: it places the header and footer parts itself and loads `pages-home` between them.

## Hierarchy Templates

| Template | File | Pattern | Description |
| --- | --- | --- | --- |
| Index | `index.html` | `template-archive` | Fallback for every request. Post loop with pagination. |
| Front Page | `front-page.html` | `pages-home` | Site front page. Header and footer parts around the `pages-home` pattern. |
| Blog Home | `home.html` | `template-home` | Posts page set in Settings → Reading. |
| Page | `page.html` | `template-page` | Default page. Also wraps bbPress forum views when the bbPress integration is on. |
| Single | `single.html` | `template-single` | Default single post with title, meta, content, and comments. |
| Archive | `archive.html` | `template-archive` | Generic archives for categories, tags, and custom taxonomies. |
| Author | `author.html` | `template-author` | Author archives with bio and posts. |
| Date | `date.html` | `template-date` | Year, month, and day archives. |
| Search | `search.html` | `template-search` | Search results. |
| 404 | `404.html` | `template-404` | Not found page. |

## Page and Post Layouts

| Template | File | Post types | Pattern | Notes |
| --- | --- | --- | --- | --- |
| Blank | `blank.html` | page, post | `template-blank` | No header or footer. Skip link and a `<main>` wrapper around Post Content. |
| Full Width | `full-width.html` | page, post | `template-full-width` | Content spans the wide width (1200px). |
| Page (No Title) | `page-no-title.html` | page, post | `template-page-no-title` | Omits the title block. Useful with a custom hero. |
| Page: Boxed | `page-boxed.html` | page, post | `template-page-boxed` |  |
| Page: Hero Minimal | `page-hero-minimal.html` | page | `template-page-hero-minimal` |  |
| Page: Contact | `page-contact.html` | page | `template-page-contact` |  |
| Page: Landing | `page-landing.html` | page | `template-page-landing` |  |
| Page: With Sidebar | `page-with-sidebar.html` | page, post | `template-page-with-sidebar` | Content with the Sidebar template part. |
| Single: Full Width | `single-full-width.html` | post | `template-single-full-width` |  |
| Single: No Featured Image | `single-no-featured-image.html` | post | `template-single-no-featured-image` |  |
| Author: Guest | `author-guest.html` | page | `template-author-guest` | Guest author archives. |

## Utility Templates

| Template | File | Post types | Pattern | Notes |
| --- | --- | --- | --- | --- |
| Maintenance | `maintenance.html` | page | `template-maintenance` | On-brand maintenance page. See [[maintenance-mode]]. |
| Coming Soon | `coming-soon.html` | page | `template-coming-soon` |  |
| Page: Coming Soon | `page-coming-soon.html` | page | `template-page-coming-soon` |  |

## Content Archives

| Template | File | Post types | Pattern | Notes |
| --- | --- | --- | --- | --- |
| Category Archives | `taxonomy-category.html` | page | `template-taxonomy-category` |  |
| Category: Books | `taxonomy-category-books.html` | page | `template-taxonomy-category-books` |  |
| Category: Events | `taxonomy-category-events.html` | page | `template-taxonomy-category-events` |  |
| Category: Podcasts | `taxonomy-category-podcasts.html` | page | `template-taxonomy-category-podcasts` |  |
| Category: Portfolio | `taxonomy-category-portfolio.html` | page | `template-taxonomy-category-portfolio` |  |
| Category: Recipes | `taxonomy-category-recipes.html` | page | `template-taxonomy-category-recipes` |  |
| Category: Video | `taxonomy-category-video.html` | page | `template-taxonomy-category-video` |  |
| Tag Archives | `taxonomy-post_tag.html` | page | `template-taxonomy-post_tag` |  |
| Tag: Featured | `taxonomy-post_tag-featured.html` | page | `template-taxonomy-post_tag-featured` |  |

The category and tag templates are listed in `customTemplates` without post types, so they are offered for pages. Assign them where you want that archive-style layout.

## WooCommerce Templates

| Template | File | Post types | Pattern | Notes |
| --- | --- | --- | --- | --- |
| Archive: Product | `archive-product.html` | product | `template-archive-product` |  |
| Single item: Product | `single-product.html` | product | `template-single-product` |  |
| Single Product: Landing | `single-product-landing.html` | product | `template-single-product-landing` |  |
| Product Search Results | `product-search-results.html` | product | `template-search-product` |  |
| Search: Product | `search-product.html` | product | `template-search-product` |  |
| Taxonomy Product Category | `taxonomy-product_cat.html` | product | `template-taxonomy-product_cat` |  |
| Taxonomy Product Tag | `taxonomy-product_tag.html` | product | `template-taxonomy-product_tag` |  |
| Product Attribute | `taxonomy-product_attribute.html` | product | `template-taxonomy-product_attribute` |  |
| Product Category: Clothing | `taxonomy-product_cat-clothing.html` | product | `template-taxonomy-product_cat-clothing` |  |
| Product Category: Digital | `taxonomy-product_cat-digital.html` | product | `template-taxonomy-product_cat-digital` |  |
| Product Category: Outlet | `taxonomy-product_cat-outlet.html` | product | `template-taxonomy-product_cat-outlet` |  |
| Page: Cart | `page-cart.html` | page | `template-page-cart` |  |
| Page: Checkout | `page-checkout.html` | page | `template-page-checkout` |  |
| Page: Checkout Multi-Step | `page-checkout-multi-step.html` | page | `template-page-checkout-multi-step` | Three-step checkout: Shipping → Payment → Review. |
| Order Confirmation | `order-confirmation.html` | page | `template-order-confirmation` |  |
| Page: My Account | `page-my-account.html` | page | `template-page-my-account` |  |
| Page: Wishlist | `page-wishlist.html` | page | `template-page-wishlist` | Needs WooCommerce, TI WooCommerce Wishlist, and the companion plugin wishlist pattern. |

> **WooCommerce templates:** Hidden from the Site Editor template picker when WooCommerce is inactive (framework `Templates.php` filter).

> **Wishlist template:** Requires WooCommerce, the **Aegis companion plugin**, and [TI WooCommerce Wishlist](https://wordpress.org/plugins/ti-woocommerce-wishlist/). Hidden when TI Wishlist or WooCommerce is inactive. The companion plugin registers the `template-page-wishlist` pattern when dependencies are met. See [[woocommerce-integration#wishlist-ti-woocommerce-wishlist]].

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

The Blank template loads `template-blank`: the Skip to Content pattern and a `<main>` group with Post Content. No header or footer is included.

## Template Hierarchy

WordPress selects templates in priority order. For Aegis:

| Request Type | Template Priority |
|--------------|-------------------|
| Front page | front-page.html → page.html → index.html |
| Static page | Custom template → page.html → index.html |
| bbPress (integration on) | Page block template (`page` / `page.php` hierarchy) → PHP theme-compat fallback |
| Single post | single.html → index.html |
| Category archive | category.html → archive.html → index.html (Aegis ships `archive.html`) |
| Author archive | author.html → archive.html → index.html |
| Date archive | date.html → archive.html → index.html |
| Search | search.html → index.html. Post type searches try `search-{post_type}.html` first, for example `search-product.html` |
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
