# Bugfix Requirements Document

## Introduction

Multiple pattern PHP files in the Aegis WordPress block theme contain hardcoded English strings that are not wrapped in WordPress i18n translation functions. The theme declares the `translation-ready` tag in `style.css` and uses `aegis` as its text domain, but several pattern files output user-visible strings directly in HTML without `esc_html__()` wrappers. This breaks translatability for those strings and violates the theme's own translation-ready contract. Most other pattern files in the theme already correctly use `esc_html__('...', 'aegis')`, so these are strings that were missed during the initial i18n pass.

## Bug Analysis

### Current Behavior (Defect)

1.1 WHEN the `patterns/utility/patterns.php` file renders the "Top" link text THEN the system outputs the hardcoded English string `Top` without an i18n translation wrapper

1.2 WHEN the `patterns/utility/gradients.php` file renders the copy-confirmation message THEN the system outputs the hardcoded English string `Copied!` without an i18n translation wrapper

1.3 WHEN the `patterns/utility/color-palette.php` file renders the copy-confirmation message THEN the system outputs the hardcoded English string `Copied!` without an i18n translation wrapper

1.4 WHEN the `patterns/template/search.php` file renders the search results heading THEN the system outputs the hardcoded English string `Search Results` without an i18n translation wrapper

1.5 WHEN the `patterns/template/404.php` file renders the search section heading THEN the system outputs the hardcoded English string `Search Results` without an i18n translation wrapper

1.6 WHEN the `patterns/template/archive-product.php` file renders the no-results message THEN the system outputs the hardcoded English strings `No results found`, `You can try`, `clearing any filters`, `or head to our`, and `store's home` without i18n translation wrappers

1.7 WHEN the `patterns/header/center-logo.php` file renders the action buttons THEN the system outputs the hardcoded English strings `Subscribe`, `Log In`, and `Sign Up` without i18n translation wrappers

1.8 WHEN the `patterns/pricing/three-column.php` file renders the discount labels THEN the system outputs the hardcoded English string `Save 10% -` (appearing three times with strikethrough prices `$99`, `$199`, `$499`) without i18n translation wrappers

1.9 WHEN the `patterns/cta/commerce-sale.php` file renders the coupon code display THEN the system outputs the hardcoded English string `SAVE50` in the coupon code box without an i18n translation wrapper

### Expected Behavior (Correct)

2.1 WHEN the `patterns/utility/patterns.php` file renders the "Top" link text THEN the system SHALL wrap the string in `esc_html__('Top', 'aegis')` so it is translatable

2.2 WHEN the `patterns/utility/gradients.php` file renders the copy-confirmation message THEN the system SHALL wrap the string in `esc_html__('Copied!', 'aegis')` so it is translatable

2.3 WHEN the `patterns/utility/color-palette.php` file renders the copy-confirmation message THEN the system SHALL wrap the string in `esc_html__('Copied!', 'aegis')` so it is translatable

2.4 WHEN the `patterns/template/search.php` file renders the search results heading THEN the system SHALL wrap the string in `esc_html__('Search Results', 'aegis')` so it is translatable

2.5 WHEN the `patterns/template/404.php` file renders the search section heading THEN the system SHALL wrap the string in `esc_html__('Search Results', 'aegis')` so it is translatable

2.6 WHEN the `patterns/template/archive-product.php` file renders the no-results message THEN the system SHALL wrap each user-visible string segment (`No results found`, `You can try`, `clearing any filters`, `or head to our`, `store's home`) in appropriate i18n translation functions with the `aegis` text domain so they are translatable

2.7 WHEN the `patterns/header/center-logo.php` file renders the action buttons THEN the system SHALL wrap each button label (`Subscribe`, `Log In`, `Sign Up`) in `esc_html__('...', 'aegis')` so they are translatable

2.8 WHEN the `patterns/pricing/three-column.php` file renders the discount labels THEN the system SHALL wrap the translatable text portions (e.g., `Save 10% -`) in `esc_html__('...', 'aegis')` in all three occurrences so they are translatable

2.9 WHEN the `patterns/cta/commerce-sale.php` file renders the coupon code display THEN the system SHALL wrap the coupon code string `SAVE50` in `esc_html__('SAVE50', 'aegis')` so it is translatable

### Unchanged Behavior (Regression Prevention)

3.1 WHEN any pattern file that already uses `esc_html__('...', 'aegis')` correctly is rendered THEN the system SHALL CONTINUE TO output the translated strings without any change in behavior or markup structure

3.2 WHEN the theme is used without any translation files loaded (default English locale) THEN the system SHALL CONTINUE TO display the same English strings as before the fix, with identical visual output

3.3 WHEN the affected pattern files are rendered THEN the system SHALL CONTINUE TO produce valid WordPress block markup (HTML comments and structure) identical to the current output except for the addition of PHP i18n function wrappers

3.4 WHEN the theme's text domain `aegis` is used with a loaded `.mo`/`.po` translation file THEN the system SHALL CONTINUE TO correctly translate all previously translatable strings in unaffected pattern files

3.5 WHEN the `patterns/cta/commerce-sale.php` file renders the paragraph that already uses `esc_html__('Use code SAVE50 at checkout...', 'aegis')` THEN the system SHALL CONTINUE TO translate that string without any change
