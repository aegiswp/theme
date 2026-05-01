# Pattern i18n Missing Strings Bugfix Design

## Overview

Nine pattern PHP files in the Aegis WordPress block theme contain hardcoded English strings that bypass the WordPress i18n translation system. The theme declares `translation-ready` in its `style.css` tags and uses `aegis` as its text domain, but these files output user-visible text directly in HTML without `esc_html__()` wrappers. The fix wraps each hardcoded string in the appropriate WordPress translation function while preserving the existing HTML/block markup structure exactly. This is a mechanical, file-by-file correction with no logic changes.

## Glossary

- **Bug_Condition (C)**: A user-visible string in a pattern PHP file that is output as raw English text without being wrapped in a WordPress i18n translation function (`esc_html__()`, `esc_attr__()`, etc.)
- **Property (P)**: Every user-visible string in a pattern file is wrapped in the appropriate WordPress i18n function with the `aegis` text domain, making it discoverable by translation tools and translatable at runtime
- **Preservation**: All existing translated strings, HTML/block comment markup structure, and visual output in the default English locale must remain identical after the fix
- **`esc_html__()`**: WordPress function that marks a string for translation and escapes HTML entities in the output. Signature: `esc_html__( string $text, string $domain )`
- **Text Domain**: The identifier `'aegis'` used to associate translatable strings with this theme's `.po`/`.mo` translation files
- **Heredoc**: PHP string syntax (`<<<HTML ... HTML;`) used in `gradients.php` and `color-palette.php` where direct `esc_html__()` calls cannot be interpolated without restructuring

## Bug Details

### Bug Condition

The bug manifests when any of the 9 affected pattern files are rendered and the site is running in a non-English locale with a loaded translation file. The hardcoded English strings are output verbatim instead of being passed through the translation system, so they appear untranslated regardless of locale. Additionally, these strings are invisible to translation tooling (`wp i18n make-pot`, Poedit, etc.) because they lack the `esc_html__()` wrapper that the extraction tools scan for.

**Formal Specification:**
```
FUNCTION isBugCondition(input)
  INPUT: input of type { file: FilePath, string: UserVisibleString }
  OUTPUT: boolean

  RETURN input.file IN [
           'patterns/utility/patterns.php',
           'patterns/utility/gradients.php',
           'patterns/utility/color-palette.php',
           'patterns/template/search.php',
           'patterns/template/404.php',
           'patterns/template/archive-product.php',
           'patterns/header/center-logo.php',
           'patterns/pricing/three-column.php',
           'patterns/cta/commerce-sale.php'
         ]
         AND input.string IS user-visible text
         AND input.string IS NOT wrapped in esc_html__() or equivalent i18n function
END FUNCTION
```

### Examples

- **patterns/utility/patterns.php**: `<a href="#">Top</a>` → should be `<a href="#"><?php echo esc_html__( 'Top', 'aegis' ); ?></a>`
- **patterns/template/search.php**: `>Search Results</p>` → should use `><?php echo esc_html__( 'Search Results', 'aegis' ); ?></p>`
- **patterns/template/404.php**: `>Search Results</p>` → should use `><?php echo esc_html__( 'Search Results', 'aegis' ); ?></p>`
- **patterns/template/archive-product.php**: `<strong>No results found</strong>` → should use `<strong><?php echo esc_html__( 'No results found', 'aegis' ); ?></strong>`
- **patterns/header/center-logo.php**: `>Subscribe</a>` → should use `><?php echo esc_html__( 'Subscribe', 'aegis' ); ?></a>`
- **patterns/pricing/three-column.php**: `>Save 10% - <s>$99</s></p>` → the "Save 10% -" text portion needs wrapping while preserving the `<s>` HTML structure
- **patterns/cta/commerce-sale.php**: `>SAVE50</p>` → should use `><?php echo esc_html__( 'SAVE50', 'aegis' ); ?></p>`
- **patterns/utility/gradients.php**: `<p class="has-display-none">Copied!</p>` inside heredoc → needs restructuring to use PHP variable with `esc_html__()`
- **patterns/utility/color-palette.php**: `<p class="has-display-none">Copied!</p>` inside heredoc → needs restructuring to use PHP variable with `esc_html__()`

## Expected Behavior

### Preservation Requirements

**Unchanged Behaviors:**
- All pattern files not listed in the bug condition must remain completely untouched
- All strings already wrapped in `esc_html__('...', 'aegis')` must continue to function identically
- The rendered HTML output in the default English locale (no translation loaded) must be visually identical before and after the fix — `esc_html__()` returns the original string when no translation is available
- WordPress block comment markup (`<!-- wp:... -->`) must remain structurally identical
- All PHP logic, control flow, and variable assignments in the affected files must remain unchanged
- The `patterns/cta/commerce-sale.php` paragraph that already uses `esc_html__('Use code SAVE50 at checkout...', 'aegis')` must remain unchanged

**Scope:**
All inputs that do NOT involve the 9 listed files should be completely unaffected by this fix. Within the 9 files, only the specific hardcoded string locations are modified — surrounding markup, attributes, class names, inline styles, and onclick handlers remain untouched.

## Hypothesized Root Cause

Based on the bug analysis, the root cause is straightforward: these strings were missed during the initial internationalization pass of the theme's pattern files.

1. **Oversight During Initial i18n Pass**: The majority of pattern files correctly use `esc_html__()`. The 9 affected files were likely created or modified after the i18n pass, or were simply overlooked. Evidence: the `.template/` versions of `search.php`, `404.php`, and `archive-product.php` already have correct i18n wrappers, suggesting the non-template variants were copied and the wrappers were accidentally stripped.

2. **Heredoc Complexity**: The `gradients.php` and `color-palette.php` files use PHP heredoc syntax for HTML templates. Heredocs do not support direct function calls like `esc_html__()` inside them, which may have led the developer to skip i18n for the "Copied!" string rather than restructure the code.

3. **Static Content Assumption**: Strings like "SAVE50" (a coupon code) and "Top" (a navigation anchor) may have been considered non-translatable static content, but they are user-visible and should be translatable for localized sites.

4. **Mixed HTML/PHP Context**: In `archive-product.php` and `center-logo.php`, the strings are embedded directly in HTML without PHP tags, making it easy to overlook them during a search for untranslated `echo` statements.

## Correctness Properties

Property 1: Bug Condition - All Hardcoded Strings Wrapped in i18n Functions

_For any_ pattern file listed in the bug condition, and _for any_ user-visible string identified as hardcoded, the fixed file SHALL contain that string wrapped in `esc_html__('...', 'aegis')` (or equivalent i18n function) with the correct `aegis` text domain, making it discoverable by WordPress translation extraction tools.

**Validates: Requirements 2.1, 2.2, 2.3, 2.4, 2.5, 2.6, 2.7, 2.8, 2.9**

Property 2: Preservation - Default Locale Output Unchanged

_For any_ pattern file modified by this fix, when rendered in the default English locale (no translation file loaded), the HTML output SHALL be identical to the output produced by the unfixed file, preserving visual appearance, block markup structure, and all existing functionality.

**Validates: Requirements 3.1, 3.2, 3.3, 3.4, 3.5**

## Fix Implementation

### Changes Required

Assuming our root cause analysis is correct (strings were simply missed during i18n pass):

**File**: `patterns/utility/patterns.php`

**Specific Changes**:
1. Replace `<a href="#">Top</a>` with `<a href="#"><?php echo esc_html__( 'Top', 'aegis' ); ?></a>`

---

**File**: `patterns/utility/gradients.php`

**Specific Changes**:
1. The "Copied!" string is inside a heredoc `$item` variable. Assign a PHP variable before the heredoc: `$copied_text = esc_html__( 'Copied!', 'aegis' );` and interpolate `$copied_text` in the heredoc where `Copied!` currently appears.

---

**File**: `patterns/utility/color-palette.php`

**Specific Changes**:
1. The "Copied!" string is inside a heredoc `$html` built in the `color_palette_grid()` function. Assign a variable at the top of the function: `$copied_text = esc_html__( 'Copied!', 'aegis' );` and interpolate `$copied_text` in the heredoc where `Copied!` currently appears.

---

**File**: `patterns/template/search.php`

**Specific Changes**:
1. Replace the hardcoded `>Search Results</p>` with `><?php echo esc_html__( 'Search Results', 'aegis' ); ?></p>`

---

**File**: `patterns/template/404.php`

**Specific Changes**:
1. Replace the hardcoded `>Search Results</p>` with `><?php echo esc_html__( 'Search Results', 'aegis' ); ?></p>`

---

**File**: `patterns/template/archive-product.php`

**Specific Changes**:
1. Replace `<strong>No results found</strong>` with `<strong><?php echo esc_html__( 'No results found', 'aegis' ); ?></strong>`
2. Replace `You can try` with `<?php echo esc_html__( 'You can try', 'aegis' ); ?>`
3. Replace `clearing any filters` (link text) with `<?php echo esc_html__( 'clearing any filters', 'aegis' ); ?>`
4. Replace `or head to our` with `<?php echo esc_html__( 'or head to our', 'aegis' ); ?>`
5. Replace `store's home` (link text) with `<?php echo esc_html__( "store's home", 'aegis' ); ?>` (note: use double quotes or escaped single quote for the apostrophe)

---

**File**: `patterns/header/center-logo.php`

**Specific Changes**:
1. Replace `>Subscribe</a>` with `><?php echo esc_html__( 'Subscribe', 'aegis' ); ?></a>`
2. Replace `>Log\n\t\t\t\t\t\t\t\tIn</a>` with `><?php echo esc_html__( 'Log In', 'aegis' ); ?></a>`
3. Replace `>Sign Up</a>` with `><?php echo esc_html__( 'Sign Up', 'aegis' ); ?></a>`

---

**File**: `patterns/pricing/three-column.php`

**Specific Changes**:
1. For all three occurrences of `>Save 10% - <s>$XX</s></p>`, wrap the translatable text: `><?php echo esc_html__( 'Save 10% -', 'aegis' ); ?> <s>$XX</s></p>` (preserving the `<s>` strikethrough markup and dollar amounts as-is since they are numeric)

---

**File**: `patterns/cta/commerce-sale.php`

**Specific Changes**:
1. Replace the standalone `>SAVE50</p>` in the coupon code box with `><?php echo esc_html__( 'SAVE50', 'aegis' ); ?></p>`

## Testing Strategy

### Validation Approach

The testing strategy follows a two-phase approach: first, verify that the hardcoded strings exist in the unfixed code (confirming the bug), then verify the fix wraps all strings correctly and preserves output.

### Exploratory Bug Condition Checking

**Goal**: Surface counterexamples that demonstrate the bug BEFORE implementing the fix. Confirm that the identified strings are indeed not wrapped in i18n functions.

**Test Plan**: Use `grep` / static analysis to scan each of the 9 affected files for user-visible strings that lack `esc_html__()` wrappers. Run on the UNFIXED code to confirm the bug exists.

**Test Cases**:
1. **Grep for "Top" in patterns.php**: Confirm `>Top</a>` exists without PHP wrapper (will match on unfixed code)
2. **Grep for "Copied!" in gradients.php and color-palette.php**: Confirm `>Copied!</p>` exists in heredoc without i18n (will match on unfixed code)
3. **Grep for "Search Results" in search.php and 404.php**: Confirm hardcoded string without PHP wrapper (will match on unfixed code)
4. **Grep for "No results found" in archive-product.php**: Confirm hardcoded string (will match on unfixed code)
5. **Grep for "Subscribe", "Log In", "Sign Up" in center-logo.php**: Confirm hardcoded button labels (will match on unfixed code)
6. **Grep for "Save 10%" in three-column.php**: Confirm 3 hardcoded occurrences (will match on unfixed code)
7. **Grep for standalone "SAVE50" in commerce-sale.php**: Confirm the coupon code box string is hardcoded (will match on unfixed code)

**Expected Counterexamples**:
- All 9 files will contain at least one user-visible string not wrapped in `esc_html__()`
- The `.template/` versions of search.php, 404.php, and archive-product.php will NOT show this bug (they are already correct), confirming the non-template variants diverged

### Fix Checking

**Goal**: Verify that for all inputs where the bug condition holds, the fixed files contain proper i18n wrappers.

**Pseudocode:**
```
FOR ALL file IN affectedFiles DO
  FOR ALL string IN identifiedHardcodedStrings(file) DO
    ASSERT string IS wrapped in esc_html__( string, 'aegis' )
           OR equivalent i18n function with 'aegis' domain
  END FOR
END FOR
```

### Preservation Checking

**Goal**: Verify that for all inputs where the bug condition does NOT hold, the fixed files produce identical output.

**Pseudocode:**
```
FOR ALL file IN affectedFiles DO
  FOR ALL line NOT containing an identified hardcoded string DO
    ASSERT line_in_fixed_file = line_in_original_file
  END FOR
END FOR
```

**Testing Approach**: Static file comparison is the most effective approach for this bug because:
- The fix is purely mechanical (wrapping strings in function calls)
- The output in the default locale is deterministic and identical
- Diff-based comparison catches any unintended changes to markup, attributes, or logic
- No runtime behavior changes — only the translation extraction pipeline is affected

**Test Plan**: Compare the fixed files against the originals using diff. Verify that only the specific string locations changed and all surrounding markup is preserved.

**Test Cases**:
1. **Markup Preservation**: Diff each fixed file against its original; only the specific string wrapping lines should differ
2. **Text Domain Consistency**: Grep all new `esc_html__()` calls to verify they all use `'aegis'` as the text domain
3. **No Double-Wrapping**: Verify no string that was already wrapped in `esc_html__()` gets wrapped again
4. **PHP Syntax Validity**: Run `php -l` on each modified file to confirm no syntax errors were introduced

### Unit Tests

- Verify each of the 9 files can be parsed without PHP syntax errors after modification
- Verify the `esc_html__()` function calls use the correct text domain `'aegis'`
- Verify no WordPress block comments (`<!-- wp:... -->`) were altered

### Property-Based Tests

- Scan all 9 fixed files and verify every user-visible string (identified in the requirements) is wrapped in an i18n function
- Scan all 9 fixed files and verify no previously-translated strings were double-wrapped or altered
- Verify the text domain `'aegis'` is used consistently across all new translation calls

### Integration Tests

- Run `wp i18n make-pot` (or equivalent) on the theme after the fix and verify the newly wrapped strings appear in the generated `.pot` file
- Load the theme in a non-English locale with a translation file and verify the previously-hardcoded strings are now translated
- Verify the theme renders identically in the default English locale before and after the fix
