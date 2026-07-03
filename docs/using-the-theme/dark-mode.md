# Dark Mode

Aegis includes built-in dark mode support that inverts the color scheme for comfortable viewing in low-light environments. Dark mode is controlled by applying the `is-style-dark` class to the `<body>` element.

## How Dark Mode Works

Dark mode in Aegis uses a class-based toggle mechanism:

- **Light mode (default):** The site renders with the standard color palette defined in the active style variation.
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

Aegis supports a user-facing dark mode toggle that allows visitors to switch between light and dark modes:

1. The toggle button adds or removes the `is-style-dark` class on the `<body>` element via JavaScript.
2. The visitor preference is stored in `localStorage` for persistence across page loads.
3. You can include the dark mode toggle in the header template part.

## Color Mapping

When dark mode is active, the color palette inverts intelligently:

| Token | Light Mode | Dark Mode |
|-------|-----------|-----------|
| Background | Neutral-0 (white) | Neutral-950 (near-black) |
| Foreground | Neutral-950 (near-black) | Neutral-0 (white) |
| Surface | Neutral-50 | Neutral-900 |
| Border | Neutral-200 | Neutral-700 |
| Muted text | Neutral-500 | Neutral-400 |
| Primary accent | Zinc-600 | Zinc-400 |

The full color system, including Success, Warning, and Error tokens, adjusts accordingly to maintain contrast ratios and readability.

## Respecting System Preferences

Aegis can detect the visitor operating system dark mode preference using the `prefers-color-scheme` media query:

```css
@media (prefers-color-scheme: dark) {
    body:not(.is-style-light) {
        /* Dark mode custom properties applied */
    }
}
```

When automatic detection is enabled, the site follows the system preference unless the visitor explicitly toggles the mode.

## Dark Mode and Style Variations

All 60 style variations support dark mode. Each variation defines both light and dark color mappings, so switching to dark mode preserves the character of the chosen variation (for example, the "Ocean" variation will use dark navy backgrounds rather than generic dark gray).

## Accessibility Considerations

Dark mode in Aegis maintains WCAG 2.1 AA contrast requirements:

- Text contrast ratios remain above 4.5:1 for normal text.
- Large text maintains at least 3:1 contrast.
- Interactive elements retain visible focus indicators.
- Color is never the sole indicator of meaning.

## Per-Section Dark Mode

You can apply dark mode to individual sections rather than the entire page:

1. Select a Group block or container section.
2. Add `is-style-dark` to the **Additional CSS class(es)** field.
3. That section will render with dark mode colors while the rest of the page remains in light mode.

This technique is useful for creating visual contrast between sections, such as a dark hero section followed by light content.

## Disabling Dark Mode

If you do not want dark mode available on your site:

- Do not add the `is-style-dark` class to any templates or blocks.
- Remove the dark mode toggle from the header template part if present.
- Visitors will always see the light mode regardless of their system preferences.

## Custom Dark Mode Adjustments

To override specific dark mode colors:

1. Open **Appearance → Editor → Styles**.
2. Make color adjustments in the Styles panel.
3. These overrides apply to both light and dark modes by default.

For dark-mode-specific overrides, you can use the Additional CSS section or a custom stylesheet that targets the `.is-style-dark` class:

```css
.is-style-dark {
    --wp--preset--color--primary-500: #custom-dark-value;
}
```

## Implementation Details

The dark mode system works through CSS custom property reassignment. When the `is-style-dark` class is present:

1. Background tokens are swapped to dark values.
2. Foreground tokens are swapped to light values.
3. Surface, border, and accent tokens adjust to maintain visual hierarchy.
4. Shadow tokens adjust opacity for dark backgrounds.
5. Gradient tokens may adjust to dark-appropriate versions.

No JavaScript framework or library is required — the mechanism is pure CSS with a minimal script for toggle interaction and preference storage.

## Next Steps

- [[color-palette]] — Understand the full color system and its light/dark mappings.
- [[style-variations]] — See how variations look in both modes.
- [[global-styles]] — Customize colors for light and dark modes.
- [[accessibility]] — Learn about the accessibility features in Aegis.
