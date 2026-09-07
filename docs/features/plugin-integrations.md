# Plugin Integrations (Framework Styling)

The Aegis **framework** (`vendor/aegis/framework`) loads compatibility CSS for supported third-party plugins when the **Aegis plugin** integration toggle is enabled.

Integration styles use design tokens and adapt to style variations and dark mode. Styles load only when the plugin is active **and** its integration is enabled in **Aegis → Integrations**.

## Framework-Integrated Plugins

| Plugin | Integration styling |
|--------|---------------------|
| WooCommerce | Templates, forms, product grids — see [[woocommerce-integration]] |
| Fluent Forms | Form element styling |
| Fluent Booking | Calendar and booking UI styling |
| Gravity Forms | Form element styling |
| LifterLMS | Course and membership layouts |
| LearnDash | Course layouts, Focus Mode theme chrome |
| Sensei LMS | Course and lesson styling |
| Easy Digital Downloads | Download and checkout styling |
| AffiliateWP | Affiliate dashboard styling |
| Co-Authors Plus | Multi-author `core/post-author*` replace when the Aegis plugin is absent. With the plugin active, the plugin owns guest URLs, CSS (`public/css/co-authors-plus.css`), and the optional **Author Schema** extra. The framework class does not emit JSON-LD. |
| Meta Box | Field UI / frontend form styling |
| bbPress | Forum styling (`plugins/bbpress.css`, dequeues bbPress default CSS); FSE **Page** wrap via `locate_block_template( $template, 'page', array( 'page.php' ) )` |
| Syntax Highlighting Code Block | Code block styling |
| Code Block Pro | Code block radius/typography overlay |
| BunnyCDN | Stream player embed styling |

## Integrations Dashboard

Credentials live at **Aegis → Connectors**. Pattern control and extra toggles (WooCommerce, EDD, AffiliateWP, ACF, Meta Box, Rank Math, Yoast, LearnDash pattern keep, Co-Authors Plus, and so on) are on **Aegis → Integrations**. Extras stay off unless that plugin is active and the parent integration is on. Framework CSS above still loads when the matching integration toggle is enabled.

See [Integrations Dashboard](../../plugins/aegis/docs/features/integrations-dashboard.md).

## SEO Plugins

Schema delegation to Rank Math, Yoast, AIOSEO, or SEOPress is configured in the plugin. See [SEO Schema Delegation](../../plugins/aegis/docs/features/seo-schema-delegation.md).

## How Integration Styles Load

1. The free plugin stores integration toggle state.
2. The framework `ServiceProvider` checks toggles via `Settings\Repository`.
3. Integration CSS loads inline only when both the third-party plugin and integration toggle are active.

See [[performance]] for conditional asset loading.

## Plugins Without Framework CSS

Plugins not listed above may still work with default styling. Apply custom CSS via Global Styles or child theme overrides. Request integration on [GitHub](https://github.com/aegiswp/theme/issues).

| Plugin | Theme integration |
|--------|-------------------|
| [TI WooCommerce Wishlist](https://wordpress.org/plugins/ti-woocommerce-wishlist/) | **Wishlist** FSE template (theme) + **wishlist block pattern** (companion plugin, gated on WC + TI). No framework CSS. See [[woocommerce-integration#wishlist-ti-woocommerce-wishlist]]. |
| WooCommerce block patterns | Registered by **Aegis companion plugin** when WooCommerce is active — not in theme `patterns/`. See [[../../plugins/aegis/docs/features/plugin-patterns|Plugin Patterns]]. |

## Next Steps

- [[woocommerce-integration]] — WooCommerce templates
- [Integrations Dashboard](../../plugins/aegis/docs/features/integrations-dashboard.md)
- [[performance]] — Conditional loading
