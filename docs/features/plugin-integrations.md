# Plugin Integrations (Framework Styling)

The Aegis **framework** (`vendor/aegis/framework`) loads compatibility CSS for supported third-party plugins when the **Aegis plugin** integration toggle is enabled.

Integration styles use design tokens and adapt to style variations and dark mode. Styles load only when the plugin is active **and** its integration is enabled in **Aegis → Integrations**.

## Framework-Integrated Plugins

| Plugin | Integration styling |
|--------|---------------------|
| WooCommerce | Templates, forms, product grids — see [[woocommerce-integration]] |
| Fluent Forms | Form element styling |
| Gravity Forms | Form element styling |
| LifterLMS | Course and membership layouts |
| Sensei LMS | Course and lesson styling |
| Easy Digital Downloads | Download and checkout styling |
| AffiliateWP | Affiliate dashboard styling |
| bbPress | Forum styling |
| Syntax Highlighting Code Block | Code block styling |

## Integrations Dashboard

Additional plugins (ACF, Meta Box, Rank Math, Yoast, LearnDash pattern control, BunnyCDN, Google Maps, etc.) are managed via the **Aegis plugin** Integrations dashboard, not theme PHP.

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

## Next Steps

- [[woocommerce-integration]] — WooCommerce templates
- [Integrations Dashboard](../../plugins/aegis/docs/features/integrations-dashboard.md)
- [[performance]] — Conditional loading
