# Accessibility

Aegis is built with accessibility as a core principle. The theme ships an **accessibility-ready foundation** aimed at [WCAG 2.2](https://www.w3.org/TR/WCAG22/) Level AA and WordPress accessibility best practices. Full conformance is content-dependent and must be verified on the live site (keyboard, screen reader, and automated tools).

## Accessibility Standards

Aegis targets:

- **WCAG 2.2 Level AA** — Web Content Accessibility Guidelines (includes 2.1 AA criteria plus focus appearance / focus not obscured considerations).
- **Section 508** — U.S. federal accessibility requirements.
- **WordPress Accessibility Coding Standards** — Theme-specific guidelines from the WordPress project.

> **Important:** The theme provides landmarks, skip links, focus styles, keyboard support for interactive blocks, and reduced-motion hooks. Full WCAG conformance still depends on content created by site editors (alt text, heading hierarchy, link purpose, form labels, contrast of custom colors/media) and on runtime testing with sticky headers, plugins, and real viewports.

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
- **Search dialog** (theme header) and **`aegis/modal`** (companion plugin) trap focus and return it on close.
- **Sliders** support keyboard arrow key navigation.
- **Toggles** (content switcher) respond to click (including the switch track) and Left/Right arrows on the tablist. Pro fade/slide/flip/scale honors `prefers-reduced-motion: reduce` (instant swap). **Accordion List** responds to Enter and Space on each item.

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
| Normal text | 4.5:1 minimum | Default body/`neutral-600+` (and AA-safe `neutral-400`) tokens on the default surface |
| Large text (18px+ bold, 24px+ regular) | 3:1 minimum | Default heading tokens meet or exceed 3:1 |
| Interactive components | 3:1 minimum | Default buttons, links, and inputs target 3:1 |
| Focus indicators | 3:1 minimum | Focus outlines use primary tokens for clear contrast |

Custom colors, covers, and media still need a contrast check.

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
| Toggles (content switcher) | `role="tablist"` / `tab` / `tabpanel`, `aria-selected`, `aria-controls` / `aria-labelledby`, `aria-hidden` on inactive views |
| Accordion List | `aria-expanded` on details/summary |
| Search dialog / plugin Modal | `role="dialog"`, `aria-modal`, accessible name, focus trapping |
| Tabs | `role="tablist"`, `role="tab"`, `role="tabpanel"` |
| Sliders | `aria-roledescription`, `aria-label` for controls |
| Live regions | `aria-live` for dynamic content updates |
| Landmarks | Proper landmark roles for page regions |

## Skip Links

A skip-to-content link is the first focusable element on every page:

- Hidden visually by default (`.screen-reader-text`).
- Becomes visible when focused via keyboard.
- Links directly to the `<main>` content area.
- Allows keyboard users to bypass repetitive navigation.

The framework injects the skip link **after** the header template part is rendered (`SkipLink` priority 11, `TemplatePart` priority 10). That order keeps `<header role="banner">` as a sibling of the skip link, not nested inside it. Nesting the header inside the skip link hid header content (logo, navigation, dark-mode icons) from sighted visitors on the front end while the editor still looked correct.

The **Skip to Content** pattern remains available for templates that need an explicit skip link in markup (for example the **Blank** template, which has no header and therefore no injected skip link).

## Headings

Aegis templates and stock patterns aim for a logical heading hierarchy:

- Default page/post templates output one document `<h1>` (the title). The **Page No Title** and **Blank** templates omit an automatic title — authors must supply exactly one `<h1>` in content.
- Section and slider titles in patterns use `<h2>` (or lower) so they do not compete with the page title.
- Prefer sequential order (H1 → H2 → H3) without skipping levels; use font size controls for visual sizing.

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
- Marquee blocks stop scrolling on the frontend when `prefers-reduced-motion: reduce` is active. Pause on hover is a separate Blocks extra.
- Countdown animations switch to static displays.

## Forms

Stock Aegis demo forms use accessible names:

- Theme patterns (contact, funnel squeeze, store footer newsletter): labels via `for`/`id` (visible or `.screen-reader-text`); unique field IDs per pattern (e.g. `contact-page-email`, `store-footer-email`).
- Plugin modal patterns (`aegis/modal-contact`, `aegis/modal-newsletter`): same label/`id` practice; registered only with the Modal block.
- Placeholder text is supplemental and does not replace a label.
- Plugin form builders (WPForms, Gravity Forms, etc.) remain responsible for production form handling, validation, and their own ARIA.

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
| pa11y-ci | Automated WCAG2AA testing in CI (`.pa11yci.json`, threshold `0`) against home, `?p=1`, search, `?page_id=2`, and a missing post (404) |
| WPAudit `AccessibilityAnalyzer` | Static PHP/HTML checks, including skip-link detection in `SkipLink.php` and `skip-to-content.php` |
| Axe DevTools | Browser-based accessibility auditing |
| WordPress Accessibility Checker | Plugin-level checks |

### Running pa11y Tests

```bash
npm run test:a11y
```

Requires a running site at the URLs in `.pa11yci.json` (CI uses `http://localhost:8080/`; local wp-env often uses `8888` — override URLs as needed). See [[testing]].

## Content Author Guidelines

To maintain accessibility, content authors should:

1. **Always add alt text** to images that convey meaning; keep `alt=""` only when decorative.
2. **Use headings sequentially** — one document `<h1>`; do not skip levels for visual effect. On **Page No Title** / **Blank**, supply the `<h1>` in content.
3. **Write descriptive link text** — avoid "click here" or bare `#` destinations.
4. **Provide captions** for videos and audio content.
5. **Use sufficient color contrast** when choosing custom colors (`neutral-600+` for small text on light surfaces).
6. **Test with keyboard** — Tab from load through skip link → main → footer; open/close search (Escape, focus return).
7. **Respect reduced motion** — enable OS “reduce motion” and confirm carousels/marquees do not autoplay.

## Conditionals extras

Block and page visibility extras at **Aegis → Conditionals → Accessibility** hide or visually clip content with CSS. They do not strip HTML on the server.

**Color Scheme** follows the Aegis visitor toggle (`is-style-dark` / `is-style-light` on `body`), then the theme default (`default-mode-dark`, `default-mode-light`, or `default-mode-system`), then the OS `prefers-color-scheme` when dark mode is off. That matches the header dark-mode toggle utilities in `dark-mode.css`.

On posts, those classes are added to the existing `core/post-content` wrapper. Hook patterns wrap the whole pattern. Turning an extra off skips both the classes and the CSS.

See [Plugin Conditional Logic](../../plugins/aegis/docs/features/conditional-logic.md#accessibility-extras).

## Next Steps

- [[testing]] — Running automated accessibility tests.
- [[dark-mode]] — Ensuring dark mode meets contrast requirements.
- [[color-palette]] — Understanding color contrast in the design system.
- [[performance]] — Performance and accessibility intersect.
