# Best Practices Fixes — Bugfix Design

## Overview

The Aegis block theme has five categories of best-practices violations: anonymous closures on WordPress hooks (preventing child-theme unhooking), hardcoded external URLs in header patterns, missing `permissions` blocks in GitHub Actions workflows, and placeholder contact forms with no security notice. Each fix is small, isolated, and mechanical — no architectural changes are needed. The strategy is to apply targeted edits to the seven affected files while preserving every existing behavior.

## Glossary

- **Bug_Condition (C)**: A file contains one of the five identified anti-patterns (anonymous closure on a hook, hardcoded external URL, missing `permissions` block, or missing form notice)
- **Property (P)**: After the fix, the anti-pattern is eliminated and the file's runtime/CI behavior is identical
- **Preservation**: All existing hook callbacks, pattern markup, CI job logic, and form HTML structure remain functionally unchanged
- **`aegis_` prefix**: The naming convention for theme-level named functions, ensuring uniqueness in the global PHP namespace
- **Least-privilege permissions**: GitHub Actions security practice of declaring the minimum token scopes a workflow needs

## Bug Details

### Bug Condition

The bug manifests across five independent categories. Each category has a distinct trigger but shares the same root pattern: a best-practices violation that either blocks extensibility, leaks external URLs, weakens CI security, or misleads users.

**Formal Specification:**
```
FUNCTION isBugCondition(input)
  INPUT: input of type {file: FilePath, category: 1..5}
  OUTPUT: boolean

  RETURN
    (input.category == 1 AND fileContainsAnonymousClosure(input.file, hookRegistration))
    OR (input.category == 2 AND fileContainsAnonymousClosure(input.file, 'init'))
    OR (input.category == 3 AND fileContainsHardcodedExternalURL(input.file))
    OR (input.category == 4 AND NOT fileHasTopLevelPermissions(input.file))
    OR (input.category == 5 AND fileContainsFormWithoutSecurityNotice(input.file))
END FUNCTION
```

### Examples

- **Category 1**: `functions.php` — `add_filter('aegis_theme_updater_config', function () { ... })` cannot be unhooked by a child theme because the closure has no name
- **Category 2**: `src/bootstrap.php` — `add_action('init', static function (): void { ... })` cannot be unhooked
- **Category 3**: `patterns/header/center-logo.php` — "Log In" button links to `https://www.atmostfear-entertainment.com/contact/` and "Sign Up" links to `https://paypal.me/aedonation...`
- **Category 4**: `.github/workflows/ci.yml` — no `permissions:` key at the workflow level, so the `GITHUB_TOKEN` gets default (broad) scopes
- **Category 5**: `patterns/contact/form-boxed.php` — `<form action="#" method="POST">` with no comment explaining a plugin is required

## Expected Behavior

### Preservation Requirements

**Unchanged Behaviors:**
- The `aegis_theme_updater_config` filter must continue to return `['repo' => 'aegiswp/theme', 'slug' => 'aegis']`
- The `block_type_metadata` filter must continue to strip `supports.metadata.blockVisibility`
- The `wp_resource_hints` filter must continue to return the URLs array unchanged for `dns-prefetch`
- The `after_setup_theme` action must continue to add `title-tag` support
- The `init` action must continue to instantiate `MultiStep`, `Overlay`, and `Breadcrumbs`
- Header patterns must continue to render all buttons, labels, toggles, navigation, icons, and WooCommerce blocks identically
- CI and Lighthouse workflows must continue to execute all jobs and steps identically
- Contact form patterns must continue to render the same HTML form structure, labels, inputs, and buttons

**Scope:**
All inputs that do NOT involve the five anti-pattern categories should be completely unaffected by this fix. This includes:
- All other theme patterns (footer, blog, hero, etc.)
- All other GitHub Actions workflows (dependabot-auto-merge, accessibility, stale)
- All other PHP files in `src/` beyond `bootstrap.php`
- All JavaScript, CSS, and theme.json configuration

## Hypothesized Root Cause

These are not runtime bugs but coding-practice violations introduced during initial development:

1. **Anonymous closures in hooks**: The original author used inline closures for brevity. WordPress's `remove_filter`/`remove_action` API requires a referenceable callback to unhook, so anonymous closures are effectively permanent — blocking child-theme customization.

2. **Hardcoded external URLs**: The header patterns were built with the author's personal URLs as placeholders during development and were never replaced with neutral `#` anchors before distribution.

3. **Missing permissions blocks**: The CI and Lighthouse workflows were created without explicit `permissions` declarations. GitHub defaults to broad token scopes when no block is present, violating the principle of least privilege.

4. **Missing form security notice**: The contact form patterns use raw HTML `<form>` elements as layout demonstrations. Without a comment, users may assume the forms are functional and expect submissions to work.

## Correctness Properties

Property 1: Bug Condition — Anti-patterns are eliminated

_For any_ file where the bug condition holds (isBugCondition returns true), the fixed file SHALL no longer contain the anti-pattern: anonymous closures are replaced with named functions, hardcoded URLs are replaced with `#`, `permissions` blocks are present, and form security notices are included.

**Validates: Requirements 2.1, 2.2, 2.3, 2.4, 2.5, 2.6, 2.7**

Property 2: Preservation — Runtime and CI behavior unchanged

_For any_ file where the bug condition does NOT hold (isBugCondition returns false), the fixed codebase SHALL produce exactly the same runtime behavior, CI execution, and rendered HTML output as the original codebase, preserving all existing functionality.

**Validates: Requirements 3.1, 3.2, 3.3, 3.4, 3.5, 3.6, 3.7, 3.8, 3.9, 3.10**

## Fix Implementation

### Changes Required

**File**: `functions.php`

**Specific Changes**:
1. **Extract updater config closure**: Replace the anonymous closure on `aegis_theme_updater_config` with a named function `aegis_theme_updater_config` that returns the same array. Register with `add_filter('aegis_theme_updater_config', 'aegis_theme_updater_config')`.
2. **Extract block visibility closure**: Replace the `static function` on `block_type_metadata` with a named function `aegis_suppress_block_visibility`. Register with `add_filter('block_type_metadata', 'aegis_suppress_block_visibility')`.
3. **Extract resource hints closure**: Replace the anonymous closure on `wp_resource_hints` with a named function `aegis_resource_hints`. Register with `add_filter('wp_resource_hints', 'aegis_resource_hints', 10, 2)`.
4. **Extract theme setup closure**: Replace the anonymous closure on `after_setup_theme` with a named function `aegis_setup_theme`. Register with `add_action('after_setup_theme', 'aegis_setup_theme')`.

**File**: `src/bootstrap.php`

**Specific Changes**:
5. **Extract init closure**: Replace the `static function` on `init` with a named function `aegis_init_services`. Register with `add_action('init', 'aegis_init_services')`.

**File**: `patterns/header/default.php`

**Specific Changes**:
6. **Replace Log In URL**: Change `href="https://www.atmostfear-entertainment.com/contact/"` to `href="#"` on the "Log In" button.

**File**: `patterns/header/center-logo.php`

**Specific Changes**:
7. **Replace Log In URL**: Change `href="https://www.atmostfear-entertainment.com/contact/"` to `href="#"` on the "Log In" button.
8. **Replace Sign Up URL**: Change `href="https://paypal.me/aedonation?locale.x=en_US&amp;country.x=CO"` to `href="#"` on the "Sign Up" button. Also remove the `target="_blank" rel="noreferrer noopener nofollow"` attributes since `#` is not an external link.

**File**: `.github/workflows/ci.yml`

**Specific Changes**:
9. **Add permissions block**: Add a top-level `permissions:` block with `contents: read` after the `concurrency:` block.

**File**: `.github/workflows/lighthouse-ci.yml`

**Specific Changes**:
10. **Add permissions block**: Add a top-level `permissions:` block with `contents: read` and `pull-requests: write` after the `concurrency:` block.

**File**: `patterns/contact/form-boxed.php`

**Specific Changes**:
11. **Add security notice**: Insert an HTML comment immediately after the `<form action="#" method="POST">` opening tag.

**File**: `patterns/contact/form-map-overlay.php`

**Specific Changes**:
12. **Add security notice**: Insert the same HTML comment immediately after the `<form action="#" method="POST">` opening tag.

**File**: `patterns/contact/form-map.php`

**Specific Changes**:
13. **Add security notice**: Insert the same HTML comment immediately after the `<form action="#" method="POST">` opening tag.

## Testing Strategy

### Validation Approach

The testing strategy follows a two-phase approach: first, surface counterexamples that demonstrate the anti-patterns on unfixed code, then verify the fix works correctly and preserves existing behavior.

### Exploratory Bug Condition Checking

**Goal**: Surface counterexamples that demonstrate the anti-patterns BEFORE implementing the fix. Confirm or refute the root cause analysis.

**Test Plan**: Inspect each file for the specific anti-pattern. Run grep/search to confirm the presence of anonymous closures, hardcoded URLs, missing permissions, and missing form notices.

**Test Cases**:
1. **Anonymous closure test**: Search `functions.php` for `add_filter(.*function` and `add_action(.*function` — expect 4 matches (will confirm on unfixed code)
2. **Bootstrap closure test**: Search `src/bootstrap.php` for `add_action.*static function` — expect 1 match (will confirm on unfixed code)
3. **Hardcoded URL test**: Search header patterns for `atmostfear-entertainment.com` and `paypal.me` — expect 3 matches across 2 files (will confirm on unfixed code)
4. **Missing permissions test**: Check `ci.yml` and `lighthouse-ci.yml` for top-level `permissions:` key — expect absent (will confirm on unfixed code)
5. **Missing notice test**: Search contact form patterns for the security comment — expect 0 matches (will confirm on unfixed code)

**Expected Counterexamples**:
- All five categories of anti-patterns are present in the unfixed code
- Possible causes confirmed: developer convenience (closures), leftover dev URLs, workflow template defaults, oversight on form patterns

### Fix Checking

**Goal**: Verify that for all inputs where the bug condition holds, the fixed files no longer contain the anti-pattern.

**Pseudocode:**
```
FOR ALL file WHERE isBugCondition(file) DO
  result := inspectFile_fixed(file)
  ASSERT NOT containsAntiPattern(result)
END FOR
```

### Preservation Checking

**Goal**: Verify that for all inputs where the bug condition does NOT hold, the fixed files produce the same result as the original files.

**Pseudocode:**
```
FOR ALL file WHERE NOT isBugCondition(file) DO
  ASSERT originalBehavior(file) = fixedBehavior(file)
END FOR
```

**Testing Approach**: Manual diff review is appropriate for these changes because:
- Each change is small and isolated to a specific line or block
- The changes are purely structural (renaming, URL replacement, YAML addition, comment insertion)
- Runtime behavior can be verified by confirming the named functions produce identical return values

**Test Plan**: After applying fixes, verify each file by diffing against the original and confirming only the intended changes are present.

**Test Cases**:
1. **Hook callback preservation**: Verify each named function body is identical to the original closure body
2. **Header pattern preservation**: Verify only the `href` attributes changed, all other markup is identical
3. **CI workflow preservation**: Verify only the `permissions:` block was added, all jobs/steps are identical
4. **Form pattern preservation**: Verify only the HTML comment was added, all form markup is identical

### Unit Tests

- Verify `aegis_theme_updater_config()` returns `['repo' => 'aegiswp/theme', 'slug' => 'aegis']`
- Verify `aegis_suppress_block_visibility()` strips `blockVisibility` from metadata
- Verify `aegis_resource_hints()` returns URLs unchanged for `dns-prefetch`
- Verify `aegis_setup_theme()` calls `add_theme_support('title-tag')`
- Verify `aegis_init_services()` instantiates the three service classes

### Property-Based Tests

- Generate random block metadata arrays and verify `aegis_suppress_block_visibility` only removes `blockVisibility` key
- Generate random URL arrays and verify `aegis_resource_hints` returns them unchanged for `dns-prefetch`

### Integration Tests

- Verify the theme activates without errors after all changes
- Verify PHPCS passes on modified PHP files
- Verify CI and Lighthouse workflows pass YAML lint validation
- Verify header patterns render without PHP errors
- Verify contact form patterns render without PHP errors
