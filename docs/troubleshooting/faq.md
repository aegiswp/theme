# Frequently Asked Questions

This page answers common questions about the Aegis theme.

## General Questions

### What is Aegis?

Aegis is a WordPress Full Site Editing (FSE) block theme built for performance and flexibility. It provides a zero-base loading architecture, 60 style variations, **~200 theme block patterns** (plus companion plugin and Pro patterns), and deep integration with the WordPress Site Editor.

### What does "zero-base loading" mean?

Zero-base loading means the theme loads zero CSS, JavaScript, or font assets by default. Assets are only loaded when the page content requires them. A page using only core blocks may load with no theme-specific assets at all, resulting in exceptional performance.

### Is Aegis free?

The Aegis theme is released under the GPL-2.0-or-later license. The companion Aegis Plugin (free) and Aegis Pro (premium) extend the theme with additional blocks and features.

### What is the difference between the theme, plugin, and Pro?

| Product | Includes |
|---------|----------|
| **Aegis theme** | Templates, patterns, style variations, design system, six theme blocks (Countdown, Slider, Slide, Toggle, Toggle Content, Related Posts), enhanced **`core/video`**, framework core-block enhancements, WooCommerce templates |
| **Aegis Plugin** (free) | Map and Modal blocks, admin dashboard, block toggles, snippets, conditionals, integrations, analytics |
| **Aegis Pro** (premium) | Hook pattern CPT, video/BunnyCDN stack, query conditions, Pro blocks, block extensions, license — requires Aegis theme |

See [Plugin FAQ](../../plugins/aegis/docs/troubleshooting/faq.md) and [Pro docs](../../plugins/aegis-pro/docs/home.md).

### Does Aegis work without the companion plugins?

Yes. The theme provides templates, patterns, style variations, and theme-registered custom blocks without the plugin. Map, Modal, the Aegis admin menu, analytics, snippets, and integration toggles require the free plugin. Pro features require Aegis Pro.

### Why doesn’t Easy Digital Downloads pick up theme styles?

Enable **Aegis → Integrations → E-commerce → Easy Digital Downloads**. Framework CSS (`plugins/edd/edd.css`) loads when that toggle is on **and** EDD is active (`Easy_Digital_Downloads`, `EDD()`, or `EDD_VERSION`), and only if the page has EDD blocks, submit buttons, download markup, or alerts. See [Plugin FAQ — Easy Digital Downloads](../../plugins/aegis/docs/troubleshooting/faq.md#where-is-easy-digital-downloads-configured) and [[plugin-integrations]].

### Why doesn’t Code Block Pro pick up theme radius?

Enable **Aegis → Integrations → Developer → Code Block Pro**. The overlay (`vendor/aegis/framework/public/css/plugins/code-block-pro.css`) loads only when that toggle is on **and** Kevin Batdorf’s plugin is active (`CBPRouter` or the `kevinbatdorf/code-block-pro` block). See [Plugin FAQ — Code Block Pro](../../plugins/aegis/docs/troubleshooting/faq.md#where-is-code-block-pro-configured) and [[plugin-integrations]].

### Why doesn’t Syntax Highlighting Code Block pick up theme radius?

Enable **Aegis → Integrations → Developer → Syntax Highlighting Code Block**. The overlay (`vendor/aegis/framework/public/css/plugins/syntax-highlighting-code-block.css`) loads only when that toggle is on **and** Weston Ruter’s plugin is active (`Syntax_Highlighting_Code_Block\PLUGIN_VERSION` or `boot()`), and only if the page has `hljs` / `shcb-` markup. See [Plugin FAQ — Syntax Highlighting](../../plugins/aegis/docs/troubleshooting/faq.md#where-is-syntax-highlighting-code-block-configured) and [[plugin-integrations]].

### Why doesn’t the AffiliateWP Affiliate Area pick up theme styles?

Enable **Aegis → Integrations → E-commerce → AffiliateWP**. Framework CSS (`plugins/affiliate-wp.css`) loads when that toggle is on **and** AffiliateWP is active (`Affiliate_WP`, `affiliate_wp()`, or `AFFILIATEWP_VERSION`). It covers the Affiliate Area plus login and register forms. AffiliateWP’s bundled `affwp-forms` stylesheet is skipped on the frontend so theme tokens apply; admin screens still use it. See [Plugin FAQ — AffiliateWP](../../plugins/aegis/docs/troubleshooting/faq.md#where-is-affiliatewp-configured) and [[plugin-integrations]].

### Why don’t Meta Box fields pick up theme form styles?

Enable **Aegis → Integrations → Developer → Meta Box**. Framework CSS (`plugins/meta-box.css`), the `aegis/metabox` binding source, and theme colour palettes on Meta Box colour pickers load only when that toggle is on **and** Meta Box (or AIO) is active (`RWMB_Loader` or `rwmb_meta()`). See [Plugin FAQ — Meta Box](../../plugins/aegis/docs/troubleshooting/faq.md#where-is-meta-box-configured) and [[plugin-integrations]].

### Why doesn’t Fluent Forms pick up theme styles?

Enable **Aegis → Integrations → Forms → Fluent Forms**. Framework CSS (`plugins/fluent-forms.css`) loads when that toggle is on **and** Fluent Forms is active (`FLUENTFORM`, `FLUENTFORM_VERSION`, or `FluentForm\App\Modules\Form\Form`), and only if the page has `fluentform`, `ff_form`, `fluent_form`, `fluent-form`, or `ff-form` markup. Default plugin public styles are disabled via `fluentform_load_default_public`. See [Plugin FAQ — Fluent Forms](../../plugins/aegis/docs/troubleshooting/faq.md#where-is-fluent-forms-configured) and [[plugin-integrations]].

### Why doesn’t Fluent Booking pick up theme styles?

Enable **Aegis → Integrations → Forms → Fluent Booking**. Framework CSS (`plugins/fluentbooking.css`) loads when that toggle is on **and** Fluent Booking is active (`FLUENT_BOOKING_VERSION` or `FluentBooking\App\App`), and only if the page has `fluent-booking`, `fcal_`, `fcal-`, or `fluentbooking` markup. See [Plugin FAQ — Fluent Booking](../../plugins/aegis/docs/troubleshooting/faq.md#where-is-fluent-booking-configured) and [[plugin-integrations]].

### Why doesn’t Gravity Forms pick up theme styles?

Enable **Aegis → Integrations → Forms → Gravity Forms**. Framework CSS (`plugins/gravity-forms.css`) loads when that toggle is on **and** Gravity Forms is active (`GFForms`, `GFAPI`, `GF_MIN_WP_VERSION`, or `gravity_form()`), and only if the page has `gform_wrapper`, `gravity-theme`, `gform`, `gform_body`, `gform-body`, or `gfield` markup. Default plugin theme styles are disabled via `gform_disable_form_theme_css`. See [Plugin FAQ — Gravity Forms](../../plugins/aegis/docs/troubleshooting/faq.md#where-is-gravity-forms-configured) and [[plugin-integrations]].

### Why doesn’t Ninja Forms pick up theme styles?

Enable **Aegis → Integrations → Forms → Ninja Forms**. Framework CSS (`plugins/ninja-forms.css`) loads when that toggle is on **and** Ninja Forms is active (`Ninja_Forms`, `function_exists( 'Ninja_Forms' )`, `defined( 'NF_PLUGIN_VERSION' )`, or `defined( 'NF_VERSION' )`), and only if the page has `ninja-forms`, `ninja_forms`, `ninja_form`, `nf-form`, `nf-field`, `nf-form-cont`, or `nf-form-content` markup. Default and opinionated plugin styles (`nf-display`, `ninja-forms-display`, `ninja-forms-display-opinions`, `nf-display-opinions`, `nf-layout-front-end`) are dequeued. See [Plugin FAQ — Ninja Forms](../../plugins/aegis/docs/troubleshooting/faq.md#where-is-ninja-forms-configured) and [[plugin-integrations]].

### Why doesn’t LearnDash pick up theme styles?

Enable **Aegis → Integrations → LMS → LearnDash**. Framework CSS (`plugins/learndash.css`) loads when that toggle is on **and** LearnDash is active (`LEARNDASH_VERSION`, `class_exists( 'SFWD_LMS' )`, `defined( 'LEARNDASH_LMS_PLUGIN_DIR' )`, or `function_exists( 'learndash_init' )`), and only if the page has `learndash-wrapper`, `learndash`, `ld-course`, `ld-lesson`, or `aegis-learndash` markup. Theme styles apply design tokens and dark mode styling to courses, lessons, topics, quizzes, and Focus Mode chrome. See [Plugin FAQ — LearnDash](../../plugins/aegis/docs/troubleshooting/faq.md#where-is-learndash-configured) and [[plugin-integrations]].

## Requirements

### What version of WordPress do I need?

Aegis requires WordPress 7.0 or later. Native Icon library registration (`wp_register_icon`) needs WordPress 7.1 or later; on 7.0 Aegis still merges custom sets into the editor over REST. See [[../features/svg-icons]].

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

### How do I add icons?

Insert the WordPress **Icon** block (`core/icon`) and choose from the Core library or Aegis collections (`social/…`, Pro sets such as Remix Icon). There is no Image Icon variation. Paste custom SVG on the Icon block, or use the SVG Image variation (`is-style-svg`) for logos and illustrations (**Aegis → Blocks → SVG**).

See [[../features/svg-icons]].

### Why does an empty SVG Image block look like a placeholder instead of an upload button?

That is the Aegis empty canvas for `is-style-svg`. Paste markup in **SVG Settings**. The glyph is preview-only and is not saved. There is no Optimize SVG / SVGOMG control.

### Why does the editor say a Button block contains unexpected or invalid content?

Button icon CSS variables (`--wp--custom--icon--*`) are editor preview only. They are not written into saved button HTML. Hard-refresh the editor after updating Aegis so `icon-block-editor.js` loads.

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

**~200 theme patterns** across 30 categories. The companion plugin adds demo and WooCommerce patterns (~45 files, gated on dependencies). Pro adds premium marketing layouts. See [[pattern-reference]] for theme categories and [Plugin Patterns](../../plugins/aegis/docs/features/plugin-patterns.md) for commerce patterns.

### Can I create my own patterns?

Yes. You can:
- Create synced or unsynced patterns from the editor (select blocks → three dots → Create pattern).
- Add PHP pattern files to the `patterns/` directory (for developers).

### What is the Blank template for?

The Blank template provides an empty canvas with no header, footer, or wrapper. It is ideal for marketing landing pages, sales pages, or any page where you want complete control over the layout.

## Blocks

### What custom blocks does Aegis include?

The theme registers Countdown, Slider, Slide, Toggle, Toggle Content, and Related Posts. Video uses WordPress **`core/video`** (enhanced by the framework and companion plugins). Map and Modal require the [Aegis Plugin](../../plugins/aegis/docs/blocks/custom-blocks.md). Block feature toggles are at **Aegis → Blocks**.

### Do I need Gutenberg plugin installed?

No. Aegis works with the block editor built into WordPress core. The Gutenberg plugin is only needed if you want access to experimental features before they are included in WordPress core releases.

### Can I use third-party block plugins with Aegis?

Yes. Aegis is compatible with third-party block plugins. The theme styles are applied through design tokens, so most plugins will inherit appropriate styling.

## WooCommerce

### Why doesn’t WooCommerce pick up theme styles?

Enable **Aegis → Integrations → E-commerce → WooCommerce**. Framework CSS (`plugins/woocommerce/woocommerce.css` and `woocommerce-breadcrumbs.css`) loads when that toggle is on **and** WooCommerce is active (`WooCommerce`, `WC()`, or `WC_VERSION`), and only if the page has WooCommerce / cart / checkout / breadcrumb markup. See [Plugin FAQ — WooCommerce](../../plugins/aegis/docs/troubleshooting/faq.md#where-is-woocommerce-configured) and [[plugin-integrations]].

### Does Aegis support WooCommerce?

Yes. Aegis includes WooCommerce FSE templates (theme) and WooCommerce block patterns (companion plugin, when WC is active). See [[woocommerce-integration]] for details.

### Why don't I see shop or product patterns in the inserter?

WooCommerce block patterns are registered by the **Aegis companion plugin** only when **WooCommerce is active**. Install and activate WooCommerce and the Aegis plugin. Generic commerce marketing patterns (core blocks only) remain in the theme.

### What is the multi-step checkout?

The multi-step checkout splits the WooCommerce checkout into three steps (Shipping → Payment → Review) for a cleaner user experience. It is an alternative to the standard single-page checkout. Assign the **Multi-Step Checkout** template, enable **Aegis → Integrations → E-commerce → WooCommerce**, and the companion plugin loads checkout CSS/JS on that template (or when the page contains `aegis-checkout-multi-step` markup). See [WooCommerce Checkout](../../plugins/aegis/docs/features/woocommerce-checkout.md).

### Do I need WooCommerce installed for the theme to work?

No. WooCommerce is entirely optional. The theme works perfectly for blogs, portfolios, corporate sites, and other non-commerce sites.

## Performance

### Why does my page show zero theme CSS?

This is by design. If a page uses only core WordPress blocks with no Aegis custom blocks, the theme correctly loads zero additional CSS. Core block styles are provided by WordPress itself.

### Will Aegis slow down my site?

No. Aegis is designed for exceptional performance. The zero-base loading strategy means the theme only adds assets that are needed. In many cases, Aegis will be faster than traditional themes that load a full CSS framework on every page.

### Does Aegis work with caching plugins?

Yes. Aegis is compatible with all major caching plugins (WP Super Cache, W3 Total Cache, WP Rocket, LiteSpeed Cache, and others). No special configuration is needed.

### Where do I configure performance toggles?

The theme handles zero-base asset loading — see [[../features/performance|Theme Performance]]. Additional site-wide toggles (oEmbed, dashicons, heartbeat) and Query Loop performance options live in the **Aegis plugin** admin:

- **Aegis → Performance** — WordPress script toggles, embed facades, and Query Loop Performance

With **Aegis Pro**, per-block Query Loop options appear in the editor under **Performance (Pro)** — see [[../../plugins/aegis-pro/docs/features/query-performance|Query Performance (Pro)]].

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
