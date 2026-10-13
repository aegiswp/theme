# Icons (WordPress 7.1+)

Decorative icons use the WordPress **Icon** block (`core/icon`). There is no Image Icon variation (`core/image` + `is-style-icon`).

## Registration

- WordPress core registers the `core` collection from `wp-includes/assets/icon-library-manifest.php`.
- Aegis `Icons\Library` (`init` priority 11) registers remaining custom sets with `wp_register_icon_collection()` / `wp_register_icon()` when WP ≥ 7.1, `wp_register_icon` exists, and **Aegis → Blocks → Icon** is enabled.
- IDs are `{collection}/{name}` (one slash). WordPress-provided icons use `core/{name}`. Custom sets use the folder slug (`social/facebook`, `remixicon/home-line`, leftover Gutenberg-only `wordpress/{name}`).
- Aegis does not ship SVG copies of icons that already exist in the Core library. `Aegis\Icons\Icon::get_svg( 'wordpress', $name )` falls back to `wp_get_icon( 'core/' . $name )` when the file was removed.
- Legacy saved IDs `aegis/{set}/{name}` are parsed by `IconMigrationMapper::from_registry_id()`.

## Collections

| Collection slug | Label | Typical source |
|-----------------|-------|----------------|
| `core` | WordPress | Core (not registered by Aegis) |
| `wordpress` | Aegis | Gutenberg-only leftovers in the theme `wordpress` set |
| `social` | Social | Theme |
| `remixicon` | Remix Icon | Pro `assets/icons/remixicon` |
| `phosphor-duotone` | Phosphor Duotone | Pro |
| `heroicons` | Heroicons | Pro |
| `feather` | Feather | Pro |
| `hand-drawn` | Hand Drawn | Pro |
| `plugin` | Plugins | Pro |
| `brand` | Brand | Pro |

Pro directories are merged via `Aegis\Icons\Icon::FILTER` in `plugins/aegis-pro/config/icons.php`.

## Front end

- `CoreBlocks\Icon` (`render_block` priority 11) re-renders non-`core` library icons from disk so kses does not strip `stroke` / `opacity` on outline sets.
- SVG utility `Aegis\Icons\Icon::apply_theme_color()` maps literal black fills to `currentColor` for dark/light mode.
- `public/css/core-blocks/icon.css` uses `currentColor`, preserves `fill="none"` + stroke, and sets `height: auto` with `aspect-ratio: 1`.

## Skip link vs template parts

`SkipLink` hooks `render_block_core/template-part` at priority **11** (after `TemplatePart` at 10). `TemplatePart` uses `WP_HTML_Tag_Processor`, skips `.skip-link` when choosing the landmark, and sets `role="banner|main|contentinfo"`. Do not prepend the skip link before the template-part HTML is parsed — that nested the header inside `.screen-reader-text` and hid header icons on the front end.

## REST and editor extras

- `aegis/v1/icons` remains for the button/tab picker (`RestIconsMerge::register_rest_route()`).
- `RestIconsMerge::merge_aegis_icons` is skipped on WP 7.1+ (`wp_register_icon` exists). On WP 7.0 it still appends Aegis sets to `GET /wp/v2/icons`.
- Editor extras: `public/js/icon-block-editor.js` (link, custom SVG, gallery, gradient). `mapToCoreIcon` emits `{set}/{name}`, not `aegis/{set}/{name}`.

## Migration

```text
wp aegis migrate-icons
studio wp aegis migrate-icons --dry-run
```

Converts leftover Image icons (`is-style-icon`) and legacy `aegis/{set}/{name}` ids across all post types and `widget_block`. Mapper + CLI + editor transform are import tools, not a second renderer.

Button/tab `iconSet` / `iconName` attributes are unchanged.
