# WordPress.org theme submission — Aegis 1.0.0

Target release: **29 May 2026** · **Tested up to: 7.1.3** · **Requires at least: 7.0**

## Pre-upload checklist

- [x] Add **`screenshot.png`** (1200×900) at theme root — present at `screenshot.png`.
- [ ] Run Theme Check plugin on a clean install (WordPress 7.0+, PHP 8.1+).
- [ ] Run `composer run standards:check` (requires `composer install` in theme dir). Run `composer run test:wpaudit` when `tools/wpaudit` is present.
- [ ] Build distributable zip (`.distignore` / release workflow) and confirm zip contains:
  - `assets/fonts/*.woff2` + `OFL.txt`
  - `src/Blocks/*` compiled JS/CSS + `block.json` + `render.php`
  - No `tools/`, `tests/`, `node_modules/`, or Pro license upsell when `aegis_is_directory_build()` is true (default).
- [ ] Smoke test: activate on fresh site, Site Editor loads, custom blocks register, fonts load.

## Directory build behaviour

- `aegis_is_directory_build()` defaults to **true** (no License admin page, no purchase CTAs).
- For local commercial builds: `define( 'AEGIS_DIRECTORY_BUILD', false );` in `wp-config.php`.

## Accessibility-ready tag

Tag is **retained**. The theme ships an accessibility-ready foundation aimed at
WCAG 2.2 AA (not a certification claim). Before submit, manually verify:

- Keyboard navigation through header, nav overlay, search dialog, and modals
- Visible focus styles (links, buttons, search) and skip link (including Blank template)
- Colour contrast on default + one dark style variation (`neutral-400` is `#666666`)
- Demo forms expose accessible names; stock hero slider has a single page-level h1 strategy (slide titles are h2)
- Document any gaps in the Theme Check “accessibility” tab
- Run `npm run test:a11y` / CI accessibility workflow (pa11y-ci, threshold 0) when a site URL is available

## Theme Check / review notes for reviewers

- Bundled fonts: Lexend, Lexend Deca, JetBrains Mono (SIL OFL 1.1) in `assets/fonts/`.
- Custom blocks registered via `Aegis\Blocks\BlockRegistrar` from `src/Blocks/*/block.json`.
- WooCommerce templates/patterns are optional; theme works without WooCommerce.
- Analytics uses transients/options only; no outbound tracking without site configuration.
- Third-party PHP: `vendor/aegis/*` (framework, utilities, icons), `enshrined/svg-sanitize`, `psr/container` — see `readme.txt` Copyright section.
