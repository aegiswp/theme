# Core Video Block

Aegis does **not** register a custom `aegis/video` block. Video uses WordPress **`core/video`**, enhanced by the theme framework, companion plugin, and Aegis Pro.

## Layer responsibilities

| Layer | Enhancement |
|-------|-------------|
| **Theme framework** | Styling, aspect ratio, rounded corners, shadow — see [[enhanced-core-blocks]] |
| **Free plugin** | Editor scripts and playback options at **Aegis → Blocks → Video** |
| **Aegis Pro** | BunnyCDN hosting, chapters, engagement, analytics — see [Video Stack](../../plugins/aegis-pro/docs/features/video-stack.md) |

## Usage

1. Insert the standard **Video** block (`core/video`) from the block inserter.
2. Upload or embed a video as with any block theme.
3. Configure Pro features in the block sidebar when Pro is active.
4. Toggle editor sub-features at **Aegis → Blocks → Video**.

## Migrating legacy `aegis/video` content

Older sites may still contain **`aegis/video`** blocks. Migrate to **`core/video`** before or after updating:

```bash
studio wp eval-file wp-content/themes/aegis/tools/migrate-aegis-video.php
```

See [[../getting-started/updating#aegisvideo--corevideo]] and [Pro Known Issues](../../plugins/aegis-pro/docs/troubleshooting/known-issues.md#legacy-aegisvideo-block).

## Next Steps

- [[enhanced-core-blocks]] — Framework media block styling
- [Plugin Block Variations](../../plugins/aegis/docs/blocks/block-variations.md) — Video toggles
- [Pro Video Stack](../../plugins/aegis-pro/docs/features/video-stack.md)
