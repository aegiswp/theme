# Frequently Asked Questions

This page answers common questions about the Aegis theme.

## General Questions

### What is Aegis?

Aegis is a WordPress Full Site Editing (FSE) block theme built for performance and flexibility. It provides a zero-base loading architecture, 60 style variations, over 145 block patterns, and deep integration with the WordPress Site Editor.

### What does "zero-base loading" mean?

Zero-base loading means the theme loads zero CSS, JavaScript, or font assets by default. Assets are only loaded when the page content requires them. A page using only core blocks may load with no theme-specific assets at all, resulting in exceptional performance.

### Is Aegis free?

The Aegis theme is released under the GPL-2.0-or-later license. The companion Aegis Plugin (free) and Aegis Pro (premium) extend the theme with additional blocks and features.

### What is the difference between the theme, plugin, and Pro?

| Product | Includes |
|---------|----------|
| **Aegis theme** | Templates, patterns, style variations, design system, theme blocks (Countdown, Slider, Toggle, Video, Related Posts), framework core-block enhancements, WooCommerce templates |
| **Aegis Plugin** (free) | Map and Modal blocks, admin dashboard, block toggles, snippets, conditionals, integrations, analytics |
| **Aegis Pro** (premium) | Hook pattern CPT, video/BunnyCDN stack, query conditions, Pro blocks, block extensions, license — requires Aegis theme |

See [Plugin FAQ](../../plugins/aegis/docs/troubleshooting/faq.md) and [Pro docs](../../plugins/aegis-pro/docs/home.md).

### Does Aegis work without the companion plugins?

Yes. The theme provides templates, patterns, style variations, and theme-registered custom blocks without the plugin. Map, Modal, the Aegis admin menu, analytics, snippets, and integration toggles require the free plugin. Pro features require Aegis Pro.

## Requirements

### What version of WordPress do I need?

Aegis requires WordPress 7.0 or later.

### What PHP version do I need?

Aegis requires PHP 8.1 or later.

### Does Aegis work with PHP 8.2 or 8.3?

Yes. Aegis is compatible with PHP 8.1, 8.2, and 8.3.

### Does Aegis require any specific hosting?

No. Aegis works on any hosting that meets the WordPress minimum requirements (PHP 8.1+, MySQL 5.7+ or MariaDB 10.3+). Shared hosting, VPS, and dedicated servers are all supported.

## Design and Customization

### How do I change the site colors?

Use the Site Editor (**Appearance → Editor → Styles**). You can either:
- Apply one of the 60 style variations for a complete color scheme change.
- Manually adjust individual colors in the Styles → Colors panel.

See [[global-styles]] and [[style-variations]] for details.

### How do I change fonts?

Navigate to **Appearance → Editor → Styles → Typography**. You can change the font family, size, weight, and other properties for body text, headings, links, and buttons.

See [[typography]] for the available font options.

### Can I use custom fonts not included with the theme?

Yes. You can add custom fonts through WordPress Global Styles (Styles → Typography → Manage fonts) or by adding font files to the theme and registering them in `theme.json`.

### How do I enable dark mode?

Dark mode is activated by applying the `is-style-dark` CSS class. This can be done globally via a template wrapper, per-page, or with a visitor toggle button. See [[dark-mode]] for complete instructions.

### Can I use different style variations on different pages?

Style variations apply globally to the entire site. However, you can customize individual page colors through per-block color settings or by using different templates with specific color configurations.

### How do I create a custom page layout?

1. Create a new page.
2. Use the block inserter to add patterns from categories like Hero, Feature, CTA, and Testimonial.
3. Customize each pattern to match your content.
4. Alternatively, create a custom template in the Site Editor for reusable layouts.

## Templates and Patterns

### How many templates are included?

Aegis includes 23 templates: 9 core WordPress templates, 3 custom page templates, and 11 WooCommerce templates.

### How many patterns are included?

Over 145 block patterns across 30 categories. See [[pattern-reference]] for the complete list.

### Can I create my own patterns?

Yes. You can:
- Create synced or unsynced patterns from the editor (select blocks → three dots → Create pattern).
- Add PHP pattern files to the `patterns/` directory (for developers).

### What is the Blank template for?

The Blank template provides an empty canvas with no header, footer, or wrapper. It is ideal for marketing landing pages, sales pages, or any page where you want complete control over the layout.

## Blocks

### What custom blocks does Aegis include?

The theme registers Countdown, Slider, Slide, Toggle, Toggle Content, Video, and Related Posts. Map and Modal require the [Aegis Plugin](../../plugins/aegis/docs/blocks/custom-blocks.md). Block feature toggles are at **Aegis → Blocks**.

### Do I need Gutenberg plugin installed?

No. Aegis works with the block editor built into WordPress core. The Gutenberg plugin is only needed if you want access to experimental features before they are included in WordPress core releases.

### Can I use third-party block plugins with Aegis?

Yes. Aegis is compatible with third-party block plugins. The theme styles are applied through design tokens, so most plugins will inherit appropriate styling.

## WooCommerce

### Does Aegis support WooCommerce?

Yes. Aegis includes 11 dedicated WooCommerce templates, product patterns, and full styling integration. See [[woocommerce-integration]] for details.

### What is the multi-step checkout?

The multi-step checkout splits the WooCommerce checkout into three steps (Shipping → Payment → Review) for a cleaner user experience. It is an alternative to the standard single-page checkout.

### Do I need WooCommerce installed for the theme to work?

No. WooCommerce is entirely optional. The theme works perfectly for blogs, portfolios, corporate sites, and other non-commerce sites.

## Performance

### Why does my page show zero theme CSS?

This is by design. If a page uses only core WordPress blocks with no Aegis custom blocks, the theme correctly loads zero additional CSS. Core block styles are provided by WordPress itself.

### Will Aegis slow down my site?

No. Aegis is designed for exceptional performance. The zero-base loading strategy means the theme only adds assets that are needed. In many cases, Aegis will be faster than traditional themes that load a full CSS framework on every page.

### Does Aegis work with caching plugins?

Yes. Aegis is compatible with all major caching plugins (WP Super Cache, W3 Total Cache, WP Rocket, LiteSpeed Cache, and others). No special configuration is needed.

## Development

### How do I set up a local development environment?

Use `wp-env` with Docker. Run `npm run env:start` to start a local WordPress instance on port 8888. See [[development-setup]] for full instructions.

### How do I build the theme assets?

Run `npm run build` in the theme directory for theme-owned blocks, or `npm run dev` for watch mode. Map, Modal, and admin assets are built in the companion plugin (`wp-content/plugins/aegis`). See [[building-assets]] and [plugin build docs](../../plugins/aegis/docs/development/building-assets.md).

### Can I contribute to Aegis?

Yes. Aegis is open source. See [[contributing]] for branch strategy, PR guidelines, and coding standards.

### Where do I report bugs?

Report bugs on the [GitHub Issues page](https://github.com/aegiswp/theme/issues). Include your WordPress version, PHP version, Aegis version, steps to reproduce, and any error messages.

## Accessibility

### Is Aegis accessible?

Aegis is built to meet WCAG 2.1 Level AA requirements. The theme provides semantic HTML, keyboard navigation, visible focus indicators, proper ARIA attributes, and sufficient color contrast. See [[accessibility]] for details.

### Does Aegis support screen readers?

Yes. All templates, patterns, and custom blocks include appropriate ARIA attributes, semantic landmarks, and screen reader text where needed.

## Compatibility

### Does Aegis work with multisite?

Yes. Aegis is compatible with WordPress multisite installations.

### Does Aegis support RTL languages?

Yes. The theme supports right-to-left (RTL) languages through WordPress built-in RTL handling and CSS logical properties.

### Which browsers does Aegis support?

Aegis supports the latest two versions of Chrome, Firefox, Safari, and Edge. Internet Explorer is not supported.

## Related Pages

- [[common-issues]] — Solutions to specific problems.
- [[requirements]] — System requirements.
- [[installation]] — Installation guide.
- [[quick-start-guide]] — Getting started quickly.
