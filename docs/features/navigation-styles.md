# Navigation Styles

Aegis extends the WordPress Navigation block (`core/navigation`) with four custom block style variations for mobile and overlay navigation. These styles provide different animation and layout approaches for responsive menus.

## Available Navigation Styles

### Slide-in Drawer

| Property | Value |
|----------|-------|
| Style name | `slide-in` |
| Label | Slide-in Drawer |
| Behavior | Slides in from the right edge of the viewport. |

A fixed-position drawer that slides in from the right side when opened. The drawer is 300px wide and uses a smooth 0.3s ease transition.

### Slide-in Left

| Property | Value |
|----------|-------|
| Style name | `slide-in-left` |
| Label | Slide-in Left |
| Behavior | Slides in from the left edge of the viewport. |

Similar to the Slide-in Drawer but enters from the left side instead of the right. Useful for sites with left-to-right reading direction where the navigation should feel anchored to the starting edge.

### Fullscreen Overlay

| Property | Value |
|----------|-------|
| Style name | `fullscreen` |
| Label | Fullscreen Overlay |
| Behavior | Covers the entire viewport with a centered navigation layout. |

A full-viewport overlay that fades in, centering the navigation content both horizontally and vertically. Uses opacity and visibility transitions for a smooth reveal.

### Scroll Overlay

| Property | Value |
|----------|-------|
| Style name | `scroll` |
| Label | Scroll Overlay |
| Behavior | Slides down from the top of the viewport. |

A fixed-position overlay that slides down from the top edge. Spans the full width of the viewport and is suitable for compact navigation menus.

## Using Navigation Styles

### In the Site Editor

1. Navigate to **Appearance → Editor**.
2. Select the Navigation block in your header template part.
3. In the block settings sidebar, find the **Styles** section.
4. Select one of the four overlay variations.
5. Save your changes.

### In Block Markup

Navigation styles can be applied in template HTML using the WordPress block style class:

```html
<!-- wp:navigation {"className":"is-style-slide-in"} /-->
```

## Technical Details

The navigation styles are registered by the `Aegis\Navigation\Overlay` class (`src/Navigation/Overlay.php`). Inline CSS is generated for each style variation and attached during block registration.

The navigation overlay CSS is conditionally loaded only when a `core/navigation` block is present on the page, ensuring no performance impact on pages without navigation.

## Accessibility

All navigation overlay variations:

- Support keyboard navigation when open.
- Use appropriate z-index layering (1000) to appear above page content.
- Transition smoothly to avoid disorienting users.

Ensure your navigation menu includes a close button or mechanism that is keyboard-accessible when using overlay styles.

## Next Steps

- [[enhanced-core-blocks]] — Other core block enhancements.
- [[template-parts]] — Using navigation in header template parts.
- [[accessibility]] — Navigation accessibility guidelines.
