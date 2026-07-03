# Accessibility

Aegis is built with accessibility as a core principle. The theme meets WCAG 2.1 Level AA requirements and follows WordPress accessibility best practices to ensure all visitors can navigate and interact with your site.

## Accessibility Standards

Aegis targets compliance with:

- **WCAG 2.1 Level AA** — Web Content Accessibility Guidelines.
- **Section 508** — U.S. federal accessibility requirements.
- **WordPress Accessibility Coding Standards** — Theme-specific guidelines from the WordPress project.

> **Important:** Full WCAG compliance depends on content created by site editors. The theme provides the structural foundation, but accessible content (alt text, heading hierarchy, link text) is the responsibility of content authors.

## Semantic HTML

All Aegis templates and patterns use semantic HTML5 elements:

| Element | Usage |
|---------|-------|
| `<header>` | Site header and article headers |
| `<nav>` | Navigation regions with ARIA labels |
| `<main>` | Primary content area |
| `<article>` | Individual posts and pages |
| `<section>` | Thematic groupings of content |
| `<aside>` | Sidebar and supplementary content |
| `<footer>` | Site footer and article footers |

## Keyboard Navigation

All interactive elements are fully keyboard accessible:

- **Tab order** follows a logical document flow.
- **Focus indicators** are visible on all interactive elements (links, buttons, form fields).
- **Skip links** allow keyboard users to bypass the header and jump to main content.
- **Dropdown menus** are navigable with arrow keys.
- **Modal dialogs** trap focus correctly and return focus on close.
- **Sliders** support keyboard arrow key navigation.
- **Toggles/Accordions** respond to Enter and Space keys.

### Focus Styles

Aegis provides clearly visible focus indicators:

- High-contrast outline around focused elements.
- Focus styles adapt to both light and dark mode.
- Focus indicators are never hidden or removed.
- Custom focus styles on buttons, links, and form controls for enhanced visibility.

## Color and Contrast

The color system ensures sufficient contrast across all contexts:

| Requirement | Standard | Aegis Implementation |
|-------------|----------|---------------------|
| Normal text | 4.5:1 minimum | All body text meets or exceeds 4.5:1 |
| Large text (18px+ bold, 24px+ regular) | 3:1 minimum | All headings meet or exceeds 3:1 |
| Interactive components | 3:1 minimum | Buttons, links, and inputs meet 3:1 |
| Focus indicators | 3:1 minimum | Focus outlines provide clear contrast |

### Color Independence

Color is never used as the sole indicator of meaning:

- Error messages include icons and text labels, not just red color.
- Success states include checkmarks alongside green color.
- Links are underlined (or otherwise distinguishable) in addition to color difference.
- Form validation uses icons and text messages with color.

## ARIA Attributes

Aegis uses ARIA attributes to enhance screen reader experiences:

| Pattern | ARIA Implementation |
|---------|---------------------|
| Navigation | `aria-label` identifying the nav purpose |
| Toggles/Accordions | `aria-expanded`, `aria-controls` |
| Modals | `aria-modal`, `aria-labelledby`, focus trapping |
| Tabs | `role="tablist"`, `role="tab"`, `role="tabpanel"` |
| Sliders | `aria-roledescription`, `aria-label` for controls |
| Live regions | `aria-live` for dynamic content updates |
| Landmarks | Proper landmark roles for page regions |

## Skip Links

A skip-to-content link is the first focusable element on every page:

- Hidden visually by default.
- Becomes visible when focused via keyboard.
- Links directly to the `<main>` content area.
- Allows keyboard users to bypass repetitive navigation.

## Headings

Aegis templates and patterns enforce a logical heading hierarchy:

- Each page has exactly one `<h1>` (the page or post title).
- Headings follow sequential order (H1 → H2 → H3) without skipping levels.
- Headings are used structurally, not for visual sizing (use font size controls for visual adjustments).

## Images and Media

### Images

- Block patterns include placeholder `alt` text prompts.
- Decorative images use `alt=""` to be ignored by screen readers.
- The Image block always exposes the alt text field.

### Videos

- The Video block supports captions and transcripts.
- Autoplay is disabled by default (videos do not play without user interaction).
- Video controls are keyboard accessible.

### Animations

- All animations respect the `prefers-reduced-motion` media query.
- When reduced motion is preferred, animations are replaced with instant transitions.
- Marquee blocks stop scrolling when `prefers-reduced-motion: reduce` is active.
- Countdown animations switch to static displays.

## Forms

All form elements in Aegis-styled plugins meet accessibility requirements:

- Labels are explicitly associated with inputs via `for`/`id` attributes.
- Required fields are indicated with both visual and ARIA markers (`aria-required`).
- Error messages are associated with inputs via `aria-describedby`.
- Form groups use `<fieldset>` and `<legend>` elements.
- Placeholder text does not replace visible labels.

## Dark Mode Accessibility

Dark mode maintains all accessibility standards:

- Contrast ratios remain at or above WCAG AA thresholds.
- Focus indicators remain visible on dark backgrounds.
- Status colors (success, warning, error) adjust to maintain contrast.

See [[dark-mode]] for dark mode configuration.

## Testing Tools

Aegis uses automated accessibility testing during development:

| Tool | Purpose |
|------|---------|
| pa11y-ci | Automated WCAG testing in CI/CD pipeline |
| Axe DevTools | Browser-based accessibility auditing |
| WordPress Accessibility Checker | Plugin-level checks |

### Running pa11y Tests

```bash
npm run test:a11y
```

This runs pa11y-ci against the development site to catch common accessibility issues.

See [[testing]] for more details on running tests.

## Content Author Guidelines

To maintain accessibility, content authors should:

1. **Always add alt text** to images that convey meaning.
2. **Use headings sequentially** — do not skip levels for visual effect.
3. **Write descriptive link text** — avoid "click here" or "read more" alone.
4. **Provide captions** for videos and audio content.
5. **Use sufficient color contrast** when choosing custom colors.
6. **Test with keyboard** — navigate your pages without a mouse to catch issues.

## Next Steps

- [[testing]] — Running automated accessibility tests.
- [[dark-mode]] — Ensuring dark mode meets contrast requirements.
- [[color-palette]] — Understanding color contrast in the design system.
- [[performance]] — Performance and accessibility intersect.
