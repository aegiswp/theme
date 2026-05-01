# Bugfix Requirements Document

## Introduction

A best practices review of the Aegis block theme codebase identified multiple issues spanning PHP coding standards, WordPress.org distribution guidelines, CI/CD security hardening, and placeholder form safety. These issues affect child theme extensibility, theme review compliance, GitHub Actions security posture, and end-user clarity around non-functional form patterns. This document captures the five categories of defects, the expected corrections, and the existing behaviors that must remain unchanged.

## Bug Analysis

### Current Behavior (Defect)

1.1 WHEN a child theme or plugin calls `remove_filter('aegis_theme_updater_config', ...)` or `remove_filter('block_type_metadata', ...)` or `remove_filter('wp_resource_hints', ...)` or `remove_action('after_setup_theme', ...)` THEN the system cannot unhook the callbacks because all four hooks in `functions.php` use anonymous closures with no referenceable function name

1.2 WHEN a child theme or plugin calls `remove_action('init', ...)` targeting the service bootstrap callback THEN the system cannot unhook the callback because `src/bootstrap.php` registers an anonymous closure on the `init` action

1.3 WHEN the `patterns/header/default.php` header pattern is rendered THEN the system outputs a "Log In" button linking to the hardcoded external URL `https://www.atmostfear-entertainment.com/contact/` instead of a neutral placeholder

1.4 WHEN the `patterns/header/center-logo.php` header pattern is rendered THEN the system outputs a "Log In" button linking to `https://www.atmostfear-entertainment.com/contact/` and a "Sign Up" button linking to `https://paypal.me/aedonation?locale.x=en_US&country.x=CO` instead of neutral placeholders

1.5 WHEN the `.github/workflows/ci.yml` workflow runs THEN the system uses the default (broad) GitHub token permissions because no explicit `permissions` block is declared at the workflow level

1.6 WHEN the `.github/workflows/lighthouse-ci.yml` workflow runs THEN the system uses the default (broad) GitHub token permissions because no explicit `permissions` block is declared, despite the workflow needing only `contents: read` and `pull-requests: write`

1.7 WHEN a user views a contact form pattern (`patterns/contact/form-boxed.php`, `patterns/contact/form-map-overlay.php`, or `patterns/contact/form-map.php`) THEN the system renders an HTML `<form action="#" method="POST">` with no nonce, no server-side handler, and no indication that a form plugin is required, misleading users into thinking the form is functional

### Expected Behavior (Correct)

2.1 WHEN a child theme or plugin calls `remove_filter` or `remove_action` targeting the hooks registered in `functions.php` THEN the system SHALL allow unhooking because each callback is a named function prefixed with `aegis_` (e.g., `aegis_theme_updater_config`, `aegis_suppress_block_visibility`, `aegis_resource_hints`, `aegis_setup_theme`)

2.2 WHEN a child theme or plugin calls `remove_action('init', 'aegis_init_services')` THEN the system SHALL allow unhooking because the `src/bootstrap.php` callback is a named function `aegis_init_services`

2.3 WHEN the `patterns/header/default.php` header pattern is rendered THEN the system SHALL output the "Log In" button with `href="#"` as a neutral placeholder instead of a hardcoded external URL

2.4 WHEN the `patterns/header/center-logo.php` header pattern is rendered THEN the system SHALL output both the "Log In" and "Sign Up" buttons with `href="#"` as neutral placeholders instead of hardcoded external URLs

2.5 WHEN the `.github/workflows/ci.yml` workflow runs THEN the system SHALL declare an explicit top-level `permissions` block with `contents: read` to enforce least-privilege token scope

2.6 WHEN the `.github/workflows/lighthouse-ci.yml` workflow runs THEN the system SHALL declare an explicit top-level `permissions` block with `contents: read` and `pull-requests: write` to enforce least-privilege token scope

2.7 WHEN a user views a contact form pattern (`form-boxed.php`, `form-map-overlay.php`, or `form-map.php`) THEN the system SHALL include an HTML comment inside the `<form>` element stating that a form-handling plugin is required for the form to function (e.g., `<!-- NOTE: This is a placeholder form layout. A form plugin (e.g., WPForms, Contact Form 7, Gravity Forms) is required for actual form handling, validation, and security (nonce/CSRF). -->`)

### Unchanged Behavior (Regression Prevention)

3.1 WHEN the `aegis_theme_updater_config` filter is not removed by any child theme or plugin THEN the system SHALL CONTINUE TO return the updater config array `['repo' => 'aegiswp/theme', 'slug' => 'aegis']` exactly as before

3.2 WHEN a block type is registered with `supports.metadata.blockVisibility` THEN the system SHALL CONTINUE TO strip that support key from the metadata array via the `block_type_metadata` filter

3.3 WHEN the `dns-prefetch` relation type is processed by `wp_resource_hints` THEN the system SHALL CONTINUE TO return the URLs array unchanged (no external domains are currently added)

3.4 WHEN the theme is set up via `after_setup_theme` THEN the system SHALL CONTINUE TO add `title-tag` theme support

3.5 WHEN the `init` action fires THEN the system SHALL CONTINUE TO instantiate and initialize `MultiStep`, `Overlay`, and `Breadcrumbs` services in `src/bootstrap.php`

3.6 WHEN the `patterns/header/default.php` pattern is rendered THEN the system SHALL CONTINUE TO display the "Subscribe", "Log In", and "Sign Up" button labels, the search toggle, the dark/light mode toggles, the navigation, the site icon, and all WooCommerce blocks exactly as before

3.7 WHEN the `patterns/header/center-logo.php` pattern is rendered THEN the system SHALL CONTINUE TO display the social links, site icon, "Subscribe" button, search toggle, dark/light mode toggles, navigation, and all WooCommerce blocks exactly as before

3.8 WHEN the `.github/workflows/dependabot-auto-merge.yml` workflow runs THEN the system SHALL CONTINUE TO use its existing explicit `permissions` block (`pull-requests: write`, `contents: write`) unchanged

3.9 WHEN the `.github/workflows/ci.yml` and `.github/workflows/lighthouse-ci.yml` workflows run THEN the system SHALL CONTINUE TO execute all existing jobs, steps, and logic identically — only the token permission scope changes

3.10 WHEN a contact form pattern is rendered THEN the system SHALL CONTINUE TO display the same HTML form structure, labels, input fields, and button layout — only an HTML comment is added inside the form element
