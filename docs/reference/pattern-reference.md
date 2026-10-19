# Pattern Reference

This page lists every block pattern the theme registers from `patterns/`. It is generated from the pattern file headers (`Title`, `Slug`, `Categories`, `Inserter`).

WooCommerce block patterns (`wp:woocommerce/*`) and the TI Wishlist template pattern are **not** theme-owned. They register from the [Aegis companion plugin](../../../../plugins/aegis/docs/features/plugin-patterns.md) ([Wiki](https://github.com/aegiswp/plugin/wiki)) when WooCommerce (and TI Wishlist, for wishlist) are active. Modal starter patterns also live in the companion plugin. Premium layouts live in [Aegis Pro](../../../../plugins/aegis-pro/docs/patterns/pro-patterns.md) ([Wiki](https://github.com/aegiswp/pro/wiki)).

The theme ships **234 registered block patterns** in **28 category folders**. 52 of them are kept out of the inserter: the 48 `template` patterns, the 3 `hidden` patterns, and `utility-patterns`.

## How Patterns Are Registered

The framework (`vendor/aegis/framework/src/DesignSystem/Patterns.php`) loads every `*.php` file in each folder of `patterns/`. Files whose names start with a dot are not loaded.

- **Category:** the folder name. Labels are the folder name in title case, with `cta` and `faq` shown as CTA and FAQ.
- **Slug:** the first category plus the file's `Slug` header, joined with a hyphen. For example, `patterns/hero/split.php` with `Slug: split` registers as `hero-split`. Use this slug in `<!-- wp:pattern {"slug":"hero-split"} /-->`.
- **Inserter:** a pattern is hidden from the inserter when its header says `Inserter: false` or its category is `hidden`.
- When WooCommerce and the companion plugin are both active, the plugin's mini-cart header replaces the theme's `header-default`.
- The four `blog-related-posts-*` patterns are removed when the theme Related Posts block is not registered. See [Related Posts](../blocks/related-posts.md).

Child themes can add folders with the `aegis_pattern_dirs` filter, or change the list with `aegis_patterns`. See [Hooks and Filters](hooks-and-filters.md).

## Pattern Categories

### About

Folder `patterns/about/` · 3 patterns

| Pattern | Slug | File | Inserter |
| --- | --- | --- | --- |
| About Founder Story | `about-founder-story` | `founder-story.php` | Yes |
| About Mission Vision | `about-mission-vision` | `mission-vision.php` | Yes |
| About Values Grid | `about-values-grid` | `values-grid.php` | Yes |

### Author

Folder `patterns/author/` · 6 patterns

| Pattern | Slug | File | Inserter |
| --- | --- | --- | --- |
| Author Archive with Sidebar | `author-archive-sidebar` | `archive-sidebar.php` | Yes |
| Author Archive | `author-archive` | `archive.php` | Yes |
| Author Biography Card | `author-biography-card` | `biography-card.php` | Yes |
| Author Biography Horizontal | `author-biography-horizontal` | `biography-horizontal.php` | Yes |
| Author Biography | `author-biography` | `biography.php` | Yes |
| List with Author | `author-default` | `default.php` | Yes |

### Blog

Folder `patterns/blog/` · 16 patterns

| Pattern | Slug | File | Inserter |
| --- | --- | --- | --- |
| Blog Feed | `blog-featured-blog-feed` | `featured-blog-feed.php` | Yes |
| Featured Post | `blog-featured-post` | `featured-post.php` | Yes |
| Featured Posts | `blog-featured-posts` | `featured-posts.php` | Yes |
| Grid Boxed | `blog-grid-boxed` | `grid-boxed.php` | Yes |
| Grid Compact | `blog-grid-compact` | `grid-compact.php` | Yes |
| Grid Masonry | `blog-grid-masonry` | `grid-masonry.php` | Yes |
| Latest Posts | `blog-latest-posts` | `latest-posts.php` | Yes |
| Minimal | `blog-minimal` | `minimal.php` | Yes |
| Related Posts: Cards | `blog-related-posts-cards` | `related-posts-cards.php` | Yes |
| Related Posts: Grid | `blog-related-posts-grid` | `related-posts-grid.php` | Yes |
| Related Posts: List | `blog-related-posts-list` | `related-posts-list.php` | Yes |
| Related Posts: Minimal | `blog-related-posts-minimal` | `related-posts-minimal.php` | Yes |
| Single Blog Card | `blog-single-card` | `single-card.php` | Yes |
| Single Column | `blog-single-column` | `single-column.php` | Yes |
| Three Column Blog | `blog-three-column` | `three-column.php` | Yes |
| Two Column Featured | `blog-two-column-featured` | `two-column-featured.php` | Yes |

### Commerce

Folder `patterns/commerce/` · 8 patterns

| Pattern | Slug | File | Inserter |
| --- | --- | --- | --- |
| Money-Back Guarantee | `commerce-guarantee` | `guarantee.php` | Yes |
| Payment Icons | `commerce-payment-icons` | `payment-icons.php` | Yes |
| Product Comparison | `commerce-product-comparison` | `product-comparison.php` | Yes |
| Product Reviews | `commerce-product-reviews` | `product-reviews.php` | Yes |
| Recently Viewed Products | `commerce-recently-viewed` | `recently-viewed.php` | Yes |
| Shipping Information | `commerce-shipping-info` | `shipping-info.php` | Yes |
| Size Guide | `commerce-size-guide` | `size-guide.php` | Yes |
| Trust Badges | `commerce-trust-badges` | `trust-badges.php` | Yes |

### Contact

Folder `patterns/contact/` · 5 patterns

| Pattern | Slug | File | Inserter |
| --- | --- | --- | --- |
| Form Boxed | `contact-form-boxed` | `form-boxed.php` | Yes |
| Contact Form Map Overlay | `contact-form-map-overlay` | `form-map-overlay.php` | Yes |
| Contact Form Map | `contact-form-map` | `form-map.php` | Yes |
| Contact Icons | `contact-icons` | `icons.php` | Yes |
| Contact Two Column | `contact-two-column` | `two-column.php` | Yes |

### CTA

Folder `patterns/cta/` · 7 patterns

| Pattern | Slug | File | Inserter |
| --- | --- | --- | --- |
| Feature Banner | `cta-banner` | `banner.php` | Yes |
| Box | `cta-box` | `box.php` | Yes |
| Commerce Free Shipping CTA | `cta-commerce-free-shipping` | `commerce-free-shipping.php` | Yes |
| Commerce Newsletter CTA | `cta-commerce-newsletter` | `commerce-newsletter.php` | Yes |
| Commerce Sale CTA | `cta-commerce-sale` | `commerce-sale.php` | Yes |
| Horizontal | `cta-horizontal` | `horizontal.php` | Yes |
| Newsletter CTA | `cta-newsletter` | `newsletter.php` | Yes |

### Event

Folder `patterns/event/` · 28 patterns

| Pattern | Slug | File | Inserter |
| --- | --- | --- | --- |
| Cinema About | `event-event-cinema-about` | `cinema-about.php` | Yes |
| Cinema Cast & Crew | `event-event-cinema-cast` | `cinema-cast.php` | Yes |
| Cinema CTA | `event-event-cinema-cta` | `cinema-cta.php` | Yes |
| Cinema Hero | `event-event-cinema-hero` | `cinema-hero.php` | Yes |
| Conference CTA | `event-event-conference-cta` | `conference-cta.php` | Yes |
| Conference Hero | `event-event-conference-hero` | `conference-hero.php` | Yes |
| Conference Speakers | `event-event-conference-speakers` | `conference-speakers.php` | Yes |
| Conference Tracks | `event-event-conference-tracks` | `conference-tracks.php` | Yes |
| Conference Venue | `event-event-conference-venue` | `conference-venue.php` | Yes |
| Exhibition About | `event-event-exhibition-about` | `exhibition-about.php` | Yes |
| Exhibition Artists | `event-event-exhibition-artists` | `exhibition-artists.php` | Yes |
| Exhibition Gallery | `event-event-exhibition-gallery` | `exhibition-gallery.php` | Yes |
| Exhibition Hero | `event-event-exhibition-hero` | `exhibition-hero.php` | Yes |
| Exhibition Info | `event-event-exhibition-info` | `exhibition-info.php` | Yes |
| Exhibition Tours | `event-event-exhibition-tours` | `exhibition-tours.php` | Yes |
| Music Festival Hero | `event-event-music-festival-hero` | `music-festival-hero.php` | Yes |
| Music Festival Info | `event-event-music-festival-info` | `music-festival-info.php` | Yes |
| Music Festival Lineup | `event-event-music-festival-lineup` | `music-festival-lineup.php` | Yes |
| Music Festival Passes | `event-event-music-festival-passes` | `music-festival-passes.php` | Yes |
| Talk Hero | `event-talk-hero` | `talk-hero.php` | Yes |
| Talk Series | `event-event-talk-series` | `talk-series.php` | Yes |
| Talk Speaker | `event-event-talk-speaker` | `talk-speaker.php` | Yes |
| Talk Topics | `event-event-talk-topics` | `talk-topics.php` | Yes |
| Workshop CTA | `event-event-workshop-cta` | `workshop-cta.php` | Yes |
| Workshop Gallery | `event-event-workshop-gallery` | `workshop-gallery.php` | Yes |
| Workshop Hero | `event-workshop-hero` | `workshop-hero.php` | Yes |
| Workshop Instructor | `event-workshop-instructor` | `workshop-instructor.php` | Yes |
| Workshop Schedule | `event-workshop-schedule` | `workshop-schedule.php` | Yes |

### FAQ

Folder `patterns/faq/` · 3 patterns

| Pattern | Slug | File | Inserter |
| --- | --- | --- | --- |
| Accordion With Sidebar | `faq-accordion-sidebar` | `accordion-sidebar.php` | Yes |
| Accordion | `faq-accordion` | `accordion.php` | Yes |
| FAQs | `faq-default` | `default.php` | Yes |

### Featured

Folder `patterns/featured/` · 5 patterns

| Pattern | Slug | File | Inserter |
| --- | --- | --- | --- |
| Feature Alternating | `featured-alternating` | `alternating.php` | Yes |
| Feature Grid Icons | `featured-grid-icons` | `grid-icons.php` | Yes |
| Feature Icon Boxes | `featured-icon-boxes` | `icon-boxes.php` | Yes |
| Image | `featured-image` | `image.php` | Yes |
| Feature Images Two Column | `featured-images-two-column` | `images-two-column.php` | Yes |

### Footer

Folder `patterns/footer/` · 6 patterns

| Pattern | Slug | File | Inserter |
| --- | --- | --- | --- |
| Centered | `footer-centered` | `centered.php` | Yes |
| Footer Default | `footer-default` | `default.php` | Yes |
| Minimal | `footer-minimal` | `minimal.php` | Yes |
| Store Footer Default | `footer-store-default` | `store-default.php` | Yes |
| Store Footer Minimal | `footer-store-minimal` | `store-minimal.php` | Yes |
| Wide | `footer-wide` | `wide.php` | Yes |

### Header

Folder `patterns/header/` · 6 patterns

| Pattern | Slug | File | Inserter |
| --- | --- | --- | --- |
| Center Logo | `header-center-logo` | `center-logo.php` | Yes |
| Header Center Menu | `header-center-menu` | `center-menu.php` | Yes |
| Header Default | `header-default` | `default.php` | Yes |
| Menu Left | `header-menu-left` | `menu-left.php` | Yes |
| Store Header Default | `header-store-default` | `store-default.php` | Yes |
| Store Header Minimal | `header-store-minimal` | `store-minimal.php` | Yes |

### Hero

Folder `patterns/hero/` · 7 patterns

| Pattern | Slug | File | Inserter |
| --- | --- | --- | --- |
| Hero Archive | `hero-archive` | `archive.php` | Yes |
| Hero Centered Dark | `hero-centered-dark` | `centered-dark.php` | Yes |
| Hero Cover | `hero-cover` | `cover.php` | Yes |
| Hero Image Below | `hero-image-below` | `image-below.php` | Yes |
| Hero Minimal | `hero-minimal` | `minimal.php` | Yes |
| Hero Split | `hero-split` | `split.php` | Yes |
| Hero Video | `hero-video` | `video.php` | Yes |

### Hidden

Folder `patterns/hidden/` · 3 patterns

| Pattern | Slug | File | Inserter |
| --- | --- | --- | --- |
| Page 404 | `hidden-404` | `404.php` | No |
| 404 Illustrated | `hidden-illustrated` | `illustrated.php` | No |
| 404 Minimal | `hidden-minimal` | `minimal.php` | No |

### Logos

Folder `patterns/logos/` · 3 patterns

| Pattern | Slug | File | Inserter |
| --- | --- | --- | --- |
| As Seen In | `logos-as-seen-in` | `as-seen-in.php` | Yes |
| Logo Grid | `logos-logo-grid` | `logo-grid.php` | Yes |
| Logo Row | `logos-logo-row` | `logo-row.php` | Yes |

### Newsletter

Folder `patterns/newsletter/` · 3 patterns

| Pattern | Slug | File | Inserter |
| --- | --- | --- | --- |
| Newsletter Banner | `newsletter-banner` | `banner.php` | Yes |
| Newsletter Inline | `newsletter-inline` | `inline.php` | Yes |
| Newsletter Split | `newsletter-split` | `split.php` | Yes |

### Notice

Folder `patterns/notice/` · 16 patterns

| Pattern | Slug | File | Inserter |
| --- | --- | --- | --- |
| Affiliate Disclaimer | `notice-disclaimer-affiliate` | `disclaimer-affiliate.php` | Yes |
| Beta Disclaimer | `notice-disclaimer-beta` | `disclaimer-beta.php` | Yes |
| Earnings Disclaimer | `notice-disclaimer-earnings` | `disclaimer-earnings.php` | Yes |
| Editorial Independence Disclaimer | `notice-disclaimer-editorial` | `disclaimer-editorial.php` | Yes |
| Financial Disclaimer | `notice-disclaimer-financial` | `disclaimer-financial.php` | Yes |
| Legal Disclaimer | `notice-disclaimer-legal` | `disclaimer-legal.php` | Yes |
| Medical Disclaimer | `notice-disclaimer-medical` | `disclaimer-medical.php` | Yes |
| Sponsored Content Disclaimer | `notice-disclaimer-sponsored` | `disclaimer-sponsored.php` | Yes |
| Testimonial Disclaimer | `notice-disclaimer-testimonial` | `disclaimer-testimonial.php` | Yes |
| Age Verification Notice | `notice-notice-age-gate` | `notice-age-gate.php` | Yes |
| Error Notice | `notice-notice-error` | `notice-error.php` | Yes |
| Geographic Restriction Notice | `notice-notice-geo-restriction` | `notice-geo-restriction.php` | Yes |
| Info Notice | `notice-notice-info` | `notice-info.php` | Yes |
| Success Notice | `notice-notice-success` | `notice-success.php` | Yes |
| Under Construction | `notice-notice-under-construction` | `notice-under-construction.php` | Yes |
| Warning Notice | `notice-notice-warning` | `notice-warning.php` | Yes |

### Pages

Folder `patterns/pages/` · 20 patterns

| Pattern | Slug | File | Inserter |
| --- | --- | --- | --- |
| About Page | `pages-about` | `about.php` | Yes |
| Blog Page | `pages-blog` | `blog.php` | Yes |
| Cinema Event | `pages-event-cinema` | `cinema.php` | Yes |
| Conference Event | `pages-event-conference` | `conference.php` | Yes |
| Contact Page | `pages-contact` | `contact.php` | Yes |
| Exhibition Event | `pages-event-exhibition` | `exhibition.php` | Yes |
| Funnel Sales Page | `pages-funnel-sales` | `funnel-sales.php` | Yes |
| Funnel Squeeze Page | `pages-funnel-squeeze` | `funnel-squeeze.php` | Yes |
| Funnel Thank You Page | `pages-funnel-thank-you` | `funnel-thank-you.php` | Yes |
| Page Home | `pages-home` | `home.php` | Yes |
| Landing Page | `pages-landing` | `landing.php` | Yes |
| Music Festival | `pages-event-music-festival` | `music-festival.php` | Yes |
| Portfolio Page | `pages-portfolio` | `portfolio.php` | Yes |
| Product Landing Page (Dynamic) | `pages-product-landing-dynamic` | `product-landing-dynamic.php` | Yes |
| Product Landing Page (Static) | `pages-product-landing-static` | `product-landing-static.php` | Yes |
| Services Page | `pages-services` | `services.php` | Yes |
| Shop Full Width | `pages-shop-full-width` | `shop-full-width.php` | Yes |
| Shop Page | `pages-shop` | `shop.php` | Yes |
| Talk & Lecture Event | `pages-event-talk` | `talk.php` | Yes |
| Workshop Event | `pages-event-workshop` | `workshop.php` | Yes |

### Portfolio

Folder `patterns/portfolio/` · 3 patterns

| Pattern | Slug | File | Inserter |
| --- | --- | --- | --- |
| Portfolio Image Gallery Grid | `portfolio-image-gallery-grid` | `image-gallery-grid.php` | Yes |
| Portfolio Image Gallery | `portfolio-image-gallery` | `image-gallery.php` | Yes |
| Project Showcase | `portfolio-project-showcase` | `project-showcase.php` | Yes |

### Pricing

Folder `patterns/pricing/` · 4 patterns

| Pattern | Slug | File | Inserter |
| --- | --- | --- | --- |
| Pricing Comparison Table | `pricing-comparison-table` | `comparison-table.php` | Yes |
| Pricing Single Highlight | `pricing-single-highlight` | `single-highlight.php` | Yes |
| Pricing Three Column | `pricing-three-column` | `three-column.php` | Yes |
| Pricing Two Column | `pricing-two-column` | `two-column.php` | Yes |

### Product

Folder `patterns/product/` · 3 patterns

| Pattern | Slug | File | Inserter |
| --- | --- | --- | --- |
| Product Category Grid | `product-category-grid` | `category-grid.php` | Yes |
| Featured Product Grid | `product-featured-grid` | `featured-grid.php` | Yes |
| On Sale Products | `product-on-sale` | `on-sale.php` | Yes |

### Sidebar

Folder `patterns/sidebar/` · 1 pattern

| Pattern | Slug | File | Inserter |
| --- | --- | --- | --- |
| Sidebar Default | `sidebar-default` | `default.php` | Yes |

### Slider

Folder `patterns/slider/` · 7 patterns

| Pattern | Slug | File | Inserter |
| --- | --- | --- | --- |
| Books Slider | `slider-books` | `books.php` | Yes |
| Features Slider | `slider-features` | `features.php` | Yes |
| Hero Slider | `slider-hero` | `hero.php` | Yes |
| Latest Posts Carousel | `slider-latest-posts` | `latest-posts.php` | Yes |
| Portfolio Carousel | `slider-portfolio` | `portfolio.php` | Yes |
| Team Carousel | `slider-team` | `team.php` | Yes |
| Testimonials Slider | `slider-testimonials` | `testimonials.php` | Yes |

### Stats

Folder `patterns/stats/` · 4 patterns

| Pattern | Slug | File | Inserter |
| --- | --- | --- | --- |
| Stats Four Columns | `stats-four-columns` | `four-columns.php` | Yes |
| Stats Progress Bars | `stats-progress-bars` | `progress-bars.php` | Yes |
| Stats Three Columns Dark | `stats-three-columns-dark` | `three-columns-dark.php` | Yes |
| Stats Two Column Icons | `stats-two-column-icons` | `two-column-icons.php` | Yes |

### Team

Folder `patterns/team/` · 4 patterns

| Pattern | Slug | File | Inserter |
| --- | --- | --- | --- |
| Team Cards Social | `team-cards-social` | `cards-social.php` | Yes |
| Team Grid Simple | `team-grid-simple` | `grid-simple.php` | Yes |
| Team Members | `team-members` | `members.php` | Yes |
| Team Spotlight | `team-spotlight` | `spotlight.php` | Yes |

### Template

Folder `patterns/template/` · 48 patterns

| Pattern | Slug | File | Inserter |
| --- | --- | --- | --- |
| Template 404 | `template-404` | `404.php` | No |
| Archive Product | `template-archive-product` | `archive-product.php` | No |
| Template Archive | `template-archive` | `archive.php` | No |
| Author Guest | `template-author-guest` | `author-guest.php` | No |
| Template Author | `template-author` | `author.php` | No |
| Blank | `template-blank` | `blank.php` | No |
| Coming Soon | `template-coming-soon` | `coming-soon.php` | No |
| Template Date | `template-date` | `date.php` | No |
| Front Page | `template-front-page` | `front-page.php` | No |
| Full Width | `template-full-width` | `full-width.php` | No |
| Blog Home | `template-home` | `home.php` | No |
| Maintenance | `template-maintenance` | `maintenance.php` | No |
| Order Confirmation | `template-order-confirmation` | `order-confirmation.php` | No |
| Page Boxed | `template-page-boxed` | `page-boxed.php` | No |
| Page Cart | `template-page-cart` | `page-cart.php` | No |
| Page Checkout Multi-Step | `template-page-checkout-multi-step` | `page-checkout-multi-step.php` | No |
| Page Checkout | `template-page-checkout` | `page-checkout.php` | No |
| Page Coming Soon | `template-page-coming-soon` | `page-coming-soon.php` | No |
| Page Contact | `template-page-contact` | `page-contact.php` | No |
| Page Hero Minimal | `template-page-hero-minimal` | `page-hero-minimal.php` | No |
| Page Landing | `template-page-landing` | `page-landing.php` | No |
| Page My Account | `template-page-my-account` | `page-my-account.php` | No |
| Page No Title | `template-page-no-title` | `page-no-title.php` | No |
| Page Wishlist | `template-page-wishlist` | `page-wishlist.php` | No |
| Page With Sidebar | `template-page-with-sidebar` | `page-with-sidebar.php` | No |
| Template Page | `template-page` | `page.php` | No |
| Search Product | `template-search-product` | `search-product.php` | No |
| Template Search | `template-search` | `search.php` | No |
| Single Full Width | `template-single-full-width` | `single-full-width.php` | No |
| Single No Featured Image | `template-single-no-featured-image` | `single-no-featured-image.php` | No |
| Single Product Landing | `template-single-product-landing` | `single-product-landing.php` | No |
| Single Product | `template-single-product` | `single-product.php` | No |
| Template Single | `template-single` | `single.php` | No |
| Category Books | `template-taxonomy-category-books` | `taxonomy-category-books.php` | No |
| Category Events | `template-taxonomy-category-events` | `taxonomy-category-events.php` | No |
| Category Podcasts | `template-taxonomy-category-podcasts` | `taxonomy-category-podcasts.php` | No |
| Category Portfolio | `template-taxonomy-category-portfolio` | `taxonomy-category-portfolio.php` | No |
| Category Recipes | `template-taxonomy-category-recipes` | `taxonomy-category-recipes.php` | No |
| Category Video | `template-taxonomy-category-video` | `taxonomy-category-video.php` | No |
| Category Archive | `template-taxonomy-category` | `taxonomy-category.php` | No |
| Tag Featured | `template-taxonomy-post_tag-featured` | `taxonomy-post_tag-featured.php` | No |
| Tag Archive | `template-taxonomy-post_tag` | `taxonomy-post_tag.php` | No |
| Product Attribute | `template-taxonomy-product_attribute` | `taxonomy-product_attribute.php` | No |
| Product Category Clothing | `template-taxonomy-product_cat-clothing` | `taxonomy-product_cat-clothing.php` | No |
| Product Category Digital | `template-taxonomy-product_cat-digital` | `taxonomy-product_cat-digital.php` | No |
| Product Category Outlet | `template-taxonomy-product_cat-outlet` | `taxonomy-product_cat-outlet.php` | No |
| Taxonomy Product Category | `template-taxonomy-product_cat` | `taxonomy-product_cat.php` | No |
| Taxonomy Product Tag | `template-taxonomy-product_tag` | `taxonomy-product_tag.php` | No |

### Testimonial

Folder `patterns/testimonial/` · 6 patterns

| Pattern | Slug | File | Inserter |
| --- | --- | --- | --- |
| Brands | `testimonial-brands` | `brands.php` | Yes |
| Testimonial Cards Grid | `testimonial-cards-grid` | `cards-grid.php` | Yes |
| Logo Cloud | `testimonial-logo-cloud` | `logo-cloud.php` | Yes |
| Testimonial Quote Large | `testimonial-quote-large` | `quote-large.php` | Yes |
| Testimonial Single | `testimonial-single` | `single.php` | Yes |
| Testimonial Three Column | `testimonial-three-column` | `three-column.php` | Yes |

### Timeline

Folder `patterns/timeline/` · 3 patterns

| Pattern | Slug | File | Inserter |
| --- | --- | --- | --- |
| Timeline Horizontal | `timeline-horizontal` | `horizontal.php` | Yes |
| Timeline Stacked | `timeline-stacked` | `stacked.php` | Yes |
| Timeline Vertical | `timeline-vertical` | `vertical.php` | Yes |

### Utility

Folder `patterns/utility/` · 6 patterns

| Pattern | Slug | File | Inserter |
| --- | --- | --- | --- |
| Color Palette | `utility-color-palette` | `color-palette.php` | Yes |
| Utility Dark Mode Toggle | `utility-dark-mode-toggle` | `dark-mode-toggle.php` | Yes |
| Gradients | `utility-gradients` | `gradients.php` | Yes |
| Patterns | `utility-patterns` | `patterns.php` | No |
| Skip to Content | `utility-skip-to-content` | `skip-to-content.php` | Yes |
| Utility Search Toggle | `utility-utility-search-toggle` | `utility-search-toggle.php` | Yes |
## Inserting Patterns

1. Open the block inserter (+) in the editor toolbar.
2. Switch to the **Patterns** tab.
3. Select a category from the dropdown.
4. Click a pattern to insert it.

Patterns marked **No** in the Inserter column do not appear there. Templates and other patterns reference them by slug.

## Related Pages

- [[block-patterns]] — Detailed guide on using and customizing patterns.
- [Plugin Patterns](../../../../plugins/aegis/docs/features/plugin-patterns.md) · [Plugin Wiki](https://github.com/aegiswp/plugin/wiki) — WooCommerce and wishlist block patterns (companion plugin, gated).
- [Pro Patterns](../../../../plugins/aegis-pro/docs/patterns/pro-patterns.md) · [Pro Wiki](https://github.com/aegiswp/pro/wiki) — Premium marketing layouts.
- [[templates]] — How patterns are used within templates.
- [[style-variations]] — How patterns adapt to different style variations.
