# Performance

Aegis is engineered for raw performance with a zero-base loading strategy. The theme loads zero CSS, JavaScript, or font assets by default — assets are loaded conditionally only when needed by the content on the page.

## Zero-Base Loading Strategy

Traditional themes load their entire stylesheet and script bundle on every page, regardless of what the page actually uses. Aegis takes the opposite approach:

1. **Default state:** No theme CSS, no theme JS, no web fonts loaded.
2. **Block detection:** During rendering, Aegis detects which blocks are present on the page.
3. **Conditional loading:** Only the styles and scripts required by those blocks are enqueued.
4. **Result:** Pages that use only core blocks may load with zero theme-specific assets.

### What This Means in Practice

| Page Content | Assets Loaded |
|--------------|---------------|
| Simple page with only paragraphs and images | Zero theme CSS/JS (core styles only) |
| Page with a Slider block | Slider CSS + Slider JS only |
| Page with Countdown + Toggle | Countdown CSS/JS + Toggle CSS/JS |
| WooCommerce product page | WooCommerce integration styles only |

## Conditional Asset Loading

### How It Works

The asset loading system operates in three phases:

1. **Registration** — All available assets are registered with WordPress but not enqueued.
2. **Detection** — Block parsing identifies which blocks and variations are present in the content.
3. **Enqueueing** — Only the assets required by detected blocks are added to the page.

### Block-Level Granularity

Each custom block and enhanced core block declares its own dependencies:

```php
// Example: Slider block registers its own assets
'style'        => 'aegis-slider',      // Frontend CSS
'script'       => 'aegis-slider',      // Frontend JS
'editor_style' => 'aegis-slider-editor', // Editor-only CSS
```

These assets are only loaded when the block appears on the page.

### Plugin Integration Styles

Plugin-specific compatibility styles follow the same pattern:

- WooCommerce styles load only on WooCommerce pages.
- LMS styles load only on course/lesson pages.
- Form styles load only when a form block is present.

## Font Loading Strategy

Fonts are a significant performance factor. Aegis optimizes font loading:

### Self-Hosted Fonts

All fonts (Lexend, Lexend Deca, JetBrains Mono) are served from the theme directory:

- No external requests to Google Fonts or other CDNs.
- Fonts are available immediately without DNS lookup or connection overhead.
- Full control over caching headers.

### Variable Fonts

Using variable font files reduces the number of HTTP requests:

- One file for Lexend covers all weights (100–900).
- One file for Lexend Deca covers all weights.
- One file for JetBrains Mono covers regular and italic.

### Font Display Strategy

Fonts use `font-display: swap`:

- Text is immediately visible using a system font fallback.
- Custom fonts swap in once loaded.
- No flash of invisible text (FOIT).
- Minimal flash of unstyled text (FOUT) due to similar font metrics.

### Conditional Font Loading

Fonts are only loaded when they are actually used on the page:

- JetBrains Mono loads only when a code block is present.
- If a style variation uses only one font family, the unused font does not load.

## Image Optimization

Aegis supports WordPress native image optimization:

- **Responsive images** — `srcset` and `sizes` attributes for proper resolution selection.
- **Lazy loading** — Images below the fold use `loading="lazy"`.
- **Aspect ratio** — Explicit width and height attributes prevent layout shift.
- **WebP/AVIF** — Works with WordPress image format conversion.

### Video Facades

The Video block uses a facade pattern:

1. A lightweight thumbnail image is displayed initially.
2. The video player (iframe or native) loads only when the user clicks play.
3. This eliminates heavy third-party script loading on page load.

## Critical Rendering Path

Aegis minimizes render-blocking resources:

| Resource Type | Loading Strategy |
|---------------|-----------------|
| Theme CSS | Conditional, only per-block styles |
| Theme JS | Deferred, conditional per-block |
| Fonts | Preloaded for above-the-fold content |
| Images | Lazy loaded below the fold |
| Videos | Facade until interaction |
| Analytics | Async/defer, non-blocking |

## Measuring Performance

### Core Web Vitals

Aegis is optimized for Google Core Web Vitals:

| Metric | Target | How Aegis Helps |
|--------|--------|-----------------|
| LCP (Largest Contentful Paint) | < 2.5s | Minimal CSS, font preloading, no JS blocking |
| FID (First Input Delay) | < 100ms | Deferred JS, minimal main-thread work |
| CLS (Cumulative Layout Shift) | < 0.1 | Explicit image dimensions, font-display swap |
| INP (Interaction to Next Paint) | < 200ms | Lightweight event handlers, no heavy frameworks |

### Testing Tools

| Tool | Purpose |
|------|---------|
| WPAudit | WordPress-specific performance audit |
| Lighthouse | General web performance scoring |
| WebPageTest | Detailed waterfall analysis |
| PageSpeed Insights | Field data + lab data analysis |

### Running WPAudit

```bash
npm run audit
```

See [[testing]] for more details on running performance tests.

## Caching Compatibility

Aegis works with all major caching solutions:

- **Page caching** — Full page cache safe (no user-specific content in templates).
- **Object caching** — Compatible with Redis and Memcached.
- **CDN** — All static assets use cache-friendly URLs.
- **Browser caching** — Assets include proper cache headers.

## Bundle Size

The theme produces minimal asset bundles:

| Asset | Typical Size |
|-------|--------------|
| Per-block CSS | 1–5 KB (gzipped) |
| Per-block JS | 2–10 KB (gzipped) |
| Font file (variable) | 30–60 KB (per family) |
| Total typical page | Under 50 KB theme assets |

## Developer Performance Tips

When building custom pages or templates:

1. **Prefer core blocks** — They have zero theme asset cost.
2. **Minimize custom block usage** — Each custom block adds its CSS/JS bundle.
3. **Use patterns** — Patterns are just block markup, not additional assets.
4. **Avoid global stylesheets** — Do not add blanket CSS that loads everywhere.
5. **Test with Lighthouse** — Verify performance after significant changes.

## Next Steps

- [[conditional-logic]] — Related conditional loading for content visibility.
- [[testing]] — Running performance tests.
- [[building-assets]] — Understanding the build process.
- [[deployment]] — Production deployment considerations.
