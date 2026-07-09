# Icons (WordPress 7.0+)

## Current (7.0 bridge)

- Decorative icons: **`core/icon`** with attribute `icon` (`core/{slug}` or `aegis/{set}/{slug}`).
- **Aegis bridge:** `Aegis\Framework\CoreBlocks\Icon` renders `aegis/*` IDs; `RestIconsMerge` appends Aegis picker items to `GET /wp/v2/icons`.
- **Legacy:** `core/image` + `is-style-icon` still renders via `Aegis\Framework\BlockVariations\Icon` (image blocks only).
- **Migration:** `wp aegis migrate-icons` or `studio wp eval-file wp-content/themes/aegis/bin/migrate-icon-patterns-wp.php`.

## Planned (7.1+)

When `WP_Icons_Registry` exposes public registration for third-party sets, register Aegis directories once and retire the REST merge + `aegis/` ID prefix (IDs may stay the same).
