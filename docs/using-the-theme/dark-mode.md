# Dark Mode

Aegis includes built-in dark mode support that inverts the color scheme for comfortable viewing in low-light environments. Dark mode is controlled by applying the `is-style-dark` class to the `<body>` element.

## How Dark Mode Works

Dark mode in Aegis uses a class-based toggle mechanism:

- **Light mode (default):** The site renders with the standard color palette defined in the active style variation. Midnight, Obsidian, and Zinc start from a dark background.
- **Dark mode:** When the `is-style-dark` class is present on the `<body>` element, CSS custom properties are remapped to their dark equivalents.

This approach ensures that:

- All design tokens automatically adapt to dark mode.
- Block patterns and templates do not require separate dark versions.
- Style variations maintain their character in both modes.

## Enabling Dark Mode

### Globally via Template

To enable dark mode site-wide:

1. Open the Site Editor (**Appearance → Editor**).
2. Edit the template that wraps your content.
3. Select the outermost Group block.
4. In the **Advanced** section of the block settings, add `is-style-dark` to the **Additional CSS class(es)** field.
5. Save the template.

### Per-Page via Page Settings

To enable dark mode on individual pages:

1. Edit the page in the block editor.
2. Select the root Group block or add one wrapping all content.
3. Add `is-style-dark` to the **Additional CSS class(es)** field.
4. Update the page.

### Via Toggle Button

The **Utility Dark Mode Toggle** pattern (`utility-dark-mode-toggle`) gives visitors a light and dark switch:

1. Each button sets `is-style-dark` or `is-style-light` on the `<body>` element.
2. It also sets the `aegisDarkMode` cookie (`true` or `false`, kept for one day), so the server adds the same class on the next page load. A value of `system` follows the operating system again.
3. Place the pattern in the header template part to offer it site-wide.

For testing, add `?dark_mode=true` or `?dark_mode=false` to any URL. The URL parameter overrides the cookie for that request.

## Color Mapping

Dark mode swaps each palette shade with its counterpart (`DarkMode.php`). A few examples:

| Token | Becomes in Dark Mode |
|-------|----------------------|
| `neutral-0` (page background) | `neutral-950` |
| `neutral-50` (surfaces) | `neutral-900` |
| `neutral-200` (borders) | `neutral-700` |
| `neutral-700` (body text) | `neutral-200` |
| `neutral-800` (headings) | `neutral-100` |
| `primary-900` (buttons) | `primary-100` |
| `primary-600` | `primary-400` |
| `success-600`, `warning-600`, `error-600`, `info-600` | the `-100` shade, and the reverse |

The `500` shades stay the same. The page background comes from `--wp--custom--body--background`.

## Respecting System Preferences

Aegis follows the visitor's operating system preference with the `prefers-color-scheme` media query until the visitor picks a mode:

```css
@media (prefers-color-scheme: dark) {
    html body:not(.is-style-light):not(.is-style-dark) {
        /* Dark mode custom properties applied */
    }
}
```

Once the visitor uses the toggle, the body carries `is-style-light` or `is-style-dark`, and the system preference no longer applies.

## Default Mode

On the front end, the body gets a `default-mode-light` or `default-mode-dark` class. The default is light, unless the global settings define `custom.lightMode`, in which case it is dark. Change it with the `aegis_default_mode` filter:

```php
add_filter( 'aegis_default_mode', function ( string $mode, array $global_settings ): string {
    return 'dark';
}, 10, 2 );
```

The filter also sets the starting mode of the editor preview toggle. See [[hooks-and-filters]].

## Previewing Dark Mode in the Editor

Since 1.0.1, the block editor and Site Editor have a light and dark preview toggle in the top bar, next to the Styles and Settings buttons (moon and sun icons).

- One click switches the editor canvas between light and dark. The canvas uses the same token remaps as the front end.
- The preview only affects the editor. It does not change your site or any content.
- Your choice is saved per user in the editor preferences. With no saved choice, the editor starts in the site's default mode.
- The toggle's sidebar also has **Light** and **Dark** buttons as a fallback.

The toggle loads only when dark mode is available. Returning `false` from `aegis_dark_mode`, or setting `custom.darkMode` to `false` in global settings, removes it.

## Dark Mode and Style Variations

All 60 style variations support dark mode. Each variation defines both light and dark color mappings, so switching to dark mode preserves the character of the chosen variation (for example, the "Ocean" variation will use dark navy backgrounds rather than generic dark gray).

## Accessibility Considerations

Dark mode in Aegis is designed to keep default token pairings at **WCAG 2.2 AA** contrast levels:

- Text contrast ratios remain above 4.5:1 for normal text on swapped surfaces.
- Large text maintains at least 3:1 contrast.
- Interactive elements retain visible `:focus` / `:focus-visible` indicators on dark backgrounds.
- Color is never the sole indicator of meaning.

Editor-chosen colors and media overlays still need a contrast check. See [[accessibility]].

To hide a block, post, or hook pattern in light or dark mode, use **Aegis → Conditionals → Accessibility → Color Scheme**. Those rules follow the same `is-style-*` / `default-mode-*` classes as the visitor toggle. See [Plugin Conditional Logic](../../../../plugins/aegis/docs/features/conditional-logic.md#accessibility-extras).

## Per-Section Dark Mode

You can apply dark mode to individual sections rather than the entire page:

1. Select a Group block or container section.
2. Add `is-style-dark` to the **Additional CSS class(es)** field.
3. That section will render with dark mode colors while the rest of the page remains in light mode.

This technique is useful for creating visual contrast between sections, such as a dark hero section followed by light content.

## Icons in Dark Mode

The WordPress **Icon** block uses `currentColor` for fills (and strokes on outline sets). Literal black in library SVGs is rewritten to `currentColor`, so icons follow the surrounding text token when `is-style-dark` is applied. Do not treat missing front-end icons as a dark-mode bug until you have ruled out skip-link / template-part wrapping — see [[svg-icons]] and [[common-issues#icons-visible-in-the-editor-but-missing-on-the-front-end]].

## Disabling Dark Mode

To turn dark mode off completely, return `false` from the `aegis_dark_mode` filter:

```php
add_filter( 'aegis_dark_mode', '__return_false' );
```

This removes the dark mode styles, the system-preference rule, and the editor preview toggle. Setting `settings.custom.darkMode` to `false` in a child theme's `theme.json` has the same effect.

If you only want to stop offering a choice, remove the dark mode toggle pattern from your templates and parts.

## Custom Dark Mode Adjustments

To override specific dark mode colors:

1. Open **Appearance → Editor → Styles**.
2. Make color adjustments in the Styles panel.
3. These overrides apply to both light and dark modes by default.

For dark-mode-specific overrides, you can use the Additional CSS section or a custom stylesheet that targets the `.is-style-dark` class:

```css
.is-style-dark {
    --wp--preset--color--primary-500: #a1a1aa;
}
```

## Implementation Details

The dark mode system works through CSS custom property reassignment (`vendor/aegis/framework/src/DesignSystem/DarkMode.php`):

1. The framework outputs two rule sets: `html body.is-style-light` and `html body.is-style-dark`, each with the full palette for that mode.
2. Each palette shade is swapped with its counterpart from the shade map (see Color Mapping).
3. The same remaps apply to any block with the `is-style-dark` or `is-style-light` class, which is how per-section dark mode works.
4. A `prefers-color-scheme` rule applies the opposite mode when the visitor has not chosen one.
5. The server reads the `aegisDarkMode` cookie and the `dark_mode` URL parameter to add the right body class.

No JavaScript framework or library is required. The visitor toggle is a few lines of inline script in the toggle pattern.

## Next Steps

- [[color-palette]] — Understand the full color system and its light/dark mappings.
- [[style-variations]] — See how variations look in both modes.
- [[global-styles]] — Customize colors for light and dark modes.
- [[accessibility]] — Learn about the accessibility features in Aegis.
