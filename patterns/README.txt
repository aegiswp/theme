Aegis block patterns — developer notes
========================================

What this folder is
-------------------
Each `.php` file is a registered block pattern. WordPress loads PHP files here
automatically (block theme convention). The file outputs static block markup
(HTML comments + HTML) that the editor can insert; some files use small PHP
fragments for translated strings (`esc_html__`, etc.).

File structure
--------------
1. PHP block comment — pattern metadata (WordPress reads these keys).
2. Optional `declare(strict_types=1);` when the file contains PHP.
3. Block markup — typically `<!-- wp:... -->` through `<!-- /wp:... -->`.

Metadata (file header)
----------------------
Use a PHPDoc-style block at the top of each file. Common keys in this theme:

  Title          Human-readable name in the inserter (required for discovery).
  Slug           Unique ID. Use `aegis/something` for theme-scoped slugs, or a
                 filename-style slug (e.g. `disclaimer-beta`) to match
                 `metadata.patternName` in the block JSON where applicable.
  Categories     Comma-separated slugs: `header`, `footer`, `blog`, `notice`,
                 `utility`, `commerce`, etc. Must match `patterns` in
                 `theme.json` or WordPress default categories.
  Description    Short help text in the pattern directory UI (optional).
  Keywords       Comma-separated terms for search (optional).
  Block Types    e.g. `core/template-part/header` — limits suggestions (optional).
  Inserter       `no` — hide from the inserter (utility / internal patterns).
  Viewport Width Pixel width for the pattern preview frame (optional).

The authoritative reference for all supported properties is the Block Editor
handbook (block patterns / pattern registration).

Optional file PHPDoc
--------------------
Some files add `@package Aegis` and `@since` after the metadata block. This is
redundant for WordPress but fine for IDEs. Keep the machine-readable metadata
(`Title`, `Slug`, …) first and accurate.

Subfolders
----------
Folders (e.g. `header/`, `blog/`, `notice/`) group patterns for maintainers; they
do not change registration. `Slug` and `Categories` control behavior in the UI.

Conventions in Aegis
--------------------
• Prefer presets from `theme.json` (spacing, colors) over hard-coded pixels.
• Remove `queryId` and unnecessary block IDs from saved markup when possible.
• For images in patterns, prefer `get_template_directory_uri()` in PHP-driven
  attributes so assets survive theme path changes.
• Utility patterns that should not appear in the inserter: set `Inserter: no`
  and consider a `hidden-` file name prefix (see the main theme README / handbook).

Export / translation
----------------------
User-facing strings in PHP must use the `aegis` text domain. After changing
copy, refresh `languages/aegis.pot` with the project’s i18n workflow
(`wp i18n make-pot` or `npm run translate` from the theme root).

See also: README.md in the theme root (pattern guidelines section).
