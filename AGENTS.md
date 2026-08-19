# Aegis — Agent Instructions

This file is read by AI coding agents (Claude Code, Cursor, Copilot, etc.) working on the Aegis theme. Follow every rule here precisely. Do not infer intent from the code alone — these rules override default behaviour.

---

## Project Identity

- **Theme name:** Aegis
- **Type:** WordPress block theme (Full Site Editing) and token-based design-system framework
- **Design system:** Tailwind CSS v3 scale, implemented via `theme.json` tokens
- **Author:** Atmostfear Entertainment
- **Text domain:** `aegis`
- **Minimum PHP:** 8.1 — use typed properties, named arguments, and `declare(strict_types=1)` in all PHP files
- **Minimum WordPress:** 7.0 (tested up to 7.0)

---

## Repository Layout

```
aegis/
├── assets/fonts/          Self-hosted woff2 fonts (Lexend, Lexend Deca, JetBrains)
├── parts/                 Template parts: header.html, footer.html, sidebar.html
├── patterns/              PHP block patterns organised by category (generic; WC/TI patterns in companion plugin)
│   ├── header/            Public header patterns (e.g. store-minimal; WC headers in plugin)
│   ├── footer/            Public footer patterns
│   └── template/          Template patterns (`Inserter: false`)
├── src/                   PHP service classes (PSR-4, namespace Aegis\)
│   ├── bootstrap.php      Composer autoload entry — wires init services
│   └── Checkout/          WooCommerce multi-step checkout assets
├── styles/                Style variation JSON files (dark mode, etc.)
├── templates/             FSE page templates (.html)
├── tests/Unit/            PHPUnit test files
├── tools/                 Dev utilities (build, translate, audit, migration; see tools/README.md)
├── theme.json             Design system — single source of truth for all tokens
├── style.css              WordPress theme header + minimal global CSS
├── functions.php          Theme bootstrap: autoloader, framework registration, hooks
├── DESIGN.md              Full design system reference (colours, type, spacing, etc.)
└── AGENTS.md              This file
```

---

## Design System Rules

The design system is defined entirely in `theme.json`. Read `DESIGN.md` before touching any design token.

### Colours
- All palette slugs are lowercase kebab-case: `primary-500`, `neutral-200`, `error-600`.
- Groups: **Primary** (Zinc), **Neutral** (pure gray), **Success** (Green), **Warning** (Orange), **Error** (Red), plus utility slugs `transparent`, `current`, `inherit`, `shadow`.
- **Never hardcode hex values** in patterns, CSS, or PHP. Use `var:preset|color|{slug}` in block markup, `var(--wp--preset--color--{slug})` in CSS.
- When adding a new colour, add it to the correct semantic group in `theme.json`, add a row to `DESIGN.md`, and justify the need — do not create one-off palette entries.

### Spacing
- Fixed pixel values only — `4px`, `8px`, `12px`, etc. **Never** reference `font-size` tokens from spacing values.
- Available slugs: `xxxs` (4px), `xxs` (8px), `2xs` (12px), `xs` (16px), `sm` (24px), `md` (32px), `ml` (40px), `lg` (48px), `xl` (64px), `xll` (80px), `xxl` (96px).
- Use `var:preset|spacing|{slug}` in block markup, `var(--wp--preset--spacing--{slug})` in CSS.

### Typography
- Font sizes use pixel slugs (`14`, `16`, `24`, etc.) with fluid `clamp()` values.
- Font weight keys are **all lowercase**: `thin`, `extralight`, `light`, `normal`, `medium`, `semibold`, `bold`, `extrabold`, `black`. CSS variable: `--wp--custom--font-weight--{key}`.
- Default body font: Lexend (`lexend`). Heading font: Lexend Deca (`lexend-deca`). Monospace: JetBrains (`jetbrains`).

### Shadows
- Shadow colour is the `shadow` palette entry (`rgba(107,114,128,0.07)`), resolved via `--wp--custom--box-shadow--color`.
- Available presets: `none`, `xxs`, `xs`, `sm`, `md`, `lg`, `xl`, `xxl`.

---

## Pattern Rules

### File naming
- Files in a public category (e.g. `patterns/hero/`) use lowercase kebab-case: `split.php`, `cover.php`.
- Files prefixed with `.` (e.g. `.video.php`) are hidden from the block inserter — use this for work-in-progress or internal-only patterns.

### PHP header
Every pattern file must start with a PHP doc-comment header:

```php
<?php
/**
 * Title: {Human-readable name}
 * Slug: {local-slug}
 * Categories: {category}
 * Keywords: {comma-separated keywords}
 * Description: {one-line description}
 * Viewport Width: 1280
 */
?>
```

- **Header `Slug`** is the local name only (e.g. `split`, `about`, `page-no-title`), not `aegis/hero-split`.
- **Registered slug** (what you use in markup) is `{category}-{local-slug}` — e.g. `hero-split`, `page-about`, `template-single` (see `vendor/aegis/utilities/src/Pattern.php`).
- In `parts/*.html`, `templates/*.html`, and nested `<!-- wp:pattern {"slug":"…"} /-->`, always reference the **registered** slug.
- Category directories named with a leading `.` (e.g. `.template/`) are **not** scanned; use `patterns/template/` only.

### Theme vs plugin vs Pro patterns

| Owner | Patterns |
|-------|----------|
| **Theme** | Sections (hero, cta, blog, …), generic commerce marketing (core blocks only), FSE template HTML files |
| **Aegis Plugin** | Slider/modal/contact/blog demos; **WooCommerce block patterns** (`patterns/woocommerce/`, gated on WC); **TI Wishlist pattern** (`patterns/wishlist/`, gated on WC + TI Wishlist) |
| **Aegis Pro** | `wp-content/plugins/aegis-pro/patterns/aegis/`, `patterns/slider/`, `patterns/utility/` — do not duplicate theme slugs |

Store header patterns with mini-cart blocks require WooCommerce and the companion plugin. WC-free header variants for non-shop sites are a future enhancement.

### Internationalisation
- All user-visible strings must be wrapped: `<?php echo esc_html__( 'String', 'aegis' ); ?>`.
- Strings **inside `<!-- wp:html -->` blocks** are static HTML — use plain English literals, not `esc_html__()`, because PHP is not re-evaluated from saved post content.
- Strings **outside** `wp:html` blocks (in headings, paragraphs, buttons rendered by PHP) must use `esc_html__()`.

### Security
- Use `esc_attr_e()` / `esc_attr__()` for HTML attributes.
- Use `esc_url()` for URLs.
- Contact form patterns contain placeholder HTML — they require a form plugin for actual submission. Do not add server-side processing to raw `wp:html` form patterns.

### Dark / Light mode
- Dark mode is toggled by adding `is-style-dark` to `document.body` (via cookie + JS).
- Patterns must not hardcode light-mode-specific colours. Use semantic tokens (`neutral-0`, `neutral-900`, `primary-500`) so style variations can override them.

---

## PHP Rules

- All PHP files: `declare(strict_types=1)` at the top.
- Namespace: `Aegis\` (PSR-4, mapped to `src/`).
- Theme glue (`CompanionNotice`, `BlockRegistrar`) boots from `src/bootstrap.php`. Framework engine services register via `Aegis::register()`.
- Hooks must use named functions or class methods — no anonymous closures in `functions.php` or `bootstrap.php`.
- `wp_enqueue_scripts` never fires in admin; do not add `is_admin()` guards inside its callbacks.
- Use `$wpdb->prepare()` for all database queries with dynamic values.
- Sanitise input with `sanitize_text_field()`, `absint()`, `wp_kses_post()`. Escape output with `esc_html()`, `esc_attr()`, `esc_url()`.

---

## Build & Tooling

| Command | What it does |
|---------|-------------|
| `make install` | `npm ci` |
| `make install:composer` | `composer install` |
| `make build` | Webpack via `@wordpress/scripts` |
| `make dev` | Webpack watch mode |
| `make lint` | JS + CSS linters |
| `make lint:php` | PHPCS with WordPress standards |
| `make translate` | Regenerates `languages/aegis.pot` (monorepo; uses `npm run translate` per product) |
| `npm run translate` | Same POT via `wp i18n make-pot` (requires `wp` on PATH) |
| `npm run translate:studio` | Same POT via `studio wp i18n make-pot` (Studio sites on Windows) |
| `make audit-patterns` | Validates pattern slugs, blocks, templates (`tools/audit-patterns.php`; also `npm run audit-patterns`) |
| `make clean` | Removes all build artefacts including `aegis/` dist dir |
| `make validate` | Validates `theme.json` JSON syntax |

- Node ≥ 20, npm ≥ 9, PHP ≥ 8.1, Composer ≥ 2.
- Local dev environment: `wp-env` (`.wp-env.json`), port 8888.
- In Studio (WordPress Studio / PHP WASM), prefix all WordPress CLI with `studio`: `studio wp plugin list`, `studio wp eval-file tools/audit-patterns.php`.

---

## CI / GitHub Actions

All workflows live in `.github/workflows/`. Key rules:

- Every workflow has a `permissions:` block — use `contents: read` unless write is explicitly needed.
- Every workflow has a `concurrency:` block.
- Release validation (`release.yml`) runs linting and PHPCS **without** `|| true` — failures block the release.
- Dependabot auto-merge uses `gh pr merge --auto --squash` which only fires after required status checks pass. **Branch protection must require CI to pass** for this to be effective.
- Do not add `|| true` to any lint or test step in any workflow.
- Local workflow files must stay identical to the remote: pushing a commit that adds or edits anything under `.github/workflows/` requires a Git credential with the `workflow` scope and is otherwise rejected.
- `ci.yml` fails hard if `tools/wpaudit/` is missing from the repository — keep it committed. Local scratch scripts go in `tools/scratch/` (gitignored).

---

## Distribution

The installable theme zip is built by `release.yml` using `rsync --exclude-from=.distignore`. Key exclusions:

- `node_modules/`, `vendor/bin/`, dev-only vendor packages
- `tests/`, `tools/`, `bin/`, `.kiro/`, `.github/`, `.claude/`
- Source maps, TypeScript/SCSS source files, build config files

The `vendor/` runtime (autoloader + `enshrined/svg-sanitize` + `psr/container`) **is included** in the zip. Run `composer install --no-dev` before packaging.

---

## Block ownership

The theme registers six canonical blocks under `src/Blocks/` (countdown, slider, slide, toggle, toggle-content, related-posts). Video uses WordPress **`core/video`** (framework + plugin editor + Pro). The free plugin requires this theme and owns `aegis/map` and `aegis/modal`. Pro registers **only** `aegis/tabs`, `aegis/tab`, and `aegis/image-compare` from the [aegis/blocks](../../plugins/aegis-pro/vendor/aegis/blocks/AGENTS.md) Composer package — never bulk `Blocks::register()` from that package when this theme is active.

---

## What NOT to Do

| Don't | Do instead |
|-------|-----------|
| Edit `wp-includes/` or `wp-admin/` | Use actions/filters |
| Hardcode hex colours in patterns | Use `var:preset|color|{slug}` |
| Use spacing that references font-size tokens | Use fixed px values from the spacing scale |
| Add `!important` to `theme.json` style values | Fix specificity at the block/element level |
| Use anonymous closures in `functions.php` | Use named functions |
| Use bare `wp` CLI in Studio | Use `studio wp` |
| Add `|| true` to CI lint steps | Fix the lint errors |
| Use `aegis/` in pattern header Slug | Use local slug; registered slug is `{category}-{slug}` |
| Duplicate Pro-only patterns in the theme | Pro patterns stay under `plugins/aegis-pro/patterns/` |
| Commit `.env`, `auth.json`, or secrets | These are gitignored — never force-add them |
