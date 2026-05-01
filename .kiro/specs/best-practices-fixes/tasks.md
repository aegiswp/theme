# Tasks

## 1. Extract anonymous closures to named functions in functions.php
- [x] 1.1 Replace the `aegis_theme_updater_config` anonymous closure with a named function `aegis_theme_updater_config()` that returns `['repo' => 'aegiswp/theme', 'slug' => 'aegis']`, and register it with `add_filter('aegis_theme_updater_config', 'aegis_theme_updater_config')`
- [x] 1.2 Replace the `block_type_metadata` static anonymous closure with a named function `aegis_suppress_block_visibility(array $metadata): array` that unsets `$metadata['supports']['metadata']['blockVisibility']` if present and returns `$metadata`, and register it with `add_filter('block_type_metadata', 'aegis_suppress_block_visibility')`
- [x] 1.3 Replace the `wp_resource_hints` anonymous closure with a named function `aegis_resource_hints($urls, $relation_type)` with the same body, and register it with `add_filter('wp_resource_hints', 'aegis_resource_hints', 10, 2)`
- [x] 1.4 Replace the `after_setup_theme` anonymous closure with a named function `aegis_setup_theme()` that calls `add_theme_support('title-tag')`, and register it with `add_action('after_setup_theme', 'aegis_setup_theme')`

## 2. Extract anonymous closure to named function in src/bootstrap.php
- [x] 2.1 Replace the `init` static anonymous closure with a named function `aegis_init_services(): void` that instantiates and calls `->init()` on `MultiStep`, `Overlay`, and `Breadcrumbs`, and register it with `add_action('init', 'aegis_init_services')`

## 3. Replace hardcoded external URLs in header patterns
- [x] 3.1 In `patterns/header/default.php`, change the "Log In" button `href` from `https://www.atmostfear-entertainment.com/contact/` to `#`
- [x] 3.2 In `patterns/header/center-logo.php`, change the "Log In" button `href` from `https://www.atmostfear-entertainment.com/contact/` to `#`
- [x] 3.3 In `patterns/header/center-logo.php`, change the "Sign Up" button `href` from `https://paypal.me/aedonation?locale.x=en_US&amp;country.x=CO` to `#` and remove the `target="_blank" rel="noreferrer noopener nofollow"` attributes

## 4. Add permissions blocks to GitHub workflows
- [x] 4.1 In `.github/workflows/ci.yml`, add a top-level `permissions:` block with `contents: read` after the `concurrency:` block
- [x] 4.2 In `.github/workflows/lighthouse-ci.yml`, add a top-level `permissions:` block with `contents: read` and `pull-requests: write` after the `concurrency:` block

## 5. Add security notice HTML comment to contact form patterns
- [x] 5.1 In `patterns/contact/form-boxed.php`, add an HTML comment `<!-- NOTE: This is a placeholder form layout. A form plugin (e.g., WPForms, Contact Form 7, Gravity Forms) is required for actual form handling, validation, and security (nonce/CSRF). -->` immediately after the `<form action="#" method="POST">` opening tag
- [x] 5.2 In `patterns/contact/form-map-overlay.php`, add the same HTML comment immediately after the `<form action="#" method="POST">` opening tag
- [x] 5.3 In `patterns/contact/form-map.php`, add the same HTML comment immediately after the `<form action="#" method="POST">` opening tag

## 6. Verify all changes
- [x] 6.1 Run `php -l functions.php` and `php -l src/bootstrap.php` to confirm no syntax errors in modified PHP files
- [x] 6.2 Verify that no hardcoded external URLs (`atmostfear-entertainment.com`, `paypal.me`) remain in header pattern files
- [x] 6.3 Verify that both `ci.yml` and `lighthouse-ci.yml` contain a top-level `permissions:` key
- [x] 6.4 Verify that all three contact form patterns contain the security notice HTML comment
