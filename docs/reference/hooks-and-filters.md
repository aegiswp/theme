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
| `aegis_before_llms_course` / `aegis_after_llms_course` | LifterLMS |
| `aegis_before_sensei_lesson` / `aegis_after_sensei_lesson` | Sensei |
| `aegis_before_fluentform` / `aegis_after_fluentform` | Fluent Forms |
| `aegis_before_gform` / `aegis_after_gform` | Gravity Forms |
| `aegis_before_nf_form` / `aegis_after_nf_form` | Ninja Forms |
| `aegis_before_bbpress_forum` / `aegis_after_bbpress_topic` | bbPress |
| `aegis_before_post_author` / `aegis_after_post_author` | Co-Authors Plus |
| `aegis_before_map_block` / `aegis_after_map_block` | Map block |

Full catalog: [Plugin Hook Patterns](../../plugins/aegis/docs/features/hook-patterns.md).

## Admin Actions (Plugin)

| Hook | Timing |
|------|--------|
| `aegis_admin_before_blocks_page` | Before Blocks admin render |
| `aegis_admin_before_modals_page` | Before Modals admin render |
| `aegis_admin_before_hooks_page` | Before Hooks admin render |
| `aegis_admin_before_snippets_page` | Before Snippets admin render |
| `aegis_admin_before_integrations_page` | Before Integrations admin render |
| `aegis_admin_before_conditionals_page` | Before Conditionals admin render |
| `aegis_admin_before_general_settings_page` | Before Settings admin render |
| `aegis_admin_before_license_page` | Before License admin render (Pro) |
| `aegis_admin_conditionals_sections` | Extra Conditionals admin sections (Pro presets) |
| `aegis_integrations_nav_items` | Integrations sidebar nav |
| `aegis_integrations_maps_section` | Maps settings section |
| `aegis_integrations_analytics_section` | Analytics settings section |

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
| `aegis_dark_mode` | Enable/disable dark mode (default true) |
| `aegis_dynamic_custom_properties` | Dynamic CSS custom properties |
| `aegis_patterns` | Pattern categories |
| `aegis_pattern_dirs` | Pattern scan directories |
| `aegis_template_tags` | Template tag output |
| `aegis_words_per_minute` | Reading time calculation (default 200) |
| `aegis_comments_form_title_tag` | Comments form heading tag |
| `aegis_placeholder_svg` | Placeholder SVG markup |
| `aegis_format_inline_js` | Inline JS formatting |

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
| `aegis_related_posts_query` | Related Posts WP_Query args |

## Usage Example

```php
add_action( 'aegis_after_content', function () {
    if ( is_single() ) {
        echo do_blocks( '<!-- wp:pattern {"slug":"cta-simple"} /-->' );
    }
} );
```

## Next Steps

- [[hook-patterns]] — Injection hook guide
- [Plugin Architecture](../../plugins/aegis/docs/development/architecture.md)
- [[architecture]] — Theme architecture
