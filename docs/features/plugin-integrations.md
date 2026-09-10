# Plugin Integrations (Framework Styling)

The Aegis **framework** (`vendor/aegis/framework`) loads compatibility CSS for supported third-party plugins when the **Aegis plugin** integration toggle is enabled.

Integration styles use design tokens and adapt to style variations and dark mode. Styles load only when the plugin is active **and** its integration is enabled in **Aegis → Integrations**.

## Framework-Integrated Plugins

| Plugin | Integration styling |
|--------|---------------------|
| WooCommerce | Shop, cart, checkout, and product styling (`plugins/woocommerce/woocommerce.css`) plus breadcrumbs (`plugins/woocommerce/woocommerce-breadcrumbs.css`). Detection is `WooCommerce` / `WC()` / `WC_VERSION`. Classic and Store Breadcrumb delimiters wrap in `.aegis-breadcrumb-separator`. Snippet locations `aegis_before_woocommerce_checkout` / `aegis_after_woocommerce_checkout` and `aegis_before_woocommerce_cart` / `aegis_after_woocommerce_cart`. See [[woocommerce-integration]]. |
| Fluent Forms | Form element and button styling (`plugins/fluent-forms.css`) adapting to theme design tokens and dark mode; deactivates default public CSS (`fluentform_load_default_public`). Detection is `FLUENTFORM`, `FLUENTFORM_VERSION`, or `FluentForm\App\Modules\Form\Form`. Pattern control (`fluentforms_keep_patterns`) unregisters plugin patterns at `init` priority 11 when enabled in Pro. Snippet locations `aegis_before_fluentform` / `aegis_after_fluentform`. |
| Fluent Booking | Calendar and appointment booking styling (`plugins/fluentbooking.css`) adapting to theme design tokens and dark mode. Detection is `FLUENT_BOOKING_VERSION` or `FluentBooking\App\App`. Pattern control (`fluentbooking_keep_patterns`) unregisters plugin patterns at `init` priority 11 when enabled in Pro. |
| Gravity Forms | Form element, input, and button styling (`plugins/gravity-forms.css`) adapting to theme design tokens and dark mode; deactivates default theme CSS (`gform_disable_form_theme_css`). Detection is `GFForms`, `GFAPI`, `GF_MIN_WP_VERSION`, or `gravity_form()`. Snippet locations `aegis_before_gform` / `aegis_after_gform`. |
| Ninja Forms | Form element, input, and button styling (`plugins/ninja-forms.css`) adapting to theme design tokens and dark mode; deactivates default and opinionated plugin styles (`nf-display`, `ninja-forms-display`, `ninja-forms-display-opinions`, `nf-display-opinions`, `nf-layout-front-end`). Detection is `Ninja_Forms`, `function_exists( 'Ninja_Forms' )`, `defined( 'NF_PLUGIN_VERSION' )`, or `defined( 'NF_VERSION' )`. Snippet locations `aegis_before_nf_form` / `aegis_after_nf_form`. |
| LifterLMS | Course, lesson, and syllabus styling (`plugins/lifterlms.css`) adapting to theme design tokens and dark mode; registers theme support (`lifterlms`, `lifterlms-sidebars`), suppresses default sidebars (`llms_get_theme_default_sidebar`), and adds `aegis-lifterlms-page` body class on LifterLMS courses, lessons, memberships, quizzes, and archives. Pattern control (`lifterlms_keep_patterns`) unregisters plugin patterns at `init` priority 11 when enabled in Pro. Detection is `LifterLMS`, `LLMS()`, `LLMS_VERSION`, or `LLMS_PLUGIN_FILE`. Snippet locations `aegis_before/after_llms_course` and `aegis_before/after_llms_lesson`. |
| LearnDash | Course, lesson, topic, quiz, and profile styling (`plugins/learndash.css`) adapting to theme design tokens and dark mode; maps theme custom logo to Focus Mode (`learndash_focus_header_logo_url`, `learndash_focus_mode_logo`), sets Focus Mode logo alt text (`learndash_focus_header_logo_alt`) to site name, and adds `aegis-learndash-page` body class on LearnDash content. Pattern control (`learndash_keep_patterns`) unregisters plugin patterns at `init` priority 11 when enabled in Pro. Detection is `LEARNDASH_VERSION`, `class_exists( 'SFWD_LMS' )`, `defined( 'LEARNDASH_LMS_PLUGIN_DIR' )`, or `function_exists( 'learndash_init' )`. Snippet locations `aegis_before/after_learndash_course`, `aegis_before/after_learndash_lesson`, `aegis_before/after_learndash_topic`, `aegis_before/after_learndash_quiz`, and `aegis_learndash_focus_header/footer`. |
| Sensei LMS | Course, lesson, quiz, and progress styling (`plugins/sensei-lms.css`) adapting to theme design tokens and dark mode; registers theme support (`sensei`, `sensei-lms`), disables default plugin styles (`sensei_disable_styles`), and adds `aegis-sensei-page` body class on Sensei courses, lessons, quizzes, questions, messages, archives, and taxonomies. Pattern control (`sensei_keep_patterns`) unregisters plugin patterns at `init` priority 11 when enabled in Pro. Detection is `Sensei_Main`, `Sensei()`, `Sensei`, `SENSEI_VERSION`, or `SENSEI_PLUGIN_FILE`. Snippet locations `aegis_before/after_sensei_course`, `aegis_before/after_sensei_lesson`, and `aegis_before/after_sensei_quiz`. |
| Easy Digital Downloads | Download, checkout, cart, and purchase-form styling (`plugins/edd/edd.css`). Detection is `Easy_Digital_Downloads`, `EDD()`, or `EDD_VERSION`. Snippet locations `aegis_before_edd_download` / `aegis_after_edd_download`. |
| AffiliateWP | Affiliate Area and login/register form styling (`plugins/affiliate-wp.css`). Detection is `Affiliate_WP`, `affiliate_wp()`, or `AFFILIATEWP_VERSION`. Skips bundled `affwp-forms` CSS on the frontend (admin keeps it). Snippet locations `aegis_before_affwp_dashboard` / `aegis_after_affwp_dashboard`. |
| Co-Authors Plus | Multi-author `core/post-author*` replace when the Aegis plugin is absent. With the plugin active, the plugin owns guest URLs, CSS (`public/css/co-authors-plus.css`), and the optional **Author Schema** extra. The framework class does not emit JSON-LD. |
| Meta Box | Field UI / frontend form styling (`plugins/meta-box.css`). Detection is `RWMB_Loader` or `rwmb_meta()` (including AIO). Also registers `aegis/metabox` block bindings and theme colour palettes for Meta Box colour pickers. |
| bbPress | Forum styling (`plugins/bbpress.css`, dequeues bbPress default CSS); FSE **Page** wrap via `locate_block_template( $template, 'page', array( 'page.php' ) )` |
| Syntax Highlighting Code Block | Radius/padding/line-number overlay (`plugins/syntax-highlighting-code-block.css`) when Weston Ruter’s plugin is present. Detection is `Syntax_Highlighting_Code_Block\PLUGIN_VERSION` or `boot()`. Overlay injects on `hljs` / `shcb-` markup, not a plain `wp-block-code`. Optional `settings.custom.highlightJs` in theme.json locks the Highlight.js stylesheet and hides the plugin Customizer picker. |
| Code Block Pro | Radius/typography overlay (`plugins/code-block-pro.css`) when `kevinbatdorf/code-block-pro` is present. Detection is `CBPRouter` or the registered block — not `CODE_BLOCK_PRO_VERSION`. |
| BunnyCDN | Stream player embed styling (`plugins/bunnycdn.css`) when **Aegis → Connectors → BunnyCDN** is on (SaaS connector, not a WordPress plugin). Snippet locations `aegis_before_video_block` / `aegis_after_video_block`. Pro Stream API and editor panels live in Aegis Pro. |

## Integrations Dashboard

Credentials live at **Aegis → Connectors** (BunnyCDN, Maps, analytics). Pattern control and extra toggles (WooCommerce, EDD, AffiliateWP, ACF, Meta Box, Rank Math, Yoast, LearnDash pattern keep, Co-Authors Plus, and so on) are on **Aegis → Integrations**. Extras stay off unless that plugin is active and the parent integration is on. **Code Block Pro** and **Syntax Highlighting Code Block** have no extras — those toggles only gate overlay CSS. **Meta Box Field** sits under the Meta Box parent (same pattern as ACF). Framework CSS above still loads when the matching integration (or Connectors) toggle is enabled.

See [Integrations Dashboard](../../plugins/aegis/docs/features/integrations-dashboard.md).

## SEO Plugins

Aegis delegates FAQ, Event, Local Business, and Video schema, plus Pro video sitemaps, to Rank Math, Yoast, AIOSEO, or SEOPress. Visual breadcrumbs are powered by the WordPress Core Breadcrumbs block (`core/breadcrumbs`) styled to theme design system tokens. Rank Math’s `.rank-math-breadcrumb`, SEOPress’s `.seopress-breadcrumbs`, and Yoast’s `#breadcrumbs` / `.yoast-breadcrumbs` trails are styled from the same `breadcrumbs.css` file when that markup is on the page; separators use Rank Math `.separator` and SEOPress `.breadcrumb-sep` (Yoast keeps nested-span text separators and `.breadcrumb_last` without a forced flex wrapper) so plugin-configured characters are preserved. The active SEO plugin outputs `BreadcrumbList` JSON-LD schema without interference. See [SEO Schema Delegation](../../plugins/aegis/docs/features/seo-schema-delegation.md).

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
| FluentCRM / WP Fusion | **Aegis → Integrations → CRM**. FluentCRM video events are Pro (`core/video`). WP Fusion owns tag, list, and CRM logged-in conditions (catalog pickers; Lite counts as installed). No framework CSS. |
| Advanced Custom Fields / Secure Custom Fields | **Aegis → Integrations → Developer**. Field visibility, Query Loop pickers, featured-image sources, and Pro video Dynamic Source. No framework CSS. |

## Next Steps

- [[woocommerce-integration]] — WooCommerce templates
- [Integrations Dashboard](../../plugins/aegis/docs/features/integrations-dashboard.md)
- [[performance]] — Conditional loading
