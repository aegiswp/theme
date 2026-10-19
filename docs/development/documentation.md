# Contributing Documentation

How to write and maintain Aegis documentation. Use this page when your change is docs-only or when a feature PR needs matching user/developer docs.

For general contribution workflow (branches, commits, PRs), see [[contributing]].

## Where documentation lives

| Product | Local tree | Public wiki |
|---------|------------|-------------|
| **Theme** | `wp-content/themes/aegis/docs/` | [aegiswp/theme wiki](https://github.com/aegiswp/theme/wiki) |
| **Plugin (free)** | `wp-content/plugins/aegis/docs/` | [aegiswp/plugin wiki](https://github.com/aegiswp/plugin/wiki) |
| **Pro** | `wp-content/plugins/aegis-pro/docs/` | [aegiswp/pro wiki](https://github.com/aegiswp/pro/wiki) |

Root repo files that are also documentation (not the Docsify wiki tree):

- `README.md`, `INSTRUCTIONS.md`, `DESIGN.md`, `BUILD.md`
- `CONTRIBUTING.md`, `AGENTS.md`
- WordPress.org `readme.txt` (theme / plugins)
- Plugin/Pro: `.github/WORKFLOWS.md` (CI and release zip contents)

Theme `docs/` is excluded from the installable theme zip (`.distignore`). Docs ship on GitHub and the wiki, not in the WordPress.org package. Free plugin and Pro each maintain their own `CONTRIBUTING.md`, `composer.json` / `phpcs.xml`, and release excludes (`.distignore` + `.gitattributes` `export-ignore`).

## Scope rules

- **Theme docs** cover templates, patterns, `theme.json` tokens, style variations, theme-registered blocks, and theme-owned features.
- **Plugin / Pro docs** cover companion features (Modal, Map, integrations dashboard, Pro patterns, etc.). Do not duplicate those pages under the theme tree.
- Cross-link instead: use relative links to sibling docs trees, or the public wiki URLs listed on [[home]].
- Prefer design tokens over hardcoded hex in examples. When documenting palette values, match live `theme.json` (see [[color-palette]] and root `DESIGN.md`).
- Keep counts accurate (patterns, templates, palette size). Prefer [[introduction-inventory]] and on-disk trees over outdated README copy.

## Page anatomy

Each wiki page is a Markdown file under `docs/`. Typical layout:

```text
docs/
├── _sidebar.md          # Nav (required for every new page)
├── _footer.md
├── home.md
├── getting-started/
├── using-the-theme/
├── design-system/
├── blocks/
├── features/
├── development/
├── reference/
└── troubleshooting/
```

### File naming

- Lowercase kebab-case: `quick-start-guide.md`, `css-variables-reference.md`.
- One topic per file. Prefer a short slug that matches how you will link it.

### Links

Docs use wiki-style links (Docsify / GitHub wiki compatible):

```markdown
[[color-palette]]
[[color-palette|Color Palette]]
```

The slug is the file name without `.md` (and without the folder path when the wiki is flat-synced). For cross-repo or out-of-tree links, use normal Markdown links:

```markdown
[Plugin Patterns](../../../../plugins/aegis/docs/features/plugin-patterns.md)
[Plugin Wiki](https://github.com/aegiswp/plugin/wiki)
```

### Headings and tone

- Start with a single `#` title that matches the sidebar label.
- Use `##` / `###` for sections; keep one job per section.
- Write for the reader (site builder or developer); avoid internal chatty notes.
- Use tables for inventories and option matrices.
- Use fenced code blocks for CSS custom properties, block markup, and shell commands.

## Adding or updating a page

1. Create or edit the `.md` file in the correct folder under `docs/`.
2. Add a sidebar entry in `docs/_sidebar.md` under the right section.
3. If the page is a primary topic, add a one-line link under the matching section in `docs/home.md`.
4. From feature/code PRs, update any page that would otherwise be wrong (counts, hexes, APIs, file paths).
5. Open a PR on a `docs/*` branch when the change is documentation-only.

### Sidebar example

```markdown
## Development

- [[contributing|Contributing]]
- [[documentation|Contributing Documentation]]
```

### Checklist (docs PR)

- [ ] Page title and filename are clear and kebab-case
- [ ] `_sidebar.md` updated (and `home.md` if it is a top-level topic)
- [ ] Internal links use `[[slug]]` / `[[slug|Label]]`
- [ ] No plugin/Pro content duplicated into theme docs (cross-link instead)
- [ ] Token / palette / pattern counts match `theme.json` and on-disk files
- [ ] Commit uses `docs:` prefix; branch uses `docs/` prefix when docs-only

## Related root docs

| File | When to update |
|------|----------------|
| `DESIGN.md` | Design tokens change in `theme.json` |
| `readme.txt` | Public feature summary / pattern counts for WordPress.org |
| `README.md` | Contributor overview tables that mirror the design system |
| `INSTRUCTIONS.md` / `BUILD.md` | Local setup or build commands change |
| `AGENTS.md` | Agent-facing design-system or pattern rules change |

## What not to do

- Do not put contributor docs only in chat or issues; land them in `docs/` or the root files above.
- Do not invent Secondary / Tertiary / Quaternary palette families — they were removed.
- Do not document Success / Info / Warning / Error as full 50–950 scales; each ships `100` / `500` / `600` only.
- Do not assume `docs/` is present in a zip downloaded from a GitHub Release of the theme.

## Next steps

- [[contributing]] — Branches, commits, and PR process
- [[development-setup]] — Local environment
- [[file-structure]] — Repository layout
- [[introduction-inventory]] — Ground-truth inventory for counts and structure
