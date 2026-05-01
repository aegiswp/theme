# Tasks

## 1. Fix utility pattern files
- [x] 1.1 Wrap "Top" link text in `esc_html__()` in `patterns/utility/patterns.php`
- [x] 1.2 Wrap "Copied!" text in `esc_html__()` in `patterns/utility/gradients.php` (assign to variable before heredoc and interpolate)
- [x] 1.3 Wrap "Copied!" text in `esc_html__()` in `patterns/utility/color-palette.php` (assign to variable before heredoc and interpolate)

## 2. Fix template pattern files
- [x] 2.1 Wrap "Search Results" heading in `esc_html__()` in `patterns/template/search.php`
- [x] 2.2 Wrap "Search Results" heading in `esc_html__()` in `patterns/template/404.php`
- [x] 2.3 Wrap all hardcoded strings ("No results found", "You can try", "clearing any filters", "or head to our", "store's home") in `esc_html__()` in `patterns/template/archive-product.php`

## 3. Fix header pattern file
- [x] 3.1 Wrap "Subscribe", "Log In", and "Sign Up" button labels in `esc_html__()` in `patterns/header/center-logo.php`

## 4. Fix pricing pattern file
- [x] 4.1 Wrap all three "Save 10% -" discount label occurrences in `esc_html__()` in `patterns/pricing/three-column.php`

## 5. Fix CTA pattern file
- [x] 5.1 Wrap standalone "SAVE50" coupon code text in `esc_html__()` in `patterns/cta/commerce-sale.php`

## 6. Validate fixes
- [x] 6.1 Run `php -l` syntax check on all 9 modified files to confirm no PHP errors
- [x] 6.2 Verify all new `esc_html__()` calls use the `'aegis'` text domain
- [x] 6.3 Verify no existing `esc_html__()` calls were altered or double-wrapped
