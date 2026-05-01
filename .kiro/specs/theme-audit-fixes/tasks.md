# Tasks

## 1. Fix center-logo.php ARIA attributes and ariaLabels
- [x] 1.1 Add `role="dialog"`, `aria-modal="true"`, `aria-label="<?php esc_attr_e( 'Search', 'aegis' ); ?>"`, and `aria-hidden="true"` to the search modal `<div>` in `patterns/header/center-logo.php`
- [x] 1.2 Add `"ariaLabel":"Close search"` to the search-close button block comment in `patterns/header/center-logo.php`
- [x] 1.3 Add `"ariaLabel":"Open search"` to the search-toggle button block comment in `patterns/header/center-logo.php`
- [x] 1.4 Add `"ariaLabel":"Switch to dark mode"` to the hide-dark-mode button block comment in `patterns/header/center-logo.php`
- [x] 1.5 Add `"ariaLabel":"Switch to light mode"` to the hide-light-mode button block comment in `patterns/header/center-logo.php`

## 2. Fix center-logo.php search modal focus management JavaScript
- [x] 2.1 Update search-toggle onclick JS to set `aria-hidden="false"` on modals and focus the search input, matching `default.php`
- [x] 2.2 Update search-close onclick JS to set `aria-hidden="true"` on modals and return focus to the opener, matching `default.php`

## 3. Fix center-logo.php cookie SameSite flag
- [x] 3.1 Add `;SameSite=Lax` to the dark mode cookie string in the hide-dark-mode button onclick in `patterns/header/center-logo.php`
- [x] 3.2 Add `;SameSite=Lax` to the light mode cookie string in the hide-light-mode button onclick in `patterns/header/center-logo.php`

## 4. Add skip-to-content pattern to header template part
- [x] 4.1 Insert `<!-- wp:pattern {"slug":"aegis/skip-to-content"} /-->` before the header pattern reference in `parts/header.html`

## 5. Fix 404 template heading text
- [x] 5.1 Change `esc_html__( 'Search Results', 'aegis' )` to `esc_html__( 'Page Not Found', 'aegis' )` in `patterns/template/404.php`

## 6. Add patterns directory and embed-content.php to PHPCS config
- [x] 6.1 Add `<file>./patterns</file>` to `phpcs.xml` after the existing `<file>` entries
- [x] 6.2 Add `<file>./embed-content.php</file>` to `phpcs.xml` after the existing `<file>` entries

## 7. Verify fixes and preservation
- [x] 7.1 Verify `patterns/header/default.php` is unchanged
- [x] 7.2 Verify all targeted attributes, JS, cookies, patterns, text, and config entries are present in the fixed files
