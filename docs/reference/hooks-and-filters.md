# Hooks and Filters

This page documents verified WordPress hooks and filters in the Aegis theme, framework, and companion plugins.

## Framework Injection Actions

Fired by `vendor/aegis/framework` CoreBlocks:

| Hook | Location |
|------|----------|
| `aegis_before_{slug}` | Before template part `{slug}` (e.g. `aegis_before_header`) |
| `aegis_after_{slug}` | After template part `{slug}` |
| `aegis_before_content` | Before main post content block |
| `aegis_after_content` | After main post content block |

See [[hook-patterns]] for usage examples.

## Plugin Integration Actions

Fired when integrations are enabled (free plugin `IntegrationInjector`):

| Hook | Context |
|------|---------|
| `aegis_before_woocommerce_checkout` / `aegis_after_woocommerce_checkout` | WooCommerce checkout |
| `aegis_before_woocommerce_cart` / `aegis_after_woocommerce_cart` | WooCommerce cart |
| `aegis_before_edd_download` / `aegis_after_edd_download` | EDD |
| `aegis_before_affwp_dashboard` / `aegis_after_affwp_dashboard` | AffiliateWP |
| `aegis_before_llms_course` / `aegis_after_llms_course` | LifterLMS course |
| `aegis_before_llms_lesson` / `aegis_after_llms_lesson` | LifterLMS lesson |
| `aegis_before_sensei_course` / `aegis_after_sensei_course` | Sensei course |
| `aegis_before_sensei_lesson` / `aegis_after_sensei_lesson` | Sensei lesson |
| `aegis_before_sensei_quiz` / `aegis_after_sensei_quiz` | Sensei quiz |
| `aegis_before_fluentform` / `aegis_after_fluentform` | Fluent Forms |
| `aegis_before_gform` / `aegis_after_gform` | Gravity Forms |
| `aegis_before_nf_form` / `aegis_after_nf_form` | Ninja Forms |
| `aegis_before_learndash_course` / `aegis_after_learndash_course` | LearnDash course |
| `aegis_before_learndash_lesson` / `aegis_after_learndash_lesson` | LearnDash lesson |
| `aegis_before_learndash_topic` / `aegis_after_learndash_topic` | LearnDash topic |
| `aegis_before_learndash_quiz` / `aegis_after_learndash_quiz` | LearnDash quiz |
| `aegis_before_bbpress_forum` / `aegis_after_bbpress_forum` | bbPress forums loop |
| `aegis_before_bbpress_topic` / `aegis_after_bbpress_topic` | bbPress single topic |
| `aegis_before_post_author` / `aegis_after_post_author` | `core/post-author` and `co-authors/block` |
| `aegis_before_map_block` / `aegis_after_map_block` | Map block |
| `aegis_before_video_block` / `aegis_after_video_block` | `core/video` when Connectors → BunnyCDN is on |

### Theme Integration Actions

Fired by the theme framework itself (`vendor/aegis/framework/src/Integrations/LearnDash.php`), not by the companion plugin. Each fires once per request.

| Hook | Arguments | Context |
|------|-----------|---------|
| `aegis_learndash_focus_header` | `int $course_id` | Top of the LearnDash Focus Mode layout |
| `aegis_learndash_focus_footer` | `int $course_id` | Bottom of the LearnDash Focus Mode layout |

Full catalog: [Plugin Hook Patterns](../../../../plugins/aegis/docs/features/hook-patterns.md).

## Admin Actions (Plugin)

| Hook | Timing |
|------|--------|
| `aegis_admin_before_blocks_page` | Before Blocks admin render |
| `aegis_admin_before_modals_page` | Before Modals admin render |
| `aegis_admin_before_hooks_page` | Before Hooks admin render |
| `aegis_admin_before_visibility_presets_page` | Before Visibility Presets admin render |
| `aegis_admin_before_snippets_page` | Before Snippets admin render |
| `aegis_admin_before_integrations_page` | Before Integrations admin render |
| `aegis_admin_before_connectors_page` | Before Connectors admin render |
| `aegis_admin_before_conditionals_page` | Before Conditionals admin render |
| `aegis_admin_before_general_settings_page` | Before Settings admin render |
| `aegis_admin_before_license_page` | Before License admin render (Pro) |
| `aegis_admin_conditionals_sections` | Extra Conditionals admin sections |
| `aegis_connectors_nav_items` | Connectors sidebar nav |
| `aegis_connectors_maps_section` | Google Maps settings section |
| `aegis_connectors_analytics_section` | Analytics settings section |

## Admin Filters (Plugin / Pro)

| Filter | Description |
|--------|-------------|
| `aegis_admin_tabs` | Register admin menu tabs |
| `aegis_admin_tab_priorities` | Tab sort order |
| `aegis_injection_locations` | Injection location catalog |

## Pro Hook Pattern Filters

| Filter | Description |
|--------|-------------|
| `aegis_available_hook_patterns` | Custom hook pattern options |
| `aegis_hook_patterns_limit` | Max patterns loaded (default 100) |
| `aegis_hook_pattern_content` | Filter rendered hook pattern content |

## Framework Filters

| Filter | Description |
|--------|-------------|
| `aegis_load_all_scripts` | Force-load all framework scripts |
| `aegis_load_all_styles` | Force-load all framework styles |
| `aegis_system_fonts` | System font definitions |
| `aegis_dark_mode` | Enable or disable dark mode (default `true`). Returning `false` also removes the editor light/dark preview toggle |
| `aegis_dynamic_custom_properties` | Dynamic CSS custom properties |
| `aegis_patterns` | Pattern categories |
| `aegis_pattern_dirs` | Pattern scan directories |
| `aegis_template_tags` | Template tag output |
| `aegis_template_tag_post_fields` | Post fields that `{field}` template tags can print. Argument: `string[] $fields`. Defaults to public fields only: title, excerpt, dates, author, status, slug, parent, post type, and comment count (`TemplateTags.php`) |
| `aegis_query_protected_meta_keys` | `_`-prefixed meta keys that Query Loop meta filters and meta sorting accept. Argument: `string[] $keys`. Default: WooCommerce product keys (`_price`, `_regular_price`, `_sale_price`, `_stock`, `_wc_average_rating`, `_wc_review_count`) (`QueryEnhancements.php`) |
| `aegis_words_per_minute` | Reading time calculation (default 200) |
| `aegis_comments_form_title_tag` | Comments form heading tag |
| `aegis_placeholder_svg` | Placeholder SVG markup |
| `aegis_format_inline_js` | Inline JS formatting |
| `aegis_default_mode` | Default color mode, `'light'` or `'dark'`. Arguments: `string $mode`, `array $global_settings`. The default is `'dark'` when global settings define `custom.lightMode`, otherwise `'light'`. Also sets the starting mode of the editor preview toggle (`DarkMode.php`) |
| `aegis_inline_css` / `aegis_inline_js` | Final inline CSS or JS string. Arguments: `string $string`, `string $template_html`, `bool $load_all`, `object $instance`. The prefix is the asset handle, which is the theme folder name (`AssetsTrait.php`) |
| `aegis_template_html` | Collected front-end template, template part, and post markup that decides which conditional assets load. Argument: `string $markup` (`FrontendContentContext.php`) |
| `aegis_editor_data` | Data passed to the framework editor script as `window.aegis`. Argument: `array $data` (`EditorAssets.php`) |
| `aegis_query_enhancements_data` | Post types, taxonomies, meta operators, meta types, and order-by options for the Query enhancements panel. Argument: `array $data` (`QueryEnhancements.php`) |
| `aegis_icon_sets` | Registered icon sets. Argument: `array $icon_sets` (set name ⇒ folder path) (`vendor/aegis/icons/src/Icon.php`) |

## Theme Filters

| Filter | Description |
|--------|-------------|
| `aegis_dynamic_template_part_slug` | Swap a `core/template-part` slug at render time when an alternate `parts/{slug}.html` exists. See [[dynamic-template-parts]]. |
| `aegis_theme_update_repository` | GitHub repository (`owner/name`) the theme checks for updates. Default `aegiswp/theme`. Argument: `string $repository` (`src/Admin/GitHubUpdater.php`). See [[updating]]. |
| `aegis_companion_package_url` | Zip URL the companion plugin notice installs from. Default: the `aegis.zip` package of the latest plugin release. Argument: `string $package` (`src/Admin/CompanionNotice.php`). Use it to pin a release or a mirror. |

## Pro Filters

| Filter | Description |
|--------|-------------|
| `aegis_font_families` | Font families for theme.json |
| `aegis_pro_analytics_retention_days` | Video analytics retention |
| `aegis_pro_computed_value` | Block Bindings computed values |
| `aegis_tabs_tab_visibility` | Tab block visibility |

## Block Filters (Examples)

| Filter | Description |
|--------|-------------|
| `aegis_related_posts_query` | Related Posts `WP_Query` args. Arguments: `array $query_args`, `int $post_id`, `string $context` (the context gets a `-fallback` suffix for the fallback query, and is `block-preview` in the editor) |

## Usage Example

```php
add_action( 'aegis_after_content', function () {
    if ( is_single() ) {
        echo do_blocks( '<!-- wp:pattern {"slug":"cta-newsletter"} /-->' );
    }
} );
```

## Next Steps

- [Code Snippets](code-snippets.md) — Copy-ready examples for these hooks

- [[hook-patterns]] — Injection hook guide
- [[dynamic-template-parts]] — Contextual template part slug swaps
- [Plugin Architecture](../../../../plugins/aegis/docs/development/architecture.md)
- [[architecture]] — Theme architecture
