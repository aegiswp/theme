# Theme Audit Fixes — Bugfix Design

## Overview

Five issues were identified during a theme audit of the Aegis block theme. The `center-logo.php` header variant is missing ARIA attributes, `ariaLabel` values, and focus management JavaScript that the `default.php` header already implements correctly. The `parts/header.html` template part omits the existing `skip-to-content` pattern. The `center-logo.php` dark mode cookies lack `SameSite=Lax`. The `patterns/template/404.php` displays "Search Results" instead of "Page Not Found". And `phpcs.xml` does not scan the `patterns/` directory or `embed-content.php`. Each fix is a targeted, low-risk change that brings the affected file in line with an existing correct reference.

## Glossary

- **Bug_Condition (C)**: The set of conditions across 5 files where markup, JavaScript, configuration, or text content deviates from the correct/expected state
- **Property (P)**: The desired state after fixes — ARIA attributes present, skip-to-content included, SameSite flag set, correct 404 heading, PHPCS scanning all PHP
- **Preservation**: All existing behavior in `default.php`, other templates, PHPCS scan targets, and the center-logo header's visual layout and non-affected functionality must remain unchanged
- **center-logo.php**: The header pattern at `patterns/header/center-logo.php` that is missing accessibility attributes present in `default.php`
- **default.php**: The reference header pattern at `patterns/header/default.php` that already has all ARIA attributes, `ariaLabel` values, focus management, and `SameSite=Lax` cookies implemented correctly
- **skip-to-content**: The accessibility pattern at `patterns/utility/skip-to-content.php` (slug: `aegis/skip-to-content`) that provides a keyboard bypass link

## Bug Details

### Bug Condition

The bugs manifest across 5 files where specific attributes, patterns, flags, text, or configuration entries are missing or incorrect. The `center-logo.php` header was created as a variant of `default.php` but several accessibility and security attributes were not carried over. The other 3 issues are independent omissions.

**Formal Specification:**
```
FUNCTION isBugCondition(input)
  INPUT: input of type {file: string, element: string}
  OUTPUT: boolean

  RETURN (input.file == "patterns/header/center-logo.php"
          AND (input.element == "search-modal-div" AND missingARIA(input))
              OR (input.element IN ["search-toggle", "search-close", "dark-mode", "light-mode"]
                  AND missingAriaLabel(input))
              OR (input.element == "search-open-onclick" AND missingFocusAndAriaHidden(input))
              OR (input.element == "search-close-onclick" AND missingFocusReturnAndAriaHidden(input))
              OR (input.element == "dark-mode-cookie" AND missingSameSite(input))
              OR (input.element == "light-mode-cookie" AND missingSameSite(input)))
         OR (input.file == "parts/header.html"
             AND NOT containsPattern(input, "aegis/skip-to-content"))
         OR (input.file == "patterns/template/404.php"
             AND headingText(input) == "Search Results")
         OR (input.file == "phpcs.xml"
             AND NOT hasFileEntry(input, "./patterns")
             AND NOT hasFileEntry(input, "./embed-content.php"))
END FUNCTION
```

### Examples

- **ARIA on search modal**: In `center-logo.php`, the search modal `<div>` renders as `<div class="wp-block-group alignfull search-modal" style="...">` without `role="dialog"`, `aria-modal="true"`, `aria-label`, or `aria-hidden="true"`. In `default.php`, the same div includes all four attributes.
- **Missing ariaLabel**: In `center-logo.php`, the search-toggle button block comment has no `"ariaLabel"` key. In `default.php`, it has `"ariaLabel":"Open search"`. Same pattern for search-close ("Close search"), dark mode ("Switch to dark mode"), and light mode ("Switch to light mode").
- **Search open JS missing focus**: In `center-logo.php`, the search-toggle onclick removes `has-display-none` classes but never calls `modal.setAttribute('aria-hidden', 'false')` or `input.focus()`. In `default.php`, both are present.
- **Search close JS missing focus return**: In `center-logo.php`, the search-close onclick adds `has-display-none` classes but never calls `modal.setAttribute('aria-hidden', 'true')` or `opener.focus()`. In `default.php`, both are present.
- **Skip-to-content missing**: `parts/header.html` contains only `<!-- wp:pattern {"slug":"header-default"} /-->` with no skip-to-content pattern before it.
- **SameSite missing**: In `center-logo.php`, dark mode cookie is `'aegisDarkMode=true;path=/;max-age=86400'` without `;SameSite=Lax`. In `default.php`, it includes `;SameSite=Lax`.
- **404 heading wrong**: `patterns/template/404.php` displays `esc_html__( 'Search Results', 'aegis' )` instead of `esc_html__( 'Page Not Found', 'aegis' )`.
- **PHPCS scope incomplete**: `phpcs.xml` lists only `<file>./src</file>` and `<file>./functions.php</file>`, omitting `./patterns` and `./embed-content.php`.

## Expected Behavior

### Preservation Requirements

**Unchanged Behaviors:**
- The `default.php` header must remain completely untouched — it is the reference implementation
- All existing visual layout, styling, navigation, social links, WooCommerce blocks, and button functionality in `center-logo.php` must remain unchanged
- The existing PHPCS scan targets (`./src`, `./functions.php`) and all exclusion patterns must remain
- The search results template and all non-404 templates must remain unchanged
- All other template parts (`parts/footer.html`, `parts/sidebar.html`) must remain unchanged
- Mouse click behavior on all buttons must continue to work

**Scope:**
All inputs that do NOT involve the 5 specific bug conditions should be completely unaffected by these fixes. This includes:
- Any interaction with the `default.php` header
- Any non-header template part rendering
- Any PHPCS rule configuration (only `<file>` entries are added)
- Any page that is not a 404 page

## Hypothesized Root Cause

Based on the bug analysis, the root causes are straightforward omissions:

1. **Copy-paste gap in center-logo.php**: The `center-logo.php` header was created as a variant of `default.php` but the ARIA attributes (`role`, `aria-modal`, `aria-label`, `aria-hidden`), `ariaLabel` block attributes, focus management JS (`input.focus()`, `opener.focus()`), `aria-hidden` toggling JS, and `SameSite=Lax` cookie flags were not carried over from the reference implementation.

2. **Template part omission**: The `skip-to-content` pattern was created (`patterns/utility/skip-to-content.php`) but never wired into `parts/header.html`.

3. **Incorrect text in 404 template**: The `patterns/template/404.php` file uses "Search Results" as its heading text, likely copied from the search template. The `.template/404.php` reference already has the correct "Page Not Found" text.

4. **PHPCS configuration gap**: When the `patterns/` directory was added to the project, it was not added to the PHPCS `<file>` list. Similarly, `embed-content.php` was never included.

## Correctness Properties

Property 1: Bug Condition — Accessibility and Configuration Defects Fixed

_For any_ file where the bug condition holds (isBugCondition returns true), the fixed file SHALL contain the correct attributes, patterns, flags, text, or configuration entries as specified in the expected behavior requirements. Specifically: `center-logo.php` SHALL have all ARIA attributes, `ariaLabel` values, focus management JS, and `SameSite=Lax` cookies matching `default.php`; `parts/header.html` SHALL include the skip-to-content pattern; `patterns/template/404.php` SHALL display "Page Not Found"; and `phpcs.xml` SHALL scan `./patterns` and `./embed-content.php`.

**Validates: Requirements 2.1, 2.2, 2.3, 2.4, 2.5, 2.6, 2.7, 2.8**

Property 2: Preservation — Unchanged Files and Behaviors

_For any_ file or behavior where the bug condition does NOT hold (isBugCondition returns false), the fixed codebase SHALL produce exactly the same output as the original codebase, preserving all existing functionality in `default.php`, non-affected templates, PHPCS rules, and the center-logo header's visual layout and non-accessibility functionality.

**Validates: Requirements 3.1, 3.2, 3.3, 3.4, 3.5, 3.6, 3.7**

## Fix Implementation

### Changes Required

Assuming our root cause analysis is correct:

**File**: `patterns/header/center-logo.php`

**Specific Changes**:

1. **Add ARIA attributes to search modal div**: Add `role="dialog"`, `aria-modal="true"`, `aria-label="<?php esc_attr_e( 'Search', 'aegis' ); ?>"`, and `aria-hidden="true"` to the `<div class="wp-block-group alignfull search-modal"` element, matching `default.php`.

2. **Add ariaLabel to search-close button**: Add `"ariaLabel":"Close search"` to the search-close `<!-- wp:button` block comment JSON.

3. **Add ariaLabel to search-toggle button**: Add `"ariaLabel":"Open search"` to the search-toggle `<!-- wp:button` block comment JSON.

4. **Add ariaLabel to dark mode button**: Add `"ariaLabel":"Switch to dark mode"` to the hide-dark-mode `<!-- wp:button` block comment JSON.

5. **Add ariaLabel to light mode button**: Add `"ariaLabel":"Switch to light mode"` to the hide-light-mode `<!-- wp:button` block comment JSON.

6. **Update search-toggle onclick JS**: Add `modal.setAttribute('aria-hidden', 'false');` after removing `has-display-none` from modals, and add `const input = document.querySelector('.search-modal input[type=\"search\"], .search-modal input[type=\"email\"], .search-modal input'); if (input) input.focus();` at the end.

7. **Update search-close onclick JS**: Add `modal.setAttribute('aria-hidden', 'true');` after adding `has-display-none` to modals, and add `const opener = document.querySelector('.search-toggle button, .search-toggle a'); if (opener) opener.focus();` at the end.

8. **Add SameSite=Lax to dark mode cookie**: Change `'aegisDarkMode=true;path=/;max-age=86400'` to `'aegisDarkMode=true;path=/;max-age=86400;SameSite=Lax'`.

9. **Add SameSite=Lax to light mode cookie**: Change `'aegisDarkMode=false;path=/;max-age=86400'` to `'aegisDarkMode=false;path=/;max-age=86400;SameSite=Lax'`.

---

**File**: `parts/header.html`

**Specific Changes**:

10. **Add skip-to-content pattern**: Insert `<!-- wp:pattern {"slug":"aegis/skip-to-content"} /-->` on a new line before the existing `<!-- wp:pattern {"slug":"header-default"} /-->`.

---

**File**: `patterns/template/404.php`

**Specific Changes**:

11. **Fix heading text**: Change `esc_html__( 'Search Results', 'aegis' )` to `esc_html__( 'Page Not Found', 'aegis' )`.

---

**File**: `phpcs.xml`

**Specific Changes**:

12. **Add patterns directory**: Add `<file>./patterns</file>` after the existing `<file>` entries.

13. **Add embed-content.php**: Add `<file>./embed-content.php</file>` after the existing `<file>` entries.

## Testing Strategy

### Validation Approach

The testing strategy follows a two-phase approach: first, verify the bugs exist in the unfixed code by inspecting file contents, then verify each fix is applied correctly and no regressions are introduced.

### Exploratory Bug Condition Checking

**Goal**: Confirm the bugs exist in the unfixed code before applying fixes.

**Test Plan**: Inspect each affected file for the specific missing attributes, patterns, flags, text, or configuration entries. These are static file content checks, not runtime tests.

**Test Cases**:
1. **center-logo.php ARIA check**: Verify the search modal div lacks `role="dialog"`, `aria-modal="true"`, `aria-label`, `aria-hidden="true"` (will fail on unfixed code)
2. **center-logo.php ariaLabel check**: Verify search-toggle, search-close, dark mode, and light mode buttons lack `ariaLabel` in block comments (will fail on unfixed code)
3. **center-logo.php JS focus check**: Verify search-open onclick lacks `aria-hidden` toggle and `input.focus()`; search-close onclick lacks `aria-hidden` toggle and `opener.focus()` (will fail on unfixed code)
4. **header.html skip-to-content check**: Verify `parts/header.html` does not contain `aegis/skip-to-content` (will fail on unfixed code)
5. **center-logo.php SameSite check**: Verify both cookie strings lack `;SameSite=Lax` (will fail on unfixed code)
6. **404.php heading check**: Verify heading text is "Search Results" (will fail on unfixed code)
7. **phpcs.xml scope check**: Verify `<file>./patterns</file>` and `<file>./embed-content.php</file>` are absent (will fail on unfixed code)

**Expected Counterexamples**:
- All 7 checks will confirm the bugs exist by finding the missing/incorrect content
- Root cause is confirmed as copy-paste omissions and configuration gaps

### Fix Checking

**Goal**: Verify that for all inputs where the bug condition holds, the fixed files contain the expected content.

**Pseudocode:**
```
FOR ALL input WHERE isBugCondition(input) DO
  result := readFileContent(input.file)
  ASSERT expectedContent(result, input.element)
END FOR
```

### Preservation Checking

**Goal**: Verify that for all inputs where the bug condition does NOT hold, the fixed files produce the same result as the original files.

**Pseudocode:**
```
FOR ALL input WHERE NOT isBugCondition(input) DO
  ASSERT originalFileContent(input) = fixedFileContent(input)
END FOR
```

**Testing Approach**: Since these are static file changes (not runtime behavior), preservation checking is done by verifying that only the targeted lines changed and all surrounding content remains identical. Diff-based comparison is the most effective approach.

**Test Plan**: Compare fixed files against originals to confirm only the targeted changes were made.

**Test Cases**:
1. **default.php preservation**: Verify `patterns/header/default.php` is completely unchanged after all fixes
2. **center-logo.php layout preservation**: Verify all non-ARIA, non-JS, non-cookie content in `center-logo.php` is unchanged
3. **phpcs.xml rules preservation**: Verify all existing `<rule>`, `<exclude-pattern>`, and `<file>` entries in `phpcs.xml` are unchanged
4. **Other templates preservation**: Verify no other template files were modified

### Unit Tests

- Grep `center-logo.php` for `role="dialog"`, `aria-modal="true"`, `aria-label=`, `aria-hidden="true"` on the search modal div
- Grep `center-logo.php` for `"ariaLabel":"Open search"`, `"ariaLabel":"Close search"`, `"ariaLabel":"Switch to dark mode"`, `"ariaLabel":"Switch to light mode"` in block comments
- Grep `center-logo.php` for `setAttribute('aria-hidden'` and `.focus()` in both onclick handlers
- Grep `center-logo.php` for `SameSite=Lax` in both cookie strings
- Grep `parts/header.html` for `aegis/skip-to-content`
- Grep `patterns/template/404.php` for `Page Not Found`
- Grep `phpcs.xml` for `./patterns` and `./embed-content.php`

### Property-Based Tests

- Not applicable for this bugfix — all changes are static file content modifications with deterministic expected outcomes. Property-based testing is most valuable for runtime behavior with variable inputs.

### Integration Tests

- Run PHPCS after adding the new `<file>` entries to verify the patterns directory is scanned without errors
- Visually verify the center-logo header renders correctly in a browser after ARIA changes
- Verify the skip-to-content link appears and functions when using keyboard navigation on a page with the header template part
