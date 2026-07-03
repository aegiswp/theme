# Hook Patterns (Theme Injection Hooks)

The Aegis **framework** fires injection hooks at template part and post content boundaries. These hooks allow snippets, custom code, and (with Pro) hook patterns to inject content without editing template files.

## Framework-Fired Hooks

These hooks are fired automatically by `vendor/aegis/framework` CoreBlocks:

### Template Part Hooks

For each template part slug (e.g. `header`, `footer`), the framework wraps output with:

| Hook | Fires |
|------|-------|
| `aegis_before_{slug}` | Before the template part renders |
| `aegis_after_{slug}` | After the template part renders |

Examples: `aegis_before_header`, `aegis_after_footer`.

### Content Hooks

| Hook | Fires |
|------|-------|
| `aegis_before_content` | Before the main post content block output |
| `aegis_after_content` | After the main post content block output |

## Integration-Bridged Hooks

When the **Aegis plugin** integration is enabled, additional hooks are bridged from third-party plugins (WooCommerce checkout/cart, Gravity Forms, Fluent Forms, EDD, bbPress, map block, etc.). These appear in the plugin injection catalog but are not fired by the theme alone.

See the [Aegis Plugin Hook Patterns documentation](../../plugins/aegis/docs/features/hook-patterns.md).

## Snippets and Code Injection

Attach CSS, JS, HTML, or PHP snippets to any catalogued hook location via **Aegis → Code Snippets**. See [Code Snippets](../../plugins/aegis/docs/features/code-snippets.md) and [Injection Preview](../../plugins/aegis/docs/features/injection-preview.md).

## Hook Pattern CPT (Pro)

Managed hook pattern posts that inject block markup at runtime require **Aegis Pro**. See [Hook Patterns Pro](../../plugins/aegis-pro/docs/features/hook-patterns-pro.md).

## Basic Usage

```php
add_action( 'aegis_after_header', function () {
    echo '<!-- wp:paragraph --><p>Announcement banner</p><!-- /wp:paragraph -->';
} );
```

Use WordPress conditional tags to limit context (`is_front_page()`, `is_single()`, etc.).

## Next Steps

- [[hooks-and-filters]] — Verified hooks and filters reference
- [Plugin Hook Patterns](../../plugins/aegis/docs/features/hook-patterns.md)
- [Pro Hook Patterns](../../plugins/aegis-pro/docs/features/hook-patterns-pro.md)
- [Code Snippets](../../plugins/aegis/docs/features/code-snippets.md)
